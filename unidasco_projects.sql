-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2019 at 08:11 PM
-- Server version: 5.7.28-log
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unidasco_projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorije`
--

CREATE TABLE `kategorije` (
  `id` int(11) NOT NULL,
  `naziv` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategorije`
--

INSERT INTO `kategorije` (`id`, `naziv`) VALUES
(1, 'M12'),
(2, 'M14'),
(3, 'M16'),
(4, 'M18'),
(28, 'M20'),
(30, 'M21A'),
(31, 'M21B'),
(35, 'M21E'),
(36, 'M35'),
(38, 'M45'),
(39, 'M55'),
(41, 'M65'),
(42, 'M70'),
(44, 'Z12'),
(45, 'Z14'),
(46, 'Z16'),
(47, 'Z18'),
(48, 'Z20'),
(49, 'Z21A'),
(50, 'Z21B'),
(51, 'Z21E'),
(52, 'Z35'),
(53, 'Z45'),
(54, 'Z55'),
(55, 'Z65'),
(56, 'Z70');

-- --------------------------------------------------------

--
-- Table structure for table `klubovi`
--

CREATE TABLE `klubovi` (
  `id` int(11) NOT NULL,
  `naziv` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `skraceno` varchar(50) NOT NULL,
  `drzava` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klubovi`
--

INSERT INTO `klubovi` (`id`, `naziv`, `skraceno`, `drzava`) VALUES
(162, 'PSD Kopaonik', 'KOP', 'Srbija'),
(165, 'PSD PTT', 'PTT', 'Srbija'),
(167, 'PSD Kopaonik', '', ''),
(168, 'dfdfdfddf', '', ''),
(169, 'cvcv', '', 'cvcv'),
(170, '', '', ''),
(171, 'PSD Kopaonik', '', ''),
(172, 'sdsds', '', ''),
(173, 'sdsd', 'sdsd', ''),
(174, 'sdsd', 'sdsd', '');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `korisnickoIme` varchar(30) NOT NULL,
  `lozinka` varchar(30) NOT NULL,
  `ime` varchar(100) NOT NULL,
  `prezime` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `idTakmicara` int(11) DEFAULT NULL,
  `isKlub` int(11) DEFAULT NULL,
  `isAdmin` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `korisnickoIme`, `lozinka`, `ime`, `prezime`, `email`, `idTakmicara`, `isKlub`, `isAdmin`) VALUES
(228, 'milena', 'milena', 'Milena', 'Bojovic', 'milena@paxy.in.rs', 104, 174, 1),
(229, 'ivana', 'ivana', 'Ivana', '', '', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prijave`
--

CREATE TABLE `prijave` (
  `id` int(11) NOT NULL,
  `idTakmicenja` int(11) NOT NULL,
  `idTakmicara` int(11) NOT NULL,
  `brojCipa` int(11) DEFAULT NULL,
  `idKategorije` int(11) NOT NULL,
  `ukupnaCena` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prijave`
--

INSERT INTO `prijave` (`id`, `idTakmicenja`, `idTakmicara`, `brojCipa`, `idKategorije`, `ukupnaCena`) VALUES
(282, 75, 104, 240, 47, 0);

-- --------------------------------------------------------

--
-- Table structure for table `takmicari`
--

CREATE TABLE `takmicari` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `idKlub` int(11) DEFAULT NULL,
  `registracioniBroj` varchar(11) NOT NULL,
  `brojCipa` int(11) DEFAULT NULL,
  `idKategorije` int(11) NOT NULL,
  `idKorisnik` int(11) DEFAULT NULL,
  `nacinUbacivanja` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `takmicari`
--

INSERT INTO `takmicari` (`id`, `ime`, `prezime`, `idKlub`, `registracioniBroj`, `brojCipa`, `idKategorije`, `idKorisnik`, `nacinUbacivanja`) VALUES
(104, 'Milena', 'Bojovic', 162, '12', 240, 49, 228, 0);

-- --------------------------------------------------------

--
-- Table structure for table `takmicenje`
--

CREATE TABLE `takmicenje` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `naziv` varchar(100) NOT NULL,
  `mesto` varchar(100) NOT NULL,
  `organizator` varchar(100) NOT NULL,
  `distanca` varchar(50) DEFAULT NULL,
  `bodovanje` varchar(50) DEFAULT NULL,
  `statusPrijava` int(11) NOT NULL DEFAULT '0',
  `cena` int(11) DEFAULT '0',
  `idKlub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `takmicenje`
--

INSERT INTO `takmicenje` (`id`, `datum`, `naziv`, `mesto`, `organizator`, `distanca`, `bodovanje`, `statusPrijava`, `cena`, `idKlub`) VALUES
(75, '2019-09-16', 'BG Kup', 'Beograd', 'PSD Kopaonik, BG Savez', 'Srednja', 'PSK 12', 0, 400, 162),
(80, '2019-09-17', 'PTT Kup', 'Divcibare', 'PD PTT', 'Duga', 'PSK 14', 0, 300, 165);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorije`
--
ALTER TABLE `kategorije`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klubovi`
--
ALTER TABLE `klubovi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTakmicar` (`idTakmicara`),
  ADD KEY `idKluba` (`isKlub`);

--
-- Indexes for table `prijave`
--
ALTER TABLE `prijave`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTakmicar-prijave` (`idTakmicara`),
  ADD KEY `idTakmicenja-prijave` (`idTakmicenja`),
  ADD KEY `idKategorije-prijave` (`idKategorije`);

--
-- Indexes for table `takmicari`
--
ALTER TABLE `takmicari`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `idKlub` (`idKlub`);

--
-- Indexes for table `takmicenje`
--
ALTER TABLE `takmicenje`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorije`
--
ALTER TABLE `kategorije`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `klubovi`
--
ALTER TABLE `klubovi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `prijave`
--
ALTER TABLE `prijave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;

--
-- AUTO_INCREMENT for table `takmicari`
--
ALTER TABLE `takmicari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `takmicenje`
--
ALTER TABLE `takmicenje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `idKluba` FOREIGN KEY (`isKlub`) REFERENCES `klubovi` (`id`),
  ADD CONSTRAINT `idTakmicar` FOREIGN KEY (`idTakmicara`) REFERENCES `takmicari` (`id`);

--
-- Constraints for table `prijave`
--
ALTER TABLE `prijave`
  ADD CONSTRAINT `idKategorije-prijave` FOREIGN KEY (`idKategorije`) REFERENCES `kategorije` (`id`),
  ADD CONSTRAINT `idTakmicar-prijave` FOREIGN KEY (`idTakmicara`) REFERENCES `takmicari` (`id`),
  ADD CONSTRAINT `idTakmicenja-prijave` FOREIGN KEY (`idTakmicenja`) REFERENCES `takmicenje` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
