    <?php include('header_view_0.php'); ?>
<!--    
- View - List Pendaftar
-  
- Halaman berisi pendaftar suatu lowongan
-
- @author Nur Ulul Asman, Erryan Sazany, Ricky Arifandi Daniel
- @copyright recrUItment, 24-Apr-2013
- @version 1.1.0.2
-->
    <title>Daftar Pendaftar</title>

    <?php include('header_view.php'); ?>

         <div class="page [secondary] with-sidebar">

            <?php include('promosi_view.php'); ?>

            <div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row">
                            <h3>Daftar Pendaftar<h3>
                            
                            <table id="myTable" class="striped hovered">
                                <thead>
                                    <td id="title">
                                        Nama Pendaftar
                                    </td>
                                    <td id="title">
                                        CV
                                    </td>
                                    <td id="title">
                                        Fakultas
                                    </td>
                                    <td id="title">
                                        Status
                                    </td>
                                </thead>
                                    
                                <tbody>
                                    <?php if (count($row['pendaftar']) == 0) { ?>
                                            <tr>
                                                <td colspan="4">
                                                    Belum ada pendaftar.
                                                </td>
                                            </tr>
                                    <?php } else { 
                                        $form_attributes = array('id' => 'lihat_pendaftar');
                                        $hidden = array('id_lowongan' => $row['lowongan']['id_lowongan']);
                                        echo form_open(base_url().'lowongan/ubah_pendaftar', $form_attributes, $hidden);

                                        for($i = 0; $i < count($row['pendaftar']); $i++) { ?>
                                        <tr>
                                            <td>
                                                <?php echo pengguna_link($row['pendaftar'][$i]['username'], $row['pendaftar'][$i]['nama']); ?>
                                            </td>
                                            <td>
                                                <?php echo cv_link($row['pendaftar'][$i]['username'], $row['lowongan']['id_lowongan']); ?>
                                            </td>
                                            <td>
                                                <?php echo $row['pendaftar'][$i]['fakultas']; ?>
                                            </td>
                                            <td>
                                                <div class="input-control select">
                                                    <?php
                                                        $options = array(
                                                            'melamar' => 'Melamar',
                                                            'diterima' => 'Diterima',
                                                            'ditolak' => 'Ditolak'
                                                        );
                                                        echo form_dropdown('pendaftar[]', $options, $row['pendaftar'][$i]['status_pendaftaran']);
                                                        echo form_hidden('helper_username[]', $row['pendaftar'][$i]['username']);
                                                    ?>
                                                </div>
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
                                    $('#myTable').paginateTable({ rowsPerPage: 5 });
                                    });
                                </script>
                            </center>
                            <?php if (count($row['pendaftar']) == 0) { ?>
                                <div class="span12 bg-color-red">
                                    <a href="<?php echo base_url() ?>lowongan/lihat/<?php echo $row['lowongan']['id_lowongan'] ?>">
                                        <button class="shortcut span12">
                                            <!--<span class="icon">
                                                <i class="icon-cancel-2"></i>
                                            </span>-->
                                            <span class="label">
                                                Kembali
                                            </span>
                                        </button>
                                    </a>
                                </div>
                            <?php } else { ?>
                                <div class="span12 bg-color-green">
                                    <a href="javascript:;" onclick="document.getElementById('lihat_pendaftar').submit()">
                                        <button class="shortcut span12">
                                            <span class="icon">
                                                <i class="icon-checkmark"></i>
                                            </span>
                                            <span class="label">
                                                Simpan
                                            </span>
                                        </button>
                                    </a>
                                </div>
                            <?php } echo form_close(); ?>
                            
                        </div>
                    
                    </div>

                </div>
            </div>
            
<?php include('footer_view.php'); ?>