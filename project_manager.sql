-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 26, 2020 at 02:19 PM
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
-- Database: `project_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `KORISNIK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KORISNIK_USERNAME` varchar(30) NOT NULL,
  `KORISNIK_PASSWORD` varchar(50) NOT NULL,
  `KORISNIK_IME` varchar(40) NOT NULL,
  `KORISNIK_PREZIME` varchar(50) NOT NULL,
  `KORISNIK_POL` varchar(1) NOT NULL,
  `TIP_ID` int(20) NOT NULL,
  `KORISNIK_EMAIL` varchar(50) DEFAULT NULL,
  `KORISNIK_AVATAR` varchar(50) DEFAULT NULL,
  `KORISNIK_MJESTO` varchar(50) DEFAULT NULL,
  `VERIFIKOVAN` tinyint(1) NOT NULL DEFAULT 0,
  `KOD_VERIFIKACIJA` varchar(50) NOT NULL,
  PRIMARY KEY (`KORISNIK_ID`),
  KEY `TIP_ID` (`TIP_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`KORISNIK_ID`, `KORISNIK_USERNAME`, `KORISNIK_PASSWORD`, `KORISNIK_IME`, `KORISNIK_PREZIME`, `KORISNIK_POL`, `TIP_ID`, `KORISNIK_EMAIL`, `KORISNIK_AVATAR`, `KORISNIK_MJESTO`, `VERIFIKOVAN`, `KOD_VERIFIKACIJA`) VALUES
(1, 'nikola', '9365ea12b2d910e1aceaac190fbc97a5', 'Nikola', 'Kostovic', 'm', 1, 'nikolakostovic23@gmail.com', 'm_avatar.png', 'Foca', 1, ''),
(20, 'milan', '83227a721a3363d2c78381664c78657f', 'Milan', 'Milanovic', 'm', 2, 'mmilanovic@gmail.com', 'm_avatar.png', 'Zvornik', 1, '9f37b3d8f3728891b53e6435f67e1776'),
(21, 'vido', '009b5f983218fd110c2ea43d08da022c', 'Vidoslav', 'Kakuca', 'm', 2, 'vidoslav@gmail.com', 'm_avatar.png', 'Bijeljina', 1, '7dc65a4830c2c542e26c6d30d3aa4f1c'),
(22, 'dejan', 'f8493de40d6f403c0e8a1f39374b987c', 'Dejan', 'Dejanovic', 'm', 2, 'ddejan@gmail.com', 'm_avatar.png', 'Istocno Sarajevo', 1, '20f869782bf4e2e03b98154412224ff7'),
(23, 'aleksandra', '3e20ff8b3a1381c59861218f58cd934e', 'Aleksandra', 'Aleksic', 'z', 2, 'aleksicaleksandra@gmail.com', 'z_avatar.png', 'Pale', 1, '10a1b155fccf615d0288486afefc1f48'),
(28, 'petar', '597e3b12820151caa6062612caec8056', 'Petar', 'Petrovic', 'm', 2, 'ppetrovic@gmail.com', 'm_avatar.png', 'Tuzla', 1, '369fdd681eff8a456f8a9f18a07b4b68'),
(29, 'marija', 'cb74c183402afe708a490f0048af6e41', 'Marija', 'Marijanovic', 'z', 2, 'marijamarijanovic@gmail.com', 'z_avatar.png', 'Gacko', 1, '1fc403f719d6cb15e5e1ef0bda02a245'),
(30, 'dajana', 'ce74ce76d2bb92a2996455d39fee38f9', 'Dajana', 'Dajanovic', 'z', 2, 'dajanadajanovic@gmail.com', 'z_avatar.png', 'Istocno Sarajevo', 1, 'e59a5e8c649d4f4b897871caad74545c');

-- --------------------------------------------------------

--
-- Table structure for table `projekat`
--

