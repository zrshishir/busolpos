-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2017 at 07:37 AM
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
-- Table structure for table `producttypes`
--

CREATE TABLE `producttypes` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `ProducttypeyName` varchar(500) DEFAULT NULL,
  `ProducttypeyCode` varchar(500) DEFAULT NULL,
  `ProductInstallments` int(11) NOT NULL DEFAULT '0',
  `ProductRate` float NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producttypes`
--

INSERT INTO `producttypes` (`id`, `name`, `ProducttypeyName`, `ProducttypeyCode`, `ProductInstallments`, `ProductRate`, `created_at`, `updated_at`) VALUES
(1, NULL, 'বিনিয়োগ', '1001', 12, 12, '2017-02-02 10:30:37', '2017-02-11 08:02:56'),
(3, NULL, 'ঋণ', '1002', 18, 14, '2017-02-02 11:01:59', '2017-02-11 08:03:22'),
(4, NULL, 'সঞ্চয়', '1003', 24, 13, '2017-02-02 11:02:53', '2017-02-11 08:03:10'),
(5, NULL, 'ইন্সুরেন্স', '456877', 12, 14, '2017-02-11 08:03:56', '2017-02-11 08:03:56'),
(6, NULL, 'BUSNESS', '01', 12, 15, '2017-05-07 04:47:41', '2017-05-07 04:47:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `producttypes`
--
ALTER TABLE `producttypes`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
