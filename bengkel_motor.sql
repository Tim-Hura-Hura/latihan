-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2019 at 07:07 PM
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

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id`, `id_nota`, `nama_barang`, `harga_beli`, `harga_jual`, `jumlah`, `sub_total`, `suplier`) VALUES
(1, 'PMB_17102019_001', 'Oli Mesran', 35000, 40000, 2, 70000, 'Pak Anas');

--
-- Triggers `detail_pembelian`
--
DELIMITER $$
CREATE TRIGGER `pembelian_kurang` AFTER DELETE ON `detail_pembelian` FOR EACH ROW BEGIN
UPDATE stok SET jumlah = jumlah-old.jumlah WHERE nama_barang = old.nama_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pembelian_tambah` AFTER INSERT ON `detail_pembelian` FOR EACH ROW BEGIN
UPDATE stok SET jumlah = jumlah+new.jumlah WHERE nama_barang = new.nama_barang;
END
$$
DELIMITER ;

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

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id`, `id_nota`, `nama_barang_jasa`, `harga_beli`, `harga_jual`, `jumlah`, `sub_total`) VALUES
(1, 'PNJ_27092019_001', 'Busi Thailand', 12000, 15000, 2, 30000),
(2, 'PNJ_22102019_001', 'Ganti Mesin', 0, 150000, 2, 300000),
(3, 'PNJ_22102019_002', 'Kit semprot', 10000, 12500, 2, 25000),
(4, 'PNJ_24102019_002', 'Kit semprot', 10000, 12500, 3, 37500),
(5, 'PNJ_24102019_002', 'Oli evalube 1 liter', 25000, 29000, 2, 58000),
(6, 'PNJ_24102019_002', 'Oli gardan', 10000, 15000, 2, 30000);

--
-- Triggers `detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `penjualan_kurang` AFTER INSERT ON `detail_penjualan` FOR EACH ROW BEGIN
UPDATE stok SET jumlah = jumlah-new.jumlah WHERE nama_barang = new.nama_barang_jasa;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `penjualan_tambah` AFTER DELETE ON `detail_penjualan` FOR EACH ROW BEGIN
UPDATE stok SET jumlah = jumlah+old.jumlah WHERE nama_barang = old.nama_barang_jasa;
END
$$
DELIMITER ;

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

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `nopol`, `no_mesin`, `merek`, `tipe`, `warna`, `keluhan`, `status`, `id_pelanggan`, `id_tempat_servis`) VALUES
(1, 'AG 4512 DE', '12314', 'Suzuki', 'KLX 150', 'Biru', '', 'SELESAI SERVIS', 1, 'Lane 2'),
(2, 'AG 4512 DE', '12314', 'Suzuki', 'KLX 150', 'Biru', 'ganti busi', 'SELESAI SERVIS', 2, 'Lane 2'),
(3, 'AG 1512 DE', '235235', 'Kawasaki', 'Ninja 250', 'Hijau', ' ganti oli', 'PENDING', 3, 'Lane 3');

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `no` int(11) NOT NULL,
  `merek` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`no`, `merek`) VALUES
