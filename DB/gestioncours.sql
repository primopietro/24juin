-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2017 at 02:02 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestioncours`
--
CREATE DATABASE IF NOT EXISTS `gestioncours` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gestioncours`;

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `id_building` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `nb_classrooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`id_building`, `name`, `address`, `nb_classrooms`) VALUES
(1, 'Pavillon 2', '1050 rue lo', 30),
(2, 'Pav2', '1122', 6),
(3, 'pav4', '15', 6),
(4, 'r', 'r', 2),
(5, '4jetiognj', 'efownm', 2);

-- --------------------------------------------------------

--
-- Table structure for table `building_classroom`
--

CREATE TABLE `building_classroom` (
  `id_building_classroom` int(11) NOT NULL,
  `id_building` int(11) NOT NULL,
  `id_classroom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `building_classroom`
--

INSERT INTO `building_classroom` (`id_building_classroom`, `id_building`, `id_classroom`) VALUES
(1, 1, 2),
(2, 1, 1),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `id_classroom` int(11) NOT NULL,
  `code` varchar(25) NOT NULL,
  `nb_zone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`id_classroom`, `code`, `nb_zone`) VALUES
(1, '10', 2),
(2, 'ewg12', 3);

-- --------------------------------------------------------

--
-- Table structure for table `classroom_qualification`
--

CREATE TABLE `classroom_qualification` (
  `id_classroom_qualification` int(11) NOT NULL,
  `id_classroom` int(11) NOT NULL,
  `id_qualification` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `classroom_zone`
--

CREATE TABLE `classroom_zone` (
  `id_classroom_zone` int(11) NOT NULL,
  `id_classroom` int(11) NOT NULL,
  `id_zone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classroom_zone`
--

INSERT INTO `classroom_zone` (`id_classroom_zone`, `id_classroom`, `id_zone`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `name`) VALUES
(1, '24juin'),
(2, 'Pozer');

-- --------------------------------------------------------

--
-- Table structure for table `customer_building`
--

CREATE TABLE `customer_building` (
  `id_customer_building` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_building` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_user`
--

CREATE TABLE `customer_user` (
  `id_customer_user` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `custormer_year`
--

CREATE TABLE `custormer_year` (
  `id_customer_year` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fixed_holiday`
--

