-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2024 at 06:50 PM
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
-- Database: `flyover`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(300) NOT NULL,
  `price` varchar(200) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `price`, `duration`, `category`) VALUES
(3, 'bca', 'computer field', '2345', '3 Year', 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE `institutions` (
  `id` int(100) NOT NULL,
  `name` varchar(250) NOT NULL,
  `rating` int(100) NOT NULL,
  `courses` varchar(200) NOT NULL,
  `job` varchar(250) NOT NULL,
  `fees` int(100) NOT NULL,
  `address` varchar(300) NOT NULL,
  `status` tinyint(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `review` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`id`, `name`, `rating`, `courses`, `job`, `fees`, `address`, `status`, `image`, `review`) VALUES
(7, 'devasurya', 3, 'saS', 'cxsa', 231313, 'asxsaxa', 0, 'uploads/college.jpg', ''),
(8, 'abin', 4, 'BCA,BBA,', 'software engineering', 323223, 'peumpillichira, thodupuzha,', 0, 'uploads/anime-demon-slayer-kimetsu-no-yaiba-zenitsu-agatsuma-wallpaper-1600x900-wallpaper.jpg', ''),
(9, 'santamonica', 5, 'germen,ielts', 'pumper,driver', 12400, 'kattapana', 0, 'uploads/banner-item-01.jpg.jpg', ''),
(10, 'loadstar', 5, 'germen,ielts', 'sotware developer', 500000, 'kochi', 0, 'uploads/WhatsApp Image 2023-09-12 at 22.31.51.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `salary` varchar(250) NOT NULL,
  `work_time` varchar(200) NOT NULL,
  `details` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `salary`, `work_time`, `details`) VALUES
(2, 'abin biju', '50000', '5 hour', 'sgchdshcsdcdsc');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `loginid` int(100) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `user_type` varchar(100) DEFAULT NULL,
  `status` tinyint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginid`, `email`, `password`, `user_type`, `status`) VALUES
(1, 'abinbiju7951@gmail.com', '123', 'admin', 1),
(2, 'abinbiju7951@gmail.com', '$2y$10$C59/NTqjv8jLxOMS1qGCpu4wMrPHqI0X/eNU8tsNQbXo7DFvLUxES', 'customer', 1),
(3, 'abinbiju7951@gmail.com', '$2y$10$hbCP2wKLXySZUiMG5aTGq.2D5aGUS0yKg9M0YhggyG0t1VR1gqUNi', 'customer', 1),
(4, 'abinbiju7951@gmail.com', '1234', 'customer', 1),
(5, 'abinbiju7951@gmail.com', '12345', 'customer', 1),
(6, 'athul123@gmail.com', '234', 'customer', 1),
(7, 'abiya12@gmail.com', 'abiya123', 'customer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phoneno` int(100) DEFAULT NULL,
  `loginid` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `password`, `address`, `phoneno`, `loginid`) VALUES
(1, 'abin', 'abinbiju7951@gmail.com', '$2y$10$hbCP2wKLXySZUiMG5aTGq.2D5aGUS0yKg9M0YhggyG0t1VR1gqUNi', 'test', 123456789, 3),
(5, 'abiya', 'abiya12@gmail.com', 'abiya123', 'qwertyu', 2147483647, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`loginid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `loginid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
