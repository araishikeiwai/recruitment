<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cari extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p style="color:red">', '</p>');
        $this -> form_validation -> set_message('integer', '%s harus berupa angka');

        $this->load->model('lowongan_model');
    }

    public function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else{
            $this -> load -> view('Cari_utama_view', array('query' => ''));
        }
    }

    public function cari_lanjut() {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else{
            $data = array('query' => '');
            $this -> load -> view('cari_lanjut_view', $data);
        }
    }

    //tambahan
    public function cari_lanjut_hasil() {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else{
            $this -> form_validation -> set_rules('usia_min', 'Usia Minimum', 'integer');
            $this -> form_validation -> set_rules('usia_max', 'Usia Maksimum', 'integer|callback_cek_usia');
            
            if ($this -> form_validation -> run() == FALSE) {
                $data = array('query' => '');
                $this -> load -> view('cari_lanjut_view', $data);
            } else {
                $criteria = "judul LIKE '%".$this -> input -> post('judul_lowongan')."%'";
            
                $temp = $this -> input -> post('tipe_lowongan');
                if ($temp != null) {
                    $tipe_lowongan = array('Kepanitiaan', 'Organisasi', 'Riset', 'Asisten Dosen', 'Lainnya');
                    if(count($temp) > 1) {
                        $criteria = $criteria." AND  (tipe = '".$tipe_lowongan[$temp[0]]."'";
                        for ($i = 0; $i < count($temp)-2; $i++) {
                            $criteria = $criteria." OR  tipe = '".$tipe_lowongan[$temp[$i]]."'";
                        } 
                        $criteria = $criteria." OR  tipe = '".$tipe_lowongan[$temp[count($temp)-1]]."')";
                    }
                    else {
                        $criteria = $criteria." AND  tipe = '".$tipe_lowongan[$temp[0]]."'";
                    }
                }

                $temp = $this -> input -> post('fakultas');
                if ($temp != null) {
                    $fakultas = array('FK', 'FKG', 'FMIPA', 'FT', 'FH', 'FE', 'FIB', 'FPsi', 'FISIP', 'FKM', 'Fasilkom', 'FIK', 'FF', 'Pascasarjana', 'Vokasi');
                    for ($i = 0; $i < count($temp); $i++) {
                        $criteria = $criteria." AND  syarat_".$fakultas[$temp[$i]]." = '1'";
                    } 
                }
                
                $temp = $this -> input -> post('role');
                if ($temp != null) {
                    $role = array('2008', '2009', '2010', '2011', '2012', 'Alumni', 'Staf', 'Dosen');
                    for ($i = 0; $i < count($temp); $i++) {
                        $criteria = $criteria." AND  syarat_".$role[$temp[$i]]." = '1'";
                    }
                }
                
                $temp = $this -> input -> post('jenis_kelamin');
                if ($temp != null) {
                    $jenis_kelamin = array('L', 'P');
                    for ($i = 0; $i < count($temp); $i++) {
                        $criteria = $criteria." AND  syarat_".$jenis_kelamin[$temp[$i]]." = '1'";
                    }
                }

                $temp = $this -> input -> post('agama');
                if ($temp != null) {
                    $agama = array('Islam', 'Kristen', 'Katolik', 'Buddha', 'Hindu', 'Konghucu', 'Lainnya');
                    for ($i = 0; $i < count($temp); $i++) {
                        $criteria = $criteria." AND  syarat_".$agama[$temp[$i]]." = '1'";
                    }
                }

                $temp = $this -> input -> post('usia_min');
                if ($temp != null) {
                    $criteria = $criteria." AND  syarat_usia_min <= '".$temp."'";
                }

                $temp = $this -> input -> post('usia_max');
                if ($temp != null) {
                    $criteria = $criteria." AND  syarat_usia_max >= '".$temp."'";
                }
                
                //echo "".$criteria;
                $data = array('query' => 'hasil', 'lowongan' => $this -> lowongan_model -> cari_lowongan_lanjut($criteria));
                $this -> load -> view('cari_view', $data);
            }
        }
    }

    public function cek_usia($usia) {
        $min = $this -> input -> post('usia_min');
        if ($min != '' && $usia != '') {
            if ($usia < $min) {
                $this -> form_validation -> set_message('cek_usia', 'Batas usia min/max tidak valid');
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }

    //tambahan
    public function cari_lanjut_batal() {
        redirect('cari');
    }

    public function cari_hasil() {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else{
            $criteria['judul'] = $this -> input -> post('judul');
            $data = array('query' => 'hasil', 'lowongan' => $this -> lowongan_model -> cari_lowongan($criteria));
            $this -> load -> view('cari_view', $data);
        }
    }

    public function semua() {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else{
            $data = 'status = "dimoderasi" OR status = "diajukan promosi" OR status = "dipromosikan"';
            $data = array('query' => 'hasil', 'lowongan' => $this -> lowongan_model -> get_lowongan_by_criteria($data));
            $this -> load -> view('cari_view', $data);
        }
    }

}

/* End of file cari.php */
/* Location: ./application/controllers/cari.php */