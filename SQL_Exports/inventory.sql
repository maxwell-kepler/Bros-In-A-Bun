-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 01:50 AM
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
('Bacon', 0.5, 50, 20, '403-238-9932', 'bacon@mail.com'),
('Beer', 1.1, 47, 20, '403-555-7894', 'beer@mail.com'),
('Brown Bread', 1, 35, 20, '403-819-0718', 'bbread@mail.com'),
('Cheese', 0.15, 46, 20, '403-999-1111', 'cheeseguy@mail.com'),
('Chips', 0.5, 41, 20, '403-888-9999', 'chipsman@mail.com'),
('Fries', 0.44, 37, 20, '403-819-0718', 'friesguy@email.com'),
('Ham', 1, 46, 20, '403-602-4181', 'ham@mail.com'),
('Lettuce', 0.03, 46, 20, '403-123-4567', 'lettuce@mail.com'),
('Onion', 0.2, 48, 20, '403-975-6038', 'onion@mail.com'),
('Pickle', 0.1, 48, 20, '403-486-1497', 'pickle@mail.com'),
('Salad', 3, 45, 20, '403-754-8824', 'salad@mail.com'),
('Soda', 1.5, 37, 20, '403-321-1212', 'cokeisbetter@mail.com'),
('Tea', 1.05, 50, 20, '403-555-7894', 'tea@mail.com'),
('Tomato', 0.06, 46, 20, '403-123-4567', 'lettuce@mail.com'),
('Turkey', 1, 50, 20, '403-621-5306', 'turkey@mail.com'),
('White Bread', 0.08, 46, 40, '403-321-3213', 'wbread@mail.com');

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
