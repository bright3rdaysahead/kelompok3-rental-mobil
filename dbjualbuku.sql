-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2026 at 05:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbjualbuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `kode_barang` varchar(5) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_barang`
--

INSERT INTO `tbl_barang` (`kode_barang`, `id_kategori`, `nama_barang`, `gambar`) VALUES
('BRG01', 1, 'Hyundai Creta', '1770286121_1bb581334fd79a4554a1.jpg'),
('BRG02', 2, 'BYD Atto 4', '1770286275_c1ae16daa8cb01b7638e.jpg'),
('BRG03', 8, 'Suzuki Carry', '1770286469_430b3290ba016f02529b.jpg'),
('BRG04', 8, 'Isuzu Traga', '1770286542_9f589df26aed26cdb64d.jpg'),
('BRG05', 8, 'Daihatsu Grand Max', '1770286807_0ec060c4d198f43de699.jpg'),
('BRG06', 5, 'Honda City', '1770287182_5c5a666d9d3df059d247.jpg'),
('BRG07', 5, 'Mazda 6', '1770287201_646a673cbb855e8ea961.jpg'),
('BRG08', 5, 'Honda Civic RS', '1770287229_a4756aab2892b89c3fd7.jpg'),
('BRG09', 1, 'Toyota Rush', '1770287249_70afe2f2eeb78d79e1dd.jpg'),
('BRG10', 7, 'Daihatsu Ayla', '1770722178_8a7dc03c581c812c6c27.jpg'),
('BRG11', 6, 'DSFK Gelora', '1770728315_aca4b43e673e77462eac.jpg'),
('BRG12', 6, 'Mercedes Benz Sprinter', '1770728384_4dc313f60303a845fecc.jpg'),
('BRG13', 7, 'Rolls Royce Specter', '1770969091_9fb6285d111b85f16aa5.jpg'),
('BRG14', 7, 'Volvo XC90', '1770971722_b9def8f38feca9ed44ee.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_carousel`
--

