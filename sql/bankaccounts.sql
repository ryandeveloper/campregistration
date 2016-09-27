-- phpMyAdmin SQL Dump
-- version 4.2.9.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2016 at 11:17 AM
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
-- Table structure for table `bankaccounts`
--

CREATE TABLE IF NOT EXISTS `bankaccounts` (
`BankAccountID` int(21) NOT NULL,
  `UserID` int(21) NOT NULL,
  `Address` varchar(128) NOT NULL,
  `SwiftCode` varchar(64) NOT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Name` varchar(64) NOT NULL,
  `AccountNumber` varchar(32) NOT NULL,
  `AccountName` varchar(64) NOT NULL,
  `TrustAccount` varchar(3) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bankaccounts`
--

INSERT INTO `bankaccounts` (`BankAccountID`, `UserID`, `Address`, `SwiftCode`, `DateAdded`, `Name`, `AccountNumber`, `AccountName`, `TrustAccount`) VALUES
(9, 100024, 'SM Dasma', '987', '2016-07-11 05:23:15', 'BPI', '1692536417785', 'Motul Limpao', 'N'),
(17, 100033, 'Carmona', '3641', '2016-07-12 09:02:49', 'Metrobank', '3125469857', 'Fred Simpson', 'N'),
(20, 100037, 'GMA', '467', '2016-07-29 08:23:48', 'Bank of the Philippine Islands', '9865325689784512', 'Levy Powel', 'N'),
(21, 100039, 'Ortigas', '458', '2016-07-29 08:26:54', 'Asia United Bank', '963852741852852', 'Mark Goloyugo', 'N'),
(22, 100040, 'Wanderlei', '3125', '2016-08-02 09:09:14', 'China Bank', '800005274196374', 'Momo Kamo', 'N'),
(25, 100043, 'Saba Malaysia', '124', '2016-08-03 22:30:58', 'Bank of Malaysia', '65200021123456789', 'Atarma Mutarwi', 'N'),
(26, 100044, 'asdf', 'sadf', '2016-08-12 09:24:50', 'asdf', 'sadf', 'sadf', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bankaccounts`
--
ALTER TABLE `bankaccounts`
 ADD PRIMARY KEY (`BankAccountID`), ADD KEY `BankAccountID` (`BankAccountID`), ADD KEY `BankAccountID_2` (`BankAccountID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bankaccounts`
--
ALTER TABLE `bankaccounts`
MODIFY `BankAccountID` int(21) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
