-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2024 at 12:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lantern`
--

-- --------------------------------------------------------

--
-- Table structure for table `grad`
--

CREATE TABLE `grad` (
  `idGrad` int(5) NOT NULL,
  `nazivGrada` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grad`
--

INSERT INTO `grad` (`idGrad`, `nazivGrada`) VALUES
(1, 'Beograd'),
(2, 'Novi Sad'),
(3, 'Niš'),
(4, 'Kragujevac'),
(5, 'Subotica'),
(6, 'Kruševac'),
(8, 'Prokuplje');

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `idKategorija` int(5) NOT NULL,
  `nazivKategorija` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`idKategorija`, `nazivKategorija`) VALUES
(1, 'Matematika'),
(2, 'Programiranje'),
(3, 'Engleski jezik'),
(4, 'Mehanika'),
(5, 'Fizika'),
(7, 'Likovna kultura');

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `idKorisnik` int(5) NOT NULL,
  `ime` varchar(20) NOT NULL,
  `prezime` varchar(20) NOT NULL,
  `korisnickoIme` varchar(50) NOT NULL,
  `email` varchar(35) NOT NULL,
  `lozinka` varchar(25) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `slika` varchar(80) NOT NULL,
  `idUloga` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`idKorisnik`, `ime`, `prezime`, `korisnickoIme`, `email`, `lozinka`, `telefon`, `slika`, `idUloga`) VALUES
(1, 'Snežana', 'Spasić', 'sneza', 'sneska@gmail.com', 'sneza', '0601234588', '../assets/images/korisnici/ksenija.png', 1),
(2, 'Marija', 'Stamenkovic', 'marija89', 'marijas@gmail.com', 'marija89', '0654789885', '../assets/images/korisnici/marija.jpg', 2),
(4, 'Nikola', 'Djordjevic', 'nikola95', 'niki@gmail.com', 'nikola95', '0645896545', '../assets/images/korisnici/nikola.jpg', 2),
(6, 'Ksenija', 'Peric', 'ksenija', 'kseni@gmail.com', 'ksenija', '123456789', '../assets/images/korisnici/ksenija.png', 2),
(8, 'Milica', 'Markovic', 'mica123', 'mica@gmail.com', 'mica123', '0601235489', '../assets/images/korisnici/mica.jpg', 2),
(21, 'Marina', 'Marinkovic', 'marina', 'mari@gmail.com', 'marina555', '0604125663', '../assets/images/korisnici/katrin.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oglasi`
--

CREATE TABLE `oglasi` (
  `idOglasa` int(5) NOT NULL,
  `naslov` varchar(40) NOT NULL,
  `opis` varchar(300) NOT NULL,
  `cena` int(10) NOT NULL,
  `slikaOglas` varchar(80) NOT NULL,
  `idKategorija` int(5) NOT NULL,
  `idGrad` int(5) NOT NULL,
  `idKorisnik` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oglasi`
--

INSERT INTO `oglasi` (`idOglasa`, `naslov`, `opis`, `cena`, `slikaOglas`, `idKategorija`, `idGrad`, `idKorisnik`) VALUES
(2, 'Programiranje', 'Upoznajte kompletan ciklus razvoja softvera i naučite da pišete programski kod u nekom od jezika : Java, C, C#, SQL, HTML/CSS, UML, JavaScript, Assembler.', 650, '../assets/images/oglasi/2.jpg', 2, 3, 4),
(7, 'Fizika casovi', 'Dajem časove fizike. Pripremam za prijemne ispite, radi upisa u srednje škole i fakultete', 600, '../assets/images/oglasi/fiz.jpg', 5, 6, 6),
(15, 'Engleski jezik', 'Dugogodišnje iskustvo u držanju privatnih časova engleskog svim uzrastima.	 Mogućnost pripreme za sve vrste testova, kontrolnih zadataka, popravljanje ocena ili kontinuiran rad\r\ntokom cele godine.', 500, '../assets/images/oglasi/eng.jpg', 3, 2, 4),
(18, 'Matematika', 'Dajem casove matematike za spremanje prijemnog ispita za tehnicke fakultete. ', 700, '../assets/images/oglasi/1.jpg', 1, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `omiljenioglas`
--

CREATE TABLE `omiljenioglas` (
  `idOmiljeniOglas` int(5) NOT NULL,
  `idOglas` int(5) NOT NULL,
  `idKorisnik` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `omiljenioglas`
--

INSERT INTO `omiljenioglas` (`idOmiljeniOglas`, `idOglas`, `idKorisnik`) VALUES
(4, 2, 2),
(14, 18, 6);

-- --------------------------------------------------------

--
-- Table structure for table `porukeadmin`
--

CREATE TABLE `porukeadmin` (
  `idPorukaAdmin` int(5) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `emailKorisnik` varchar(50) NOT NULL,
  `poruka` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `porukeadmin`
--

INSERT INTO `porukeadmin` (`idPorukaAdmin`, `ime`, `emailKorisnik`, `poruka`) VALUES
(2, 'Snezana', 'sneza123@gmail.com', 'Da li se objavljivanje oglasa naplaćuje?'),
(4, 'Marija', 'marija@gmail.com', 'Da li se registracija/prijavljivanje naplaćuje?');

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `idUloga` int(5) NOT NULL,
  `nazivUloga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`idUloga`, `nazivUloga`) VALUES
(1, 'admin'),
(2, 'korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grad`
--
ALTER TABLE `grad`
  ADD PRIMARY KEY (`idGrad`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`idKategorija`);

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`idKorisnik`),
  ADD KEY `idUloga` (`idUloga`);

--
-- Indexes for table `oglasi`
--
ALTER TABLE `oglasi`
  ADD PRIMARY KEY (`idOglasa`),
  ADD KEY `idKategorija` (`idKategorija`),
  ADD KEY `idGrad` (`idGrad`),
  ADD KEY `idKategorija_2` (`idKategorija`),
  ADD KEY `idKorisnik` (`idKorisnik`);

--
-- Indexes for table `omiljenioglas`
--
ALTER TABLE `omiljenioglas`
  ADD PRIMARY KEY (`idOmiljeniOglas`),
  ADD KEY `idOglas` (`idOglas`),
  ADD KEY `idKorisnik` (`idKorisnik`);

--
-- Indexes for table `porukeadmin`
--
ALTER TABLE `porukeadmin`
  ADD PRIMARY KEY (`idPorukaAdmin`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`idUloga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grad`
--
ALTER TABLE `grad`
  MODIFY `idGrad` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `idKategorija` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `idKorisnik` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `oglasi`
--
ALTER TABLE `oglasi`
  MODIFY `idOglasa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `omiljenioglas`
--
ALTER TABLE `omiljenioglas`
  MODIFY `idOmiljeniOglas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `porukeadmin`
--
ALTER TABLE `porukeadmin`
  MODIFY `idPorukaAdmin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `idUloga` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `oglasi`
--
ALTER TABLE `oglasi`
  ADD CONSTRAINT `oglasi_ibfk_1` FOREIGN KEY (`idGrad`) REFERENCES `grad` (`idGrad`),
  ADD CONSTRAINT `oglasi_ibfk_2` FOREIGN KEY (`idKategorija`) REFERENCES `kategorija` (`idKategorija`);

--
-- Constraints for table `omiljenioglas`
--
ALTER TABLE `omiljenioglas`
  ADD CONSTRAINT `omiljenioglas_ibfk_1` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnici` (`idKorisnik`),
  ADD CONSTRAINT `omiljenioglas_ibfk_2` FOREIGN KEY (`idOglas`) REFERENCES `oglasi` (`idOglasa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
