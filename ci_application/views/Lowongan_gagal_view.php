    <?php include('header_view_0.php'); ?>

    <title>Gagal Mendaftar Lowongan</title>
    
    <?php include('header_view.php'); ?>
        
         <div class="page [secondary] with-sidebar">

            <?php include('promosi_view.php'); ?>

            <div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row">
                            <div class="span12">
                                <h3>Gagal Mendaftar Lowongan</h3>
                                <h5>
                                    Hal ini dapat disebabkan karena:
                                    <ul>
                                        <li>Data diri Anda belum lengkap, silakan lengkapi profil dan CV Anda, atau</li>
                                        <li>Anda tidak memenuhi syarat lowongan yang diminta, atau</li>
                                        <li>Lowongan sudah ditutup</li>
                                    </ul>
                                </h5>
                                <a href="<?php echo base_url() . 'lowongan/lihat/' . $row['id_lowongan'] ?>"><h5>Klik di sini untuk kembali ke halaman lowongan</h5></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        
        <?php include('footer_view.php'); ?>