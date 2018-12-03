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
-- 表的结构 `manageclass`
--

CREATE TABLE IF NOT EXISTS `manageclass` (
  `mno` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `msex` text NOT NULL,
  `mgrade` varchar(10) NOT NULL,
  `mcollege` varchar(20) NOT NULL,
  `mremark` varchar(20) NOT NULL,
  PRIMARY KEY (`mno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `manageclass`
--

INSERT INTO `manageclass` (`mno`, `mname`, `msex`, `mgrade`, `mcollege`, `mremark`) VALUES
('201421010207', '吕达', '男', '四年级', '信息管理与信息系统', '该生本学期需要申请免听');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
