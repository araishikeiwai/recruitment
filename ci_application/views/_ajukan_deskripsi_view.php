    <?php include('header_view_0.php'); ?>
<!--    
- View - Ajukan Deskripsi
-  
- Halaman pengisian deskripsi dan persyaratan lowongan dalam pengajuan lowongan
-
- @author Nur Ulul Asman, Ricky Arifandi Daniel
- @copyright recrUItment, 24-Apr-2013
- @version 1.1.0.2
-->
    <title>Ajukan Lowongan</title>

    <?php include('header_view.php'); ?>

         <div class="page [secondary] with-sidebar">

            <?php include('promosi_view.php'); ?>

            <div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row">
                            <div class="span12">
                                <h3>Deskripsi dan Persyaratan Lowongan</h3>
                                    <table id="hidden">

                                        <?php
                                            //echo validation_errors();
                                            $form_attributes = array('id' => 'ajukan_deskripsi');
                                            $hidden = array(
                                                'id_lowongan' => $row['id_lowongan'],
                                            );
                                            echo form_open(base_url().'lowongan/ajukan/2', $form_attributes, $hidden);
                                        ?>

                                        <tr>
                                            <td valign="top" style="width: 237px;">
                                                Deskripsi Lowongan<font style="color:red">*</font>
                                                <?php echo form_error('deskripsi'); ?>
                                            </td>
                                            <td valign="top" colspan="3">
                                                <p>
                                                    <div class="input-control textarea">
                                                        <?php
                                                            $form_attributes = array(
                                                                'name' => 'deskripsi',
                                                                'value' => set_value('deskripsi'),
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
                                                Poster Lowongan (JPG/JPEG/PNG)
                                            </td>
                                            <td valign="top" colspan="3">
                                                <?php
                                                    $form_attributes = array(
                                                        'name' => 'poster',
                                                        'value' => $row['poster'],
                                                        'accept' => "image/jpeg, image/png, image/jpg"
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
                                                <?php $fakultas = array('FK', 'FKG', 'FMIPA', 'FT', 'FH', 'FE', 'FIB', 'FPsi', 'FISIP', 'FKM', 'Fasilkom', 'FIK', 'FF', 'Pascasarjana', 'Vokasi'); ?>
                                            </td>
                                            <td valign="top">
                                                <?php
                                                    for ($i = 0; $i < 5; $i++) {
                                                        echo '<label class="input-control checkbox">'; 
                                                ?>
                                                        <input type="checkbox" name="fakultas[]" value="<?php echo $i; ?>" <?php echo set_checkbox('fakultas[]', $i); ?> />
                                                <?php
                                                        echo '<span class="helper">' . $fakultas[$i] . '</span>';
                                                        echo '</label><br/>';
                                                    }
                                                ?>
                                            </td>
                                            <td valign="top">
                                                <?php
                                                    for ($i = 5; $i < 10; $i++) {
                                                        echo '<label class="input-control checkbox">'; 
                                                ?>
                                                        <input type="checkbox" name="fakultas[]" value="<?php echo $i; ?>" <?php echo set_checkbox('fakultas[]', $i); ?> />
                                                <?php
                                                        echo '<span class="helper">' . $fakultas[$i] . '</span>';
                                                        echo '</label><br/>';
                                                    }
                                                ?>
                                            </td>
                                            <td valign="top">
                                                <?php
                                                    for ($i = 10; $i < 15; $i++) {
                                                        echo '<label class="input-control checkbox">'; 
                                                ?>
                                                        <input type="checkbox" name="fakultas[]" value="<?php echo $i; ?>" <?php echo set_checkbox('fakultas[]', $i); ?> />
                                                <?php
                                                        echo '<span class="helper">' . $fakultas[$i] . '</span>';
                                                        echo '</label><br/>';
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" style="width: 237px;">
                                                Angkatan/Role<font style="color:red">*</font>
                                                <a href="javascript:;" onclick="pilih('role[]')"><h6>Pilih/Hapus Semua</h6></a>
                                                <?php echo form_error('role[]'); ?>
                                                <?php $role = array('2008', '2009', '2010', '2011', '2012', 'Alumni', 'Staf', 'Dosen'); ?>
                                            </td>
                                            <td valign="top">
                                                <?php
                                                    for ($i = 0; $i < 4; $i++) {
                                                        echo '<label class="input-control checkbox">';
                                                ?>
                                                        <input type="checkbox" name="role[]" value="<?php echo $i; ?>" <?php echo set_checkbox('role[]', $i); ?> />
                                                <?php
                                                        echo '<span class="helper">' . $role[$i] . '</span>';
                                                        echo '</label><br/>';
                                                    }
                                                ?>
                                            </td>
                                            <td valign="top">
                                                <?php
                                                    for ($i = 4; $i < 8; $i++) {
                                                        echo '<label class="input-control checkbox">';
                                                ?>
                                                        <input type="checkbox" name="role[]" value="<?php echo $i; ?>" <?php echo set_checkbox('role[]', $i); ?> />
                                                <?php
                                                        echo '<span class="helper">' . $role[$i] . '</span>';
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
                                                        'value' => set_value('usia_min'),
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
                                                        'value' => set_value('usia_max'),
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
                                                    <input type="checkbox" name="jenis_kelamin[]" value="0" <?php echo set_checkbox('jenis_kelamin[]', '0'); ?> />
                                                    <span class="helper">Pria</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="input-control checkbox">
                                                    <input type="checkbox" name="jenis_kelamin[]" value="1" <?php echo set_checkbox('jenis_kelamin[]', '1'); ?> />
                                                    <span class="helper">Wanita</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top">
                                                Agama<font style="color:red">*</font>
                                                <a href="javascript:;" onclick="pilih('agama[]')"><h6>Pilih/Hapus Semua</h6></a>
                                                <?php echo form_error('agama[]'); ?>
                                                <?php $agama = array('Islam', 'Kristen', 'Katolik', 'Buddha', 'Hindu', 'Konghucu', 'Lainnya'); ?>
                                            </td>
                                            <td>
                                                <?php
                                                    for ($i = 0; $i < 7; $i++) {
                                                        echo '<label class="input-control checkbox">';
                                                ?>
                                                        <input type="checkbox" name="agama[]" value="<?php echo $i; ?>" <?php echo set_checkbox('agama[]', $i); ?> />
                                                <?php
                                                        echo '<span class="helper">' . $agama[$i] . '</span>';
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
                                            <td>
                                                <input style="width:100%" type="date" name="tgl_tutup" value="<?php echo set_value('tgl_tutup') ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                        </tr>
                                        <tr>
                                            <td valign="top">
                                                Membutuhkan Wawancara?<font style="color:red">*</font>
                                                <?php echo form_error('wawancara'); ?>
                                            </td>
                                            <td>
                                                <label class="input-control radio">
                                                    <input type="radio" name="wawancara" value="Y" <?php echo set_radio('wawancara', 'Y'); ?> />
                                                    <span class="helper">Ya</span>
                                                </label><br/>
                                                <label class="input-control radio">
                                                    <input type="radio" name="wawancara" value="N" <?php echo set_radio('wawancara', 'N'); ?> />
                                                    <span class="helper">Tidak</span>
                                                </label><br/>
                                            </td>
                                        </tr>
                                    </table>
                                    <h6 style="color:red">* = wajib diisi</h6>
                                    <center>
                                        <a class="span6 button" href="<?php echo base_url(); ?>lowongan/batal/<?php echo $row['id_lowongan'] ?>">Batal</a>
                                        <a class="span6 button default" href ="javascript:;" onclick="document.getElementById('ajukan_deskripsi').submit()">Simpan</a>
                                    </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            
           <?php include('footer_view.php'); ?>