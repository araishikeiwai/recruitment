<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller - Pesan
* 
* Menghandle segala keperluan yang berhubungan dengan pesan dan notifikasi
* unused in this version
*
* @author Ricky Arifandi Daniel
* @copyright recrUItment, 24-Apr-2013
* @version 1.1.0.0
* 
*/
class Pesan extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('pesan_model');
    }

	/**
	* unused in this version
	*/
    public function index()
    {
        
    }

    /**
	* unused in this version
	*/
    public function lihat() {
        
    }

    /**
    *
    */
    public function daftar_pesan($id_penerima) {
        $data = array('query' => 'pesan', 'pesan' => $this -> pesan_model -> get_pesan_by_id($id_penerima));
        $this -> load -> view("Pesan_daftar_view", $data);
    }

    /**
	* unused in this version
	*/
    public function tulis() {

    }

    /**
	* unused in this version
	*/
    public function kirim() {
        
    }

}

/* End of file pesan.php */
/* Location: ./application/controllers/pesan.php */