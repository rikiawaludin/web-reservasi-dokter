<?php

class Jadwal extends CI_Model
{


    function get_jadwal()
    {
        $result = $this->db->get('jadwal_dokter');
        return $result;

    }
    function tambah($id_data_dokter, $hari, $jam_praktek)
    {
        $data = array(
            'id_data_dokter' => $id_data_dokter,
            'hari' => $hari,
            'jam_praktek' => $jam_praktek
        );
        $this->db->insert('jadwal_dokter', $data);
    }
    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jadwal_dokter');
    }

    public function edit($id, $id_data_dokter, $hari, $jam_praktek)
    {
        $data = array(
            'id_data_dokter' => $id_data_dokter,
            'hari' => $hari,
            'jam_praktek' => $jam_praktek,
        );
        $this->db->where('id', $id);
        $this->db->update('jadwal_dokter', $data);
    }
}