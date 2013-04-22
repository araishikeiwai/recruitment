<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lowongan_model extends CI_Model {

    public function get_lowongan($id_lowongan) {
        $this->db->select('*');
        $this->db->from('lowongan');
        $this->db->where('id_lowongan', $id_lowongan);
        $query = $this->db->get();

        return $query;
    }

    public function get_id_lowongan($data) {
        $this->db->select('*');
        $this->db->from('lowongan');
        $this->db->where($data);
        $query = $this->db->get();

        $t = $query -> row_array();
        return $t['id_lowongan'];
    }

    public function get_lowongan_by_criteria($data) {
        $this->db->select('*');
        $this->db->from('lowongan');
        $this->db->where($data);
        $this->db->order_by('tgl_tutup', 'asc');
        $query = $this->db->get();

        return $query;
    }

    public function cari_lowongan($data) {
        $this -> db -> select('*');
        $this -> db -> from('lowongan');
        $judul = $data['judul'];
        $this -> db -> where("(status = 'dimoderasi' OR status = 'diajukan promosi' OR status = 'dipromosikan') AND judul LIKE '%$judul%'");
        $this -> db -> order_by('tgl_tutup', 'asc');
        $query = $this -> db -> get();

        return $query;
    }

    //tambahan
    public function cari_lowongan_lanjut($data) {
        $this -> db -> select('*');
        $this -> db -> from('lowongan');
        $this -> db -> where("(status = 'dimoderasi' OR status = 'diajukan promosi' OR status = 'dipromosikan') AND ".$data);
        $this -> db -> order_by('tgl_tutup', 'asc');
        $query = $this -> db -> get();

        return $query;
    }

    public function simpan_lowongan($data) {
        $query = $this->db->insert('lowongan', $data);

        return $query;
    }

    public function delete_lowongan($id_lowongan) {
        $this -> db -> where('id_lowongan', $id_lowongan);

        $query = $this -> db -> delete('lowongan');

        return $query;
    }

    public function update_lowongan($id_lowongan, $data) {
        $this -> db -> where('id_lowongan', $id_lowongan);
        
        $query = $this -> db -> update('lowongan', $data);
        
        return $query;
    }

}

/* End of file lowongan_model.php */
/* Location: ./application/models/lowongan_model.php */