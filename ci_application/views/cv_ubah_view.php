    <?php include('header_view_0.php'); ?>
<!--    
- View - Ubah CV
-  
- Halaman pengubahan CV pengguna
-
- @author Nur Ulul Asman, Ricky Arifandi Daniel
- @copyright recrUItment, 24-Apr-2013
- @version 1.1.0.2
-->
    <title>Curriculum Vitae - Ubah</title>

    <?php include('header_view.php'); ?>
        
         <div class="page [secondary] with-sidebar">

            <?php include('promosi_view.php'); ?>

            <div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row">
                            <div class="span12">
                                <h3>Curriculum Vitae</h3>
                                <table id="hidden">
                                    <tr>
                                        <td>Nama</td>
                                        <td id="identitas"><?php echo $row['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Fakultas</td>
                                        <td id="identitas"><?php echo $row['fakultas']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Role/Angkatan</td>
                                        <td id="identitas"><?php echo $row['role']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jenis Kelamin
                                        </td>
                                        <td>
                                            <?php echo convert_jk($row['jenis_kelamin']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Email
                                        </td>
                                        <td>
                                            <?php echo $row['email']; ?>
                                        </td>
                                    </tr>
                                    
                                    <?php
                                        $form_attributes = array('id' => 'cv_ubah');
                                        echo form_open(base_url().'cv/simpan', $form_attributes);
                                    ?>
                                    
                                    <tr>
                                        <td>
                                            Alamat<font style="color:red">*</font>
                                            <?php echo form_error('alamat'); ?>
                                        </td>
                                        <td>
                                            <p>
                                                <div class="input-control textarea">
                                                    <?php
                                                        $form_attributes = array(
                                                            'name' => 'alamat',
                                                            'value' => set_value('alamat', $row['alamat']),
                                                            'rows' => '5'
                                                        );
                                                        echo form_textarea($form_attributes);
                                                    ?>
                                                </div>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tempat Lahir<font style="color:red">*</font>
                                            <?php echo form_error('tmpt_lahir'); ?>
                                        </td>
                                        <td>
                                            <?php
                                                $form_attributes = array(
                                                    'name' => 'tmpt_lahir',
                                                    'value' => set_value('tmpt_lahir', $row['tmpt_lahir']),
                                                    'style' => 'width:100%'
                                                );
                                                echo form_input($form_attributes);
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tanggal Lahir<font style="color:red">*</font>
                                            <?php echo form_error('tgl_lahir'); ?>
                                        </td>
                                        <td>
                                            <input style="width:100%" type="date" name="tgl_lahir" value="<?php echo set_value('tgl_lahir', $row['tgl_lahir']); ?>">
                                        </td>
                                    </tr>
                                     <tr>
                                        <td>
                                            Agama<font style="color:red">*</font>
                                        </td>
                                        <td>
                                           <div class="input-control select">
                                                <?php
                                                    $options = array(
                                                        get_agama(0) => get_agama(0),
                                                        get_agama(1) => get_agama(1),
                                                        get_agama(2) => get_agama(2),
                                                        get_agama(3) => get_agama(3),
                                                        get_agama(4) => get_agama(4),
                                                        get_agama(5) => get_agama(5),
                                                        get_agama(6) => get_agama(6)
                                                    );
                                                    echo form_dropdown('agama', $options, $row['agama']);
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            No. Kontak<font style="color:red">*</font>
                                            <?php echo form_error('no_kontak'); ?>
                                        </td>
                                        <td>
                                            <?php
                                                $form_attributes = array(
                                                    'name' => 'no_kontak',
                                                    'value' => set_value('no_kontak', $row['no_kontak']),
                                                    'style' => 'width:100%',
                                                    'placeholder' => 'Nomor telepon/telepon genggam Anda yang dapat dihubungi'
                                                );
                                                echo form_input($form_attributes);
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                                <h4>Riwayat Pendidikan<font style="color:red">*</font></h4>
                                <?php echo form_error('edukasi'); ?>
                                <table id="hidden">
                                    <tr>
                                    <td>
                                        <p>
                                            <div class="input-control textarea">
                                                <?php
                                                    $form_attributes = array(
                                                        'name' => 'edukasi',
                                                        'value' => set_value('edukasi', $row['edukasi']),
                                                        'rows' => '5'
                                                    );
                                                    echo form_textarea($form_attributes);
                                                ?>
                                            </div>
                                        </p>
                                    </td>
                                    </tr>
                                </table>
                                <h4>Prestasi<font style="color:red">*</font></h4>
                                <?php echo form_error('prestasi'); ?>
                                <table id="hidden">
                                    <tr>
                                    <td>
                                        <p>
                                            <div class="input-control textarea">
                                                <?php
                                                    $form_attributes = array(
                                                        'name' => 'prestasi',
                                                        'value' => set_value('prestasi', $row['prestasi']),
                                                        'rows' => '5'
                                                    );
                                                    echo form_textarea($form_attributes);
                                                ?>
                                            </div>
                                        </p>
                                    </td>
                                    </tr>
                                </table>
                                <h4>Pengalaman Kerja<font style="color:red">*</font></h4>
                                <?php echo form_error('pglm_kerja'); ?>
                                <table id="hidden">
                                    <tr>
                                    <td>
                                        <p>
                                            <div class="input-control textarea">
                                                <?php
                                                    $form_attributes = array(
                                                        'name' => 'pglm_kerja',
                                                        'value' => set_value('pglm_kerja', $row['pglm_kerja']),
                                                        'rows' => '5'
                                                    );
                                                    echo form_textarea($form_attributes);
                                                ?>
                                            </div>
                                        </p>
                                    </td>
                                    </tr>
                                </table>
                                <h4>Pengalaman Organisasi<font style="color:red">*</font></h4>
                                <?php echo form_error('pglm_organisasi'); ?>
                                <table id="hidden">
                                    <tr>
                                    <td>
                                        <p>
                                            <div class="input-control textarea">
                                                <?php
                                                    $form_attributes = array(
                                                        'name' => 'pglm_organisasi',
                                                        'value' => set_value('pglm_organisasi', $row['pglm_organisasi']),
                                                        'rows' => '5'
                                                    );
                                                    echo form_textarea($form_attributes);
                                                ?>
                                            </div>
                                        </p>
                                    </td>
                                    </tr>
                                </table>
                                <h4>Pengalaman Kepanitian<font style="color:red">*</font></h4>
                                <?php echo form_error('pglm_panitia'); ?>
                                <table id="hidden">
                                    <tr>
                                    <td>
                                        <p>
                                            <div class="input-control textarea">
                                                <?php
                                                    $form_attributes = array(
                                                        'name' => 'pglm_panitia',
                                                        'value' => set_value('pglm_panitia', $row['pglm_panitia']),
                                                        'rows' => '5'
                                                    );
                                                    echo form_textarea($form_attributes);
                                                ?>
                                            </div>
                                        </p>
                                    </td>
                                    </tr>
                                </table>
                                <h4>Kemampuan<font style="color:red">*</font></h4>
                                <?php echo form_error('kemampuan'); ?>
                                <table id="hidden">
                                    <tr>
                                    <td>
                                        <p>
                                            <div class="input-control textarea">
                                                <?php
                                                    $form_attributes = array(
                                                        'name' => 'kemampuan',
                                                        'value' => set_value('kemampuan', $row['kemampuan']),
                                                        'rows' => '5'
                                                    );
                                                    echo form_textarea($form_attributes);
                                                    echo form_close();
                                                ?>
                                            </div>
                                        </p>
                                    </td>
                                    </tr>
                                </table>     

                            <h6 style="color:red">* = wajib diisi</h6>
                            <center>
                                <a class="span6 button" href="<?php echo base_url(); ?>cv">Batal</a>
                                <a class="span6 button default" href ="javascript:;" onclick="document.getElementById('cv_ubah').submit()">Simpan</a>
                            </center>
                                
                            </div>
                            
                        </div>
                    
                    </div>

                </div>
            </div>
        </div>  
        
        
        <?php include('footer_view.php'); ?>