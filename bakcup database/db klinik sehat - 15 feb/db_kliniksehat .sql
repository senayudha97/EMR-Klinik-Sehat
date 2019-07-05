-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 15 Feb 2019 pada 19.04
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `db_kliniksehat`
--
CREATE DATABASE IF NOT EXISTS `db_kliniksehat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_kliniksehat`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bidan`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `tb_bidan`
--

INSERT INTO `tb_bidan` (`id`, `nama`, `username`, `password`, `jk`, `lahir`, `alamat`) VALUES
(1, 'Lidya', 'mayang', '123', 'P', '23 Juli 1998', 'Tulungagung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokter`
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
-- Dumping data untuk tabel `tb_dokter`
--

INSERT INTO `tb_dokter` (`id`, `nama`, `username`, `password`, `jk`, `lahir`, `alamat`) VALUES
(0, 'Rizky Sena Yudha', 'yudha', 'yudha', 'L', '20-09-1997', 'Blitar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE IF NOT EXISTS `tb_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(500) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id`, `nama`, `username`, `password`, `akses`) VALUES
(1, 'Rizky Sena Yudha', 'sena', 'sena', 'admin'),
(4, 'Aditya Irvandani', 'adit', 'adit', 'petugas'),
(5, 'Fajar Ramadhan Akbar', 'fajar', 'fajar', 'petugas'),
(6, 'Rizky Sena Yudha', 'yudha', 'yudha', 'petugas'),
(7, 'Lidya', 'mayang', '123', 'bidan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id`, `nama`, `username`, `password`, `jk`, `lahir`, `alamat`) VALUES
(2, 'Aditya Irvandani', 'adit', 'adit', 'L', '12-12-1990', 'Tulung Agung'),
(3, 'Fajar Ramadhan Akbar', 'fajar', 'fajar', 'L', '12-12-1990', 'Kapuas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekam_medis`
--

CREATE TABLE IF NOT EXISTS `tb_rekam_medis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rm_baru` varchar(20) NOT NULL,
  `rm_lama` varchar(20) NOT NULL,
  `no_bpjs` varchar(20) NOT NULL,
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
  `dokter` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `tb_rekam_medis`
--

INSERT INTO `tb_rekam_medis` (`id`, `rm_baru`, `rm_lama`, `no_bpjs`, `nama_pasien`, `usia`, `jk`, `alamat`, `tgl_masuk`, `no_hp`, `tindakan`, `diagnosa`, `penjamin`, `poli`, `petugas`, `dokter`) VALUES
(6, '321321', '323213', '', 'Zeus', '1300', 'L', 'Asgard', '23-11-2018', '082345654677', 'Inap', 'Batuk gledek', 'Thor', 'poli_gigi', 'A', 'B'),
(7, '11221122', '11223322', '', 'Arthur', '40', 'L', 'Atlantis', '23-11-2018', '082345654677', 'Operasi', 'Kemasukan Air', 'Mera', 'poli_umum', 'A', 'B'),
(8, '123', '-', '', 'Bono', '70', 'L', 'Jl Kalpataru', '28 Februari 2019', '081111111111', 'asd', 'sdf', 'sggsd', 'poli_gigi', 'C', 'B'),
(9, '13', '41', '1235', 'sda', '12', 'L', 'wefa', '123', '412', 'tafszxf', 'asfa', 'fasf', 'poli_umum', 'A', 'B');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
