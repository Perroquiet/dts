-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 08, 2012 at 08:33 AM
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
('1eadd9310fc388b3f230a27fda0ba952', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.4 (KHTML, like Gecko) Chrome/22.0.1229.79 Safari/537.4', 1349673705, 'a:3:{s:9:"user_data";s:0:"";s:8:"username";s:14:"dantedinawanao";s:12:"is_logged_in";b:1;}'),
('2f43b246110d8a26b6fae0387846f805', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:14.0) Gecko/20100101 Firefox/14.0.1', 1349684546, ''),
('e8ea261d1f4b061fdf8d0df3b9e5cfd8', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:14.0) Gecko/20100101 Firefox/14.0.1', 1349672552, '');

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
(7, 'Orven', 'Llantos', 'Professor', 'Computer Science Department'),
(8, 'Erik', 'Sala', 'Professor', 'Information Technology Department'),
(9, 'Dorward', 'Villlaruz', 'Professor', 'Computer Science Department'),
(10, 'Ernesto', 'Empig', 'Dean', 'Dean'),
(11, 'Renato', 'Crisostomo', 'Professor', 'Computer Science Department'),
(12, 'Dante', 'Dinawanao', 'Professor', 'College of Engineering: Computer Center'),
(13, 'Cyrus', 'Gabilla', 'Professor', 'Computer Science Department'),
(14, 'Haroun', 'Macalisang', 'Professor', 'Computer Science Department'),
(15, 'Malikey', 'Maulana', 'Professor', 'Computer Science Department'),
(16, 'Eli', 'Mostrales', 'Professor', 'Computer Science Department'),
(17, 'Jeremy', 'Pinzon', 'Professor', 'Computer Science Department'),
(18, 'Alquine Roy', 'Taculin', 'Professor', 'Computer Science Department'),
(19, 'Emily', 'Tabanao', 'Instructor', 'Information Technology Department'),
(20, 'Rabby', 'Lavilles', 'Assistant Professor', 'Information Technology Department'),
(21, 'Delilah', 'Soliva', 'Associate Professor', 'Information Technology Department'),
(22, 'Lomesindo', 'Caparida', 'Professor', 'Information Technology Department'),
(23, 'Charlie Louie', 'Luna', 'Lecturer', 'Computer Science Department'),
(24, 'Mark Anthony', 'Manlimos', 'Lecturer', 'Computer Science Department'),
(25, 'Ken Rothwyn', 'Mira', 'Lecturer', 'Computer Science Department'),
(26, 'Jennifer Joyce', 'Montemayor', 'Lecturer', 'Computer Science Department'),
(27, 'Manuel', 'Cabido', 'Associate Professor', 'Information Technology Department');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `username`, `password`) VALUES
(7, 'orvenllantos', 'e10adc3949ba59abbe56e057f20f883e'),
(8, 'eriksala', 'e10adc3949ba59abbe56e057f20f883e'),
(9, 'dorwardvillaruz', 'e10adc3949ba59abbe56e057f20f883e'),
(10, 'ernestoempig', 'e10adc3949ba59abbe56e057f20f883e'),
(11, 'renatocrisostomo', 'e10adc3949ba59abbe56e057f20f883e'),
(12, 'dantedinawanao', 'e10adc3949ba59abbe56e057f20f883e'),
(13, 'cyrusgabilla', 'e10adc3949ba59abbe56e057f20f883e'),
(14, 'harounmacalisang', 'e10adc3949ba59abbe56e057f20f883e'),
(15, 'malikeymaulana', 'e10adc3949ba59abbe56e057f20f883e'),
(16, 'elimostrales', 'e10adc3949ba59abbe56e057f20f883e'),
(17, 'jeremypinzon', 'e10adc3949ba59abbe56e057f20f883e'),
(18, 'alquinetaculin', 'e10adc3949ba59abbe56e057f20f883e'),
(19, 'emilytabanao', 'e10adc3949ba59abbe56e057f20f883e'),
(20, 'rabbylavilles', 'e10adc3949ba59abbe56e057f20f883e'),
(21, 'delilahsoliva', 'e10adc3949ba59abbe56e057f20f883e'),
(22, 'lomesindocaparida', 'e10adc3949ba59abbe56e057f20f883e'),
(23, 'charlieluna', 'e10adc3949ba59abbe56e057f20f883e'),
(24, 'markmanlimos', 'e10adc3949ba59abbe56e057f20f883e'),
(25, 'kenmira', 'e10adc3949ba59abbe56e057f20f883e'),
(26, 'jennifermontemayor', 'e10adc3949ba59abbe56e057f20f883e'),
(27, 'manuelcabido', 'e10adc3949ba59abbe56e057f20f883e');

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
