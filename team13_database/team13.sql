-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2017 at 01:11 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team13`
--

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donation_id` int(50) NOT NULL,
  `d_id` int(250) NOT NULL,
  `date` varchar(15) NOT NULL,
  `amount` int(30) NOT NULL,
  `time` varchar(20) NOT NULL,
  `donation_type` int(5) NOT NULL,
  `w_id` int(50) NOT NULL,
  `notify` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donor_registeration`
--

CREATE TABLE `donor_registeration` (
  `d_id` int(50) NOT NULL,
  `donor_name` varchar(50) NOT NULL,
  `contact` int(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kid`
--

CREATE TABLE `kid` (
  `k_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(4) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wish`
--

CREATE TABLE `wish` (
  `w_id` int(50) NOT NULL,
  `city_id` int(100) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `cost` int(50) NOT NULL,
  `wish_name` varchar(50) NOT NULL,
  `k_id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `donor_registeration`
--
ALTER TABLE `donor_registeration`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `kid`
--
ALTER TABLE `kid`
  ADD PRIMARY KEY (`k_id`);

--
-- Indexes for table `wish`
--
ALTER TABLE `wish`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donation_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `donor_registeration`
--
ALTER TABLE `donor_registeration`
  MODIFY `d_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kid`
--
ALTER TABLE `kid`
  MODIFY `k_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wish`
--
ALTER TABLE `wish`
  MODIFY `w_id` int(50) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
