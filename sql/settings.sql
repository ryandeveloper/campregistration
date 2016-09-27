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
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
`SettingsID` int(21) NOT NULL,
  `SiteTitle` varchar(256) NOT NULL,
  `TagLine` varchar(256) NOT NULL,
  `SiteUrl` varchar(128) NOT NULL,
  `NewUserRole` int(21) NOT NULL,
  `TimeZone` varchar(128) NOT NULL,
  `SiteLanguage` varchar(128) NOT NULL,
  `Redirects` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`SettingsID`, `SiteTitle`, `TagLine`, `SiteUrl`, `NewUserRole`, `TimeZone`, `SiteLanguage`, `Redirects`) VALUES
(1, 'Odeon & Co', 'odeonco', 'http://odeonco.loc/', 5, 'Asia/Singapore', 'en', 'YTo1OntpOjE7czoxOToiaHR0cDovL29kZW9uY28ubG9jLyI7aToyO3M6Mjg6Imh0dHA6Ly9vZGVvbmNvLmxvYy9jYXNlZmlsZXMiO2k6MztzOjI4OiJodHRwOi8vb2Rlb25jby5sb2MvY2FzZWZpbGVzIjtpOjQ7czoyODoiaHR0cDovL29kZW9uY28ubG9jL2Nhc2VmaWxlcyI7aTo1O3M6Mjg6Imh0dHA6Ly9vZGVvbmNvLmxvYy9jYXNlZmlsZXMiO30=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`SettingsID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
MODIFY `SettingsID` int(21) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
