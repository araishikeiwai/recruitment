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
    }

    /**
    * unused for this version
    */
    public function index() {
        
    }

    /**
    * unused for this version
    */
    public function lihat_lowongan() {

    }

    /**
    * Mencari lowongan yang belum dimoderasi dari database dan menyalurkannya ke view cari_view.
    * Lowongan-lowongan yang belum dimoderasi ditampilkan untuk keperluan moderasi lowongan bagi admin.
    */
    public function moderasi() {
        $data = array('query' => 'hasil', 'lowongan' => $this -> lowongan_model -> get_lowongan_by_criteria(array('status' => 'belum dimoderasi')));
        $this -> load -> view('cari_view', $data);
    }

    /**
    * Merubah status lowongan yang dimoderasi oleh admin, dari 'belum dimoderasi' menjadi 'dimoderasi'
    * Untuk menyelesaikan keperluan moderasi lowongan bagi admin.
    */
    public function moderasi_lowongan($id_lowongan) {
        $data = array('status' => 'dimoderasi');
        $this -> lowongan_model -> update_lowongan($id_lowongan, $data);
        redirect('admin/moderasi');
    }

    /**
    * unused for this version
    */
    public function promosi() {

    }

    /**
    * unused for this version
    */
    public function promosi_lowongan() {
        
    }

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */