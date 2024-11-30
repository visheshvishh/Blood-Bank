-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 07:37 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `mobile`) VALUES
(1, 'Admin User', 'admin@gmail.com', 'admin123', 8888888888);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `donation_type` varchar(30) NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `no_units` int(11) NOT NULL,
  `disease` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `fitness` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `donor_id`, `donation_type`, `blood_group`, `no_units`, `disease`, `status`, `fitness`) VALUES
(1, 105, 'blood', 'A-', 2, 'no', 1, 'img642564f86aa99-41.png'),
(2, 105, 'plasma', 'AB+', 2, 'no', 1, 'img6425653e92155-31.png'),
(3, 105, 'platelets', 'A+', 2, 'no', 2, 'img64256561abd20-24.png'),
(4, 105, 'blood', 'A-', 2, 'no', 1, 'img642564f86aa99-41.png'),
(5, 105, 'plasma', 'AB+', 2, 'no', 1, 'img6425653e92155-31.png'),
(6, 105, 'plasma', 'AB+', 10, 'no', 1, 'img6425653e92155-31.png'),
(7, 105, 'platelets', 'A+', 5, 'no', 1, 'img64256561abd20-24.png');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `name`, `email`, `password`, `mobile`) VALUES
(102, 'Trupti', 'trupshetty14@gmail.com', 'hkm123', 1234567891),
(105, 'Sonali', 'sonali@gmail.com', '12345', 8458748452),
(108, 'Mitali Pawar', 'mitali@gmail.com', '12345', 9999999999),
(109, 'Pranali', 'Pranali@gmail.com', '12345', 8888888888),
(110, 'Swara Kalsekar', 'Swara@gmail.com', '12345', 6666666666),
(111, 'Sonali Samai', 'sonalisamai@gmail.com', '12345', 1234512365);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `email`, `password`, `mobile`) VALUES
(501, 'Sonali Samai', 'sonalijsamai2204@gmail.com', '12345', 9326175215),
(503, 'Mitali Pawar', 'mitali13@gmail.com', '12345', 2147483647),
(505, 'Swara Kalsekar', 'swara03@gmail.com', '12345', 0),
(506, 'Pranali Pednekar', 'pranali29@gmail.com', '12345', 1234567800),
(507, 'Trupti Shetty', 'trupti6@gmail.com', '12345', 9785412563);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `donation_type` varchar(30) NOT NULL,
  `no_units` int(11) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `reason` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `patient_id`, `donation_type`, `no_units`, `blood_group`, `reason`, `status`) VALUES
(1, 501, 'plasma', 2, 'AB+', 'fever', 1),
(2, 501, 'blood', 2, 'A+', 'np', 1),
(3, 501, 'platelets', 2, 'A+', 'bb', 1),
(4, 501, 'platelets', 2, 'A+', 'fff', 1),
(5, 501, 'blood', 2, 'A+', 'np', 1),
(6, 501, 'platelets', 5, 'A+', 'bb', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `sno` int(11) NOT NULL,
  `donation_type` varchar(50) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`sno`, `donation_type`, `blood_group`, `stock`) VALUES
(1, 'blood', 'A', 5),
(2, 'blood', 'A+', 1),
(3, 'blood', 'A-', 7),
(4, 'blood', 'B', 5),
(5, 'blood', 'B+', 5),
(6, 'blood', 'B-', 5),
(7, 'blood', 'AB+', 5),
(8, 'blood', 'AB-', 5),
(9, 'blood', 'O+', 5),
(10, 'blood', 'O-', 5),
(11, 'plasma', 'AB+', 21),
(12, 'plasma', 'AB-', 5),
(13, 'platelets', 'A+', 1),
(14, 'platelets', 'A-', 5),
(15, 'platelets', 'B+', 5),
(16, 'platelets', 'AB+', 5),
(17, 'platelets', 'AB-', 5),
(18, 'platelets', 'O+', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(150) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `birthDate` date NOT NULL,
  `mobile` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `usertype`, `birthDate`, `mobile`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin123', 'admin', '0000-00-00', '999999999'),
(102, 'Trupti', 'trupshetty14@gmail.com', 'hkm123', 'donor', '0000-00-00', '1234567891'),
(105, 'Sonali', 'sonalijsamai224@gmail.com', '12345', 'donor', '0000-00-00', '2147483647'),
(108, 'Mitali Pawar', 'pawarmitali5@gmail.com', '12345', 'donor', '0000-00-00', '2147483647'),
(109, 'Pranali', 'Pranali@gmail.com', '12345', 'donor', '0000-00-00', '2147483647'),
(110, 'Swara Kalsekar', 'swarakalsekar1211@gmail.com', 'abcde', 'donor', '0000-00-00', '2147483647'),
(501, 'Sonali Samai', 'sonalijsamai224@gmail.com', '12345', 'patient', '0000-00-00', '1234567897'),
(503, 'Mitali Pawar', 'mitali13@gmail.com', '12345', 'patient', '0000-00-00', '7897854574'),
(505, 'Swara Kalsekar', 'swara03@gmail.com', '12345', 'patient', '0000-00-00', '123123151'),
(506, 'Pranali Pednekar', 'pranali29@gmail.com', '12345', 'patient', '0000-00-00', '1234567800'),
(507, 'Trupti Shetty', 'trupti6@gmail.com', '12345', 'patient', '0000-00-00', '2147483647'),
(508, 'nimit more', 'nimit@gmail.com', '12345', 'donor', '0000-00-00', '2147483647'),
(519, 'abc', 'SONALIJSAMAI2204@GMAIL.COM', 'sona@123', 'donor', '2001-02-25', '1234567897');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=508;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=520;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
