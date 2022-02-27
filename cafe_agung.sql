-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Feb 27, 2022 at 06:45 PM
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
-- Table structure for table `t_aktivitas`
--

CREATE TABLE `t_aktivitas` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_tansaksi` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_diskon`
--

CREATE TABLE `t_diskon` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `diskon_persen` int(11) NOT NULL,
  `diskon_harga` double NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0 COMMENT '1.persen\r\n2.harga\r\n3.keduanya',
  `status` int(11) NOT NULL COMMENT '1=Aktif\r\n0=Tidak Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_diskon`
--

INSERT INTO `t_diskon` (`id`, `kode`, `diskon_persen`, `diskon_harga`, `type`, `status`) VALUES
(1, '32145', 10, 0, 1, 1),
(2, '123456', 0, 3000, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_jenis`
--

CREATE TABLE `t_jenis` (
  `id` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0= tidak aktip 1=aktip '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_jenis`
--

INSERT INTO `t_jenis` (`id`, `jenis`, `status`) VALUES
(3, 'Coffee', 1),
(4, 'Non Coffee', 1),
(5, 'Nasi', 1),
(6, 'Steak', 1),
(7, 'Disert', 1);

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

--
-- Dumping data for table `t_makanan`
--

INSERT INTO `t_makanan` (`id`, `id_jenis`, `nama`, `status`) VALUES
(1, 3, 'V60', 1),
(2, 3, 'Amerikano', 1),
(3, 3, 'Late', 1),
(4, 4, 'Susu', 1),
(5, 4, 'Teh Tawar', 1),
(6, 4, 'Teh Manis', 1),
(7, 5, 'Nasi Goreng', 1);

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

--
-- Dumping data for table `t_menu`
--

INSERT INTO `t_menu` (`id`, `id_jenis`, `id_makanan`, `harga`, `stok`) VALUES
(1, 3, 1, 15000, 100),
(2, 3, 2, 15000, 100),
(3, 3, 3, 18000, 200),
(4, 4, 4, 10000, 20),
(5, 4, 5, 5000, 100),
(6, 4, 6, 8000, 200),
(7, 5, 7, 21000, 70);

-- --------------------------------------------------------

--
-- Table structure for table `t_pesanan`
--

CREATE TABLE `t_pesanan` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` double NOT NULL,
  `catatan` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1.pesanan\r\n2.dibuat\r\n3.selesai dibuat\r\n4.di antarkan\r\n5.selesai\r\n6.batal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_pesanan`
--

INSERT INTO `t_pesanan` (`id`, `id_transaksi`, `id_menu`, `jumlah`, `total`, `catatan`, `status`) VALUES
(1, 4, 1, 1, 15000, '', 1),
(2, 4, 2, 1, 15000, '', 1),
(3, 4, 7, 2, 42000, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_diskon` int(11) DEFAULT NULL,
  `diskon` double DEFAULT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `no_meja` varchar(3) NOT NULL,
  `pajak` double NOT NULL,
  `total` double NOT NULL,
  `nominal` double NOT NULL COMMENT 'nomimal=uang di kasihkan oleh kasir atau customer',
  `kembalian` double NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1.Pesanan\r\n2.Pending\r\n3.Selesai\r\n4.Batal',
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_transaksi`
--

INSERT INTO `t_transaksi` (`id`, `id_user`, `id_diskon`, `diskon`, `atas_nama`, `no_meja`, `pajak`, `total`, `nominal`, `kembalian`, `tanggal`, `status`, `create_date`, `update_date`) VALUES
(4, 1, 0, 0, 'indra', '1', 7200, 79200, 80000, 800, '2022-02-27', 1, '2022-02-27 16:58:38', '2022-02-27 16:58:56');

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
-- Indexes for table `t_aktivitas`
--
ALTER TABLE `t_aktivitas`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `t_aktivitas`
--
ALTER TABLE `t_aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_diskon`
--
ALTER TABLE `t_diskon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_jenis`
--
ALTER TABLE `t_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_makanan`
--
ALTER TABLE `t_makanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_menu`
--
ALTER TABLE `t_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_pesanan`
--
ALTER TABLE `t_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
