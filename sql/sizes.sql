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
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `sizeID` int(11) NOT NULL,
  `inventoryID` int(11) NOT NULL,
  `sizeName` varchar(255) NOT NULL,
  `sizeStock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`sizeID`, `inventoryID`, `sizeName`, `sizeStock`) VALUES
(36, 25, 'XS', 25),
(37, 25, 'S', 25),
(38, 25, 'M', 25),
(40, 27, 'S', 25),
(41, 27, 'M', 25),
(42, 28, 'M', 25),
(43, 28, 'L', 25),
(44, 29, 'S', 25),
(45, 29, 'M', 25),
(46, 30, 'S', 25),
(47, 24, 'S', 25),
(50, 37, 'S', 25),
(52, 39, 'S', 25),
(53, 40, 'S', 25),
(54, 41, 'S', 25),
(55, 31, 'NS', 22),
(56, 32, 'NS', 25),
(57, 33, 'NS', 25),
(59, 44, 'S', 25),
(60, 42, 'S', 25),
(61, 43, 'S', 25),
(62, 46, 'S', 25),
(63, 45, 'S', 25),
(64, 60, 'S', 25),
(65, 63, 'S', 25),
(66, 64, 'S', 25),
(67, 47, 'S', 25),
(68, 57, 'S', 25),
(69, 72, '38', 25),
(70, 65, '40', 25),
(71, 58, 'S', 25),
(72, 59, 'S', 25),
(73, 71, 'S', 25),
(74, 67, '40', 25),
(75, 70, 'S', 25),
(77, 48, 'S', 25),
(78, 69, '40', 25),
(79, 49, 'S', 25),
(80, 73, '37', 25),
(81, 74, '37', 25),
(82, 75, '37', 25),
(83, 76, '37', 25),
(84, 77, '37', 25),
(85, 78, '37', 25),
(86, 79, '37', 25),
(88, 81, '37', 25),
(89, 83, '37', 25),
(90, 84, '37', 25),
(91, 82, '37', 25),
(94, 87, 'NS', 25),
(101, 93, '40', 25),
(103, 96, '40', 25),
(104, 97, '40', 25),
(106, 26, 'S', 25),
(108, 100, 'NS', 25),
(109, 101, '40', 25),
(110, 102, '40', 25),
(111, 108, '40', 25),
(112, 106, 'S', 25),
(113, 107, '40', 25),
(114, 104, '40', 25),
(115, 103, '40', 25),
(119, 112, 'NS', 25),
(120, 105, '40', 25),
(121, 99, 'S', 25),
(122, 114, '40', 25),
(123, 115, '40', 25),
(124, 113, '40', 25),
(127, 120, '40', 25),
(131, 123, 'M', 25),
(132, 116, 'M', 25),
(133, 110, 'NS', 25),
(134, 124, 'M', 25),
(135, 125, 'NS', 25),
(136, 126, 'S', 25),
(137, 127, 'M', 25),
(138, 128, 'M', 25),
(139, 129, 'M', 25),
(140, 130, 'S', 25),
(142, 132, 'S', 25),
(143, 131, 'M', 25),
(144, 134, '40', 25),
(145, 135, 'M', 25),
(146, 137, '40', 25),
(147, 138, '40', 25),
(149, 140, '40', 25),
(150, 136, 'NS', 25),
(151, 141, '40', 25),
(152, 102, '41', 25),
(154, 49, 'M', 25),
(155, 49, 'L', 25),
(156, 114, '41', 25),
(157, 114, '42', 25),
(158, 114, '43', 25),
(159, 102, '42', 25),
(160, 102, '43', 25),
(161, 108, '41', 25),
(162, 108, '42', 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`sizeID`),
  ADD KEY `inventoryID` (`inventoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `sizeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `inventoryID` FOREIGN KEY (`inventoryID`) REFERENCES `inventory` (`inventoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
