-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2025 at 11:19 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentmycaravan`
--
CREATE DATABASE IF NOT EXISTS `rentmycaravan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rentmycaravan`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `title` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `adress1` varchar(50) NOT NULL,
  `adress2` varchar(50) DEFAULT NULL,
  `adress3` varchar(50) DEFAULT NULL,
  `postcode` varchar(10) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `profile_blob` longblob,
  `profile_url` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `PASSWORD`, `title`, `first_name`, `last_name`, `gender`, `adress1`, `adress2`, `adress3`, `postcode`, `description`, `email`, `telephone`, `profile_blob`, `profile_url`) VALUES
(12, 'test', '$2y$10$gJvoktlfM4Sg5nr10iy4u.NNhawk90nM4l1419pda4g4Ow7gMekXa', 'mr', 'test', 'human', 'qeqwe', 'qqwwqqwr', 'wfwrerf', 'wfssfs', 'cv34 3hf', NULL, 'test@gmail.com', '12345678900', NULL, NULL),
(13, 'bigman', '$2y$10$wePGEEGCroA2YDA4fy4PYebV7nS7vcpkKXhGYTjqPeGu7g.KASjSm', 'mr', 'man', 'big', 'big', 'qqwwqqwr', 'wfwrerf', 'wfssfs', 'cv34 3hf', NULL, 'bigman@rocketmail.com', '12345678900', NULL, NULL),
(14, 'alfie', '$2y$10$dl9kbAbeoPiZdw9bfiBtme2.zlh8kCR1P3YN/2OvhS.tExBVi1leq', 'mr', 'alfie', 'alfie', 'alfie', 'qqwwqqwr', 'wfwrerf', 'wfssfs', 'cv34 3hf', NULL, 'alfie@alf.com', '12345678900', NULL, NULL),
(15, 'topcaravanman', '$2y$10$tg.qu10FMF4f4OpUFZ/ZDeFQ6UvdD0A39C1zU86y.uUneuKXgcXY6', 'mr', 'caravan', 'caravan', 'qeqwe', 'qw', 'awrwe', 'aerwe', 'afa', NULL, 'caravan@caravan.com', '12345678991', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_details`
--

DROP TABLE IF EXISTS `vehicle_details`;
CREATE TABLE `vehicle_details` (
  `caravan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `caravan_make` varchar(50) NOT NULL,
  `caravan_model` varchar(100) NOT NULL,
  `caravan_bodytype` varchar(500) NOT NULL,
  `caravan_registration` varchar(10) NOT NULL,
  `fuel_type` varchar(100) NOT NULL,
  `mileage` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `year` varchar(5) NOT NULL,
  `num_doors` int(2) NOT NULL,
  `video_url` varchar(100) DEFAULT NULL,
  `image_url` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_details`
--

INSERT INTO `vehicle_details` (`caravan_id`, `user_id`, `caravan_make`, `caravan_model`, `caravan_bodytype`, `caravan_registration`, `fuel_type`, `mileage`, `location`, `year`, `num_doors`, `video_url`, `image_url`) VALUES
(3, 15, 'toyota', 'big', 'touring', 'caravan02', 'petrol', '1000', 'random shit valley', '2001', 4, 'https://www.youtube.com/watch?v=eU5SzMQ5P2g', '/uploads/John.jpg'),
(6, 12, 'Carlight', 'Aira', 'static', 'MH97 LSI', 'diesel', '14114', 'The Valleys', '2009', 2, 'https://www.youtube.com/watch', '/uploads/Caravan3.jpg'),
(5, 12, 'Bailey', 'Jester', 'touring', 'MB05 TRE', 'petrol', '120', 'devon', '2010', 1, 'https://www.youtube.com/watch', '/uploads/Caravan1.jpg'),
(7, 12, 'Raycaster', 'Sonata', 'touring', 'MG07 GRI', 'diesel', '2934', 'Merthyr Tydfi', '2016', 1, 'https://www.youtube.com/watch', '/uploads/Caravan4.jpg'),
(8, 12, 'Ford', 'Willingham', 'static', 'PY76 WKT', 'petrol', '1238', 'London', '2014', 2, 'https://www.youtube.com/watch', '/uploads/Caravan5.jpg'),
(9, 12, 'Johnson', 'GT490', 'touring', 'BU40 SPH', 'petrol', '129387', 'Roath', '2001', 2, 'https://www.youtube.com/watch', '/uploads/Caravan6.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  ADD PRIMARY KEY (`caravan_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  MODIFY `caravan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
