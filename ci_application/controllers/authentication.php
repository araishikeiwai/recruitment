<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('pengguna_model');
    }

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            $this->load->view('home_view');
        } else {
            $data = array('query' => $this -> pengguna_model -> get_pengguna($this -> session -> userdata('username')));
            $this->load->view('main_view', $data);
        }
    }

    public function auth() {

    }

    public function start_session() {
        $username = strtolower($this->input->post('username', true));
        if ($username != "") {
            $logged_in = TRUE;

            // check if the user already exists in pengguna table, if not, create that user
            // and insert it to the pengguna table
            $query = $this -> pengguna_model -> get_pengguna($username);
            if ($query -> num_rows() == 0) {
                $query = $this -> pengguna_model -> create_pengguna($username);
                $query = $this -> pengguna_model -> get_pengguna($username);
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
        }
        redirect('');
    }

    public function delete_session() {
        $this -> session -> sess_destroy();
        redirect('');
    }

}

/* End of file authentication.php */
/* Location: ./application/controllers/authentication.php */