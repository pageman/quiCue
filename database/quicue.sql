-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2016 at 07:22 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quicue`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `adminId` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `telephoneNumber` varchar(10) DEFAULT NULL,
  `mobileNumber` varchar(13) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminId`, `type`, `address`, `name`, `username`, `password`, `telephoneNumber`, `mobileNumber`) VALUES
(6, 'Hospital', '98 P. Rosales, Pateros, 1621 Metro Manila, Philippines', 'Anjo''s Hospital', 'anjo', '*4781811F52EACA096228E0002AC06AF09F9E1CB6', '7349429970', '9268731278');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `logId` int(11) NOT NULL,
  `adminId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `address` varchar(90) DEFAULT NULL,
  `timeReceived` varchar(8) DEFAULT NULL,
  `dateReceived` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logId`, `adminId`, `userId`, `message`, `address`, `timeReceived`, `dateReceived`, `status`) VALUES
(7, 6, 50, 'I am about to release my baby! Please help! I am with no one at home.', 'Pateros Metro Manila Philippines', '07:23:27', '0000-00-00', 1),
(30, 6, 50, 'this', 'C. Raymundo Ave, Pasig, Metro Manila, Philippines', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL,
  `phoneNumber` varchar(13) DEFAULT NULL,
  `verificationCode` varchar(32) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `phoneNumber`, `verificationCode`, `status`) VALUES
(50, '639268731278', '7608', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logId`),
  ADD KEY `adminId` (`adminId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `admins` (`adminId`),
  ADD CONSTRAINT `logs_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
