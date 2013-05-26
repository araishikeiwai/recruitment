    <?php include('header_view_0.php'); ?>
    
    <title>Lihat Pesan</title>

    <?php include('header_view.php'); ?>
        
         <div class="page [secondary] with-sidebar">

            <?php include('promosi_view.php'); ?>

            <div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row">
                            <div class="span12">
                                <h3>Lihat pesan</h3>
                                <table id="hidden">
                                    <tr>
                                        <td style="width:120px">
                                            Pengirim:
                                        </td>
                                        <td>
                                            <?php echo $row[0]['pengirim']; ?>
                                        </td>
                                    </tr><tr>
                                        <td style="width:120px">
                                            Penerima:
                                        </td>
                                        <td>
                                            <?php echo $row[0]['penerima']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:120px">
                                            Subject:
                                        </td>
                                        <td>
                                            <div style="width:100%">
                                                <?php echo $row[0]['subject']; ?>
                                            <div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:120px">
                                            Waktu Kirim:
                                        </td>
                                        <td>
                                            <div style="width:100%">
                                                <?php echo convert_timestamp($row[0]['waktu']); ?>
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

                                <?php 
                                    if ($row[0]['penerima'] == $this -> session -> userdata('username')) {
                                        $span = 6;
                                    } else {
                                        $span = 12;
                                    }
                                ?>


                                <div class="span<?php echo $span ?> bg-color-red">
                                    <?php 
                                        echo '<a href="' . base_url() . 'pesan/daftar_pesan/">'; 
                                    ?>
                                    <button class="shortcut span<?php echo $span ?>">
                                        <span class="icon">
                                            <i class="icon-undo"></i>
                                        </span>
                                        <span class="label">
                                            Kembali
                                        </span>
                                    </button>
                                </a>
                                </div>
                                <?php if($row[0]['penerima'] == $this->session->userdata('username')) {?>
                                <div class="span6 bg-color-green">
                                    <?php 
                                        echo '<a href="' . base_url() . 'pesan/balas/' . $row[0]['pengirim'] . '/'. $row[0]['id_pesan'].'">'; 
                                    ?>
                                    <button class="shortcut span6">
                                        <span class="icon">
                                            <i class="icon-arrow-right-2"></i>
                                        </span>
                                        <span class="label">
                                            Balas
                                        </span>
                                    </button>
                                </a>
                                </div>
                                <?php }?>

                            </div>
                            
                        </div>
                    
                    </div>

                </div>
            </div>
        </div>
        
        
        <?php include('footer_view.php'); ?>