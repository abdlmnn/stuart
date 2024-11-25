-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2024 at 05:58 PM
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
-- Database: `stuart`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `categoryGender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`, `categoryGender`) VALUES
(12, 'Top', 'Women');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventoryID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `itemImage` varchar(150) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `itemSize` varchar(100) NOT NULL,
  `itemStock` int(100) NOT NULL,
  `itemPrice` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userFullname` varchar(150) NOT NULL,
  `userNumber` varchar(100) NOT NULL,
  `userAddress` varchar(100) NOT NULL,
  `userGender` varchar(20) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `userType` tinyint(2) DEFAULT 0 COMMENT '0=customer, 1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userFullname`, `userNumber`, `userAddress`, `userGender`, `userEmail`, `userPassword`, `userType`) VALUES
(1, 'Mohammad Abdulmanan', '09213179', 'Here lng', 'Male', 'manan@gmail.com', 'salih', 1),
(3, 'Salih', '1321380', 'asdasda', 'Female', 'ryan@gmail.com', '12345', 0),
(4, 'Abdul', '1231297362198', 'secret', 'Male', 'ummair@gmail.com', 'salih123', 0),
(5, 'Salih', '242424', 'asda', 'Male', 'ansari@gmail.com', '12345', 0),
(6, 'Salih', 'asdasdasdas', '123123213', 'Female', 'mai@gmail.com', 'salih123', 0),
(7, 'Salih', 'asdasdasdas', '123123213', 'Female', 'ali@gmail.com', 'salih123', 0),
(8, 'Salih', '123123', '1231casdasd', 'Female', 'ali123@gmail.com', 'salih123', 0),
(9, 'Salih Abdulmanan', '098921731 ', 'Dito lng banda', 'Male', 'abdulmanan@gmail.com', 'salih', 1),
(10, 'Ryan', '0922 909 2323', 'Tibanga', 'Male', 'ryan123@gmail.com', 'ryan123', 0),
(11, 'salih salih', '2131023821', 'tibanga', 'Select Gender', 'salih@gmail.com', '123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventoryID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `categoryID` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
