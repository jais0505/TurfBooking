-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2024 at 11:31 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_turfbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Lionel Messi', 'messigoat@gmail.com', 'Messi1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` varchar(30) NOT NULL,
  `time_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `turf_id` int(11) NOT NULL,
  `booking_status` int(30) NOT NULL DEFAULT 0,
  `booking_amount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `time_id`, `user_id`, `turf_id`, `booking_status`, `booking_amount`) VALUES
(19, '2024-09-19', 21, 2, 6, 2, ''),
(20, '2024-09-20', 22, 2, 1, 2, ''),
(21, '2024-09-20', 22, 2, 1, 2, ''),
(22, '2024-09-19', 19, 2, 3, 2, ''),
(23, '2024-09-26', 19, 2, 3, 2, ''),
(24, '2024-09-27', 20, 2, 3, 2, ''),
(25, '2024-09-27', 20, 2, 3, 2, ''),
(26, '2024-09-23', 19, 2, 3, 2, ''),
(27, '2024-09-27', 19, 2, 3, 2, ''),
(28, '2024-09-28', 19, 2, 3, 2, ''),
(29, '2024-09-28', 19, 2, 3, 2, ''),
(30, '2024-09-27', 23, 2, 4, 2, ''),
(31, '2024-09-10', 23, 2, 4, 2, ''),
(32, '2024-09-25', 22, 2, 1, 2, ''),
(33, '2024-09-25', 20, 2, 3, 2, ''),
(34, '2024-09-24', 21, 2, 6, 2, ''),
(35, '2024-09-03', 23, 2, 4, 2, ''),
(36, '2024-09-26', 25, 2, 1, 2, '1500'),
(37, '2024-09-27', 22, 5, 1, 2, '0'),
(38, '2024-10-18', 23, 2, 4, 1, '0'),
(39, '2024-10-09', 25, 2, 1, 1, '1500'),
(40, '2024-10-23', 23, 2, 4, 1, '0'),
(41, '2024-10-10', 25, 2, 1, 2, '1500'),
(42, '2024-10-31', 23, 2, 4, 0, '0'),
(43, '2024-10-23', 25, 2, 1, 0, '1500'),
(44, '2024-11-07', 27, 2, 10, 0, '12000'),
(45, '2024-11-09', 27, 2, 10, 1, '12000'),
(46, '2024-11-13', 27, 3, 10, 2, '12000'),
(47, '2024-11-08', 27, 8, 10, 2, '12000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_title` varchar(30) NOT NULL,
  `complaint_content` varchar(200) NOT NULL,
  `complaint_replay` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `turf_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `complaint_title`, `complaint_content`, `complaint_replay`, `user_id`, `turf_id`) VALUES
(7, 'asdfgh', 'qawsedf', 'SORRY', 2, 3),
(9, 'Time Issue', 'I would like to express my dissatisfaction with the poor time management at your turf. My booking was delayed significantly, causing inconvenience and disruption to our scheduled game. I request that ', '', 2, 4),
(10, 'Time Issue', 'qwertyuiosdfghnm, cvbn', 'Sorry for the inconvience', 8, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(2, 'Ernakulam'),
(3, 'Idukki'),
(4, 'Kasargod'),
(19, 'Kollam'),
(20, 'Thirssur'),
(21, 'Palakkad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `place_pincode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `district_id`, `place_name`, `place_pincode`) VALUES
(1, 1, 'Ambalappuzha', 688007),
(2, 1, 'Aroor', 688534),
(3, 2, 'Kothamangalam', 686691),
(4, 2, 'Muvattupuzha', 686661),
(5, 3, 'Thodupuzha', 685606),
(6, 3, 'Munnar', 685612),
(7, 4, 'Achanthuruthi', 671351),
(8, 4, 'Adur', 671543),
(9, 5, 'Thalassery', 670101),
(10, 5, 'Taliparamba', 670141),
(11, 6, 'Kottukkal', 691306),
(12, 6, 'Edakkad', 691552),
(13, 2, 'kadavanthara', 655443),
(14, 2, 'Aluva', 684326),
(15, 2, 'Kakkanadu', 683544),
(16, 2, 'Kochi', 684362),
(17, 2, 'Kalloorkad', 686668);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `rating_id` int(11) NOT NULL,
  `rating_value` varchar(50) NOT NULL,
  `rating_content` varchar(200) NOT NULL,
  `rating_datetime` varchar(30) NOT NULL,
  `turf_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`rating_id`, `rating_value`, `rating_content`, `rating_datetime`, `turf_id`, `user_id`) VALUES
(1, '5', 'kollam', '2024-09-21 15:05:55', 6, 2),
(2, '2', 'pora', '2024-09-21 15:08:15', 6, 2),
(3, '4', 'Good Service', '2024-09-22 11:27:34', 3, 2),
(4, '4', 'Good', '2024-09-25 10:05:51', 4, 2),
(5, '0', 'gyigi', '2024-10-09 15:08:12', 4, 2),
(6, '4', 'Good Service', '2024-11-02 14:12:05', 10, 8),
(7, '3', 'qwertyu', '2024-11-02 14:12:40', 10, 8),
(8, '5', 'dfghfvggerdw', '2024-11-02 14:21:59', 10, 8),
(9, '2', 'qqwebvyuf', '2024-11-02 14:22:50', 10, 8),
(10, '4', 'qwertjc', '2024-11-02 14:23:17', 10, 8),
(11, '4', 'abcd', '2024-11-02 14:30:48', 10, 8),
(12, '4', 'good', '2024-11-02 14:35:57', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_time`
--

