-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2013 at 02:40 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `judul`, `status`, `tipe`, `deskripsi`, `poster`, `tgl_tutup`, `nama_provider`, `syarat_FK`, `syarat_FKG`, `syarat_FMIPA`, `syarat_FT`, `syarat_FH`, `syarat_FE`, `syarat_FIB`, `syarat_FPsi`, `syarat_FISIP`, `syarat_FKM`, `syarat_Fasilkom`, `syarat_FIK`, `syarat_FF`, `syarat_Pascasarjana`, `syarat_Vokasi`, `syarat_2008`, `syarat_2009`, `syarat_2010`, `syarat_2011`, `syarat_2012`, `syarat_Alumni`, `syarat_Staf`, `syarat_Dosen`, `syarat_usia_min`, `syarat_usia_max`, `syarat_L`, `syarat_P`, `syarat_Islam`, `syarat_Kristen`, `syarat_Katolik`, `syarat_Buddha`, `syarat_Hindu`, `syarat_Konghucu`, `syarat_Lainnya`, `wawancara`) VALUES
(6, 'aoeu', 'belum dimoderasi', 'Kepanitiaan', '<p>Ini adalah deskripsinya</p>\r\n<p>Mau lagi? <strong>wets</strong></p>', '', '0000-00-00', 'ricky.arifandi', 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 17, 22, 1, 0, 1, 0, 0, 0, 0, 0, 1, 0),
(7, 'Tes', 'dimoderasi', 'Riset', '<p>Lowongan ini untuk orang keren</p>', '0', '2013-04-24', 'ricky.arifandi', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 17, 22, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1),
(9, 'Sponsorship Computer Festival 2013', 'dimoderasi', 'Kepanitiaan', '<p>Sponsorrr!!!</p>', '0', '2013-05-05', 'ricky.arifandi', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 17, 22, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0),
(10, 'Pegawai Kantin Balgebun', 'dimoderasi', 'Lainnya', '<p>Tukang anter minuman</p>', '0', '2013-05-29', 'provider', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 20, 40, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0);

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
(7, 'aoeu', 'diterima');

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
('aoeu', 'Cinta Ku Cinta Mu', 'seeker', 'cinta@cinta.cinta', '', 'Fasilkom', '2010', 'P', 'Hatimu', '1993-04-13', '+6285760778776', 'Islam', '<p>Jalan Neraka Gg. Surga No. 666</p>\r\n<p>Kota Kasablanka</p>\r\n<p>Negara Api</p>', '<p>Semua bisa kaya denny</p>\r\n<p>Hohoho</p>', '<p>Juara apa yaa mau tau aja sih</p>', '<p>keren</p>', '<p>Banyak</p>', '<p>Kepo amat wey</p>', '<p>Jago kok gua tenang aja</p>'),
('faruq', '', 'seeker', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('provider', 'Le Provider', 'provider', 'le@provider.com', '', 'Fasilkom', 'Dosen', 'L', '', '0000-00-00', '', '', '', '', '', '', '', '', ''),
('ricky.arifandi', 'Ricky Arifandi Daniel', 'provider', 'rick@araishikeiwai.com', '', 'Fasilkom', '2010', 'L', 'Sukarami', '1993-01-29', '+6285760778775', 'Islam', '<p>Perumahan Sukmajaya Permata Blok C/7</p>\r\n<p>Jalan Kemang I, Studio Alam, Sukmajaya</p>\r\n<p>Depok, 16424</p>', '<ul>\r\n<li>Java</li>\r\n<li>C++</li>\r\n<li>HTML/CSS/JavaScript</li>\r\n<li>PHP</li>\r\n<li>SQL</li>\r\n<li>VHDL</li>\r\n<li>Embedded C</li>\r\n<li>Bash</li>\r\n<li>ML/Haskell</li>\r\n<li>MATLAB</li>\r\n<li>Lua</li>\r\n<li>Android</li>\r\n<li>Software Engineering</li>\r\n<li>Linux</li>\r\n<li>Video Editing</li>\r\n<li>Filmmaking</li>\r\n<li>Teaching</li>\r\n<li>Communicating</li>\r\n</ul>', '<ol>\r\n<li>2011: Finalis IPSC</li>\r\n<li>2012: Finalis Gemastik</li>\r\n<li>2012: Finalis Compfest</li>\r\n<li>2012: Finalis INC</li>\r\n<li>2012: Finalis ICPC</li>\r\n<li>2012: Finalis IPSC</li>\r\n</ol>', '<p>Formal:</p>\r\n<ul>\r\n<li>1997-1998: TK Alquran</li>\r\n<li>1998-2004: SDN No 101912 Pagar Merbau</li>\r\n<li>2004-2007: SMPN 1 Lubuk Pakam</li>\r\n<li>2007-2007: SMAN 1 Lubuk Pakam</li>\r\n<li>2008-2010: SMAN 1 Bukittinggi</li>\r\n<li>2010-...: Fakultas Ilmu Komputer Universitas Indonesia</li>\r\n</ul>\r\n<p>Informal:</p>\r\n<ul>\r\n<li>Kursus Bahasa Inggris Gajah Mada Lubuk Pakam</li>\r\n</ul>', '<ol>\r\n<li>Panitia Wisuda beberapa kali</li>\r\n<li>Danus Sponsorship CGT 2011</li>\r\n<li>PR &amp; Media Partner Compfest 2011</li>\r\n<li>Mentor PMB 2011</li>\r\n<li>PJ Dokumentasi PMB 2012</li>\r\n</ol>', '<ol>\r\n<li>2011-...: Asisten Dosen PSD</li>\r\n<li>2011: Asisten Riset E-Government</li>\r\n<li>2012-...: Google Student Ambassador</li>\r\n</ol>', '<ol>\r\n<li>2011: Media BEM Fasilkom UI</li>\r\n<li>2011: Kreatif .XML Fasilkom UI</li>\r\n<li>2011-...: eCrowd Fasilkom UI</li>\r\n<li>2011-2012: Microsoft Innovation Center Fasilkom UI</li>\r\n<li>2012: Kabiro Produksi .XML Fasilkom UI</li>\r\n<li>2012: Kabiro HPD UI TTC</li>\r\n</ol>');

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
  PRIMARY KEY (`pengirim`,`penerima`,`waktu`),
  KEY `penerima` (`penerima`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `review`
--


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
(7, 'aoeu', '2013-04-10', '16:15:00');

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
