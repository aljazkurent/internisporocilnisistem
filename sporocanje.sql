-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 06. maj 2015 ob 12.39
-- Različica strežnika: 5.5.27
-- Različica PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `posiljatelj` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `vsebina` varchar(300) COLLATE utf8_slovenian_ci NOT NULL,
  `sporociloID` int(5) NOT NULL,
  `datum` datetime NOT NULL,
  `prebrano` tinyint(1) NOT NULL,
  `izbrisano` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Struktura tabele `predali`
--

CREATE TABLE IF NOT EXISTS `predali` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `uporabnikID` int(5) NOT NULL,
  PRIMARY KEY (`id`)
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `posiljatelj` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `prejemnik` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `zadeva` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `vsebina` varchar(1024) COLLATE utf8_slovenian_ci NOT NULL,
  `datum` datetime NOT NULL,
  `predal` int(10) NOT NULL,
  `prebrano` tinyint(1) NOT NULL DEFAULT '0',
  `izbrisano` tinyint(1) NOT NULL DEFAULT '0',
  `odgovor` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=28 ;

--
-- Odloži podatke za tabelo `sporocila`
--

INSERT INTO `sporocila` (`id`, `posiljatelj`, `prejemnik`, `zadeva`, `vsebina`, `datum`, `predal`, `prebrano`, `izbrisano`, `odgovor`) VALUES
(27, 'aljaz99@gmail.com', 'admin@admin.com', 'admin', 'adsdsa', '2015-05-06 12:37:50', 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabele `uporabniki`
--

CREATE TABLE IF NOT EXISTS `uporabniki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `geslo` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `ime` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `priimek` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=6 ;

--
-- Odloži podatke za tabelo `uporabniki`
--

INSERT INTO `uporabniki` (`id`, `email`, `geslo`, `ime`, `priimek`) VALUES
(1, 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', 'Admin'),
(2, 'aljaz99@gmail.com', 'a25b1c277fc170204c0ae9efa668eff2d3dc3544', 'Aljaz', 'Kurent');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
