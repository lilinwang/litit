-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 18, 2014 at 09:27 PM
-- Server version: 5.6.14
-- PHP Version: 5.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `litit_new`
--
CREATE DATABASE IF NOT EXISTS `litit_new` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `litit_new`;

-- --------------------------------------------------------

--
-- Table structure for table `collect`
--

DROP TABLE IF EXISTS `collect`;
CREATE TABLE IF NOT EXISTS `collect` (
  `collect_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  PRIMARY KEY (`collect_id`),
  KEY `user_id` (`user_id`),
  KEY `music_id` (`music_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

DROP TABLE IF EXISTS `follow`;
CREATE TABLE IF NOT EXISTS `follow` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `musician_id` int(11) NOT NULL,
  PRIMARY KEY (`follow_id`),
  KEY `user_id` (`user_id`),
  KEY `musician_id` (`musician_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

DROP TABLE IF EXISTS `music`;
CREATE TABLE IF NOT EXISTS `music` (
  `music_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `src` text NOT NULL,
  `story` text NOT NULL,
  `download_cnt` int(11) NOT NULL DEFAULT '0',
  `share_cnt` int(11) NOT NULL DEFAULT '0',
  `collect_cnt` int(11) NOT NULL DEFAULT '0',
  `view_cnt` int(11) NOT NULL DEFAULT '0',
  `randable` tinyint(4) NOT NULL,
  `musician_id` int(11) NOT NULL,
  `lyrics_by` varchar(50) DEFAULT NULL,
  `lyrics_src` text NOT NULL,
  `composed_by` varchar(50) DEFAULT NULL,
  `arranged_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`music_id`),
  KEY `musician_id` (`musician_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=154 ;

-- --------------------------------------------------------

--
-- Table structure for table `musician`
--

DROP TABLE IF EXISTS `musician`;
CREATE TABLE IF NOT EXISTS `musician` (
  `musician_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `real_name` text NOT NULL,
  `follower_cnt` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`musician_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

-- --------------------------------------------------------

--
-- Table structure for table `music_musician`
--

DROP TABLE IF EXISTS `music_musician`;
CREATE TABLE IF NOT EXISTS `music_musician` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `music_id` int(11) NOT NULL,
  `musician_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `musician_id` (`musician_id`),
  KEY `music_id` (`music_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;

-- --------------------------------------------------------

--
-- Table structure for table `play_song`
--

DROP TABLE IF EXISTS `play_song`;
CREATE TABLE IF NOT EXISTS `play_song` (
  `play_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`play_id`),
  KEY `user_id` (`user_id`),
  KEY `music_id` (`music_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `skip_song`
--

DROP TABLE IF EXISTS `skip_song`;
CREATE TABLE IF NOT EXISTS `skip_song` (
  `skip_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`skip_id`),
  KEY `user_id` (`user_id`),
  KEY `music_id` (`music_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

DROP TABLE IF EXISTS `upload`;
CREATE TABLE IF NOT EXISTS `upload` (
  `upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `musician_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  PRIMARY KEY (`upload_id`),
  KEY `musician_id` (`musician_id`),
  KEY `user_id` (`music_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` tinyint(4) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` text NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `birthday` date DEFAULT NULL,
  `avatar_src` text,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `introduction` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collect`
--
ALTER TABLE `collect`
  ADD CONSTRAINT `collect_ibfk_2` FOREIGN KEY (`music_id`) REFERENCES `music` (`music_id`),
  ADD CONSTRAINT `collect_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`musician_id`) REFERENCES `musician` (`musician_id`),
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `music`
--
ALTER TABLE `music`
  ADD CONSTRAINT `music_ibfk_2` FOREIGN KEY (`musician_id`) REFERENCES `musician` (`musician_id`);

--
-- Constraints for table `musician`
--
ALTER TABLE `musician`
  ADD CONSTRAINT `musician_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `music_musician`
--
ALTER TABLE `music_musician`
  ADD CONSTRAINT `music_musician_ibfk_2` FOREIGN KEY (`musician_id`) REFERENCES `musician` (`musician_id`),
  ADD CONSTRAINT `music_musician_ibfk_1` FOREIGN KEY (`music_id`) REFERENCES `music` (`music_id`);

--
-- Constraints for table `play_song`
--
ALTER TABLE `play_song`
  ADD CONSTRAINT `play_song_ibfk_2` FOREIGN KEY (`music_id`) REFERENCES `music` (`music_id`),
  ADD CONSTRAINT `play_song_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `skip_song`
--
ALTER TABLE `skip_song`
  ADD CONSTRAINT `skip_song_ibfk_2` FOREIGN KEY (`music_id`) REFERENCES `music` (`music_id`),
  ADD CONSTRAINT `skip_song_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `upload`
--
ALTER TABLE `upload`
  ADD CONSTRAINT `upload_ibfk_2` FOREIGN KEY (`music_id`) REFERENCES `music` (`music_id`),
  ADD CONSTRAINT `upload_ibfk_1` FOREIGN KEY (`musician_id`) REFERENCES `musician` (`musician_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