CREATE TABLE `fixed_holiday` (
  `id_fixed_holiday` int(11) NOT NULL,
  `day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fixed_holiday`
--

INSERT INTO `fixed_holiday` (`id_fixed_holiday`, `day`) VALUES
(4, '2017-10-10'),
(5, '2018-10-19'),
(6, '2018-10-27'),
(7, '2017-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id_group` int(11) NOT NULL,
  `code` varchar(25) NOT NULL,
  `year` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id_group`, `code`, `year`) VALUES
(18, 'uh', '2017-2018'),
(19, 'lol123', '2018-2019'),
(20, 'test2', '2017-2018'),
(21, 'test3', '2017-2018'),
(22, 'test4', '2017-2018');

-- --------------------------------------------------------

--
-- Table structure for table `group_qualification_teached`
--

CREATE TABLE `group_qualification_teached` (
  `id_group_qualification_teached` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_qualification_teached` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_qualification_teached`
--

INSERT INTO `group_qualification_teached` (`id_group_qualification_teached`, `id_group`, `id_qualification_teached`) VALUES
(8, 18, 16),
(9, 19, 12),
(10, 19, 16);

-- --------------------------------------------------------

--
-- Table structure for table `group_teacher`
--

CREATE TABLE `group_teacher` (
  `id_group_teacher` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `id_holiday` int(11) NOT NULL,
  `day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nature_time`
--

CREATE TABLE `nature_time` (
  `id_nature_time` int(11) NOT NULL,
  `hours` double NOT NULL,
  `day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nature_time`
--

INSERT INTO `nature_time` (`id_nature_time`, `hours`, `day`) VALUES
(30, 35, '2017-11-09'),
(32, 4, '2017-11-16'),
(33, 25, '2017-11-16'),
(34, 2, '2017-11-22'),
(35, 2, '2017-06-12'),
(36, 6, '2017-11-17'),
(37, 5, '2017-11-17'),
(38, 1, '2017-12-22'),
(39, 5, '2017-11-01'),
(40, 5, '2017-05-09'),
(41, 5, '2017-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `object`
--

CREATE TABLE `object` (
  `id_object` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `isMenu` tinyint(1) NOT NULL DEFAULT '0',
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `object`
--

INSERT INTO `object` (`id_object`, `name`, `isMenu`, `icon`) VALUES
(1, 'building', 1, '<i class="fa fa-building"></i>'),
(2, 'classroom', 1, '<i class="fa fa-th"></i>'),
(3, 'customer', 0, '<i class="fa fa-user"></i>'),
(4, 'group', 1, '<i class="fa fa-users"></i>'),
(5, 'program', 1, '<i class="fa fa-book"></i>'),
(6, 'qualification', 1, '<i class="fa fa-graduation-cap"></i>'),
(7, 'teacher', 1, '<i class="fa fa-user"></i>'),
(8, 'user', 1, '<i class="fa fa-address-book"></i>'),
(9, 'right', 0, '<i class="fa fa-edit"></i>'),
(10, 'role', 0, '<i class="fa fa-edit"></i>'),
(12, 'teacher_qualification', 0, '<i class="fa fa-edit"></i>'),
(13, 'building_classroom', 0, '<i class="fa fa-edit"></i>'),
(14, 'program_qualification', 0, '<i class="fa fa-edit"></i>'),
(15, 'group_teacher', 0, '	\r\n<i class="fa fa-edit"></i>'),
(16, 'nature_time', 1, '<i class="fa fa-clock-o"></i>'),
(17, 'year', 1, '<i class="fa fa-calendar"></i>'),
(18, 'qualification_teached', 1, '<i class="fa fa-graduation-cap"></i>'),
(19, 'pedago_day', 0, '<i class="fa fa-edit"></i>'),
(20, 'pedago_day_all', 1, '<i class="fa fa-toggle-off"></i>'),
(21, 'week', 1, '<i class="fa fa-calendar"></i>'),
(22, 'zone', 1, '<i class="fa fa-edit"></i>'),
(23, 'classroom_zone', 0, '<i class="fa fa-edit"></i>'),
(24, 'fixed_holiday', 1, '<i class="fa fa-bell-slash"></i>'),
(25, 'group_qualification_teached', 0, '<i class="fa fa-edit"></i>'),
(26, 'teacher_qualification_teached', 0, '<i class="fa fa-edit"></i>'),
(27, 'schedule', 1, '<i class="fa fa-calendar"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `pedago_day`
--

CREATE TABLE `pedago_day` (
  `id_pedago_day` int(11) NOT NULL,
  `day` date NOT NULL,
  `year` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pedago_day`
--

INSERT INTO `pedago_day` (`id_pedago_day`, `day`, `year`) VALUES
(6, '2017-10-29', '2017-2018'),
(8, '2017-10-12', '2018-2019'),
(9, '2017-10-19', '2017-2018');

-- --------------------------------------------------------

--
-- Table structure for table `pedago_day_all`
--

CREATE TABLE `pedago_day_all` (
  `id_pedago_day_all` int(11) NOT NULL,
  `day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pedago_day_all`
--

INSERT INTO `pedago_day_all` (`id_pedago_day_all`, `day`) VALUES
(5, '2018-10-19'),
(6, '2017-10-26'),
(7, '2017-11-24'),
(8, '2018-10-25'),
(9, '2018-10-19');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id_program` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` double NOT NULL,
  `nb_of_qualifications` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id_program`, `name`, `duration`, `nb_of_qualifications`) VALUES
(1, 'ProgMec', 10, 10),
(2, 'progCui', 2, 2),
(3, 'progChar', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `program_pedago_day`
--

CREATE TABLE `program_pedago_day` (
  `id_program_pedago_day` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `id_pedago_day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_pedago_day`
--

INSERT INTO `program_pedago_day` (`id_program_pedago_day`, `id_program`, `id_pedago_day`) VALUES
(8, 2, 6),
(9, 3, 6),
(11, 2, 9),
(12, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `program_qualification`
--

CREATE TABLE `program_qualification` (
  `id_program_qualification` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `id_qualification` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `id_qualification` int(11) NOT NULL,
  `code` varchar(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nb_hours` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`id_qualification`, `code`, `name`, `nb_hours`) VALUES
(9, '123', 'Cusine', 4),
(10, '234', 'Mecanique', 300),
(11, '345', 'Charpenterie', 666);

-- --------------------------------------------------------

--
-- Table structure for table `qualificationteached_timeslot`
--

CREATE TABLE `qualificationteached_timeslot` (
  `id_qualificationteached_timeslot` int(11) NOT NULL,
  `id_timeslot` int(11) NOT NULL,
  `id_qualificationteached` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qualification_teached`
--

CREATE TABLE `qualification_teached` (
  `id_qualification_teached` int(11) NOT NULL,
  `id_qualification` int(11) NOT NULL,
  `year` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualification_teached`
--

INSERT INTO `qualification_teached` (`id_qualification_teached`, `id_qualification`, `year`) VALUES
(12, 10, '2017-2018'),
(16, 9, '2017-2018'),
(21, 11, '2018-2019'),
(22, 10, '2018-2019');

-- --------------------------------------------------------

--
-- Table structure for table `right`
--

CREATE TABLE `right` (
  `id_right` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `right`
--

INSERT INTO `right` (`id_right`, `name`) VALUES
(1, 'add'),
(2, 'update'),
(3, 'view'),
(4, 'delete');

-- --------------------------------------------------------

--
-- Table structure for table `right_object_role`
--

CREATE TABLE `right_object_role` (
  `id_right_object_role` int(11) NOT NULL,
  `id_right` int(11) NOT NULL,
  `id_object` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `right_object_role`
--

INSERT INTO `right_object_role` (`id_right_object_role`, `id_right`, `id_object`, `id_role`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 1, 1),
(5, 1, 2, 1),
(6, 2, 2, 1),
(7, 3, 2, 1),
(8, 4, 2, 1),
(9, 1, 3, 1),
(10, 2, 3, 1),
(11, 3, 3, 1),
(12, 4, 3, 1),
(13, 1, 4, 1),
(14, 2, 4, 1),
(15, 3, 4, 1),
(16, 4, 4, 1),
(17, 1, 5, 1),
(18, 2, 5, 1),
(19, 3, 5, 1),
(20, 4, 5, 1),
(21, 1, 6, 1),
(22, 2, 6, 1),
(23, 3, 6, 1),
(24, 4, 6, 1),
(25, 1, 7, 1),
(26, 2, 7, 1),
(27, 3, 7, 1),
(28, 4, 7, 1),
(29, 1, 8, 1),
(30, 2, 8, 1),
(31, 3, 8, 1),
(32, 4, 8, 1),
(33, 1, 9, 1),
(34, 2, 9, 1),
(35, 3, 9, 1),
(36, 4, 9, 1),
(37, 1, 10, 1),
(38, 2, 10, 1),
(39, 3, 10, 1),
(40, 4, 10, 1),
(41, 1, 1, 3),
(42, 2, 1, 3),
(43, 3, 1, 3),
(44, 4, 1, 3),
(45, 1, 2, 3),
(46, 2, 2, 3),
(47, 3, 2, 3),
(48, 4, 2, 3),
(49, 1, 4, 3),
(50, 2, 4, 3),
(51, 3, 4, 3),
(52, 4, 4, 3),
(53, 1, 5, 3),
(54, 2, 5, 3),
(55, 3, 5, 3),
(56, 4, 5, 3),
(57, 1, 6, 3),
(58, 2, 6, 3),
(59, 3, 6, 3),
(60, 4, 6, 3),
(61, 1, 7, 3),
(62, 2, 7, 3),
(63, 3, 7, 3),
(64, 4, 7, 3),
(75, 3, 4, 2),
(84, 3, 8, 3),
(85, 1, 8, 3),
(86, 2, 8, 3),
(87, 4, 8, 3),
(89, 2, 12, 1),
(90, 3, 12, 1),
(92, 3, 13, 1),
(93, 2, 13, 1),
(94, 2, 14, 1),
(95, 3, 14, 1),
(96, 2, 15, 1),
(97, 3, 15, 1),
(98, 1, 16, 2),
(99, 2, 16, 2),
(100, 3, 16, 2),
(101, 4, 16, 2),
(102, 1, 16, 1),
(103, 2, 16, 1),
(104, 3, 16, 1),
(105, 4, 16, 1),
(106, 3, 16, 3),
(107, 1, 17, 1),
(108, 2, 17, 1),
(109, 3, 17, 1),
(114, 1, 18, 1),
(115, 3, 18, 1),
(116, 4, 18, 1),
(118, 1, 17, 3),
(119, 2, 17, 3),
(120, 3, 17, 3),
(121, 1, 18, 3),
(122, 3, 18, 3),
(123, 4, 18, 3),
(124, 3, 17, 2),
(125, 1, 20, 1),
(126, 2, 20, 1),
(127, 3, 20, 1),
(128, 4, 20, 1),
(129, 1, 19, 1),
(130, 2, 19, 1),
(131, 3, 19, 1),
(132, 4, 19, 1),
(133, 1, 20, 3),
(134, 2, 20, 3),
(135, 3, 20, 3),
(136, 4, 20, 3),
(137, 1, 19, 3),
(138, 2, 19, 3),
(139, 3, 19, 3),
(140, 4, 19, 3),
(141, 1, 21, 1),
(142, 2, 21, 1),
(143, 3, 21, 1),
(144, 4, 21, 1),
(145, 2, 23, 1),
(146, 3, 3, 1),
(147, 1, 22, 1),
(148, 2, 22, 1),
(149, 3, 22, 1),
(150, 4, 22, 1),
(151, 1, 23, 1),
(152, 3, 23, 1),
(153, 1, 24, 1),
(154, 2, 24, 1),
(155, 3, 24, 1),
(156, 4, 24, 1),
(157, 3, 25, 1),
(158, 2, 25, 1),
(159, 4, 25, 1),
(160, 1, 25, 1),
(161, 1, 26, 1),
(162, 2, 26, 1),
(163, 3, 26, 1),
(164, 4, 26, 1),
(165, 1, 27, 1),
(166, 2, 27, 1),
(167, 3, 27, 1),
(168, 4, 27, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `name`) VALUES
(1, 'admin'),
(2, 'client'),
(3, 'gestion');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id_schedule` int(11) NOT NULL,
  `code` varchar(25) NOT NULL,
  `year` varchar(25) NOT NULL,
  `schedule` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id_schedule`, `code`, `year`, `schedule`) VALUES
(1, 'hb', '2017-2018', '{}'),
(4, 'test', '2017-2018', '[{"am": {"am1": {"time_end": "10:15", "time_start": "08:15"}, "am2": {"time_end": "11:30", "time_start": "10:30"}}, "pm": {"pm1": {"time_end": "14:30", "time_start": "12:30"}, "pm2": {"time_end": "15:45", "time_start": "14:45"}}, "id_year": "1", "id_group": "18", "id_program": "1"}]'),
(5, 'testerino', '2017-2018', '[{"am": {"am1": {"time_end": "10:15", "time_start": "08:15"}, "am2": {"time_end": "11:30", "time_start": "10:30"}}, "pm": {"pm1": {"time_end": "14:30", "time_start": "12:30"}, "pm2": {"time_end": "15:45", "time_start": "14:45"}}, "id_year": "1", "id_group": "18", "id_program": "2"}]'),
(6, 'test', '2017-2018', '[{"am": {"am1": {"time_end": "14:01", "time_start": "22:21"}, "am2": {"time_end": "14:00", "time_start": "12:31"}}, "pm": {"pm1": {"time_end": "12:03", "time_start": "14:31"}, "pm2": {"time_end": "15:06", "time_start": "17:06"}}, "id_year": "1", "id_group": "20", "id_program": "1"}]');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_timeslot`
--

CREATE TABLE `schedule_timeslot` (
  `id_schedule_timeslot` int(11) NOT NULL,
  `id_schedule` int(11) NOT NULL,
  `id_timeslot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id_teacher` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `family_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id_teacher`, `code`, `first_name`, `family_name`) VALUES
(1, 'proulxMa', 'Maxime', 'Proulx'),
(2, 'zoretibo', 'Boris', 'Zoretic');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_holiday`
--

CREATE TABLE `teacher_holiday` (
  `id_teacher_holiday` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `id_holiday` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_nature_time`
--

CREATE TABLE `teacher_nature_time` (
  `id_teacher_nature_time` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `id_nature_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_nature_time`
--

INSERT INTO `teacher_nature_time` (`id_teacher_nature_time`, `id_teacher`, `id_nature_time`) VALUES
(21, 2, 30),
(23, 2, 32),
(24, 1, 33),
(25, 1, 34),
(26, 1, 35),
(27, 1, 36),
(28, 1, 37),
(29, 1, 38),
(30, 1, 39),
(31, 2, 40),
(32, 2, 41);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_qualification`
--

CREATE TABLE `teacher_qualification` (
  `id_teacher_qualification` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `id_qualification` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_qualification`
--

INSERT INTO `teacher_qualification` (`id_teacher_qualification`, `id_teacher`, `id_qualification`) VALUES
(22, 1, 11),
(23, 2, 10),
(24, 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_qualification_teached`
--

CREATE TABLE `teacher_qualification_teached` (
  `id_teacher_qualification_teached` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `id_qualification_teached` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_qualification_teached`
--

INSERT INTO `teacher_qualification_teached` (`id_teacher_qualification_teached`, `id_teacher`, `id_qualification_teached`) VALUES
(1, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

CREATE TABLE `timeslot` (
  `id_timeslot` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `AM` tinyint(1) NOT NULL,
  `isExam` tinyint(4) NOT NULL,
  `isStageIndividual` tinyint(4) NOT NULL,
  `isStageAccompanied` tinyint(4) NOT NULL,
  `isSpecialEvent` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`id_timeslot`, `day`, `AM`, `isExam`, `isStageIndividual`, `isStageAccompanied`, `isSpecialEvent`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 2, 1, 1, 1, 1),
(3, 1, 3, 1, 1, 1, 1),
(4, 3, 1, 1, 1, 1, 1),
(5, 4, 4, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `timeslot_classroom`
--

CREATE TABLE `timeslot_classroom` (
  `id_timeslot_classroom` int(11) NOT NULL,
  `id_timeslot` int(11) NOT NULL,
  `id_classroom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslot_classroom`
--

INSERT INTO `timeslot_classroom` (`id_timeslot_classroom`, `id_timeslot`, `id_classroom`) VALUES
(1, 1, 2),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `timeslot_qualification_teached`
--

CREATE TABLE `timeslot_qualification_teached` (
  `id_timeslot_qualification_teached` int(11) NOT NULL,
  `id_timeslot` int(11) NOT NULL,
  `id_qualification_teached` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslot_qualification_teached`
--

INSERT INTO `timeslot_qualification_teached` (`id_timeslot_qualification_teached`, `id_timeslot`, `id_qualification_teached`) VALUES
(1, 1, 12),
(2, 2, 16);

-- --------------------------------------------------------

--
-- Table structure for table `timeslot_teacher`
--

CREATE TABLE `timeslot_teacher` (
  `id_timeslot_teacher` int(11) NOT NULL,
  `id_timeslot` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslot_teacher`
--

INSERT INTO `timeslot_teacher` (`id_timeslot_teacher`, `id_timeslot`, `id_teacher`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `timeslot_week`
--

CREATE TABLE `timeslot_week` (
  `id_timeslot_week` int(11) NOT NULL,
  `id_timeslot` int(11) NOT NULL,
  `id_week` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslot_week`
--

INSERT INTO `timeslot_week` (`id_timeslot_week`, `id_timeslot`, `id_week`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 4, 1),
(4, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fk_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `password`, `fk_teacher`) VALUES
(1, 'admin', 'password', 0),
(2, 'client', 'password', 1),
(3, 'gestion', 'password', 0),
(4, 'ZoretiBo', '12345', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_user_role` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_user_role`, `id_user`, `id_role`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `week`
--

CREATE TABLE `week` (
  `id_week` int(11) NOT NULL,
  `year` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_start` date NOT NULL,
  `date_finish` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `week`
--

INSERT INTO `week` (`id_week`, `year`, `name`, `date_start`, `date_finish`) VALUES
(1, '2017-2018', '10-juil', '2017-10-14', '2017-10-21'),
(2, '2018-2019', '17-juil', '2017-10-28', '2017-10-30'),
(3, '2017-2018', '17-juil', '2017-07-16', '2017-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `id_year` int(11) NOT NULL,
  `year` varchar(25) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`id_year`, `year`, `start_date`, `end_date`) VALUES
(1, '2017-2018', '2017-08-15', '2018-08-15'),
(2, '2018-2019', '2018-07-15', '2019-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `year_fixed_holiday`
--

CREATE TABLE `year_fixed_holiday` (
  `id_year_fixed_day` int(11) NOT NULL,
  `id_year` int(11) NOT NULL,
  `id_fixed_holiday` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year_fixed_holiday`
--

INSERT INTO `year_fixed_holiday` (`id_year_fixed_day`, `id_year`, `id_fixed_holiday`) VALUES
(2, 1, 4),
(3, 2, 5),
(4, 2, 6),
(5, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `year_nature_time`
--

CREATE TABLE `year_nature_time` (
  `id_year_nature_time` int(11) NOT NULL,
  `id_year` int(11) NOT NULL,
  `id_nature_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year_nature_time`
--

INSERT INTO `year_nature_time` (`id_year_nature_time`, `id_year`, `id_nature_time`) VALUES
(21, 1, 30),
(23, 2, 32),
(24, 2, 33),
(25, 1, 34),
(26, 1, 35),
(27, 1, 36),
(28, 1, 37),
(29, 1, 38),
(30, 1, 39),
(31, 1, 40),
(32, 1, 41);

-- --------------------------------------------------------

--
-- Table structure for table `year_pedago_day_all`
--

CREATE TABLE `year_pedago_day_all` (
  `id_year_pedago_day_all` int(11) NOT NULL,
  `id_year` int(11) NOT NULL,
  `id_pedago_day_all` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year_pedago_day_all`
--

INSERT INTO `year_pedago_day_all` (`id_year_pedago_day_all`, `id_year`, `id_pedago_day_all`) VALUES
(1, 1, 5),
(2, 2, 6),
(3, 2, 7),
(4, 1, 8),
(5, 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `id_zone` int(11) NOT NULL,
  `code` varchar(25) NOT NULL,
  `comment` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`id_zone`, `code`, `comment`) VALUES
(2, 'dasd', 'asdasd'),
(3, 'efw', 'wef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id_building`);

--
-- Indexes for table `building_classroom`
--
ALTER TABLE `building_classroom`
  ADD PRIMARY KEY (`id_building_classroom`),
  ADD KEY `bc_id_building` (`id_building`),
  ADD KEY `bc_id_classroom` (`id_classroom`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id_classroom`);

--
-- Indexes for table `classroom_qualification`
--
ALTER TABLE `classroom_qualification`
  ADD PRIMARY KEY (`id_classroom_qualification`),
  ADD KEY `cq_id_classroom` (`id_classroom`),
  ADD KEY `cq_id_qualification` (`id_qualification`);

--
-- Indexes for table `classroom_zone`
--
ALTER TABLE `classroom_zone`
  ADD PRIMARY KEY (`id_classroom_zone`),
  ADD KEY `cz_classroom` (`id_classroom`),
  ADD KEY `cz_zone` (`id_zone`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `customer_building`
--
ALTER TABLE `customer_building`
  ADD PRIMARY KEY (`id_customer_building`),
  ADD KEY `cb_id_customer` (`id_customer`),
  ADD KEY `cb_id_building` (`id_building`);

--
-- Indexes for table `customer_user`
--
ALTER TABLE `customer_user`
  ADD PRIMARY KEY (`id_customer_user`),
  ADD KEY `cu_id_customer` (`id_customer`),
  ADD KEY `cu_id_user` (`id_user`);

--
-- Indexes for table `custormer_year`
--
ALTER TABLE `custormer_year`
  ADD PRIMARY KEY (`id_customer_year`),
  ADD KEY `cy_customer` (`id_customer`),
  ADD KEY `cy_year` (`id_year`);

--
-- Indexes for table `fixed_holiday`
--
ALTER TABLE `fixed_holiday`
  ADD PRIMARY KEY (`id_fixed_holiday`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id_group`);

--
-- Indexes for table `group_qualification_teached`
--
ALTER TABLE `group_qualification_teached`
  ADD PRIMARY KEY (`id_group_qualification_teached`),
  ADD KEY `id_group_gqf` (`id_group`),
  ADD KEY `id_qualification_teached_gqf` (`id_qualification_teached`);

--
-- Indexes for table `group_teacher`
--
ALTER TABLE `group_teacher`
  ADD PRIMARY KEY (`id_group_teacher`),
  ADD KEY `gt_id_group` (`id_group`),
  ADD KEY `gt_id_teacher` (`id_teacher`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id_holiday`);

--
-- Indexes for table `nature_time`
--
ALTER TABLE `nature_time`
  ADD PRIMARY KEY (`id_nature_time`);

--
-- Indexes for table `object`
--
ALTER TABLE `object`
  ADD PRIMARY KEY (`id_object`);

--
-- Indexes for table `pedago_day`
--
ALTER TABLE `pedago_day`
  ADD PRIMARY KEY (`id_pedago_day`);

--
-- Indexes for table `pedago_day_all`
--
ALTER TABLE `pedago_day_all`
  ADD PRIMARY KEY (`id_pedago_day_all`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `program_pedago_day`
--
ALTER TABLE `program_pedago_day`
  ADD PRIMARY KEY (`id_program_pedago_day`),
  ADD KEY `ppd_program` (`id_program`),
  ADD KEY `ppd_pedago_day` (`id_pedago_day`);

--
-- Indexes for table `program_qualification`
--
ALTER TABLE `program_qualification`
  ADD PRIMARY KEY (`id_program_qualification`),
  ADD KEY `pq_id_program` (`id_program`),
  ADD KEY `pq_id_qualification` (`id_qualification`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`id_qualification`);

--
-- Indexes for table `qualificationteached_timeslot`
--
ALTER TABLE `qualificationteached_timeslot`
  ADD PRIMARY KEY (`id_qualificationteached_timeslot`),
  ADD KEY `qtt_id_timeslot` (`id_timeslot`),
  ADD KEY `qtt_id_qualificationteached` (`id_qualificationteached`);

--
-- Indexes for table `qualification_teached`
--
ALTER TABLE `qualification_teached`
  ADD PRIMARY KEY (`id_qualification_teached`),
  ADD KEY `qt_qualification` (`id_qualification`);

--
-- Indexes for table `right`
--
ALTER TABLE `right`
  ADD PRIMARY KEY (`id_right`);

--
-- Indexes for table `right_object_role`
--
ALTER TABLE `right_object_role`
  ADD PRIMARY KEY (`id_right_object_role`),
  ADD KEY `ror_id_right` (`id_right`),
  ADD KEY `ror_id_object` (`id_object`),
  ADD KEY `ror_id_role` (`id_role`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id_schedule`);

--
-- Indexes for table `schedule_timeslot`
--
ALTER TABLE `schedule_timeslot`
  ADD PRIMARY KEY (`id_schedule_timeslot`),
  ADD KEY `st_id_schedule` (`id_schedule`),
  ADD KEY `st_id_timeslot` (`id_timeslot`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id_teacher`);

--
-- Indexes for table `teacher_holiday`
--
ALTER TABLE `teacher_holiday`
  ADD PRIMARY KEY (`id_teacher_holiday`),
  ADD KEY `th_teacher` (`id_teacher`),
  ADD KEY `th_holiday` (`id_holiday`);

--
-- Indexes for table `teacher_nature_time`
--
ALTER TABLE `teacher_nature_time`
  ADD PRIMARY KEY (`id_teacher_nature_time`),
  ADD KEY `tnt_teacher` (`id_teacher`),
  ADD KEY `tnt_nature_time` (`id_nature_time`);

--
-- Indexes for table `teacher_qualification`
--
ALTER TABLE `teacher_qualification`
  ADD PRIMARY KEY (`id_teacher_qualification`),
  ADD KEY `tq_qualification` (`id_qualification`),
  ADD KEY `tq_teacher` (`id_teacher`);

--
-- Indexes for table `teacher_qualification_teached`
--
ALTER TABLE `teacher_qualification_teached`
  ADD PRIMARY KEY (`id_teacher_qualification_teached`),
  ADD KEY `tq_id_teacher` (`id_teacher`),
  ADD KEY `tq_id_qualification` (`id_qualification_teached`);

--
-- Indexes for table `timeslot`
--
ALTER TABLE `timeslot`
  ADD PRIMARY KEY (`id_timeslot`);

--
-- Indexes for table `timeslot_classroom`
--
ALTER TABLE `timeslot_classroom`
  ADD PRIMARY KEY (`id_timeslot_classroom`),
  ADD KEY `itcid_timeslot` (`id_timeslot`),
  ADD KEY `itcid_classroom` (`id_classroom`);

--
-- Indexes for table `timeslot_qualification_teached`
--
ALTER TABLE `timeslot_qualification_teached`
  ADD PRIMARY KEY (`id_timeslot_qualification_teached`),
  ADD KEY `itqtid_timeslot` (`id_timeslot`),
  ADD KEY `itqtid_qualification_teached` (`id_qualification_teached`);

--
-- Indexes for table `timeslot_teacher`
--
ALTER TABLE `timeslot_teacher`
  ADD PRIMARY KEY (`id_timeslot_teacher`),
  ADD KEY `iid_timeslot` (`id_timeslot`),
  ADD KEY `iid_teacher` (`id_teacher`);

--
-- Indexes for table `timeslot_week`
--
ALTER TABLE `timeslot_week`
  ADD PRIMARY KEY (`id_timeslot_week`),
  ADD KEY `tw_id_timeslot` (`id_timeslot`),
  ADD KEY `tw_id_week` (`id_week`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_user_role`),
  ADD KEY `ur_id_user` (`id_user`),
  ADD KEY `ur_id_role` (`id_role`);

--
-- Indexes for table `week`
--
ALTER TABLE `week`
  ADD PRIMARY KEY (`id_week`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`id_year`);

--
-- Indexes for table `year_fixed_holiday`
--
ALTER TABLE `year_fixed_holiday`
  ADD PRIMARY KEY (`id_year_fixed_day`),
  ADD KEY `yfd_year` (`id_year`),
  ADD KEY `yfd_fixed_day` (`id_fixed_holiday`);

--
-- Indexes for table `year_nature_time`
--
ALTER TABLE `year_nature_time`
  ADD PRIMARY KEY (`id_year_nature_time`),
  ADD KEY `ynt_year` (`id_year`),
  ADD KEY `ynt_nature_time` (`id_nature_time`);

--
-- Indexes for table `year_pedago_day_all`
--
ALTER TABLE `year_pedago_day_all`
  ADD PRIMARY KEY (`id_year_pedago_day_all`),
  ADD KEY `ypda_year` (`id_year`),
  ADD KEY `ypda_pedago_day_all` (`id_pedago_day_all`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`id_zone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `id_building` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `building_classroom`
--
ALTER TABLE `building_classroom`
  MODIFY `id_building_classroom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id_classroom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `classroom_qualification`
--
ALTER TABLE `classroom_qualification`
  MODIFY `id_classroom_qualification` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classroom_zone`
--
ALTER TABLE `classroom_zone`
  MODIFY `id_classroom_zone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer_building`
--
ALTER TABLE `customer_building`
  MODIFY `id_customer_building` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_user`
--
ALTER TABLE `customer_user`
  MODIFY `id_customer_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `custormer_year`
--
ALTER TABLE `custormer_year`
  MODIFY `id_customer_year` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fixed_holiday`
--
ALTER TABLE `fixed_holiday`
  MODIFY `id_fixed_holiday` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `group_qualification_teached`
--
ALTER TABLE `group_qualification_teached`
  MODIFY `id_group_qualification_teached` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `group_teacher`
--
ALTER TABLE `group_teacher`
  MODIFY `id_group_teacher` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id_holiday` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nature_time`
--
ALTER TABLE `nature_time`
  MODIFY `id_nature_time` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `object`
--
ALTER TABLE `object`
  MODIFY `id_object` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `pedago_day`
--
ALTER TABLE `pedago_day`
  MODIFY `id_pedago_day` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pedago_day_all`
--
ALTER TABLE `pedago_day_all`
  MODIFY `id_pedago_day_all` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `program_pedago_day`
--
ALTER TABLE `program_pedago_day`
  MODIFY `id_program_pedago_day` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `program_qualification`
--
ALTER TABLE `program_qualification`
  MODIFY `id_program_qualification` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `id_qualification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `qualificationteached_timeslot`
--
ALTER TABLE `qualificationteached_timeslot`
  MODIFY `id_qualificationteached_timeslot` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `qualification_teached`
--
ALTER TABLE `qualification_teached`
  MODIFY `id_qualification_teached` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `right`
--
ALTER TABLE `right`
  MODIFY `id_right` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `right_object_role`
--
ALTER TABLE `right_object_role`
  MODIFY `id_right_object_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id_schedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `schedule_timeslot`
--
ALTER TABLE `schedule_timeslot`
  MODIFY `id_schedule_timeslot` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teacher_holiday`
--
ALTER TABLE `teacher_holiday`
  MODIFY `id_teacher_holiday` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teacher_nature_time`
--
ALTER TABLE `teacher_nature_time`
  MODIFY `id_teacher_nature_time` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `teacher_qualification`
--
ALTER TABLE `teacher_qualification`
  MODIFY `id_teacher_qualification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `teacher_qualification_teached`
--
ALTER TABLE `teacher_qualification_teached`
  MODIFY `id_teacher_qualification_teached` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `timeslot`
--
ALTER TABLE `timeslot`
  MODIFY `id_timeslot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `timeslot_classroom`
--
ALTER TABLE `timeslot_classroom`
  MODIFY `id_timeslot_classroom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `timeslot_qualification_teached`
--
ALTER TABLE `timeslot_qualification_teached`
  MODIFY `id_timeslot_qualification_teached` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `timeslot_teacher`
--
ALTER TABLE `timeslot_teacher`
  MODIFY `id_timeslot_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `timeslot_week`
--
ALTER TABLE `timeslot_week`
  MODIFY `id_timeslot_week` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_user_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `week`
--
ALTER TABLE `week`
  MODIFY `id_week` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `id_year` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `year_fixed_holiday`
--
ALTER TABLE `year_fixed_holiday`
  MODIFY `id_year_fixed_day` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `year_nature_time`
--
ALTER TABLE `year_nature_time`
  MODIFY `id_year_nature_time` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `year_pedago_day_all`
--
ALTER TABLE `year_pedago_day_all`
  MODIFY `id_year_pedago_day_all` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `id_zone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `building_classroom`
--
ALTER TABLE `building_classroom`
  ADD CONSTRAINT `building_classroom_ibfk_1` FOREIGN KEY (`id_building`) REFERENCES `building` (`id_building`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `building_classroom_ibfk_2` FOREIGN KEY (`id_classroom`) REFERENCES `classroom` (`id_classroom`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `classroom_qualification`
--
ALTER TABLE `classroom_qualification`
  ADD CONSTRAINT `classroom_qualification_ibfk_1` FOREIGN KEY (`id_qualification`) REFERENCES `qualification_teached` (`id_qualification_teached`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classroom_qualification_ibfk_2` FOREIGN KEY (`id_classroom`) REFERENCES `classroom` (`id_classroom`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `classroom_zone`
--
ALTER TABLE `classroom_zone`
  ADD CONSTRAINT `classroom_zone_ibfk_1` FOREIGN KEY (`id_zone`) REFERENCES `zone` (`id_zone`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classroom_zone_ibfk_2` FOREIGN KEY (`id_classroom`) REFERENCES `classroom` (`id_classroom`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_building`
--
ALTER TABLE `customer_building`
  ADD CONSTRAINT `customer_building_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_building_ibfk_2` FOREIGN KEY (`id_building`) REFERENCES `building` (`id_building`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_user`
--
ALTER TABLE `customer_user`
  ADD CONSTRAINT `customer_user_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_user_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `custormer_year`
--
ALTER TABLE `custormer_year`
  ADD CONSTRAINT `custormer_year_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `custormer_year_ibfk_2` FOREIGN KEY (`id_year`) REFERENCES `year` (`id_year`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_qualification_teached`
--
ALTER TABLE `group_qualification_teached`
  ADD CONSTRAINT `id_group_gqt_fk` FOREIGN KEY (`id_group`) REFERENCES `group` (`id_group`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_qualification_gqt_fk` FOREIGN KEY (`id_qualification_teached`) REFERENCES `qualification_teached` (`id_qualification_teached`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_teacher`
--
ALTER TABLE `group_teacher`
  ADD CONSTRAINT `gt_id_group_fk` FOREIGN KEY (`id_group`) REFERENCES `group` (`id_group`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gt_id_teacher_fk` FOREIGN KEY (`id_teacher`) REFERENCES `teacher` (`id_teacher`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program_pedago_day`
--
ALTER TABLE `program_pedago_day`
  ADD CONSTRAINT `program_pedago_day_ibfk_1` FOREIGN KEY (`id_pedago_day`) REFERENCES `pedago_day` (`id_pedago_day`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_pedago_day_ibfk_2` FOREIGN KEY (`id_program`) REFERENCES `program` (`id_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program_qualification`
--
ALTER TABLE `program_qualification`
  ADD CONSTRAINT `program_qualification_ibfk_1` FOREIGN KEY (`id_qualification`) REFERENCES `qualification_teached` (`id_qualification_teached`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_qualification_ibfk_2` FOREIGN KEY (`id_program`) REFERENCES `program` (`id_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `qualification_teached`
--
ALTER TABLE `qualification_teached`
  ADD CONSTRAINT `qualification_teached_ibfk_1` FOREIGN KEY (`id_qualification`) REFERENCES `qualification` (`id_qualification`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `right_object_role`
--
ALTER TABLE `right_object_role`
  ADD CONSTRAINT `right_object_role_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `right_object_role_ibfk_2` FOREIGN KEY (`id_object`) REFERENCES `object` (`id_object`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `right_object_role_ibfk_3` FOREIGN KEY (`id_right`) REFERENCES `right` (`id_right`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule_timeslot`
--
ALTER TABLE `schedule_timeslot`
  ADD CONSTRAINT `schedule_timeslot_ibfk_1` FOREIGN KEY (`id_timeslot`) REFERENCES `timeslot` (`id_timeslot`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_timeslot_ibfk_2` FOREIGN KEY (`id_schedule`) REFERENCES `schedule` (`id_schedule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_holiday`
--
ALTER TABLE `teacher_holiday`
  ADD CONSTRAINT `teacher_holiday_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teacher` (`id_teacher`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_holiday_ibfk_2` FOREIGN KEY (`id_holiday`) REFERENCES `holiday` (`id_holiday`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_nature_time`
--
ALTER TABLE `teacher_nature_time`
  ADD CONSTRAINT `teacher_nature_time_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teacher` (`id_teacher`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_nature_time_ibfk_2` FOREIGN KEY (`id_nature_time`) REFERENCES `nature_time` (`id_nature_time`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_qualification`
--
ALTER TABLE `teacher_qualification`
  ADD CONSTRAINT `teacher_qualification_ibfk_1` FOREIGN KEY (`id_qualification`) REFERENCES `qualification` (`id_qualification`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_qualification_ibfk_2` FOREIGN KEY (`id_teacher`) REFERENCES `teacher` (`id_teacher`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_qualification_teached`
--
ALTER TABLE `teacher_qualification_teached`
  ADD CONSTRAINT `teacher_qualification_teached_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teacher` (`id_teacher`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_qualification_teached_ibfk_2` FOREIGN KEY (`id_qualification_teached`) REFERENCES `qualification_teached` (`id_qualification_teached`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timeslot_classroom`
--
ALTER TABLE `timeslot_classroom`
  ADD CONSTRAINT `ctcid_classroom` FOREIGN KEY (`id_classroom`) REFERENCES `classroom` (`id_classroom`),
  ADD CONSTRAINT `ctcid_timeslot` FOREIGN KEY (`id_timeslot`) REFERENCES `timeslot` (`id_timeslot`);

--
-- Constraints for table `timeslot_qualification_teached`
--
ALTER TABLE `timeslot_qualification_teached`
  ADD CONSTRAINT `ctqtid_qualification_teached` FOREIGN KEY (`id_qualification_teached`) REFERENCES `qualification_teached` (`id_qualification_teached`),
  ADD CONSTRAINT `ctqtid_timeslot` FOREIGN KEY (`id_timeslot`) REFERENCES `timeslot` (`id_timeslot`);

--
-- Constraints for table `timeslot_teacher`
--
ALTER TABLE `timeslot_teacher`
  ADD CONSTRAINT `fkid_teacher` FOREIGN KEY (`id_teacher`) REFERENCES `teacher` (`id_teacher`),
  ADD CONSTRAINT `fkid_timeslot` FOREIGN KEY (`id_timeslot`) REFERENCES `timeslot` (`id_timeslot`);

--
-- Constraints for table `timeslot_week`
--
ALTER TABLE `timeslot_week`
  ADD CONSTRAINT `timeslot_week_ibfk_1` FOREIGN KEY (`id_week`) REFERENCES `week` (`id_week`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `timeslot_week_ibfk_2` FOREIGN KEY (`id_timeslot`) REFERENCES `timeslot` (`id_timeslot`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `year_fixed_holiday`
--
ALTER TABLE `year_fixed_holiday`
  ADD CONSTRAINT `year_fixed_holiday_ibfk_1` FOREIGN KEY (`id_year`) REFERENCES `year` (`id_year`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `year_fixed_holiday_ibfk_2` FOREIGN KEY (`id_fixed_holiday`) REFERENCES `fixed_holiday` (`id_fixed_holiday`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `year_nature_time`
--
ALTER TABLE `year_nature_time`
  ADD CONSTRAINT `year_nature_time_ibfk_1` FOREIGN KEY (`id_year`) REFERENCES `year` (`id_year`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `year_nature_time_ibfk_2` FOREIGN KEY (`id_nature_time`) REFERENCES `nature_time` (`id_nature_time`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `year_pedago_day_all`
--
ALTER TABLE `year_pedago_day_all`
  ADD CONSTRAINT `year_pedago_day_all_ibfk_1` FOREIGN KEY (`id_year`) REFERENCES `year` (`id_year`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `year_pedago_day_all_ibfk_2` FOREIGN KEY (`id_pedago_day_all`) REFERENCES `pedago_day_all` (`id_pedago_day_all`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
