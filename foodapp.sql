-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 10:51 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `FullName`, `UserName`, `Password`) VALUES
(1, 'admin1', '.adminuser1', '21232f297a57a5a743894a0e4a801fc3'),
(2, '.adminuser2', 'admin2', '21232f297a57a5a743894a0e4a801fc3'),
(13, 'aGequa9A6Q', '4PqQA8QykU', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `Title` varchar(100) NOT NULL,
  `ImageName` varchar(255) NOT NULL,
  `Featured` varchar(200) NOT NULL,
  `Active` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `Title`, `ImageName`, `Featured`, `Active`) VALUES
(11, 'Sharwama', ' 0_Eden-Hazard.jpg', 'on', 'on'),
(12, 'Cake', ' 64636c6a0e3156.20677386.jpg', 'Yes', 'Yes'),
(13, 'Pastry', ' 64636c4ed176e4.32528824.jpg', 'Yes', 'Yes'),
(14, 'Drinks', ' 64636bbbe6c383.80191810.jpg', 'Yes', 'Yes'),
(15, 'Chocolates', ' 64636bda29b7d9.06684929.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `ImageName` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `Featured` varchar(200) NOT NULL,
  `Active` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `Title`, `Description`, `Price`, `ImageName`, `category_id`, `Featured`, `Active`) VALUES
(1, 'Snacks', 'jvnjb jfg jgf b', '23.00', 'food_556.Array', 0, 'Yes', 'Yes'),
(4, 'Fanta', 'Fanta is Good for the body', '30.00', 'food_603.Array', 12, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `Order_date` datetime NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Customer_name` varchar(255) NOT NULL,
  `Customer_contact` varchar(255) NOT NULL,
  `Customer_Email` varchar(150) NOT NULL,
  `Customer_Address` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `Order_date`, `Status`, `Customer_name`, `Customer_contact`, `Customer_Email`, `Customer_Address`) VALUES
(1, 'Fanta', '30.00', 14, '420.00', '2023-05-16 03:31:56', 'Delivered', 'Osagioduwa Nosakhare', '08162942636', 'markel123@gmail.com', 'Nigeria'),
(2, 'Snacks', '23.00', 4, '92.00', '2023-05-16 03:35:39', 'On Delevery', 'Nosakhare Osas', '08162942636', 'bettybutter@gmail.com', 'Edo State');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
