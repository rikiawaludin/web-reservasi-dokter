<?php

class Permintaan extends CI_Model
{
    function get_req()
    {
        $result = $this->db->get('reservasi');
        return $result;

    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('reservasi');
    }
    public function edit($id, $id_data_dokter, $id_pasien, $dokter, $pasien, $usia, $tanggal, $waktu_konsultasi, $no_telepon, $status)
    {
        $data = array(
            'id_data_dokter' => $id_data_dokter,
            'id_pasien' => $id_pasien,
            'dokter' => $dokter,
            'pasien' => $pasien,
            'usia' => $usia,
            'tanggal' => $tanggal,
            'waktu_konsultasi' => $waktu_konsultasi,
            'no_telepon' => $no_telepon,
            'status' => $status,
        );
        $this->db->where('id', $id);
        $this->db->update('reservasi', $data);
    }

    function tambah($id_data_dokter, $id_pasien, $dokter, $pasien, $usia, $tanggal, $waktu_konsultasi, $no_telepon, $status)
    {
        $data = array(
            'id_data_dokter' => $id_data_dokter,
            'id_pasien' => $id_pasien,
            'dokter' => $dokter,
            'pasien' => $pasien,
            'usia' => $usia,
            'tanggal' => $tanggal,
            'waktu_konsultasi' => $waktu_konsultasi,
            'no_telepon' => $no_telepon,
            'status' => $status,
        );
        $this->db->insert('reservasi', $data);
    }
}