-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 24, 2020 at 09:31 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nohp` varchar(30) NOT NULL,
  `alamat` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_lengkap`, `nohp`, `alamat`, `password`, `email`, `level`) VALUES
(1, 'Rafi sahendra', '08129029293', 'Padang', '25d55ad283aa400af464c76d713c07ad', 'admin@admin.com', '1'),
(2, 'Risma Yulianti', '085363229539', 'Padang', '25d55ad283aa400af464c76d713c07ad', 'pemilik@pemilik.com', '2'),
(4, 'Gema Fajar', '08129029293', 'Padang', '25d55ad283aa400af464c76d713c07ad', 'gemafajar@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(191) NOT NULL,
  `kode_barang` varchar(191) NOT NULL,
  `id_brand` varchar(191) NOT NULL,
  `nama_barang` varchar(191) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `id_brand`, `nama_barang`, `harga`, `jumlah`, `tgl_masuk`) VALUES
('AG-5e53543d122d6', 'YM-76790', '2147483647', 'Lampu Depan Jupiter', 20000, 8, '2020-02-03'),
('AG-5e537a8381848', 'HN-6767686', '5e50caa6c6262', 'Tangki minyak Supra X 125', 700000, 3, '2020-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id_brand` varchar(64) NOT NULL,
  `nama_brand` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id_brand`, `nama_brand`) VALUES
('2147483647', 'Yamaha'),
('5e50caa6c6262', 'Honda'),
('5e52a6f6214f3', 'Suzuki'),
('5e52a7026f887', 'Kawasaki'),
('5e5351c95add6', 'FDR');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(191) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `nama_pembeli`, `qty`, `tgl_transaksi`, `total`) VALUES
('TR-5e53789489885', 'Rafi sahendra', 1, '2020-02-24', 20000),
('TR-5e53836d0702a', 'Dani Andesva', 3, '2020-02-24', 720000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` varchar(64) NOT NULL,
  `id_barang` varchar(64) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_detail`, `id_transaksi`, `id_barang`, `jumlah`, `subtotal`) VALUES
(116, 'TR-5e53789489885', 'AG-5e53543d122d6', 1, 20000),
(117, 'TR-5e53836d0702a', 'AG-5e53543d122d6', 2, 20000),
(118, 'TR-5e53836d0702a', 'AG-5e537a8381848', 1, 700000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
