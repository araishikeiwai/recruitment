<?php include('header_view_0.php'); ?>
    <title>History Lowongan</title>
	<?php include('header_view.php'); ?>
		<div class="page [secondary] with-sidebar">
			<?php include('promosi_view.php'); ?>
			<div class="page-region" >
				<div class="page-region-content">
					<div class="grid">
						<div class="row">
							<h3>History Lowongan Sebagai Provider<h3>
							<table id="myTable" class="striped hovered">
								<thead>
									<td id="title">
										Judul
									</td>
									<td id="title">
										Tipe
									</td>
									<td id="title">
										Status
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
                                                        <?php echo $row[$i]['status']; ?>
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
							<br>
							<br>
							<div class="span12 bg-color-red">
								<?php echo '<a href="' . base_url() . 'profil">'; ?>
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