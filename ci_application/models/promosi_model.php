<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class promosi_model extends CI_Model {

    public function get_paket_promosi() {
        $this -> db -> select('*');
        $this -> db -> from('promosi_paket');
        $query = $this -> db -> get();

        return $query;
    }

    public function tambah_promosi($data) {
        $query = $this -> db -> insert('lowongan_promosi', $data);

        return $query;
    }

}

/* End of file promosi_model.php */
/* Location: ./application/models/promosi_model.php */