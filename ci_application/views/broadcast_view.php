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

    <title>Kirim Broadcast</title>

    <?php include('header_view.php'); ?>
        
         <div class="page [secondary] with-sidebar">

            <?php include('promosi_view.php'); ?>

            <div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row">
                            <div class="span12">
                                <h3>Kirim Broadcast</h3>
                                <table id="hidden">
                                     <?php
                                        //echo validation_errors();
                                        $form_attributes = array('id' => 'tulis_pesan_broadcast');
                                        $hidden = array (
                                            'pengirim' => $this -> session -> userdata('username'),
                                            'id_lowongan' => $row['id_lowongan'],
                                        );
                                        echo form_open(base_url().'pesan/kirim_broadcast/', $form_attributes, $hidden);
                                    ?>
                                    <tr>
                                        <td>
                                            Subject
                                        </td>
                                        <td>
                                            <?php
                                                $form_attributes = array(
                                                    'id' => 'subject',
                                                    'name' => 'subject',
                                                    'value' => set_value('subject'),
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

                                <script type="text/javascript">
                                    function validasi_subject() {
                                        var sub = document.getElementById('subject').value;
                                        if (sub.trim() == '') {
                                            alert('Subject tidak boleh kosong!');
                                        } else {
                                            document.getElementById('tulis_pesan_broadcast').submit();
                                        }
                                    }
                                </script>

                                <div class="span6 bg-color-red">
                                    <?php echo '<a href="' . base_url() . 'lowongan/lihat/' . $row['id_lowongan'] . '">'; ?>
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
                                    <a href ="javascript:;" onclick="validasi_subject()">
                                    <button class="shortcut span6">
                                        <span class="icon">
                                            <i class="icon-broadcast"></i>
                                        </span>
                                        <span class="label">
                                            Broadcast
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