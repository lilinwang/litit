-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 18, 2014 at 09:25 PM
-- Server version: 5.6.14
-- PHP Version: 5.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `litit`
--

-- --------------------------------------------------------

--
-- Table structure for table `music_musician`
--

CREATE TABLE IF NOT EXISTS `music_musician` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `music_id` int(11) NOT NULL,
  `musician_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `musician_id` (`musician_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `music_musician`
--

INSERT INTO `music_musician` (`id`, `music_id`, `musician_id`) VALUES
(33, 55, 22),
(34, 56, 22),
(35, 57, 22),
(36, 58, 22),
(37, 59, 22),
(38, 60, 22),
(39, 61, 22),
(40, 62, 22),
(41, 63, 22),
(42, 64, 22),
(43, 65, 23),
(44, 66, 23),
(45, 67, 23),
(47, 69, 24),
(48, 70, 24),
(49, 71, 25),
(50, 72, 25),
(54, 93, 26),
(55, 94, 26),
(56, 95, 26),
(58, 101, 27),
(59, 102, 27),
(60, 103, 27),
(61, 104, 27),
(62, 105, 27),
(66, 109, 28),
(67, 110, 28),
(68, 111, 28),
(72, 115, 34),
(73, 116, 34),
(74, 117, 34),
(77, 92, 25),
(78, 141, 25),
(80, 143, 26),
(81, 144, 26);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
