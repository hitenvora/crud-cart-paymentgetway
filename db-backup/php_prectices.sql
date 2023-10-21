-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2023 at 07:33 PM
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
-- Database: `php_prectices`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

CREATE TABLE `add_to_cart` (
  `cart_id` int(11) NOT NULL,
  `co_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `subtotal` varchar(255) NOT NULL,
  `added_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_to_cart`
--

INSERT INTO `add_to_cart` (`cart_id`, `co_id`, `id`, `subtotal`, `added_date`) VALUES
(5, 1, 1, '33434', '21/10/2023 10:58:53 pm');

-- --------------------------------------------------------

--
-- Table structure for table `city_name`
--

CREATE TABLE `city_name` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city_name`
--

INSERT INTO `city_name` (`city_id`, `city_name`) VALUES
(1, 'Rajkot');

-- --------------------------------------------------------

--
-- Table structure for table `compny_task`
--
-- Error reading structure for table php_prectices.compny_task: #1932 - Table &#039;php_prectices.compny_task&#039; doesn&#039;t exist in engine
-- Error reading data for table php_prectices.compny_task: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `php_prectices`.`compny_task`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `course_cetegory`
--

CREATE TABLE `course_cetegory` (
  `course_id` int(11) NOT NULL,
  `corse_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_cetegory`
--

INSERT INTO `course_cetegory` (`course_id`, `corse_name`) VALUES
(1, 'Technical'),
(2, 'Non-Technical');

-- --------------------------------------------------------

--
-- Table structure for table `course_list`
--

CREATE TABLE `course_list` (
  `co_id` int(11) NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `oldprice` varchar(255) NOT NULL,
  `offerprice` varchar(255) NOT NULL,
  `coursedescriptions` varchar(255) NOT NULL,
  `courseimage` varchar(255) NOT NULL,
  `coursecategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_list`
--

INSERT INTO `course_list` (`co_id`, `coursename`, `duration`, `oldprice`, `offerprice`, `coursedescriptions`, `courseimage`, `coursecategory_id`) VALUES
(1, 'php', '3month', '43434', '33434', '<p>good</p>', 'uploads/courses/photo-1605559424843-9e4c228bf1c2.avif', 1);

-- --------------------------------------------------------

--
-- Table structure for table `state_name`
--

CREATE TABLE `state_name` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state_name`
--

INSERT INTO `state_name` (`state_id`, `state_name`) VALUES
(1, 'Gujrat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sirtask`
--

CREATE TABLE `tbl_sirtask` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `date_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sirtask`
--

INSERT INTO `tbl_sirtask` (`id`, `first_name`, `last_name`, `email`, `password`, `image`, `gender`, `hobbies`, `phone`, `course_id`, `state_id`, `city_id`, `date_time`) VALUES
(1, 'hiten', 'vora', 'hiten@gmail.com', '7508', 'uploads/students/46.webp', 'male', 'riding', '967874511', 2, 1, 1, ''),
(2, 'adkjf', 'dfasf', 'sdfaaf@gmail.com', 'jkjdfakj', 'uploads/students/Screenshot (14).png', 'male', 'reading,playing', '9687431212', 1, 1, 1, '02/07/2023 10:16:56 am');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sirtask1`
--

CREATE TABLE `tbl_sirtask1` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sirtask1`
--

INSERT INTO `tbl_sirtask1` (`course_id`, `course_name`) VALUES
(1, 'Bcom'),
(2, 'Bca');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `id` (`id`),
  ADD KEY `co_id` (`co_id`);

--
-- Indexes for table `city_name`
--
ALTER TABLE `city_name`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `course_cetegory`
--
ALTER TABLE `course_cetegory`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_list`
--
ALTER TABLE `course_list`
  ADD PRIMARY KEY (`co_id`),
  ADD KEY `coursecategory_id` (`coursecategory_id`);

--
-- Indexes for table `state_name`
--
ALTER TABLE `state_name`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `tbl_sirtask`
--
ALTER TABLE `tbl_sirtask`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `tbl_sirtask1`
--
ALTER TABLE `tbl_sirtask1`
  ADD PRIMARY KEY (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `city_name`
--
ALTER TABLE `city_name`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_cetegory`
--
ALTER TABLE `course_cetegory`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_list`
--
ALTER TABLE `course_list`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state_name`
--
ALTER TABLE `state_name`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sirtask`
--
ALTER TABLE `tbl_sirtask`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sirtask1`
--
ALTER TABLE `tbl_sirtask1`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
