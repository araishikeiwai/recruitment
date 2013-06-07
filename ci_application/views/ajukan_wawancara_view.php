    <?php include('header_view_0.php'); ?>
<!--    
- View - Ajukan Wawancara
-  
- Halaman pengisian jadwal wawancara suatu lowongan
-
- @author Nur Ulul Asman, Ricky Arifandi Daniel
- @copyright recrUItment, 24-Apr-2013
- @version 1.1.0.2
-->
    <title>Ajukan Wawancara</title>

    <?php include('header_view.php'); ?>

         <div class="page [secondary] with-sidebar">

            <?php include('promosi_view.php'); ?>

            <div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row">
                            <div class="span12">
                                <h3>Jadwal Wawancara yang Disediakan</h3>
                                    <table id="hidden">

                                        <?php
                                            if (validation_errors()) {
                                                echo "<p style='color:red'>Terdapat kesalahan, tambahkan baris secara manual</p>";
                                            }
                                            echo validation_errors();
                                            $form_attributes = array('id' => 'ajukan_wawancara');
                                            $hidden = array(
                                                'id_lowongan' => $row['id_lowongan']
                                            );
                                            echo form_open(base_url().'lowongan/ajukan/3', $form_attributes, $hidden);
                                        ?>
                                        <tbody id="jadwal">
                                            <tr>
                                                <td>
                                                    Tanggal Wawancara
                                                </td>
                                                <td>
                                                    Waktu Wawancara
                                                </td>
                                            </tr>
                                            <tr>
                                                <?php if (isset($wawancara[0])) { ?>
                                                    <td>
                                                        <input style="width:100%" type="date" name="tanggal[]" value="<?php echo set_value('tanggal[]', $wawancara[0]['tanggal']) ?>"/>
                                                    </td>
                                                    <td>
                                                        <input style="width:100%" type="time" name="waktu[]" value="<?php echo set_value('waktu[]', $wawancara[0]['waktu']) ?>"/>
                                                    </td>
                                                <?php } else { ?>
                                                    <td>
                                                        <input style="width:100%" type="date" name="tanggal[]" value="<?php echo set_value('tanggal[]') ?>"/>
                                                    </td>
                                                    <td>
                                                        <input style="width:100%" type="time" name="waktu[]" value="<?php echo set_value('waktu[]') ?>"/>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                            <?php
                                                for ($i = 1; $i < 1000; $i++) {
                                                    if ($i + 1 <= $jml_wawancara) {
                                                        echo '<tr id="row' . $i . '"><td>';
                                                    } else {
                                                        echo '<tr id="row' . $i . '" hidden><td>';
                                                    }
                                                    if (isset($wawancara[$i])) {
                                                        echo '<input style="width:100%" type="date" name="tanggal[]"  value="' . set_value('tanggal[]', $wawancara[$i]['tanggal']) . '"/></td><td>';
                                                        echo '<input style="width:100%" type="time" name="waktu[]"  value="' . set_value('waktu[]', $wawancara[$i]['waktu']) . '"/></td></tr>';
                                                    } else {
                                                        echo '<input style="width:100%" type="date" name="tanggal[]"  value="' . set_value('tanggal[]') . '"/></td><td>';
                                                        echo '<input style="width:100%" type="time" name="waktu[]"  value="' . set_value('waktu[]') . '"/></td></tr>';
                                                    }
                                                }
                                            ?>
                                        <tbody>
                                        <input type="hidden" name="jml_wawancara" id="jml_wawancara" value="<?php echo $jml_wawancara ?>"/>
                                        <?php echo form_close(); ?>
                                    </table>

                                    <table id="hidden">
                                        <tr>
                                            <script type="text/javascript">
                                                function tambahJadwal() {
                                                    var num = document.getElementById('jml_wawancara').value;
                                                    if (num < 1000) {
                                                        num = num * 1;
                                                        document.getElementById('row' + num).removeAttribute('hidden');
                                                        num = num * 1;
                                                        num = num + 1;
                                                        document.getElementById('jml_wawancara').value = num;
                                                    }
                                                }

                                                function hapusJadwal() {
                                                    var num = document.getElementById('jml_wawancara').value;
                                                    if (num > 1) {
                                                        num = num * 1;
                                                        num = num - 1;
                                                        document.getElementById('row' + num).setAttribute('hidden', 'true');
                                                        num = num * 1;
                                                        document.getElementById('jml_wawancara').value = num;
                                                    }
                                                }
                                            </script>
                                            <td valign="top" colspan="1">
                                                <a class="span6 button" href ="javascript:;" onclick="tambahJadwal()">Tambah Jadwal Baru</a>
                                            </td>
                                            <td valign="top" colspan="2">
                                                <a class="span6 button" href ="javascript:;" onclick="hapusJadwal()">Hapus Jadwal Terakhir</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <a class="span12 button default" href ="javascript:;" onclick="document.getElementById('ajukan_wawancara').submit()">Simpan</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        
       <?php include('footer_view.php'); ?>