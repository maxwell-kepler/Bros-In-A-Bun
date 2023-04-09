-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 11:54 PM
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
(65, 'White Bread', 0.08, 1, 19),
(66, 'Bacon', 0.5, 1, 19),
(67, 'Ham', 1, 1, 19),
(68, 'Turkey', 1, 1, 19),
(69, 'Cheese', 0.15, 1, 19),
(70, 'Onion', 0.2, 1, 19),
(71, 'Pickle', 0.1, 1, 19),
(72, 'Tomato', 0.06, 1, 19),
(73, 'Chips', 0.5, 3, 19),
(74, 'Salad', 3, 3, 19),
(75, 'Soda', 1.5, 3, 19),
(76, 'Tea', 1.05, 3, 19),
(77, 'Beer', 1.1, 3, 19),
(78, 'White Bread', 0.08, 1, 20),
(79, 'Bacon', 0.5, 1, 20),
(80, 'Ham', 1, 1, 20),
(81, 'Turkey', 1, 1, 20),
(82, 'Cheese', 0.15, 1, 20),
(83, 'Onion', 0.2, 1, 20),
(84, 'Pickle', 0.1, 1, 20),
(85, 'Tomato', 0.06, 1, 20),
(86, 'Chips', 0.5, 3, 20),
(87, 'Salad', 3, 3, 20),
(88, 'Soda', 1.5, 3, 20),
(89, 'Tea', 1.05, 3, 20),
(90, 'Beer', 1.1, 3, 20),
(91, 'White Bread', 0.08, 1, 21),
(92, 'Bacon', 0.5, 1, 21),
(93, 'Ham', 1, 1, 21),
(94, 'Turkey', 1, 1, 21),
(95, 'Cheese', 0.15, 1, 21),
(96, 'Onion', 0.2, 1, 21),
(97, 'Pickle', 0.1, 1, 21),
(98, 'Tomato', 0.06, 1, 21),
(99, 'Chips', 0.5, 3, 21),
(100, 'Salad', 3, 3, 21),
(101, 'Soda', 1.5, 3, 21),
(102, 'Tea', 1.05, 3, 21),
(103, 'Beer', 1.1, 3, 21),
(104, 'White Bread', 0.08, 1, 22),
(105, 'Bacon', 0.5, 1, 22),
(106, 'Ham', 1, 1, 22),
(107, 'Turkey', 1, 1, 22),
(108, 'Cheese', 0.15, 1, 22),
(109, 'Onion', 0.2, 1, 22),
(110, 'Pickle', 0.1, 1, 22),
(111, 'Tomato', 0.06, 1, 22),
(112, 'Chips', 0.5, 3, 22),
(113, 'Salad', 3, 3, 22),
(114, 'Soda', 1.5, 3, 22),
(115, 'Tea', 1.05, 3, 22),
(116, 'Beer', 1.1, 3, 22),
(117, 'White Bread', 0.08, 1, 23),
(118, 'Bacon', 0.5, 1, 23),
(119, 'Ham', 1, 1, 23),
(120, 'Turkey', 1, 1, 23),
(121, 'Cheese', 0.15, 1, 23),
(122, 'Onion', 0.2, 1, 23),
(123, 'Pickle', 0.1, 1, 23),
(124, 'Tomato', 0.06, 1, 23),
(125, 'Chips', 0.5, 3, 23),
(126, 'Salad', 3, 3, 23),
(127, 'Soda', 1.5, 3, 23),
(128, 'Tea', 1.05, 3, 23),
(129, 'Beer', 1.1, 3, 23),
(130, 'Brown Bread', 1, 1, 24),
(131, 'Onion', 0.2, 1, 24),
(132, 'White Bread', 0.08, 1, 25),
(133, 'Bacon', 0.5, 1, 25),
(134, 'Ham', 1, 1, 25),
(135, 'Turkey', 1, 1, 25),
(136, 'Cheese', 0.15, 1, 25),
(137, 'Onion', 0.2, 1, 25),
(138, 'Pickle', 0.1, 1, 25),
(139, 'Tomato', 0.06, 1, 25),
(140, 'Chips', 0.5, 3, 25),
(141, 'Salad', 3, 1, 25),
(142, 'Soda', 1.5, 3, 25),
(143, 'Tea', 1.05, 2, 25),
(144, 'Beer', 1.1, 2, 25);

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
  MODIFY `Order_Item_Num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

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
