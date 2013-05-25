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
                            <div class="span12">
                                <h3>Kirim pesan</h3>
                                <table id="hidden">
                                     <?php
                                            //echo validation_errors();
                                            $form_attributes = array('id' => 'tulis_pesan');
                                            $hidden = array (
                                                'pengirim' => $this -> session -> userdata('username'),
                                                'penerima' => $row['pengirim'],
                                            );
                                            echo form_open(base_url().'pesan/kirim/', $form_attributes, $hidden);
                                        ?>
                                    <tr>
                                        <td>
                                            Kepada
                                        </td>
                                        <td>
                                            <?php echo $row['pengirim']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Subject
                                        </td>
                                        <td>
                                            <?php
                                                $form_attributes = array(
                                                    'name' => 'subject',
                                                    'value' => set_value('subject', 'Re: '.$row['subject']),
                                                    'placeholder' => 'Subject here...',
                                                    'style' => 'width:100%'
                                                );
                                                echo form_input($form_attributes);
                                            ?>
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
                                            <?php
                                                $form_attributes = array(
                                                    'name' => 'isi',
                                                    'value' => set_value('isi'),
                                                    'style' => 'width:100%'
                                                );
                                                echo form_textarea($form_attributes);
                                            ?>
                                        </td>
                                    </tr>
                                    <?php echo form_close(); ?>
                                </table>

                                <div class="span6 bg-color-red">
                                    <?php
                                        echo '<a href="'. base_url() . 'pesan/lihat/' . $row['id_pesan'] . '">';
                                    ?>
                                    <button class="shortcut span6">
                                        <span class="icon">
                                            <i class="icon-cancel-2"></i>
                                        </span>
                                        <span class="label">
                                            Batal
                                        </span>
                                    </button>
                                    </a>
                                </div>



                                <div class="span6 bg-color-green">
                                    <a href ="javascript:;" onclick="document.getElementById('tulis_pesan').submit()">
                                    <button class="shortcut span6">
                                        <span class="icon">
                                            <i class="icon-checkmark"></i>
                                        </span>
                                        <span class="label">
                                            Simpan
                                        </span>
                                    </button>
                                    </a>
                                </div>

                                
                            </div>
                            
                        </div>
                    
                    </div>

                </div>
            </div>
        </div>
        
        
        <?php include('footer_view.php'); ?>