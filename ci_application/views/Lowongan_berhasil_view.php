    <?php include('header_view_0.php'); ?>

    <title>Berhasil Mendaftar Lowongan</title>
    
    <?php include('header_view.php'); ?>
        
         <div class="page [secondary] with-sidebar">

            <?php include('promosi_view.php'); ?>

            <div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row">
                            <div class="span12">
                                <h3>Berhasil Mendaftar Lowongan</h3>
                                <h5>Anda akan dikembalikan ke halaman lowongan dalam 3 detik</h5>
                                <meta http-equiv="REFRESH" content="3;url=<?php echo base_url() . 'lowongan/lihat/' . $row['id_lowongan'] ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        
        <?php include('footer_view.php'); ?>