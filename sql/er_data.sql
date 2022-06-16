-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 16, 2022 at 11:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `muvi`
--

-- --------------------------------------------------------

--
-- Table structure for table `er_data`
--

CREATE TABLE `er_data` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `descriptions` text NOT NULL,
  `category` varchar(10) NOT NULL,
  `priority` varchar(10) NOT NULL,
  `effort` varchar(10) NOT NULL,
  `pod` varchar(10) NOT NULL,
  `assignTo` int(11) NOT NULL,
  `file` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `er_data`
--

INSERT INTO `er_data` (`id`, `title`, `descriptions`, `category`, `priority`, `effort`, `pod`, `assignTo`, `file`) VALUES
(1, 'Fix Api', 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', 2, 'sdf'),
(2, 'test', 'test', 'bug', 'high', 'high', 'backend', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `er_data`
--
ALTER TABLE `er_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignTo` (`assignTo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `er_data`
--
ALTER TABLE `er_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `er_data`
--
ALTER TABLE `er_data`
  ADD CONSTRAINT `er_data_ibfk_1` FOREIGN KEY (`assignTo`) REFERENCES `employee` (`eID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
