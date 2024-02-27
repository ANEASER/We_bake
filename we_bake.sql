-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 05:06 PM
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
  `Password` varchar(199) NOT NULL,
  `DOB` date NOT NULL,
  `contactNo` int(14) NOT NULL,
  `ActiveState` tinyint(1) NOT NULL DEFAULT 1,
  `Address` varchar(100) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Name`, `Password`, `DOB`, `contactNo`, `ActiveState`, `Address`, `UserName`, `Email`) VALUES
('amal', '1234', '2023-09-12', 0, 1, 'sfsdfgv sfgfgdfg rfgdfg', 'dumal', 'anuatyake@gmail.com'),
('Ruwan', '$2y$10$X5yQtk1cVwKpm.ZDE.Ks0.Y04ODH1omWgB9Y38k9tPPdS3H5DYDSO', '2024-01-23', 782567545, 1, 'F 109', 'ruwan', 'anudaattanayake@gmail.com');

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

--
-- Dumping data for table `deliveryvehicles`
--

INSERT INTO `deliveryvehicles` (`registrationnumber`, `type`, `capacity`, `availability`, `vehicleno`, `chassinumber`, `enginenumber`, `modelname`) VALUES
('CAR-33434', 'CAB', 5, 0, 12, '1233123123', '1231231', 'Dolphin'),
('LC-6464', 'Truck', 18, 1, 13, '1233123123', '324234', '2342342'),
('CAD-1234', 'Bus', 6, 1, 14, '12323112', '21234321', '21312343');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `comment` varchar(255) NOT NULL,
  `inquiryid` int(10) NOT NULL,
  `placeby` varchar(40) NOT NULL,
  `address` varchar(90) NOT NULL,
  `inquirysubject` varchar(50) NOT NULL,
  `inquirytext` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`comment`, `inquiryid`, `placeby`, `address`, `inquirysubject`, `inquirytext`) VALUES
('', 1, 'ruwan', 'F 109', 'Suggestion', 'qsdwsd sdsadfsdf');

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
  `initialorfinal` varchar(15) NOT NULL,
  `link` varchar(160) NOT NULL,
  `amount` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productitem`
--

