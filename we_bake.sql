-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 09:24 AM
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
-- Database: `we bake`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Name` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `contactNo` int(14) NOT NULL,
  `ActiveState` tinyint(1) NOT NULL DEFAULT 1,
  `Address` varchar(100) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deliveryvehicles`
--

CREATE TABLE `deliveryvehicles` (
  `registrationnumber` varchar(13) NOT NULL,
  `type` varchar(10) NOT NULL,
  `capacity` int(20) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `vehicleno` int(11) NOT NULL,
  `chassinumber` varchar(20) NOT NULL,
  `enginenumber` varchar(20) NOT NULL,
  `modelname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `ID` int(11) NOT NULL,
  `from` varchar(20) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `outlet`
--

CREATE TABLE `outlet` (
  `DOS` date NOT NULL,
  `contactNo` int(14) NOT NULL,
  `ActiveState` tinyint(1) NOT NULL DEFAULT 1,
  `Address` varchar(100) NOT NULL,
  `OutletID` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Manager` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `ordertype` varchar(20) NOT NULL,
  `initialpayment` int(11) NOT NULL,
  `finalpayment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productitem`
--

CREATE TABLE `productitem` (
  `itemid` int(11) NOT NULL,
  `retailprice` int(11) NOT NULL,
  `stockprice` int(11) NOT NULL,
  `itemdescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productorder`
--

CREATE TABLE `productorder` (
  `orderid` int(11) NOT NULL,
  `placeby` varchar(20) NOT NULL,
  `orderdate` date NOT NULL,
  `paymetstatus` varchar(20) NOT NULL,
  `deliverystatus` varchar(20) NOT NULL DEFAULT '0',
  `orderstatus` varchar(20) NOT NULL,
  `total` int(11) NOT NULL,
  `deliverby` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productorderline`
--

CREATE TABLE `productorderline` (
  `shoppingIid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(5) NOT NULL,
  `itemid` int(20) NOT NULL,
  `totalprice` int(20) NOT NULL,
  `orderid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stockorder`
--

CREATE TABLE `stockorder` (
  `ID` int(11) NOT NULL,
  `from` varchar(20) NOT NULL,
  `ondate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stockorderline`
--

CREATE TABLE `stockorderline` (
  `id` int(11) NOT NULL,
  `stockorderid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `minimum` int(10) NOT NULL,
  `critical` int(10) NOT NULL,
  `available` int(10) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `expierydate` date NOT NULL,
  `supplier` int(20) NOT NULL,
  `itemcode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppllier`
--

CREATE TABLE `suppllier` (
  `id` int(11) NOT NULL,
  `contactno` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `Ratings` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplyorderline`
--

CREATE TABLE `supplyorderline` (
  `id` int(11) NOT NULL,
  `supplyorderid` int(10) NOT NULL,
  `itemname` varchar(20) NOT NULL,
  `itemcode` varchar(20) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplyrequest`
--

CREATE TABLE `supplyrequest` (
  `supplyorderid` int(11) NOT NULL,
  `expectdeliverydate` date NOT NULL,
  `supplyorderstatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `systemuser`
--

CREATE TABLE `systemuser` (
  `Name` varchar(100) NOT NULL,
  `NIC` varchar(11) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `contactNo` int(14) NOT NULL,
  `ActiveState` tinyint(1) NOT NULL DEFAULT 1,
  `Address` varchar(100) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `UserName` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `systemuser`
--
DELIMITER $$
CREATE TRIGGER `GenerateGenericUserIDBefore` BEFORE INSERT ON `systemuser` FOR EACH ROW BEGIN
  DECLARE role_prefix VARCHAR(2);
  DECLARE next_id INT;
  
  SET role_prefix = SUBSTRING(NEW.Role, 1, 2);
  
  SELECT COALESCE(MAX(SUBSTRING(`UserID`, 3)) + 1, 1) INTO next_id FROM `systemuser` WHERE `Role` = NEW.Role;
  
  SET NEW.UserID = CONCAT(role_prefix, LPAD(next_id, 3, '0'));
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`UserName`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `deliveryvehicles`
--
ALTER TABLE `deliveryvehicles`
  ADD PRIMARY KEY (`vehicleno`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `from` (`from`);

--
-- Indexes for table `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`OutletID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Manager` (`Manager`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productitem`
--
ALTER TABLE `productitem`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `productorder`
--
ALTER TABLE `productorder`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `productorderline`
--
ALTER TABLE `productorderline`
  ADD PRIMARY KEY (`shoppingIid`);

--
-- Indexes for table `stockorder`
--
ALTER TABLE `stockorder`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `stockorderline`
--
ALTER TABLE `stockorderline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppllier`
--
ALTER TABLE `suppllier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplyorderline`
--
ALTER TABLE `supplyorderline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplyrequest`
--
ALTER TABLE `supplyrequest`
  ADD PRIMARY KEY (`supplyorderid`);

--
-- Indexes for table `systemuser`
--
ALTER TABLE `systemuser`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `unique_uname` (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deliveryvehicles`
--
ALTER TABLE `deliveryvehicles`
  MODIFY `vehicleno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productitem`
--
ALTER TABLE `productitem`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productorder`
--
ALTER TABLE `productorder`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productorderline`
--
ALTER TABLE `productorderline`
  MODIFY `shoppingIid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stockorderline`
--
ALTER TABLE `stockorderline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppllier`
--
ALTER TABLE `suppllier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplyorderline`
--
ALTER TABLE `supplyorderline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplyrequest`
--
ALTER TABLE `supplyrequest`
  MODIFY `supplyorderid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `systemuser`
--
ALTER TABLE `systemuser`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD CONSTRAINT `inquiries_ibfk_1` FOREIGN KEY (`from`) REFERENCES `systemusers` (`UserName`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
