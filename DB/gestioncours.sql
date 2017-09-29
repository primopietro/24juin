-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2017 at 01:05 AM
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

DROP TABLE IF EXISTS `building`;
CREATE TABLE `building` (
  `id_building` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `nb_clasrooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `building_classroom`
--

DROP TABLE IF EXISTS `building_classroom`;
CREATE TABLE `building_classroom` (
  `id_building_classroom` int(11) NOT NULL,
  `id_building` int(11) NOT NULL,
  `id_classroom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clasroom_qualification`
--

DROP TABLE IF EXISTS `clasroom_qualification`;
CREATE TABLE `clasroom_qualification` (
  `id_classroom_qualification` int(11) NOT NULL,
  `id_classroom` int(11) NOT NULL,
  `id_qualification` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

DROP TABLE IF EXISTS `classroom`;
CREATE TABLE `classroom` (
  `id_classroom` int(11) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_building`
--

DROP TABLE IF EXISTS `customer_building`;
CREATE TABLE `customer_building` (
  `id_customer_building` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_building` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer_user`
--

DROP TABLE IF EXISTS `customer_user`;
CREATE TABLE `customer_user` (
  `id_customer_user` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE `groupe` (
  `id_groupe` int(11) NOT NULL,
  `annee` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groupe_qualification`
--

DROP TABLE IF EXISTS `groupe_qualification`;
CREATE TABLE `groupe_qualification` (
  `id_groupe_qualification` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL,
  `id_qualification` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `object`
--

DROP TABLE IF EXISTS `object`;
CREATE TABLE `object` (
  `id_object` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `object`
--

INSERT INTO `object` (`id_object`, `name`) VALUES
(1, 'building'),
(2, 'classroom'),
(3, 'customer'),
(5, 'groupe'),
(6, 'program'),
(7, 'qualification'),
(8, 'teacher'),
(9, 'user'),
(10, 'right'),
(11, 'role');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

DROP TABLE IF EXISTS `program`;
CREATE TABLE `program` (
  `id_program` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` double NOT NULL,
  `nb_of_qualifications` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `program_qualification`
--

DROP TABLE IF EXISTS `program_qualification`;
CREATE TABLE `program_qualification` (
  `id_program_qualification` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `id_qualification` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

DROP TABLE IF EXISTS `qualification`;
CREATE TABLE `qualification` (
  `id_qualification` int(11) NOT NULL,
  `code` varchar(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nb_hours` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qualificationteached_timeslot`
--

DROP TABLE IF EXISTS `qualificationteached_timeslot`;
CREATE TABLE `qualificationteached_timeslot` (
  `id_qualificationteached_timeslot` int(11) NOT NULL,
  `id_timeslot` int(11) NOT NULL,
  `id_qualificationteached` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qualification_teached`
--

DROP TABLE IF EXISTS `qualification_teached`;
CREATE TABLE `qualification_teached` (
  `id_qualification_teached` int(11) NOT NULL,
  `id_qualification` int(11) NOT NULL,
  `year` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `right`
--

DROP TABLE IF EXISTS `right`;
CREATE TABLE `right` (
  `id_right` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `right_object_role`
--

DROP TABLE IF EXISTS `right_object_role`;
CREATE TABLE `right_object_role` (
  `id_right_object_role` int(11) NOT NULL,
  `id_right` int(11) NOT NULL,
  `id_object` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE `schedule` (
  `id_schedule` int(11) NOT NULL,
  `code` varchar(25) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedule_timeslot`
--

DROP TABLE IF EXISTS `schedule_timeslot`;
CREATE TABLE `schedule_timeslot` (
  `id_schedule_timeslot` int(11) NOT NULL,
  `id_schedule` int(11) NOT NULL,
  `id_timeslot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `id_teacher` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `family_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_qualification`
--

DROP TABLE IF EXISTS `teacher_qualification`;
CREATE TABLE `teacher_qualification` (
  `id_teacher_qualification` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `id_qualification` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_qualification_teached`
--

DROP TABLE IF EXISTS `teacher_qualification_teached`;
CREATE TABLE `teacher_qualification_teached` (
  `id_teacher_qualification_teached` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `id_qualification_teached` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

DROP TABLE IF EXISTS `timeslot`;
CREATE TABLE `timeslot` (
  `id_timeslot` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `AM` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timeslot_week`
--

DROP TABLE IF EXISTS `timeslot_week`;
CREATE TABLE `timeslot_week` (
  `id_timeslot_week` int(11) NOT NULL,
  `id_timeslot` int(11) NOT NULL,
  `idt_week` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id_user_role` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `week`
--

DROP TABLE IF EXISTS `week`;
CREATE TABLE `week` (
  `id_week` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_start` date NOT NULL,
  `date_finish` date NOT NULL
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
-- Indexes for table `clasroom_qualification`
--
ALTER TABLE `clasroom_qualification`
  ADD PRIMARY KEY (`id_classroom_qualification`),
  ADD KEY `cq_id_clasroom` (`id_classroom`),
  ADD KEY `cq_id_qualification` (`id_qualification`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`id_classroom`);

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
-- Indexes for table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id_groupe`);

--
-- Indexes for table `groupe_qualification`
--
ALTER TABLE `groupe_qualification`
  ADD PRIMARY KEY (`id_groupe_qualification`),
  ADD KEY `gq_groupe` (`id_groupe`),
  ADD KEY `gq_qualification` (`id_qualification`);

--
-- Indexes for table `object`
--
ALTER TABLE `object`
  ADD PRIMARY KEY (`id_object`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `id_building` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `building_classroom`
--
ALTER TABLE `building_classroom`
  MODIFY `id_building_classroom` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clasroom_qualification`
--
ALTER TABLE `clasroom_qualification`
  MODIFY `id_classroom_qualification` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id_classroom` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id_groupe` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `object`
--
ALTER TABLE `object`
  MODIFY `id_object` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `program_qualification`
--
ALTER TABLE `program_qualification`
  MODIFY `id_program_qualification` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id_right` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `right_object_role`
--
ALTER TABLE `right_object_role`
  MODIFY `id_right_object_role` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id_teacher` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_user_role` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `week`
--
ALTER TABLE `week`
  MODIFY `id_week` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `building`
--
ALTER TABLE `building`
  ADD CONSTRAINT `building_ibfk_1` FOREIGN KEY (`id_building`) REFERENCES `customer_building` (`id_building`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `building_classroom`
--
ALTER TABLE `building_classroom`
  ADD CONSTRAINT `building_classroom_ibfk_1` FOREIGN KEY (`id_building`) REFERENCES `building` (`id_building`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `building_classroom_ibfk_2` FOREIGN KEY (`id_classroom`) REFERENCES `classroom` (`id_classroom`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clasroom_qualification`
--
ALTER TABLE `clasroom_qualification`
  ADD CONSTRAINT `clasroom_qualification_ibfk_1` FOREIGN KEY (`id_qualification`) REFERENCES `qualification_teached` (`id_qualification_teached`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clasroom_qualification_ibfk_2` FOREIGN KEY (`id_classroom`) REFERENCES `classroom` (`id_classroom`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_building`
--
ALTER TABLE `customer_building`
  ADD CONSTRAINT `customer_building_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_user`
--
ALTER TABLE `customer_user`
  ADD CONSTRAINT `customer_user_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_user_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `groupe_ibfk_1` FOREIGN KEY (`id_groupe`) REFERENCES `groupe_qualification` (`id_groupe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groupe_qualification`
--
ALTER TABLE `groupe_qualification`
  ADD CONSTRAINT `groupe_qualification_ibfk_1` FOREIGN KEY (`id_qualification`) REFERENCES `qualification_teached` (`id_qualification_teached`) ON DELETE CASCADE ON UPDATE CASCADE;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
