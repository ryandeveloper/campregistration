-- phpMyAdmin SQL Dump
-- version 4.2.9.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2016 at 11:18 AM
-- Server version: 5.5.40
-- PHP Version: 5.4.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `odeonco_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `usercapabilities`
--

CREATE TABLE IF NOT EXISTS `usercapabilities` (
`UserCapabilityID` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Description` text NOT NULL,
  `Active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usercapabilities`
--

INSERT INTO `usercapabilities` (`UserCapabilityID`, `Name`, `Description`, `Active`) VALUES
(1, 'Post Announcement', '', 1),
(2, 'Read Announcement', '', 1),
(3, 'Download/Email Demand Note', '', 1),
(4, 'Approve/Reject Uploaded Document', '', 1),
(5, 'Approve/Reject Application', '', 1),
(6, 'Download Commencement Letter', '', 1),
(7, 'View Hidden Case File', '', 1),
(8, 'Hide/Show Case File', '', 1),
(9, 'Role Control', '', 1),
(10, 'Change Password', '', 1),
(11, 'Admin List', '', 1),
(12, 'Admin Details', '', 1),
(13, 'Agency List', '', 1),
(14, 'Agency Details', '', 1),
(15, 'Agent List', '', 1),
(16, 'Agent Details', '', 1),
(17, 'Network Hierarchy', '', 1),
(18, 'Commission Report', '', 1),
(19, 'Sales Report', '', 1),
(20, 'Commission Log', '', 1),
(21, 'Quarterly Statement', '', 1),
(22, 'IPO Subscription List', '', 1),
(23, 'Manage Account Application List', 'Manage accounts', 1),
(24, 'Representative Application List', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usercapabilities`
--
ALTER TABLE `usercapabilities`
 ADD PRIMARY KEY (`UserCapabilityID`), ADD KEY `UserCapabilityID` (`UserCapabilityID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usercapabilities`
--
ALTER TABLE `usercapabilities`
MODIFY `UserCapabilityID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