(11, 'Aprilia'),
(10, 'Ducati'),
(7, 'Harley-davidson'),
(1, 'Honda'),
(9, 'Kaisar'),
(4, 'Kawasaki'),
(3, 'Suzuki'),
(5, 'TVS'),
(6, 'Vespa'),
(8, 'Viar'),
(2, 'Yamaha');

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

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `hp`, `alamat`) VALUES
(1, 'Edo J', '6285645137127', 'kediri selatan'),
(2, 'Edo J', '6285645137127', 'kediri selatan'),
(3, 'edo', '86755152156', 'kediri');

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

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_nota`, `tgl_masuk`, `total_harga`, `bayar`, `kembalian`) VALUES
('PMB_17102019_001', '2019-10-17', 70000, 100000, 30000);

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

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_nota`, `nopol`, `tgl_masuk`, `tgl_keluar`, `mekanik`, `penerima`, `total_harga`, `bayar`, `kembalian`, `status`) VALUES
('PNJ_22102019_001', '', '2019-10-22', '2019-10-22', '', '', 300000, 500000, 200000, 'LUNAS'),
('PNJ_22102019_002', 'AG 4512 DE', '2019-10-22', '2019-10-22', 'Sumardi', 'Edo J', 25000, 50000, 25000, 'LUNAS'),
('PNJ_24102019_001', '', '2019-10-24', NULL, '', '', 0, NULL, NULL, 'PENDING'),
('PNJ_24102019_002', 'AG 1512 DE', '2019-10-24', NULL, '', 'edo', 0, NULL, NULL, 'PENDING'),
('PNJ_27092019_001', 'AG 4512 DE', '2019-09-27', '2019-09-27', 'Sumardi', 'Edo J', 30000, 60000, 30000, 'LUNAS'),
('PNJ_27092019_002', '', '2019-09-27', NULL, '', '', 0, NULL, NULL, 'PENDING');

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
(24, 'Oli Mesran', 32, 35000, 40000, 'anas'),
(25, 'Busi Thailand', 53, 12000, 15000, 'anas'),
(26, 'Oli Top 1', 4, 41000, 45000, 'anas'),
(27, 'Oli Supreme', 30, 34000, 37000, 'anas'),
(28, 'Lampu depan mio', 699, 6000, 9000, 'anas'),
(29, 'Oli Ultratec 1 liter', 60, 33000, 36000, 'anas'),
(30, 'Oli evalube 1 liter', 1, 25000, 29000, 'anas'),
(31, 'Sampolis', 100, 5000, 7000, 'anas'),
(32, 'Kit semprot', 42, 10000, 12500, 'anas'),
(33, 'Oli gardan', 17, 10000, 15000, 'anas'),
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
('Lane 1', 'KOSONG'),
('Lane 2', 'SEDANG DIGUNAKAN'),
('Lane 3', 'SEDANG DIGUNAKAN');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kendaraan`
--

CREATE TABLE `tipe_kendaraan` (
  `no` int(11) NOT NULL,
  `merek` varchar(20) NOT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe_kendaraan`
--