CREATE TABLE `tbl_carousel` (
  `id_carousel` int(11) NOT NULL,
  `desc_carousel` varchar(50) NOT NULL,
  `pic_carousel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_carousel`
--

INSERT INTO `tbl_carousel` (`id_carousel`, `desc_carousel`, `pic_carousel`) VALUES
(1, 'Buku Pendidikan Fashion', 'carousel-1.jpg'),
(2, 'Buku Pendidikan Model', 'carousel-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_transaksi`
--

CREATE TABLE `tbl_detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `tgl_sewa` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `lama_hari` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_detail_transaksi`
--

INSERT INTO `tbl_detail_transaksi` (`id_detail`, `id_transaksi`, `id_item`, `tgl_sewa`, `tgl_kembali`, `lama_hari`, `jumlah`) VALUES
(1, 1, 4, NULL, NULL, NULL, 2),
(3, 2, 1, NULL, NULL, NULL, 1),
(8, 3, 4, '2026-02-04', '2026-02-06', 2, 0),
(9, 4, 4, '2026-02-05', '2026-02-06', 1, 0),
(10, 5, 1, '2026-02-05', '2026-02-06', 1, 0),
(21, 7, 3, '2026-03-12', '2026-04-01', 20, 0),
(25, 8, 5, '2026-11-12', '2026-11-12', 1, 0),
(26, 9, 6, '2026-03-11', '2026-03-12', 1, 0),
(27, 10, 6, '2026-03-11', '2026-03-12', 1, 0),
(28, 11, 9, '2026-03-12', '2026-03-13', 1, 0),
(29, 12, 6, '2026-12-12', '2026-12-13', 1, 0),
(30, 13, 6, '2026-02-10', '2026-02-10', 1, 0),
(31, 14, 6, '2026-02-12', '2026-02-12', 1, 0),
(32, 15, 10, '2026-02-13', '2026-02-15', 2, 0),
(33, 16, 11, '2026-02-13', '2026-02-14', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id_feedback` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subjek` varchar(200) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `tanggal` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id_feedback`, `nama`, `email`, `subjek`, `pesan`, `tanggal`) VALUES
(1, 'adalahpokonya', 'adalahpokonya@gmail.com', 'Feedback Pelanggan', 'Mobilnya nyamannnn bangettt!!!!', '2026-02-07 08:11:39'),
(2, 'Rico Sagala', 'intani@iphone.13.cash', 'Feedback Pelanggan', 'kemrennnn bangettt', '2026-02-07 20:40:48'),
(3, 'Rora', 'cmjs-US@anantpo.pro', 'Feedback Pelanggan', 'Test', '2026-02-10 20:12:34'),
(4, 'Berry', 'Berryblue@email.com', 'Feedback Pelanggan', 'Test ', '2026-02-13 15:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `id_item` int(11) NOT NULL,
  `kode_barang` varchar(5) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`id_item`, `kode_barang`, `warna`, `stok`, `harga`) VALUES
(1, 'BRG01', 'Merah', 0, 350000),
(3, 'BRG01', 'Putih', 0, 350000),
(4, 'BRG02', 'Putih', 0, 400000),
(5, 'BRG02', 'Abu-abu', 0, 400000),
(6, 'BRG03', 'Putih', 5, 200000),
(7, 'BRG04', 'Putih', 5, 200000),
(8, 'BRG05', 'Putih', 6, 250000),
(9, 'BRG09', 'Putih', 4, 350000),
(10, 'BRG08', 'Putih', 3, 400000),
(11, 'BRG12', 'Abu-Abu', 2, 1500000),
(12, 'BRG07', 'Merah', 5, 450000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'SUV'),
(2, 'Electric'),
(5, 'Sedan'),
(6, 'Travel'),
(7, 'Family Car'),
(8, 'Pick Up ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `id_shipping` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(25) NOT NULL,
  `kodepos` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`id_shipping`, `id_transaksi`, `tgl_pengiriman`, `nama_lengkap`, `email`, `no_hp`, `alamat`, `kota`, `kodepos`) VALUES
(1, 1, '2026-01-21', 'Intan Ayu Safitri', 'intan.21123042@mahasiswa.unikom.ac.id', '085524544830', 'Jalan Teuku Umar No.28 Rt.01 RW.10, Lebak Gede, Coblong, Kota Bandung', 'Bandung', '8888'),
(2, 3, '2026-02-05', 'Intan Ayu Safitri', 'intan.21123042@mahasiswa.unikom.ac.id', '085524544830', 'Jalan Teuku Umar No.28 Rt.01 RW.10, Lebak Gede, Coblong, Kota Bandung', '555', '55555'),
(3, 4, '2026-02-05', 'Intan Ayu Safitri', 'intan.21123042@mahasiswa.unikom.ac.id', '085524544830', 'Jalan Teuku Umar No.28 Rt.01 RW.10, Lebak Gede, Coblong, Kota Bandung', '555', '55555'),
(4, 5, '2026-02-05', 'Intan Ayu Safitri', 'intan.21123042@mahasiswa.unikom.ac.id', '085524544830', 'Jalan Teuku Umar No.28 Rt.01 RW.10, Lebak Gede, Coblong, Kota Bandung', '555', '55555'),
(5, 7, '2026-02-06', '', '', '', '', '', ''),
(6, 8, '2026-02-07', 'Intan ', 'intan@gmail.com', '08097986875', 'bandung', '7647659869746497', '75875'),
(7, 10, '0000-00-00', 'Intan ', 'intani@iphone.13.cash', '088693784678', 'bandung', '', ''),
(8, 12, '0000-00-00', 'Intan ', 'intani@iphone.13.cash', '088693784678', 'bandung', '2413413513513', '13513'),
(9, 13, '0000-00-00', 'Intan Ayu Safitri', 'intan.21123042@mahasiswa.unikom.ac.id', '085524544830', 'Jalan Teuku Umar No.28 Rt.01 RW.10, Lebak Gede, Coblong, Kota Bandung', '555', '55555'),
(10, 14, '0000-00-00', 'Intan Ayu Safitri', 'intan.21123042@mahasiswa.unikom.ac.id', '085524544830', 'Jalan Teuku Umar No.28 Rt.01 RW.10, Lebak Gede, Coblong, Kota Bandung', '555', '55555'),
(11, 15, '0000-00-00', 'Berry', 'Berry@email.com', '12345678', 'Jl. Bengawan No.67A', '327302999999999', '32730'),
(12, 16, '0000-00-00', 'Berry', 'Berry@email.com', '12345678', 'Jl. Bengawan No.67A', '327302999999999', '32730');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `tgl_transaksi`, `id_user`, `total_bayar`, `metode_pembayaran`, `status`) VALUES
(10, '2026-02-07', 6, 500000, 'Transfer Bank', 'lunas'),
(12, '2026-02-07', 6, 200000, 'QRIS', 'lunas'),
(13, '2026-02-10', 5, 200000, 'QRIS', 'lunas'),
(14, '2026-02-12', 7, 200000, 'Payment On Spot', 'lunas'),
(15, '2026-02-13', 7, 800000, 'QRIS', 'lunas'),
(16, '2026-02-13', 7, 1500000, 'Payment On Spot', 'lunas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `hak_akses` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `hak_akses`) VALUES
(1, 'cacanasyaintanun', '827ccb0eea8a706c4c34a16891f84e7b', 'admin'),
(3, 'nandita', 'e6b047aa9378bce37a5260a949d1ea3e', 'user'),
(4, 'nanditaa', 'e6b047aa9378bce37a5260a949d1ea3e', 'user'),
(5, '21123042', '56e5ebb70530248f209ef3395d5617c0', 'user'),
(6, 'adalahpokonya', 'ffa4a3439d3ad1442f30aadaef3c8349', 'user'),
(7, 'test', '098f6bcd4621d373cade4e832627b4f6', 'user'),
(8, 'test1', 'd41d8cd98f00b204e9800998ecf8427e', 'user'),
(9, 'test1', '6512bd43d9caa6e02c990b0a82652dca', 'user'),
(10, 'End', '87557f11575c0ad78e4e28abedc13b6e', 'user'),
(11, 'End', '87557f11575c0ad78e4e28abedc13b6e', 'user'),
(12, 'test12', '098f6bcd4621d373cade4e832627b4f6', 'user'),
(13, 'test123', '098f6bcd4621d373cade4e832627b4f6', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tbl_carousel`
--
ALTER TABLE `tbl_carousel`
  ADD PRIMARY KEY (`id_carousel`);

--
-- Indexes for table `tbl_detail_transaksi`
--
ALTER TABLE `tbl_detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`id_shipping`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_carousel`
--
ALTER TABLE `tbl_carousel`
  MODIFY `id_carousel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_detail_transaksi`
--
ALTER TABLE `tbl_detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `id_shipping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
