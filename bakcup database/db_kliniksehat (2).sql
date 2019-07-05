-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 20 Feb 2019 pada 10.42
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tb_bidan`
--

INSERT INTO `tb_bidan` (`id`, `nama`, `username`, `password`, `jk`, `lahir`, `alamat`) VALUES
(1, 'Mayang Lidya Istari Fatma', 'mayang', 'mayang', 'P', '23 Juli 1998', 'Tulungagung'),
(2, 'Emilyana', 'emi', 'ibu', 'P', '07-08-1979', 'Surabaya');

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
(0, 'Rizky Sena Yudha', 'yudha', 'sena', 'L', '20-09-1997', 'Ngunut'),
(0, 'Sunarto', 'narto', 'narto', 'L', '07-08-1979', 'Sidoarjo');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id`, `nama`, `username`, `password`, `akses`) VALUES
(1, 'Rizky Sena Yudha', 'sena', 'sena', 'admin'),
(7, 'Mayang Lidya Istari Fatma', 'mayang', '12444', 'bidan'),
(10, 'Abimanyu', 'abi', '1234', 'petugas'),
(11, 'Fajar', 'fajar', '123', 'petugas'),
(12, 'Aditya', 'adit', 'adit', 'petugas'),
(15, 'Emilyana', 'emi', 'ibu', 'bidan'),
(16, 'Sunarto', 'narto', 'narto', 'dokter');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id`, `nama`, `username`, `password`, `jk`, `lahir`, `alamat`) VALUES
(5, 'Abimanyu', 'abi', '1234', 'L', '23-06-1998', 'Lampung'),
(6, 'Fajar', 'fajar', '123', 'L', '23-06-1999', 'Kapuas'),
(7, 'Aditya', 'adit', 'adit', 'L', '23-06-1998', 'Tulungagung');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data untuk tabel `tb_rekam_medis`
--

INSERT INTO `tb_rekam_medis` (`id`, `rm_baru`, `rm_lama`, `no_bpjs`, `nama_pasien`, `usia`, `jk`, `alamat`, `tgl_masuk`, `no_hp`, `tindakan`, `diagnosa`, `penjamin`, `poli`, `petugas`, `dokter`) VALUES
(46, '1618002', '1518002', '1234567', 'Ali', '19', 'L', 'Sidoarjo', '20-02-2019', '085701111134', 'Operasi Kaki', 'Kesleo', 'BPJS', 'poli_umum', 'Fajar', 'Sunarto'),
(47, '22', '11', '0852', 'Consi', '20', 'P', 'Malang', '16-09-2018', '087123456321', 'Rawat inap', 'Pecah Ketuban', 'BPJS', 'poli_kebidanan', 'Fajar', 'Mayang Lidya Istari Fatma');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
