    <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1">
<!--    
- View - Header
-  
- Header tiap halaman
-
- @author Nur Ulul Asman, Ricky Arifandi Daniel
- @copyright recrUItment, 24-Apr-2013
- @version 1.1.0.2
-->
    <?php include('jscss.php') ?>
    
    <body class="metrouicss">
        <div class="page" >
            <div class="nav-bar">
                <div class="nav-bar-inner padding10 bg-color-orange">
                    <a href="<?php echo base_url(); ?>"><span class="element brand">
                    recrUItment
                    </span></a>

                    <div class="divider"></div> 

                </div>
            </div>
        </div>
        <div class="page" id="page-index">
            <div class="grid" style="margin-top:25px;">
                <div class="row">
                    <div class="span5 bg-color-white"> <p style="text-align:center;">
                        <h3>
                            <?php 
                                if ($this -> session -> userdata('nama') == '') {
                                    echo "Selamat datang, silakan lengkapi profil Anda";
                                } else {
                                    echo "Selamat datang, " . $this -> session -> userdata('nama');
                                }
                            ?>
                        </h3>
                    </div>
                    <div class="span3">
                        <a href='<?php echo base_url(); ?>cari' class="span3 button">Pencarian<span class="icon">
                            <i class="icon-search"></i>
                        </span></a>
                    </div>
                    <div class="span3">
                        <a href='<?php echo base_url(); ?>profil' class="span3 button">Profil<span class="icon">
                            <i class="icon-user-2"></i>
                        </span></a>
                    </div>
                    <div class="span2 bg-color-green">
                        <?php 
                            $username = $this -> session -> userdata('username');
                            echo '<a href="' . base_url() . 'pesan/daftar_pesan/">'; 
                        ?>
                        <button class="shortcut span2">
                            <span class="icon">
                                <i class="icon-mail"></i>
                            </span>
                            <span class="label">
                                Pesan
                            </span>
                            <span class="badge bg-color-green"><?php echo get_unread_message($this -> db, $this -> session -> userdata('username')) ?></span>
                        </button>
                    </div>
                    <div class="span2 bg-color-red">
                        <?php echo '<a href="' . base_url() . 'authentication/delete_session">'; ?>
                            <button class="shortcut span2">
                                <span class="icon">
                                    <i class="icon-exit"></i>
                                </span>
                                <span class="label">
                                    Logout
                                </span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        