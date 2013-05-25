<!--    
- View - Main
-  
- Halaman utama sistem (halaman profil)
-
- @author Nur Ulul Asman, Ricky Arifandi Daniel
- @copyright recrUItment, 24-Apr-2013
- @version 1.1.0.2
-->
    <?php include('header_view_0.php'); ?>

    <title>Profil</title>

    <?php include('header_view.php'); ?>

         <div class="page [secondary] with-sidebar">

            <?php include('promosi_view.php'); ?>

            <div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                    <div class="row">
                        <div class="span3">
                            <div class="image-collection">
                                <div></div>
                            </div>
                                <?php if ($this -> session -> userdata('username') == $row['username']) { ?>
                                    <div>
                                        <?php if ($this -> session -> userdata('status') != 'admin') {
                                            echo '<a href="' . base_url() . 'cv">'; ?>
                                                <button class="shortcut span3">
                                                    <span class="icon">
                                                        <i class="icon-clipboard"></i>
                                                    </span>
                                                    <span class="label">
                                                        Lihat CV
                                                    </span>
                                                </button>
                                            </a>
                                        <?php } ?>
                                    </div>

                                    <div>
                                        <?php echo '<a href="' . base_url() . 'profil/ubah">'; ?>
                                            <button class="shortcut span3">
                                                <span class="icon">
                                                    <i class="icon-user-3"></i>
                                                </span>
                                                <span class="label">
                                                    Ubah Profil
                                                </span>
                                            </button>
                                        </a>
                                    </div>
                                <?php } else { ?>
                                    <div>
                                        <?php echo '<a href="' . base_url() . 'pesan/tulis/' . $row['username'] . '">'; ?>
                                        <button class="shortcut span3">
                                            <span class="icon">
                                                <i class="icon-mail"></i>
                                            </span>
                                            <span class="label">
                                                Kirim Pesan
                                            </span>
                                        </button>
                                        </a>
                                    </div>
                                <?php } ?>
                                
                                <div>
                                    <?php if ($this -> session -> userdata('status') == 'provider' && $this -> session -> userdata('username') == $row['username']) { ?>
                                        <?php echo '<a href="' . base_url() . 'lowongan/ajukan">'; ?>
                                            <button class="shortcut span3">
                                                <span class="icon">
                                                    <i class="icon-pencil"></i>
                                                </span>
                                                <span class="label">
                                                    Ajukan Lowongan
                                                </span>
                                            </button>
                                        </a>
                                    <?php } ?>
                                </div>

                                <div>
                                    <?php if ($this -> session -> userdata('status') == 'admin') { ?>
                                        <?php echo '<a href="' . base_url() . 'admin/moderasi">'; ?>
                                            <button class="shortcut span3">
                                                <span class="icon">
                                                    <i class="icon-pencil"></i>
                                                </span>
                                                <span class="label">
                                                    Moderasi Lowongan
                                                </span>
                                            </button>
                                        </a>
                                    <?php } ?>
                                </div>
                                
                                <div>
                                    <?php echo '<a href="' . base_url() . 'lowongan/history_seeker">'; ?>
                                        <button class="shortcut span3">
                                            <span class="icon">
                                                <i class="icon-user-2"></i>
                                            </span>
                                            <span class="label">
                                                History Lowongan<br> 
                                                Seeker
                                            </span>
                                        </button>
                                    </a>
                                </div>
                                <div>
                                    <?php if ($this -> session -> userdata('status') == 'provider' && $this -> session -> userdata('username') == $row['username']) { ?>
                                    <?php echo '<a href="' . base_url() . 'lowongan/history_provider">'; ?>
                                        <button class="shortcut span3">
                                            <span class="icon">
                                                <i class="icon-user-3"></i>
                                            </span>
                                            <span class="label">
                                                History Lowongan<br> 
                                                Provider
                                            </span>
                                        </button>
                                    </a>
                                    <?php } ?>
                                </div>
                                
                                

                        </div>
                        <div class="span5">
                            
                            <h3 style="font-weight: 700;">Data Pribadi</h3>
                            <table id="hidden">
                            <?php if ($this -> session -> userdata('username') == $row['username']) { ?>
                                <tr>
                                    <td id="t_head">Username</td>
                                    <td id="identitas"><?php echo $row['username']; ?></td>
                                </tr>
                                <tr>
                                    <td id="t_head">Status</td>
                                    <td id="identitas"><?php echo $row['status']; ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td id="t_head">Nama</td>
                                <td id="identitas"><?php echo $row['nama']; ?></td>
                            </tr>
                            <tr>
                                <td id="t_head">Fakultas</td>
                                <td id="identitas"><?php echo $row['fakultas']; ?></td>
                            </tr>
                            <tr>
                                <td id="t_head">Role/Angkatan</td>
                                <td id="identitas"><?php echo $row['role']; ?></td>
                            </tr>
                            <tr>
                                <td id="t_head">Email</td>
                                <td id="identitas"><?php echo $row['email']; ?></td>
                            </tr>
                            </table>
                        </div>
                        <div class="span4">
                            <div class="span4">
                                <center class="bg-color-green">
                                    <h3 >Badges<h3><br/>
                                </center>
                                    <div class="rating" data-role="rating" data-param-vote="off" data-param-rating="3.7" data-param-stars="11">
                                    </div>
                                
                            </div>
                            <div class="span4 bg-color-orange">
                                <center><h3>Review<h3></center>
                            </div>
                            <!-- <div class="bg-color-yellow"> -->
                                <?php 
                                    if(count($review) > 0) {
                                        for($i = 0; $i < count($review); $i++) {
                                            echo 'dari ' . pengguna_link($review[$i]['username'], $review[$i]['nama']);
                                            echo ' pada lowongan ' . lowongan_link($review[$i]['id_lowongan'], $review[$i]['judul']) . ':<br />';
                                            echo '<em>' .$review[$i]['isi'] . '</em>';
                                            echo 'Nilai : ' . $review[$i]['nilai'] . ' dari 10<br />';
                                            echo '__________________________<br />';
                                        }
                                    } else {
                                        echo 'Belum memiliki review';
                                    }
                                ?>
                            <!-- </div> -->
                        </div>
                        
                        
                    </div>
                    
                </div>

            </div>
        </div>
        
        
        <?php include('footer_view.php'); ?>