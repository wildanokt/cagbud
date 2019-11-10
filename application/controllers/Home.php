<?php

class Home extends CI_Controller
{

    private $userdata;
    private $status;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');

        global $userdata;
        global $status;

        if ($this->session->userdata('email') != null) {
            $status = 1;
            $userdata = $this->User_model->getUserData($this->session->userdata('email'));
        } else {
            $status = 0;
            $userdata = [];
        }
    }

    //landing page
    public function index()
    {
        global $userdata;
        global $status;

        $this->load->model('situs_model', 'situs');

        $data = [
            'user' => $userdata,
            'status' => $status,
            'title' => 'CagBud Online',
            'all_situs' => $this->situs->getSitus()
        ];

        $this->load->view('style/header', $data);
        $this->load->view('style/nav', $data);
        $this->load->view('home/index', $data);
        $this->load->view('style/footer');
    }
}
