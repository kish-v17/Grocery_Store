-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2024 at 06:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
  `ID` int(11) NOT NULL,
  `Content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_page_details_tbl`
--

INSERT INTO `about_page_details_tbl` (`ID`, `Content`) VALUES
(2, '<p>about Purebite</p>');

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
  `Pincode` int(11) NOT NULL,
  `Phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address_details_tbl`
--

INSERT INTO `address_details_tbl` (`Address_Id`, `User_Id`, `Full_Name`, `Address`, `City`, `State`, `Pincode`, `Phone`) VALUES
(1, 14, 'Kishan  Vekariya', 'Priya Bunglows,5th floor', 'kotdapitha', 'Gujarat', 365421, '8900789007'),
(2, 14, 'Darshan Parmar', 'Gokuldham Society,powder gully,Goregao East', 'Mumbai', 'Maharashtra', 440003, '8200520920');

-- --------------------------------------------------------

--
-- Table structure for table `banner_details_tbl`
--

CREATE TABLE `banner_details_tbl` (
  `Banner_Id` int(11) NOT NULL,
  `Banner_Image` text NOT NULL,
  `View_Order` int(11) NOT NULL,
  `Active_Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner_details_tbl`
--

INSERT INTO `banner_details_tbl` (`Banner_Id`, `Banner_Image`, `View_Order`, `Active_Status`) VALUES
(8, '670e9ef3dbc07banner 1.png', 1, 1),
(9, '670ea91823ea4banner-1.png', -1, 1),
(10, '670ea92192b5bbanner-2.png', -2, 1),
(11, '670f5e453caf9black_friday_facebook_banner_02.jpg', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart_details_tbl`
--

CREATE TABLE `cart_details_tbl` (
  `Product_Id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_details_tbl`
--

INSERT INTO `cart_details_tbl` (`Product_Id`, `Quantity`, `User_Id`) VALUES
(6, 1, 2),
(6, 2, 3),
(7, 1, 3),
(7, 3, 8),
(7, 7, 11);

-- --------------------------------------------------------

--
-- Table structure for table `category_details_tbl`
--

CREATE TABLE `category_details_tbl` (
  `Category_Id` int(11) NOT NULL,
  `Category_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_details_tbl`
--

INSERT INTO `category_details_tbl` (`Category_Id`, `Category_Name`) VALUES
(1, 'Snacks'),
(2, 'Vegetables'),
(3, 'Fruits');

-- --------------------------------------------------------

--
-- Table structure for table `contact_page_details_tbl`
--

CREATE TABLE `contact_page_details_tbl` (
  `Contact_Email` varchar(255) DEFAULT NULL,
  `Contact_Number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `Offer_Id` int(11) NOT NULL,
  `Offer_Code` varchar(20) NOT NULL,
  `Offer_Description` text DEFAULT NULL,
  `Discount` int(11) DEFAULT NULL,
  `Max_Discount` float NOT NULL,
  `Minimum_Order` decimal(7,2) DEFAULT NULL,
  `offer_type` int(11) DEFAULT 1,
  `active_status` int(11) DEFAULT 1,
  `Start_Date` datetime DEFAULT NULL,
  `End_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offer_details_tbl`
--

INSERT INTO `offer_details_tbl` (`Offer_Id`, `Offer_Code`, `Offer_Description`, `Discount`, `Max_Discount`, `Minimum_Order`, `offer_type`, `active_status`, `Start_Date`, `End_Date`) VALUES
(2, '10DISCOUNT', '10% Discount on orders above ₹145', 10, 100, '145.00', 1, 1, '2024-11-21 21:48:06', '2024-12-30 21:48:37'),
(3, 'FIRSTORDER', 'First purchase discount', 5, 50, NULL, 2, 1, '2024-11-21 21:48:20', '2025-11-30 21:48:37'),
(4, 'FREESHIPPING', 'Free shipping offer', NULL, 0, '300.00', 3, 1, '2024-11-21 21:48:25', '2025-11-30 21:48:37'),
(7, '15DISCOUNT', '15% Discount on orders above ₹200', 15, 150, '200.00', 1, 1, '2024-12-03 21:48:28', '2025-01-30 21:48:37'),
(8, '20DISCOUNT', '20% Discount on orders above ₹300', 20, 60, '300.00', 1, 1, '2024-11-21 21:48:32', '2024-11-30 21:48:37');

-- --------------------------------------------------------

--
-- Table structure for table `order_details_tbl`
--

CREATE TABLE `order_details_tbl` (
  `Order_Id` int(11) NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Discount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details_tbl`
--

INSERT INTO `order_details_tbl` (`Order_Id`, `Product_Id`, `Quantity`, `Price`, `Discount`) VALUES
(1, 8, 10, '92.44', '11.56'),
(1, 9, 8, '120.89', '15.11');

-- --------------------------------------------------------

--
-- Table structure for table `order_header_tbl`
--

CREATE TABLE `order_header_tbl` (
  `Order_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Order_Date` datetime NOT NULL,
  `Order_Status` varchar(10) NOT NULL,
  `Del_Address_Id` int(11) NOT NULL,
  `Shipping_Charge` float NOT NULL DEFAULT 0,
  `Total` double NOT NULL DEFAULT 0,
  `Payment_Mode` varchar(50) DEFAULT 'Cash on Delivery'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_header_tbl`
--

INSERT INTO `order_header_tbl` (`Order_Id`, `User_Id`, `Order_Date`, `Order_Status`, `Del_Address_Id`, `Shipping_Charge`, `Total`, `Payment_Mode`) VALUES
(1, 14, '2024-12-09 18:29:21', 'Completed', 2, 50, 266, 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `product_details_tbl`
--

CREATE TABLE `product_details_tbl` (
  `Product_Id` int(11) NOT NULL,
  `Category_Id` int(11) NOT NULL,
  `Product_Name` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `Product_Image` varchar(255) NOT NULL,
  `Sale_Price` decimal(10,2) NOT NULL,
  `Cost_Price` decimal(10,2) NOT NULL,
  `Discount` tinyint(4) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_details_tbl`
--

INSERT INTO `product_details_tbl` (`Product_Id`, `Category_Id`, `Product_Name`, `Description`, `Product_Image`, `Sale_Price`, `Cost_Price`, `Discount`, `stock`, `is_active`) VALUES
(5, 12, 'Apple', 'Crunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCruappleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh apple', '670a3f3b9ac92_shopping.webp', '100.00', '150.00', 10, 0, 0),
(6, 1, 'Chocolate', 'Dairy milk chocolate', '670f1da018b71_chocolate2.webp', '50.00', '70.00', 15, 136, 1),
(7, 23, 'Artisanal Candles', 'These candles can come in various scents, shapes, and sizes, offering customers a unique, handcrafted feel. They’re popular for home decor, gifting, and relaxation, aligning with the growing trend of self-care and wellness products. Plus, they can be made with natural ingredients, which appeals to eco-conscious consumers.', '670a3f18f1b02shopping.webp', '120.00', '100.00', 5, 100, 0),
(8, 2, 'Ladies Fingers (Loose), 1 kg', 'Ladies Fingers is a green vegetable with a tip at the end and a lighter green head, which is inedible and to be thrown away. It tastes mild and slightly grassy. Ladies Fingers or okra is a popular vegetable that is nutritious and has a high fibre content. It contains both soluble as well as insoluble fibres and is used in various recipes.', '6718683989c3310000142_18-fresho-ladies-finger.webp', '20.00', '30.00', 48, 80, 1),
(9, 2, 'Beans - Haricot (Loose), 1 kg', 'Haricot beans are small, oval, plump and creamy-white with a mild flavour and a smooth, buttery texture.\r\nBenefits\r\n\r\nHaricot beans are great for metabolism and regulation of the sugar level of blood.\r\nThey support the adrenal regulation function and provide an excellent source of protein and fibre.', '671868766c77240089741_3-fresho-beans-haricot.webp', '20.00', '30.00', 15, 84, 1),
(10, 2, 'Brinjal - Bottle Shape (Loose), 1 kg', 'Deep purple and oval shaped bottle brinjals are glossy skinned vegetables with a white and have a soft flesh.\r\nDo not forget to check our delicious recipe - https://www.bigbasket.com/cookbook/recipes/133/baingan-bharta/\r\n', '671868aa4402510000053_19-fresho-brinjal-bottle-shape.webp', '50.00', '30.00', 15, 100, 1),
(11, 2, 'Beans - Broad (Loose), 500 g', 'Broad beans, also known as fava beans, are a versatile and nutritious legume popular in many cuisines. These beans have a firm texture and a slightly sweet, earthy flavour, making them a favourite in both fresh and dried forms. Broad beans are commonly used in Mediterranean, Middle Eastern dishes, often featured in stews, salads, and dips.', '671868e72a86410000038_21-fresho-beans-broad.webp', '20.00', '10.00', 15, 100, 1),
(12, 2, 'Carrot Strips and Beans Strip, 200 g', 'These beans and carrots have been chopped thinly into short strips for using in a variety of quick recipes. They are used in curries, soups, stir-fry with rice, noodles and salads.\r\nTry out this recipe at home - https://www.bigbasket.com/flavors/collections/222/ready-to-cook-vegetable-pack-recipes/\r\nProduct image shown is for representation purpose only, the actually product may vary based on season, produce & availability.', '671869110dad440010013_4-fresho-carrot-strips-and-beans-strip.webp', '20.00', '10.00', 15, 100, 1),
(13, 2, 'Orange 2 kg', 'Oranges are a favourite snack for many people. They can be eaten out-of-hand or used as a garnish. Besides orange juices, which are very popular worldwide, there are many other culinary uses of oranges. Oranges can be made into jams, marmalades, and preserves with the addition of sugar. ', '671869a11802eorange-1-kg-product-images-o590000449-p590034326-0-202203170713.webp', '120.00', '100.00', 10, 94, 1),
(14, 3, 'Apple Shimla 1 kg', 'Shimla Apple is a crisp, deliciously sweet or tart, and aromatic fruit which is indigenous to India. Looking for small to medium-sized culinary apples? The Shimla Apple might be just what you are after! Perfect for baking, cooking, and snacking, the Shimla Apple is not only versatile but also very tasty. ', '671869dc0fdb7apple-shimla-1-kg-product-images-o590000009-p590032630-0-202410011654.webp', '100.00', '90.00', 10, 98, 1),
(15, 3, 'Tender Coconut Cling Wrapped (1 pc) ', 'Taste the deliciously refreshing and light liquid Coconut Water, inside the coir sac of a green coconut. Coconut water inside the coir sac is white in colour with a distinct hint of sweetness to it, like fresh natural spring water.', '67186b0b0d362_download.jfif', '50.00', '80.00', 15, 96, 1),
(16, 3, 'Papaya (Each) ', 'Papaya is a fruit that has a vibrant colour, a cream-like texture, and a sweet and exquisite taste. They are also known as Papaws or Pawpaws. It has an exotic flavour that tastes like a cross between a mango and a cantaloupe with a mixture of citrus and butter.', '67186a582c7bdpapaya-each-approx-800-g-1600-g-product-images-o590001247-p590001247-0-202409041925 (1).webp', '80.00', '50.00', 10, 0, 1),
(17, 3, 'Banana MRL Pack 5 pcs (Approx. 600 g-700 g)', 'The banana may be a simple fruit, but it iss surprisingly versatile. The process of eating a banana is relatively simple. Buy it, peel it, and eat it- but there is so much more to it than that! ', '67186a83efeaabanana-mrl-pack-5-pcs-approx-600-g-700-g-product-images-o590008622-p590804206-0-202408070949.webp', '50.00', '30.00', 10, 100, 1),
(18, 1, 'Haldiram Namkeen - Moong Dal, 6x30 g Multipack', 'Haldirams Namkeen - Moong Dal', '67186aec3c6d71203930_1-haldirams-namkeen-moong-dal (1).webp', '60.00', '50.00', 10, 100, 1),
(19, 1, 'Lite Chiwda, 6x57 g Multipack', 'Namkeen - Lite Chiwda', '67186b4bb30f91203981_1-haldirams-namkeen-lite-chiwda.webp', '60.00', '50.00', 10, 100, 1),
(20, 1, 'GRB Butter Murukku, 500 g Pouch', 'Town Bus Butter Murukku offers a delightful blend of nostalgia and flavour. Crafted from authentic recipes and the freshest ingredients, it evokes memories of unforgettable journeys. Each bite is a journey through time, resonating with the essence of traditional South Indian snacks. Let the taste transport you to a bygone era, filled with warmth, nostalgia, and the rich culinary heritage.', '67186b789e95a900457130_1-grb-butter-murukku.webp', '60.00', '50.00', 10, 100, 1),
(21, 1, 'Townbus Namkeen - Kodubale, 135 g', 'Townbus Savoury Snacks are made by combining the freshest of ingredients with a traditional recipie. These authentic snacks will take you down memory lane and remind you of the traditional snacks your grandma used to make with love. Townbus namkeens are perfect to relish with your evening tea or coffee. They can also be used in chaat for added flavour or to customise it as per your liking. Townbus every bite has a story.', '67186b9b560ea40123675_5-townbus-namkeen-kodubale.webp', '60.00', '50.00', 10, 100, 1),
(22, 1, 'Chocolate', 'THIS IS CHOCOLATE', '671888f9c1fddball1.png', '150.00', '100.00', 10, 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `responses_tbl`
--

CREATE TABLE `responses_tbl` (
  `Response_Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Message` text NOT NULL,
  `Reply` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `responses_tbl`
--

INSERT INTO `responses_tbl` (`Response_Id`, `Name`, `Email`, `Phone`, `Message`, `Reply`) VALUES
(5, 'Rixit Dobaeriya', 'rixitdobariya05@gmail.com', '08732965892', 'Activate my ID', 'Ok'),
(7, 'Grace Lee', 'rixitdobariya05@gmail.com', '7890123456', 'Add some more categories', 'We will do that soon'),
(8, 'Henry Walker', 'rdobariya283@rku.ac.in', '8901234567', 'Looking forward to your reply.', NULL),
(9, 'Ivy Martin', 'rdobariya283@rku.ac.in', '9012345678', 'This is a message from Ivy.', NULL),
(10, 'Jack Turner', 'harshilhirani576@gmail.com', '0123456789', 'I have an inquiry about your services.', NULL),
(11, 'Kathy Perez', 'harshilhirani576@gmail.com', '1234567891', 'Hi, I would like to get in touch.', NULL),
(33, 'Rixit Dobaeriya', 'rdobariya00@rku.ac.in', '8732965892', 'DEMO INQUIRYYYYYY', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review_details_tbl`
--

CREATE TABLE `review_details_tbl` (
  `Review_Id` int(11) NOT NULL,
  `Reply_To` int(11) DEFAULT NULL,
  `Product_Id` int(11) DEFAULT NULL,
  `User_Id` int(11) NOT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Review` text NOT NULL,
  `Review_Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review_details_tbl`
--

INSERT INTO `review_details_tbl` (`Review_Id`, `Reply_To`, `Product_Id`, `User_Id`, `Rating`, `Review`, `Review_Date`) VALUES
(13, NULL, 6, 2, 5, 'Fantastic! Exceeded my expectations.', '2024-10-06 00:00:00'),
(14, NULL, 7, 1, 3, 'Decent product but had issues.', '2024-10-07 00:00:00'),
(15, NULL, 7, 1, 4, 'Very good overall, would buy again.', '2024-10-08 00:00:00'),
(16, NULL, 7, 2, 2, 'Did not meet my standards.', '2024-10-09 00:00:00'),
(17, NULL, 5, 1, 5, 'Best purchase I made this year!', '2024-10-10 00:00:00'),
(18, NULL, 5, 2, 4, 'Good purchase, happy with it.', '2024-10-11 00:00:00'),
(19, NULL, 6, 1, 3, 'It is okay, not great.', '2024-10-12 00:00:00'),
(20, NULL, 6, 2, 5, 'Absolutely wonderful!', '2024-10-13 00:00:00'),
(21, NULL, 7, 1, 1, 'Very disappointing product.', '2024-10-14 00:00:00'),
(22, NULL, 7, 2, 4, 'I like it, but it has minor flaws.', '2024-10-15 00:00:00'),
(23, NULL, 5, 1, 2, 'Could be better.', '2024-10-16 00:00:00'),
(24, NULL, 5, 2, 3, 'Okay product, not bad.', '2024-10-17 00:00:00'),
(25, NULL, 6, 1, 4, 'Works as described, happy with it.', '2024-10-18 00:00:00'),
(26, NULL, 6, 2, 5, 'I am very satisfied!', '2024-10-19 00:00:00'),
(27, NULL, 7, 1, 3, 'Wouldn\'t buy again.', '2024-10-20 00:00:00'),
(29, 2, NULL, 1, NULL, 'nah you liar!', '2024-10-12 19:57:14'),
(30, 8, NULL, 1, NULL, 'done', '2024-10-12 20:00:57'),
(31, 9, NULL, 1, NULL, 'haha', '2024-10-12 23:14:41'),
(32, 9, NULL, 1, NULL, 'haha', '2024-10-12 23:14:50'),
(33, 10, NULL, 1, NULL, 'ahah', '2024-10-12 23:15:48'),
(35, 13, NULL, 3, NULL, 'Thanks!', '2024-10-23 10:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_details_tbl`
--

CREATE TABLE `user_details_tbl` (
  `User_Id` int(11) NOT NULL,
  `User_Role_Id` int(11) DEFAULT 0,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `Mobile_No` varchar(20) NOT NULL,
  `Active_Status` tinyint(4) NOT NULL,
  `Profile_Picture` varchar(255) DEFAULT 'default-img.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details_tbl`
--

INSERT INTO `user_details_tbl` (`User_Id`, `User_Role_Id`, `First_Name`, `Last_Name`, `Password`, `Email`, `Mobile_No`, `Active_Status`, `Profile_Picture`) VALUES
(1, 0, 'Rixit', 'Dobariya', 'Tpxitachi', 'rixitdobariya283@rku.ac.in', '8732965892', 1, '6718859c43dec_download.png'),
(2, 0, 'Anuj', 'Jivani', 'ANUJ@111', 'janujkumar409@rku.ac.in', '8732965892', 1, 'default-img.png'),
(8, 0, 'Dobariya', 'Rixit', 'Tpxitachi', 'rixitdobariya00@gmail.com', '8732965892', 1, 'default-img.png'),
(11, 0, 'Rixit', 'Dobariya', '123123123', 'rixitdobariya05@gmail.com', '8732965892', 1, 'default-img.png'),
(13, 1, 'Harshil', 'Hirani', 'Harshil@786', 'harshilhirani576@gmail.com', '9737074939', 1, 'default-img.png'),
(14, 0, 'Kishan', 'Vekariya', 'kishan@12', 'kish.v07@gmail.com', '8732965892', 1, '671889df2cab8_ball1.png');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_details_tbl`
--

CREATE TABLE `wishlist_details_tbl` (
  `Product_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist_details_tbl`
--

INSERT INTO `wishlist_details_tbl` (`Product_Id`, `User_Id`) VALUES
(6, 1),
(6, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_page_details_tbl`
--
ALTER TABLE `about_page_details_tbl`
  ADD PRIMARY KEY (`ID`);

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
-- AUTO_INCREMENT for table `about_page_details_tbl`
--
ALTER TABLE `about_page_details_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `address_details_tbl`
--
ALTER TABLE `address_details_tbl`
  MODIFY `Address_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banner_details_tbl`
--
ALTER TABLE `banner_details_tbl`
  MODIFY `Banner_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category_details_tbl`
--
ALTER TABLE `category_details_tbl`
  MODIFY `Category_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `offer_details_tbl`
--
ALTER TABLE `offer_details_tbl`
  MODIFY `Offer_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_header_tbl`
--
ALTER TABLE `order_header_tbl`
  MODIFY `Order_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_details_tbl`
--
ALTER TABLE `product_details_tbl`
  MODIFY `Product_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `responses_tbl`
--
ALTER TABLE `responses_tbl`
  MODIFY `Response_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `review_details_tbl`
--
ALTER TABLE `review_details_tbl`
  MODIFY `Review_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user_details_tbl`
--
ALTER TABLE `user_details_tbl`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
