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
-- 表的结构 `solution`
--

CREATE TABLE IF NOT EXISTS `solution` (
  `recid` int(10) NOT NULL,
  `adoptedsolutionid` int(10) NOT NULL,
  `solutioncontent` text NOT NULL,
  `sno` varchar(20) NOT NULL,
  `userrow` varchar(20) NOT NULL,
  `evaluate` varchar(20) NOT NULL,
  PRIMARY KEY (`adoptedsolutionid`,`sno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `solution`
--

INSERT INTO `solution` (`recid`, `adoptedsolutionid`, `solutioncontent`, `sno`, `userrow`, `evaluate`) VALUES
(1480557540, 3333321, '注意换行', '201421010209', '', ''),
(1480668665, 1480903012, '参见答案', '201421010206', '', ''),
(1480557545, 1480933005, '见答案', '201421010207', '', ''),
(1478335606, 1480984734, '66', '201421010207', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
