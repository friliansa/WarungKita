-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 09:29 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warungkita`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `beli` int(255) NOT NULL,
  `jual` int(255) NOT NULL,
  `terjual` int(11) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `stok`, `beli`, `jual`, `terjual`, `status`) VALUES
(1, 'Topi', 95, 1000, 1100, 5, 1),
(2, 'Baju', 98, 1000, 1100, 2, 1),
(3, 'Celana', 65, 2000, 2200, 35, 1),
(4, 'Payung', 99, 500, 550, 1, 1),
(5, 'Gula', 86, 1000, 1050, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id`, `kode_transaksi`, `kode_barang`, `nama`, `jumlah`, `harga`) VALUES
(1, '1', '1', 'Topi', 100, 1000),
(2, '1', '2', 'Baju', 100, 1000),
(3, '1', '3', 'Celana', 100, 2000),
(4, '1', '4', 'Payung', 100, 500),
(5, '1', '5', 'Gula', 100, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(11) NOT NULL,
  `kode_barang` varchar(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `jual` int(255) NOT NULL,
  `beli` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id`, `kode_transaksi`, `kode_barang`, `nama`, `jumlah`, `jual`, `beli`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'Topi', 1, 1100, 1000, '2021-12-07 08:16:53', '2021-12-07 08:16:53'),
(2, '2', '1', 'Topi', 1, 1100, 1000, '2021-12-06 08:17:02', '2021-12-07 08:17:02'),
(3, '4', '1', 'Topi', 1, 1100, 1000, '2021-12-05 08:17:22', '2021-12-07 08:17:22'),
(4, '5', '2', 'Baju', 2, 1100, 1000, '2021-12-05 08:17:37', '2021-12-07 08:17:37'),
(5, '5', '1', 'Topi', 1, 1100, 1000, '2021-12-05 08:17:41', '2021-12-07 08:17:41'),
(6, '6', '3', 'Celana', 10, 2200, 2000, '2021-12-04 08:17:54', '2021-12-07 08:17:54'),
(7, '7', '1', 'Topi', 1, 1100, 1000, '2021-12-03 08:18:12', '2021-12-07 08:18:12'),
(8, '8', '4', 'Payung', 1, 550, 500, '2021-12-02 08:18:23', '2021-12-07 08:18:23'),
(9, '9', '5', 'Gula', 1, 1050, 1000, '2021-12-01 08:18:36', '2021-12-07 08:18:36'),
(10, '10', '3', 'Celana', 10, 2200, 2000, '2021-12-02 08:27:27', '2021-12-07 08:27:27'),
(11, '11', '3', 'Celana', 15, 2200, 2000, '2021-12-05 08:27:39', '2021-12-07 08:27:39'),
(12, '12', '5', 'Gula', 13, 1050, 1000, '2021-12-07 08:29:17', '2021-12-07 08:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `total` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `nama`, `total`, `created_at`, `updated_at`) VALUES
(1, 'Agus', 550000, '2021-12-07 08:16:38', '2021-12-07 08:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `total` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `nama`, `total`, `created_at`, `updated_at`) VALUES
(1, 'Rudi', 1100, '2021-12-07 08:16:46', '2021-12-07 08:16:53'),
(2, 'Rudi', 1100, '2021-12-06 08:17:00', '2021-12-07 08:17:02'),
(4, 'Agus', 1100, '2021-12-05 08:17:14', '2021-12-07 08:17:22'),
(5, 'Rudi', 3300, '2021-12-05 08:17:31', '2021-12-07 08:17:41'),
(6, 'Rudi', 22000, '2021-12-04 08:17:45', '2021-12-07 08:17:54'),
(7, 'Rudi', 1100, '2021-12-03 08:18:04', '2021-12-07 08:18:12'),
(8, 'Agus', 550, '2021-12-02 08:18:20', '2021-12-07 08:18:23'),
(9, 'Rudi', 1050, '2021-12-01 08:18:33', '2021-12-07 08:18:36'),
(10, 'Agus', 22000, '2021-12-02 08:27:21', '2021-12-07 08:27:27'),
(11, 'Rudi', 33000, '2021-12-05 08:27:34', '2021-12-07 08:27:39'),
(12, 'Agus', 13650, '2021-12-07 08:29:10', '2021-12-07 08:29:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
