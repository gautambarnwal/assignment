-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2021 at 11:19 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `otp` varchar(10) DEFAULT NULL,
  `otp_expires_at` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `username`, `password`, `otp`, `otp_expires_at`, `created_at`) VALUES
(1, 'gautam', '1998gtb@gmail.com', 'abhishek', '25d55ad283aa400af464c76d713c07ad', '846404', '2021-05-12 11:12:07', '0000-00-00 00:00:00'),
(2, 'bio', 'support@bioquest.com', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', '', '2021-05-11 03:47:59'),
(3, 'amit', 'amit@gmail.com', 'amit', 'fe008700f25cb28940ca8ed91b23b354', '679040', '2021-05-12 08:46:37', '2021-05-12 03:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text DEFAULT NULL,
  `question_regarding` varchar(100) DEFAULT NULL,
  `ref_file` text DEFAULT NULL,
  `status` enum('1','0') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `user_id`, `question`, `answer`, `question_regarding`, `ref_file`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'What is variable ? ', 'Variables are &quot;containers&quot; for storing information.', 'Category 2', '53021620805924_45741616572598_dynapower_small.png', '1', '2021-05-11 23:35:37', '2021-05-12 05:46:18'),
(2, 2, 'What is Arrays?', 'An array is a data structure that contains a group of elements.', 'Category 2', '', '1', '2021-05-12 04:09:06', '2021-05-12 05:43:35'),
(3, 3, 'What is functions?', 'A function is a group of instructions, also known as a named procedure, used by programming languages to return a single result or a set of results. See the routine and library definitions for further information. ', 'Category 4', '', '1', '2021-05-12 05:28:21', '2021-05-12 05:44:25'),
(4, 3, 'What is codeigniter?', 'CodeIgniter is a powerful PHP framework with a very small footprint.', 'Category 1', '', '0', '2021-05-12 05:28:58', '2021-05-12 05:47:37');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `division` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `password` text DEFAULT NULL,
  `otp` int(10) DEFAULT NULL,
  `otp_expires_at` varchar(50) DEFAULT NULL,
  `access_token` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `region`, `country`, `division`, `role`, `password`, `otp`, `otp_expires_at`, `access_token`, `created_at`) VALUES
(1, 'test', 'test@gmail.com', 'North America', 'America', 'SEA', 'Manager 2', '25d55ad283aa400af464c76d713c07ad', 476292, '2021-05-12 08:53:16', NULL, '2021-05-11 07:38:51'),
(2, 'Shashang', 'shashang@gmail.com', 'North America', 'America', 'SEA', 'Manager 1', '1596e62b60d5dacabf8804ad5d4c2f3c', 963201, '2021-05-12 09:38:15', NULL, '2021-05-12 04:07:53'),
(3, 'anil', 'anil@gmail.com', 'Asia', 'India', 'SEA', 'Manager 2', '1b7e2e7f89d78eaa25af05f36cf10249', 302869, '2021-05-12 10:56:09', NULL, '2021-05-12 05:25:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