CREATE TABLE `tbl_time` (
  `time_id` int(11) NOT NULL,
  `turf_id` int(11) NOT NULL,
  `time_start` varchar(30) NOT NULL,
  `time_end` varchar(30) NOT NULL,
  `time_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_time`
--

INSERT INTO `tbl_time` (`time_id`, `turf_id`, `time_start`, `time_end`, `time_amount`) VALUES
(24, 3, '07:00', '08:00', 1000),
(25, 1, '08:00', '09:00', 1500),
(26, 9, '11:50', '12:50', 1000),
(27, 10, '01:00', '02:23', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_turf`
--

CREATE TABLE `tbl_turf` (
  `turf_id` int(11) NOT NULL,
  `turf_name` varchar(50) NOT NULL,
  `turf_email` varchar(50) NOT NULL,
  `turf_password` varchar(50) NOT NULL,
  `turf_address` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL,
  `turf_proof` varchar(500) NOT NULL,
  `turf_photo` varchar(500) NOT NULL,
  `turf_vstatus` int(50) NOT NULL DEFAULT 0,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_turf`
--

INSERT INTO `tbl_turf` (`turf_id`, `turf_name`, `turf_email`, `turf_password`, `turf_address`, `place_id`, `turf_proof`, `turf_photo`, `turf_vstatus`, `type_id`) VALUES
(1, 'Calcio', 'calcio@gmail.com', 'c123', 'Near shobhana School,\r\nKothamangalam,Kerala 686691', 3, '96195310.webp', 'ball-488718_640.jpg', 1, 1),
(2, 'Turf', 'turf@gmail.com', 'T123', 'Muvattupuzha', 0, 'ball-488718_640.jpg', 'images (1).jpg', 0, 1),
(4, 'Arena', 'arena123@gmail.com', 'A123', 'Muvattupuzha P O, Kerala 686661', 4, '96195310.webp', 'images.jpg', 1, 3),
(5, 'Sports City', 'sportscity@gmail.com', 'S123', ' Near Lazza icecream, Perumattom, Muvattupuzha, Kerala 686673', 4, 'images (3).jpg', 'ball-488718_640.jpg', 2, 2),
(6, 'Vamos', 'vamos123@gmail.com', 'V123', 'WP3P+Q6X Bus Stop, Undaplavu, Thodupuzha, Kerala 685605', 5, 'images.jpg', '96195310.webp', 1, 3),
(7, 'Play Maker', 'play123@gmail.com', '1234', ' Kothamangalam Bypass Rd, Kothamangalam, Kerala 686666', 3, 'ball-488718_640.jpg', 'images.jpg', 1, 2),
(8, 'Dribble', 'dribble123@gmail.com', 'Dribble@1234', 'Kothamangalam P O, 686691', 3, 'images (3).jpg', 'images.jpg', 1, 2),
(9, 'Turfzy', 'turf123@gmail.com', 'Turf@123', 'kothamangalam', 3, 'img_1.jpg', 'img_3.jpg', 1, 3),
(10, 'Play Football', 'playfootball@gmail.com', 'Play@1234', 'ernakulam', 4, 'bg_2.jpg', 'img_3.jpg', 1, 2),
(11, 'Sports Arena', 'sportsarena@gmail.com', 'Sports@1234', 'Mvuattupuzha P O, 689364', 4, 'img_3.jpg', 'logo.png', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`) VALUES
(1, '5s'),
(2, '7s'),
(3, '11s');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_contact` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_contact`) VALUES
(2, 'Aadhil Anzsar', 'aadhil123@gmail.com', '1234', '99879543678'),
(4, 'John', 'John123@gmail.com', 'John1234@1234', '9876543210'),
(5, 'Don', 'don123@gmail.com', 'Don123@123', '9873456767'),
(6, 'Joseph', 'joseph123@gmail.com', 'Joseph@1234', '9809764534'),
(8, 'Jais Jose', 'jais123@gmail.com', 'Jais1234', '9873456871');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `tbl_time`
--
ALTER TABLE `tbl_time`
  ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `tbl_turf`
--
ALTER TABLE `tbl_turf`
  ADD PRIMARY KEY (`turf_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_time`
--
ALTER TABLE `tbl_time`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_turf`
--
ALTER TABLE `tbl_turf`
  MODIFY `turf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
