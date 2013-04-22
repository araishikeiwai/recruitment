    <?php include('header_view_0.php'); ?>

    <title>Ajukan Lowongan</title>

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
                                                <td>
                                                    <input style="width:100%" type="date" name="tanggal0" value="<?php echo set_value('tanggal0') ?>"/>
                                                </td>
                                                <td>
                                                    <input style="width:100%" type="time" name="waktu0" value="<?php echo set_value('waktu0') ?>"/>
                                                </td>
                                            </tr>
                                            <?php
                                                for ($i = 1; $i < 1000; $i++) {
                                                    echo '<tr id="row' . $i . '" hidden><td>';
                                                    echo '<input style="width:100%" type="date" name="tanggal' . $i . '"  value="' . set_value('tanggal' . $i) . '"/></td><td>';
                                                    echo '<input style="width:100%" type="time" name="waktu' . $i . '"  value="' . set_value('waktu' . $i) . '"/></td></tr>';
                                                }
                                            ?>
                                        <tbody>
                                        <input type="hidden" name="jml_wawancara" id="jml_wawancara" value="1"/>
                                        <?php echo form_close(); ?>
                                    </table>

                                    <table id="hidden">
                                        <tr>
                                            <script type="text/javascript">
                                                var count = 1;
                                                function tambahJadwal() {
                                                    if (count < 1000) {
                                                        document.getElementById('row' + count).removeAttribute('hidden');
                                                        count++;
                                                        document.getElementById('jml_wawancara').value = count;
                                                    }
                                                }

                                                function hapusJadwal() {
                                                    if (count > 1) {
                                                        count--;
                                                        document.getElementById('row' + count).setAttribute('hidden', 'true');
                                                        document.getElementById('jml_wawancara').value = count;
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