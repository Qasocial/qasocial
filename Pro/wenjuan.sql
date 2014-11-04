-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 10 月 30 日 09:45
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
  `email` varchar(32) NOT NULL,
  `sex` tinyint(1) unsigned NOT NULL,
  `photo` char(100) NOT NULL,
  `regtime` int(10) unsigned NOT NULL DEFAULT '0',
  `regip` char(15) NOT NULL,
  `islock` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `wj_member_user`
--

INSERT INTO `wj_member_user` (`user_id`, `username`, `password`, `email`, `sex`, `photo`, `regtime`, `regip`, `islock`) VALUES
(2, 'admin', '96e79218965eb72c92a549dd5a330112', '', 0, '', 1414500469, '127.0.0.1', 0),
(3, 'admins', '96e79218965eb72c92a549dd5a330112', '', 0, '', 1414511096, '127.0.0.1', 0),
(5, 'wang', '96e79218965eb72c92a549dd5a330112', '', 0, '', 1414586644, '0.0.0.0', 0);

-- --------------------------------------------------------

--
-- 表的结构 `wj_wenjuan`
--

CREATE TABLE IF NOT EXISTS `wj_wenjuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `fbr` varchar(100) NOT NULL,
  `fbrid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `wj_wenjuan`
--

INSERT INTO `wj_wenjuan` (`id`, `name`, `fbr`, `fbrid`) VALUES
(17, '1111', 'admin', 2),
(18, '1111', 'admin', 10),
(19, 'sds', 'admin', 2),
(20, 'TEXT', 'admin', 2),
(21, '222', '1', 4),
(22, '222', 'wang', 5);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `wj_wenti`
--

INSERT INTO `wj_wenti` (`id`, `wenjuanid`, `title`, `A`, `B`, `C`, `D`, `ans`, `paixu`) VALUES
(1, 13, '11111111111111', '11111111111111', '111111111111', '111111111111111', '1111111111111111', 0, 0),
(2, 13, '11111111111111', '11111111111111', '111111111111', '111111111111111', '1111111111111111', 0, 10),
(3, 13, '11111111111111', '11111111111111', '111111111111', '111111111111111', '1111111111111111', 0, 4),
(4, 0, '1111222', '222', '12312', 'dsad', 'dsa', 1, 11),
(5, 13, '321312', '', '', '', '', 0, 0),
(6, 13, '12321', '', '', '', '', 0, 1111),
(7, 14, '111', '', '', '', '', 0, 0),
(8, 14, '3213', '3213', '1221', '', '', 11, 0),
(9, 15, 'dd', 'ddsa', 'dsada', 'dsda', 'ddd', 3, 0),
(11, 16, 'sdasd', 'dsadasd', 'dsadsa', 'dasdas', 'dsada', 1, 0),
(12, 17, 'sss', '', '', '', '', 1, 0),
(13, 20, '1111', 'dFDSF', 'FDSFSD', 'FSDFSD', 'FDSF', 1, 111),
(14, 20, '113213', '3213', '213213', '213213', '333', 2, 11),
(15, 21, '1', '1', '2', '3', '4', 1, 0),
(16, 21, '2', '1', '2', '3', '4', 2, 0),
(17, 22, '1', '', '', '', '', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
