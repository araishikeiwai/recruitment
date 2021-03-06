<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller - Lowongan
* 
* Menghandle segala keperluan yang berhubungan dengan lowongan, baik lihat lowongan, ajukan lowongan,
* hapus lowongan, lihat pendaftar, dan lain-lain.
* Digunakan untuk keperluan yang berhubungan dengan lowongan bagi seeker dan provider
*
* @author Ricky Arifandi Daniel, Erryan Sazany
* @copyright recrUItment, 24-Apr-2013
* @version 1.1.0.2
* 
* ================================ UPDATE ================================
*
* Menambah function untuk fitur review dan history lowongan
*
* @author Ricky Arifandi Daniel, Erryan Sazany, Ahmad Faruq Waqfi
* @copyright recrUItment, 7-Jun-2013
* @version 1.3.0.0
*/
class Lowongan extends CI_Controller {

    /**
    * Mengkonstruksi controller dan melakukan pengaturan validasi, lalu me-load model untuk
    * wawancara, lowongan, pendaftar, review, dan pengguna.
    */
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
        $this->load->model('promosi_model');
    }

    /**
    * Mengalihkan halaman menuju halaman pencarian lowongan
    */
    public function index() {
        redirect('cari');
    }

    /**
    * Mengambil data-data terkait lowongan yang akan dilihat oleh admin, seeker, atau provider dari
    * database melalui model, lalu meneruskan data-data tersebut ke halaman lowongan_view sebagai
    * halaman deskripsi lowongan
    *
    * @param integer $id_lowongan nomor identitas lowongan sesuai database
    */
    public function lihat($id_lowongan) {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else{
            $lowongan = $this -> lowongan_model -> get_lowongan($id_lowongan);

            if ($lowongan -> num_rows() > 0) {
                $wawancara = $this -> wawancara_model -> get_wawancara(array('id_lowongan' => $id_lowongan));
                $pendaftar = $this -> pendaftar_model -> get_pendaftar(array('id_lowongan' => $id_lowongan));

                $provider = $this -> pengguna_model -> get_pengguna($lowongan -> row() -> nama_provider);
                $provider = $provider -> row_array();

                $data = array('query' => 'multiLihat', 'lowongan' => $lowongan, 'wawancara' => $wawancara, 'pendaftar' => $pendaftar, 'provider' => $provider);

                $pembayaran = $this -> promosi_model -> get_pembayaran($id_lowongan);
                if ($pembayaran -> num_rows() > 0) {
                    $data['pembayaran'] = $pembayaran -> row_array();
                }

                $this -> load -> view('lowongan_view', $data);
            } else {
                $this -> load -> view('404_view');
            }
        }
    }

    /**
    * Mengkontrol proses pengajuan suatu lowongan oleh provider. Dibagi ke dalam 3 tahap antara lain:
    * 1. Pengisian judul dan tipe lowongan (langsung disimpan)
    * 2. Pengisian deskripsi dan persyaratan lowongan
    * 3. Pengisian slot jadwal wawancara - opsional
    *
    * @param char $par penentu branch yang diambil sesuai tahapan pengajuan yang sedang dijalani
    */
    public function ajukan($par = '') {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else {
            if ($par == '') {
                // me-load halaman pengisian judul dan tipe lowongan
                $data = array('query' => '');
                $this -> load -> view('ajukan_judul_tipe_view', $data);
            } else if ($par == '1') {
                // melakukan validasi judul dan tipe, jika lolos maka simpan lowongan, lalu
                // load halaman pengisian deskripsi dan persyaratan lowongan
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
                // mengecek isian deskripsi dan persyaratan, lalu me-load halaman pengisian 
                // jadwal wawancara jika dibutuhkan
                $this -> form_validation -> set_rules('deskripsi', 'Deskripsi', 'required');
                $this -> form_validation -> set_rules('fakultas[]', 'Fakultas', 'required');
                $this -> form_validation -> set_rules('role[]', 'Role/Angkatan', 'required');
                
                $this -> form_validation -> set_rules('usia_min', 'Usia Minimum', 'required|integer');
                $this -> form_validation -> set_rules('usia_max', 'Usia Maksimum', 'required|integer|callback_cek_usia');
                
                $this -> form_validation -> set_rules('jenis_kelamin[]', 'Jenis Kelamin', 'required');
                $this -> form_validation -> set_rules('agama[]', 'Agama', 'required');
                $this -> form_validation -> set_rules('tgl_tutup', 'Tanggal Akhir', 'required');
                $this -> form_validation -> set_rules('wawancara', 'Kebutuhan Wawancara', 'required');

                $config = array(
                    'upload_path' => './images/poster/',
                    'allowed_types' => 'jpg',
                    'file_name' => $this -> input -> post('id_lowongan') . '.jpg',
                    'max_width' => '800',
                    'overwrite' => TRUE,
                    'remove_spaces' => FALSE
                );
                $this -> load -> library('upload', $config);
                $this -> upload -> initialize($config);
                
                $data = array();
                if ($this -> upload -> do_upload('poster')) {
                    $data['poster'] = TRUE;
                }

                if ($this -> form_validation -> run() == FALSE) {
                    $id_lowongan = $this -> input -> post('id_lowongan');
                    $data = array('query' => $this -> lowongan_model -> get_lowongan($id_lowongan));
                    $this -> load -> view('ajukan_deskripsi_view', $data);
                } else {
                    $temp = $this -> input -> post('wawancara');
                    
                    $data['deskripsi'] = $this -> input -> post('deskripsi');
                    $data['poster'] = $this -> input -> post('poster');
                    $data['syarat'] = '';
                    
                    $temp = $this -> input -> post('fakultas');
                    for ($i = 0; $i < count($temp); $i++) {
                        $data['syarat'] = $data['syarat'] . get_fakultas($temp[$i]) . ' ';
                    }
                    
                    $temp = $this -> input -> post('role');
                    for ($i = 0; $i < count($temp); $i++) {
                        $data['syarat'] = $data['syarat'] . get_role($temp[$i]) . ' ';
                    }

                    $data['syarat_usia_min'] = $this -> input -> post('usia_min');
                    $data['syarat_usia_max'] = $this -> input -> post('usia_max');

                    $temp = $this -> input -> post('jenis_kelamin');
                    for ($i = 0; $i < count($temp); $i++) {
                        $data['syarat'] = $data['syarat'] . get_jenis_kelamin($temp[$i]) . ' ';
                    }

                    $temp = $this -> input -> post('agama');
                    for ($i = 0; $i < count($temp); $i++) {
                        $data['syarat'] = $data['syarat'] . get_agama($temp[$i]) . ' ';
                    }

                    $data['tgl_tutup'] = $this -> input -> post('tgl_tutup');
                    
                    $temp = $this -> input -> post('wawancara');
                    if ($temp == 'N') {
                        $data['wawancara'] = 0;
                        $this -> lowongan_model -> update_lowongan($this -> input -> post('id_lowongan'), $data);

                        redirect('lowongan/lihat/' . $this -> input -> post('id_lowongan'));
                    } else if ($temp == 'Y') {
                        $data['wawancara'] = 1;
                        $this -> lowongan_model -> update_lowongan($this -> input -> post('id_lowongan'), $data);

                        $data = array('query' => $this -> lowongan_model -> get_lowongan($this -> input -> post('id_lowongan')), 'jml_wawancara' => 1);
                        $this -> load -> view('ajukan_wawancara_view', $data);
                    }
                }
            } else if ($par == '3') {
                // menyimpan slot jadwal wawancara yang dimasukkan ke database
                $data = array();
                $data['id_lowongan'] = $this -> input -> post('id_lowongan');
                $jml_wawancara = $this -> input -> post('jml_wawancara');
                $tgl = $this -> input -> post('tanggal');
                $wkt = $this -> input -> post('waktu');

                //$update['wawancara'] = $this -> lowongan_model -> get_lowongan($data['id_lowongan']) -> row() -> wawancara;
                $update['wawancara'] = 0;
                
                for ($i = 0; $i < $jml_wawancara; $i++) {
                    if ($tgl[$i] != '' && $wkt[$i] != '') {
                        $data['tanggal'] = $tgl[$i];
                        $data['waktu'] = $wkt[$i];

                        $dupl = false;

                        for ($j = 0; $j < $i && ! $dupl; $j++) {
                            if ($tgl[$i] == $tgl[$j] && $wkt[$i] == $wkt[$j]) {
                                $dupl = true;
                            }
                        }

                        if (!$dupl) {
                            $update['wawancara'] = $update['wawancara'] + 1;
                            $dupl = $this -> wawancara_model -> simpan_jadwal($data);
                        }
                    }
                }

                $this -> lowongan_model -> update_lowongan($this -> input -> post('id_lowongan'), $update);
                redirect('lowongan/lihat/' . $data['id_lowongan']);
            }
        }
    }

    public function ubah_wawancara_provider($id_lowongan) {
        $jml_wawancara = $this -> lowongan_model -> get_lowongan($id_lowongan) -> row() -> wawancara;
        $wawancara = $this -> wawancara_model -> get_wawancara(array('id_lowongan' => $id_lowongan));

        $this -> wawancara_model -> hapus_jadwal(array('id_lowongan' => $id_lowongan));

        $data = array('query' => $this -> lowongan_model -> get_lowongan($id_lowongan), 'jml_wawancara' => $jml_wawancara, 'wawancara' => $wawancara -> result_array());
        $this -> load -> view('ajukan_wawancara_view', $data);
    }

    /**
    * Melakukan validasi persyaratan judul lowongan
    * 
    * @param string $judul judul lowongan yang dimasukkan
    * @return boolean TRUE judul tidak duplikat, FALSE jika judul duplikat
    */
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

    /**
    * Melakukan validasi persyaratan judul lowongan setelah terdeteksi duplikat
    * 
    * @param string $judul judul lowongan yang dimasukkan
    * @return boolean TRUE judul tidak duplikat, FALSE jika judul duplikat
    */
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

    /**
    * Melakukan validasi persyaratan usia
    * 
    * @param integer $usia batas usia yang dimasukkan
    * @return boolean TRUE usia valid, FALSE jika usia tidak valid
    */
    public function cek_usia($usia) {
        $min = $this -> input -> post('usia_min');
        if ($usia < $min) {
            $this -> form_validation -> set_message('cek_usia', 'Batas usia min/max tidak valid');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /**
    * Me-load halaman pengubahan lowongan
    * 
    * @param integer $id_lowongan nomor identitas lowongan sesuai database
    */
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

    /**
    * Mengkontrol proses pendaftaran pengguna pada lowongan tertentu
    * 
    * @param integer $id_lowongan nomor identitas lowongan sesuai database
    */
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

                if ($lowongan['wawancara'] > 0) {
                    $lowongan = $this -> lowongan_model -> get_lowongan($id_lowongan);
                    $wawancara = $this -> wawancara_model -> get_wawancara(array('id_lowongan' => $id_lowongan));
                    $pendaftar = $this -> pendaftar_model -> get_pendaftar(array('id_lowongan' => $id_lowongan));

                    $data = array('query' => 'multiLihat', 'lowongan' => $lowongan, 'wawancara' => $wawancara, 'pendaftar' => $pendaftar);
                    $this -> load -> view('pilih_wawancara_view', $data);
                } else {                    
                    $this -> load -> view('lowongan_berhasil_view', array('query' => $query));
                }
            } else {
                $this -> load -> view('lowongan_gagal_view', array('query' => $this -> lowongan_model -> get_lowongan($id_lowongan), 'error_message' => ''));
            }
        }
    }

    /**
    * Mengkontrol proses pembatalan pendaftaran pengguna pada lowongan tertentu
    * 
    * @param integer $id_lowongan nomor identitas lowongan sesuai database
    */
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

    /**
    * Menyimpan pilihan tanggal dan waktu wawancara suatu pengguna
    * 
    * @param integer $id_lowongan nomor identitas lowongan sesuai database
    */
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

    /**
    * Mengkontrol proses pengubahan pilihan tanggal dan waktu wawancara suatu pengguna
    * 
    * @param integer $id_lowongan nomor identitas lowongan sesuai database
    */
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

    /**
    * Mengkontrol proses verifikasi data pengguna terhadap persyaratan lowongan
    * 
    * @param integer $id_lowongan nomor identitas lowongan sesuai database
    * @param string $username username pengguna
    * @return boolean TRUE jika data pengguna memenuhi seluruh persyaratan lowongan, FALSE jika tidak
    */
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

        $oke = $oke && is_syarat($pengguna['fakultas'], $lowongan['syarat']);
        $oke = $oke && is_syarat($pengguna['role'], $lowongan['syarat']);
        $oke = $oke && is_syarat($pengguna['jenis_kelamin'], $lowongan['syarat']);
        $oke = $oke && is_syarat($pengguna['agama'], $lowongan['syarat']);

        $tgl_lahir_pengguna = new DateTime($pengguna['tgl_lahir']);
        $sekarang = new DateTime();
        $interval = $sekarang -> diff($tgl_lahir_pengguna);
        $usia_pengguna = $interval -> y;

        $oke = $oke && $lowongan['syarat_usia_min'] <= $usia_pengguna;
        $oke = $oke && $lowongan['syarat_usia_max'] >= $usia_pengguna;
        
        return $oke;
    }

    /**
    * Mengambil pengguna-pengguna yang terdaftar di suatu lowongan dan me-load view list pendaftar lowongan
    * 
    * @param integer $id_lowongan nomor identitas lowongan sesuai database
    */
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
                $review = $this -> review_model -> get_review_by_lowongan($id_lowongan);

                $data = array('query' => 'multiLihat', 'lowongan' => $lowongan, 'wawancara' => $wawancara, 'pendaftar' => $pendaftar, 'review' => $review -> result_array());

                $this -> load -> view('list_pendaftar_view', $data);
            } else {
                redirect('lowongan/lihat/' . $id_lowongan);
            }
        }
    }

    /**
    * Mengkontrol pengubahan status pendaftar (melamar/diterima/ditolak)
    */
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

    /**
    * Mengkontrol penyimpanan data-data lowongan tertentu yang diajukan/diubah
    */
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
                $this -> form_validation -> set_rules('role[]', 'Role/Angkatan', 'required');
                
                $this -> form_validation -> set_rules('usia_min', 'Usia Minimum', 'required|integer');
                $this -> form_validation -> set_rules('usia_max', 'Usia Maksimum', 'required|integer|callback_cek_usia');
                
                $this -> form_validation -> set_rules('jenis_kelamin[]', 'Jenis Kelamin', 'required');
                $this -> form_validation -> set_rules('agama[]', 'Agama', 'required');
                $this -> form_validation -> set_rules('tgl_tutup', 'Tanggal Akhir', 'required');

                $config = array(
                    'upload_path' => './images/poster/',
                    'allowed_types' => 'jpg',
                    'file_name' => $this -> input -> post('id_lowongan') . '.jpg',
                    'max_width' => '800',
                    'overwrite' => TRUE,
                    'remove_spaces' => FALSE
                );
                $this -> load -> library('upload', $config);
                $this -> upload -> initialize($config);
                
                $data = array();
                if ($this -> upload -> do_upload('poster')) {
                    $data['poster'] = TRUE;
                }

                if ($this -> form_validation -> run() == FALSE) {
                    $id_lowongan = $this -> input -> post('id_lowongan');
                    $data = array('query' => $this -> lowongan_model -> get_lowongan($id_lowongan));
                    $this -> load -> view('lowongan_ubah_view', $data);
                } else {
                    $data['judul'] = $this -> input -> post('judul');
                    $data['tipe'] = $this -> input -> post('tipe');
                    
                    $data['deskripsi'] = $this -> input -> post('deskripsi');
                    $data['syarat'] = '';
                    
                    $temp = $this -> input -> post('fakultas');
                    for ($i = 0; $i < count($temp); $i++) {
                        $data['syarat'] = $data['syarat'] . get_fakultas($temp[$i]) . ' ';
                    }
                    
                    $temp = $this -> input -> post('role');
                    for ($i = 0; $i < count($temp); $i++) {
                        $data['syarat'] = $data['syarat'] . get_role($temp[$i]) . ' ';
                    }

                    $data['syarat_usia_min'] = $this -> input -> post('usia_min');
                    $data['syarat_usia_max'] = $this -> input -> post('usia_max');

                    $temp = $this -> input -> post('jenis_kelamin');
                    for ($i = 0; $i < count($temp); $i++) {
                        $data['syarat'] = $data['syarat'] . get_jenis_kelamin($temp[$i]) . ' ';
                    }

                    $temp = $this -> input -> post('agama');
                    for ($i = 0; $i < count($temp); $i++) {
                        $data['syarat'] = $data['syarat'] . get_agama($temp[$i]) . ' ';
                    }

                    $data['tgl_tutup'] = $this -> input -> post('tgl_tutup');

                    $data['status'] = 'belum dimoderasi';

                    $this -> lowongan_model -> update_lowongan($this -> input -> post('id_lowongan'), $data);

                    $this -> promosi_model -> hapus_promosi($this -> input -> post('id_lowongan'));
                    
                    redirect('lowongan/lihat/' . $this -> input -> post('id_lowongan'));
                }
            } else {
                redirect('lowongan/lihat/' . $id_lowongan);
            }
        }
    }

    /**
    * Mengkontrol pembatalan pengajuan suatu lowongan
    *
    * @param integer $id_lowongan nomor identitas lowongan sesuai database
    */
    public function batal($id_lowongan) {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else {
            $lowongan = $this -> lowongan_model -> get_lowongan($id_lowongan);
            $lowongan = $lowongan -> row_array();
            if ($this -> session -> userdata('username') == $lowongan['nama_provider']) {
                if ($lowongan['tgl_tutup'] == '0000-00-00' || $lowongan['tgl_tutup'] >= date("Y-m-d")) {
                    $pendaftar = $this -> pendaftar_model -> get_pendaftar(array('id_lowongan' => $id_lowongan));
                    if ($pendaftar -> num_rows() > 0) {
                        $this -> load -> view('lowongan_gagal_view', array('query' => '', 'error_message' => 'batal_pendaftar'));
                    } else {
                        $this -> lowongan_model -> delete_lowongan($id_lowongan);
                        redirect('');
                    }
                }
            } else {
                redirect('');
            }
        }
    }

    /**
    * Mekanisme sistem agar provider dapat melihat isian cv salah satu pendaftar pada lowongan yang ia buka
    *
    * @param integer $id_lowongan nomor identitas lowongan sesuai database
    * @param string $username username suatu pengguna
    */
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

                $data = array('query' => $this -> pengguna_model -> get_pengguna($username), 'user_review' => $this -> review_model -> get_review($username));
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

    /**
    * Menampilkan halaman untuk pemberian review
    *
    * @param integer $id_lowongan nomor identitas lowongan sesuai database
    * @param string $username username suatu pengguna
    */
    public function beri_review($id_lowongan, $username) {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else {
            $lowongan = $this -> lowongan_model -> get_lowongan($id_lowongan);
            $pengguna = $this -> pengguna_model -> get_pengguna($username);
            $lowongan = $lowongan -> row_array();
            $pengguna = $pengguna -> row_array();

            $data = array('query' => 'review', 'pengguna' => $pengguna, 'lowongan' => $lowongan);
            $this -> load -> view('review_beri_view', $data);
        }
    }

    /**
    * Melakukan penyimpanan suatu review
    *
    */
    public function simpan_review() {
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else {
            $data['id_lowongan'] = $this -> input -> post('id_lowongan');
            $data['username'] = $this -> input -> post('penerima');
            $data['nilai'] = $this -> input -> post('nilai');
            $data['nilai'] = $data['nilai'] + 1;
            $data['isi'] = $this -> input -> post('isi');
            $this -> review_model -> simpan_review($data);

            redirect('lowongan/pendaftar/' . $data['id_lowongan']);
        }

    }

    /**
    * Menampilkan halaman history lowongan yang pernah dibuka
    */
    public function history_provider(){
        if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else{
            $criteria['nama_provider'] = $this -> session -> userdata('username');
            $data = array('query' => 'hasil', 'lowongan' => $this -> lowongan_model -> get_lowongan_by_criteria($criteria), 'sepo' => 'provider');
            $this -> load -> view('lowongan_history_view', $data);
        }
    }

    /**
    * Menampilkan halaman history lowongan yang didaftar
    */
    public function history_seeker() {
           if (!$this->session->userdata('logged_in')) {
            redirect('');
        } else{
            $criteria['username'] = $this -> session -> userdata('username');
            $data = array('query' => 'hasil', 'lowongan' => $this -> pendaftar_model -> get_pendaftar_history($criteria), 'sepo' => 'seeker');
            $this -> load -> view('lowongan_history_view', $data);
        }   
    }

}

/* End of file lowongan.php */
/* Location: ./application/controllers/lowongan.php */