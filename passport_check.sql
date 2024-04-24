-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 12:40 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `passport_check`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active',
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `clientid`, `fullname`, `email`, `password`, `mobile`, `photo`, `role`, `status`, `created`) VALUES
(1, 1, 'Admin', 'admin@admin.com', '$2y$10$/XZsL2iLtg8xk9oM/cUdpuBQkK3NIWtYnDpVT0BaKJurcyJNGF8pW', 1711596396, 'logo2023-11-07-01-29-51_65493eaf0d4d9.png', 0, 'Active', '2022-01-22 08:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `id` int(11) NOT NULL,
  `institute` varchar(120) NOT NULL,
  `tagline` varchar(250) NOT NULL,
  `address` varchar(250) CHARACTER SET utf16 NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(64) NOT NULL,
  `web` varchar(100) NOT NULL,
  `t_ime` varchar(50) NOT NULL,
  `featured_video` int(11) NOT NULL,
  `google_map` text NOT NULL,
  `face_book` varchar(100) NOT NULL,
  `you_tube` varchar(100) NOT NULL,
  `owner` varchar(150) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `language` int(11) NOT NULL,
  `version` int(11) NOT NULL,
  `status` varchar(67) NOT NULL,
  `created` date NOT NULL,
  `extension` date NOT NULL,
  `expire` date NOT NULL,
  `smstoken` varchar(120) NOT NULL,
  `package` varchar(25) NOT NULL,
  `fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`id`, `institute`, `tagline`, `address`, `mobile`, `phone`, `email`, `web`, `t_ime`, `featured_video`, `google_map`, `face_book`, `you_tube`, `owner`, `logo`, `language`, `version`, `status`, `created`, `extension`, `expire`, `smstoken`, `package`, `fee`) VALUES
(1, 'Online Visa Process', 'www.onlinevisaprocess.com', 'Dhaka, Bangladesh', '0', '', 'info@onlinevisaprocess.com', 'www.onlinevisaprocess.com', 'Mon - Fri : 09.00 AM - 09.00 PM', 0, '<iframe src=\"https://www.google.com/maps/d/embed?mid=1Ud5DRnqhKifdeHQ0wjENsGgLp_0&hl=en_US&ehbc=2E312F\" width=\"100%\" height=\"480\"></iframe>', 'facebook.com', 'youtube.com', '', 'logo2024-04-24-12-55-16_6628acd4bc667.png', 1, 1, 'Active', '0000-00-00', '0000-00-00', '2020-10-31', '44e42536b76130fb1df21c5972566c21', 'Yearly', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL,
  `menu` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `title` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `contants` text CHARACTER SET utf8mb4 NOT NULL,
  `photo` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `attachment` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `album_id` int(11) NOT NULL,
  `meta` text CHARACTER SET utf8mb4 NOT NULL,
  `keywords` text CHARACTER SET utf8mb4 NOT NULL,
  `hits` int(11) NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 NOT NULL DEFAULT '''Published''',
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `menu`, `title`, `contants`, `photo`, `attachment`, `album_id`, `meta`, `keywords`, `hits`, `status`, `created`) VALUES
(1, 'Fixed', 'About Online Visa Process', 'Dolores lorem lorem ipsum sit et ipsum. Sadip sea amet diam dolore sed et. Sit rebum labore sit sit ut vero no sit. Et elitr stet dolor sed sit et sed ipsum et kasd ut. Erat duo eos et erat sed diam duoDolores lorem lorem ipsum sit et ipsum. Sadip sea amet diam dolore sed et. Sit rebum labore sit sit ut vero no sit. Et elitr stet dolor sed sit et sed ipsum et kasd ut. Erat duo eos et erat sed diam duoDolores lorem lorem ipsum sit et ipsum. Sadip sea amet diam dolore sed et. Sit rebum labore sit sit ut vero no sit. Et elitr stet dolor sed sit et sed ipsum et kasd ut. Erat duo eos et erat sed diam duoDolores lorem lorem ipsum sit et ipsum. Sadip sea amet diam dolore sed et. Sit rebum labore sit sit ut vero no sit. Et elitr stet dolor sed sit et sed ipsum et kasd ut. Erat duo eos et erat sed diam duo', 'photo2024-04-24-13-05-44_6628af48752b4.jpg', '', 0, ' ', ' ', 0, '\'Published\'', '2024-04-24'),
(2, 'Visa Process', 'Saudi Arabia', 'Saudi Arabia, officially the Kingdom of Saudi Arabia, is a country in West Asia and the Middle East. It covers the bulk of the Arabian Peninsula and has a land area of about 2150000 km², making it the fifth-largest country in Asia and the largest in the Middle East', 'photo2024-04-24-13-31-56_6628b56c6ba3d.jpg', '', 0, ' ', ' ', 0, '\'Published\'', '2024-04-24'),
(3, 'Visa Process', 'Canada', 'Find out what document you need to travel, visit family and friends, do business, or transit through Canada, and how to extend your stay.', 'photo2024-04-24-13-58-14_6628bb9635917.jpg', '', 0, ' ', ' ', 0, '\'Published\'', '2024-04-24'),
(4, 'Visa Process', 'California', 'Find out what document you need to travel, visit family and friends, do business, or transit through California, and how to extend your stay.', 'photo2024-04-24-13-58-50_6628bbba3fd6d.jpg', '', 0, ' ', ' ', 0, '\'Published\'', '2024-04-24'),
(5, 'Testimonial', 'Client Name', 'Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr clita lorem. Dolor ipsum sanct clita', 'photo2024-04-24-14-04-37_6628bd15c2844.jpg', '', 0, ' ', ' ', 0, '\'Published\'', '2024-04-24'),
(6, 'Testimonial', 'Client Name', 'Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr clita lorem. Dolor ipsum sanct clita  ', 'photo2024-04-24-14-04-42_6628bd1ae7e10.jpg', '', 0, ' ', ' ', 0, '\'Published\'', '2024-04-24'),
(7, 'Testimonial', 'Client Name', 'Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr clita lorem. Dolor ipsum sanct clita  ', 'photo2024-04-24-14-04-47_6628bd1fd90a2.jpg', '', 0, ' ', ' ', 0, '\'Published\'', '2024-04-24'),
(8, 'Testimonial', 'Client Name', 'Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr clita lorem. Dolor ipsum sanct clita', 'photo2024-04-24-14-04-53_6628bd2546c6e.jpg', '', 0, ' ', ' ', 0, '\'Published\'', '2024-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_passport_check`
--

CREATE TABLE `tbl_passport_check` (
  `id` int(11) NOT NULL,
  `pp_no` text NOT NULL,
  `pp_name` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `attachment` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_passport_check`
--

INSERT INTO `tbl_passport_check` (`id`, `pp_no`, `pp_name`, `status`, `comment`, `attachment`, `created`) VALUES
(1, 'aasdfh74645', 'Holder ', 'Runing', 'Comment', 'attachment2024-04-23-16-48-02_662791e21a0da.pdf', '2024-04-24 08:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `cr` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `status`, `cr`) VALUES
(1, 'Mirpur', '2024-03-09 07:35:59'),
(3, 'Active', '2024-04-23 07:46:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_passport_check`
--
ALTER TABLE `tbl_passport_check`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_passport_check`
--
ALTER TABLE `tbl_passport_check`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
