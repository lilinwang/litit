-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 10 月 15 日 13:25
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `litit`
--
CREATE DATABASE IF NOT EXISTS `litit` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `litit`;

-- --------------------------------------------------------

--
-- 表的结构 `account`
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
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `password` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `album`
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
-- 表的结构 `collect`
--

CREATE TABLE IF NOT EXISTS `collect` (
  `collect_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  PRIMARY KEY (`collect_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- 转存表中的数据 `collect`
--

INSERT INTO `collect` (`collect_id`, `user_id`, `music_id`) VALUES
(1, 1, 1),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 8),
(15, 1, 2),
(16, 13, 1),
(17, 13, 2),
(18, 13, 3),
(19, 13, 4),
(20, 13, 5),
(21, 13, 6),
(22, 13, 7),
(23, 13, 8),
(24, 13, 9),
(25, 13, 10),
(26, 13, 11),
(27, 13, 12),
(28, 13, 13),
(29, 13, 14),
(30, 13, 15),
(31, 13, 16),
(32, 13, 17),
(34, 13, 19),
(35, 13, 20),
(36, 13, 21),
(37, 13, 22),
(38, 13, 23),
(39, 13, 24),
(40, 13, 26),
(41, 14, 1),
(42, 14, 2),
(43, 14, 3),
(44, 14, 4),
(45, 14, 5),
(47, 14, 7),
(48, 14, 8),
(49, 14, 9),
(50, 14, 10),
(51, 14, 11),
(52, 14, 12),
(53, 14, 13),
(54, 14, 14),
(55, 14, 15),
(56, 14, 16),
(57, 14, 17),
(59, 14, 19),
(61, 14, 21),
(63, 14, 23),
(65, 14, 29),
(66, 14, 26),
(67, 14, 27),
(68, 14, 28),
(69, 14, 30),
(70, 14, 22),
(71, 14, 6);

-- --------------------------------------------------------

--
-- 表的结构 `collectm`
--

