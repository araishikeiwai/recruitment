<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller - Authentication
* 
* Mengkontrol keperluan autentikasi akun pengguna.
* Digunakan untuk keperluan autentikasi bagi admin, seeker, dan provider
*
* @author Ricky Arifandi Daniel
* @copyright recrUItment, 24-Apr-2013
* @version 1.2.0.0
* 
*/
class Authentication extends CI_Controller {

    /**
    * Mengkonstruksi controller dan me-load model pengguna_model
    */
    public function __construct() {
        parent::__construct();
        $this->load->model('pengguna_model');
        $this->load->model('ldap_model');
        $this->load->model('review_model');
        $this->load->model('pesan_model');
    }

    /**
    * Mengatur halaman mana yang akan ditampilkan, apakah halaman home (sudah login) atau 
    * halaman login (belum login)
    */
    public function index() {
        if (!$this->session->userdata('logged_in')) {
            $this->load->view('home_view', array('error_message' => 'none'));
        } else {
            $data = array('query' => $this -> pengguna_model -> get_pengguna($this -> session -> userdata('username')));
            $data['user_review'] = $this -> review_model -> get_review($this -> session -> userdata('username'));
            $this->load->view('main_view', $data);
        }
    }

    /**
    * Memulai session, jika pengguna yang masuk belum terdaftar, maka akan langsung dibuatkan
    * pengguna baru.
    */
    public function start_session() {
        $username = strtolower($this->input->post('username', true));
        $password = $this -> input -> post('password', true);
        
        if ($username != "") {
            if ($username == 'admin') {
                if ($password == 'fasilkommania') {
                    $query = $this -> pengguna_model -> get_pengguna($username);

                    $data = $query -> row_array();
                    $nama = $data['nama'];
                    $status = $data['status'];
                    $logged_in = TRUE;

                    $session_data = array(
                        'username' => $username,
                        'nama' => $nama,
                        'status' => $status,
                        'logged_in' => $logged_in
                    );

                    $this -> session -> set_userdata($session_data);
                    redirect('');
                } else {
                    $this -> load -> view('home_view', array('error_message' => 'password'));
                }
            } else {
                $ldap_result = $this -> ldap_model -> auth_ldap($username, $password);

                if ($ldap_result == 'error_username') {
                    $this -> load -> view('home_view', array('error_message' => 'username'));
                } else if ($ldap_result == 'error_password') {
                    $this -> load -> view('home_view', array('error_message' => 'password'));
                } else if ($ldap_result == 'error_gagal_konek') {
                    $this -> load -> view('home_view', array('error_message' => 'koneksi'));
                } else {
                    $logged_in = TRUE;

                    // check if the user already exists in pengguna table, if not, create that user
                    // and insert it to the pengguna table
                    $query = $this -> pengguna_model -> get_pengguna($username);
                    if ($query -> num_rows() == 0) {
                        $data = array(
                            'username' => $username,
                            'nama' => ucwords(strtolower($ldap_result['cn'][0])),
                            'email' => $ldap_result['mail'][0],
                        );
                        $query = $this -> pengguna_model -> create_pengguna($data);
                        $query = $this -> pengguna_model -> get_pengguna($username);

                        $pesan['pengirim'] = 'admin';
                        $pesan['penerima'] =  $username;
                        $pesan['subject'] = 'Selamat Datang di recrUItment';
                        $pesan['isi'] = 'Halo, ' . $data['nama'] . '!<br/><br/>Selamat datang di sistem informasi rekrutmen ini!<br/>Beberapa hal yang bisa Anda lakukan dalam sistem ini diantaranya:<ul><li><a href="' . base_url() . 'cari">Mencari lowongan yang telah dibuka</a></li><li>Mendaftar lowongan</li><li><a href="' . base_url() . 'profil/ubah">Membuka lowongan baru (harus mengupgrade status sebagai provider terlebih dahulu)</a></li><li>Mempromosikan lowongan yang Anda buka</li><li>Dan lain-lain</li></ul><br/>Selamat mengeksplorasi dan mempergunakan sistem ini. Semoga berguna :D<br/><br/>Tim Pengembang recrUItment';

                        $this -> pesan_model -> simpan_pesan($pesan);
                    }

                    $data = $query -> row_array();
                    $nama = $data['nama'];
                    $status = $data['status'];

                    $session_data = array(
                        'username' => $username,
                        'nama' => $nama,
                        'status' => $status,
                        'logged_in' => $logged_in
                    );

                    $this -> session -> set_userdata($session_data);
                    redirect('');
                }
            }
        } else {
            redirect('');
        }
    }

    /**
    * unused for this version
    */
    public function delete_session() {
        $this -> session -> sess_destroy();
        redirect('');
    }

}

/* End of file authentication.php */
/* Location: ./application/controllers/authentication.php */