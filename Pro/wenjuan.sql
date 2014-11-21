-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 11 月 19 日 10:15
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `wenjuan`
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `wj_member_user`
--

INSERT INTO `wj_member_user` (`user_id`, `username`, `password`) VALUES
(2, 'admin', '96e79218965eb72c92a549dd5a330112'),
(3, 'admins', '96e79218965eb72c92a549dd5a330112'),
(5, 'wang', '96e79218965eb72c92a549dd5a330112'),
(6, 'hao', '96e79218965eb72c92a549dd5a330112'),
(7, '王英昊', '96e79218965eb72c92a549dd5a330112');

-- --------------------------------------------------------

--
-- 表的结构 `wj_wenjuan`
--

CREATE TABLE IF NOT EXISTS `wj_wenjuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `fbr` varchar(100) NOT NULL,
  `fbrid` int(11) NOT NULL,
  `fenshu` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- 转存表中的数据 `wj_wenjuan`
--

INSERT INTO `wj_wenjuan` (`id`, `name`, `fbr`, `fbrid`, `fenshu`) VALUES
(40, 'who', 'wang', 5, 10),
(41, 'xia', 'wang', 5, 35),
(42, '33', 'wang', 5, 0),
(43, 'jian', 'wang', 5, 35),
(44, 'xavier', 'wang', 5, 50),
(45, '0000', 'wang', 5, 41),
(46, '?', 'wang', 5, 35),
(47, '???', 'wang', 5, 0),
(48, '?', 'wang', 5, 45),
(49, '?', 'wang', 5, 0),
(50, '?', 'wang', 5, 0),
(51, '11', 'hao', 6, 0),
(52, '我是谁', '王英昊', 7, 0);

-- --------------------------------------------------------

--
-- 表的结构 `wj_wenti`
--

CREATE TABLE IF NOT EXISTS `wj_wenti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wenjuanid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `A` varchar(255) NOT NULL,
  `B` varchar(255) NOT NULL,
  `C` varchar(255) NOT NULL,
  `D` varchar(255) NOT NULL,
  `ans` int(10) NOT NULL,
  `paixu` int(11) NOT NULL,
  `wentifenshu` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- 转存表中的数据 `wj_wenti`
--

INSERT INTO `wj_wenti` (`id`, `wenjuanid`, `title`, `A`, `B`, `C`, `D`, `ans`, `paixu`, `wentifenshu`) VALUES
(44, 40, 'who', 'wang', 'li', 'a', 'b', 1, 1, 5),
(45, 40, 'age', '12', '34', '21', '22', 1, 2, 5),
(46, 41, 'where is here', 'qw', 'ew', 'er', 'fd', 1, 1, 35),
(49, 43, 'er', 'q', 'a', 'c', 'v', 1, 2, 35),
(50, 44, 'qw', '21', '12', '23', '23', 3, 3, 20),
(51, 44, 'where is here', 'harbin', 'jiangsu', 'beijing', 'shanghai', 1, 1, 30),
(52, 45, '1', '1', '2', '3', '4', 1, 0, 30),
(53, 45, '2', '1', '2', '3', '4', 1, 0, 11),
(54, 46, '1', '1', '2', '3', '4', 1, 0, 35),
(55, 48, '2', '2', '3', '4', '5', 1, 0, 45);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
