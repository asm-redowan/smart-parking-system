-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 18, 2022 at 11:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iotproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `token_nu` int(11) NOT NULL,
  `cuser_id` int(11) DEFAULT NULL,
  `suser_id` int(11) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `rfid` varchar(30) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`token_nu`, `cuser_id`, `suser_id`, `location`, `rfid`, `start_time`, `end_time`, `status`) VALUES
(7, 2000000, 1000000, 'Mirpur-10 Block - C', '2222222', '2022-09-20 02:00:00', '2022-09-19 02:00:00', 'paid'),
(8, 2000001, 1000000, 'Mirpur-10 Block - C', '258536684', '2022-09-19 03:12:04', '2022-09-19 03:12:04', 'unpaid'),
(9, 2000002, 1000000, 'Mirpur-11 Block - A', '1111111', '2022-09-18 03:12:25', '2022-09-18 03:12:25', 'unpaid'),
(10, 2000001, 1000000, 'Mirpur-10 Block - C', '2222222', '2022-09-19 03:36:39', '2022-09-20 03:36:39', 'unpaid'),
(12, 2000000, 1000000, 'Mirpur-10 Block - C', '778678767', '2022-09-18 03:49:00', '2022-09-18 03:49:00', 'paid'),
(13, 2000000, 1000000, 'Mirpur-10 Block - C', '3212354787', '2022-09-18 03:52:00', '2022-09-18 03:52:00', 'paid'),
(14, 2000000, 1000000, 'Mirpur-11 Block - A', '489898979479', '2022-09-18 20:58:00', '2022-09-20 20:58:00', 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `cuser_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`cuser_id`, `name`, `email`, `password`) VALUES
(2000000, 'Redowan Ahmed', 'rahmed@gmail.com', 'ahmed123'),
(2000001, 'a', 'a@gmail.com', '1234'),
(2000002, 'b', 'b@gmail.com', '1234'),
(2000003, 'c', 'c@gmail.com', '1234'),
(2000004, 'mikel jack', 'mj@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `parking_spot`
--

CREATE TABLE `parking_spot` (
  `suser_id` int(11) NOT NULL,
  `location` varchar(30) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parking_spot`
--

INSERT INTO `parking_spot` (`suser_id`, `location`, `name`) VALUES
(1000000, 'Bosundhara', 'Jamuna Parking Area'),
(1000000, 'Mirpur-10 Block - C', 'Mirpur 10 Parking Zone'),
(1000000, 'Mirpur-11 Block - A', 'Bangabandhu Parking Zone'),
(1000000, 'New Market', 'Abar Asben Parking'),
(1000000, 'New Market Road', 'Hi Hello Parking'),
(1000000, 'Notun Bazar', 'Notun Bazar Parking Zone'),
(1000001, 'Mirpur-12 Block - A', 'Zia Parking Zone');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `cuser_id` int(11) NOT NULL,
  `token_nu` int(11) NOT NULL,
  `payment` int(11) DEFAULT NULL,
  `trxid` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`cuser_id`, `token_nu`, `payment`, `trxid`) VALUES
(2000000, 12, 0, '423238'),
(2000000, 13, 0, '423239'),
(2000000, 14, 12000, '144');

-- --------------------------------------------------------

--
-- Table structure for table `rfid`
--

CREATE TABLE `rfid` (
  `suser_id` int(11) NOT NULL,
  `location` varchar(30) NOT NULL,
  `rfid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rfid`
--

INSERT INTO `rfid` (`suser_id`, `location`, `rfid`) VALUES
(1000000, 'Mirpur-10 Block - C', '2222222'),
(1000000, 'Mirpur-10 Block - C', '258536684'),
(1000000, 'Mirpur-10 Block - C', '3212354787'),
(1000000, 'Mirpur-10 Block - C', '778678767'),
(1000000, 'Mirpur-11 Block - A', '1111111'),
(1000000, 'Mirpur-11 Block - A', '489898979479'),
(1000000, 'Mirpur-11 Block - A', '6788'),
(1000000, 'New Market Road', '7899565');

-- --------------------------------------------------------

--
-- Table structure for table `service_provider`
--

CREATE TABLE `service_provider` (
  `suser_id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_provider`
--

INSERT INTO `service_provider` (`suser_id`, `name`, `email`, `password`) VALUES
(1000000, 'abc', 'abc@gmail.com', '1234'),
(1000001, 'def', 'def@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `servo`
--

CREATE TABLE `servo` (
  `suser_id` int(11) NOT NULL,
  `location` varchar(30) NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `servo`
--

INSERT INTO `servo` (`suser_id`, `location`, `status`) VALUES
(1000000, 'Mirpur-10 Block - C', 'ON'),
(1000000, 'Mirpur-11 Block - A', 'ON');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`token_nu`),
  ADD KEY `fk_rfid` (`suser_id`,`location`,`rfid`),
  ADD KEY `fk_client` (`cuser_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`cuser_id`);

--
-- Indexes for table `parking_spot`
--
ALTER TABLE `parking_spot`
  ADD PRIMARY KEY (`suser_id`,`location`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`cuser_id`,`token_nu`),
  ADD KEY `fk_booking` (`token_nu`);

--
-- Indexes for table `rfid`
--
ALTER TABLE `rfid`
  ADD PRIMARY KEY (`suser_id`,`location`,`rfid`);

--
-- Indexes for table `service_provider`
--
ALTER TABLE `service_provider`
  ADD PRIMARY KEY (`suser_id`);

--
-- Indexes for table `servo`
--
ALTER TABLE `servo`
  ADD PRIMARY KEY (`suser_id`,`location`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `token_nu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `cuser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2000005;

--
-- AUTO_INCREMENT for table `service_provider`
--
ALTER TABLE `service_provider`
  MODIFY `suser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000002;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`cuser_id`) REFERENCES `client` (`cuser_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rfid` FOREIGN KEY (`suser_id`,`location`,`rfid`) REFERENCES `rfid` (`suser_id`, `location`, `rfid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parking_spot`
--
ALTER TABLE `parking_spot`
  ADD CONSTRAINT `fk_service_provider` FOREIGN KEY (`suser_id`) REFERENCES `service_provider` (`suser_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_booking` FOREIGN KEY (`token_nu`) REFERENCES `booking` (`token_nu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_client_payment` FOREIGN KEY (`cuser_id`) REFERENCES `client` (`cuser_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rfid`
--
ALTER TABLE `rfid`
  ADD CONSTRAINT `fk_parking_spot` FOREIGN KEY (`suser_id`,`location`) REFERENCES `parking_spot` (`suser_id`, `location`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `servo`
--
ALTER TABLE `servo`
  ADD CONSTRAINT `fk_parking_spot_servo` FOREIGN KEY (`suser_id`,`location`) REFERENCES `parking_spot` (`suser_id`, `location`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
