-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2017 at 06:17 AM
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
-- Table structure for table `account_status`
--

CREATE TABLE `account_status` (
  `id` int(11) UNSIGNED NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_status`
--

INSERT INTO `account_status` (`id`, `description`) VALUES
(1, 'Active'),
(2, 'Inactive'),
(3, 'Suspended'),
(4, 'Deactivated'),
(5, 'Blocked');

-- --------------------------------------------------------

--
-- Table structure for table `appformandpassbooks`
--

CREATE TABLE `appformandpassbooks` (
  `id` int(11) NOT NULL,
  `serial_no` int(11) DEFAULT NULL,
  `member_name` varchar(500) DEFAULT NULL,
  `member_id` varchar(500) DEFAULT NULL,
  `mobile_no` varchar(500) DEFAULT NULL,
  `date` varchar(500) DEFAULT NULL,
  `app_form` varchar(500) DEFAULT NULL,
  `passbook` int(11) DEFAULT NULL,
  `share_number` int(11) DEFAULT NULL,
  `share_amount` int(11) DEFAULT NULL,
  `saving_amount` int(11) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `unitprice` decimal(10,2) DEFAULT '0.00',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appformandpassbooks`
--

INSERT INTO `appformandpassbooks` (`id`, `serial_no`, `member_name`, `member_id`, `mobile_no`, `date`, `app_form`, `passbook`, `share_number`, `share_amount`, `saving_amount`, `name`, `unitprice`, `created_at`, `updated_at`) VALUES
(2, 1, 'Ziaur Rahman', '1122', NULL, '16/03/2017', '100', 50, 1, 100, 100, NULL, '0.00', '2017-03-16 04:38:08', '2017-03-16 04:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `AreaCode` varchar(500) DEFAULT NULL,
  `testfield` varchar(500) DEFAULT NULL,
  `unitprice` decimal(10,2) DEFAULT '0.00',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `name`, `AreaCode`, `testfield`, `unitprice`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '3', '4.00', '2017-01-02 10:05:05', '2017-01-02 10:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `assets_debt_info`
--

CREATE TABLE `assets_debt_info` (
  `id` int(11) NOT NULL,
  `member_id` int(11) UNSIGNED DEFAULT NULL,
  `loan_id` int(11) UNSIGNED DEFAULT NULL,
  `type_id` int(11) UNSIGNED DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, '1', '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brns`
--

CREATE TABLE `brns` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `BrnCode` varchar(500) DEFAULT NULL,
  `testfield` varchar(500) DEFAULT NULL,
  `unitprice` decimal(10,2) DEFAULT '0.00',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brns`
--

INSERT INTO `brns` (`id`, `name`, `BrnCode`, `testfield`, `unitprice`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '3', '4.00', '2017-01-03 05:16:26', '2017-01-03 05:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `business_types`
--

CREATE TABLE `business_types` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `business_types`
--

INSERT INTO `business_types` (`id`, `name`) VALUES
(1, 'OwnerShip'),
(2, 'PartnerShip');

-- --------------------------------------------------------

--
-- Table structure for table `cashinflows`
--

CREATE TABLE `cashinflows` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `CashinflowCode` varchar(500) DEFAULT NULL,
  `testfield` varchar(500) DEFAULT NULL,
  `unitprice` decimal(10,2) DEFAULT '0.00',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cashinflows`
--

INSERT INTO `cashinflows` (`id`, `name`, `CashinflowCode`, `testfield`, `unitprice`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '3', '4.00', '2017-01-03 04:08:12', '2017-01-03 04:08:12');

-- --------------------------------------------------------

--
-- Table structure for table `cashoutflows`
--

CREATE TABLE `cashoutflows` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `CashoutflowCode` varchar(500) DEFAULT NULL,
  `testfield` varchar(500) DEFAULT NULL,
  `unitprice` decimal(10,2) DEFAULT '0.00',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cashoutflows`
--

INSERT INTO `cashoutflows` (`id`, `name`, `CashoutflowCode`, `testfield`, `unitprice`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '3', '4.00', '2017-01-03 04:13:40', '2017-01-03 04:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `cash_inflow`
--

CREATE TABLE `cash_inflow` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cash_inflow`
--

INSERT INTO `cash_inflow` (`id`, `name`, `description`) VALUES
(1, 'test', 'test'),
(2, ' member', 'test Member');

-- --------------------------------------------------------

--
-- Table structure for table `cash_outflow`
--

CREATE TABLE `cash_outflow` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cash_outflow`
--

INSERT INTO `cash_outflow` (`id`, `name`, `description`) VALUES
(1, 'test', 'test'),
(2, ' member', 'test Member');

-- --------------------------------------------------------

--
-- Table structure for table `countrs`
--

CREATE TABLE `countrs` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `CountrCode` varchar(500) DEFAULT NULL,
  `testfield` varchar(500) DEFAULT NULL,
  `unitprice` decimal(10,2) DEFAULT '0.00',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countrs`
--

INSERT INTO `countrs` (`id`, `name`, `CountrCode`, `testfield`, `unitprice`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '3', '4.00', '2017-01-03 05:20:40', '2017-01-03 05:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'TMMS-ICT'),
(2, 'TMMS-Account');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `DistrictCode` varchar(500) DEFAULT NULL,
  `testfield` varchar(500) DEFAULT NULL,
  `unitprice` decimal(10,2) DEFAULT '0.00',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `DistrictCode`, `testfield`, `unitprice`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '3', '4.00', '2017-01-03 05:09:39', '2017-01-03 05:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `DivisionCode` varchar(500) DEFAULT NULL,
  `testfield` varchar(500) DEFAULT NULL,
  `unitprice` decimal(10,2) DEFAULT '0.00',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `DivisionCode`, `testfield`, `unitprice`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '3', '4.00', '2017-01-03 04:44:37', '2017-01-03 04:44:37');

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `name`) VALUES
(1, 'PSC'),
(2, 'JSC'),
(3, 'SSC'),
(4, 'HSC');

-- --------------------------------------------------------

--
-- Table structure for table `joiningmoneyreceipts`
--

CREATE TABLE `joiningmoneyreceipts` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `JoiningmoneyreceiptCode` varchar(500) DEFAULT NULL,
  `test12` varchar(500) DEFAULT NULL,
  `test13` varchar(500) DEFAULT NULL,
  `test14` varchar(500) DEFAULT NULL,
  `test15` varchar(500) DEFAULT NULL,
  `test16` varchar(500) DEFAULT NULL,
  `unitprice` decimal(10,2) DEFAULT '0.00',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `joiningmoneyreceipts`
--

INSERT INTO `joiningmoneyreceipts` (`id`, `name`, `JoiningmoneyreceiptCode`, `test12`, `test13`, `test14`, `test15`, `test16`, `unitprice`, `created_at`, `updated_at`) VALUES
(1, 'name1mo', NULL, NULL, NULL, NULL, NULL, NULL, '3.60', NULL, '2016-12-26 05:14:56'),
(2, '1', '2', NULL, NULL, NULL, NULL, NULL, '3.00', '2017-01-07 05:53:27', '2017-01-07 05:53:27'),
(3, '7', '6', NULL, NULL, NULL, NULL, NULL, '5.00', '2017-01-07 05:53:33', '2017-01-07 05:53:33'),
(4, '0', '9', '8', '7', '6', '5', '4', '3.00', '2017-01-07 07:18:01', '2017-01-07 07:18:01'),
(5, '9', '8', '7', '6', '5', '4', '3', '2.00', '2017-01-11 04:30:04', '2017-01-11 04:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `loanapplicationmoneyreceipts`
--

CREATE TABLE `loanapplicationmoneyreceipts` (
  `id` int(11) NOT NULL,
  `serial_no` varchar(100) DEFAULT NULL,
  `member_name` varchar(100) DEFAULT NULL,
  `member_id` varchar(100) DEFAULT NULL,
  `mobile_no` varchar(100) DEFAULT NULL,
  `form_fee` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loanapplications`
--

CREATE TABLE `loanapplications` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `LoanapplicationCode` varchar(500) DEFAULT NULL,
  `unitprice` decimal(10,2) DEFAULT '0.00',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loanapplications`
--

INSERT INTO `loanapplications` (`id`, `name`, `LoanapplicationCode`, `unitprice`, `created_at`, `updated_at`) VALUES
(1, 'name1mo', NULL, '3.60', NULL, '2016-12-26 05:14:56'),
(2, '1', '2', '3.00', '2017-01-07 06:22:01', '2017-01-07 06:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `ProductCode` varchar(500) DEFAULT NULL,
  `unitprice` decimal(10,2) DEFAULT '0.00',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `MemberId` varchar(500) DEFAULT NULL,
  `BanglaName` varchar(500) DEFAULT NULL,
  `EnglishName` varchar(500) DEFAULT NULL,
  `FatherName` varchar(500) DEFAULT NULL,
  `MotherName` varchar(500) DEFAULT NULL,
  `HusbandWifeName` varchar(500) DEFAULT NULL,
  `Age` varchar(500) DEFAULT NULL,
  `Occupation` varchar(500) DEFAULT NULL,
  `Nationality` varchar(500) DEFAULT NULL,
  `NId` varchar(500) DEFAULT NULL,
  `PassportNo` varchar(500) DEFAULT NULL,
  `TaxIdNo` varchar(500) DEFAULT NULL,
  `Phone` varchar(500) DEFAULT NULL,
  `Mobile` varchar(500) DEFAULT NULL,
  `PresentVillageName` varchar(500) DEFAULT NULL,
  `PresentPostOffice` varchar(500) DEFAULT NULL,
  `PresentUpojela` varchar(500) DEFAULT NULL,
  `PresentJela` varchar(500) DEFAULT NULL,
  `SPName` varchar(500) DEFAULT NULL,
  `SPName2` varchar(500) DEFAULT NULL,
  `SPMotherName` varchar(500) DEFAULT NULL,
  `SPMotherName2` varchar(500) DEFAULT NULL,
  `SPHusbandWifeName` varchar(500) DEFAULT NULL,
  `SPHusbandWifeName2` varchar(500) DEFAULT NULL,
  `Relation` varchar(500) DEFAULT NULL,
  `Relation2` varchar(500) DEFAULT NULL,
  `GivenPortion` varchar(500) DEFAULT NULL,
  `GivenPortion2` varchar(500) DEFAULT NULL,
  `Image` varchar(500) DEFAULT NULL,
  `TMSSIdCard` varchar(500) DEFAULT NULL,
  `NIdImage` varchar(500) DEFAULT NULL,
  `NomineeImage` varchar(500) DEFAULT NULL,
  `BirthCertificate` varchar(500) DEFAULT NULL,
  `NomineeImage2` varchar(500) DEFAULT NULL,
  `BirthCertificate2` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `MemberId`, `BanglaName`, `EnglishName`, `FatherName`, `MotherName`, `HusbandWifeName`, `Age`, `Occupation`, `Nationality`, `NId`, `PassportNo`, `TaxIdNo`, `Phone`, `Mobile`, `PresentVillageName`, `PresentPostOffice`, `PresentUpojela`, `PresentJela`, `SPName`, `SPName2`, `SPMotherName`, `SPMotherName2`, `SPHusbandWifeName`, `SPHusbandWifeName2`, `Relation`, `Relation2`, `GivenPortion`, `GivenPortion2`, `Image`, `TMSSIdCard`, `NIdImage`, `NomineeImage`, `BirthCertificate`, `NomineeImage2`, `BirthCertificate2`, `created_at`, `updated_at`) VALUES
(3, '0006388', 'মোঃ খোরশেদ আলম', 'Md. Khorshed Alam', 'Mohammad Ali Sardar', 'Khoteza Bagum', 'Mohammad Ali Sardar', '55', 'Service', 'Bangladeshi', '19671012064480708', '', '', '01752745956', '01752745956', 'Doshtika', 'Nongola', 'Bogura Sadar', 'Bogura', 'Mst. Nargis Alam', '', 'Nizam Uddin', '', NULL, NULL, 'Wife', '', '100', '', '0006388_86073.jpg', NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-08 04:31:57', '2017-03-08 04:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

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
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`id`, `serial_no`, `member_id`, `member_name`, `mobile_no`, `share_number`, `share_amount`, `created_at`, `updated_at`) VALUES
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

-- --------------------------------------------------------

--
-- Table structure for table `shares`
--

CREATE TABLE `shares` (
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
-- Dumping data for table `shares`
--

INSERT INTO `shares` (`id`, `serial_no`, `member_id`, `member_name`, `mobile_no`, `saving_amount`, `withdrawal_amount`, `created_at`, `updated_at`, `name`) VALUES
(2, '1', '1', '1', '1', '1', '1', '1970-01-01 00:00:01', '1970-01-01 00:00:01', ''),
(3, '3', '3', '3', '3', '3', '3', '1970-01-01 00:00:02', '2017-01-26 09:18:39', ''),
(5, '2', '2', '2', '2', '2', '2', '1970-01-01 00:00:02', '1970-01-01 00:00:02', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `user_type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(501, 'Noor', 'webmaster.noor@gmail.com', '$2y$10$pYhCPLAl0z2OV.rPgQFf2OEhShfkvbmm3KmidHGUhtuGoIz5mBzUS', 'Gw2DVWBcMu4yZm3Nwoc05ln9hwWztvp5dxpBtcJ2N1vCVzePx7aTUIcT2gi3', 'admin', '2016-12-24 03:06:10', '2017-02-27 02:44:23', NULL),
(521, 'G-Manager1', 'g1@gmail.com', '$2y$10$3UoLsuVEyf4rm4pQZ49GQ.OHB7jDcl3fxEW4OlQhjwHs7wKE9IGcy', NULL, 'manager', '2017-02-28 00:42:23', '2017-02-28 00:42:23', NULL),
(522, 'G-Manager2', 'g2@gmail.com', '$2y$10$ViMX13rlzu.XIpm5zvLCF.cTwSDMqLJbwzsP/9n8vSw2AHRe0ue5O', NULL, 'manager', '2017-02-28 02:46:45', '2017-02-28 02:46:45', NULL),
(523, NULL, 'counter12@gmail.com', '$2y$10$7QFoc5TR/R988K7O6fo2UefTGfJAXwwa9A.RrPz1q5YQpJlMIVpii', NULL, 'counter', '2017-02-28 03:09:47', '2017-02-28 03:09:47', NULL),
(524, 'asas', 'asasd@gmail.com', '$2y$10$0vM0aNcwmozUKaWSj3ADjOexa/wcAHOGyy/UvAFwJ915/e7DEa/Aa', NULL, 'counter', '2017-02-28 03:10:28', '2017-02-28 03:10:28', NULL),
(525, 'zia', 'zrshishir@gmail.com', '$2y$10$pE3vt/W9/4r8EYIN.d8P1uMjpjhPKQJ361TLp.DX.lqXwm4phgnI6', 'j6VDKwYZxa1FYI7Xo9zmSqIF52yLLW10PKMIYts3ePLTH7IC7CGuJEk1cU0b', 'admin', '2017-03-02 10:55:27', '2017-03-07 22:32:55', NULL),
(526, 'employee', 'employee@employee.com', '$2y$10$s/WIS4B/mazG.s5spE.PPuuXQG3acx2M0IpGv7btAwrWFEEwdvndO', 'ucJ70C8gjguPC8hVndkoxaT2roLAqeFqSX39a4PhGco5ujYIHviMmGuoymVU', NULL, '2017-03-03 10:55:53', '2017-03-07 22:34:33', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_status`
--
ALTER TABLE `account_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appformandpassbooks`
--
ALTER TABLE `appformandpassbooks`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `appformandpassbooks` ADD FULLTEXT KEY `idx_name` (`name`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `areas` ADD FULLTEXT KEY `idx_name` (`name`);

--
-- Indexes for table `assets_debt_info`
--
ALTER TABLE `assets_debt_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brns`
--
ALTER TABLE `brns`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `brns` ADD FULLTEXT KEY `idx_name` (`name`);

--
-- Indexes for table `business_types`
--
ALTER TABLE `business_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashinflows`
--
ALTER TABLE `cashinflows`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `cashinflows` ADD FULLTEXT KEY `idx_name` (`name`);

--
-- Indexes for table `cashoutflows`
--
ALTER TABLE `cashoutflows`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `cashoutflows` ADD FULLTEXT KEY `idx_name` (`name`);

--
-- Indexes for table `cash_inflow`
--
ALTER TABLE `cash_inflow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_outflow`
--
ALTER TABLE `cash_outflow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countrs`
--
ALTER TABLE `countrs`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `countrs` ADD FULLTEXT KEY `idx_name` (`name`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `districts` ADD FULLTEXT KEY `idx_name` (`name`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `divisions` ADD FULLTEXT KEY `idx_name` (`name`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joiningmoneyreceipts`
--
ALTER TABLE `joiningmoneyreceipts`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `joiningmoneyreceipts` ADD FULLTEXT KEY `idx_name` (`name`);

--
-- Indexes for table `loanapplicationmoneyreceipts`
--
ALTER TABLE `loanapplicationmoneyreceipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loanapplications`
--
ALTER TABLE `loanapplications`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `loanapplications` ADD FULLTEXT KEY `idx_name` (`name`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `loans` ADD FULLTEXT KEY `idx_name` (`name`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savings`
--
ALTER TABLE `savings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shares`
--
ALTER TABLE `shares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_status`
--
ALTER TABLE `account_status`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `appformandpassbooks`
--
ALTER TABLE `appformandpassbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `assets_debt_info`
--
ALTER TABLE `assets_debt_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brns`
--
ALTER TABLE `brns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `business_types`
--
ALTER TABLE `business_types`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cashinflows`
--
ALTER TABLE `cashinflows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cashoutflows`
--
ALTER TABLE `cashoutflows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cash_inflow`
--
ALTER TABLE `cash_inflow`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cash_outflow`
--
ALTER TABLE `cash_outflow`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `countrs`
--
ALTER TABLE `countrs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `joiningmoneyreceipts`
--
ALTER TABLE `joiningmoneyreceipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `loanapplicationmoneyreceipts`
--
ALTER TABLE `loanapplicationmoneyreceipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `loanapplications`
--
ALTER TABLE `loanapplications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `savings`
--
ALTER TABLE `savings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `shares`
--
ALTER TABLE `shares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=527;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
