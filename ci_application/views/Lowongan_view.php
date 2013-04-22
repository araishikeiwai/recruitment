    <?php include('header_view_0.php'); ?>

    <title>Lihat Lowongan</title>
    
    <?php include('header_view.php'); ?>
        
         <div class="page [secondary] with-sidebar">

            <?php include('promosi_view.php'); ?>

            <div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row">
                            <div class="span12">
                                <h3>Detail Lowongan</h3>
                                <table id="hidden">
                                    <tr>
                                        <td style="width:237px;">
                                            Judul Lowongan
                                        </td>
                                        <td>
                                            <?php echo $row['lowongan']['judul']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:237px;">
                                            Tipe Lowongan
                                        </td>
                                        <td>
                                            <?php echo $row['lowongan']['tipe']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:237px;">
                                            Pembuka Lowongan
                                        </td>
                                        <td>
                                            <?php echo pengguna_link($row['lowongan']['nama_provider'], $provider['nama']); ?>
                                        </td>
                                    </tr>
                                    
                                    <?php if ($this -> session -> userdata('status') === 'admin' || $this -> session -> userdata('username') === $row['lowongan']['nama_provider']) { ?>
                                        <tr>
                                            <td style="width:237px;">
                                                Status Lowongan
                                            </td>
                                            <td>
                                                <strong>
                                                    <?php 
                                                        if ($row['lowongan']['tgl_tutup'] < date("Y-m-d")) {
                                                            echo 'ditutup';
                                                        } else {
                                                            echo $row['lowongan']['status']; 
                                                        }
                                                    ?>
                                                </strong>
                                            </td>
                                        </tr>
                                    <?php } else { ?>
                                        <tr>
                                            <td style="width:237px;">
                                                Status Anda
                                            </td>

                                        <?php
                                            $status = 'tidak mendaftar';
                                            for ($j = 0; $j < count($row['pendaftar']); $j++) {
                                                if ($row['pendaftar'][$j]['username'] == $this -> session -> userdata('username')) {
                                                    $status = $row['pendaftar'][$j]['status_pendaftaran'];
                                                }
                                            }
                                        ?>

                                            <td>
                                                <strong>
                                                    <?php echo $status; ?>
                                                </strong>
                                            </td>
                                        </tr>

                                        <?php if ($row['lowongan']['wawancara']) {
                                            $waw = 'Tidak ada';
                                            for ($j = 0; $j < count($row['wawancara']); $j++) {
                                                if ($row['wawancara'][$j]['peserta'] == $this -> session -> userdata('username')) {
                                                    $waw = convert_date($row['wawancara'][$j]['tanggal']) . ' pukul ' . convert_time($row['wawancara'][$j]['waktu']);
                                                    break;
                                                }
                                            } ?>

                                        <tr>
                                            <td style="width:237px;">
                                                Jadwal Wawancara Anda
                                            </td>
                                            <td>
                                                <strong>
                                                    <?php echo $waw; ?>
                                                </strong>
                                            </td>
                                        </tr>


                                    <?php }} ?>
                                    <tr>
                                        <td style="width:237px;">
                                            Deskripsi Lowongan
                                        </td>
                                        <td>
                                            <?php echo $row['lowongan']['deskripsi']; ?>
                                        </td>
                                    </tr>
                                    
                                </table>
                                <h4>Syarat</h4>
                                <table id="hidden">
                                    <tr>
                                        <td valign="top" style="width: 237px;">
                                            Fakultas
                                        </td>
                                        <td valign="top">
                                            <p>
                                                <?php
                                                    $fakultas = array('FK', 'FKG', 'FMIPA', 'FT', 'FH', 'FE', 'FIB', 'FPsi', 'FISIP', 'FKM', 'Fasilkom', 'FIK', 'FF', 'Pascasarjana', 'Vokasi');
                                                    for ($i = 0; $i < count($fakultas); $i++) {
                                                        if ($row['lowongan']['syarat_' . $fakultas[$i]]) {
                                                            echo $fakultas[$i] . '<br/>';
                                                        }
                                                    }
                                                ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" style="width: 237px;">
                                            Angkatan/Role
                                        </td>
                                        <td>
                                            <p>
                                                <?php
                                                    $role = array('2008', '2009', '2010', '2011', '2012', 'Alumni', 'Staf', 'Dosen');
                                                    for ($i = 0; $i < count($role); $i++) {
                                                        if ($row['lowongan']['syarat_' . $role[$i]]) {
                                                            echo $role[$i] . '<br/>';
                                                        }
                                                    }
                                                ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" style="width: 237px;">
                                            Usia
                                        </td>
                                        <td>
                                            <?php echo $row['lowongan']['syarat_usia_min'] . ' - ' . $row['lowongan']['syarat_usia_max'] . ' tahun'; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" style="width: 237px;">
                                            Jenis Kelamin
                                        </td>
                                        <td>
                                            <p>
                                                <?php
                                                    $jenis_kelamin = array('L', 'P');
                                                    for ($i = 0; $i < count($jenis_kelamin); $i++) {
                                                        if ($row['lowongan']['syarat_' . $jenis_kelamin[$i]]) {
                                                            echo convert_jk($jenis_kelamin[$i]) . '<br/>';
                                                        }
                                                    }
                                                ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" style="width: 237px;">
                                            Agama
                                        </td>
                                        <td>
                                            <p>
                                                <?php
                                                    $agama = array('Islam', 'Kristen', 'Katolik', 'Buddha', 'Hindu', 'Konghucu', 'Lainnya');
                                                    for ($i = 0; $i < count($agama); $i++) {
                                                        if ($row['lowongan']['syarat_' . $agama[$i]]) {
                                                            echo $agama[$i] . '<br/>';
                                                        }
                                                    }
                                                ?>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                                <table id="hidden">
                                    <tr>
                                        <td style="width: 237px;">
                                            Batas Akhir Lowongan
                                        </td>
                                        <td>
                                            <?php echo convert_date($row['lowongan']['tgl_tutup']); ?>
                                        </td>
                                    </tr>
                                    <?php if ($row['lowongan']['wawancara']) { ?>
                                        <tr>
                                            <td style="width: 237px;">
                                                Jadwal Wawancara
                                            </td>
                                            <td>
                                                <?php
                                                    for ($i = 0; $i < count($row['wawancara']); $i++) {
                                                        $peserta = $row['wawancara'][$i]['peserta'];

                                                        for ($j = 0; $j < count($row['pendaftar']); $j++) {
                                                            if ($row['pendaftar'][$j]['username'] == $peserta) {
                                                                $nama = $row['pendaftar'][$j]['nama'];
                                                            }
                                                        }
                                                        $nama = $peserta == '' ? '[belum ada peserta]' : pengguna_link($peserta, $nama);
                                                        
                                                        if ($this -> session -> userdata('username') == $row['lowongan']['nama_provider']) {
                                                            echo '<p>' . convert_date($row['wawancara'][$i]['tanggal']) . ' pukul ' . convert_time($row['wawancara'][$i]['waktu']) . ' dengan peserta: ' . $nama . '</p>';
                                                        } else if ($nama == '[belum ada peserta]') {
                                                            echo '<p>' . convert_date($row['wawancara'][$i]['tanggal']) . ' pukul ' . convert_time($row['wawancara'][$i]['waktu']) . '</p>';
                                                        }
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                                
                                <?php if ($this -> session -> userdata('status') == 'admin') { ?>
                                    <div class="span12 bg-color-blue">
                                        <?php echo '<a href="' . base_url() . 'admin/moderasi_lowongan/' . $row['lowongan']['id_lowongan'] . '">'; ?>
                                            <button class="shortcut span12">
                                                <span class="icon">
                                                    <i class="icon-broadcast"></i>
                                                </span>
                                                <span class="label">
                                                    Moderasi Lowongan
                                                </span>
                                            </button>
                                        </a>
                                    </div>
                                <?php } else if ($this -> session -> userdata('username') == $row['lowongan']['nama_provider']) { ?>

                                <?php if ($row['lowongan']['tgl_tutup'] >= date("Y-m-d")) { ?>
                                    <div class="span4 bg-color-green">
                                        <?php echo '<a href="' . base_url() . 'lowongan/ubah/' . $row['lowongan']['id_lowongan'] . '">'; ?>
                                            <button class="shortcut span4">
                                <?php } else { ?>
                                    <div class="span6 bg-color-green">
                                        <?php echo '<a href="' . base_url() . 'lowongan/ubah/' . $row['lowongan']['id_lowongan'] . '">'; ?>
                                            <button class="shortcut span6">
                                <?php } ?>
                                                <span class="icon">
                                                    <i class="icon-pencil"></i>
                                                </span>
                                                <span class="label">
                                                    Ubah Lowongan
                                                </span>
                                            </button>
                                        </a>
                                    </div>
                                <?php if ($row['lowongan']['tgl_tutup'] >= date("Y-m-d")) { ?>
                                    <div class="span4 bg-color-yellow">
                                        <?php echo '<a href="' . base_url() . 'lowongan/pendaftar/' . $row['lowongan']['id_lowongan'] . '">'; ?>
                                            <button class="shortcut span4">
                                <?php } else { ?>
                                    <div class="span6 bg-color-yellow">
                                        <?php echo '<a href="' . base_url() . 'lowongan/pendaftar/' . $row['lowongan']['id_lowongan'] . '">'; ?>
                                            <button class="shortcut span6">
                                <?php } ?>
                                                <!-- <span class="icon">
                                                    <i class="icon-pencil"></i>
                                                </span> -->
                                                <span class="label">
                                                    Lihat Pendaftar
                                                </span>
                                            </button>
                                        </a>
                                    </div>
                                <?php if ($row['lowongan']['tgl_tutup'] >= date("Y-m-d")) { ?>
                                    <div class="span4 bg-color-red">
                                        <script type="text/javascript">
                                            function konfirmasi_hapus(link) {
                                                var oke = confirm("Apakah Anda yakin menghapus lowongan ini?");
                                                if (oke == true) {
                                                    window.location = link;
                                                }
                                            }
                                        </script>
                                        <?php 
                                            $link = base_url() . 'lowongan/batal/' . $row['lowongan']['id_lowongan'];
                                            echo '<a href="javascript:;" onclick="konfirmasi_hapus(';
                                            echo "'$link'";
                                            echo ')">'; 
                                        ?>
                                            <button class="shortcut span4">
                                                <span class="icon">
                                                    <i class="icon-cancel-2"></i>
                                                </span>
                                                <span class="label">
                                                    Batalkan Lowongan
                                                </span>
                                            </button>
                                        </a>
                                    </div>
                                <?php } ?>
                                <?php } else {
                                    if ($row['lowongan']['tgl_tutup'] >= date("Y-m-d")) {
                                        $sudah_daftar = FALSE;
                                        for ($i = 0; $i < count($row['pendaftar']); $i++) {
                                            if ($row['pendaftar'][$i]['username'] == $this -> session -> userdata('username')) {
                                                $sudah_daftar = TRUE;
                                                break;
                                            }
                                        }

                                        if (!$sudah_daftar) { ?>
                                            <div class="span12 bg-color-yellow">
                                                <script type="text/javascript">
                                                    function konfirmasi_daftar(link) {
                                                        var oke = confirm("Apakah Anda yakin mendaftar lowongan ini?");
                                                        if (oke == true) {
                                                            window.location = link;
                                                        }
                                                    }
                                                </script>
                                                <?php 
                                                    $link = base_url() . 'lowongan/daftar/' . $row['lowongan']['id_lowongan'];
                                                    echo '<a href="javascript:;" onclick="konfirmasi_daftar(';
                                                    echo "'$link'";
                                                    echo ')">'; 
                                                ?>
                                                    <button class="shortcut span12">
                                                        <span class="icon">
                                                        <i class="icon-checkmark"></i>
                                                        </span>
                                                        <span class="label">
                                                            Daftar
                                                        </span>
                                                    </button>
                                                </a>
                                            </div>
                                    <?php } else { ?>
                                        <script type="text/javascript">
                                            function konfirmasi_batal_daftar(link) {
                                                var oke = confirm("Apakah Anda yakin batal mendaftar lowongan ini?");
                                                if (oke == true) {
                                                    window.location = link;
                                                }
                                            }
                                        </script>

                                        <?php 
                                            $link = base_url() . 'lowongan/batal_daftar/' . $row['lowongan']['id_lowongan'];
                                            echo '<a href="javascript:;" onclick="konfirmasi_batal_daftar(';
                                            echo "'$link'";
                                            echo ')">'; 
                                        ?>
                                        <?php if ($row['lowongan']['wawancara']) { ?>
                                            <div class="span6 bg-color-red">
                                                <button class="shortcut span6">
                                        <?php } else { ?>
                                            <div class="span12 bg-color-red">
                                                <button class="shortcut span12">
                                        <?php } ?>
                                                    <span class="icon">
                                                        <i class="icon-cancel-2"></i>
                                                    </span>
                                                    <span class="label">
                                                        Batalkan Pendaftaran
                                                    </span>
                                                </button>
                                            </div>
                                        </a>
                                        <?php if ($row['lowongan']['wawancara']) { ?>
                                            <div class="span6 bg-color-green">
                                                <?php echo '<a href="' . base_url() . 'lowongan/ubah_wawancara/' . $row['lowongan']['id_lowongan'] . '">'; ?>
                                                    <button class="shortcut span6">
                                                        <span class="icon">
                                                            <i class="icon-calendar"></i>
                                                        </span>
                                                        <span class="label">
                                                            Ganti Jadwal Wawancara
                                                        </span>
                                                    </button>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>

                                
                                
                            </div>
                            
                        </div>
                    
                    </div>

                </div>
            </div>
        </div>  
        
        
        <?php include('footer_view.php'); ?>