-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 09:49 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` varchar(20) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Pswd` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Name`, `Pswd`) VALUES
('1', 'cat', '123');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `User_Name` varchar(20) NOT NULL,
  `Pswd` varchar(20) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Gender` enum('F','M','O') DEFAULT NULL,
  `Phone` varchar(13) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Aadhar_No` varchar(30) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`User_Name`, `Pswd`, `Email`, `Gender`, `Phone`, `Age`, `Aadhar_No`, `Address`, `name`) VALUES
('chathu', '1234', 'gayi@gmail.com', NULL, '6258965895', 20, '', 'tpt', 'ch5_Intermediate Representation  (2 files merged).pdf'),
('gayatri', 'Gayu@123', 'gayatri@gmail.com', 'F', '7845963255', 20, '448958965878', 'bengaluru', 'CD.pdf'),
('sanju', 'Sanju@123', 'gayi@gmail.com', 'F', '6258965895', 19, '789555552222', 'tpt', 'signup page.docx');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `review` varchar(255) NOT NULL,
  `rating` enum('1','2','3','4','5') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `username`, `review`, `rating`) VALUES
(1, 'chathu', 'nice', '3'),
(2, 'chathu', 'good', '3'),
(3, 'chathu', 'good', '3'),
(4, 'chathu', 'good', '3'),
(5, 'gayatri', 'nice', '3'),
(6, 'gayatri', 'very nice', '3'),
(7, 'chathu', 'very nice', '5');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Type`) VALUES
('aaa'),
('Paytm'),
('qqq'),
('sbi');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `Book_ID` int(30) NOT NULL,
  `Train_ID` varchar(20) DEFAULT NULL,
  `Book_Time` datetime DEFAULT NULL,
  `User_Name` varchar(20) DEFAULT NULL,
  `Payment_Type` varchar(20) DEFAULT NULL,
  `Dep_Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`Book_ID`, `Train_ID`, `Book_Time`, `User_Name`, `Payment_Type`, `Dep_Time`) VALUES
(18, 'M1', '2021-03-17 11:28:30', 'chathu', 'Paytm', '2021-04-02 12:00:00'),
(19, 'M1', '2021-03-17 18:28:58', 'chathu', 'Paytm', '2021-04-02 12:00:00'),
(20, 'M1', '2021-03-18 12:06:27', 'chathu', 'Paytm', '2021-04-02 12:00:00'),
(22, 'm3', '2021-04-06 18:19:45', 'sanju', 'Paytm', '2021-04-07 21:43:04'),
(23, 'M1', '2021-04-12 09:14:48', 'gayatri', 'Paytm', '2021-04-12 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tnames`
--

CREATE TABLE `tnames` (
  `Train_Name` varchar(20) NOT NULL,
  `Seats` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tnames`
--

INSERT INTO `tnames` (`Train_Name`, `Seats`) VALUES
('JupiterA', 200),
('MercuryA', 100),
('NeptuneA', 200),
('PlutoA', 150),
('SaturnA', 150),
('VenusA', 100);

-- --------------------------------------------------------

--
-- Table structure for table `total`
--

CREATE TABLE `total` (
  `user_name` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `amt` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `Train_ID` varchar(20) NOT NULL,
  `Dep_Time` datetime NOT NULL,
  `Arr_Time` datetime DEFAULT NULL,
  `Train_Name` varchar(20) DEFAULT NULL,
  `Src` varchar(20) DEFAULT NULL,
  `Dstn` varchar(20) DEFAULT NULL,
  `Dep_Date` date NOT NULL,
  `Fare` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`Train_ID`, `Dep_Time`, `Arr_Time`, `Train_Name`, `Src`, `Dstn`, `Dep_Date`, `Fare`) VALUES
('M1', '2021-04-12 12:00:00', '2021-04-13 14:00:00', 'MercuryA', 'A', 'B', '2021-04-13', NULL),
('M2', '2021-04-01 12:00:00', '2021-04-01 14:00:00', 'MercuryA', 'Bangalore', 'Delhi', '2021-04-01', NULL),
('m3', '2021-04-07 21:43:04', '2021-04-07 21:43:04', 'JupiterA', 'tirupati', 'kaiga', '2021-04-06', 200);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `wallet_id` int(20) NOT NULL,
  `Type` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `wallet_amt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`wallet_id`, `Type`, `username`, `wallet_amt`) VALUES
(1, 'sbi', 'chathu', 123),
(2, 'Paytm', 'chathu', 100),
(3, 'qqq', 'chathu', 123),
(4, 'Paytm', 'sanju', 5000),
(9, 'sbi', 'sanju', 2000),
(10, 'sbi', 'sanju', 2000),
(11, 'sbi', 'sanju', 2000),
(12, 'sbi', 'sanju', 2000),
(13, 'sbi', 'sanju', 2000),
(18, 'qqq', 'sanju', 250),
(19, 'qqq', 'sanju', 250),
(20, 'qqq', 'sanju', 250);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`User_Name`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Type`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`Book_ID`),
  ADD KEY `Flight_ID` (`Train_ID`),
  ADD KEY `User_Name` (`User_Name`),
  ADD KEY `Payment_Type` (`Payment_Type`);

--
-- Indexes for table `tnames`
--
ALTER TABLE `tnames`
  ADD PRIMARY KEY (`Train_Name`);

--
-- Indexes for table `total`
--
ALTER TABLE `total`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_name` (`user_name`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`Train_ID`,`Dep_Time`),
  ADD KEY `Plane_Name` (`Train_Name`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`wallet_id`),
  ADD KEY `username` (`username`),
  ADD KEY `Type` (`Type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `Book_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `total`
--
ALTER TABLE `total`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wallet_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`username`) REFERENCES `customer` (`User_Name`);

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_ibfk_1` FOREIGN KEY (`Train_ID`) REFERENCES `trains` (`Train_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `records_ibfk_2` FOREIGN KEY (`User_Name`) REFERENCES `customer` (`User_Name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `records_ibfk_3` FOREIGN KEY (`Payment_Type`) REFERENCES `payment` (`Type`) ON UPDATE CASCADE;

--
-- Constraints for table `total`
--
ALTER TABLE `total`
  ADD CONSTRAINT `total_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `customer` (`User_Name`);

--
-- Constraints for table `trains`
--
ALTER TABLE `trains`
  ADD CONSTRAINT `trains_ibfk_1` FOREIGN KEY (`Train_Name`) REFERENCES `tnames` (`Train_Name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`username`) REFERENCES `customer` (`User_Name`),
  ADD CONSTRAINT `wallet_ibfk_2` FOREIGN KEY (`Type`) REFERENCES `payment` (`Type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
