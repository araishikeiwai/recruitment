<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lowongan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p style="color:red">', '</p>');
        $this -> form_validation -> set_message('required', '%s harus diisi');
        $this -> form_validation -> set_message('integer', '%s harus berupa angka');

        $this->load->model('wawancara_model');
        $this->load->model('lowongan_model');
        $this->load->model('pendaftar_model');
        $this->load->model('review_model');
        $this->load->model('pengguna_model');
    }

    public function index() {
        redirect('cari');
    }

    public function lihat($id_lowongan) {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else{
            $lowongan = $this -> lowongan_model -> get_lowongan($id_lowongan);
            $wawancara = $this -> wawancara_model -> get_wawancara(array('id_lowongan' => $id_lowongan));
            $pendaftar = $this -> pendaftar_model -> get_pendaftar(array('id_lowongan' => $id_lowongan));

            $provider = $this -> pengguna_model -> get_pengguna($lowongan -> row() -> nama_provider);
            $provider = $provider -> row_array();

            $data = array('query' => 'multiLihat', 'lowongan' => $lowongan, 'wawancara' => $wawancara, 'pendaftar' => $pendaftar, 'provider' => $provider);
            $this -> load -> view('lowongan_view', $data);
        }
    }

    public function ajukan($par = '') {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else {
            if ($par == '') {
                $data = array('query' => '');
                $this -> load -> view('ajukan_judul_tipe_view', $data);
            } else if ($par == '1') {
                $this -> form_validation -> set_rules('judul', 'Judul', 'required|callback_cek_judul_unik');
                
                if ($this -> form_validation -> run() == FALSE) {
                    $data = array('query' => '');
                    $this -> load -> view('ajukan_judul_tipe_view', $data);
                } else {
                    $data['judul'] = $this -> input -> post('judul');
                    $data['tipe'] = $this -> input -> post('tipe');
                    $data['nama_provider'] = $this -> session -> userdata('username');
                
                    $this -> lowongan_model -> simpan_lowongan($data);
                    $id_lowongan = $this -> lowongan_model -> get_id_lowongan($data);

                    $data = array('query' => $this -> lowongan_model -> get_lowongan($id_lowongan));
                    $this -> load -> view('ajukan_deskripsi_view', $data);
                }
            } else if ($par == '2') {
                $this -> form_validation -> set_rules('deskripsi', 'Deskripsi', 'required');
                $this -> form_validation -> set_rules('fakultas[]', 'Fakultas', 'required');
                $this -> form_validation -> set_rules('role[]', 'Angkatan/Role', 'required');
                
                $this -> form_validation -> set_rules('usia_min', 'Usia Minimum', 'required|integer');
                $this -> form_validation -> set_rules('usia_max', 'Usia Maksimum', 'required|integer|callback_cek_usia');
                
                $this -> form_validation -> set_rules('jenis_kelamin[]', 'Jenis Kelamin', 'required');
                $this -> form_validation -> set_rules('agama[]', 'Agama', 'required');
                $this -> form_validation -> set_rules('tgl_tutup', 'Tanggal Akhir', 'required');
                $this -> form_validation -> set_rules('wawancara', 'Kebutuhan Wawancara', 'required');

                if ($this -> form_validation -> run() == FALSE) {
                    $id_lowongan = $this -> input -> post('id_lowongan');
                    $data = array('query' => $this -> lowongan_model -> get_lowongan($id_lowongan));
                    $this -> load -> view('ajukan_deskripsi_view', $data);
                } else {
                    $data = array();
                    $temp = $this -> input -> post('wawancara');
                    
                    $data['deskripsi'] = $this -> input -> post('deskripsi');
                    $data['poster'] = $this -> input -> post('poster');
                    
                    $temp = $this -> input -> post('fakultas');
                    $fakultas = array('FK', 'FKG', 'FMIPA', 'FT', 'FH', 'FE', 'FIB', 'FPsi', 'FISIP', 'FKM', 'Fasilkom', 'FIK', 'FF', 'Pascasarjana', 'Vokasi');
                    for ($i = 0; $i < count($temp); $i++) {
                        $data['syarat_' . $fakultas[$temp[$i]]] = true;
                    }
                    
                    $temp = $this -> input -> post('role');
                    $role = array('2008', '2009', '2010', '2011', '2012', 'Alumni', 'Staf', 'Dosen');
                    for ($i = 0; $i < count($temp); $i++) {
                        $data['syarat_' . $role[$temp[$i]]] = true;
                    }

                    $data['syarat_usia_min'] = $this -> input -> post('usia_min');
                    $data['syarat_usia_max'] = $this -> input -> post('usia_max');

                    $temp = $this -> input -> post('jenis_kelamin');
                    $jenis_kelamin = array('L', 'P');
                    for ($i = 0; $i < count($temp); $i++) {
                        $data['syarat_' . $jenis_kelamin[$temp[$i]]] = true;
                    }

                    $temp = $this -> input -> post('agama');
                    $agama = array('Islam', 'Kristen', 'Katolik', 'Buddha', 'Hindu', 'Konghucu', 'Lainnya');
                    for ($i = 0; $i < count($temp); $i++) {
                        $data['syarat_' . $agama[$temp[$i]]] = true;
                    }

                    $data['tgl_tutup'] = $this -> input -> post('tgl_tutup');
                    
                    $temp = $this -> input -> post('wawancara');
                    if ($temp == 'N') {
                        $data['wawancara'] = false;
                        $this -> lowongan_model -> update_lowongan($this -> input -> post('id_lowongan'), $data);

                        redirect('lowongan/lihat/' . $this -> input -> post('id_lowongan'));
                    } else if ($temp == 'Y') {
                        $data['wawancara'] = true;
                        $this -> lowongan_model -> update_lowongan($this -> input -> post('id_lowongan'), $data);

                        $data = array('query' => $this -> lowongan_model -> get_lowongan($this -> input -> post('id_lowongan')));
                        $this -> load -> view('ajukan_wawancara_view', $data);
                    }
                }
            } else if ($par == '3') {
                $data = array();
                $data['id_lowongan'] = $this -> input -> post('id_lowongan');
                $jml_wawancara = $this -> input -> post('jml_wawancara');
                
                for ($i = 0; $i < $jml_wawancara; $i++) {
                    $this -> form_validation -> set_rules('tanggal' . $i, 'Tanggal pada baris ke-' . ($i + 1), 'required');
                    $this -> form_validation -> set_rules('waktu' . $i, 'Waktu pada baris ke-' . ($i + 1), 'required');
                }

                if ($this -> form_validation -> run() == FALSE) {
                    $id_lowongan = $this -> input -> post('id_lowongan');
                    $data = array('query' => $this -> lowongan_model -> get_lowongan($id_lowongan));
                    $this -> load -> view('ajukan_wawancara_view', $data);
                } else {
                    for ($i = 0; $i < $jml_wawancara; $i++) {
                        $data['tanggal'] = $this -> input -> post('tanggal' . $i);
                        $data['waktu'] = $this -> input -> post('waktu' . $i);
                        
                        $this -> wawancara_model -> simpan_jadwal($data);
                    }
                    redirect('lowongan/lihat/' . $this -> input -> post('id_lowongan'));
                }
            }
        }
    }

    public function cek_judul_unik($judul) {
        $data['judul'] = $judul;

        $query = $this -> lowongan_model -> get_lowongan_by_criteria($data);

        if ($query -> num_rows() > 0) {
            $this -> form_validation -> set_message('cek_judul_unik', 'Judul sudah ada');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function cek_judul_unik_ubah($judul) {
        $data['judul'] = $judul;

        $query = $this -> lowongan_model -> get_lowongan_by_criteria($data);
        $lowongan = $query -> row_array();
        $id_lowongan = $this -> input -> post('id_lowongan');

        if ($query -> num_rows() > 0 && $id_lowongan != $lowongan['id_lowongan']) {
            $this -> form_validation -> set_message('cek_judul_unik', 'Judul sudah ada');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function cek_usia($usia) {
        $min = $this -> input -> post('usia_min');
        if ($usia < $min) {
            $this -> form_validation -> set_message('cek_usia', 'Batas usia min/max tidak valid');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function ubah($id_lowongan) {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else {
            $query = $this -> lowongan_model -> get_lowongan($id_lowongan);
            $lowongan = $query -> row_array();
            if ($this -> session -> userdata('username') == $lowongan['nama_provider']) {
                $this -> load -> view('lowongan_ubah_view', array('query' => $query));
            } else {
                redirect('lowongan/lihat/' . $id_lowongan);
            }
        }
    }

    public function daftar($id_lowongan) {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else {
            $username = $this -> session -> userdata('username');
            if ($this -> verifikasi_data($id_lowongan, $username)) {
                $data['id_lowongan'] = $id_lowongan;
                $data['username'] = $username;
                $this -> pendaftar_model -> tambah_pendaftar($data);

                $query = $this -> lowongan_model -> get_lowongan($id_lowongan);
                $lowongan = $query -> row_array();

                if ($lowongan['wawancara']) {
                    $lowongan = $this -> lowongan_model -> get_lowongan($id_lowongan);
                    $wawancara = $this -> wawancara_model -> get_wawancara(array('id_lowongan' => $id_lowongan));
                    $pendaftar = $this -> pendaftar_model -> get_pendaftar(array('id_lowongan' => $id_lowongan));

                    $data = array('query' => 'multiLihat', 'lowongan' => $lowongan, 'wawancara' => $wawancara, 'pendaftar' => $pendaftar);
                    $this -> load -> view('pilih_wawancara_view', $data);
                } else {                    
                    $this -> load -> view('lowongan_berhasil_view', array('query' => $query));
                }
            } else {
                $this -> load -> view('lowongan_gagal_view', array('query' => $this -> lowongan_model -> get_lowongan($id_lowongan)));
            }
        }
    }

    public function batal_daftar($id_lowongan) {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else {
            $data['id_lowongan'] = $id_lowongan;
            $data['username'] = $this -> session -> userdata('username');
            $this -> pendaftar_model -> hapus_pendaftar($data);

            $wawancara = $this -> wawancara_model -> get_wawancara(array('id_lowongan' => $id_lowongan));
            if ($wawancara -> num_rows() > 0) {
                $row = $wawancara -> result_array();
                for ($i = 0; $i < count($row); $i++) {
                    if ($row[$i]['peserta'] == $this -> session -> userdata('username')) {
                        $data_ubah['id_lowongan'] = $row[$i]['id_lowongan'];
                        $data_ubah['tanggal'] = $row[$i]['tanggal'];
                        $data_ubah['waktu'] = $row[$i]['waktu'];

                        $this -> wawancara_model -> reset_jadwal($data_ubah);
                        break;
                    }
                }
            }

            redirect('lowongan/lihat/' . $id_lowongan);
        }
    }

    public function simpan_jadwal($id_lowongan) {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else {
            $jadwal = $this -> input -> post('jadwal');

            $data['id_lowongan'] = $id_lowongan;
            $data['tanggal'] = substr($jadwal, 0, 10);
            $data['waktu'] = substr($jadwal, 11, 8);
            $peserta = $this -> session -> userdata('username');

            $this -> wawancara_model -> update_jadwal($data, $peserta);
            $this -> load -> view('lowongan_berhasil_view', array('query' => $this -> lowongan_model -> get_lowongan($id_lowongan)));
        }
    }

    public function ubah_wawancara($id_lowongan) {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else {
            $lowongan = $this -> lowongan_model -> get_lowongan($id_lowongan);
            $wawancara = $this -> wawancara_model -> get_wawancara(array('id_lowongan' => $id_lowongan));
            $pendaftar = $this -> pendaftar_model -> get_pendaftar(array('id_lowongan' => $id_lowongan));

            $row = $wawancara -> result_array();

            for ($i = 0; $i < count($row); $i++) {
                if ($row[$i]['peserta'] == $this -> session -> userdata('username')) {
                    $data['id_lowongan'] = $row[$i]['id_lowongan'];
                    $data['tanggal'] = $row[$i]['tanggal'];
                    $data['waktu'] = $row[$i]['waktu'];

                    $this -> wawancara_model -> reset_jadwal($data);
                    break;
                }
            }

            $data = array('query' => 'multiLihat', 'lowongan' => $lowongan, 'wawancara' => $wawancara, 'pendaftar' => $pendaftar);
            $this -> load -> view('pilih_wawancara_view', $data);
        }
    }

    public function verifikasi_data($id_lowongan, $username) {
        $lowongan = $this -> lowongan_model -> get_lowongan($id_lowongan);
        $pengguna = $this -> pengguna_model -> get_pengguna($username);

        $lowongan = $lowongan -> row_array();
        $pengguna = $pengguna -> row_array();

        $oke = TRUE;

        $oke = $oke && $pengguna['email'] != '';
        $oke = $oke && $pengguna['no_kontak'] != '';

        if (!$oke) return $oke;

        $oke = $oke && $lowongan['status'] != 'belum dimoderasi';
        $oke = $oke && $lowongan['tgl_tutup'] >= date("Y-m-d");
        $oke = $oke && $lowongan['nama_provider'] != $username;
        $oke = $oke && $lowongan['syarat_' . $pengguna['fakultas']] == '1';
        $oke = $oke && $lowongan['syarat_' . $pengguna['role']] == '1';
        $oke = $oke && $lowongan['syarat_' . $pengguna['jenis_kelamin']] == '1';
        $oke = $oke && $lowongan['syarat_' . $pengguna['agama']] == '1';

        $tgl_lahir_pengguna = new DateTime($pengguna['tgl_lahir']);
        $sekarang = new DateTime();
        $interval = $sekarang -> diff($tgl_lahir_pengguna);
        $usia_pengguna = $interval -> y;

        $oke = $oke && $lowongan['syarat_usia_min'] <= $usia_pengguna;
        $oke = $oke && $lowongan['syarat_usia_max'] >= $usia_pengguna;
        
        return $oke;
    }

    public function pendaftar($id_lowongan) {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else {
            $lowongan = $this -> lowongan_model -> get_lowongan($id_lowongan);
            $lowongan = $lowongan -> row_array();
            
            if ($lowongan['nama_provider'] == $this -> session -> userdata('username')) {
                $lowongan = $this -> lowongan_model -> get_lowongan($id_lowongan);
                $wawancara = $this -> wawancara_model -> get_wawancara(array('id_lowongan' => $id_lowongan));
                $pendaftar = $this -> pendaftar_model -> get_pendaftar(array('id_lowongan' => $id_lowongan));

                $data = array('query' => 'multiLihat', 'lowongan' => $lowongan, 'wawancara' => $wawancara, 'pendaftar' => $pendaftar);

                $this -> load -> view('list_pendaftar_view', $data);
            } else {
                redirect('lowongan/lihat/' . $id_lowongan);
            }
        }
    }

    public function ubah_pendaftar() {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else {
            $id_lowongan = $this -> input -> post('id_lowongan');
            $lowongan = $this -> lowongan_model -> get_lowongan($id_lowongan);
            $lowongan = $lowongan -> row_array();
            
            if ($lowongan['nama_provider'] == $this -> session -> userdata('username')) {
                $list_status = $this -> input -> post('pendaftar');
                $list_username = $this -> input -> post('helper_username');

                for ($i = 0; $i < count($list_status); $i++) {
                    $this -> pendaftar_model -> ubah_status_pendaftar($id_lowongan, $list_username[$i], $list_status[$i]);
                }
                redirect('lowongan/lihat/' . $id_lowongan);
            } else {
                redirect('lowongan/lihat/' . $id_lowongan);
            }
        }
    }

    public function simpan_lowongan() {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else {
            $query = $this -> lowongan_model -> get_lowongan($this -> input -> post('id_lowongan'));
            $lowongan = $query -> row_array();
            if ($this -> session -> userdata('username') == $lowongan['nama_provider']) {
                $this -> form_validation -> set_rules('judul', 'Judul', 'required|callback_cek_judul_unik_ubah');
                $this -> form_validation -> set_rules('deskripsi', 'Deskripsi', 'required');
                $this -> form_validation -> set_rules('fakultas[]', 'Fakultas', 'required');
                $this -> form_validation -> set_rules('role[]', 'Angkatan/Role', 'required');
                
                $this -> form_validation -> set_rules('usia_min', 'Usia Minimum', 'required|integer');
                $this -> form_validation -> set_rules('usia_max', 'Usia Maksimum', 'required|integer|callback_cek_usia');
                
                $this -> form_validation -> set_rules('jenis_kelamin[]', 'Jenis Kelamin', 'required');
                $this -> form_validation -> set_rules('agama[]', 'Agama', 'required');
                $this -> form_validation -> set_rules('tgl_tutup', 'Tanggal Akhir', 'required');

                if ($this -> form_validation -> run() == FALSE) {
                    $id_lowongan = $this -> input -> post('id_lowongan');
                    $data = array('query' => $this -> lowongan_model -> get_lowongan($id_lowongan));
                    $this -> load -> view('lowongan_ubah_view', $data);
                } else {
                    $data = array();

                    $data['judul'] = $this -> input -> post('judul');
                    $data['tipe'] = $this -> input -> post('tipe');
                    
                    $data['deskripsi'] = $this -> input -> post('deskripsi');
                    $data['poster'] = $this -> input -> post('poster');
                    
                    $temp = $this -> input -> post('fakultas');
                    $fakultas = array('FK', 'FKG', 'FMIPA', 'FT', 'FH', 'FE', 'FIB', 'FPsi', 'FISIP', 'FKM', 'Fasilkom', 'FIK', 'FF', 'Pascasarjana', 'Vokasi');
                    for ($i = 0; $i < count($fakultas); $i++) {
                        $data['syarat_' . $fakultas[$i]] = false;
                    }
                    for ($i = 0; $i < count($temp); $i++) {
                        $data['syarat_' . $fakultas[$temp[$i]]] = true;
                    }
                    
                    $temp = $this -> input -> post('role');
                    $role = array('2008', '2009', '2010', '2011', '2012', 'Alumni', 'Staf', 'Dosen');
                    for ($i = 0; $i < count($role); $i++) {
                        $data['syarat_' . $role[$i]] = false;
                    }
                    for ($i = 0; $i < count($temp); $i++) {
                        $data['syarat_' . $role[$temp[$i]]] = true;
                    }

                    $data['syarat_usia_min'] = $this -> input -> post('usia_min');
                    $data['syarat_usia_max'] = $this -> input -> post('usia_max');

                    $temp = $this -> input -> post('jenis_kelamin');
                    $jenis_kelamin = array('L', 'P');
                    for ($i = 0; $i < count($jenis_kelamin); $i++) {
                        $data['syarat_' . $jenis_kelamin[$i]] = false;
                    }
                    for ($i = 0; $i < count($temp); $i++) {
                        $data['syarat_' . $jenis_kelamin[$temp[$i]]] = true;
                    }

                    $temp = $this -> input -> post('agama');
                    $agama = array('Islam', 'Kristen', 'Katolik', 'Buddha', 'Hindu', 'Konghucu', 'Lainnya');
                    for ($i = 0; $i < count($agama); $i++) {
                        $data['syarat_' . $agama[$i]] = false;
                    }
                    for ($i = 0; $i < count($temp); $i++) {
                        $data['syarat_' . $agama[$temp[$i]]] = true;
                    }

                    $data['tgl_tutup'] = $this -> input -> post('tgl_tutup');
                    
                    $data['status'] = 'belum dimoderasi';

                    $this -> lowongan_model -> update_lowongan($this -> input -> post('id_lowongan'), $data);
                    
                    redirect('lowongan/lihat/' . $this -> input -> post('id_lowongan'));
                }
            } else {
                redirect('lowongan/lihat/' . $id_lowongan);
            }
        }
    }

    public function batal($id_lowongan) {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else {
            $lowongan = $this -> lowongan_model -> get_lowongan($id_lowongan);
            $lowongan = $lowongan -> row_array();
            if ($this -> session -> userdata('username') == $lowongan['nama_provider']) {
                if ($lowongan['tgl_tutup'] == '0000-00-00' || $lowongan['tgl_tutup'] >= date("Y-m-d")) {
                    $this -> lowongan_model -> delete_lowongan($id_lowongan);
                }
            }
            redirect('profil');
        }
    }

    public function lihat_cv($id_lowongan, $username) {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else {
            $lowongan = $this -> lowongan_model -> get_lowongan($id_lowongan);
            $lowongan = $lowongan -> row_array();
            if ($this -> session -> userdata('username') == $lowongan['nama_provider']) {
                $pendaftar = $this -> pendaftar_model -> get_pendaftar(array('id_lowongan' => $id_lowongan));
                $pendaftar = $pendaftar -> result_array();

                $ada = FALSE;
                for ($i = 0; $i < count($pendaftar); $i++) {
                    if ($pendaftar[$i]['username'] == $username) {
                        $ada = TRUE;
                        break;
                    }
                }

                $data = array('query' => $this -> pengguna_model -> get_pengguna($username));
                if ($ada) {
                    $this -> load -> view('cv_view', $data);
                } else {
                    $this -> load -> view('main_view', $data);
                }
            } else {
                redirect('');
            }
        }
    }

    public function beri_review() {
        
    }

}

/* End of file lowongan.php */
/* Location: ./application/controllers/lowongan.php */