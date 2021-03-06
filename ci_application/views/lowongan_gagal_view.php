    <?php include('header_view_0.php'); ?>
<!--    
- View - Lowongan Gagal
-  
- Halaman berisi pesan gagal mendaftar pada suatu lowongan
-
- @author Nur Ulul Asman, Ricky Arifandi Daniel
- @copyright recrUItment, 6-Jun-2013
- @version 1.3.0.0
-->
    <title>Gagal</title>
    
    <?php include('header_view.php'); ?>
        
         <div class="page [secondary] with-sidebar">

            <?php include('promosi_view.php'); ?>

            <div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row">
                            <div class="span12">
                                <?php if ($error_message == 'promosi_full') { ?>
                                    <h3>Gagal Mengajukan Promosi</h3>
                                    <h5>Slot promosi yang tersedia sudah terisi penuh</h5>
                                    <a href="<?php echo base_url() . 'lowongan/lihat/' . $id_lowongan ?>"><h5>Klik di sini untuk kembali ke halaman lowongan</h5></a>
                                <?php } else if ($error_message == 'batal_pendaftar') { ?>
                                    <h3>Gagal Menghapus Lowongan</h3>
                                    <h5>Lowongan Anda telah didaftar oleh beberapa orang. Tidak bisa dihapus. Jika ingin menghapus, <a href="<?php echo base_url() ?>pesan/tulis/admin">kirim pesan ke Administrator</a> disertai alasan</h5>
                                <?php } else { ?>
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
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        
        <?php include('footer_view.php'); ?>