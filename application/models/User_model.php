<?php

class User_model extends CI_Model
{
    public function register($data)
    {
        //simple insert database
        //data => array
        $this->db->insert('user', $data);
    }

    public function activateUser($email)
    {
        $this->db->set('is_active', 1);
        $this->db->where('email', $email);
        $this->db->update('user');
        $this->db->delete('user_token', ['email' => $email]);
    }

    public function getUserData($email)
    {
        return $this->db->get_where('user', array('email' => $email))->row_array();
    }

    public function updateUser($email, $data)
    {
        $this->db->update('user', $data, ['email' => $email]);
    }

    public function getAdminData($username)
    {
        return $this->db->get_where('user', ['email' => $username])->row_array();
    }
}
