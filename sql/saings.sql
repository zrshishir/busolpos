-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2017 at 05:47 AM
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
-- Table structure for table `shares`
--
DROP TABLE IF EXISTS `savings`;
CREATE TABLE `savings` (
  `id` int(11) NOT NULL,
  `serial_no` varchar(100) DEFAULT NULL,
  `member_id` varchar(100) DEFAULT NULL,
  `member_name` varchar(100) DEFAULT NULL,
  `mobile_no` varchar(100) DEFAULT NULL,
  `share_number` varchar(100) DEFAULT NULL,
  `share_amount` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shares`
--

INSERT INTO `shares` (`id`, `serial_no`, `member_id`, `member_name`, `mobile_no`, `share_number`, `share_amount`, `created_at`, `updated_at`) VALUES
(2, '23', '23', '1', '1', '1', '1', '1970-01-01 00:00:01', '2017-01-29 04:29:16'),
(3, '3', '3', '3', '3', '3', '3', '1970-01-01 00:00:02', '2017-01-26 09:18:39'),
(5, '2', '2', '2', '2', '2', '2', '1970-01-01 00:00:02', '1970-01-01 00:00:02'),
(6, '5', '5', '5', '5', '5', '5', '1970-01-01 00:00:05', '1970-01-01 00:00:05'),
(7, '6', '6', '6', '6', '6', '6', '1970-01-01 00:00:06', '1970-01-01 00:00:06'),
(8, '6', '6', '6', '6', '6', '6', '1970-01-01 00:00:06', '1970-01-01 00:00:06'),
(9, '7', '7', '7', '7', '7', '7', '1970-01-01 00:00:07', '1970-01-01 00:00:07'),
(10, '8', '8', '8', '8', '8', '8', '1970-01-01 00:00:08', '1970-01-01 00:00:08'),
(11, '9', '9', '9', '9', '9', '9', '1970-01-01 00:00:09', '1970-01-01 00:00:09'),
(12, '10', '10', '10', '01', '10', '10', '1970-01-01 00:00:10', '1970-01-01 00:00:10'),
(13, '11', '1', '11', '11', '11', '11', '1970-01-01 00:00:11', '1970-01-01 00:00:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shares`
--
ALTER TABLE `shares`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shares`
--
ALTER TABLE `shares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
