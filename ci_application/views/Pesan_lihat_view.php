    <?php include('header_view_0.php'); ?>
<!--    
- View - Cari
-  
- Halaman hasil pencarian lowongan
-
- @author Nur Ulul Asman, Ricky Arifandi Daniel, Ahmad Faruq Waqfi
- @copyright recrUItment, 24-Apr-2013
- @version 1.1.0.2
-->

    <title>Hasil Pencarian</title>

    <?php include('header_view.php'); ?>
        
         <div class="page [secondary] with-sidebar">

            <?php include('promosi_view.php'); ?>

            <div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row">
                            <div class="span12">
                                <h3>Isi pesan</h3>
                                <table id="hidden">
                                    <tr>
                                        <td>
                                            Kepada
                                        </td>
                                        <td>
                                            <?php echo $row[0]['penerima']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Subject
                                        </td>
                                        <td>
                                            <div style="width:100%">
                                                <?php echo $row[0]['subject']; ?>
                                            <div>
                                        </td>
                                    </tr>
                                </table>
                                <table id="hidden">
                                    <tr>
                                        <td>
                                            <h4>Isi Pesan</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div>
                                                <?php echo $row[0]['isi']; ?>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <div class="span6 bg-color-red">
                                    <?php 
                                        echo '<a href="' . base_url() . 'pesan/daftar_pesan/' . $this -> session -> userdata('username') . '">'; 
                                    ?>
                                    <button class="shortcut span6">
                                        <span class="icon">
                                            <i class="icon-undo"></i>
                                        </span>
                                        <span class="label">
                                            Kembali
                                        </span>
                                    </button>
                                </div>
                                <div class="span6 bg-color-green">
                                    <?php 
                                        echo '<a href="' . base_url() . 'pesan/tulis/' . $row[0]['pengirim'] . '/'. $row[0]['id_pesan']. '">'; 
                                    ?>
                                    <button class="shortcut span6">
                                        <span class="icon">
                                            <i class="icon-arrow-right-2"></i>
                                        </span>
                                        <span class="label">
                                            Balas
                                        </span>
                                    </button>
                                    </div>
                            </div>
                            
                        </div>
                    
                    </div>

                </div>
            </div>
        </div>
        
        
        <?php include('footer_view.php'); ?>