-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2014 at 07:14 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `buzzspot`
--

-- --------------------------------------------------------

--
-- Table structure for table `alcohol_table`
--

CREATE TABLE IF NOT EXISTS `alcohol_table` (
  `alcohol_id` int(10) NOT NULL,
  `alcohol_type` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  PRIMARY KEY (`alcohol_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alcohol_table`
--

INSERT INTO `alcohol_table` (`alcohol_id`, `alcohol_type`, `brand`) VALUES
(5565, 'Vodka', 'Smirnoff'),
(6969, 'Whiskey', 'Blender''s Pride');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(50) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`) VALUES
(1, 'Delhi'),
(2, 'Gurgaon');

-- --------------------------------------------------------

--
-- Table structure for table `db_admin_tbl`
--

CREATE TABLE IF NOT EXISTS `db_admin_tbl` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_admin_tbl`
--

INSERT INTO `db_admin_tbl` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `main_table`
--

CREATE TABLE IF NOT EXISTS `main_table` (
  `shop_id` int(10) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `alcohol_id` int(10) NOT NULL,
  `pin` int(6) NOT NULL,
  `full` int(5) NOT NULL,
  `half` int(5) NOT NULL,
  `quarter` int(5) NOT NULL,
  PRIMARY KEY (`shop_id`),
  KEY `pin` (`pin`),
  KEY `alcohol_id` (`alcohol_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_table`
--

INSERT INTO `main_table` (`shop_id`, `shop_name`, `alcohol_id`, `pin`, `full`, `half`, `quarter`) VALUES
(123456, 'Discovery Wines', 6969, 122015, 600, 400, 250),
(543210, 'Gagan Wines', 5565, 122016, 700, 500, 300);

-- --------------------------------------------------------

--
-- Table structure for table `pin_table`
--

CREATE TABLE IF NOT EXISTS `pin_table` (
  `pin` int(6) NOT NULL,
  `sector` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  PRIMARY KEY (`pin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pin_table`
--

INSERT INTO `pin_table` (`pin`, `sector`, `city`) VALUES
(122015, 'Sector 22', 'Gurgaon'),
(122016, 'Sector 23', 'Gurgaon');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `main_table`
--
ALTER TABLE `main_table`
  ADD CONSTRAINT `main_table_ibfk_1` FOREIGN KEY (`pin`) REFERENCES `pin_table` (`pin`),
  ADD CONSTRAINT `main_table_ibfk_2` FOREIGN KEY (`alcohol_id`) REFERENCES `alcohol_table` (`alcohol_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
