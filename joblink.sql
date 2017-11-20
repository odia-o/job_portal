-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2016 at 01:07 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `joblink`
--

-- --------------------------------------------------------

--
-- Table structure for table `approvals`
--

CREATE TABLE IF NOT EXISTS `approvals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration_date` datetime NOT NULL,
  `status` char(1) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `approvals`
--

INSERT INTO `approvals` (`id`, `registration_date`, `status`, `name`, `email`) VALUES
(1, '2016-11-22 00:00:00', 'Y', 'Coconut', 'coconut@gmail.com'),
(2, '2016-11-08 09:00:00', 'Y', 'plantain', 'plantain@gmail.com'),
(3, '2016-11-08 00:00:00', 'Y', 'Transcorp', 'transcorp@gmail.com'),
(4, '2016-11-16 11:00:00', 'Y', 'Table', 'table@gmail.com'),
(5, '2016-11-08 00:00:00', 'Y', 'biro', 'biro@gmail.com'),
(6, '0000-00-00 00:00:00', 'N', 'good', 'good@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `companytable`
--

CREATE TABLE IF NOT EXISTS `companytable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `postal_code` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `biography` varchar(100) DEFAULT NULL,
  `services` varchar(70) DEFAULT NULL,
  `vision` varchar(70) DEFAULT NULL,
  `staff_number` int(2) DEFAULT NULL,
  `clients` varchar(20) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `address` varchar(255) NOT NULL,
  `approval_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `companytable`
--

INSERT INTO `companytable` (`id`, `name`, `postal_code`, `email`, `phone`, `biography`, `services`, `vision`, `staff_number`, `clients`, `password`, `address`, `approval_id`) VALUES
(1, 'Coconut', '1109112', 'coconut@gmail.com', '07023322111', 'Five star coconut selling institution', 'coconut', 'to be the best', 10, 'ALL', '763b8741d9f1a6fb4e0b72865d993f33', '54,Truth str, Rihanna, Ogun state.', 1),
(2, 'plantain', '1109112', 'food@gmail.com', '09067362734', 'baking since 1990', 'baking', 'to be the best', 100000, 'ALL', '5dd80efb8e54f276065fa70926ec949f', '1, kolo str, leed, Ekiti.', 2),
(3, 'Transcorp', '1109112', 'transcorp@gmail.com', '09067362734', 'technology stuffs', 'computer installation', 'to be great', 10092, 'ALL', '0b3df489c96c7ac5778d00efce213eea', '7, Rihanna, Drake, Lagos.', 3),
(4, 'Table', '1009233', 'table@gmail.com', '09063773833', 'making tables since like forever', 'making tables', 'to be outstanding', 10092, 'ALL', 'aab9e1de16f38176f86d7a92ba337a8d', '78, tee str, oluwablessme, Lagos.', 4),
(5, 'biro', '1009233', 'biro@gmail.com', '08063828223', 'biro making since birth', 'biro production', 'to be mighty', 10000, 'ALL', '42442b1831c03b0e2bfc34a21e71f563', '33, neverdie str, livelife, Lagos.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `cvtable`
--

CREATE TABLE IF NOT EXISTS `cvtable` (
  `id` int(11) NOT NULL,
  `filename` varchar(30) DEFAULT NULL,
  `filepath` varchar(50) DEFAULT NULL,
  `date_recieved` varchar(20) DEFAULT NULL,
  `user_id` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `end_date` date NOT NULL,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `company_id`, `title`, `description`, `post_date`, `end_date`, `category`) VALUES
(1, 1, 'Manager', 'Big Office, secretary', '2016-11-13', '2016-11-17', 'Accounting / Finance'),
(2, 1, 'Cleaner', '24hrs cleaning', '2016-11-23', '2016-11-12', 'Accounting / Finance');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE IF NOT EXISTS `usertable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) DEFAULT NULL,
  `firstname` varchar(25) DEFAULT NULL,
  `lastname` varchar(25) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `dob` date NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `access` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `username`, `firstname`, `lastname`, `gender`, `dob`, `email`, `phone`, `password`, `access`) VALUES
(1, '__odia', 'Oghenevwede', 'Odia', 'M', '0000-00-00', 'odiaoghenevwede@gmail.com', '08124040519', 'f170470064ee6beabfb6e4a419e77bdc', 'a'),
(4, 'bolu', 'bolu', 'bolu', 'F', '2016-11-20', 'bolu@gmail.com', '09067383622', '3573b51824147102d20b6e61ea29a89d', 'b'),
(8, 'tobi', 'tobi', 'tobi', 'M', '0000-00-00', 'tobi@gmail.com', '09087657489', 'e0dd692dcb560bc04bfa1cbfaca9ecff', ''),
(9, 'onome', 'onome', 'onome', 'F', '2016-11-20', 'onome@gmail.com', '08124040519', '5842ddf1a359ef5e60d621cb8793967c', 'a'),
(10, 'bolu', 'bolu', 'bolu', '', '0000-00-00', 'bolu@gmail.com', '09067383622', '3573b51824147102d20b6e61ea29a89d', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `user_job`
--

CREATE TABLE IF NOT EXISTS `user_job` (
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `registration_date` date NOT NULL,
  `approved` char(1) NOT NULL,
  PRIMARY KEY (`user_id`,`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_job`
--

INSERT INTO `user_job` (`user_id`, `job_id`, `registration_date`, `approved`) VALUES
(4, 1, '2016-11-16', 'N'),
(4, 2, '2016-11-17', 'N');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
