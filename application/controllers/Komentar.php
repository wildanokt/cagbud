<?php

class Komentar extends CI_Controller
{
    private $userdata;
    private $status;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->model('situs_model', 'situs');
        $this->load->model('Komentar_model', 'komen');

        global $userdata;
        global $status;

        if ($this->session->userdata('email') != null) {
            $status = 1;
            $userdata = $this->User_model->getUserData($this->session->userdata('email'));
        } else {
            $status = 0;
            $userdata = [];
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
             Anda harus login terlebih dahulu
             </div>');
            redirect(base_url('login'));
        }
    }

    //input comment
    public function insert()
    {
        global $userdata;
        global $status;

        $data = [
            'id_user' => $userdata['id'],
            'id_situs' => $this->input->post('id_situs'),
            'komentar' => htmlspecialchars($this->input->post('komentar'))
        ];
        $this->komen->insertKomentar($data);
        redirect(base_url('situs/' . $data['id_situs']));
    }

    public function edit($id)
    {
        global $status;
        global $userdata;

        $data = [
            'status' => $status,
            'user'   => $userdata,
            'title'  => "Edit Komentar",
            'komen' => $this->komen->getKomentarbyId($id),
        ];

        $this->form_validation->set_rules('komen', 'Komentar', 'required|trim');

        $this->load->view('style/header', $data);
        $this->load->view('style/nav', $data);

        if ($this->form_validation->run() == false) {
            //validation false
            $this->load->view('situs/update_komen', $data);
        } else {
            //validation success
            $komen = $this->input->post('komen');
            
            $komen_data = [
                'id_user' => $userdata['id'],
                'id_situs' => $data['komen']['id_situs'],
                'komentar' => htmlspecialchars($komen)
            ];

            $this->komen->updateKomentar($id, $komen_data);
            redirect(base_url('situs/' . $data['komen']['id_situs']));
        }

        $this->load->view('style/footer');
    }

    public function delete($situs, $id)
    {
        $this->komen->deleteKomentar($id);
        redirect(base_url('situs/' . $situs));
    }
}
