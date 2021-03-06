    <?php include('header_view_0.php'); ?>
<!--    
- View - Lowongan
-  
- Halaman berisi data-data terkait suatu lowongan
-
- @author Nur Ulul Asman, Ricky Arifandi Daniel
- @copyright recrUItment, 24-Apr-2013
- @version 1.1.0.2
-->
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

                                        <?php if ($row['lowongan']['wawancara'] > 0) {
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
                                <?php
                                    if ($row['lowongan']['poster']) {
                                        echo '<img src="' . base_url() . 'images/poster/' . $row['lowongan']['id_lowongan'] . '.jpg"/>';
                                    }
                                ?>
                                <h4>Syarat</h4>
                                <table id="hidden">
                                    <tr>
                                        <td valign="top" style="width: 237px;">
                                            Fakultas
                                        </td>
                                        <td valign="top">
                                            <p>
                                                <?php
                                                    for ($i = 0; $i < 16; $i++) {
                                                        if (is_syarat(get_fakultas($i), $row['lowongan']['syarat'])) {
                                                            echo get_fakultas($i) . '<br/>';
                                                        }
                                                    }
                                                ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" style="width: 237px;">
                                            Role/Angkatan
                                        </td>
                                        <td>
                                            <p>
                                                <?php
                                                    for ($i = 0; $i < 8; $i++) {
                                                        if (is_syarat(get_role($i), $row['lowongan']['syarat'])) {
                                                            echo get_role($i) . '<br/>';
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
                                                    for ($i = 0; $i < 2; $i++) {
                                                        if (is_syarat(get_jenis_kelamin($i), $row['lowongan']['syarat'])) {
                                                            echo get_jenis_kelamin($i) . '<br/>';
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
                                                    for ($i = 0; $i < 7; $i++) {
                                                        if (is_syarat(get_agama($i), $row['lowongan']['syarat'])) {
                                                            echo get_agama($i) . '<br/>';
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
                                    <?php if ($row['lowongan']['status'] == 'diajukan verifikasi' && ($row['lowongan']['nama_provider'] == $this -> session -> userdata('username') || $this -> session -> userdata('status') == 'admin')) { ?>
                                        <tr>
                                            <td style="width:237px">
                                                Detil Pembayaran
                                            </td>
                                            <td>
                                                <?php
                                                    echo 'dari ' . $pembayaran['asal_bank'] . ' No ' . $pembayaran['asal_rekening'] . ' a/n ' . $pembayaran['asal_nama'] . '<br/>';
                                                    echo 'ke ' . $pembayaran['rekening'] . '<br/>';
                                                    echo 'pada tanggal ' . convert_date($pembayaran['tanggal_bayar']) . '<br/>';
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                                
                                <?php if ($this -> session -> userdata('status') == 'admin') {
                                    if ($row['lowongan']['status'] == 'belum dimoderasi') { ?>
                                        <div class="span6 bg-color-red">
                                            <?php echo '<a href="' . base_url() . 'admin/tolak_moderasi/' . $row['lowongan']['id_lowongan'] . '">'; ?>
                                                <button class="shortcut span6">
                                                    <span class="icon">
                                                        <i class="icon-cancel"></i>
                                                    </span>
                                                    <span class="label">
                                                        Tolak Lowongan
                                                    </span>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="span6 bg-color-blue">
                                            <?php echo '<a href="' . base_url() . 'admin/moderasi_lowongan/' . $row['lowongan']['id_lowongan'] . '">'; ?>
                                                <button class="shortcut span6">
                                                    <span class="icon">
                                                        <i class="icon-broadcast"></i>
                                                    </span>
                                                    <span class="label">
                                                        Moderasi Lowongan
                                                    </span>
                                                </button>
                                            </a>
                                        </div>
                                    <?php } else if ($row['lowongan']['status'] == 'diajukan verifikasi') { ?>
                                        <div class="span6 bg-color-red">
                                            <?php echo '<a href="' . base_url() . 'admin/tolak_promosi/' . $row['lowongan']['id_lowongan'] . '">'; ?>
                                                <button class="shortcut span6">
                                                    <span class="icon">
                                                        <i class="icon-cancel"></i>
                                                    </span>
                                                    <span class="label">
                                                        Tolak Promosi
                                                    </span>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="span6 bg-color-blue">
                                            <?php echo '<a href="' . base_url() . 'admin/promosi_lowongan/' . $row['lowongan']['id_lowongan'] . '">'; ?>
                                                <button class="shortcut span6">
                                                    <span class="icon">
                                                        <i class="icon-eye"></i>
                                                    </span>
                                                    <span class="label">
                                                        Promosikan Lowongan
                                                    </span>
                                                </button>
                                            </a>
                                        </div>
                                    <?php } ?>
                                <?php } else if ($this -> session -> userdata('username') == $row['lowongan']['nama_provider']) { ?>
                                    <div class="span12 bg-color-green">
                                        <script type="text/javascript">
                                            function konfirmasi_ubah(link) {
                                                var oke = confirm("Apakah Anda yakin mengubah lowongan ini?\nStatus lowongan akan dikembalikan menjadi 'belum dimoderasi' dan promosi Anda akan dibatalkan dan uang Anda tidak akan kembali.");
                                                if (oke == true) {
                                                    window.location = link;
                                                }
                                            }
                                        </script>
                                        <?php 
                                            $link = base_url() . 'lowongan/ubah/' . $row['lowongan']['id_lowongan'];
                                            echo '<a href="javascript:;" onclick="konfirmasi_ubah(';
                                            echo "'$link'";
                                            echo ')">'; 
                                        ?>
                                            <button class="shortcut span12">
                                                <span class="icon">
                                                    <i class="icon-pencil"></i>
                                                </span>
                                                <span class="label">
                                                    Ubah Lowongan
                                                </span>
                                            </button>
                                        </a>
                                    </div>

                                    <div class="span12 bg-color-red">
                                        <?php echo '<a href="' . base_url() . 'pesan/broadcast/' . $row['lowongan']['id_lowongan'] . '">'; ?>                                        
                                        <button class="shortcut span12">
                                            <span class="icon">
                                                <i class="icon-broadcast"></i>
                                            </span>
                                            <span class="label">
                                                Broadcast Pesan
                                            </span>
                                        </button>
                                    </div>

                                    <?php if ($row['lowongan']['status'] == 'dimoderasi') { ?>
                                        <div class="span12 bg-color-blue">
                                            <?php echo '<a href="' . base_url() . 'promosi/ajukan/' . $row['lowongan']['id_lowongan'] . '">'; ?>
                                                <button class="shortcut span12">
                                                    <span class="icon">
                                                        <i class="icon-eye"></i>
                                                    </span>
                                                    <span class="label">
                                                        Ajukan Promosi
                                                    </span>
                                                </button>
                                            </a>
                                        </div>
                                    <?php } else if ($row['lowongan']['status'] == 'diajukan promosi') { ?>
                                        <div class="span12 bg-color-blue">
                                            <?php echo '<a href="' . base_url() . 'promosi/verifikasi/' . $row['lowongan']['id_lowongan'] . '">'; ?>
                                                <button class="shortcut span12">
                                                    <span class="icon">
                                                        <i class="icon-cart-2"></i>
                                                    </span>
                                                    <span class="label">
                                                        Verifikasi Pembayaran
                                                    </span>
                                                </button>
                                            </a>
                                        </div>
                                    <?php } ?>

                                    <div class="span12 bg-color-yellow">
                                        <?php echo '<a href="' . base_url() . 'lowongan/pendaftar/' . $row['lowongan']['id_lowongan'] . '">'; ?>
                                            <button class="shortcut span12">
                                                <span class="icon">
                                                    <i class="icon-list"></i>
                                                </span>
                                                <span class="label">
                                                    Lihat Pendaftar
                                                </span>
                                            </button>
                                        </a>
                                    </div>
                                    
                                    <?php if ($row['lowongan']['tgl_tutup'] >= date("Y-m-d")) { ?>
                                        <div class="span12 bg-color-green">
                                            <?php echo '<a href="' . base_url() . 'lowongan/ubah_wawancara_provider/' . $row['lowongan']['id_lowongan'] . '">'; ?>
                                                <button class="shortcut span12">
                                                    <span class="icon">
                                                        <i class="icon-calendar"></i>
                                                    </span>
                                                    <span class="label">
                                                        Reset Jadwal Wawancara
                                                    </span>
                                                </button>
                                            </a>
                                        </div>
                                        <div class="span12 bg-color-red">
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
                                                <button class="shortcut span12">
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
                                            <div class="span12 bg-color-red">
                                                <button class="shortcut span12">
                                                    <span class="icon">
                                                        <i class="icon-cancel-2"></i>
                                                    </span>
                                                    <span class="label">
                                                        Batalkan Pendaftaran
                                                    </span>
                                                </button>
                                            </div>
                                        </a>
                                        <?php if ($row['lowongan']['wawancara'] > 0) { ?>
                                            <div class="span12 bg-color-green">
                                                <?php echo '<a href="' . base_url() . 'lowongan/ubah_wawancara/' . $row['lowongan']['id_lowongan'] . '">'; ?>
                                                    <button class="shortcut span12">
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