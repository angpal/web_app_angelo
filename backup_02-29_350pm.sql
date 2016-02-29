-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2016 at 06:51 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_sample_angelo`
--
CREATE DATABASE IF NOT EXISTS `database_sample_angelo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `database_sample_angelo`;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--
-- Creation: Feb 28, 2016 at 10:53 PM
--

CREATE TABLE `car` (
  `stock_no` int(11) NOT NULL COMMENT 'Unique ID, containing letters &/or characters,',
  `availability` enum('In Stock','SOLD') NOT NULL DEFAULT 'In Stock' COMMENT 'Indicates if car is on the Lot or has been sold',
  `manufacturer_id` enum('Holden','Mazda','Ford','Nissan','Audi','Toyota','Mitsubishi') NOT NULL COMMENT 'Name of the company manufaturing the vehicle',
  `category_id` enum('Sedan','Stationwagon','SUV','4WD','Hatch') NOT NULL,
  `model` varchar(50) NOT NULL COMMENT 'The model of car made by the manufacturer',
  `year` year(4) NOT NULL COMMENT 'The year the car was made',
  `price` int(6) NOT NULL COMMENT 'The sale price of the veicle',
  `kilometers` int(7) NOT NULL COMMENT 'The number of kilometer displayed by the odometer',
  `colour` varchar(20) NOT NULL COMMENT 'The colour of the vehicle',
  `registration` varchar(6) NOT NULL COMMENT 'The registration no.  of the vehicle (if still registered)',
  `vin` varchar(20) NOT NULL COMMENT 'Unique ID placed in engine bay by the manufacturer',
  `cylinders` enum('4','6','8','other') NOT NULL COMMENT 'The number of cylinders',
  `fuel` enum('unleaded','e10','diesel','bio-diesel','LPG') NOT NULL COMMENT 'The type of fuel used by the vehicle',
  `transmission` enum('automatic','manual','','') NOT NULL COMMENT 'The gearing system (type of gearbox)',
  `specials` tinyint(1) NOT NULL COMMENT 'Displays/Identifies vehicles on special'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Technicle specifications of the vehicle';

--
-- RELATIONS FOR TABLE `car`:
--   `manufacturer_id`
--       `manufacturer_id` -> `manufacturer_id`
--   `category_id`
--       `category` -> `category_id`
--

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`stock_no`, `availability`, `manufacturer_id`, `category_id`, `model`, `year`, `price`, `kilometers`, `colour`, `registration`, `vin`, `cylinders`, `fuel`, `transmission`, `specials`) VALUES
(1, 'SOLD', 'Holden', 'Sedan', 'Commodore', 2014, 24999, 25902, 'Blue', '254HTS', '123365456987324', '6', 'unleaded', 'automatic', 0),
(2, 'SOLD', 'Mazda', 'Hatch', 'Mazda 3', 2012, 18899, 85471, 'Red', '196WRT', '147852369852147', '4', 'unleaded', 'automatic', 0),
(7, 'In Stock', 'Ford', 'Sedan', 'XR8', 2011, 19599, 123458, 'Green', '215HYT', '145698523641789', '8', 'unleaded', 'automatic', 0),
(12, 'In Stock', 'Nissan', 'Hatch', 'Micra', 2009, 17990, 89412, 'Silver', '756AFG', '1059107506130480', '4', 'unleaded', 'manual', 0),
(13, 'In Stock', 'Toyota', 'Sedan', 'Aurion', 2013, 24999, 80215, 'Orange', '269POK', '778229155994688', '6', 'unleaded', 'automatic', 0),
(14, 'SOLD', 'Holden', 'Stationwagon', 'Commodore', 2015, 25999, 26901, 'Yellow', '100WER', '1458964873545269', '6', 'unleaded', 'automatic', 0),
(15, 'SOLD', 'Ford', 'Stationwagon', 'Falcon', 2005, 11989, 209988, 'Grey', '146HUY', '895623124578852', '6', 'unleaded', 'automatic', 0),
(16, 'SOLD', 'Mazda', '4WD', 'B50', 2011, 25990, 245896, 'Black', '159UYU', '102504068045098', '', 'diesel', 'manual', 0),
(17, 'In Stock', 'Holden', 'Sedan', 'Commodore', 2010, 25856, 125345, 'Red', '458GTF', '45896621157447', '6', 'unleaded', 'automatic', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--
-- Creation: Feb 28, 2016 at 10:53 PM
--

CREATE TABLE `category` (
  `category_id` enum('Sedan','Stationwagon','SUV','4WD','Hatch') NOT NULL COMMENT 'Unique ID number, identifying the category',
  `description` varchar(300) NOT NULL COMMENT 'A descriptive name associated with the specific category'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Decriptive term related to the function &/or style/design of the vehicle';

--
-- RELATIONS FOR TABLE `category`:
--

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `description`) VALUES
('Sedan', 'Sedan'),
('Stationwagon', 'Stationwagon'),
('SUV', 'SUV'),
('4WD', '4WD'),
('Hatch', 'Hatch');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--
-- Creation: Feb 28, 2016 at 10:53 PM
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL COMMENT 'Unique ID number, identifying the customer',
  `firstname` varchar(100) NOT NULL COMMENT 'The first anme of the customer',
  `surname` varchar(200) NOT NULL COMMENT 'The last name of the customer',
  `street` varchar(200) NOT NULL COMMENT 'Consist of the house number and name of the customer''s address ',
  `city` varchar(100) NOT NULL COMMENT 'The name of the suburb, town or city in which the customer resides',
  `state` varchar(3) NOT NULL COMMENT 'The three character abbreviationed form of the state in which the customer resides',
  `postcode` varchar(4) NOT NULL COMMENT 'The four character abbreviationed form of the suburb/town/city in which the customer resides',
  `phone_no` varchar(50) NOT NULL COMMENT 'The mobile of land-line telephone number with which customer can be contacted',
  `email` varchar(100) NOT NULL COMMENT 'The email with which customer can be contacted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains information about the customer who purchased a car ';

--
-- RELATIONS FOR TABLE `customers`:
--

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `firstname`, `surname`, `street`, `city`, `state`, `postcode`, `phone_no`, `email`) VALUES
(1, 'Mary', 'Smith', '5 Elm St', 'Stuart', 'Qld', '4814', '0409789456', 'smithym@ash.com'),
(2, 'Tom', 'Jones', '78 Fisher St', 'Wulguru', 'Qld', '4814', '0409123654', 'jonesyt@ash.com'),
(3, 'Fred', 'Fritz', '34 Silver St', 'Aitkenvale', 'Qld', '4812', '0409456982', 'fritzyf@ash.com'),
(4, 'Bill', 'Down', '3 efg', 'dgghdr', 'qld', '4812', '4664164', 'bill@sffgs.com');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer_id`
--
-- Creation: Feb 28, 2016 at 10:53 PM
--

CREATE TABLE `manufacturer_id` (
  `manufacturer_id` enum('Holden','Mazda','Ford','Nissan','Audi','Toyota','Mitsubishi') NOT NULL COMMENT 'Unique Manufacturer',
  `name` varchar(150) NOT NULL COMMENT 'Name of manufacturer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `manufacturer_id`:
--

--
-- Dumping data for table `manufacturer_id`
--

INSERT INTO `manufacturer_id` (`manufacturer_id`, `name`) VALUES
('Holden', 'Holden'),
('Mazda', 'Mazda'),
('Ford', 'Ford'),
('Nissan', 'Nissan'),
('Audi', 'Audi'),
('Toyota', 'Toyota'),
('Mitsubishi', 'Mitsubishi');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--
-- Creation: Feb 28, 2016 at 10:53 PM
--

CREATE TABLE `sale` (
  `receipt_no` int(25) NOT NULL COMMENT 'The number on the receipt issued to the customer at the point of sale',
  `customer_id` int(11) NOT NULL,
  `stock_no` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'The date of the purchase'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Info related to the sale of the vehicle';

--
-- RELATIONS FOR TABLE `sale`:
--   `customer_id`
--       `customers` -> `customer_id`
--   `stock_no`
--       `car` -> `stock_no`
--   `staff_id`
--       `salesperson` -> `staff_id`
--   `customer_id`
--       `customers` -> `customer_id`
--

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`receipt_no`, `customer_id`, `stock_no`, `staff_id`, `date`) VALUES
(5, 1, 14, 4, '2016-02-07 14:00:00'),
(6, 2, 16, 2, '2016-02-09 14:00:00'),
(7, 3, 15, 3, '2016-02-15 14:00:00'),
(8, 1, 1, 1, '2016-02-28 23:26:27'),
(9, 1, 1, 1, '2016-02-28 23:28:56'),
(10, 2, 2, 2, '2016-02-28 23:32:22');

-- --------------------------------------------------------

--
-- Table structure for table `salesperson`
--
-- Creation: Feb 28, 2016 at 10:53 PM
--

CREATE TABLE `salesperson` (
  `staff_id` int(11) NOT NULL COMMENT 'A unique identifying number allocated to each staff member',
  `firstname` varchar(100) NOT NULL COMMENT 'The first name of the salesperson',
  `surname` varchar(200) NOT NULL COMMENT 'The last name of the salesperson',
  `email` varchar(100) NOT NULL COMMENT 'The contact emal of the salesperson',
  `phone` varchar(100) NOT NULL COMMENT 'The contact telephone (landline or mobile) of the staff member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Details about each staff member in sales dept.';

--
-- RELATIONS FOR TABLE `salesperson`:
--

--
-- Dumping data for table `salesperson`
--

INSERT INTO `salesperson` (`staff_id`, `firstname`, `surname`, `email`, `phone`) VALUES
(1, 'Tom', 'Brady', 'bradyt@wca.com', '0409741258'),
(2, 'Sally', 'Phillips', 'phillips@wca.com', '0409321456'),
(3, 'Kim', 'Aston', 'astonk@wca.com', '0409456987'),
(4, 'Sara', 'Dayton', 'daytons@wca.com', '0409852364');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--
-- Creation: Feb 28, 2016 at 10:53 PM
--

CREATE TABLE `user_login` (
  `email` varchar(100) NOT NULL COMMENT 'Staff member''s email address',
  `username` varchar(20) NOT NULL COMMENT 'Staff member''s username and password',
  `password` varchar(40) NOT NULL,
  `security_lev` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Outlines the login details for each staff member';

--
-- RELATIONS FOR TABLE `user_login`:
--   `email`
--       `salesperson` -> `email`
--

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`email`, `username`, `password`, `security_lev`) VALUES
('astonk@wca.com', 'astonk', 'f6703c993c4a2dc6eba916989d02bd88', 'admin'),
('bradyt@wca.com', 'bradyt', '22fdd758007856ac551776f5f96bf67e', 'sales'),
('daytons@wca.com', 'daytons', 'f62bd3399f5953a17eba79c4ab0bdde9', 'sales'),
('phillips@wca.com', 'phillips', '830be4979a39935ac6272eaebad5982a', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`stock_no`),
  ADD KEY `CATEGORY_ID` (`category_id`),
  ADD KEY `MANUFACTURER_ID` (`manufacturer_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `manufacturer_id`
--
ALTER TABLE `manufacturer_id`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`receipt_no`),
  ADD KEY `CUSTOMER_ID` (`customer_id`),
  ADD KEY `STOCK_NO` (`stock_no`),
  ADD KEY `STAFF_ID` (`staff_id`);

--
-- Indexes for table `salesperson`
--
ALTER TABLE `salesperson`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `EMAIL` (`email`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `stock_no` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique ID, containing letters &/or characters,', AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique ID number, identifying the customer', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `receipt_no` int(25) NOT NULL AUTO_INCREMENT COMMENT 'The number on the receipt issued to the customer at the point of sale', AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `salesperson`
--
ALTER TABLE `salesperson`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'A unique identifying number allocated to each staff member', AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_3` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturer_id` (`manufacturer_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `car_ibfk_4` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON UPDATE CASCADE;

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sale_ibfk_2` FOREIGN KEY (`stock_no`) REFERENCES `car` (`stock_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sale_ibfk_3` FOREIGN KEY (`staff_id`) REFERENCES `salesperson` (`staff_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sale_ibfk_4` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_login`
--
ALTER TABLE `user_login`
  ADD CONSTRAINT `user_login_ibfk_1` FOREIGN KEY (`email`) REFERENCES `salesperson` (`email`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
