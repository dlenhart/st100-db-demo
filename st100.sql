-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2014 at 08:01 PM
-- Server version: 5.5.32-31.0-log
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ubunticl_st100`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_info`
--

CREATE TABLE IF NOT EXISTS `app_info` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Location` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Img_loc` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Post_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Summary` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `app_info`
--

INSERT INTO `app_info` (`ID`, `Title`, `Location`, `Img_loc`, `Post_Date`, `Summary`) VALUES
(14, 'Device_Health', 'apps/device_health', 'images/default2.png', '2014-11-18 01:50:52', 'Node check app.xxx'),
(16, 'Minecraft Server', 'apps/minecraft', 'images/mc.png', '2014-10-19 13:38:54', 'Minecraft stats.'),
(32, 'Plex', 'asdfasd', 'images/plex-icon.png', '2014-11-16 20:25:35', 'hi'),
(35, 'My Wiki', 'asdfasdfdsds', 'images/wikicon.png', '2014-11-18 00:24:39', 'dddds hi  sdsdsddss'),
(38, 'dinnerSTOR', 'apps/dinnerSTOR', 'images/dsicon.png', '2014-11-18 00:25:35', 'ds');

-- --------------------------------------------------------

--
-- Table structure for table `common_entry`
--

CREATE TABLE IF NOT EXISTS `common_entry` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `Name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Name_desc` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `common_entry`
--

INSERT INTO `common_entry` (`ID`, `Name`, `Name_desc`) VALUES
(1, 'ST100', 'ST100 - Raspberry PI Home OS S');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
