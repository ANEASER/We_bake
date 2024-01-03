-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 02:31 PM
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
  `imagelink` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productitem`
--

INSERT INTO `productitem` (`itemid`, `retailprice`, `stockprice`, `itemdescription`, `itemname`, `unit`, `category`, `Itemcode`, `imagelink`) VALUES
(31, 5, 4, 'Pizza with chicken', 'Chiken Pizza', '', 'Pizza', 'PZ00031', ''),
(32, 12, 3, 'jgfkkjg', 'BreadR', '', 'Bread', 'BR00032', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productitem`
--
ALTER TABLE `productitem`
  ADD PRIMARY KEY (`itemid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productitem`
--
ALTER TABLE `productitem`
  MODIFY `itemid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
