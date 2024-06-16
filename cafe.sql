-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2021 at 06:32 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `userId` int(11) NOT NULL,
  `NAMA` varchar(50) NOT NULL,
  `PONSEL` varchar(20) NOT NULL,
  `ALAMAT` varchar(50) NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `PASS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`userId`, `NAMA`, `PONSEL`, `ALAMAT`, `USERNAME`, `PASS`) VALUES
(2, 'Alifatul Anisa', '0122609525', 'No. 56 Jalan Selasih 2, Taman Pasir Putih', 'Anisa', 'nisa1306'),
(3, 'Farah', '0123456789', 'jasin', 'farah', '123456789'),
(4, 'Muhammad Iqbal', '01234234', 'semenyih', 'Iqbal', 'iqbal123');

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE `drinks` (
  `drinks_id` int(11) NOT NULL,
  `drinks_name` varchar(50) NOT NULL,
  `drinks_cal` int(11) NOT NULL,
  `drinks_price` varchar(50) NOT NULL,
  `drinks_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drinks`
--

INSERT INTO `drinks` (`drinks_id`, `drinks_name`, `drinks_cal`, `drinks_price`, `drinks_image`) VALUES
(1, 'Teh Tarik Madu', 164, '5.50', 'nbg1.png'),
(2, 'Cendol Parfait', 390, '7.50', 'nbg2.png');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reserve_id` int(11) NOT NULL,
  `reserve_date` date NOT NULL,
  `reserve_time` time NOT NULL,
  `reserve_person` int(11) NOT NULL,
  `reserve_user` varchar(50) NOT NULL,
  `reserve_email` varchar(50) NOT NULL,
  `reserve_hp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reserve_id`, `reserve_date`, `reserve_time`, `reserve_person`, `reserve_user`, `reserve_email`, `reserve_hp`) VALUES
(9, '2021-05-16', '22:25:00', 2, 'Iqbal', 'iqbal@gmail.com', '0123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`drinks_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reserve_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `drinks`
--
ALTER TABLE `drinks`
  MODIFY `drinks_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
