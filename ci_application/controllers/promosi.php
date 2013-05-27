<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Controller - Promosi
* 
* Menghandle segala keperluan yang berhubungan dengan promosi lowongan
* unused in this version
*
* @author Ricky Arifandi Daniel
* @copyright recrUItment, 24-Apr-2013
* @version 1.1.0.0
* 
*/
class Promosi extends CI_Controller {

    /**
    * ...
    */
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this -> form_validation -> set_error_delimiters('<p style="color:red">', '</p>');
        $this -> form_validation -> set_message('required', '%s harus diisi');
        $this -> form_validation -> set_message('numeric', 'Format %s salah');

        $this -> load -> model('lowongan_model');
        $this -> load -> model('promosi_model');
    }

	/**
	* unused in this version
	*/
    public function index() {
        if (!$this -> session -> userdata('logged_in')) {
            redirect('');
        } else {

        }
    }

    /**
	* unused in this version
	*/
    public function ajukan($id_lowongan, $par = '', $paket = '') {
        if (!$this -> session -> userdata('logged_in')) {
            redirect('');
        } else {
            $lowongan = $this -> lowongan_model -> get_lowongan($id_lowongan);
            $lowongan = $lowongan -> row_array();

            if ($this -> session -> userdata('username') == $lowongan['nama_provider']) {
                if ($par == '') {
                    $data['status'] = 'dipromosikan';
                    $lowongan = $this -> lowongan_model -> get_lowongan_by_criteria($data);
                    $jumlah_promosi = $lowongan -> num_rows();
                    $data['status'] = 'diajukan promosi';
                    $lowongan = $this -> lowongan_model -> get_lowongan_by_criteria($data);
                    $jumlah_promosi = $jumlah_promosi + $lowongan -> num_rows();

                    if ($jumlah_promosi == 5) {
                        $this -> load -> view('lowongan_gagal_view', array('query' => '', 'id_lowongan' => $id_lowongan, 'error_message' => 'promosi_full'));
                    } else {
                        $this -> load -> view('promosi_paket_view', array('query' => 'paket', 'paket' => $this -> promosi_model -> get_paket_promosi(), 'id_lowongan' => $id_lowongan));
                    }
                } else if ($par == '1') {
                    $this -> load -> view('promosi_summary_view', array('query' => 'paket', 'paket' => $this -> promosi_model -> get_paket_promosi(), 'id_lowongan' => $id_lowongan, 'id_promosi' => $paket, 'rekening' => $this -> promosi_model -> get_rekening() -> result_array()));
                } else if ($par == '2') {
                    $data['status'] = 'diajukan promosi';
                    $this -> lowongan_model -> update_lowongan($id_lowongan, $data);
                    $data['id_lowongan'] = $id_lowongan;
                    $data['id_promosi'] = $paket;
                    $this -> promosi_model -> tambah_promosi($data);
                    redirect('lowongan/lihat/' . $id_lowongan);
                }
            } else {
                redirect('');
            }
        }
    }

    /**
	* unused in this version
	*/
    public function verifikasi($id_lowongan) {
        if (!$this -> session -> userdata('logged_in')) {
            redirect('');
        } else {
            $lowongan = $this -> lowongan_model -> get_lowongan($id_lowongan);
            $lowongan = $lowongan -> row_array();

            if ($this -> session -> userdata('username') == $lowongan['nama_provider']) {
                $promosi = $this -> promosi_model -> get_promosi($id_lowongan);
                $promosi = $promosi -> row_array();
                $rekening = $this -> promosi_model -> get_rekening();
                $rekening = $rekening -> result_array();
                $this -> load -> view('promosi_verifikasi_view', array('query' => '', 'promosi' => $promosi, 'rekening' => $rekening));
            } else {
                redirect('');
            }
        }
    }

    public function simpan_verifikasi() {
        if (!$this -> session -> userdata('logged_in')) {
            redirect('');
        } else {
            $id_lowongan = $this -> input -> post('id_lowongan');
            $lowongan = $this -> lowongan_model -> get_lowongan($id_lowongan);
            $lowongan = $lowongan -> row_array();

            if ($this -> session -> userdata('username') == $lowongan['nama_provider']) {
                $this -> form_validation -> set_rules('asal_bank', 'Bank Asal', 'required');
                $this -> form_validation -> set_rules('asal_rekening', 'No Rekening Asal', 'required|numeric');
                $this -> form_validation -> set_rules('asal_nama', 'Nama Pemilik Rekening', 'required');

                if ($this -> form_validation -> run() == FALSE) {
                    $this -> verifikasi($id_lowongan);
                } else {
                    $data['id_lowongan'] = $id_lowongan;
                    $data['id_rekening'] = $this -> input -> post('id_rekening');
                    $data['asal_bank'] = $this -> input -> post('asal_bank');
                    $data['asal_rekening'] = $this -> input -> post('asal_rekening');
                    $data['asal_nama'] = $this -> input -> post('asal_nama');

                    $this -> promosi_model -> simpan_pembayaran($data);

                    $low['status'] = 'diajukan verifikasi';
                    $this -> lowongan_model -> update_lowongan($id_lowongan, $low);
                    $this -> promosi_model -> update_promosi($id_lowongan, $low);

                    redirect('lowongan/lihat/' . $id_lowongan);
                }
            } else {
                redirect('');
            }
        }
    }

    public function batal_ajukan($id_lowongan) {
        if (!$this -> session -> userdata('logged_in')) {
            redirect('');
        } else {
            $lowongan = $this -> lowongan_model -> get_lowongan($id_lowongan);
            $lowongan = $lowongan -> row_array();

            if ($this -> session -> userdata('username') == $lowongan['nama_provider']) {
                $data['status'] = 'dimoderasi';
                $this -> lowongan_model -> update_lowongan($id_lowongan, $data);
                $this -> promosi_model -> hapus_promosi($id_lowongan);
                redirect('lowongan/lihat/' . $id_lowongan);
            } else {
                redirect('');
            }
        }
    }

}

/* End of file promosi.php */
/* Location: ./application/controllers/promosi.php */