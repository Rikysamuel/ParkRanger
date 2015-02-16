-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2015 at 10:40 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `parkranger`
--
CREATE DATABASE IF NOT EXISTS `parkranger` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `parkranger`;

-- --------------------------------------------------------

--
-- Table structure for table `ditanggapi`
--

CREATE TABLE IF NOT EXISTS `ditanggapi` (
  `id_laporan` int(11) NOT NULL,
  `id_tanggapan` int(11) NOT NULL,
  KEY `id_tanggapan` (`id_tanggapan`),
  KEY `id_laporan` (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `jumlah_report` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`jumlah_report`, `status`, `id_user`) VALUES
(0, 'banned', 3),
(0, 'unbanned', 4),
(0, 'unbanned', 5),
(0, 'unbanned', 6),
(0, 'unbanned', 10),
(0, 'unbanned', 11);

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE IF NOT EXISTS `pengaduan` (
  `id_laporan` int(11) NOT NULL AUTO_INCREMENT,
  `rank_vote` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `status` tinyint(20) NOT NULL,
  `file_foto` varchar(50) NOT NULL,
  `id_taman` int(11) NOT NULL,
  `ditangani_by` int(11) NOT NULL,
  `pelapor` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_laporan`),
  KEY `id_taman` (`id_taman`),
  KEY `ditangani_by` (`ditangani_by`),
  KEY `pelapor` (`pelapor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_laporan`, `rank_vote`, `waktu`, `status`, `file_foto`, `id_taman`, `ditangani_by`, `pelapor`, `keterangan`) VALUES
(18, 0, '2015-02-16 22:30:44', 0, 'rsz_1m-_140302213651-759.jpg', 26, 34, 11, '1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut mollis turpis. Quisque ut finibus mauris. Quisque sagittis lobortis enim, vel tristique nibh. Nunc malesuada tempor leo sed dapibus'),
(19, 0, '2015-02-16 22:30:58', 0, 'rsz_20140918_taman-film_1.jpg', 27, 33, 11, '2. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut mollis turpis. Quisque ut finibus mauris. Quisque sagittis lobortis enim, vel tristique nibh. Nunc malesuada tempor leo sed dapibus'),
(20, 0, '2015-02-16 22:31:13', 0, 'rsz_taman-lansia.jpg', 28, 35, 11, '3. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut mollis turpis. Quisque ut finibus mauris. Quisque sagittis lobortis enim, vel tristique nibh. Nunc malesuada tempor leo sed dapibus'),
(21, 0, '2015-02-16 22:34:01', 0, 'rsz_1654.jpg', 30, 33, 11, '4. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut mollis turpis. Quisque ut finibus mauris. Quisque sagittis lobortis enim, vel tristique nibh. Nunc malesuada tempor leo sed dapibus'),
(22, 0, '2015-02-16 22:34:39', 0, 'rsz_gepengtidur.jpg', 32, 34, 11, '5. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut mollis turpis. Quisque ut finibus mauris. Quisque sagittis lobortis enim, vel tristique nibh. Nunc malesuada tempor leo sed dapibus'),
(23, 0, '2015-02-16 22:37:18', 0, 'rsz_254014_620.jpg', 31, 35, 11, '6. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut mollis turpis. Quisque ut finibus mauris. Quisque sagittis lobortis enim, vel tristique nibh. Nunc malesuada tempor leo sed dapibus'),
(24, 0, '2015-02-16 22:38:23', 0, 'rsz_254014_620.jpg', 26, 34, 11, '7. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut mollis turpis. Quisque ut finibus mauris. Quisque sagittis lobortis enim, vel tristique nibh. Nunc malesuada tempor leo sed dapibus');

-- --------------------------------------------------------

--
-- Table structure for table `pihak_berwenang`
--

CREATE TABLE IF NOT EXISTS `pihak_berwenang` (
  `kategori` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pihak_berwenang`
--

INSERT INTO `pihak_berwenang` (`kategori`, `id_user`) VALUES
('Kebersihan', 33),
('Sosial', 34),
('Kenyamanan', 35),
('-', 36),
('-', 38);

-- --------------------------------------------------------

--
-- Table structure for table `taman`
--

CREATE TABLE IF NOT EXISTS `taman` (
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `id_taman` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_taman`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `taman`
--

INSERT INTO `taman` (`nama`, `alamat`, `id_taman`) VALUES
('Taman Musik', 'Jalan Belitung', 26),
('Taman Film', 'Jalan layang Pasupati', 27),
('Taman Lansia', 'Jalan jalaprang', 28),
('Taman Lalu Lintas', 'Jalan Kalimantan', 30),
('Taman Pasupati', 'Jalan Cikapayang', 31),
('Taman Balai Kota', 'taman merdeka', 32);

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE IF NOT EXISTS `tanggapan` (
  `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` text NOT NULL,
  `id_penanggap` int(11) NOT NULL,
  `tanggal_tanggapan` datetime NOT NULL,
  PRIMARY KEY (`id_tanggapan`),
  KEY `id_penanggap` (`id_penanggap`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `nama` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nama`, `email`, `username`, `password`, `id_user`, `role`) VALUES
('afik', 'afik@mail.com', 'afik', 'afik', 3, 3),
('edmund', 'edmund.ophie@yahoo.c', 'tbarker', 'a', 4, 3),
('abang adek', 'asd@as.com', 'ferysurya', 'qwer', 5, 3),
('asdas', 'aj@jack.com', 'Administrator', 'a', 6, 3),
('tes', 'rikz_sam611@yahoo.co', 'tes', 'tes', 10, 1),
('doremi', 'do@re.mi', 'doremi', 'doremi', 11, 3),
('PD. Kebersihan', 'rikz_sam611@yahoo.co', 'dinaskebersihan', 'dinaskebersihan', 33, 2),
('Dinas Sosial', 'rikz_sam611@yahoo.co', 'dinassosial', 'dinassosial', 34, 2),
('Dinas Pemakaman dan Pertamanan', 'rikz_sam611@yahoo.co', 'dinaspp', 'dinaspp', 35, 2),
('Polres Kota Bandung', 'rikz_sam611@yahoo.co', 'dinaspolres', 'dinaspolres', 36, 2),
('Satpol PP', 'rikz_sam611@yahoo.co', 'dinassatpol', 'dinassatpol', 38, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vote_laporan`
--

CREATE TABLE IF NOT EXISTS `vote_laporan` (
  `id_laporan` int(11) NOT NULL,
  `vote_by` int(11) NOT NULL,
  PRIMARY KEY (`id_laporan`,`vote_by`),
  KEY `vote_by` (`vote_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ditanggapi`
--
ALTER TABLE `ditanggapi`
  ADD CONSTRAINT `ditanggapi_ibfk_1` FOREIGN KEY (`id_tanggapan`) REFERENCES `tanggapan` (`id_tanggapan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ditanggapi_ibfk_2` FOREIGN KEY (`id_laporan`) REFERENCES `pengaduan` (`id_laporan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`id_taman`) REFERENCES `taman` (`id_taman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengaduan_ibfk_3` FOREIGN KEY (`pelapor`) REFERENCES `member` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengaduan_ibfk_4` FOREIGN KEY (`ditangani_by`) REFERENCES `pihak_berwenang` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pihak_berwenang`
--
ALTER TABLE `pihak_berwenang`
  ADD CONSTRAINT `pihak_berwenang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_penanggap`) REFERENCES `pihak_berwenang` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vote_laporan`
--
ALTER TABLE `vote_laporan`
  ADD CONSTRAINT `vote_laporan_ibfk_1` FOREIGN KEY (`id_laporan`) REFERENCES `pengaduan` (`id_laporan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vote_laporan_ibfk_2` FOREIGN KEY (`vote_by`) REFERENCES `member` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
