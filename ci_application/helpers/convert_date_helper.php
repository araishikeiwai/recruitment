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