CREATE TABLE IF NOT EXISTS `collectm` (
  `collect_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `music_id` int(50) DEFAULT NULL,
  PRIMARY KEY (`collect_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- 转存表中的数据 `collectm`
--

INSERT INTO `collectm` (`collect_id`, `user_id`, `music_id`) VALUES
(2, 1, 7),
(3, 9, 2),
(4, 9, 29),
(5, 9, 5),
(6, 9, 1),
(7, 9, 2),
(8, 9, 3),
(9, 9, 4),
(10, 9, 5),
(11, 9, 6),
(12, 9, 8),
(13, 9, 9),
(14, 9, 10),
(15, 9, 14),
(16, 9, 15),
(17, 9, 16),
(18, 9, 17),
(20, 9, 19),
(22, 9, 11),
(23, 9, 12),
(24, 9, 13),
(25, 9, 21),
(26, 9, 22),
(27, 9, 23),
(28, 9, 26),
(29, 9, 27),
(30, 9, 28),
(31, 9, 30),
(32, 12, 1),
(33, 12, 2),
(34, 12, 3),
(35, 12, 4),
(36, 12, 5),
(37, 12, 6),
(39, 12, 8),
(40, 12, 9),
(41, 12, 10),
(42, 12, 11),
(43, 12, 12),
(44, 12, 13),
(45, 12, 14),
(46, 12, 15),
(47, 12, 16),
(48, 12, 17),
(49, 12, 19),
(51, 12, 21),
(52, 12, 22),
(53, 12, 23),
(54, 12, 26),
(55, 12, 27),
(56, 12, 28),
(57, 12, 29),
(58, 12, 30);

-- --------------------------------------------------------

--
-- 表的结构 `copyright`
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
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_image` text,
  `musician_image` text,
  `copyright_message` text,
  PRIMARY KEY (`copyright_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `copyright`
--

INSERT INTO `copyright` (`copyright_id`, `musician_id`, `user_id`, `music_id`, `music_name`, `name`, `company`, `identity`, `phone`, `email`, `content`, `created`, `user_image`, `musician_image`, `copyright_message`) VALUES
(1, 1, 1, 8, NULL, '王莉淋', 'sjtu', 2147483647, '18888888888', 'lilin77hp@163.com', 'hello', '2013-08-14 14:07:27', NULL, NULL, NULL),
(2, 1, 14, 1, NULL, 'marry', 'litit', 2147483647, '18929280201', 'marry@sina.com', '广告和微电影', '2013-10-11 10:34:01', NULL, NULL, NULL),
(3, 0, 14, 15, NULL, 'mm', 'mm', 2147483647, '18329485693', 'mm@sina.com', 'weidian', '2013-10-11 10:43:23', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `copyrightm`
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
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `deal`
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
-- 表的结构 `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `download_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  PRIMARY KEY (`download_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `download`
--

INSERT INTO `download` (`download_id`, `user_id`, `music_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- 表的结构 `downloadm`
--

CREATE TABLE IF NOT EXISTS `downloadm` (
  `download_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `music_id` int(50) DEFAULT NULL,
  PRIMARY KEY (`download_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `musician_id` int(11) NOT NULL,
  PRIMARY KEY (`follow_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `follow`
--

INSERT INTO `follow` (`follow_id`, `user_id`, `musician_id`) VALUES
(3, 13, 1),
(5, 14, 0);

-- --------------------------------------------------------

--
-- 表的结构 `followm`
--

CREATE TABLE IF NOT EXISTS `followm` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `musician_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`follow_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `followm`
--

INSERT INTO `followm` (`follow_id`, `user_id`, `musician_id`) VALUES
(4, 7, 1),
(6, 9, 1);

-- --------------------------------------------------------

--
-- 表的结构 `music`
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
  PRIMARY KEY (`music_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `music`
--

INSERT INTO `music` (`music_id`, `name`, `dir`, `story`, `download_cnt`, `share_cnt`, `collect_cnt`, `view_cnt`, `randable`, `musician_id`, `image_dir`, `album_dir`) VALUES
(1, 'Keep Holding on', 'upload/music/user_1/summer.mp3', '6002', 1, 1, 3, 1, 1, 1, 'upload/image/user_1/music1.jpg', 'upload/image/user_1/1.png'),
(2, '艾薇儿', 'upload/music/user_1/The_Rain.mp3', '在16岁时， 爱丽斯塔唱片（Arista Records）的艺术家与曲目(A&R)代表Ken Krongard与她签约。Ken Krongard把艾薇儿带到纽约市的一个录音室录音，并邀请了他的老板，爱丽斯塔高层之一AntonioL.A.Reid，去听她的演唱。这张专辑在不到六个月的时间里获得了RIAA（唱片工业协会）的四次白金认证，到2004年十二月时已在全球销售了一千五百万张。', 6002, 6002, 6004, 646002, 1, 1, 'upload/image/user_1/music2.jpg', 'upload/image/user_1/2.png'),
(3, 'rainy blue', 'upload/music/user_1/[naicha]20130403_Tokyo_Dome_Rainy_Blue.mp3', 'tokyo dome', 0, 0, 1, 0, 1, 1, 'upload/image/user_1/music3.jpg', 'upload/image/user_1/music3.jpg'),
(4, 'Friend', 'upload/music/user_1/130402__Friend.mp3', 'friend by jyj', 0, 0, 0, 0, 1, 1, 'upload/image/user_1/music4.jpg', 'upload/image/user_1/music4.jpg'),
(5, '最爱', 'upload/music/user_1/130404_TD_朴有天_-_最愛.mp3', '130404 TD 朴有天 - 最愛', 0, 0, 1, 0, 1, 1, 'upload/image/user_1/music5.jpg', 'upload/image/user_1/music5.jpg'),
(6, '漫步春天', 'upload/music/user_1/20130404_JYJ東京ドームコンサート_yc_春天漫步.mp3', '20130404 JYJ東京ドームコンサート yc 春天漫步.mp3', 0, 0, 0, 0, 1, 1, 'upload/image/user_1/music6.jpg', 'upload/image/user_1/music6.jpg'),
(7, 'family', 'upload/music/user_1/family.mp3', 'family', 0, 0, 0, 0, 1, 1, 'upload/image/user_1/music7.jpg', 'upload/image/user_1/music7.jpg'),
(8, '陈慧娴 - 千千阙歌', 'upload/music/user_1/陈慧娴_-_千千阙歌.mp3', '陈慧娴 - 千千阙歌', 0, 0, 0, 0, 1, 1, 'upload/image/user_1/music8.jpg', 'upload/image/user_1/music8.jpg'),
(9, '实习医生格蕾 - Chasing Cars', 'upload/music/user_1/实习医生格蕾_-_Chasing_Cars.mp3', '实习医生格蕾 - Chasing Cars', 0, 0, 0, 0, 0, 1, 'upload/image/user_1/music9.jpg', 'upload/image/user_1/music9.jpg'),
(10, '实习医生格蕾 - Falling or Flying', 'upload/music/user_1/实习医生格蕾_-_Falling_or_Flying.mp3', '实习医生格蕾 - Falling or Flying', 0, 0, 2, 0, 1, 1, 'upload/image/user_1/music10.jpg', 'upload/image/user_1/music10.jpg'),
(11, '实习医生格蕾 - Keep Breathing', 'upload/music/user_1/实习医生格蕾_-_Keep_Breathing.mp3', '实习医生格蕾 - Keep Breathing', 0, 0, 0, 0, 1, 1, 'upload/image/user_1/music11.jpg', 'upload/image/user_1/music11.jpg'),
(12, '实习医生格蕾 - Miss Halfway', 'upload/music/user_1/实习医生格蕾_-_Miss_Halfway.mp3', '', 0, 0, 0, 0, 1, 1, 'upload/image/user_1/music12.jpg', 'upload/image/user_1/music12.jpg'),
(13, '98°-Still.mp3', 'upload/music/user_0/music_13.mp3', '暂无故事。', 0, 0, 0, 0, 0, 0, 'upload/image/user_0/image_13.jpg', 'upload/image/user_0/image_13.jpg'),
(14, 'M.C The Max-充满眼泪的你韩国.mp3', 'upload/music/user_0/music_14.mp3', '暂无故事。', 0, 0, 0, 0, 0, 0, 'upload/image/user_0/image_14.jpg', 'upload/image/user_0/image_14.jpg'),
(15, 'In Heaven.mp3', 'upload/music/user_0/music_15.mp3', '暂无故事。', 0, 0, 0, 0, 0, 0, 'upload/image/user_0/image_15.jpg', 'upload/image/user_0/image_15.jpg'),
(16, 'Where is the love.mp3', 'upload/music/user_0/music_16.mp3', '暂无故事。', 0, 0, 0, 0, 0, 0, 'upload/image/user_0/image_16.jpg', 'upload/image/user_0/image_16.jpg'),
(17, '曲婉婷 - 我的歌声里.mp3', 'upload/music/user_0/music_17.mp3', '暂无故事。', 0, 0, 0, 0, 0, 0, 'upload/image/user_0/image_17.jpg', 'upload/image/user_0/image_17.jpg'),
(19, 'maid with the flaxen hair.mp3', 'upload/music/user_0/music_19.mp3', '暂无故事。', 0, 0, 0, 0, 0, 0, 'upload/image/user_0/image_19.jpg', 'upload/image/user_0/image_19.jpg'),
(21, 'Sleep Away.mp3', 'upload/music/user_0/music_21.mp3', '暂无故事。', 0, 0, 0, 0, 0, 0, 'upload/image/user_0/image_21.jpg', 'upload/image/user_0/image_21.jpg'),
(22, 'Kalimba.mp3', 'upload/music/user_0/music_22.mp3', '暂无故事。', 0, 0, 0, 0, 0, 0, 'upload/image/user_0/image_22.jpg', 'upload/image/user_0/image_22.jpg'),
(23, '6년동안 - 星.mp3', 'upload/music/user_0/music_23.mp3', '暂无故事。', 0, 0, 0, 0, 0, 0, 'upload/image/user_0/image_23.jpg', 'upload/image/user_0/image_23.jpg'),
(26, 'Davy Jones.mp3', 'upload/music/user_0/music_26.mp3', '暂无故事。', 0, 0, 0, 0, 0, 0, 'upload/image/user_0/image_26.jpg', 'upload/image/user_0/image_26.jpg'),
(27, 'Shadow Of The Day - Linkin Park.mp3', 'upload/music/user_0/music_27.mp3', '暂无故事。', 0, 0, 0, 0, 0, 0, 'upload/image/user_0/image_27.jpg', 'upload/image/user_0/image_27.jpg'),
(28, 'maid with the flaxen hair.mp3', 'upload/music/user_0/music_19.mp3', '暂无故事。', 0, 0, 0, 0, 0, 0, 'upload/image/user_0/image_19.jpg', 'upload/image/user_0/image_19.jpg'),
(29, 'np2007-09-17t20.mp3', 'upload/music/user_9/music_29.mp3', '暂无故事。', 0, 0, 0, 0, 0, 9, 'upload/image/user_9/image_29.jpg', 'upload/image/user_9/image_29.jpg'),
(30, 'Kalimba.mp3', 'upload/music/user_9/music_30.mp3', '暂无故事。', 0, 0, 1, 0, 0, 9, 'upload/image/user_9/image_30.jpg', 'upload/image/user_9/image_30.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `musician`
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
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`musician_id`),
  UNIQUE KEY `identity` (`identity`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `musician`
--

INSERT INTO `musician` (`musician_id`, `email`, `password`, `nickname`, `name`, `gender`, `birthday`, `identity`, `introduction`, `attention`, `portaitdir`, `certificate`, `famousfor`, `reg_time`) VALUES
(0, '000@163.com', '70352f41061eda4ff3c322094af068ba70c3b38b', '000', '000', NULL, '0000-00-00', '510999196502040064', 'Hi .艾薇儿•拉维尼（Avril Lavigne）是一名来自加拿大的著名唱作女歌手、摇滚小天后及演员，在全球多个国家享誉盛名，亦是21世纪以来全球销量最高的歌手之一。2002年以一首《Skater Boy》成名。其后的专辑《Let go》与《The Best Damn Thing》在数个国家的音乐排行榜上达到最前列。2006年入选《加拿大商业杂志》在好莱坞最有影响力的加拿大人（排行第17位）。2010年担任温哥华冬奥会闭幕式嘉宾，同年为迪士尼电影《爱丽丝梦游仙境》献唱主题曲《Alice》。Avril对音乐、时尚、个性以及性感的定义被年轻人所普遍接受和模仿，是乐坛的领军人物，其积极向上，充满乐观的精神一直被大家所支持的。', 1, 'upload/image/user_0/musician.jpg', 1, 12, '2013-10-09 07:34:49'),
(1, '6002@6002.com', '22bda971c53fb0c6d439d60f27a8cde82130480f', '6002', '6002', 1, '1986-06-04', '123456789012345677', '艾薇儿•拉维尼（Avril Lavigne）是一名来自加拿大的著名唱作女歌手、摇滚小天后及演员，在全球多个国家享誉盛名，亦是21世纪以来全球销量最高的歌手之一。2002年以一首《Skater Boy》成名。其后的专辑《Let go》与《The Best Damn Thing》在数个国家的音乐排行榜上达到最前列。2006年入选《加拿大商业杂志》在好莱坞最有影响力的加拿大人（排行第17位）。2010年担任温哥华冬奥会闭幕式嘉宾，同年为迪士尼电影《爱丽丝梦游仙境》献唱主题曲《Alice》。Avril对音乐、时尚、个性以及性感的定义被年轻人所普遍接受和模仿，是乐坛的领军人物，其积极向上，充满乐观的精神一直被大家所支持的。\r\n', 135, 'upload/image/user_1/musician.jpg', 1, 3, '2013-10-13 16:42:17'),
(2, '123@123.com', '60026002', '60026002', '60026002', 1, '1986-06-04', '510921199208310043', 'KeepTheFaith', 0, '0', 0, 0, '2013-08-21 14:15:09'),
(3, '6002@163.com', '22bda971c53fb0c6d439d60f27a8cde82130480f', 'ParkYuchun', 'ParkYuchun', 1, '0000-00-00', '510921198606046002', 'I''mMrPark', 0, '0', 0, 0, '2013-08-21 14:15:09'),
(4, '6002@60.com', '22bda971c53fb0c6d439d60f27a8cde82130480f', '', '', 1, '0000-00-00', '', '', 0, '0', 0, 0, '2013-08-21 14:15:09'),
(5, '6002@60022.com', '22bda971c53fb0c6d439d60f27a8cde82130480f', '', 'www', 0, '0000-00-00', '510921199208310042', 'asd', 0, '0', 0, 0, '2013-08-21 14:15:09'),
(9, 'mi@mi.com', 'a2cf9340fde23f152a5b074fc47d95113470a4de', 'micky6', 'micky', 1, '2013-08-07', '510921198606046003', '艾薇儿•拉维尼（Avril Lavigne）是一名来自加拿大的著名唱作女歌手、摇滚小天后及演员，在全球多个国家享誉盛名，亦是21世纪以来全球销量最高的歌手之一。2002年以一首《Skater Boy》成名。其后的专辑《Let go》与《The Best Damn Thing》在数个国家的音乐排行榜上达到最前列。2006年入选《加拿大商业杂志》在好莱坞最有影响力的加拿大人（排行第17位）。2010年担任温哥华冬奥会闭幕式嘉宾，同年为迪士尼电影《爱丽丝梦游仙境》献唱主题曲《Alice》。Avril对音乐、时尚、个性以及性感的定义被年轻人所普遍接受和模仿，是乐坛的领军人物，其积极向上，充满乐观的精神一直被大家所支持的。', 0, '0', 0, 0, '2013-09-26 15:35:48'),
(12, '6002@sina.com', 'd12d8132f9081ed5cbae4fde7f19255aeb403a4e', 'lilian', 'lilian', 0, '2009-09-26', '510921199209260042', '艾薇儿•拉维尼（Avril Lavigne）是一名来自加拿大的著名唱作女歌手、摇滚小天后及演员，在全球多个国家享誉盛名，亦是21世纪以来全球销量最高的歌手之一。2002年以一首《Skater Boy》成名。其后的专辑《Let go》与《The Best Damn Thing》在数个国家的音乐排行榜上达到最前列。2006年入选《加拿大商业杂志》在好莱坞最有影响力的加拿大人（排行第17位）。2010年担任温哥华冬奥会闭幕式嘉宾，同年为迪士尼电影《爱丽丝梦游仙境》献唱主题曲《Alice》。Avril对音乐、时尚、个性以及性感的定义被年轻人所普遍接受和模仿，是乐坛的领军人物，其积极向上，充满乐观的精神一直被大家所支持的。', 0, '0', 0, 0, '2013-10-15 13:22:05');

-- --------------------------------------------------------

--
-- 表的结构 `music_musician`
--

CREATE TABLE IF NOT EXISTS `music_musician` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `music_id` int(11) NOT NULL,
  `musician_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `musician_id` (`musician_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `music_musician`
--

INSERT INTO `music_musician` (`id`, `music_id`, `musician_id`) VALUES
(14, 1, 1),
(15, 2, 1),
(16, 3, 1),
(17, 4, 1),
(18, 5, 1),
(19, 6, 1),
(20, 7, 1),
(21, 8, 1),
(22, 9, 1),
(23, 10, 1),
(24, 11, 1),
(25, 12, 1),
(26, 13, 1);

-- --------------------------------------------------------

--
-- 表的结构 `music_tag`
--

CREATE TABLE IF NOT EXISTS `music_tag` (
  `music_tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `music_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`music_tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `music_tag`
--

INSERT INTO `music_tag` (`music_tag_id`, `music_id`, `tag_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- 表的结构 `stock`
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
-- 表的结构 `stockholder`
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
-- 表的结构 `stockprice_5min`
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
-- 表的结构 `stockprice_day`
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
-- 表的结构 `stockprice_month`
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
-- 表的结构 `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `tag`
--

INSERT INTO `tag` (`tag_id`, `name`) VALUES
(1, '重金属'),
(2, '摇滚');

-- --------------------------------------------------------

--
-- 表的结构 `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `musician_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  PRIMARY KEY (`upload_id`),
  KEY `user_id` (`music_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `upload`
--

INSERT INTO `upload` (`upload_id`, `musician_id`, `music_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12);

-- --------------------------------------------------------

--
-- 表的结构 `user`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `name`, `nickname`, `gender`, `birthday`, `port_dir`, `reg_time`, `introduction`) VALUES
(1, '', '', '6002', NULL, NULL, NULL, NULL, '2013-09-09 12:48:49', ''),
(2, '123@123.com', '22bda971c53fb0c6d439d60f27a8cde82130480f', '6002', '60026002', 1, '1986-06-04', '', '2013-09-09 12:48:49', ''),
(3, '123123@123123.com', '123123', '6002', '60026002', 1, '0000-00-00', '', '2013-09-09 12:48:49', ''),
(4, '12@12.com', '60026002', '6002', '', 1, '0000-00-00', '', '2013-09-09 12:48:49', ''),
(5, '6002@123.com', '60026002', '6002', '', 1, '0000-00-00', '', '2013-09-09 12:48:49', ''),
(6, '6002@123.com', '22bda971c53fb0c6d439d60f27a8cde82130480f', '6002', '', 1, '0000-00-00', '', '2013-09-09 12:48:49', ''),
(7, '6002@60023.com', '7c222fb2927d828af22f592134e8932480637c0d', '6002', '', 1, '0000-00-00', '', '2013-09-09 12:48:49', ''),
(8, 'micky@micky.com', 'a2cf9340fde23f152a5b074fc47d95113470a4de', '6002', '', 1, '0000-00-00', NULL, '2013-09-09 12:48:49', ''),
(9, '600@600.com', 'dbdd52e99fad51cdbe2b032bd3e1cd81717ddd3a', '6002', '', 1, '0000-00-00', NULL, '2013-09-09 12:48:49', ''),
(10, '600@6002.com', 'dbdd52e99fad51cdbe2b032bd3e1cd81717ddd3a', '6002', '', 1, '0000-00-00', NULL, '2013-09-09 12:48:49', ''),
(11, 'lilian@163.com', '825da8c64e36f0720c34fbf9f1e3556e2e115d47', '6002', '', 1, '0000-00-00', NULL, '2013-09-09 12:48:49', ''),
(13, '6002@6002.com', '1970e99e5cd3f9eaf1e05ed2bd61f693fbc6d5a9', '6002', 'hi', 1, '2013-09-03', NULL, '2013-09-09 12:48:49', 'park yuchun'),
(14, '6002@sina.com', 'c2182df574c0ec2c1173ce9d5157ec5cd72ba94e', '', '', 1, '0000-00-00', NULL, '2013-09-09 04:50:08', ''),
(15, '602@6002.com', '743772f41dab9aec40c3d276a8cd1a186a66d863', '', '', 1, '0000-00-00', NULL, '2013-09-20 21:43:43', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
