-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2025 at 06:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phone_shop`
--

CREATE Database IF NOT EXISTS phone_shop;
USE phone_shop;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status` enum('unread','read','replied') DEFAULT 'unread',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `customer_address` text NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` enum('pending','completed','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_method` enum('cash','bank_transfer') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT 'placeholder.png',
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category` varchar(50) DEFAULT 'Phones',
  `storage` varchar(20) DEFAULT NULL,
  `ram` varchar(20) DEFAULT NULL,
  `stock` int(11) DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `price`, `image`, `description`, `created_at`, `category`, `storage`, `ram`, `stock`) VALUES
(1, 'iPhone 15 Pro Max', 'Apple', 23000000.00, 'https://tranphumobile.com/wp-content/uploads/2024/11/iphone-15-pro-vs-iphone-15-pro-max-256gb-512gb-1tb-mau-titan-den.jpg', 'Titanium design, A17 Pro chip, 48MP Main camera.', '2025-11-21 09:09:26', 'Phones', '512GB', '8GB', 10),
(2, 'Samsung Galaxy S24 Ultra', 'Samsung', 18980000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/s/s/ss-s24-timultra-22.png', 'Galaxy AI, 200MP camera, Titanium frame.', '2025-11-21 09:09:26', 'Phones', '256GB', '12GB', 10),
(3, 'Google Pixel 8 Pro', 'Google', 18990000.00, 'https://sonpixel.vn/wp-content/uploads/2024/01/Pixel-8-pro-trang-su.png', 'Google AI, Best camera for photos.', '2025-11-21 09:09:26', 'Phones', '128GB', '12GB', 10),
(4, 'Xiaomi 14 Ultra', 'Xiaomi', 10990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/x/i/xiaomi-14-ultra.jpg', 'Leica optics, Snapdragon 8 Gen 3.', '2025-11-21 09:09:26', 'Phones', '256GB', '12GB', 10),
(5, 'AirPods Pro 2', 'Apple', 2490000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/a/i/airpods_pro_2_sep24_pdp_image_position_2__vn-vi.jpg', 'Active Noise Cancellation.', '2025-11-21 09:09:26', 'Audio', NULL, NULL, 10),
(6, 'Galaxy Watch 6', 'Samsung', 2990000.00, 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/s/m/sm-r930_002_front2_graphite_1.png', 'Health monitoring, Sleep coaching.', '2025-11-21 09:09:26', 'Audio', NULL, NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `qna`
--

CREATE TABLE `qna` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `is_admin`) VALUES
(1, 'admin', '123456', 'Quản trị viên', 0),
(2, 'quandepzai', '$2y$10$iZeB8zDFh0sicj4KbjHZKOQp0vRlvs.XLIScFmH.ReXODCFsEEHtC', NULL, 0),
(3, 'bebungbu', '$2y$10$P4lCxANyzN2d/.FC1cto/.Er6V4IeHId3pN2rlOGCo5z8QWilMNzS', NULL, 0),
(8, 'hotanddog', '$2y$10$Bkeajd4S/NiH1vq/ZILfpuUDkRelZwTrWIEuHKfNdFw.3YhcpC6cW', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qna`
--
ALTER TABLE `qna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `qna`
--
ALTER TABLE `qna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
