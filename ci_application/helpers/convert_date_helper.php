<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('convert_date')) {
    function convert_date($date = '') {
        $y = substr($date, 0, 4);
        $m = substr($date, 5, 2);
        $d = substr($date, 8, 2);

        if ($m == "01") {
            $m = "Januari";
        } else if ($m == "02") {
            $m = "Februari";
        } else if ($m == "03") {
            $m = "Maret";
        } else if ($m == "04") {
            $m = "April";
        } else if ($m == "05") {
            $m = "Mei";
        } else if ($m == "06") {
            $m = "Juni";
        } else if ($m == "07") {
            $m = "Juli";
        } else if ($m == "08") {
            $m = "Agustus";
        } else if ($m == "09") {
            $m = "September";
        } else if ($m == "10") {
            $m = "Oktober";
        } else if ($m == "11") {
            $m = "November";
        } else if ($m == "12") {
            $m = "Desember";
        }

        return $d . ' ' . $m . ' ' . $y;
    }   
}

if (!function_exists('convert_time')) {
    function convert_time($time = '') {
        $h = substr($time, 0, 2);
        $m = substr($time, 3, 2);

        return $h . ':' . $m;
    }
}

if (!function_exists('convert_jk')) {
    function convert_jk($jenis_kelamin = '') {
        if ($jenis_kelamin == 'L') return 'Pria';
        else if ($jenis_kelamin == 'P') return 'Wanita';
    }
}

if (!function_exists('pengguna_link')) {
    function pengguna_link($username = '', $nama = '') {
        return '<a target="_blank" href=' . base_url() . 'profil/lihat/' . $username . '>' . $nama . '</a>';
    }
}

if (!function_exists('cv_link')) {
    function cv_link($username = '', $id_lowongan = '') {
        return '<a target="_blank" href=' . base_url() . 'lowongan/lihat_cv/' . $id_lowongan . '/' . $username . '>CV</a>';
    }
}

if (!function_exists('lowongan_link')) {
    function lowongan_link($id_lowongan, $judul) {
        return '<a href=' . base_url() . 'lowongan/lihat/' . $id_lowongan . '>' . $judul . '</a>';
    }
}

if (!function_exists('pesan_link')) {
    function pesan_link($id_pesan, $subject) {
        $link = '<a href=' . base_url() . 'pesan/lihat/' . $id_pesan . '>' . $subject . '</a>';
        return $link;
    }
}

if (!function_exists('get_fakultas')) {
    function get_fakultas($id_fakultas) {
        $fakultas = array('Non-Fakultas', 'FK', 'FKG', 'FMIPA', 'FT', 'FH', 'FE', 'FIB', 'FPsi', 'FISIP', 'FKM', 'Fasilkom', 'FIK', 'FF', 'Pascasarjana', 'Vokasi');
        return $fakultas[$id_fakultas];
    }
}

if (!function_exists('get_role')) {
    function get_role($id_role) {
        $role = array('Mahasiswa2008', 'Mahasiswa2009', 'Mahasiswa2010', 'Mahasiswa2011', 'Mahasiswa2012', 'Alumni', 'Staf', 'Dosen');
        return $role[$id_role];
    }
}

if (!function_exists('get_jenis_kelamin')) {
    function get_jenis_kelamin($id_jenis_kelamin) {
        $jenis_kelamin = array('Pria', 'Wanita');
        return $jenis_kelamin[$id_jenis_kelamin];
    }
}

if (!function_exists('get_agama')) {
    function get_agama($id_agama) {
        $agama = array('Islam', 'Kristen', 'Katolik', 'Buddha', 'Hindu', 'Konghucu', 'Lainnya');
        return $agama[$id_agama];
    }
}

if (!function_exists('is_syarat')) {
    function is_syarat($syarat, $syarat_full) {
        if (strpos($syarat_full, $syarat) !== false) {
            return true;
        } else {
            return false;
        }
    }
}