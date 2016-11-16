-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2016 at 12:07 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `criminaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(7, 'admin', 'admin@mail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(8, 'new police', 'new@new.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `crimetable`
--

CREATE TABLE `crimetable` (
  `crime_id` int(11) NOT NULL,
  `crime_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crimetable`
--

INSERT INTO `crimetable` (`crime_id`, `crime_type`) VALUES
(1, 'robbary'),
(2, 'sabotage'),
(3, 'Burglary'),
(4, 'Murder'),
(7, 'attempt to murder');

-- --------------------------------------------------------

--
-- Table structure for table `criminaltable`
--

CREATE TABLE `criminaltable` (
  `c_t_id` int(11) NOT NULL,
  `c_t_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criminaltable`
--

INSERT INTO `criminaltable` (`c_t_id`, `c_t_type`) VALUES
(1, 'most wanted'),
(2, 'thief'),
(3, 'wanted');

-- --------------------------------------------------------

--
-- Table structure for table `criminal_info`
--

CREATE TABLE `criminal_info` (
  `c_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `crime_type` varchar(255) NOT NULL,
  `c_t_type` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `height` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `station_id` int(11) NOT NULL,
  `release_date` date NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `criminal_info`
--

INSERT INTO `criminal_info` (`c_id`, `name`, `crime_type`, `c_t_type`, `age`, `height`, `description`, `gender`, `address`, `station_id`, `release_date`, `image`) VALUES
(25, 'Nowshad', '', 'most wanted', 23, '5.10', 'vala chor', 'Male', 'hathazari', 4, '0000-00-00', '1470037462avatar5.png'),
(26, 'Anika', 'Murder', 'most wanted', 23, '5.5', 'sarod k marseee', 'Male', 'love lane', 3, '0000-00-00', '1470037733avatar3.png');

-- --------------------------------------------------------

--
-- Table structure for table `missingtable`
--

CREATE TABLE `missingtable` (
  `missing_id` int(11) NOT NULL,
  `missing_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `height` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `station_id` int(11) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Still Missing',
  `added_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `missingtable`
--

INSERT INTO `missingtable` (`missing_id`, `missing_name`, `description`, `age`, `height`, `gender`, `image`, `address`, `station_id`, `contact`, `date`, `status`, `added_by`, `updated_by`) VALUES
(24, 'MMR', 'koi ek din dore', 23, '5.5', 'Male', '1470038170avatar04.png', 'gec', 4, '233434', '2016-07-22', 'Found', '', ''),
(25, 'Rubel', 'Nikhoj', 12, '4.5', 'Male', '1470039543avatar.png', 'afdsf', 1, '12354', '2016-06-28', 'Still Missing', '', ''),
(26, 'Abdul', 'harai gese', 23, '4', 'Male', '1470041406avatar.png', 'hathazari', 1, '01928374', '2016-07-05', 'Still Missing', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `police_info`
--

CREATE TABLE `police_info` (
  `p_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `police_code` varchar(255) NOT NULL,
  `nid` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `police_info`
--

INSERT INTO `police_info` (`p_id`, `name`, `email`, `password`, `police_code`, `nid`, `status`) VALUES
(3, 'Hamid', 'a@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'nadf', '34343434', 'Active'),
(4, 'Hamid', 'a@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'nadf', '34343434', 'Active'),
(5, 'Hamid', 'a@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'nadf', '34343434', 'Active'),
(8, 'karim', 'karim@k.com', '81dc9bdb52d04dc20036dbd8313ed055', '1111', '123', 'Active'),
(9, 'Nowshad', '1@1.com', '81dc9bdb52d04dc20036dbd8313ed055', 'asdfs', '23232323', 'Active'),
(10, 'Nowshad', 's@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '11212', '12121212', 'Active'),
(11, 'Fahad', 's@gma.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234', '1234', 'Active'),
(12, 'Rubel', '1@gm.com', '81dc9bdb52d04dc20036dbd8313ed055', '12121', 'sdfasdfsadf', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `police_profile`
--

CREATE TABLE `police_profile` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `thana` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postal` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `police_profile`
--

INSERT INTO `police_profile` (`id`, `p_id`, `designation`, `thana`, `city`, `address`, `postal`, `gender`, `phone`, `image`) VALUES
(11, 8, 'oc', 'Ramna', 'Chittagong', 'fdsdgf', '4444', 'Male', 123454, '1469903386seitqp3gl1q7all5ndbdt1ch00263374.JPG-final.jpg'),
(12, 9, '', '', '', '', '', '', 0, 'avatar5.png'),
(13, 10, '', '', '', '', '', '', 0, 'avater5.png'),
(14, 11, '', '', '', '', '', '', 0, 'avatar5.png'),
(15, 12, 'OC', 'Halishohor', 'Chittagong', 'asdfsadf', '1234', 'Male', 212212, 'avatar5.png');

-- --------------------------------------------------------

--
-- Table structure for table `police_station`
--

CREATE TABLE `police_station` (
  `station_id` int(11) NOT NULL,
  `station_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `police_station`
--

INSERT INTO `police_station` (`station_id`, `station_name`) VALUES
(1, 'Hathazari'),
(2, 'Kotowali'),
(3, 'Halishohor'),
(4, 'Panchlaish'),
(5, 'Chandgao'),
(6, 'Bayezid'),
(7, 'Khulshi');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nid` int(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `name`, `email`, `nid`, `password`) VALUES
(1, 'Nowshad', 'new@new.com', 1234, '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'rony', 'rony@gmail.com', 123456, 'a6296f234a2ff4800237a96a049ca58c');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(20) NOT NULL,
  `thana` varchar(20) NOT NULL,
  `postal` int(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` int(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `address`, `city`, `thana`, `postal`, `gender`, `phone`, `image`) VALUES
(1, 1, '', '', '', 0, '', 0, 'avatar04.png'),
(2, 2, '', '', '', 0, '', 0, 'avatar04.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crimetable`
--
ALTER TABLE `crimetable`
  ADD PRIMARY KEY (`crime_id`);

--
-- Indexes for table `criminaltable`
--
ALTER TABLE `criminaltable`
  ADD PRIMARY KEY (`c_t_id`);

--
-- Indexes for table `criminal_info`
--
ALTER TABLE `criminal_info`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `station_id` (`station_id`);

--
-- Indexes for table `missingtable`
--
ALTER TABLE `missingtable`
  ADD PRIMARY KEY (`missing_id`);

--
-- Indexes for table `police_info`
--
ALTER TABLE `police_info`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `police_profile`
--
ALTER TABLE `police_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `police_station`
--
ALTER TABLE `police_station`
  ADD PRIMARY KEY (`station_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `crimetable`
--
ALTER TABLE `crimetable`
  MODIFY `crime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `criminaltable`
--
ALTER TABLE `criminaltable`
  MODIFY `c_t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `criminal_info`
--
ALTER TABLE `criminal_info`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `missingtable`
--
ALTER TABLE `missingtable`
  MODIFY `missing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `police_info`
--
ALTER TABLE `police_info`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `police_profile`
--
ALTER TABLE `police_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `police_station`
--
ALTER TABLE `police_station`
  MODIFY `station_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `police_profile`
--
ALTER TABLE `police_profile`
  ADD CONSTRAINT `police_profile_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `police_info` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
