-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2020 at 03:15 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` char(4) NOT NULL,
  `adminnama` varchar(30) NOT NULL,
  `adminemail` varchar(60) NOT NULL,
  `adminpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminnama`, `adminemail`, `adminpassword`) VALUES
('A001', 'Kasinda', 'kasinda@yahoo.com', '698d51a19d8a121ce581499d7b701668'),
('A002', 'Felicia', 'felicia@yahoo.com', '698d51a19d8a121ce581499d7b701668'),
('K03', 'fti', 'fti@yahoo.com', '698d51a19d8a121ce581499d7b701668');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `areaID` char(4) NOT NULL,
  `areanama` char(35) NOT NULL,
  `areawilayah` char(35) NOT NULL,
  `areaketerangan` varchar(255) NOT NULL,
  `provinsiID` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`areaID`, `areanama`, `areawilayah`, `areaketerangan`, `provinsiID`) VALUES
('AR01', 'Lembang', 'Bandung Utara', '', 'P2'),
('AR02', 'Ledeng', 'Bandung Utara', '', 'P2'),
('AR03', 'Dago', 'Bandung Utara', '', 'P2'),
('AR04', 'Pantai Selatan Jawa', 'Gunung Kidul', '', 'P3'),
('AR05', 'Patuk', 'Gunung Kidul', 'Gunung', 'P1');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `beritaID` char(5) NOT NULL,
  `beritajudul` varchar(255) NOT NULL,
  `beritaketerangan` varchar(255) NOT NULL,
  `destinasiID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`beritaID`, `beritajudul`, `beritaketerangan`, `destinasiID`) VALUES
('B01', 'Sertigtal-Loipe', 'A classic among the cross-country tracks in Davos Klosters, the Sertigtal trail offers skiing pleasure surrounded by forests and mountains like the Mittaghorn and Plattenfluh. Its delights include the Walser hamlet of Sertig and the little white mountain ', 'WS04'),
('B02', 'Art Museums of Switzerland', 'Amazing art, design and photography: A visit to one of the Art Museums of Switzerland pledges a unique experience. Located in charming towns, ten world-class museums present grand sights on little space.\r\nExtraordinary collections and exciting, special tw', 'WS06'),
('B03', 'Winter in the city', 'The shimmering Christmas season has arrived in the streets of Switzerland, creating a warm and cosy atmosphere. Offering everything from culinary delights for connoisseurs and outdoor adventures for active individuals to museum visits for culture lovers, ', 'WS01'),
('B04', 'Snowshoe tour of the Graubünden Dolomites', 'The wonderful view of the impressive limestone rock faces of the Rätikon makes for an exhilarating moment you won’t soon forget on this snowshoe tour. The trail will take you from the Mottis mountain hut, over the slopes of the Stelserberg to St. Antönien', 'WS03'),
('B05', 'Hotels with special fondue / raclette venues', 'There is nothing better than enjoying a fondue or raclette in a chalet or an igloo with friends on a cold winter evening. And if one can enjoy such a thing while staying at a hotel, even better!', 'WS05'),
('B06', 'Snow Sports Hotels', 'These accommodation options are heaven for winter sports enthusiasts – the perfect place to relax after an action-packed day on the slopes, have your equipment serviced and be the first one back on the mountain the next day.', 'WS07'),
('B07', 'Sertigtal-Loipe', 'A classic among the cross-country tracks in Davos Klosters, the Sertigtal trail offers skiing pleasure surrounded by forests and mountains like the Mittaghorn and Plattenfluh. Its delights include the Walser hamlet of Sertig and the little white mountain', 'WS02'),
('B08', 'Art Museums of Switzerland', 'Amazing art, design and photography: A visit to one of the Art Museums of Switzerland pledges a unique experience. Located in charming towns, ten world-class museums present grand sights on little space. Extraordinary collections and exciting, special tw', 'WS05'),
('B09', 'Hotels with special fondue / raclette venues', 'There is nothing better than enjoying a fondue or raclette in a chalet or an igloo with friends on a cold winter evening. And if one can enjoy such a thing while staying at a hotel, even better!', 'WS06');

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiID` char(5) NOT NULL,
  `destinasinama` varchar(35) NOT NULL,
  `destinasialamat` varchar(255) NOT NULL,
  `kategoriID` char(4) NOT NULL,
  `areaID` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`destinasiID`, `destinasinama`, `destinasialamat`, `kategoriID`, `areaID`) VALUES
('WS01', 'Rosenboden-Panoramaweg', 'Unterwasser, Chäserrugg', 'WK03', 'AR03'),
('WS02', 'Alpine Passes Trail', 'Chur - St-Gingolph', 'WK01', 'AR01'),
('WS03', 'Via Alpina', 'Vaduz (Gaflei, FL) - Montreux', 'WK01', 'AR01'),
('WS04', 'St. Gallen', 'Eastern Switzerland / Liechtenstein', 'WK05', 'AR01'),
('WS05', 'Baden', 'Zurich', 'WK05', 'AR01'),
('WS06', 'Naturmuseum Solothurn', 'Solothurn', 'WK04', 'AR03'),
('WS07', 'Tropical House Frutigen', 'Frutigen', 'WK04', 'AR01');

-- --------------------------------------------------------

--
-- Table structure for table `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `fotoID` char(5) NOT NULL,
  `fotonama` char(60) NOT NULL,
  `destinasiID` char(4) NOT NULL,
  `fotofile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fotodestinasi`
