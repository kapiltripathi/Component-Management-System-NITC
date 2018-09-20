-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2018 at 05:36 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `component_distribution`
--
CREATE DATABASE IF NOT EXISTS `component_distribution` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `component_distribution`;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE `bill` (
  `billID` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(50) NOT NULL,
  `cost` int(11) NOT NULL,
  `labId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`billID`, `date`, `description`, `cost`, `labId`) VALUES
('12e3', '2018-04-14', 'fsdsvdsg', 12324, 'ECE1');

-- --------------------------------------------------------

--
-- Table structure for table `bill_component`
--

DROP TABLE IF EXISTS `bill_component`;
CREATE TABLE `bill_component` (
  `billID` varchar(10) NOT NULL,
  `compId` int(11) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_component`
--

INSERT INTO `bill_component` (`billID`, `compId`, `quantity`) VALUES
('12e3', 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `capital`
--

DROP TABLE IF EXISTS `capital`;
CREATE TABLE `capital` (
  `compId` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `labId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `capital`
--

INSERT INTO `capital` (`compId`, `name`, `description`, `labId`) VALUES
(2, 'dszf', 'zdsv', 'ECE1'),
(3, 'jh', 'zdskjg', 'ECE3'),
(4, 'asdfreddf', 'hgdydhchmh', 'ECE1');

-- --------------------------------------------------------

--
-- Table structure for table `capital_req`
--

DROP TABLE IF EXISTS `capital_req`;
CREATE TABLE `capital_req` (
  `requestId` int(11) NOT NULL,
  `requestNo` varchar(11) NOT NULL,
  `rollno` varchar(9) NOT NULL,
  `labId` varchar(10) NOT NULL,
  `compId` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `capital_req`
--

INSERT INTO `capital_req` (`requestId`, `requestNo`, `rollno`, `labId`, `compId`, `time`) VALUES
(6, '5', 'B150878CS', 'ECE1', 2, '2018-04-19 05:28:16'),
(7, '6', 'B150895CS', 'ECE1', 2, '2018-04-07 23:37:22'),
(8, '7', 'B150895CS', 'ECE1', 2, '2018-04-19 04:41:32'),
(9, '8', 'B150895CS', 'ECE1', 2, '2018-04-19 04:42:22'),
(10, '9', 'B150895CS', 'ECE1', 2, '2018-04-19 21:12:43'),
(11, '10', 'B150895CS', 'ECE3', 3, '2018-04-19 21:16:11');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `Id` varchar(9) NOT NULL,
  `labid` varchar(10) NOT NULL,
  `comment_subject` varchar(250) NOT NULL,
  `comment_text` varchar(250) NOT NULL,
  `comment_status` int(1) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `Id`, `labid`, `comment_subject`, `comment_text`, `comment_status`, `time`) VALUES
(2, 'B150895CS', 'ECE1', 'Request Accepted', 'The request  for  comp: 2 with Quantity 2 is partially accepted', 1, '2018-04-07 22:19:26'),
(3, 'B150895CS', 'ECE1', 'Request Accepted', 'The request  for  comp: 1 with Quantity 1 is accepted', 1, '2018-04-07 22:20:48'),
(4, 'B150895CS', 'ECE1', 'Request Decline', 'The request  for  comp: 2 with Quantity 1 is accepted', 1, '2018-04-07 22:20:50'),
(5, 'B150895CS', 'ECE1', 'Request Accepted', 'The request  for  comp: 2 with Quantity 2 is partially accepted', 1, '2018-04-07 23:39:58'),
(6, 'B150895CS', 'ECE1', 'Request Accepted', 'The request  for  comp: 2 with Quantity 2 is partially accepted', 1, '2018-04-07 23:39:58'),
(7, 'B150895CS', 'ECE1', 'Request Accepted', 'The request  for  comp: 2 with Quantity 2 is partially accepted', 1, '2018-04-07 23:39:58'),
(8, 'B150895CS', 'ECE1', 'Request Accepted', 'The request for comp: 2 with Quantity 2 is partially accepted', 1, '2018-04-07 23:39:58'),
(9, 'B150895CS', 'ECE1', 'Request Accepted', 'The request for comp: 2 with Quantity 2 is partially accepted', 1, '2018-04-07 23:39:58'),
(10, 'B150895CS', 'ECE1', 'Request Accepted', 'The request for comp: 2 with Quantity 2 is partially accepted', 1, '2018-04-07 23:39:58'),
(11, 'B150895CS', 'ECE1', 'Request Accepted', 'The request for comp: 2 with Quantity 2 is partially accepted', 1, '2018-04-07 23:39:58'),
(12, 'B150895CS', 'ECE1', 'Request Accepted', 'The request for comp: 2 with Quantity 2 is partially accepted', 1, '2018-04-07 23:39:58'),
(13, 'B150895CS', 'ECE1', 'Request Accepted', 'The request for comp: 2 with Quantity 2 is partially accepted', 1, '2018-04-07 23:39:58'),
(14, 'B150895CS', 'ECE1', 'Request Accepted', 'The request for comp: 2 with Quantity 2 is partially accepted', 1, '2018-04-07 23:39:58'),
(15, 'B150895CS', 'ECE1', 'Request Accepted', 'The request for comp: 2 with Quantity 2 is partially accepted', 1, '2018-04-07 23:39:58'),
(16, 'B150895CS', 'ECE1', 'Request Accepted', 'The request for comp: 2 with Quantity 2 is partially accepted', 1, '2018-04-07 23:39:58'),
(17, 'B150895CS', 'ECE1', 'Request Accepted', 'The request for comp: 2 with Quantity 2 is partially accepted', 1, '2018-04-07 23:39:58'),
(18, 'B150309CS', 'ECE1', 'Request for component', '  is requesting  for  comp:  with Quantity 10 is accepted', 1, '2018-04-19 03:02:28'),
(19, 'B150309CS', 'ECE1', 'Request for component', '  is requesting  for  comp:  with Quantity  is accepted', 1, '2018-04-19 03:04:13'),
(20, 'B150309CS', 'ECE1', 'Request for component', '  is requesting  for  comp:  with Quantity 10 is accepted', 1, '2018-04-19 03:04:13'),
(21, 'B150309CS', 'ECE1', 'Request for component', '  is requesting  for  comp:  with Quantity 10 is accepted', 1, '2018-04-19 03:04:44'),
(22, 'B150309CS', 'ECE1', 'Request for component', '  is requesting  for  comp:  with Quantity 10 is accepted', 1, '2018-04-19 03:04:44'),
(23, 'B150895CS', 'ECE1', 'Request Accepted', 'The request  for  comp: 1 with Quantity 1 is accepted', 1, '2018-04-19 22:24:28'),
(24, 'B150895CS', 'ECE1', 'Request Accepted', 'The request  for  comp: 1 with Quantity 12 is partially accepted', 1, '2018-04-19 22:24:40'),
(25, 'B150895CS', 'ECE1', 'Request Decline', 'The request  for  comp: 2 with Quantity 21 is accepted', 1, '2018-04-19 22:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `comment_fac`
--

DROP TABLE IF EXISTS `comment_fac`;
CREATE TABLE `comment_fac` (
  `comment_id` int(11) NOT NULL,
  `Id` varchar(9) NOT NULL,
  `labid` varchar(10) NOT NULL,
  `comment_subject` varchar(250) NOT NULL,
  `comment_text` varchar(250) NOT NULL,
  `comment_status` int(1) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_fac`
--

INSERT INTO `comment_fac` (`comment_id`, `Id`, `labid`, `comment_subject`, `comment_text`, `comment_status`, `time`) VALUES
(1, 'B150878CS', 'ECE1', 'Request for component', ' B150878CS is requesting  for  component 1 with Quantity 10 ', 1, '2018-04-19 04:48:53'),
(2, 'B150878CS', 'ECE1', 'Request for component', ' B150878CS is requesting  for  component 2 with Quantity 12 ', 1, '2018-04-19 04:48:54'),
(3, 'B150878CS', 'ECE1', 'Request for component', 'The STAFF B150878CS is requesting  for  component 1 with Quantity 30 ', 1, '2018-04-19 23:54:55'),
(4, 'B150878CS', 'ECE1', 'Request for component', 'The STAFF B150878CS is requesting  for  component 2 with Quantity 30 ', 1, '2018-04-19 23:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `comment_sta`
--

DROP TABLE IF EXISTS `comment_sta`;
CREATE TABLE `comment_sta` (
  `comment_id` int(11) NOT NULL,
  `Id` varchar(30) NOT NULL,
  `labid` varchar(10) NOT NULL,
  `comment_subject` varchar(250) NOT NULL,
  `comment_text` varchar(250) NOT NULL,
  `comment_status` int(1) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_sta`
--

INSERT INTO `comment_sta` (`comment_id`, `Id`, `labid`, `comment_subject`, `comment_text`, `comment_status`, `time`) VALUES
(1, '1', 'ECE1', 'Request for component', '  is requesting  for  comp:  with Quantity 10 is accepted', 1, '2018-04-19 04:36:48'),
(2, '1', 'ECE1', 'Request for component', '  is requesting  for  comp:  with Quantity 1 is accepted', 1, '2018-04-19 04:36:48'),
(3, '1', 'ECE1', 'Request for component', '  is requesting  for  comp:  with Quantity 10 is accepted', 1, '2018-04-19 04:38:42'),
(4, '1', 'ECE1', 'Request for component', '  is requesting  for  comp:  with Quantity 2 is accepted', 1, '2018-04-19 04:38:42'),
(5, '0', 'ECE1', 'Request for component', ' 2 is requesting  for  comp: 2 ', 1, '2018-04-19 04:41:32'),
(6, '0', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 2 ', 1, '2018-04-19 04:42:22'),
(7, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 2 is accepted', 1, '2018-04-19 21:11:47'),
(8, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 2 with Quantity 3 is accepted', 1, '2018-04-19 21:11:47'),
(9, '0', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 2 ', 1, '2018-04-19 21:12:43'),
(10, '1', 'ECE3', 'Request for component', ' B150895CS is requesting  for  comp:  with Quantity  is accepted', 0, '2018-04-19 21:15:01'),
(11, '1', 'ECE3', 'Request for component', ' B150895CS is requesting  for  comp:  with Quantity  is accepted', 0, '2018-04-19 21:15:01'),
(12, '1', 'ECE3', 'Request for component', ' B150895CS is requesting  for  comp: 3 with Quantity 6 is accepted', 0, '2018-04-19 21:15:01'),
(13, '1', 'ECE3', 'Request for component', ' B150895CS is requesting  for  comp: 4 with Quantity 3 is accepted', 0, '2018-04-19 21:15:01'),
(14, '1', 'ECE3', 'Request for component', ' B150895CS is requesting  for  comp:  with Quantity  is accepted', 0, '2018-04-19 21:15:18'),
(15, '1', 'ECE3', 'Request for component', ' B150895CS is requesting  for  comp:  with Quantity  is accepted', 0, '2018-04-19 21:15:18'),
(16, '1', 'ECE3', 'Request for component', ' B150895CS is requesting  for  comp:  with Quantity  is accepted', 0, '2018-04-19 21:15:19'),
(17, '1', 'ECE3', 'Request for component', ' B150895CS is requesting  for  comp:  with Quantity  is accepted', 0, '2018-04-19 21:15:19'),
(18, '0', 'ECE3', 'Request for component', ' B150895CS is requesting  for  comp:  ', 0, '2018-04-19 21:16:11'),
(19, '0', 'ECE3', 'Request for component', ' B150895CS is requesting  for  comp: 3 ', 0, '2018-04-19 21:16:11'),
(20, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 21 is accepted', 1, '2018-04-19 21:17:21'),
(21, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 2 with Quantity 21 is accepted', 1, '2018-04-19 21:17:21'),
(22, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 2 with Quantity 21 is accepted', 1, '2018-04-19 21:17:21'),
(23, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 2 with Quantity 21 is accepted', 1, '2018-04-19 21:17:21'),
(24, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 35 is accepted', 1, '2018-04-19 21:20:49'),
(25, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 2 with Quantity 35 is accepted', 1, '2018-04-19 21:20:49'),
(26, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 2 with Quantity 35 is accepted', 1, '2018-04-19 21:20:49'),
(27, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 2 with Quantity 35 is accepted', 1, '2018-04-19 21:20:49'),
(28, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 34 ', 1, '2018-04-19 21:40:43'),
(29, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 34 ', 1, '2018-04-19 21:40:43'),
(30, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 34 ', 1, '2018-04-19 21:40:43'),
(31, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 34 ', 1, '2018-04-19 21:40:43'),
(32, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 22 ', 1, '2018-04-19 21:42:31'),
(33, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 22 ', 1, '2018-04-19 21:42:31'),
(34, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 22 ', 1, '2018-04-19 21:42:31'),
(35, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 22 ', 1, '2018-04-19 21:42:31'),
(36, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 22 ', 1, '2018-04-19 21:43:21'),
(37, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 22 ', 1, '2018-04-19 21:43:21'),
(38, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 22 ', 1, '2018-04-19 21:43:21'),
(39, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 22 ', 1, '2018-04-19 21:43:21'),
(40, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 22 ', 1, '2018-04-19 21:47:15'),
(41, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 22 ', 1, '2018-04-19 21:47:15'),
(42, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 22 ', 1, '2018-04-19 21:47:15'),
(43, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 22 ', 1, '2018-04-19 21:47:15'),
(44, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 123 ', 1, '2018-04-19 21:47:32'),
(45, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 123 ', 1, '2018-04-19 21:47:32'),
(46, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 123 ', 1, '2018-04-19 21:47:32'),
(47, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 123 ', 1, '2018-04-19 21:47:32'),
(48, '1', 'ECE1', 'Request for component', ' B150895CS is requesting  for  comp: 1 with Quantity 43 ', 1, '2018-04-19 22:10:02'),
(49, 'B150878CS', 'ECE1', 'APPROVAL FOR PURCHASE', 'Request  for  comp: 2 with Quantity 30 is accepted', 1, '2018-04-20 11:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `consumable`
--

DROP TABLE IF EXISTS `consumable`;
CREATE TABLE `consumable` (
  `compId` int(11) NOT NULL,
  `value` varchar(10) NOT NULL,
  `unit` varchar(45) NOT NULL,
  `family` varchar(45) NOT NULL,
  `labId` varchar(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `number` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consumable`
--

INSERT INTO `consumable` (`compId`, `value`, `unit`, `family`, `labId`, `description`, `number`) VALUES
(1, '10', 'OHM', 'RESISTOR', 'ECE1', 'ASDFGHJK', 1456),
(2, '5', 'ohms', 'Resistor', 'ECE1', 'res', 498),
(3, '6', 'ohms', 'Resistor', 'ECE3', 'res', 400),
(4, '15', 'ohms', 'Resistor', 'ECE3', 'kj', 300),
(5, '21', 'ohm', 'resistor', 'ECE1', 'qwefghjk,.-pokijhgvc', 35);

-- --------------------------------------------------------

--
-- Table structure for table `dues`
--

DROP TABLE IF EXISTS `dues`;
CREATE TABLE `dues` (
  `dID` int(11) NOT NULL,
  `rollno` varchar(9) NOT NULL,
  `compId` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `labId` varchar(10) NOT NULL,
  `requestId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dues`
--

INSERT INTO `dues` (`dID`, `rollno`, `compId`, `number`, `time`, `labId`, `requestId`) VALUES
(2, 'B150892CS', 1, 14, '2018-04-19 15:13:51', 'ECE1', 1),
(3, 'B150895CS', 2, 13, '2018-04-19 15:19:43', 'ECE1', 2),
(4, 'B150895CS', 2, 2, '2018-04-19 15:19:52', 'ECE1', 4),
(5, 'B150895CS', 1, 1, '2018-04-07 23:35:33', '0', 3),
(6, 'B150895CS', 1, 12, '2018-04-08 23:51:48', '0', 5);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE `faculty` (
  `facultyid` varchar(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phoneno` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`facultyid`, `name`, `phoneno`, `email`) VALUES
('B150309CS', 'Anandhu sanil', '235456541', 'anandhu_b150309cs@nitc.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_labid`
--

DROP TABLE IF EXISTS `faculty_labid`;
CREATE TABLE `faculty_labid` (
  `facultyid` varchar(11) NOT NULL,
  `labid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_labid`
--

INSERT INTO `faculty_labid` (`facultyid`, `labid`) VALUES
('B150309CS', 'ECE1'),
('B150309CS', 'ECE3');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

DROP TABLE IF EXISTS `lab`;
CREATE TABLE `lab` (
  `labId` varchar(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `location` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`labId`, `name`, `description`, `location`) VALUES
('ECE1', 'Electronics Lab', 'sdfasf', 'NITC'),
('ECE3', 'Lab for elect', 'askjfnalsnnk', 'ndwvnwl');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE `purchase` (
  `BillNo` varchar(30) NOT NULL,
  `CompID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE `registration` (
  `RegID` int(11) NOT NULL,
  `Roll No` varchar(9) NOT NULL,
  `labId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE `request` (
  `requestId` int(11) NOT NULL,
  `requestNo` varchar(11) NOT NULL,
  `rollno` varchar(9) NOT NULL,
  `labId` varchar(10) NOT NULL,
  `status` varchar(9) NOT NULL,
  `compId` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`requestId`, `requestNo`, `rollno`, `labId`, `status`, `compId`, `number`, `time`) VALUES
(4, '1', 'B150895CS', 'ECE1', 'Partial', 2, 1, '2018-04-07 23:35:33'),
(5, '2', 'B150895CS', 'ECE1', 'Partial', 1, 9, '2018-04-08 23:51:48'),
(7, '3', 'B150895CS', 'ECE1', 'New', 1, 3, '2018-04-09 10:33:38'),
(8, '3', 'B150895CS', 'ECE1', 'New', 2, 3, '2018-04-09 10:33:38'),
(9, '4', 'B150309CS', 'ECE1', 'New', 1, 10, '2018-04-19 03:02:29'),
(10, '5', 'B150309CS', 'ECE1', 'New', 2, 10, '2018-04-19 03:04:13'),
(11, '6', 'B150309CS', 'ECE1', 'New', 1, 10, '2018-04-19 03:04:43'),
(12, '6', 'B150309CS', 'ECE1', 'New', 2, 10, '2018-04-19 03:04:44'),
(13, '7', 'B150895CS', 'ECE1', 'New', 1, 10, '2018-04-19 04:36:48'),
(14, '7', 'B150895CS', 'ECE1', 'New', 2, 1, '2018-04-19 04:36:48'),
(15, '8', 'B150895CS', 'ECE1', 'New', 1, 10, '2018-04-19 04:38:42'),
(16, '8', 'B150895CS', 'ECE1', 'New', 2, 2, '2018-04-19 04:38:42'),
(17, '9', 'B150895CS', 'ECE1', 'New', 1, 2, '2018-04-19 21:11:47'),
(18, '9', 'B150895CS', 'ECE1', 'New', 2, 3, '2018-04-19 21:11:47'),
(19, '10', 'B150895CS', 'ECE3', 'New', 3, 6, '2018-04-19 21:15:01'),
(20, '10', 'B150895CS', 'ECE3', 'New', 4, 3, '2018-04-19 21:15:01'),
(21, '10', 'B150895CS', 'ECE1', 'New', 1, 21, '2018-04-19 21:17:21'),
(22, '10', 'B150895CS', 'ECE1', 'New', 2, 21, '2018-04-19 21:17:21'),
(23, '10', 'B150895CS', 'ECE1', 'New', 1, 35, '2018-04-19 21:20:49'),
(24, '10', 'B150895CS', 'ECE1', 'New', 2, 35, '2018-04-19 21:20:49'),
(25, '10', 'B150895CS', 'ECE1', 'New', 1, 34, '2018-04-19 21:40:43'),
(26, '10', 'B150895CS', 'ECE1', 'New', 1, 22, '2018-04-19 21:42:31'),
(27, '10', 'B150895CS', 'ECE1', 'New', 1, 22, '2018-04-19 21:43:21'),
(28, '10', 'B150895CS', 'ECE1', 'New', 1, 22, '2018-04-19 21:47:15'),
(29, '10', 'B150895CS', 'ECE1', 'New', 1, 123, '2018-04-19 21:47:32'),
(30, '10', 'B150895CS', 'ECE1', 'New', 1, 43, '2018-04-19 22:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `srequest`
--

DROP TABLE IF EXISTS `srequest`;
CREATE TABLE `srequest` (
  `requestId` int(11) NOT NULL,
  `staffId` varchar(30) NOT NULL,
  `labId` varchar(10) NOT NULL,
  `RequestNo` varchar(11) NOT NULL,
  `compId` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srequest`
--

INSERT INTO `srequest` (`requestId`, `staffId`, `labId`, `RequestNo`, `compId`, `number`, `time`) VALUES
(12, 'B150878CS', 'ECE1', '11', 2, 51, '2018-04-19 23:54:55'),
(13, 'B150878CS', 'ECE1', '11', 2, 24, '2018-04-19 23:54:55'),
(14, 'B150878CS', 'ECE1', '11', 2, 42, '2018-04-19 23:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `staff_incharge`
--

DROP TABLE IF EXISTS `staff_incharge`;
CREATE TABLE `staff_incharge` (
  `staffId` varchar(30) NOT NULL,
  `labId` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_incharge`
--

INSERT INTO `staff_incharge` (`staffId`, `labId`, `name`, `email`, `phone`) VALUES
('B150878CS', 'ECE1', 'Uddhav Raj', 'uddhav_b150878ee@nitc.ac.in', '7894561235');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `rollno` varchar(9) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`rollno`, `name`, `email`, `phone`) VALUES
('B150895CS', 'ROHIT AJIT MESRHAM', 'rohitajit_b150895cs@nitc.ac.in', '8957458965');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `email` varchar(256) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `type`) VALUES
('devan_b150072cs@nitc.ac.in', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`billID`);

--
-- Indexes for table `bill_component`
--
ALTER TABLE `bill_component`
  ADD PRIMARY KEY (`billID`,`compId`);

--
-- Indexes for table `capital`
--
ALTER TABLE `capital`
  ADD PRIMARY KEY (`compId`),
  ADD UNIQUE KEY `compId_UNIQUE` (`compId`);

--
-- Indexes for table `capital_req`
--
ALTER TABLE `capital_req`
  ADD PRIMARY KEY (`requestId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `comment_fac`
--
ALTER TABLE `comment_fac`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `comment_sta`
--
ALTER TABLE `comment_sta`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `consumable`
--
ALTER TABLE `consumable`
  ADD PRIMARY KEY (`compId`);

--
-- Indexes for table `dues`
--
ALTER TABLE `dues`
  ADD PRIMARY KEY (`dID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`facultyid`);

--
-- Indexes for table `faculty_labid`
--
ALTER TABLE `faculty_labid`
  ADD PRIMARY KEY (`facultyid`,`labid`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`labId`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`BillNo`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`RegID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`requestId`);

--
-- Indexes for table `srequest`
--
ALTER TABLE `srequest`
  ADD PRIMARY KEY (`requestId`);

--
-- Indexes for table `staff_incharge`
--
ALTER TABLE `staff_incharge`
  ADD PRIMARY KEY (`staffId`),
  ADD UNIQUE KEY `PhoneNo` (`phone`),
  ADD UNIQUE KEY `EmailID` (`email`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`rollno`),
  ADD UNIQUE KEY `Roll No` (`rollno`),
  ADD UNIQUE KEY `PhoneNo` (`phone`),
  ADD UNIQUE KEY `EmailID` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `capital`
--
ALTER TABLE `capital`
  MODIFY `compId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `capital_req`
--
ALTER TABLE `capital_req`
  MODIFY `requestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `comment_fac`
--
ALTER TABLE `comment_fac`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comment_sta`
--
ALTER TABLE `comment_sta`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `consumable`
--
ALTER TABLE `consumable`
  MODIFY `compId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dues`
--
ALTER TABLE `dues`
  MODIFY `dID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `RegID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `requestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `srequest`
--
ALTER TABLE `srequest`
  MODIFY `requestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
