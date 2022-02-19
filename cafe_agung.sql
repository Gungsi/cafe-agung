-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Feb 2022 pada 08.56
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

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
-- Struktur dari tabel `t_diskon`
--

CREATE TABLE `t_diskon` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `diskon_persen` int(11) NOT NULL,
  `diskon_harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jenis`
--

CREATE TABLE `t_jenis` (
  `id` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0= tidak aktip 1=aktip '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_makanan`
--

CREATE TABLE `t_makanan` (
  `id` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0=tidak aktip 1=aktip'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_menu`
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
-- Struktur dari tabel `t_traksaksi`
--

CREATE TABLE `t_traksaksi` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_diskon` int(11) NOT NULL,
  `pajak` double NOT NULL,
  `total` double NOT NULL,
  `nominal` double NOT NULL COMMENT 'nomimal=uang di kasihkan oleh kasir atau customer',
  `kembalian` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `level` int(11) NOT NULL COMMENT '1=admin 2=kasir 3=manejer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id`, `nama`, `email`, `username`, `password`, `jenis_kelamin`, `level`) VALUES
(1, 'Agung Pamungkas', 'agungaja@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Laki-Laki', 1),
(2, 'kasir', 'kasir@gmail.com', 'kasir', 'c7911af3adbd12a035b289556d96470a', 'Laki-Laki', 2),
(3, 'menejer', 'menejer@gmail.com', 'menejer', 'eac5377545d2cabee963bf11ac1a93fd', 'Laki-Laki', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_diskon`
--
ALTER TABLE `t_diskon`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_jenis`
--
ALTER TABLE `t_jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_makanan`
--
ALTER TABLE `t_makanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_menu`
--
ALTER TABLE `t_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_traksaksi`
--
ALTER TABLE `t_traksaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_diskon`
--
ALTER TABLE `t_diskon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_jenis`
--
ALTER TABLE `t_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_makanan`
--
ALTER TABLE `t_makanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_menu`
--
ALTER TABLE `t_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_traksaksi`
--
ALTER TABLE `t_traksaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
