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
                                <h3>Kirim pesan</h3>
                                <table id="hidden">
                                    <tr>
                                        <td>
                                            Kepada
                                        </td>
                                        <td>
                                            <?php echo $row; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Subject
                                        </td>
                                        <td>
                                            <input style="width:100%" type="text" placeholder="No Subject"/>
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
                                            <div class="input-control textarea">
                                            <textarea></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <div class="span6 bg-color-red">
                                    <button class="shortcut span6">
                                        <span class="icon">
                                            <i class="icon-cancel-2"></i>
                                        </span>
                                        <span class="label">
                                            Batal
                                        </span>
                                    </button>
                                </div>
                                <div class="span6 bg-color-green">
                                    <button class="shortcut span6">
                                        <span class="icon">
                                            <i class="icon-checkmark"></i>
                                        </span>
                                        <span class="label">
                                            Kirim
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