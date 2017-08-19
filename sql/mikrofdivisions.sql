-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2017 at 07:15 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timf`
--

-- --------------------------------------------------------

--
-- Table structure for table `mikrofdivisions`
--

CREATE TABLE `mikrofdivisions` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `DomainId` int(2) unsigned NOT NULL,
  `DivisionOfficeName` varchar(500) DEFAULT NULL,
  `DivisionOfficeNameBangla` varchar(500) DEFAULT NULL,
  `DivisionOfficeCode` varchar(500) DEFAULT NULL,
  `DivisionOfficeAddress` varchar(500) DEFAULT NULL,
  `DivisionOfficeMobileNo` varchar(500) DEFAULT NULL,
  `DivisionOfficeEmail` varchar(500) DEFAULT NULL,
  `DivisionOfficeDivisionId` varchar(500) DEFAULT NULL,
  `DivisionOfficeDistrictId` varchar(500) DEFAULT NULL,
  `DivisionOfficeThanaId` varchar(500) DEFAULT NULL,
  `DivisionOfficeUnionId` varchar(500) DEFAULT NULL,
  `DivisionOfficePostOfficeId` varchar(500) DEFAULT NULL,
  `DivisionOfficeWardId` varchar(500) DEFAULT NULL,
  `DivisionOfficeRoadNo` varchar(500) DEFAULT NULL,
  
  PRIMARY KEY (`id`),
  FOREIGN KEY (`DomainId`) REFERENCES `domains` (`id`)
  ON DELETE CASCADE
  ON UPDATE CASCADE
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mikrofdivisions`
--
-- ALTER TABLE `mikrofdivisions`
--   ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mikrofdivisions`
--
-- ALTER TABLE `mikrofdivisions`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
