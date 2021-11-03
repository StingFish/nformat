-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2021 at 02:48 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filepaths`
--

-- --------------------------------------------------------

--
-- Table structure for table `front`
--

CREATE TABLE `front` (
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `front`
--

INSERT INTO `front` (`filename`) VALUES
('Academic Affairs'),
('Administrative Officers'),
('Graduates'),
('Milestones & Activities');

-- --------------------------------------------------------

--
-- Table structure for table `shs`
--

CREATE TABLE `shs` (
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mi` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shs`
--

INSERT INTO `shs` (`lname`, `fname`, `mi`, `section`) VALUES
('Round', 'Mary', 'Go', 'BSIT 4-1'),
('Cruz', 'Juan', 'Dela', 'BSIT 4-1'),
('Arceno', 'Rodney', 'Pinque', 'BSIT 4-3');

-- --------------------------------------------------------

--
-- Table structure for table `tbltheme`
--

CREATE TABLE `tbltheme` (
  `year` int(11) NOT NULL,
  `fpage` longblob NOT NULL,
  `tmp` varchar(255) NOT NULL,
  `color1` varchar(255) NOT NULL,
  `color2` varchar(255) NOT NULL,
  `color 3` varchar(255) NOT NULL,
  `color4` varchar(255) NOT NULL,
  `color5` varchar(255) NOT NULL,
  `color6` varchar(255) NOT NULL,
  `color7` varchar(255) NOT NULL,
  `color8` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbltheme`
--

INSERT INTO `tbltheme` (`year`, `fpage`, `tmp`, `color1`, `color2`, `color 3`, `color4`, `color5`, `color6`, `color7`, `color8`) VALUES
(0, 0x5b76616c75652d325d, 'tmp1.php', '#00ff00', '#ffff00', '#ffff00', '#ffff00', '#ffff00', '#ffff00', '#ffff00', '#00ff00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
