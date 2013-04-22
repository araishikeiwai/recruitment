    <?php include('header_view_0.php'); ?>

    <title>Edit Profil</title>
    
    <?php include('header_view.php'); ?>
        
         <div class="page [secondary] with-sidebar">

            <?php include('promosi_view.php'); ?>
            
            <div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                    <div class="row">
                        <div class="span3">
                            <div class="image-collection">
                                <div></div>
                            </div>
                                <!-- <div>
                                    <button class="shortcut span3">
                                        <span class="icon">
                                            <i class="icon-pictures"></i>
                                        </span>
                                        <span class="label">
                                            Ganti Foto
                                        </span>
                                    </button>
                                </div> -->
                                

                        </div>
                        <div class="span5">
                            
                            <h3 style="font-weight: 700;">Edit Profil</h3>
                            
                            <?php 
                                $form_attributes = array('id' => 'profil_ubah');
                                echo form_open(base_url().'profil/simpan', $form_attributes);
                            ?>

                            <table id="hidden">
                            <tr>
                                <td id="t_head">Username</td>
                                <td id="identitas"><input type="text" style="width:100%" readonly value="<?php echo $row['username']; ?>"/></td>
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
                                    Nama<font style="color:red">*</font>
                                    <?php echo form_error('nama'); ?>
                                </td>
                                <td id="identitas">
                                    <?php
                                        $form_attributes = array(
                                            'name' => 'nama',
                                            'value' => set_value('nama', $row['nama']),
                                            'style' => 'width:100%'
                                        );
                                        echo form_input($form_attributes);
                                    ?>
                                </td>
                            </tr>
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
                                                'FK' => 'FK',
                                                'FKG' => 'FKG',
                                                'FMIPA' => 'FMIPA',
                                                'FT' => 'FT',
                                                'FH' => 'FH',
                                                'FE' => 'FE',
                                                'FIB' => 'FIB',
                                                'FPsi' => 'FPsi',
                                                'FISIP' => 'FISIP',
                                                'FKM' => 'FKM',
                                                'Fasilkom' => 'Fasilkom',
                                                'FIK' => 'FIK',
                                                'FF' => 'FF',
                                                'Pascasarjana' => 'Pascasarjana',
                                                'Vokasi' => 'Vokasi'
                                            );
                                            echo form_dropdown('fakultas', $options, $row['fakultas']);
                                        ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td id="t_head">Angkatan/Role<font style="color:red">*</font></td>
                                <td id="identitas">
                                    <div class="input-control select">
                                        <?php
                                            $options = array(
                                                '2008' => '2008',
                                                '2009' => '2009',
                                                '2010' => '2010',
                                                '2011' => '2011',
                                                '2012' => '2012',
                                                'Alumni' => 'Alumni',
                                                'Staf' => 'Staf',
                                                'Dosen' => 'Dosen'
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
                                                'L' => 'Pria',
                                                'P' => 'Wanita'
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
                                <a class="span2 button" href="<?php echo base_url(); ?>profil">Batal</a>
                                <a class="span2 button default" href ="javascript:;" onclick="document.getElementById('profil_ubah').submit()">Simpan</a>
                            </center>
                        </div>
                        <div class="span4">
                            <div class="span4">
                                <center class="bg-color-green">
                                    <h3 >Badges<h3><br/>
                                </center>
                                    <div class="rating" data-role="rating" data-param-vote="off" data-param-rating="3.7" data-param-stars="11">
                                    </div>
                                
                            </div>
                            <div class="span4 bg-color-orange">
                                <center><h3>Review<h3></center>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                </div>

            </div>
        </div>
        
        
        <?php include('footer_view.php'); ?>