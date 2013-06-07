    <?php include('header_view_0.php'); ?>
<!--    
- View - Review
-  
- Halaman pemberian review
-
- @author Nur Ulul Asman, Ricky Arifandi Daniel, Ahmad Faruq Waqfi
- @copyright recrUItment, 24-Apr-2013
- @version 1.1.0.2
-->

    <title>Beri Review</title>

    <?php include('header_view.php'); ?>
		
		 <div class="page [secondary] with-sidebar">

			<?php include('promosi_view.php'); ?>

			<div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row">
                            <div class="span12">
                                <h3>Isi Review</h3>
                                <table id="hidden">
                                    <?php
                                        //echo validation_errors();
                                        $form_attributes = array('id' => 'tulis_review');
                                        $hidden = array (
                                            'id_lowongan' => $row['id_lowongan'],
                                            'penerima' => $row['username'],
                                        );
                                        echo form_open(base_url().'lowongan/simpan_review/', $form_attributes, $hidden);
                                    ?>
                                    <tr>
                                        <td>
                                            Nama Seeker
                                        </td>
                                        <td>
                                            <?php echo pengguna_link($row['username'], $row['nama']);?>
                                        </td>
                                    </tr>
                                    
                                </table>
                                <table width="100" id="hidden">
                                    Nilai
                                        <div class="input-control select">
                                            <?php
                                                $options = array(1,2,3,4,5,6,7,8,9,10);
                                                echo form_dropdown('nilai', $options);
                                            ?>
                                        </div>
                                    <tr>
                                        <td>
                                            <h4>Isi Review</h4>
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
                                    <?php echo '<a href ="' . base_url() . 'lowongan/pendaftar/' . $row['id_lowongan'] . '">'; ?>
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
                                    <a href ="javascript:;" onclick="document.getElementById('tulis_review').submit()">
                                    <button class="shortcut span6">
                                        <span class="icon">
                                            <i class="icon-comments"></i>
                                        </span>
                                        <span class="label">
                                            Review
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