<!--    
- View - Header 0
-  
- Inisialisasi segala variabel yang akan dibutuhkan dalam pembuatan halaman
-
- @author Nur Ulul Asman, Ricky Arifandi Daniel
- @copyright recrUItment, 24-Apr-2013
- @version 1.1.0.2
-->
<?php
    if ($query == 'multiLihat') {
        $row['lowongan'] = $lowongan -> row_array();
        $row['wawancara'] = $wawancara -> result_array();
        $row['pendaftar'] = $pendaftar -> result_array();
    } else if ($query == 'hasil') {
        $row = $lowongan -> result_array();
    } else if ($query == 'pesan') {
        $row = $pesan -> result_array(); 
        $pengirim = $pengirim;
    } else if ($query == 'tulispesan') {
        $row['penerima'] = $penerima;
    } else if ($query == 'balaspesan') {
        $row['id_pesan'] = $id_pesan;
        $row['pengirim'] = $pengirim;
        $row['subject'] = $subject;
    } else if ($query == 'broadcast') {
        $row['id_lowongan'] = $id_lowongan;
    } else if ($query == 'review') {
        $row['username'] = $pengguna['username'];
        $row['nama'] = $pengguna['nama'];
        $row['id_lowongan'] = $lowongan['id_lowongan'];
    } else if ($query != '' && $query -> num_rows() > 0) {
        $row = $query -> row_array();
        if($row['status'] == 'seeker' || $row['status'] == 'provider' || $row['status'] == 'admin') {
            $review = $user_review -> result_array();
        }
    } else {
        $row['username'] = '';
        $row['nama'] = '';
        $row['status'] = '';
        $row['email'] = '';
        $row['foto'] = '';
        $row['fakultas'] = '';
        $row['role'] = '';
        $row['jenis_kelamin'] = '';
        $row['tmpt_lahir'] = '';
        $row['tgl_lahir'] = '';
        $row['no_kontak'] = '';
        $row['agama'] = '';
        $row['alamat'] = '';
        $row['kemampuan'] = '';
        $row['prestasi'] = '';
        $row['edukasi'] = '';
        $row['pglm_panitia'] = '';
        $row['pglm_kerja'] = '';
        $row['pglm_organisasi'] = '';

        $l = array('id_lowongan', 'judul', 'status', 'tipe', 'deskripsi', 'poster', 'tgl_tutup', 'nama_provider', 'wawancara');
        for ($i = 0; $i < 9; $i++) {
            $row[$l[$i]] = '';
        }
        $t = array('FK', 'FKG', 'FMIPA', 'FT', 'FH', 'FE', 'FIB', 'FPsi', 'FISIP', 'FKM', 'Fasilkom', 'FIK', 'FF', 'Pascasarjana', 'Vokasi', '2008', '2009', '2010', '2011', '2012', 'Alumni', 'Staf', 'Dosen', 'Islam', 'Kristen', 'Katolik', 'Buddha', 'Hindu', 'Konghucu', 'Lainnya', 'usia_min', 'usia_max', 'L', 'P');
        for ($i = 0; $i < 34; $i++) {
            $row['syarat_' . $t[$i]] = '';
        }


    }
?>

<!DOCTYPE html>
<html>
  <head>
