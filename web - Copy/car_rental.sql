-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 09:03 PM
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
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_addons`
--

CREATE TABLE `tbl_addons` (
  `id` int(11) NOT NULL,
  `item` varchar(50) NOT NULL,
  `charge` double NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_addons`
--

INSERT INTO `tbl_addons` (`id`, `item`, `charge`, `created`) VALUES
(1, 'Dash Cam\n', 250, '2024-03-09 14:39:31'),
(2, 'Baby Car Seat\n', 250, '2024-03-09 14:39:31');

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
-- Table structure for table `tbl_car`
--

CREATE TABLE `tbl_car` (
  `id` int(11) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(75) NOT NULL,
  `reg_no` varchar(100) NOT NULL,
  `car_type` varchar(20) NOT NULL,
  `features` text NOT NULL,
  `full_specifications` text NOT NULL,
  `requirements` text NOT NULL,
  `rent_per_hour` double NOT NULL,
  `rent_per_day` double NOT NULL,
  `location_id` int(11) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_car`
--

INSERT INTO `tbl_car` (`id`, `brand`, `model`, `reg_no`, `car_type`, `features`, `full_specifications`, `requirements`, `rent_per_hour`, `rent_per_day`, `location_id`, `photo`, `created`) VALUES
(1, 'BMW 7 Series\n', '2.8 Petrol, Max Speed: 280 mph\n', 'DM HA 13-5689', 'Car', 'Features', 'Full Specifications', 'Requirements', 5, 7000, 2, 'photo2024-03-15-01-42-41_65f3533109555.png', '2024-03-09 11:15:54'),
(2, 'Ford Z model', 'Allion A15', 'DM HA 13-5689', 'Car', 'Features', 'Full Specifications', 'Requirements', 10, 7000, 1, 'photo2024-03-15-01-43-03_65f3534769f26.png', '2024-03-09 11:15:54'),
(3, 'Toyota', 'Allion A15', 'DM HA 13-5689', 'Van', 'Features', 'Full Specifications', 'Requirements', 20, 7000, 2, 'photo2024-03-15-01-44-27_65f3539b028c5.png', '2024-03-09 11:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car_addons`
--

CREATE TABLE `tbl_car_addons` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `item` varchar(50) NOT NULL,
  `charge` double NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_car_addons`
--

INSERT INTO `tbl_car_addons` (`id`, `car_id`, `item`, `charge`, `created`) VALUES
(5, 1, 'Dash Cam\r\n', 250, '2024-03-09 21:14:04');

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
(1, 'F1 AUTOMOTIVES', 'www.d.com', '123 Street, London, UK', '+012 345 6789', '', 'info@F1 AUTOMOTIVES.com', 'www.F1 AUTOMOTIVES.com', 'Mon - Fri : 09.00 AM - 09.00 PM', 0, ' <iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d39715.59096504453!2d-0.14743977515065607!3d51.52744323514863!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1710445004191!5m2!1sen!2sbd\" width=\"600\" height=\"350\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>\" > ', 'facebook.com', 'youtube.com', '', 'logo2024-03-15-01-38-42_65f3524276d6b.png', 1, 1, 'Active', '0000-00-00', '0000-00-00', '2020-10-31', '44e42536b76130fb1df21c5972566c21', 'Yearly', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `id` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `cr` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`id`, `location`, `cr`) VALUES
(1, 'Mirpur', '2024-03-09 07:35:59'),
(2, 'Uttara', '2024-03-09 07:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `pickupLocation` int(11) NOT NULL,
  `pickupDate` date NOT NULL,
  `pickupTime` time NOT NULL,
  `dropOffLocation` int(11) NOT NULL,
  `dropOffDate` date NOT NULL,
  `dropOffTime` time NOT NULL,
  `h_ours` int(11) NOT NULL,
  `d_ays` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `charge` double NOT NULL,
  `pcharge` double NOT NULL,
  `dcharge` double NOT NULL,
  `addons` double NOT NULL,
  `total` double NOT NULL,
  `status` varchar(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `pickupLocation`, `pickupDate`, `pickupTime`, `dropOffLocation`, `dropOffDate`, `dropOffTime`, `h_ours`, `d_ays`, `car_id`, `fullname`, `address`, `contact`, `email`, `charge`, `pcharge`, `dcharge`, `addons`, `total`, `status`, `created`) VALUES
(2, 1, '2024-03-15', '04:00:00', 2, '2024-03-15', '08:00:00', 4, 0, 1, 'Md Abdullah Al Mamun', 'Basurhat, Companygonj, Noakhali', '01777615690', 'exploreit@outlook.com', 20, 10, 20, 250, 300, 'Pending', '2024-03-15 19:27:44'),
(3, 1, '2024-03-15', '04:00:00', 2, '2024-03-15', '08:00:00', 4, 0, 1, 'Md Abdullah Al Mamun', 'Basurhat, Companygonj, Noakhali', '01777615690', 'exploreit@outlook.com', 20, 10, 20, 250, 300, 'Pending', '2024-03-15 19:28:51');

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
(1, 'Fixed', 'About Us', '<p class=\"mb-4\">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>                    <div class=\"row g-4 mb-3 pb-3\">                        <div class=\"col-12 wow fadeIn\" data-wow-delay=\"0.1s\">                            <div class=\"d-flex\">                                <div class=\"bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1\" style=\"width: 45px; height: 45px;\">                                    <span class=\"fw-bold text-secondary\">01</span>                                </div>                                <div class=\"ps-3\">                                    <h6>Our Strategy</h6>                                    <span>Diam dolor diam ipsum sit amet diam et eos</span>                                </div>                            </div>                        </div>                        <div class=\"col-12 wow fadeIn\" data-wow-delay=\"0.3s\">                            <div class=\"d-flex\">                                <div class=\"bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1\" style=\"width: 45px; height: 45px;\">                                    <span class=\"fw-bold text-secondary\">02</span>                                </div>                                <div class=\"ps-3\">                                    <h6>Mission   </h6>                                    <span>Diam dolor diam ipsum sit amet diam et eos</span>                                </div>                            </div>                        </div>                        <div class=\"col-12 wow fadeIn\" data-wow-delay=\"0.5s\">                            <div class=\"d-flex\">                                <div class=\"bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1\" style=\"width: 45px; height: 45px;\">                                    <span class=\"fw-bold text-secondary\">03</span>                                </div>                                <div class=\"ps-3\">                                    <h6>Vission</h6>                                    <span>Diam dolor diam ipsum sit amet diam et eos</span>                                </div>                            </div>                        </div>                    </div> ', 'photo2024-03-15-01-11-19_65f34bd70a3e2.jpg', '', 0, ' ', ' ', 0, '\'Published\'', '2024-03-15'),
(2, 'Fixed', 'Quality Service', 'Diam dolor diam ipsum sit amet diam et eos erat ipsum', 'photo2024-03-15-01-02-40_65f349d05727c.jpg', '', 0, ' ', ' ', 0, '\'Published\'', '2024-03-15'),
(3, 'Fixed', 'Convenience and Flexibility', 'Diam dolor diam ipsum sit amet diam et eos erat ipsum', 'photo2024-03-15-01-03-12_65f349f0822e1.jpg', '', 0, ' ', ' ', 0, '\'Published\'', '2024-03-15'),
(4, 'Fixed', 'Modern Equipment', 'Diam dolor diam ipsum sit amet diam et eos erat ipsum', 'photo2024-03-15-01-03-29_65f34a01a5720.jpg', '', 0, ' ', ' ', 0, '\'Published\'', '2024-03-15'),
(5, 'Fixed', 'Years Experience', '1234', 'photo2024-03-15-01-11-53_65f34bf94a742.jpg', '', 0, ' ', ' ', 0, '\'Published\'', '2024-03-15'),
(6, 'Fixed', 'Location', '12', 'photo2024-03-15-01-12-24_65f34c1872e40.jpg', '', 0, ' ', ' ', 0, '\'Published\'', '2024-03-15'),
(7, 'Fixed', 'Satisfied Clients', '2454', 'photo2024-03-15-01-12-38_65f34c26ca385.jpg', '', 0, ' ', ' ', 0, '\'Published\'', '2024-03-15'),
(8, 'Fixed', 'Vehicle', '76', 'photo2024-03-15-01-13-15_65f34c4b5e164.jpg', '', 0, ' ', ' ', 0, '\'Published\'', '2024-03-15'),
(9, 'Fixed', 'Certified and Award Winning Car Rental Service Provider', 'Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum. Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit. Sea dolore sanctus sed et. Takimata takimata sanctus sed.', 'photo2024-03-15-01-21-26_65f34e36034de.jpg', '', 0, ' ', ' ', 0, '\'Published\'', '2024-03-15'),
(10, 'Testimonial', 'Client Name', 'Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.', 'photo2024-03-15-01-23-10_65f34e9e38d72.jpg', '', 0, ' ', ' ', 0, '\'Published\'', '2024-03-15'),
(11, 'Testimonial', 'Client Name', 'Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.  ', 'photo2024-03-15-01-23-16_65f34ea4b7eb6.jpg', '', 0, ' ', ' ', 0, '\'Published\'', '2024-03-15'),
(12, 'Testimonial', 'Client Name', 'Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.  ', 'photo2024-03-15-01-23-21_65f34ea99c745.jpg', '', 0, ' ', ' ', 0, '\'Published\'', '2024-03-15'),
(13, 'Testimonial', 'Client Name', 'Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.  ', 'photo2024-03-15-01-23-29_65f34eb1a868d.jpg', '', 0, ' ', ' ', 0, '\'Published\'', '2024-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pick_drop`
--

CREATE TABLE `tbl_pick_drop` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `p_ick` double NOT NULL,
  `d_rop` double NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pick_drop`
--

INSERT INTO `tbl_pick_drop` (`id`, `car_id`, `location_id`, `p_ick`, `d_rop`, `created`) VALUES
(10, 1, 1, 10, 20, '2024-03-09 21:01:03'),
(11, 1, 2, 10, 20, '2024-03-09 21:01:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_addons`
--
ALTER TABLE `tbl_addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_car`
--
ALTER TABLE `tbl_car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_car_addons`
--
ALTER TABLE `tbl_car_addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_id` (`order_id`,`pickupLocation`,`dropOffLocation`,`car_id`),
  ADD KEY `order_id_2` (`order_id`,`pickupLocation`,`dropOffLocation`,`car_id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pick_drop`
--
ALTER TABLE `tbl_pick_drop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_addons`
--
ALTER TABLE `tbl_addons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_car`
--
ALTER TABLE `tbl_car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_car_addons`
--
ALTER TABLE `tbl_car_addons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_pick_drop`
--
ALTER TABLE `tbl_pick_drop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
