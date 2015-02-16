-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Feb 2015 pada 17.54
-- Versi Server: 5.5.36
-- PHP Version: 5.4.25

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
-- Struktur dari tabel `ditanggapi`
--

CREATE TABLE IF NOT EXISTS `ditanggapi` (
  `id_laporan` int(11) NOT NULL,
  `id_tanggapan` int(11) NOT NULL,
  KEY `id_tanggapan` (`id_tanggapan`),
  KEY `id_laporan` (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ditanggapi`
--

INSERT INTO `ditanggapi` (`id_laporan`, `id_tanggapan`) VALUES
(17, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `jumlah_report` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`jumlah_report`, `status`, `id_user`) VALUES
(0, 0, 3),
(0, 0, 6),
(0, 0, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_laporan`, `rank_vote`, `waktu`, `status`, `file_foto`, `id_taman`, `ditangani_by`, `pelapor`, `keterangan`) VALUES
(17, 0, '2015-02-16 10:42:50', 0, '2dyXkPj.jpg', 2, 2, 3, '5324 gcruewrg4rt984y0239'),
(18, 0, '2015-02-16 11:43:31', 0, 'circle-tech-backgorund.jpg', 1, 1, 6, 'Banyak pungli di sekitar taman, banyak penjual yang di area terlarang juga, lalalla lalala lalala lalala lalal alalala alalalal alalla lalalal allalala lalalala lalaljdwejoi hr392ue12u09ue 32e832 nfsd'),
(20, 0, '2015-02-16 13:03:19', 0, '2dyXkPj.jpg', 1, 1, 3, 'halo 2'),
(21, 0, '2015-02-16 16:46:12', 0, 'msE62kY.jpg', 1, 1, 3, 'haloooo lahkasdkasdkh ihiasdks dahdhqi hqw 387y4e1 2hdjkahsd3y 398 32y4w hiwquhe 83y98 eiuwqhe 832y81ye heiu y382y 49328y 98 3y 8y4983y489 8y83y 387y4783bc4buqgr3278 rg87cg87r 278gc788724y38y4984 28y4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pihak_berwenang`
--

CREATE TABLE IF NOT EXISTS `pihak_berwenang` (
  `kategori` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pihak_berwenang`
--

INSERT INTO `pihak_berwenang` (`kategori`, `id_user`) VALUES
('Ketertiban', 1),
('Kebersihan', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `taman`
--

CREATE TABLE IF NOT EXISTS `taman` (
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `id_taman` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_taman`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `taman`
--

INSERT INTO `taman` (`nama`, `alamat`, `id_taman`) VALUES
('Jomblo', 'Bawah jembatan Pasopati', 1),
('Film', 'Bawah jembatan Pasopati', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE IF NOT EXISTS `tanggapan` (
  `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` text NOT NULL,
  `id_penanggap` int(11) NOT NULL,
  `tanggal_tanggapan` date NOT NULL,
  PRIMARY KEY (`id_tanggapan`),
  KEY `id_penanggap` (`id_penanggap`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `keterangan`, `id_penanggap`, `tanggal_tanggapan`) VALUES
(1, 'hai', 1, '2015-02-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `nama` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nama`, `email`, `username`, `password`, `id_user`, `role`) VALUES
('Satpol PP', 'satpolppbdg@email.co', 'satpolpp', 'satpol', 1, 2),
('Dinas Kebersihan', 'kebersihanbdg@email.', 'dinaskebersihan', 'dinaskebersihan', 2, 2),
('afik', 'afik@mail.com', 'afik', 'akuafik', 3, 3),
('admin', 'admin', 'admin', 'admin', 5, 1),
('yolla', 'yolla@mail.com', 'yolla', 'yolla', 6, 3),
('Diah', 'diah@diah.diah', 'afik', 'diah', 7, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vote_laporan`
--

CREATE TABLE IF NOT EXISTS `vote_laporan` (
  `id_laporan` int(11) NOT NULL,
  `vote_by` int(11) NOT NULL,
  PRIMARY KEY (`id_laporan`),
  KEY `id_laporan` (`id_laporan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ditanggapi`
--
ALTER TABLE `ditanggapi`
  ADD CONSTRAINT `ditanggapi_ibfk_1` FOREIGN KEY (`id_tanggapan`) REFERENCES `tanggapan` (`id_tanggapan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ditanggapi_ibfk_2` FOREIGN KEY (`id_laporan`) REFERENCES `pengaduan` (`id_laporan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`id_taman`) REFERENCES `taman` (`id_taman`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengaduan_ibfk_3` FOREIGN KEY (`pelapor`) REFERENCES `member` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengaduan_ibfk_4` FOREIGN KEY (`ditangani_by`) REFERENCES `pihak_berwenang` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pihak_berwenang`
--
ALTER TABLE `pihak_berwenang`
  ADD CONSTRAINT `pihak_berwenang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_penanggap`) REFERENCES `pihak_berwenang` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `vote_laporan`
--
ALTER TABLE `vote_laporan`
  ADD CONSTRAINT `vote_laporan_ibfk_1` FOREIGN KEY (`id_laporan`) REFERENCES `pengaduan` (`id_laporan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
