-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 30, 2024 at 02:17 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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
  `Address_Id` int NOT NULL,
  `User_Id` int NOT NULL,
  `Full_Name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Address` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `City` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `State` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Pincode` int NOT NULL,
  `Phone` varchar(15) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_details_tbl`
--

CREATE TABLE `cart_details_tbl` (
  `Product_Id` int NOT NULL,
  `Quantity` int NOT NULL,
  `User_Id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_details_tbl`
--

CREATE TABLE `category_details_tbl` (
  `Category_Id` int NOT NULL,
  `Category_Name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `Parent_Category_Id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_details_tbl`
--

INSERT INTO `category_details_tbl` (`Category_Id`, `Category_Name`, `Parent_Category_Id`) VALUES
(7, 'Fruits', NULL),
(8, 'Vegetables', NULL),
(9, 'Dairy Products', NULL),
(10, 'Meat', NULL),
(11, 'Bakery', NULL),
(12, 'Canned Goods', NULL),
(13, 'Frozen Foods', NULL),
(14, 'Snacks', NULL),
(15, 'Beverages', NULL),
(16, 'Condiments', NULL),
(17, 'Grains and Pasta', NULL),
(18, 'Seafood', NULL),
(19, 'Spices and Herbs', NULL),
(20, 'Oils and Fats', NULL),
(21, 'Cereals', NULL),
(22, 'Baking Supplies', NULL),
(23, 'Household Items', NULL),
(24, 'Personal Care', NULL),
(25, 'Pet Supplies', NULL),
(26, 'Health and Wellness', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details_tbl`
--

CREATE TABLE `order_details_tbl` (
  `Order_Id` int NOT NULL,
  `Product_Id` int NOT NULL,
  `Quantity` int NOT NULL,
  `Price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_header_tbl`
--

CREATE TABLE `order_header_tbl` (
  `Order_Id` int NOT NULL,
  `User_Id` int NOT NULL,
  `Order_Date` datetime NOT NULL,
  `Order_Status` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Billing_Address_Id` int NOT NULL,
  `Shipping_Address_Id` int NOT NULL,
  `Shipping_Charge` float NOT NULL,
  `Total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_details_tbl`
--

CREATE TABLE `product_details_tbl` (
  `Product_Id` int NOT NULL,
  `Category_Id` int NOT NULL,
  `Product_Name` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Product_Image` varchar(255) NOT NULL,
  `Sale_Price` decimal(10,2) NOT NULL,
  `Cost_Price` decimal(10,2) NOT NULL,
  `Discount` tinyint NOT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_details_tbl`
--

INSERT INTO `product_details_tbl` (`Product_Id`, `Category_Id`, `Product_Name`, `Description`, `Product_Image`, `Sale_Price`, `Cost_Price`, `Discount`, `stock`, `is_active`) VALUES
(5, 7, 'Apple', 'Crunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh apple', '66ee9001ceeaeapple.webp', 150.00, 100.00, 10, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `responses_tbl`
--

CREATE TABLE `responses_tbl` (
  `Response_Id` int NOT NULL,
  `Name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(320) COLLATE utf8mb4_general_ci NOT NULL,
  `Subject` int NOT NULL,
  `Message` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review_details_tbl`
--

CREATE TABLE `review_details_tbl` (
  `Product_Id` int NOT NULL,
  `User_Id` int NOT NULL,
  `Rating` int NOT NULL,
  `Review` text COLLATE utf8mb4_general_ci NOT NULL,
  `Review_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_details_tbl`
--

CREATE TABLE `user_details_tbl` (
  `User_Id` int NOT NULL,
  `User_Role_Id` tinyint NOT NULL,
  `First_Name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Last_Name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(320) COLLATE utf8mb4_general_ci NOT NULL,
  `Mobile_No` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Active_Status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_details_tbl`
--

CREATE TABLE `wishlist_details_tbl` (
  `Product_Id` int NOT NULL,
  `User_Id` int NOT NULL
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
-- Indexes for table `product_details_tbl`
--
ALTER TABLE `product_details_tbl`
  ADD PRIMARY KEY (`Product_Id`);

--
-- Indexes for table `responses_tbl`
--
ALTER TABLE `responses_tbl`
  ADD PRIMARY KEY (`Response_Id`);

--
-- Indexes for table `review_details_tbl`
--
ALTER TABLE `review_details_tbl`
  ADD PRIMARY KEY (`Product_Id`,`User_Id`);

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
  MODIFY `Address_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_details_tbl`
--
ALTER TABLE `category_details_tbl`
  MODIFY `Category_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_header_tbl`
--
ALTER TABLE `order_header_tbl`
  MODIFY `Order_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_details_tbl`
--
ALTER TABLE `product_details_tbl`
  MODIFY `Product_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `responses_tbl`
--
ALTER TABLE `responses_tbl`
  MODIFY `Response_Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_details_tbl`
--
ALTER TABLE `user_details_tbl`
  MODIFY `User_Id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
