-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 04:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `house_vinny`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner_images`
--

CREATE TABLE `banner_images` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `item_id` int(100) NOT NULL,
  `item_text` varchar(100) NOT NULL,
  `item_text_2` varchar(100) NOT NULL,
  `item_text_3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner_images`
--

INSERT INTO `banner_images` (`id`, `image`, `item_id`, `item_text`, `item_text_2`, `item_text_3`) VALUES
(1, 'banner-style-8-img-1.jpg', 5, '', '', ''),
(2, 'banner-style-8-img-2.jpg', 12, '', '', ''),
(3, 'apple-watch-series-3.jpg', 8, 'Best Of', 'Apple', 'Watch Series'),
(4, 'peakpx.jpg', 9, 'Samsung Galaxy', 'S23 Ultra', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(12) NOT NULL,
  `item_id` int(12) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `item_id`, `quantity`) VALUES
(36, 6, 1, 2),
(37, 9, 2, 2),
(39, 9, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(50) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'Mobile Phones'),
(2, 'Laptops'),
(3, 'Sound Devices'),
(4, 'Digital Watch');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_one` varchar(500) NOT NULL,
  `image_two` varchar(500) NOT NULL,
  `price` float(10,0) NOT NULL,
  `discount_price` float(10,0) NOT NULL,
  `rating` int(1) NOT NULL,
  `description` text NOT NULL,
  `description_two` varchar(100) NOT NULL,
  `item_category_id` int(15) NOT NULL,
  `alt_text` text NOT NULL,
  `alt_text_two` text NOT NULL,
  `best_seller` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `image_one`, `image_two`, `price`, `discount_price`, `rating`, `description`, `description_two`, `item_category_id`, `alt_text`, `alt_text_two`, `best_seller`) VALUES
