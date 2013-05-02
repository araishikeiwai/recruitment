<!--    
- View - Home
-  
- Halaman login sistem
-
- @author Nur Ulul Asman, Ricky Arifandi Daniel
- @copyright recrUItment, 24-Apr-2013
- @version 1.2.0.0
-->
<!DOCTYPE html>
<html>
  <head>
    <title>recrUItment</title>
    <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1">
    
    <?php include('jscss.php'); ?>

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
                    <div class="span4 bg-color-red">
                        <center><h2 class="fg-color-black">Login</h2></center>
                        <center>
                            <?php
                                $form_attributes = array('style' => 'width:80%');
                                echo form_open(base_url().'authentication/start_session', $form_attributes);

                                echo "<div class='input-control text'>";
                                $username_attributes = array('name' => 'username',
                                                             'placeholder' => 'Username');
                                echo form_input($username_attributes);
                                echo "</div>";

                                echo "<div class='input-control password'>";
                                $password_attributes = array('name' => 'password',
                                                             'placeholder' => 'Password');
                                echo form_password($password_attributes);
                                echo "</div>";

                                echo '<span style="color:white; font-size:12px">';
                                if ($error_message == 'username') {
                                    echo 'Username Anda tidak terdaftar di LDAP UI<br/><br/>';
                                } else if ($error_message == 'password') {
                                    echo 'Password Anda salah<br/><br/>';
                                } else if ($error_message == 'koneksi') {
                                    echo 'Terdapat masalah koneksi LDAP UI<br/><br/>';
                                }
                                echo '</span>';

                                echo form_submit('login', 'Login');

                                echo form_close();

                            ?>
                        </center>
            
                    </div>
                    
                    
                    <div class=" span8 bg-color-bleLight">
                        
                        <h2 class="fg-color-black">Selamat Datang</h2>
                        <p>recrUItment adalah sebuah sistem informasi berbasis web yang bertujuan untuk 
                            memudahkan sivitas akademika Universitas Indonesia untuk melakukan kegiatan 
                            pembukaan lamaran pekerjaan dan melamar pekerjaan.
                        </p>
                    </div>

                    
                </div>
            </div>

        </div>
        
        <?php include('footer_view.php'); ?>