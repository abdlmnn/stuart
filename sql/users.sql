-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2024 at 04:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stuartdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userFullname` varchar(255) DEFAULT NULL,
  `userNumber` varchar(20) DEFAULT NULL,
  `userAddress` varchar(255) DEFAULT NULL,
  `userGender` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userCode` int(255) DEFAULT NULL,
  `userType` tinyint(1) DEFAULT 0 COMMENT '0=customer, 1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userFullname`, `userNumber`, `userAddress`, `userGender`, `userEmail`, `userPassword`, `userCode`, `userType`) VALUES
(1, 'Abdulmanan', '123123', 'Here', 'Male', 'manan@gmail.com', 'Salih123', NULL, 1),
(15, 'Mohammad Salih', '961 093 9761', 'Saray Dito lng', 'Female', 'mohammaddomangcag.abdulmanan@my.smciligan.edu.ph', 'Salih123', NULL, 0),
(16, 'Salih Abdulmanan', '0952 949 9494', 'dasda', 'Male', 'mohammadsalih156@gmail.com', 'Salih123', 793628, 0),
(18, 'Salih', '232', 'here', 'Male', 'mohammadabdulmanan24@gmail.com', 'Salih123', NULL, 0),
(23, NULL, NULL, NULL, NULL, 'legendsalih24@gmail.com', 'Salih123', NULL, 0),
(28, 'Parida Tulngaw', '123123', 'Here', 'Male', 'riri@gmail.com', 'Salih123', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