(1, 'Iphone 14 Pro\r\n', 'iphone 14pro2 (1).jpg', 'iphone-14-pro-model (1).jpg', 1200, 1150, 4, 'Using the Iphone 14 pro is introducing you to a new world', 'of super quality mobile device simplicity and a bunch load of functions in one device', 1, 'new arrivals product 2i', 'new arrivals product 2ii', 0),
(2, 'HP PAVILION 15', 'hp pavilion (1).jpg', 'hp pavilion 2 (1).jpg', 410, 350, 5, 'Using the HP pavilion is introducing you to a new world', 'of super quality laptops with thin foldable screens', 2, 'new arrivals product 1i', 'new arrivals product 1ii', 1),
(3, 'Apple Air Max', 'aimax 2 (1).jpg', 'airmax (1).jpg', 850, 700, 3, 'Using the Apple air max is introducing you to a new world', 'of super quality sound production', 3, 'new arrivals product 3i', 'new arrivals product 3ii', 0),
(4, 'Apple Airpods Pro', 'airpods pro (1).jpg', 'apple airpods pro (1).jpg', 450, 0, 4, 'Using the Apple air pods pro is introducing you the a new world', 'of super quality sound production', 3, 'new arrivals product 4i', 'new arrivals product 4ii', 0),
(5, 'Audio-Tecnica AHT-M50X', 'audio tecnica2.jpg', 'audio tecnica.jpg', 340, 0, 5, 'Using the Audio-Tecnica AHT-M50X is introducing you to a new world', 'of super quality sound production', 3, 'new arrivals product 5i', 'new arrivals product 5ii', 0),
(6, 'MacBook Air M1 Chip', 'macbook airr (1).jpg', 'macbook air.jpg', 950, 810, 3, 'Using the MacBook Air M1 Chip is introducing you to a new world', 'of super quality Laptops with an up to date quick and efficient OS', 2, 'new arrivals product 6i', 'new arrivals product 6ii', 0),
(7, 'Apple Watch Series 8', 'apple watch series 8 (1).jpeg', 'series 8 2.jpg', 200, 0, 2, 'Using the Apple Watch Series 8 is introducing you to a new world of super quality', 'Digital watches which is portable, an up to date quick and efficient OS.', 4, 'new arrivals product 7i', 'new arrivals product 7ii', 1),
(8, 'Apple watch Ultra', 'apple watch ultra (1).jpg', 'apple ultra 2.jpg', 750, 0, 4, 'Using the Apple watch Ultra is introducing you to a new world of super quality Digital', 'watches which is portable, an up to date quick and efficient OS', 4, 'new arrivals product 8i', 'new arrivals product 8ii', 1),
(9, 'Samsung S23 Ultra', 'samsung s23 ultra (1).jpg', 'ultra 2.jpg', 1300, 0, 5, 'Using the Samsung S23 Ultra is introducing you to a new world of super quality mobile', 'device simplicity and a bunch load of functions in one device', 1, 'new arrivals product 9i', 'new arrivals product 9ii', 1),
(10, 'Bose Quiet Comfort 35', 'bose headset (1).jpg', 'bose 2.jpg', 430, 340, 2, 'Using the Bose Quiet Comfort 35 is introducing you the a new world', 'of super quality sound production', 3, 'new arrivals product 10i', 'new arrivals product 10ii', 1),
(11, 'Tecno Camon 19', 'tecno campon 19.jpg', 'tecno camon 19 2.jpg', 545, 0, 3, 'Using the Tecno Camon 19 is introducing you to a new world of super quality', 'mobile device simplicity and a bunch load of functions in one device', 1, 'new arrivals product 11i', 'new arrivals product 11ii', 0),
(12, 'Asus zenbook DUO UX481', 'asus zenbook.jpg', 'asus zenbook 2.jpg', 970, 0, 5, 'Using the Asus zenbook DUO UX481 is introducing you to a new world', 'of super quality laptops with a great OS', 2, 'new arrivals product 12i', 'new arrivals product 12ii', 0),
(13, 'Infinix Smart 7', 'infinix.jpg', 'infinix 2.webp', 320, 0, 4, 'Using the Infinix Smart 7 is introducing you to a new world of super quality mobile', 'device simplicity and a bunch load of functions in one device.', 1, 'new arrivals product 13i', 'new arrivals product 13ii', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_no` int(100) NOT NULL,
  `quantity` int(15) NOT NULL,
  `user_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `item_title` varchar(100) NOT NULL,
  `item_image` varchar(100) NOT NULL,
  `item_price` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_no`, `quantity`, `user_id`, `item_id`, `item_title`, `item_image`, `item_price`, `order_date`) VALUES
(11, 5, 6, 2, 'HP PAVILION 15', 'hp pavilion (1).jpg', 350, '2023-08-19 21:04:43'),
(12, 1, 6, 8, 'Apple watch Ultra', 'apple watch ultra (1).jpg', 750, '2023-08-19 21:04:43'),
(13, 1, 6, 3, 'Apple Air Max', 'aimax 2 (1).jpg', 700, '2023-08-19 21:04:43'),
(14, 3, 6, 4, 'Apple Airpods Pro', 'airpods pro (1).jpg', 450, '2023-08-19 21:04:43'),
(15, 5, 6, 2, 'HP PAVILION 15', 'hp pavilion (1).jpg', 350, '2023-08-19 21:22:10'),
(16, 1, 6, 8, 'Apple watch Ultra', 'apple watch ultra (1).jpg', 750, '2023-08-19 21:22:10'),
(17, 1, 6, 3, 'Apple Air Max', 'aimax 2 (1).jpg', 700, '2023-08-19 21:22:10'),
(18, 3, 6, 4, 'Apple Airpods Pro', 'airpods pro (1).jpg', 450, '2023-08-19 21:22:10'),
(19, 3, 6, 1, 'Iphone 14 Pro\r\n', 'iphone 14pro2 (1).jpg', 1150, '2023-08-19 21:22:10'),
(20, 2, 7, 3, 'Apple Air Max', 'aimax 2 (1).jpg', 700, '2023-08-19 21:53:48'),
(21, 1, 6, 8, 'Apple watch Ultra', 'apple watch ultra (1).jpg', 750, '2023-08-19 23:12:04'),
(23, 2, 7, 4, 'Apple Airpods Pro', 'airpods pro (1).jpg', 450, '2023-08-21 01:46:18'),
(24, 2, 10, 9, 'Samsung S23 Ultra', 'samsung s23 ultra (1).jpg', 1300, '2023-08-21 02:00:18'),
(25, 1, 10, 10, 'Bose Quiet Comfort 35', 'bose headset (1).jpg', 340, '2023-08-21 02:00:18'),
(26, 1, 10, 8, 'Apple watch Ultra', 'apple watch ultra (1).jpg', 750, '2023-08-21 02:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(100) NOT NULL,
  `reviewer_name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `reviewer_rating` int(1) NOT NULL,
  `review_text` varchar(200) NOT NULL,
  `review_text_two` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `reviewer_name`, `image`, `reviewer_rating`, `review_text`, `review_text_two`) VALUES
