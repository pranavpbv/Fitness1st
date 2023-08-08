-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2022 at 07:40 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `Fitness_ID` int(40) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Age` int(10) NOT NULL,
  `Height` int(30) NOT NULL,
  `Weight` int(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Speed` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`Fitness_ID`, `Name`, `Age`, `Height`, `Weight`, `Gender`, `Speed`) VALUES
(1001, 'Padmini', 25, 165, 55, 'Female', 3),
(1002, 'Mani Srinivas', 30, 170, 75, 'Male', 5),
(1003, 'Indrajit', 40, 172, 80, 'Male', 3.5),
(1004, 'Jyothi', 34, 167, 60, 'Female', 4),
(1005, 'Vikram', 35, 169, 73, 'Male', 5),
(1006, 'Lalita', 32, 166, 54, 'Female', 4.5),
(1007, 'Shikha', 18, 163, 50, 'Female', 5),
(1008, 'Manushi', 28, 170, 58, 'Female', 3.2),
(1009, 'Pratik', 31, 173, 70, 'Male', 4.5),
(1010, 'Harinder', 42, 174, 82, 'Male', 3.6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`Fitness_ID`),
  ADD UNIQUE KEY `Fitness_ID` (`Fitness_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
