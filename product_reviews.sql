-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2021 at 01:11 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_reviews`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `creator_name` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `avg_price` decimal(10,1) NOT NULL DEFAULT 0.0,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `creator_name`, `image_url`, `avg_price`, `date`) VALUES
(1, 'Product 1', 'John ', 'https://i.imgur.com/SXhPfiW.png', '25.0', '2021-03-07 11:59:07'),
(2, 'Product 2', 'Gordon', 'https://i.imgur.com/SXhPfiW.png', '120.0', '2021-03-07 11:59:29'),
(3, 'Product 3', 'Lex', 'https://i.imgur.com/SXhPfiW.png', '45.0', '2021-03-07 11:59:39'),
(4, 'Product 4', 'Diana', 'https://i.imgur.com/SXhPfiW.png', '88.5', '2021-03-07 12:00:02'),
(5, 'Product 5', 'Mikael ', 'https://i.imgur.com/SXhPfiW.png', '102.0', '2021-03-07 12:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `reviewer_name` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `grade` enum('1','2','3','4','5','6','7','8','9','10') NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `reviewer_name`, `text`, `grade`, `date`) VALUES
(1, 1, 'Nick ', 'Good', '9', '2021-03-07 12:00:35'),
(2, 1, 'Cristina', 'Good', '10', '2021-03-07 12:00:52'),
(3, 1, 'Cristina', 'Bad...', '5', '2021-03-07 12:01:23'),
(4, 2, 'Fabian', 'Good', '10', '2021-03-07 12:01:43'),
(5, 3, 'Hana ', 'Bad', '4', '2021-03-07 12:01:55'),
(6, 3, 'Emmie ', 'Bad', '3', '2021-03-07 12:02:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
