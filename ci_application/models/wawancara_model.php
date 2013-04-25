<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Model - Wawancara
* 
* Melakukan akses database atas data-data yang berhubungan dengan jadwal wawancara
*
* @author Ricky Arifandi Daniel
* @copyright recrUItment, 24-Apr-2013
* @version 1.1.0.2
* 
*/
class Wawancara_model extends CI_Model {

    /**
    * Melakukan penyimpanan jadwal wawancara baru
    *
    * @param string $data query terkait data wawancara baru
    */
    public function simpan_jadwal($data) {
        $query = $this->db->insert('wawancara', $data);

        return $query;
    }

    /**
    * Me-retrieve data wawancara tertentu
    *
    * @param string $data query terkait pencarian data wawancara
    * @return table data wawancara sesuai kriteria pencarian
    */
    public function get_wawancara($data) {
        $this->db->select('*');
        $this->db->from('wawancara');
        $this->db->where($data);

        $query = $this->db->get();

        return $query;
    }

    /**
    * Mengupdate jadwal wawancara tertentu
    *
    * @param string $data query pencarian wawancara
    * @param string_array data peserta wawancara
    */
    public function update_jadwal($data, $peserta) {
        $this -> db -> where($data);
        $query = $this -> db -> update('wawancara', array('peserta' => $peserta));

        return $query;
    }

    /**
    * Mereset jadwal wawancara (menghapus peserta dari jadwal wawancara)
    *
    * @param string $data query pencarian wawancara
    */
    public function reset_jadwal($data) {
        $this -> db -> where($data);
        $query = $this -> db -> update('wawancara', array('peserta' => ''));

        return $query;   
    }

}

/* End of file wawancara_model.php */
/* Location: ./application/models/wawancara_model.php */