DROP TABLE IF EXISTS `projekat`;
CREATE TABLE IF NOT EXISTS `projekat` (
  `PROJEKAT_ID` int(20) NOT NULL AUTO_INCREMENT,
  `PROJEKAT_NAZIV` varchar(100) NOT NULL,
  `PROJEKAT_NAZIV_KLIJENTA` varchar(100) NOT NULL,
  `PROJEKAT_EMAIL_KLIJENTA` varchar(50) NOT NULL,
  `PROJEKAT_OPIS` text NOT NULL,
  `PROJEKAT_NAPOMENA` text DEFAULT NULL,
  `PROJEKAT_OD` date NOT NULL,
  `PROJEKAT_DO` date NOT NULL,
  PRIMARY KEY (`PROJEKAT_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projekat`
--

INSERT INTO `projekat` (`PROJEKAT_ID`, `PROJEKAT_NAZIV`, `PROJEKAT_NAZIV_KLIJENTA`, `PROJEKAT_EMAIL_KLIJENTA`, `PROJEKAT_OPIS`, `PROJEKAT_NAPOMENA`, `PROJEKAT_OD`, `PROJEKAT_DO`) VALUES
(19, 'Android aplikacija ', 'MUP RS', 'muprs@rs.com', 'Android aplikacija za MUP RS. Aplikacija treba da omoguci uvid u stanje...', ' Napomena', '2020-10-06', '2020-12-25'),
(20, 'Veb aplikacija', 'Univerzitet IS', 'univerzitetis@gmail.com', 'Veb aplikacija za Univerzitet IS za vijesti i obavjestenja.', 'Mogucnost registracije.', '2020-11-04', '2020-11-28'),
(21, 'Sistem za vodjenje evidencije', 'Komunalno preduzece ', 'kprad@gmail.com', 'Potrebno razviti sistem za vodjenje evidencije o racunima i placanju komunalnih usluga.', '-', '2020-11-01', '2021-01-01'),
(24, 'Aplikacija za turisticku agenciju', 'Turisticka agencija \"Solazur\"', 'solazur@gmail.com', 'Aplikacija koja prikazuje sve dostupne aranzmane. Mogucnost zakazivanja aranzmana online.', 'Mogucnost prikaza aranzmana za izabrani vremenski period.', '2020-11-10', '2021-01-27');

-- --------------------------------------------------------

--
-- Table structure for table `slika`
--

DROP TABLE IF EXISTS `slika`;
CREATE TABLE IF NOT EXISTS `slika` (
  `SLIKA_ID` int(20) NOT NULL AUTO_INCREMENT,
  `SLIKA_PUTANJA` varchar(100) NOT NULL,
  `PROJEKAT_ID` int(20) NOT NULL,
  PRIMARY KEY (`SLIKA_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slika`
--

INSERT INTO `slika` (`SLIKA_ID`, `SLIKA_PUTANJA`, `PROJEKAT_ID`) VALUES
(4, 'img/turisticka.jpg', 24),
(8, 'img/slika baza.png', 21),
(5, 'img/vebsajt.png', 20),
(7, 'img/WB0573SK0.png', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tip_korisnika`
--

DROP TABLE IF EXISTS `tip_korisnika`;
CREATE TABLE IF NOT EXISTS `tip_korisnika` (
  `TIP_ID` int(20) NOT NULL AUTO_INCREMENT,
  `TIP_ROLA` varchar(50) NOT NULL,
  PRIMARY KEY (`TIP_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tip_korisnika`
--

INSERT INTO `tip_korisnika` (`TIP_ID`, `TIP_ROLA`) VALUES
(1, 'Administrator'),
(2, 'Developer');

-- --------------------------------------------------------

--
-- Table structure for table `zaduzenje`
--

DROP TABLE IF EXISTS `zaduzenje`;
CREATE TABLE IF NOT EXISTS `zaduzenje` (
  `ZADUZENJE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KOR_ID` int(20) NOT NULL,
  `PROJ_ID` int(20) NOT NULL,
  PRIMARY KEY (`ZADUZENJE_ID`),
  KEY `KORISNIK_ID` (`KOR_ID`),
  KEY `PROJEKAT_ID` (`PROJ_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zaduzenje`
--

INSERT INTO `zaduzenje` (`ZADUZENJE_ID`, `KOR_ID`, `PROJ_ID`) VALUES
(101, 37, 24),
(95, 30, 19),
(94, 23, 24),
(93, 31, 24),
(92, 23, 21),
(91, 21, 20),
(90, 29, 20),
(89, 20, 20),
(88, 29, 24),
(83, 30, 21),
(87, 20, 24),
(86, 1, 24),
(79, 28, 19),
(85, 21, 21),
(82, 28, 20),
(80, 23, 20),
(78, 23, 19),
(84, 31, 21),
(81, 22, 20),
(77, 20, 19);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
