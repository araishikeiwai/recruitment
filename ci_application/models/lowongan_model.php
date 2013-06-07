<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Model - Lowongan
* 
* Melakukan akses database atas data-data yang berhubungan dengan lowongan
*
* @author Ricky Arifandi Daniel
* @copyright recrUItment, 24-Apr-2013
* @version 1.1.0.2
*
* ================================ UPDATE ================================
*
* Merapikan kode
*
* @author Ricky Arifandi Daniel
* @copyright recrUItment, 7-Jun-2013
* @version 1.3.0.0
* 
*/
class Lowongan_model extends CI_Model {

    /**
    * Me-retrieve lowongan dengan ID tertentu
    *
    * @param integer $id_lowongan nomor identitas lowongan sesuai database
    * @return table lowongan yang memenuhi kriteria pencarian
    */
    public function get_lowongan($id_lowongan) {
        $this->db->select('*');
        $this->db->from('lowongan');
        $this->db->where('id_lowongan', $id_lowongan);
        $query = $this->db->get();

        return $query;
    }

    /**
    * Me-retrieve ID lowongan yang memenuhi kriteria pencarian
    *
    * @param string $data kriteria pencarian
    * @return table ID lowongan yang memenuhi kriteria pencarian
    */
    public function get_id_lowongan($data) {
        $this->db->select('*');
        $this->db->from('lowongan');
        $this->db->where($data);
        $query = $this->db->get();

        $t = $query -> row_array();
        return $t['id_lowongan'];
    }

    /**
    * Me-retrieve seluruh lowongan yang memenuhi kriteria pencarian
    *
    * @param string $data kriteria pencarian
    * @return table lowongan yang memenuhi kriteria pencarian
    */
    public function get_lowongan_by_criteria($data) {
        $this->db->select('*');
        $this->db->from('lowongan');
        $this->db->where($data);
        $this->db->order_by('tgl_tutup', 'asc');
        $query = $this->db->get();

        return $query;
    }

    /**
    * Me-retrieve lowongan yang telah dimoderasi dan judulnya memiliki kemiripan dengan suatu string
    *
    * @param string $data kriteria pencarian
    * @return table lowongan yang memenuhi kriteria pencarian
    */
    public function cari_lowongan($data) {
        $this -> db -> select('*');
        $this -> db -> from('lowongan');
        $judul = $data['judul'];
        $this -> db -> where("(status = 'dimoderasi' OR status = 'diajukan promosi' OR status = 'dipromosikan') AND judul LIKE '%$judul%'");
        $this -> db -> order_by('tgl_tutup', 'asc');
        $query = $this -> db -> get();

        return $query;
    }

    /**
    * Me-retrieve lowongan sesuai kriteria pencarian lanjut
    *
    * @param string $data kriteria pencarian
    * @return table lowongan yang memenuhi kriteria pencarian
    */
    public function cari_lowongan_lanjut($data) {
        $this -> db -> select('*');
        $this -> db -> from('lowongan');
        $this -> db -> where("(status = 'dimoderasi' OR status = 'diajukan promosi' OR status = 'dipromosikan') AND ".$data);
        $this -> db -> order_by('tgl_tutup', 'asc');
        $query = $this -> db -> get();

        return $query;
    }

    /**
    * Menyimpan data terkait lowongan tertentu pada database
    *
    * @param string $data data terkait lowongan
    */
    public function simpan_lowongan($data) {
        $query = $this->db->insert('lowongan', $data);

        return $query;
    }

    /**
    * Menghapus suatu lowongan dari database
    *
    * @param integer $id_lowongan nomor identitas lowongan sesuai database
    */
    public function delete_lowongan($id_lowongan) {
        $this -> db -> where('id_lowongan', $id_lowongan);

        $query = $this -> db -> delete('lowongan');

        return $query;
    }

    /**
    * Mengupdate data terkait suatu lowongan
    *
    * @param integer $id_lowongan nomor identitas lowongan sesuai database
    * @param string $data query terkait perubahan data lowongan
    */
    public function update_lowongan($id_lowongan, $data) {
        $this -> db -> where('id_lowongan', $id_lowongan);
        
        $query = $this -> db -> update('lowongan', $data);
        
        return $query;
    }

}

/* End of file lowongan_model.php */
/* Location: ./application/models/lowongan_model.php */