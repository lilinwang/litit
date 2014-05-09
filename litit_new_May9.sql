-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2014 at 04:14 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `collect`
--

CREATE TABLE IF NOT EXISTS `collect` (
  `collect_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  PRIMARY KEY (`collect_id`),
  KEY `user_id` (`user_id`),
  KEY `music_id` (`music_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `collect`
--

INSERT INTO `collect` (`collect_id`, `user_id`, `music_id`) VALUES
(2, 10, 144),
(3, 10, 92);

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `follow_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `musician_id` int(11) NOT NULL,
  PRIMARY KEY (`follow_id`),
  KEY `user_id` (`user_id`),
  KEY `musician_id` (`musician_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`follow_id`, `user_id`, `musician_id`) VALUES
(5, 10, 22);

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

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

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`music_id`, `name`, `src`, `story`, `download_cnt`, `share_cnt`, `collect_cnt`, `view_cnt`, `randable`, `musician_id`, `lyrics_by`, `lyrics_src`, `composed_by`, `arranged_by`) VALUES
(55, '她说 每个人的心中都有一首歌', 'upload/music/user_22/music_55.mp3', '她说 每个人的心中都有一首歌\n那时爱的人 曾为你哼唱过\n我说 青春很沉默 我从来没爱过 \n岁月静好 连阳光都很柔和', 0, 0, 0, 0, 0, 22, '陈小熊', '', '陈小熊', ''),
(56, '他每天开着大巴车在城市里穿梭', 'upload/music/user_22/music_56.mp3', '他每天开着大巴车在城市里穿梭\n他每天来来往往看到的都是一样的景色\n下雨了 下雪了 看匆忙的路人\n天晴了 又暗了 那平淡的生活\n\n他常常厌倦这样日复一日的执着 \n他常常想做一个可以随时下车的乘客  \n阳光新路的站牌下只有回忆停留过\n他载着整个车厢的沉默在城市里漂泊', 0, 0, 0, 0, 0, 22, '陈小熊', '', '陈小熊', ''),
(57, '你是我最亲密的朋友', 'upload/music/user_22/music_57.mp3', '你是我最亲密的朋友\n我将心事都讲给你听\n我们的青春自顾不暇\n无人倾听\n\n这是最稳定的感情\n也是最动荡的年纪\n我们都太过爱自己\n归根结底\n\n\n与你平等的交换秘密与关心\n不曾亏欠\n陌生的感情总是珍贵又温暖\n了无牵挂\n你面对一个飘忽不定的未来\n焦灼忐忑\n我孤守一方情深缘浅的残局\n不知所措', 0, 0, 0, 0, 0, 22, '陈小熊', '', '陈小熊', ''),
(58, '她想唱首歌', 'upload/music/user_22/music_58.mp3', '他想唱首歌\n他的话不多\n他有伤痛在心口某个角落\n他一直沉默\n\n他想唱首歌\n唱自己的懦弱\n他在岁月里编织一层外壳\n虚伪又温和\n\n你是否仍然记得\n在每一个失眠的时刻\n那青葱的岁月我都曾与你走过\n你却欲言不说\n\n间奏 哼唱\n\n他想唱首歌\n唱自己的懦弱\n他在岁月里编织一层外壳\n虚伪又温和\n\n你是否曾经爱过\n你总在逃避什么\n那时光的缝隙都写满你的笔墨\n你却欲言不说\n\n他又唱起歌\n歌里没有我\n当所有的过去都不再意味什么\n随着风 不见了', 0, 0, 0, 0, 0, 22, '陈小熊', '', '陈小熊', ''),
(59, '哑巴的歌', 'upload/music/user_22/music_59.mp3', '我以为你没有了生存的问题就开始学会了 生活\n以为你吃饱了睡暖了就能安抚欲望和饥渴\n我走着走着走着走着就停下来了\n一停下了 眼泪就止不住了\n\n醒过来吧\n沉睡的大地\n醒过来吧\n麻木的你\n\n我自言自语 我疯言疯语\n我黯然失语 我沉默不语', 0, 0, 0, 0, 0, 22, '陈小熊', '', '陈小熊', ''),
(60, '如果明天不会到来', 'upload/music/user_22/music_60.mp3', '如果光可以填满\n所有的黑暗\n如果风可以吹散\n所有怨恨与阴霾\n如果声音可以温暖\n所有的冷漠\n如果你愿意期待\n如果我值得等待', 0, 0, 0, 0, 0, 22, '陈小熊', '', '陈小熊', ''),
(61, '盲人的歌', 'upload/music/user_22/music_61.mp3', '有一天他将眼睛蒙上 以为这样就看不到悲伤\n他点着灯 走在路上 想把前方的路照亮\n路人们都笑他 像个痴人一样\nAM G EM AM \n他说世界本就只是虚妄 看与不看又何妨\n\n我眼前的黑虽是一如既往 光是永恒希望\nAM G EM AM\n可你们那明亮的世界里 如何看到光\n人们问他要去何处 他手指前方\n他说前方有太阳 而我眼中还有光', 0, 0, 0, 0, 0, 22, '陈小熊', '', '陈小熊', ''),
(62, '你的眼睛', 'upload/music/user_22/music_62.mp3', '你的眼睛\n点亮了繁星\n飘荡在夜空里\n\n你的眼睛\n吹熄了湖水\n飘散在清波里\n\n你的眼睛\n融化了过往\n迷失在故事里\n\n你的眼睛\n沉醉了山顶\n和软软的白云\n\n在晨曦的歌声里\n在沉醉的岁月里\n在转瞬的生命里\n\n多想和你\n一起', 0, 0, 0, 0, 0, 22, '陈小熊', '', '陈小熊', ''),
(63, '八十岁的歌', 'upload/music/user_22/music_63.mp3', '简介：这首歌通过想象八十岁的场景，表达了爱人相守一生的决心\n\n我希望明天一睁开眼的时候\n我就八十岁了\n我在广播体操的音乐里\n起床戴假牙\n\n我把鸡蛋煎成了溏心儿\n等你把豆浆打好再熬熟\n我们相对着坐在桌边 \n八十岁的 某一天\n\n你会牵着我的手出门吗\n拖着装满青菜的小车\n你已经眼花的看不清手机\n只好专心地望着我\n\n你都罗锅成小老头了\n还会笑话我的水桶腰吗？\n我从年轻时就不算美女呢 \n到那时 还能看吗？\n\n啦啦啦 啦啦啦啦 啦啦啦 八十岁啦\n啦啦啦 啦啦啦啦 啦啦啦 八十岁啦\n\n我是多么期待着与你\n相伴一生\n却又害怕在前方的路口 \n丢掉你呢\n\n你在八十岁的某一天 \n站在街头 牵着我\n我们提着满满的吃的\n看着来来往往的车\n\n我还是会胡乱的哼着歌 \n等你说一句 快别嚎了\n你还是会抱着我开着些\n不着边际的玩笑\n\n我是快乐的悲观主义者\n你是理智的乐天派呢\n我们磕绊着吵闹着陪伴着\n就这样相爱着 很久了\n\n啦啦啦 啦啦啦啦 啦啦啦 八十岁啦\n啦啦啦 啦啦啦啦 啦啦啦 很久啦\n啦啦啦 啦啦啦啦 啦啦啦 八十岁啦\n啦啦啦 啦啦啦啦 啦啦啦 很老啦', 0, 0, 0, 0, 0, 22, '陈小熊', '', '陈小熊', ''),
(64, '你有多久没有看过星星', 'upload/music/user_22/music_64.mp3', '你有多久没有看过星星\n就像那夜空中凝视的眼睛\n静静地注视着世事变幻\n彼此却从不曾互相靠近\n\n他们是来自黑暗的生命\n守护着某一颗漂泊的心\n却在每一个日出的时刻\n隐藏起自己黯淡的身影\n\n其实这一切都已经写明\n他们会在何时坠落向大地\n在那混浊的尘世的梦中\n变成一颗流星点缀我们的夜空\n\n突然车窗外下起了大雨\n我问你是否还能看到星星\n你说可以啊随我闭上眼睛\n他们永远的睡在我的心里\n\n你说有些话从不必说明\n有些人一直睡在我的心里', 0, 0, 0, 0, 0, 22, '陈小熊', '', '陈小熊', ''),
(65, '樱花葬', 'upload/music/user_23/music_65.mp3', '樱花葬 高一的时候看一部灵异小说的读后感，觉得故事写得很精彩，所以就这一首歌。这首歌经历了没有伴奏到有伴奏到改伴奏的过程最终变成现在的版本。期间非常感谢林润欣的钢琴改编', 0, 0, 0, 0, 0, 23, '虞菲菲', '', '虞菲菲', '林润欣'),
(66, 'if one day', 'upload/music/user_23/music_66.mp3', 'if one day 歌词是我高中的好朋友的课堂作业扩充的，国庆节从广西回家拿起许久未碰的吉他。突然来了灵感。之后回到学校听说有比赛便匆匆忙忙录了音没想到这首歌一路挺进了半决赛，所以才有机会认真的制作了伴奏，进录音棚录了音。这首歌离不开潘瑜的歌词，葛永麟复赛的帮唱，李佳峰一行帮我做的伴奏，裘佳祺半决赛的帮唱', 0, 0, 0, 0, 0, 23, '潘瑜', '', '虞菲菲', '李佳峰'),
(67, '不一样', 'upload/music/user_23/music_67.mp3', '不一样 这首是贴吧里看到的歌词突然有了灵感。被很多朋友喜欢，关键歌词写得真的很有感觉。', 0, 0, 0, 0, 0, 23, '沐小山', '', '虞菲菲', '虞菲菲'),
(69, '四方上下', 'upload/music/user_24/music_69.mp3', '', 0, 0, 0, 0, 0, 24, '陈粒', '', '陈粒', '陈粒'),
(70, 'PONY', 'upload/music/user_24/music_70.mp3', 'closing my eyes   \nI''''m getting high\nagain and again   \nstep out the line\nfloat in the air  \nI''''m getting tired\nto follow the world   \nI''''ve been tried\n\n\nlike the stupid sun ,I shine\nlike a foolish man  ,I write\nlike a human being  ,I lie\nlike a placid lake  ,I''''m dried\n\n\n\nI''''ve been in love\nI used to laugh\nwith the laughter\nnow they''''re far\nI met a girl\nI opend the jar\nI want to restart but it''''s so hard\n\nlike a child to ask you why\nlike a friend to say I''''m fine\nlike a cat I keep being quiet\nlike a dream of urs I die.\n\n\nLook back on all the way\neverything was a waste\neveryone was mistake\nwhat if we skip the tale\nwhat if we get there straight\nthat''''ll really make my day', 0, 0, 0, 0, 0, 24, '陈粒', '', '陈粒', '陈粒'),
(71, '荒唐', 'upload/music/user_25/music_71.mp3', '谁不希望自己发光\n谁又知道现实中的自己很荒唐\n\n大半夜看着电脑屏幕\n感觉有一点饿\n为什么又饿了\n明明晚饭吃很多\n\n曾以为这时候的自己\n已经顶天立地亭亭玉立\n如今却只能窝在寝室里\n看着无聊的日韩肥皂剧', 0, 0, 0, 0, 0, 25, '张璟子', '', '张璟子', '张璟子'),
(72, '贰，了', 'upload/music/user_25/music_72.mp3', '能不能给我个拥抱 给我个肩膀依靠\n那些回忆我不会忘掉 你会在我生命中闪耀\n\n不知不觉已经来到 弥漫着青春的味道\n我们要记住每一秒\n习惯每天吵吵闹闹 习惯了你们的微笑\n我会记住这些美好\n\n我们都有自己的轨道\n梦想让我们往不同方向奔跑\n\n能不能给我个拥抱 给我个肩膀依靠\n那些回忆我不会忘掉 你会在我的生命中闪耀\n谢谢你的拥抱 这不是一个句号\n感谢命运能让我们遇到 在这青春的城堡\n\n过了几十多年以后 我们会有什么外貌\n会有怎样的烦恼\n有一天我们会变老 牙齿也会越来越少\n那天 还能不能吵闹\n\n总有一天离别会来到\n我们的心却依旧紧靠\n\n就算再一次跌倒 痛苦也没人知道\n请你记得一定要微笑 奇迹总有一天会被创造\n就算没人引导 也要努力去寻找\n我们心中永远的珍宝 跳出最美的舞蹈', 0, 0, 0, 0, 0, 25, '徐凯，张璟子', '', '张璟子', '张璟子'),
(92, 'Violence system', 'upload/music/user_25/music_92.mp3', 'I failed to fall asleep tonight\nNobody else knows why\nThinking about the meaning of what you said\nGuessing what’s between the lines\n\nWhat’s in your eyes\nWhat’s in your eyes\nDid I miss something hard to read\nWhy are you scared\nWhy am I scared\n\nViolence system in your sof\nViolence system under skin\nStop the fire in your heart\nViolence system in your sof', 0, 0, 1, 0, 0, 25, '张璟子', '', '张璟子', '张璟子'),
(93, '樂從東方來（Enter The Oriental Temple）', 'upload/music/user_26/music_93.mp3', '九月第十八天，\n第一次和它见面，\n一个三角一个圈，\n微笑流出她的脸，\n平淡过得从前，\n仿佛回到那一天，\n多么想她会成为它的一员。\n\n四部连成一线，\n共撑起一片蓝天，\n她常坐在最边，\n却并不多语言，\n温馨让她流连，\n面善带友善的脸，\n终有天，那会伴她到海角天边。\n\n爱 ~ 不容易，\n爱 ~ 是每人心中的四季，\n爱 ~ 没道理，\n真心说爱要多大勇气？\n\n从没忘记，\n所有的经历，\n她却发现，\n平凡是最美的记忆，\n笑中带泪的游戏，\n她从未错过生命中的美丽。\n\n好一朵美丽的茉 莉 花~\n好一朵美丽的茉 莉 花~\n\n人群有点拥挤，\n班后总有些没力，\n没有人会关心，\n只属于她的回忆，\n她并不太在意，\n一个人学会随性，\n她知道幸福之声就在她心里。\n\n爱 ~ 不容易，\n爱 ~ 是每人心中的四季，\n爱 ~ 没道理，\n真心说爱要多大勇气？\n\n从没忘记，\n所有的经历，\n她却发现，\n平凡是最美的记忆，\n笑中带泪的游戏，\n她从未错过生命中的美丽。\n\n有的时候，\n她也曾怀疑，\n依然唱起，\n平凡是最美的记忆，\n笑中带泪的游戏，\n她从未错过生命中的美丽。\n笑中带泪的游戏，\n她从未错过生命中的美丽。\n给你生命中的美丽。', 0, 0, 0, 0, 0, 26, '钟嘉义', '', '钟嘉义', '钟嘉义'),
(94, '做個白日夢（Make a Daydream）Remix', 'upload/music/user_26/music_94.mp3', '今晚就来跟我一起做个白日梦吧！放开你的想象一起做个白日梦吧！ \r\n今晚不如一起跟我做个白日梦吧！放开你的想象一起做个 嗯\r\n\r\n白日梦，我做了一个又一个， \r\n但 从小到大，从来没跟别人瞎扯， \r\n因为不相信白日梦会变成现实， \r\n所以没有人会想那一刻它是真的... \r\n街景灯光，美女身旁， \r\n一群漂亮的霓虹灯埋藏了愿望， \r\n商场 开张 LV皮包在肩膀， \r\n奔驰的车头灯把现实照亮， \r\n是黄昏，拥挤仍旧的巴士狂奔， \r\n行人互看，就像上了锁的房门， \r\n卖水果的摊，留意城管车的响声， \r\n没座的公交 乘客也不会让老人， \r\n停车后要走路，危险的行程， \r\n然后他们说 这是和谐的气氛， \r\n今晚跟我做个白日梦吧，忘了你的衣服裤子鞋子有多贵。 \r\n放开想象做个白日梦吧，这不公平的事 让它去见鬼~！ \r\n今晚不如一起做个白日梦吧，人们很慌 物价别再飞！ \r\n放开想象做个白日梦吧，表达想说话你理得我是谁？\r\n\r\n我 是 谁？ \r\n一个90后的小孩，来自世外。 \r\n不是富二代，因为将是富一代， \r\n但荣华富贵永远成不了 我的爱， \r\nYou, know, I, got, \r\nwhat it takes to make the club go outta control, \r\ngood plan turn the music up a little bit, \r\nbounce with me now homey let''s get into it, \r\nYou do you man cause me I''m going do my thang, \r\n(You know I do my thang) \r\n可我现在想唱起一首歌，\r\n\r\nDoes the pain weigh out the pride? （痛苦是否已压倒了自尊？） \r\nAnd you look for a place to hide。（累了，让你想找一个地方把自\r\n己和外界隔离。） \r\nDid someone break your heart inside?（可曾有人倾听、明白你的心\r\n声？） \r\nYou''re in ruins（你只剩下残骸） 　　 \r\nOne, 21 guns（鸣炮，21响）———（one 在这里有特殊含义，个人可\r\n有不同的理解，如指那一队放21礼炮的士兵，指You and I等。21礼炮\r\n，这里指美军表示解除自己的武装发射21响礼炮） 　　 \r\nLay down your arms（放下你的武器） 　　 \r\nGive up the fight（停止你的厮杀） 　　 \r\nOne, 21 guns（鸣炮，21响） 　　 \r\nThrow up your arms into the sky,（把武器都抛向天空吧） 　　 \r\nYou and I（我和你）\r\n\r\n今天一起床我就头痛，不管吃了几瓶药都没有用， \r\n心情有一些莫名的焦躁，你离我越远越好， \r\n外面有橘色的加州阳光，我的口袋只有黑色的柳丁， \r\n我只有一个小小的要求，就是请你leave me alone..\r\n\r\n噢，又回到现实生活中来， \r\n像被重力重重压在地上然后打败， \r\n但我比打不死的小强还要厉害， \r\n于是我带着白日梦的状态来段自白.. \r\n四年前的某一天， \r\n我想去北京 结果来到上海， \r\n正好一睹你的风采， \r\n十里洋场，东方巴黎的模样， \r\n醉人的爵士乐会吹地心里痒痒， \r\n但革了场大命，让这只剩想象， \r\n它真的有点变样，我真的有点失望， \r\n就像《上海滩》里没有马文强， \r\n于是我打算先去纽约逞一逞强！ \r\ni wish i got another life \r\nor another mic, 不想唱的快 \r\n一样表达我来自世外，要自在， \r\n我渐渐忘掉自己今年多大， \r\n他们都希望我把 这事业继续做大！ \r\nOh my god, 真的牛逼啦，Oh my god, 真的牛逼啦， \r\nOh my god, 真的牛逼啦，Oh my god, 真的牛逼啦， \r\nI''ll tell you when the beat drop, \r\ntell you when the beat drop, \r\nLike HIPHOP in China, and Chinese on HIPHOP, \r\n我的骄傲就是我的文化~！\r\n\r\n我常常在想， \r\n有没有这样一个地方，传说的乌托邦， \r\n这里没有战争，更没有饥荒， \r\n没有国界 没有货币 没有政党， \r\n没有钻石 没有财宝 没有金矿， \r\n没有等级 没有贵族 没有国王， \r\n没有肤色 没有种族 没有屏障，\r\n\r\nday dream, 睁开我的眼睛， \r\n视线好模糊，什么都看不清楚， \r\n我脑筋不晓得飞到哪儿去？ \r\n印象里昨晚的女孩又到哪儿去？ \r\n我到那儿去？但我都不知道， \r\n只记得那里一切似乎都很美好， \r\n没有人们争吵、机关枪和大炮， \r\n孩子们快乐地追逐蝴蝶到处奔跑。 \r\n我脚踩着云朵随着风穿梭在乱世之中， \r\n没有人可以来管我， \r\n振作精神，我没有时间在这儿逗留， \r\n我一直走但不知道要走到什么时候。\r\n\r\n时光倒流，我彷佛感觉回到小时候 \r\n对世界没有一丝怀疑没有太多要求， \r\n远离这个世界 疯狂的世界， \r\n在这一切都即将消失的一瞬间， \r\n不想再看见 那哭泣的脸，就让我...', 0, 0, 0, 0, 0, 26, '钟嘉义', '', '钟嘉义', '钟嘉义'),
(95, '一筆和諧（Harmony）demo', 'upload/music/user_26/music_95.mp3', '', 0, 0, 0, 0, 0, 26, '', '', '钟嘉义', '钟嘉义'),
(101, '最好的朋友', 'upload/music/user_27/music_101.mp3', '鱼缸里的小金鱼啊\n还快活地游着\n窗台上的小盆栽啊\n还摆在哪呢\n刚洗过的小短发还湿漉漉的\n女孩子的小世界有好多心事呢\n\n没充电的小手机啊\n自动关机了\n床头边的小闹钟啊\n怎么还没有响呢\n小说里的小情节离奇曲折\n你给的小关心 我全部都记得\n\n\n嘿 你头发还没留起来\n可是短发女人也可以性感和可爱\n寂寞难捱 难以释怀\n带我走出他给的伤害\n\n你值得被人疼爱\n快试一试去爱伤害也比悲哀来得爽快\n多年以后 你会不会还在\n最好的朋友 说好不离开', 0, 0, 0, 0, 0, 27, '施亦蕾', '', '施亦蕾', '施亦蕾'),
(102, '过去式', 'upload/music/user_27/music_102.mp3', '过去式\n发生在过去的事实\n像一根尖利刺划过最柔软的位置\n\n过去式\n每当我想起昨天的事\n我们那么偏执 像两个不懂事的孩子\n\n\n过去那么真挚那么坚持那么固执\n无奈我们的梦想总是背道而驰\n本想留一个机会给彼此\n最后还是用了最残忍的方式\n我无计可施\n还欠一个解释\n\n\n过去是我不理智\n过去证明爱已逝\n过去式让我怀念你的样子\n我的怅然若失渗透每一个句子\n原谅我对你做了这样的事\n\n过去承诺一辈子\n过去发甜蜜的誓\n过去为你写过数不清的诗\n无情的现实把华丽的回忆侵蚀\n不再做你的天使\n一切只是过去式', 0, 0, 0, 0, 0, 27, '施亦蕾', '', '施亦蕾', '施亦蕾'),
(103, '最浪漫的事', 'upload/music/user_27/music_103.mp3', '你写过几首情诗\n说我是你的恩赐\n你用过多少修辞\n寄托对我的相思\n\n我们会有大房子\n会有可爱的孩子\n窝在一起看电视\n这是我能想到最浪漫的事\n\n你看过我全部的样子\n我听过你所有的故事\n畅想过我们今后的日子\n说就算难 也要坚持\n\n我牵过你右手的小指\n你吻过我耳后的痣\n发生过很多的争执\n爱让隔阂都消失', 0, 0, 0, 0, 0, 27, '施亦蕾', '', '施亦蕾', '施亦蕾'),
(104, '当年', 'upload/music/user_27/music_104.mp3', '你想和我旅行然后拍很多照片\n你说和我一起让你很安心很留恋\n你说这些的时候 你笑得很无邪\n怎么此刻的我又想起了 你的脸\n\n又一次经过你陪我等公车的站点\n路上的行人来来回回好几遍\n如今身边的你 已经消失不见\n独留我在原地缅怀当年\n\n当年的课桌堆满了试卷\n当年的校服颜色很鲜艳\n当年的爱情让人很怀念\n当年的我们多叫人生羡\n\n当年的理想怎么没实现\n当年的誓言怎么没兑现\n当年的执着你有没有看见\n当年的故事已是完结篇\n\n不知不觉 我们已走过当年\n当年再美丽也不过是昨天\n回想当年就模糊了视线', 0, 0, 0, 0, 0, 27, '施亦蕾', '', '施亦蕾', '施亦蕾'),
(105, '回忆不再成殤', 'upload/music/user_27/music_105.mp3', '借我一双梦的翅膀\n让爱伴我自由飞翔\n从此山不再高 路不再长\n爱立刻不再是孤单的吟唱\n\n披一身戎装 就算前方迷茫\n轻启一扇窗 嗅爱的芬芳\n让流浪的人不再泪眼他乡\n让幸福像花儿一样绽放\n\n将两张笑脸谱写成章\n将两个名字刻在三生石上\n飘落的小雨带着屡屡暗香\n心不再迷失方向\n\n无论以后身在何方\n你就是我最美的阳光\n从此秋叶不再枯黄\n有你 回忆不再成殤', 0, 0, 0, 0, 0, 27, '张仁杰，施亦蕾', '', '施亦蕾', '施亦蕾'),
(109, '背影-王乙涵', 'upload/music/user_28/music_109.mp3', '', 0, 0, 0, 0, 0, 28, '沈子翔', '', '沈子翔', '沈子翔'),
(110, '朋友和我的舞台', 'upload/music/user_28/music_110.mp3', '', 0, 0, 0, 0, 0, 28, '沈子翔', '', '沈子翔', '沈子翔'),
(111, '天黑黑-途人组合', 'upload/music/user_28/music_111.mp3', '', 0, 0, 0, 0, 0, 28, '沈子翔', '', '沈子翔', '沈子翔'),
(115, '好饿可是不能吃', 'upload/music/user_34/music_115.mp3', '', 0, 0, 0, 0, 0, 34, '储运杰', '', '储运杰', '储运杰'),
(116, 'Oh，夏天到了', 'upload/music/user_34/music_116.mp3', '', 0, 0, 0, 0, 0, 34, '储运杰', '', '储运杰', '储运杰'),
(117, 'Sandclock', 'upload/music/user_34/music_117.mp3', '', 0, 0, 0, 0, 0, 34, '储运杰', '', '储运杰', '储运杰'),
(138, 'Fuck the rest', 'upload/music/user_24/music_138.mp3', '', 0, 0, 0, 0, 0, 24, '陈粒', '', '陈粒', '陈粒'),
(141, '原本的颜色', 'upload/music/user_25/music_141.mp3', '春夏秋冬 地球转了一圈一圈\n终有一天 夜空的星不再为我闪烁\n渐渐破碎 坠下来\n\n昨天 我们忘记的 度过的快乐和苦涩\n今天 灯光亮起了 再多风光又如何\n如果明天可以 天空呈现最原本的颜色\n那么此时此刻一定是我最美丽幸福的时刻\n\n恍如梦境 你穿着我买的连衣裙\n终有一天 你会明白我是什么存在\n不需要猜 醒过来\n\n昨天 我们忘记的 度过的快乐和苦涩\n今天 灯光亮起了 再多风光又如何\n如果明天可以 天空呈现最原本的颜色\n那么此时此刻一定是我最美丽幸福的时刻\n\n这首歌写给我的你和我自己\n这首歌唱给你的他和你自己', 0, 0, 0, 0, 0, 25, '张璟子', '', '张璟子', '张璟子'),
(143, '平凡之声', 'upload/music/user_26/music_143.mp3', '九月第十八天，\n第一次和它见面，\n一个三角一个圈，\n微笑流出她的脸，\n平淡过得从前，\n仿佛回到那一天，\n多么想她会成为它的一员。\n\n四部连成一线，\n共撑起一片蓝天，\n她常坐在最边，\n却并不多语言，\n温馨让她流连，\n面善带友善的脸，\n终有天，那会伴她到海角天边。\n\n爱 ~ 不容易，\n爱 ~ 是每人心中的四季，\n爱 ~ 没道理，\n真心说爱要多大勇气？\n\n从没忘记，\n所有的经历，\n她却发现，\n平凡是最美的记忆，\n笑中带泪的游戏，\n她从未错过生命中的美丽。\n\n好一朵美丽的茉 莉 花~\n好一朵美丽的茉 莉 花~\n\n人群有点拥挤，\n班后总有些没力，\n没有人会关心，\n只属于她的回忆，\n她并不太在意，\n一个人学会随性，\n她知道幸福之声就在她心里。\n\n爱 ~ 不容易，\n爱 ~ 是每人心中的四季，\n爱 ~ 没道理，\n真心说爱要多大勇气？\n\n从没忘记，\n所有的经历，\n她却发现，\n平凡是最美的记忆，\n笑中带泪的游戏，\n她从未错过生命中的美丽。\n\n有的时候，\n她也曾怀疑，\n依然唱起，\n平凡是最美的记忆，\n笑中带泪的游戏，\n她从未错过生命中的美丽。\n笑中带泪的游戏，\n她从未错过生命中的美丽。\n给你生命中的美丽。', 0, 0, 0, 0, 0, 26, '钟嘉义', '', '钟嘉义', '钟嘉义'),
(144, '别怕·有我', 'upload/music/user_26/music_144.mp3', '我的宝贝 你累了吗\n我一直在这里让你依靠\n你知道 所有的蜚短流长都不重要\n我爱你 我们在一起就好\n亲爱的 有你我还怕什么\n就算也曾因为流言困惑\n但我懂 除了你这幸福谁都给不了         \n我爱你 不管他们怎么说\n我知道我想要的是什么 我也知道你是我的无法割舍\n哪怕眼泪混乱哭过痛过 却也美好的彼此温暖着\n我知道我是不会放手的 这世上幸福的人本就不多\n未来不论如何你都在么\n是的 别怕 有我\n祝我们旅途漫长 幸福快乐', 0, 0, 1, 0, 0, 26, '魏晨希', '', '钟嘉义', '钟嘉义'),
(153, '啊之歌', 'upload/music/user_25/music_153.mp3', '啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊 \n\n啊咦呜呃哦 卡可库可扣 撒西苏色搜\n啊，今天天气不错，要不要去动物园呢 \n啊，那位小哥长得不错哟 \n啊啊啊啊啊，谢谢~ \n\n时间过得真快 \n好担心明天呢 \n要不要逃到美国去呢 \n艾莉莎也在那边 \n\n太热了我们去海边吧 \n冰激凌要化掉了 \n雨停了把伞扔了吧 \n雨后的绣球花很美哦~ \n\n啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊', 0, 0, 0, 0, 0, 25, '张璟子', '', '张璟子', '张璟子');

-- --------------------------------------------------------

--
-- Table structure for table `musician`
--

CREATE TABLE IF NOT EXISTS `musician` (
  `musician_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `real_name` text NOT NULL,
  `follower_cnt` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`musician_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `musician`
--

INSERT INTO `musician` (`musician_id`, `user_id`, `real_name`, `follower_cnt`) VALUES
(22, 1, '陈小熊', 0),
(23, 2, '虞菲菲', 0),
(24, 3, '陈粒', 0),
(25, 4, '张璟子', 0),
(26, 5, '钟嘉义', 0),
(27, 6, '施亦蕾', 0),
(28, 7, '沈子翔', 0),
(34, 8, '储运杰', 0),
(35, 9, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `music_musician`
--

CREATE TABLE IF NOT EXISTS `music_musician` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `music_id` int(11) NOT NULL,
  `musician_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `musician_id` (`musician_id`),
  KEY `music_id` (`music_id`)
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

-- --------------------------------------------------------

--
-- Table structure for table `play_song`
--

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

CREATE TABLE IF NOT EXISTS `upload` (
  `upload_id` int(11) NOT NULL AUTO_INCREMENT,
  `musician_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL,
  PRIMARY KEY (`upload_id`),
  KEY `musician_id` (`musician_id`),
  KEY `user_id` (`music_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`upload_id`, `musician_id`, `music_id`) VALUES
(19, 22, 55),
(20, 22, 56),
(21, 22, 57),
(22, 22, 58),
(23, 22, 59),
(24, 22, 60),
(25, 22, 61),
(26, 22, 62),
(27, 22, 63),
(28, 22, 64),
(29, 23, 65),
(30, 23, 66),
(31, 23, 67),
(33, 24, 69),
(34, 24, 70),
(35, 25, 71),
(36, 25, 72),
(40, 26, 93),
(41, 26, 94),
(42, 26, 95),
(44, 27, 101),
(45, 27, 102),
(46, 27, 103),
(47, 27, 104),
(48, 27, 105),
(52, 28, 109),
(53, 28, 110),
(54, 28, 111),
(58, 34, 115),
(59, 34, 116),
(60, 34, 117),
(63, 25, 92),
(64, 25, 141),
(66, 26, 143),
(67, 26, 144),
(68, 24, 138),
(69, 25, 153);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` tinyint(4) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` text NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT '0',
  `birthday` date DEFAULT NULL,
  `avatar_src` text,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `introduction` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_type`, `email`, `password`, `nickname`, `gender`, `birthday`, `avatar_src`, `reg_time`, `introduction`) VALUES
(1, 1, '444375537@qq.com', '936fa0e4038f5ede38a2822c26071d0d8c381307', '陈小熊', 0, '2014-01-01', 'upload/avatar/user_22/avatar_1388726433.jpg', '2014-01-01 00:30:19', '阳光很好呀， 要不要唱歌？ '),
(2, 1, 'waitingMRS@gmail.com', 'e4cf4ba3aa5d1563974e0b5790c46ddda5ccded1', '虞菲菲', 0, '1993-11-23', 'upload/avatar/user_23/avatar_1388762810.jpg', '2014-01-01 04:35:50', '本人小清新二傻子一枚  懂星座不信星座\n此外存在感极弱\n没什么文化  就知道上上网看看日剧\n这年头说什么喜欢音乐真的都太俗了但这一只就是是这么俗得喜欢音乐  \n不过唱歌也好写歌也好乐器也好都只是胚胎级的  和那些电脑编曲的简直不能比\n一路上幸运也好不幸运也好怎么说都被眷顾过来了\n2014年是一个新的开始  很多新东西需要学习  各方面应该会比之前都进步一点吧 \n希望在这个平台多放些好作品  不求被人听到或是如何  \n\n只求自己活得像自己期待的模样'),
(3, 1, '14964606@qq.com', '21bbb732f316e8c65bbc98bd52bb38ec5c8156e9', '陈粒', 0, '1990-07-26', 'upload/avatar/user_24/avatar_1388581574.jpeg', '2014-01-01 04:54:35', '无'),
(4, 1, '742912221@qq.com', '106385ffa4c61c9bd6f01227296f04ae9d77a80d', '张璟子', 0, '1993-10-31', 'upload/avatar/user_25/avatar_1388627647.jpeg', '2014-01-01 05:08:13', '一只女优气质的蘑菇……'),
(5, 1, 'zjy12300211@163.com', '3cdba882d53b122fecf96a8051e995c49c83cfa9', '钟嘉义', 1, '1991-12-30', 'upload/avatar/user_26/avatar_1388646720.jpg', '2014-01-01 21:47:29', '希望能真诚地以文化作为媒介传播善念的人。\n\n在最傳統的東方文化和最開放的西方文化的共同燻陶下長大，同時愛著中國古典和西洋音樂。體會到中國的傳統文化博大精深，以及在其中發現自我的渺小後希望能為中華文化盡一份力，也希望中國人不要忘記曾經無比燦爛的傳統文化。\n不希望歌曲充斥濫情和流行樂壇的音樂被日漸空洞的意義所表達。\n在音樂與藝術中感覺到不管哪個國家，哪個民族對美好以及其願望都似乎有共同的根，於是希望能以文化作為媒介傳播這個來自源頭的東西。'),
(6, 1, '805259956@qq.com', '5e400e58eab8ed5e79ddfee9c37a70c8cd3b2543', '施亦蕾', 0, '1992-12-12', 'upload/avatar/user_27/avatar_1388650400.jpeg', '2014-01-01 23:31:59', '闷骚的小清新文二青年，原创音乐小菜鸟'),
(7, 1, '369672747@qq.com', '8ae1036d2a57cec12386fabbf58dfb2355be26f1', '沈子翔', 1, '1991-09-25', 'upload/avatar/user_28/avatar_1388719443.jpeg', '2014-01-02 19:05:12', '对我来说，音乐不仅仅是一种艺术，更是我灵魂的所在。我从小接触钢琴，学习三年后在中途放弃了考级，决定自己摸索。因为条件业余和学习生活紧张的关系，我并没有机会成为一名音乐的传播者，但是通过自己的努力，我逐渐成为朋友眼中那个业余的音乐创造者，职业的音乐爱好者。我不奢望任何与名利有关的事，只求能做出更好的音乐，被大家所接受。'),
(8, 1, 'chuyunjiell@163.com', '666fe30bc7e0a37a887ee3f01d536ff59c74e74d', '储妈', 1, '2014-01-03', 'upload/avatar/user_34/avatar_1388726037.jpg', '2014-01-02 21:07:33', '大家好~我是口水系伪民谣渣唱功三十八线音乐人，吃货和死胖子，不务正业SJTUer储•尼玛  感谢您关注本主页和我乱七八糟哼唧的所谓音乐~'),
(9, 1, 'jinrishan@sohu.com', 'd57cc4c5b09ba0136d530615b7f7a3dd2bf18eaa', '0', 0, '0000-00-00', '0', '2014-01-07 19:35:26', '0'),
(10, 1, '1@1.com', '21ee824bdbac84f3b5a6dc28b48ab1974dcf559f', '1@1.com', 0, NULL, NULL, '2014-05-09 12:06:27', ''),
(11, 1, '408123@163.com', '3a58283155b0454a127851b6e9e9534550a54df0', '408123@163.com', 0, NULL, NULL, '2014-05-09 13:38:36', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collect`
--
ALTER TABLE `collect`
  ADD CONSTRAINT `collect_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `collect_ibfk_2` FOREIGN KEY (`music_id`) REFERENCES `music` (`music_id`);

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`musician_id`) REFERENCES `musician` (`musician_id`);

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
  ADD CONSTRAINT `music_musician_ibfk_1` FOREIGN KEY (`music_id`) REFERENCES `music` (`music_id`),
  ADD CONSTRAINT `music_musician_ibfk_2` FOREIGN KEY (`musician_id`) REFERENCES `musician` (`musician_id`);

--
-- Constraints for table `play_song`
--
ALTER TABLE `play_song`
  ADD CONSTRAINT `play_song_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `play_song_ibfk_2` FOREIGN KEY (`music_id`) REFERENCES `music` (`music_id`);

--
-- Constraints for table `skip_song`
--
ALTER TABLE `skip_song`
  ADD CONSTRAINT `skip_song_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `skip_song_ibfk_2` FOREIGN KEY (`music_id`) REFERENCES `music` (`music_id`);

--
-- Constraints for table `upload`
--
ALTER TABLE `upload`
  ADD CONSTRAINT `upload_ibfk_1` FOREIGN KEY (`musician_id`) REFERENCES `musician` (`musician_id`),
  ADD CONSTRAINT `upload_ibfk_2` FOREIGN KEY (`music_id`) REFERENCES `music` (`music_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
