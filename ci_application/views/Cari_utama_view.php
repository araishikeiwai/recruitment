    <?php include('header_view_0.php'); ?>

    <title>Pencarian</title>

    <?php include('header_view.php'); ?>
        
         <div class="page [secondary] with-sidebar">

            <?php include('promosi_view.php'); ?>

            <div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row">
                            <div class="span8">
                                <h3>Pencarian</h3>
                                
                                <?php 
                                    $form_attributes = array('id' => 'cari');
                                    echo form_open(base_url().'cari/cari_hasil', $form_attributes);
                                ?>

                                <div class="input-control text">
                                    <input type="text" name="judul" placeholder="Cari judul lowongan..."/>
                                    <a href="javascript:;" onclick="document.getElementById('cari').submit()"><button class="btn-search"></button></a>
                                </div>
                                
                            </div>
                            <div class="span6 bg-color-white">                              
                            </div>
                            <div class="span2">
                                <a class="span2 button default" href="<?php echo base_url(); ?>cari/semua">Lihat Semua
                                </a>
                            </div>
                            <div class="span6 bg-color-white">                              
                            </div>
                            <div class="span2">
                                <a class="span2 button default" href="<?php echo base_url(); ?>cari/cari_lanjut">Pencarian Lanjutan
                                </a>
                            </div>
                        </div>
                    
                    </div>

                </div>
            </div>
        </div>  
        
        
        <?php include('footer_view.php'); ?>