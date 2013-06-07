<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Model - Promosi
* 
* Melakukan akses database atas data-data yang berhubungan dengan promosi lowongan
*
* @author Ricky Arifandi Daniel, Ahmad Faruq Waqfi
* @copyright recrUItment, 7-Jun-2013
* @version 1.3.0.0
* 
*/
class promosi_model extends CI_Model {

    /**
    * Me-retrieve paket promosi
    *
    * @return table seluruh paket promosi
    */
    public function get_paket_promosi() {
        $this -> db -> select('*');
        $this -> db -> from('promosi_paket');
        $query = $this -> db -> get();

        return $query;
    }

    /**
    * Me-retrieve promosi dengna id tertentu
    *
    * @param int $id_lowongan id lowongan terkait
    * @return table promosi dengan id terkait
    */
    public function get_promosi($id_lowongan) {
        $this -> db -> select('*');
        $this -> db -> from('lowongan_promosi');
        $this -> db -> where('lowongan_promosi.id_lowongan', $id_lowongan);
        $this -> db -> join('lowongan', 'lowongan_promosi.id_lowongan = lowongan.id_lowongan', 'left');
        $this -> db -> join('promosi_paket', 'lowongan_promosi.id_promosi = promosi_paket.id_promosi', 'left');
        $query = $this -> db -> get();

        return $query;
    }

    /**
    * Me-retrieve seluruh promosi
    *
    * @return table seluruh promosi
    */
    public function get_semua_promosi() {
        $this -> db -> select('*');
        $this -> db -> from('lowongan_promosi');
        $this -> db -> join('lowongan', 'lowongan_promosi.id_lowongan = lowongan.id_lowongan', 'left');
        $this -> db -> join('promosi_paket', 'lowongan_promosi.id_promosi = promosi_paket.id_promosi', 'left');
        $query = $this -> db -> get();

        return $query;   
    }

    /**
    * Menyimpan promosi
    *
    * @param string $data data terkait promosi yang akan disimpan
    */
    public function tambah_promosi($data) {
        $query = $this -> db -> insert('lowongan_promosi', $data);

        return $query;
    }

    /**
    * Menghapus promosi
    *
    * @param int $id_lowongan id lowongan yang akan dihapus promosinya
    */
    public function hapus_promosi($id_lowongan) {
        $this -> db -> where('id_lowongan', $id_lowongan);
        $query = $this -> db -> delete('lowongan_promosi');

        return $query;
    }

    /**
    * Meng-update promosi
    *
    * @param int $id_lowongan id lowongan yang akan dihapus promosinya
    * @param string $data data terkait update promosi
    */
    public function update_promosi($id_lowongan, $data) {
        $this -> db -> where('id_lowongan', $id_lowongan);
        
        $query = $this -> db -> update('lowongan_promosi', $data);
        
        return $query;
    }

    /**
    * Me-retrieve data pembayaran promosi
    *
    * @param int $id_lowongan id lowongan yang akan dihapus promosinya
    * @return data pembayaran promosi lowongan tertentu
    */
    public function get_pembayaran($id_lowongan) {
        $this -> db -> select('*');
        $this -> db -> from('pembayaran');
        $this -> db -> where('id_lowongan', $id_lowongan);
        $this -> db -> join('rekening', 'pembayaran.id_rekening = rekening.id_rekening', 'left');
        $query = $this -> db -> get();

        return $query;
    }

    /**
    * Meng-update data pembayaran promosi suatu lowongan
    *
    * @param int $id_lowongan id lowongan yang akan dihapus promosinya
    * @param string $data data terkait update pembayaran
    */
    public function update_pembayaran($id_lowongan, $data) {
        $this -> db -> where('id_lowongan', $id_lowongan);
        
        $query = $this -> db -> update('pembayaran', $data);
        
        return $query;
    }

    /**
    * Menyimpan suatu pembayaran promosi
    *
    * @param string $data data terkait penyimpanan pembayaran
    */
    public function simpan_pembayaran($data) {
        $query = $this -> db -> insert('pembayaran', $data);

        return $query;
    }

    /**
    * Me-retrieve seluruh rekening dari database
    *
    * @return table seluruh rekening
    */
    public function get_rekening() {
        $this -> db -> select('*');
        $this -> db -> from('rekening');
        $query = $this -> db -> get();

        return $query;
    }

}

/* End of file promosi_model.php */
/* Location: ./application/models/promosi_model.php */