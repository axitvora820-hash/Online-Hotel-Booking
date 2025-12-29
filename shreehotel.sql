-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 04:11 AM
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
-- Database: `shreehotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `password`) VALUES
(1, 'jay@gmail.com', 'Jay123');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `RoomType` varchar(30) NOT NULL,
  `Bed` varchar(30) NOT NULL,
  `NoofRoom` int(30) NOT NULL,
  `cin` date NOT NULL,
  `cout` date NOT NULL,
  `meal` varchar(30) NOT NULL,
  `roomtotal` varchar(100) NOT NULL,
  `bedtotal` varchar(100) NOT NULL,
  `mealtotal` varchar(100) NOT NULL,
  `finaltotal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `Name`, `Email`, `RoomType`, `Bed`, `NoofRoom`, `cin`, `cout`, `meal`, `roomtotal`, `bedtotal`, `mealtotal`, `finaltotal`) VALUES
(35, 'jjay', 'j@gmail.com', 'Super Room', 'Triple', 1, '2024-07-20', '2024-07-22', 'Half Board', '3000', '600', '500', '4100'),
(36, 'jay', 'yashu@.com', 'Super Room', 'Double', 1, '2024-07-20', '2024-07-24', 'Breakfast', '3000', '400', '300', '3700');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(20) NOT NULL,
  `username` varchar(52) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'j@gmail.com', '123'),
(2, 'admin', 's@gmail.com', '10'),
(3, 'jay', 'a@gmail.com', '10'),
(4, 'jay', 'jay@gmail.com', '111'),
(5, 'jay', 'jay@gamil.com', 'jay@123'),
(6, 'yashbhai', 'yashu@.com', '70'),
(7, '123', '123@gmail.com', '123'),
(8, 'nikk', 'nikk@123.com', '1411'),
(9, 'ab', '@gmail.com', '123'),
(10, 'Jayshree Donga', 'jayshreegdonga@gmail.c', '123'),
(11, 'jayshree donga', 'jayshreegdonga@gmail.c', '123'),
(12, 'jayshree donga', 'jayshree@gmail.com', '123'),
(13, 'jay', 'jay@123gmail.com', '123'),
(14, 'kamal', 'kamal@gmail.com', '123'),
(15, 'babu@12345678900987665433221', 'babu@123456789011112131415@gmail.com', '123'),
(16, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(100) NOT NULL,
  `name` varchar(110) NOT NULL,
  `email` varchar(110) NOT NULL,
  `mobilenumber` varchar(110) NOT NULL,
  `room_type` varchar(110) NOT NULL,
  `bed` varchar(110) NOT NULL,
  `number_of_room` int(110) NOT NULL,
  `meal` varchar(110) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `name`, `email`, `mobilenumber`, `room_type`, `bed`, `number_of_room`, `meal`, `check_in`, `check_out`) VALUES
