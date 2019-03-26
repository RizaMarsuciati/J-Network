-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2019 at 09:33 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jnetwork`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fcjasa` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 BEGIN
DECLARE urut int;
DECLARE hasil varchar(8);
SET urut = IF(nomer IS null, 1, nomer + 1);
SET hasil = CONCAT('JSA',LPAD(urut,5,0));
RETURN hasil;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fckategori` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 BEGIN
DECLARE urut int;
DECLARE hasil varchar(8);
SET urut = IF(nomer IS null, 1, nomer + 1);
SET hasil = CONCAT('KTG',LPAD(urut,5,0));
RETURN hasil;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fcproduk` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 BEGIN
DECLARE urut int;
DECLARE hasil varchar(8);
SET urut = IF(nomer IS null, 1, nomer + 1);
SET hasil = CONCAT('PRD',LPAD(urut,5,0));
RETURN hasil;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fcpromo` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 BEGIN
DECLARE urut int;
DECLARE hasil varchar(8);
SET urut = IF(nomer IS null, 1, nomer + 1);
SET hasil = CONCAT('PRM',LPAD(urut,5,0));
RETURN hasil;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fcpromojasa` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 BEGIN
DECLARE urut int;
DECLARE hasil varchar(8);
SET urut = IF(nomer IS null, 1, nomer + 1);
SET hasil = CONCAT('PRJ',LPAD(urut,5,0));
RETURN hasil;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `fcuser` (`nomer` INT) RETURNS VARCHAR(8) CHARSET latin1 BEGIN
DECLARE urut int;
DECLARE hasil varchar(8);
SET urut = IF(nomer IS null, 1, nomer + 1);
SET hasil = CONCAT('ADM',LPAD(urut,5,0));
RETURN hasil;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jasa`
--

CREATE TABLE `jasa` (
  `kdjasa` varchar(8) NOT NULL,
  `namajasa` varchar(100) NOT NULL,
  `hargajasa` int(11) NOT NULL,
  `ketjasa` varchar(250) DEFAULT NULL,
  `gambar` varchar(100) NOT NULL,
  `kdkategori` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jasa`
--

INSERT INTO `jasa` (`kdjasa`, `namajasa`, `hargajasa`, `ketjasa`, `gambar`, `kdkategori`) VALUES
('JSA00001', 'Pasang CCTV', 156000, 'jasa pasang belum termasuk biaya lain-lain', '14323-jasa1.jpg', 'KTG00004'),
('JSA00002', 'Pasang CCTV Komplit', 320000, 'biaya pasang sudah termasuk biaya lain-lain', '25493-jasa2.jpg', 'KTG00005'),
('JSA00003', 'Service CCTV ', 155000, 'service mencakup pengecekan semuanya', '55165-jasa3.jpg', 'KTG00008'),
('JSA00004', 'Maintenance', 56000, 'bagus', '26565-jasa1.jpg', 'KTG00008');

