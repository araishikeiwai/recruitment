<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cv extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p style="color:red">', '</p>');
        $this -> form_validation -> set_message('required', '%s harus diisi');
        $this -> form_validation -> set_message('integer', '%s harus berupa angka');

        $this->load->model('pengguna_model');
    }

    public function index($par = 0) {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else {
            if ($par == 0) {
                $data = array('query' => $this -> pengguna_model -> get_pengguna($this -> session -> userdata('username')));
                $this->load->view('cv_view', $data);
            } else {
                //$username = $this->input->post('username',true);
                //$data = array('query' => $this -> pengguna_model -> get_pengguna($username));
            }
        }
    }

    public function ubah() {
         if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else {
            $data = array('query' => $this -> pengguna_model -> get_pengguna($this -> session -> userdata('username')));
            $this->load->view('cv_ubah_view', $data);
        }
    }

    public function simpan() {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else {
            $this -> form_validation -> set_rules('alamat', 'Alamat', 'required');
            $this -> form_validation -> set_rules('tmpt_lahir', 'Tempat Lahir', 'required');
            $this -> form_validation -> set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
            $this -> form_validation -> set_rules('no_kontak', 'No Kontak', 'required');
            $this -> form_validation -> set_rules('kemampuan', 'Kemampuan', 'required');
            $this -> form_validation -> set_rules('prestasi', 'Prestasi', 'required');
            $this -> form_validation -> set_rules('edukasi', 'Riwayat Pendidikan', 'required');
            $this -> form_validation -> set_rules('pglm_panitia', 'Pengalaman Kepanitiaan', 'required');
            $this -> form_validation -> set_rules('pglm_kerja', 'Pengalaman Kerja', 'required');
            $this -> form_validation -> set_rules('pglm_organisasi', 'Pengalaman Organisasi', 'required');

            if ($this -> form_validation -> run() == FALSE) {
                $data = array('query' => $this -> pengguna_model -> get_pengguna($this -> session -> userdata('username')));
                $this -> load -> view('cv_ubah_view', $data);
            } else {
                $data = array();
                $data['alamat'] = $this -> input -> post('alamat');
                $data['tmpt_lahir'] = $this -> input -> post('tmpt_lahir');
                $data['tgl_lahir'] = $this -> input -> post('tgl_lahir');
                $data['no_kontak'] = $this -> input -> post('no_kontak');
                $data['agama'] = $this -> input -> post('agama');
                $data['kemampuan'] = $this -> input -> post('kemampuan');
                $data['prestasi'] = $this -> input -> post('prestasi');
                $data['edukasi'] = $this -> input -> post('edukasi');
                $data['pglm_panitia'] = $this -> input -> post('pglm_panitia');
                $data['pglm_kerja'] = $this -> input -> post('pglm_kerja');
                $data['pglm_organisasi'] = $this -> input -> post('pglm_organisasi');

                //var_dump($data);
                $this -> pengguna_model -> update_pengguna($data);
                redirect('cv');
            }
        }
    }

}

/* End of file cv.php */
/* Location: ./application/controllers/cv.php */