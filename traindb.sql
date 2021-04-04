-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2021 at 03:10 PM
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
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`User_Name`, `Pswd`, `Email`, `Gender`, `Phone`, `Age`, `Aadhar_No`, `Address`) VALUES
('chathu', '1234', 'chathu', NULL, 'asd', 20, '', 'asd');

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
(20, 'M1', '2021-03-18 12:06:27', 'chathu', 'Paytm', '2021-04-02 12:00:00');

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
('M1', '2021-04-02 12:00:00', '2021-04-02 14:00:00', 'MercuryA', 'A', 'B', '2021-04-02', NULL),
('M2', '2021-04-01 12:00:00', '2021-04-01 14:00:00', 'MercuryA', 'Bangalore', 'Delhi', '2021-04-01', NULL);

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
(3, 'qqq', 'chathu', 123);

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
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `Book_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wallet_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_ibfk_1` FOREIGN KEY (`Train_ID`) REFERENCES `trains` (`Train_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `records_ibfk_2` FOREIGN KEY (`User_Name`) REFERENCES `customer` (`User_Name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `records_ibfk_3` FOREIGN KEY (`Payment_Type`) REFERENCES `payment` (`Type`) ON UPDATE CASCADE;

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

--  for upload file option in customer 
-- make sure to add uploads in your file to make this work :)
ALTER TABLE 'customer' ADD 'name' VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL AFTER 'Address';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
