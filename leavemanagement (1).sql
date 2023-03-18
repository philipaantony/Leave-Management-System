-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2022 at 01:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leavemanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bid` int(10) NOT NULL,
  `acc_no` int(10) NOT NULL,
  `title` varchar(20) NOT NULL,
  `author` varchar(20) NOT NULL,
  `edition` varchar(20) NOT NULL,
  `publisher` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bid`, `acc_no`, `title`, `author`, `edition`, `publisher`) VALUES
(1, 4589, 'Harry Potter ', 'J K Rowling', '3', 'DC Books'),
(2, 45789, 'Never Finished ', 'David Goggins', '1', 'DC Books'),
(5, 4589, 'How to meet', 'Nicle LePere', '2', 'DC Books'),
(6, 7895, 'Spiderman', 'Mary Howitt', '1', 'Marvel');

-- --------------------------------------------------------

--
-- Table structure for table `leavetable`
--

CREATE TABLE `leavetable` (
  `id` int(10) NOT NULL,
  `adno` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `dept` varchar(15) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `days` int(5) NOT NULL,
  `reason` varchar(250) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leavetable`
--

INSERT INTO `leavetable` (`id`, `adno`, `name`, `dept`, `fromdate`, `todate`, `days`, `reason`, `status`) VALUES
(2, 14292, 'Philip Antony', 'Regular MCA', '2022-12-18', '2022-12-19', 2, 'Duty Leave', 'Pending'),
(3, 14292, 'Philip Antony', 'Regular MCA', '2022-12-08', '2022-12-11', 3, 'Fever', 'Pending'),
(4, 14292, 'Philip Antony', 'Regular MCA', '2022-12-13', '2022-12-14', 1, 'Went to kply', 'Leave Aproved'),
(5, 14895, 'Arjun Das', 'm.tech', '2022-12-01', '2022-12-05', 5, 'NSS Camp', 'Leave Aproved'),
(6, 14895, 'Arjun Das', 'm.tech', '2022-12-14', '2022-12-15', 1, 'Workshop visit', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `sid` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `sid`, `email`, `password`, `type`) VALUES
(1, 0, 'admin@gmail.com', 'admin', 'admin'),
(5, 4, 'philipantony@gmail.com', 'philip', 'student'),
(6, 5, 'arjun@gmail.com', 'arjun', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `admissionno` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneno` varchar(15) NOT NULL,
  `dept` varchar(15) NOT NULL,
  `year` varchar(10) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `admissionno`, `email`, `phoneno`, `dept`, `year`, `image`) VALUES
(4, 'Philip Antony', 14292, 'philipantony@gmail.com', '9201456987', 'Regular MCA', '2022', '20200926220543_IMG_1402.jpg  '),
(5, 'Arjun Das', 14895, 'arjun@gmail.com', '9856321478', 'm.tech', '2022', '20191228022719_IMG_2073.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `leavetable`
--
ALTER TABLE `leavetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sid` (`sid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `admissionno` (`admissionno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leavetable`
--
ALTER TABLE `leavetable`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
