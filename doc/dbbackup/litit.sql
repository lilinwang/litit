-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 07 月 13 日 07:44
-- 服务器版本: 5.0.45
-- PHP 版本: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `litit`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL auto_increment,
  `email` text NOT NULL,
  `password` int(11) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `admin`
--


-- --------------------------------------------------------

--
-- 表的结构 `collect`
--

CREATE TABLE `collect` (
  `collect_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  PRIMARY KEY  (`collect_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- 导出表中的数据 `collect`
--

INSERT INTO `collect` (`collect_id`, `user_id`, `music_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- 表的结构 `download`
--

CREATE TABLE `download` (
  `download_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  PRIMARY KEY  (`download_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 导出表中的数据 `download`
--

INSERT INTO `download` (`download_id`, `user_id`, `music_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- 表的结构 `follow`
--

CREATE TABLE `follow` (
  `follow_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `musician_id` int(11) NOT NULL,
  PRIMARY KEY  (`follow_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `follow`
--


-- --------------------------------------------------------

--
-- 表的结构 `music`
--

CREATE TABLE `music` (
  `music_id` int(11) NOT NULL auto_increment,
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
  PRIMARY KEY  (`music_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 导出表中的数据 `music`
--

INSERT INTO `music` (`music_id`, `name`, `dir`, `story`, `download_cnt`, `share_cnt`, `collect_cnt`, `view_cnt`, `randable`, `musician_id`, `image_dir`, `album_dir`) VALUES
(1, 'Keep Holding on', 'upload/music/user_1/summer.mp3', '6002', 1, 1, 3, 1, 1, 1, 'upload/image/user_1/music1.jpg', 'upload/image/user_1/1.png'),
(2, '艾薇儿', 'upload/music/user_1/The_Rain.mp3', '在16岁时， 爱丽斯塔唱片（Arista Records）的艺术家与曲目(A&R)代表Ken Krongard与她签约。Ken Krongard把艾薇儿带到纽约市的一个录音室录音，并邀请了他的老板，爱丽斯塔高层之一AntonioL.A.Reid，去听她的演唱。这张专辑在不到六个月的时间里获得了RIAA（唱片工业协会）的四次白金认证，到2004年十二月时已在全球销售了一千五百万张。', 6002, 6002, 6002, 646002, 1, 1, 'upload/image/user_1/music2.jpg', 'upload/image/user_1/2.png');

-- --------------------------------------------------------

--
-- 表的结构 `musician`
--

CREATE TABLE `musician` (
  `musician_id` int(11) NOT NULL auto_increment,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `nickname` text NOT NULL,
  `name` text NOT NULL,
  `gender` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `identity` varchar(18) NOT NULL,
  `introduction` text NOT NULL,
  `attention` int(11) NOT NULL,
  `portaitdir` text NOT NULL,
  `certificate` tinyint(1) NOT NULL,
  PRIMARY KEY  (`musician_id`),
  UNIQUE KEY `identity` (`identity`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 导出表中的数据 `musician`
--

INSERT INTO `musician` (`musician_id`, `email`, `password`, `nickname`, `name`, `gender`, `birthday`, `identity`, `introduction`, `attention`, `portaitdir`, `certificate`) VALUES
(1, '6002@6002.com', '60026002', '60026002', '60026002', 1, '2013-06-13', '1234567890', '60026002', 123, 'upload/image/user_1/musician.jpg', 1),
(2, '123@123.com', '60026002', '60026002', '60026002', 1, '1986-06-04', '510921199208310043', 'KeepTheFaith', 0, '0', 0);

-- --------------------------------------------------------

--
-- 表的结构 `music_tag`
--

CREATE TABLE `music_tag` (
  `music_tag_id` int(11) NOT NULL auto_increment,
  `music_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY  (`music_tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 导出表中的数据 `music_tag`
--

INSERT INTO `music_tag` (`music_tag_id`, `music_id`, `tag_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- 表的结构 `tag`
--

CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  PRIMARY KEY  (`tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 导出表中的数据 `tag`
--

INSERT INTO `tag` (`tag_id`, `name`) VALUES
(1, '重金属'),
(2, '摇滚');

-- --------------------------------------------------------

--
-- 表的结构 `upload`
--

CREATE TABLE `upload` (
  `upload_id` int(11) NOT NULL auto_increment,
  `music_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`upload_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `upload`
--


-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL auto_increment,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` text,
  `nickname` text,
  `gender` int(11) default NULL,
  `birthday` date default NULL,
  `port_dir` text NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 导出表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `name`, `nickname`, `gender`, `birthday`, `port_dir`) VALUES
(1, '6002@6002.com', '60026002', '6002micky', '6002', NULL, NULL, 'upload/user_image/user1/1.jpg'),
(2, '123@123.com', '60026002', '60026002', '60026002', 1, '1986-06-04', ''),
(3, '123123@123123.com', '123123', '60026002', '60026002', 1, '0000-00-00', ''),
(4, '12@12.com', '60026002', '60026002', '', 1, '0000-00-00', '');
