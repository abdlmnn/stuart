-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2024 at 04:07 PM
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
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `paymentAmount` int(255) NOT NULL,
  `paymentProof` varchar(255) DEFAULT NULL,
  `paymentDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `orderID`, `paymentAmount`, `paymentProof`, `paymentDate`) VALUES
(23, 78, 15000, 'gcash.png', '2024-12-29 05:48:26'),
(24, 82, 5200, 'PngItem_2450211.png', '2024-12-29 06:43:07'),
(25, 83, 30000, 'Array', '2024-12-29 07:00:04'),
(26, 85, 12000, 'proof.jpg', '2024-12-29 18:28:47'),
(27, 85, 12000, 'proof.jpg', '2024-12-29 18:29:05'),
(28, 85, 12000, 'proof.jpg', '2024-12-29 18:30:32'),
(29, 86, 20897, 'proof.jpg', '2024-12-29 18:54:26'),
(30, 87, 10000, 'proof.jpg', '2024-12-29 18:59:57'),
(31, 88, 12000, 'proof.jpg', '2024-12-29 19:04:18'),
(32, 89, 5198, 'proof.jpg', '2024-12-29 19:06:59'),
(33, 90, 25000, 'proof.jpg', '2024-12-29 19:15:02'),
(34, 91, 16000, 'proof.jpg', '2024-12-29 19:23:29'),
(35, 92, 24000, 'proof.jpg', '2024-12-29 19:28:22'),
(36, 93, 24000, 'proof.jpg', '2024-12-29 19:30:21'),
(37, 93, 24000, 'proof.jpg', '2024-12-29 19:31:07'),
(38, 94, 22500, 'proof.jpg', '2024-12-29 20:01:33'),
(39, 97, 12500, NULL, '2024-12-29 21:04:25'),
(40, 98, 5200, 'proof.jpg', '2024-12-29 21:14:01'),
(41, 99, 750, NULL, '2024-12-29 21:15:23'),
(42, 100, 12000, NULL, '2024-12-29 22:44:52'),
(43, 101, 15888, 'proof.jpg', '2024-12-29 22:57:42'),
(44, 102, 16000, NULL, '2024-12-29 23:02:22'),
(45, 116, 72500, NULL, '2024-12-30 02:19:12'),
(46, 117, 8000, NULL, '2024-12-30 02:22:45'),
(47, 118, 1600, NULL, '2024-12-30 02:25:17'),
(48, 119, 15000, NULL, '2024-12-30 02:29:15'),
(49, 120, 800, NULL, '2024-12-30 02:55:37'),
(50, 121, 1000, NULL, '2024-12-30 03:43:04'),
(51, 122, 24000, NULL, '2024-12-30 03:49:07'),
(52, 123, 1398, NULL, '2024-12-30 03:53:53'),
(53, 124, 999, 'proof.jpg', '2024-12-30 04:10:44'),
(54, 125, 25000, 'proof.jpg', '2024-12-30 04:39:18'),
(55, 126, 998, 'proof.jpg', '2024-12-30 04:43:17'),
(56, 127, 14500, NULL, '2024-12-30 04:54:18'),
(57, 128, 14500, NULL, '2024-12-30 04:55:23'),
(58, 129, 99000, NULL, '2024-12-30 05:05:09'),
(59, 129, 99000, NULL, '2024-12-30 05:05:09'),
(60, 129, 99000, NULL, '2024-12-30 05:05:09'),
(61, 129, 99000, NULL, '2024-12-30 05:05:09'),
(62, 129, 99000, NULL, '2024-12-30 05:05:09'),
(63, 131, 15599, NULL, '2024-12-30 13:51:29'),
(64, 132, 8000, NULL, '2024-12-30 13:58:04'),
(65, 133, 689, NULL, '2024-12-30 14:04:15'),
(66, 134, 8000, NULL, '2024-12-30 14:07:46'),
(67, 135, 12000, 'proof.jpg', '2024-12-30 14:18:00'),
(68, 136, 20000, NULL, '2024-12-30 14:20:45'),
(69, 137, 51849, NULL, '2024-12-30 14:35:36'),
(70, 138, 2398, 'proof.jpg', '2024-12-30 17:19:50'),
(71, 139, 8000, 'proof.jpg', '2024-12-30 17:24:46'),
(72, 140, 35500, 'proof.jpg', '2024-12-30 17:36:35'),
(73, 141, 5897, 'proof.jpg', '2024-12-30 17:41:50'),
(74, 142, 16000, 'proof.jpg', '2024-12-30 17:43:49'),
(75, 143, 44397, NULL, '2024-12-30 20:55:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
