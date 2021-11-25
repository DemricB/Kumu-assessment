-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 09:54 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kumu_assessment`
--

-- --------------------------------------------------------

--
-- Table structure for table `username_list`
--

CREATE TABLE `username_list` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `login` varchar(15) NOT NULL,
  `company` varchar(50) NOT NULL,
  `number_of_followers` int(2) NOT NULL,
  `number_of_public_repositories` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `username_list`
--

INSERT INTO `username_list` (`id`, `name`, `password`, `login`, `company`, `number_of_followers`, `number_of_public_repositories`) VALUES
(1, 'Marcus Bointon', '', 'Synchro', 'Synchromedia Ltd (@synchromediauk)', 593, 121),
(2, 'Christoph M. Becker', '', 'cm69', '', 109, 1),
(3, '', '', 'oleibman', '', 1, 4),
(4, 'Jamie York', '', 'ziadoz', '', 797, 289),
(5, 'Sebastian Bergmann', '', 'sebastianbergma', '@thePHPcc', 6190, 1),
(6, 'Nicolas Grekas', '', 'nicolas-grekas', 'Symfony SAS', 1473, 79),
(7, '', '', 'troosan', '', 37, 11),
(8, 'Rafael Dohms', '', 'rdohms', '@Usabilla, @GetFeedback', 524, 172),
(9, 'Dries Vints', '', 'driesvints', '@laravel', 3136, 74),
(10, 'Stephen Searles', '', 'stephens2424', '', 83, 39),
(11, 'demric', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'demric', 'roberts', 12, 12),
(12, 'Demric Bautista', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'Demric', 'Kumu Ph', 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Kumu', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `username_list`
--
ALTER TABLE `username_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `username_list`
--
ALTER TABLE `username_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
