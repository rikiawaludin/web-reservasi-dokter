<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reservasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login2();
        $this->load->model('dataDokter');
        $this->load->model('Jadwal');
        $this->load->model('Permintaan');

    }

    public function index()
    {
        $data['title'] = 'Reservasi';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['data_dokter'] = $this->dataDokter->get_dokter();
        $data['jadwal_dokter'] = $this->Jadwal->get_jadwal();
        $data['reservasi'] = $this->Permintaan->get_req();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('reservasi/index', $data);
        $this->load->view('templates/footer');
    }

    public function reqPasien()
    {
        $id_data_dokter = $this->input->post('id_data_dokter');
        $id_pasien = $this->input->post('id_pasien');
        $dokter = $this->input->post('dokter');
        $pasien = $this->input->post('pasien');
        $usia = $this->input->post('usia');
        $tanggal = $this->input->post('tanggal');
        $waktu_konsultasi = $this->input->post('waktu_konsultasi');
        $no_telepon = $this->input->post('no_telepon');
        $status = 'Request';

        $this->Permintaan->tambah($id_data_dokter, $id_pasien, $dokter, $pasien, $usia, $tanggal, $waktu_konsultasi, $no_telepon, $status);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
        Reservasi telah berhasil dikirim!
        </div>'
        );
        redirect('reservasi/statusreservasi');
    }

    public function statusReservasi()
    {
        $data['title'] = 'Status Reservasi';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['reservasi'] = $this->Permintaan->get_req();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('reservasi/status_reservasi', $data);
        $this->load->view('templates/footer');
    }

    function hapusreq()
    {
        $id = $this->uri->segment(3);
        $this->Permintaan->delete($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
        Data berhasil dihapus!
        </div>'
        );
        redirect('reservasi/index');
    }


}