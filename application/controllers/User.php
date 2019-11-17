<?php

class User extends CI_Controller
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
            $userdata = [];
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
             Anda harus login terlebih dahulu
             </div>');
            redirect(base_url('login'));
        }
    }

    public function profile()
    {
        global $userdata;
        global $status;

        $data = [
            'user' => $userdata,
            'status' => $status,
            'title' => 'Profil',
        ];

        $this->load->view('style/header', $data);
        $this->load->view('style/nav', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('style/footer');
    }

    public function editProfile()
    {
        global $status;
        global $userdata;
        $data = [
            'status' => $status,
            'user'   => $userdata,
            'title'  => "Edit Profile"
        ];

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('tel', 'Nomor Telepon ', 'required|regex_match[/([+]62)?([0-9]+)/]|min_length[12]|max_length[16]|trim');

        if ($this->input->post('password1') != null) {
            //validate if password will be changed
            $this->form_validation->set_rules('password1', 'Password', 'trim|min_length[6]', [
                'length' => 'Password too short',
                'matches[password2]' => 'Password tidak cocok',
            ]);
            $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|min_length[6]|matches[password1]');
        }

        $this->load->view('style/header', $data);
        $this->load->view('style/nav', $data);

        if ($this->form_validation->run() == false) {
            //validation false
            $this->load->view('user/edit_profile', $data);
        } else {
            //validation success
            $name = $this->input->post('name');
            $password = $this->input->post('password1');
            $telp = $this->input->post('tel');
            if ($password == null) {
                //use previous password
                $password = $userdata['password'];
            } else {
                //use new password
                $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            }

            //image upload
            $file_name = 'profil_' . $name; //rename file
            $imgName = $userdata['foto']; //prev image
            $image = $_FILES['image']['name']; //new image
            $folder = './assets/uploads/profile/';
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }
            if ($image) {
                //image not null
                //set configuration
                $config['upload_path'] = $folder;
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '20048';
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {
                    //image upload success
                    if ($userdata['foto'] != 'default.png') {
                        $lastImgPath = './assets/uploads/profile/' . $userdata['foto'];
                        //delete last image
                        unlink($lastImgPath);
                    }

                    //save new file name
                    $imgName = $this->upload->data('file_name');
                } else {
                    //upload failed
                    //use previous image
                    $imgName = $userdata['foto'];
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">'
                        . $this->upload->display_errors() .
                        '</div>');
                    redirect(base_url('edit_profile'));
                }
            } else {
                $imgName = $userdata['foto'];
            }
            $userUpdate = [
                'nama_lengkap' => $name,
                'email'     => $userdata['email'],
                'password'  => $password,
                'nomor_telepon' => $telp,
                'foto'     => $imgName,
            ];
            //store updated data to database
            $this->User_model->updateUser($userdata['email'], $userUpdate);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
             Profile berhasil diperbarui
             </div>');
            redirect(base_url('profile'));
        }
    }

    
}
