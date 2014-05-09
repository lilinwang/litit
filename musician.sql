-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 18, 2014 at 06:57 PM
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

--
-- Dumping data for table `musician`
--

INSERT INTO `musician` (`musician_id`, `email`, `password`, `nickname`, `name`, `gender`, `birthday`, `identity`, `introduction`, `attention`, `portaitdir`, `certificate`, `famousfor`, `reg_time`, `organization`, `short_introduction`, `sina_link`, `homepage_link`) VALUES
(22, '444375537@qq.com', '936fa0e4038f5ede38a2822c26071d0d8c381307', '陈小熊', '陈小熊', 0, '2014-01-01', '100000000000000000', '阳光很好呀， 要不要唱歌？ ', 0, 'upload/avatar/user_22/avatar_1388726433.jpg', 0, 0, '2014-01-01 08:30:19', NULL, NULL, '', ''),
(23, 'waitingMRS@gmail.com', 'e4cf4ba3aa5d1563974e0b5790c46ddda5ccded1', '虞菲菲', '虞菲菲', 0, '1993-11-23', '330483199311231624', '本人小清新二傻子一枚  懂星座不信星座\n此外存在感极弱\n没什么文化  就知道上上网看看日剧\n这年头说什么喜欢音乐真的都太俗了但这一只就是是这么俗得喜欢音乐  \n不过唱歌也好写歌也好乐器也好都只是胚胎级的  和那些电脑编曲的简直不能比\n一路上幸运也好不幸运也好怎么说都被眷顾过来了\n2014年是一个新的开始  很多新东西需要学习  各方面应该会比之前都进步一点吧 \n希望在这个平台多放些好作品  不求被人听到或是如何  \n\n只求自己活得像自己期待的模样', 0, 'upload/avatar/user_23/avatar_1388762810.jpg', 0, 0, '2014-01-01 12:35:50', NULL, NULL, '', ''),
(24, '14964606@qq.com', '21bbb732f316e8c65bbc98bd52bb38ec5c8156e9', '陈粒', '陈粒', 0, '1990-07-26', '520103199007263629', '无', 0, 'upload/avatar/user_24/avatar_1388581574.jpeg', 0, 0, '2014-01-01 12:54:35', NULL, NULL, '', ''),
(25, '742912221@qq.com', '106385ffa4c61c9bd6f01227296f04ae9d77a80d', '张璟子', '张璟子', 0, '1993-10-31', '310104199310310042', '一只女优气质的蘑菇……', 0, 'upload/avatar/user_25/avatar_1388627647.jpeg', 0, 0, '2014-01-01 13:08:13', NULL, NULL, '', ''),
(26, 'zjy12300211@163.com', '3cdba882d53b122fecf96a8051e995c49c83cfa9', '钟嘉义', '钟嘉义', 1, '1991-12-30', '362201199112300211', '希望能真诚地以文化作为媒介传播善念的人。\n\n在最傳統的東方文化和最開放的西方文化的共同燻陶下長大，同時愛著中國古典和西洋音樂。體會到中國的傳統文化博大精深，以及在其中發現自我的渺小後希望能為中華文化盡一份力，也希望中國人不要忘記曾經無比燦爛的傳統文化。\n不希望歌曲充斥濫情和流行樂壇的音樂被日漸空洞的意義所表達。\n在音樂與藝術中感覺到不管哪個國家，哪個民族對美好以及其願望都似乎有共同的根，於是希望能以文化作為媒介傳播這個來自源頭的東西。', -3, 'upload/avatar/user_26/avatar_1388646720.jpg', 0, 0, '2014-01-02 05:47:29', NULL, NULL, '', ''),
(27, '805259956@qq.com', '5e400e58eab8ed5e79ddfee9c37a70c8cd3b2543', '施亦蕾', '施亦蕾', 0, '1992-12-12', '310230199212126223', '闷骚的小清新文二青年，原创音乐小菜鸟', 0, 'upload/avatar/user_27/avatar_1388650400.jpeg', 0, 0, '2014-01-02 07:31:59', NULL, NULL, '', ''),
(28, '369672747@qq.com', '8ae1036d2a57cec12386fabbf58dfb2355be26f1', '沈子翔', '沈子翔', 1, '1991-09-25', '310104199109250818', '对我来说，音乐不仅仅是一种艺术，更是我灵魂的所在。我从小接触钢琴，学习三年后在中途放弃了考级，决定自己摸索。因为条件业余和学习生活紧张的关系，我并没有机会成为一名音乐的传播者，但是通过自己的努力，我逐渐成为朋友眼中那个业余的音乐创造者，职业的音乐爱好者。我不奢望任何与名利有关的事，只求能做出更好的音乐，被大家所接受。', -1, 'upload/avatar/user_28/avatar_1388719443.jpeg', 0, 0, '2014-01-03 03:05:12', NULL, NULL, '', ''),
(34, 'chuyunjiell@163.com', '666fe30bc7e0a37a887ee3f01d536ff59c74e74d', '储妈', '储运杰', 1, '2014-01-03', '100000000000000002', '大家好~我是口水系伪民谣渣唱功三十八线音乐人，吃货和死胖子，不务正业SJTUer储•尼玛  感谢您关注本主页和我乱七八糟哼唧的所谓音乐~', 0, 'upload/avatar/user_34/avatar_1388726037.jpg', 0, 0, '2014-01-03 05:07:33', NULL, NULL, '', ''),
(35, 'jinrishan@sohu.com', 'd57cc4c5b09ba0136d530615b7f7a3dd2bf18eaa', '0', '0', 0, '0000-00-00', '0', '0', 0, '0', 0, 0, '2014-01-08 03:35:26', NULL, NULL, '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
