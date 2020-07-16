-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 01:27 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruimte_reserveren`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `isAdmin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `isAdmin`) VALUES
(1, 'test', '3fde6bb0541387e4ebdadf7c2ff31123', 1),
(8, 'test2', '3fde6bb0541387e4ebdadf7c2ff31123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lokalen`
--

CREATE TABLE `lokalen` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokalen`
--

INSERT INTO `lokalen` (`id`, `name`) VALUES
(4, 'w004');

-- --------------------------------------------------------

--
-- Table structure for table `reservaties`
--

CREATE TABLE `reservaties` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `name` varchar(99) NOT NULL,
  `lokaal` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservaties`
--

INSERT INTO `reservaties` (`id`, `date`, `time_start`, `time_end`, `name`, `lokaal`) VALUES
(625, '2020-06-26', '09:40:00', '10:40:00', 'test', 'w004'),
(626, '2020-06-26', '13:41:00', '14:41:00', 'test', 'w004'),
(627, '2020-06-26', '15:43:00', '16:43:00', 'test', 'w004');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokalen`
--
ALTER TABLE `lokalen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservaties`
--
ALTER TABLE `reservaties`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lokalen`
--
ALTER TABLE `lokalen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reservaties`
--
ALTER TABLE `reservaties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=628;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
