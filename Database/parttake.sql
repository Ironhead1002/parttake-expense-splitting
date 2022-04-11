-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2021 at 08:16 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parttake`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(80) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_creation_date` date NOT NULL,
  `event_completion_date` date NOT NULL,
  `event_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_name`, `user_id`, `event_creation_date`, `event_completion_date`, `event_status`) VALUES
(73, 'anhEWDJFZHRVNDNOUHlLTHNxbHJZdz09', 27, '2021-10-02', '0000-00-00', 'ended'),
(76, 'YnpPVG9QcXRhZ1RQS09YK0lPekhydz09', 27, '2021-10-03', '0000-00-00', 'ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `event_members`
--

CREATE TABLE `event_members` (
  `unique_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_members`
--

INSERT INTO `event_members` (`unique_id`, `user_id`, `event_id`) VALUES
(20, 2, 30),
(21, 2, 31),
(22, 2, 32),
(23, 2, 33),
(24, 2, 34),
(25, 2, 35),
(26, 2, 36),
(27, 2, 37),
(28, 1, 38),
(29, 6, 38),
(33, 1, 39),
(34, 6, 39),
(35, 1, 40),
(36, 6, 40),
(37, 3, 38),
(38, 1, 41),
(39, 3, 41),
(40, 2, 41),
(41, 1, 42),
(42, 3, 42),
(43, 1, 43),
(44, 2, 43),
(45, 1, 44),
(46, 2, 44),
(47, 1, 45),
(48, 2, 45),
(49, 1, 46),
(50, 3, 46),
(51, 2, 46),
(52, 1, 47),
(53, 9, 47),
(54, 1, 48),
(55, 9, 48),
(56, 2, 48),
(57, 10, 49),
(58, 11, 49),
(59, 12, 49),
(60, 10, 50),
(61, 2, 50),
(62, 3, 50),
(63, 2, 51),
(64, 1, 51),
(65, 3, 51),
(66, 2, 52),
(67, 1, 52),
(68, 3, 52),
(69, 2, 53),
(70, 1, 53),
(71, 3, 53),
(72, 2, 54),
(73, 1, 54),
(74, 3, 54),
(75, 2, 55),
(76, 1, 55),
(77, 3, 55),
(78, 2, 56),
(79, 1, 56),
(80, 3, 56),
(81, 2, 57),
(82, 1, 57),
(83, 3, 57),
(84, 2, 58),
(85, 1, 58),
(86, 3, 58),
(87, 2, 59),
(88, 1, 59),
(89, 3, 59),
(90, 2, 60),
(91, 1, 60),
(92, 3, 60),
(93, 2, 61),
(94, 1, 61),
(95, 3, 61),
(96, 13, 62),
(97, 1, 62),
(98, 16, 62),
(99, 7, 62),
(100, 15, 62),
(101, 20, 62),
(102, 19, 62),
(103, 9, 62),
(104, 17, 62),
(105, 18, 62),
(106, 21, 62),
(107, 22, 62),
(108, 23, 62),
(109, 14, 62),
(110, 10, 63),
(111, 11, 63),
(112, 12, 63),
(113, 10, 64),
(114, 11, 64),
(115, 12, 64),
(116, 10, 65),
(117, 2, 65),
(118, 10, 66),
(119, 2, 66),
(120, 26, 67),
(122, 26, 68),
(124, 25, 69),
(126, 25, 70),
(128, 25, 71),
(129, 26, 71),
(130, 25, 72),
(131, 25, 72),
(132, 27, 73),
(133, 25, 73),
(134, 26, 73),
(135, 27, 74),
(136, 25, 74),
(137, 26, 74),
(138, 27, 75),
(139, 25, 75),
(140, 27, 76),
(141, 25, 76);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'Expense was done by this person',
  `event_id` int(11) NOT NULL,
  `exepence_name` varchar(80) NOT NULL,
  `amount_spend` int(11) NOT NULL,
  `amount_spend_on_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `user_id`, `event_id`, `exepence_name`, `amount_spend`, `amount_spend_on_date`) VALUES
(22, 26, 68, 'c09xbXBtQ1MzNERiNGZzaWhGY2pmQT09', 1000, '2021-10-02'),
(23, 26, 68, 'UkxVeC9ZbklEdjBSVldsTjlUSmNodz09', 2000, '2021-10-02'),
(24, 25, 71, 'REp6aWxUNTFNTXJXUHdrbkxuRVFtZz09', 2000, '2021-10-02'),
(27, 27, 73, 'ZStNNGM4S2h5cTZraVR1YXJxclJOQT09', 2000, '2021-10-02'),
(28, 27, 74, 'c09xbXBtQ1MzNERiNGZzaWhGY2pmQT09', 2900, '2021-10-02'),
(29, 27, 74, 'REp6aWxUNTFNTXJXUHdrbkxuRVFtZz09', 3000, '2021-10-02'),
(30, 26, 74, 'c1NxQ0tXSHlMOERkZ1Y5M2ZHcG9pQT09', 3000, '2021-10-02'),
(31, 27, 75, 'c09xbXBtQ1MzNERiNGZzaWhGY2pmQT09', 2000, '2021-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `user_contact_no` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `user_contact_no`) VALUES
(24, 'WGU4Q2wrRkZ6c3NPRmQ5OWoxTnhaRFE0K2h0UHJzS3N2QmdVOUl0NWc1OD0=', 'K3R4R0F0Snl2ZGZlMitLVVZzQ0ZQZz09', 'aDFiU295T093RlZ5dC83eG1CRkFEZz09', 'RC9Xemdqbi9ESTkrVWdza1U1SzUrQT09'),
(25, 'ZnRYVGRPU241OHRQNVpFdkd1YmVaZz09', 'RVArOXFvNmNyV3Q1Q2xYRURmREZGZz09', 'Qm1aM0ZKd2pVVFhOcjlIV0ErQ2Eydz09', 'bXVPMG1yYS9pVUJQbmxSdGZHRkxIUT09'),
(26, 'WWY2SHlseWhYQVppVDlTTHJRQmdHQT09', 'bVU2OXA4OVgzS0VZc3cxS3Y3ZWtCc2tNNGtVdFBEL2pJK055WnZNekJ5Yz0=', 'a0RNQkxWK2xyK2pRWXQ4dlI5dWl4dz09', 'QUhMcURINUtQVTVhQU9DUlpLL1RJdz09'),
(27, 'MUFKTVJ1T3NtSytpZXFyY0dRWFROUT09', 'RjlmZHkwNFVLWWtzMlRnMWRlSEh0UT09', 'aFY5bUgzcGFEakM2OGtQZGV0MmtOdz09', 'aGlxT2krOWtMbU1OMVlTeHpJazNidz09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `event_members`
--
ALTER TABLE `event_members`
  ADD PRIMARY KEY (`unique_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `event_members`
--
ALTER TABLE `event_members`
  MODIFY `unique_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `event_members`
--
ALTER TABLE `event_members`
  ADD CONSTRAINT `event_members_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`),
  ADD CONSTRAINT `event_members_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`),
  ADD CONSTRAINT `expense_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
