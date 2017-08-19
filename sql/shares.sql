-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2017 at 08:12 AM
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
-- Table structure for table `shares`
--

CREATE TABLE `shares` (
  `id` int(11) NOT NULL,
  `serial_no` varchar(11) DEFAULT NULL,
  `member_id` varchar(500) DEFAULT NULL,
  `member_name` varchar(500) DEFAULT NULL,
  `mobile_no` varchar(500) DEFAULT NULL,
  `base_share_number` int(11) DEFAULT NULL,
  `base_share_amount` float DEFAULT NULL,
  `add_share_number` int(11) DEFAULT NULL,
  `add_share_amount` float DEFAULT NULL,
  `withdraw_share_number` int(11) DEFAULT NULL,
  `withdraw_share_amount` float DEFAULT NULL,
  `present_share_number` int(11) DEFAULT NULL,
  `present_share_amount` float DEFAULT NULL,
  `date` varchar(500) DEFAULT NULL,
  `created_at` varchar(500) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  primary key (member_id`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shares`
--

INSERT INTO `shares` (`id`, `serial_no`, `member_id`, `member_name`, `mobile_no`, `base_share_number`, `base_share_amount`, `add_share_number`, `add_share_amount`, `withdraw_share_number`, `withdraw_share_amount`, `present_share_number`, `present_share_amount`, `date`, `created_at`, `updated_at`, `name`) VALUES(1, '3', 'shohan', '2121', NULL, 22, 2200, 23, 234556, NULL, NULL, 23, 234556, NULL, NULL, '2017-04-08 10:29:48', '');
INSERT INTO `shares` (`id`, `serial_no`, `member_id`, `member_name`, `mobile_no`, `base_share_number`, `base_share_amount`, `add_share_number`, `add_share_amount`, `withdraw_share_number`, `withdraw_share_amount`, `present_share_number`, `present_share_amount`, `date`, `created_at`, `updated_at`, `name`) VALUES(2, '3', '3', '32', '3', 3, 3, 23, 234556, NULL, NULL, 23, 234556, NULL, NULL, '2017-04-08 10:29:48', '');
INSERT INTO `shares` (`id`, `serial_no`, `member_id`, `member_name`, `mobile_no`, `base_share_number`, `base_share_amount`, `add_share_number`, `add_share_amount`, `withdraw_share_number`, `withdraw_share_amount`, `present_share_number`, `present_share_amount`, `date`, `created_at`, `updated_at`, `name`) VALUES(3, '4', 'rocky', '4', '23432', 5, 500, NULL, NULL, NULL, NULL, NULL, NULL, '234322', '2017-04-08 10:32:19', '2017-04-08 10:32:19', NULL);
INSERT INTO `shares` (`id`, `serial_no`, `member_id`, `member_name`, `mobile_no`, `base_share_number`, `base_share_amount`, `add_share_number`, `add_share_amount`, `withdraw_share_number`, `withdraw_share_amount`, `present_share_number`, `present_share_amount`, `date`, `created_at`, `updated_at`, `name`) VALUES(4, '5', '55', 'noor', '3423', 6, 600, NULL, NULL, NULL, NULL, 6, 600, '23232', '2017-04-08 10:59:28', '2017-04-08 10:59:28', NULL);
INSERT INTO `shares` (`id`, `serial_no`, `member_id`, `member_name`, `mobile_no`, `base_share_number`, `base_share_amount`, `add_share_number`, `add_share_amount`, `withdraw_share_number`, `withdraw_share_amount`, `present_share_number`, `present_share_amount`, `date`, `created_at`, `updated_at`, `name`) VALUES(5, '121', '121', 'Noor alom', '23432', 20, 2000, NULL, NULL, NULL, NULL, 20, 2000, '23423', '2017-04-09 06:03:22', '2017-04-09 06:03:22', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
