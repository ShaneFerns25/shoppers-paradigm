-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2023 at 10:40 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppers paradigm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `Password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `Password`) VALUES
(1, '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(10) NOT NULL,
  `CategoryName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`) VALUES
(1, 'Shoes'),
(2, 'Smartphones'),
(3, 'Shirts');

-- --------------------------------------------------------

--
-- Table structure for table `footwear`
--

CREATE TABLE `footwear` (
  `ProductID` int(10) NOT NULL,
  `ShoeSize` varchar(30) NOT NULL,
  `Color` varchar(30) NOT NULL,
  `Sole_Material` varchar(30) NOT NULL,
  `Brand` varchar(30) NOT NULL,
  `Price` int(20) NOT NULL,
  `ShopID` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `PName` varchar(50) NOT NULL,
  `ShoeType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `footwear`
--

INSERT INTO `footwear` (`ProductID`, `ShoeSize`, `Color`, `Sole_Material`, `Brand`, `Price`, `ShopID`, `Quantity`, `PName`, `ShoeType`) VALUES
(1, '8,9', 'Grey', 'Synthetic', 'Wildcraft', 2135, 202, 12, 'Wildcraft Volga Walking Shoes Grey', 'Walking Shoes'),
(2, '6,7,8,9,10', 'Blue', 'Synthetic', 'Wildcraft', 1245, 202, 20, 'Wildcraft Volga Walking Shoes Blue', 'Walking Shoes'),
(3, '6,7,8,9,10', 'Black', 'Synthetic', 'Wildcraft', 5398, 202, 20, 'Wildcraft Volga Walking Shoes Black', 'Walking Shoes'),
(4, '6,7,8,9,10', 'White', 'Synthetic', 'BeeRock', 500, 103, 18, 'BeeRock Oxygen Walking Shoes White', 'Walking Shoes'),
(5, '6,7,8,9,10', 'Black', 'Synthetic', 'BeeRock', 500, 103, 18, 'BeeRock Oxygen Walking Shoes Black', 'Walking Shoes'),
(6, '6,7,8,9,10', 'Olive', 'Synthetic', 'Wildcraft', 660, 202, 13, 'Wildcraft Clifton 2.0 Outdoors Olive', 'Casual Shoes'),
(7, '10', 'Navy', 'Rubber', 'Wildcraft ', 2100, 202, 8, 'Wildcraft Spitzer 2.0 Hiking & Trekking Shoes Navy', 'Sports Shoes'),
(8, '9,10', 'Black', 'Rubber', 'Wildcraft ', 2700, 202, 10, 'Wildcraft Running Shoes Black', 'Running Shoes'),
(9, '7,8,9,10', 'Grey', 'Rubber', 'Bata', 700, 205, 17, 'Bata Casual Shoes Grey', 'Casual Shoes'),
(10, '6,7,8,9', 'Brown', 'Synthetic', 'Bata', 650, 205, 11, 'Bata Loafers Brown', 'Loafers'),
(11, '6,7,8,9,10', 'Navy', 'Rubber', 'BeeRock', 450, 103, 22, 'BeeRock Comfy Walking Shoes Navy', 'Slip On'),
(12, '6,7,8,9,10', 'Black', 'Rubber', 'BeeRock', 450, 103, 22, 'BeeRock Comfy Walking Shoes Black', 'Slip On');

-- --------------------------------------------------------

--
-- Table structure for table `shirts`
--

