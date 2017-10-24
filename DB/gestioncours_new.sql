-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2017 at 09:11 PM
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
(3, 'pav4', '15', 6);

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

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id_group` int(11) NOT NULL,
  `code` varchar(25) NOT NULL,
  `year` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id_group`, `code`, `year`) VALUES
(12, 'G1', '2017-10-03'),
(13, 'G2', '2017-10-06'),
(14, 'G3', '2017-10-04'),
(15, 'G4', '2017-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `group_qualification`
--

CREATE TABLE `group_qualification` (
  `id_group_qualification` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_qualification` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `group_teacher`
--

CREATE TABLE `group_teacher` (
  `id_group_teacher` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_teacher`
--

INSERT INTO `group_teacher` (`id_group_teacher`, `id_group`, `id_teacher`) VALUES
(11, 12, 1);

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
(12, 35.5, '2017-10-03');

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
(16, 'nature_time', 1, '<i class="fa fa-clock-o"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `pedago_day`
--

CREATE TABLE `pedago_day` (
  `id_pedago_day` int(11) NOT NULL,
  `day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pedago_day_all`
--

CREATE TABLE `pedago_day_all` (
  `id_pedago_day_all` int(11) NOT NULL,
  `day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `year` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(101, 4, 16, 2);

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
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'zoretibo', 'Boris', 'Zoretic'),
(3, 'primoPi', 'Pietro', 'Primo');

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
(6, 1, 12);

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
(20, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_qualification_teached`
--

CREATE TABLE `teacher_qualification_teached` (
  `id_teacher_qualification_teached` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `id_qualification_teached` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `timeslot_week`
--

CREATE TABLE `timeslot_week` (
  `id_timeslot_week` int(11) NOT NULL,
  `id_timeslot` int(11) NOT NULL,
  `idt_week` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `password`) VALUES
(1, 'admin', 'password'),
(2, 'client', 'password'),
(3, 'gestion', 'password');

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
(3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `week`
--

CREATE TABLE `week` (
  `id_week` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_start` date NOT NULL,
  `date_finish` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `id_year` int(11) NOT NULL,
  `year` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `year_fixed_holiday`
--

CREATE TABLE `year_fixed_holiday` (
  `id_year_fixed_day` int(11) NOT NULL,
  `id_year` int(11) NOT NULL,
  `id_fixed_holiday` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `year_pedago_day_all`
--

CREATE TABLE `year_pedago_day_all` (
  `id_year_pedago_day_all` int(11) NOT NULL,
  `id_year` int(11) NOT NULL,
  `id_pedago_day_all` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `group_qualification`
--
ALTER TABLE `group_qualification`
  ADD PRIMARY KEY (`id_group_qualification`),
  ADD KEY `gq_group` (`id_group`),
  ADD KEY `gq_qualification` (`id_qualification`);

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
-- Indexes for table `timeslot_week`
--
ALTER TABLE `timeslot_week`
  ADD PRIMARY KEY (`id_timeslot_week`),
  ADD KEY `tw_id_timeslot` (`id_timeslot`),
  ADD KEY `tw_id_week` (`idt_week`);

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
  MODIFY `id_building` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id_classroom_zone` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id_fixed_holiday` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `group_teacher`
--
ALTER TABLE `group_teacher`
  MODIFY `id_group_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id_holiday` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nature_time`
--
ALTER TABLE `nature_time`
  MODIFY `id_nature_time` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `object`
--
ALTER TABLE `object`
  MODIFY `id_object` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pedago_day`
--
ALTER TABLE `pedago_day`
  MODIFY `id_pedago_day` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pedago_day_all`
--
ALTER TABLE `pedago_day_all`
  MODIFY `id_pedago_day_all` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `program_pedago_day`
--
ALTER TABLE `program_pedago_day`
  MODIFY `id_program_pedago_day` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `program_qualification`
--
ALTER TABLE `program_qualification`
  MODIFY `id_program_qualification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `id_qualification_teached` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `right`
--
ALTER TABLE `right`
  MODIFY `id_right` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `right_object_role`
--
ALTER TABLE `right_object_role`
  MODIFY `id_right_object_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id_schedule` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schedule_timeslot`
--
ALTER TABLE `schedule_timeslot`
  MODIFY `id_schedule_timeslot` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `teacher_holiday`
--
ALTER TABLE `teacher_holiday`
  MODIFY `id_teacher_holiday` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teacher_nature_time`
--
ALTER TABLE `teacher_nature_time`
  MODIFY `id_teacher_nature_time` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `teacher_qualification`
--
ALTER TABLE `teacher_qualification`
  MODIFY `id_teacher_qualification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `teacher_qualification_teached`
--
ALTER TABLE `teacher_qualification_teached`
  MODIFY `id_teacher_qualification_teached` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `timeslot`
--
ALTER TABLE `timeslot`
  MODIFY `id_timeslot` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `timeslot_week`
--
ALTER TABLE `timeslot_week`
  MODIFY `id_timeslot_week` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_user_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `week`
--
ALTER TABLE `week`
  MODIFY `id_week` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `id_year` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `year_fixed_holiday`
--
ALTER TABLE `year_fixed_holiday`
  MODIFY `id_year_fixed_day` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `year_pedago_day_all`
--
ALTER TABLE `year_pedago_day_all`
  MODIFY `id_year_pedago_day_all` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `zone`
--
ALTER TABLE `zone`
  MODIFY `id_zone` int(11) NOT NULL AUTO_INCREMENT;
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
-- Constraints for table `group_qualification`
--
ALTER TABLE `group_qualification`
  ADD CONSTRAINT `group_qualification_ibfk_1` FOREIGN KEY (`id_qualification`) REFERENCES `qualification_teached` (`id_qualification_teached`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_qualification_ibfk_2` FOREIGN KEY (`id_group`) REFERENCES `group` (`id_group`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `qualification_teached_ibfk_1` FOREIGN KEY (`id_qualification`) REFERENCES `qualification` (`id_qualification`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `qualification_teached_ibfk_2` FOREIGN KEY (`id_qualification_teached`) REFERENCES `qualificationteached_timeslot` (`id_qualificationteached`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `right_object_role`
--
ALTER TABLE `right_object_role`
  ADD CONSTRAINT `right_object_role_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `right_object_role_ibfk_2` FOREIGN KEY (`id_object`) REFERENCES `object` (`id_object`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `right_object_role_ibfk_3` FOREIGN KEY (`id_right`) REFERENCES `right` (`id_right`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`id_schedule`) REFERENCES `schedule_timeslot` (`id_schedule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule_timeslot`
--
ALTER TABLE `schedule_timeslot`
  ADD CONSTRAINT `schedule_timeslot_ibfk_1` FOREIGN KEY (`id_timeslot`) REFERENCES `timeslot` (`id_timeslot`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `timeslot`
--
ALTER TABLE `timeslot`
  ADD CONSTRAINT `timeslot_ibfk_1` FOREIGN KEY (`id_timeslot`) REFERENCES `qualificationteached_timeslot` (`id_timeslot`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timeslot_week`
--
ALTER TABLE `timeslot_week`
  ADD CONSTRAINT `timeslot_week_ibfk_1` FOREIGN KEY (`idt_week`) REFERENCES `week` (`id_week`) ON DELETE CASCADE ON UPDATE CASCADE,
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
-- Constraints for table `year_pedago_day_all`
--
ALTER TABLE `year_pedago_day_all`
  ADD CONSTRAINT `year_pedago_day_all_ibfk_1` FOREIGN KEY (`id_year`) REFERENCES `year` (`id_year`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `year_pedago_day_all_ibfk_2` FOREIGN KEY (`id_pedago_day_all`) REFERENCES `pedago_day_all` (`id_pedago_day_all`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
