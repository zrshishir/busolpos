-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2014 at 06:30 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bd_geocode`
--

-- --------------------------------------------------------

--
-- Table structure for table `purchages`
--

CREATE TABLE `purchages` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(2) unsigned NOT NULL,
  `branch_product_id` int(2) unsigned NOT NULL,
  `quantity` varchar(500) NOT NULL,
  `unit` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL,
  `cost` varchar(500) NOT NULL,
  `sell_price` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  FOREIGN KEY (`branch_product_id`) REFERENCES `branchproducts` (`id`)
  ON DELETE CASCADE 
  ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `purchages`
--


