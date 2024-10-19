-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 04:37 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `Admin_Name` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `Admin_Password` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `Admin_Name`, `Admin_Password`) VALUES
(1, 'Sahana', 'sahana@123');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `status`, `date_created`) VALUES
(6, '2 Wheeler', 'Active', '2023-02-06 19:16:09'),
(7, '3 Wheeler', 'Active', '2023-02-06 19:16:31'),
(8, '4 Wheeler', 'Active', '2023-02-06 19:16:51'),
(9, '8 Wheeler', 'Active', '2023-02-06 19:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `tid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `action` varchar(20) NOT NULL,
  `cdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`tid`, `id`, `action`, `cdate`) VALUES
(22, 18, 'Inserted', '2023-02-06 19:35:37'),
(23, 18, 'Updated', '2023-02-06 19:35:49'),
(24, 18, 'Updated', '2023-02-06 19:36:13'),
(25, 19, 'Inserted', '2023-02-06 20:05:19'),
(26, 19, 'Updated', '2023-02-06 20:06:17'),
(27, 19, 'Updated', '2023-02-06 20:18:18'),
(28, 19, 'Updated', '2023-02-06 20:28:29'),
(29, 20, 'Inserted', '2023-02-06 20:33:02'),
(30, 19, 'Updated', '2023-02-06 20:35:13'),
(31, 21, 'Inserted', '2023-02-07 09:26:55'),
(32, 21, 'Updated', '2023-02-07 09:32:04'),
(33, 20, 'Deleted', '2023-02-07 09:33:01'),
(34, 22, 'Inserted', '2023-03-15 21:46:17'),
(35, 23, 'Inserted', '2023-03-15 23:04:23'),
(36, 24, 'Inserted', '2023-03-17 23:17:25'),
(37, 25, 'Inserted', '2023-03-17 23:41:02'),
(38, 27, 'Inserted', '2023-03-18 00:03:33'),
(39, 28, 'Inserted', '2023-03-18 00:04:46'),
(40, 27, 'Updated', '2023-03-18 00:10:01'),
(41, 28, 'Updated', '2023-03-18 00:10:16'),
(42, 29, 'Inserted', '2023-03-18 00:11:49'),
(43, 27, 'Updated', '2023-03-18 00:31:04'),
(44, 28, 'Deleted', '2023-03-18 00:31:28'),
(45, 30, 'Inserted', '2023-03-18 00:41:53'),
(46, 18, 'Deleted', '2023-03-19 00:08:21'),
(47, 22, 'Deleted', '2023-03-19 00:08:25'),
(48, 21, 'Deleted', '2023-03-19 00:08:28'),
(49, 19, 'Deleted', '2023-03-19 00:08:31'),
(50, 23, 'Deleted', '2023-03-19 00:08:35'),
(51, 24, 'Deleted', '2023-03-19 00:08:38'),
(52, 25, 'Deleted', '2023-03-19 00:08:41'),
(53, 29, 'Deleted', '2023-03-19 00:08:45'),
(54, 27, 'Deleted', '2023-03-19 00:08:48'),
(55, 30, 'Deleted', '2023-03-19 00:08:52'),
(56, 31, 'Inserted', '2023-03-19 00:14:35'),
(57, 31, 'Updated', '2023-03-19 00:16:23'),
(58, 32, 'Inserted', '2023-03-19 00:18:54'),
(59, 33, 'Inserted', '2023-03-19 00:45:03'),
(60, 34, 'Inserted', '2023-03-19 00:57:49'),
(61, 35, 'Inserted', '2023-03-19 01:01:56'),
(62, 32, 'Deleted', '2023-03-19 01:05:34'),
(63, 33, 'Deleted', '2023-03-19 01:05:37'),
(64, 34, 'Deleted', '2023-03-19 01:05:41'),
(65, 35, 'Deleted', '2023-03-19 01:05:45'),
(66, 32, 'Inserted', '2023-03-20 21:18:20'),
(67, 31, 'Updated', '2023-03-20 21:24:39'),
(68, 33, 'Inserted', '2023-03-20 21:27:00'),
(69, 31, 'Updated', '2023-03-20 21:30:04'),
(70, 32, 'Updated', '2023-03-20 21:30:17'),
(71, 33, 'Updated', '2023-03-20 21:30:34');

-- --------------------------------------------------------

--
-- Table structure for table `mechanic_list`
--

CREATE TABLE `mechanic_list` (
  `id` int(11) NOT NULL,
  `name` char(25) NOT NULL,
  `contact` double NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mechanic_list`
--

INSERT INTO `mechanic_list` (`id`, `name`, `contact`, `email`, `address`, `status`, `date_created`) VALUES
(6, 'Manoj', 7411220742, 'manoj@gmail.com', 'KK doddi, madur, mandya', 'Active', '2023-02-06 18:38:08'),
(7, 'Rajesh', 9845612340, 'rajesh@gmail.com', 'BR road, chamaraja nagara', 'Inactive', '2023-02-06 19:12:14'),
(8, 'Pavan', 8745621352, 'pavan@gmail.com', 'hosagavi', 'Inactive', '2023-02-06 19:13:28'),
(9, 'Suhas', 7564892131, 'suhas@gmail.com', 'KR nagar', 'Active', '2023-02-06 19:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `request_meta`
--

CREATE TABLE `request_meta` (
  `sid` int(11) NOT NULL,
  `contact` double NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `vehicle_name` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `vehicle_regno` varchar(50) NOT NULL,
  `vehicle_model` varchar(50) NOT NULL,
  `service_type` char(50) NOT NULL DEFAULT 'Drop Off',
  `pickup_address` text CHARACTER SET utf8mb4
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_meta`
--

INSERT INTO `request_meta` (`sid`, `contact`, `email`, `address`, `vehicle_name`, `vehicle_regno`, `vehicle_model`, `service_type`, `pickup_address`) VALUES
(31, 7845612345, 'yogesh@gmail.com', 'hotagalli', 'honda', 'KA-09-JD-4365', '2016', 'Drop Off', ''),
(32, 7845692135, 'adharsh@gmail.com', 'hubali', 'splender', 'KA-51-UR-2456', '2016', 'Drop Off', ''),
(33, 7090029595, 'rakesh@gmail.com', 'mysore city', 'hero', 'KA-01-RS-8452', '2016', 'Drop Off', 'mysore city');

-- --------------------------------------------------------

--
-- Table structure for table `service_list`
--

CREATE TABLE `service_list` (
  `id` int(11) NOT NULL,
  `service` text CHARACTER SET utf8mb4 NOT NULL,
  `description` text CHARACTER SET utf8mb4 NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_list`
--

INSERT INTO `service_list` (`id`, `service`, `description`, `status`, `date_created`) VALUES
(5, 'general checkup', 'checkuping your vehicle with a good manner by using good material', 'Active', '2023-02-06 19:19:53'),
(6, 'tire replacement ', 'replacing a tire with a good company tire which is worth', 'Inactive', '2023-02-06 19:21:40'),
(7, 'water service', 'servicing the vehicle by using good materials at finally it will be a good looking', 'Active', '2023-02-06 19:28:42'),
(8, 'engine problem', 'making a successful engine which can run for a longer time', 'Active', '2023-02-06 19:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `service_requests`
--

CREATE TABLE `service_requests` (
  `id` int(11) NOT NULL,
  `owner_name` text CHARACTER SET utf8mb4 NOT NULL,
  `category_id` int(11) NOT NULL,
  `services` char(50) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'general check up',
  `mechanic_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_requests`
--

INSERT INTO `service_requests` (`id`, `owner_name`, `category_id`, `services`, `mechanic_id`, `status`, `date_created`, `uid`) VALUES
(31, 'Yogesh', 6, 'oil service, tire replacement, general checkup', 9, 'Active', '2023-03-19 00:14:35', 6),
(32, 'Adharsh', 8, 'oil service, tire replacement, general checkup', 9, 'Inactive', '2023-03-20 21:18:20', 6),
(33, 'Rakesh', 8, 'oil service, tire replacement, general checkup', 6, 'Inactive', '2023-03-20 21:27:00', 8);

--
-- Triggers `service_requests`
--
DELIMITER $$
CREATE TRIGGER `deleteLog` BEFORE DELETE ON `service_requests` FOR EACH ROW INSERT INTO logs VALUES(null,OLD.id,'Deleted',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertLog` AFTER INSERT ON `service_requests` FOR EACH ROW INSERT INTO logs VALUES(null,NEW.id,'Inserted',NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateLog` AFTER UPDATE ON `service_requests` FOR EACH ROW INSERT INTO logs VALUES(null,NEW.id,'Updated',NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `name`, `email`, `password`) VALUES
(3, 'Tejas', 'tejas@gmail.com', '463bdec3b47d49e0d3132ece53ece1e0'),
(4, 'Chethan', 'chethan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'rakshith', 'rakshi@gmail.com', '202cb962ac59075b964b07152d234b70'),
(6, 'murali', 'murali@gmail.com', 'bbbe2420ecb23b5c5a78d363c4e715de'),
(7, 'Prathima', 'prathima@gmail.com', '39e7f8046f6e30d3824eb28eb7aeec90'),
(8, 'anand', 'anand@gmail.com', 'ba81bc9f9d1e38af93a93eb3b2ca7f9d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `mechanic_list`
--
ALTER TABLE `mechanic_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_meta`
--
ALTER TABLE `request_meta`
  ADD KEY `fk_sid` (`sid`) USING BTREE;

--
-- Indexes for table `service_list`
--
ALTER TABLE `service_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `mechanic_list`
--
ALTER TABLE `mechanic_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `service_list`
--
ALTER TABLE `service_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service_requests`
--
ALTER TABLE `service_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `request_meta`
--
ALTER TABLE `request_meta`
  ADD CONSTRAINT `fk_sid` FOREIGN KEY (`sid`) REFERENCES `service_requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
