-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2025 at 10:37 AM
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
-- Database: `collegefeepayr`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('Aniket', 'Aniket@123'),
('Pavan', 'Pavan@123');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` int(10) NOT NULL,
  `batch_name` varchar(50) NOT NULL,
  `batch_year` int(10) NOT NULL,
  `no_of_students` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `batch_name`, `batch_year`, `no_of_students`) VALUES
(5, 'New', 2021, 250);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_sem` int(10) NOT NULL,
  `course_total_years` int(10) NOT NULL,
  `course_sem_wise_fees` int(10) NOT NULL,
  `course_total_fees` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_sem`, `course_total_years`, `course_sem_wise_fees`, `course_total_fees`) VALUES
(4, 'BCA', 8, 4, 20000, 160000),
(5, 'BCom', 8, 4, 15000, 120000),
(6, 'BBA', 8, 4, 15000, 120000),
(8, 'BSc', 8, 4, 20000, 160000);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `fdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `fon` varchar(200) NOT NULL,
  `fmsg` varchar(1000) NOT NULL,
  `rating` int(10) NOT NULL,
  `replymsg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `name`, `mobile`, `fdate`, `fon`, `fmsg`, `rating`, `replymsg`) VALUES
(4, 'Pavan Kupati', 9900941079, '2023-08-31 23:53:36', 'Nothing', 'Anything Not Good', 5, ''),
(5, 'Pavan Kupati', 9900941079, '2023-08-31 23:56:21', 'On this Site', 'Nothing is good in this site.', 5, ''),
(7, 'Pavan Kupati', 9900941079, '2023-09-02 02:44:02', 'Fees Details', 'Not good fees management site', 3, ''),
(8, 'Aniket Yalamalli', 9380694613, '2023-09-02 02:47:28', 'Fees Details', 'This is not a good website', 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `f_id` int(20) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `course` varchar(20) NOT NULL,
  `sem` int(20) NOT NULL,
  `total_sem_fees` double(20,2) NOT NULL,
  `total_fees_paid` double(20,2) NOT NULL DEFAULT 0.00,
  `total_fees_remaining` double(20,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`f_id`, `mobile`, `course`, `sem`, `total_sem_fees`, `total_fees_paid`, `total_fees_remaining`) VALUES
(84, 1234566555, 'BCA', 1, 20000.00, 0.00, 20000.00),
(85, 1234567998, 'BCA', 1, 20000.00, 0.00, 20000.00),
(86, 1236498700, 'BCA', 1, 20000.00, 0.00, 20000.00),
(87, 1325468952, 'BCA', 1, 20000.00, 0.00, 20000.00),
(88, 1345689700, 'BCA', 1, 20000.00, 20000.00, 0.00),
(89, 9380694613, 'BCA', 1, 20000.00, 20000.00, 0.00),
(90, 9620880242, 'BCA', 1, 20000.00, 0.00, 20000.00),
(91, 9900941079, 'BCA', 1, 20000.00, 20000.00, 0.00),
(92, 1234566555, 'BCA', 2, 20000.00, 0.00, 20000.00),
(93, 1234567998, 'BCA', 2, 20000.00, 0.00, 20000.00),
(94, 1236498700, 'BCA', 2, 20000.00, 0.00, 20000.00),
(95, 1325468952, 'BCA', 2, 20000.00, 0.00, 20000.00),
(96, 1345689700, 'BCA', 2, 20000.00, 20000.00, 0.00),
(97, 9380694613, 'BCA', 2, 20000.00, 20000.00, 0.00),
(98, 9620880242, 'BCA', 2, 20000.00, 0.00, 20000.00),
(99, 9900941079, 'BCA', 2, 20000.00, 20000.00, 0.00),
(100, 1234566555, 'BCA', 3, 20000.00, 0.00, 20000.00),
(101, 1234567998, 'BCA', 3, 20000.00, 0.00, 20000.00),
(102, 1236498700, 'BCA', 3, 20000.00, 0.00, 20000.00),
(103, 1325468952, 'BCA', 3, 20000.00, 0.00, 20000.00),
(104, 1345689700, 'BCA', 3, 20000.00, 10000.00, 10000.00),
(105, 9380694613, 'BCA', 3, 20000.00, 10000.00, 10000.00),
(106, 9620880242, 'BCA', 3, 20000.00, 0.00, 20000.00),
(107, 9900941079, 'BCA', 3, 20000.00, 10000.00, 10000.00);

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `name` varchar(50) DEFAULT NULL,
  `mobile` bigint(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`name`, `mobile`, `email`, `message`) VALUES
('Aniket Yalamalli', 9380694613, 'aniketanni2916@gmail.com', 'Hii Admin! How are You?'),
('Aniket', 9380694613, 'aniket@gmail.com', 'Hiiii');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `age` bigint(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `date_of_joining` date DEFAULT NULL,
  `experience` varchar(50) DEFAULT NULL,
  `pass` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `mobile`, `name`, `designation`, `gender`, `date_of_birth`, `age`, `address`, `date_of_joining`, `experience`, `pass`) VALUES
(15, 9620881242, 'Krishna Yashawanth', 'Clerk', 'Male', '2000-12-01', 22, 'Sankeshwar', '2018-10-10', '5 Years', 'Krishna@123');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `usn_no` varchar(50) NOT NULL DEFAULT 'Pending',
  `batch` varchar(10) NOT NULL DEFAULT 'Pending',
  `course` varchar(10) NOT NULL DEFAULT 'Pending',
  `sem` int(10) NOT NULL DEFAULT 1,
  `mobile` bigint(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `dob` date NOT NULL,
  `age` varchar(50) NOT NULL,
  `friend` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`usn_no`, `batch`, `course`, `sem`, `mobile`, `name`, `email`, `address`, `gender`, `pass`, `dob`, `age`, `friend`) VALUES
('M2001277', '2021', 'BCA', 3, 1234566555, 'Bhagyashree Honnyal', 'bhagya@gmail.com', 'Jamakandi', 'Female', 'Bhagya@123', '2001-01-17', '22 Years', 'Pavvu'),
('M2013200', '2021', 'BCA', 3, 1234567998, 'Anushka Virat Kohli', 'anuk@gmail.com', 'Bengalore', 'Female', 'Anushka@123', '2003-05-01', '20 Years', 'Virat'),
('M2013', '2021', 'BCA', 3, 1236498700, 'Nikhil Gurav', 'nikhilgurav@gmail.com', 'Soudatti', 'Male', 'Nikhil@123', '2002-01-01', '21 Years', ''),
('M2014', '2021', 'BCA', 3, 1325468952, 'Tony Stark', 'tony@gmail.com', 'USA', 'Male', 'Tony@123', '2000-10-10', '22 Years', ''),
('M2015', '2021', 'BCA', 3, 1345689700, 'Basavaraj Pujari', 'bassu@gmail.com', 'Athani', 'Male', 'Bassu@123', '2003-06-29', '20 Years', 'Nikhil'),
('M2916', '2021', 'BCA', 3, 9380694613, 'Aniket Yalamalli', 'aniketanni@gmail.com', 'Daddi', 'Male', 'Aniket@123', '2003-06-29', '20 Years', 'Krishna'),
('M2017', '2021', 'BCA', 3, 9620880242, 'Krishna Yashawanth', 'krishnaky@gmail.com', 'Sankeshwar', 'Male', 'Krishna@123', '2000-12-01', '22 Years', ''),
('M2018', '2021', 'BCA', 3, 9900941079, 'Pavan Kupati', 'pavankupati@gmail.com', 'Sankeshwar', 'Male', 'Pavan@123', '2002-10-31', '20 Years', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `reciept_no` varchar(50) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `sem` int(10) NOT NULL,
  `paid_amt` double(20,2) NOT NULL,
  `paid_date` varchar(11) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`reciept_no`, `mobile`, `sem`, `paid_amt`, `paid_date`, `payment_status`, `payment_id`) VALUES
('apkfee64f41fe9a7d24', 9380694613, 1, 20000.00, '2023-09-03 ', 'Success', 'CF64f41fe9a7d26'),
('apkfee64f447a7779f0', 9380694613, 2, 20000.00, '2023-09-03 ', 'Success', 'CF64f447a777c31'),
('apkfee64f449cf2dc8c', 9900941079, 1, 10000.00, '2023-09-03 ', 'Success', 'CF64f449cf2dc8f'),
('apkfee64f45a8c3e3c0', 9900941079, 1, 10000.00, '2023-09-03 ', 'Success', 'CF64f45a8c3e3c3'),
('apkfee64f45c41edfb0', 9900941079, 2, 20000.00, '2023-09-03 ', 'Success', 'CF64f45c41edfb3'),
('apkfee64f45c7a94e21', 1345689700, 1, 15000.00, '2023-09-03 ', 'Success', 'CF64f45c7a94e24'),
('apkfee64f45ca51c060', 1345689700, 2, 10000.00, '2023-09-03 ', 'Success', 'CF64f45ca51c062'),
('apkfee64f4c78239cde', 1345689700, 1, 5000.00, '2023-09-03 ', 'Success', 'CF64f4c78239ce1'),
('apkfee64f4c8a1d51f4', 1345689700, 2, 5000.00, '2023-09-03 ', 'Success', 'CF64f4c8a1d51f6'),
('apkfee64f4cf9995b7d', 1345689700, 2, 5000.00, '2023-09-03 ', 'Success', 'CF64f4cf9995b81'),
('apkfee64f4d176ee09b', 1345689700, 3, 10000.00, '2023-09-03 ', 'Success', 'CF64f4d176ee09e'),
('apkfee67e580f451577', 9900941079, 3, 10000.00, '2025-03-27 ', 'Success', 'CF67e580f45157b'),
('apkfee67e627bfc3f46', 9380694613, 3, 5000.00, '2025-03-28 ', 'Success', 'CF67e627bfc3f49'),
('apkfee67e62834cb66d', 9380694613, 3, 5000.00, '2025-03-28 ', 'Success', 'CF67e62834cb670');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`mobile`),
  ADD UNIQUE KEY `staff_id` (`staff_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`mobile`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`reciept_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `f_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
