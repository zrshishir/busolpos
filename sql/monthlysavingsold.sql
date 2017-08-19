-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2017 at 11:35 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cosociety`
--

-- --------------------------------------------------------

--
-- Table structure for table `monthlysavings`
--

CREATE TABLE `monthlysavings` (
  `id` int(11) NOT NULL,
  `serial_no` varchar(11) DEFAULT NULL,
  `member_id` varchar(500) DEFAULT NULL,
  `member_name` varchar(500) NOT NULL,
  `mobile_no` varchar(500) DEFAULT NULL,
  `saving_amount` varchar(11) DEFAULT NULL,
  `withdrawal_amount` varchar(50) NOT NULL,
  `created_at` varchar(500) DEFAULT NULL,
  `updated_at` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `monthlysavings`
--

INSERT INTO `monthlysavings` (`id`, `serial_no`, `member_id`, `member_name`, `mobile_no`, `saving_amount`, `withdrawal_amount`, `created_at`, `updated_at`, `name`) VALUES
(2, '1', '1', '1', '1', '1', '1', '1970-01-01 00:00:01', '1970-01-01 00:00:01', ''),
(3, '3', '3', '3', '3', '3', '3', '1970-01-01 00:00:02', '2017-01-26 09:18:39', ''),
(5, '2', '2', '2', '2', '2', '2', '1970-01-01 00:00:02', '1970-01-01 00:00:02', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `monthlysavings`
--
ALTER TABLE `monthlysavings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `monthlysavings`
--
ALTER TABLE `monthlysavings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
