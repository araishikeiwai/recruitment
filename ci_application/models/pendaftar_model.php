<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Model - Pendaftar
* 
* Melakukan akses database atas data-data yang berhubungan dengan pendaftar lowongan
*
* @author Ricky Arifandi Daniel
* @copyright recrUItment, 24-Apr-2013
* @version 1.1.0.2
* 
*/
class Pendaftar_model extends CI_Model {

    /**
    * Me-retrieve seluruh pendaftar suatu lowongan
    *
    * @param string $data kriteria pencarian pada query
    * @return table seluruh pengguna yang memenuhi kriteria query
    */
    public function get_pendaftar($data) {
        $this->db->select('*');
        $this->db->from('pendaftar');
        $this->db->join('pengguna', 'pendaftar.username = pengguna.username', 'inner');
        $this->db->where($data);

        $query = $this->db->get();

        return $query;
    }
    
    /**
    * Me-nambah pendaftar baru pada suatu lowongan
    *
    * @param string $data kriteria pencarian pada query
    */
    public function tambah_pendaftar($data) {
        $query = $this -> db -> insert('pendaftar', $data);

        return $query;
    }

    /**
    * Menghapus pendaftar pada suatu lowongan
    *
    * @param string $data kriteria penghapusan pada query
    */
    public function hapus_pendaftar($data) {
        $query = $this -> db -> delete('pendaftar', $data);

        return $query;
    }

    /**
    * Mengupdate status pendaftaran suatu pengguna pada database
    *
    * @param integer $id_lowongan nomor identitas lowongan sesuai database
    * @param string $username username suatu pengguna
    * @param string $status status pendaftaran pengguna
    */
    public function ubah_status_pendaftar($id_lowongan, $username, $status) {
        $this -> db -> where('id_lowongan', $id_lowongan);
        $this -> db -> where('username', $username);

        $query = $this -> db -> update('pendaftar', array('status_pendaftaran' => $status));
    }

}

/* End of file pendaftar_model.php */
/* Location: ./application/models/pendaftar_model.php */