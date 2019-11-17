<?php

class Komentar_model extends CI_Model
{
    public function getKomentar($site)
    {
        return $this->db->query('SELECT komentar.*, user.nama_lengkap FROM komentar JOIN user ON komentar.id_user = user.id WHERE komentar.id_situs=' . $site . ' ORDER BY komentar.id DESC')->result_array();
    }

    public function getKomentarbyId($id)
    {
        return $this->db->get_where('komentar', ['id' => $id])->row_array();
    }

    public function insertKomentar($data)
    {
        $this->db->insert("komentar", $data);
        return $this->db->affected_rows();
    }

    public function updateKomentar($id, $data)
    {
        $this->db->update("komentar", $data, ["id" => $id]);
        return $this->db->affected_rows();
    }

    public function deleteKomentar($id)
    {
        $this->db->delete("komentar", ["id" => $id]);
        return $this->db->affected_rows();
    }
}
