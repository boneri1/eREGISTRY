-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2023 at 03:48 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phone_ms`
--

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

CREATE TABLE `phone` (
  `PhoneId` int(11) NOT NULL,
  `ImeiNumber_1` varchar(30) NOT NULL,
  `ImeiNumber_2` varchar(30) NOT NULL,
  `Brand` varchar(20) NOT NULL,
  `Model` varchar(20) NOT NULL,
  `DateOfPurchase` date NOT NULL,
  `priceOfPhone` int(11) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `PhoneStatus` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phone`
--

INSERT INTO `phone` (`PhoneId`, `ImeiNumber_1`, `ImeiNumber_2`, `Brand`, `Model`, `DateOfPurchase`, `priceOfPhone`, `Description`, `PhoneStatus`, `Email`) VALUES
(3, '12345678091', '12232473749', 'Sumsun', 'Hwan', '2023-07-27', 250000, 'white', 'Storen', 'jadowacu@gmail.com'),
(5, '12345678090', '', 'Galaxy', 'china', '2023-07-26', 700000, 'black', 'Active', 'jadowacu@gmail.com'),
(6, '12345678090', '', 'Galaxy', 'china', '2023-07-26', 300000, 'black', 'Active', 'jadowacu@gmail.com'),
(7, '12345678090', '1223247y3748', 'Tekno', 'Huawei', '2023-07-27', 12000, 'yeloow', 'Active', 'jadowacu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Password` varchar(8) NOT NULL,
  `ContactInfo` varchar(10) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `NationalId` varchar(16) NOT NULL,
  `Address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `FirstName`, `LastName`, `Password`, `ContactInfo`, `Email`, `NationalId`, `Address`) VALUES
(1, 'Niyonshuti', 'Jean de dieu', '123', '0783339580', 'jadowacu@gmail.com', '1234567890234567', 'Kayonza'),
(2, 'Patrick', 'Hagena', '$2y$10$3', '0783339580', 'jean@gmail.com', '1200234567891234', 'Karenge');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`PhoneId`),
  ADD KEY `UserId` (`Email`),
  ADD KEY `Email` (`Email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `Email_2` (`Email`),
  ADD KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `phone`
--
ALTER TABLE `phone`
  MODIFY `PhoneId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`Email`) REFERENCES `users` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
