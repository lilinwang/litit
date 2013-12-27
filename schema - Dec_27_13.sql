-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 27, 2013 at 03:00 PM
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
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `balance` int(50) NOT NULL DEFAULT '0',
  `total` int(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `password` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `album_id` int(11) NOT NULL AUTO_INCREMENT,
  `albumname` varchar(255) NOT NULL,
  `musician_id` int(11) DEFAULT NULL,
  `releasedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`album_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `collect`
--

CREATE TABLE IF NOT EXISTS `collect` (
  `collect_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  PRIMARY KEY (`collect_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=74 ;

-- --------------------------------------------------------

--
-- Table structure for table `collectm`
--

CREATE TABLE IF NOT EXISTS `collectm` (
  `collect_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `music_id` int(50) DEFAULT NULL,
  PRIMARY KEY (`collect_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=99 ;

-- --------------------------------------------------------

--
-- Table structure for table `copyright`
--

CREATE TABLE IF NOT EXISTS `copyright` (
  `copyright_id` int(50) NOT NULL AUTO_INCREMENT,
  `musician_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  `music_name` text,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `identity` int(18) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `content` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_image` text,
  `musician_image` text,
  `copyright_message` text,
  `last_read_time` varchar(20) NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`copyright_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `copyrightm`
--

CREATE TABLE IF NOT EXISTS `copyrightm` (
  `id` int(50) NOT NULL DEFAULT '0',
  `musician_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `identity` int(18) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `content` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_read_time` varchar(20) NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `deal`
--

CREATE TABLE IF NOT EXISTS `deal` (
  `deal_id` int(50) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price` double(8,2) unsigned NOT NULL DEFAULT '0.00',
  `count` int(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`deal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `download_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  PRIMARY KEY (`download_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `downloadm`
--

CREATE TABLE IF NOT EXISTS `downloadm` (
  `download_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `music_id` int(50) DEFAULT NULL,
  PRIMARY KEY (`download_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `musician_id` int(11) NOT NULL,
  PRIMARY KEY (`follow_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `followm`
--

CREATE TABLE IF NOT EXISTS `followm` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `musician_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`follow_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=102 ;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `genre_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE IF NOT EXISTS `music` (
  `music_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `dir` text NOT NULL,
  `story` text NOT NULL,
  `download_cnt` int(11) NOT NULL,
  `share_cnt` int(11) NOT NULL,
  `collect_cnt` int(11) NOT NULL,
  `view_cnt` int(11) NOT NULL,
  `randable` int(11) NOT NULL,
  `musician_id` int(11) NOT NULL,
  `image_dir` text NOT NULL,
  `album_dir` text NOT NULL,
  `lyrics_by` varchar(20) DEFAULT NULL,
  `composed_by` varchar(20) DEFAULT NULL,
  `arranged_by` varchar(20) DEFAULT NULL,
  `disc_company` varchar(40) DEFAULT NULL,
  `perform_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `genre` varchar(40) DEFAULT NULL,
  `custom_tag` varchar(40) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`music_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

-- --------------------------------------------------------

--
-- Table structure for table `musician`
--

CREATE TABLE IF NOT EXISTS `musician` (
  `musician_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `nickname` text,
  `name` text NOT NULL,
  `gender` int(11) DEFAULT NULL,
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  `identity` varchar(18) NOT NULL,
  `introduction` text NOT NULL,
  `attention` int(11) NOT NULL DEFAULT '0',
  `portaitdir` text,
  `certificate` tinyint(1) NOT NULL,
  `famousfor` int(11) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `organization` int(11) DEFAULT NULL,
  PRIMARY KEY (`musician_id`),
  UNIQUE KEY `identity` (`identity`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Table structure for table `music_genre`
--

CREATE TABLE IF NOT EXISTS `music_genre` (
  `music_genre_id` int(11) NOT NULL AUTO_INCREMENT,
  `music_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  PRIMARY KEY (`music_genre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Table structure for table `music_tag`
--

CREATE TABLE IF NOT EXISTS `music_tag` (
  `music_tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `music_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`music_tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `introduction` varchar(255) NOT NULL,
  `location` varchar(40) NOT NULL,
  `attention` int(11) NOT NULL,
  `portaitdir` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `play_song`
--

CREATE TABLE IF NOT EXISTS `play_song` (
  `play_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`play_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Table structure for table `private_letter`
--

CREATE TABLE IF NOT EXISTS `private_letter` (
  `letter_id` int(14) NOT NULL AUTO_INCREMENT,
  `musician_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `name` text NOT NULL,
  `letter` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_read_time` text,
  `user_image` text,
  `musician_image` text,
  `apply_from` int(1) DEFAULT NULL,
  PRIMARY KEY (`letter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `private_letterm`
--

CREATE TABLE IF NOT EXISTS `private_letterm` (
  `letter_id` int(14) NOT NULL AUTO_INCREMENT,
  `musician_id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `name` text NOT NULL,
  `letter` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_read_time` text,
  `user_image` text,
  `musician_image` text,
  `applay_from` int(1) DEFAULT NULL,
  PRIMARY KEY (`letter_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `skip_song`
--

CREATE TABLE IF NOT EXISTS `skip_song` (
  `skip_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`skip_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `musician_id` int(11) NOT NULL,
  `count` int(50) NOT NULL DEFAULT '0',
  `code` int(11) DEFAULT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stockholder`
--

CREATE TABLE IF NOT EXISTS `stockholder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `count` int(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stockprice_5min`
--

CREATE TABLE IF NOT EXISTS `stockprice_5min` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price` double(8,2) unsigned NOT NULL DEFAULT '0.00',
  `count` int(50) NOT NULL DEFAULT '0',
  `total` int(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stockprice_day`
--

CREATE TABLE IF NOT EXISTS `stockprice_day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `highest` double(8,2) unsigned NOT NULL DEFAULT '0.00',
  `lowest` double(8,2) unsigned NOT NULL DEFAULT '0.00',
  `open` double(8,2) unsigned NOT NULL DEFAULT '0.00',
  `close` double(8,2) unsigned NOT NULL DEFAULT '0.00',
  `count` int(50) NOT NULL DEFAULT '0',
  `total` int(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stockprice_month`
--

CREATE TABLE IF NOT EXISTS `stockprice_month` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stock_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `highest` double(8,2) unsigned NOT NULL DEFAULT '0.00',
  `lowest` double(8,2) unsigned NOT NULL DEFAULT '0.00',
  `open` double(8,2) unsigned NOT NULL DEFAULT '0.00',
  `close` double(8,2) unsigned NOT NULL DEFAULT '0.00',
  `count` int(50) NOT NULL DEFAULT '0',
  `total` int(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `musician_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  PRIMARY KEY (`upload_id`),
  KEY `user_id` (`music_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` text,
  `nickname` text,
  `gender` int(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `port_dir` text,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `introduction` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Table structure for table `word`
--

CREATE TABLE IF NOT EXISTS `word` (
  `word_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `word` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`word_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

-- --------------------------------------------------------

--
-- Table structure for table `wordindex`
--

CREATE TABLE IF NOT EXISTS `wordindex` (
  `index_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `word_id` bigint(20) NOT NULL,
  `music_id` bigint(20) NOT NULL,
  `location` int(11) NOT NULL,
  PRIMARY KEY (`index_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=454 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
