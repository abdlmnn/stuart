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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `orderAmount` int(11) NOT NULL,
  `paymentMethod` enum('COD','GCash') DEFAULT NULL,
  `orderStatus` enum('pending','approved','cancelled') NOT NULL DEFAULT 'pending',
  `paymentStatus` enum('unpaid','paid') NOT NULL DEFAULT 'unpaid',
  `orderDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `userID`, `orderAmount`, `paymentMethod`, `orderStatus`, `paymentStatus`, `orderDate`) VALUES
(78, 28, 15000, 'GCash', 'pending', 'paid', '2024-12-29 05:48:18'),
(79, 28, 4378, 'COD', 'pending', 'unpaid', '2024-12-29 05:51:13'),
(80, 28, 30000, 'GCash', 'pending', 'unpaid', '2024-12-29 05:59:26'),
(81, 28, 30000, 'COD', 'pending', 'unpaid', '2024-12-29 06:02:14'),
(82, 28, 5200, 'GCash', 'pending', 'paid', '2024-12-29 06:43:01'),
(83, 28, 30000, 'GCash', 'pending', 'paid', '2024-12-29 06:59:58'),
(84, 28, 52550, 'COD', 'pending', 'unpaid', '2024-12-29 09:19:51'),
(96, 16, 10000, 'COD', 'approved', 'paid', '2024-12-29 20:10:39'),
(97, 16, 12500, 'COD', 'approved', 'paid', '2024-12-29 21:04:25'),
(98, 16, 5200, 'GCash', 'approved', 'paid', '2024-12-29 21:13:57'),
(99, 16, 750, 'COD', 'approved', 'paid', '2024-12-29 21:15:23'),
(100, 16, 12000, 'COD', 'approved', 'paid', '2024-12-29 22:44:52'),
(102, 16, 16000, 'COD', 'approved', 'paid', '2024-12-29 23:02:22'),
(103, 16, 30000, 'GCash', 'pending', 'unpaid', '2024-12-29 23:52:45'),
(105, 16, 30000, 'GCash', 'pending', 'unpaid', '2024-12-30 00:23:52'),
(106, 16, 12500, 'GCash', 'pending', 'unpaid', '2024-12-30 00:40:20'),
(107, 16, 25000, 'GCash', 'pending', 'unpaid', '2024-12-30 00:43:01'),
(108, 16, 25000, 'GCash', 'pending', 'unpaid', '2024-12-30 00:47:07'),
(109, 16, 25000, 'GCash', 'pending', 'unpaid', '2024-12-30 00:54:23'),
(112, 16, 72500, 'GCash', 'pending', 'unpaid', '2024-12-30 01:29:42'),
(113, 16, 72500, 'COD', 'pending', 'unpaid', '2024-12-30 01:31:46'),
(114, 16, 72500, 'COD', 'pending', 'unpaid', '2024-12-30 01:33:09'),
(115, 16, 72500, 'COD', 'pending', 'unpaid', '2024-12-30 01:33:14'),
(116, 16, 72500, 'COD', 'pending', 'unpaid', '2024-12-30 02:19:12'),
(117, 16, 8000, 'COD', 'pending', 'unpaid', '2024-12-30 02:22:45'),
(118, 16, 1600, 'COD', 'pending', 'unpaid', '2024-12-30 02:25:17'),
(119, 16, 15000, 'COD', 'pending', 'unpaid', '2024-12-30 02:29:15'),
(121, 16, 1000, 'COD', 'pending', 'unpaid', '2024-12-30 03:43:04'),
(122, 16, 24000, 'COD', 'pending', 'unpaid', '2024-12-30 03:49:07'),
(123, 16, 1398, 'COD', 'pending', 'unpaid', '2024-12-30 03:53:53'),
(125, 16, 25000, 'GCash', 'approved', 'paid', '2024-12-30 04:38:58'),
(126, 16, 998, 'GCash', 'approved', 'paid', '2024-12-30 04:42:59'),
(127, 16, 14500, 'COD', 'pending', 'unpaid', '2024-12-30 04:54:18'),
(128, 16, 14500, 'COD', 'approved', 'paid', '2024-12-30 04:55:23'),
(129, 15, 99000, 'COD', 'pending', 'unpaid', '2024-12-30 05:05:09'),
(130, 15, 119189, 'GCash', 'cancelled', 'unpaid', '2024-12-30 05:14:51'),
(131, 16, 15599, 'COD', 'approved', 'paid', '2024-12-30 13:51:18'),
(132, 16, 8000, 'COD', 'approved', 'paid', '2024-12-30 13:58:02'),
(134, 16, 8000, 'COD', 'approved', 'paid', '2024-12-30 14:07:38'),
(135, 16, 12000, 'GCash', 'approved', 'paid', '2024-12-30 14:17:49'),
(136, 16, 20000, 'COD', 'approved', 'paid', '2024-12-30 14:20:34'),
(137, 16, 51849, 'COD', 'approved', 'paid', '2024-12-30 14:35:24'),
(138, 16, 2398, 'GCash', 'approved', 'paid', '2024-12-30 17:19:38'),
(139, 16, 8000, 'GCash', 'approved', 'paid', '2024-12-30 17:24:23'),
(140, 16, 35500, 'GCash', 'approved', 'paid', '2024-12-30 17:36:25'),
(141, 16, 5897, 'GCash', 'approved', 'paid', '2024-12-30 17:41:42'),
(142, 16, 16000, 'GCash', 'approved', 'paid', '2024-12-30 17:43:41'),
(143, 16, 44397, 'COD', 'cancelled', 'unpaid', '2024-12-30 20:55:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
