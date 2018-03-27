-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 04, 2017 at 01:07 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Rel_Data_Banken`
--

-- --------------------------------------------------------

--
-- Table structure for table `Cars`
--

CREATE TABLE `Cars` (
  `car_id` int(11) NOT NULL,
  `model` varchar(15) NOT NULL,
  `brand` varchar(15) NOT NULL,
  `man_year` int(4) NOT NULL,
  `car_condition` varchar(4) NOT NULL,
  `engine_type` varchar(10) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Cars`
--

INSERT INTO `Cars` (`car_id`, `model`, `brand`, `man_year`, `car_condition`, `engine_type`, `image`) VALUES
(1, 'vitz', 'toyota', 2008, 'new', 'gasoline', 'random'),
(2, 'fit', 'honda', 2005, 'used', 'gasoline', 'random'),
(3, 'ranger', 'ford', 2016, 'new', 'diesel', 'random'),
(4, 'raptor', 'ford', 2015, 'used', 'diesel', 'random'),
(5, 'caldina', 'toyota', 2000, 'used', 'gasoline', 'random'),
(6, 'bluebird', 'nissan', 2007, 'used', 'gasoline', 'random'),
(7, 'focus', 'ford', 2003, 'used', 'gasoline', 'random'),
(8, 'sportage', 'kia', 2012, 'new', 'diesel', 'random'),
(9, 'rio', 'kia', 2014, 'new', 'gasoline', 'random'),
(10, 'fuga', 'nissan', 2013, 'used', 'gasoline', 'random'),
(11, 'belta', 'toyota', 2012, 'used', 'gasoline', 'random'),
(12, 'glanza', 'toyota', 2000, 'used', 'gasoline', ''),
(13, 'caldina', 'toyota', 2012, 'new', 'gasoline', ''),
(14, 'd-max', 'izuzu', 2017, 'new', 'diesel', ''),
(15, 'ram', 'dodge', 2008, 'used', 'diesel', ''),
(16, 'charger', 'dodge', 2012, 'used', 'gasoline', ''),
(17, 'challenger', 'dodge', 2012, 'used', 'gaoline', ''),
(18, 'premacy', 'mazda', 2013, 'used', 'gasoline', ''),
(19, 'hilux', 'toyota', 2012, 'used', 'diesel', '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `F_name` varchar(20) NOT NULL,
  `L_name` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `username`, `F_name`, `L_name`, `Email`, `password`) VALUES
(1, 'Johndoe', 'john', 'doe', 'john@example.com', 'johndoe'),
(2, 'Jane_doe', 'jane', 'doe', 'jane@example.com', 'janedoe'),
(3, 'Deyon_rudge', 'deyon', 'rudge', 'deyon@example.com', 'deyonrudge'),
(4, 'junior', 'gerrard', 'fitz-jim', 'junior@example.com', 'juniorgerrard'),
(5, 'derko', 'derreck', 'gessel', 'derko_tekayari@example.com', 'derreckgessel');

-- --------------------------------------------------------

--
-- Table structure for table `customer_cars`
--

CREATE TABLE `customer_cars` (
  `custom_cars_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `custom_id` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_cars`
--

INSERT INTO `customer_cars` (`custom_cars_id`, `car_id`, `custom_id`, `value`) VALUES
(3, 3, 3, 5000),
(4, 8, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `complaint_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `complaint` text NOT NULL,
  `username` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`complaint_id`, `customer_id`, `complaint`, `username`) VALUES
(1, 3, 'dededede', 'Deyon_rudge');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_ and_ complaints`
--

CREATE TABLE `feedback_ and_ complaints` (
  `complaint_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `complaint` text NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `for_sale_cars`
--

CREATE TABLE `for_sale_cars` (
  `sale_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `sale_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `for_sale_cars`
--

INSERT INTO `for_sale_cars` (`sale_id`, `car_id`, `sale_price`) VALUES
(7, 4, 30000),
(8, 5, 3000),
(9, 6, 8000),
(10, 7, 3000),
(12, 9, 15000),
(13, 10, 14000),
(14, 11, 11000),
(15, 12, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `service_appointments`
--

CREATE TABLE `service_appointments` (
  `appoitnment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `book_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_appointments`
--

INSERT INTO `service_appointments` (`appoitnment_id`, `customer_id`, `appointment_date`, `book_date`) VALUES
(16, 3, '2017-05-17', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Cars`
--
ALTER TABLE `Cars`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `customer_cars`
--
ALTER TABLE `customer_cars`
  ADD PRIMARY KEY (`custom_cars_id`),
  ADD KEY `custom_id` (`custom_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `feedback_ and_ complaints`
--
ALTER TABLE `feedback_ and_ complaints`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `for_sale_cars`
--
ALTER TABLE `for_sale_cars`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `car_id` (`car_id`);

--
-- Indexes for table `service_appointments`
--
ALTER TABLE `service_appointments`
  ADD PRIMARY KEY (`appoitnment_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Cars`
--
ALTER TABLE `Cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customer_cars`
--
ALTER TABLE `customer_cars`
  MODIFY `custom_cars_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `feedback_ and_ complaints`
--
ALTER TABLE `feedback_ and_ complaints`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `for_sale_cars`
--
ALTER TABLE `for_sale_cars`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `service_appointments`
--
ALTER TABLE `service_appointments`
  MODIFY `appoitnment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_cars`
--
ALTER TABLE `customer_cars`
  ADD CONSTRAINT `customer_cars_ibfk_2` FOREIGN KEY (`custom_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `customer_cars_ibfk_3` FOREIGN KEY (`car_id`) REFERENCES `Cars` (`car_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `feedback_ and_ complaints`
--
ALTER TABLE `feedback_ and_ complaints`
  ADD CONSTRAINT `feedback_ and_ complaints_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `for_sale_cars`
--
ALTER TABLE `for_sale_cars`
  ADD CONSTRAINT `for_sale_cars_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `Cars` (`car_id`);

--
-- Constraints for table `service_appointments`
--
ALTER TABLE `service_appointments`
  ADD CONSTRAINT `service_appointments_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
