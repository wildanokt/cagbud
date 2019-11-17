<?php

class Admin extends CI_Controller
{

    private $userData;
    private $status;

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->model('situs_model', 'situs');
        $this->load->model('komentar_model', 'komen');

        global $userdata;
        global $status;

        if ($this->session->userdata('pyokopyoko') != null) {
            $status = 1;
            $userdata = $this->User_model->getUserData($this->session->userdata('pyokopyoko'));
        } else {
            $status = 0;
            $userdata = [
                'id' => null
            ];
        }
    }

    //menu
    public function index()
    {
        global $userdata;
        global $status;

        $data = [
            'title' => 'Admin',
            'all_situs' => $this->situs->getSitus(),
            'admin' => $this->User_model->getUserData('admin'),
        ];

        if ($status == 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Anda harus login dulu!
                        </div>');
            redirect('logina');
        }

        $this->load->view('style/header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('style/footer');
    }

    public function situs()
    {
        global $userdata;
        global $status;
        if ($status == 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Anda harus login dulu!
                        </div>');
            redirect('logina');
        }

        $data = [
            'user' => $userdata,
            'status' => $status,
            'title' => 'Managemen Situs',
            'all_situs' => $this->situs->getSitus()
        ];

        $this->load->view('style/header', $data);
        $this->load->view('admin/situs/index', $data);
        $this->load->view('style/footer');
    }

    public function verifikasi($id)
    {
        $this->situs->verifikasi($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Situs berhasil diverifikasi
                        </div>');
        redirect('a_manage');
    }

    //--------------------------- admin auth -----------------------------------

    //admin login function
    public function login()
    {
        if ($this->session->userdata('pyokopyoko') != null) {
            redirect(base_url('mimin'));
        }

        //validation rules
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        //title page
        $data['title'] = "Login";

        //load header
        $this->load->view('style/header', $data);

        if ($this->form_validation->run() == false) {
            //validation fail / default page
            $this->load->view('admin/login');
        } else {
            //validation success
            $this->_login();
        }

        //load footer
        $this->load->view('style/footer');
    }

    //login process
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $userData = $this->User_model->getUserData($username);
        //check user
        if ($userData) {
            //username exist
            if ($userData['user_level'] == 1) {
                if ($password == $userData['password']) {
                    //password matches
                    $data['user'] = [
                        'pyokopyoko' => $userData['email']
                    ];
                    //set session
                    $this->session->set_userdata($data['user']);
                    redirect(base_url('mimin'));
                } else {
                    //password not matches
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Password Salah!
                        </div>');
                    redirect('logina');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Kamu bukan admin!
                    </div>');
                redirect('logina');
            }
        } else {
            //email not exist
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Username tidak valid
                </div>');
            redirect('logina');
        }
    }

    public function logout()
    {
        if ($this->session->userdata('pyokopyoko') != null) {
            //if user login
            $this->session->unset_userdata('pyokopyoko');
            $this->session->set_flashdata('message', '<div class=" alert alert-success" role="alert">
            Anda berhasil logout
        </div>');
            redirect('logina');
        } else {
            //if user not login
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Anda belum melakukan login
        </div>');
            redirect('logina');
        }
    }
}
