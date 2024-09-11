-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2024 at 05:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `purebite_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_details_tbl`
--

CREATE TABLE `address_details_tbl` (
  `Address_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Full_Name` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Pincode` int(6) NOT NULL,
  `Phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_details_tbl`
--

CREATE TABLE `cart_details_tbl` (
  `Product_Id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_details_tbl`
--

CREATE TABLE `category_details_tbl` (
  `Category_Id` int(11) NOT NULL,
  `Category_Name` varchar(100) NOT NULL,
  `Parent_Category_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details_tbl`
--

CREATE TABLE `order_details_tbl` (
  `Order_Id` int(11) NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_header_tbl`
--

CREATE TABLE `order_header_tbl` (
  `Order_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Order_Date` datetime NOT NULL,
  `Order_Status` varchar(10) NOT NULL,
  `Billing_Address_Id` int(11) NOT NULL,
  `Shipping_Address_Id` int(11) NOT NULL,
  `Shipping_Charge` float NOT NULL,
  `Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `responses_tbl`
--

CREATE TABLE `responses_tbl` (
  `Response_Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `Subject` int(11) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review_details_tbl`
--

CREATE TABLE `review_details_tbl` (
  `Product_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Review` int(11) NOT NULL,
  `Review_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_details_tbl`
--

CREATE TABLE `user_details_tbl` (
  `User_Id` int(11) NOT NULL,
  `User_Role_Id` tinyint(4) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `Mobile_No` varchar(20) NOT NULL,
  `Active_Status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_details_tbl`
--

CREATE TABLE `wishlist_details_tbl` (
  `Product_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_details_tbl`
--
ALTER TABLE `address_details_tbl`
  ADD PRIMARY KEY (`Address_Id`);

--
-- Indexes for table `category_details_tbl`
--
ALTER TABLE `category_details_tbl`
  ADD PRIMARY KEY (`Category_Id`);

--
-- Indexes for table `order_header_tbl`
--
ALTER TABLE `order_header_tbl`
  ADD PRIMARY KEY (`Order_Id`);

--
-- Indexes for table `responses_tbl`
--
ALTER TABLE `responses_tbl`
  ADD PRIMARY KEY (`Response_Id`);

--
-- Indexes for table `user_details_tbl`
--
ALTER TABLE `user_details_tbl`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_details_tbl`
--
ALTER TABLE `address_details_tbl`
  MODIFY `Address_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_details_tbl`
--
ALTER TABLE `category_details_tbl`
  MODIFY `Category_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_header_tbl`
--
ALTER TABLE `order_header_tbl`
  MODIFY `Order_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `responses_tbl`
--
ALTER TABLE `responses_tbl`
  MODIFY `Response_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_details_tbl`
--
ALTER TABLE `user_details_tbl`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
