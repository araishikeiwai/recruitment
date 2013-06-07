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
* ================================ UPDATE ================================
*
* Menambah fungsi untuk fitur pesan dan notifikasi
*
* @author Ricky Arifandi Daniel, Erryan Sazany
* @copyright recrUItment, 7-Jun-2013
* @version 1.3.0.0
* 
*/
class Pesan_model extends CI_Model {

    /**
    * Me-load helper date
    */
    public function __construct() {
        parent::__construct();

        $this->load->helper('date');
    }

    /**
    * Me-retrieve pesan dengan penerima tertentu
    *
    * @param string $id_penerima username penerima
    * @return table pesan dengan username penerima terkait
    */
    public function get_pesan_by_penerima($id_penerima) {
        $this->db->select('*');
        $this->db->from('pesan');
        $this->db->where('penerima', $id_penerima);
        $this->db->order_by('waktu', 'desc');
        $query = $this->db->get();

        return $query;
    }

    /**
    * Me-retrieve pengguna dengan id tertentu
    *
    * @param string $id_pesan id pesan terkait
    * @return table pesan dengan id tertentu
    */
    public function get_pesan_by_id($id_pesan) {
        $this->db->select('*');
        $this->db->from('pesan');
        $this->db->where('id_pesan', $id_pesan);
        $query = $this->db->get();

        return $query;
    }

    /**
    * Meng-update status pesan (terbaca/belum dibaca)
    *
    * @param string $id_pesan id pesan terkait
    * @param string $data data terkait update status pesan
    */
    public function update_status_pesan($id_pesan, $data) {
        $this -> db -> where('id_pesan', $id_pesan);
        
        $query = $this -> db -> update('pesan', $data);
        
        return $query;
    }

    /**
    * Menyimpan pesan
    *
    * @param string $data data terkait update status pesan
    * @return int id pesan tersebut
    */
    public function simpan_pesan($data) {
        $this -> db -> select_max('id_pesan');
        $id = $this -> db -> get('pesan');
        $id_pesan = $id->result_array();
        $id_pesan = $id_pesan[0]['id_pesan'] + 1;
        $data['id_pesan'] = $id_pesan;

        $this -> db -> insert('pesan', $data);

        return $id_pesan;
    }

    /**
    * Menyimpan pesan broadcast
    *
    * @param string $data data terkait update status pesan
    * @return int id pesan tersebut
    */
    public function simpan_pesan_broadcast($data) {
        //ambil semua pendaftar
        $this -> db -> select('username');
        $this -> db -> from('pendaftar');
        $this -> db -> where('id_lowongan', $data['id_lowongan']);
        $pdftr = $this -> db -> get();
        $pdftr = $pdftr -> result_array();

        for($i = 0; $i < count($pdftr); $i++) {
            $field['penerima'] = $pdftr[$i]['username'];
            $this -> db -> select_max('id_pesan');
            $id = $this -> db -> get('pesan');
            $id_pesan = $id->result_array();
            $id_pesan = $id_pesan[0]['id_pesan'] + 1;
            
            $field['pengirim'] = $data['pengirim'];
            $field['subject'] = $data['subject'];
            $field['isi'] = $data['isi'];
            $field['id_pesan'] = $id_pesan;

            $this -> db -> insert('pesan', $field);
        }

        return $id_pesan;
    }
}

/* End of file pesan_model.php */
/* Location: ./application/models/pesan_model.php */