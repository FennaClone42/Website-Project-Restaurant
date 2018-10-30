-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2018 at 12:32 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzaplace`
--
CREATE DATABASE IF NOT EXISTS `pizzaplace` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pizzaplace`;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `Username` varchar(45) NOT NULL,
  `OrderId` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`OrderId`),
  KEY `fk_Users_has_Products_Users_idx` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Username`, `OrderId`) VALUES
('Ray', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `idOrder_Items` int(11) NOT NULL AUTO_INCREMENT,
  `Products_id` int(11) NOT NULL,
  `Orders_OrderId` int(11) NOT NULL,
  PRIMARY KEY (`idOrder_Items`),
  UNIQUE KEY `idOrder_Items_UNIQUE` (`idOrder_Items`),
  KEY `fk_Order_Items_Products1_idx` (`Products_id`),
  KEY `fk_Order_Items_Orders1_idx` (`Orders_OrderId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`idOrder_Items`, `Products_id`, `Orders_OrderId`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Price` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `Name`, `Price`) VALUES
(1, 'pepperoni', '7.00'),
(2, 'hawaii', '7.00');

-- --------------------------------------------------------

--
-- Table structure for table `product_toppings`
--

DROP TABLE IF EXISTS `product_toppings`;
CREATE TABLE IF NOT EXISTS `product_toppings` (
  `Toppings_id` int(11) NOT NULL,
  `Products_id` int(11) NOT NULL,
  PRIMARY KEY (`Toppings_id`,`Products_id`),
  KEY `fk_Toppings_has_Products_Products1_idx` (`Products_id`),
  KEY `fk_Toppings_has_Products_Toppings1_idx` (`Toppings_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_toppings`
--

INSERT INTO `product_toppings` (`Toppings_id`, `Products_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 2),
(5, 2),
(6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `toppings`
--

DROP TABLE IF EXISTS `toppings`;
CREATE TABLE IF NOT EXISTS `toppings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Price` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `toppings`
--

INSERT INTO `toppings` (`id`, `Name`, `Price`) VALUES
(1, 'Base', '3.00'),
(2, 'Tomato Sauce', '1.00'),
(3, 'Cheese', '1.00'),
(4, 'Ham', '1.00'),
(5, 'Pineapple', '1.00'),
(6, 'Pepperoni', '1.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Username` varchar(45) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Phone` int(11) DEFAULT NULL,
  `Postcode` varchar(6) NOT NULL,
  `Street_number` varchar(45) NOT NULL,
  `Street` varchar(45) NOT NULL,
  `Plaats` varchar(45) NOT NULL,
  `userrole` varchar(45) NOT NULL,
  PRIMARY KEY (`Username`),
  UNIQUE KEY `Username_UNIQUE` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Password`, `Name`, `Email`, `Phone`, `Postcode`, `Street_number`, `Street`, `Plaats`, `userrole`) VALUES
('Gray', '3', 'Priest Boiii', 'Priestboiii@tribal-bingo.com', 642864234, '3456FG', '75 drie hoog', 'Kerkstraat', 'Groningen', 'admin'),
('Ray', '1', 'Rachel Gardner', 'Rachelgardner@tribal-bingo.com', 642864783, '9408LA', '42', 'Hoofdstraat', 'Groningen', 'customer'),
('Zack', '2', 'Isaac Foster', 'Isaacfoster@tribal-bingo.com', 641396187, '2348AZ', '54', 'Straatstraat', 'Groningen', 'customer');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_Users_has_Products_Users` FOREIGN KEY (`Username`) REFERENCES `users` (`Username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_Order_Items_Orders1` FOREIGN KEY (`Orders_OrderId`) REFERENCES `orders` (`OrderId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Order_Items_Products1` FOREIGN KEY (`Products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_toppings`
--
ALTER TABLE `product_toppings`
  ADD CONSTRAINT `fk_Toppings_has_Products_Products1` FOREIGN KEY (`Products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Toppings_has_Products_Toppings1` FOREIGN KEY (`Toppings_id`) REFERENCES `toppings` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
