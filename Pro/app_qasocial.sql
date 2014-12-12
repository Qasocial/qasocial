-- phpMyAdmin SQL Dump
-- version 3.3.8.1
-- http://www.phpmyadmin.net
--
-- 主机: w.rdc.sae.sina.com.cn:3307
-- 生成日期: 2014 年 12 月 12 日 21:08
-- 服务器版本: 5.5.23
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `app_qasocial`
--

-- --------------------------------------------------------

--
-- 表的结构 `wj_member_user`
--

CREATE TABLE IF NOT EXISTS `wj_member_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` char(32) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `wj_member_user`
--

INSERT INTO `wj_member_user` (`user_id`, `username`, `password`) VALUES
(8, '孟庆宇', '71b3b26aaa319e0cdf6fdb8429c112b0'),
(7, '王英昊', '96e79218965eb72c92a549dd5a330112'),
(9, '邵孟旋', '96e79218965eb72c92a549dd5a330112'),
(10, 'Leslie', 'f98fffb844711a995a8cd958c8729bd2'),
(11, 'A', 'e10adc3949ba59abbe56e057f20f883e'),
(12, 'aaa', '71b3b26aaa319e0cdf6fdb8429c112b0'),
(13, '啊啊', '96e79218965eb72c92a549dd5a330112');

-- --------------------------------------------------------

--
-- 表的结构 `wj_paiming`
--

CREATE TABLE IF NOT EXISTS `wj_paiming` (
  `wenjuanid` int(10) NOT NULL,
  `score` int(10) NOT NULL,
  `dtr` varchar(100) NOT NULL,
  `dtrid` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `wj_paiming`
--

INSERT INTO `wj_paiming` (`wenjuanid`, `score`, `dtr`, `dtrid`) VALUES
(56, 100, 'Leslie', 10),
(51, 20, '王英昊', 7);

-- --------------------------------------------------------

--
-- 表的结构 `wj_wenjuan`
--

CREATE TABLE IF NOT EXISTS `wj_wenjuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `fbr` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fbrid` int(11) NOT NULL,
  `fenshu` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=59 ;

--
-- 转存表中的数据 `wj_wenjuan`
--

INSERT INTO `wj_wenjuan` (`id`, `name`, `fbr`, `fbrid`, `fenshu`) VALUES
(54, '你猜我是谁', '王英昊', 7, 50),
(53, 'ha', '王英昊', 7, 0),
(52, '生活', '孟庆宇', 8, 100),
(51, '嗨', '王英昊', 7, 20),
(50, '我是谁', '王英昊', 7, 20),
(55, '我们是谁', '王英昊', 7, 100),
(56, '你猜我是谁', '王英昊', 7, 100),
(57, '呵呵', 'A', 11, 0),
(58, '哈哈', '王英昊', 7, 20);

-- --------------------------------------------------------

--
-- 表的结构 `wj_wenti`
--

CREATE TABLE IF NOT EXISTS `wj_wenti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wenjuanid` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `A` varchar(255) CHARACTER SET utf8 NOT NULL,
  `B` varchar(255) CHARACTER SET utf8 NOT NULL,
  `C` varchar(255) CHARACTER SET utf8 NOT NULL,
  `D` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ans` int(10) NOT NULL,
  `paixu` int(11) NOT NULL,
  `wentifenshu` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- 转存表中的数据 `wj_wenti`
--

INSERT INTO `wj_wenti` (`id`, `wenjuanid`, `title`, `A`, `B`, `C`, `D`, `ans`, `paixu`, `wentifenshu`) VALUES
(58, 52, '我爱吃什么', '土豆', '牛肉', '排骨', '烤腰子', 2, 0, 50),
(57, 52, '我的家乡', '辽宁', '哈尔滨', '湖南', '湖北', 2, 0, 50),
(56, 51, '我', '是', '谁', '', '', 1, 0, 20),
(55, 50, '我的出生年', '1994', '1993', '1995', '1991', 1, 1, 10),
(54, 50, '我的年龄', '21', '20', '19', '18', 2, 0, 10),
(59, 53, '1', '', '', '', '', 1, 0, 0),
(60, 54, '是男是女', '男的', '女的', '不男不女', '外星人', 4, 1, 50),
(61, 55, '我是男生吗', '是', '不是', '', '', 1, 1, 50),
(62, 55, '我年龄', '12', '13', '14', '15', 1, 2, 50),
(63, 56, '我年龄', '11', '12', '13', '14', 1, 1, 50),
(64, 56, '我是男生吗', '是', '不是', '', '', 1, 2, 50),
(65, 58, '行', '12', '1', '', '', 1, 0, 20);
