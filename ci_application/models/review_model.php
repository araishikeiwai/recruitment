<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Model - Pesan
* 
* Melakukan akses database atas data-data yang berhubungan dengan review
* unused in this version
*
* @author Ricky Arifandi Daniel
* @copyright recrUItment, 24-Apr-2013
* @version 1.1.0.0
* 
*/
class Review_model extends CI_Model {

    public function __construct() {
        parent::__construct();

        $this->load->helper('date');
    }

    public function get_review($username) {
    	$this -> db -> select('*');
    	$this -> db -> from('review');
        $this -> db -> join('lowongan', 'lowongan.id_lowongan = review.id_lowongan');
        $this -> db -> join('pengguna', 'pengguna.username = lowongan.nama_provider');
    	$this -> db -> where('review.username', $username);

    	$query = $this -> db -> get();

    	return $query;
    }

    public function simpan_review($data) {
    	$query = $this -> db -> insert('review', $data);

    	return $query;
    }

}

/* End of file review_model.php */
/* Location: ./application/models/review_model.php */