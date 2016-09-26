-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 08, 2016 at 09:33 PM
-- Server version: 5.5.49-log
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moe`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(255) NOT NULL,
  `admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postalcode` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `admin`, `username`, `email`, `password`, `fname`, `lname`, `gender`, `phone`, `address`, `city`, `state`, `postalcode`) VALUES
(1, 1, 'administrator', 'admin@admin.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admin', 'admin', 'male', '', '', '', 'Choose', 0),
(2, 0, 'John', 'johns@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Jonathan', 'S', 'male', '612-555-1234', '123 fake st', 'Minneapolis', 'MN', 55468),
(3, 0, 'patty', 'mail@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Patricia', 'Johnson', 'female', '512-555-4567', '', '', 'MN', 54468),
(4, 1, 'Billybob', 'mail@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'William', 'Bob', 'male', '612-789-5461', '', '', 'MN', 54879),
(5, 0, 'maokai', 'maokai@email.com', '4edf9304ce186a5732c5dbbab1db0bb514c5921a58f1a78934be195d71aa39fdcfa2ef4cfc0f30f25831a5810bb59e956f55ecada6ce5aeffe0f5497c23c5a0b', 'Mao', 'Kai', 'male', '9525554747', 'Fake Street 1', 'St. Paul', 'MN', 55101),
(6, 0, 'randy', 'mail@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', 'Null', '', '', '', 'Choose', 0),
(7, 0, 'mdamon', 'mdamon@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Matt', 'Damon', 'male', '9525554343', '1st Fake Street', 'Hollywood', 'CA', 55444);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
