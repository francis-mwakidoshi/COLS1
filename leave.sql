-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 08, 2017 at 02:46 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `leave`
--
CREATE DATABASE IF NOT EXISTS `leave` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `leave`;

-- --------------------------------------------------------

--
-- Table structure for table `ceo`
--

CREATE TABLE IF NOT EXISTS `ceo` (
  `ceoID` int(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(65) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  PRIMARY KEY (`ceoID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ceo`
--

INSERT INTO `ceo` (`ceoID`, `name`, `username`, `password`) VALUES
(1, 'Davis wanaina peter', 'ceo_wanaina', 'wanaina@davis');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `deptID` int(9) NOT NULL AUTO_INCREMENT,
  `deptName` text NOT NULL,
  PRIMARY KEY (`deptID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`deptID`, `deptName`) VALUES
(1, 'Information Technology(IT)'),
(2, 'Financial Department'),
(3, 'Research Department'),
(4, 'Audit Department');

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE IF NOT EXISTS `hod` (
  `hodID` int(9) NOT NULL AUTO_INCREMENT,
  `deptID` int(9) NOT NULL,
  `telno` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  PRIMARY KEY (`hodID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`hodID`, `deptID`, `telno`, `name`, `username`, `password`) VALUES
(1, 1, 708009360, 'Rodgers kemboi', 'IT@rodgers', 'IT@rodgers'),
(2, 2, 711733346, 'Alice Nyambura', 'finance@nyambura', 'finance@nyambura'),
(3, 3, 708009360, 'Isaac wahome', 'research@wahome', 'research@wahome'),
(4, 4, 708009360, 'Judith Metto', 'audit@metto', 'audit@metto');

-- --------------------------------------------------------

--
-- Table structure for table `leavecategory`
--

CREATE TABLE IF NOT EXISTS `leavecategory` (
  `leaveID` int(9) NOT NULL AUTO_INCREMENT,
  `category` varchar(55) NOT NULL,
  `Days` int(9) NOT NULL,
  PRIMARY KEY (`leaveID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `leavecategory`
--

INSERT INTO `leavecategory` (`leaveID`, `category`, `Days`) VALUES
(1, 'Annual leave', 30),
(2, 'sick leave', 90),
(3, 'Special leave', 7),
(4, 'compassionate', 7),
(5, 'leave of Absence', 730),
(6, 'maternity leave', 60),
(7, 'partenity leave', 7);

-- --------------------------------------------------------

--
-- Table structure for table `leavedetails`
--

CREATE TABLE IF NOT EXISTS `leavedetails` (
  `Id` int(9) NOT NULL AUTO_INCREMENT,
  `staffID` int(11) NOT NULL,
  `dateApply` date NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `leaveId` int(9) NOT NULL,
  `leaveReason` text NOT NULL,
  `contactNO` int(9) NOT NULL,
  `Evidence` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `leavedetails`
--

INSERT INTO `leavedetails` (`Id`, `staffID`, `dateApply`, `startDate`, `endDate`, `leaveId`, `leaveReason`, `contactNO`, `Evidence`) VALUES
(44, 88, '2017-10-31', '2017-10-31', '2017-11-22', 5, 'test', 708009360, '../evidence/francisking.docx'),
(43, 88, '2017-07-06', '2017-07-13', '2017-07-28', 2, 'test', 708009360, '../evidence/Logical design guide.docx'),
(42, 88, '2017-06-09', '2017-06-03', '2017-06-23', 2, 'test', 2147483647, '../evidence/CV.docx'),
(41, 90, '2017-06-30', '2017-06-23', '2017-07-27', 2, 'academic leave', 2147483647, '../evidence/mwakidoshi68f.docx'),
(40, 89, '2017-06-09', '2017-06-02', '2017-06-23', 3, 'test', 2147483647, '../evidence/CV.docx'),
(39, 88, '2017-06-09', '2017-06-03', '2017-06-16', 2, 'test', 2147483647, '../evidence/CV.docx'),
(38, 88, '2017-06-01', '2017-06-10', '2017-06-16', 2, 'test', 2147483647, '../evidence/CV.docx'),
(37, 88, '2017-06-02', '2017-06-02', '2017-06-08', 2, 'okay', 2147483647, '../evidence/CV.docx'),
(36, 88, '2017-06-08', '2017-06-09', '2017-06-23', 3, 'okay', 2147483647, '../evidence/CV.docx'),
(35, 88, '2017-06-15', '2017-06-16', '2017-06-30', 2, 'testing', 2147483647, '../evidence/application.docx'),
(34, 2, '2017-06-01', '2017-06-01', '2017-06-16', 3, 'TST', 2147483647, '../evidence/CV.docx'),
(31, 3, '2017-06-09', '2017-06-02', '2017-06-02', 3, 'test', 2147483647, '../evidence/application.docx'),
(32, 2, '2017-06-01', '2017-06-03', '2017-07-05', 2, 'test', 2147483647, '../evidence/CV.docx'),
(33, 4, '2017-06-01', '2017-06-23', '2017-06-30', 2, 'TEST', 2147483647, '../evidence/hilla.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `leavestatus`
--

CREATE TABLE IF NOT EXISTS `leavestatus` (
  `statusId` int(9) NOT NULL AUTO_INCREMENT,
  `staffID` int(9) NOT NULL,
  `HODApproval` text NOT NULL,
  PRIMARY KEY (`statusId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `leavestatus`
--

INSERT INTO `leavestatus` (`statusId`, `staffID`, `HODApproval`) VALUES
(1, 24, 'approved'),
(2, 23, 'approved'),
(3, 3, 'approved'),
(4, 2, 'approved'),
(5, 3, 'approved'),
(6, 2, 'approved'),
(7, 4, 'approved'),
(8, 2, 'approved'),
(9, 88, 'approved'),
(10, 89, 'approved'),
(11, 90, 'approved'),
(12, 88, 'approved'),
(13, 88, 'approved'),
(14, 88, 'approved'),
(15, 88, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `personelofficer`
--

CREATE TABLE IF NOT EXISTS `personelofficer` (
  `officerID` int(9) NOT NULL AUTO_INCREMENT,
  `telno` int(100) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  PRIMARY KEY (`officerID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `personelofficer`
--

INSERT INTO `personelofficer` (`officerID`, `telno`, `name`, `username`, `password`) VALUES
(2, 708009360, 'kevin nyakundi', 'kevo', 'kevo');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `Id` int(100) NOT NULL AUTO_INCREMENT,
  `Fname` varchar(55) NOT NULL,
  `Mname` varchar(55) NOT NULL,
  `Lname` varchar(55) NOT NULL,
  `staffno` varchar(65) NOT NULL,
  `departmentId` int(9) NOT NULL,
  `gender` varchar(55) NOT NULL,
  `position` varchar(55) NOT NULL,
  `address` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `telephone` int(9) NOT NULL,
  `username` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Id`, `Fname`, `Mname`, `Lname`, `staffno`, `departmentId`, `gender`, `position`, `address`, `email`, `telephone`, `username`, `password`) VALUES
(88, 'Tum', 'Mwakidoshi', 'Mwambai', '2017', 1, 'male', 'programmer', '120', 'tum@gmail.com', 708009360, 'tum', 'tum'),
(2, 'Francis', 'mwakidoshi', 'kingdoshi', '123', 1, 'male', 'programmer', '01234564777', 'francis@bluedigital.co.ke', 708009360, 'king', 'geo'),
(3, 'Francis', 'Mwakidoshi', 'Mwambai', '1008', 1, 'male', 'lecture', '105', 'francisdoshi@bluedigital.co.ke', 2147483647, 'doshi', 'king'),
(4, 'Paticia', 'Kanana', 'Muraura', '1009', 2, 'female', 'lecture', '321', 'patty@gmail.com', 2147483647, 'patty', 'patty'),
(89, 'Simon', 'Fred', 'Cdrick', '2018', 1, 'male', 'programmer', '254', 'gg@gmail.com', 717707825, 'sim', 'sim'),
(90, 'Elly', 'Kits', 'Nerdstone', '2015', 1, 'male', 'Programmer', '424', 'ellykits@yahoo.com', 2147483647, 'ellykits', '123456'),
(91, 'King', 'Mwakidoshi', 'Muraura', '20145', 1, 'male', 'Programmer', '20145', 'fgk@gmail.com', 2147483647, 'test', 'test12'),
(92, 'King', 'Mwakidoshi', 'Muraura', '20145', 1, 'male', 'Programmer', '20145', 'fgk@gmail.com', 2147483647, 'test', 'test12'),
(93, 'KNHH', 'kin', 'Goood', '4587', 1, 'male', 'Programmer', '548', 'kib@gmail.com', 717702504, 'king', 'kiinf');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
