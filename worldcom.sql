-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2018 at 01:56 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `worldcom`
--

-- --------------------------------------------------------

--
-- Table structure for table `post codes`
--

CREATE TABLE `post codes` (
  `ID` int(11) NOT NULL,
  `Post Code` varchar(255) NOT NULL,
  `Place Name` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `Name Code` varchar(255) NOT NULL,
  `Country Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post codes`
--

INSERT INTO `post codes` (`ID`, `Post Code`, `Place Name`, `latitude`, `longitude`, `Name Code`, `Country Name`) VALUES
(49, '1010', 'Wien', '48.2077', '16.3705', 'at', 'Austria'),
(50, '90210', 'Beverly Hills', '34.0901', '-118.4065', 'us', 'United States'),
(77, '95210', 'Stockton', '38.025', '-121.2972', 'us', 'United States'),
(78, '9992', 'Maldegem', '51.2167', '3.45', 'be', 'Belgium'),
(79, '1000', 'Bruxelles', '50.8466', '4.3528', 'be', 'Belgium'),
(80, '00210 ', 'Portsmouth', '43.0059', '-71.0132', 'us', 'United States'),
(81, '98799', 'Clipperton Island', '10.2922', '-109.2072', 'fr', 'France'),
(82, '101000', 'ÐœÐ¾ÑÐºÐ²Ð°', '55.7522', '37.6156', 'ru', 'Russia'),
(83, '10005', 'Stockholm', '59.3326', '18.0649', 'se', 'Sweden'),
(84, 'Y1A', 'Whitehorse', '60.7227', '-135.0534', 'ca', 'Canada'),
(85, '01001', 'Vitoria-Gasteiz', '42.85', '-2.6667', 'es', 'Spain'),
(86, '1601', 'ISLA MARTIN GARCIA', '-34.5167', '-58.5389', 'ar', 'Argentina'),
(87, '0800', 'HÃ¸je Taastrup', '55.65', '12.2833', 'dk', 'Denmark'),
(88, '00213', 'Portsmouth', '43.0059', '-71.0132', 'us', 'United States'),
(89, '99524', 'Anchorage', '61.1089', '-149.4403', 'us', 'United States');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post codes`
--
ALTER TABLE `post codes`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post codes`
--
ALTER TABLE `post codes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
