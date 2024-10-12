-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 12, 2024 at 09:11 AM
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
-- Table structure for table `about_page_details_tbl`
--

CREATE TABLE `about_page_details_tbl` (
  `Content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about_page_details_tbl`
--

INSERT INTO `about_page_details_tbl` (`Content`) VALUES
('<p>what</p>');

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

--
-- Dumping data for table `address_details_tbl`
--

INSERT INTO `address_details_tbl` (`Address_Id`, `User_Id`, `Full_Name`, `Address`, `City`, `State`, `Pincode`, `Phone`) VALUES
(1, 1, 'Dobariya Rixit', 'Kotdapitha\r\nBabra', 'Amreli', 'GUJARAT', 365421, '8732965892'),
(2, 1, 'Dobariya Rixit', 'Kotdapitha\r\nBabra', 'Amreli', 'GUJARAT', 365421, '8732965892'),
(3, 1, 'Dobariya Rixit', 'Kotdapitha\r\nBabra', 'Amreli', 'GUJARAT', 365421, '8732965892'),
(4, 1, 'Dobariya Rixit', 'Kotdapitha\r\nBabra', 'Amreli', 'GUJARAT', 365421, '8732965892'),
(5, 1, 'Dobariya Rixit', 'Kotdapitha\r\nBabra', 'Amreli', 'GUJARAT', 365421, '8732965892'),
(6, 1, 'Dobariya Rixit', 'Kotdapitha\r\nBabra', 'Amreli', 'GUJARAT', 365421, '8732965892'),
(7, 1, 'Dobariya Rixit', 'Kotdapitha\r\nBabra', 'Amreli', 'GUJARAT', 365421, '08732965892'),
(8, 1, 'Dobariya Rixit', 'Kotdapitha\r\nBabra', 'Amreli', 'GUJARAT', 365421, '08732965892');

-- --------------------------------------------------------

--
-- Table structure for table `banner_details_tbl`
--

CREATE TABLE `banner_details_tbl` (
  `Banner_Id` int NOT NULL,
  `Banner_Image` text NOT NULL,
  `View_Order` int NOT NULL,
  `Active_Status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `banner_details_tbl`
--

INSERT INTO `banner_details_tbl` (`Banner_Id`, `Banner_Image`, `View_Order`, `Active_Status`) VALUES
(2, '6706937a84d2fDarshan Chovatiya.pdf', 1, 1);

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
(10, 'Meat', 18),
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
-- Table structure for table `contact_page_details_tbl`
--

CREATE TABLE `contact_page_details_tbl` (
  `Contact_Email` varchar(255) DEFAULT NULL,
  `Contact_Number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_page_details_tbl`
--

INSERT INTO `contact_page_details_tbl` (`Contact_Email`, `Contact_Number`) VALUES
('purebitegroceryshop@gmail.com', '8732965892');

-- --------------------------------------------------------

--
-- Table structure for table `offer_details_tbl`
--

CREATE TABLE `offer_details_tbl` (
  `Offer_Id` int NOT NULL,
  `Offer_Description` text,
  `Discount` int DEFAULT NULL,
  `Minimum_Order` decimal(7,2) DEFAULT NULL,
  `offer_type` int DEFAULT '1',
  `active_status` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `offer_details_tbl`
--

INSERT INTO `offer_details_tbl` (`Offer_Id`, `Offer_Description`, `Discount`, `Minimum_Order`, `offer_type`, `active_status`) VALUES
(2, 'sd', 11, 101.00, 1, 1),
(3, 'sekvn', 11, NULL, 2, 1),
(4, 'ksdvksdn', NULL, 10002.00, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details_tbl`
--

CREATE TABLE `order_details_tbl` (
  `Order_Id` int NOT NULL,
  `Product_Id` int NOT NULL,
  `Quantity` int NOT NULL,
  `Price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details_tbl`
--

INSERT INTO `order_details_tbl` (`Order_Id`, `Product_Id`, `Quantity`, `Price`) VALUES
(6, 5, 1, 135.00);

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
  `Shipping_Charge` float NOT NULL DEFAULT '0',
  `Total` double NOT NULL DEFAULT '0',
  `Payment_Mode` varchar(50) COLLATE utf8mb4_general_ci DEFAULT 'Cash on Delivery'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_header_tbl`
--

INSERT INTO `order_header_tbl` (`Order_Id`, `User_Id`, `Order_Date`, `Order_Status`, `Billing_Address_Id`, `Shipping_Address_Id`, `Shipping_Charge`, `Total`, `Payment_Mode`) VALUES
(1, 1, '2004-02-10 00:00:00', 'Pending', 3, 3, 0, 0, 'Cash on Delivery'),
(2, 1, '2004-02-10 00:00:00', 'Pending', 4, 4, 0, 0, 'Cash on Delivery'),
(3, 1, '2004-02-10 00:00:00', 'Pending', 5, 5, 0, 0, 'Cash on Delivery'),
(4, 1, '2004-02-10 00:00:00', 'Pending', 6, 6, 0, 0, 'Cash on Delivery'),
(6, 1, '2112-02-11 00:00:00', 'Pending', 8, 8, 0, 0, 'Cash on Delivery');

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
  `Phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Message` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `responses_tbl`
--

INSERT INTO `responses_tbl` (`Response_Id`, `Name`, `Email`, `Phone`, `Message`) VALUES
(4, 'Dobariya Rixit', 'rdobariya283@rku.ac.in', '8723965892', 'sjkv ndsjkn');

-- --------------------------------------------------------

--
-- Table structure for table `review_details_tbl`
--

CREATE TABLE `review_details_tbl` (
  `Review_Id` int NOT NULL,
  `Reply_To` int DEFAULT NULL,
  `Product_Id` int DEFAULT NULL,
  `User_Id` int NOT NULL,
  `Rating` int DEFAULT NULL,
  `Review` text COLLATE utf8mb4_general_ci NOT NULL,
  `Review_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review_details_tbl`
--

INSERT INTO `review_details_tbl` (`Review_Id`, `Reply_To`, `Product_Id`, `User_Id`, `Rating`, `Review`, `Review_Date`) VALUES
(2, NULL, 5, 1, 5, 'svsvd', '2024-10-10 11:30:05'),
(7, 2, NULL, 1, NULL, 'lol\r\n', '2024-10-12 12:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_details_tbl`
--

CREATE TABLE `user_details_tbl` (
  `User_Id` int NOT NULL,
  `User_Role_Id` int DEFAULT '0',
  `First_Name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Last_Name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(320) COLLATE utf8mb4_general_ci NOT NULL,
  `Mobile_No` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Active_Status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details_tbl`
--

INSERT INTO `user_details_tbl` (`User_Id`, `User_Role_Id`, `First_Name`, `Last_Name`, `Password`, `Email`, `Mobile_No`, `Active_Status`) VALUES
(1, 0, 'Rixit', 'Dobariya', '12345678', 'rdobariya283@rku.ac.in', '8732965891', 1),
(2, 0, 'Rixit', 'Dobaeriya', 'ANUJ@111', 'janujkumar409@rku.ac.in', '8732965892', 0);

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
-- Indexes for table `banner_details_tbl`
--
ALTER TABLE `banner_details_tbl`
  ADD PRIMARY KEY (`Banner_Id`);

--
-- Indexes for table `cart_details_tbl`
--
ALTER TABLE `cart_details_tbl`
  ADD PRIMARY KEY (`Product_Id`,`User_Id`);

--
-- Indexes for table `category_details_tbl`
--
ALTER TABLE `category_details_tbl`
  ADD PRIMARY KEY (`Category_Id`);

--
-- Indexes for table `offer_details_tbl`
--
ALTER TABLE `offer_details_tbl`
  ADD PRIMARY KEY (`Offer_Id`);

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
  ADD PRIMARY KEY (`Review_Id`);

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
  MODIFY `Address_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `banner_details_tbl`
--
ALTER TABLE `banner_details_tbl`
  MODIFY `Banner_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category_details_tbl`
--
ALTER TABLE `category_details_tbl`
  MODIFY `Category_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `offer_details_tbl`
--
ALTER TABLE `offer_details_tbl`
  MODIFY `Offer_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_header_tbl`
--
ALTER TABLE `order_header_tbl`
  MODIFY `Order_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_details_tbl`
--
ALTER TABLE `product_details_tbl`
  MODIFY `Product_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `responses_tbl`
--
ALTER TABLE `responses_tbl`
  MODIFY `Response_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `review_details_tbl`
--
ALTER TABLE `review_details_tbl`
  MODIFY `Review_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_details_tbl`
--
ALTER TABLE `user_details_tbl`
  MODIFY `User_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
