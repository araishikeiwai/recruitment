    <?php include('header_view_0.php'); ?>
<!--    
- View - Cari Lanjut
-  
- Halaman pencarian lanjut terhadap suatu lowongan
-
- @author Nur Ulul Asman, Erryan Sazany, Ricky Arifandi Daniel
- @copyright recrUItment, 24-Apr-2013
- @version 1.1.0.2
-->
    <title>Pencarian Lanjut</title>

    <?php include('header_view.php'); ?>

         <div class="page [secondary] with-sidebar">

            <?php include('promosi_view.php'); ?>

            <div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row">
                            <div class="span12">
                                <h3>Pencarian Lanjut</h3>
                                    <table id="hidden">

                                        <?php
                                            $form_attributes = array('id' => 'cari_lanjut');

                                            echo form_open(base_url().'cari/cari_lanjut_hasil', $form_attributes);
                                        ?>

                                        <td>
                                            Judul Lowongan
                                        </td>
                                        <td colspan="3">
                                            <?php
                                                $form_attributes = array(
                                                    'name' => 'judul_lowongan',
                                                    'min' => '0',
                                                    'max' => '100',
                                                    'value' => set_value('judul'),
                                                    'style' => 'width:100%',
                                                    'placeholder' => 'Judul Lowongan'
                                                );
                                                echo form_input($form_attributes);
                                            ?>
                                        </td>

                                        <script type="text/javascript">
                                            var tipe_lowongan = true;
                                            var fakultas = true;
                                            var role = true;
                                            var jenis_kelamin = true;
                                            var agama = true;
                                            
                                            function pilih(nama) {
                                                var doc = document.getElementsByName(nama);
                                                
                                                if (nama == 'tipe_lowongan[]') {
                                                    for (var i = 0; i < doc.length; i++) {
                                                        doc[i].checked = tipe_lowongan;
                                                    }
                                                    tipe_lowongan = !tipe_lowongan;
                                                } else if (nama == 'fakultas[]') {
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
                                            Tipe Lowongan
                                            <a href="javascript:;" onclick="pilih('tipe_lowongan[]')"><h6>Pilih/Hapus Semua</h6></a>
                                            <?php $tipe_lowongan = array('Kepanitiaan', 'Organisasi', 'Riset', 'Asisten Dosen', 'Lainnya'); ?>
                                        </td>
                                        <td valign="top">
                                            <?php
                                                for ($i = 0; $i < 2; $i++) {
                                                    echo '<label class="input-control checkbox">'; 
                                            ?>
                                                    <input type="checkbox" name="tipe_lowongan[]" value="<?php echo $i; ?>" <?php echo set_checkbox('tipe_lowongan[]', $i); ?> />
                                            <?php
                                                    echo '<span class="helper">' . $tipe_lowongan[$i] . '</span>';
                                                    echo '</label><br/>';
                                                }
                                            ?>
                                        </td>
                                        <td valign="top">
                                            <?php
                                                for ($i = 2; $i < 4; $i++) {
                                                    echo '<label class="input-control checkbox">'; 
                                            ?>
                                                    <input type="checkbox" name="tipe_lowongan[]" value="<?php echo $i; ?>" <?php echo set_checkbox('tipe_lowongan[]', $i); ?> />
                                            <?php
                                                    echo '<span class="helper">' . $tipe_lowongan[$i] . '</span>';
                                                    echo '</label><br/>';
                                                }
                                            ?>
                                        </td>
                                        <td valign="top">
                                            <?php echo '<label class="input-control checkbox">'; ?>
                                            <input type="checkbox" name="tipe_lowongan[]" value="<?php echo "4"; ?>" <?php echo set_checkbox('tipe_lowongan[]', 4); ?> />
                                            <?php
                                                echo '<span class="helper">' . $tipe_lowongan[4] . '</span>';
                                                echo '</label><br/>';   
                                            ?>
                                        </td>
                                        </tr>
                                        <tr>
                                        <td valign="top" style="width: 237px;">
                                            Fakultas
                                            <a href="javascript:;" onclick="pilih('fakultas[]')"><h6>Pilih/Hapus Semua</h6></a>
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
                                                Role/Angkatan
                                                <a href="javascript:;" onclick="pilih('role[]')"><h6>Pilih/Hapus Semua</h6></a>
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
                                                Usia
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
                                                Jenis Kelamin
                                                <a href="javascript:;" onclick="pilih('jenis_kelamin[]')"><h6>Pilih/Hapus Semua</h6></a>
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
                                                Agama
                                                <a href="javascript:;" onclick="pilih('agama[]')"><h6>Pilih/Hapus Semua</h6></a>
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
                                    </table>

                                    <center>
                                        <a class="span6 button" href="<?php echo base_url(); ?>cari/cari_lanjut_batal/">Batal</a>
                                        <a class="span6 button default" href ="javascript:;" onclick="document.getElementById('cari_lanjut').submit()">Cari</a>
                                        <!-- <a class="span6 button default" href ="javascript:;" onclick="alert('OK')">Cari</a> -->
                                    </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            
           <?php include('footer_view.php'); ?>