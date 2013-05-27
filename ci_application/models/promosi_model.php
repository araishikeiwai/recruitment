<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class promosi_model extends CI_Model {

    public function get_paket_promosi() {
        $this -> db -> select('*');
        $this -> db -> from('promosi_paket');
        $query = $this -> db -> get();

        return $query;
    }

    public function get_promosi($id_lowongan) {
        $this -> db -> select('*');
        $this -> db -> from('lowongan_promosi');
        $this -> db -> where('lowongan_promosi.id_lowongan', $id_lowongan);
        $this -> db -> join('lowongan', 'lowongan_promosi.id_lowongan = lowongan.id_lowongan', 'left');
        $this -> db -> join('promosi_paket', 'lowongan_promosi.id_promosi = promosi_paket.id_promosi', 'left');
        $query = $this -> db -> get();

        return $query;
    }

    public function get_semua_promosi() {
        $this -> db -> select('*');
        $this -> db -> from('lowongan_promosi');
        $this -> db -> join('lowongan', 'lowongan_promosi.id_lowongan = lowongan.id_lowongan', 'left');
        $this -> db -> join('promosi_paket', 'lowongan_promosi.id_promosi = promosi_paket.id_promosi', 'left');
        $query = $this -> db -> get();

        return $query;   
    }

    public function tambah_promosi($data) {
        $query = $this -> db -> insert('lowongan_promosi', $data);

        return $query;
    }

    public function hapus_promosi($id_lowongan) {
        $this -> db -> where('id_lowongan', $id_lowongan);
        $query = $this -> db -> delete('lowongan_promosi');

        return $query;
    }

    public function update_promosi($id_lowongan, $data) {
        $this -> db -> where('id_lowongan', $id_lowongan);
        
        $query = $this -> db -> update('lowongan_promosi', $data);
        
        return $query;
    }

    public function get_pembayaran($id_lowongan) {
        $this -> db -> select('*');
        $this -> db -> from('pembayaran');
        $this -> db -> where('id_lowongan', $id_lowongan);
        $this -> db -> join('rekening', 'pembayaran.id_rekening = rekening.id_rekening', 'left');
        $query = $this -> db -> get();

        return $query;
    }

    public function update_pembayaran($id_lowongan, $data) {
        $this -> db -> where('id_lowongan', $id_lowongan);
        
        $query = $this -> db -> update('pembayaran', $data);
        
        return $query;
    }

    public function simpan_pembayaran($data) {
        $query = $this -> db -> insert('pembayaran', $data);

        return $query;
    }

    public function get_rekening() {
        $this -> db -> select('*');
        $this -> db -> from('rekening');
        $query = $this -> db -> get();

        return $query;
    }

}

/* End of file promosi_model.php */
/* Location: ./application/models/promosi_model.php */