-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 09 月 26 日 11:43
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
CREATE DATABASE `powerdebuger` DEFAULT CHARACTER SET utf-8 COLLATE utf-8_general_ci;
USE `powerdebuger`;

-- --------------------------------------------------------

--
-- 表的结构 `helprecord`
--

CREATE TABLE IF NOT EXISTS `helprecord` (
  `school` varchar(30) CHARACTER SET utf8 NOT NULL,
  `sno` varchar(20) CHARACTER SET utf8 NOT NULL,
  `lno` int(10) NOT NULL,
  `clickcnt` int(15) NOT NULL,
  `effectval` int(15) NOT NULL,
  `recid` int(10) NOT NULL,
  `errcontent` text CHARACTER SET utf8 NOT NULL,
  `errtitle` text CHARACTER SET utf8 NOT NULL,
  `solved` tinyint(1) NOT NULL COMMENT '1:sovled0:new-1:closed',
  `errtype` varchar(100) CHARACTER SET utf8 NOT NULL,
  `errlevel` int(2) NOT NULL,
  `errmemo` varchar(200) CHARACTER SET utf8 NOT NULL,
  `adoptedsolutionid` int(10) NOT NULL,
  PRIMARY KEY (`sno`,`recid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf-8;

--
-- 转存表中的数据 `helprecord`
--

INSERT INTO `helprecord` (`school`, `sno`, `lno`, `clickcnt`, `effectval`, `recid`, `errcontent`, `errtitle`, `solved`, `errtype`, `errlevel`, `errmemo`, `adoptedsolutionid`) VALUES
('辽宁师范大学', '2147483647', 5, 0, 0, 0, '不会做', '不会', 0, '格式问题', 0, '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `lesson`
--

CREATE TABLE IF NOT EXISTS `lesson` (
  `school` varchar(30) CHARACTER SET utf8 NOT NULL,
  `lno` int(10) NOT NULL,
  `lessonname` text CHARACTER SET utf8 NOT NULL,
  `lson` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`lno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf-8;

-- --------------------------------------------------------

--
-- 表的结构 `lessonsteps`
--

CREATE TABLE IF NOT EXISTS `lessonsteps` (
  `lno` int(10) NOT NULL,
  `lsno` varchar(20) CHARACTER SET utf8 NOT NULL,
  `lsname` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`lno`,`lsno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf-8;

--
-- 转存表中的数据 `lessonsteps`
--

INSERT INTO `lessonsteps` (`lno`, `lsno`, `lsname`) VALUES
(1, '1', '0');

-- --------------------------------------------------------

--
-- 表的结构 `solution`
--

CREATE TABLE IF NOT EXISTS `solution` (
  `recordid` int(10) NOT NULL,
  `adoptedsolutionid` int(10) NOT NULL,
  `solutioncontent` text CHARACTER SET utf8 NOT NULL,
  `sno` varchar(20) CHARACTER SET utf8 NOT NULL,
  `userrow` varchar(20) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`adoptedsolutionid`,`sno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf-8;

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `sgrade` int(5) NOT NULL,
  `smajor` text CHARACTER SET utf8 NOT NULL,
  `sname` text CHARACTER SET utf8 NOT NULL,
  `sno` varchar(20) CHARACTER SET utf8 NOT NULL,
  `school` varchar(30) CHARACTER SET utf8 NOT NULL,
  `spasswd` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`school`),
  KEY `snumber` (`sno`,`school`)
) ENGINE=InnoDB DEFAULT CHARSET=utf-8;

-- --------------------------------------------------------

--
-- 表的结构 `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `tname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `tno` varchar(20) CHARACTER SET utf8 NOT NULL,
  `school` varchar(30) CHARACTER SET utf8 NOT NULL,
  `tpasswd` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`school`),
  KEY `tnumber` (`tno`,`school`)
) ENGINE=InnoDB DEFAULT CHARSET=utf-8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
