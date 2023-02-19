-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 19, 2023 at 02:30 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `regtable`
--

DROP TABLE IF EXISTS `regtable`;
CREATE TABLE IF NOT EXISTS `regtable` (
  `studentID` varchar(20) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `timeSlot` varchar(20) NOT NULL,
  `registrationTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`studentID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `regtable`
--

INSERT INTO `regtable` (`studentID`, `firstName`, `lastName`, `email`, `timeSlot`, `registrationTime`) VALUES
('1900702573', 'LATIM', 'RONNIE DAVID', 'latrondav@gmail.com', '10:00 - 12:00', '2023-02-19 14:04:10'),
('1900702576', 'LATIM', 'DAVID', 'latrondav20201@outlook.com', '19:00 - 21:00', '2023-02-19 14:04:48'),
('1900702572', 'LATIM', 'RONNIE DAVID', 'latrondav@gmail.com', '13:00 - 15:00', '2023-02-19 14:26:47'),
('19007025712', 'LATIM', 'DAVID', 'latrondav20201@outlook.com', '16:00 - 18:00', '2023-02-19 14:27:20'),
('1900702574', 'LATIM', 'RONNIE DAVID', 'latrondav@gmail.com', '19:00 - 21:00', '2023-02-19 14:28:27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
