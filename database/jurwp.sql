-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Des 2014 pada 20.03
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jurwp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `fisika` int(5) NOT NULL,
  `matematika` int(5) NOT NULL,
  `b_inggris` int(5) NOT NULL,
  `geografi` int(5) NOT NULL,
  `ekonomi` int(5) NOT NULL,
  `b_indonesia` int(5) NOT NULL,
  `nis` int(11) NOT NULL,
  `total` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`fisika`, `matematika`, `b_inggris`, `geografi`, `ekonomi`, `b_indonesia`, `nis`, `total`) VALUES
(100, 50, 50, 80, 80, 90, 20140001, 1780),
(70, 80, 90, 55, 55, 70, 20140002, 1705),
(80, 80, 80, 50, 60, 60, 20140003, 1680),
(80, 90, 60, 70, 80, 80, 20140004, 1850),
(80, 90, 20, 40, 50, 60, 20140005, 1420),
(90, 90, 90, 90, 60, 80, 20140006, 2040),
(90, 80, 80, 70, 90, 90, 20140007, 1990),
(85, 80, 80, 85, 90, 90, 20140008, 2025),
(50, 50, 40, 40, 80, 90, 20140009, 1330),
(65, 65, 80, 75, 80, 80, 20140010, 1750);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
`nis` int(11) NOT NULL,
  `nama_siswa` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20140012 ;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_siswa`, `alamat`) VALUES
(20140001, 'Gilang Pandu Parase', 'Jl Jalam'),
(20140002, 'Sukamto', 'Jl. Abu dabi'),
(20140003, 'Rudy Saputra', 'Jl. Bima No. 12'),
(20140004, 'Sisi Latu', 'Jl Jalan Bareng'),
(20140005, 'Sumenep', 'Jl. Bersama'),
(20140006, 'Suci Miralita', 'Jl. Ciputat No 89'),
(20140007, 'Wanda Priatna', 'Jl. Kelapa 2 No. 72'),
(20140008, 'Windy Garis Pratiwi', 'Jl. Depsos Raya No. 73'),
(20140009, 'Dudung Maman', 'Jl. Belakang Masjid'),
(20140010, 'Rizky Oktavian', 'Jl. Depsos Raya No. 43A'),
(20140011, 'Roby Anugrah', 'Jl. Simatupang Raya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`id_user` int(9) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_depan`, `nama_belakang`, `username`, `password`) VALUES
(1, 'Gilang', 'Pandu', 'gilangpanduparase@gmail.com', 'c531bd1acb5ee913723eaac3c4eb7a3b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
 ADD KEY `nis` (`nis`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
 ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
MODIFY `nis` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20140012;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id_user` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
