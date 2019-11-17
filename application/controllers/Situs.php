<?php

class Situs extends CI_Controller
{
    private $userdata;
    private $status;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->model('situs_model', 'situs');

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

    //show all sites
    public function index()
    {
        global $userdata;
        global $status;

        $data = [
            'user' => $userdata,
            'status' => $status,
            'title' => 'CagBud Online',
            'all_situs' => $this->situs->getSitus()
        ];

        $this->load->view('style/header', $data);
        $this->load->view('style/nav', $data);
        $this->load->view('situs/index', $data);
        $this->load->view('style/footer');
    }

    public function show($id)
    {
        global $userdata;
        global $status;

        $this->load->model('Komentar_model', 'komen');

        $data = [
            'user' => $userdata,
            'status' => $status,
            'title' => 'CagBud Online',
            'komentar' => $this->komen->getKomentar($id),
            'situs' => $this->situs->getSitus($id)
        ];

        $this->load->view('style/header', $data);
        $this->load->view('style/nav', $data);
        $this->load->view('situs/detail', $data);
        $this->load->view('style/footer');
    }

    public function manage()
    {
        global $userdata;
        global $status;
        $data = [
            'user' => $userdata,
            'status' => $status,
            'title' => 'Managemen Situs',
            'all_situs' => $this->situs->getSitus()
        ];

        $this->load->view('style/header', $data);
        $this->load->view('style/nav', $data);
        $this->load->view('situs/manage', $data);
        $this->load->view('style/footer');
    }

    //insert sites
    public function insert()
    {
        global $userdata;
        global $status;

        $data = [
            'user' => $userdata,
            'status' => $status,
            'title' => 'Pengajuan Situs'
        ];

        $this->form_validation->set_rules('nama_situs', 'Nama situs', 'required|trim');
        $this->form_validation->set_rules('kondisi', 'Kondisi situs', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi situs', 'required|trim');
        $this->form_validation->set_rules('jalan', 'Jalan', 'required|trim');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('kota', 'Kota', 'required|trim');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');

        if (empty($_FILES['foto_situs']['name'])) {
            $this->form_validation->set_rules('foto_situs', 'Photo', 'required|xss_clean');
        } else {
            $this->form_validation->set_rules('foto_situs', 'Photo', 'trim|xss_clean');
        }

        $this->load->view('style/header', $data);
        $this->load->view('style/nav', $data);

        if ($this->form_validation->run() == false) {
            //validation false
            $this->load->view('situs/insert', $data);
        } else {
            //validation success
            $nama_situs = $this->input->post('nama_situs');
            $kondisi = $this->input->post('kondisi');
            $deskripsi = $this->input->post('deskripsi');
            $jalan = $this->input->post('jalan');
            $kecamatan = $this->input->post('kecamatan');
            $kota = $this->input->post('kota');
            $provinsi = $this->input->post('provinsi');

            //image upload
            $file_name = 'situs_' . $nama_situs; //rename file
            // $imgName = $userdata['image'] ? $userdata['image'] : 'default.png'; //prev image
            $imgName = 'default.png'; //prev image
            $image = $_FILES['foto_situs']['name']; //new image

            if ($image) {
                //image not null
                //set configuration

                //create folder
                $folder = './assets/uploads/situs/';
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $config['upload_path'] = $folder;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_situs')) {
                    //image upload success

                    //save new file name
                    $imgName = $this->upload->data('file_name');
                } else {
                    //upload failed
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'
                        . $this->upload->display_errors() .
                        '</div>');
                    redirect('input_proposal');
                }
            }
            $situsData = [
                'nama_situs' => htmlspecialchars($nama_situs),
                'id_user' => $userdata['id'],
                'kode_situs' => 'aaaa',
                'deskripsi' => $deskripsi,
                'foto' => $imgName,
                'kondisi' => htmlspecialchars($kondisi),
                'is_verif' => 0,
                'jalan' => $jalan,
                'kecamatan' => $kecamatan,
                'kota' => $kota,
                'provinsi' => $provinsi,
            ];
            //store updated data to database
            $this->situs->insertSitus($situsData);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Pengajuan situs berhasil
             </div>');
            redirect();
        }

