-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 13, 2015 at 11:57 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `parkranger`
--

-- --------------------------------------------------------

--
-- Table structure for table `ditanggapi`
--

CREATE TABLE IF NOT EXISTS `ditanggapi` (
  `id_laporan` int(11) NOT NULL,
  `id_tanggapan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `jumlah_report` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`jumlah_report`, `status`, `id_user`) VALUES
(0, '0', 3),
(0, 'unbanned', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE IF NOT EXISTS `pengaduan` (
`id_laporan` int(11) NOT NULL,
  `rank_vote` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `status` tinyint(20) NOT NULL,
  `file_foto` varchar(50) NOT NULL,
  `id_taman` int(11) NOT NULL,
  `ditangani_by` int(11) NOT NULL,
  `pelapor` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_laporan`, `rank_vote`, `waktu`, `status`, `file_foto`, `id_taman`, `ditangani_by`, `pelapor`, `keterangan`) VALUES
(3, 0, '0000-00-00 00:00:00', 0, '', 2, 2, 3, 'klkl');

-- --------------------------------------------------------

--
-- Table structure for table `pihak_berwenang`
--

CREATE TABLE IF NOT EXISTS `pihak_berwenang` (
  `kategori` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pihak_berwenang`
--

INSERT INTO `pihak_berwenang` (`kategori`, `id_user`) VALUES
('Ketertiban', 1),
('Kebersihan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `taman`
--

CREATE TABLE IF NOT EXISTS `taman` (
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
`id_taman` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `taman`
--

INSERT INTO `taman` (`nama`, `alamat`, `id_taman`) VALUES
('Jomblo', 'Bawah jembatan Pasopati', 1),
('Film', 'Bawah jembatan Pasopati', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE IF NOT EXISTS `tanggapan` (
`id_tanggapan` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `id_penanggap` int(11) NOT NULL,
  `tanggal_tanggapan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `nama` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
`id_user` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nama`, `email`, `username`, `password`, `id_user`, `role`) VALUES
('Satpol PP', 'satpolppbdg@email.co', 'satpolpp', 'satpolpp', 1, 2),
('Dinas Kebersihan', 'kebersihanbdg@email.', 'dinaskebersihan', 'dinaskebersihan', 2, 2),
('afik', 'afik@mail.com', 'afik', 'afik', 3, 3),
('edmund', 'edmund.ophie@yahoo.c', 'tbarker', 'a', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `vote_laporan`
--

CREATE TABLE IF NOT EXISTS `vote_laporan` (
  `id_laporan` int(11) NOT NULL,
  `vote_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ditanggapi`
--
ALTER TABLE `ditanggapi`
 ADD KEY `id_tanggapan` (`id_tanggapan`), ADD KEY `id_laporan` (`id_laporan`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
 ADD PRIMARY KEY (`id_laporan`), ADD KEY `id_taman` (`id_taman`), ADD KEY `ditangani_by` (`ditangani_by`), ADD KEY `pelapor` (`pelapor`);

--
-- Indexes for table `pihak_berwenang`
--
ALTER TABLE `pihak_berwenang`
 ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `taman`
--
ALTER TABLE `taman`
 ADD PRIMARY KEY (`id_taman`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
 ADD PRIMARY KEY (`id_tanggapan`), ADD KEY `id_penanggap` (`id_penanggap`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `vote_laporan`
--
ALTER TABLE `vote_laporan`
 ADD PRIMARY KEY (`id_laporan`,`vote_by`), ADD KEY `vote_by` (`vote_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `taman`
--
ALTER TABLE `taman`
MODIFY `id_taman` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
