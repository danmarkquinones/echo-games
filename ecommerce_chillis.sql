-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2018 at 09:08 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_chillis`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Category 1'),
(2, 'Category 2'),
(3, 'Category 3');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `description`, `image`, `category_id`) VALUES
(19, 'Nintendo Switch', '18999.00', 'Nintendo Switch', 'hardware-switch.jpg', 1),
(20, 'Nintendo 3DS', '11999.99', 'Nintendo 3DS', 'hardware-3ds.jpg', 2),
(21, 'Nintendo 2DS', '8999.99', 'Nintendo 2DS', 'hardware-2ds.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_code` varchar(255) NOT NULL,
  `purchase_date` datetime NOT NULL,
  `total` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `payment_mode_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

CREATE TABLE `orders_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_modes`
--

CREATE TABLE `payment_modes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_modes`
--

INSERT INTO `payment_modes` (`id`, `name`) VALUES
(1, 'COD'),
(2, 'PayPal');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'pending'),
(2, 'completed'),
(3, 'cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `home_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `home_address`) VALUES
(1, 'sagfasgsag', '$2y$10$HL778fPv5Et61S1YWreUBOyIMj9KG2WGaKz2uGZcbNnKkqoGB9C5S', 'asgasgfa@', 'safas', 'sagsag', ''),
(2, 'afsdfhjasf', '$2y$10$KiqFwtInRla.s6aLKEzQB.BRf0IyVqjRZYQ92qpOln/uUlULlPRxC', 'asgasg@gmail.com', 'sagfasgsag', 'asgsag', ''),
(5, 'asasfsasgas', '$2y$10$dhNRf84SnPs3jG.k/MRnJegK6BwXher3JF245gXe2w5EKvB8syA1u', 'midorenji@gmail.com', 'ashgf', 'asgas', 'sagasg'),
(7, 'midorenji0907', '$2y$10$DnShjTroJagiIBnnpuwDwud6U67hunNxV2tYTt9DxBqa3DPAHEZim', 'midorenji0907@gmail.com', 'Danmark', 'Quinones', 'PLANET EARTH'),
(8, 'midorenji', '$2y$10$RDbowLfE0FwJSren2VFqTOQRnoKISLXPAGpMu0tp9YgaY4zQNIqt.', 'asgsag@gmail.com', 'asgas', 'sagsag', 'asgasgs'),
(9, 'sdiughusidhni', '$2y$10$ZWRGT506q1LJDoa23iNGnev0xXcvGi3wvWz.5lrK5977MUo8.ji/S', 'sdgsdgds@arj', 'dfyudfy', 'dfyd', 'dydydy'),
(10, 'midorenji090715', '$2y$10$yRmMU2l2HFvhpM4q91Exo.qPEbZNUuy0Zy1yZmTOmo3DutHDZy13O', 'danmarkquinones@gmail.com', 'Danmark', 'Quinones', 'L. 9 Blk. 2343 Southstar Drug, Mercury , Pawnshop '),
(17, 'Danmark123', '$2y$10$7j7JXvf4RQSI/ZVrb/YxJOd68FtFm3upvnwFW5IKCpHHNdH.awzdK', 'danmarkquinjhasgfones@gmail.com', 'Danmarksdg', 'Quinonesdfh', 'hugskfgaksgf'),
(18, 'Danmark123sdhsad', '$2y$10$5OgD.FJ1AZMu1Tb3QHacOu6v1tlwaFmnuzEn2grxOn8PvlT3l2vQC', 'danmarkquinjhasgfosdhsahnes@gmail.com', 'Danmarksdgjsafjk', 'Quinonesdfhasg', 'hugskfgaksgfsahas'),
(19, 'sagsaw3123', '$2y$10$iyU0dUS9XDAT5P5s74dIauptyJD/1N/0YtwwzujE8z8.Hfsj20T7C', 'sgasaasd@jhfvastg', 'safasg', 'asgsag', 'asgasgas'),
(20, 'sagsaw31234', '$2y$10$n2c5miCPwxJFIYzwkObIseb2HWFmM9olHMr8d9XM.zpZxEHFE1ozy', 'sgasaasd@jhfvastg4', 'safasga', 'asgsag', 'asgasgas6a'),
(21, 'ilogpasig123', '$2y$10$7Uf9krPve1g15SccysG/U.ZGpOoKfkGQkelrgq19MbaTmveizF/i2', 'ilogpasig@fgmil.com', 'pogiako', 'sobrangpogiko', 'ilog pasig'),
(22, 'adhhwexc', '$2y$10$MHo/m8864PehmeU688qe4uhdaYgTHYU2XdD4XJ/I8fkUKGDJNAaaS', 'asgasg@gmail.comaasg', 'asgsah', 'ashashas', 'sdhshahadhda'),
(23, 'asashaha', '$2y$10$Ho.a/KiMk8L1F7aUtP3sA.8B3hYGFDaKoPBaHqKba/CT3HuXMFkvG', 'ashgashsd@hjgsafa', 'qwtgsagas', 'gasgas', 'sahahas'),
(24, 'jkfasfsafjg', '$2y$10$qRuZqm0P1mV3nJpJ1PCJhuAbbLZ/b.JF0X8A4Iw8GKTr.Z/ySPCk.', 'kahfjashfklhsa@fkajsa', 'gsadgsahg', 'hgasfgaskg', 'kjasgfsaflash'),
(26, 'midorenji344', '$2y$10$KJm8FGgwuE9U/nZFNhTgE.c9pevevNbeAk/AwOsA1y.JsJO1gYq82', 'asgsag@gmail.com353', 'qwtwqt34', 'qwtqwt', 'qwtwqtqw'),
(27, 'danmark090715', '$2y$10$SPsolGJcJX0V95jq024QuO6XVp7lEFaj0NRrPojI0CF6yJ45lx/6i', 'danmark@yahoo.com', 'danmark', 'pogi', 'sa bahay'),
(28, 'danmark1', '$2y$10$ohARBnkBZnlBEzUuu.x/Ie2UbHzJLsjjTTJ3T5SlIFncCASW3CSgm', 'danmark1@gm', 'asf', 'sagasgas', 'sagasgasg'),
(29, 'danmark1234', '$2y$10$C0RRycoZd3q1gdo9GxPa1u.YX6eD4hZSusC5AwrjQKBfITyoka/6q', 'danmark1234@gm', 'agsasg', 'asgsaga', 'asgsagsag');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQUE` (`name`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD UNIQUE KEY `transaction_code` (`transaction_code`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `payment_mode_id` (`payment_mode_id`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `payment_modes`
--
ALTER TABLE `payment_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment_modes`
--
ALTER TABLE `payment_modes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`payment_mode_id`) REFERENCES `payment_modes` (`id`);

--
-- Constraints for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD CONSTRAINT `orders_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
