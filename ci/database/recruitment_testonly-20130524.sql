-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2013 at 01:50 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `recruitment`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement`
--

CREATE TABLE IF NOT EXISTS `achievement` (
  `id_achievement` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_achievement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `achievement`
--


-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE IF NOT EXISTS `lowongan` (
  `id_lowongan` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'belum dimoderasi',
  `tipe` varchar(16) NOT NULL,
  `deskripsi` text NOT NULL,
  `poster` varchar(100) NOT NULL,
  `tgl_tutup` date NOT NULL,
  `nama_provider` varchar(25) NOT NULL,
  `syarat_FK` tinyint(1) NOT NULL,
  `syarat_FKG` tinyint(1) NOT NULL,
  `syarat_FMIPA` tinyint(1) NOT NULL,
  `syarat_FT` tinyint(1) NOT NULL,
  `syarat_FH` tinyint(1) NOT NULL,
  `syarat_FE` tinyint(1) NOT NULL,
  `syarat_FIB` tinyint(1) NOT NULL,
  `syarat_FPsi` tinyint(1) NOT NULL,
  `syarat_FISIP` tinyint(1) NOT NULL,
  `syarat_FKM` tinyint(1) NOT NULL,
  `syarat_Fasilkom` tinyint(1) NOT NULL,
  `syarat_FIK` tinyint(1) NOT NULL,
  `syarat_FF` tinyint(1) NOT NULL,
  `syarat_Pascasarjana` tinyint(1) NOT NULL,
  `syarat_Vokasi` tinyint(1) NOT NULL,
  `syarat_2008` tinyint(1) NOT NULL,
  `syarat_2009` tinyint(1) NOT NULL,
  `syarat_2010` tinyint(1) NOT NULL,
  `syarat_2011` tinyint(1) NOT NULL,
  `syarat_2012` tinyint(1) NOT NULL,
  `syarat_Alumni` tinyint(1) NOT NULL,
  `syarat_Staf` tinyint(1) NOT NULL,
  `syarat_Dosen` tinyint(1) NOT NULL,
  `syarat_usia_min` int(11) NOT NULL,
  `syarat_usia_max` int(11) NOT NULL,
  `syarat_L` tinyint(1) NOT NULL,
  `syarat_P` tinyint(1) NOT NULL,
  `syarat_Islam` tinyint(1) NOT NULL,
  `syarat_Kristen` tinyint(1) NOT NULL,
  `syarat_Katolik` tinyint(1) NOT NULL,
  `syarat_Buddha` tinyint(1) NOT NULL,
  `syarat_Hindu` tinyint(1) NOT NULL,
  `syarat_Konghucu` tinyint(1) NOT NULL,
  `syarat_Lainnya` tinyint(1) NOT NULL,
  `wawancara` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_lowongan`),
  KEY `nama_provider` (`nama_provider`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `judul`, `status`, `tipe`, `deskripsi`, `poster`, `tgl_tutup`, `nama_provider`, `syarat_FK`, `syarat_FKG`, `syarat_FMIPA`, `syarat_FT`, `syarat_FH`, `syarat_FE`, `syarat_FIB`, `syarat_FPsi`, `syarat_FISIP`, `syarat_FKM`, `syarat_Fasilkom`, `syarat_FIK`, `syarat_FF`, `syarat_Pascasarjana`, `syarat_Vokasi`, `syarat_2008`, `syarat_2009`, `syarat_2010`, `syarat_2011`, `syarat_2012`, `syarat_Alumni`, `syarat_Staf`, `syarat_Dosen`, `syarat_usia_min`, `syarat_usia_max`, `syarat_L`, `syarat_P`, `syarat_Islam`, `syarat_Kristen`, `syarat_Katolik`, `syarat_Buddha`, `syarat_Hindu`, `syarat_Konghucu`, `syarat_Lainnya`, `wawancara`) VALUES
