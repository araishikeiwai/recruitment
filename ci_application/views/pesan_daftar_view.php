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

    <title>Daftar Pesan</title>

    <?php include('header_view.php'); ?>
		
		 <div class="page [secondary] with-sidebar">

			<?php include('promosi_view.php'); ?>

			<div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row">
                            <h3>Daftar Pesan<h3>
                            <table id="myTable" class="striped hovered">
                                <thead>
                                    <td id="title" style="width:220px">
                                        Pengirim
                                    </td>
                                    <td id="title" style="width:500px">
                                        Subject
                                    </td>
                                    <td id="title">
                                        Waktu Kirim
                                    </td>
                                </thead>
                                    

                                <tbody>
                                     <?php if (count($row) == 0) { ?>
                                     <tr>
                                            <td colspan="3">
                                                Tidak Ada Data!
                                            </td>
                                        </tr>
                                    <?php } else {
                                        for ($i = 0; $i < count($row); $i++) { ?>
                                        <tr>
                                            <?php
                                                if ($row[$i]['status'] == 'unread') {
                                                    $post = ' <b><i>(belum dibaca)</i></b>';
                                                } else {
                                                    $post = '';
                                                }
                                            ?>
                                            <td>
                                                <?php 
                                                    $pengirim[$i] = $pengirim[$i] -> row_array();
                                                    echo pengguna_link($row[$i]['pengirim'], $pengirim[$i]['nama']);
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo pesan_link($row[$i]['id_pesan'], $row[$i]['subject']) . $post ?>
                                            </td>
                                            <td>
                                                <?php echo convert_timestamp($row[$i]['waktu']); ?>
                                            </td>                                        
                                        </tr>
                                    <?php } } ?>
                                </tbody>

                            </table>
                            <center>
                                <div class="toolbar-group pager">
                                    <button href='#' alt='Previous' class="prevPage big bg-color-white">
                                        <i class="icon-arrow-left-3"></i>
                                    </button>
                                    <button href='#' alt='Next' class="nextPage big bg-color-white"><i class="icon-arrow-right-3"></i></button>
                                </div>
                                <script>
                                    $(document).ready(function () {
                                    $('#myTable').paginateTable({ rowsPerPage: 5 });
                                    });
                                </script>
                            </center>
                            <div class="span12 bg-color-red">
                                <?php 
                                    echo '<a href="' . base_url() .'">'; 
                                ?>
                                <button class="shortcut span12">
                                    <span class="icon">
                                        <i class="icon-undo"></i>
                                    </span>
                                    <span class="label">
                                        Kembali
                                    </span>
                                </button>
                            </div>
                            
                            
                        </div>
                    
                    </div>

                </div>
            </div>
        </div>
		
		
		<?php include('footer_view.php'); ?>