-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 05:39 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fatty`
--

-- --------------------------------------------------------

--
-- Table structure for table `jelo`
--

CREATE TABLE `jelo` (
  `IdJelo` int(11) NOT NULL,
  `Sastojci` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Naziv` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Cena` int(11) NOT NULL,
  `Slika` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idkor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jelo`
--

INSERT INTO `jelo` (`IdJelo`, `Sastojci`, `Naziv`, `Cena`, `Slika`, `idkor`) VALUES
(5, 'Pirinac, meso, luk', 'Sarma', 650, '1622985823_51ce9fbd7897508216b2.jpg', 5),
(6, 'Pasulj, biber, luk', 'Pasulj', 175, '1622985889_37b399bea513577bd7ea.jpg', 5),
(7, 'Brasno, kecap, sunka', 'Pizza', 690, '1622986668_1a7b4ca1e1f280171fa6.jpg', 6),
(8, 'Pavlaka, slanina, so', 'Carbonara', 540, '1622986754_91afd4ca9153e6527fe3.jpg', 6),
(9, 'Zelena salata, krastavac, paradajz', 'Salata', 300, '1622986894_0d9129fed6649ca752a8.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `IdKom` int(11) NOT NULL,
  `Komentar` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Ocena` char(18) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `IdKor` int(11) NOT NULL,
  `IdRes` int(11) NOT NULL,
  `Datum` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`IdKom`, `Komentar`, `Ocena`, `IdKor`, `IdRes`, `Datum`) VALUES
(13, 'Brza dostava i prikladna cena.', '4', 8, 5, '06.06.2021.'),
(14, 'Hrana je dostavljena hladna.', '1', 8, 6, '06.06.2021.'),
(15, 'Okej.', '3', 8, 7, '06.06.2021.');

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE `korpa` (
  `idkor` int(11) NOT NULL,
  `Kolicina` int(11) NOT NULL,
  `IdJelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korpa`
--

INSERT INTO `korpa` (`idkor`, `Kolicina`, `IdJelo`) VALUES
(6, 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `narudzbina`
--

CREATE TABLE `narudzbina` (
  `UkupanIznos` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `IdNar` int(11) NOT NULL,
  `IdKor` int(11) NOT NULL,
  `IdJelo` int(11) NOT NULL,
  `Adresa` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `regkorisnik`
--

CREATE TABLE `regkorisnik` (
  `idkor` int(11) NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `approved` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `restoran` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regkorisnik`
--

INSERT INTO `regkorisnik` (`idkor`, `address`, `name`, `surname`, `email`, `phone`, `password`, `username`, `approved`, `restoran`) VALUES
(6, 'Beograd, Balkanska 5', 'Neda', 'Todorovic', 'neda@gmail.com', '069248596', 'neda', 'neda', 'yes', 0),
(7, 'nema', 'Toma', 'Zdravkovic', 'admin@gmail.com', '69420', 'admin123', 'admin', '1', 0),
(8, 'Beograd, Hilandarska 12', 'Ceca', 'Popovic', 'ceca@gmail.com', '063258693', 'ceca', 'ceca', 'yes', 0),
(9, 'Beograd, Zanatlijska 58', 'Boban', 'Perovic', 'boban@gmail.com', '06396365', 'boban', 'boban', 'no', 0);

-- --------------------------------------------------------

--
-- Table structure for table `restoran`
--

CREATE TABLE `restoran` (
  `idkor` int(11) NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `approved` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'no',
  `restoran` tinyint(1) DEFAULT NULL,
  `PIB` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restoran`
--

INSERT INTO `restoran` (`idkor`, `address`, `password`, `name`, `email`, `phone`, `type`, `description`, `approved`, `restoran`, `PIB`, `image`, `username`) VALUES
(5, 'Beograd, Bulevar Kralja Aleksandra 15', 'orasac1', 'Orasac', 'orasac@gmail.com', '063526547', 'Srpska', 'Odličan roštilj i izvrsnost jela spremljenih po receptima iz stare Srpske kuhinje dokaz su zašto restoran Orašac nosi naziv vodeće nacionalne kuhinje u Beogradu.', 'yes', 1, '56985658', '1622985666_f4a47e1d12794fbdafaa.jpg', 'orasac'),
(6, 'Beograd, Zmaj Jovina 12', 'napoli', 'Bella Napoli', 'napoli@yahoo.com', '0645891023', 'Italijanska', 'Enterijer i letnja bašta su uređeni u tradicionalnom italijanskom stilu tako da u potpunosti gosti imaju osećaj kao da se nalaze negde na jugu Italije', 'yes', 1, NULL, '1622986590_25c656bccd7863791ad3.jpg', 'napoli'),
(7, 'Beograd, Omladinskih Brigada 89', 'salata', 'Moja Salata', 'salata@gmail.com', '069856985', 'Ostalo', 'Naši iskusni šef kuhinje svaki dan sprema najukusnije salate koristeći samo najsvežije sastojke', 'yes', 1, NULL, '1622986829_68320db46b127c4ad5bb.png', 'salata');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jelo`
--
ALTER TABLE `jelo`
  ADD PRIMARY KEY (`IdJelo`),
  ADD KEY `R_8` (`idkor`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`IdKom`),
  ADD KEY `R_7` (`IdKor`),
  ADD KEY `nzm` (`IdRes`);

--
-- Indexes for table `korpa`
--
ALTER TABLE `korpa`
  ADD PRIMARY KEY (`idkor`,`IdJelo`),
  ADD KEY `R_10` (`IdJelo`),
  ADD KEY `idkor` (`idkor`);

--
-- Indexes for table `narudzbina`
--
ALTER TABLE `narudzbina`
  ADD PRIMARY KEY (`IdKor`,`IdJelo`,`IdNar`),
  ADD KEY `IdKor` (`IdKor`),
  ADD KEY `IdJelo` (`IdJelo`);

--
-- Indexes for table `regkorisnik`
--
ALTER TABLE `regkorisnik`
  ADD PRIMARY KEY (`idkor`);

--
-- Indexes for table `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`idkor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jelo`
--
ALTER TABLE `jelo`
  MODIFY `IdJelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `IdKom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `regkorisnik`
--
ALTER TABLE `regkorisnik`
  MODIFY `idkor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `restoran`
--
ALTER TABLE `restoran`
  MODIFY `idkor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jelo`
--
ALTER TABLE `jelo`
  ADD CONSTRAINT `R_8` FOREIGN KEY (`idkor`) REFERENCES `restoran` (`idkor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `R_6` FOREIGN KEY (`IdKor`) REFERENCES `regkorisnik` (`idkor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `nzm` FOREIGN KEY (`IdRes`) REFERENCES `restoran` (`idkor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `korpa`
--
ALTER TABLE `korpa`
  ADD CONSTRAINT `R_10` FOREIGN KEY (`IdJelo`) REFERENCES `jelo` (`IdJelo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `R_9` FOREIGN KEY (`idkor`) REFERENCES `regkorisnik` (`idkor`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
