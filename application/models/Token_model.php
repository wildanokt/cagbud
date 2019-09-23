<?php

class Token_model extends CI_Model
{
    public function getData($col, $data)
    {
        return $this->db->get_where('user_token', array($col => $data))->row_array();
    }

    public function insertToken($data)
    {
        $this->db->insert('user_token', $data);
    }

    public function deleteToken($token)
    {
        $this->db->delete('user_token', ['token' => $token]);
    }
}
