-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2022 at 07:09 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(3) NOT NULL COMMENT 'PK',
  `nama_jenis` varchar(50) COLLATE latin1_general_ci NOT NULL COMMENT 'nama jenis pembayaran'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Uang Pangkal'),
(2, 'Biaya SPP'),
(3, 'Biaya SKS'),
(4, 'Iuran Kemahasiswaan'),
(11, 'Uang Praktikum'),
(6, 'Iuran Perpustakaan'),
(7, 'Biaya Tugas Akhir'),
(8, 'Biaya Wisuda'),
(23, 'jenis pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` varchar(10) COLLATE latin1_general_ci NOT NULL COMMENT 'user name untuk login',
  `sandi` varchar(40) COLLATE latin1_general_ci NOT NULL COMMENT 'sandi dalam bentuk hash md5'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_user`, `sandi`) VALUES
('banghaji', 'ac43724f16e9241d990427ab7c8f4228'),
('admin', '28b662d883b6d76fd96e4ddc5e9ba780'),
('user', 'ee11cbb19052e40b07aac0ca060c23ee');

-- --------------------------------------------------------

--
-- Table structure for table `tempat`
--

CREATE TABLE `tempat` (
  `id_tempat` int(3) NOT NULL COMMENT 'PK',
  `nama_tempat` varchar(50) COLLATE latin1_general_ci NOT NULL COMMENT 'nama tempat pembayaran'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tempat`
--

INSERT INTO `tempat` (`id_tempat`, `nama_tempat`) VALUES
(1, 'Bendahara Kampus'),
(6, 'BNI Syariah'),
(3, 'Bank Muamalat'),
(14, 'tempat'),
(15, 'Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL COMMENT 'PK',
  `id_jenis` int(3) NOT NULL COMMENT 'FK dari tabel jenis',
  `id_tempat` int(3) NOT NULL COMMENT 'FK dari tabel tempat',
  `tanggal_bayar` date NOT NULL COMMENT 'tanggal pembayaran',
  `jumlah` double NOT NULL COMMENT 'jumlah yang dibayarkan',
  `semester` int(2) NOT NULL COMMENT 'semester pembayaran',
  `keterangan` varchar(50) COLLATE latin1_general_ci NOT NULL COMMENT 'keterangan pembayaran'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_jenis`, `id_tempat`, `tanggal_bayar`, `jumlah`, `semester`, `keterangan`) VALUES
(1, 1, 3, '2018-08-28', 2500000, 1, 'Angsuran 1'),
(4, 11, 1, '2018-09-24', 100000, 3, 'apalah'),
(5, 8, 3, '2018-08-28', 1650000, 9, 'ayo wisuda bray'),
(8, 6, 6, '2018-09-26', 200000, 9, 'tunggakan'),
(13, 11, 1, '2018-10-12', 125000, 3, 'lunas');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `view_transaksi` (
`id_transaksi` int(11)
,`id_jenis` int(3)
,`nama_jenis` varchar(50)
,`id_tempat` int(3)
,`nama_tempat` varchar(50)
,`tanggal_bayar` date
,`jumlah` double
,`semester` int(2)
,`keterangan` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi`
--
DROP TABLE IF EXISTS `view_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi`  AS SELECT `tr`.`id_transaksi` AS `id_transaksi`, `tr`.`id_jenis` AS `id_jenis`, `j`.`nama_jenis` AS `nama_jenis`, `tr`.`id_tempat` AS `id_tempat`, `t`.`nama_tempat` AS `nama_tempat`, `tr`.`tanggal_bayar` AS `tanggal_bayar`, `tr`.`jumlah` AS `jumlah`, `tr`.`semester` AS `semester`, `tr`.`keterangan` AS `keterangan` FROM ((`transaksi` `tr` join `jenis` `j`) join `tempat` `t`) WHERE `tr`.`id_jenis` = `j`.`id_jenis` AND `tr`.`id_tempat` = `t`.`id_tempat` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`),
  ADD KEY `nama_jenis` (`nama_jenis`);

--
-- Indexes for table `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`id_tempat`),
  ADD KEY `nama_tempat` (`nama_tempat`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `jenis_jumlah_semester` (`id_jenis`,`jumlah`,`semester`),
  ADD KEY `tempat_jumlah_semester` (`id_tempat`,`jumlah`,`semester`),
  ADD KEY `jenis_tempat_tanggal_jumlah_semester` (`id_jenis`,`id_tempat`,`tanggal_bayar`,`jumlah`,`semester`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(3) NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tempat`
--
ALTER TABLE `tempat`
  MODIFY `id_tempat` int(3) NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
