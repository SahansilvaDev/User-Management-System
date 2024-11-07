-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 03:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `last_login` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `last_login`, `is_deleted`) VALUES
(1, 'gayan', 'fernandoz', 'gayan@gmail.com', 'e7c551f0a6db74418dfe7e1b0240d422167fc51c', '0000-00-00 00:00:00', 0),
(2, 'ruwan', 'perera', 'ruwan@gmail.com', 'e7c551f0a6db74418dfe7e1b0240d422167fc51c', '0000-00-00 00:00:00', 0),
(3, 'nehara', 'perera', 'nehara@gmail.com', 'e7c551f0a6db74418dfe7e1b0240d422167fc51c', '0000-00-00 00:00:00', 0),
(4, 'kalum', 'hasanka', 'kalum@gmail.com', 'e7c551f0a6db74418dfe7e1b0240d422167fc51c', '0000-00-00 00:00:00', 0),
(5, 'pathum', 'kanishka', 'user@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2024-11-07 07:18:46', 0),
(6, 'saman', 'kumara', 'saman@abc.com', 'e7c551f0a6db74418dfe7e1b0240d422167fc51c', '2024-11-06 23:49:08', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
