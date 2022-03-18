-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2022 at 12:51 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `details` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `details`) VALUES
(4, 'cat1', 'cat1\r\n'),
(5, 'cat5', 'cat5'),
(6, 'cat6', 'cat6'),
(7, 'Cat7', 'cat7'),
(8, 'category 55', 'test cat'),
(29, 'dd', 'ddddd'),
(30, 'dd', 'ddddd');

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `id` int(6) NOT NULL,
  `deposit_amount` double DEFAULT NULL,
  `timestamps` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(6) NOT NULL,
  `total_payment` double DEFAULT NULL,
  `details` varchar(200) DEFAULT NULL,
  `user_id` int(6) DEFAULT NULL,
  `timestamps` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` double NOT NULL,
  `details` varchar(40) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `details`, `category_id`, `img`) VALUES
(20, 'dfff', 33, 'ggg', 4, '1389849108.jpg'),
(22, 'product', 4000, 'bla bla', 7, '807478502.png'),
(23, 'p2', 400, 'details', 6, '419730391.png'),
(24, 'p5', 7000, 'bla bla', 7, '169876148.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` char(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `role`) VALUES
(1, 'user', '$2y$10$UPav7IG2okB.HGLkx7BtSu46IFLCSRV3E70LKexw3hpAHTlHzv3xm', '', ''),
(2, 'user2', '$2y$10$rtGKKLsjXD3TgQUgPniVlu7L8qTDl7s.QISb1IGnyg3FupoHfNtbS', '', ''),
(3, 'user3', '$2y$10$.P/tqlLMEahzvTodrXFdj.2.qF8chmZWIN6pf6L3uir0jxWL0eiye', '', ''),
(4, 'hello', '$2y$10$NwXLqPzNVGpX8LBswsgw6ucKni8a0XB8iG.s5lAAear/trIS1tLDy', '', ''),
(5, 'hello2', '$2y$10$LY1tBV6RlFmbfdeEnbQ7q.wjxz199OzVc6oerKVr8BI5i5v2Wp3Y2', '', ''),
(6, 'abdu3', '$2y$10$vZgARZCvWKv40W2qd7f9ouuWH5nMvvYJUGN2NiQwk3T6lB/n8XGF6', '', ''),
(7, 'omar', '$2y$10$I69HhKjeFMBf7ffXvydV..9oG5NDAHKfP4V6jIrUHnJ3l/ybYjl4m', '', ''),
(8, 'abdu', '$2y$10$LzKBLdq3Q0qh/h39hJcbpOHEFX0E45w5CVFqpfgdT8cc5dfW2DlSS', '', ''),
(9, 'abdu2', '$2y$10$auAbEu8lMaCxOutBjgmVeeo2.XczGJhMdm3ylEU.vwD.AM5QQYBaC', '', ''),
(10, 'abdu1', '$2y$10$PJB9GFtLT8410mEylCnLZuleTt/7MNhzfBZR6WoAZYS55r4vhu3ue', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(6) NOT NULL,
  `balance` double DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `timestamps` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_payment_fk` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `user_payment_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
