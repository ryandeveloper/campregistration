-- phpMyAdmin SQL Dump
-- version 4.2.9.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2016 at 11:19 AM
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
-- Table structure for table `user_meta`
--

CREATE TABLE IF NOT EXISTS `user_meta` (
`UserMetaID` int(21) NOT NULL,
  `UserID` int(21) NOT NULL,
  `Language` varchar(128) NOT NULL,
  `Avatar` text NOT NULL,
  `Salutation` varchar(32) NOT NULL,
  `FirstName` varchar(64) NOT NULL,
  `LastName` varchar(64) NOT NULL,
  `NickName` varchar(128) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `CivilStatus` varchar(64) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Mobile` varchar(32) NOT NULL,
  `JobTitle` varchar(64) NOT NULL,
  `Occupation` varchar(64) NOT NULL,
  `Address` varchar(256) NOT NULL,
  `Address2` varchar(256) NOT NULL,
  `Address3` varchar(256) NOT NULL,
  `Address4` varchar(256) NOT NULL,
  `City` varchar(64) NOT NULL,
  `State` varchar(64) NOT NULL,
  `Country` varchar(64) NOT NULL,
  `PostalCode` varchar(16) NOT NULL,
  `Bio` text NOT NULL,
  `IdNumber` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_meta`
--

INSERT INTO `user_meta` (`UserMetaID`, `UserID`, `Language`, `Avatar`, `Salutation`, `FirstName`, `LastName`, `NickName`, `DateOfBirth`, `Gender`, `CivilStatus`, `Phone`, `Mobile`, `JobTitle`, `Occupation`, `Address`, `Address2`, `Address3`, `Address4`, `City`, `State`, `Country`, `PostalCode`, `Bio`, `IdNumber`) VALUES
(1, 100000, '', 'YToxOntpOjA7czozMjoiLzIwMTYvMDcvMTkvZjZiNTI5ZTdfcHJvZmlsZS5qcGciO30=', '', 'Moises', 'Goloyugo', 'Mom', '1986-12-25', 'M', '', '09278585028', '', '', '', 'Bulihan', '', '', '', 'Silang', 'Cavite', 'Philippines', '4118', 'Whatever', ''),
(2, 100001, '', 'YToxOntpOjA7czo1NzoiLzIwMTYvMDcvMTkvYzA2ZTc0NzVfMjUyZWM4MDc0MjEwZDQxYTI5ZTBjNTljZDJjMjFhMTYuanBnIjt9', '', 'Chris', 'Chua', 'C', '0000-00-00', 'M', '', '0936258469', '', '', '', 'Zhenzhen', '', '', '', 'Shangrila', 'Zhaozhao', 'Singapore', '', 'Handsome boy we', ''),
(3, 100021, 'en', 'YToxOntpOjA7czoyNjoiLzIwMTYvMDcvMTgvYTdlZDUyZjZfMS5wbmciO30=', '', 'Mark', 'Anthony', '', '0000-00-00', 'M', '', '5129002', '', '', '', 'Bulihan', '', '', '', 'Silang', 'Cavite', 'Philippines', '4118', 'Im Good hehe', '134685258-RSM'),
(5, 100033, 'en', 'YToxOntpOjA7czozODoiLzIwMTYvMDcvMTkvOTFjN2IxMWRfMTdwb2d1ZS4xLjYwMC5qcGciO30=', '', 'Fred', 'Simpson', '', '0000-00-00', 'M', '', '5129002', '', '', '', 'Winan', '', '', '', 'Ever', 'Fragiz', 'Åland Islands', '3214695', 'Samoa', '134685258-XYZ1'),
(6, 100034, '', 'YToxOntpOjA7czo1NzoiLzIwMTYvMDcvMTkvM2ZlNzE0MTdfNzVkMDMyZjNlMmMwYzEwNGRlMjc0YjU2M2FiMGE5OTEuanBnIjt9', '', 'ewrtyuio', 'retyuio', 'ertyuio', '0000-00-00', 'M', '', '134567890', '', '', '', 'gsdgsdf', '', '', '', 'dfgdsfg', 'dsfgdfsg', 'Netherlands Antilles', '1234', 'qtqerttetet', ''),
(7, 100035, 'en', '', '', 'Golfied', 'Retyuio', '', '0000-00-00', 'M', '', '31258963', '', '', '', 'Casiles', '', '', '', 'Nuvalis', 'Tagaytays', 'Saint Barthélemy', '43255', 'Let&#39;s fix this text sss ', '312652'),
(8, 100036, 'en', '', '', 'Artemyo', 'Molave', '', '0000-00-00', 'M', '', '3698525896', '', '', '', 'Shua', '', '', '', 'Temo', 'Lacsa', 'Netherlands Antilles', '6495', 'yesyt', '13658236'),
(9, 100037, 'en', '', '', 'Levy', 'Powel', '', '0000-00-00', 'M', '', '369715236', '', '', '', 'Lumpia', '', '', '', 'Sariwa', 'Shanghai', 'China', '36452', '', '312546895'),
(11, 100039, 'en', '', '', 'Mark', 'Goloyugo', '', '0000-00-00', 'M', '', '5129112', '', '', '', 'Phase', '', '', '', 'One', 'Aey', 'Philippines', '4112', '', '999999'),
(12, 100040, 'en', '', 'Ms', 'Momo', 'Kamo', '', '1969-12-31', 'F', 'MARRIED', '123456789', '123456987', 'COO', 'Businesswoman', 'Wanderlei', 'Primary address', 'Secondary address', 'Secondary address', '', '', 'Philippines', '', '', '97456852'),
(15, 100043, 'en', '', 'Dato', 'Atarma', 'Mutarwi', '', '1990-02-14', 'M', '', '', '09996636956', 'Dato', 'Royal Governor', 'Greeno', 'Saba', '', '', '', '', 'Malaysia', '', '', '3124569858585'),
(16, 100044, 'en', '', 'Mr', 'asdfsadf', 'sadfsdaf', '', '1990-01-11', 'M', '', '', 'sdf', 'fsadf', 'asdfsad', 'sadfasfdfasdf', 'sadf', '8765asdfsadf', 'sadf', '', '', 'China', '', '', 'sdaf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_meta`
--
ALTER TABLE `user_meta`
 ADD PRIMARY KEY (`UserMetaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_meta`
--
ALTER TABLE `user_meta`
MODIFY `UserMetaID` int(21) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
