-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 01. maj 2015 ob 14.52
-- Različica strežnika: 5.5.39
-- Različica PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Zbirka podatkov: `sporocanje`
--

-- --------------------------------------------------------

--
-- Struktura tabele `odgovori`
--

CREATE TABLE IF NOT EXISTS `odgovori` (
`id` int(5) NOT NULL,
  `posiljatelj` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `vsebina` varchar(300) COLLATE utf8_slovenian_ci NOT NULL,
  `sporociloID` int(5) NOT NULL,
  `datum` datetime NOT NULL,
  `prebrano` tinyint(1) NOT NULL,
  `izbrisano` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=10 ;

--
-- Odloži podatke za tabelo `odgovori`
--

INSERT INTO `odgovori` (`id`, `posiljatelj`, `vsebina`, `sporociloID`, `datum`, `prebrano`, `izbrisano`) VALUES
(8, 'admin@admin.com', 'Test2', 16, '2015-04-30 20:21:57', 0, 0),
(9, 'aljaz99@gmail.com', 'asddsa', 17, '2015-04-30 20:26:16', 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabele `predali`
--

CREATE TABLE IF NOT EXISTS `predali` (
`id` int(10) NOT NULL,
  `naziv` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `uporabnikID` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=2 ;

--
-- Odloži podatke za tabelo `predali`
--

INSERT INTO `predali` (`id`, `naziv`, `uporabnikID`) VALUES
(1, 'sluzba', 2);

-- --------------------------------------------------------

--
-- Struktura tabele `sporocila`
--

CREATE TABLE IF NOT EXISTS `sporocila` (
`id` int(11) NOT NULL,
  `posiljatelj` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `prejemnik` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `zadeva` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `vsebina` varchar(1024) COLLATE utf8_slovenian_ci NOT NULL,
  `datum` datetime NOT NULL,
  `predal` int(10) NOT NULL,
  `prebrano` tinyint(1) NOT NULL DEFAULT '0',
  `izbrisano` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=18 ;

--
-- Odloži podatke za tabelo `sporocila`
--

INSERT INTO `sporocila` (`id`, `posiljatelj`, `prejemnik`, `zadeva`, `vsebina`, `datum`, `predal`, `prebrano`, `izbrisano`) VALUES
(16, 'aljaz99@gmail.com', 'admin@admin.com', 'Test', 'Test', '2015-04-30 20:21:41', 0, 1, 0),
(17, 'admin@admin.com', 'aljaz99@gmail.com', 'asd', 'asd', '2015-04-30 20:26:01', 0, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabele `uporabniki`
--

CREATE TABLE IF NOT EXISTS `uporabniki` (
`id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `geslo` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `ime` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `priimek` varchar(30) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=3 ;

--
-- Odloži podatke za tabelo `uporabniki`
--

INSERT INTO `uporabniki` (`id`, `email`, `geslo`, `ime`, `priimek`) VALUES
(1, 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', 'Admin'),
(2, 'aljaz99@gmail.com', 'a25b1c277fc170204c0ae9efa668eff2d3dc3544', 'Aljaz', 'Kurent');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `odgovori`
--
ALTER TABLE `odgovori`
 ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `predali`
--
ALTER TABLE `predali`
 ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `sporocila`
--
ALTER TABLE `sporocila`
 ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `uporabniki`
--
ALTER TABLE `uporabniki`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `odgovori`
--
ALTER TABLE `odgovori`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT tabele `predali`
--
ALTER TABLE `predali`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT tabele `sporocila`
--
ALTER TABLE `sporocila`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT tabele `uporabniki`
--
ALTER TABLE `uporabniki`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
