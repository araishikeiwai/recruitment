    <?php include('header_view_0.php'); ?>
<!--    
- View - Ajukan Judul Tipe
-  
- Halaman pengisian judul dan tipe lowongan dalam pengajuan lowongan
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
                                <h3>Ajukan Lowongan</h3>
                                    <table id="hidden">
                                        
                                        <?php
                                            $form_attributes = array('id' => 'ajukan_judul_tipe');
                                            echo form_open(base_url().'lowongan/ajukan/1', $form_attributes);
                                        ?>

                                        <tr>
                                            <td>
                                                Judul Lowongan<font style="color:red">*</font>
                                                <?php echo form_error('judul'); ?>
                                            </td>
                                            <td>
                                                <?php
                                                    $form_attributes = array(
                                                        'name' => 'judul',
                                                        'value' => set_value('judul'),
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
                                            <td>
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
                                    </table>
                                    <h6 style="color:red">* = wajib diisi</h6>
                                    <center>
                                        <a class="span6 button" href="<?php echo base_url(); ?>profil">Batal</a>
                                        <a class="span6 button default" href ="javascript:;" onclick="document.getElementById('ajukan_judul_tipe').submit()">Lanjutkan</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        
       <?php include('footer_view.php'); ?>