CREATE TABLE `productitem` (
  `itemid` int(11) NOT NULL,
  `retailprice` int(11) NOT NULL,
  `stockprice` int(11) NOT NULL,
  `itemdescription` varchar(255) NOT NULL,
  `itemname` varchar(45) NOT NULL,
  `unit` varchar(5) NOT NULL,
  `category` varchar(45) NOT NULL,
  `Itemcode` varchar(45) NOT NULL,
  `imagelink` varchar(20) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productitem`
--

INSERT INTO `productitem` (`itemid`, `retailprice`, `stockprice`, `itemdescription`, `itemname`, `unit`, `category`, `Itemcode`, `imagelink`, `availability`) VALUES
(31, 5, 4, 'Pizza with chicken', 'Chiken Pizza', '', 'Bread', 'PZ00031', '', 0),
(32, 12, 3, 'jgfkkjg', 'BreadR', '', 'Doughnuts', 'BR00032', '', 1),
(35, 4, 4, 'sdfsdfsf', 'Bread', '', 'Bread', 'BR00033', 'BR00033.png', 1),
(36, 5, 4, 'jgkgkg', 'sandwich', '', 'Sandwiches', 'SW00036', 'SW00036.png', 1),
(37, 5, 3, '.khhl', 'cutepie', '', 'Pies', 'PI00037', 'PI00037.png', 1),
(39, 5, 3, 'gfdhh', 'SweetBread', '', 'Bread', 'BR00039', 'BR00039.png', 1),
(40, 4, 1, 'sdfs', 'FishBun', '', 'Buns', 'BN00040', 'BN00040.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `productorder`
--

CREATE TABLE `productorder` (
  `orderid` int(11) NOT NULL,
  `placeby` varchar(20) NOT NULL,
  `orderdate` date NOT NULL,
  `paymentstatus` varchar(20) NOT NULL,
  `deliverystatus` varchar(20) NOT NULL DEFAULT '0',
  `orderstatus` varchar(20) NOT NULL,
  `total` int(11) NOT NULL,
  `deliverby` varchar(20) NOT NULL,
  `deliver_address` varchar(120) NOT NULL,
  `unique_id` varchar(20) NOT NULL,
  `pickername` varchar(45) NOT NULL,
  `orderref` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productorder`
--

INSERT INTO `productorder` (`orderid`, `placeby`, `orderdate`, `paymentstatus`, `deliverystatus`, `orderstatus`, `total`, `deliverby`, `deliver_address`, `unique_id`, `pickername`, `orderref`) VALUES
(18, 'dumal', '2024-01-17', 'pending', 'delivery', 'finished', 15, '13', 'Jaffna', '6597b77065510', 'picker2', 'CP0000018'),
(19, 'dumal', '2024-01-19', 'pending', 'delivery', 'pending', 42, '', 'fre dfhfjk', '659abfde826e9', 'picker1', 'CP0000019'),
(22, '', '2024-01-16', 'pending', 'delivery', 'pending', 40, '', 'wdfwdfwf', '659e531281e4b', 'picker1', 'CP0000020'),
(26, 'ruwan', '2024-01-19', 'pending', 'delivery', 'pending', 64, '', 'wdfwdfwf', '65a7557958c69', 'picker2', 'CD0000026'),
(27, 'ruwan', '2024-01-19', 'pending', 'delivery', 'pending', 16, '', 'Jaffna', '65a7604765592', 'amalpicker', 'CD0000027'),
(28, 'ruwan', '2024-01-19', 'pending', 'delivery', 'pending', 15, '', 'fre dfhfjk', '65a761958a768', 'amalpicker', 'CD0000028'),
(29, 'ruwan', '2024-01-21', 'pending', 'delivery', 'pending', 15, '', 'fre dfhfjk', '65a761acb79be', 'picker2', 'CD0000029');

-- --------------------------------------------------------

--
-- Table structure for table `productorderline`
--

CREATE TABLE `productorderline` (
  `shoppingid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(5) NOT NULL,
  `itemid` int(20) NOT NULL,
  `totalprice` int(20) NOT NULL,
  `unique_id` varchar(20) NOT NULL,
  `price` int(20) NOT NULL,
  `Itemcode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productorderline`
--

INSERT INTO `productorderline` (`shoppingid`, `quantity`, `unit`, `itemid`, `totalprice`, `unique_id`, `price`, `Itemcode`) VALUES
(45, 8, '', 36, 40, '659e531281e4b', 5, 'SW00036'),
(46, 4, '', 40, 16, '659e7d6509276', 4, 'BN00040'),
(47, 4, '', 37, 20, '659e7d6509276', 5, 'PI00037'),
(48, 4, '', 36, 20, '65a40338e6900', 5, 'SW00036'),
(49, 3, '', 37, 15, '65a7550f8996d', 5, 'PI00037'),
(50, 3, '', 37, 15, '65a7554bf12a5', 5, 'PI00037'),
(51, 4, '', 32, 48, '65a7557958c69', 12, 'BR00032'),
(52, 4, '', 35, 16, '65a7557958c69', 4, 'BR00033'),
(53, 4, '', 40, 16, '65a7604765592', 4, 'BN00040'),
(54, 3, '', 37, 15, '65a761958a768', 5, 'PI00037'),
(55, 3, '', 36, 15, '65a761acb79be', 5, 'SW00036');

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
  `Ratings` int(11) NOT NULL DEFAULT 0,
  `address` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppllier`
--

INSERT INTO `suppllier` (`id`, `contactno`, `name`, `email`, `Ratings`, `address`) VALUES
(1, 78563423, 'Supplier 2', 'seba@abc.com', 4, 'Colombo'),
(2, 7856342, 'Supplier 3', 'sahan@email.com', 5, 'Ranwala'),
(3, 7856342, 'Samantha', 'sadun1@efg.com', 5, 'kottawa');

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
  `Password` varchar(200) NOT NULL,
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
-- Dumping data for table `systemuser`
--

INSERT INTO `systemuser` (`Name`, `NIC`, `Password`, `DOB`, `contactNo`, `ActiveState`, `Address`, `UserID`, `Role`, `UserName`, `Email`) VALUES
('admin', '99191166f', 'password', '2023-11-15', 1231231312, 1, 'sdsd sdsd ', 107, 'admin', 'admin', 'admin@gmail.com'),
('pm', '20023231', '1234', '2008-01-01', 782695334, 1, 'Kegalle', 108, 'productionmanager', 'production', 'ruwanda@gmail.com'),
('recieptionist', '1234', '1234', '2023-11-29', 756695545, 1, 'Gampaha', 113, 'receptionist', 'recieption', 'praveen@gmail.com'),
('storemanager', '123123112', '1234', '2014-01-02', 756695545, 1, 'Colombo', 114, 'storemanager', 'store', 'mahesh@gmail.com'),
('outletmanager', '1231231', '1234', '2023-11-06', 783478374, 1, 'Kandy', 117, 'outletmanager', 'outlet', 'nadub@gami.com'),
('bill', '1231231', '1234', '2023-12-05', 76795545, 1, 'Anuradhapura', 121, 'billingclerk', 'billingcle', 'billing@gmail.com');

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
  ADD PRIMARY KEY (`inquiryid`);

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
  ADD PRIMARY KEY (`shoppingid`);

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
  MODIFY `vehicleno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `inquiryid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `productitem`
--
ALTER TABLE `productitem`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `productorder`
--
ALTER TABLE `productorder`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `productorderline`
--
ALTER TABLE `productorderline`
  MODIFY `shoppingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
