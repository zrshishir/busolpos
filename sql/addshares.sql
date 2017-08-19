-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2017 at 01:07 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

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
-- Table structure for table `addshares`
--

CREATE TABLE `addshares` (
  `id` int(11) NOT NULL,
  `serial_no` int(11) DEFAULT NULL,
  `member_id` varchar(500) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `share_number` int(22) DEFAULT NULL,
  `share_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY ('id')
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addshares`
--

INSERT INTO `addshares` (`id`, `serial_no`, `member_id`, `date`, `share_number`, `share_amount`, `created_at`, `updated_at`) VALUES
(1, 1, '1', NULL, 1, 100, NULL, NULL),
(2, 1, NULL, NULL, NULL, NULL, '2017-04-09 04:53:30', '2017-04-09 04:53:30'),
(3, 1, '1', NULL, NULL, NULL, '2017-04-09 04:55:02', '2017-04-09 04:55:02'),
(4, 1, '1', NULL, NULL, NULL, '2017-04-09 04:56:02', '2017-04-09 04:56:02'),
(5, 1, '1', NULL, 1, 100, NULL, NULL),
(6, 1, '1', NULL, 1, 1, NULL, NULL),
(7, 1, '1', '2017-04-08 18:00:00', 1, 100, '2017-04-09 05:01:43', '2017-04-09 05:01:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addshares`
--
ALTER TABLE `addshares`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addshares`
--
ALTER TABLE `addshares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
