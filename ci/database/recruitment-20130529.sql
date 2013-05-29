-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2013 at 06:24 PM
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
CREATE DATABASE `recruitment` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `recruitment`;

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
  `poster` tinyint(1) NOT NULL,
  `tgl_tutup` date NOT NULL,
  `nama_provider` varchar(25) NOT NULL,
  `syarat` text NOT NULL,
  `syarat_usia_min` int(11) NOT NULL,
  `syarat_usia_max` int(11) NOT NULL,
  `wawancara` int(10) NOT NULL,
  PRIMARY KEY (`id_lowongan`),
  KEY `nama_provider` (`nama_provider`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `judul`, `status`, `tipe`, `deskripsi`, `poster`, `tgl_tutup`, `nama_provider`, `syarat`, `syarat_usia_min`, `syarat_usia_max`, `wawancara`) VALUES
(1, 'Lowongan', 'ditolak', 'Kepanitiaan', '<p>Asik</p>', 0, '2013-09-19', 'ricky.arifandi', 'Pascasarjana Vokasi Mahasiswa2008 Mahasiswa2010 Pria Wanita Islam Kristen Katolik Buddha Hindu Konghucu Lainnya ', 15, 25, 0),
(2, 'Segala Macem', 'dimoderasi', 'Riset', '<p>Segala macemy yang berhubungan dengan riset yang akan diselenggarakan oleh Kak Rozi</p>\r\n<p>Riset ini dimulai</p>', 0, '2013-05-31', 'ricky.arifandi', 'Non-Fakultas FK FKG FMIPA FT FH FE FIB FPsi FISIP FKM Fasilkom FIK FF Pascasarjana Vokasi Mahasiswa2008 Mahasiswa2009 Mahasiswa2010 Mahasiswa2011 Mahasiswa2012 Alumni Staf Pria Wanita Islam Kristen Katolik Buddha Hindu Konghucu Lainnya ', 34, 35, 1),
(3, 'PO dan Komite Kepanitiaan UI Art War 2013', 'dipromosikan', 'Kepanitiaan', '<p>aoeu</p>', 0, '2014-01-01', 'ricky.arifandi', 'FIB Mahasiswa2008 Pria Kristen ', 3, 4, 0),
(13, 'aoeu', 'belum dimoderasi', 'Kepanitiaan', '<p>aue</p>', 0, '2014-01-01', 'ricky.arifandi', 'Non-Fakultas FK FKG FMIPA FT FH FE FIB FPsi FISIP FKM Fasilkom FIK FF Pascasarjana Vokasi Mahasiswa2008 Mahasiswa2009 Mahasiswa2010 Mahasiswa2011 Mahasiswa2012 Alumni Staf Dosen Pria Wanita Islam Kristen Katolik Buddha Hindu Konghucu Lainnya ', 0, 100, 1),
(14, 'aoeuaoeu', 'belum dimoderasi', 'Kepanitiaan', '<p>aoeu</p>', 0, '2013-01-01', 'ricky.arifandi', 'Non-Fakultas FK FKG FMIPA FT FH FE FIB FPsi FISIP FKM Fasilkom FIK FF Pascasarjana Vokasi Mahasiswa2008 Mahasiswa2009 Mahasiswa2010 Mahasiswa2011 Mahasiswa2012 Alumni Staf Dosen Pria Wanita Islam Kristen Katolik Buddha Hindu Konghucu Lainnya ', 0, 100, 1),
(15, 'a', 'belum dimoderasi', 'Kepanitiaan', '<p>aoeu</p>', 0, '2014-01-01', 'ricky.arifandi', 'Non-Fakultas FK FKG FMIPA FT FH FE FIB FPsi FISIP FKM Fasilkom FIK FF Pascasarjana Vokasi Mahasiswa2008 Mahasiswa2009 Mahasiswa2010 Mahasiswa2011 Mahasiswa2012 Alumni Staf Dosen Pria Wanita Islam Kristen Katolik Buddha Hindu Konghucu Lainnya ', 0, 100, 3);

-- --------------------------------------------------------

--
-- Table structure for table `lowongan_promosi`
--

