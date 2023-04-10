-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 01:49 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bros`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `UserID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `CC_Num` varchar(20) NOT NULL,
  `CC_CVC` varchar(5) NOT NULL,
  `CC_Exp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`UserID`, `Email`, `Password`, `Name`, `Phone`, `CC_Num`, `CC_CVC`, `CC_Exp`) VALUES
(1, 'max@mail.com', 'f94cf96c79103c3ccad10d308c02a1db73b986e2c48962e96ecd305e0b80ef1b', 'Max', '403-392-3779', '4716 5305 8192 2637', '874', '2024-09-11'),
(2, 'stevan@email.com', 'f94cf96c79103c3ccad10d308c02a1db73b986e2c48962e96ecd305e0b80ef1b', 'Stevan', '403-123-1234', '1234 5678 9012 1213', '665', '2024-09-11'),
(3, 'test@mail.ca', 'fe0289110d07daeee9d9500e14c57787d9083f6ba10e6bcb256f86bb4fe7b981', 'test', '403-868-9987', '5402 8619 0324 6957', '239', '2025-03-15'),
(4, 'guest@mail.com', 'bf91c2db2f8e576b25cd57eed21c7166bfa3f1c222e955c30571672957731962', 'Guest', '403-143-2460', '3528 7691 4087 5276', '556', '2023-04-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
