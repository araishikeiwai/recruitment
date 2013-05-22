<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Model - Pesan
* 
* Melakukan akses database atas data-data yang berhubungan dengan pesan dan notifikasi
* unused in this version
*
* @author Ricky Arifandi Daniel
* @copyright recrUItment, 24-Apr-2013
* @version 1.1.0.0
* 
*/
class Pesan_model extends CI_Model {

    public function __construct() {
        parent::__construct();

        $this->load->helper('date');
    }

    public function get_pesan_by_penerima($id_penerima) {
    	$this->db->select('*');
        $this->db->from('pesan');
        $this->db->where('penerima', $id_penerima);
        $query = $this->db->get();

        return $query;
    }

    public function get_pesan_by_id($id_pesan) {
    	$this->db->select('*');
        $this->db->from('pesan');
        $this->db->where('id_pesan', $id_pesan);
        $query = $this->db->get();

        return $query;
    }

    public function simpan_pesan($data) {
        $time = unix_to_human(gmt_to_local(now(), 'UP5', FALSE));
        $data['waktu'] = $time;
        
        $this -> db -> select_max('id_pesan');
        $id = $this -> db -> get('pesan');
        $id_pesan = $id->result_array();
        $id_pesan = $id_pesan[0]['id_pesan'] + 1;
        $data['id_pesan'] = $id_pesan;

        $this -> db -> insert('pesan', $data);

        return $id_pesan;
    }
}

/* End of file pesan_model.php */
/* Location: ./application/models/pesan_model.php */