CREATE TABLE IF NOT EXISTS `lowongan_promosi` (
  `id_lowongan` int(10) NOT NULL,
  `id_promosi` int(10) NOT NULL,
  `status` varchar(25) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  PRIMARY KEY (`id_lowongan`,`id_promosi`),
  KEY `id_promosi` (`id_promosi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lowongan_promosi`
--

INSERT INTO `lowongan_promosi` (`id_lowongan`, `id_promosi`, `status`, `tanggal_mulai`) VALUES
(3, 1, 'dipromosikan', '2013-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_lowongan` int(11) NOT NULL,
  `id_rekening` int(11) NOT NULL,
  `asal_bank` varchar(30) NOT NULL,
  `asal_rekening` varchar(30) NOT NULL,
  `asal_nama` varchar(100) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'diajukan verifikasi',
  PRIMARY KEY (`id_lowongan`,`id_rekening`,`tanggal_bayar`,`status`),
  KEY `id_lowongan` (`id_lowongan`),
  KEY `id_rekening` (`id_rekening`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_lowongan`, `id_rekening`, `asal_bank`, `asal_rekening`, `asal_nama`, `tanggal_bayar`, `status`) VALUES
(3, 1, 'BCA', '1234444333', 'Daniel Ganteng', '2013-12-31', 'dipromosikan');

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
(1, 'admin', 'melamar'),
(1, 'ricky.arifandi', 'melamar');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` varchar(8) NOT NULL DEFAULT 'seeker',
  `email` varchar(50) NOT NULL,
  `foto` tinyint(1) NOT NULL,
  `fakultas` varchar(25) NOT NULL,
  `role` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
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
('admin', 'Administrator', 'admin', 'recr.ui.tment@araishikeiwai.com', 0, '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('ahmad.faruq', 'AHMAD FARUQ WAQFI', 'seeker', 'ahmad.faruq@ui.ac.id', 0, 'Pascasarjana', 'Mahasiswa2010', 'Pria', 'aoeu', '1993-12-12', '085760778775', 'Islam', '<p>aoeu</p>', '<p>aoeu</p>', '<p>aoeu</p>', '<p>aoeu</p>', '<p>aoeu</p>', '<p>aoeu</p>', '<p>aoeu</p>'),
('ricky.arifandi', 'Ricky Arifandi Daniel', 'provider', 'rick@araishikeiwai.com', 1, 'Fasilkom', 'Mahasiswa2010', 'Pria', 'Sukarami', '1993-01-29', '+6285760778775', 'Islam', '<p>Perumahan Sukmajaya Permata Blok C/7</p>\r\n<p>Jalan Kemang I, Studio Alam, Sukmajaya</p>\r\n<p>Depok, 16424</p>', '<ul>\r\n<li>Java</li>\r\n<li>C++</li>\r\n<li>HTML/CSS/JavaScript</li>\r\n<li>PHP</li>\r\n<li>SQL</li>\r\n<li>VHDL</li>\r\n<li>Embedded C</li>\r\n<li>Bash</li>\r\n<li>ML/Haskell</li>\r\n<li>MATLAB</li>\r\n<li>Lua</li>\r\n<li>Android</li>\r\n<li>Software Engineering</li>\r\n<li>Linux</li>\r\n<li>Video Editing</li>\r\n<li>Filmmaking</li>\r\n<li>Teaching</li>\r\n<li>Communicating</li>\r\n</ul>', '<ol>\r\n<li>2011: Finalis IPSC</li>\r\n<li>2012: Finalis Gemastik</li>\r\n<li>2012: Finalis Compfest</li>\r\n<li>2012: Finalis INC</li>\r\n<li>2012: Finalis ICPC</li>\r\n<li>2012: Finalis IPSC</li>\r\n</ol>', '<p>Formal:</p>\r\n<ul>\r\n<li>1997-1998: TK Alquran</li>\r\n<li>1998-2004: SDN No 101912 Pagar Merbau</li>\r\n<li>2004-2007: SMPN 1 Lubuk Pakam</li>\r\n<li>2007-2007: SMAN 1 Lubuk Pakam</li>\r\n<li>2008-2010: SMAN 1 Bukittinggi</li>\r\n<li>2010-...: Fakultas Ilmu Komputer Universitas Indonesia</li>\r\n</ul>\r\n<p>Informal:</p>\r\n<ul>\r\n<li>Kursus Bahasa Inggris Gajah Mada Lubuk Pakam</li>\r\n</ul>', '<ol>\r\n<li>Panitia Wisuda beberapa kali</li>\r\n<li>Danus Sponsorship CGT 2011</li>\r\n<li>PR &amp; Media Partner Compfest 2011</li>\r\n<li>Mentor PMB 2011</li>\r\n<li>PJ Dokumentasi PMB 2012</li>\r\n</ol>', '<ol>\r\n<li>2011-...: Asisten Dosen PSD</li>\r\n<li>2011: Asisten Riset E-Government</li>\r\n<li>2012-...: Google Student Ambassador</li>\r\n</ol>', '<ol>\r\n<li>2011: Media BEM Fasilkom UI</li>\r\n<li>2011: Kreatif .XML Fasilkom UI</li>\r\n<li>2011-...: eCrowd Fasilkom UI</li>\r\n<li>2011-2012: Microsoft Innovation Center Fasilkom UI</li>\r\n<li>2012: Kabiro Produksi .XML Fasilkom UI</li>\r\n<li>2012: Kabiro HPD UI TTC</li>\r\n</ol>'),
('tes1', '', 'seeker', '', 0, '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('tes2', '', 'seeker', '', 0, '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('tes3', '', 'seeker', '', 0, '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '');

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
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subject` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'unread',
  PRIMARY KEY (`pengirim`,`penerima`,`waktu`,`id_pesan`),
  KEY `penerima` (`penerima`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`pengirim`, `penerima`, `waktu`, `subject`, `isi`, `id_pesan`, `status`) VALUES
('admin', 'ricky.arifandi', '2013-05-27 07:10:00', 'aoeu', '<p>aoeu</p>', 1, 'read'),
('admin', 'ricky.arifandi', '2013-05-27 13:16:41', 'Lowongan Ditolak untuk Ditampilkan', 'Mohon maaf, karena satu dan lain hal, lowongan yang Anda ajukan kami tolak<br/>Silakan <i>review</i> kembali deskripsi dan syarat-syarat lowongan Anda.<br/><br/>Jika ada pertanyaan lebih lanjut, silakan kirim pesan langsung ke Administrator', 3, 'read'),
('admin', 'ricky.arifandi', '2013-05-27 13:18:51', 'Lowongan Ditolak untuk Ditampilkan', 'Mohon maaf, karena satu dan lain hal, lowongan yang Anda ajukan yang berjudul<a href=http://localhost/recruitment/ci/lowongan/lihat/2>Segala Macem</a>kami tolak<br/>Silakan <i>review</i> kembali deskripsi dan syarat-syarat lowongan Anda.<br/><br/>Jika ada pertanyaan lebih lanjut, silakan balas pesan ini langsung ke Administrator', 4, 'read'),
('admin', 'ricky.arifandi', '2013-05-27 13:20:04', 'Lowongan Ditolak untuk Ditampilkan', 'Mohon maaf, karena satu dan lain hal, lowongan yang Anda ajukan yang berjudul <a href=http://localhost/recruitment/ci/lowongan/lihat/2>Segala Macem</a> kami tolak<br/>Silakan <i>review</i> kembali deskripsi dan syarat-syarat lowongan Anda.<br/><br/>Jika ada pertanyaan lebih lanjut, silakan balas pesan ini langsung ke Administrator', 5, 'read'),
('admin', 'ricky.arifandi', '2013-05-27 13:20:32', 'Lowongan Ditolak untuk Ditampilkan', 'Mohon maaf, karena satu dan lain hal, lowongan yang Anda ajukan yang berjudul <a href=http://localhost/recruitment/ci/lowongan/lihat/2>Segala Macem</a> kami tolak<br/>Silakan <i>review</i> kembali deskripsi dan syarat-syarat lowongan Anda.<br/><br/>Jika ada pertanyaan lebih lanjut, silakan balas pesan ini langsung ke Administrator', 6, 'read'),
('admin', 'ricky.arifandi', '2013-05-27 13:21:34', 'Lowongan Ditolak untuk Ditampilkan', 'Mohon maaf, karena satu dan lain hal, lowongan yang Anda ajukan yang berjudul <a href=http://localhost/recruitment/ci/lowongan/lihat/2>Segala Macem</a> kami tolak<br/>Silakan <i>review</i> kembali deskripsi dan syarat-syarat lowongan Anda.<br/><br/>Jika ada pertanyaan lebih lanjut, silakan balas pesan ini langsung ke Administrator', 7, 'read'),
('admin', 'ricky.arifandi', '2013-05-27 13:24:37', 'Verifikasi Pembayaran Promosi Gagal', 'Mohon maaf, karena satu dan lain hal, verifikasi pembayaran untuk promosi lowongan yang Anda ajukan yang berjudul <a href=http://localhost/recruitment/ci/lowongan/lihat/3>PO dan Komite Kepanitiaan UI Art War 2013</a> kami tolak<br/>Silakan <i>review</i> kembali pembayaran lowongan Anda.<br/>Untuk saat ini, lowongan Anda dikembalikan berstatus "dimoderasi", jika ingin mempromosikan kembali lowongan Anda, silakan mengajukan promosi kembali<br/><br/>Jika ada pertanyaan lebih lanjut, silakan balas pesan ini langsung ke Administrator', 8, 'read'),
('admin', 'ricky.arifandi', '2013-05-27 13:27:50', 'Verifikasi Pembayaran Promosi Gagal', 'Mohon maaf, karena satu dan lain hal, verifikasi pembayaran untuk promosi lowongan yang Anda ajukan yang berjudul <a href=http://localhost/recruitment/ci/lowongan/lihat/3>PO dan Komite Kepanitiaan UI Art War 2013</a> kami tolak.<br/>Silakan <i>review</i> kembali pembayaran lowongan Anda.<br/>Untuk saat ini, lowongan Anda dikembalikan berstatus "dimoderasi", jika ingin mempromosikan kembali lowongan Anda, silakan mengajukan promosi kembali.<br/><br/>Jika ada pertanyaan lebih lanjut, silakan balas pesan ini langsung ke Administrator.', 9, 'read'),
('admin', 'ricky.arifandi', '2013-05-27 13:30:22', 'Verifikasi Pembayaran Promosi Gagal', 'Mohon maaf, karena satu dan lain hal, verifikasi pembayaran untuk promosi lowongan yang Anda ajukan yang berjudul <a href=http://localhost/recruitment/ci/lowongan/lihat/3>PO dan Komite Kepanitiaan UI Art War 2013</a> kami tolak.<br/>Silakan <i>review</i> kembali pembayaran lowongan Anda.<br/>Untuk saat ini, lowongan Anda dikembalikan berstatus "dimoderasi", jika ingin mempromosikan kembali lowongan Anda, silakan mengajukan promosi kembali.<br/><br/>Jika ada pertanyaan lebih lanjut, silakan balas pesan ini langsung ke Administrator.<br/>', 11, 'read'),
('admin', 'ricky.arifandi', '2013-05-27 16:23:54', 'o.ogayg', '<p>j.yap m.mxadaba</p>', 12, 'read'),
('admin', 'ricky.arifandi', '2013-05-27 16:25:45', 'dr, mgjd co yday eriic. cb yd. ,cber,Z', '<p>dadadada</p>', 14, 'read'),
('admin', 'ricky.arifandi', '2013-05-29 14:51:07', 'Lowongan Ditolak untuk Ditampilkan', 'Mohon maaf, karena satu dan lain hal, lowongan yang Anda ajukan yang berjudul <a href=http://localhost/recruitment/ci/lowongan/lihat/1>Lowongan</a> kami tolak.<br/>Silakan <i>review</i> kembali deskripsi dan syarat-syarat lowongan Anda.<br/><br/>Jika ada pertanyaan lebih lanjut, silakan balas pesan ini langsung ke Administrator.<br/>', 15, 'read'),
('ricky.arifandi', 'admin', '2013-05-27 07:10:56', 'Re: aoeu', '<p>aoeu<br /><br /><em>quoting from admin:</em><br />----------------</p>\r\n<p>aoeu</p>\r\n<p>----------------</p>', 2, 'read'),
('ricky.arifandi', 'admin', '2013-05-27 13:28:57', 'Re: Verifikasi Pembayaran Promosi Gagal', '<p>Ciyus?<br /><br /><em>quoting from admin:</em><br />----------------<br />Mohon maaf, karena satu dan lain hal, verifikasi pembayaran untuk promosi lowongan yang Anda ajukan yang berjudul <a href="../../../lowongan/lihat/3">PO dan Komite Kepanitiaan UI Art War 2013</a> kami tolak.<br />Silakan <em>review</em> kembali pembayaran lowongan Anda.<br />Untuk saat ini, lowongan Anda dikembalikan berstatus "dimoderasi", jika ingin mempromosikan kembali lowongan Anda, silakan mengajukan promosi kembali.<br /><br />Jika ada pertanyaan lebih lanjut, silakan balas pesan ini langsung ke Administrator.----------------</p>', 10, 'read'),
('ricky.arifandi', 'admin', '2013-05-27 16:24:49', 'Re: o.ogayg', '<p>y.plamlabi bfaya<br /><br /><em>quoting from admin:</em><br />----------------</p>\r\n<p>j.yap m.mxadaba</p>\r\n<p>----------------</p>', 13, 'read');

-- --------------------------------------------------------

--
-- Table structure for table `promosi_paket`
--

CREATE TABLE IF NOT EXISTS `promosi_paket` (
  `id_promosi` int(1) NOT NULL,
  `durasi_promosi` int(255) NOT NULL,
  `biaya_promosi` varchar(10) NOT NULL,
  PRIMARY KEY (`id_promosi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promosi_paket`
--

INSERT INTO `promosi_paket` (`id_promosi`, `durasi_promosi`, `biaya_promosi`) VALUES
(1, 3, '100.000,00'),
(2, 7, '200.000,00'),
(3, 14, '360.000,00'),
(4, 30, '650.000,00');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE IF NOT EXISTS `rekening` (
  `id_rekening` int(11) NOT NULL AUTO_INCREMENT,
  `rekening` varchar(100) NOT NULL,
  PRIMARY KEY (`id_rekening`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `rekening`) VALUES
(1, 'BNI Cabang UI Depok No 0204 208 248 a/n Ricky Arifandi Daniel'),
(2, 'BCA Cabang Bukittinggi No 8050 143 628 a/n Ricky Arifandi Daniel');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_lowongan`, `username`, `id_review`, `nilai`, `isi`) VALUES
(1, 'ahmad.faruq', 1, 10, '<p>dntdihnrcgk</p>'),
(2, 'ahmad.faruq', 4, 5, ''),
(3, 'ahmad.faruq', 5, 1, '<p>aoeu</p>'),
(1, 'ricky.arifandi', 6, 4, '<p>Tes</p>'),
(1, 'admin', 7, 8, '<p>antoheuantoeu</p>');

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
(2, '', '2013-05-27', '14:06:00'),
(15, '', '2013-01-01', '01:00:00'),
(15, '', '2013-05-18', '00:34:00'),
(15, '', '2013-05-24', '15:41:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD CONSTRAINT `lowongan_ibfk_1` FOREIGN KEY (`nama_provider`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lowongan_promosi`
--
ALTER TABLE `lowongan_promosi`
  ADD CONSTRAINT `lowongan_promosi_ibfk_1` FOREIGN KEY (`id_lowongan`) REFERENCES `lowongan` (`id_lowongan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lowongan_promosi_ibfk_2` FOREIGN KEY (`id_promosi`) REFERENCES `promosi_paket` (`id_promosi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_lowongan`) REFERENCES `lowongan_promosi` (`id_lowongan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_rekening`) REFERENCES `rekening` (`id_rekening`) ON DELETE CASCADE ON UPDATE CASCADE;

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
