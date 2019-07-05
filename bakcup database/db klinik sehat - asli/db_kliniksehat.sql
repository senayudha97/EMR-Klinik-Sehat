-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2019 at 11:27 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kliniksehat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `jk` varchar(500) NOT NULL,
  `lahir` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`id`, `nama`, `username`, `password`, `jk`, `lahir`, `alamat`) VALUES
(0, 'Rizky Sena Yudha', 'yudha', 'yudha', 'L', '20-09-1997', 'Blitar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `nama`, `username`, `password`, `akses`) VALUES
(1, 'Rizky Sena Yudha', 'sena', 'sena', 'admin'),
(4, 'Aditya Irvandani', 'adit', 'adit', 'petugas'),
(5, 'Fajar Ramadhan Akbar', 'fajar', 'fajar', 'petugas'),
(6, 'Rizky Sena Yudha', 'yudha', 'yudha', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `lahir` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id`, `nama`, `username`, `password`, `jk`, `lahir`, `alamat`) VALUES
(2, 'Aditya Irvandani', 'adit', 'adit', 'L', '12-12-1990', 'Tulung Agung'),
(3, 'Fajar Ramadhan Akbar', 'fajar', 'fajar', 'L', '12-12-1990', 'Kapuas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekam_medis`
--

CREATE TABLE `tb_rekam_medis` (
  `id` int(11) NOT NULL,
  `rm_baru` varchar(20) NOT NULL,
  `rm_lama` varchar(20) NOT NULL,
  `nama_pasien` varchar(500) NOT NULL,
  `usia` varchar(5) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `tgl_masuk` varchar(100) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `tindakan` varchar(500) NOT NULL,
  `diagnosa` varchar(500) NOT NULL,
  `penjamin` varchar(500) NOT NULL,
  `poli` varchar(500) NOT NULL,
  `petugas` varchar(500) NOT NULL,
  `dokter` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekam_medis`
--

INSERT INTO `tb_rekam_medis` (`id`, `rm_baru`, `rm_lama`, `nama_pasien`, `usia`, `jk`, `alamat`, `tgl_masuk`, `no_hp`, `tindakan`, `diagnosa`, `penjamin`, `poli`, `petugas`, `dokter`) VALUES
(6, '321321', '323213', 'Zeus', '1300', 'L', 'Asgard', '23-11-2018', '082345654677', 'Inap', 'Batuk gledek', 'Thor', 'poli_gigi', 'A', 'B'),
(7, '11221122', '11223322', 'Arthur', '40', 'L', 'Atlantis', '23-11-2018', '082345654677', 'Operasi', 'Kemasukan Air', 'Mera', 'poli_umum', 'A', 'B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rekam_medis`
--
ALTER TABLE `tb_rekam_medis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_rekam_medis`
--
ALTER TABLE `tb_rekam_medis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
