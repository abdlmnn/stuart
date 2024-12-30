-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2024 at 02:51 PM
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
(24, 2, 'Back-Of-Black-Hoodie-PNG-Free-Download.png', 'Back of Black Hoodie', 2599, 25, 'Available'),
(25, 1, 'Always-T-Shirt-PNG-Pic.png', 'Always T-Shirt', 299, 75, 'Available'),
(26, 1, 'Turtle-Neck-Shirt-PNG-Photo.png', 'Turtle Neck Brown', 159, 25, 'Available'),
(27, 1, 'Animal-Print-Shirt-PNG-Image.png', 'Tiger Sweater', 189, 50, 'Available'),
(28, 1, 'Embellished-Sweater-PNG-Clipart.png', 'Embellished Sweater', 399, 50, 'Available'),
(29, 1, 'Graphic-T-Shirt-PNG-File.png', 'Graphic T-Shirt', 499, 50, 'Available'),
(30, 1, 'Half-T-shirt-Singlet-PNG-File.png', 'Half T-Shirt', 90, 25, 'Available'),
(31, 10, 'Backpack-Bag.png', 'Red Backpack', 499, 22, 'Available'),
(32, 10, 'Black-Duffel-Bag.png', 'Duffel Bag Black', 699, 25, 'Available'),
(33, 10, 'Lv-Bag.png', 'Louis Vuitton ', 3599, 25, 'Available'),
(37, 2, 'Polo-Collar-T-Shirt-PNG.png', 'Polo Black T-Shirt', 450, 25, 'Available'),
(39, 2, 'Polo-T-Shirt-PNG-Image.png', 'Ocean Breeze Polo', 189, 25, 'Available'),
(40, 2, 'Plain-White-T-Shirt-PNG.png', 'Classic White Tee', 200, 25, 'Available'),
(41, 2, 'shirt3.png', 'Navy ADHD Long Sleeve Shirt', 399, 25, 'Available'),
(42, 2, 'Polo.png', 'Rustic Red', 269, 25, 'Available'),
(43, 2, 'Polo-Shirt-PNG-Photos.png', 'The Green Loop', 350, 25, 'Available'),
(44, 2, 'Shirt-PNG-Image-Free-Download.png', 'Black Tie Affair', 689, 25, 'Available'),
(45, 1, 'Women-Back-Of-Black-Hoodie-PNG-Picture.png', 'Tuesday Crop', 700, 25, 'Available'),
(46, 1, 'T-Shirt-Transparent-Isolated-PNG.png', 'Boomer Pink', 480, 25, 'Available'),
(47, 2, 'T-Shirt-PNG-Transparent.png', 'ServisHero Yellow', 300, 25, 'Available'),
(48, 1, 'T-Shirt-PNG-Picture.png', 'Amethyst Aura', 250, 25, 'Available'),
(49, 2, 'T-Shirt-PNG-Pic.png', 'Adidas Trefoil Back', 800, 75, 'Available'),
(57, 2, 'T-Shirt-PNG-Isolated-Photo.png', 'Scott Vintage Turquoise', 500, 25, 'Available'),
(58, 2, 'T-Shirt-PNG-Free-Download.png', 'Mandarin Collar Polo', 400, 25, 'Available'),
(59, 1, 'T-Shirt-Download-PNG-Isolated-Image.png', 'Hey Girl Long Sleeve', 600, 25, 'Available'),
(60, 2, 'Thrasher-T-Shirt-PNG-Transparent-Image.png', 'Thrasher Flame', 500, 25, 'Available'),
(63, 2, 'Thrasher-T-Shirt-PNG-Photos.png', 'Thrasher Flame Hoodie', 1000, 25, 'Available'),
(64, 1, 'Thrasher-T-Shirt-PNG-Image.png', 'Thrasher Flame Pink', 500, 25, 'Available'),
(65, 5, 'shoes2.png', 'Nike Air Force 1 Mid ', 4500, 25, 'Available'),
(67, 5, 'shoes3.png', 'Classic Red Chucks', 1500, 25, 'Available'),
(69, 5, 'shoes1.png', 'Allbirds Wool Runners', 4000, 25, 'Available'),
(70, 2, 'shirt2.png', 'Classic Black Crewneck', 250, 25, 'Available'),
(71, 2, 'shirt1.png', 'Classic Red Tee', 200, 25, 'Available'),
(72, 4, 'heel1.png', 'Red Hot Stilettos', 5000, 25, 'Available'),
(73, 4, 'pure.png', 'Black Satin Bow Heels', 8000, 25, 'Available'),
(74, 4, 'purepng.com-blue-women-shoewomen-shoesfootdesignfoot-wearwomenladiescasualblue-1421526427896lp3gs.png', 'Royal Blue Satin Sandals', 3000, 25, 'Available'),
(75, 4, 'purepng.com-black-women-shoewomen-shoesfootdesignfoot-wearwomenladiescasualleatherblack-1421526427979f7tbf.png', 'Burgundy Patent Leather', 2000, 25, 'Available'),
(76, 4, 'purepng.com-women-shoewomen-shoesfootdesignfoot-wearwomenladiescasualleather-1421526428001ven3p.png', 'Gucci Denim Platform Wedges', 25000, 25, 'Available'),
(77, 4, 'purepng.com-women-shoewomen-shoesfootdesignfoot-wearwomenladiescasualleather-1421526427925ybhgq.png', 'Saddle Leather Pumps', 2500, 25, 'Available'),
(78, 4, 'purepng.com-white-women-shoewomen-shoesfootdesignfoot-wearwomenladieswhite-1421526427811rk3z0.png', 'Peace of Shoe', 25000, 25, 'Available'),
(79, 4, 'purepng.com-black-women-shoewomen-shoesfootdesignfoot-wearwomenladiescasualleatherblack-14215264280391tuvx.png', 'Classic Black Pumps', 3000, 20, 'Available'),
(81, 4, 'purepng.com-black-women-shoewomen-shoesfootdesignfoot-wearblackboot-1421526427559jwngk.png', 'Leather Buckle Booties', 3500, 25, 'Available'),
(82, 4, 'purepng.com-kheila-white-women-shoewomen-shoesfootdesignfoot-wearwhitekheila-1421526427594wde1z.png', 'White Patent Leather', 3000, 25, 'Available'),
(83, 4, 'purepng.com-pink-women-bootwomen-shoesfootdesignfoot-wearboot-14215264275018xljc.png', 'Pink Buttoned Ankle Boots', 25000, 25, 'Available'),
(84, 4, 'purepng.com-women-shoeswomen-shoesfootdesignfoot-wear-14215264271567wdeb.png', 'Burgundy Wool', 15000, 25, 'Available'),
(87, 9, 'beautiful-earrings-and-ring-qqm.png', 'Oval Garnet', 5500, 25, 'Available'),
(93, 5, 'purepng.com-running-shoesrunning-shoesrunningshoessportingphysical-activitiesstyle-1701528181538k7ske.png', 'Nike Lunar Control Vapor 2', 6000, 25, 'Available'),
(96, 5, 'shoes-png-nike-shoes-png-image-1280.png', 'Nike Zoom Kobe IV', 5000, 25, 'Available'),
(97, 5, 'shoes-png-shoes-png-file-png-image-1180.png', 'Yuketen', 8000, 25, 'Available'),
(99, 1, 'T-Shirt-PNG-Isolated-Transparent.png', 'Brainchild', 300, 25, 'Available'),
(100, 9, 'bc.png', 'Medical Bracelet', 799, 25, 'Available'),
(101, 5, 'PngItem_6152731.png', 'Aqua Blaze Sneakers', 3200, 25, 'Available'),
(102, 5, 'PngItem_2635105.png', 'Air Jordan 1 Fearless', 4500, 100, 'Available'),
(103, 5, 'PngItem_1588118.png', 'Air Jordan 4 White Cement', 5200, 25, 'Available'),
(104, 5, 'PngItem_2459204.png', 'Air Jordan 4 Retro Toro', 10000, 25, 'Available'),
(105, 5, 'j2.png', 'Jordan 4 Black Cat 2020', 11250, 25, 'Available'),
(106, 5, 'PngItem_3302198.png', 'Air Jordan 1 Retro High OG', 12000, 25, 'Available'),
(107, 5, 'PngItem_5982319.png', 'Air Jordan 4 Alternate 89', 15000, 25, 'Available'),
(108, 5, 'PngItem_4069178.png', 'Air Jordan 1 Lost & Found', 25000, 75, 'Available'),
(110, 9, 'PngItem_3133166.png', 'Marcozo', 999, 25, 'Available'),
(112, 17, 'PngItem_659649.png', 'King Cap', 150, 25, 'Available'),
(113, 5, 'PngItem_349221.png', 'Air Jordan 1 Swoosh', 14500, 25, 'Available'),
(114, 5, 'PngItem_349563.png', 'Air Force 1 Low Snakeskin', 8000, 100, 'Available'),
(115, 5, 'PngItem_482943.png', 'Air Jordan 1 Retro High', 15599, 25, 'Available'),
(116, 16, 'PngItem_910787.png', 'Max Ankle Socks White', 500, 25, 'Available'),
(120, 5, 'PngItem_911324.png', 'Air Jordan XXX1', 12000, 25, 'Available'),
(123, 2, 'PngItem_1486295.png', 'Dri-FIT Long Sleeve', 1500, 25, 'Available'),
(124, 2, 'PngItem_1694395.png', 'Jordan 23 Engineered', 1500, 25, 'Available'),
(125, 2, 'PngItem_1800815.png', 'Chicago Bulls Shorts', 1500, 2025, 'Available'),
(126, 2, 'PngItem_1800967.png', 'Nike Swingman Shorts', 1500, 25, 'Available'),
(127, 2, 'PngItem_1801328.png', 'Bulls Essential Hoodie', 2000, 25, 'Available'),
(128, 2, 'PngItem_2012892.png', 'Cavaliers Hoodie', 2000, 25, 'Available'),
(129, 2, 'PngItem_2205633.png', 'Jordan Vertical T-Shirt', 2000, 25, 'Available'),
(130, 2, 'PngItem_2450211.png', 'LeBron T-Shirt', 300, 25, 'Available'),
(131, 2, 'PngItem_2636456.png', 'All-Star Team Jacket', 5000, 25, 'Available'),
(132, 2, 'PngItem_2636700.png', 'Nike Long-sleeve', 1200, 25, 'Available'),
(134, 5, 'PngItem_3451688.png', 'Nike Air Force 1 Low Pro Green', 5000, 25, 'Available'),
(135, 16, 'PngItem_3484154.png', 'Max Ankle Socks Black', 500, 25, 'Available'),
(136, 17, 'PngItem_3727304.png', 'Heritage86', 699, 25, 'Available'),
(137, 5, 'PngItem_5547628.png', 'Air Jordan 1 Retro High Bred', 12500, 25, 'Available'),
(138, 5, 'PngItem_5547787.png', 'Air Jordan Spizike', 8000, 25, 'Available'),
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
(76, 81, 107, 113, 2, 30000),
(77, 82, 103, 115, 1, 5200),
(78, 83, 84, 90, 2, 30000),
(79, 84, 128, 138, 2, 52550),
(80, 84, 125, 135, 3, 52550),
(81, 84, 105, 120, 3, 52550),
(82, 84, 81, 88, 2, 52550),
(83, 84, 130, 140, 1, 52550),
(84, 84, 124, 134, 2, 52550),
(85, 85, 106, 112, 1, 12000),
(86, 86, 104, 114, 2, 20897),
(87, 86, 25, 36, 2, 20897),
(88, 86, 25, 37, 1, 20897),
(89, 87, 104, 114, 1, 10000),
(90, 88, 106, 112, 1, 12000),
(91, 89, 24, 47, 2, 5198),
(92, 90, 108, 111, 1, 25000),
(93, 91, 138, 147, 2, 16000),
(94, 92, 120, 127, 2, 24000),
(95, 93, 120, 127, 2, 24000),
(96, 94, 102, 152, 5, 22500),
(97, 95, 102, 110, 2, 9000),
(98, 96, 131, 143, 2, 10000),
(99, 97, 137, 146, 1, 12500),
(100, 98, 103, 115, 1, 5200),
(101, 99, 70, 75, 3, 750),
(102, 100, 106, 112, 1, 12000),
(103, 101, 24, 47, 2, 15888),
(104, 101, 125, 135, 2, 15888),
(105, 101, 74, 81, 2, 15888),
(106, 101, 30, 46, 1, 15888),
(107, 101, 49, 79, 2, 15888),
(108, 102, 138, 147, 2, 16000),
(109, 103, 107, 113, 2, 30000),
(110, 104, 107, 113, 2, 30000),
(111, 105, 107, 113, 2, 30000),
(112, 106, 137, 146, 1, 12500),
(113, 107, 137, 146, 2, 25000),
(114, 108, 137, 146, 2, 25000),
(115, 109, 137, 146, 2, 25000),
(116, 116, 113, 124, 5, 72500),
(117, 117, 114, 122, 1, 8000),
(118, 118, 49, 79, 2, 1600),
(119, 119, 107, 113, 1, 15000),
(120, 120, 49, 79, 1, 800),
(121, 121, 135, 145, 2, 1000),
(122, 122, 138, 147, 3, 24000),
(123, 123, 32, 56, 2, 1398),
(124, 124, 110, 133, 1, 999),
(125, 125, 137, 146, 2, 25000),
(126, 126, 31, 55, 2, 998),
(127, 127, 113, 124, 1, 14500),
(128, 128, 113, 124, 1, 14500),
(129, 129, 82, 91, 2, 99000),
(130, 129, 73, 80, 5, 99000),
(131, 129, 84, 90, 3, 99000),
(132, 129, 72, 69, 1, 99000),
(133, 129, 67, 74, 2, 99000),
(134, 130, 82, 91, 2, 119189),
(135, 130, 73, 80, 5, 119189),
(136, 130, 84, 90, 3, 119189),
(137, 130, 72, 69, 1, 119189),
(138, 130, 67, 74, 2, 119189),
(139, 130, 137, 146, 1, 119189),
(140, 130, 101, 109, 1, 119189),
(141, 130, 44, 59, 1, 119189),
(142, 130, 128, 138, 1, 119189),
(143, 130, 125, 135, 1, 119189),
(144, 130, 47, 67, 1, 119189),
(145, 131, 115, 123, 1, 15599),
(146, 132, 138, 147, 1, 8000),
(147, 133, 44, 59, 1, 689),
(148, 134, 138, 147, 1, 8000),
(149, 135, 120, 127, 1, 12000),
(150, 136, 69, 78, 5, 20000),
(151, 137, 76, 83, 1, 51849),
(152, 137, 115, 123, 1, 51849),
(153, 137, 105, 120, 1, 51849),
(154, 138, 116, 132, 1, 2398),
(155, 138, 100, 108, 2, 2398),
(156, 138, 112, 119, 2, 2398),
(157, 139, 114, 122, 1, 8000),
(158, 140, 102, 152, 2, 35500),
(159, 140, 102, 110, 5, 35500),
(160, 140, 49, 79, 5, 35500),
(161, 141, 102, 110, 1, 5897),
(162, 141, 25, 38, 2, 5897),
(163, 141, 100, 108, 1, 5897),
(164, 142, 101, 109, 5, 16000),
(165, 143, 113, 124, 3, 44397),
(166, 143, 25, 37, 1, 44397),
(167, 143, 25, 36, 1, 44397),
(168, 143, 25, 38, 1, 44397);

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
(86, 79, '37', 20),
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
(135, 125, 'NS', 2025),
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
(15, 'Mohammad Salih', '961 093 9761', 'Saray Dito lng', 'Female', 'mohammaddomangcag.abdulmanan@my.smciligan.edu.ph', 'Salih123', NULL, 0),
(16, 'Salih Abdulmanan', '0952 949 9494', 'dasda', 'Male', 'mohammadsalih156@gmail.com', 'Salih123', 793628, 0),
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
  MODIFY `orderlineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `sizeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

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
