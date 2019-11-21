<?php

class Situs_model extends CI_Model
{
    public function getSitus($id = "all")
    {
        if ($id == "all") {
            return $this->db->get("situs")->result_array();
        } else if ($id == "thumb") {
            $this->db->order_by('id DESC');
            return $this->db->get("situs", 3)->result_array();
        } else {
            return $this->db->get_where("situs", ["id" => $id])->row_array();
        }
    }

    public function getUserSitus($id)
    {
        return $this->db->get_where('situs', ['id_user' => $id])->result_array();
    }

    public function insertSitus($data)
    {
        $this->db->insert("situs", $data);
        return $this->db->affected_rows();
    }

    public function updateSitus($id, $data)
    {
        $this->db->update("situs", $data, ["id" => $id]);
        return $this->db->affected_rows();
    }

    public function deleteSitus($id)
    {
        $this->db->delete("situs", ["id" => $id]);
        return $this->db->affected_rows();
    }

    public function verifikasi($id)
    {
        $this->db->update('situs', ['is_verif' => 1], ['id' => $id]);
    }
}