INSERT INTO `tipe_kendaraan` (`no`, `merek`, `tipe`) VALUES
(2, 'Honda', 'Revo'),
(3, 'Honda', 'Supra X'),
(4, 'Honda', 'Supra GTR 150'),
(5, 'Honda', 'Beat'),
(6, 'Honda', 'Honda Genio'),
(7, 'Honda', 'Vario 110'),
(8, 'Honda', 'Scoopy'),
(9, 'Honda', 'Vario 125'),
(10, 'Honda', 'PCX'),
(11, 'Honda', 'ADV 150'),
(12, 'Honda', 'CB150 Verza'),
(13, 'Honda', 'Mega Pro'),
(14, 'Honda', 'Sonic 150R'),
(15, 'Honda', 'CB 150R'),
(16, 'Honda', ' CBR 150R'),
(17, 'Honda', 'CBR 250RR'),
(18, 'Aprilia', 'Tuono V4 1100'),
(19, 'Aprilia', 'Aprilia RSV4 RF'),
(20, 'Aprilia', 'SR Max 300'),
(21, 'Aprilia', 'SRV 850'),
(22, 'Aprilia', 'RX 125'),
(23, 'Aprilia', 'SX 125'),
(24, 'Aprilia', 'RX 50'),
(25, 'Aprilia', 'Scarabeo 200 ie'),
(26, 'Aprilia', 'Nuovo 50 4t 4v'),
(27, 'Ducati', 'Diavel'),
(28, 'Ducati', 'Hypermotard'),
(29, 'Ducati', 'Monster'),
(30, 'Ducati', 'MultiStrada'),
(31, 'Ducati', 'Panigale V4'),
(32, 'Ducati', 'Diavel'),
(33, 'Ducati', 'Hypermotard'),
(34, 'Ducati', 'Monster'),
(35, 'Ducati', 'MultiStrada'),
(36, 'Ducati', 'Panigale V4'),
(37, 'Harley-davidson', 'CVO Street Glide'),
(38, 'Harley-davidson', 'Street 500'),
(39, 'Harley-davidson', 'Davidson Iron 883'),
(40, 'Harley-davidson', 'Buell'),
(41, 'Harley-davidson', 'V-Rod'),
(42, 'Harley-davidson', 'V-Rod'),
(43, 'Harley-davidson', 'Dyna'),
(44, 'Harley-davidson', 'Softail'),
(45, 'Harley-davidson', 'Cruiser'),
(46, 'Kaisar', 'Ruby V250'),
(47, 'Kawasaki', 'KLX 150'),
(48, 'Kawasaki', 'Ninja 250'),
(49, 'Kawasaki', 'W175'),
(50, 'Kawasaki', 'KLX 150'),
(51, 'Kawasaki', 'D-Tracker'),
(52, 'Kawasaki', 'Z250'),
(53, 'Kawasaki', 'Kaze 125'),
(61, 'Suzuki', 'GSX R150'),
(62, 'Suzuki', 'GSX R150'),
(63, 'Suzuki', 'NEX II'),
(64, 'Suzuki', 'GSX S150'),
(65, 'Suzuki', 'Smash FI'),
(66, 'Suzuki', 'GSX 150 Bandit'),
(68, 'TVS', 'Dazz'),
(69, 'TVS', 'Neo XR'),
(70, 'TVS', 'Rockz'),
(71, 'TVS', 'Max 125'),
(72, 'TVS', 'Max 125 Semi Trail'),
(73, 'TVS', 'Apache RTR 200 4V'),
(74, 'TVS', 'Apache RR 310'),
(75, 'TVS', 'Classic'),
(76, 'Vespa', 'Sprint'),
(77, 'Vespa', 'S'),
(78, 'Vespa', 'LX'),
(79, 'Vespa', 'Primavera'),
(80, 'Vespa', 'GTS 150'),
(81, 'Vespa', 'GTS 300 Super Tech'),
(82, 'Viar', 'Vortex'),
(83, 'Viar', 'Cross X 70 Mini'),
(84, 'Viar', 'Cross X 150'),
(85, 'Viar', 'Cross X 200 GT'),
(86, 'Viar', 'Razor 100 SP'),
(87, 'Viar', ' Razor 150 UT'),
(88, 'Yamaha', 'Fino 125 Blue Core'),
(89, 'Yamaha', 'X-RIDE'),
(90, 'Yamaha', 'NMAX'),
(91, 'Yamaha', 'Mio Z'),
(92, 'Yamaha', 'Mio M3 125'),
(93, 'Yamaha', 'Aerox 155'),
(94, 'Yamaha', 'Jupiter Z F1'),
(95, 'Yamaha', 'Jupiter MX 150'),
(96, 'Yamaha', 'R25'),
(97, 'Yamaha', 'Vixion'),
(98, 'Yamaha', 'Byson');

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `no` int(11) NOT NULL,
  `warna` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`no`, `warna`) VALUES
(1, 'Merah'),
(2, 'Kuning'),
(3, 'Biru'),
(4, 'Putih'),
(5, 'Abu - Abu'),
(6, 'Hitam'),
(7, 'Jingga'),
(8, 'Hijau'),
(9, 'Warna Lain');

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
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `merek` (`merek`);

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
-- Indexes for table `tipe_kendaraan`
--
ALTER TABLE `tipe_kendaraan`
  ADD PRIMARY KEY (`no`),
  ADD KEY `merek` (`merek`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`no`);

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jasa`
--
ALTER TABLE `jasa`
  MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `merek`
--
ALTER TABLE `merek`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tipe_kendaraan`
--
ALTER TABLE `tipe_kendaraan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `warna`
--
ALTER TABLE `warna`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tipe_kendaraan`
--
ALTER TABLE `tipe_kendaraan`
  ADD CONSTRAINT `tipe_kendaraan_ibfk_1` FOREIGN KEY (`merek`) REFERENCES `merek` (`merek`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
