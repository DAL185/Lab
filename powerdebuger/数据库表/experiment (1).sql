-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 12 月 14 日 07:25
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `powerdebuger`
--

-- --------------------------------------------------------

--
-- 表的结构 `experiment`
--

CREATE TABLE IF NOT EXISTS `experiment` (
  `eno` int(20) NOT NULL,
  `ename` varchar(20) NOT NULL,
  `espot` varchar(30) NOT NULL,
  `etime` varchar(30) NOT NULL,
  `lno` int(20) NOT NULL,
  `eaim` varchar(50) NOT NULL,
  `econtent` varchar(100) NOT NULL,
  `esurrounding` varchar(50) NOT NULL,
  PRIMARY KEY (`eno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `experiment`
--

INSERT INTO `experiment` (`eno`, `ename`, `espot`, `etime`, `lno`, `eaim`, `econtent`, `esurrounding`) VALUES
(1, 'JAVA1', '320', '1481253766', 1481253766, '了解JAVA基本操作', '按照实验基本要求操作', 'myeclipse'),
(1481363683, '9', '9', '8', 0, '7', '6', '5'),
(1481363813, '5', '5', '4', 1481253766, '3', '2', '4'),
(1481420321, '', '', '', 0, '', '', ''),
(1481420712, '22', '22', '2', 0, '22', '22', '222'),
(1481420848, '11', '111', '555', 1481253766, '555', '5', '3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
