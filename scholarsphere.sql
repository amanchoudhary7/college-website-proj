-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 07:46 AM
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
-- Database: `scholarsphere`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookchaptersbyfaculty`
--

CREATE TABLE `bookchaptersbyfaculty` (
  `user_id` int(100) NOT NULL,
  `University` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Employee ID` int(100) NOT NULL,
  `other Author` varchar(100) NOT NULL,
  `Co-author` varchar(100) NOT NULL,
  `booktitle` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `pubdate` int(100) NOT NULL,
  `pubyear` int(4) NOT NULL,
  `volume` int(10) NOT NULL,
  `pagefrom` int(11) NOT NULL,
  `pageto` int(11) NOT NULL,
  `scopus` enum('y','n') NOT NULL,
  `listedin` varchar(100) NOT NULL,
  `wos` enum('y','n') NOT NULL,
  `peer` enum('y','n') NOT NULL,
  `issn` int(100) NOT NULL,
  `isbn` int(100) NOT NULL,
  `pubname` varchar(100) NOT NULL,
  `affltn` varchar(100) NOT NULL,
  `corrauthor` varchar(100) NOT NULL,
  `citind` int(11) NOT NULL,
  `nocit` int(11) NOT NULL,
  `evdupload` varchar(100) NOT NULL,
  `othrinfo` varchar(100) NOT NULL,
  `ref` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookchaptersbyfaculty`
--

INSERT INTO `bookchaptersbyfaculty` (`user_id`, `University`, `Department`, `Faculty`, `Employee ID`, `other Author`, `Co-author`, `booktitle`, `region`, `pubdate`, `pubyear`, `volume`, `pagefrom`, `pageto`, `scopus`, `listedin`, `wos`, `peer`, `issn`, `isbn`, `pubname`, `affltn`, `corrauthor`, `citind`, `nocit`, `evdupload`, `othrinfo`, `ref`) VALUES
(2, '0', '0', '0', 12, '0', '0', '0', '0', 2024, 1988, 0, 0, 0, '', '0', '', '', 3456, 3456, '0', '0', '0', 0, 0, '0', '0', '0'),
(3, '0', '0', '0', 12, '0', '0', '0', '0', 2024, 1988, 12, 12, 56, '', '0', '', '', 3456, 3456, '0', '0', '0', 198, 4, '0', '0', '0'),
(4, 'Amity', 'BTech', 'Teacher', 7, 'JK Rowling', 'Jane Austin', 'Goblet Of Fire', 'International', 2024, 1988, 0, 12, 56, 'n', 'ICI', '', '', 3456, 3456, 'JK Rowling', 'ICSE', 'Jane Austin', 198, 4, '', '', ''),
(6, '', '', '', 0, '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', ''),
(7, 'cc', 'cc', 'cc', 7, 'cc', 'cc', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `booksbyfaculty`
--

CREATE TABLE `booksbyfaculty` (
  `user_id` int(100) NOT NULL,
  `University` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Employee ID` int(100) NOT NULL,
  `other Author` varchar(100) NOT NULL,
  `Co-author` varchar(100) NOT NULL,
  `booktitle` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `pubdate` int(100) NOT NULL,
  `pubyear` int(100) NOT NULL,
  `volume` varchar(100) NOT NULL,
  `pagefrom` int(100) NOT NULL,
  `pageto` int(100) NOT NULL,
  `scopus` enum('y','n') NOT NULL,
  `listedin` varchar(100) NOT NULL,
  `wos` enum('y','n') NOT NULL,
  `peer` enum('y','n') NOT NULL,
  `issn` int(100) NOT NULL,
  `isbn` int(100) NOT NULL,
  `pubname` varchar(100) NOT NULL,
  `affltn` varchar(100) NOT NULL,
  `corrauthor` varchar(100) NOT NULL,
  `citind` int(100) NOT NULL,
  `nocit` int(100) NOT NULL,
  `evdupload` varchar(100) NOT NULL,
  `othrinfo` varchar(100) NOT NULL,
  `ref` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booksbyfaculty`
--

INSERT INTO `booksbyfaculty` (`user_id`, `University`, `Department`, `Faculty`, `Employee ID`, `other Author`, `Co-author`, `booktitle`, `region`, `pubdate`, `pubyear`, `volume`, `pagefrom`, `pageto`, `scopus`, `listedin`, `wos`, `peer`, `issn`, `isbn`, `pubname`, `affltn`, `corrauthor`, `citind`, `nocit`, `evdupload`, `othrinfo`, `ref`) VALUES
(1, 'Amity', 'BTech', 'ert', 12, '', 'Harry Potter', 'Goblet Of Fire', 'PubMed', 2024, 1988, '', 0, 0, '', '', '', '', 3456, 3456, '', '', '', 0, 0, '', '', 'reference'),
(2, 'Amity', 'BTech', 'Teacher', 12, '1234', 'Harry Potter', 'Goblet Of Fire', 'International', 2024, 1988, '12', 12, 45, 'n', 'PubMed', '', '', 3456, 3456, 'JK Rowling', 'ICSE', 'Jane Austin', 198, 8, '', 'no info', 'reference'),
(3, 'Amity', 'BTech', 'Teacher', 7, 'JK Rowling', 'Jane Austin', 'Goblet Of Fire', 'International', 2024, 1988, '12', 23, 56, 'y', 'PubMed', 'n', 'y', 3456, 3456, 'JK Rowling', 'ICSE', 'Jane Austin', 198, 8, 'uploads/English_india.pdf', 'no info', 'reference'),
(4, 'Amity', 'BTech', 'Teacher', 12, 'JK Rowling', 'Jane Austin', 'Goblet Of Fire', 'International', 2024, 1988, '12', 12, 56, 'y', 'PubMed', 'n', 'y', 3456, 3456, 'JK Rowling', 'ICSE', 'Jane Austin', 198, 7, 'uploads/English_india.pdf', 'no info', 'reference'),
(5, 'Amity', 'BTech', 'Teacher', 12, 'JK Rowling', 'Harry Potter', 'Goblet Of Fire', 'International', 2024, 1988, '12', 12, 45, 'y', 'PubMed', 'n', 'y', 3456, 3456, 'JK Rowling', 'ICSE', 'Jane Austin', 198, 8, 'uploads/English_india.pdf', 'no info', 'reference'),
(9, 'Amity University', 'BTech dodo', 'Teacherpp', 7, 'JK Rowlingpp', '', 'Goblet Of Firepp', 'International', 2024, 1988, '12', 12, 45, 'n', 'PubMed', '', '', 3456, 3456, 'JK Rowling', 'ICSE', 'Jane Austin', 198, 8, '', '', 'reference'),
(10, 'Amity University', 'Btech', 'shilpa', 7, '', '', '', '', 0, 0, '', 0, 0, '', '', '', '', 0, 0, '', '', '', 0, 0, 'uploads/', '', ''),
(11, 'amity', 'pp', 'pp', 0, 'pppnn', 'pp', 'pp', 'international', 0, 0, '66', 66, 69, 'y', 'others', 'y', 'y', 0, 0, 'pp', 'pp', 'pp', 0, 0, 'uploads/', 'pp', 'pp');

-- --------------------------------------------------------

--
-- Table structure for table `papersbyfaculty`
--

CREATE TABLE `papersbyfaculty` (
  `user_id` int(100) NOT NULL,
  `University` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Employee ID` int(100) NOT NULL,
  `other Author` varchar(100) NOT NULL,
  `Co-author` varchar(100) NOT NULL,
  `booktitle` varchar(100) NOT NULL,
  `journalname` varchar(100) NOT NULL,
  `conferenceName` varchar(100) NOT NULL,
  `conferencePaper` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `pubdate` int(100) NOT NULL,
  `pubyear` int(100) NOT NULL,
  `volume` int(100) NOT NULL,
  `pagefrom` int(100) NOT NULL,
  `pageto` int(100) NOT NULL,
  `scopus` enum('y','n') NOT NULL,
  `listedin` varchar(100) NOT NULL,
  `wos` enum('y','n') NOT NULL,
  `peer` enum('y','n') NOT NULL,
  `issn` int(100) NOT NULL,
  `isbn` int(100) NOT NULL,
  `pubname` varchar(100) NOT NULL,
  `affltn` varchar(100) NOT NULL,
  `corrauthor` varchar(100) NOT NULL,
  `citind` int(100) NOT NULL,
  `nocit` int(100) NOT NULL,
  `evdupload` varchar(100) NOT NULL,
  `othrinfo` varchar(100) NOT NULL,
  `ref` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `papersbyfaculty`