CREATE TABLE `shirts` (
  `ProductID` int(10) NOT NULL,
  `PName` varchar(100) NOT NULL,
  `Price` int(10) NOT NULL,
  `Size` varchar(30) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Color` varchar(20) NOT NULL,
  `Brand` varchar(30) NOT NULL,
  `ShopID` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shirts`
--

INSERT INTO `shirts` (`ProductID`, `PName`, `Price`, `Size`, `Type`, `Color`, `Brand`, `ShopID`, `Quantity`) VALUES
(1, 'Diverse Men\'s Regular Formal Shirt', 1290, '42,44', 'Regular Fit', 'Dark Blue', 'Diverse', 101, 6),
(2, 'Symbol Men\'s Regular fit Casual Shirt', 669, '40', 'Regular Fit', 'Orange', 'Symbol', 104, 4),
(3, 'Arrow Blue Patch Pocket Patterned Shirt', 1569, '45,46', 'Regular Fit', 'Blue', 'Arrow', 203, 3),
(4, 'Diverse Men\'s Regular Formal Shirt 2', 3144, '41,43,45', 'Regular Fit', 'Light Blue', 'Diverse', 101, 2),
(5, 'Symbol Men\'s Regular Fit Shirt', 1330, '38,40,44', 'Regular Fit', 'Maroon', 'Symbol', 104, 6),
(6, 'Arrow Brown Slim Fit Patterned Shirt', 2116, '42', 'Slim Fit', 'Brown', 'Arrow', 203, 5);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `ShopID` int(10) NOT NULL,
  `ShopName` varchar(30) NOT NULL,
  `Password` varchar(1000) NOT NULL,
  `FloorNo` varchar(15) NOT NULL,
  `Category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`ShopID`, `ShopName`, `Password`, `FloorNo`, `Category`) VALUES
(101, 'PREMIUM INK', '5f4dcc3b5aa765d61d8327deb882cf99', '1', 'Shirts'),
(102, 'PHONE CORNER', '5f4dcc3b5aa765d61d8327deb882cf99', '1', 'Smartphones'),
(103, 'BeeRock', '5f4dcc3b5aa765d61d8327deb882cf99', '1', 'Shoes'),
(104, 'Jean Shop', '5f4dcc3b5aa765d61d8327deb882cf99', '1', 'Shirts'),
(201, 'Go Mobile', '5f4dcc3b5aa765d61d8327deb882cf99', '2', 'Smartphones'),
(202, 'Wildcraft', '5f4dcc3b5aa765d61d8327deb882cf99', '2', 'Shoes'),
(203, 'Wildland Wears', '5f4dcc3b5aa765d61d8327deb882cf99', '2', 'Shirts'),
(204, 'DIGITAL VISION', '5f4dcc3b5aa765d61d8327deb882cf99', '2', 'Smartphones'),
(205, 'Bata', '5f4dcc3b5aa765d61d8327deb882cf99', '2', 'Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `smartphones`
--

CREATE TABLE `smartphones` (
  `ProductID` int(10) NOT NULL,
  `PName` varchar(30) NOT NULL,
  `Price` int(11) NOT NULL,
  `Brand` varchar(15) NOT NULL,
  `Screen_Size` int(10) NOT NULL,
  `OS` varchar(30) NOT NULL,
  `ShopID` int(10) NOT NULL,
  `Ram` int(10) NOT NULL,
  `Storage` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `smartphones`
--

INSERT INTO `smartphones` (`ProductID`, `PName`, `Price`, `Brand`, `Screen_Size`, `OS`, `ShopID`, `Ram`, `Storage`, `Quantity`) VALUES
(1, 'Redmi 9', 9500, 'Redmi', 10, 'Android', 201, 4, 64, 8),
(2, 'Apple iPhone 8', 77000, 'Apple', 12, 'iOS', 204, 2, 256, 8),
(3, 'Samsung Galaxy M11', 14998, 'Samsung', 16, 'Android', 102, 4, 64, 3),
(4, 'Apple iPhone 11 Pro Max', 95699, 'Apple', 17, 'iOS', 204, 4, 64, 5),
(5, 'Samsung Galaxy M31', 18325, 'Samsung', 16, 'Android', 102, 8, 128, 8),
(6, 'Redmi 6A', 6539, 'Redmi', 5, 'Android', 201, 2, 256, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `footwear`
--
ALTER TABLE `footwear`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `Foreignkey1` (`ShopID`);

--
-- Indexes for table `shirts`
--
ALTER TABLE `shirts`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `Foreignkey2` (`ShopID`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`ShopID`);

--
-- Indexes for table `smartphones`
--
ALTER TABLE `smartphones`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `Foreignkey3` (`ShopID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `footwear`
--
ALTER TABLE `footwear`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `shirts`
--
ALTER TABLE `shirts`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `ShopID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- AUTO_INCREMENT for table `smartphones`
--
ALTER TABLE `smartphones`
  MODIFY `ProductID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `footwear`
--
ALTER TABLE `footwear`
  ADD CONSTRAINT `Foreignkey1` FOREIGN KEY (`ShopID`) REFERENCES `shop` (`ShopID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shirts`
--
ALTER TABLE `shirts`
  ADD CONSTRAINT `Foreignkey2` FOREIGN KEY (`ShopID`) REFERENCES `shop` (`ShopID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `smartphones`
--
ALTER TABLE `smartphones`
  ADD CONSTRAINT `Foreignkey3` FOREIGN KEY (`ShopID`) REFERENCES `shop` (`ShopID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
