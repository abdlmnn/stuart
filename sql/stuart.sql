-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2024 at 04:23 PM
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
(23, 'Top', 'Men'),
(24, 'Shoes', 'Men'),
(25, 'Pants', 'Men'),
(26, 'Shorts', 'Men'),
(27, 'Top', 'Women'),
(28, 'Shoes', 'Women'),
(29, 'Skirt', 'Women'),
(30, 'Hoodie', 'Unisex'),
(31, 'Pants', 'Unisex');

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
  `itemPrice` int(100) NOT NULL,
  `itemStatus` enum('0','1') DEFAULT '0' COMMENT '''0''=avail, ''1''=unavail'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventoryID`, `categoryID`, `itemImage`, `itemName`, `itemSize`, `itemStock`, `itemPrice`, `itemStatus`) VALUES
(23, 23, 'shirt2.png', 'Black Shirt', 'M', 5, 100, '0'),
(24, 23, 'shirt3.png', 'Long sleeve', 'M', 5, 250, '0'),
(25, 24, 'shoes2.png', 'Jordan 1', '43', 5, 2999, '0'),
(26, 28, 'heel1.png', 'Red Heels', '38', 5, 99, '0'),
(27, 24, 'shoes3.png', 'Converse', '41', 5, 1999, '0'),
(28, 23, 'shirt1.png', 'Red Shirt', 'S', 5, 100, '0'),
(32, 23, 'shoes1.png', 'Running shoes', '38', 5, 2500, '0');

-- --------------------------------------------------------

--
-- Table structure for table `orderline`
--

CREATE TABLE `orderline` (
  `orderlineID` int(11) NOT NULL,
  `inventoryID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `orderlineQuantity` int(255) NOT NULL,
  `orderlineSubTotal` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `orderTotalPrice` int(255) NOT NULL,
  `orderStatus` int(11) NOT NULL,
  `orderDataCreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payID` int(11) NOT NULL,
  `orderID` int(11) DEFAULT NULL,
  `payMethod` int(255) NOT NULL,
  `payProof` varchar(255) NOT NULL,
  `payAmount` int(200) NOT NULL,
  `payDateCreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `sizeID` int(11) NOT NULL,
  `sizeName` varchar(150) NOT NULL,
  `categoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`sizeID`, `sizeName`, `categoryID`) VALUES
(1, 'XS\r\n', NULL),
(2, 'S', NULL),
(3, 'M', NULL),
(4, 'L', NULL),
(5, 'XL', NULL),
(6, 'XXL', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userFullname` varchar(150) DEFAULT NULL,
  `userNumber` varchar(100) DEFAULT NULL,
  `userAddress` varchar(100) DEFAULT NULL,
  `userGender` varchar(20) DEFAULT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  `userCode` int(255) DEFAULT NULL,
  `userType` tinyint(2) DEFAULT 0 COMMENT '0=customer, 1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userFullname`, `userNumber`, `userAddress`, `userGender`, `userEmail`, `userPassword`, `userCode`, `userType`) VALUES
(17, 'Salih', '2131023821', 'tibanga', 'Male', 'salih@gmail.com', 'Salih123', 249969, 1),
(22, 'Abdulmanan', '137198', 'Tibanga', 'Male', 'mohammadabdulmanan24@gmail.com', 'Salih123', NULL, 0),
(26, 'Mohammad Abdulmanan', '09610939761', 'Saray', 'Male', 'mohammaddomangcag.abdulmanan@my.smciligan.edu.ph', 'Salih123', 557086, 0),
(27, 'Salih', '242424', 'Basta dito lng', 'Male', 'mohammadsalih156@gmail.com', 'Salih123', 437048, 1),
(28, NULL, NULL, NULL, NULL, 'abdul@gmail.com', 'Salih123', NULL, 0),
(29, 'Lili', '09271302173', 'here', 'Female', 'lili@gmail.com', 'Lili12345', NULL, 0),
(30, 'Manan', '0952 949 9494', 'asdasda', 'Male', 'manan@gmail.com', 'Salih123', NULL, 0),
(31, NULL, NULL, NULL, NULL, 'riri@gmail.com', 'Riri12345', NULL, 0),
(32, NULL, NULL, NULL, NULL, '21312@gmail.com', 'Salih123', NULL, 0);

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
-- Indexes for table `orderline`
--
ALTER TABLE `orderline`
  ADD PRIMARY KEY (`orderlineID`),
  ADD KEY `inventoryID` (`inventoryID`),
  ADD KEY `orderID` (`orderID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payID`),
  ADD UNIQUE KEY `orderID` (`orderID`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`sizeID`),
  ADD UNIQUE KEY `categoryID` (`categoryID`);

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
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orderline`
--
ALTER TABLE `orderline`
  MODIFY `orderlineID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `sizeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `categoryID` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`);

--
-- Constraints for table `orderline`
--
ALTER TABLE `orderline`
  ADD CONSTRAINT `inventoryID` FOREIGN KEY (`inventoryID`) REFERENCES `inventory` (`inventoryID`),
  ADD CONSTRAINT `orderID` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
