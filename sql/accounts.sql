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
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
`AccountID` int(21) NOT NULL,
  `CaseFileID` int(21) NOT NULL,
  `UserID` int(21) NOT NULL,
  `BankAccountID` int(21) NOT NULL,
  `ReferrerUserID` int(21) NOT NULL,
  `AccountType` varchar(128) NOT NULL,
  `AccountTitle` varchar(128) NOT NULL,
  `DepositedAmount` float NOT NULL,
  `CompanyName` varchar(128) NOT NULL,
  `CompanyDocument` text NOT NULL,
  `PhotoId` text NOT NULL,
  `Agreement` text NOT NULL,
  `BankAccountProof` text NOT NULL,
  `RegistrationNo` varchar(64) NOT NULL,
  `RegistrationAddress` varchar(256) NOT NULL,
  `RegistrationCountry` varchar(64) NOT NULL,
  `RegistrationTelephone` varchar(32) NOT NULL,
  `BusinessAddress` varchar(256) NOT NULL,
  `BusinessCountry` varchar(128) NOT NULL,
  `ApplicationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `AccountStatus` varchar(32) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB AUTO_INCREMENT=10019 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`AccountID`, `CaseFileID`, `UserID`, `BankAccountID`, `ReferrerUserID`, `AccountType`, `AccountTitle`, `DepositedAmount`, `CompanyName`, `CompanyDocument`, `PhotoId`, `Agreement`, `BankAccountProof`, `RegistrationNo`, `RegistrationAddress`, `RegistrationCountry`, `RegistrationTelephone`, `BusinessAddress`, `BusinessCountry`, `ApplicationDate`, `AccountStatus`) VALUES
(10000, 10000, 100021, 0, 100024, 'Individual', '', 140, 'Mogol', '', '0', '0', '0', '', '', '', '', '', '', '2016-07-01 08:37:21', 'Pending'),
(10008, 10008, 100033, 0, 100021, 'Individual', 'BA', 20000, '', '', '0', '0', '0', '', '', '', '', '', '', '2016-07-12 08:27:38', 'Pending'),
(10009, 0, 100035, 0, 100021, 'Individual', '', 0, 'CuteArts', 'YToxOntpOjA7czo1NzoiLzIwMTYvMDcvMjUvMWJlMDI2OGJfN2Q2YmUzNjhhMTdlN2JkZjMwOGEwMjI1YjRjYTllYjYuanBnIjt9', '0', '0', '0', '', '', '', '', '', '', '2016-07-25 16:37:23', 'Pending'),
(10010, 0, 100036, 0, 100035, 'Individual', '', 0, 'Wipisss', 'YToxOntpOjA7czo1NzoiLzIwMTYvMDcvMjgvNjNhYjdhMmRfN2Q2YmUzNjhhMTdlN2JkZjMwOGEwMjI1YjRjYTllYjYuanBnIjt9', '0', '0', '0', '', '', '', '', '', '', '2016-07-28 15:45:45', 'Pending'),
(10011, 0, 100037, 20, 100021, 'Individual', '', 0, 'Warthog', '', 'YToyOntpOjA7czoyNjoiLzIwMTYvMDcvMjgvZDM3NjIwMWJfMS5qcGciO2k6MTtzOjI2OiIvMjAxNi8wNy8yOC9iOWU3Zjk3OF8xLnBuZyI7fQ==', 'YTozOntpOjA7czo2MToiLzIwMTYvMDcvMjgvMWIzMGE5ZTlfOEFDRDk3QUMtMEE5OC00M0JBLUFFNEQtQTdDRkIzQUQ2NkNGLmpwZyI7aToxO3M6NTc6Ii8yMDE2LzA3LzI4LzI3NmVjN2RkXzhmMDlkYjU4YzlhYTI4YzQ2MGJkNjU5MDU5NjI2OThmLmpwZyI7aToyO3M6MjY6Ii8yMDE2LzA3LzI4LzRmNjhiZWRlXzkucG5nIjt9', 'YTo0OntpOjA7czozNToiLzIwMTYvMDcvMjgvZmUwZmJlN2JfMTc2OERlc2lnbi5qcGciO2k6MTtzOjQwOiIvMjAxNi8wNy8yOC85ZmY4N2FjZF8yMDE0LTA4LTEyXzE0NDMucG5nIjtpOjI7czo0MDoiLzIwMTYvMDcvMjgvOGJiMDRjYzRfMjAxNC0wOS0xOV8xNDU4LnBuZyI7aTozO3M6NTc6Ii8yMDE2LzA3LzI4LzBlZGZlYjdmXzUyMzAwZjNmYTY1Y2E5OGQ3MGI0ZDIxNDMzNWY5MDk3LmpwZyI7fQ==', '', '', '', '', '', '', '2016-07-28 16:33:33', 'Pending'),
(10013, 0, 100039, 21, 100037, 'Corporate', '', 63000, '', '', 'YToxOntpOjA7czo1NzoiLzIwMTYvMDcvMjkvNzI2Mjc1NWRfN2Q2YmUzNjhhMTdlN2JkZjMwOGEwMjI1YjRjYTllYjYuanBnIjt9', 'YToxOntpOjA7czozNzoiLzIwMTYvMDcvMjkvZGMwYzZkNGZfaGVhcnRfUE5HNjkxLnBuZyI7fQ==', 'YToxOntpOjA7czozMToiLzIwMTYvMDcvMjkvZjJjNGZkNmZfYWxpeWFoLmpwZyI7fQ==', '', '', '', '', '', '', '2016-07-29 08:26:54', 'Pending'),
(10014, 10009, 100040, 22, 100021, 'Corporate', '', 0, 'Intel NUC', '', '', '', '', '', 'Watashiwa, Coronadan, Cavite', 'Philippines', '5139369', '', 'Philippines', '2016-08-02 09:09:14', 'Approved'),
(10017, 10012, 100043, 25, 0, 'Individual', '', 0, '', '', '', '', '', '', '', 'China', '', '', 'Malaysia', '2016-08-03 22:30:58', 'Pending'),
(10018, 10013, 100044, 26, 0, 'Corporate', '', 0, 'sdfghj', '', '', '', '', 'xcdvfgbhnj', 'bvcx', 'China', 'asdfasd', 'fsadf', 'China', '2016-08-12 09:24:50', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
 ADD PRIMARY KEY (`AccountID`), ADD KEY `CaseFileID` (`AccountID`), ADD KEY `CaseFileID_2` (`AccountID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
MODIFY `AccountID` int(21) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10019;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
