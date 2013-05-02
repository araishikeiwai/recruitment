<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Model - Pengguna
* 
* Melakukan akses database atas data-data yang berhubungan dengan pengguna
*
* @author Ricky Arifandi Daniel
* @copyright recrUItment, 24-Apr-2013
* @version 1.2.0.0
* 
*/
class Pengguna_model extends CI_Model {

    /**
    * Me-retrieve pengguna dengan username tertentu
    *
    * @param string $username username pengguna
    * @return table pengguna dengan username terkait
    */
    public function get_pengguna($username) {
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where("username = '$username'");
        $query = $this->db->get();

        return $query;
    }

    /**
    * Menambah pengguna baru ke dalam database
    *
    * @param string $data berisi data baru pengguna
    */
    public function create_pengguna($data) {
        $query = $this->db->insert('pengguna', $data);

        return $query;
    }

    /**
    * Mengupdate data terkait pengguna
    *
    * @param string $data query terkait perubahan data pengguna
    */
    public function update_pengguna($data) {
        $username = $this -> session -> userdata('username');
        $this -> db -> where("username = '$username'");
        
        $query = $this -> db -> update('pengguna', $data);
        
        return $query;
    }

}

/* End of file pengguna_model.php */
/* Location: ./application/models/pengguna_model.php */