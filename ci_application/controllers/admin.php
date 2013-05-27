<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller - Admin
* 
* Mengatur aliran data yang dibutuhkan oleh view dari model dan mengatur aliran data dari model ke view
* Digunakan untuk keperluan akses sistem sebagai admin
*
* @author Ricky Arifandi Daniel
* @copyright recrUItment, 24-Apr-2013
* @version 1.1.0.2
* 
*/
class Admin extends CI_Controller {

    /**
    * Mengkonstruksi controller dan me-load model lowongan_model
    */
    public function __construct() {
        parent::__construct();
        $this->load->model('lowongan_model');
        $this->load->model('promosi_model');
        $this->load->model('pesan_model');
    }

    /**
    * unused for this version
    */
    public function index() {
        redirect('');
    }

    /**
    * Mencari lowongan yang belum dimoderasi dari database dan menyalurkannya ke view cari_view.
    * Lowongan-lowongan yang belum dimoderasi ditampilkan untuk keperluan moderasi lowongan bagi admin.
    */
    public function moderasi() {
        if ($this -> session -> userdata('status') == 'admin') {
            $data = array('query' => 'hasil', 'lowongan' => $this -> lowongan_model -> get_lowongan_by_criteria(array('status' => 'belum dimoderasi')));
            $this -> load -> view('cari_view', $data);
        } else {
            redirect('');
        }
    }

    public function tolak_moderasi($id_lowongan) {
        if ($this -> session -> userdata('status') == 'admin') {
            $lowongan = $this -> lowongan_model -> get_lowongan($id_lowongan) -> row_array();

            $data['pengirim'] = 'admin';
            $data['penerima'] =  $lowongan['nama_provider'];
            $data['subject'] = 'Lowongan Ditolak untuk Ditampilkan';
            $data['isi'] = 'Mohon maaf, karena satu dan lain hal, lowongan yang Anda ajukan yang berjudul ' . lowongan_link($lowongan['id_lowongan'], $lowongan['judul']) . ' kami tolak.<br/>Silakan <i>review</i> kembali deskripsi dan syarat-syarat lowongan Anda.<br/><br/>Jika ada pertanyaan lebih lanjut, silakan balas pesan ini langsung ke Administrator.<br/>';

            $this -> pesan_model -> simpan_pesan($data);

            $data = array('status' => 'ditolak');
            $this -> lowongan_model -> update_lowongan($id_lowongan, $data);
            redirect('admin/moderasi');
        } else {
            redirect('');
        }
    }

    /**
    * Merubah status lowongan yang dimoderasi oleh admin, dari 'belum dimoderasi' menjadi 'dimoderasi'
    * Untuk menyelesaikan keperluan moderasi lowongan bagi admin.
    */
    public function moderasi_lowongan($id_lowongan) {
        if ($this -> session -> userdata('status') == 'admin') {
            $data = array('status' => 'dimoderasi');
            $this -> lowongan_model -> update_lowongan($id_lowongan, $data);
            redirect('admin/moderasi');
        } else {
            redirect('');
        }
    }

    /**
    * unused for this version
    */
    public function promosi() {
        if ($this -> session -> userdata('status') == 'admin') {
            $data = array('query' => 'hasil', 'lowongan' => $this -> lowongan_model -> get_lowongan_by_criteria(array('status' => 'diajukan verifikasi')));
            $this -> load -> view('cari_view', $data);
        } else {
            redirect('');
        }
    }

    public function tolak_promosi($id_lowongan) {
        if ($this -> session -> userdata('status') == 'admin') {
            $lowongan = $this -> lowongan_model -> get_lowongan($id_lowongan) -> row_array();

            $data['pengirim'] = 'admin';
            $data['penerima'] =  $lowongan['nama_provider'];
            $data['subject'] = 'Verifikasi Pembayaran Promosi Gagal';
            $data['isi'] = 'Mohon maaf, karena satu dan lain hal, verifikasi pembayaran untuk promosi lowongan yang Anda ajukan yang berjudul ' . lowongan_link($lowongan['id_lowongan'], $lowongan['judul']) . ' kami tolak.<br/>Silakan <i>review</i> kembali pembayaran lowongan Anda.<br/>Untuk saat ini, lowongan Anda dikembalikan berstatus "dimoderasi", jika ingin mempromosikan kembali lowongan Anda, silakan mengajukan promosi kembali.<br/><br/>Jika ada pertanyaan lebih lanjut, silakan balas pesan ini langsung ke Administrator.<br/>';

            $this -> pesan_model -> simpan_pesan($data);

            $data = array('status' => 'dimoderasi');
            $this -> lowongan_model -> update_lowongan($id_lowongan, $data);
            $this -> promosi_model -> hapus_promosi($id_lowongan);
            redirect('admin/promosi');
        } else {
            redirect('');
        }
    }

    /**
    * unused for this version
    */
    public function promosi_lowongan($id_lowongan) {
        if ($this -> session -> userdata('status') == 'admin') {
            $data['status'] = 'dipromosikan';
            $this -> lowongan_model -> update_lowongan($id_lowongan, $data);
            $this -> promosi_model -> update_pembayaran($id_lowongan, $data);
            $data['tanggal_mulai'] = date("Y-m-d");
            $this -> promosi_model -> update_promosi($id_lowongan, $data);
            redirect('admin/promosi');
        } else {
            redirect('');
        }
    }

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */