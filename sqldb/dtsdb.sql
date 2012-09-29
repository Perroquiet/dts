-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 29, 2012 at 01:27 AM
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
('27a6bfb6f5276dd436a5e78774192511', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.4 (KHTML, like Gecko) Chrome/22.0.1229.79 Safari/537.4', 1348806391, 'a:3:{s:9:"user_data";s:0:"";s:8:"username";s:10:"perroquiet";s:12:"is_logged_in";b:1;}'),
('7409658d0a9d3efb1bb41c0bb2aa7677', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.4 (KHTML, like Gecko) Chrome/22.0.1229.79 Safari/537.4', 1348882025, 'a:2:{s:8:"username";s:10:"perroquiet";s:12:"is_logged_in";b:1;}'),
('b765aa1a46429d455d2f6924c5504406', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.4 (KHTML, like Gecko) Chrome/22.0.1229.79 Safari/537.4', 1348844852, ''),
('e481be166d7ed515f863876049060e7c', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.4 (KHTML, like Gecko) Chrome/22.0.1229.79 Safari/537.4', 1348861339, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbldescription`
--

CREATE TABLE IF NOT EXISTS `tbldescription` (
  `user_id` int(8) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `profession` varchar(30) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldescription`
--

INSERT INTO `tbldescription` (`user_id`, `first_name`, `last_name`, `profession`, `location`) VALUES
(2, 'Danielito', 'Padayhag', 'Professor', 'Information Technology Department'),
(3, 'Arthas', 'Menethil', 'Dean', 'Dean'),
(4, 'Jaina', 'Proudmoore', 'Professor', 'Information Technology Department'),
(5, 'Miriam', 'Santiago', 'System Admininstrator', 'Computer Center'),
(6, 'Rodrigo', 'Buenafruitsalad', 'Professor', 'Information Technology Department');

-- --------------------------------------------------------

--
-- Table structure for table `tbldocument`
--

CREATE TABLE IF NOT EXISTS `tbldocument` (
  `tracking_id` int(16) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text,
  `date_time_sent` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tracking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=71 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblsenders_receivers`
--

CREATE TABLE IF NOT EXISTS `tblsenders_receivers` (
  `tracking_id` int(8) NOT NULL,
  `sender` int(8) NOT NULL,
  `receiver` int(8) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `date_time_received` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE IF NOT EXISTS `tbluser` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `username`, `password`) VALUES
(2, 'perroquiet', '6e169c5d5b98a757f1cd29a1018ed5bc'),
(3, 'lichking', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'jaina', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'miriam', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'rodrigoSCSIT', 'bd3711d0dd00de22e9d2fb6c1bdd85d6');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbldescription`
--
ALTER TABLE `tbldescription`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`user_id`) REFERENCES `tbluser` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
