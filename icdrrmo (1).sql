-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2019 at 03:26 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icdrrmo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`, `admin_type`) VALUES
(1, 'operation', 'operation123', 'operation'),
(2, 'communication', 'communication123', 'communication'),
(3, 'training', 'training123', 'training'),
(4, 'logistics', 'logistics123', 'logistics');

-- --------------------------------------------------------

--
-- Table structure for table `assign_rescuer`
--

CREATE TABLE `assign_rescuer` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` int(11) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `unit_name` varchar(100) NOT NULL,
  `profile_pic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_rescuer`
--

INSERT INTO `assign_rescuer` (`id`, `firstname`, `lastname`, `address`, `contact`, `gender`, `username`, `unit_name`, `profile_pic`) VALUES
(4, 'Levi', 'Ackerman', 'Purok 14-A 542 Pala-o', 2147483647, 'Male', 'levi', 'Alpha 1', 0),
(8, 'Karl ', 'Jimenez', 'Purok 14-A 542 Pala-o', 2147483647, 'Male', 'karl_jimenez', 'Alpha Beta', 0),
(9, 'Bruce', 'Real', 'Purok 14-A 542 Pala-o Iligan City', 2147483647, 'Male', 'loginn', 'team 1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `locatorslip_record`
--

CREATE TABLE `locatorslip_record` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `contact` int(11) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL,
  `time_return` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locatorslip_record`
--

INSERT INTO `locatorslip_record` (`id`, `firstname`, `lastname`, `username`, `contact`, `destination`, `purpose`, `date`, `time`, `time_return`, `status`) VALUES
(1, 'Giyu', 'Tomioka', 'giyu', 2147483647, '', '', '0000-00-00', '', '', ''),
(2, 'Giyu', 'Tomioka', 'giyu', 2147483647, 'Bukidnon City', 'Malibang', '2019-02-09', '5:40 AM ', '6:40AM', ''),
(3, 'Giyu', 'Tomioka', 'giyu', 2147483647, '', '', '0000-00-00', '', '', ''),
(4, 'Giyu', 'Tomioka', 'giyu', 2147483647, '', '', '0000-00-00', '', '', ''),
(5, 'Tanjirou', 'Kamado', 'kamado', 90723121, 'Buruun', 'malibang', '2019-02-02', '5:40 PM', '12:00 AM', ''),
(6, 'Tanjirou', 'Kamado', 'kamado', 90723121, 'Buruun', 'malibang', '2019-01-02', '5:40 PM', '12:00 AM', 'unread'),
(7, 'lee', 'lee', 'lee', 123, 'Buruun', 'ahhh', '2017-01-02', '5:40 PM', '12:00 AM', 'unread'),
(8, 'Leonie', 'Abilay', 'login', 123, 'Buruun', 'Atiman ko sakong anak', '2019-09-02', '5:40 PM', '12:00 AM', 'unread'),
(9, 'Bruce', 'Real', 'loginn', 2147483647, 'Buruun', 'Atiman sakong anak', '2019-02-02', '5:40 PM', '12:00 AM', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `locatorslip_request`
--

CREATE TABLE `locatorslip_request` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `contact` int(11) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL,
  `time_return` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pcr`
--

CREATE TABLE `pcr` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `date_i` date NOT NULL,
  `time_i` varchar(50) NOT NULL,
  `impression` varchar(50) NOT NULL,
  `r_p1` varchar(50) NOT NULL,
  `contact1` int(11) NOT NULL,
  `r_p2` varchar(50) NOT NULL,
  `contact2` int(11) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `nature` varchar(50) NOT NULL,
  `neuro` varchar(50) NOT NULL,
  `call_recieve` varchar(50) NOT NULL,
  `unit_enroute` varchar(100) NOT NULL,
  `arrive_scene` varchar(50) NOT NULL,
  `left_scene` varchar(50) NOT NULL,
  `arrive_destination` varchar(50) NOT NULL,
  `back_service` varchar(50) NOT NULL,
  `airway` varchar(50) NOT NULL,
  `breathing` varchar(50) NOT NULL,
  `pupils` varchar(50) NOT NULL,
  `pulse` varchar(50) NOT NULL,
  `skin` varchar(50) NOT NULL,
  `skin_texture` varchar(50) NOT NULL,
  `crt` varchar(50) NOT NULL,
  `time_vs` varchar(50) NOT NULL,
  `bp` varchar(50) NOT NULL,
  `pr` varchar(50) NOT NULL,
  `rr` varchar(50) NOT NULL,
  `temp` varchar(50) NOT NULL,
  `02stat` varchar(50) NOT NULL,
  `eye` int(11) NOT NULL,
  `verbal` int(11) NOT NULL,
  `motor` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `symtomps` varchar(50) NOT NULL,
  `allergies` varchar(50) NOT NULL,
  `meds` varchar(50) NOT NULL,
  `past_ill` varchar(50) NOT NULL,
  `oral_intake` date NOT NULL,
  `time_oral` varchar(50) NOT NULL,
  `onset` varchar(50) NOT NULL,
  `provocation` varchar(50) NOT NULL,
  `quality` varchar(50) NOT NULL,
  `radiation` varchar(50) NOT NULL,
  `severity` varchar(50) NOT NULL,
  `timing_i` varchar(50) NOT NULL,
  `events_prior` varchar(50) NOT NULL,
  `trauma` varchar(50) NOT NULL,
  `burn` varchar(50) NOT NULL,
  `treatment` varchar(50) NOT NULL,
  `narrative` varchar(100) NOT NULL,
  `transport_officer` varchar(50) NOT NULL,
  `treatment_officer` varchar(50) NOT NULL,
  `dispatched_unit` varchar(50) NOT NULL,
  `desti_deter` varchar(50) NOT NULL,
  `response_mode` varchar(50) NOT NULL,
  `transport_mode` varchar(50) NOT NULL,
  `receiving_facility` varchar(50) NOT NULL,
  `receiving_md` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pcr`
--

INSERT INTO `pcr` (`id`, `firstname`, `lastname`, `middlename`, `religion`, `nationality`, `age`, `gender`, `address`, `date_i`, `time_i`, `impression`, `r_p1`, `contact1`, `r_p2`, `contact2`, `reason`, `nature`, `neuro`, `call_recieve`, `unit_enroute`, `arrive_scene`, `left_scene`, `arrive_destination`, `back_service`, `airway`, `breathing`, `pupils`, `pulse`, `skin`, `skin_texture`, `crt`, `time_vs`, `bp`, `pr`, `rr`, `temp`, `02stat`, `eye`, `verbal`, `motor`, `total`, `symtomps`, `allergies`, `meds`, `past_ill`, `oral_intake`, `time_oral`, `onset`, `provocation`, `quality`, `radiation`, `severity`, `timing_i`, `events_prior`, `trauma`, `burn`, `treatment`, `narrative`, `transport_officer`, `treatment_officer`, `dispatched_unit`, `desti_deter`, `response_mode`, `transport_mode`, `receiving_facility`, `receiving_md`) VALUES
(76, 'joel', 'de eloy', 'q', 'Catholic', 'Filipino', 44, 'Male', 'poblacion, iligan city', '2019-09-06', '5:40 AM ', 'consicous, weak, oriented to date and time', 'Father', 63, '', 0, 'vehicular accident', 'V A', 'Alert', '5:40 AM ', '5:50 AM', '6:00 AM', '6:30 AM', '6:40 AM', '7:00 AM', 'Patent', 'Unlabored', 'Normal/Pearl', 'Normal', 'Pale', 'Moist', '2', '5:40 AM', '120/80', '90', '20', '79 Degree Celcius', '98', 4, 5, 6, 15, 'sakit ang ulo', 'red horse', 'no medication taken', 'Cancer Stage 4', '0000-00-00', 'mga 5:40 AM', '', '', '', '', '', '', 'Concert sa One Direction', '', '', '', 'seen patient, lying on bed. \r\nvital signs taken and recoded\r\nplaced patient in comfortable position\r', '', '', '', '', '', '', '', ''),
(77, 'Bruce ', 'Real', 'B.', 'Catholic', 'Filipino', 20, 'Male', 'Purok 14-A 542 Pala-o Iligan City', '0000-00-00', '', '', '', 0, '', 0, '', '', '', ' ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rescuers`
--

CREATE TABLE `rescuers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `contact` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rescuers`
--

INSERT INTO `rescuers` (`id`, `firstname`, `lastname`, `address`, `gender`, `contact`, `username`, `password`) VALUES
(44, 'Bruce', 'Real', 'Purok 14-A 542 Pala-o Iligan City', 'Male', 2147483647, 'loginn', 'c20ad4d76fe97759aa27a0c99bff6710');

-- --------------------------------------------------------

--
-- Table structure for table `rescuer_log`
--

CREATE TABLE `rescuer_log` (
  `id` int(11) NOT NULL,
  `unit_name` varchar(100) NOT NULL,
  `incident_category` varchar(100) NOT NULL,
  `name_incident` varchar(100) NOT NULL,
  `date_incident` date NOT NULL,
  `time_incident` varchar(100) NOT NULL,
  `location_incident` varchar(100) NOT NULL,
  `vehicle` varchar(100) NOT NULL,
  `no_victims` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit_attendance`
--

CREATE TABLE `unit_attendance` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `contact` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_attendance`
--

INSERT INTO `unit_attendance` (`id`, `name`, `date`, `contact`, `status`) VALUES
(136, 'Tony Ferguson', '2019-08-16', 2147483647, 'Present'),
(137, 'Bruce Shancy B. Real', '2019-08-16', 12345, 'Late'),
(138, 'Tony Ferguson', '2019-08-18', 2147483647, 'Present'),
(139, 'Bruce Shancy B. Real', '2019-08-18', 12345, 'Absent'),
(140, 'Karl Bryan Velarde', '2019-08-18', 2147483647, 'Absent'),
(141, 'Tony Ferguson', '2019-08-19', 2147483647, 'Late'),
(142, 'Bruce Shancy B. Real', '2019-08-19', 12345, 'Late'),
(143, 'Karl Bryan Velarde', '2019-08-19', 2147483647, 'Late'),
(144, 'Tony Ferguson', '2019-08-24', 2147483647, 'Present'),
(145, 'Bruce Shancy B. Real', '2019-08-24', 12345, 'Late'),
(146, 'Karl Bryan Velarde', '2019-08-24', 2147483647, 'Present'),
(147, 'sadsa', '2019-08-24', 0, 'Absent'),
(148, 'Karl  Jimenez', '2019-09-02', 2147483647, 'Present'),
(149, 'Bruce Real', '2019-09-02', 2147483647, 'Present'),
(150, 'Karl  Jimenez', '2019-09-02', 2147483647, 'Present'),
(151, 'Bruce Real', '2019-09-02', 2147483647, 'Present'),
(152, 'Karl  Jimenez', '2019-09-04', 2147483647, 'Present'),
(153, 'Bruce Real', '2019-09-04', 2147483647, 'Present'),
(154, 'Bruce  Real', '2019-09-04', 123, 'Absent'),
(155, 'Tanjirou Kamado', '2019-09-04', 90723121, 'Late'),
(156, 'Leonie Abilay', '2019-09-04', 123, 'Present'),
(157, 'Bruce Real', '2019-09-06', 2147483647, 'Present'),
(158, 'Bruce Real', '2019-09-06', 2147483647, 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `unit_name`
--

CREATE TABLE `unit_name` (
  `id` int(11) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `vehicle_name` varchar(255) NOT NULL,
  `transport_officer` varchar(255) NOT NULL,
  `treatment_officer` varchar(255) NOT NULL,
  `unit_respondent` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_name`
--

INSERT INTO `unit_name` (`id`, `unit_name`, `vehicle_name`, `transport_officer`, `treatment_officer`, `unit_respondent`) VALUES
(16, 'team 1 ', 'alpha 1', 'John WIck', 'kath cortes', '');

-- --------------------------------------------------------

--
-- Table structure for table `unit_respondent`
--

CREATE TABLE `unit_respondent` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `contact` int(11) NOT NULL,
  `unit_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `profile_pic` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_respondent`
--

INSERT INTO `unit_respondent` (`id`, `fullname`, `gender`, `contact`, `unit_name`, `address`, `profile_pic`) VALUES
(13, 'Tony Ferguson', 'Male', 2147483647, 'Alpha Beta', 'Purok 14-A 542 Pala-o', ''),
(18, 'Bruce Shancy B. Real', 'Male', 12345, 'Alpha Beta', 'Purok 14-A 542 Pala-o', ''),
(19, 'Karl Bryan Velarde', 'Male', 2147483647, 'Alpha Beta', 'Purok 14-A 542 Pala-o', ''),
(20, 'sadsa', '', 0, 'Alpha Beta', '', ''),
(21, 'sadsa', 'Male', 123, 'AKDfksds', 'Purok 14-A 542 Pala-o Iligan City', ''),
(22, '', 'Male', 2147483647, 'Alpha Beta', 'Purok 14-A 542 Pala-o', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_rescuer`
--
ALTER TABLE `assign_rescuer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locatorslip_record`
--
ALTER TABLE `locatorslip_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locatorslip_request`
--
ALTER TABLE `locatorslip_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pcr`
--
ALTER TABLE `pcr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rescuers`
--
ALTER TABLE `rescuers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rescuer_log`
--
ALTER TABLE `rescuer_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_attendance`
--
ALTER TABLE `unit_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_name`
--
ALTER TABLE `unit_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit_respondent`
--
ALTER TABLE `unit_respondent`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assign_rescuer`
--
ALTER TABLE `assign_rescuer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `locatorslip_record`
--
ALTER TABLE `locatorslip_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `locatorslip_request`
--
ALTER TABLE `locatorslip_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pcr`
--
ALTER TABLE `pcr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `rescuers`
--
ALTER TABLE `rescuers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `rescuer_log`
--
ALTER TABLE `rescuer_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit_attendance`
--
ALTER TABLE `unit_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `unit_name`
--
ALTER TABLE `unit_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `unit_respondent`
--
ALTER TABLE `unit_respondent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
