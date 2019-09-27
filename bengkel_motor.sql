-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2019 at 02:23 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkel_motor`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`) VALUES
(24, 'Ban dalam 2.75'),
(13, 'Busi Thailand'),
(20, 'Kit semprot'),
(16, 'Lampu depan mio'),
(18, 'Oli evalube 1 liter'),
(21, 'Oli gardan'),
(12, 'Oli Mesran'),
(15, 'Oli Supreme'),
(14, 'Oli Top 1'),
(17, 'Oli Ultratec 1 liter'),
(19, 'Sampolis');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id` int(12) NOT NULL,
  `id_nota` varchar(16) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `sub_total` int(10) NOT NULL,
  `suplier` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id` int(11) NOT NULL,
  `id_nota` varchar(16) NOT NULL,
  `nama_barang_jasa` varchar(50) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `sub_total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `id_jasa` int(11) NOT NULL,
  `jenis_jasa` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`id_jasa`, `jenis_jasa`, `harga`) VALUES
(1, 'Servis', 20000),
(2, 'Tambal Ban', 7000),
(3, 'Ganti Mesin', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL,
  `nopol` varchar(10) NOT NULL,
  `no_mesin` varchar(20) NOT NULL,
  `merek` varchar(50) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'SEDANG DIKERJAKAN',
  `id_pelanggan` int(11) NOT NULL,
  `id_tempat_servis` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `password`, `status`) VALUES
(1, 'gudang', 'gudang', 'PEGAWAI GUDANG'),
(3, 'kasir', 'kasir', 'KASIR'),
(5, 'admin', 'admin', 'ADMIN'),
(6, 'Sumardi', 'sqrSR141', 'MEKANIK');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `alamat` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_nota` varchar(16) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `total_harga` int(10) NOT NULL,
  `bayar` int(10) NOT NULL,
  `kembalian` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_nota` varchar(16) NOT NULL,
  `nopol` varchar(10) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `mekanik` varchar(50) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `bayar` int(10) DEFAULT NULL,
  `kembalian` int(10) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `harga_beli` int(10) NOT NULL,
  `harga_jual` int(10) NOT NULL,
  `suplier` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id`, `nama_barang`, `jumlah`, `harga_beli`, `harga_jual`, `suplier`) VALUES
(24, 'Oli Mesran', 30, 35000, 40000, 'anas'),
(25, 'Busi Thailand', 53, 12000, 15000, 'anas'),
(26, 'Oli Top 1', 44, 41000, 45000, 'anas'),
(27, 'Oli Supreme', 30, 34000, 37000, 'anas'),
(28, 'Lampu depan mio', -48, 6000, 9000, 'anas'),
(29, 'Oli Ultratec 1 liter', 60, 33000, 36000, 'anas'),
(30, 'Oli evalube 1 liter', 6, 25000, 29000, 'anas'),
(31, 'Sampolis', 100, 5000, 7000, 'anas'),
(32, 'Kit semprot', 46, 10000, 12500, 'anas'),
(33, 'Oli gardan', 19, 10000, 15000, 'anas'),
(34, 'Ban dalam 2.75', 37, 25000, 27000, 'anas');

-- --------------------------------------------------------

--
-- Table structure for table `tempat_servis`
--

CREATE TABLE `tempat_servis` (
  `id` varchar(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempat_servis`
--

INSERT INTO `tempat_servis` (`id`, `status`) VALUES
('Lane 1', 'SEDANG DIGUNAKAN'),
('Lane 2', 'KOSONG'),
('Lane 3', 'KOSONG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`),
  ADD UNIQUE KEY `nama_barang` (`nama_barang`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`id_jasa`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_barang` (`nama_barang`);

--
-- Indexes for table `tempat_servis`
--
ALTER TABLE `tempat_servis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kode_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
