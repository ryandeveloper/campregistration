-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2016 at 09:10 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `odeonco_portal`
--

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
  `UBOEmploymentIncome` text NOT NULL,
  `UBOCommission` text NOT NULL,
  `UBOBusiness` text NOT NULL,
  `UBOInheritance` text NOT NULL,
  `UBOGift` text NOT NULL,
  `UBOSales` text NOT NULL,
  `UBOOther` text NOT NULL,
  `PrimaryTaxResidency` varchar(128) NOT NULL,
  `TaxIdNumber` varchar(128) NOT NULL,
  `NeedCoolingOff` varchar(16) NOT NULL,
  `BeneficiariesForm` text NOT NULL,
  `PowerOfAttorney` text NOT NULL,
  `Agreement` text NOT NULL,
  `SupportingDocument` text NOT NULL,
  `IAPhotoid` text NOT NULL,
  `IAProofresidency` text NOT NULL,
  `IABankstatement` text NOT NULL,
  `IASpecimensign` text NOT NULL,
  `CACertincorporation` text NOT NULL,
  `CANamechange` text NOT NULL,
  `CAGoodstand` text NOT NULL,
  `CARegdirector` text NOT NULL,
  `CAProofbusadd` text NOT NULL,
  `CAMemorandumaa` text NOT NULL,
  `CARecentfinancialstatement` text NOT NULL,
  `CADirectorsid` text NOT NULL,
  `CACompanysign` text NOT NULL,
  `CAShareholders` text NOT NULL,
  `CADirectorsproof` text NOT NULL,
  `CACompanysignproof` text NOT NULL,
  `CAShareholdersproof` text NOT NULL,
  `CAAuthorizedone` text NOT NULL,
  `CAAuthorizedonename` varchar(64) NOT NULL,
  `CAAuthorizedonetitle` varchar(64) NOT NULL,
  `CAAuthorizedtwo` text NOT NULL,
  `CAAuthorizedtwoname` varchar(64) NOT NULL,
  `CAAuthorizedtwotitle` varchar(64) NOT NULL,
  `CAAuthorizedthree` text NOT NULL,
  `CAAuthorizedthreename` varchar(64) NOT NULL,
  `CAAuthorizedthreetitle` varchar(64) NOT NULL,
  `CAAuthorizedfour` text NOT NULL,
  `CAAuthorizedfourname` varchar(64) NOT NULL,
  `CAAuthorizedfourtitle` varchar(64) NOT NULL,
  `DateFiled` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `POADate` text NOT NULL,
  `POAFirstName` text NOT NULL,
  `POALastName` text NOT NULL,
  `POACompanyName` text NOT NULL,
  `POACompanyNumber` text NOT NULL,
  `POACompanyCountry` text NOT NULL,
  `POACompanyAddress` text NOT NULL,
  `POACompanyCity` text NOT NULL,
  `POACompanyState` text NOT NULL,
  `POAAppointor` text NOT NULL,
  `POAAppointorIdNumber` text NOT NULL,
  `POACorporateSeal` text NOT NULL,
  `POADirectorSign` text NOT NULL,
  `POASecretarySign` text NOT NULL,
  `ProductID` int(11) NOT NULL,
  `ProductItem` text NOT NULL,
  `DepositedAmount` int(11) NOT NULL,
  `TransactionDate` date NOT NULL,
  `CommencementDate` date NOT NULL,
  `MaturityDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `casefiles`
--

INSERT INTO `casefiles` (`CaseFileID`, `UserID`, `HasNominatedBeneficiaries`, `UBOName`, `UBOAddress`, `UBOEmploymentIncome`, `UBOCommission`, `UBOBusiness`, `UBOInheritance`, `UBOGift`, `UBOSales`, `UBOOther`, `PrimaryTaxResidency`, `TaxIdNumber`, `NeedCoolingOff`, `BeneficiariesForm`, `PowerOfAttorney`, `Agreement`, `SupportingDocument`, `IAPhotoid`, `IAProofresidency`, `IABankstatement`, `IASpecimensign`, `CACertincorporation`, `CANamechange`, `CAGoodstand`, `CARegdirector`, `CAProofbusadd`, `CAMemorandumaa`, `CARecentfinancialstatement`, `CADirectorsid`, `CACompanysign`, `CAShareholders`, `CADirectorsproof`, `CACompanysignproof`, `CAShareholdersproof`, `CAAuthorizedone`, `CAAuthorizedonename`, `CAAuthorizedonetitle`, `CAAuthorizedtwo`, `CAAuthorizedtwoname`, `CAAuthorizedtwotitle`, `CAAuthorizedthree`, `CAAuthorizedthreename`, `CAAuthorizedthreetitle`, `CAAuthorizedfour`, `CAAuthorizedfourname`, `CAAuthorizedfourtitle`, `DateFiled`, `POADate`, `POAFirstName`, `POALastName`, `POACompanyName`, `POACompanyNumber`, `POACompanyCountry`, `POACompanyAddress`, `POACompanyCity`, `POACompanyState`, `POAAppointor`, `POAAppointorIdNumber`, `POACorporateSeal`, `POADirectorSign`, `POASecretarySign`, `ProductID`, `ProductItem`, `DepositedAmount`, `TransactionDate`, `CommencementDate`, `MaturityDate`) VALUES
(10009, 100040, 'Y', 'Momo', 'Kamo', '', '', 'YToxOntpOjA7czozNDoiLzIwMTYvMDgvMDIvMmM1YjNkOWRfMTY1NDg5MzAyLmpwZyI7fQ==', '', '', '', '', 'Watashiwa, Coronadan, Cavite', '3369852147', 'Y', 'YToxOntpOjA7czo1NzoiLzIwMTYvMDgvMDIvNDVmZjNmMmVfNWZkZTg2Zjc1YTEzN2EyNzI1MzYzODJiMjczMDU3YzIuanBnIjt9', 'YToxOntpOjA7czo1NzoiLzIwMTYvMDgvMDIvNjg1MWQzZjBfMmVjZTgyZGRiZWQzYThjNzg4OWU1Yzk2ODY4MTAyZDcuanBnIjt9', '', '', '', '', '', '', 'YToxOntpOjA7czozNzoiLzIwMTYvMDgvMDIvYjBmYTBjODJfNDg5MjQ3N19vcmlnLmpwZyI7fQ==', 'YToxOntpOjA7czo1NToiLzIwMTYvMDgvMDIvZDAxY2UxYjRfM2QtRmFjZS1PZi1MaW9uLVdhbGxwYXBlci1CZXN0LmpwZyI7fQ==', 'YToxOntpOjA7czo1NzoiLzIwMTYvMDgvMDIvNDAxNjI5YTVfN2Q2YmUzNjhhMTdlN2JkZjMwOGEwMjI1YjRjYTllYjYuanBnIjt9', 'YToxOntpOjA7czo2MToiLzIwMTYvMDgvMDIvMmI3MDRlZWNfOEFDRDk3QUMtMEE5OC00M0JBLUFFNEQtQTdDRkIzQUQ2NkNGLmpwZyI7fQ==', 'YToxOntpOjA7czozNToiLzIwMTYvMDgvMDIvMTM5ZDkxYWZfNDYwNjUzNDYyOC5qcGciO30=', 'YToxOntpOjA7czozNzoiLzIwMTYvMDgvMDIvMzQzYTFkYTJfNDg5MjQ3N19vcmlnLmpwZyI7fQ==', 'YToxOntpOjA7czo1NToiLzIwMTYvMDgvMDIvNGJkNjU0MjhfM2QtRmFjZS1PZi1MaW9uLVdhbGxwYXBlci1CZXN0LmpwZyI7fQ==', 'YToxOntpOjA7czozMzoiLzIwMTYvMDgvMDIvNTY0YTAyMzFfX01HXzAzNDMuanBnIjt9', 'YToxOntpOjA7czozNDoiLzIwMTYvMDgvMDIvYjQ4MDcxMTRfYmFzcy1jbGVmLnBuZyI7fQ==', 'YToxOntpOjA7czozNDoiLzIwMTYvMDgvMDIvMTRlMjM0ODRfYmFzcy1jbGVmLnBuZyI7fQ==', 'YToxOntpOjA7czozMjoiLzIwMTYvMDgvMDIvYTA2Mjg2NzlfMTU0NDQ1My5qcGciO30=', 'YToxOntpOjA7czo3NDoiLzIwMTYvMDgvMDIvZDZhZDI1Y2RfZmx5aW5nLWNsaXBhcnQtYmlyZC1zaWxob3VldHRlcy1iYWxkLWVhZ2xlLWZseWluZy5qcGciO30=', 'YToxOntpOjA7czozNDoiLzIwMTYvMDgvMDIvYjNkYWQ1ZWVfNDUxMDEwNDY1LmpwZyI7fQ==', 'YToxOntpOjA7czo3OToiLzIwMTYvMDgvMDIvZmY4MWMzNTdfY2xpcGFydC10aHVtYnMtdXBnb29kLXRodW1iLXVwLS0tY2xpcGFydC1iZXN0LXR0eHhkeDB5LnBuZyI7fQ==', '1', '1', 'YToxOntpOjA7czozNzoiLzIwMTYvMDgvMDIvZjA3OTIzNTZfQWJpX2xvYmFyYmlvLnBuZyI7fQ==', '2', '2', 'YToxOntpOjA7czo1NzoiLzIwMTYvMDgvMDIvMDY0YzcwYmFfYmMyOWQ3MGVmNzA0NTc3M2JhYTU0MjE2MGFmMzUzN2IuanBnIjt9', '3', '3', '', '4', '4', '2016-08-02 09:09:14', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, '0000-00-00', '0000-00-00', '0000-00-00'),
(10012, 100043, 'Y', 'Atarma Mutarwi', 'Greeno Saba Malaysia', '', '', '', 'YToxOntpOjA7czo1NzoiLzIwMTYvMDgvMDMvMzhmNWZjZjNfOGYwOWRiNThjOWFhMjhjNDYwYmQ2NTkwNTk2MjY5OGYuanBnIjt9', '', '', '', 'Greeno Saba Malaysia', '3124569858585', '', 'YToxOntpOjA7czoyNjoiLzIwMTYvMDgvMDMvZjg4MDBkN2NfMS5wbmciO30=', '', '', '', 'YToxOntpOjA7czo0MjoiLzIwMTYvMDgvMDMvYjVkMWU2MmJfOTI1MjJmcmVlbW90aGVyczkucG5nIjt9', 'YToyOntpOjA7czo1NToiLzIwMTYvMDgvMDMvNmJlY2M2ODZfM2QtRmFjZS1PZi1MaW9uLVdhbGxwYXBlci1CZXN0LmpwZyI7aToxO3M6MjY6Ii8yMDE2LzA4LzAzLzE0MTZlMDcyXzkucG5nIjt9', 'YToyOntpOjA7czo2NDoiLzIwMTYvMDgvMDMvYzEyNjYzZmRfMTA3MDgzNjlfMTAyMDQ4MjY5MzE5NDIwODJfMTUyMTU2OTI1Nl9uLmpwZyI7aToxO3M6ODU6Ii8yMDE2LzA4LzAzL2VkZjlmMDI1XzI4MTcwOTQ5fjQwNjYwZDgxZTJjOWYwNTJmMTRkMzdhOTgwZjNhOTgzMTQ3MWNkZTYtc3RvY2tsYXJnZS5wbmciO30=', 'YToyOntpOjA7czozMjoiLzIwMTYvMDgvMDMvYWYwZDdhNDBfMTU0NDQ1My5qcGciO2k6MTtzOjMyOiIvMjAxNi8wOC8wMy9iMDAyZDA2OF8xNjM5MzYyLmpwZyI7fQ==', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2016-08-03 22:30:58', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, '0000-00-00', '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `casefiles`
--
ALTER TABLE `casefiles`
  ADD PRIMARY KEY (`CaseFileID`),
  ADD KEY `CaseFileID` (`CaseFileID`),
  ADD KEY `CaseFileID_2` (`CaseFileID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `casefiles`
--
ALTER TABLE `casefiles`
  MODIFY `CaseFileID` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10013;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
