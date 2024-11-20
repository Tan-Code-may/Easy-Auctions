-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 24, 2023 at 12:04 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21019425_easy_auctions`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile number` bigint(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `mobile number`, `name`, `surname`) VALUES
(1, 'admin', 'admin', 1234567095, 'Tanmay', 'Garg');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `cid` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`cid`, `cname`) VALUES
(1, 'India'),
(2, 'USA'),
(3, 'Australia'),
(4, 'China'),
(5, 'Japan'),
(6, 'Russia'),
(7, 'Dubai'),
(8, 'South Africa'),
(9, 'South Korea'),
(10, 'Srilanka'),
(11, 'UK'),
(12, 'Pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bid`
--

CREATE TABLE `tbl_bid` (
  `pro_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `bid_amount` int(11) NOT NULL,
  `bid_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_bid`
--

INSERT INTO `tbl_bid` (`pro_id`, `uid`, `bid_amount`, `bid_id`) VALUES
(90, 16, 1500, 50),
(90, 17, 2000, 51),
(90, 18, 2001, 52),
(91, 16, 2000, 53),
(93, 16, 6000, 54),
(93, 17, 6100, 55),
(93, 16, 7100, 56),
(95, 16, 2100, 57),
(95, 17, 2500, 58),
(96, 17, 110000, 59),
(96, 16, 120000, 60);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_img`
--

CREATE TABLE `tbl_img` (
  `img_id` int(11) NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_img`
--

INSERT INTO `tbl_img` (`img_id`, `img_name`, `pro_id`) VALUES
(97, '64d240d10e6935.41241223.jpg', 89),
(98, '64d242b5937637.33017541.jpeg', 90),
(99, '64d64c704faa60.61881624.jpeg', 91),
(100, '64d717d9da0aa8.80120626.jpeg', 92),
(101, '64d75dc48d8469.55498846.jpg', 93),
(102, '64d79372c907e5.60868665.jpeg', 94),
(103, '64d79971dfe628.92368595.jpeg', 95),
(104, '64d898253985f6.84114703.png', 95),
(105, '64d898a58d3b99.07287065.png', 95),
(106, '64d899567ad5d3.08918526.jpeg', 96),
(107, '64d89c41f22ff0.56918102.jpeg', 97),
(108, '64d8aa61882a75.69861312.jpeg', 98),
(109, '64d8f56388eaf0.17718758.jpeg', 99);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pro_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `uid` int(11) NOT NULL,
  `bidstarttime` datetime NOT NULL,
  `bidendtime` datetime NOT NULL,
  `status` enum('On Sale','Sold','Disable') NOT NULL DEFAULT 'On Sale'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pro_id`, `name`, `price`, `description`, `uid`, `bidstarttime`, `bidendtime`, `status`) VALUES
(89, 'A bottle', 900, 'A stainless steel bottle', 15, '2023-08-08 18:49:00', '2023-08-08 18:51:00', 'Sold'),
(90, 'An antique coin', 1111, 'Ancient 18th century coin', 15, '2023-08-08 18:58:00', '2023-08-08 20:57:00', 'Sold'),
(91, 'kjhkbn', 1000, 'khjvbkb', 18, '2023-08-11 20:27:00', '2023-08-11 21:27:00', 'Sold'),
(92, 'ftghjf', 567, 'hgjcdf', 18, '2023-08-12 12:57:00', '2023-08-12 13:55:00', 'Sold'),
(93, 'sample', 5000, 'muciuhfidgshmhr iuhn ihsoung', 18, '2023-08-12 15:53:00', '2023-08-12 17:54:00', 'Sold'),
(94, 'klejd', 392, 'jefBC', 18, '2023-08-12 20:42:00', '2023-08-12 21:43:00', 'Sold'),
(95, 'TEST', 2000, 'ADFGADFHGIUH', 18, '2023-08-12 20:08:00', '2023-08-12 22:08:00', 'Sold'),
(96, 'Roadster', 100000, 'A 70s roadster', 18, '2023-08-13 14:21:00', '2023-08-14 14:20:00', 'Sold'),
(97, 'sdhkjag', 1200, 'asdfgdkjh asdkjfnadjsn', 18, '2023-08-13 14:32:00', '2023-08-14 14:32:00', 'Sold'),
(98, 'A watch', 2000, 'ksjnkj', 18, '2023-08-14 15:32:00', '2023-08-14 15:35:00', 'Sold'),
(99, 'adfghd', 1244, 'adfgd', 18, '2023-08-13 20:53:00', '2023-08-15 20:53:00', 'Sold');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase`
--

CREATE TABLE `tbl_purchase` (
  `purchase_id` int(11) NOT NULL,
  `bid_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_purchase`
--

INSERT INTO `tbl_purchase` (`purchase_id`, `bid_id`, `buyer_id`) VALUES
(16, 52, 18),
(17, 53, 16),
(18, 56, 16),
(19, 58, 17),
(20, 60, 16);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `hobby` varchar(100) NOT NULL,
  `country` int(11) NOT NULL,
  `dor` datetime NOT NULL,
  `status` enum('Enable','Disable') NOT NULL DEFAULT 'Enable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `email`, `password`, `name`, `surname`, `gender`, `hobby`, `country`, `dor`, `status`) VALUES
(15, 'tanmaygarg4218@gmail.com', 'tango123', 'Tanmay', 'G', 'Male', 'Singing', 1, '2023-08-08 02:09:43', 'Enable'),
(17, 'lava@gmail.com', 'lava123', 'La', 'Va', 'Male', 'Music', 1, '2023-08-08 06:59:15', 'Enable'),
(18, 'tango@gmail.com', 'tango123', 'tango', 'garg', 'Male', 'Music', 1, '2023-08-08 07:04:43', 'Enable'),
(19, 'sanyam@gmail.com', 'sanyam123', 'Sanyam', 'Ag', 'Male', 'Reading', 1, '2023-08-16 02:11:24', 'Enable');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_bid`
--
ALTER TABLE `tbl_bid`
  ADD PRIMARY KEY (`bid_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `tbl_img`
--
ALTER TABLE `tbl_img`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `bid_id` (`bid_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_bid`
--
ALTER TABLE `tbl_bid`
  MODIFY `bid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tbl_img`
--
ALTER TABLE `tbl_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_bid`
--
ALTER TABLE `tbl_bid`
  ADD CONSTRAINT `tbl_bid_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `tbl_product` (`pro_id`),
  ADD CONSTRAINT `tbl_bid_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  ADD CONSTRAINT `tbl_purchase_ibfk_1` FOREIGN KEY (`bid_id`) REFERENCES `tbl_bid` (`bid_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
