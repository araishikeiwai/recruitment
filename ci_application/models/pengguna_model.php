<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna_model extends CI_Model {

    public function get_pengguna($username) {
        $this->db->select('*');
        $this->db->from('pengguna');
        $this->db->where("username = '$username'");
        $query = $this->db->get();

        return $query;
    }

    public function create_pengguna($username) {
        $this->db->set('username', $username);
        $query = $this->db->insert('pengguna');

        return $query;
    }

    public function update_pengguna($data) {
        $username = $this -> session -> userdata('username');
        $this -> db -> where("username = '$username'");
        
        $query = $this -> db -> update('pengguna', $data);
        
        return $query;
    }

}

/* End of file pengguna_model.php */
/* Location: ./application/models/pengguna_model.php */