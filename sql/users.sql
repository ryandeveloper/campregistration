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
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`UserID` int(21) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `Password` varchar(128) NOT NULL,
  `Level` int(11) NOT NULL,
  `Capability` int(11) NOT NULL,
  `SendEmail` int(1) NOT NULL DEFAULT '0',
  `HashKey` varchar(64) NOT NULL,
  `Active` int(1) NOT NULL DEFAULT '0',
  `DateAdded` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100045 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Email`, `Password`, `Level`, `Capability`, `SendEmail`, `HashKey`, `Active`, `DateAdded`) VALUES
(100000, 'moisesg@cutearts.org', 'J4Hv5bh/JvEMn+7cn9nH93KjxnnhiNTpAErhNkHr0oM=', 1, 1, 1, '44131823d5de90da3523fab70d081d7b', 1, '2016-07-18 11:16:31'),
(100001, 'chris@odeonco.com', 'v8arGzhzE8/wkURIbSkdn80G96uLzRt2XvfL2keWKBU=', 2, 1, 1, '', 1, '2016-06-01 02:04:08'),
(100021, 'moises@odeonco.com', '2UXBvSlyQamFBTmc3OcBjc+QZHUUhrGhKLkCjITZLWI=', 3, 0, 0, '988cd4afb2709ecaf45fe0b5916bf956', 1, '2016-07-01 01:37:21'),
(100033, 'fred@simpson.com', '3nUOV/lSSg33AKg5cr81UFQzBEDkjqrk50URPZXDMRY=', 4, 0, 0, '0c5884668180982891480d6332b7fdd6', 1, '2016-07-12 01:27:38'),
(100034, 'tttt@tttt.com', 'NFpt8AtPViJSX2HeqO7c1/Aaj+2IF8YSAI8gscwYueI=', 1, 0, 0, '28e8192158eaf890809d7ad2dec8d589', 1, '2016-07-18 10:39:27'),
(100035, 'golfiedretyuio@freemail.com', 'J4Hv5bh/JvEMn+7cn9nH93KjxnnhiNTpAErhNkHr0oM=', 3, 0, 0, '691b62d0f48055bd8dbed21bbc5118c6', 1, '2016-07-25 09:37:23'),
(100036, 'artemyo.molave@gmail.com', 'esl4ntzuV3BaMVDCTv/CHc8HD6pfdJFnh+yblN/6Rg4=', 3, 0, 0, 'a8c5c2f9324a84161c0b00a473f93477', 1, '2016-07-28 08:45:45'),
(100037, 'warthog.levy@odeonco.com', 'vC+yP9onGO32Ojv1qa6ibPhFXSa2sOsyXdSmjWQQIiE=', 4, 0, 0, '72f83a0c121ece205c55d0072d5d3e52', 1, '2016-07-28 09:33:33'),
(100039, 'markgoloyugo@ca.com', '17d2i83ALsyQZwB3FINIwEmWT2m9b7uX4uo+AhOSUYc=', 4, 0, 0, 'd95760ba696481300808ba87be1d3592', 1, '2016-07-29 01:26:54'),
(100040, 'momokamo@gmail.com', 'YcqvT2/wVQ2qwYTGgnzgnj0nxFrkNJsK8Fr9bSJXr9A=', 5, 0, 0, 'b430edf869009b938c406a47d298f329', 0, '2016-08-02 02:09:14'),
(100043, 'atarma.mutarwi@odeon.com', 'Rp9UJQbFWGee2JLuN3OHV+IHfzPXWmQe5hgqTK3IFFo=', 5, 0, 0, 'bbc43b4ea714a56007256343d99a7fc3', 1, '2016-08-03 15:30:58'),
(100044, 'artemyo.molave@gmail.com', 'eP4I6Vpcgu715QlnTd0r+v9JcWOzt3Zr+lSjwe9aNB0=', 5, 0, 0, 'f83d1fee306e1c9b0d03fac64ec8ace4', 1, '2016-08-12 02:24:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`UserID`), ADD KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `UserID` int(21) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100045;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
