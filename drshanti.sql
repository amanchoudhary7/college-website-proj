-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2024 at 12:22 AM
-- Server version: 10.6.16-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drshanti`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `cid` int(50) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `DOB` varchar(50) NOT NULL,
  `PAN` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `comments` varchar(500) NOT NULL DEFAULT 'No comments',
  `mobile` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gst` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`cid`, `cname`, `fname`, `DOB`, `PAN`, `address`, `status`, `comments`, `mobile`, `email`, `gst`) VALUES
(1, 'Ram ', 'Shayam', '1-1-2000', 'PNA123', 'A G Colony, Ashiyana Nagar, Patna', 0, 'coxrdmment5jxhjhfdsf', '', '', ''),
(2, 'Mohan', 'Arun Kumar Singh', '', '', '', 0, '', '', '', ''),
(4, 'Preetish Ranjan', 'Harihar Prasad', '8-1-1981', 'ASN345', 'A/157, A G Colony, Ashiyana Nagar', 1, 'GUD', '9430239387', 'mail.preetishranjan@gmail.com', 'SDS3'),
(5, 'Nitish', 'j', 'k', 'kj', 'k', 1, 'lklk', 'kj', 'kj', 'kj'),
(6, 'Manoj', 'jk', 'jk', 'k', 'kj', 1, 'sdsd', 'k', 'kj', 'kj'),
(7, 'sonu', 'ram', '10-02-2017', '123', '123', 0, 'check', '123', '213@123', '213'),
(8, '', '', '', '', '', 0, '', '', '', ''),
(9, 'Preetish Ranjan', 'Harihar Prasad', '2018-01-17', '55', 'A/157, A G \r\n\r\nColony, Ashiyana Nagar', 0, 'very weak', '09430239387', 'mail.preetishranjan@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(100) NOT NULL,
  `cid` int(100) NOT NULL,
  `comments` text NOT NULL,
  `status` int(2) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `date` varchar(20) NOT NULL,
  `commentedBy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `cid`, `comments`, `status`, `amount`, `date`, `commentedBy`) VALUES
(21, 1, 'hi ram', 0, 0, '21-7-2017', 'Ram Kumar Srivastav'),
(22, 1, 'hi ram 1', 1, 2000, '21-7-2017', 'Ram Kumar Srivastav'),
(23, 1, 'hi \r\n\r\nram 2', 1, 2000, '21-7-2017', ''),
(24, 1, 'hi ram 3', 1, 2000, '21-7-2017', 'Ram Kumar Srivastav'),
(25, 1, 'I started my \r\n\r\njourney on 10-6-17 from Patna at 3:30PM and reached Begusarai on the same day at 8:30PM. On 11-6-17 (sunday), we called a \r\n\r\nmeeting for all lfs, coordinators and helping hands at hotel KDM at 11:00 AM. We discussed all the issues related to \r\n\r\nexpenditure, reporting, billings, management of cash during admission. We also discussed the requirement of additional man \r\n\r\npower due to increase in the number of admissions. After lunch, we discussed about the specific problem in few centers such \r\n\r\nas power fluctuation, mobilization of students etc.\r\nOn 12-6-17, I reached to Teghra to monitor the working of center. I \r\n\r\nfound that students were present in both class and lab. The process was smooth and everybody was engaged in their work.  I \r\n\r\ninteracted with students and their feedback was very satisfactory.\r\n', 1, 2000, '21-7-2017', 'Ram Kumar Srivastav'),
(26, 1, 'hi2', 1, 2000, '21-7-2017', 'Ram Kumar Srivastav');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceId` int(100) NOT NULL,
  `clientId` int(100) NOT NULL,
  `details` varchar(10000) NOT NULL,
  `date` varchar(20) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `createdBy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoiceId`, `clientId`, `details`, `date`, `cost`, `createdBy`) VALUES
