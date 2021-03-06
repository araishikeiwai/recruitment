<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller - Pesan
* 
* Menghandle segala keperluan yang berhubungan dengan pesan dan notifikasi
* unused in this version
*
* @author Ricky Arifandi Daniel
* @copyright recrUItment, 24-Apr-2013
* @version 1.1.0.0
* 
* ================================ UPDATE ================================
*
* Menambah function untuk segala keperluan mengenai pesan dan notifikasi
*
* @author Ricky Arifandi Daniel, Erryan Sazany
* @copyright recrUItment, 7-Jun-2013
* @version 1.3.0.0
*/
class Pesan extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('pesan_model');
        $this->load->model('pengguna_model');
    }

    /**
    * unused in this version
    */
    public function index()
    {
        
    }

    /**
    * Membuka halaman berisi isi suatu pesan dan menandainya dengan "read" jika belum pernah dibuka sebelumnya
    *
    * @param string @id_pesan id pesan terkait
    */
    public function lihat($id_pesan) {
        $data = array('query' => 'pesan', 'pesan' => $this -> pesan_model -> get_pesan_by_id($id_pesan));
        $data['pengirim'] = '';

        $pesan = $data['pesan'] -> row_array();

        if ($pesan['penerima'] == $this -> session -> userdata('username')) {
            $update['status'] = 'read';
            $this -> pesan_model -> update_status_pesan($id_pesan, $update);
        }

        $this -> load -> view("pesan_lihat_view", $data);
    }

    /**
    *  Membuka halaman berisi daftar pesan
    */
    public function daftar_pesan() {
        $data = array('query' => 'pesan', 'pesan' => $this -> pesan_model -> get_pesan_by_penerima($this -> session -> userdata('username')));

        if ($data['pesan'] -> num_rows() == 0) {
            $this -> load -> view('pesan_daftar_view', $data);
        } else {
            $pesan = $data['pesan'] -> result_array();
            
            for($i = 0; $i < count($pesan); $i++) {
                $data['pengirim'][$i] = $this -> pengguna_model -> get_pengguna($pesan[$i]['pengirim']);
            }

            $this -> load -> view("pesan_daftar_view", $data);
        }
    }

    /**
    * Membuka halaman untuk menuliskan dan mengirim pesan
    *
    * @param string @id_penerima username penerima pesan
    */
    public function tulis($id_penerima) {
        $data = array('query' => 'tulispesan', 'penerima' => $id_penerima);


        $this -> load -> view("pesan_tulis_view", $data);
    }

    /**
    * Membuka halaman untuk membalas pesan
    *
    * @param string @id_pengirim username pengirim pesan
    * @param string @id_pesan id pesan terkait
    */
    public function balas($id_pengirim, $id_pesan) {
        $data = array('query' => 'balaspesan', 'pengirim' => $id_pengirim, 'id_pesan' => $id_pesan);
        $pesan = $this-> pesan_model -> get_pesan_by_id($id_pesan);
        $pesan = $pesan->result_array();
        $data['subject'] = $pesan[0]['subject'];
        $data['isi_pesan'] = $pesan[0]['isi'];

        if (substr($data['subject'], 0, 4) != 'Re: ') {
            $data['subject'] = 'Re: ' . $data['subject'];
        }

        $data['isi_pesan'] = '<br/><br/><i>quoting from ' . $id_pengirim . ':</i><br/><blockquote>' . $data['isi_pesan'] . '</blockquote>';

        $this -> load -> view("pesan_balas_view", $data);
    }

    /**
    * Melakukan pengiriman pesan
    */
    public function kirim() {
        $data = array();
        $data['pengirim'] = $this -> input -> post('pengirim');
        $data['penerima'] = $this -> input -> post('penerima');
        $data['subject'] = $this -> input -> post('subject');
        $data['isi'] = $this -> input -> post('isi');

        $id_pesan = $this -> pesan_model -> simpan_pesan($data);

        redirect('pesan/lihat/' . $id_pesan);
    }

    /**
    * Membuka halaman untuk mengirim pesan secara broadcast
    *
    * @param string $id_lowongan id lowongan terkait
    */
    public function broadcast($id_lowongan) {
        
        $data = array('query' => 'broadcast', 'id_lowongan' => $id_lowongan);
        $this -> load -> view("broadcast_view", $data);
    }

    /**
    * Mengirimkan pesan broadcast ke seluruh pendaftar lowongan
    */
    public function kirim_broadcast() {
        $data = array();
        $data['id_lowongan'] = $this -> input -> post('id_lowongan');
        $data['pengirim'] = $this -> input -> post('pengirim');
        $data['subject'] = $this -> input -> post('subject');
        $data['isi'] = $this -> input -> post('isi');

        $data['isi'] = $data['isi'] . '<br/><br/><i>Ini adalah pesan broadcast dari lowongan <a target="_blank" href="' . base_url() . 'lowongan/lihat/' . $data['id_lowongan'] . '">ini</a>.<br/>';

        // echo 'id_lowongan : '. $data['id_lowongan']. '<br/>';
        // echo 'pengirim : '. $data['pengirim']. '<br/>';
        // echo 'subject : ' . $data['subject'] . '<br />';
        // echo 'isi : ' . $data['isi'] . '<br />';
        $id_pesan = $this -> pesan_model -> simpan_pesan_broadcast($data);

        redirect('lowongan/lihat/' . $data['id_lowongan']);
    }
}

/* End of file pesan.php */
/* Location: ./application/controllers/pesan.php */