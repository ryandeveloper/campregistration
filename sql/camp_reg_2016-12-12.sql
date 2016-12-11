-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2016 at 05:17 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camp_reg`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabins`
--

CREATE TABLE `cabins` (
  `CabinID` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cabins`
--

INSERT INTO `cabins` (`CabinID`, `Name`, `Notes`) VALUES
(1, 'Peter', ''),
(2, 'James', ''),
(3, 'Andrew', ''),
(4, 'Bartholomew', ''),
(5, 'Philip', ''),
(6, 'Thomas', ''),
(7, 'Matthew', ''),
(8, 'Thaddaeus', ''),
(9, 'Simeon', ''),
(10, 'Judah', ''),
(11, 'Reuben', ''),
(12, 'Manasseh', ''),
(13, 'Ephraim', ''),
(14, 'Levi', ''),
(15, 'Joseph', ''),
(16, 'Benjamin', ''),
(17, 'Naphtali', 'Candelaria'),
(18, 'Asher', 'Nabua'),
(19, 'Dan', 'Cagayan Valley'),
(20, 'Zebulun', 'Antipolo'),
(21, 'Issachar', 'Antipolo'),
(22, 'Gad', 'Cagayan Valley');

-- --------------------------------------------------------

--
-- Table structure for table `churches`
--

CREATE TABLE `churches` (
  `ChurchID` int(11) NOT NULL,
  `Name` varchar(512) NOT NULL,
  `City` varchar(128) DEFAULT NULL,
  `Title` varchar(256) DEFAULT NULL,
  `Pastor` varchar(512) NOT NULL,
  `Notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `churches`
--

INSERT INTO `churches` (`ChurchID`, `Name`, `City`, `Title`, `Pastor`, `Notes`) VALUES
(1, 'Antipolo', 'Antipolo', 'Life Harvest Church', '', ''),
(7, 'Del Gallego', 'Quezon', NULL, '', ''),
(8, 'Cagayan Valley', 'Cagayan Valley', NULL, '', ''),
(9, 'San Pedro', 'Laguna', 'God''s Tabernacle Fellowship', '', ''),
(10, 'Banisilan', 'Pangasinan', 'Finishing Touch MInistry', '', ''),
(11, 'Camiguin', 'Camiguin', NULL, '', ''),
(12, 'Tambongan', 'Samar', 'Church of the Firstborn', '', ''),
(13, 'Masbate', 'Bicol', NULL, '', ''),
(14, 'Bulihan', 'Bulihan', 'Church Of The Firstborn', 'Franco T.', '');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `FileID` int(21) NOT NULL,
  `UserID` int(21) NOT NULL,
  `DateAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`FileID`, `UserID`, `DateAdded`) VALUES
(16, 100040, '2016-09-04 23:49:33'),
(17, 100040, '2016-09-04 23:49:33'),
(18, 100040, '2016-09-04 23:49:33'),
(19, 100040, '2016-09-04 23:49:33'),
(20, 100040, '2016-09-04 23:49:33'),
(21, 100040, '2016-09-04 23:49:33'),
(22, 100040, '2016-09-04 23:49:33'),
(23, 100040, '2016-09-04 23:49:33'),
(24, 100040, '2016-09-04 23:49:33'),
(25, 100040, '2016-09-04 23:49:33'),
(26, 100040, '2016-09-04 23:49:33'),
(27, 100040, '2016-09-04 23:49:33'),
(28, 100040, '2016-09-04 23:49:33'),
(29, 100040, '2016-09-04 23:49:33'),
(30, 100040, '2016-09-04 23:49:33'),
(31, 100040, '2016-09-04 23:49:33'),
(32, 100040, '2016-09-04 23:49:33'),
(33, 100040, '2016-09-04 23:49:33'),
(34, 100040, '2016-09-04 23:49:33'),
(35, 100040, '2016-09-04 23:49:33'),
(36, 100040, '2016-09-04 23:49:33'),
(37, 100040, '2016-09-04 23:49:33'),
(38, 100040, '2016-09-04 23:49:33'),
(39, 100040, '2016-09-04 23:49:33'),
(40, 100040, '2016-09-04 23:49:33'),
(41, 100040, '2016-09-04 23:49:33'),
(42, 100040, '2016-09-04 23:49:33'),
(43, 100040, '2016-09-04 23:49:33'),
(44, 100040, '2016-09-04 23:49:33'),
(45, 100040, '2016-09-04 23:49:33'),
(55, 100043, '2016-09-05 00:56:21'),
(76, 100043, '2016-09-05 00:56:58'),
(110, 100043, '2016-09-05 00:57:36'),
(167, 100046, '2016-09-05 11:18:00'),
(175, 100047, '2016-09-05 11:27:11'),
(178, 100047, '2016-09-05 11:27:11'),
(179, 100047, '2016-09-05 11:27:11'),
(180, 100047, '2016-09-05 11:27:11'),
(181, 100047, '2016-09-05 11:27:11'),
(202, 100048, '2016-09-05 12:02:30'),
(209, 100048, '2016-09-05 12:02:30'),
(210, 100048, '2016-09-05 12:02:30'),
(211, 100048, '2016-09-05 12:02:30'),
(212, 100048, '2016-09-05 12:02:30'),
(233, 100049, '2016-09-05 12:26:25'),
(240, 100049, '2016-09-05 12:26:25'),
(241, 100049, '2016-09-05 12:26:25'),
(242, 100049, '2016-09-05 12:26:25'),
(243, 100049, '2016-09-05 12:26:25'),
(304, 100049, '2016-09-05 21:58:00'),
(322, 100050, '2016-09-05 22:47:27'),
(323, 100050, '2016-09-05 22:47:27'),
(324, 100050, '2016-09-05 22:47:27'),
(328, 100050, '2016-09-05 22:47:27'),
(696, 100049, '2016-09-06 10:48:17'),
(732, 100049, '2016-09-06 11:00:35'),
(733, 0, '2016-09-14 04:11:08'),
(734, 0, '2016-09-14 04:12:20'),
(735, 0, '2016-09-14 04:12:49'),
(736, 0, '2016-09-14 04:17:38'),
(737, 0, '2016-09-14 04:17:43'),
(738, 0, '2016-09-14 04:18:37'),
(739, 0, '2016-09-14 04:21:07'),
(740, 0, '2016-09-14 04:38:23'),
(741, 0, '2016-09-14 04:38:40'),
(742, 0, '2016-09-14 04:38:47'),
(743, 0, '2016-09-14 04:40:32'),
(745, 0, '2016-09-14 04:48:23'),
(746, 0, '2016-09-14 04:54:56'),
(748, 0, '2016-09-14 04:55:35'),
(750, 100000, '2016-09-16 18:14:13'),
(751, 100046, '2016-09-20 04:40:01'),
(752, 100051, '2016-09-26 12:39:15'),
(753, 100052, '2016-09-26 12:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `file_items`
--

CREATE TABLE `file_items` (
  `FileItemID` int(21) NOT NULL,
  `UserID` int(21) NOT NULL,
  `FileID` int(21) NOT NULL,
  `FileDescription` varchar(64) NOT NULL,
  `FileName` text NOT NULL,
  `FilePath` text NOT NULL,
  `FileSlug` varchar(512) NOT NULL,
  `Active` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_items`
--

INSERT INTO `file_items` (`FileItemID`, `UserID`, `FileID`, `FileDescription`, `FileName`, `FilePath`, `FileSlug`, `Active`) VALUES
(15, 100000, 11, 'Avatar', '656ea727_trio.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\02\\656ea727_trio.jpg', '/2016/09/02/656ea727_trio.jpg', 1),
(16, 100000, 12, 'Avatar', '3ddab30d_web.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\02\\3ddab30d_web.jpg', '/2016/09/02/3ddab30d_web.jpg', 1),
(17, 100000, 13, 'Avatar', 'cd5601a2_portrait.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\02\\cd5601a2_portrait.jpg', '/2016/09/02/cd5601a2_portrait.jpg', 1),
(20, 100040, 17, 'UBOEmploymentIncome', '642a9306_test.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\04\\642a9306_test.jpg', '/2016/09/04/642a9306_test.jpg', 1),
(21, 100040, 25, 'IAPhotoid', 'd0fa7b70_test.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\04\\d0fa7b70_test.jpg', '/2016/09/04/d0fa7b70_test.jpg', 1),
(22, 100040, 26, 'IAProofresidency', '1b87d1ee_test.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\04\\1b87d1ee_test.jpg', '/2016/09/04/1b87d1ee_test.jpg', 1),
(23, 100040, 27, 'IABankstatement', 'caf27d6a_test.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\04\\caf27d6a_test.jpg', '/2016/09/04/caf27d6a_test.jpg', 1),
(24, 100040, 28, 'IASpecimensign', '5b81021d_test.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\04\\5b81021d_test.jpg', '/2016/09/04/5b81021d_test.jpg', 1),
(25, 100043, 55, 'IAPhotoid', '24bbf8f7_portrait.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\05\\24bbf8f7_portrait.jpg', '/2016/09/05/24bbf8f7_portrait.jpg', 1),
(26, 100043, 76, 'BeneficiariesForm', '8c42ab3c_banner.png', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\05\\8c42ab3c_banner.png', '/2016/09/05/8c42ab3c_banner.png', 1),
(27, 100043, 110, 'UBOInheritance', '5b0f3b6f_logo.png', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\05\\5b0f3b6f_logo.png', '/2016/09/05/5b0f3b6f_logo.png', 1),
(28, 100046, 167, 'Avatar', 'ffd367d5_shine.png', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\05\\ffd367d5_shine.png', '/2016/09/05/ffd367d5_shine.png', 1),
(29, 100047, 175, 'UBOGift', 'c449ddc2_banner.png', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\05\\c449ddc2_banner.png', '/2016/09/05/c449ddc2_banner.png', 1),
(30, 100047, 178, 'IAPhotoid', 'f7613e53_banner.png', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\05\\f7613e53_banner.png', '/2016/09/05/f7613e53_banner.png', 1),
(31, 100047, 179, 'IAProofresidency', '5bacf84f_banner.png', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\05\\5bacf84f_banner.png', '/2016/09/05/5bacf84f_banner.png', 1),
(32, 100047, 180, 'IABankstatement', 'e72e3323_banner.png', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\05\\e72e3323_banner.png', '/2016/09/05/e72e3323_banner.png', 1),
(33, 100047, 181, 'IASpecimensign', 'fc855f14_banner.png', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\05\\fc855f14_banner.png', '/2016/09/05/fc855f14_banner.png', 1),
(34, 100048, 202, 'UBOEmploymentIncome', 'cff6e379_profile.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\05\\cff6e379_profile.jpg', '/2016/09/05/cff6e379_profile.jpg', 1),
(35, 100048, 209, 'IAPhotoid', '884c109a_IMG_2984.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\05\\884c109a_IMG_2984.jpg', '/2016/09/05/884c109a_IMG_2984.jpg', 1),
(36, 100048, 210, 'IAProofresidency', 'c72d3844_IMG_3679.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\05\\c72d3844_IMG_3679.jpg', '/2016/09/05/c72d3844_IMG_3679.jpg', 1),
(37, 100048, 211, 'IABankstatement', 'da0a8b8e_P_20150101_031347.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\05\\da0a8b8e_P_20150101_031347.jpg', '/2016/09/05/da0a8b8e_P_20150101_031347.jpg', 1),
(38, 100048, 212, 'IASpecimensign', 'f1d7082f_lumapitka.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\05\\f1d7082f_lumapitka.jpg', '/2016/09/05/f1d7082f_lumapitka.jpg', 1),
(39, 100049, 233, 'UBOEmploymentIncome', '87f3097c_profile.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\05\\87f3097c_profile.jpg', '/2016/09/05/87f3097c_profile.jpg', 2),
(40, 100049, 240, 'IAPhotoid', '0f1fc10a_IMG_2984.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\05\\0f1fc10a_IMG_2984.jpg', '/2016/09/05/0f1fc10a_IMG_2984.jpg', 1),
(41, 100049, 241, 'IAProofresidency', '2bec5155_IMG_3679.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\05\\2bec5155_IMG_3679.jpg', '/2016/09/05/2bec5155_IMG_3679.jpg', 1),
(42, 100049, 242, 'IABankstatement', '51783cc0_P_20150101_031347.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\05\\51783cc0_P_20150101_031347.jpg', '/2016/09/05/51783cc0_P_20150101_031347.jpg', 1),
(45, 100050, 322, 'POACorporateSeal', '610ab5b0_aliyah.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\05\\610ab5b0_aliyah.jpg', '/2016/09/05/610ab5b0_aliyah.jpg', 0),
(46, 100050, 323, 'POADirectorSign', 'd881293a_aliyah.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\05\\d881293a_aliyah.jpg', '/2016/09/05/d881293a_aliyah.jpg', 0),
(47, 100050, 324, 'POASecretarySign', 'd011878f_aliyah.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\05\\d011878f_aliyah.jpg', '/2016/09/05/d011878f_aliyah.jpg', 0),
(48, 100050, 328, 'UBOInheritance', 'af8853f3_aliyah.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\05\\af8853f3_aliyah.jpg', '/2016/09/05/af8853f3_aliyah.jpg', 0),
(49, 100049, 696, 'IAPhotoid', 'ed7431fa_sevices2.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\06\\ed7431fa_sevices2.jpg', '/2016/09/06/ed7431fa_sevices2.jpg', 0),
(51, 100049, 732, 'IASpecimensign', '8ca659fb_aliyah.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\06\\8ca659fb_aliyah.jpg', '/2016/09/06/8ca659fb_aliyah.jpg', 0),
(52, 0, 733, 'Favicon', 'c91e5c7a_Philippine-1000-Peso.jpeg', 'C:\\xampp\\htdocs\\odeonco.loc\\app\\views\\default\\assets\\files\\2016\\09\\14\\c91e5c7a_Philippine-1000-Peso.jpeg', '/2016/09/14/c91e5c7a_Philippine-1000-Peso.jpeg', 0),
(53, 0, 734, 'Favicon', '129a204d_Philippine-1000-Peso.jpeg', 'C:\\xampp\\htdocs\\odeonco.loc\\app\\views\\default\\assets\\files\\2016\\09\\14\\129a204d_Philippine-1000-Peso.jpeg', '/2016/09/14/129a204d_Philippine-1000-Peso.jpeg', 0),
(54, 0, 735, 'Favicon', '4432c70d_Philippine-1000-Peso.jpeg', 'C:\\xampp\\htdocs\\odeonco.loc\\app\\views\\default\\assets\\files\\2016\\09\\14\\4432c70d_Philippine-1000-Peso.jpeg', '/2016/09/14/4432c70d_Philippine-1000-Peso.jpeg', 0),
(55, 0, 736, 'Favicon', '2c6e81a8_Philippine-1000-Peso.jpeg', 'C:\\xampp\\htdocs\\odeonco.loc\\app\\views\\default\\assets\\files\\2016\\09\\14\\2c6e81a8_Philippine-1000-Peso.jpeg', '/2016/09/14/2c6e81a8_Philippine-1000-Peso.jpeg', 0),
(56, 0, 737, 'Favicon', '9bd71b4a_Philippine-1000-Peso.jpeg', 'C:\\xampp\\htdocs\\odeonco.loc\\app\\views\\default\\assets\\files\\2016\\09\\14\\9bd71b4a_Philippine-1000-Peso.jpeg', '/2016/09/14/9bd71b4a_Philippine-1000-Peso.jpeg', 0),
(57, 0, 738, 'Favicon', '6e86a0a0_Philippine-1000-Peso.jpeg', 'C:\\xampp\\htdocs\\odeonco.loc\\app\\views\\default\\assets\\files\\2016\\09\\14\\6e86a0a0_Philippine-1000-Peso.jpeg', '/2016/09/14/6e86a0a0_Philippine-1000-Peso.jpeg', 0),
(58, 0, 739, 'Favicon', 'ff1f9c42_Philippine-1000-Peso.jpeg', 'C:\\xampp\\htdocs\\odeonco.loc\\app\\views\\default\\assets\\files\\2016\\09\\14\\ff1f9c42_Philippine-1000-Peso.jpeg', '/2016/09/14/ff1f9c42_Philippine-1000-Peso.jpeg', 0),
(59, 0, 740, 'Favicon', '5b0d2332_Philippine-1000-Peso.jpeg', 'C:\\xampp\\htdocs\\odeonco.loc\\app\\views\\default\\assets\\files\\2016\\09\\14\\5b0d2332_Philippine-1000-Peso.jpeg', '/2016/09/14/5b0d2332_Philippine-1000-Peso.jpeg', 0),
(60, 0, 741, 'Favicon', 'c2361de2_Philippine-1000-Peso.jpeg', 'C:\\xampp\\htdocs\\odeonco.loc\\app\\views\\default\\assets\\files\\2016\\09\\14\\c2361de2_Philippine-1000-Peso.jpeg', '/2016/09/14/c2361de2_Philippine-1000-Peso.jpeg', 0),
(61, 0, 742, 'Favicon', '7dc731b0_Philippine-1000-Peso.jpeg', 'C:\\xampp\\htdocs\\odeonco.loc\\app\\views\\default\\assets\\files\\2016\\09\\14\\7dc731b0_Philippine-1000-Peso.jpeg', '/2016/09/14/7dc731b0_Philippine-1000-Peso.jpeg', 0),
(62, 0, 743, 'Favicon', '9e57a901_Philippine-1000-Peso.jpeg', 'C:\\xampp\\htdocs\\odeonco.loc\\app\\views\\default\\assets\\files\\2016\\09\\14\\9e57a901_Philippine-1000-Peso.jpeg', '/2016/09/14/9e57a901_Philippine-1000-Peso.jpeg', 0),
(63, 0, 745, 'Favicon', '85f35600_13175.jpeg', 'C:\\xampp\\htdocs\\odeonco.loc\\app\\views\\default\\assets\\files\\2016\\09\\14\\85f35600_13175.jpeg', '/2016/09/14/85f35600_13175.jpeg', 0),
(64, 0, 746, 'Logo', 'b7844924_Philippine-1000-Peso.jpeg', 'C:\\xampp\\htdocs\\odeonco.loc\\app\\views\\default\\assets\\files\\2016\\09\\14\\b7844924_Philippine-1000-Peso.jpeg', '/2016/09/14/b7844924_Philippine-1000-Peso.jpeg', 0),
(65, 0, 748, 'Logo', '02f6c70e_Philippine-1000-Peso.jpeg', 'C:\\xampp\\htdocs\\odeonco.loc\\app\\views\\default\\assets\\files\\2016\\09\\14\\02f6c70e_Philippine-1000-Peso.jpeg', '/2016/09/14/02f6c70e_Philippine-1000-Peso.jpeg', 0),
(67, 100000, 750, 'Avatar', '7010834c_cd5601a2_portrait.jpg', 'C:\\wamp\\www\\odeonco.loc\\app\\views\\default\\assets\\files\\2016\\09\\16\\7010834c_cd5601a2_portrait.jpg', '/2016/09/16/7010834c_cd5601a2_portrait.jpg', 0),
(68, 100046, 751, 'Avatar', '3ea11412_ryan.jpg', 'C:\\xampp\\htdocs\\campregistration.loc\\app\\views\\default\\assets\\files\\2016\\09\\20\\3ea11412_ryan.jpg', '/2016/09/20/3ea11412_ryan.jpg', 0),
(69, 100051, 752, 'Avatar', '36d5b6a3_d0fa7b70_test.jpg', 'C:\\xampp\\htdocs\\campregistration.loc\\app\\views\\default\\assets\\files\\2016\\09\\26\\36d5b6a3_d0fa7b70_test.jpg', '/2016/09/26/36d5b6a3_d0fa7b70_test.jpg', 0),
(70, 100052, 753, 'Avatar', '0aee1dc9_ryan.jpg', 'C:\\xampp\\htdocs\\campregistration.loc\\app\\views\\default\\assets\\files\\2016\\09\\26\\0aee1dc9_ryan.jpg', '/2016/09/26/0aee1dc9_ryan.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `finances`
--

CREATE TABLE `finances` (
  `FinanceID` int(11) NOT NULL,
  `Type` int(1) NOT NULL DEFAULT '0',
  `Description` text NOT NULL,
  `Amount` float NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `finances`
--

INSERT INTO `finances` (`FinanceID`, `Type`, `Description`, `Amount`, `Date`) VALUES
(19, 1, 'Antipolo: Payment', 60000, '2014-12-25 15:39:19'),
(22, 1, 'Trece: Payment', 3225, '2014-12-25 15:41:17'),
(23, 1, 'Lucena: Payment', 3000, '2014-12-25 15:41:37'),
(24, 1, 'Offering - Dec 26 - Morning', 31069, '2014-12-25 15:42:54'),
(25, 1, 'Lipa: Payment', 33835, '2014-12-25 15:46:55'),
(26, 0, 'Jabez Venue Down Payment', 50000, '2014-12-25 15:51:17'),
(27, 0, 'New Table', 600, '2014-12-25 15:52:18'),
(28, 0, 'Tolda & Rope', 16000, '2014-12-25 15:52:57'),
(29, 0, 'Office Supplies', 1000, '2014-12-25 15:53:14'),
(30, 0, 'Kitchen Utencils', 10000, '2014-12-25 15:53:40'),
(32, 0, 'Bulihan Equipment Service Deisel', 500, '2014-12-25 15:54:57'),
(33, 0, 'Food - Dec 24 - Dinner', 4500, '2014-12-25 15:55:58'),
(34, 0, 'Food - Dec 25 - Breakfast', 8000, '2014-12-25 15:56:34'),
(35, 0, 'Food - Dec 25 - Lunch', 20000, '2014-12-25 15:56:57'),
(36, 0, 'Food - Dec 25 - Dinner', 14000, '2014-12-25 15:57:30'),
(38, 0, 'Food - Dec 26 - 3 meals', 35000, '2014-12-25 15:58:24'),
(39, 0, 'Chairs: Rent Additional 100pcs', 2400, '2014-12-25 15:59:14'),
(40, 0, 'Electrical Materials', 1200, '2014-12-25 15:59:38'),
(41, 1, 'Cabadbaran: Share', 5000, '2014-12-25 20:01:31'),
(43, 1, 'San Pedro: Payment', 83352, '2014-12-25 20:36:35'),
(44, 0, 'Food - Dec 27 - 3 meals', 20000, '2014-12-25 20:48:44'),
(45, 1, 'Offering - Dec 26 - Noon', 19543.2, '2014-12-25 20:59:57'),
(46, 0, 'Food - Dec 27 - Dinner', 20000, '2014-12-26 13:07:58'),
(47, 0, 'Food - Dec 28 - Breakfast / Lunch', 20000, '2014-12-26 13:08:22'),
(48, 1, 'Candelaria: Payment', 23945, '2014-12-26 13:09:10'),
(49, 0, 'Food - Dec 26 - Dinner Addtnl', 5000, '2014-12-26 13:10:50'),
(50, 0, 'Mineral Water', 3500, '2014-12-26 13:11:13'),
(52, 1, 'Pangasinan: Payment', 10000, '2014-12-26 13:13:50'),
(56, 1, 'Offering - Dec 27 - Morning', 19831, '2014-12-26 13:48:19'),
(57, 1, 'Bulihan: Payment', 90639, '2014-12-26 14:03:14'),
(58, 1, 'Nabua: Payment', 7200, '2014-12-26 15:25:26'),
(59, 1, 'San Pedro: Payment', 6615, '2014-12-26 21:39:06'),
(60, 1, 'Bulihan: Payment', 1550, '2014-12-26 21:43:10'),
(61, 1, 'Offering - Dec 27 - Noon', 55336, '2014-12-26 22:06:27'),
(62, 0, 'Food - Dec 28 - Lunch', 12000, '2014-12-26 22:09:28'),
(63, 1, 'Bulihan: Payment', 1600, '2014-12-26 22:11:59'),
(71, 0, 'Jabez Venue Full Payment', 260055, '2015-01-07 22:08:09'),
(74, 1, 'Offering - Dec 28 - Noon', 38319, '2015-01-07 22:20:27'),
(75, 0, 'Instrument - Gas - Snacks', 2000, '2015-01-07 22:23:17'),
(76, 0, 'Accommodation - Registration - Snacks', 3000, '2015-01-07 22:23:40'),
(77, 0, 'Love Offering: Ptr. Robert', 5000, '2015-01-07 22:24:41'),
(78, 0, 'Love Offering: Ptr. Lito', 5000, '2015-01-07 22:24:56'),
(79, 0, 'Love Offering: Ptr. Joel', 6000, '2015-01-07 22:25:16'),
(80, 0, 'Love Offering: Ptr. Nick', 2000, '2015-01-07 22:25:38'),
(81, 0, 'Love Offering: Ptr. Michael', 2000, '2015-01-07 22:26:02'),
(82, 0, 'Love Offering: Ptr. Elie', 13000, '2015-01-07 22:26:23'),
(83, 0, 'Love Offering: Ptr. Nelson', 5000, '2015-01-07 22:26:42'),
(85, 1, 'Offering - Dec 28 - Morning', 54073.8, '2015-01-07 22:33:47'),
(87, 1, 'asdf frgh', 120, '2015-12-24 16:00:00'),
(88, 0, 'Reynante Offering', 2300, '2016-12-09 16:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `PPID` int(11) NOT NULL,
  `Gender` varchar(128) NOT NULL,
  `FirstName` varchar(512) NOT NULL,
  `LastName` varchar(512) NOT NULL,
  `Age` int(2) NOT NULL,
  `ChurchID` int(11) NOT NULL,
  `CabinID` int(11) NOT NULL,
  `TentID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`PPID`, `Gender`, `FirstName`, `LastName`, `Age`, `ChurchID`, `CabinID`, `TentID`, `StatusID`, `UserID`) VALUES
(18, 'Brother', 'Lester', 'Loredo', 23, 14, 3, 0, 2, 100000),
(19, 'Sister', 'Maricel', 'Bajar', 25, 14, 1, 0, 2, 100000),
(20, 'Brother', 'Reynante', 'Loredo', 21, 10, 3, 0, 1, 100000),
(21, 'Brother', 'Niel', 'Maning', 30, 14, 2, 0, 2, 100000),
(25, 'Sister', 'eunice', 'togonon', 21, 14, 0, 0, 4, 100052),
(26, 'Brother', 'ryan', 'dumajil', 12, 14, 0, 0, 4, 100000),
(37, 'Brother', 'dsadsadasdas', 'dsadsa', 0, 0, 0, 0, 4, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `participant_items`
--

CREATE TABLE `participant_items` (
  `ProductItemID` int(11) NOT NULL,
  `PPID` int(11) NOT NULL,
  `Package` int(11) NOT NULL,
  `Entrance1` int(11) NOT NULL DEFAULT '0',
  `Entrance2` int(11) NOT NULL,
  `Entrance3` int(11) NOT NULL DEFAULT '0',
  `TentOwned` int(1) DEFAULT '0',
  `Tent1` float NOT NULL DEFAULT '0',
  `Tent2` float NOT NULL DEFAULT '0',
  `Tent3` float NOT NULL DEFAULT '0',
  `Cabin1` float NOT NULL DEFAULT '0',
  `Cabin2` float NOT NULL DEFAULT '0',
  `Cabin3` float NOT NULL DEFAULT '0',
  `Meal1` int(11) NOT NULL DEFAULT '0',
  `Meal2` int(11) NOT NULL DEFAULT '0',
  `Meal3` int(11) NOT NULL DEFAULT '0',
  `Meal4` int(11) NOT NULL DEFAULT '0',
  `Meal5` int(11) NOT NULL DEFAULT '0',
  `Meal6` int(11) NOT NULL DEFAULT '0',
  `Meal7` int(11) NOT NULL DEFAULT '0',
  `Meal8` int(11) NOT NULL DEFAULT '0',
  `Meal9` int(11) NOT NULL DEFAULT '0',
  `TotalAmount` float NOT NULL,
  `PaidAmount` float NOT NULL,
  `Balance` float NOT NULL,
  `Excess` float NOT NULL,
  `Notes` text NOT NULL,
  `Cleard` int(11) NOT NULL DEFAULT '0',
  `DateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participant_items`
--

INSERT INTO `participant_items` (`ProductItemID`, `PPID`, `Package`, `Entrance1`, `Entrance2`, `Entrance3`, `TentOwned`, `Tent1`, `Tent2`, `Tent3`, `Cabin1`, `Cabin2`, `Cabin3`, `Meal1`, `Meal2`, `Meal3`, `Meal4`, `Meal5`, `Meal6`, `Meal7`, `Meal8`, `Meal9`, `TotalAmount`, `PaidAmount`, `Balance`, `Excess`, `Notes`, `Cleard`, `DateAdded`) VALUES
(19, 18, 0, 0, 0, 0, 0, 0, 0, 0, 180, 180, 180, 50, 50, 50, 50, 50, 50, 50, 50, 50, 990, 990, 0, 0, '', 1, '2016-12-09 15:40:24'),
(20, 19, 0, 0, 0, 0, 0, 100, 100, 100, 0, 0, 0, 50, 50, 50, 50, 50, 50, 50, 50, 50, 750, 1200, 0, 450, '', 1, '2016-12-09 16:14:53'),
(21, 20, 1200, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1200, 1000, 200, 1000, '', 0, '2016-12-05 14:45:20'),
(22, 21, 0, 25, 25, 25, 0, 0, 0, 0, 0, 0, 0, 50, 50, 50, 50, 50, 50, 50, 50, 50, 525, 500, 25, 0, '', 0, '2016-12-11 13:05:26'),
(26, 25, 0, 25, 25, 25, 0, 0, 0, 0, 0, 0, 0, 50, 50, 50, 50, 50, 50, 50, 50, 50, 550, 550, 0, 0, '', 1, '2016-12-05 15:06:11'),
(27, 26, 0, 25, 25, 25, 0, 0, 0, 0, 0, 0, 0, 50, 0, 50, 50, 0, 50, 50, 0, 50, 375, 175, 200, 0, '', 0, '2016-12-11 16:09:37'),
(38, 37, 0, 25, 25, 25, 0, 0, 0, 0, 0, 0, 0, 0, 50, 50, 0, 50, 50, 0, 50, 50, 375, 375, 0, 0, '', 1, '2016-12-11 16:12:41');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(512) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `Name`, `Description`, `Price`) VALUES
(1, 'Cabin', 'lodge only', 180),
(2, 'Tent', 'Tent Lodge', 100),
(3, 'meal', 'Per Meal', 50),
(7, 'package', 'full package', 1200),
(8, 'personal tent', 'lodging only', 85),
(9, 'Entrance', 'Walk In Entrance', 25);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `SettingsID` int(21) NOT NULL,
  `SiteTitle` varchar(256) NOT NULL,
  `TagLine` varchar(256) NOT NULL,
  `SiteUrl` varchar(128) NOT NULL,
  `NewUserRole` int(21) NOT NULL,
  `TimeZone` varchar(128) NOT NULL,
  `SiteLanguage` varchar(128) NOT NULL,
  `Redirects` text NOT NULL,
  `Favicon` int(21) NOT NULL,
  `Logo` int(21) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`SettingsID`, `SiteTitle`, `TagLine`, `SiteUrl`, `NewUserRole`, `TimeZone`, `SiteLanguage`, `Redirects`, `Favicon`, `Logo`) VALUES
(1, 'Odeon & Co', 'odeonco', 'http://odeonco.loc/', 5, 'Asia/Singapore', 'en', 'YTo4OntpOjE7czoxOToiaHR0cDovL29kZW9uY28ubG9jLyI7aToyO3M6Mjg6Imh0dHA6Ly9vZGVvbmNvLmxvYy9jYXNlZmlsZXMiO2k6MztzOjI4OiJodHRwOi8vb2Rlb25jby5sb2MvY2FzZWZpbGVzIjtpOjQ7czoyODoiaHR0cDovL29kZW9uY28ubG9jL2Nhc2VmaWxlcyI7aTo1O3M6Mjg6Imh0dHA6Ly9vZGVvbmNvLmxvYy9jYXNlZmlsZXMiO2k6NjtzOjI4OiJodHRwOi8vb2Rlb25jby5sb2MvY2FzZWZpbGVzIjtpOjc7czoyODoiaHR0cDovL29kZW9uY28ubG9jL2Nhc2VmaWxlcyI7aTo4O3M6Mjg6Imh0dHA6Ly9vZGVvbmNvLmxvYy9jYXNlZmlsZXMiO30=', 745, 748);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `StatusID` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`StatusID`, `Name`, `Notes`) VALUES
(1, 'Package', 'Full'),
(2, 'Cabin', 'Lodge Only'),
(3, 'Tent', 'Lodge Only'),
(4, 'Walk In', ''),
(5, 'Infant', 'Free');

-- --------------------------------------------------------

--
-- Table structure for table `tents`
--

CREATE TABLE `tents` (
  `TentID` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tents`
--

INSERT INTO `tents` (`TentID`, `Name`, `Notes`) VALUES
(1, 'Acts', ''),
(2, 'Romans', ''),
(3, 'Corinthians', ''),
(4, 'Galatians', ''),
(5, 'Ephesians', ''),
(6, 'Philippians', ''),
(7, 'Colossians', ''),
(8, 'Thessalonians', ''),
(9, 'Timothy', ''),
(10, 'Titus', ''),
(11, 'Philemon', ''),
(12, 'Hebrews', ''),
(13, 'James', ''),
(14, 'Revelation', ''),
(15, 'Paul', ''),
(16, 'Irenaeus', ''),
(17, 'Martin', ''),
(18, 'Columba', ''),
(19, 'Luther', ''),
(20, 'Wesley', ''),
(21, 'Branham', '');

-- --------------------------------------------------------

--
-- Table structure for table `usercapabilities`
--

CREATE TABLE `usercapabilities` (
  `UserCapabilityID` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Description` text NOT NULL,
  `Active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `userlevels`
--

CREATE TABLE `userlevels` (
  `UserLevelID` int(11) NOT NULL,
  `Name` varchar(64) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userlevels`
--

INSERT INTO `userlevels` (`UserLevelID`, `Name`, `Description`) VALUES
(1, 'Administrator', 'Super Admin & Backend Manager'),
(2, 'Manager', 'Can Manage and edit'),
(3, 'Encoder', 'Encoder can add participants');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(21) NOT NULL,
  `Email` varchar(64) NOT NULL,
  `Password` varchar(128) NOT NULL,
  `Level` int(11) NOT NULL,
  `Capability` int(11) NOT NULL,
  `SendEmail` int(1) NOT NULL DEFAULT '0',
  `HashKey` varchar(64) NOT NULL,
  `Active` int(1) NOT NULL DEFAULT '0',
  `DateAdded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Email`, `Password`, `Level`, `Capability`, `SendEmail`, `HashKey`, `Active`, `DateAdded`) VALUES
(100000, 'moisesg@cutearts.org', 'SbGkKvx6LA5AgxaFQX0/sPYWpAdI4+sGnq5qAaVObUc=', 1, 1, 1, '44131823d5de90da3523fab70d081d7b', 1, '2016-07-18 11:16:31'),
(100051, 'nante@gmail.com', '6+nhvOocvZin9u1cMn5NxXpZvKJdw8ZTbpxdkozLHS8=', 2, 0, 0, '6d66484e5d7fc62e01b1253f11cd7043', 1, '2016-09-26 12:39:15'),
(100052, 'ryandumajil@gmail.com', 'WjeuYxI9uv8m4NDTYZY5ThM3JZOtafd8j0SHj11++6o=', 1, 0, 0, '886035b3cf68d86288c042a5b65a809f', 1, '2016-09-26 12:45:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_meta`
--

CREATE TABLE `user_meta` (
  `UserMetaID` int(21) NOT NULL,
  `UserID` int(21) NOT NULL,
  `Language` varchar(128) NOT NULL,
  `Avatar` int(21) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_meta`
--

INSERT INTO `user_meta` (`UserMetaID`, `UserID`, `Language`, `Avatar`, `Salutation`, `FirstName`, `LastName`, `NickName`, `DateOfBirth`, `Gender`, `CivilStatus`, `Phone`, `Mobile`, `JobTitle`, `Occupation`, `Address`, `Address2`, `Address3`, `Address4`, `City`, `State`, `Country`, `PostalCode`, `Bio`, `IdNumber`) VALUES
(1, 100000, '', 750, '', 'Moises', 'Goloyugo', 'Mom', '1986-12-25', 'M', '', '09278585028', '', '', '', 'Bulihan', '', '', '', 'Silang', 'Cavite', 'Philippines', '4118', 'Whatever', ''),
(2, 100001, '', 0, '', 'Chris', 'Chua', 'C', '0000-00-00', 'M', '', '0936258469', '', '', '', 'Zhenzhen', '', '', '', 'Shangrila', 'Zhaozhao', 'Singapore', '', 'Handsome boy we', ''),
(3, 100021, 'en', 0, '', 'Mark', 'Anthony', '', '0000-00-00', 'M', '', '5129002', '', '', '', 'Bulihan', '', '', '', 'Silang', 'Cavite', 'Philippines', '4118', 'Im Good hehe', '134685258-RSM'),
(5, 100033, 'en', 0, '', 'Fred', 'Simpson', '', '0000-00-00', 'M', '', '5129002', '', '', '', 'Winan', '', '', '', 'Ever', 'Fragiz', 'Åland Islands', '3214695', 'Samoa', '134685258-XYZ1'),
(6, 100034, '', 0, '', 'ewrtyuio', 'retyuio', 'ertyuio', '0000-00-00', 'M', '', '134567890', '', '', '', 'gsdgsdf', '', '', '', 'dfgdsfg', 'dsfgdfsg', 'Netherlands Antilles', '1234', 'qtqerttetet', ''),
(7, 100035, 'en', 0, '', 'Golfied', 'Retyuio', '', '0000-00-00', 'M', '', '31258963', '', '', '', 'Casiles', '', '', '', 'Nuvalis', 'Tagaytays', 'Saint Barthélemy', '43255', 'Let&#39;s fix this text sss ', '312652'),
(8, 100036, 'en', 0, '', 'Artemyo', 'Molave', '', '0000-00-00', 'M', '', '3698525896', '', '', '', 'Shua', '', '', '', 'Temo', 'Lacsa', 'Netherlands Antilles', '6495', 'yesyt', '13658236'),
(9, 100037, 'en', 0, '', 'Levy', 'Powel', '', '0000-00-00', 'M', '', '369715236', '', '', '', 'Lumpia', '', '', '', 'Sariwa', 'Shanghai', 'China', '36452', '', '312546895'),
(11, 100039, 'en', 0, '', 'Mark', 'Goloyugo', '', '0000-00-00', 'M', '', '5129112', '', '', '', 'Phase', '', '', '', 'One', 'Aey', 'Philippines', '4112', '', '999999'),
(12, 100040, 'en', 0, 'Ms', 'Momo', 'Kamo', '', '1969-12-31', 'F', 'MARRIED', '123456789', '123456987', 'COO', 'Businesswoman', 'Wanderlei', 'Primary address', 'Secondary address', 'Secondary address', '', '', 'Philippines', '', '', '97456852'),
(15, 100043, 'en', 0, 'Dato', 'Atarma', 'Mutarwi', '', '1990-02-14', 'M', '', '', '09996636956', 'Dato', 'Royal Governor', 'Saba Malaysia', 'Saba', '', '', '', '', 'Malaysia', '', '', '3124569858585'),
(16, 100044, 'en', 0, 'Mr', 'asdfsadf', 'sadfsdaf', '', '1990-01-11', 'M', '', '', 'sdf', 'fsadf', 'asdfsad', 'sadfasfdfasdf', 'sadf', '8765asdfsadf', 'sadf', '', '', 'China', '', '', 'sdaf'),
(17, 100045, 'en', 0, 'Mr', 'asdf', 'sdaf', '', '1992-04-05', 'M', '', '', 'asdf', 'sdf', 'asdfsadsdf', 'asdf', '', 'sdaf', 'sadf', '', '', 'China', '', '', 'aS'),
(18, 100046, '', 751, '', 'Ryan', 'Dumajil', 'Ryan', '0000-00-00', 'M', '', '09238133222', '', '', '', '', '', '', '', '', '', 'Philippines', '', '', ''),
(19, 100047, 'en', 0, 'Mr', 'iuytre', 'trewq', '', '1988-02-08', 'M', '', '', '12341241', 'tre', 'trwq', 'tyurturty', 'rety erty ', 'm erwty erty ', 'erty rety ', '', '', 'China', '', '', 'ytrewq'),
(21, 100049, 'en', 0, 'Mr', 'Besperat', 'Shuna', '', '1989-04-02', 'M', '', '', '09996636956', 'Power Forward', 'Basketball Player', 'sadf', 'Timoto matayone', 'Washum miming', 'Tomam', '', '', 'China', '', '', 'R3265FEG12'),
(22, 100050, 'en', 0, 'Mr', 'sadf', 'sdf', '', '1973-02-04', 'M', '', '', 'sadf', 'sadf', 'sadf', 'sadfasfdfasdfasdf', 'sdf', '8765asdfsadfs', 'sdaf', '', '', 'China', '', '', 'sadf'),
(23, 100051, '', 752, '', 'Reynante', 'Dolontap', 'Pogi', '0000-00-00', 'M', '', '123456', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(24, 100052, '', 753, '', 'Ryan', 'Dumajil', 'ryan', '0000-00-00', 'M', '', '09238133222', '', '', '', '', '', '', '', 'Gma', 'Cavite', 'Philippines', '', 'My Bio', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabins`
--
ALTER TABLE `cabins`
  ADD PRIMARY KEY (`CabinID`),
  ADD KEY `CabinID` (`CabinID`);

--
-- Indexes for table `churches`
--
ALTER TABLE `churches`
  ADD PRIMARY KEY (`ChurchID`),
  ADD KEY `ID` (`ChurchID`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`FileID`),
  ADD KEY `DocumentID` (`FileID`),
  ADD KEY `FileID` (`FileID`);

--
-- Indexes for table `file_items`
--
ALTER TABLE `file_items`
  ADD PRIMARY KEY (`FileItemID`),
  ADD KEY `DocumentID` (`FileID`);

--
-- Indexes for table `finances`
--
ALTER TABLE `finances`
  ADD PRIMARY KEY (`FinanceID`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`PPID`);

--
-- Indexes for table `participant_items`
--
ALTER TABLE `participant_items`
  ADD PRIMARY KEY (`ProductItemID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`SettingsID`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`StatusID`),
  ADD KEY `ID` (`StatusID`),
  ADD KEY `StatusID` (`StatusID`);

--
-- Indexes for table `tents`
--
ALTER TABLE `tents`
  ADD PRIMARY KEY (`TentID`),
  ADD KEY `CabinID` (`TentID`);

--
-- Indexes for table `usercapabilities`
--
ALTER TABLE `usercapabilities`
  ADD PRIMARY KEY (`UserCapabilityID`),
  ADD KEY `UserCapabilityID` (`UserCapabilityID`);

--
-- Indexes for table `userlevels`
--
ALTER TABLE `userlevels`
  ADD PRIMARY KEY (`UserLevelID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `user_meta`
--
ALTER TABLE `user_meta`
  ADD PRIMARY KEY (`UserMetaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabins`
--
ALTER TABLE `cabins`
  MODIFY `CabinID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `churches`
--
ALTER TABLE `churches`
  MODIFY `ChurchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `FileID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=754;
--
-- AUTO_INCREMENT for table `file_items`
--
ALTER TABLE `file_items`
  MODIFY `FileItemID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `finances`
--
ALTER TABLE `finances`
  MODIFY `FinanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `PPID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `participant_items`
--
ALTER TABLE `participant_items`
  MODIFY `ProductItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `SettingsID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `StatusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tents`
--
ALTER TABLE `tents`
  MODIFY `TentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `usercapabilities`
--
ALTER TABLE `usercapabilities`
  MODIFY `UserCapabilityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `userlevels`
--
ALTER TABLE `userlevels`
  MODIFY `UserLevelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100053;
--
-- AUTO_INCREMENT for table `user_meta`
--
ALTER TABLE `user_meta`
  MODIFY `UserMetaID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
