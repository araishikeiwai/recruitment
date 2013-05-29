<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller - Profil
* 
* Menghandle segala keperluan yang berhubungan dengan profil pengguna
* Digunakan untuk keperluan melihat dan mengubah profil
*
* @author Ricky Arifandi Daniel
* @copyright recrUItment, 24-Apr-2013
* @version 1.1.0.2
* 
*/
class Profil extends CI_Controller {

    /**
    * Mengkonstruksi controller dan melakukan pengaturan validasi, lalu me-load model untuk pengguna.
    */
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p style="color:red">', '</p>');
        $this -> form_validation -> set_message('required', '%s harus diisi');
        $this -> form_validation -> set_message('integer', '%s harus berupa angka');
        $this -> form_validation -> set_message('valid_email', '%s tidak valid');

        $this->load->model('pengguna_model');
        $this->load->model('review_model');

        $config = array(
            'upload_path' => base_url() . 'images/avatar',
            'allowed_types' => 'jpg|jpeg|png',
            'overwrite' => TRUE,
            'max_size' => '500',
            'encrypt_name' => TRUE,
            'remove_spaces' => TRUE
        );
        $this -> load -> library('upload', $config);
    }

    /**
    * Mengalihkan halaman menuju halaman utama (halaman profil pengguna)
    */
    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else {
            $data = array('query' => $this -> pengguna_model -> get_pengguna($this -> session -> userdata('username')));
            $data['user_review'] = $this -> review_model -> get_review($this -> session -> userdata('username'));
            $this->load->view('main_view', $data);
        }
    }

    /**
    * Mengalihkan halaman menuju halaman profil
    *
    * @param  string $username username pengguna tertentu
    */
    public function lihat($username = '') {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else {
            if ($username == '') {
                redirect('profil');
            }
            $data = array('query' => $this -> pengguna_model -> get_pengguna($username));
            if ($data['query'] -> num_rows() > 0) {
                $data['user_review'] = $this -> review_model -> get_review($username);
                $this->load->view('main_view', $data);   
            } else {
                $this->load->view('404_view');
            }
        }
    }

    /**
    * Me-load view ubah profil sebagai halaman pengubahan profil
    */
    public function ubah() {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else {
            $data = array('query' => $this -> pengguna_model -> get_pengguna($this -> session -> userdata('username')));
            $data['user_review'] = $this -> review_model -> get_review($this -> session -> userdata('username'));
            $this->load->view('profil_ubah_view', $data);
        }
    }

    /**
    * Melakukan penyimpanan data profil ke database melalui model
    */
    public function simpan($par = 0) {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else {
            $this -> form_validation -> set_rules('email', 'Email', 'required|valid_email');

            $config = array(
                'upload_path' => './images/avatar/',
                'allowed_types' => 'jpg',
                'file_name' => $this -> session -> userdata('username') . '.jpg',
                'overwrite' => TRUE,
                'remove_spaces' => FALSE
            );
            $this -> load -> library('upload', $config);
            $this -> upload -> initialize($config);
            
            $data = array();
            if ($this -> upload -> do_upload('foto')) {
                $data['foto'] = TRUE;
            }
            
            if ($this -> form_validation -> run() == FALSE) {
                $data = array('query' => $this -> pengguna_model -> get_pengguna($this -> session -> userdata('username')));
                $data['user_review'] = $this -> review_model -> get_review($this -> session -> userdata('username'));
                $this -> load -> view('profil_ubah_view', $data);
            } else {
                $data['status'] = $this -> input -> post('status');
                $data['jenis_kelamin'] = $this -> input -> post('jenis_kelamin');
                $data['email'] = $this -> input -> post('email');
                $data['role'] = $this -> input -> post('role');
                $data['fakultas'] = $this -> input -> post('fakultas');

                //var_dump($data);
                $this -> pengguna_model -> update_pengguna($data);
                $session_data = array('status' => $data['status']);
                $this -> session -> set_userdata($session_data);
                redirect('profil');
            }
        }
    }

}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */