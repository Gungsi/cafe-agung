-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Feb 20, 2022 at 10:18 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe_agung`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_diskon`
--

CREATE TABLE `t_diskon` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `diskon_persen` int(11) NOT NULL,
  `diskon_harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_jenis`
--

CREATE TABLE `t_jenis` (
  `id` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0= tidak aktip 1=aktip '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_makanan`
--

CREATE TABLE `t_makanan` (
  `id` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=tidak aktip 1=aktip'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_menu`
--

CREATE TABLE `t_menu` (
  `id` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_makanan` int(11) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_pesanan`
--

CREATE TABLE `t_pesanan` (
  `id` int(11) NOT NULL,
  `id_transakai` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `id` int(11) NOT NULL,
  `id_diskon` int(11) NOT NULL,
  `pajak` double NOT NULL,
  `total` double NOT NULL,
  `nominal` double NOT NULL COMMENT 'nomimal=uang di kasihkan oleh kasir atau customer',
  `kembalian` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `level` int(11) NOT NULL COMMENT '1=admin 2=kasir 3=manejer',
  `status` int(11) NOT NULL COMMENT '1=aktif\r\n0=tidak aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `nama`, `email`, `username`, `password`, `jenis_kelamin`, `level`, `status`) VALUES
(1, 'Agung Pamungkas', 'agungaja@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Laki-Laki', 1, 1),
(2, 'kasir', 'kasir@gmail.com', 'kasir', 'c7911af3adbd12a035b289556d96470a', 'Laki-Laki', 2, 1),
(3, 'menejer', 'menejer@gmail.com', 'menejer', 'eac5377545d2cabee963bf11ac1a93fd', 'Laki-Laki', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_diskon`
--
ALTER TABLE `t_diskon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_jenis`
--
ALTER TABLE `t_jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_makanan`
--
ALTER TABLE `t_makanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_menu`
--
ALTER TABLE `t_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_pesanan`
--
ALTER TABLE `t_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_diskon`
--
ALTER TABLE `t_diskon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_jenis`
--
ALTER TABLE `t_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_makanan`
--
ALTER TABLE `t_makanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_menu`
--
ALTER TABLE `t_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_pesanan`
--
ALTER TABLE `t_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
