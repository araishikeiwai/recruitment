<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller - Cari
* 
* Mengkontrol proses pencarian terhadap suatu lowongan
* Digunakan untuk keperluan pencarian lowongan bagi seeker dan provider
*
* @author Ricky Arifandi Daniel, Erryan Sazany
* @copyright recrUItment, 24-Apr-2013
* @version 1.1.0.2
* 
* ================================ UPDATE ================================
*
* Merapikan kode
*
* @author Ricky Arifandi Daniel, Erryan Sazany
* @copyright recrUItment, 7-Jun-2013
* @version 1.3.0.0
*/
class Cari extends CI_Controller {

    /**
    * Mengkonstruksi controller dan melakukan pengaturan  validasi, lalu me-load lowongan_model
    */
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p style="color:red">', '</p>');
        $this -> form_validation -> set_message('integer', '%s harus berupa angka');

        $this->load->model('lowongan_model');
    }

    /**
    * Me-load view cari_utama_view sebagai halaman pencarian utama
    */
    public function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else{
            $this -> load -> view('cari_utama_view', array('query' => ''));
        }
    }

    /**
    * Me-load view cari_lanjut_view sebagai halaman untuk pencarian lanjutan
    */
    public function cari_lanjut() {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else{
            $data = array('query' => '');
            $this -> load -> view('cari_lanjut_view', $data);
        }
    }

    /**
    * Mengkonstruksi query kriteria lanjutan untuk klausa 'WHERE', mengirimkannya kepada model untuk di-retrieve dari
    * database menuju controller ini kembali, dan meneruskan data hasil query pencarian tersebut pada view
    * cari_view sebagai halaman hasil pencarian lowongan.
    */
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
                    for ($i = 0; $i < count($temp); $i++) {
                        $criteria = $criteria . " AND syarat LIKE '%" . get_fakultas($temp[$i]) . "%'";
                    } 
                }
                
                $temp = $this -> input -> post('role');
                if ($temp != null) {
                    for ($i = 0; $i < count($temp); $i++) {
                        $criteria = $criteria . " AND syarat LIKE '%" . get_role($temp[$i]) . "%'";
                    }
                }
                
                $temp = $this -> input -> post('jenis_kelamin');
                if ($temp != null) {
                    for ($i = 0; $i < count($temp); $i++) {
                        $criteria = $criteria . " AND syarat LIKE '%" . get_jenis_kelamin($temp[$i]) . "%'";
                    }
                }

                $temp = $this -> input -> post('agama');
                if ($temp != null) {
                    for ($i = 0; $i < count($temp); $i++) {
                        $criteria = $criteria . " AND syarat LIKE '%" . get_agama($temp[$i]) . "%'";
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

    /**
    * Melakukan validasi kriteria pencarian menurut usia, dengan melakukan pengecekan pada isian 
    * textbox usia.
    * 
    * @param integer $usia isian pada textbox usia
    * @return boolean TRUE jika isian valid, FALSE jika tidak valid
    */
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

    /**
    * Melakukan redirect ke halaman pencarian utama karena batal melakukan pencarian lanjutan
    */
    public function cari_lanjut_batal() {
        redirect('cari');
    }

    /**
    * Mengkonstruksi query kriteria untuk pencarian biasa untuk dimasukkan pada klausa 'WHERE', mengirimkannya
    * kepada model untuk di-retrieve dari database menuju controller ini kembali, dan meneruskan data hasil 
    * query pencarian tersebut pada view cari_view sebagai halaman hasil pencarian lowongan.
    */
    public function cari_hasil() {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else{
            $criteria['judul'] = $this -> input -> post('judul');
            $data = array('query' => 'hasil', 'lowongan' => $this -> lowongan_model -> cari_lowongan($criteria));
            $this -> load -> view('cari_view', $data);
        }
    }

    /**
    * Mengkonstruksi query kriteria untuk pencarian semua lowongan yang telah dimoderasi untuk dimasukkan pada
    * klausa 'WHERE', mengirimkannya kepada model untuk di-retrieve dari database menuju controller ini kembali, 
    * dan meneruskan data hasil query pencarian tersebut pada view cari_view sebagai halaman hasil pencarian lowongan.
    */
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