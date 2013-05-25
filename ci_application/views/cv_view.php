    <?php include('header_view_0.php'); ?>
<!--    
- View - CV
-  
- Halaman isian CV suatu pengguna
-
- @author Nur Ulul Asman, Ricky Arifandi Daniel
- @copyright recrUItment, 24-Apr-2013
- @version 1.1.0.2
-->
    <title>Curriculum Vitae</title>

    <?php include('header_view.php'); ?>
        
         <div class="page [secondary] with-sidebar">

            <?php include('promosi_view.php'); ?>

            <div class="page-region" >
                <div class="page-region-content">
                    <div class="grid">
                        <div class="row">
                            <div class="span12">
                                <h2>Curriculum Vitae</h2>
                                <h3>Informasi Pribadi</h3>
                                <table id="hidden">
                                    <tr>
                                        <td>
                                            Nama
                                        </td>
                                        <td>
                                            <?php echo $row['nama']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Fakultas
                                        </td>
                                        <td>
                                            <?php echo $row['fakultas']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Angkatan/Role
                                        </td>
                                        <td>
                                            <?php echo $row['role']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Alamat
                                        </td>
                                        <td>
                                            <p>
                                                <?php echo $row['alamat']; ?>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tempat Lahir
                                        </td>
                                        <td>
                                            <?php echo $row['tmpt_lahir']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Tanggal Lahir
                                        </td>
                                        <td>
                                            <?php echo convert_date($row['tgl_lahir']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jenis Kelamin
                                        </td>
                                        <td>
                                            <?php echo convert_jk($row['jenis_kelamin']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Agama
                                        </td>
                                        <td>
                                            <?php echo $row['agama']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            No. Kontak
                                        </td>
                                        <td>
                                            <?php echo $row['no_kontak']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Email
                                        </td>
                                        <td>
                                            <?php echo $row['email']; ?>
                                        </td>
                                    </tr>
                                </table>
                                <h3>Riwayat Pendidikan</h3>
                                <table id="hidden">
                                    <tr>
                                    <td>
                                    <p>
                                        <?php echo $row['edukasi']; ?>
                                    </p>
                                    </td>
                                    </tr>
                                </table>
                                <h3>Prestasi</h3>
                                <table id="hidden">
                                    <tr>
                                    <td>
                                    <p>
                                        <?php echo $row['prestasi']; ?>
                                    </p>
                                    </td>
                                    </tr>
                                </table>
                                <h3>Pengalaman Kerja</h3>
                                <table id="hidden">
                                    <tr>
                                    <td>
                                    <p>
                                        <?php echo $row['pglm_kerja']; ?>
                                    </p>
                                    </td>
                                    </tr>
                                </table>
                                <h3>Pengalaman Organisasi</h3>
                                <table id="hidden">
                                    <tr>
                                    <td>
                                    <p>
                                        <?php echo $row['pglm_organisasi']; ?>
                                    </p>
                                    </td>
                                    </tr>
                                </table>
                                <h3>Pengalaman Kepanitian</h3>
                                <table id="hidden">
                                    <tr>
                                    <td>
                                    <p>
                                        <?php echo $row['pglm_panitia']; ?>
                                    </p>
                                    </td>
                                    </tr>
                                </table>
                                <h3>Kemampuan</h3>
                                <table id="hidden">
                                    <tr>
                                    <td>
                                    <p>
                                        <?php echo $row['kemampuan']; ?>
                                    </p>
                                    </td>
                                    </tr>
                                </table>
                                <?php if ($row['username'] == $this -> session -> userdata('username')) { ?>
                                    <?php echo '<a href="' . base_url() . 'cv/ubah">'; ?>
                                        <button class="shortcut span6">
                                            <span class="icon">
                                                <i class="icon-clipboard"></i>
                                            </span>
                                            <span class="label">
                                                Ubah CV
                                            </span>
                                        </button>
                                    </a>
                                    <?php echo '<a href="' . base_url() . 'profil">'; ?>
                                        <button class="shortcut span6">
                                            <span class="label">
                                                Kembali
                                            </span>
                                        </button>
                                    </a>
                                <?php } ?>
                            </div>
                            
                        </div>
                    
                    </div>

                </div>
            </div>
        </div>  
        
        
        <?php include('footer_view.php'); ?>