(6, 'aoeu', 'dimoderasi', 'Kepanitiaan', '<p>Ini adalah deskripsinya</p>\r\n<p>Mau lagi? <strong>wets</strong></p>', '', '2014-05-24', 'ricky.arifandi', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 17, 22, 1, 0, 1, 0, 0, 0, 0, 0, 1, 0),
(7, 'Tes', 'dimoderasi', 'Riset', '<p>Lowongan ini untuk orang keren</p>', '0', '2014-04-24', 'ricky.arifandi', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 17, 22, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1),
(9, 'Sponsorship Computer Festival 2013', 'dimoderasi', 'Kepanitiaan', '<p>Sponsorrr!!!</p>', '0', '2014-05-05', 'ricky.arifandi', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 17, 22, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0),
(10, 'Pegawai Kantin Balgebun', 'dimoderasi', 'Lainnya', '<p>Tukang anter minuman</p>', '0', '2014-05-29', 'provider', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 20, 40, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0),
(11, 'Mentor PMB Fasilkom UI 2013', 'dimoderasi', 'Kepanitiaan', '<p>Untuk yang berminat menjadi mentor pada PMB Fasilkom UI 2013.</p>', '0', '2013-05-31', 'erryan.sazany', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 17, 23, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(12, 'Geng Meong', 'dimoderasi', 'Lainnya', '<p>Yang mau gabung, yang mau gabung</p>', '0', '2014-01-01', 'agile.kalu', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 25, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0),
(13, 'Asisten Dosen Basdat Lanjut', 'dimoderasi', 'Asisten Dosen', '<p>Asisten Dosen Basis Data Lanjut</p>', '0', '2013-06-30', 'mocha.platine', 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 18, 21, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0),
(16, 'Tes Lagi', 'belum dimoderasi', 'Kepanitiaan', '<p>abc</p>', '0', '2014-05-31', 'ricky.arifandi', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 100, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0),
(17, 'Asisten Dosen Proyek Perangkat Lunak', 'dimoderasi', 'Asisten Dosen', '<p>Untuk yang berminat menjadi asisten dosen pada mata kuliah PPL untuk tahun ajaran 2013/2014.</p>\r\n<p>Syarat tambahan :</p>\r\n<ol>\r\n<li>Nilai PPL : minimal A-</li>\r\n<li>SKS diambil : tidak lebih dari 20 sks (untuk non-alumni)</li>\r\n<li>Pernah menjadi asisten PPL lebih diutamakan</li>\r\n</ol>', '0', '2014-01-31', 'mocha.platine', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 0, 0, 1, 0, 0, 20, 26, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE IF NOT EXISTS `pendaftar` (
  `id_lowongan` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `status_pendaftaran` varchar(10) NOT NULL DEFAULT 'melamar',
  PRIMARY KEY (`id_lowongan`,`username`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id_lowongan`, `username`, `status_pendaftaran`) VALUES
(7, 'aoeu', 'diterima'),
(9, 'agile.kalu', 'diterima'),
(9, 'muchu.monte', 'diterima'),
(10, 'mochi.eruption', 'diterima'),
(11, 'agile.kalu', 'ditolak'),
(11, 'muchu.monte', 'diterima'),
(12, 'erryan.sazany', 'ditolak'),
(12, 'mocha.platine', 'diterima'),
(12, 'mochi.eruption', 'diterima'),
(12, 'muchu.monte', 'diterima'),
(12, 'piku.frisky', 'diterima'),
(12, 'pussy.cat', 'diterima'),
(13, 'erryan.sazany', 'diterima'),
(13, 'mochi.eruption', 'diterima'),
(13, 'muchu.monte', 'ditolak'),
(17, 'aoeu', 'melamar'),
(17, 'erryan.sazany', 'melamar'),
(17, 'ricky.arifandi', 'melamar');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` varchar(8) NOT NULL DEFAULT 'seeker',
  `email` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `fakultas` varchar(12) NOT NULL,
  `role` varchar(6) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tmpt_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_kontak` varchar(15) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `kemampuan` text NOT NULL,
  `prestasi` text NOT NULL,
  `edukasi` text NOT NULL,
  `pglm_panitia` text NOT NULL,
  `pglm_kerja` text NOT NULL,
  `pglm_organisasi` text NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`username`, `nama`, `status`, `email`, `foto`, `fakultas`, `role`, `jenis_kelamin`, `tmpt_lahir`, `tgl_lahir`, `no_kontak`, `agama`, `alamat`, `kemampuan`, `prestasi`, `edukasi`, `pglm_panitia`, `pglm_kerja`, `pglm_organisasi`) VALUES
('admin', 'Administrator', 'admin', 'recr.ui.tment@araishikeiwai.com', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('adminfake', '', 'seeker', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('agile', '', 'seeker', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('agile.kalu', 'Agile Kalu Monte', 'provider', 'agile.kalu@gmail.com', '', 'Fasilkom', '2012', 'L', 'Depok', '1993-11-30', '+xxxxxxxxxxxxx', 'Lainnya', '<p>Mandala E4 no.1</p>', '<p>Makan, main, khotbah, tidur</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>'),
('aoeu', 'Cinta Ku Cinta Mu', 'seeker', 'cinta@cinta.cinta', '', 'Fasilkom', '2010', 'P', 'Hatimu', '1993-04-13', '+6285760778776', 'Islam', '<p>Jalan Neraka Gg. Surga No. 666</p>\r\n<p>Kota Kasablanka</p>\r\n<p>Negara Api</p>', '<p>Semua bisa kaya denny</p>\r\n<p>Hohoho</p>', '<p>Juara apa yaa mau tau aja sih</p>', '<p>keren</p>', '<p>Banyak</p>', '<p>Kepo amat wey</p>', '<p>Jago kok gua tenang aja</p>'),
('erryan', '', 'seeker', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('erryan,sazany', '', 'seeker', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('erryan.sazany', 'Erryan Sazany', 'provider', 'erry.saz@gmail.com', '', 'Fasilkom', '2010', 'L', 'Jakarta', '1992-07-23', '+6285711665646', 'Islam', '<p>Perum. Pondok Tirta Mandala Blok E4 no.1, RT01/RW026 Kel. Sukamaju Kec. Cilodong, Kota Depok, 16415</p>', '<p>Bahasa Pemrograman : Java, C#, PostgreSQL, SQLite, PHP, Javascript, HTML, CSS, Moscow ML, Lua Script, VHDL, Assembly.</p>\r\n<p>Framework : XNA (Game), Code Igniter (Web)</p>\r\n<p>Softskill : Teaching, Peer Counseling.</p>', '<p>1. Peringkat 2 Kategori Game Development Pekan Ristek Fasilkom UI, 2012</p>\r\n<p>2. Peserta Mobile Games Developer War 4, Computer Festival, 2012</p>\r\n<p>3. Finalis Kategori Game Development Gemastik IV ITS, 2011</p>\r\n<p>4. Finalis Kategori Game Development Pekan Ristek Fasilkom UI, 2011</p>', '<p>Universitas Indonesia : 2010 - 2014 (expected)</p>\r\n<p>SMA Negeri 1 Depok : 2007 - 2010</p>\r\n<p>SMP Negeri 3 Depok : 2004 - 2007</p>\r\n<p>SD Pemuda Bangsa : 1998 - 2004</p>', '<p>1. Penanggung Jawab Bidang Mentor, Pembinaan Mahasiswa Baru Fasilkom UI, 2012</p>\r\n<p>2. Staf Workshop, Computer Festival, 2011</p>\r\n<p>3. Staf Humas &amp; Publikasi, Wisuda Fasilkom UI, 2011</p>', '<p>1. Asisten Dosen Pengantar Sistem Dijital, Fasilkom UI, 2013</p>\r\n<p>2. Pengajar Privat Matematika SMP &amp; SMA, 2012</p>\r\n<p>3. Asisten Dosen Matematika Diskret, Fasilkom UI, 2012</p>', '<p>1. Anggota Special Interest Group Mobile Applications, Ristek Fasilkom UI, 2013</p>\r\n<p>2. Staf Bidang Advokasi dan Kesejahteraan Mahasiswa, BEM Fasilkom UI, 2012</p>\r\n<p>3. Mentor Special Interest Group Game Development, Ristek Fasilkom UI, 2012</p>\r\n<p>4. Staf Bidang Advokasi dan Kesejahteraan Mahasiswa, BEM Fasilkom UI, 2011</p>\r\n<p>5. Anggota Special Interest Group Game Development, Ristek Fasilkom UI, 2011</p>'),
('erryan.saznay', '', 'seeker', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('erryan.sazny', '', 'seeker', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('faruq', '', 'seeker', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('febriana.misdianti', '', 'seeker', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('mocha.platine', 'Mocha Platine Monte', 'provider', 'mocha.platine@gmail.com', '', 'FT', '2010', 'P', 'Depok', '1992-01-16', '+xxxxxxxxxxxxx', 'Lainnya', '<p>Mandala E4 no.1</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>'),
('mochi.eruption', 'Mochi Eruption Monte', 'seeker', 'mochi.eruption@gmail.com', '', 'FKG', '2011', 'P', 'Depok', '1992-09-02', '+xxxxxxxxxxxxx', 'Islam', '<p>Mandala E4 no.1</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>'),
('muchu,monte', '', 'seeker', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('muchu.monte', 'Muchu Monte', 'seeker', 'muchu.monte@gmail.com', '', 'Fasilkom', '2011', 'L', 'Depok', '1993-10-16', '+xxxxxxxxxxxxx', 'Lainnya', '<p>Mandala E4 no.1</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>'),
('piku.frisky', 'Piku Frisky Monte', 'seeker', 'piku.frisky@gmail.com', '', 'FMIPA', '2012', 'L', 'Depok', '1994-10-10', '+xxxxxxxxxxxxx', 'Lainnya', '<p>Mandala E4 no.1</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>'),
('provider', 'Le Provider', 'provider', 'le@provider.com', '', 'Fasilkom', 'Dosen', 'L', '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('puspa.indahati', 'Puspa Indahati Sandhyaduhita', 'seeker', 'puspa.indahati@cs.ui.ac.id', '', 'Fasilkom', 'Dosen', 'P', '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('pussy.cat', 'Pussy Cat Meong Monte', 'seeker', 'pussy.cat@gmail.com', '', 'FK', '2012', 'P', 'Depok', '1994-08-01', '+xxxxxxxxxxxxx', 'Lainnya', '<p>Mandala E4 no.1</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>', '<p>Tidak ada</p>'),
('ricky.arifandi', 'Ricky Arifandi Daniel', 'provider', 'rick@araishikeiwai.com', '', 'Fasilkom', '2010', 'L', 'Sukarami', '1993-01-29', '+6285760778775', 'Islam', '<p>Perumahan Sukmajaya Permata Blok C/7</p>\r\n<p>Jalan Kemang I, Studio Alam, Sukmajaya</p>\r\n<p>Depok, 16424</p>', '<ul>\r\n<li>Java</li>\r\n<li>C++</li>\r\n<li>HTML/CSS/JavaScript</li>\r\n<li>PHP</li>\r\n<li>SQL</li>\r\n<li>VHDL</li>\r\n<li>Embedded C</li>\r\n<li>Bash</li>\r\n<li>ML/Haskell</li>\r\n<li>MATLAB</li>\r\n<li>Lua</li>\r\n<li>Android</li>\r\n<li>Software Engineering</li>\r\n<li>Linux</li>\r\n<li>Video Editing</li>\r\n<li>Filmmaking</li>\r\n<li>Teaching</li>\r\n<li>Communicating</li>\r\n</ul>', '<ol>\r\n<li>2011: Finalis IPSC</li>\r\n<li>2012: Finalis Gemastik</li>\r\n<li>2012: Finalis Compfest</li>\r\n<li>2012: Finalis INC</li>\r\n<li>2012: Finalis ICPC</li>\r\n<li>2012: Finalis IPSC</li>\r\n</ol>', '<p>Formal:</p>\r\n<ul>\r\n<li>1997-1998: TK Alquran</li>\r\n<li>1998-2004: SDN No 101912 Pagar Merbau</li>\r\n<li>2004-2007: SMPN 1 Lubuk Pakam</li>\r\n<li>2007-2007: SMAN 1 Lubuk Pakam</li>\r\n<li>2008-2010: SMAN 1 Bukittinggi</li>\r\n<li>2010-...: Fakultas Ilmu Komputer Universitas Indonesia</li>\r\n</ul>\r\n<p>Informal:</p>\r\n<ul>\r\n<li>Kursus Bahasa Inggris Gajah Mada Lubuk Pakam</li>\r\n</ul>', '<ol>\r\n<li>Panitia Wisuda beberapa kali</li>\r\n<li>Danus Sponsorship CGT 2011</li>\r\n<li>PR &amp; Media Partner Compfest 2011</li>\r\n<li>Mentor PMB 2011</li>\r\n<li>PJ Dokumentasi PMB 2012</li>\r\n</ol>', '<ol>\r\n<li>2011-...: Asisten Dosen PSD</li>\r\n<li>2011: Asisten Riset E-Government</li>\r\n<li>2012-...: Google Student Ambassador</li>\r\n</ol>', '<ol>\r\n<li>2011: Media BEM Fasilkom UI</li>\r\n<li>2011: Kreatif .XML Fasilkom UI</li>\r\n<li>2011-...: eCrowd Fasilkom UI</li>\r\n<li>2011-2012: Microsoft Innovation Center Fasilkom UI</li>\r\n<li>2012: Kabiro Produksi .XML Fasilkom UI</li>\r\n<li>2012: Kabiro HPD UI TTC</li>\r\n</ol>'),
('root', '', 'seeker', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_achievement`
--

CREATE TABLE IF NOT EXISTS `pengguna_achievement` (
  `username` varchar(25) NOT NULL,
  `id_achievement` int(11) NOT NULL,
  PRIMARY KEY (`username`,`id_achievement`),
  KEY `id_achievement` (`id_achievement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna_achievement`
--


-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `pengirim` varchar(25) NOT NULL,
  `penerima` varchar(25) NOT NULL,
  `waktu` time NOT NULL,
  `subject` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `id_pesan` int(11) NOT NULL,
  PRIMARY KEY (`pengirim`,`penerima`,`waktu`,`id_pesan`),
  KEY `penerima` (`penerima`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`pengirim`, `penerima`, `waktu`, `subject`, `isi`, `id_pesan`) VALUES
('agile.kalu', 'erryan.sazany', '11:05:00', 'First reply : ACK', '<p>iya deh maap maap</p>', 7),
('agile.kalu', 'erryan.sazany', '11:32:43', 'My First Message', 'Halo :)\r\n\r\nApa kabarnya?\r\n\r\nBaik-baik saja bukan?\r\n\r\nbukaaaaaan... *tijel', 1),
('agile.kalu', 'mocha.platine', '02:35:00', 'urgent', '<p>tolong diterima ya....</p>\r\n<p>&nbsp;</p>\r\n<p>awas kalo ga....</p>', 13),
('erryan.sazany', 'agile.kalu', '02:33:00', 'subjectnya samain dengan message', '<p>how now brown cow</p>', 12),
('erryan.sazany', 'agile.kalu', '09:21:00', 'Pengumuman', '<p>harap kumpul sebelum jam 7 pagi besok</p>', 14),
('erryan.sazany', 'agile.kalu', '09:22:00', 'Pengumuman', '<p>harap kumpul sebelum jam 7 pagi besok</p>', 16),
('erryan.sazany', 'agile.kalu', '09:29:00', 'Coba lagi', '<p>harap kumpul segera</p>', 18),
('erryan.sazany', 'agile.kalu', '09:30:00', 'Apakah terkirim?', '<p>Coba saya tes lagi</p>', 20),
('erryan.sazany', 'agile.kalu', '11:04:00', 'First reply', '<p>iya gua baik-baik aja kok, gausah khawatir banget banget deh</p>', 6),
('erryan.sazany', 'mocha.platine', '05:52:00', 'Re : Pertemuan Pertama Calon Asisten PPL', '<p>Baik bu, terima kasih atas informasinya.</p>\r\n<p>&nbsp;</p>\r\n<p>Erryan Sazany,<br />1006671375<br />Ilmu Komputer 2010</p>', 25),
('erryan.sazany', 'mocha.platine', '10:45:00', 'Re : Pertemuan Pertama Calon Asisten PPL', '<p>Baik bu, akan saya informasikan kepada teman-teman yang lain. Saya ingin tanya juga bu, apakah ada yang harus dipersiapkan sebelum pertemuan pertama?</p>\r\n<p>&nbsp;</p>\r\n<p>Terima kasih,<br />Erryan Sazany<br />1006671375</p>', 27),
('erryan.sazany', 'muchu.monte', '00:20:13', 'it''s time to follow her tomorrow', '<p>hooo hhoooo hooo hooo</p>', 2),
('erryan.sazany', 'muchu.monte', '02:08:00', 'it''s crazy', '<p>lalalayeyeye</p>', 8),
('erryan.sazany', 'muchu.monte', '03:13:00', 'Re: [CGT2013][GAMES] Pendaftaran CTR', '<p><span  ''Segoe UI Semilight'', ''Open Sans'', Verdana, Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; background-color: rgba(28, 183, 236, 0.0980392);">1. 1006671375_ErryanSazany</span></p>\r\n<p><span  ''Segoe UI Semilight'', ''Open Sans'', Verdana, Arial, Helvetica, sans-serif; font-size: 15px; line-height: 20px; background-color: rgba(28, 183, 236, 0.0980392);">2. 1000000001_MuchuMonte</span></p>', 10),
('erryan.sazany', 'muchu.monte', '09:21:00', 'Pengumuman', '<p>harap kumpul sebelum jam 7 pagi besok</p>', 15),
('erryan.sazany', 'muchu.monte', '09:22:00', 'Pengumuman', '<p>harap kumpul sebelum jam 7 pagi besok</p>', 17),
('erryan.sazany', 'muchu.monte', '09:29:00', 'Coba lagi', '<p>harap kumpul segera</p>', 19),
('erryan.sazany', 'muchu.monte', '09:30:00', 'Apakah terkirim?', '<p>Coba saya tes lagi</p>', 21),
('erryan.sazany', 'muchu.monte', '10:58:00', 'she just wants to play', '<p>like always</p>', 4),
('erryan.sazany', 'muchu.monte', '11:02:00', 'lalala', '<p>come on</p>', 5),
('erryan.sazany', 'puspa.indahati', '01:09:00', 'Re: Pertemuan Perdana Kuliah PPL', '<p>Terima kasih bu atas informasinya</p>\r\n<p>&nbsp;</p>\r\n<p>Erryan</p>', 34),
('erryan.sazany', 'puspa.indahati', '12:56:00', 'Re : Pertemuan Perdana Kuliah PPL', '<p>Terima kasih bu atas informasinya.</p>\r\n<p>&nbsp;</p>\r\n<p>Erryan Sazany</p>', 33),
('erryan.sazany', 'ricky.arifandi', '10:54:00', 'Halo Ricky', '<p>tastestastes</p>', 29),
('erryan.sazany', 'ricky.arifandi', '10:55:00', 'Apadeh....', '<p>Tijel mode : on</p>', 31),
('mocha.platine', 'aoeu', '05:51:00', 'Pertemuan Pertama Calon Asisten PPL', '<p>Selamat pagi para pendaftar,</p>\r\n<p>&nbsp;</p>\r\n<p>Dengan ini diberitahukan bahwa pertemuan pertama calon asisten PPL akan diadakan pada:</p>\r\n<ul>\r\n<li>Hari/Tanggal : Selasa, 1 Februari 2013</li>\r\n<li>Tempat : Aula Fasilkom UI</li>\r\n<li>Busana bebas namun rapi, no jeans no sandal.</li>\r\n</ul>\r\n<p>Isi pertemuan adalah mengenai rencana pengajaran untuk satu semester ke depan, dan pemaparan hak dan kewajiban para asisten PPL. Akan ada free snack dan makan siang.</p>\r\n<p>&nbsp;</p>\r\n<p>Sekian yang bisa saya sampaikan, terima kasih.</p>\r\n<p>&nbsp;</p>\r\n<p>Mocha Platine Monte,<br />Tim Dosen PPL 2013/2014</p>', 22),
('mocha.platine', 'erryan.sazany', '05:51:00', 'Pertemuan Pertama Calon Asisten PPL', '<p>Selamat pagi para pendaftar,</p>\r\n<p>&nbsp;</p>\r\n<p>Dengan ini diberitahukan bahwa pertemuan pertama calon asisten PPL akan diadakan pada:</p>\r\n<ul>\r\n<li>Hari/Tanggal : Selasa, 1 Februari 2013</li>\r\n<li>Tempat : Aula Fasilkom UI</li>\r\n<li>Busana bebas namun rapi, no jeans no sandal.</li>\r\n</ul>\r\n<p>Isi pertemuan adalah mengenai rencana pengajaran untuk satu semester ke depan, dan pemaparan hak dan kewajiban para asisten PPL. Akan ada free snack dan makan siang.</p>\r\n<p>&nbsp;</p>\r\n<p>Sekian yang bisa saya sampaikan, terima kasih.</p>\r\n<p>&nbsp;</p>\r\n<p>Mocha Platine Monte,<br />Tim Dosen PPL 2013/2014</p>', 23),
('mocha.platine', 'erryan.sazany', '05:54:00', 'Re : Pertemuan Pertama Calon Asisten PPL', '<p>Sama-sama. Tolong teman-temannya yang mendaftar unuk diberitahu ya, belum tentu mereka melihat pesan ini. Terima kasih.</p>\r\n<p>&nbsp;</p>\r\n<p>Mocha Platine Monte,<br />Tim Dosen PPL 2013/2014</p>', 26),
('mocha.platine', 'erryan.sazany', '10:53:00', 'Re : Pertemuan Pertama Calon Asisten PPL', '<p>Tidak ada, cukup datang pada waktu yang saya beritahu sebelumnya.</p>\r\n<p>&nbsp;</p>\r\n<p>Salam,<br />Mocha Platine Monte</p>', 28),
('mocha.platine', 'ricky.arifandi', '05:51:00', 'Pertemuan Pertama Calon Asisten PPL', '<p>Selamat pagi para pendaftar,</p>\r\n<p>&nbsp;</p>\r\n<p>Dengan ini diberitahukan bahwa pertemuan pertama calon asisten PPL akan diadakan pada:</p>\r\n<ul>\r\n<li>Hari/Tanggal : Selasa, 1 Februari 2013</li>\r\n<li>Tempat : Aula Fasilkom UI</li>\r\n<li>Busana bebas namun rapi, no jeans no sandal.</li>\r\n</ul>\r\n<p>Isi pertemuan adalah mengenai rencana pengajaran untuk satu semester ke depan, dan pemaparan hak dan kewajiban para asisten PPL. Akan ada free snack dan makan siang.</p>\r\n<p>&nbsp;</p>\r\n<p>Sekian yang bisa saya sampaikan, terima kasih.</p>\r\n<p>&nbsp;</p>\r\n<p>Mocha Platine Monte,<br />Tim Dosen PPL 2013/2014</p>', 24),
('muchu.monte', 'erryan.sazany', '00:20:13', 'thank you!', '<p>because of you</p>', 3),
('muchu.monte', 'erryan.sazany', '02:10:00', 'Re: [CGT2013][GAMES] Pendaftaran CTR', '<p>1. 1006671375_ErryanSazany</p>', 9),
('muchu.monte', 'erryan.sazany', '03:14:00', 'Au ah', '<p>cobacoba</p>', 11),
('muchu.monte', 'erryan.sazany', '10:53:36', 'Pesan Pertama', 'Kalo dapet roll depan ya :3', 0),
('puspa.indahati', 'erryan.sazany', '12:48:00', 'Pertemuan Perdana Kuliah PPL', '<p>Dear peserta PPL,</p>\r\n<p>&nbsp;</p>\r\n<p>Diberitahukan bahwa akan ada kuliah umum mengenai SRS dan SAD pada:</p>\r\n<ul>\r\n<li>Hari/tanggal : Selasa, 22 Mei 2013</li>\r\n<li>Tempat : Aula Fasilkom UI</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Harap datang tepat waktu karena peserta yang terlambat tidak diperbolehkan masuk. Terima kasih,</p>\r\n<p>&nbsp;</p>\r\n<p>Regards,<br />Puspa</p>', 32),
('ricky.arifandi', 'erryan.sazany', '10:55:00', 'Blahblahblah', '<p>Apasih jangan ngejunk dong</p>', 30);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id_lowongan` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `id_review` int(11) NOT NULL AUTO_INCREMENT,
  `nilai` int(11) NOT NULL,
  `isi` text NOT NULL,
  PRIMARY KEY (`id_review`),
  UNIQUE KEY `id_lowongan` (`id_lowongan`,`username`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_lowongan`, `username`, `id_review`, `nilai`, `isi`) VALUES
(11, 'muchu.monte', 2, 9, '<p>Kerja sangat baik, direkomendasikan untuk kerja lapangan</p>'),
(11, 'agile.kalu', 11, 8, '<p>kerja bagus, direkomendasikan untuk kerja lapangan</p>'),
(12, 'muchu.monte', 12, 8, '<p>Sangat baik, sering memberikan ide-ide yang inovatif.</p>'),
(12, 'mochi.eruption', 13, 9, '<p>Selalu datang kumpul tepat waktu</p>'),
(12, 'mocha.platine', 14, 9, '<p>Menjalankan kewajibannya dengan sangat baik</p>'),
(12, 'piku.frisky', 15, 7, '<p>Cenderung kurang sering berinteraksi dengan sesama anggota</p>'),
(12, 'pussy.cat', 16, 9, '<p>Selalu mencatat hasil-hasil rapat dengan lengkap tanpa ada informasi yang hilang</p>'),
(13, 'muchu.monte', 17, 9, '<p>Kinerja sangat baik</p>');

-- --------------------------------------------------------

--
-- Table structure for table `wawancara`
--

CREATE TABLE IF NOT EXISTS `wawancara` (
  `id_lowongan` int(11) NOT NULL,
  `peserta` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  PRIMARY KEY (`id_lowongan`,`tanggal`,`waktu`),
  KEY `peserta` (`peserta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wawancara`
--

INSERT INTO `wawancara` (`id_lowongan`, `peserta`, `tanggal`, `waktu`) VALUES
(7, '', '2013-04-10', '16:00:00'),
(7, '', '2013-04-10', '16:30:00'),
(11, '', '2013-05-01', '10:00:00'),
(11, '', '2013-05-01', '10:30:00'),
(11, '', '2013-05-01', '11:00:00'),
(11, '', '2013-05-02', '13:30:00'),
(11, '', '2013-05-02', '14:00:00'),
(11, '', '2013-05-02', '14:30:00'),
(17, '', '2013-05-23', '10:00:00'),
(17, '', '2013-05-23', '11:00:00'),
(17, '', '2013-05-24', '11:00:00'),
(17, '', '2013-05-27', '11:00:00'),
(17, '', '2013-05-28', '11:00:00'),
(17, '', '2013-05-29', '10:00:00'),
(17, '', '2013-05-29', '11:00:00'),
(17, '', '2013-05-30', '10:00:00'),
(17, '', '2013-05-30', '11:00:00'),
(17, '', '2013-05-31', '10:00:00'),
(17, '', '2013-05-31', '11:00:00'),
(11, 'agile.kalu', '2013-05-02', '13:00:00'),
(7, 'aoeu', '2013-04-10', '16:15:00'),
(17, 'aoeu', '2013-05-27', '10:00:00'),
(17, 'erryan.sazany', '2013-05-24', '10:00:00'),
(11, 'muchu.monte', '2013-05-01', '11:30:00'),
(17, 'ricky.arifandi', '2013-05-28', '10:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD CONSTRAINT `lowongan_ibfk_1` FOREIGN KEY (`nama_provider`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD CONSTRAINT `pendaftar_ibfk_3` FOREIGN KEY (`id_lowongan`) REFERENCES `lowongan` (`id_lowongan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftar_ibfk_4` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengguna_achievement`
--
ALTER TABLE `pengguna_achievement`
  ADD CONSTRAINT `pengguna_achievement_ibfk_3` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengguna_achievement_ibfk_4` FOREIGN KEY (`id_achievement`) REFERENCES `achievement` (`id_achievement`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_3` FOREIGN KEY (`pengirim`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesan_ibfk_4` FOREIGN KEY (`penerima`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_3` FOREIGN KEY (`id_lowongan`) REFERENCES `lowongan` (`id_lowongan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_4` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wawancara`
--
ALTER TABLE `wawancara`
  ADD CONSTRAINT `wawancara_ibfk_2` FOREIGN KEY (`id_lowongan`) REFERENCES `lowongan` (`id_lowongan`) ON DELETE CASCADE ON UPDATE CASCADE;
