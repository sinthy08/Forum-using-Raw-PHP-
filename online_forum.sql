-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2021 at 05:26 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `create_post`
--

CREATE TABLE `create_post` (
  `post_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `title` varchar(300) NOT NULL,
  `category` varchar(20) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `create_post`
--

INSERT INTO `create_post` (`post_id`, `username`, `title`, `category`, `description`, `created_at`) VALUES
(1, 'sinthy08', 'hello', 'Artificial Intellige', 'hello world\r\n', '2018-12-20 06:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `log_comment`
--

CREATE TABLE `log_comment` (
  `cmnt_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `body` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_comment`
--

INSERT INTO `log_comment` (`cmnt_id`, `username`, `body`, `created_at`) VALUES
(1, 'sinthy08', ' hi\r\n', '2018-12-20 06:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `post_comment`
--

CREATE TABLE `post_comment` (
  `id` int(100) NOT NULL,
  `post_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `uname` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `username`, `Email`, `Password`, `dob`, `gender`) VALUES
(26, 'Atd Fser', 'qweqwe', 'sasf@dsf.sdf', 'qwWQE232', '1998-01-28', 'F'),
(27, 'Atd Fser', 'qweqwe', 'qw@fdf.sdf', 'qwewqe232#', '1888-02-03', 'F'),
(28, 'Ana Adsff', 'sdfddg', 'SDFSDF@sdf.dsf', 'SDFSDFDsdf#$3', '0000-00-00', 'F'),
(29, 'Ana Adsff', 'sdfddg', 'SDFSDF@sdf.dsf', 'SDFSDFDsdf#$3', '0000-00-00', 'F'),
(30, 'Ana Adsff', 'sdfddg', 'SDFSDF@sdf.dsf', 'SDFSDFDsdf#$3', '0000-00-00', 'F');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `create_post`
--
ALTER TABLE `create_post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `log_comment`
--
ALTER TABLE `log_comment`
  ADD PRIMARY KEY (`cmnt_id`);

--
-- Indexes for table `post_comment`
--
ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `create_post`
--
ALTER TABLE `create_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_comment`
--
ALTER TABLE `log_comment`
  MODIFY `cmnt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_comment`
--
ALTER TABLE `post_comment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post_comment`
--
ALTER TABLE `post_comment`
  ADD CONSTRAINT `post_id` FOREIGN KEY (`post_id`) REFERENCES `create_post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
