    <?php include('header_view_0.php'); ?>

    <title>Petunjuk Promosi Lowongan</title>
    
    <?php include('header_view.php'); ?>
        
         <div class="page [secondary] with-sidebar">

            <?php include('promosi_view.php'); ?>

            <div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row">
                            <div class="span12">
                                <p>
                                    <?php
                                        for ($i = 0; $i < count($row); $i++) {
                                            if ($row[$i]['id_promosi'] == $id_promosi) {
                                                $row = $row[$i];
                                                break;
                                            }
                                        }
                                    ?>
                                    Anda telah memilih paket <?php echo $id_promosi ?> untuk promosi lowongan Anda.<br/>
                                    <br/>
                                    Berikut langkah-langkah yang harus Anda lakukan selanjutnya:<br/>
                                    <ol>
                                        <li>
                                            Transfer sejumlah Rp <?php echo $row['biaya_promosi'] ?> ke salah satu rekening di bawah ini:
                                            <ul>
                                                <li>BNI 0204 208 048 (a/n Ricky Arifandi Daniel Ganteng)</li>
                                                <li>BCA 8050 143 628 (a/n Ricky Arifandi Daniel Tampan)</li>
                                            </ul>
                                        </li>
                                        <li>
                                            Konfirmasi melalui halaman lowongan
                                        </li>
                                        <li>
                                            Ditampilin deh wokwokwokowkwokwokw
                                        </li>
                                    </ol>
                                </p>
                                <center>
                                    <a class="span6 button" href="<?php echo base_url(); ?>lowongan/lihat/<?php echo $id_lowongan ?>">Batal</a>
                                    <a class="span6 button default" href="<?php echo base_url() ?>promosi/ajukan/<?php echo $id_lowongan ?>/2/<?php echo $id_promosi ?>">Setuju dan Lanjutkan</a>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        
        <?php include('footer_view.php'); ?>