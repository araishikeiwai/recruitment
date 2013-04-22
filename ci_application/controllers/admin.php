<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('lowongan_model');
    }

    public function index() {
        
    }

    public function lihat_lowongan() {

    }

    public function moderasi() {
        $data = array('query' => 'hasil', 'lowongan' => $this -> lowongan_model -> get_lowongan_by_criteria(array('status' => 'belum dimoderasi')));
        $this -> load -> view('cari_view', $data);
    }

    public function moderasi_lowongan($id_lowongan) {
        $data = array('status' => 'dimoderasi');
        $this -> lowongan_model -> update_lowongan($id_lowongan, $data);
        redirect('admin/moderasi');
    }

    public function promosi() {

    }

    public function promosi_lowongan() {
        
    }

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */