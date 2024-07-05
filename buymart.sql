-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 02:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buymart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`) VALUES
(1, 'Tharindu', 'tharindu@gmail.com', '1234'),
(2, 'Jane Smith', 'janesmith@example.com', 'password2'),
(3, 'Michael Johnson', 'michaeljohnson@example.com', 'password3'),
(5, 'ss', 'ss@gmail.com', '$2y$10$CbEoJfaVET3nPY21YLgAk.45cbP.4OOLxbMlSmjqDK2DS2wfilKt2'),
(6, 'admin', 'admin@gmail.com', '$2y$10$k10EaWMzSf/F.J7ZWAk/quZ7H0LImU4YgVWHD4UFEQGGMMDX4Du6W');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `cont_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`cont_id`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(10, 'fdsd', 'tharindu@gmail.com', '0712827607', 'ff', 'sdddddddddddddddddddd'),
(14, 'sand', 'tharindu@gmail.com', '0712827607', 'dfgdgdgdgdgfd', 'sdfhuisdvhuiuvhsfhuhfsduihcsjidcnluilfwhfuaisduaiscjdiocjsdvuhcsuovdvhuivhuvhduivhdovhfdvdshvsyefvgayivgwo8rgdyfgaw6ftsdfyf'),
(15, 'thariii', 'tt@gmail.com', '0712827607', 'rr', 'ewdhdwlhfbarycbaustr7icavsdgcawviaccdcsdcsdfhsflhsfjshdaiufhiufhgrygfycgsducgasgdsuyagcugayusdgcustsgyuvgsqvgtigvfygvaivguysgcduygcuysgdcysgvysvysgfvuyfgvuyfvf');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_Id` int(12) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_Id`, `userName`, `email`, `first_name`, `last_name`, `phone_number`, `password`, `image`) VALUES
(2, 'dushantha', 'diwyanjalee@gmail.com', 'Viharakkkkkkkkkk', 'Diwyanjalee', 774406031, '$2y$10$l8djMOLCEw0u4ufANz2OS.XRS/bl8tNPJnZmwMA3N11gRkIH0DkJC', ''),
(3, 'it22577610', 'vihara.diwyanjalee@gmail.com', 'vihara', 'diwyanjalee', 774406031, '$2y$10$TfX040qVKpK.Yk3zojNcZeI6gI6ZsBHh3KUqv7CaDW1OOdTCCT0EO', ''),
(5, 'newacc', 'new@gmail.com', 'new', 'acchhhhhh', 710949409, '$2y$10$0F.PAcvbCy6RGafs/bj8TODy9WaxAc2rt1c8Zi1p/aEmG2XHgg.PG', ''),
(6, 'sandthari', 'tharisand@gmail.com', 'sand3', 'thari', 714563258, '$2y$10$59sMxpCeybOXKWhWsmT/V.4XynnKa2allrh3AKwR18N70vZmLC1MK', ''),
(7, 'amal', 'amal@gmail.com', 'amal', 'p', 712827607, '$2y$10$UTi8BfV7j.48MmvhbGpFpOWjmcpuozT6TWCCq4s6TqvlLP6/QtCy.', ''),
(8, 'bb', 'bb@gmail.com', 'new', 'acc', 710949409, '$2y$10$FlFgGVECj2WYVihK4gDst.2YbO5hu5xCq./xVuWBcb7ivWpGpxvIu', ''),
(9, 'cc', 'cc@gmail.com', 'new', 'acc', 710949409, '$2y$10$XoGCQhAiTi7ibSJiUaX.6OQ2CrfU87w2XN0rAnRPJTEbMyyQ.v8n2', ''),
(10, 'adminaddedcus', 'cus@gmail.com', 'cusad', 'ss', 712827607, '$2y$10$govUEV8w5MOZUqILhJ.YQO1yBASwHqEGBs0pp9oleaIn8E1oJcxx2', ''),
(11, 'adminaddedcus', 'cus@gmail.com', 'cusad', 'ss', 712827607, '$2y$10$kxvhXZe3uAL0PHUdAX1GwOfNdv7KnnoaBfvVXsllZE1R.vDbxmsNi', '');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `seller_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `name`, `description`, `category`, `price`, `photo`, `seller_id`) VALUES
(26, 'macbook', 'apple', 'Trending', '2222', 's-l300 (3).jpeg', NULL),
(75, 'iphone 13', 'gold', 'Trending', '999', 's-l225.png', 6),
(76, 'smart watch', 'water proof', 'Trending', '34', 'sffsf.png', 6),
(77, 'smart watch ', 'white', 'Trending', '55', 'dsfsd.png', 6),
(78, 'Huawei', '4g', 'Trending', '456', 's-l22d5.png', 6),
(79, 'airpods', 'fake', 'Trending', '23', 's-l225desd.png', 6),
(80, 'Data cable', 'red', 'Trending', '34', 'asfsaefe.png', 6),
(81, 'Google pixel', 'gg', 'Trending', '44', 's-l225dd.png', 6),
(82, 'Data', 'cable', 'Electronics', '34', 'asfsaefe.png', 6),
(83, 'Watch', 'water proof', 'Electronics', '33', 'dsfsd.png', 6),
(84, 'Smart watch', 'black', 'Electronics', '33', 'sffsf.png', 6),
(85, 'Huawei', 'y6', 'Electronics', '678', 's-l22d5.png', 6),
(86, 'google pixel', '3', 'Electronics', '333', 's-l225dd.png', 6),
(87, 'samsung', '23', 'Electronics', '234', 's-l225fa.png', 6),
(88, 'airpods', 'new', 'Electronics', '334', 's-l225desd.png', 6),
(89, 'Watch', 'new', 'Fashion', '334', 'fsg.png', 6),
(90, 'Glass', 'new', 'Fashion', '65', 'gsgvs.png', 6),
(91, 'Shoe', 'bb', 'Fashion', '456', 'sggvsg.png', 6),
(92, 'Frock ', 'new', 'Fashion', '345', 's-l225k.png', 6),
(93, 'Bag', 'fsf', 'Fashion', '324', 'fsef.png', 6),
(94, 'Skin care', 'good', 'Health and Beauty', '23', 'grg.png', 6),
(95, 'Makeup', 'dd', 'Health and Beauty', '33', 'ggsg.png', 6),
(96, 'Supliment', 'Natural & Alternative Remedies', 'Health and Beauty', '23', 'gsg.png', 6),
(97, 'Gym ', 'dd', 'Sports', '234', 'sgg.png', 6),
(98, 'Sport sheat', 'ff', 'Sports', '3242', 'sgfs.png', 6),
(99, 'Shoe', 'sporty', 'Sports', '324', 'sggvsg.png', 6);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_number` varchar(10) DEFAULT NULL,
  `address_line1` varchar(50) DEFAULT NULL,
  `street_name` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `postal_code` varchar(5) DEFAULT NULL,
  `card_number` varchar(19) DEFAULT NULL,
  `cardholder_name` varchar(50) DEFAULT NULL,
  `expiration` varchar(5) DEFAULT NULL,
  `cvv` varchar(3) DEFAULT NULL,
  `date_ordered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `item_id`, `country`, `name`, `email`, `phone_number`, `address_line1`, `street_name`, `city`, `province`, `postal_code`, `card_number`, `cardholder_name`, `expiration`, `cvv`, `date_ordered`) VALUES
(2, 26, 'United States', 'fdsd', 'tharindu@gmail.com', '0712827607', 'ingiriya', 'isurupura', 'horana', 'west', '12345', '2516 1165 4561 6555', 'thari', '02/15', '456', '2023-06-10 17:44:16'),
(3, 26, 'Japan', 'gg', 'tharindugg@gmail.com', '0712827666', 'ingiriya', 'isurtura', 'htna', 'wtst', '12645', '2516 1166 4561 6555', 'thari', '02/15', '456', '2023-06-10 18:25:00'),
(5, 26, 'Australia', 'amal', 'kats.005.online@gmail.com', '0712827607', 'horana', 'ingiriya', 'colombo', 'south', '64546', '5646 5231 6846 5455', 'amal', '02/05', '526', '2023-06-11 11:13:01'),
(8, 26, 'China', 'amal', 'kats.005.online@gmail.com', '0712827607', 'ttrge', 'rerer', 'colombo', 'south', '64546', '6456 4654 6546 5456', 'thar', '02/02', '222', '2023-06-11 11:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `qna`
--

CREATE TABLE `qna` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qna`
--

INSERT INTO `qna` (`id`, `question`, `answer`) VALUES
(1, 'What payment methods do you accept?', 'We accept credit cards (Visa, MasterCard, and Amherican Express) and PayPal.'),
(2, 'How long does shipping take?', 'Shipping usually takes 3-5 business days within the United States.'),
(4, 'Do you offer international shipping?esgs', 'Yes, we offer international shipping to most countries. Shipping costs may vary.');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(11) NOT NULL,
  `bus_name` varchar(50) NOT NULL,
  `bus_email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `location` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_id`, `bus_name`, `bus_email`, `username`, `password`, `location`) VALUES
(1, 'vihara', 'vihara.diwyanjalee@gmail.com', 'it22577610', '$2y$10$Kf.o3WGFSu0BLqS9lfphauY', 'Sri Lanka'),
(2, 'Tharindu sandea', 'katharindusandeepa@gmai.com', 'tharindu', '$2y$10$355axr9RL1S0JTX6nFtviuYJAhw.t9jIv3UaO/fVhgPlPBqE0zExm', 'Sri Lanka'),
(3, 'new', 'new@gmail.com', 'new', '$2y$10$uEde.bao4wdHNyndupDkTen6EeLEs3iVNacuIN3tqrs6uEJ1RSTb6', 'Sri Lanka'),
(4, 'abc', 'abc@gmail.com', 'abc', '$2y$10$8C4eiLCoh4RTxKf1ZaRcsO3Cv1uPbfCKPu6o1ru046QR5Tk7nQaxK', 'Sri Lanka'),
(6, 'abcde', 'abcde@gmail.com', 'abcde', '$2y$10$Phl/Vj60xNk1AhFxDgNI4exqTGiULslICKVYmZKnuRUDkGHJ8qQBq', 'Sri Lanka'),
(7, 'kamal', 'kamal@gmail.com', 'kamal', '$2y$10$fPVIYLVsnRTU75tDa40Ak.MjEtUcfCqjM50VNS7X0qi4QsaFlgvLC', 'Sri Lanka'),
(8, 'sandeepa', 'tharindu@gmail.com', 'tharindu@gmail.com', '$2y$10$LkDRz7BWE4/MofrrUo9Df.AS7wfFXytfhFennBhZu9t8kk7gXXVEe', 'dd'),
(9, 'sandeepa', 'tharindu@gmail.com', 'tharindu@gmail.com', '$2y$10$wXiB26uwN7yj3vEUh6zyT.iEDjOxjrRrFOj/hmJy.ssxYU5rtTuF6', 'dd'),
(10, 'tharindu1', 'tt@gmail.com', ' dsf', '$2y$10$bJUpxzQw4hYKiWZL8POIvO9F6UEi8i823FjcAs87tqxr1A4TNDTVS', 'dddd');

-- --------------------------------------------------------

--
-- Table structure for table `supteam`
--

CREATE TABLE `supteam` (
  `s_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supteam`
--

INSERT INTO `supteam` (`s_id`, `username`, `password`) VALUES
(1, 'thari', '$2y$10$xmYfLu3oBzaTFeOKLtrtwec8rti6i81T31.s7a5/iH9TIkzaNjEza'),
(4, 'sup2', '$2y$10$9cpDst5OLzbsyJHUgbDb7.AZERTGcshe0yIsyUqw5P8HVoBmu8LXu'),
(5, 'bimal', '$2y$10$h3UIZfPJd2OvhpUg.Ri5oeUWdx/AMwORHuLh3Ts4YrgcggWq9KyDG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`cont_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_Id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `fk_seller_id` (`seller_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `qna`
--
ALTER TABLE `qna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `supteam`
--
ALTER TABLE `supteam`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `cont_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user_Id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `qna`
--
ALTER TABLE `qna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supteam`
--
ALTER TABLE `supteam`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
