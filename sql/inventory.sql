-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2024 at 04:08 PM
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
(79, 4, 'purepng.com-black-women-shoewomen-shoesfootdesignfoot-wearwomenladiescasualleatherblack-14215264280391tuvx.png', 'Classic Black Pumps', 3000, 25, 'Available'),
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
(125, 2, 'PngItem_1800815.png', 'Chicago Bulls Shorts', 1500, 25, 'Available'),
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventoryID`),
  ADD KEY `subcategoryID` (`subcategoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `subcategoryID` FOREIGN KEY (`subcategoryID`) REFERENCES `subcategories` (`subcategoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
