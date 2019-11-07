<?php

class Komentar_model extends CI_Model
{
    public function getKomentar($site)
    {
        return $this->db->get_where("komentar", ["id_situs" => $site])->result_array();
    }

    public function setKomentar($data)
    {
        $this->db->insert("komentar", $data);
        return $this->db->affected_rows();
    }

    public function updateKomentar($id, $data)
    {
        $this->db->update("komentar", $data, ["id", $id]);
        return $this->db->affected_rows();
    }

    public function deleteKomentar($id)
    {
        $this->db->delete("komentar", ["id" => $id]);
        return $this->db->affected_rows();
    }
}
