-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2019 at 03:58 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_kliniksehat`
--
CREATE DATABASE IF NOT EXISTS `db_kliniksehat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_kliniksehat`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bidan`
--

CREATE TABLE IF NOT EXISTS `tb_bidan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(500) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `lahir` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_bidan`
--

INSERT INTO `tb_bidan` (`id`, `nama`, `username`, `password`, `jk`, `lahir`, `alamat`) VALUES
(4, 'Devy Kinal', 'kinal', 'kinal', 'P', '20-09-1997', 'Malang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE IF NOT EXISTS `tb_dokter` (
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
(0, 'Adi Irawan', 'adi', 'adi', 'L', '20-09-1997', 'Malang'),
(0, 'Umar Asnan', 'umar', 'umar', 'L', '01-12-1990', 'Malang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE IF NOT EXISTS `tb_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(500) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `nama`, `username`, `password`, `akses`) VALUES
(1, 'Rizky Sena Yudha', 'sena', 'sena', 'admin'),
(4, 'Aditya Irvandani', 'adit', '123', 'petugas'),
(5, 'Fajar Ramadhan Akbar', 'fajar', 'fajar', 'petugas'),
(8, 'Adi Irawan', 'adi', 'adi', 'dokter'),
(9, 'Umar Asnan', 'umar', 'umar', 'dokter'),
(10, 'Rizky Sena Yudha', 'rizky', 'rizky', 'petugas'),
(11, 'Devy Kinal', 'kinal', 'kinal', 'bidan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjamin`
--

CREATE TABLE IF NOT EXISTS `tb_penjamin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `penjamin` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_penjamin`
--

INSERT INTO `tb_penjamin` (`id`, `penjamin`) VALUES
(2, 'Inhealth'),
(5, 'JKN'),
(7, 'BPJS'),
(8, 'Sehat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE IF NOT EXISTS `tb_petugas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(500) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `lahir` varchar(100) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id`, `nama`, `username`, `password`, `jk`, `lahir`, `alamat`) VALUES
(2, 'Aditya Irvandani', 'adit', '123', 'L', '12-12-1990', 'Tulung Agung'),
(3, 'Fajar Ramadhan Akbar', 'fajar', 'fajar', 'L', '12-12-1990', 'Kapuas'),
(4, 'Rizky Sena Yudha', 'rizky', 'rizky', 'L', '01-01-1990', 'Blitar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekam_medis`
--

CREATE TABLE IF NOT EXISTS `tb_rekam_medis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rm_lama` varchar(20) NOT NULL,
  `no_bpjs` varchar(20) NOT NULL,
  `nama_pasien` varchar(500) NOT NULL,
  `usia` varchar(5) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `tgl_masuk` varchar(100) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `keluhan` varchar(500) NOT NULL,
  `suhu` varchar(500) NOT NULL,
  `tensi` varchar(500) NOT NULL,
  `tindakan` varchar(500) NOT NULL,
  `diagnosa` varchar(500) NOT NULL,
  `penjamin` varchar(500) NOT NULL,
  `poli` varchar(500) NOT NULL,
  `petugas` varchar(500) NOT NULL,
  `dokter` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `tb_rekam_medis`
--

INSERT INTO `tb_rekam_medis` (`id`, `rm_lama`, `no_bpjs`, `nama_pasien`, `usia`, `jk`, `alamat`, `tgl_masuk`, `no_hp`, `keluhan`, `suhu`, `tensi`, `tindakan`, `diagnosa`, `penjamin`, `poli`, `petugas`, `dokter`) VALUES
(1, '12-01-11', '111111', 'Budi Budiman', '20', 'L', 'Malang', '2019-02-20', '08772345678', '', '', '', 'Opname', 'DB', 'BPJS', 'Poli Umum', 'Aditya Irvandani', 'Adi Irawan'),
(2, '12-01-12', '222222', 'Ahmad Junaedi', '20', 'L', 'Samarinda', '2019-03-04', '08234567123', 'Pusing', '100', '50', 'Rawat', 'Pusing', 'BPJS', '', 'Fajar Ramadhan Akbar', 'Umar Asnan'),
(4, '12-01-14', '333333', 'Ratna Putri', '32', 'L', 'Malang', '2019-02-21', '08772345678', 'Pusing', '100', '160', '', '', 'BPJS', 'Poli Umum', 'Rizky Sena Yudha', ''),
(10, '12-01-13', '333333', 'Udin Wahyudi', '32', 'L', 'Malang', '2019-02-23', '08772345678', 'Sakit Kepala', '36', '120', '', '', 'BPJS', 'Poli Umum', 'Rizky Sena Yudha', ''),
(18, '12-01-15', 'Umum', 'Hamdani Ramadhan', '15', 'L', 'Sawojajar', '2019-02-25', '082345654677', 'Sakit Punggung', '36', '120', '', '', '', 'Poli Umum', 'Aditya Irvandani', ''),
(19, '12-01-16', 'Umum', 'Jalaludin Anshor', '19', 'L', 'Sukun', '2019-02-25', '08772345678', 'Pilek', '36', '120', '', '', '', 'Poli Umum', 'Fajar Ramadhan Akbar', ''),
(20, '12-01-17', 'Umum', 'Emiliansyah Putri', '23', 'P', ' Lowokwaru', '2019-02-23', '082345654677', 'Mual', '36', '120', 'Paracetamol', 'Mual', '', 'Poli Kebidanan', 'Rizky Sena Yudha', 'Devy Kinal'),
(21, '12-01-18', 'Umum', 'Vivi Kumalasari', '30', 'P', 'Batu', '2019-02-21', '082345654677', 'Gusi Berdarah', '36', '120', '', '', '', 'Poli Gigi', 'Aditya Irvandani', ''),
(22, '12-01-19', 'Umum', 'Farid Muchtar', '9', 'L', 'Tasikmadu', '2019-02-24', '082345654677', 'Batuk tak berdahak', '36', '120', '', '', '', 'Poli Umum', 'Rizky Sena Yudha', ''),
(23, '12-01-20', 'Umum', 'Ade Bagus S.', '48', 'L', 'Arjosari', '2019-02-24', '082345654677', 'Rambut rontok', '36', '120', '', '', '', 'Poli Umum', 'Fajar Ramadhan Akbar', ''),
(24, '12-01-20', 'Umum', 'Ade Bagus S.', '48', 'L', 'Arjosari', '2019-02-24', '082345654677', 'Rambut rontok', '36', '120', '', '', '', 'Poli Umum', 'Fajar Ramadhan Akbar', ''),
(25, '12-01-20', 'Umum', 'Ade Bagus S.', '48', 'L', 'Arjosari', '2019-02-24', '082345654677', 'Rambut rontok', '36', '120', '', '', '', 'Poli Umum', 'Fajar Ramadhan Akbar', ''),
(26, '12-01-20', 'Umum', 'Ade Bagus S.', '48', 'L', 'Arjosari', '2019-02-25', '082345654677', 'Batuk', '70', '80', '', '', '', 'Poli Umum', 'Fajar Ramadhan Akbar', ''),
(27, '12-01-11', 'Umum', 'Jaki', '18', 'L', 'Solo', '2019-02-26', '', 'Perut', '28', '19', '', '', '', 'Poli Umum', 'Fajar Ramadhan Akbar', ''),
(28, '12-01-12', 'Umum', 'Jalaludin Anshor', '40', 'L', 'Sol', '2019-02-26', '', 'Mual', '36', '120', '', '', '', 'Poli Umum', 'Fajar Ramadhan Akbar', ''),
(32, '12-01-12', 'Umum', 'Jalaludin Anshor', '40', 'L', 'Sol', '2019-03-06', '', 'Mual', '36', '120', '', '', '', 'Poli Umum', 'Fajar Ramadhan Akbar', ''),
(33, '12-01-14', '333333', 'Ratna Putri', '32', 'L', 'Malang', '2019-03-06', '08772345678', 'Batuk', '100', '160', '', '', 'BPJS', 'Poli Kebidanan', 'Rizky Sena Yudha', ''),
(34, '12-01-20', 'Umum', 'Ade Bagus S.', '48', 'L', 'Arjosari', '2019-02-25', '082345654677', 'Mencret', '70', '80', '', '', '', 'Poli Umum', 'Fajar Ramadhan Akbar', ''),
(35, '13-12-11', 'Umum', 'Sena', '20', 'L', 'Blitar', '2019-03-05', '', 'Batuk', '36', '120', '', '', '', 'Poli Umum', 'Fajar Ramadhan Akbar', ''),
(36, '13-12-90', '654321', 'Jeje', '26', 'P', 'Singasari', '2019-03-06', '085701111134', 'Mencret teosss', '36', '120', '', '', 'inhelath', 'Poli Umum', 'Fajar Ramadhan Akbar', ''),
(38, '13-12-25', '11234546', 'Kiki', '70', 'P', 'Medan', '2019-03-06', '082345654677', 'Perut Membesar', '36', '120', '', '', 'BPJS', 'Poli Umum', 'Fajar Ramadhan Akbar', ''),
(39, '12-01-11', '111111', 'Budi Budiman', '20', 'L', 'Malang', '2019-03-08', '08772345678', 'Gatal', '38', '120', '', '', 'BPJS', 'Poli Umum', 'Aditya Irvandani', ''),
(40, '12-01-11', '111111', 'Budi Budiman', '20', 'L', 'Malang', '2019-03-08', '08772345678', 'Gatal', '38', '120', '', '', 'BPJS', '', 'Aditya Irvandani', ''),
(41, '12-01-12', '222222', 'Ahmad Junaedi', '20', 'L', 'Samarinda', '2019-03-04', '08234567123', 'Pusing', '100', '50', '', '', 'BPJS', '', 'Fajar Ramadhan Akbar', ''),
(42, '13-12-90', '654321', 'Jeje', '26', 'P', 'Singasari', '2019-03-06', '085701111134', 'Mencret teosss', '36', '120', '', '', '', 'Poli Umum', 'Fajar Ramadhan Akbar', ''),
(43, '13-12-11', 'Umum', 'Sena', '20', 'L', 'Blitar', '2019-03-05', '', 'Batuk', '36', '120', 'sedot lemak', 'buncit', '', '', 'Fajar Ramadhan Akbar', 'Umar Asnan');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
