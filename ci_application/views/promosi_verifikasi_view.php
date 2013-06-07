    <?php include('header_view_0.php'); ?>

<!--    
- View - Verifikasi pembayaran promosi lowongan
-  
- Halaman untuk verifikasi pembayaran promosi lowongan
-
- @author Nur Ulul Asman, Ricky Arifandi Daniel, Ahmad Faruq Waqfi
- @copyright recrUItment, 24-Apr-2013
- @version 1.1.0.2
-->

    <title>Verifikasi Pembayaran Promosi Lowongan</title>
    
    <?php include('header_view.php'); ?>
        
         <div class="page [secondary] with-sidebar">

            <?php include('promosi_view.php'); ?>
            
            <div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                    <div class="row">
                        <div class="span8">
                            
                            <h3 style="font-weight: 700;">Verifikasi Pembayaran Promosi Lowongan</h3>
                            
                            <?php 
                                $form_attributes = array('id' => 'verifikasi');
                                $hidden = array('id_lowongan' => $promosi['id_lowongan']);
                                echo form_open(base_url().'promosi/simpan_verifikasi', $form_attributes, $hidden);
                            ?>

                            <table id="hidden">
                                <tr>
                                    <td colspan="3">
                                        Dengan ini saya menyatakan telah membayar sejumlah Rp <?php echo $promosi['biaya_promosi'] ?> dengan:
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:120px">Rekening Tujuan</td>
                                    <td style="width:10px">:</td>
                                    <td>
                                        <?php
                                            $options;
                                            for ($i = 0; $i < count($rekening); $i++) {
                                                $options[$rekening[$i]['id_rekening']] = $rekening[$i]['rekening'];
                                            }
                                            echo form_dropdown('id_rekening', $options);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:120px">Bank Asal<font style="color:red">*</font><?php echo form_error('asal_bank'); ?></td>
                                    <td style="width:10px">:</td>
                                    <td>
                                        <?php
                                            $form_attributes = array(
                                                'name' => 'asal_bank',
                                                'value' => set_value('asal_bank', ''),
                                                'style' => 'width:100%'
                                            );
                                            echo form_input($form_attributes);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:120px">No Rekening Asal<font style="color:red">*</font><?php echo form_error('asal_rekening'); ?></td>
                                    <td style="width:10px">:</td>
                                    <td>
                                        <?php
                                            $form_attributes = array(
                                                'name' => 'asal_rekening',
                                                'value' => set_value('asal_rekening', ''),
                                                'style' => 'width:100%'
                                            );
                                            echo form_input($form_attributes);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:120px">Nama Pemilik Rekening<font style="color:red">*</font><?php echo form_error('asal_nama'); ?></td>
                                    <td style="width:10px">:</td>
                                    <td>
                                        <?php
                                            $form_attributes = array(
                                                'name' => 'asal_nama',
                                                'value' => set_value('asal_nama', ''),
                                                'style' => 'width:100%'
                                            );
                                            echo form_input($form_attributes);
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:120px">Tanggal Pembayaran<font style="color:red">*</font><?php echo form_error('tanggal_bayar'); ?></td>
                                    <td style="width:10px">:</td>
                                    <td>
                                        <?php
                                            $form_attributes = array(
                                                'name' => 'tanggal_bayar',
                                                'type' => 'date',
                                                'value' => set_value('tanggal_bayar', ''),
                                                'style' => 'width:100%'
                                            );
                                            echo form_input($form_attributes);
                                        ?>
                                    </td>
                                </tr>
                            </table>
                            
                            <h6 style="color:red">* = wajib diisi</h6>
                            <center>
                                <script type="text/javascript">
                                    function konfirmasi_hapus(link) {
                                        var oke = confirm("Apakah Anda yakin membatalkan pengajuan promosi lowongan ini?");
                                        if (oke == true) {
                                            window.location = link;
                                        }
                                    }
                                </script>
                                <?php 
                                    $link = base_url() . 'promosi/batal_ajukan/' . $promosi['id_lowongan'];
                                    echo '<a href="javascript:;" onclick="konfirmasi_hapus(';
                                    echo "'$link'";
                                    echo ')" class="span4 button">Batalkan Pengajuan</a>'; 
                                ?>
                                <a class="span4 button default" href ="javascript:;" onclick="document.getElementById('verifikasi').submit()">Verifikasi Pembayaran</a>
                            </center>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
        
        
        <?php include('footer_view.php'); ?>