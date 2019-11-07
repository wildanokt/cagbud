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

    //show all sites
    public function index()
    { }

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

        $this->load->view('style/header', $data);
        $this->load->view('style/nav', $data);
        $this->load->view('situs/insert', $data);
        $this->load->view('style/footer');
    }
}
