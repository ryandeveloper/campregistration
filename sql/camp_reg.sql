-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2016 at 07:11 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

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
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
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
  `AccountStatus` varchar(32) NOT NULL DEFAULT 'Pending',
  `Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`AccountID`, `CaseFileID`, `UserID`, `BankAccountID`, `ReferrerUserID`, `AccountType`, `AccountTitle`, `DepositedAmount`, `CompanyName`, `CompanyDocument`, `PhotoId`, `Agreement`, `BankAccountProof`, `RegistrationNo`, `RegistrationAddress`, `RegistrationCountry`, `RegistrationTelephone`, `BusinessAddress`, `BusinessCountry`, `ApplicationDate`, `AccountStatus`, `Active`) VALUES
(10022, 10013, 100049, 30, 100033, 'Individual', '', 0, '', '', '', '', '', '', '', 'China', '', '', 'China', '2016-09-05 19:26:25', 'Pending', 1),
(10023, 10014, 100050, 31, 0, 'Corporate', '', 0, 'sadf', '', '', '', '', 'asdf', 'sadf', 'China', 'asdf', 'sdf', 'China', '2016-09-06 05:47:27', 'Pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bankaccounts`
--

CREATE TABLE `bankaccounts` (
  `BankAccountID` int(21) NOT NULL,
  `UserID` int(21) NOT NULL,
  `Address` varchar(128) NOT NULL,
  `SwiftCode` varchar(64) NOT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Name` varchar(64) NOT NULL,
  `AccountNumber` varchar(32) NOT NULL,
  `AccountName` varchar(64) NOT NULL,
  `TrustAccount` varchar(3) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(26, 100044, 'asdf', 'sadf', '2016-08-12 09:24:50', 'asdf', 'sadf', 'sadf', 'N'),
(27, 100045, 'adsf', 'sdaf', '2016-09-05 18:13:06', 'asdf', 'sadf', 'sdf', 'N'),
(28, 100047, 'hgfd', '123', '2016-09-05 18:27:11', 'Bank of the Philippine Islands', '9865325689784512', 'Fred Simpson', 'N'),
(30, 100049, 'sadf', 'sdaf', '2016-09-05 19:26:25', 'sadf', 'sdaf', 'sdaf', 'N'),
(31, 100050, 'asdfsadf', 'sadf', '2016-09-06 05:47:27', 'asdf', 'asdfasdf', 'asdf', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `casefiles`
--

CREATE TABLE `casefiles` (
  `CaseFileID` int(21) NOT NULL,
  `UserID` int(21) NOT NULL,
  `HasNominatedBeneficiaries` varchar(8) NOT NULL,
  `UBOName` varchar(64) NOT NULL,
  `UBOAddress` varchar(128) NOT NULL,
  `UBOEmploymentIncome` int(21) NOT NULL,
  `UBOCommission` int(21) NOT NULL,
  `UBOBusiness` int(21) NOT NULL,
  `UBOInheritance` int(21) NOT NULL,
  `UBOGift` int(21) NOT NULL,
  `UBOSales` int(21) NOT NULL,
  `UBOOther` int(21) NOT NULL,
  `PrimaryTaxResidency` varchar(128) NOT NULL,
  `TaxIdNumber` varchar(128) NOT NULL,
  `NeedCoolingOff` varchar(16) NOT NULL,
  `BeneficiariesForm` int(21) NOT NULL,
  `IAPhotoid` int(21) NOT NULL,
  `IAProofresidency` int(21) NOT NULL,
  `IABankstatement` int(21) NOT NULL,
  `IASpecimensign` int(21) NOT NULL,
  `IAProofOfPayment` int(21) NOT NULL,
  `CACertincorporation` int(21) NOT NULL,
  `CANamechange` int(21) NOT NULL,
  `CAGoodstand` int(21) NOT NULL,
  `CARegdirector` int(21) NOT NULL,
  `CAProofbusadd` int(21) NOT NULL,
  `CAMemorandumaa` int(21) NOT NULL,
  `CARecentfinancialstatement` int(21) NOT NULL,
  `CADirectorsid` int(21) NOT NULL,
  `CACompanysign` int(21) NOT NULL,
  `CAShareholders` int(21) NOT NULL,
  `CADirectorsproof` int(21) NOT NULL,
  `CACompanysignproof` int(21) NOT NULL,
  `CAShareholdersproof` int(21) NOT NULL,
  `CAAuthorizedone` int(21) NOT NULL,
  `CAAuthorizedonename` varchar(64) NOT NULL,
  `CAAuthorizedonetitle` varchar(64) NOT NULL,
  `CAAuthorizedtwo` int(21) NOT NULL,
  `CAAuthorizedtwoname` varchar(64) NOT NULL,
  `CAAuthorizedtwotitle` varchar(64) NOT NULL,
  `CAAuthorizedthree` int(21) NOT NULL,
  `CAAuthorizedthreename` varchar(64) NOT NULL,
  `CAAuthorizedthreetitle` varchar(64) NOT NULL,
  `CAAuthorizedfour` int(21) NOT NULL,
  `CAAuthorizedfourname` varchar(64) NOT NULL,
  `CAAuthorizedfourtitle` varchar(64) NOT NULL,
  `CAProofOfPayment` int(21) NOT NULL,
  `POADate` date NOT NULL,
  `POAFirstName` varchar(128) NOT NULL,
  `POALastName` varchar(128) NOT NULL,
  `POACompanyName` varchar(256) NOT NULL,
  `POACompanyNumber` varchar(64) NOT NULL,
  `POACompanyCountry` varchar(64) NOT NULL,
  `POACompanyAddress` varchar(256) NOT NULL,
  `POACompanyCity` varchar(64) NOT NULL,
  `POACompanyState` varchar(64) NOT NULL,
  `POAAppointor` varchar(256) NOT NULL,
  `POAAppointorIdNumber` varchar(64) NOT NULL,
  `POACorporateSeal` int(21) NOT NULL,
  `POADirectorName` varchar(128) NOT NULL,
  `POADirectorSign` int(21) NOT NULL,
  `POASecretaryName` varchar(128) NOT NULL,
  `POASecretarySign` int(21) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `ProductItemID` int(11) NOT NULL,
  `DepositedAmount` int(21) NOT NULL,
  `ReceivedAmount` int(21) NOT NULL,
  `CommencementDate` date NOT NULL,
  `MaturityDate` date NOT NULL,
  `ApprovedBy` varchar(128) NOT NULL,
  `ApprovedDate` date NOT NULL,
  `TransactionDate` date NOT NULL,
  `PaymentReceived` date NOT NULL,
  `DateFiled` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `casefiles`
--

INSERT INTO `casefiles` (`CaseFileID`, `UserID`, `HasNominatedBeneficiaries`, `UBOName`, `UBOAddress`, `UBOEmploymentIncome`, `UBOCommission`, `UBOBusiness`, `UBOInheritance`, `UBOGift`, `UBOSales`, `UBOOther`, `PrimaryTaxResidency`, `TaxIdNumber`, `NeedCoolingOff`, `BeneficiariesForm`, `IAPhotoid`, `IAProofresidency`, `IABankstatement`, `IASpecimensign`, `IAProofOfPayment`, `CACertincorporation`, `CANamechange`, `CAGoodstand`, `CARegdirector`, `CAProofbusadd`, `CAMemorandumaa`, `CARecentfinancialstatement`, `CADirectorsid`, `CACompanysign`, `CAShareholders`, `CADirectorsproof`, `CACompanysignproof`, `CAShareholdersproof`, `CAAuthorizedone`, `CAAuthorizedonename`, `CAAuthorizedonetitle`, `CAAuthorizedtwo`, `CAAuthorizedtwoname`, `CAAuthorizedtwotitle`, `CAAuthorizedthree`, `CAAuthorizedthreename`, `CAAuthorizedthreetitle`, `CAAuthorizedfour`, `CAAuthorizedfourname`, `CAAuthorizedfourtitle`, `CAProofOfPayment`, `POADate`, `POAFirstName`, `POALastName`, `POACompanyName`, `POACompanyNumber`, `POACompanyCountry`, `POACompanyAddress`, `POACompanyCity`, `POACompanyState`, `POAAppointor`, `POAAppointorIdNumber`, `POACorporateSeal`, `POADirectorName`, `POADirectorSign`, `POASecretaryName`, `POASecretarySign`, `ProductID`, `ProductItemID`, `DepositedAmount`, `ReceivedAmount`, `CommencementDate`, `MaturityDate`, `ApprovedBy`, `ApprovedDate`, `TransactionDate`, `PaymentReceived`, `DateFiled`) VALUES
(10013, 100049, '', 'Besperat', 'Watakak', 233, 0, 0, 0, 0, 0, 0, 'asdf', 'asdf', 'Y', 0, 696, 241, 242, 732, 304, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '2016-05-09', '', '', '', '', 'China', '', '', '', '', '', 0, '', 0, '', 0, 1, 3, 0, 201, '2016-06-09', '2016-06-09', 'ataker', '2016-09-05', '0000-00-00', '2016-06-09', '2016-06-08 16:00:00'),
(10014, 100050, '', 'asdfsadf', 'sadfasdf', 0, 0, 0, 328, 0, 0, 0, 'sadf', 'asdf', 'Y', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '2016-05-09', 'asdf', 'sadf', 'sdaf', 'sdf', 'China', 'sadf', 'sadf', 'sdf', 'sdf', 'sdaf', 322, '', 323, '', 324, 0, 0, 0, 0, '0000-00-00', '0000-00-00', 'asdfsadf', '2016-09-05', '0000-00-00', '0000-00-00', '2016-09-06 05:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `churches`
--

CREATE TABLE `churches` (
  `churchID` int(11) NOT NULL,
  `churchName` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(751, 100000, '2016-09-13 01:05:11');

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
(19, 100000, 15, 'Avatar', '89fb1c13_charcoal.jpg', 'C:\\Bitnami\\wamp\\apache2\\htdocs\\odeonco\\app\\views\\default\\assets\\files\\2016\\09\\02\\89fb1c13_charcoal.jpg', '/2016/09/02/89fb1c13_charcoal.jpg', 1),
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
(52, 100000, 751, 'Avatar', '3c9c1542_89fb1c13_charcoal.jpg', 'C:\\wamp\\www\\campregistration.loc\\app\\views\\default\\assets\\files\\2016\\09\\13\\3c9c1542_89fb1c13_charcoal.jpg', '/2016/09/13/3c9c1542_89fb1c13_charcoal.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(21) NOT NULL,
  `ProductName` varchar(128) NOT NULL,
  `ProductDescription` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_items`
--

CREATE TABLE `product_items` (
  `ProductItemID` int(21) NOT NULL,
  `ProductID` int(21) NOT NULL,
  `InvestmentAmount` float NOT NULL,
  `StepUp` int(21) NOT NULL,
  `DividendFrequency` int(11) NOT NULL,
  `TenureMonths` int(21) NOT NULL,
  `QuarterlyInterest` int(11) NOT NULL,
  `AnnualInterest` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `Redirects` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`SettingsID`, `SiteTitle`, `TagLine`, `SiteUrl`, `NewUserRole`, `TimeZone`, `SiteLanguage`, `Redirects`) VALUES
(1, 'Odeon & Co', 'odeonco', 'http://odeonco.loc/', 5, 'Asia/Singapore', 'en', 'YTo1OntpOjE7czoxOToiaHR0cDovL29kZW9uY28ubG9jLyI7aToyO3M6Mjg6Imh0dHA6Ly9vZGVvbmNvLmxvYy9jYXNlZmlsZXMiO2k6MztzOjI4OiJodHRwOi8vb2Rlb25jby5sb2MvY2FzZWZpbGVzIjtpOjQ7czoyODoiaHR0cDovL29kZW9uY28ubG9jL2Nhc2VmaWxlcyI7aTo1O3M6Mjg6Imh0dHA6Ly9vZGVvbmNvLmxvYy9jYXNlZmlsZXMiO30=');

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
(1, 'Administrator', 'Super Admin &amp; Backend Manager'),
(2, 'Manager', 'State administrator, manage city representative and agents'),
(3, 'Agency', 'City representative manage agents'),
(4, 'Agent', 'Agents'),
(5, 'Client', 'Clients ');

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
(100001, 'chris@odeonco.com', 'u0PmVUI20/wfXjEv5nqHdVUwryUwKGCev/A4514m+pc=', 2, 1, 1, '', 1, '2016-06-01 02:04:08'),
(100033, 'fred@simpson.com', '3nUOV/lSSg33AKg5cr81UFQzBEDkjqrk50URPZXDMRY=', 4, 0, 0, '0c5884668180982891480d6332b7fdd6', 1, '2016-07-12 01:27:38'),
(100035, 'golfiedretyuio@freemail.com', 'J4Hv5bh/JvEMn+7cn9nH93KjxnnhiNTpAErhNkHr0oM=', 3, 0, 0, '691b62d0f48055bd8dbed21bbc5118c6', 1, '2016-07-25 09:37:23'),
(100036, 'artemyo.molave@gmail.com', 'esl4ntzuV3BaMVDCTv/CHc8HD6pfdJFnh+yblN/6Rg4=', 3, 0, 0, 'a8c5c2f9324a84161c0b00a473f93477', 1, '2016-07-28 08:45:45'),
(100037, 'warthog.levy@odeonco.com', 'vC+yP9onGO32Ojv1qa6ibPhFXSa2sOsyXdSmjWQQIiE=', 4, 0, 0, '72f83a0c121ece205c55d0072d5d3e52', 1, '2016-07-28 09:33:33'),
(100046, 'wasadfer@adfdfdfsdfs.com', 'qJVO+HKGC4MMmviUigYjW3jgw3o4Nrfuff6T8aHBj4s=', 1, 0, 0, '526b1381917cd7ff06ea412bc3cf4477', 1, '2016-09-05 11:18:00'),
(100049, 'besperat@gmail.com', 'v+sYlWhbSWxNiRVkbSg2/gYZ8YA2sHpTHnfdbJiTmPA=', 5, 0, 0, '0518986b6a61a65c0991ebfb9444a6d3', 1, '2016-09-05 12:26:25'),
(100050, 'wasadfasdfsadfsadfer@adfdfdfsdfs.com', 'MWWDHdY1Zfihk3IpJmYm5ASyrKejejF3tEgzcA3u07c=', 5, 0, 0, '91e16199de4d8f1144e4527635db4586', 1, '2016-09-05 22:47:27');

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
(1, 100000, '', 751, '', 'Moises', 'Goloyugo', 'Mom', '1986-12-25', 'M', '', '09278585028', '', '', '', 'Bulihan', '', '', '', 'Silang', 'Cavite', 'Philippines', '4118', 'Whatever', ''),
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
(18, 100046, '', 167, '', 'asdfsadfsadf', 'asdfsdfa', 'sdafsadf', '0000-00-00', 'M', '', '3698525896', '', '', '', 'sadfsadfsadf', '', '', '', 'asdfasdf', 'sfd', 'Philippines', '1234', 'asdfsdaf', ''),
(19, 100047, 'en', 0, 'Mr', 'iuytre', 'trewq', '', '1988-02-08', 'M', '', '', '12341241', 'tre', 'trwq', 'tyurturty', 'rety erty ', 'm erwty erty ', 'erty rety ', '', '', 'China', '', '', 'ytrewq'),
(21, 100049, 'en', 0, 'Mr', 'Besperat', 'Shuna', '', '1989-04-02', 'M', '', '', '09996636956', 'Power Forward', 'Basketball Player', 'sadf', 'Timoto matayone', 'Washum miming', 'Tomam', '', '', 'China', '', '', 'R3265FEG12'),
(22, 100050, 'en', 0, 'Mr', 'sadf', 'sdf', '', '1973-02-04', 'M', '', '', 'sadf', 'sadf', 'sadf', 'sadfasfdfasdfasdf', 'sdf', '8765asdfsadfs', 'sdaf', '', '', 'China', '', '', 'sadf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`AccountID`),
  ADD KEY `CaseFileID` (`AccountID`),
  ADD KEY `CaseFileID_2` (`AccountID`);

--
-- Indexes for table `bankaccounts`
--
ALTER TABLE `bankaccounts`
  ADD PRIMARY KEY (`BankAccountID`),
  ADD KEY `BankAccountID` (`BankAccountID`),
  ADD KEY `BankAccountID_2` (`BankAccountID`);

--
-- Indexes for table `casefiles`
--
ALTER TABLE `casefiles`
  ADD PRIMARY KEY (`CaseFileID`),
  ADD KEY `CaseFileID` (`CaseFileID`),
  ADD KEY `CaseFileID_2` (`CaseFileID`);

--
-- Indexes for table `churches`
--
ALTER TABLE `churches`
  ADD PRIMARY KEY (`churchID`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `product_items`
--
ALTER TABLE `product_items`
  ADD PRIMARY KEY (`ProductItemID`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`SettingsID`);

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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `AccountID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10024;
--
-- AUTO_INCREMENT for table `bankaccounts`
--
ALTER TABLE `bankaccounts`
  MODIFY `BankAccountID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `casefiles`
--
ALTER TABLE `casefiles`
  MODIFY `CaseFileID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10015;
--
-- AUTO_INCREMENT for table `churches`
--
ALTER TABLE `churches`
  MODIFY `churchID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `FileID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=752;
--
-- AUTO_INCREMENT for table `file_items`
--
ALTER TABLE `file_items`
  MODIFY `FileItemID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(21) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_items`
--
ALTER TABLE `product_items`
  MODIFY `ProductItemID` int(21) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `SettingsID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usercapabilities`
--
ALTER TABLE `usercapabilities`
  MODIFY `UserCapabilityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `userlevels`
--
ALTER TABLE `userlevels`
  MODIFY `UserLevelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100051;
--
-- AUTO_INCREMENT for table `user_meta`
--
ALTER TABLE `user_meta`
  MODIFY `UserMetaID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