(0, 0, '', '', '', 'Ram Kumar Srivastav'),
(1, 1, '', '22-7-2017', '100#', 'Ram Kumar Srivastav'),
(2, 1, '', '22-7-2017', '234#', 'Ram Kumar \r\n\r\nSrivastav'),
(3, 1, '', '22-7-2017', '23#', 'Ram Kumar Srivastav'),
(4, 1, '', '22-7-2017', '23#', 'Ram Kumar Srivastav'),
(5, 1, '', '22-7-2017', '100##', 'Ram Kumar Srivastav'),
(6, 1, '0', '22-7-2017', '122#100#', 'Ram Kumar Srivastav'),
(7, 1, ',ssds', '22-7-2017', '122##100#', 'Ram Kumar Srivastav'),
(8, 1, ',ffffff', '22-7-2017', '100#37#', 'Ram Kumar Srivastav'),
(9, 1, ',aaaaaaaaaaaa,dddddddddddd', '22-7-2017', '100#50#', 'Ram Kumar Srivastav'),
(10, 1, '*aaaaaaaaaaaa**ggggggggggggggg', '22-7-2017', '100##45#', 'Ram Kumar Srivastav'),
(11, 1, ',aaaaaaaaaaaa,bbbbbbbbbbb', '22-7-2017', '67#67#', 'Ram Kumar \r\n\r\nSrivastav'),
(12, 1, 'dff,ddd,', '22-7-2017', '79##', 'Ram Kumar Srivastav'),
(13, 1, 'gggggggggg,', '22-7-2017', '100#', 'Ram \r\n\r\nKumar Srivastav'),
(14, 1, 'dddddddd,', 'July 22, 2017', '10000', 'Ram Kumar Srivastav'),
(15, 1, 'ggggggjjjjhjhj,', 'July 22, \r\n\r\n2017', '100', 'Ram Kumar Srivastav'),
(16, 1, 'tttttt,', '17-1-2018', '100#', 'Ram Kumar Srivastav');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(100) NOT NULL,
  `adm_date` varchar(50) NOT NULL,
  `patient_id` int(50) NOT NULL,
  `patient_name` varchar(500) NOT NULL,
  `fh_name` varchar(500) NOT NULL,
  `dob` varchar(500) NOT NULL,
  `cdate` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `amount` int(10) NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `billNumber` int(100) NOT NULL,
  `op_charge` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `adm_date`, `patient_id`, `patient_name`, `fh_name`, `dob`, `cdate`, `email`, `mobile`, `address`, `amount`, `remarks`, `billNumber`, `op_charge`) VALUES