(1, 'Vincent', 'vinnyy1.jpg', 4, 'Super amazing purchase, seamless user interface, durable product,', 'I am enjoying my device after two years. Great product!');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `staff_name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `staff_name`, `image`, `role`) VALUES
(1, 'Mr Vincent', 'vinny1.jpg', 'Web Designer'),
(2, 'Mr Vinny Onodu', 'vinnyy1.jpg', 'CEO/Founder'),
(3, 'Mr Vincent Onodu', 'vinnyyy1.png', 'Software Developer'),
(4, 'Mr Vin Onodu', 'vinnyyyy1.jpg', 'CTO');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(200) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `sign_up_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `phone_number` int(13) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email_address`, `password`, `sign_up_date`, `phone_number`, `address`) VALUES
(5, 'vin', 'vin', 'vin@aa.com', '$2y$10$HNbKUFGwGWw/4Wyv5lyx8uXRpxbSqf38QEw4CH7EI0aMeikqUvuMa', '2023-08-14 14:00:26', 123, '2a'),
(6, 'vin', 'vin', 'vin@ee.com', '$2y$10$OwOngnTsu8W33Yy3lYNrZOZU9tcj/OvKpkUg4iGJLGgkSgds.6QgO', '2023-08-14 14:04:02', 123, 'eee'),
(7, 'wends', 'dan', 'wend@yopmail.com', '$2y$10$EaFLFPyZ0CPtfdFBBfkaV.VVpzH7Lr7N3LzODP2A32mImGmTj/zPm', '2023-08-19 21:50:32', 123, '25a grace street, birmingham'),
(8, 'bizzle', 'stan', 'dd@g.com', '$2y$10$NMLLHlyxLCV7iGZAGVzKOOsU.b710dhJxndjdYz3oEPJ7OfXU5TvS', '2023-08-19 23:17:39', 123, '25a fola'),
(9, 'Vinny', 'bcu', 'vinnybcu@yopmail.com', '$2y$10$hojmDrL.KZiqWpoMAyCixOI6IDfrFKbw4Khw9GeVHqmUyzkg/PEpm', '2023-08-21 01:06:20', 12345678, '26a grace street, birmingham'),
(10, 'Vin', 'Vince', 'vin@yopmail.com', '$2y$10$rzAKUfRc5OLVS5VHdAyr..HwSsBLTth6aUx/nSh52AgdK5YccVgI6', '2023-08-21 01:53:38', 123, '25a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner_images`
--
ALTER TABLE `banner_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_category_id` (`item_category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_no`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
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
-- AUTO_INCREMENT for table `banner_images`
--
ALTER TABLE `banner_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banner_images`
--
ALTER TABLE `banner_images`
  ADD CONSTRAINT `banner_images_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`item_category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
