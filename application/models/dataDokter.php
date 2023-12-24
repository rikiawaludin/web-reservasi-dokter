<?php

class dataDokter extends CI_Model
{


    function get_dokter()
    {
        $result = $this->db->get('data_dokter');
        return $result;

    }

    function add($nama_dokter, $spesialis, $telepon, $alamat, $gambar)
    {
        $data = array(
            'nama_dokter' => $nama_dokter,
            'spesialis' => $spesialis,
            'telepon' => $telepon,
            'alamat' => $alamat,
            'gambar' => $gambar
        );
        $this->db->insert('data_dokter', $data);
    }

    function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_dokter');
    }

    public function edit($id, $nama_dokter, $spesialis, $telepon, $alamat, $gambar)
    {
        $data = array(
            'nama_dokter' => $nama_dokter,
            'spesialis' => $spesialis,
            'telepon' => $telepon,
            'alamat' => $alamat,
            'gambar' => $gambar
        );
        $this->db->where('id', $id);
        $this->db->update('data_dokter', $data);
    }
}

?>