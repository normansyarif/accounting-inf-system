-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2016 at 05:12 PM
-- Server version: 5.5.52-cll
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nord4259_sia`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE IF NOT EXISTS `tb_barang` (
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barang`, `nama_barang`, `harga_satuan`, `harga_beli`, `stok`) VALUES
('01', 'Power Supply', 1000000, 800000, 90),
('02', 'Processor Intel Core i3-6100', 2000000, 1500000, 43),
('03', 'VGA Nvidia GTX 650', 2500000, 2000000, 10),
('04', 'MacBook Pro', 12000000, 9000000, 4),
('05', 'Gaming Headset', 2000000, 1800000, 180);

-- --------------------------------------------------------

--
-- Table structure for table `tb_beban`
--

CREATE TABLE IF NOT EXISTS `tb_beban` (
  `tanggal` date NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `periode` varchar(4) NOT NULL,
  PRIMARY KEY (`keterangan`,`periode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_beban`
--

INSERT INTO `tb_beban` (`tanggal`, `keterangan`, `jumlah`, `periode`) VALUES
('2016-12-01', 'Gaji', 1000000, '1216'),
('2016-12-01', 'Listrik', 100000, '1216');

-- --------------------------------------------------------

--
-- Table structure for table `tb_beli`
--

CREATE TABLE IF NOT EXISTS `tb_beli` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `periode` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `tb_beli`
--

INSERT INTO `tb_beli` (`id`, `tanggal`, `kode_barang`, `total_harga`, `jumlah`, `periode`) VALUES
(49, '2016-12-01', '01', 80000000, 100, '1216'),
(50, '2016-12-01', '02', 75000000, 50, '1216'),
(51, '2016-12-01', '03', 20000000, 10, '1216'),
(52, '2016-12-01', '04', 45000000, 5, '1216'),
(53, '2016-12-01', '05', 360000000, 200, '1216');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_detail_transaksi` (
  `nomor` varchar(12) NOT NULL,
  `kode_barang` varchar(5) NOT NULL,
  `harga` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  PRIMARY KEY (`nomor`,`kode_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`nomor`, `kode_barang`, `harga`, `kuantitas`) VALUES
('011216121322', '01', 1000000, 10),
('011216121322', '02', 2000000, 7),
('011216121322', '05', 2000000, 5),
('011216121526', '04', 12000000, 1),
('011216121526', '05', 2000000, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE IF NOT EXISTS `tb_login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`username`, `password`) VALUES
('norman', '9ac915832a9a1c970c1564708917c3aa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_persediaan`
--

CREATE TABLE IF NOT EXISTS `tb_persediaan` (
  `periode` varchar(4) NOT NULL,
  `persediaan_awal` int(11) NOT NULL,
  `persediaan_akhir` int(11) NOT NULL,
  PRIMARY KEY (`periode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_persediaan`
--

INSERT INTO `tb_persediaan` (`periode`, `persediaan_awal`, `persediaan_akhir`) VALUES
('1216', 0, 516500000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_transaksi` (
  `nomor` varchar(12) NOT NULL,
  `pembeli` varchar(50) NOT NULL,
  `bayar` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `periode` varchar(4) NOT NULL,
  PRIMARY KEY (`nomor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`nomor`, `pembeli`, `bayar`, `tanggal`, `periode`) VALUES
('011216121322', 'Ujang', 34000000, '2016-12-01', '1216'),
('011216121526', 'Anto', 42000000, '2016-12-01', '1216');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
