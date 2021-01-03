-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2020 at 10:34 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softall`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `course` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `picture` varchar(300) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `batch`, `course`, `phone`, `address`, `picture`, `time`) VALUES
(3, 'ebrahim', 'Batch8', '3', '+8801733815252', 'Sylhet', 'ebrahim.jpg', '0000-00-00 00:00:00'),
(4, 'Sayma Saam Taslima', 'Batch10', '3', '+880173381524343', 'Dhaka', 'Sayma Saam.jpg', '0000-00-00 00:00:00'),
(5, 'Arpon', 'Batch8', '2', '+880173381524343', 'Dhaka', 'Arpon.jpg', '0000-00-00 00:00:00'),
(6, 'Omar Abdullah', 'Batch8', '4', '01733815252', 'Sylhet', 'Omar Abdullah.jpg', '2020-04-24 17:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `address` varchar(200) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `username`, `password`, `address`, `photo`, `status`, `date_time`) VALUES
(1, 'Mahadi Hasan Ebrahim', 'mahadi@gmail.com', 'mahadi123', '123456', 'Tultikor , Sylhet.', '', 'inactive', '2020-04-24 12:06:00'),
(3, 'abc', 'abc\"gmail.com', '', '123456', 'ABC REST HOURSE', 'nai', 'active', '2020-04-24 12:06:00'),
(8, 'Test Ahmed', 'test@gmail.com', 'test12345', 'test12345', 'Sylhet', 'test12345.jpg', 'active', '2020-04-24 12:06:00'),
(9, 'Mahadi Hasan Ebrahim', 'mahadihasanhi51999@gmail.com', 'mahadihebrahim@hotmail.com', 'b69c25931f0f18a59cc08a2de11c1a82', 'Sylhet', 'mahadihebrahim@hotmail.com.', 'inactive', '2020-04-24 12:06:00'),
(10, 'Sadikur Rahman', 'sadik@gmail.com', 'sadik@gmail.com', 'e076d40477ce92363705bdaf639ad2d9', 'Sylhet', 'sadik@gmail.com.jpg', 'inactive', '2020-04-24 12:06:00'),
(11, 'Sayma Saam', 'sayma@gmail.com', 'sayma@gmail.com', '6190309ccc662ed37b548320816d42af', 'Sylhet', 'sayma@gmail.com.jpg', 'active', '2020-04-24 12:06:00'),
(12, 'Sabbir Ahmed ', 'sabbir@gmail.com', 'sabbir@gmail.com', '315c62c851a3e0a710670aa39d7f6d75', 'Sylhet', 'sabbir@gmail.com.jpg', 'active', '2020-04-24 12:06:00'),
(13, 'Ebrahim Kholil', 'ebrahim@gmail.com', 'ebrahim@gmail.com', '6871c2fb587642d2a6bbb9ecdca01694', 'Sylhet', 'ebrahim@gmail.com.jpg', 'active', '2020-04-24 12:06:00'),
(14, 'Omar Abdullah', 'omar@gmail.com', 'omar@gmail.com', '3203263d2f6b907530232a1dcf4feea1', 'Nokhali', 'omar@gmail.com.jpg', 'active', '2020-04-24 14:01:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
