-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2017 at 04:19 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flamboyan`
--

-- --------------------------------------------------------

--
-- Table structure for table `blk_bahasa`
--

CREATE TABLE IF NOT EXISTS `blk_bahasa` (
`id_bahasa` int(11) NOT NULL,
  `isi` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blk_bahasa`
--

INSERT INTO `blk_bahasa` (`id_bahasa`, `isi`) VALUES
(1, 'INGGRIS'),
(2, 'MANDARIN'),
(3, 'KANTONIS');

-- --------------------------------------------------------

--
-- Table structure for table `blk_cluster_profesi`
--

CREATE TABLE IF NOT EXISTS `blk_cluster_profesi` (
`id_cluster` int(11) NOT NULL,
  `isi` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blk_cluster_profesi`
--

INSERT INTO `blk_cluster_profesi` (`id_cluster`, `isi`) VALUES
(1, 'Perawatan Lanjut Usia'),
(2, 'Pelayanan Rumah Tangga');

-- --------------------------------------------------------

--
-- Table structure for table `blk_eks_non`
--

CREATE TABLE IF NOT EXISTS `blk_eks_non` (
`id_eks_non` int(11) NOT NULL,
  `isi` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blk_eks_non`
--

INSERT INTO `blk_eks_non` (`id_eks_non`, `isi`) VALUES
(1, 'EKS'),
(2, 'NON');

-- --------------------------------------------------------

--
-- Table structure for table `blk_hasil_ujk`
--

CREATE TABLE IF NOT EXISTS `blk_hasil_ujk` (
`id_hasil_ujk` int(11) NOT NULL,
  `isi` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blk_hasil_ujk`
--

INSERT INTO `blk_hasil_ujk` (`id_hasil_ujk`, `isi`) VALUES
(1, 'LULUS'),
(2, 'ULANG');

-- --------------------------------------------------------

--
-- Table structure for table `blk_jenisujian`
--

CREATE TABLE IF NOT EXISTS `blk_jenisujian` (
`id_jenisujian` int(11) NOT NULL,
  `isi` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blk_jenisujian`
--

INSERT INTO `blk_jenisujian` (`id_jenisujian`, `isi`) VALUES
(6, 'MURNI'),
(7, 'ULANG');

-- --------------------------------------------------------

--
-- Table structure for table `blk_jk`
--

CREATE TABLE IF NOT EXISTS `blk_jk` (
`id_jk` int(11) NOT NULL,
  `isi` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blk_jk`
--

INSERT INTO `blk_jk` (`id_jk`, `isi`) VALUES
(1, 'PRIA'),
(3, 'WANITA');

-- --------------------------------------------------------

--
-- Table structure for table `blk_lembaga_lsp`
--

CREATE TABLE IF NOT EXISTS `blk_lembaga_lsp` (
`id_lembaga_lsp` int(11) NOT NULL,
  `nama` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `alamat` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `bank` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `ket` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blk_lembaga_lsp`
--

INSERT INTO `blk_lembaga_lsp` (`id_lembaga_lsp`, `nama`, `alamat`, `bank`, `ket`) VALUES
(1, 'Sekretariat LSP-PD Nusantara', 'Jl. Tumapel No. 45 / 75 Singosari, Malang', 'BCA NO.123456 , LSP NUSANTARA', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `blk_negara_tujuan`
--

CREATE TABLE IF NOT EXISTS `blk_negara_tujuan` (
`id_negara_tujuan` int(11) NOT NULL,
  `isi` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blk_negara_tujuan`
--

INSERT INTO `blk_negara_tujuan` (`id_negara_tujuan`, `isi`) VALUES
(1, 'TAIWAN'),
(2, 'HONGKONG'),
(3, 'SINGAPORE');

-- --------------------------------------------------------

--
-- Table structure for table `blk_pemilik`
--

CREATE TABLE IF NOT EXISTS `blk_pemilik` (
`id_pemilik` int(11) NOT NULL,
  `isi` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `negara` varchar(100) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blk_pemilik`
--

INSERT INTO `blk_pemilik` (`id_pemilik`, `isi`, `negara`) VALUES
(1, 'Santo', 'Taiwan'),
(7, 'Santo', 'Hongkong'),
(8, 'Santo', 'Singapore');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blk_bahasa`
--
ALTER TABLE `blk_bahasa`
 ADD PRIMARY KEY (`id_bahasa`);

--
-- Indexes for table `blk_cluster_profesi`
--
ALTER TABLE `blk_cluster_profesi`
 ADD PRIMARY KEY (`id_cluster`);

--
-- Indexes for table `blk_eks_non`
--
ALTER TABLE `blk_eks_non`
 ADD PRIMARY KEY (`id_eks_non`);

--
-- Indexes for table `blk_hasil_ujk`
--
ALTER TABLE `blk_hasil_ujk`
 ADD PRIMARY KEY (`id_hasil_ujk`);

--
-- Indexes for table `blk_jenisujian`
--
ALTER TABLE `blk_jenisujian`
 ADD PRIMARY KEY (`id_jenisujian`);

--
-- Indexes for table `blk_jk`
--
ALTER TABLE `blk_jk`
 ADD PRIMARY KEY (`id_jk`);

--
-- Indexes for table `blk_lembaga_lsp`
--
ALTER TABLE `blk_lembaga_lsp`
 ADD PRIMARY KEY (`id_lembaga_lsp`);

--
-- Indexes for table `blk_negara_tujuan`
--
ALTER TABLE `blk_negara_tujuan`
 ADD PRIMARY KEY (`id_negara_tujuan`);

--
-- Indexes for table `blk_pemilik`
--
ALTER TABLE `blk_pemilik`
 ADD PRIMARY KEY (`id_pemilik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blk_bahasa`
--
ALTER TABLE `blk_bahasa`
MODIFY `id_bahasa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `blk_cluster_profesi`
--
ALTER TABLE `blk_cluster_profesi`
MODIFY `id_cluster` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `blk_eks_non`
--
ALTER TABLE `blk_eks_non`
MODIFY `id_eks_non` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `blk_hasil_ujk`
--
ALTER TABLE `blk_hasil_ujk`
MODIFY `id_hasil_ujk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `blk_jenisujian`
--
ALTER TABLE `blk_jenisujian`
MODIFY `id_jenisujian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `blk_jk`
--
ALTER TABLE `blk_jk`
MODIFY `id_jk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `blk_lembaga_lsp`
--
ALTER TABLE `blk_lembaga_lsp`
MODIFY `id_lembaga_lsp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blk_negara_tujuan`
--
ALTER TABLE `blk_negara_tujuan`
MODIFY `id_negara_tujuan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `blk_pemilik`
--
ALTER TABLE `blk_pemilik`
MODIFY `id_pemilik` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
