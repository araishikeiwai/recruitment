<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller - Promosi
* 
* Menghandle segala keperluan yang berhubungan dengan promosi lowongan
* unused in this version
*
* @author Ricky Arifandi Daniel
* @copyright recrUItment, 24-Apr-2013
* @version 1.1.0.0
* 
*/
class Promosi extends CI_Controller {

    /**
    * ...
    */
    public function __construct() {
        parent::__construct();
        $this -> load -> model('lowongan_model');
        $this -> load -> model('promosi_model');
    }

	/**
	* unused in this version
	*/
    public function index() {
        if (!$this -> session -> userdata('logged_in')) {
            redirect('');
        } else {

        }
    }

    /**
	* unused in this version
	*/
    public function ajukan($id_lowongan, $par = '', $paket = '') {
        if (!$this -> session -> userdata('logged_in')) {
            redirect('');
        } else {
            if ($par == '') {
                $data['status'] = 'dipromosikan';
                $lowongan = $this -> lowongan_model -> get_lowongan_by_criteria($data);
                $jumlah_promosi = $lowongan -> num_rows();
                $data['status'] = 'diajukan promosi';
                $lowongan = $this -> lowongan_model -> get_lowongan_by_criteria($data);
                $jumlah_promosi = $jumlah_promosi + $lowongan -> num_rows();

                if ($jumlah_promosi == 5) {
                    $this -> load -> view('lowongan_gagal_view', array('query' => '', 'id_lowongan' => $id_lowongan, 'error_message' => 'promosi_full'));
                } else {
                    $this -> load -> view('promosi_paket_view', array('query' => 'paket', 'paket' => $this -> promosi_model -> get_paket_promosi(), 'id_lowongan' => $id_lowongan));
                }
            } else if ($par == '1') {
                $this -> load -> view('promosi_summary_view', array('query' => 'paket', 'paket' => $this -> promosi_model -> get_paket_promosi(), 'id_lowongan' => $id_lowongan, 'id_promosi' => $paket));
            } else if ($par == '2') {
                $data['status'] = 'diajukan promosi';
                $this -> lowongan_model -> update_lowongan($id_lowongan, $data);
                $data['id_lowongan'] = $id_lowongan;
                $data['id_promosi'] = $paket;
                $this -> promosi_model -> tambah_promosi($data);
                redirect('lowongan/lihat/' . $id_lowongan);
            }
        }
    }

    /**
	* unused in this version
	*/
    public function verifikasi() {
        if (!$this -> session -> userdata('logged_in')) {
            redirect('');
        } else {
            
        }
    }

}

/* End of file promosi.php */
/* Location: ./application/controllers/promosi.php */