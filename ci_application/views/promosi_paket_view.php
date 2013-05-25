    <?php include('header_view_0.php'); ?>

    <title>Ajukan Promosi</title>
    
    <?php include('header_view.php'); ?>
        
         <div class="page [secondary] with-sidebar">

            <?php include('promosi_view.php'); ?>

            <div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row">
                            <div class="span12">
                                <h3>Pilih Paket Promosi</h3>
                                <ul class="listview image fluid">
                                    <?php
                                        for ($i = 0; $i < count($row); $i++) {
                                            echo '<a href="' . base_url() . 'promosi/ajukan/' . $id_lowongan . '/1' . '/' . $row[$i]['id_promosi'] . '">'; 
                                    ?>
                                                <li>
                                                    <h4>Paket <?php echo $row[$i]['id_promosi'] ?></h4>
                                                    <p>Durasi promosi lowongan: <b><?php echo $row[$i]['durasi_promosi'] ?> hari</b></p>
                                                    <p>Biaya promosi lowongan: <b>Rp <?php echo $row[$i]['biaya_promosi'] ?></b></p>
                                                </li>
                                            </a>
                                    <?php 
                                        }
                                    ?>

                                    <!-- <?php echo '<a href="' . base_url() . 'promosi/ajukan/' . $id_lowongan . '/1/1' . '">'; ?>
                                        <li>
                                            <h4>Paket 1</h4>
                                            <p>
                                                Durasi promosi lowongan: <b>3 hari</b>
                                            </p>
                                        </li>
                                    </a>
                                    <?php echo '<a href="' . base_url() . 'promosi/ajukan/' . $id_lowongan . '/1/2' . '">'; ?>
                                        <li>
                                            <h4>Paket 2</h4>
                                            <p>
                                                Durasi promosi lowongan: <b>1 minggu</b>
                                            </p>
                                        </li>
                                    </a>
                                    <?php echo '<a href="' . base_url() . 'promosi/ajukan/' . $id_lowongan . '/1/3' . '">'; ?>
                                        <li>
                                            <h4>Paket 3</h4>
                                            <p>
                                                Durasi promosi lowongan: <b>2 minggu</b>
                                            </p>
                                        </li>
                                    </a>
                                    <?php echo '<a href="' . base_url() . 'promosi/ajukan/' . $id_lowongan . '/1/4' . '">'; ?>
                                        <li>
                                            <h4>Paket 4</h4>
                                            <p>
                                                Durasi promosi lowongan: <b>1 bulan</b>
                                            </p>
                                        </li>
                                    </a> -->
                                </ul>

                                
                            </div>
                        </div>
                    
                    </div>

                </div>
            </div>
        </div>  
        
        
        <?php include('footer_view.php'); ?>