--

INSERT INTO `fotodestinasi` (`fotoID`, `fotonama`, `destinasiID`, `fotofile`) VALUES
('F01', 'ski', 'WS01', '9.jpg'),
('F02', 'trails', 'WS02', '3.jpg'),
('F03', 'via', 'WS03', '6.jpg'),
('F04', 'Gallen', 'WS04', '5.jpg'),
('F05', 'Baden', 'WS05', '10.jpg'),
('F06', 'natu', 'WS06', '4.jpg'),
('F07', 'tropical', 'WS07', '7.jpg'),
('F08', 'aaa', 'WS01', '11.jpg'),
('F09', 'dd', 'WS02', '12.jpg'),
('F10', 'ghgh', 'WS03', '13.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelID` char(4) NOT NULL,
  `hotelnama` varchar(255) NOT NULL,
  `hotelalamat` varchar(255) NOT NULL,
  `destinasiID` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelID`, `hotelnama`, `hotelalamat`, `destinasiID`) VALUES
('H01', 'Bürgenstock Hotels & Resort', 'Bürgenstock Hotels & Resort, Bürgenstock 17, 6363 Obbürgen, Switzerland', 'WS01'),
('H03', 'Hotel Belvedere Grindelwald', 'Dorfstrasse 53, 3818 Grindelwald, Switzerland', 'WS03'),
('H04', 'Hotel Villa Honegg', 'Honegg, 6373 Ennetbürgen, Switzerland', 'WS04');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategoriID` char(4) NOT NULL,
  `kategorinama` char(30) NOT NULL,
  `kategoriket` varchar(255) NOT NULL,
  `kategorireferensi` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategoriID`, `kategorinama`, `kategoriket`, `kategorireferensi`) VALUES
('WK01', 'Nature', 'See through the nature', 'Buku'),
('WK03', 'Ski', 'Let\'s try skiing', 'Buku Wisata'),
('WK04', 'Arts', 'Visit unique experience', 'Majalah'),
('WK05', 'City', 'Take a break from nature', 'Majalah');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `provinsiID` char(2) NOT NULL,
  `provinsinama` char(25) NOT NULL,
  `provinsitglberdiri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`provinsiID`, `provinsinama`, `provinsitglberdiri`) VALUES
('P1', 'DKI Jakarta', '2010-10-30'),
('P2', 'Jawa Barat', '2020-10-31'),
('P3', 'Jawa Tengah', '2020-10-11'),
('P4', 'Bali', '2020-10-04'),
('P5', 'Bogor', '2012-01-06'),
('P6', 'Jambi', '2017-01-02'),
('P7', 'Lombok', '2020-11-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`areaID`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`beritaID`);

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiID`);

--
-- Indexes for table `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD PRIMARY KEY (`fotoID`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelID`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategoriID`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`provinsiID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