(126, '11-2-2018', 4, 'Sita Devi', 'Mukesh Yadav', '28', '12-07-2018', 'mail.preetishranjan@gmail.com', '9430239387', 'A/157, A G Colony, Ashiyana Nagar', 1000, 'New Patient', 126, 'Rs. 0/-'),
(127, '11-2-2018', 4, 'Sita Devi', 'Mukesh Yadav', '28', '10-3-2018', 'mail.preetishranjan@gmail.com', '9430239387', 'A/157, A G Colony, Ashiyana Nagar', 0, '', 127, 'Rs. 0/-'),
(128, '12-2-2018', 5, 'Kundan ', 'Ram', '25', '12-2-2018', 'Kun20712. Gmail', '2575612585', 'Patna', 300, 'Test data', 128, 'Rs. 100/-'),
(130, '12-2-2018', 6, 'Katrina Kaif', 'Muhhamad Kaif', '35', '12-2-2018', 'mail.pr@gmail.com', '9878654567', 'Patna', 1000, 'new', 130, 'Rs. 0/-'),
(131, '12-2-2018', 6, 'Katrina Kaif', 'Muhhamad Kaif', '35', '12-2-2018', 'mail.pr@gmail.com', '9878654567', 'Patna', 0, '', 131, 'Rs. 0/-'),
(132, '12-2-2018', 6, 'Katrina Kaif', 'Muhhamad Kaif', '35', '15-07-2020', 'mail.pr@gmail.com', '9878654567', 'Patna', 0, '', 132, 'Rs. 0/-'),
(133, '12-2-2018', 5, 'Kundan ', 'Ram', '25', '28-2-2018', 'Kun20712. Gmail', '2575612585', 'Patna', 0, '', 133, 'Rs. 0/-'),
(134, '28-2-2018', 5, 'Kundan ', 'Ram', '25', '21-8-2018', 'Kun20712. Gmail', '2575612585', 'Patna', 1000, '', 134, 'Rs. 0/-'),
(135, '28-2-2018', 7, 'manish', 'kumar', '40', '22-02-2018', 'kun', '12312312', 'vaishali lalganj', 1000, '', 135, 'Rs. 0/-'),
(136, '10-3-2018', 4, 'Sita Devi', 'Mukesh Yadav', '28', '10-3-2018', 'mail.preetishranjan@gmail.com', '9430239387', 'A/157, A G Colony, Ashiyana Nagar', 500, '', 136, 'Rs. 0/-'),
(137, '10-3-2018', 4, 'Sita Devi', 'Mukesh Yadav', '28', '10-3-2018', 'mail.preetishranjan@gmail.com', '9430239387', 'A/157, A G Colony, Ashiyana Nagar', 500, '', 137, 'Rs. 0/-'),
(138, '21-8-2018', 5, 'Kundan ', 'Ram', '25', '15-8-2020', 'Kun20712. Gmail', '2575612585', 'Patna', 0, '', 138, 'Rs. 0/-'),
(139, '15-8-2020', 5, 'Kundan ', 'Ram', '25', '15-8-2020', 'Kun20712. Gmail', '2575612585', 'Patna', 200, '', 139, 'Rs. 0/-'),
(140, '15-8-2020', 8, 'Preetish Ranjan', 'Harihar  Prasad', '38', '15-8-2020', 'mail.preetishranjan@gmail.com', '09430239387', 'Amity University Patna', 400, 'Closing it for the first time', 140, ' 0/-'),
(141, '15-8-2020', 8, 'Preetish Ranjan', 'Harihar  Prasad', '38', '15-8-2020', 'mail.preetishranjan@gmail.com', '09430239387', 'Amity University Patna', 300, '', 141, 'Rs. 0/-'),
(142, '15-8-2020', 9, 'Kishor', 'Harihar  Prasad', '38', '16-08-2020', 'mail.preetishranjan@gmail.com', '09430239387', 'Amity University Patna', 100, '', 142, 'Rs. 0/-'),
(143, '15-8-2020', 10, 'Nitish', 'Harihar  Prasad', '38', '17-08-2020', 'mail.preetishranjan@gmail.com', '09430239387', 'Amity University Patna', 300, '', 143, 'Rs. 0/-'),
(144, '15-8-2020', 11, 'Aman', 'Bimal', '34', '--23/11/2020', 'ama@dd.com', '23423422341', 'patna', 400, '', 144, 'Rs. 0/-'),
(145, '10-10-2020', 12, 'Preetish Ranjan', 'Harihar  Prasad', '38', '11-10-2020', 'mail.preetishranjan@gmail.com', '09430239387', 'Amity University Patna', 300, 'Closing it for the first time', 145, 'Rs. 0/-');

-- --------------------------------------------------------

--
-- Table structure for table `table1`
--

CREATE TABLE `table1` (
  `id` int(100) NOT NULL,
  `invoice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `table1`
--

INSERT INTO `table1` (`id`, `invoice`) VALUES
(8, 'mmmmmmmmmm');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `status` int(2) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_name`, `password`, `name`, `fname`, `address`, `mobile`, `status`, `email`) VALUES
(1, 'ram', 'ram1', 'Ram Kumar Srivastav', '', '', '', 1, ''),
(2, 'preetish', 'ranjan', '', '', '', '', 2, ''),
(3, 'kj', 'kj', 'Abhishek', 'kj', 'kj', 'kj', 1, 'kj'),
(4, 'shubh', 'shubh1', 'Shubham', 'aaa', 'dsdsd', 'scsdsdsd', 2, 'scs'),
(5, 'sonu', 'sonu1', 'Sonu \r\n\r\nKumar', 'jjhj', 'jkj', 'njj', 2, 'njj'),
(6, 'a', 'a', 'a', 'a', 'a', 'a', 1, 'a@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceId`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table1`
--
ALTER TABLE `table1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `table1`
--
ALTER TABLE `table1`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
