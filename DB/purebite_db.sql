-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2024 at 06:12 AM
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
  `ID` int NOT NULL,
  `Content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `about_page_details_tbl`
--

INSERT INTO `about_page_details_tbl` (`ID`, `Content`) VALUES
(2, '<h2 class=\"my-4\">About PureBite</h2>\r\n            <p class=\"lead\">Welcome to PureBite, your trusted neighborhood grocery store where quality meets\r\n                convenience. Born out of a passion for fresh, wholesome food, PureBite was founded with a simple\r\n                mission: to provide our community with the finest groceries, sourced responsibly and delivered\r\n                with care. From the beginning, we’ve been committed to creating a shopping experience that not\r\n                only meets your needs but also enhances your lifestyle.</p>\r\n\r\n            <h3 class=\"mt-5\">What We Offer</h3>\r\n            <p>At PureBite, we believe in the power of choice. That\'s why our shelves are stocked with a diverse\r\n                range of products, from locally sourced organic produce to global culinary delights. Whether\r\n                you\'re shopping for everyday essentials or looking to discover something new, our curated\r\n                selection of groceries ensures you’ll find exactly what you need.</p>\r\n\r\n            <ul>\r\n                <li><strong>Fresh Produce:</strong> Hand-picked fruits and vegetables delivered daily to ensure\r\n                    the highest quality.</li>\r\n                <li><strong>Organic & Natural:</strong> A wide variety of organic, non-GMO, and health-conscious\r\n                    options.</li>\r\n                <li><strong>Specialty Items:</strong> International foods, artisanal products, and gourmet\r\n                    ingredients for your culinary adventures.</li>\r\n                <li><strong>Pantry Staples:</strong> A reliable selection of the essentials you need every day.\r\n                </li>\r\n                <li><strong>Sustainable Choices:</strong> Eco-friendly products that support a greener planet.\r\n                </li>\r\n            </ul>\r\n\r\n            <h3 class=\"mt-5\">Our Commitment</h3>\r\n            <p>At PureBite, we’re more than just a grocery store. We’re a part of the community. Our commitment\r\n                extends beyond providing great products; we aim to create a positive impact on our environment\r\n                and the people around us. From reducing waste with sustainable practices to supporting local\r\n                farmers and producers, we strive to make a difference with every bite.</p>\r\n\r\n            <h3 class=\"mt-5\">Why Choose Us?</h3>\r\n            <p>Shopping at PureBite means more than just filling your pantry. It’s about making informed,\r\n                mindful choices that contribute to a healthier lifestyle and a sustainable future. Our\r\n                knowledgeable and friendly staff are always here to help you find the best products for your\r\n                needs, whether you’re looking for specific dietary options or just need a recommendation for\r\n                dinner tonight.</p>\r\n\r\n            <h3 class=\"mt-5\">Join the PureBite Family</h3>\r\n            <p>We’re proud to serve our community, and we invite you to join the PureBite family. Whether you\r\n                visit us in-store or shop online, you’ll experience the same dedication to quality and service\r\n                that has made us a trusted name in groceries. Come and discover why PureBite is more than just a\r\n                grocery store – it’s where you can feel good about what you eat and how you shop.</p>');

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
(8, 1, 'Dobariya Rixit', 'Kotdapitha\r\nBabra', 'Amreli', 'GUJARAT', 365421, '08732965892'),
(9, 1, 'Dobariya Rixit', 'Kotdapitha\r\nBabra', 'Amreli', 'GUJARAT', 365421, '8732965892'),
(10, 1, 'Dobariya Rixit', 'Kotdapitha\r\nBabra', 'Amreli', 'GUJARAT', 365421, '8732965892'),
(11, 1, 'Dobariya Rixit', 'Kotdapitha\r\nBabra', 'Amreli', 'GUJARAT', 365421, '8732965892'),
(12, 1, 'Dobariya Rixit', 'Kotdapitha\r\nBabra', 'Amreli', 'GUJARAT', 365421, '8732965892');

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
(8, '670e9ef3dbc07banner 1.png', 1, 1),
(9, '670ea91823ea4banner-1.png', -1, 1),
(10, '670ea92192b5bbanner-2.png', -2, 1),
(11, '670f5e453caf9black_friday_facebook_banner_02.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart_details_tbl`
--

