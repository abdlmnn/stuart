-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2024 at 11:34 PM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'Clothing'),
(2, 'Footwear'),
(3, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventoryID` int(11) NOT NULL,
  `subcategoryID` int(11) NOT NULL,
  `itemImage` varchar(255) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `itemPrice` int(255) NOT NULL,
  `itemTotalStock` int(255) DEFAULT NULL,
  `itemStatus` enum('Available','Unavailable') NOT NULL DEFAULT 'Unavailable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventoryID`, `subcategoryID`, `itemImage`, `itemName`, `itemPrice`, `itemTotalStock`, `itemStatus`) VALUES
(24, 2, 'Back-Of-Black-Hoodie-PNG-Free-Download.png', 'Back of Black Hoodie', 2599, 20, 'Available'),
(25, 1, 'Always-T-Shirt-PNG-Pic.png', 'Always T-Shirt', 299, 57, 'Available'),
(26, 1, 'Turtle-Neck-Shirt-PNG-Photo.png', 'Turtle Neck Brown', 159, 15, 'Available'),
(27, 1, 'Animal-Print-Shirt-PNG-Image.png', 'Tiger Sweater', 189, 50, 'Available'),
(28, 1, 'Embellished-Sweater-PNG-Clipart.png', 'Embellished Sweater', 399, 50, 'Available'),
(29, 1, 'Graphic-T-Shirt-PNG-File.png', 'Graphic T-Shirt', 499, 50, 'Available'),
(30, 1, 'Half-T-shirt-Singlet-PNG-File.png', 'Half T-Shirt', 90, 25, 'Available'),
(31, 10, 'Backpack-Bag.png', 'Red Backpack', 499, 24, 'Available'),
(32, 10, 'Black-Duffel-Bag.png', 'Duffel Bag Black', 699, 25, 'Available'),
(33, 10, 'Lv-Bag.png', 'Louis Vuitton ', 3599, 23, 'Available'),
(37, 2, 'Polo-Collar-T-Shirt-PNG.png', 'Polo Black T-Shirt', 450, 25, 'Available'),
(39, 2, 'Polo-T-Shirt-PNG-Image.png', 'Ocean Breeze Polo', 189, 25, 'Available'),
(40, 2, 'Plain-White-T-Shirt-PNG.png', 'Classic White Tee', 200, 10, 'Available'),
(41, 2, 'shirt3.png', 'Navy ADHD Long Sleeve Shirt', 399, 25, 'Available'),
(42, 2, 'Polo.png', 'Rustic Red', 269, 25, 'Available'),
(43, 2, 'Polo-Shirt-PNG-Photos.png', 'The Green Loop', 350, 25, 'Available'),
(44, 2, 'Shirt-PNG-Image-Free-Download.png', 'Black Tie Affair', 689, 17, 'Available'),
(45, 1, 'Women-Back-Of-Black-Hoodie-PNG-Picture.png', 'Tuesday Crop', 700, 25, 'Available'),
(46, 1, 'T-Shirt-Transparent-Isolated-PNG.png', 'Boomer Pink', 480, 25, 'Available'),
(47, 2, 'T-Shirt-PNG-Transparent.png', 'ServisHero Yellow', 300, 10, 'Available'),
(48, 1, 'T-Shirt-PNG-Picture.png', 'Amethyst Aura', 250, 21, 'Available'),
(49, 2, 'T-Shirt-PNG-Pic.png', 'Adidas Trefoil Back', 800, 24, 'Available'),
(57, 2, 'T-Shirt-PNG-Isolated-Photo.png', 'Scott Vintage Turquoise', 500, 10, 'Available'),
(58, 2, 'T-Shirt-PNG-Free-Download.png', 'Mandarin Collar Polo', 400, 10, 'Available'),
(59, 1, 'T-Shirt-Download-PNG-Isolated-Image.png', 'Hey Girl Long Sleeve', 600, 10, 'Available'),
(60, 2, 'Thrasher-T-Shirt-PNG-Transparent-Image.png', 'Thrasher Flame', 500, 25, 'Available'),
(63, 2, 'Thrasher-T-Shirt-PNG-Photos.png', 'Thrasher Flame Hoodie', 1000, 25, 'Available'),
(64, 1, 'Thrasher-T-Shirt-PNG-Image.png', 'Thrasher Flame Pink', 500, 10, 'Available'),
(65, 5, 'shoes2.png', 'Nike Air Force 1 Mid ', 4500, 10, 'Available'),
(67, 5, 'shoes3.png', 'Classic Red Chucks', 1500, 25, 'Available'),
(69, 5, 'shoes1.png', 'Allbirds Wool Runners', 4000, 15, 'Available'),
(70, 2, 'shirt2.png', 'Classic Black Crewneck', 250, 23, 'Available'),
(71, 2, 'shirt1.png', 'Classic Red Tee', 200, 25, 'Available'),
(72, 4, 'heel1.png', 'Red Hot Stilettos', 5000, 5, 'Available'),
(73, 4, 'pure.png', 'Black Satin Bow Heels', 8000, 25, 'Available'),
(74, 4, 'purepng.com-blue-women-shoewomen-shoesfootdesignfoot-wearwomenladiescasualblue-1421526427896lp3gs.png', 'Royal Blue Satin Sandals', 3000, 10, 'Available'),
(75, 4, 'purepng.com-black-women-shoewomen-shoesfootdesignfoot-wearwomenladiescasualleatherblack-1421526427979f7tbf.png', 'Burgundy Patent Leather', 2000, 25, 'Available'),
(76, 4, 'purepng.com-women-shoewomen-shoesfootdesignfoot-wearwomenladiescasualleather-1421526428001ven3p.png', 'Gucci Denim Platform Wedges', 25000, 10, 'Available'),
(77, 4, 'purepng.com-women-shoewomen-shoesfootdesignfoot-wearwomenladiescasualleather-1421526427925ybhgq.png', 'Saddle Leather Pumps', 2500, 10, 'Available'),
(78, 4, 'purepng.com-white-women-shoewomen-shoesfootdesignfoot-wearwomenladieswhite-1421526427811rk3z0.png', 'Peace of Shoe', 25000, 10, 'Available'),
(79, 4, 'purepng.com-black-women-shoewomen-shoesfootdesignfoot-wearwomenladiescasualleatherblack-14215264280391tuvx.png', 'Classic Black Pumps', 3000, 20, 'Available'),
(81, 4, 'purepng.com-black-women-shoewomen-shoesfootdesignfoot-wearblackboot-1421526427559jwngk.png', 'Leather Buckle Booties', 3500, 8, 'Available'),
(82, 4, 'purepng.com-kheila-white-women-shoewomen-shoesfootdesignfoot-wearwhitekheila-1421526427594wde1z.png', 'White Patent Leather', 3000, 10, 'Available'),
(83, 4, 'purepng.com-pink-women-bootwomen-shoesfootdesignfoot-wearboot-14215264275018xljc.png', 'Pink Buttoned Ankle Boots', 25000, 10, 'Available'),
(84, 4, 'purepng.com-women-shoeswomen-shoesfootdesignfoot-wear-14215264271567wdeb.png', 'Burgundy Wool', 15000, 25, 'Available'),
(87, 9, 'beautiful-earrings-and-ring-qqm.png', 'Oval Garnet', 5500, 10, 'Available'),
(93, 5, 'purepng.com-running-shoesrunning-shoesrunningshoessportingphysical-activitiesstyle-1701528181538k7ske.png', 'Nike Lunar Control Vapor 2', 6000, 10, 'Available'),
(96, 5, 'shoes-png-nike-shoes-png-image-1280.png', 'Nike Zoom Kobe IV', 5000, 6, 'Available'),
(97, 5, 'shoes-png-shoes-png-file-png-image-1180.png', 'Yuketen', 8000, 10, 'Available'),
(99, 1, 'T-Shirt-PNG-Isolated-Transparent.png', 'Brainchild', 300, 20, 'Available'),
(100, 9, 'bc.png', 'Medical Bracelet', 799, 5, 'Available'),
(101, 5, 'PngItem_6152731.png', 'Aqua Blaze Sneakers', 3200, 10, 'Available'),
(102, 5, 'PngItem_2635105.png', 'Air Jordan 1 Fearless', 4500, 57, 'Available'),
(103, 5, 'PngItem_1588118.png', 'Air Jordan 4 White Cement', 5200, 20, 'Available'),
(104, 5, 'PngItem_2459204.png', 'Air Jordan 4 Retro Toro', 10000, 24, 'Available'),
(105, 5, 'j2.png', 'Jordan 4 Black Cat 2020', 11250, 25, 'Available'),
(106, 5, 'PngItem_3302198.png', 'Air Jordan 1 Retro High OG', 12000, 15, 'Available'),
(107, 5, 'PngItem_5982319.png', 'Air Jordan 4 Alternate 89', 15000, 23, 'Available'),
(108, 5, 'PngItem_4069178.png', 'Air Jordan 1 Lost & Found', 25000, 26, 'Available'),
(110, 9, 'PngItem_3133166.png', 'Marcozo', 999, 25, 'Available'),
(112, 17, 'PngItem_659649.png', 'King Cap', 150, 24, 'Available'),
(113, 5, 'PngItem_349221.png', 'Air Jordan 1 Swoosh', 14500, 19, 'Available'),
(114, 5, 'PngItem_349563.png', 'Air Force 1 Low Snakeskin', 8000, 28, 'Available'),
(115, 5, 'PngItem_482943.png', 'Air Jordan 1 Retro High', 15599, 10, 'Available'),
(116, 16, 'PngItem_910787.png', 'Max Ankle Socks White', 500, 25, 'Available'),
(120, 5, 'PngItem_911324.png', 'Air Jordan XXX1', 12000, 25, 'Available'),
(123, 2, 'PngItem_1486295.png', 'Dri-FIT Long Sleeve', 1500, 22, 'Available'),
(124, 2, 'PngItem_1694395.png', 'Jordan 23 Engineered', 1500, 24, 'Available'),
(125, 2, 'PngItem_1800815.png', 'Chicago Bulls Shorts', 1500, 25, 'Available'),
(126, 2, 'PngItem_1800967.png', 'Nike Swingman Shorts', 1500, 25, 'Available'),
(127, 2, 'PngItem_1801328.png', 'Bulls Essential Hoodie', 2000, 23, 'Available'),
(128, 2, 'PngItem_2012892.png', 'Cavaliers Hoodie', 2000, 25, 'Available'),
(129, 2, 'PngItem_2205633.png', 'Jordan Vertical T-Shirt', 2000, 25, 'Available'),
(130, 2, 'PngItem_2450211.png', 'LeBron T-Shirt', 300, 25, 'Available'),
(131, 2, 'PngItem_2636456.png', 'All-Star Team Jacket', 5000, 25, 'Available'),
(132, 2, 'PngItem_2636700.png', 'Nike Long-sleeve', 1200, 25, 'Available'),
(134, 5, 'PngItem_3451688.png', 'Nike Air Force 1 Low Pro Green', 5000, 25, 'Available'),
(135, 16, 'PngItem_3484154.png', 'Max Ankle Socks Black', 500, 25, 'Available'),
(136, 17, 'PngItem_3727304.png', 'Heritage86', 699, 10, 'Available'),
(137, 5, 'PngItem_5547628.png', 'Air Jordan 1 Retro High Bred', 12500, 21, 'Available'),
(138, 5, 'PngItem_5547787.png', 'Air Jordan Spizike', 8000, 24, 'Available'),
(140, 5, 'PngItem_6054053.png', 'Jordan Diamond Low', 5000, 25, 'Available'),
(141, 5, 'PngItem_6585595.png', 'Jordan Max Aura', 5000, 25, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `orderline`
--

CREATE TABLE `orderline` (
  `orderlineID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `inventoryID` int(11) NOT NULL,
  `sizeID` int(11) NOT NULL,
  `orderlineQuantity` int(255) NOT NULL,
  `orderlineTotal` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderline`
--

INSERT INTO `orderline` (`orderlineID`, `orderID`, `inventoryID`, `sizeID`, `orderlineQuantity`, `orderlineTotal`) VALUES
(72, 78, 79, 86, 5, 15000),
(73, 79, 44, 59, 2, 4378),
(74, 79, 123, 131, 2, 4378),
(75, 80, 107, 113, 2, 30000),
(76, 81, 107, 113, 2, 30000);

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
(81, 28, 30000, 'COD', 'pending', 'unpaid', '2024-12-29 06:02:14');

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
(23, 78, 15000, 'gcash.png', '2024-12-29 05:48:26');

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
(36, 25, 'XS', 20),
(37, 25, 'S', 19),
(38, 25, 'M', 18),
(40, 27, 'S', 25),
(41, 27, 'M', 25),
(42, 28, 'M', 25),
(43, 28, 'L', 25),
(44, 29, 'S', 25),
(45, 29, 'M', 25),
(46, 30, 'S', 25),
(47, 24, 'S', 20),
(50, 37, 'S', 25),
(52, 39, 'S', 25),
(53, 40, 'S', 10),
(54, 41, 'S', 25),
(55, 31, 'NS', 24),
(56, 32, 'NS', 25),
(57, 33, 'NS', 23),
(59, 44, 'S', 17),
(60, 42, 'S', 25),
(61, 43, 'S', 25),
(62, 46, 'S', 25),
(63, 45, 'S', 25),
(64, 60, 'S', 25),
(65, 63, 'S', 25),
(66, 64, 'S', 10),
(67, 47, 'S', 10),
(68, 57, 'S', 10),
(69, 72, '38', 5),
(70, 65, '40', 10),
(71, 58, 'S', 10),
(72, 59, 'S', 10),
(73, 71, 'S', 25),
(74, 67, '40', 25),
(75, 70, 'S', 23),
(77, 48, 'S', 21),
(78, 69, '40', 15),
(79, 49, 'S', 24),
(80, 73, '37', 25),
(81, 74, '37', 10),
(82, 75, '37', 25),
(83, 76, '37', 10),
(84, 77, '37', 10),
(85, 78, '37', 10),
(86, 79, '37', 20),
(88, 81, '37', 8),
(89, 83, '37', 10),
(90, 84, '37', 25),
(91, 82, '37', 10),
(94, 87, 'NS', 10),
(101, 93, '40', 10),
(103, 96, '40', 6),
(104, 97, '40', 10),
(106, 26, 'S', 15),
(108, 100, 'NS', 5),
(109, 101, '40', 10),
(110, 102, '40', 27),
(111, 108, '40', 26),
(112, 106, 'S', 15),
(113, 107, '40', 23),
(114, 104, '40', 24),
(115, 103, '40', 20),
(119, 112, 'NS', 24),
(120, 105, '40', 25),
(121, 99, 'S', 20),
(122, 114, '40', 28),
(123, 115, '40', 10),
(124, 113, '40', 19),
(127, 120, '40', 25),
(131, 123, 'M', 22),
(132, 116, 'M', 25),
(133, 110, 'NS', 25),
(134, 124, 'M', 24),
(135, 125, 'NS', 25),
(136, 126, 'S', 25),
(137, 127, 'M', 23),
(138, 128, 'M', 25),
(139, 129, 'M', 25),
(140, 130, 'S', 25),
(142, 132, 'S', 25),
(143, 131, 'M', 25),
(144, 134, '40', 25),
(145, 135, 'M', 25),
(146, 137, '40', 21),
(147, 138, '40', 24),
(149, 140, '40', 25),
(150, 136, 'NS', 10),
(151, 141, '40', 25),
(152, 102, '41', 30);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `subcategoryID` int(11) NOT NULL,
  `subcategoryName` varchar(255) NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`subcategoryID`, `subcategoryName`, `categoryID`) VALUES
(1, 'Women Clothing', 1),
(2, 'Men Clothing', 1),
(4, 'Women Footwear', 2),
(5, 'Men Footwear', 2),
(9, 'Jewelry', 3),
(10, 'Bags', 3),
(15, 'Eye glasses', 3),
(16, 'Socks', 3),
(17, 'Cap', 3);

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
(15, 'Mohammad Salih', '961 093 9761', 'Saray Dito lng', 'Female', 'mohammaddomangcag.abdulmanan@my.smciligan.edu.ph', 'Salih12345', NULL, 0),
(16, 'Salih Abdulmanan', '0952 949 9494', 'dasda', 'Male', 'mohammadsalih156@gmail.com', 'Salih123', NULL, 0),
(18, 'Salih', '232', 'here', 'Male', 'mohammadabdulmanan24@gmail.com', 'Salih123', NULL, 0),
(23, NULL, NULL, NULL, NULL, 'legendsalih24@gmail.com', 'Salih123', NULL, 0),
(28, 'Parida Tulngaw', '123123', 'Here', 'Male', 'riri@gmail.com', 'Salih123', NULL, 0);

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
  ADD KEY `subcategoryID` (`subcategoryID`);

--
-- Indexes for table `orderline`
--
ALTER TABLE `orderline`
  ADD PRIMARY KEY (`orderlineID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`sizeID`),
  ADD KEY `inventoryID` (`inventoryID`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`subcategoryID`),
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
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `orderline`
--
ALTER TABLE `orderline`
  MODIFY `orderlineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `sizeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `subcategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `subcategoryID` FOREIGN KEY (`subcategoryID`) REFERENCES `subcategories` (`subcategoryID`);

--
-- Constraints for table `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `inventoryID` FOREIGN KEY (`inventoryID`) REFERENCES `inventory` (`inventoryID`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `categoryID` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
