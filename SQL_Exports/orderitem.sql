-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 01:52 AM
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
-- Table structure for table `orderitem`
--

CREATE TABLE `orderitem` (
  `Order_Item_Num` int(11) NOT NULL,
  `Item_name` varchar(255) NOT NULL,
  `Price` float NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Order_Num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderitem`
--

INSERT INTO `orderitem` (`Order_Item_Num`, `Item_name`, `Price`, `Quantity`, `Order_Num`) VALUES
(225, 'White Bread', 0.08, 1, 45),
(226, 'Bacon', 0.5, 1, 45),
(227, 'Ham', 1, 1, 45),
(228, 'Turkey', 1, 1, 45),
(229, 'Cheese', 0.15, 1, 45),
(230, 'Onion', 0.2, 1, 45),
(231, 'Pickle', 0.1, 1, 45),
(232, 'Tomato', 0.06, 1, 45),
(233, 'Lettuce', 0.03, 1, 45),
(234, 'Fries', 0.44, 3, 45),
(235, 'Chips', 0.5, 2, 45),
(236, 'Salad', 3, 1, 45),
(237, 'Soda', 1.5, 3, 45),
(238, 'Tea', 1.05, 2, 45),
(239, 'Beer', 1.1, 1, 45),
(240, 'White Bread', 0.08, 1, 46),
(241, 'Bacon', 0.5, 1, 46),
(242, 'Tomato', 0.06, 1, 46),
(243, 'Lettuce', 0.03, 1, 46),
(244, 'Fries', 0.44, 1, 46),
(245, 'Salad', 3, 2, 46),
(246, 'Soda', 1.5, 2, 46),
(247, 'Beer', 1.1, 2, 46);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`Order_Item_Num`),
  ADD KEY `Order_Num` (`Order_Num`),
  ADD KEY `Item_name` (`Item_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `Order_Item_Num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderitem`
--
ALTER TABLE `orderitem`
  ADD CONSTRAINT `orderitem_ibfk_1` FOREIGN KEY (`Order_Num`) REFERENCES `order` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderitem_ibfk_2` FOREIGN KEY (`Item_name`) REFERENCES `inventory` (`Item_name`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
