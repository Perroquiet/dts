-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 19, 2012 at 12:25 PM
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
('63154da82a035d79cdd70753700a82cb', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.4 (KHTML, like Gecko) Chrome/22.0.1229.94 Safari/537.4', 1350627542, 'a:3:{s:9:"user_data";s:0:"";s:8:"username";s:12:"orvenllantos";s:12:"is_logged_in";b:1;}'),
('782baa09b34f317ed6995ab386d8ce2d', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:14.0) Gecko/20100101 Firefox/14.0.1', 1350627644, 'a:3:{s:9:"user_data";s:0:"";s:8:"username";s:14:"alquinetaculin";s:12:"is_logged_in";b:1;}'),
('ac898113a135512dd68a22954de1c780', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.4 (KHTML, like Gecko) Chrome/22.0.1229.94 Safari/537.4', 1350649338, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE IF NOT EXISTS `tbldepartment` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(50) NOT NULL,
  `acronym` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`id`, `dept_name`, `acronym`) VALUES
(1, 'College of Nursing', 'CON'),
(2, 'College of Arts and Social Sciences', 'CASS'),
(3, 'School of Engineering Technology', 'SET'),
(4, 'School of Computer Studies', 'SCS'),
(5, 'College of Business Administration and Accounting', 'CBAA'),
(6, 'College of Education', 'CED'),
(7, 'College of Engineering', 'COE'),
(8, 'College of Science and Mathematics', 'CSM'),
(9, 'Department of Student Affairs', 'DSA');

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
  `office_id` int(16) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldescription`
--

INSERT INTO `tbldescription` (`user_id`, `first_name`, `last_name`, `profession`, `location`, `office_id`) VALUES
(7, 'Orven', 'Llantos', 'Professor', 'Computer Science Department', 2),
(8, 'Erik', 'Sala', 'Professor', 'Information Technology Department', 1),
(9, 'Dorward', 'Villlaruz', 'Professor', 'Computer Science Department', 2),
(10, 'Ernesto', 'Empig', 'Dean', 'Dean', 5),
(11, 'Renato', 'Crisostomo', 'Professor', 'Computer Science Department', 2),
(12, 'Dante', 'Dinawanao', 'Professor', 'College of Engineering: Computer Center', 7),
(13, 'Cyrus', 'Gabilla', 'Professor', 'Computer Science Department', 2),
(14, 'Haroun', 'Macalisang', 'Professor', 'Computer Science Department', 2),
(15, 'Malikey', 'Maulana', 'Professor', 'Computer Science Department', 2),
(16, 'Eli', 'Mostrales', 'Professor', 'Computer Science Department', 2),
(17, 'Jeremy', 'Pinzon', 'Professor', 'Computer Science Department', 2),
(18, 'Alquine Roy', 'Taculin', 'Professor', 'Computer Science Department', 4),
(19, 'Emily', 'Tabanao', 'Instructor', 'Information Technology Department', 1),
(20, 'Rabby', 'Lavilles', 'Assistant Professor', 'Information Technology Department', 4),
(21, 'Delilah', 'Soliva', 'Associate Professor', 'Information Technology Department', 1),
(22, 'Lomesindo', 'Caparida', 'Professor', 'Information Technology Department', 1),
(23, 'Charlie Louie', 'Luna', 'Lecturer', 'Computer Science Department', 2),
(24, 'Mark Anthony', 'Manlimos', 'Lecturer', 'Computer Science Department', 2),
(25, 'Ken Rothwyn', 'Mira', 'Lecturer', 'Computer Science Department', 2),
(26, 'Jennifer Joyce', 'Montemayor', 'Lecturer', 'Computer Science Department', 2),
(27, 'Manuel', 'Cabido', 'Associate Professor', 'Information Technology Department', 1),
(28, 'Danilo', 'Adlaon', 'Associate Professor', 'ESET Department', 0),
(29, 'Arven', 'Aguilar', 'Governor', 'Executive Council', 0),
(30, 'Noel', 'Estoperez', 'Professor', 'EC Department', 0),
(31, 'Jasmin', 'Ampaso', 'Registrar', 'DSA', 0),
(32, 'Joy', 'Aban', 'Cashier', 'DSA', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbldocument`
--

CREATE TABLE IF NOT EXISTS `tbldocument` (
  `tracking_id` int(16) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text,
  `date_time_sent` varchar(50) DEFAULT NULL,
  `page_number` int(16) DEFAULT NULL,
  PRIMARY KEY (`tracking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblinbox_handlers`
--

CREATE TABLE IF NOT EXISTS `tblinbox_handlers` (
  `office_id` int(16) NOT NULL,
  `user_id` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinbox_handlers`
--

INSERT INTO `tblinbox_handlers` (`office_id`, `user_id`) VALUES
(2, 7),
(1, 8),
(2, 9),
(5, 10),
(2, 11),
(7, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(1, 27);

-- --------------------------------------------------------

--
-- Table structure for table `tbloffices`
--

CREATE TABLE IF NOT EXISTS `tbloffices` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `dept_id` int(16) DEFAULT NULL,
  `office_name` varchar(50) NOT NULL,
  `acronym` varchar(15) DEFAULT NULL,
  `handler` int(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbloffices`
--

INSERT INTO `tbloffices` (`id`, `dept_id`, `office_name`, `acronym`, `handler`) VALUES
(1, 4, 'Information Technology Department', 'IT', 8),
(2, 4, 'Computer Science Department', 'CS', 24),
(3, 4, 'ESET', 'ESET', 28),
(4, 4, 'Accreditation''s Office', NULL, 20),
(5, 4, 'Dean''s Office', NULL, 10),
(6, 4, 'Executive Council', 'EC', 29),
(7, 7, 'Computer Center', NULL, 12),
(8, 7, 'Computer Engineering Department', 'EC', 30),
(9, 9, 'Registrar''s Office', NULL, 31),
(10, 9, 'Cashier', NULL, 32);

-- --------------------------------------------------------

--
-- Table structure for table `tblsenders_receivers`
--

CREATE TABLE IF NOT EXISTS `tblsenders_receivers` (
  `tracking_id` int(8) NOT NULL,
  `sender` int(8) NOT NULL,
  `receiver` int(8) DEFAULT NULL,
  `dept_id` int(16) DEFAULT NULL,
  `verified` tinyint(4) NOT NULL,
  `date_time_received` varchar(50) DEFAULT NULL,
  `display` tinyint(4) NOT NULL
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

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
(27, 'manuelcabido', 'e10adc3949ba59abbe56e057f20f883e'),
(28, 'daniloadlaon', 'e10adc3949ba59abbe56e057f20f883e'),
(29, 'arvenaguilar', 'e10adc3949ba59abbe56e057f20f883e'),
(30, 'noelestoperez', 'e10adc3949ba59abbe56e057f20f883e'),
(31, 'jasminampaso', 'e10adc3949ba59abbe56e057f20f883e'),
(32, 'joyaban', 'e10adc3949ba59abbe56e057f20f883e');

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
