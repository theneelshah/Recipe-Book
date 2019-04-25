-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 07:46 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_recipe`
--

CREATE TABLE `all_recipe` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `descp` varchar(50) NOT NULL,
  `proc` text NOT NULL,
  `image` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_recipe`
--

INSERT INTO `all_recipe` (`id`, `title`, `descp`, `proc`, `image`) VALUES
(1, 'Sandwich', 'A great sandwich', 'cut cucumber\r\ncut tomatoes\r\nplace in bread\r\n', 'sandwich.jpg'),
(2, 'Mango Milkshake', 'A great way to chill in summer', 'Crush mangoes with some ice in a mixer.\r\nAdd some sugar.\r\nAdd milk and mix well to enjoy.', 'mangomilk.jpg'),
(3, 'Hot Chocolate', 'Who dont like it?', 'Take a block of raw chocolate and melt it\r\nAdd milk to the container. \r\nAdd sugar and garnish with cocoa powder and cream.', 'hotchoco.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_recipe`
--
ALTER TABLE `all_recipe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_recipe`
--
ALTER TABLE `all_recipe`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
