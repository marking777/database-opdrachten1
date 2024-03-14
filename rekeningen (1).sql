-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Mar 14, 2024 at 09:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `rekeningen`
--

CREATE TABLE `rekeningen` (
  `rekeningid` int(45) NOT NULL,
  `reserveringid` int(45) DEFAULT NULL,
  `productid` int(45) DEFAULT NULL,
  `omschrijving` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rekeningen`
--

INSERT INTO `rekeningen` (`rekeningid`, `reserveringid`, `productid`, `omschrijving`) VALUES
(13, 22, 16, '1'),
(14, 22, 17, '2'),
(17, 22, 16, '1'),
(20, 22, 16, '1w'),
(21, 22, 17, 'w1'),
(22, 22, 16, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rekeningen`
--
ALTER TABLE `rekeningen`
  ADD PRIMARY KEY (`rekeningid`),
  ADD KEY `rekeningen_ibfk_4` (`productid`),
  ADD KEY `rekeningen_ibfk_3` (`reserveringid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rekeningen`
--
ALTER TABLE `rekeningen`
  MODIFY `rekeningid` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rekeningen`
--
ALTER TABLE `rekeningen`
  ADD CONSTRAINT `rekeningen_ibfk_3` FOREIGN KEY (`reserveringid`) REFERENCES `reservering` (`reserveringid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rekeningen_ibfk_4` FOREIGN KEY (`productid`) REFERENCES `producten` (`productid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
