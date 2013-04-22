<?php

if (!empty($query)) {
    $row = $query -> row_array();
} else {
    $row['ID_Buku'] = '';
    $row['Judul'] = '';
    $row['Pengarang'] = '';
    $row['Kategori'] = '';
}

echo form_open('buku/save/'.$is_update);

echo form_hidden('id', $row['ID_Buku']);

echo "Judul : ".form_input('judul', $row['Judul'], "size='50' maxlength='100'");
echo "<br/><br/>";

echo "Pengarang : ".form_input('pengarang', $row['Pengarang'], "size='50' maxlength='150'");
echo "<br/><br/>";

echo "Kategori : ".form_dropdown('kategori', $opt_kategori, $row['Kategori']);
echo "<br/><br/>";

echo form_submit('btn_simpan', 'Simpan');

echo form_close();

?>
