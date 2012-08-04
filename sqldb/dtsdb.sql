-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 04, 2012 at 11:22 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dtsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('522df11ca53e8c7dae12d700d26b8910', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.60 Safari/537.1', 1344060770, 'a:3:{s:9:"user_data";s:0:"";s:8:"username";s:5:"maria";s:12:"is_logged_in";b:1;}'),
('58f14c5ef13ec1f460763e4cce59de52', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.60 Safari/537.1', 1344047486, 'a:2:{s:8:"username";s:6:"litopa";s:12:"is_logged_in";b:1;}');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

CREATE TABLE IF NOT EXISTS `tblcomments` (
  `tracking_id` char(16) NOT NULL,
  `commentator` int(11) NOT NULL,
  `comment` text NOT NULL,
  `datetime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbldocument`
--

CREATE TABLE IF NOT EXISTS `tbldocument` (
  `tracking_id` char(16) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `date_time` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblsenders_receivers`
--

CREATE TABLE IF NOT EXISTS `tblsenders_receivers` (
  `tracking_id` char(16) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE IF NOT EXISTS `tbluser` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `profession` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `username`, `password`, `first_name`, `last_name`, `profession`, `location`) VALUES
(1, 'danielitojr', 'adc84ade98', 'Danielito', 'Padayhag', 'Chairman', 'Dean'),
(2, 'damshkie', 'e10adc3949', 'Ibrahim', 'Gamoranao', 'Sysadmin', 'Computer Center'),
(3, 'damshkie2', 'e10adc3949', 'Ibrahim', 'Gamoranao', 'Sysadmin', 'Information Technology Department'),
(4, 'rodrigoSCSIT', 'bd3711d0dd', 'Rodrigo', 'Gomez', 'Professor', 'Information Technology Department'),
(5, 'litopa', 'e10adc3949', 'Danielito', 'Padayhag', 'Teacher', 'Information Technology Department'),
(6, 'maria', 'e10adc3949ba59abbe56e057f20f883e', 'Maria', 'Sharapova', 'Professor', 'Information Technology Department');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
