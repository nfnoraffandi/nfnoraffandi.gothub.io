-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2021 at 10:08 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) DEFAULT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_phone` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_name`, `admin_phone`, `admin_password`, `admin_email`, `admin_address`) VALUES
(10001, 'hariz_malik', 'KAZMEER BIN JAMIL', '01156311063', 'kazjam12', 'kazmerjamil@gmail.com', 'NO 3, JALAN SERINDIT, TAMAN SERINDIT 3, 44000 SELANGOR'),
(10002, 'sabby89', 'SABRINA BINTI ZASLIMAN', '0137802283', 'sabby6', 'sabbyzasliman@yahoo.com', '32, APARTMENT TAMAN MELUR, 44000 SELANGOR'),
(10003, 'melia23', 'KAMELIA  BINTI HAMID', '01965384923', 'melia123', 'melia@gmail.com', 'NO 123, BLOK A, FLAT TAMAN RATA, 44000 SELANGOR'),
(10004, 'khalishasham', 'NUR KHALISHA BINTI MAD SAH', '01146789203', 'khalisha88', 'khalishasham23@gmail.com', 'NO 22, JALAN 3, TAMAN RINTING, 44000 SELANGOR'),
(10005, 'haifa90', 'MOHAMAD HAIFA HAIKAL BIN ZAM', '0127893467', 'haifahaikal', 'haifa.haikal@yahoo.com', 'NO 23, JALAN BARU 4, KAMPUNG BARU, 44000 SELANGOR');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `car_id` int(10) NOT NULL,
  `car_name` varchar(100) NOT NULL,
  `car_price` varchar(50) NOT NULL,
  `car_type` varchar(30) NOT NULL,
  `car_mileage` varchar(20) NOT NULL,
  `car_passenger` varchar(3) NOT NULL,
  `car_image` varchar(300) NOT NULL,
  `car_gear` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`car_id`, `car_name`, `car_price`, `car_type`, `car_mileage`, `car_passenger`, `car_image`, `car_gear`) VALUES
(100, 'Toyota Alphard 2.4', '350 MYR / day', 'MPV', 'Unlimited', '7', 'alphard.png', 'Automatic'),
(101, 'Perodua Alza 1.5', '100 MYR / day', 'MPV', 'Unlimited', '7', 'alza.png', 'Automatic'),
(103, 'Perodua Myvi Ezi', '70 MYR / day', 'Economy', 'Unlimited', '5', 'myvilama.png', 'Automatic');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`car_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `car_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