        $this->load->view('style/footer');
    }

    //update sites
    public function update($id)
    {
        global $userdata;
        global $status;

        $data = [
            'user' => $userdata,
            'status' => $status,
            'title' => 'Perbaruan Situs',
            'situs' => $this->situs->getSitus($id)
        ];

        $this->form_validation->set_rules('nama_situs', 'Nama situs', 'required|trim');
        $this->form_validation->set_rules('kondisi', 'Kondisi situs', 'required|trim');
        if ($this->session->userdata('pyokopyoko') != null) {
            $this->form_validation->set_rules('kode', 'Kode situs', 'required|trim');
        }
        $this->form_validation->set_rules('deskripsi', 'Deskripsi situs', 'required|trim');
        $this->form_validation->set_rules('jalan', 'Jalan', 'required|trim');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('kota', 'Kota', 'required|trim');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');

        $this->load->view('style/header', $data);
        $this->load->view('style/nav', $data);

        if ($this->form_validation->run() == false) {
            //validation false
            $this->load->view('situs/update', $data);
        } else {
            //validation success
            $nama_situs = $this->input->post('nama_situs');
            $kondisi = $this->input->post('kondisi');
            $deskripsi = $this->input->post('deskripsi');
            $jalan = $this->input->post('jalan');
            $kecamatan = $this->input->post('kecamatan');
            $kota = $this->input->post('kota');
            $provinsi = $this->input->post('provinsi');
            if ($this->session->userdata('pyokopyoko') != null) {
                $kode = $this->input->post('kode');
            }

            //image upload
            $file_name = 'situs_' . $nama_situs; //rename file
            $imgName = $data['situs']['foto']; //prev image
            $image = $_FILES['foto_situs']['name']; //new image

            if ($image) {
                //image not null
                //set configuration
                //create folder
                $folder = './assets/uploads/situs/';
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $config['upload_path'] = $folder;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '20048';
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto_situs')) {
                    //image upload success
                    if ($imgName != 'default.png') {
                        //delete prev image
                        $lastImgPath = base_url('assets/uploads/situs/' . $imgName);
                        unlink($lastImgPath);
                    }
                    //save new file name
                    $imgName = $this->upload->data('file_name');
                } else {
                    //upload failed
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'
                        . $this->upload->display_errors() .
                        '</div>');
                    redirect('update_situs/' . $id);
                }
            }
            $situsData = [
                'nama_situs' => htmlspecialchars($nama_situs),
                'id_user' => $data['situs']['id_user'],
                'kode_situs' => $data['situs']['kode_situs'],
                'deskripsi' => $deskripsi,
                'foto' => $imgName,
                'kondisi' => htmlspecialchars($kondisi),
                'is_verif' => 0,
                'jalan' => $jalan,
                'kecamatan' => $kecamatan,
                'kota' => $kota,
                'provinsi' => $provinsi,
            ];
            if ($this->session->userdata('pyokopyoko') != null) {
                $situsData = [
                    'nama_situs' => htmlspecialchars($nama_situs),
                    'id_user' => $data['situs']['id_user'],
                    'kode_situs' => $kode,
                    'deskripsi' => $deskripsi,
                    'foto' => $imgName,
                    'kondisi' => htmlspecialchars($kondisi),
                    'is_verif' => $data['situs']['is_verif'],
                    'jalan' => $jalan,
                    'kecamatan' => $kecamatan,
                    'kota' => $kota,
                    'provinsi' => $provinsi,
                ];
            }
            //store updated data to database
            $this->situs->updateSitus($id, $situsData);
            if ($this->session->userdata('pyokopyoko') != null) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Update situs berhasil
                </div>');
                redirect('a_manage');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Update situs berhasil
                </div>');
                redirect('managemen');
            }
        }

        $this->load->view('style/footer');
    }

    public function delete($id)
    {
        $this->situs->deleteSitus($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Penghapusan situs berhasil
             </div>');
        redirect('managemen');
    }
}
