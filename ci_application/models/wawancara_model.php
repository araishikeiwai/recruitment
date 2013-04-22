<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wawancara_model extends CI_Model {

    public function simpan_jadwal($data) {
        $query = $this->db->insert('wawancara', $data);

        return $query;
    }

    public function get_wawancara($data) {
        $this->db->select('*');
        $this->db->from('wawancara');
        $this->db->where($data);

        $query = $this->db->get();

        return $query;
    }

    public function update_jadwal($data, $peserta) {
        $this -> db -> where($data);
        $query = $this -> db -> update('wawancara', array('peserta' => $peserta));

        return $query;
    }

    public function reset_jadwal($data) {
        $this -> db -> where($data);
        $query = $this -> db -> update('wawancara', array('peserta' => ''));

        return $query;   
    }

}

/* End of file wawancara_model.php */
/* Location: ./application/models/wawancara_model.php */