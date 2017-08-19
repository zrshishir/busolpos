-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2017 at 10:59 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timf`
--

-- --------------------------------------------------------

--
-- Table structure for table `brns`
--

CREATE TABLE `brns` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `ZoneId` int(11) DEFAULT NULL,
  `DivisionOfficeId` int(11) DEFAULT NULL,
  `AreaId` int(11) DEFAULT NULL,
  `BranchName` varchar(500) DEFAULT NULL,
  `BranchCode` varchar(500) DEFAULT NULL,
  `BranchAddress` varchar(500) DEFAULT NULL,
  `BranchMobileNo` varchar(500) DEFAULT NULL,
  `BranchEmail` varchar(500) DEFAULT NULL,
  `BranchThanaId` int(11) DEFAULT NULL,
  `BranchDistrictId` int(11) DEFAULT NULL,
  `BranchDivisionId` int(11) DEFAULT NULL,
  `BranchUnionId` int(11) DEFAULT NULL,
  `BranchWardId` int(11) DEFAULT NULL,
  `BranchPostOfficeId` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brns`
--
ALTER TABLE `brns`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brns`
--
ALTER TABLE `brns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
