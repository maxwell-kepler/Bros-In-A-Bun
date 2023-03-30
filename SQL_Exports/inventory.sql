-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 07:55 PM
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
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `Item_name` varchar(255) NOT NULL,
  `Unit_cost` float NOT NULL,
  `Stock_level` int(10) NOT NULL DEFAULT 0,
  `Warning_level` int(10) NOT NULL DEFAULT 20,
  `Distributor_phone` varchar(255) NOT NULL,
  `Distributor_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Item_name`, `Unit_cost`, `Stock_level`, `Warning_level`, `Distributor_phone`, `Distributor_email`) VALUES
('Cheddar Cheese', 0.15, 20, 20, '403-999-1111', 'cheeseguy@mail.com'),
('Coca-Cola', 1.05, 6, 20, '403-555-7894', 'pepsisux@mail.com'),
('Doritos', 0.5, 60, 20, '403-888-9999', 'doritoman@mail.com'),
('Fries', 0.44, 50, 20, 'N/A', 'N/A'),
('Lettuce', 0.03, 0, 20, '403-123-4567', 'lettuce@mail.com'),
('Pepsi', 1.5, 66, 20, '403-321-1212', 'cokeisbetter@mail.com'),
('Sprite', 1.1, 25, 20, '403-555-7894', 'pepsisux@mail.com'),
('Tomato', 0.06, 20, 20, '403-123-4567', 'lettuce@mail.com'),
('White Bread', 0.08, 50, 40, '403-321-3213', 'bread@mail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`Item_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