CREATE TABLE `cart_details_tbl` (
  `Product_Id` int NOT NULL,
  `Quantity` int NOT NULL,
  `User_Id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_details_tbl`
--

INSERT INTO `cart_details_tbl` (`Product_Id`, `Quantity`, `User_Id`) VALUES
(6, 1, 3),
(7, 10, 1),
(7, 1, 3),
(7, 2, 11);

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
(26, 'Health and Wellness', NULL),
(27, 'Meat', NULL);

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
(2, 's', 11, 101.00, 1, 1),
(3, 'sekvn', 12, NULL, 2, 0),
(4, 'ksdvksdn', NULL, 10002.00, 3, 1),
(7, 'p', 1, 1.00, 1, 1);

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
(8, 5, 10, 90.00),
(10, 6, 10, 114.00),
(10, 5, 32, 90.00),
(7, 7, 10, 114.00),
(7, 6, 5, 153.00);

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
(7, 1, '2004-02-10 00:00:00', 'Delivered', 9, 9, 0, 1905, 'Cash on Delivery'),
(8, 1, '2003-02-10 00:00:00', 'Pending', 10, 10, 0, 900, 'Cash on Delivery'),
(10, 1, '2004-02-10 00:00:00', 'Pending', 12, 12, 50, 4070, 'Cash on Delivery');

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
(5, 12, 'Apple', 'Crunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh appleCruappleCrunchy and fresh appleCrunchy and fresh appleCrunchy and fresh apple', '670a3f3b9ac92_shopping.webp', 100.00, 150.00, 10, 0, 0),
(6, 22, 'Chocolate 3', 'Chocolate is adsvjn', '670f1da018b71_chocolate2.webp', 180.00, 170.00, 15, 140, 1),
(7, 23, 'Artisanal Candles', 'These candles can come in various scents, shapes, and sizes, offering customers a unique, handcrafted feel. They’re popular for home decor, gifting, and relaxation, aligning with the growing trend of self-care and wellness products. Plus, they can be made with natural ingredients, which appeals to eco-conscious consumers.', '670a3f18f1b02shopping.webp', 120.00, 100.00, 5, 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `responses_tbl`
--

CREATE TABLE `responses_tbl` (
  `Response_Id` int NOT NULL,
  `Name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(320) COLLATE utf8mb4_general_ci NOT NULL,
  `Phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Message` text COLLATE utf8mb4_general_ci NOT NULL,
  `Reply` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `responses_tbl`
--

INSERT INTO `responses_tbl` (`Response_Id`, `Name`, `Email`, `Phone`, `Message`, `Reply`) VALUES
(5, 'Rixit Dobaeriya', 'rixitdobariya05@gmail.com', '08732965892', 'jk vvns', 'HUh'),
(7, 'Grace Lee', 'grace.lee@example.com', '7890123456', 'This is Grace, and I need assistance.', 'HuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuhHuh'),
(8, 'Henry Walker', 'henry.walker@example.com', '8901234567', 'Looking forward to your reply.', NULL),
(9, 'Ivy Martin', 'ivy.martin@example.com', '9012345678', 'This is a message from Ivy.', NULL),
(10, 'Jack Turner', 'jack.turner@example.com', '0123456789', 'I have an inquiry about your services.', NULL),
(11, 'Kathy Perez', 'kathy.perez@example.com', '1234567891', 'Hi, I would like to get in touch.', NULL),
(12, 'Leo Scott', 'leo.scott@example.com', '2345678902', 'Could you send me more information?', NULL),
(13, 'Mona Green', 'mona.green@example.com', '3456789013', 'This is a test message.', NULL),
(14, 'Nina Rodriguez', 'nina.rodriguez@example.com', '4567890124', 'Hello, I have some questions.', NULL),
(15, 'Oliver White', 'oliver.white@example.com', '5678901235', 'I would appreciate your help.', NULL),
(16, 'Paula Harris', 'paula.harris@example.com', '6789012346', 'Looking for more details about the service.', NULL),
(17, 'Quinn Clark', 'quinn.clark@example.com', '7890123457', 'This is a follow-up message.', NULL),
(18, 'Rita Lewis', 'rita.lewis@example.com', '8901234568', 'Please contact me regarding my inquiry.', NULL),
(19, 'Steve Hall', 'steve.hall@example.com', '9012345679', 'I need further clarification on this matter.', NULL),
(20, 'Tina Allen', 'tina.allen@example.com', '0123456780', 'This is Tina, looking forward to your response.', NULL),
(21, 'Eva Adams', 'eva.adams@example.com', '5678901234', 'Hi, I am interested in your product.', NULL),
(22, 'David Wilson', 'david.wilson@example.com', '4567890123', 'This is David, and I have a question.', NULL),
(23, 'Charlie Brown', 'charlie.brown@example.com', '3456789012', 'I would like to know more about your services.', NULL),
(24, 'Bob Smith', 'bob.smith@example.com', '2345678901', 'Hello, this is Bob.', NULL),
(25, 'Alice Johnson', 'alice.johnson@example.com', '1234567890', 'This is a test message from Alice.', NULL),
(26, 'Frank Thompson', 'frank.thompson@example.com', '6789012345', 'Could you provide more details?', NULL),
(27, '', '', '', '', NULL),
(28, '', '', '', '', NULL),
(29, 'Dobariya Rixit', 'rdobariya@rku.ac.in', '8732965892', 'djnsdj', NULL),
(30, 'Dobariya Rixit', 'rdobariya@rku.ac.in', '8732965892', 'ksdvkl', NULL),
(31, 'Rixit Dobaeriya', 'rdobariya@rku.ac.in', '8732965892', 'sdklvn', NULL),
(32, 'Dobariya Rixit', 'rdobariya@rku.ac.in', '8732965892', 'kdvksdn', NULL);

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
(33, 10, NULL, 1, NULL, 'ahah', '2024-10-12 23:15:48');

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
  `Active_Status` tinyint NOT NULL,
  `Profile_Picture` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'default-img.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details_tbl`
--

INSERT INTO `user_details_tbl` (`User_Id`, `User_Role_Id`, `First_Name`, `Last_Name`, `Password`, `Email`, `Mobile_No`, `Active_Status`, `Profile_Picture`) VALUES
(1, 0, 'Rixi', 'Dobariya', 'Tpxitachi', 'rixitdobariya@rku.ac.in', '8732965891', 1, '6713a953ddd56_journalism.jpg'),
(2, 0, 'Rixit', 'Dobaeriya', 'ANUJ@111', 'janujkumar409@rku.ac.in', '8732965892', 0, 'default-img.png'),
(3, 0, 'Itachi', 'Uchiha', 'ANUJ@111', 'itachi.uchiha@gmail.com', '9999999999', 1, 'default-img.png'),
(8, 0, 'Dobariya', 'Rixit', 'Tpxitachi', 'rixitdobariya00@gmail.com', '8732965892', 1, 'default-img.png'),
(11, 1, 'Dobariya', 'Rixit', 'Tpxitachi05', 'rixitdobariya05@gmail.com', '8732965892', 1, 'default-img.png'),
(12, 0, 'Rixit', 'Dobaeriya', 'ANUJ@111', 'janujkumar409@rku.ac.in', '8732965892', 1, '6713b0e5dbf88_default-img.png');

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
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `address_details_tbl`
--
ALTER TABLE `address_details_tbl`
  MODIFY `Address_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `banner_details_tbl`
--
ALTER TABLE `banner_details_tbl`
  MODIFY `Banner_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category_details_tbl`
--
ALTER TABLE `category_details_tbl`
  MODIFY `Category_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `offer_details_tbl`
--
ALTER TABLE `offer_details_tbl`
  MODIFY `Offer_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_header_tbl`
--
ALTER TABLE `order_header_tbl`
  MODIFY `Order_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_details_tbl`
--
ALTER TABLE `product_details_tbl`
  MODIFY `Product_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `responses_tbl`
--
ALTER TABLE `responses_tbl`
  MODIFY `Response_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `review_details_tbl`
--
ALTER TABLE `review_details_tbl`
  MODIFY `Review_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_details_tbl`
--
ALTER TABLE `user_details_tbl`
  MODIFY `User_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