--

INSERT INTO `papersbyfaculty` (`user_id`, `University`, `Department`, `Faculty`, `Employee ID`, `other Author`, `Co-author`, `booktitle`, `journalname`, `conferenceName`, `conferencePaper`, `region`, `pubdate`, `pubyear`, `volume`, `pagefrom`, `pageto`, `scopus`, `listedin`, `wos`, `peer`, `issn`, `isbn`, `pubname`, `affltn`, `corrauthor`, `citind`, `nocit`, `evdupload`, `othrinfo`, `ref`) VALUES
(1, 'Amity', 'BTech', 'Teacher', 12, 'JK Rowling', 'Jane Austin', 'Goblet Of Fire', 'Goblet of Fire', 'Artificial Intelligence', 'ML', '0', 2024, 1988, 12, 12, 56, 'n', 'PubMed', 'y', 'y', 3456, 3456, 'JK Rowling', 'ICSE', 'Jane Austin', 198, 2, 'uploads/English_india.pdf', 'no info', 'reference'),
(2, 'Amity', 'BTech', 'Teacher', 12, 'JK Rowling', 'Harry Potter', 'Goblet Of Fire', 'Goblet of Fire', 'Artificial Intelligence', 'ML', 'International', 2024, 1988, 12, 12, 56, 'y', 'PubMed', 'n', 'n', 3456, 3456, 'JK Rowling', 'ICSE', 'Jane Austin', 198, 7, 'uploads/English_india.pdf', 'no info', 'reference'),
(3, 'Amity paper', 'BTechpaper', 'Teacher paper', 12, 'JK Rowling paper', 'Harry Potter paper', 'Goblet Of Fire paper', 'Goblet of Fire paper', 'mk', 'mk', 'International', 2024, 1988, 0, 12, 56, '', 'PubMed', '', '', 3456, 3456, 'JK Rowling', 'ICSE', 'Jane Austin', 0, 7, '', '', ''),
(4, 'pp', 'pp', 'pp', 22, 'pp', 'pp', '', '', '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0, 0, '', '', '', 0, 0, '', '', ''),
(5, 'nnnnn', 'nn', 'nn', 7, 'nn', 'nn', 'nn', 'nn', 'nnn', 'nn', 'international', 2024, 9999, 99, 99, 99, '', 'others', '', '', 0, 0, 'nn', 'nn', 'nn', 99, 99, 'uploads/', 'nn', 'nn');

-- --------------------------------------------------------

--
-- Table structure for table `registerinfo`
--

CREATE TABLE `registerinfo` (
  `emp_id` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `university` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `avatar_filename` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registerinfo`
--

INSERT INTO `registerinfo` (`emp_id`, `email`, `user_name`, `password`, `university`, `department`, `avatar_filename`) VALUES
('078', 'amannew@gmail.com', 'aman', '99', 'amity', 'BBA', 'amangdgfest.jpg'),
('12', 'shilpa.sinha3107@gmail.com', 'shilpa', 'abc', 'Amity University', 'Btech', 'calci.jpg'),
('123', 'test@gmail.com', 'test', 'ttttt', 'test', 'test', '2023-02-27 193522.jpg'),
('27170', 'pranjan@ptn.amity.edu', 'Preetish Ranjan', '12345678', 'Amity University Patna', 'ASET', ''),
('7', 'aman.choudhary9834@gmail.com', 'Aman Choudhary', 'aabbcc', 'amity', 'btech', 'IMG_20240329_230812.jpg'),
('77', 'amannew11@gmail.com', 'Aman Choudhary', '9999', 'Amity Patna', 'LAW', 'egs-saintsrow-deepsilvervolition-g1a-00-1920x1080-75eedb4b77d7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `researchpapersbyfaculty`
--

CREATE TABLE `researchpapersbyfaculty` (
  `user_id` int(100) NOT NULL,
  `University` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Employee ID` int(100) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `Co-author` varchar(100) NOT NULL,
  `papertitle` varchar(100) NOT NULL,
  `journalname` varchar(100) NOT NULL,
  `article` varchar(100) NOT NULL,
  `region` varchar(100) NOT NULL,
  `pubdate` int(100) NOT NULL,
  `pubyear` int(100) NOT NULL,
  `volume` int(100) NOT NULL,
  `pagefrom` int(100) NOT NULL,
  `pageto` int(100) NOT NULL,
  `impact` varchar(100) NOT NULL,
  `scopus` enum('y','n') NOT NULL,
  `listedin` varchar(100) NOT NULL,
  `wos` enum('y','n') NOT NULL,
  `peer` enum('y','n') NOT NULL,
  `issn` int(100) NOT NULL,
  `isbn` int(100) NOT NULL,
  `pubname` varchar(100) NOT NULL,
  `affltn` varchar(100) NOT NULL,
  `corrauthor` varchar(100) NOT NULL,
  `citind` int(100) NOT NULL,
  `nocit` int(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `evdupload` varchar(100) NOT NULL,
  `othrinfo` varchar(100) NOT NULL,
  `ref` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `researchpapersbyfaculty`
--

INSERT INTO `researchpapersbyfaculty` (`user_id`, `University`, `Department`, `Faculty`, `Employee ID`, `Author`, `Co-author`, `papertitle`, `journalname`, `article`, `region`, `pubdate`, `pubyear`, `volume`, `pagefrom`, `pageto`, `impact`, `scopus`, `listedin`, `wos`, `peer`, `issn`, `isbn`, `pubname`, `affltn`, `corrauthor`, `citind`, `nocit`, `link`, `evdupload`, `othrinfo`, `ref`) VALUES
(1, 'Amity patna University', 'BTech (CSE)', '', 7, '', '', '', '', '', '', 2024, 1988, 12, 12, 45, 'Impressive', '', 'PubMed', '', '', 3456, 3456, 'JK Rowling', 'ICSE', 'Jane Austin', 198, 0, '6', '', '', ''),
(2, 'Amity', 'BTech', '', 0, '', '', 'Goblet Of Fire', '', '', '', 2024, 2024, 2, 2, 12, '1.2', '', 'PubMed', '', '', 3456, 3456, 'JK Rowling', 'ICSE', 'Jane Austin', 198, 0, '45', '', '', ''),
(3, 'Amity', 'BTech', '', 7, '', '', 'Goblet Of Fire', '', '', '', 2024, 2024, 2, 2, 12, '1.2', '', 'PubMed', '', '', 3456, 3456, 'JK Rowling', 'ICSE', 'Jane Austin', 198, 0, '45', '', '', ''),
(4, 'amity', 'btech', 'ss', 0, 'ss', 'ss', 'ss', 'ss', '', '', 0, 0, 0, 0, 0, '', '', '', '', '', 0, 0, '', '', '', 0, 0, '', 'uploads/', '', ''),
(5, 'nnnnn', 'nn', 'nn', 0, 'nn', 'nnn', 'nnn', 'nnn', 'nnn', 'national', 2024, 99, 99, 99, 99, '', 'n', 'others', '', '', 0, 0, 'nn', 'nn', 'nn', 99, 99, '', 'uploads/', 'nn', 'nn'),
(6, 'nnnnn', 'nnnn', '', 0, '', '', 'nnn', '', 'nn', '', 0, 0, 99, 0, 0, '99', '', 'Others', '', '', 99, 99, 'nn', 'nn', 'nn', 99, 999, '', '', '', ''),
(7, 'Amity University Patna', 'ASET', 'Preetish Ranjan', 27170, 'Preetish Ranjan', 'Amit, Saurabh, Vishnu', 'Framework for social network analysis', 'IJDEC', '', 'international', 2024, 2024, 1, 3, 10, '2', 'y', 'others', 'y', 'y', 2312, 2231, 'IGI lobal', 'Amity University Patna', 'Preetish Ranjan', 4, 34, '', 'uploads/resume-aman.pdf', '', 'ABC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookchaptersbyfaculty`
--
ALTER TABLE `bookchaptersbyfaculty`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `booksbyfaculty`
--
ALTER TABLE `booksbyfaculty`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `papersbyfaculty`
--
ALTER TABLE `papersbyfaculty`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `registerinfo`
--
ALTER TABLE `registerinfo`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `researchpapersbyfaculty`
--
ALTER TABLE `researchpapersbyfaculty`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookchaptersbyfaculty`
--
ALTER TABLE `bookchaptersbyfaculty`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `booksbyfaculty`
--
ALTER TABLE `booksbyfaculty`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `papersbyfaculty`
--
ALTER TABLE `papersbyfaculty`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `researchpapersbyfaculty`
--
ALTER TABLE `researchpapersbyfaculty`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
