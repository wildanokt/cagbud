<?php

class Laporan extends CI_Controller
{
    private $userdata;
    private $status;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->model('situs_model', 'situs');
        $this->load->model('Laporan_model', 'lapor');

        global $userdata;
        global $status;

        if ($this->session->userdata('email') != null) {
            $status = 1;
            $userdata = $this->User_model->getUserData($this->session->userdata('email'));
        } else {
            $status = 0;
            $userdata = [
                'id' => null
            ];
        }
    }

    public function index()
    {
        global $userdata;
        global $status;
        $data = [
            'user' => $userdata,
            'status' => $status,
            'title' => 'Laporan Semua Situs',
            'all_laporan' => $this->lapor->getLaporan(),
        ];

        $this->load->view('style/header', $data);
        $this->load->view('style/nav', $data);
        $this->load->view('lapor/index', $data);
        $this->load->view('style/footer');
    }

    public function show($id)
    {
        global $userdata;
        global $status;

        $data = [
            'user' => $userdata,
            'status' => $status,
            'title' => 'Detail Laporan',
            'laporan' => $this->lapor->getLaporan($id)
        ];

        $this->load->view('style/header', $data);
        $this->load->view('style/nav', $data);
        $this->load->view('lapor/detail', $data);
        $this->load->view('style/footer');
    }

    public function insert($id)
    {
        global $userdata;
        global $status;

        if ($status == 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Anda harus login terlebih dahulu
                </div>');
            redirect('login');
        }

        $data = [
            'user' => $userdata,
            'status' => $status,
            'situs' => $this->situs->getSitus($id),
            'title' => 'Pelaporan Situs'
        ];

        $this->form_validation->set_rules('deskripsi', 'Deskripsi situs', 'required|trim');

        if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules('foto', 'Photo', 'required|xss_clean');
        } else {
            $this->form_validation->set_rules('foto', 'Photo', 'trim|xss_clean');
        }

        $this->load->view('style/header', $data);
        $this->load->view('style/nav', $data);

        if ($this->form_validation->run() == false) {
            //validation false
            $this->load->view('lapor/insert', $data);
        } else {
            //validation success
            $deskripsi = $this->input->post('deskripsi');

            //image upload
            $file_name = 'laporan_' . $data['situs']['nama_situs']; //rename file
            $imgName = null; //prev image
            $image = $_FILES['foto']['name']; //new image

            if ($image) {
                //image not null
                //set configuration
                //create folder
                $folder = './assets/uploads/laporan/';
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $config['upload_path'] = $folder;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '20048';
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    //image upload success
                    //save new file name
                    if ($imgName != null) {
                        $lastImgPath = './assets/uploads/laporan/' . $imgName;
                        unlink($lastImgPath);
                    }
                    $imgName = $this->upload->data('file_name');
                } else {
                    //upload failed
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'
                        . $this->upload->display_errors() .
                        '</div>');
                    redirect('lapor/' . $id);
                }
            }
            $laporanData = [
                'id_situs' => $id,
                'id_user' => $userdata['id'],
                'deskripsi' => $deskripsi,
                'foto' => $imgName,
            ];
            //store updated data to database
            $this->lapor->insertLaporan($laporanData);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Pengajuan situs berhasil
             </div>');
            redirect();
        }

        $this->load->view('style/footer');
    }

    public function delete($id)
    { }
}
