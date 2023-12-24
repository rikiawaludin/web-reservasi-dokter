<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('dataDokter');
        $this->load->model('Jadwal');
        $this->load->model('Permintaan');
        // $this->load->model('DataUser');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $this->load->database(); // Load database
        // Menghitung jumlah baris di tabel "user"
        $jumlah_user = $this->db->count_all('user');
        $jumlah_data_dokter = $this->db->count_all('data_dokter');
        $jumlah_reservasi = $this->db->count_all('reservasi');
        $jumlah_jadwal_dokter = $this->db->count_all('jadwal_dokter');

        $data['jumlah_user'] = $jumlah_user;
        $data['jumlah_data_dokter'] = $jumlah_data_dokter;
        $data['jumlah_reservasi'] = $jumlah_reservasi;
        $data['jumlah_jadwal_dokter'] = $jumlah_jadwal_dokter;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function datadokters()
    {
        $data['title'] = 'Data Dokter';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['data_dokter'] = $this->dataDokter->get_dokter();
        $this->load->helper('form');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datadokters', $data);
        $this->load->view('templates/footer');
    }

    function add()
    {
        $nama_dokter = $this->input->post('nama_dokter');
        $spesialis = $this->input->post('spesialis');
        $telepon = $this->input->post('telepon');
        $alamat = $this->input->post('alamat');
        $gambar = $_FILES['gambar'];
        if ($gambar = '') {

        } else {
            $config['upload_path'] = './assets/assets/img/';
            $config['allowed_types'] = 'jpg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">
                Gagal upload foto!
                </div>'
                );
                redirect('admin/datadokters');
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }
        $this->dataDokter->add($nama_dokter, $spesialis, $telepon, $alamat, $gambar);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
        Data berhasil ditambahkan!
        </div>'
        );
        redirect('admin/datadokters');
    }

    function delete()
    {
        $id = $this->uri->segment(3);
        $this->dataDokter->delete($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
        Data berhasil dihapus!
        </div>'
        );
        redirect('admin/datadokters');
    }

    public function edit($id)
    {

        $nama_dokter = $this->input->post('nama_dokter');
        $spesialis = $this->input->post('spesialis');
        $telepon = $this->input->post('telepon');
        $alamat = $this->input->post('alamat');
        $gambar = $_FILES['gambar'];
        $id_dokter = $id; // Ganti dengan id dokter yang sesuai
        $data_gambar = $this->dataDokter->get_dokter($id_dokter);

        // Proses upload gambar jika ada
        if ($_FILES['gambar']['name'] != '') {
            $config['upload_path'] = './assets/assets/img/';
            $config['allowed_types'] = 'jpg|png|gif';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">
                Gagal upload foto!
                </div>'
                );
                redirect('admin/datadokters');
            } else {

                $gambar = $this->upload->data('file_name');


            }
        } else {
            $data_gambar = $this->db->get_where('data_dokter', array('id' => $id_dokter))->row();
            $gambar = $data_gambar->gambar;
        }

        // Panggil fungsi edit pada model untuk menyimpan data yang telah diubah
        $this->dataDokter->edit($id, $nama_dokter, $spesialis, $telepon, $alamat, $gambar);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>'
        );
        redirect('admin/datadokters');
    }


    public function jadwaldokter()
    {
        $data['title'] = 'Jadwal Dokter';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['jadwal_dokter'] = $this->Jadwal->get_jadwal();
        $this->load->helper('form');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/jadwal_dokter', $data);
        $this->load->view('templates/footer');
    }

    public function tambahJadwal()
    {
        $id_data_dokter = $this->input->post('id_data_dokter');
        $hari = $this->input->post('hari');
        $jam_praktek = $this->input->post('jam_praktek');

        $this->Jadwal->tambah($id_data_dokter, $hari, $jam_praktek);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
        Data berhasil ditambahkan!
        </div>'
        );
        redirect('admin/jadwaldokter');
    }

    function hapusJadwal()
    {
        $id = $this->uri->segment(3);
        $this->Jadwal->delete($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
        Data berhasil dihapus!
        </div>'
        );
        redirect('admin/jadwaldokter');
    }

    public function editJadwal($id)
    {
        $id_data_dokter = $this->input->post('id_data_dokter');
        $hari = $this->input->post('hari');
        $jam_praktek = $this->input->post('jam_praktek');

        $this->Jadwal->edit($id, $id_data_dokter, $hari, $jam_praktek);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>'
        );
        redirect('admin/jadwaldokter');
    }

    public function permintaanpasien()
    {
        $data['title'] = 'Permintaan Pasien';
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['reservasi'] = $this->Permintaan->get_req();
        $this->load->helper('form');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/reqpasien', $data);
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
        redirect('admin/permintaanpasien');
    }

    public function editreq($id)
    {
        $id_data_dokter = $this->input->post('id_data_dokter');
        $id_pasien = $this->input->post('id_pasien');
        $dokter = $this->input->post('dokter');
        $pasien = $this->input->post('pasien');
        $usia = $this->input->post('usia');
        $tanggal = $this->input->post('tanggal');
        $waktu_konsultasi = $this->input->post('waktu_konsultasi');
        $no_telepon = $this->input->post('no_telepon');
        $status = $this->input->post('status');

        $this->Permintaan->edit($id, $id_data_dokter, $id_pasien, $dokter, $pasien, $usia, $tanggal, $waktu_konsultasi, $no_telepon, $status);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">Data berhasil diubah!</div>'
        );
        redirect('admin/permintaanpasien');
    }
}