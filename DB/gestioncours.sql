-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 06 oct. 2017 à 14:09
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestioncours`
--
CREATE DATABASE IF NOT EXISTS `gestioncours` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gestioncours`;

-- --------------------------------------------------------

--
-- Structure de la table `building`
--

DROP TABLE IF EXISTS `building`;
CREATE TABLE IF NOT EXISTS `building` (
  `id_building` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `nb_clasrooms` int(11) NOT NULL,
  PRIMARY KEY (`id_building`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `building_classroom`
--

DROP TABLE IF EXISTS `building_classroom`;
CREATE TABLE IF NOT EXISTS `building_classroom` (
  `id_building_classroom` int(11) NOT NULL AUTO_INCREMENT,
  `id_building` int(11) NOT NULL,
  `id_classroom` int(11) NOT NULL,
  PRIMARY KEY (`id_building_classroom`),
  KEY `bc_id_building` (`id_building`),
  KEY `bc_id_classroom` (`id_classroom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `clasroom_qualification`
--

DROP TABLE IF EXISTS `clasroom_qualification`;
CREATE TABLE IF NOT EXISTS `clasroom_qualification` (
  `id_classroom_qualification` int(11) NOT NULL AUTO_INCREMENT,
  `id_classroom` int(11) NOT NULL,
  `id_qualification` int(11) NOT NULL,
  PRIMARY KEY (`id_classroom_qualification`),
  KEY `cq_id_clasroom` (`id_classroom`),
  KEY `cq_id_qualification` (`id_qualification`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `classroom`
--

DROP TABLE IF EXISTS `classroom`;
CREATE TABLE IF NOT EXISTS `classroom` (
  `id_classroom` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(11) NOT NULL,
  PRIMARY KEY (`id_classroom`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `customer_building`
--

DROP TABLE IF EXISTS `customer_building`;
CREATE TABLE IF NOT EXISTS `customer_building` (
  `id_customer_building` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) NOT NULL,
  `id_building` int(11) NOT NULL,
  PRIMARY KEY (`id_customer_building`),
  KEY `cb_id_customer` (`id_customer`),
  KEY `cb_id_building` (`id_building`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `customer_user`
--

DROP TABLE IF EXISTS `customer_user`;
CREATE TABLE IF NOT EXISTS `customer_user` (
  `id_customer_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_customer_user`),
  KEY `cu_id_customer` (`id_customer`),
  KEY `cu_id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `group`
--

DROP TABLE IF EXISTS `group`;
CREATE TABLE IF NOT EXISTS `group` (
  `id_group` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(25) NOT NULL,
  `year` date NOT NULL,
  PRIMARY KEY (`id_group`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `group`
--

INSERT INTO `group` (`id_group`, `code`, `year`) VALUES
(11, 'qw', '2017-10-06'),
(12, 'ew', '2017-10-03'),
(13, 'wqd', '2017-10-06');

-- --------------------------------------------------------

--
-- Structure de la table `group_qualification`
--

DROP TABLE IF EXISTS `group_qualification`;
CREATE TABLE IF NOT EXISTS `group_qualification` (
  `id_group_qualification` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_qualification` int(11) NOT NULL,
  PRIMARY KEY (`id_group_qualification`),
  KEY `gq_group` (`id_group`),
  KEY `gq_qualification` (`id_qualification`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `object`
--

DROP TABLE IF EXISTS `object`;
CREATE TABLE IF NOT EXISTS `object` (
  `id_object` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_object`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `object`
--

INSERT INTO `object` (`id_object`, `name`) VALUES
(1, 'building'),
(2, 'classroom'),
(3, 'customer'),
(4, 'group'),
(5, 'program'),
(6, 'qualification'),
(7, 'teacher'),
(8, 'user'),
(9, 'right'),
(10, 'role');

-- --------------------------------------------------------

--
-- Structure de la table `program`
--

DROP TABLE IF EXISTS `program`;
CREATE TABLE IF NOT EXISTS `program` (
  `id_program` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `duration` double NOT NULL,
  `nb_of_qualifications` int(11) NOT NULL,
  PRIMARY KEY (`id_program`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `program_qualification`
--

DROP TABLE IF EXISTS `program_qualification`;
CREATE TABLE IF NOT EXISTS `program_qualification` (
  `id_program_qualification` int(11) NOT NULL AUTO_INCREMENT,
  `id_program` int(11) NOT NULL,
  `id_qualification` int(11) NOT NULL,
  PRIMARY KEY (`id_program_qualification`),
  KEY `pq_id_program` (`id_program`),
  KEY `pq_id_qualification` (`id_qualification`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `qualification`
--

DROP TABLE IF EXISTS `qualification`;
CREATE TABLE IF NOT EXISTS `qualification` (
  `id_qualification` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(25) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nb_hours` double NOT NULL,
  PRIMARY KEY (`id_qualification`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `qualification`
--

INSERT INTO `qualification` (`id_qualification`, `code`, `name`, `nb_hours`) VALUES
(9, 'sdf', 'sd', 4),
(10, 'wf', 'weg', 300);

-- --------------------------------------------------------

--
-- Structure de la table `qualificationteached_timeslot`
--

DROP TABLE IF EXISTS `qualificationteached_timeslot`;
CREATE TABLE IF NOT EXISTS `qualificationteached_timeslot` (
  `id_qualificationteached_timeslot` int(11) NOT NULL AUTO_INCREMENT,
  `id_timeslot` int(11) NOT NULL,
  `id_qualificationteached` int(11) NOT NULL,
  PRIMARY KEY (`id_qualificationteached_timeslot`),
  KEY `qtt_id_timeslot` (`id_timeslot`),
  KEY `qtt_id_qualificationteached` (`id_qualificationteached`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `qualification_teached`
--

DROP TABLE IF EXISTS `qualification_teached`;
CREATE TABLE IF NOT EXISTS `qualification_teached` (
  `id_qualification_teached` int(11) NOT NULL AUTO_INCREMENT,
  `id_qualification` int(11) NOT NULL,
  `year` date NOT NULL,
  PRIMARY KEY (`id_qualification_teached`),
  KEY `qt_qualification` (`id_qualification`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `right`
--

DROP TABLE IF EXISTS `right`;
CREATE TABLE IF NOT EXISTS `right` (
  `id_right` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_right`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `right`
--

INSERT INTO `right` (`id_right`, `name`) VALUES
(1, 'add'),
(2, 'update'),
(3, 'view'),
(4, 'delete');

-- --------------------------------------------------------

--
-- Structure de la table `right_object_role`
--

DROP TABLE IF EXISTS `right_object_role`;
CREATE TABLE IF NOT EXISTS `right_object_role` (
  `id_right_object_role` int(11) NOT NULL AUTO_INCREMENT,
  `id_right` int(11) NOT NULL,
  `id_object` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id_right_object_role`),
  KEY `ror_id_right` (`id_right`),
  KEY `ror_id_object` (`id_object`),
  KEY `ror_id_role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `right_object_role`
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
(41, 3, 1, 2),
(42, 3, 2, 2),
(43, 3, 3, 2),
(44, 3, 4, 2),
(45, 3, 5, 2),
(46, 3, 6, 2),
(47, 3, 7, 2),
(48, 3, 8, 2),
(49, 3, 9, 2),
(50, 3, 10, 2);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `name`) VALUES
(1, 'admin'),
(2, 'client');

-- --------------------------------------------------------

--
-- Structure de la table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `id_schedule` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(25) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`id_schedule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `schedule_timeslot`
--

DROP TABLE IF EXISTS `schedule_timeslot`;
CREATE TABLE IF NOT EXISTS `schedule_timeslot` (
  `id_schedule_timeslot` int(11) NOT NULL AUTO_INCREMENT,
  `id_schedule` int(11) NOT NULL,
  `id_timeslot` int(11) NOT NULL,
  PRIMARY KEY (`id_schedule_timeslot`),
  KEY `st_id_schedule` (`id_schedule`),
  KEY `st_id_timeslot` (`id_timeslot`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `id_teacher` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `family_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_teacher`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `teacher_qualification`
--

DROP TABLE IF EXISTS `teacher_qualification`;
CREATE TABLE IF NOT EXISTS `teacher_qualification` (
  `id_teacher_qualification` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  `id_qualification` int(11) NOT NULL,
  PRIMARY KEY (`id_teacher_qualification`),
  KEY `tq_qualification` (`id_qualification`),
  KEY `tq_teacher` (`id_teacher`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `teacher_qualification_teached`
--

DROP TABLE IF EXISTS `teacher_qualification_teached`;
CREATE TABLE IF NOT EXISTS `teacher_qualification_teached` (
  `id_teacher_qualification_teached` int(11) NOT NULL AUTO_INCREMENT,
  `id_teacher` int(11) NOT NULL,
  `id_qualification_teached` int(11) NOT NULL,
  PRIMARY KEY (`id_teacher_qualification_teached`),
  KEY `tq_id_teacher` (`id_teacher`),
  KEY `tq_id_qualification` (`id_qualification_teached`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `timeslot`
--

DROP TABLE IF EXISTS `timeslot`;
CREATE TABLE IF NOT EXISTS `timeslot` (
  `id_timeslot` int(11) NOT NULL AUTO_INCREMENT,
  `day` int(11) NOT NULL,
  `AM` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_timeslot`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `timeslot_week`
--

DROP TABLE IF EXISTS `timeslot_week`;
CREATE TABLE IF NOT EXISTS `timeslot_week` (
  `id_timeslot_week` int(11) NOT NULL AUTO_INCREMENT,
  `id_timeslot` int(11) NOT NULL,
  `idt_week` int(11) NOT NULL,
  PRIMARY KEY (`id_timeslot_week`),
  KEY `tw_id_timeslot` (`id_timeslot`),
  KEY `tw_id_week` (`idt_week`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `name`, `password`) VALUES
(1, 'admin', 'password'),
(2, 'client', 'password');

-- --------------------------------------------------------

--
-- Structure de la table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id_user_role` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id_user_role`),
  KEY `ur_id_user` (`id_user`),
  KEY `ur_id_role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_role`
--

INSERT INTO `user_role` (`id_user_role`, `id_user`, `id_role`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `week`
--

DROP TABLE IF EXISTS `week`;
CREATE TABLE IF NOT EXISTS `week` (
  `id_week` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date_start` date NOT NULL,
  `date_finish` date NOT NULL,
  PRIMARY KEY (`id_week`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `building`
--
ALTER TABLE `building`
  ADD CONSTRAINT `building_ibfk_1` FOREIGN KEY (`id_building`) REFERENCES `customer_building` (`id_building`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `building_classroom`
--
ALTER TABLE `building_classroom`
  ADD CONSTRAINT `building_classroom_ibfk_1` FOREIGN KEY (`id_building`) REFERENCES `building` (`id_building`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `building_classroom_ibfk_2` FOREIGN KEY (`id_classroom`) REFERENCES `classroom` (`id_classroom`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `clasroom_qualification`
--
ALTER TABLE `clasroom_qualification`
  ADD CONSTRAINT `clasroom_qualification_ibfk_1` FOREIGN KEY (`id_qualification`) REFERENCES `qualification_teached` (`id_qualification_teached`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clasroom_qualification_ibfk_2` FOREIGN KEY (`id_classroom`) REFERENCES `classroom` (`id_classroom`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `customer_building`
--
ALTER TABLE `customer_building`
  ADD CONSTRAINT `customer_building_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `customer_user`
--
ALTER TABLE `customer_user`
  ADD CONSTRAINT `customer_user_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_user_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `group_qualification`
--
ALTER TABLE `group_qualification`
  ADD CONSTRAINT `group_qualification_ibfk_1` FOREIGN KEY (`id_qualification`) REFERENCES `qualification_teached` (`id_qualification_teached`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_qualification_ibfk_2` FOREIGN KEY (`id_group`) REFERENCES `group` (`id_group`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `program_qualification`
--
ALTER TABLE `program_qualification`
  ADD CONSTRAINT `program_qualification_ibfk_1` FOREIGN KEY (`id_qualification`) REFERENCES `qualification_teached` (`id_qualification_teached`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_qualification_ibfk_2` FOREIGN KEY (`id_program`) REFERENCES `program` (`id_program`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `qualification_teached`
--
ALTER TABLE `qualification_teached`
  ADD CONSTRAINT `qualification_teached_ibfk_1` FOREIGN KEY (`id_qualification`) REFERENCES `qualification` (`id_qualification`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `qualification_teached_ibfk_2` FOREIGN KEY (`id_qualification_teached`) REFERENCES `qualificationteached_timeslot` (`id_qualificationteached`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `right_object_role`
--
ALTER TABLE `right_object_role`
  ADD CONSTRAINT `right_object_role_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `right_object_role_ibfk_2` FOREIGN KEY (`id_object`) REFERENCES `object` (`id_object`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `right_object_role_ibfk_3` FOREIGN KEY (`id_right`) REFERENCES `right` (`id_right`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`id_schedule`) REFERENCES `schedule_timeslot` (`id_schedule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `schedule_timeslot`
--
ALTER TABLE `schedule_timeslot`
  ADD CONSTRAINT `schedule_timeslot_ibfk_1` FOREIGN KEY (`id_timeslot`) REFERENCES `timeslot` (`id_timeslot`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `teacher_qualification`
--
ALTER TABLE `teacher_qualification`
  ADD CONSTRAINT `teacher_qualification_ibfk_1` FOREIGN KEY (`id_qualification`) REFERENCES `qualification` (`id_qualification`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_qualification_ibfk_2` FOREIGN KEY (`id_teacher`) REFERENCES `teacher` (`id_teacher`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `teacher_qualification_teached`
--
ALTER TABLE `teacher_qualification_teached`
  ADD CONSTRAINT `teacher_qualification_teached_ibfk_1` FOREIGN KEY (`id_teacher`) REFERENCES `teacher` (`id_teacher`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_qualification_teached_ibfk_2` FOREIGN KEY (`id_qualification_teached`) REFERENCES `qualification_teached` (`id_qualification_teached`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `timeslot`
--
ALTER TABLE `timeslot`
  ADD CONSTRAINT `timeslot_ibfk_1` FOREIGN KEY (`id_timeslot`) REFERENCES `qualificationteached_timeslot` (`id_timeslot`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `timeslot_week`
--
ALTER TABLE `timeslot_week`
  ADD CONSTRAINT `timeslot_week_ibfk_1` FOREIGN KEY (`idt_week`) REFERENCES `week` (`id_week`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `timeslot_week_ibfk_2` FOREIGN KEY (`id_timeslot`) REFERENCES `timeslot` (`id_timeslot`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
