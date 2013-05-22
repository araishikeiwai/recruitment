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
							<h3>Hasil Pencarian<h3>
							<table id="myTable" class="striped hovered">
								<thead>
									<td id="title">
										Judul Lowongan
									</td>
									<td id="title">
										Tipe Lowongan
									</td>
                                    <td id="title">
                                        Tanggal Tutup
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
            										<td style="width:500px">
            											<?php echo lowongan_link($row[$i]['id_lowongan'], $row[$i]['judul']); ?>
            										</td>
            										<td>
            											<?php echo $row[$i]['tipe']; ?>
            										</td>
                                                    <td>
                                                        <?php echo convert_date($row[$i]['tgl_tutup']); ?>
                                                    </td>
            									</tr>
                                    <?php } } ?>
								</tbody>
							</table>
                            <center>
                                <div class="toolbar-group pager">
                                    <center>
                                        <a href='#' alt='First' class='firstPage big bg-color-white'>Hal Pertama</a>
                                        <button href='#' alt='Previous' class="prevPage big bg-color-white"><i class="icon-arrow-left-3"></i></button>
                                        <span class='currentPage'></span> dari <span class='totalPages'></span>
                                        <button href='#' alt='Next' class="nextPage big bg-color-white"><i class="icon-arrow-right-3"></i></button>
                                        <a href='#' alt='Last' class='lastPage big bg-color-white'>Hal Terakhir</a>
                                    </center>
                                </div>
                                <script>
                                    $(document).ready(function () {
                                    $('#myTable').paginateTable({ rowsPerPage: 8 });
                                    });
                                </script>
                            </center>
						</div>
					
					</div>

				</div>
			</div>
		</div>	
		
		
		<?php include('footer_view.php'); ?>