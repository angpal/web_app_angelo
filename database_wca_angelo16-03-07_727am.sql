-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2016 at 10:28 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_wca_angelo`
--
CREATE DATABASE IF NOT EXISTS `database_wca_angelo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `database_wca_angelo`;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--
-- Creation: Mar 02, 2016 at 10:46 PM
--

CREATE TABLE `car` (
  `stock_no` int(11) NOT NULL COMMENT 'Unique ID, containing letters &/or characters,',
  `availability` enum('In Stock','SOLD','Removed') NOT NULL DEFAULT 'In Stock' COMMENT 'Indicates if car is on the Lot or has been sold',
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
(7, 'SOLD', 'Ford', 'Sedan', 'XR8', 2011, 19599, 123458, 'Green', '215HYT', '145698523641789', '8', 'unleaded', 'automatic', 0),
(8, 'Removed', 'Toyota', 'Sedan', 'Camry', 2012, 19990, 45896, 'Grey', '', '57876767676', '6', 'unleaded', 'automatic', 0),
(9, 'Removed', 'Toyota', '4WD', 'Landcruiser', 2014, 48990, 125489, 'Black', '', '454685746843548746', '8', 'diesel', 'automatic', 0),
(14, 'SOLD', 'Holden', 'Stationwagon', 'Commodore', 2015, 25999, 26901, 'Yellow', '100WER', '1458964873545269', '6', 'unleaded', 'automatic', 0),
(15, 'SOLD', 'Ford', 'Stationwagon', 'Falcon', 2005, 11989, 209988, 'Grey', '146HUY', '895623124578852', '6', 'unleaded', 'automatic', 0),
(16, 'SOLD', 'Mazda', '4WD', 'B50', 2011, 25990, 245896, 'Black', '159UYU', '102504068045098', '', 'diesel', 'manual', 0),
(18, 'In Stock', 'Toyota', 'Sedan', 'Camry', 2014, 19955, 45258, 'White', '', '654648978646468', '6', 'unleaded', 'automatic', 0),
(19, 'In Stock', 'Nissan', '4WD', 'Patrol', 2010, 18599, 215891, 'White', '', '654644464393365', '6', 'diesel', 'manual', 0),
(20, 'In Stock', 'Toyota', '4WD', 'Landcruiser', 2011, 25999, 195874, 'Silver', '', '3133154615464643', '8', 'diesel', 'automatic', 0),
(21, 'SOLD', 'Nissan', 'Hatch', 'Micra', 2011, 12999, 51254, 'Silver', '', '65687978648858', '4', 'unleaded', 'automatic', 0),
(22, 'In Stock', 'Toyota', 'Sedan', 'Aurion', 2014, 26990, 45896, 'Orange', '456SFT', '456454546464456', '6', 'unleaded', 'automatic', 0),
(26, 'In Stock', 'Toyota', 'Sedan', 'Landcruiser', 2000, 18500, 258411, 'Grey', '', '6435465467464163', '8', 'diesel', 'manual', 0),
(27, 'SOLD', 'Holden', 'Sedan', 'Commodore', 2013, 26999, 65892, 'Red', '', '468546464976546', '6', 'unleaded', 'manual', 0),
(28, 'In Stock', 'Mitsubishi', '4WD', 'Pajero', 2005, 15999, 285268, 'Blue', '', '649677967987', '6', 'unleaded', 'manual', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--
-- Creation: Mar 01, 2016 at 10:28 AM
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
-- Creation: Mar 01, 2016 at 10:28 AM
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
(4, 'Bill', 'Down', '3 efg', 'dgghdr', 'qld', '4812', '4664164', 'bill@sffgs.com'),
(5, 'Karen', 'Shaw', '6546 Wills St', 'Bebbo', 'WA', '8546', '68749674', 'shawk@bigpond.com'),
(6, 'Tom', 'Hardy', '646 Fordan St', 'Santon', 'WA', '6456', '5646544646', 'hardyt@bigpond.com'),
(7, 'Guy', 'Piper', '56 Daily Dr', 'West', 'WA', '6025', '0409555887', 'piperg@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer_id`
--
-- Creation: Mar 01, 2016 at 10:28 AM
--

CREATE TABLE `manufacturer_id` (
  `manufacturer_id` enum('Holden','Mazda','Ford','Nissan','Audi','Toyota','Mitsubishi','Hyundai','Kia','BMW','Mercedes','Other') NOT NULL COMMENT 'Unique Manufacturer',
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
('Mitsubishi', 'Mitsubishi'),
('Hyundai', 'Hyundai'),
('Kia', 'Kia'),
('BMW', 'BMW'),
('Mercedes', 'Mercedes');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--
-- Creation: Mar 01, 2016 at 10:28 AM
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
--       `staff` -> `staff_id`
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
(10, 2, 2, 2, '2016-02-28 23:32:22'),
(11, 5, 7, 9, '2016-03-05 15:04:01'),
(12, 5, 7, 9, '2016-03-05 15:05:32'),
(13, 6, 21, 4, '2016-03-05 15:54:13'),
(14, 7, 27, 16, '2016-03-07 08:52:58');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--
-- Creation: Mar 02, 2016 at 08:25 PM
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL COMMENT 'A unique identifying number allocated to each staff member',
  `status` enum('Active','Terminated','On Leave') NOT NULL DEFAULT 'Active' COMMENT 'Indicates the employment status of the staff member within the company.',
  `firstname` varchar(100) NOT NULL COMMENT 'The first name of the salesperson',
  `surname` varchar(200) NOT NULL COMMENT 'The last name of the salesperson',
  `email` varchar(100) NOT NULL COMMENT 'The contact emal of the salesperson',
  `phone_no` varchar(100) NOT NULL COMMENT 'The contact telephone (landline or mobile) of the staff member',
  `username` varchar(20) NOT NULL COMMENT 'Unique name, made up of surname and first (& second) initial',
  `password` varchar(40) NOT NULL COMMENT 'Unique ID for each staff member, used to gain access',
  `security_lev` enum('Sales','Admin') DEFAULT NULL COMMENT 'Level of access staff member has to data'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Details about each staff member in sales dept.';

--
-- MIME TYPES FOR TABLE `staff`:
--   `status`
--       `Text_Plain`
--

--
-- RELATIONS FOR TABLE `staff`:
--

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `status`, `firstname`, `surname`, `email`, `phone_no`, `username`, `password`, `security_lev`) VALUES
(1, 'Active', 'Vaughan', 'Dennis', 'dennisv@wca.com', '0409741258', 'dennisv', '3fbcb307690503398c23404ee9283e7c', 'Admin'),
(2, 'Active', 'Collette', 'Dennis', 'dennisc@wca.com', '0409321456', 'dennisc', 'e36e7da7696b41abd6bbe16345b97fc5', 'Admin'),
(3, 'Active', 'Kim', 'Aston', 'astonk@wca.com', '0409456987', 'astonk', 'f6703c993c4a2dc6eba916989d02bd88', 'Admin'),
(4, 'Active', 'Steve', 'Dayton', 'daytons@wca.com', '0409852364', 'daytons', 'f62bd3399f5953a17eba79c4ab0bdde9', 'Sales'),
(5, 'Terminated', 'Adam', 'Smith', 'smitha@wca.com', '0409758412', 'smitha', '3437d2dc21a86d3cf1bcc024f3c6dbf8', 'Sales'),
(6, 'Active', 'Sally', 'Smith', 'smiths@wca.com.au', '0409456289', 'smiths', '38f018950dd34cdb1e4dac258cac3de5', 'Admin'),
(7, 'Terminated', 'Fran', 'Dell', 'dellf@wca.com', '0409666666', 'dellf', '1b3c4789d53fba2b7d22af81fa6866cf', 'Sales'),
(9, 'Active', 'Cameron', 'Johns', 'johnsc@wca.com', '0409112587', 'johnsc', '67021ee215fe294a37c32c59f3a401fc', 'Sales'),
(10, 'Active', 'Evan', 'Harris', 'harrise@wca.com', '64964634163', 'harrise', 'ff3bc4e03b420b12609eb04e0c59742a', 'Sales'),
(12, 'Terminated', 'Nel', 'Kelly', 'kellyn@wca.com', '0409366225', 'kellyn', 'df199dfb79c164b8d3bd5b9cc1cdb047', 'Sales'),
(13, 'Active', 'Pip', 'Dean', 'deanp@wca.com', '0409555888', 'deanp', 'f469d820b6e0a9d430f22fb3a132dc5d', 'Admin'),
(15, 'Active', 'Bec', 'Sahl', 'sahlb@wca', '0409333222', 'sahlb', '75ed856b5a9149625834433b49fd5283', 'Sales'),
(16, 'Active', 'Ken', 'Doll', 'dollk@wca.com', '0409111444', 'dollk', '9bb3708df029bba998a08667632b9564', 'Sales'),
(20, 'Active', 'Beth', 'James', 'jamesb@wca.com', '0409888444', 'jamesb', '10338c423693698bddf4e6bc229ea225', 'Sales');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--
-- Creation: Mar 01, 2016 at 10:28 AM
--

CREATE TABLE `user_login` (
  `email` varchar(100) NOT NULL COMMENT 'Staff member''s email address',
  `username` varchar(20) NOT NULL COMMENT 'Staff member''s username and password',
  `password` varchar(40) NOT NULL,
  `security_lev` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Outlines the login details for each staff member';

--
-- RELATIONS FOR TABLE `user_login`:
--

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`email`, `username`, `password`, `security_lev`) VALUES
('astonk@wca.com', 'astonk', 'f6703c993c4a2dc6eba916989d02bd88', 'admin'),
('daytons@wca.com', 'daytons', 'f62bd3399f5953a17eba79c4ab0bdde9', 'sales'),
('dennisc@wca.com', 'phillips', '830be4979a39935ac6272eaebad5982a', 'admin'),
('dennisv@wca.com', 'bradyt', '22fdd758007856ac551776f5f96bf67e', 'sales');

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
-- Indexes for table `staff`
--
ALTER TABLE `staff`
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
  MODIFY `stock_no` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique ID, containing letters &/or characters,', AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique ID number, identifying the customer', AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `receipt_no` int(25) NOT NULL AUTO_INCREMENT COMMENT 'The number on the receipt issued to the customer at the point of sale', AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'A unique identifying number allocated to each staff member', AUTO_INCREMENT=21;
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
  ADD CONSTRAINT `sale_ibfk_3` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sale_ibfk_4` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
