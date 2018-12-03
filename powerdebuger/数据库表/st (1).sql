-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 12 月 14 日 07:26
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
-- 表的结构 `st`
--

CREATE TABLE IF NOT EXISTS `st` (
  `major` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `no` varchar(20) NOT NULL,
  `school` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `roles` varchar(10) NOT NULL,
  PRIMARY KEY (`no`,`school`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `st`
--

INSERT INTO `st` (`major`, `name`, `no`, `school`, `password`, `roles`) VALUES
('信息管理与信息系统', '姜宇轩', '201421010206', '辽宁师范大学', '111111', '学生'),
('信息管理与信息系统', '吕达', '201421010207', '辽宁师范大学', '000000', '学生'),
('信息管理与信息系统', '李洪磊', '201421010222', '辽宁师范大学', '000000', '老师');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
