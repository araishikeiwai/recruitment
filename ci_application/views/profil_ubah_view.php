<!--    
- View Ubah Profil
-  
- Halaman pengubahan data profil pengguna
-
- @author Nur Ulul Asman, Ricky Arifandi Daniel
- @copyright recrUItment, 24-Apr-2013
- @version 1.1.0.2
-->
    <?php include('header_view_0.php'); ?>

    <title>Edit Profil</title>
    
    <?php include('header_view.php'); ?>
        
         <div class="page [secondary] with-sidebar">

            <?php include('promosi_view.php'); ?>
            
            <div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                    <div class="row">   
                        <div class="span4">
                            <?php 
                                $form_attributes = array('id' => 'profil_ubah');
                                echo form_open_multipart(base_url().'profil/simpan', $form_attributes);
                            ?>
                            <div class="image-collection">
                                <div><img src="<?php echo base_url() ?>images/avatar/<?php echo $this -> session -> userdata('username') ?>_.jpg"/></div>
                            </div>
                            <table id="hidden">
                                <tr>
                                    <td>
                                        Pilih gambar profil (format .jpg)
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php
                                            echo form_upload('foto');
                                        ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="span6">
                            
                            <h3 style="font-weight: 700;">Edit Profil</h3>
                            
                            <table id="hidden">
                            <tr>
                                <td id="t_head">Username</td>
                                <td id="identitas"><input type="text" style="width:100%" readonly value="<?php echo $row['username']; ?>"/></td>
                            </tr>
                            <tr>
                                <td id="t_head">Nama</td>
                                <td id="identitas"><input type="text" style="width:100%" readonly value="<?php echo $row['nama']; ?>"/></td>
                            </tr>
                            <tr>
                                <td id="t_head">Status</td>
                                <td id="identitas">
                                    <?php
                                        $form_attributes = array(
                                            'id' => 'status_upg',
                                            'name' => 'status',
                                            'value' => $row['status'],
                                            'readonly' => 'readonly',
                                            'style' => 'width:100%'
                                        );
                                        echo form_input($form_attributes);
                                    ?>
                                </td>
                            </tr>
                            </table>

                            <?php if ($row['status'] == "seeker") { ?>
                            <center>
                                <a class="span2 button default" href="javascript:;" onclick="document.getElementById('status_upg').value = 'provider'">Upgrade Status</a>
                            </center>   
                            <?php } else { echo "<hr/>"; echo "<hr/>"; echo "<hr/>"; echo "<hr/>";  } ?>

                            <table id="hidden">
                            <tr>
                                <td id="t_head">
                                    Email<font style="color:red">*</font>
                                    <?php echo form_error('email'); ?>
                                </td>
                                <td id="identitas">
                                    <?php
                                        $form_attributes = array(
                                            'name' => 'email',
                                            'value' => set_value('email', $row['email']),
                                            'style' => 'width:100%'
                                        );
                                        echo form_input($form_attributes);
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td id="t_head">Fakultas<font style="color:red">*</font></td>
                                <td id="identitas">
                                    <div class="input-control select">
                                        <?php
                                            $options = array(
                                                get_fakultas(0) => get_fakultas(0),
                                                get_fakultas(1) => get_fakultas(1),
                                                get_fakultas(2) => get_fakultas(2),
                                                get_fakultas(3) => get_fakultas(3),
                                                get_fakultas(4) => get_fakultas(4),
                                                get_fakultas(5) => get_fakultas(5),
                                                get_fakultas(6) => get_fakultas(6),
                                                get_fakultas(7) => get_fakultas(7),
                                                get_fakultas(8) => get_fakultas(8),
                                                get_fakultas(9) => get_fakultas(9),
                                                get_fakultas(10) => get_fakultas(10),
                                                get_fakultas(11) => get_fakultas(11),
                                                get_fakultas(12) => get_fakultas(12),
                                                get_fakultas(13) => get_fakultas(13),
                                                get_fakultas(14) => get_fakultas(14),
                                                get_fakultas(15) => get_fakultas(15)
                                            );
                                            echo form_dropdown('fakultas', $options, $row['fakultas']);
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td id="t_head">Role/Angkatan<font style="color:red">*</font></td>
                                <td id="identitas">
                                    <div class="input-control select">
                                        <?php
                                            $options = array(
                                                get_role(0) => get_role(0),
                                                get_role(1) => get_role(1),
                                                get_role(2) => get_role(2),
                                                get_role(3) => get_role(3),
                                                get_role(4) => get_role(4),
                                                get_role(5) => get_role(5),
                                                get_role(6) => get_role(6),
                                                get_role(7) => get_role(7)
                                            );
                                            echo form_dropdown('role', $options, $row['role']);
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td id="t_head">Jenis Kelamin<font style="color:red">*</font></td>
                                <td id="identitas">
                                    <div class="input-control select">
                                        <?php
                                            $options = array(
                                                get_jenis_kelamin(0) => get_jenis_kelamin(0),
                                                get_jenis_kelamin(1) => get_jenis_kelamin(1)
                                            );
                                            echo form_dropdown('jenis_kelamin', $options, $row['jenis_kelamin']);
                                            echo form_close();
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            </table>

                            <h6 style="color:red">* = wajib diisi</h6>
                            <center>
                                <a class="span3 button" href="<?php echo base_url(); ?>profil">Batal</a>
                                <a class="span3 button default" href ="javascript:;" onclick="document.getElementById('profil_ubah').submit()">Simpan</a>
                            </center>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
        
        
        <?php include('footer_view.php'); ?>