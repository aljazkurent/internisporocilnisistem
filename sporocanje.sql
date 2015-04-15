-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2015 at 06:45 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sporocanje`
--

-- --------------------------------------------------------

--
-- Table structure for table `predali`
--

CREATE TABLE IF NOT EXISTS `predali` (
`id` int(10) NOT NULL,
  `naziv` varchar(30) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sporocila`
--

CREATE TABLE IF NOT EXISTS `sporocila` (
`id` int(11) NOT NULL,
  `posiljatelj` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `prejemnik` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `zadeva` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `vsebina` varchar(1024) COLLATE utf8_slovenian_ci NOT NULL,
  `datum` datetime NOT NULL,
  `predal` int(10) NOT NULL,
  `prebrano` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sporocila`
--


-- --------------------------------------------------------

--
-- Table structure for table `uporabniki`
--

CREATE TABLE IF NOT EXISTS `uporabniki` (
`id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `geslo` varchar(255) COLLATE utf8_slovenian_ci NOT NULL,
  `ime` varchar(30) COLLATE utf8_slovenian_ci NOT NULL,
  `priimek` varchar(30) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `uporabniki`
--



--
-- Indexes for dumped tables
--

--
-- Indexes for table `predali`
--
ALTER TABLE `predali`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sporocila`
--
ALTER TABLE `sporocila`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uporabniki`
--
ALTER TABLE `uporabniki`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `predali`
--
ALTER TABLE `predali`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sporocila`
--
ALTER TABLE `sporocila`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `uporabniki`
--
ALTER TABLE `uporabniki`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
