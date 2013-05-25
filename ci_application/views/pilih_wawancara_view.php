<!--    
- View - Pilih Wawancara
-  
- Halaman pemilihan jadwal wawancara bagi pendaftar
-
- @author Nur Ulul Asman, Ricky Arifandi Daniel
- @copyright recrUItment, 24-Apr-2013
- @version 1.1.0.2
-->
    <?php include('header_view_0.php'); ?>

    <title>Pilih Jadwal Wawancara</title>

    <?php include('header_view.php'); ?>
        
         <div class="page [secondary] with-sidebar">

            <?php include('promosi_view.php'); ?>

            <div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row">
                            <div class="span12">
                                <h3>Isi Jadwal Wawancara</h3>
                                
                                
                                <table id="hidden">
                                    
                                    <tr>
                                        <td style="width:80%">
                                            Isi Daftar Wawancara
                                        </td>
                                        <td>
                                            <div class="input-control select">
                                                <?php
                                                    $form_attributes = array('id' => 'isi_wawancara');
                                                    echo form_open(base_url() . 'lowongan/simpan_jadwal/' . $row['lowongan']['id_lowongan'], $form_attributes);
                                                    $options = array();
                                                    for ($i = 0; $i < count($row['wawancara']); $i++) {
                                                        if ($row['wawancara'][$i]['peserta'] == '') {
                                                            $options[$row['wawancara'][$i]['tanggal'] . ' ' . $row['wawancara'][$i]['waktu']] = convert_date($row['wawancara'][$i]['tanggal']) . ' ' . convert_time($row['wawancara'][$i]['waktu']);
                                                        }   
                                                    }
                                                    echo form_dropdown('jadwal', $options);
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                </table>
                                    
                                    <div class="span12 bg-color-green">
                                        <a href="javascript:;" onclick="document.getElementById('isi_wawancara').submit()">
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
                                
                            </div>
                            
                        </div>
                    
                    </div>

                </div>
            </div>
        </div>  
        
        
        <?php include('footer_view.php'); ?>