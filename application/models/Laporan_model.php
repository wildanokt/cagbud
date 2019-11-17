<?php

class Laporan_model extends CI_Model
{
    public function getLaporan($id = 'all')
    {
        if ($id == 'all') {
            return $this->db->query('SELECT laporan.*, situs.nama_situs FROM laporan JOIN situs ON laporan.id_situs = situs.id')->result_array();
        } else {
            return $this->db->query('SELECT laporan.*, situs.nama_situs FROM laporan JOIN situs ON laporan.id_situs = situs.id WHERE laporan.id=' . $id)->row_array();
        }
    }

    public function insertLaporan($data)
    {
        $this->db->insert("laporan", $data);
        return $this->db->affected_rows();
    }

    public function updateLaporan($id, $data)
    {
        $this->db->update("laporan", $data, ["id" => $id]);
        return $this->db->affected_rows();
    }

    public function deleteLaporan($id)
    {
        $this->db->delete("laporan", ["id" => $id]);
        return $this->db->affected_rows();
    }
}
