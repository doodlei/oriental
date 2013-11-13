-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2013 at 12:15 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gwms`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerinfo`
--

CREATE TABLE IF NOT EXISTS `customerinfo` (
  `cus_id` int(11) NOT NULL AUTO_INCREMENT,
  `cusname` varchar(100) DEFAULT NULL,
  `cusaddress` varchar(255) DEFAULT NULL,
  `keycontact_person` varchar(200) DEFAULT NULL,
  `cellnumber` varchar(200) DEFAULT NULL,
  `inserteddate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatetime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gwms_users`
--

CREATE TABLE IF NOT EXISTS `gwms_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `salt` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `cellnumber` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usertype` int(2) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `inserteddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isActive` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  KEY `usertype` (`usertype`),
  KEY `cus_id` (`cus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shiptype`
--

CREATE TABLE IF NOT EXISTS `shiptype` (
  `shiptype_id` int(11) NOT NULL AUTO_INCREMENT,
  `typename` varchar(100) DEFAULT NULL,
  `updatetime` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`shiptype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=7 ;

--
-- Dumping data for table `shiptype`
--

INSERT INTO `shiptype` (`shiptype_id`, `typename`, `updatetime`) VALUES
(1, 'New Shipment', NULL),
(2, 'Repair Return', NULL),
(3, 'Replace Return', NULL),
(4, 'Loan', NULL),
(5, 'STC', NULL),
(6, 'Good', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uom`
--

CREATE TABLE IF NOT EXISTS `uom` (
  `uom_id` int(11) NOT NULL AUTO_INCREMENT,
  `measurement` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`uom_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=5 ;

--
-- Dumping data for table `uom`
--

INSERT INTO `uom` (`uom_id`, `measurement`) VALUES
(1, 'Meter'),
(2, 'Feet'),
(3, 'Set'),
(4, 'Piece');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `upass` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uemail` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uname` (`uname`),
  UNIQUE KEY `uemail` (`uemail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `upass`, `fullname`, `uemail`) VALUES
(1, 'sam', 'samraj77', 'Samrat Khan', 'aynamohol@yahoo.com'),
(2, 'zorj', 'asjdfl', 'Zorj', 'zorj.bd@gmail.com'),
(3, 'babul', 'babul', 'Babul Siddique', 'babul.siddique@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `typename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`type_id`, `typename`, `user_role`) VALUES
(1, 'Administrator', '4'),
(2, 'Warehouse Manager', '3'),
(3, 'Logistics', '2'),
(4, 'Engineer', '1');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE IF NOT EXISTS `warehouses` (
  `warehouse_id` int(11) NOT NULL AUTO_INCREMENT,
  `warehousename` varchar(130) DEFAULT NULL,
  `warehouseaddress` varchar(130) DEFAULT NULL,
  `customerdefinedname` varchar(100) DEFAULT NULL,
  `inserteddate` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatetime` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`warehouse_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `wms_users`
--

CREATE TABLE IF NOT EXISTS `wms_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `salt` char(16) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `utype` int(2) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `inserteddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatetime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isActive` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `cus_id` (`cus_id`),
  KEY `utype` (`utype`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=3 ;

--
-- Dumping data for table `wms_users`
--

INSERT INTO `wms_users` (`id`, `username`, `password`, `salt`, `email`, `utype`, `cus_id`, `inserteddate`, `updatetime`, `isActive`) VALUES
(1, 'samrat', '3433083b0659ffd89af4b54bf2b7b7a110c210bbc151dae59d202c7cebecbe0e', '33dbc8d2790b3d30', 'skydotint@gmail.com', 1, 1, '2013-04-22 02:08:57', '0000-00-00 00:00:00', 1),
(2, 'zorj', 'ca82ba145c70199953077db1a0a28bccef82ddb7de82c19ecef9533603759993', '4525430442695f73', 'zorj@gmail.com', 3, 1, '2013-04-27 04:35:49', '0000-00-00 00:00:00', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gwms_users`
--
ALTER TABLE `gwms_users`
  ADD CONSTRAINT `cus_id_for_gwms_users` FOREIGN KEY (`cus_id`) REFERENCES `customerinfo` (`cus_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usertype_for_gwms_users` FOREIGN KEY (`usertype`) REFERENCES `usertype` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
