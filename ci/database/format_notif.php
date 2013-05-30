<?php
$data['pengirim'] = 'admin';
$data['penerima'] =  '';
$data['subject'] = '';
$data['isi'] = '';
$this -> pesan_model -> simpan_pesan($data);
?>