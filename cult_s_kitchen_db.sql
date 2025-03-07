-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2024 at 08:55 AM
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
-- Database: `cult's_kitchen_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `recipe_id`, `user_id`, `comment`, `created_at`) VALUES
(1, 13, 9, 'sdfsdfsdfs', '2024-02-03 11:11:49'),
(2, 14, 9, 'pasta', '2024-02-03 11:11:58'),
(3, 16, 8, 'yummy\n', '2024-02-04 07:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `recipe_id`, `user_id`, `rating`) VALUES
(21, 14, 9, 3),
(22, 13, 9, 5),
(23, 14, 9, 2),
(24, 13, 9, 1),
(25, 14, 9, 5),
(26, 14, 8, 4),
(27, 16, 8, 5),
(28, 16, 8, 3),
(29, 16, 9, 4),
(30, 15, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `ingredients` varchar(500) NOT NULL,
  `instructions` varchar(500) NOT NULL,
  `image_filename` varchar(255) NOT NULL,
  `image_filepath` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `title`, `description`, `ingredients`, `instructions`, `image_filename`, `image_filepath`, `user_id`) VALUES
(13, 'MONAY', 'MASARAP', 'HARINA', 'LUTUIN', 'PARIS FOOD AND FLORAL WORKSHOP.jfif', 'uploads/PARIS FOOD AND FLORAL WORKSHOP.jfif', 9),
(14, 'canton', 'masarap', 'asin', 'lutuin', '770637d7b5e809dfa43a253b247774a1.png', 'uploads/770637d7b5e809dfa43a253b247774a1.png', 9),
(15, 'bagoong', 'sdfsdf', 'iuopuiop', 'jhkghjkghjkghjkgk', 'img8.jpg', 'uploads/img8.jpg', 8),
(16, 'adobo', 'masarap', 'toyo', 'buksan kalan', 'coffeeshake.jfif', 'uploads/coffeeshake.jfif', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(8, 'joy', 'loren', 'joyloren16@gmail.com', '789'),
(9, 'miguel', 'ignacio', 'miguel11ignacio23@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_id` (`recipe_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_id` (`recipe_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `rating` (`rating`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_name` (`title`),
  ADD KEY `description` (`ingredients`),
  ADD KEY `instructions` (`instructions`),
  ADD KEY `image_filename` (`image_filename`),
  ADD KEY `image_filepath` (`image_filepath`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `description_2` (`description`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fname` (`fname`),
  ADD KEY `lname` (`lname`),
  ADD KEY `email` (`email`),
  ADD KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
