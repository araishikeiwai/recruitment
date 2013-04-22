<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pendaftar_model extends CI_Model {

    public function get_pendaftar($data) {
        $this->db->select('*');
        $this->db->from('pendaftar');
        $this->db->join('pengguna', 'pendaftar.username = pengguna.username', 'inner');
        $this->db->where($data);

        $query = $this->db->get();

        return $query;
    }
    
    public function tambah_pendaftar($data) {
        $query = $this -> db -> insert('pendaftar', $data);

        return $query;
    }

    public function hapus_pendaftar($data) {
        $query = $this -> db -> delete('pendaftar', $data);

        return $query;
    }

    public function ubah_status_pendaftar($id_lowongan, $username, $status) {
        $this -> db -> where('id_lowongan', $id_lowongan);
        $this -> db -> where('username', $username);

        $query = $this -> db -> update('pendaftar', array('status_pendaftaran' => $status));
    }

}

/* End of file pendaftar_model.php */
/* Location: ./application/models/pendaftar_model.php */