(35, 'jjay', 'j@gmail.com', '12', 'Super Room', 'Triple', 1, 'Half Board', '2024-07-20', '2024-07-22'),
(36, 'jay', 'yashu@.com', '111', 'Super Room', 'Double', 1, 'Breakfast', '2024-07-20', '2024-07-24'),
(40, 'admin', 's@gmail.com', '111', 'Simple Room', 'Double', 1, 'Room only', '2024-07-21', '2024-07-23'),
(42, 'jay', 'yashu@.com', '635508038055', 'Simple Room', 'Double', 1, 'Breakfast', '2024-07-21', '2024-07-22'),
(43, 'jay', 'yashu@.com', '635508038055', 'Simple Room', 'Double', 1, 'Breakfast', '2024-07-21', '2024-07-22'),
(44, 'admin', 'jay@gmail.com', '112221111111', 'Deluxe Room', 'Triple', 1, 'Half Board', '2024-07-24', '2024-07-29'),
(45, 'yashbhai', 'jay@gamil.com', '12345678987', 'Super Room', 'Double', 1, 'Half Board', '2024-07-25', '2024-07-28'),
(46, 'jjay', 'yashu@.com', '635508038055', 'Deluxe Room', 'Double', 1, 'Room only', '2024-07-25', '2024-07-29'),
(47, 'jjay', 'yashu@.com', '635508038055', 'Deluxe Room', 'Double', 1, 'Room only', '2024-07-25', '2024-07-29'),
(48, 'jjay', 'yashu@.com', '63550', 'Simple Room', 'Triple', 1, 'Half Board', '2024-07-20', '2024-07-22'),
(52, 'hihi', 'dmbf.@gmail.com', '3232233232', 'Simple Room', 'Quad', 1, 'Full Board', '2023-10-26', '2024-08-01'),
(53, 'jay', 'hay@123.com', '8128564875', 'super room', 'Quad', 1, 'Full Board', '2024-09-03', '2024-10-10'),
(54, 'jay', '123@gmail.com', '8128564875', 'Simple Room', '', 1, 'Half Board', '2024-09-09', '2024-10-10'),
(55, 'jay', 'hay@123.com', '8128564875', 'super room', 'Quad', 1, 'Full Board', '2024-09-03', '2024-10-10'),
(58, 'darshil', 'hay@123.com', '1234567898', 'Super Room', 'Quad', 1, 'Full Board', '2024-10-01', '2024-12-20'),
(59, 'nikk', 'nikk@123.com', '9106788133', 'Super Room', 'Quad', 1, 'Full Board', '2024-09-15', '2024-09-19'),
(60, 'ab', '@gmail.com', '1234567898', 'Super Room', 'Single', 1, 'Full Board', '1111-11-11', '1111-11-11'),
(61, 'ravi', 'ravi@123gmail.com', '1233456789', 'Simple Room', 'Quad', 1, 'Half Board', '2024-09-17', '2024-10-07'),
(62, 'jayshree', 'jayshreegdonga@gmail.com', '8511816474', 'Simple Room', '', 0, '', '2024-09-18', '2024-09-19'),
(63, 'kamal', 'kamal@gmail.com', '8511816474', 'Simple Room', 'Single', 1, 'Room only', '2024-09-17', '2024-09-19'),
(64, 'babu@12345678900987665433221', 'babu@123456789011112131415@gmail.com', '9898989898', 'Super Room', 'Quad', 1, 'Half Board', '2024-09-19', '2024-10-12'),
(65, 'babu@12345678900987665433221', 'babu@123456789011112131415@gmail.com', '9898989898', 'Simple Room', 'Triple', 1, 'Room only', '2024-10-05', '2024-10-11'),
(66, 'babu@12345678900987665433221', 'babu@123456789011112131415@gmail.com', '9898989898', 'Simple Room', 'Triple', 1, 'Room only', '2024-10-05', '2024-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `roomdetails`
--

CREATE TABLE `roomdetails` (
  `id` int(100) NOT NULL,
  `images` varchar(200) NOT NULL,
  `roomtype` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `bedroom` varchar(200) NOT NULL,
  `bathroom` varchar(200) NOT NULL,
  `balcony` varchar(200) NOT NULL,
  `sofa` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomdetails`
--

INSERT INTO `roomdetails` (`id`, `images`, `roomtype`, `price`, `bedroom`, `bathroom`, `balcony`, `sofa`) VALUES
(2, '../img/room-3.jpeg', 'super room', 2000, '1 bedroom', '', '', ''),
(3, '../img/room-3.jpeg', 'super room', 2000, '1 bedroom', '', '', ''),
(4, '../img/room-2.jpg', 'super room', 2000, '1 bedroom', '', '', ''),
(5, '../img/bg.jpg', 'deluxe', 1200, '1 bedroom', '', '', ''),
(6, '../img/hotel2.jpg', 'Deluxe room', 1200, '1 bedroom', '', '', ''),
(7, '../img/room-1.jpeg', 'Deluxe room', 1200, '1 bedroom', '', '', ''),
(19, 'room-3.jpeg', 'Simple Room', 800, '1', '2', '2', '2'),
(20, 'room-1.jpeg', 'Simple Room', 800, '1 ', '1', '2', '1 ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomdetails`
--
ALTER TABLE `roomdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `roomdetails`
--
ALTER TABLE `roomdetails`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