--
-- Triggers `jasa`
--
DELIMITER $$
CREATE TRIGGER `tgjasa` BEFORE INSERT ON `jasa` FOR EACH ROW BEGIN
DECLARE k varchar(8);
DECLARE i integer;
SET i = (SELECT substring(jasa.kdjasa,5,4) AS nomer FROM jasa ORDER BY nomer DESC LIMIT 1);
SET k = (SELECT fcjasa(i));
IF(new.kdjasa IS null OR new.kdjasa = '') THEN SET new.kdjasa = k;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kdkategori` varchar(8) NOT NULL,
  `namakategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kdkategori`, `namakategori`) VALUES
('KTG00002', 'cctv'),
('KTG00003', 'finger print'),
('KTG00004', 'jasa pasang wifi'),
('KTG00005', 'jasa pasang cctv'),
('KTG00006', 'jasa pasang finger print'),
('KTG00007', 'service wifi'),
('KTG00008', 'service cctv'),
('KTG00009', 'service finger print'),
('KTG00010', 'beli wifi bekas'),
('KTG00011', 'wifi');

--
-- Triggers `kategori`
--
DELIMITER $$
CREATE TRIGGER `tgkategori` BEFORE INSERT ON `kategori` FOR EACH ROW BEGIN
DECLARE k varchar(8);
DECLARE i integer;
SET i = (SELECT substring(kategori.kdkategori,5,4) AS nomer FROM kategori ORDER BY nomer DESC LIMIT 1);
SET k = (SELECT fckategori(i));
IF(new.kdkategori IS null OR new.kdkategori = '') THEN SET new.kdkategori = k;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kdproduk` varchar(8) NOT NULL,
  `namaproduk` varchar(100) NOT NULL,
  `hargaproduk` int(11) NOT NULL,
  `ketproduk` varchar(250) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `kdkategori` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kdproduk`, `namaproduk`, `hargaproduk`, `ketproduk`, `gambar`, `kdkategori`) VALUES
('PRD00004', 'CCTV Outdor biasa', 750000, 'anti air dan anti panas', '74670-prodak5.jpg', 'KTG00002'),
('PRD00005', 'CCTV Outdor 360', 56000, 'CCTV bisa mencakup tempat secara menyeluruh', '49319-prodak3.jpg', 'KTG00002'),
('PRD00006', 'Paket Komplit 1', 1500000, 'paket CCTV beserta master tinggal pakai', '31738-prodak2.jpg', 'KTG00002'),
('PRD00007', 'Fingerprint Standart', 458000, 'garansi 10 bulan', '93759-prodak4.jpg', 'KTG00003'),
('PRD00008', 'Router Tplink', 156000, 'garansi 10 bulan', '54026-prodak10.jpg', 'KTG00011'),
('PRD00009', 'Mini CCTV', 250000, 'CCTV ukuran kecil', '13773-31738-prodak2.jpg', 'KTG00002'),
('PRD00010', 'CCTV Kotak', 500000, 'CCTV Model Kotak', '27007-79139-74670-prodak5.jpg', 'KTG00002');

--
-- Triggers `produk`
--
DELIMITER $$
CREATE TRIGGER `tgproduk` BEFORE INSERT ON `produk` FOR EACH ROW BEGIN
DECLARE k varchar(8);
DECLARE i integer;
SET i = (SELECT substring(produk.kdproduk,5,4) AS nomer FROM produk ORDER BY nomer DESC LIMIT 1);
SET k = (SELECT fcproduk(i));
IF(new.kdproduk IS null OR new.kdproduk = '') THEN SET new.kdproduk = k;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `kdpromo` varchar(8) NOT NULL,
  `namapromo` varchar(100) NOT NULL,
  `jenispromo` varchar(10) NOT NULL,
  `tglmulai` date NOT NULL,
  `tglakhir` date NOT NULL,
  `kdproduk` varchar(8) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `hargapromo` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `kduser` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`kdpromo`, `namapromo`, `jenispromo`, `tglmulai`, `tglakhir`, `kdproduk`, `nama`, `harga`, `hargapromo`, `gambar`, `kduser`) VALUES
('PRM00002', 'weekend', 'barang', '2019-02-07', '2019-02-07', 'PRD00007', 'PRD00007', 458000, 400000, '3697-93759-prodak4.jpg', 'ADM00001'),
('PRM00003', 'JSM', 'barang', '2019-02-16', '2019-02-17', 'PRD00005', 'PRD00005', 56000, 30000, '55008-prodak6.jpg', 'ADM00001');

--
-- Triggers `promo`
--
DELIMITER $$
CREATE TRIGGER `tgpromo` BEFORE INSERT ON `promo` FOR EACH ROW BEGIN
DECLARE k varchar(8);
DECLARE i integer;
SET i = (SELECT substring(promo.kdpromo,5,4) AS nomer FROM promo ORDER BY nomer DESC LIMIT 1);
SET k = (SELECT fcpromo(i));
IF(new.kdpromo IS null OR new.kdpromo = '') THEN SET new.kdpromo = k;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `promojasa`
--

CREATE TABLE `promojasa` (
  `kdpromo` varchar(8) NOT NULL,
  `namapromo` varchar(100) NOT NULL,
  `jenispromo` varchar(10) NOT NULL,
  `tglmulai` date NOT NULL,
  `tglakhir` date NOT NULL,
  `kdjasa` varchar(8) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `hargapromo` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `kduser` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promojasa`
--

INSERT INTO `promojasa` (`kdpromo`, `namapromo`, `jenispromo`, `tglmulai`, `tglakhir`, `kdjasa`, `nama`, `harga`, `hargapromo`, `gambar`, `kduser`) VALUES
('PRJ00001', 'Februari berkah', 'jasa', '2019-02-07', '2019-02-09', 'JSA00001', 'Pasang CCTV', 56000, 45000, '6587-jasa1', 'ADM00001'),
('PRJ00002', 'Weekend', 'jasa', '2019-02-08', '2019-02-10', 'JSA00004', 'JSA00004', 56000, 50000, '7486-6556-jasa1.jpg', 'ADM00001');

--
-- Triggers `promojasa`
--
DELIMITER $$
CREATE TRIGGER `tgpromojasa` BEFORE INSERT ON `promojasa` FOR EACH ROW BEGIN
DECLARE k varchar(8);
DECLARE i integer;
SET i = (SELECT substring(promojasa.kdpromo,5,4) AS nomer FROM promojasa ORDER BY nomer DESC LIMIT 1);
SET k = (SELECT fcpromojasa(i));
IF(new.kdpromo IS null OR new.kdpromo = '') THEN SET new.kdpromo = k;
END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `kduser` varchar(8) NOT NULL,
  `iduser` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `jenkel` varchar(1) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kduser`, `iduser`, `nama`, `alamat`, `jenkel`, `username`, `password`) VALUES
('ADM00001', '123456789', 'admin', 'yogyakarta', 'L', 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `tguser` BEFORE INSERT ON `user` FOR EACH ROW BEGIN
DECLARE k varchar(8);
DECLARE i integer;
SET i = (SELECT substring(user.kduser,5,4) AS nomer FROM user ORDER BY nomer DESC LIMIT 1);
SET k = (SELECT fcuser(i));
IF(new.kduser IS null OR new.kduser = '') THEN SET new.kduser = k;
END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jasa`
--
ALTER TABLE `jasa`
  ADD PRIMARY KEY (`kdjasa`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kdkategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kdproduk`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`kdpromo`);

--
-- Indexes for table `promojasa`
--
ALTER TABLE `promojasa`
  ADD PRIMARY KEY (`kdpromo`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kduser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
