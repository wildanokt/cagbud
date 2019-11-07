<?php

class Komentar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
    }

    //input comment
    public function insert($site)
    { }
}
