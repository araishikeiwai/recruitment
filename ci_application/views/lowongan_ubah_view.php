    <?php include('header_view_0.php'); ?>
<!--    
- View - Ubah Lowongan
-  
- Halaman pengubahan data terkait suatu lowongan
-
- @author Nur Ulul Asman, Ricky Arifandi Daniel
- @copyright recrUItment, 24-Apr-2013
- @version 1.1.0.2
-->
    <title>Ubah Lowongan</title>

    <?php include('header_view.php'); ?>

         <div class="page [secondary] with-sidebar">

            <?php include('promosi_view.php'); ?>

            <div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row">
                            <div class="span12">
                                <h3>Ubah Lowongan</h3>
                                    <table id="hidden">
                                        
                                        <?php
                                            $form_attributes = array('id' => 'lowongan_ubah');
                                            $hidden = array('id_lowongan' => $row['id_lowongan']);
                                            echo form_open_multipart(base_url().'lowongan/simpan_lowongan', $form_attributes, $hidden);
                                        ?>

                                        <tr>
                                            <td>
                                                Judul Lowongan<font style="color:red">*</font>
                                                <?php echo form_error('judul'); ?>
                                            </td>
                                            <td colspan="2">
                                                <?php
                                                    $form_attributes = array(
                                                        'name' => 'judul',
                                                        'value' => set_value('judul', $row['judul']),
                                                        'style' => 'width:100%'
                                                    );
                                                    echo form_input($form_attributes);
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Tipe Lowongan<font style="color:red">*</font>
                                            </td>
                                            <td colspan="2">
                                                <div class="input-control select">
                                                    <?php
                                                        $options = array(
                                                            'Kepanitiaan' => 'Kepanitiaan',
                                                            'Organisasi' => 'Organisasi',
                                                            'Riset' => 'Riset',
                                                            'Asisten Dosen' => 'Asisten Dosen',
                                                            'Lainnya' => 'Lainnya'
                                                        );
                                                        echo form_dropdown('tipe', $options, $row['tipe']);
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" style="width: 237px;">
                                                Deskripsi Lowongan<font style="color:red">*</font>
                                                <?php echo form_error('deskripsi'); ?>
                                            </td>
                                            <td valign="top" colspan="2">
                                                <p>
                                                    <div class="input-control textarea">
                                                        <?php
                                                            $form_attributes = array(
                                                                'name' => 'deskripsi',
                                                                'value' => set_value('deskripsi', $row['deskripsi']),
                                                                'rows' => '5'
                                                            );
                                                            echo form_textarea($form_attributes);
                                                        ?>
                                                    </div>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" style="width: 237px;">
                                                Poster Lowongan (JPG, lebar maks 800 piksel)
                                            </td>
                                            <td valign="top" colspan="2">
                                                <?php
                                                    $form_attributes = array(
                                                        'name' => 'poster',
                                                        'accept' => "image/jpg"
                                                    );
                                                    echo form_upload($form_attributes);
                                                ?>
                                            </td>
                                        </tr>

                                        <script type="text/javascript">
                                            var fakultas = true;
                                            var role = true;
                                            var jenis_kelamin = true;
                                            var agama = true;
                                            
                                            function pilih(nama) {
                                                var doc = document.getElementsByName(nama);
                                                
                                                if (nama == 'fakultas[]') {
                                                    for (var i = 0; i < doc.length; i++) {
                                                        doc[i].checked = fakultas;
                                                    }
                                                    fakultas = !fakultas;
                                                } else if (nama == 'role[]') {
                                                    for (var i = 0; i < doc.length; i++) {
                                                        doc[i].checked = role;
                                                    }
                                                    role = !role;
                                                } else if (nama == 'jenis_kelamin[]') {
                                                    for (var i = 0; i < doc.length; i++) {
                                                        doc[i].checked = jenis_kelamin;
                                                    }
                                                    jenis_kelamin = !jenis_kelamin;
                                                } else if (nama == 'agama[]') {
                                                    for (var i = 0; i < doc.length; i++) {
                                                        doc[i].checked = agama;
                                                    }
                                                    agama = !agama;
                                                }
                                            }
                                        </script>

                                        <tr>
                                            <td valign="top" style="width: 237px;">
                                                Fakultas<font style="color:red">*</font>
                                                <a href="javascript:;" onclick="pilih('fakultas[]')"><h6>Pilih/Hapus Semua</h6></a>
                                                <?php echo form_error('fakultas[]'); ?>
                                            </td>
                                            <td valign="top">
                                                <?php
                                                    for ($i = 0; $i < 8; $i++) {
                                                        echo '<label class="input-control checkbox">'; 
                                                ?>
                                                        <input type="checkbox" name="fakultas[]" value="<?php echo $i; ?>" <?php echo set_checkbox('fakultas[]', $i); if (is_syarat(get_fakultas($i), $row['syarat'])) echo 'checked'; ?> />
                                                <?php
                                                        echo '<span class="helper">' . get_fakultas($i) . '</span>';
                                                        echo '</label><br/>';
                                                    }
                                                ?>
                                            </td>
                                            <td valign="top">
                                                <?php
                                                    for ($i = 8; $i < 16; $i++) {
                                                        echo '<label class="input-control checkbox">'; 
                                                ?>
                                                        <input type="checkbox" name="fakultas[]" value="<?php echo $i; ?>" <?php echo set_checkbox('fakultas[]', $i); if (is_syarat(get_fakultas($i), $row['syarat'])) echo 'checked'; ?> />
                                                <?php
                                                        echo '<span class="helper">' . get_fakultas($i) . '</span>';
                                                        echo '</label><br/>';
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" style="width: 237px;">
                                                Role/Angkatan<font style="color:red">*</font>
                                                <a href="javascript:;" onclick="pilih('role[]')"><h6>Pilih/Hapus Semua</h6></a>
                                                <?php echo form_error('role[]'); ?>
                                            </td>
                                            <td valign="top">
                                                <?php
                                                    for ($i = 0; $i < 4; $i++) {
                                                        echo '<label class="input-control checkbox">';
                                                ?>
                                                        <input type="checkbox" name="role[]" value="<?php echo $i; ?>" <?php echo set_checkbox('role[]', $i); if (is_syarat(get_role($i), $row['syarat'])) echo 'checked'; ?> />
                                                <?php
                                                        echo '<span class="helper">' . get_role($i) . '</span>';
                                                        echo '</label><br/>';
                                                    }
                                                ?>
                                            </td>
                                            <td valign="top">
                                                <?php
                                                    for ($i = 4; $i < 8; $i++) {
                                                        echo '<label class="input-control checkbox">';
                                                ?>
                                                        <input type="checkbox" name="role[]" value="<?php echo $i; ?>" <?php echo set_checkbox('role[]', $i); if (is_syarat(get_role($i), $row['syarat'])) echo 'checked'; ?> />
                                                <?php
                                                        echo '<span class="helper">' . get_role($i) . '</span>';
                                                        echo '</label><br/>';
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Usia<font style="color:red">*</font>
                                                <?php echo form_error('usia_min'); ?>
                                                <?php echo form_error('usia_max'); ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $form_attributes = array(
                                                        'name' => 'usia_min',
                                                        'min' => '0',
                                                        'max' => '100',
                                                        'value' => set_value('usia_min', $row['syarat_usia_min']),
                                                        'style' => 'width:100%',
                                                        'placeholder' => 'Usia Minimum'
                                                    );
                                                    echo form_input($form_attributes);
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $form_attributes = array(
                                                        'name' => 'usia_max',
                                                        'min' => '0',
                                                        'max' => '100',
                                                        'value' => set_value('usia_max', $row['syarat_usia_max']),
                                                        'style' => 'width:100%',
                                                        'placeholder' => 'Usia Maksimum'
                                                    );
                                                    echo form_input($form_attributes);
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Jenis Kelamin<font style="color:red">*</font>
                                                <a href="javascript:;" onclick="pilih('jenis_kelamin[]')"><h6>Pilih/Hapus Semua</h6></a>
                                                <?php echo form_error('jenis_kelamin[]'); ?>
                                            </td>
                                            <td>
                                                <label class="input-control checkbox">
                                                    <input type="checkbox" name="jenis_kelamin[]" value="0" <?php echo set_checkbox('jenis_kelamin[]', '0'); if (is_syarat(get_jenis_kelamin(0), $row['syarat'])) echo 'checked'; ?> />
                                                    <span class="helper"><?php echo get_jenis_kelamin(0) ?></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="input-control checkbox">
                                                    <input type="checkbox" name="jenis_kelamin[]" value="1" <?php echo set_checkbox('jenis_kelamin[]', '1'); if (is_syarat(get_jenis_kelamin(1), $row['syarat'])) echo 'checked'; ?> />
                                                    <span class="helper"><?php echo get_jenis_kelamin(1) ?></span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top">
                                                Agama<font style="color:red">*</font>
                                                <a href="javascript:;" onclick="pilih('agama[]')"><h6>Pilih/Hapus Semua</h6></a>
                                                <?php echo form_error('agama[]'); ?>
                                            </td>
                                            <td valign="top" colspan="2">
                                                <?php
                                                    for ($i = 0; $i < 7; $i++) {
                                                        echo '<label class="input-control checkbox">';
                                                ?>
                                                        <input type="checkbox" name="agama[]" value="<?php echo $i; ?>" <?php echo set_checkbox('agama[]', $i); if (is_syarat(get_agama($i), $row['syarat'])) echo 'checked'; ?> />
                                                <?php
                                                        echo '<span class="helper">' . get_agama($i) . '</span>';
                                                        echo '</label><br/>';
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top">
                                                Batas Akhir Pembukaan Lowongan<font style="color:red">*</font>
                                                <?php echo form_error('tgl_tutup'); ?>
                                            </td>
                                            <td valign="top" colspan="2">
                                                <input style="width:100%" type="date" name="tgl_tutup" value="<?php echo set_value('tgl_tutup', $row['tgl_tutup']) ?>">
                                            </td>
                                        </tr>
                                    </table>
                                    <h6 style="color:red">* = wajib diisi</h6>
                                    <center>
                                        <a class="span6 button" href="<?php echo base_url(); ?>lowongan/lihat/<?php echo $row['id_lowongan']; ?>">Batal</a>
                                        <a class="span6 button default" href ="javascript:;" onclick="document.getElementById('lowongan_ubah').submit()">Simpan</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        
       <?php include('footer_view.php'); ?>