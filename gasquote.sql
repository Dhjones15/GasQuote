-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2020 at 05:12 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gasquote`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_info`
--

CREATE TABLE `client_info` (
  `username` varchar(20) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_info`
--

INSERT INTO `client_info` (`username`, `client_name`, `address1`, `address2`, `city`, `state`, `zip`) VALUES
('bob', 'bob mike', '123asd', NULL, 'houston', 'tx', '1234'),
('bob123', 'bob billy', '404 lane', '', 'Houston', 'TX', '77777');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_quote`
--

CREATE TABLE `fuel_quote` (
  `username` varchar(20) NOT NULL,
  `quote_id` int(11) NOT NULL,
  `gallons_requested` int(11) NOT NULL,
  `delivery_date` date NOT NULL,
  `suggested_price` double NOT NULL,
  `amount_due` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fuel_quote`
--

INSERT INTO `fuel_quote` (`username`, `quote_id`, `gallons_requested`, `delivery_date`, `suggested_price`, `amount_due`) VALUES
('bob', 3, 213, '2020-04-09', 0, 0),
('bob', 4, 123, '2020-04-23', 0, 0),
('bob', 5, 222222, '2020-04-02', 0, 0),
('bob', 6, 2147483647, '2020-04-03', 0, 0),
('bob', 7, 22, '2020-04-03', 33, 0),
('bob', 8, 22, '2020-04-18', 33, 34),
('bob', 9, 123, '2020-04-09', 184.5, 185.5),
('bob123', 27, 12, '2021-05-02', 123, 4233);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('bob', '123'),
('bob123', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_info`
--
ALTER TABLE `client_info`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `fuel_quote`
--
ALTER TABLE `fuel_quote`
  ADD PRIMARY KEY (`quote_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fuel_quote`
--
ALTER TABLE `fuel_quote`
  MODIFY `quote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_info`
--
ALTER TABLE `client_info`
  ADD CONSTRAINT `client_info_ibfk_1` FOREIGN KEY (`username`) REFERENCES `login` (`username`);

--
-- Constraints for table `fuel_quote`
--
ALTER TABLE `fuel_quote`
  ADD CONSTRAINT `fuel_quote_ibfk_1` FOREIGN KEY (`username`) REFERENCES `login` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
