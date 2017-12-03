-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2017 at 11:01 PM
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
(1, 'Bâtisse 258 - Pavillon central', '', 93),
(2, 'Bâtisse 201 - PTI', '', 17),
(3, 'Bâtisse 025 - PVS', '', 55),
(4, 'Bâtisse 173 - Bowen', '', 10);

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
(4, 1, 1),
(5, 1, 2),
(6, 1, 31),
(7, 1, 32),
(8, 1, 33),
(9, 1, 34),
(10, 1, 35),
(11, 1, 36),
(12, 1, 37),
(13, 1, 38),
(14, 1, 39),
(15, 1, 40),
(16, 1, 41),
(17, 1, 42),
(18, 1, 43),
(19, 1, 44),
(20, 1, 45),
(21, 1, 46),
(22, 1, 47),
(23, 1, 48),
(24, 1, 49),
(25, 1, 50),
(26, 1, 51),
(27, 1, 52),
(28, 1, 53),
(29, 1, 54),
(30, 1, 55),
(31, 1, 56),
(32, 1, 57),
(33, 1, 58),
(34, 1, 59),
(35, 1, 60),
(36, 1, 61),
(37, 1, 62),
(38, 1, 63),
(39, 1, 64),
(40, 1, 65),
(41, 1, 66),
(42, 1, 67),
(43, 1, 68),
(44, 1, 69),
(45, 1, 70),
(46, 1, 71),
(47, 1, 72),
(48, 1, 73),
(49, 1, 74),
(50, 1, 75),
(51, 1, 76),
(52, 1, 77),
(53, 1, 78),
(54, 1, 79),
(55, 1, 80),
(56, 1, 81),
(57, 1, 82),
(58, 1, 83),
(59, 1, 84),
(60, 1, 85),
(61, 1, 86),
(62, 1, 87),
(63, 1, 88),
(64, 1, 89),
(65, 1, 90),
(66, 1, 91),
(67, 1, 92),
(68, 1, 93),
(69, 1, 94),
(70, 1, 95),
(71, 1, 96),
(72, 1, 97),
(73, 1, 98),
(74, 1, 99),
(75, 1, 100),
(76, 1, 101),
(77, 1, 102),
(78, 1, 103),
(79, 1, 104),
(80, 1, 105),
(81, 1, 106),
(82, 1, 107),
(83, 1, 108),
(84, 1, 109),
(85, 1, 110),
(86, 1, 111),
(87, 1, 112),
(88, 1, 113),
(89, 1, 114),
(90, 2, 115),
(91, 2, 116),
(92, 2, 117),
(93, 2, 118),
(94, 2, 119),
(95, 2, 120),
(96, 2, 121),
(97, 2, 122),
(98, 2, 123),
(99, 2, 124),
(100, 2, 125),
(101, 4, 126),
(102, 4, 127),
(103, 4, 128),
(104, 4, 129),
(105, 4, 130),
(106, 4, 131),
(107, 4, 132),
(108, 4, 133),
(109, 4, 134),
(110, 4, 135),
(111, 3, 174),
(112, 3, 175),
(113, 3, 176),
(114, 3, 177),
(115, 3, 178),
(116, 3, 179),
(117, 3, 180),
(118, 3, 181),
(119, 3, 182),
(120, 3, 183),
(121, 3, 184),
(122, 3, 185),
(123, 3, 186),
(124, 3, 187),
(125, 3, 188),
(126, 3, 189),
(127, 3, 190),
(128, 3, 191),
(129, 3, 192),
(130, 3, 193),
(131, 3, 194),
(132, 3, 195),
(133, 3, 196),
(134, 3, 197),
(135, 3, 198),
(136, 3, 199),
(137, 3, 200),
(138, 3, 201),
(139, 3, 202),
(140, 3, 203),
(141, 3, 204),
(142, 3, 205),
(143, 3, 206),
(144, 3, 207),
(145, 3, 208),
(146, 3, 209),
(147, 3, 210),
(148, 3, 211),
(149, 3, 212),
(150, 3, 213),
(151, 3, 214),
(152, 3, 215),
(153, 3, 216),
(154, 3, 217),
(155, 3, 218),
(156, 3, 219),
(157, 3, 220),
(158, 3, 221),
(159, 3, 222),
(160, 3, 223),
(161, 3, 224),
(162, 3, 225),
(163, 3, 226),
(164, 3, 227);

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
(1, 'E2-018-1', 0),
(2, 'E2-021', 0),
(31, 'E2-025', 0),
(32, 'E2-026', 0),
(33, 'E2-027', 0),
(34, 'E2-030', 0),
(35, 'E2-031', 0),
(36, 'E2-036', 0),
(37, 'E2-042', 0),
(38, 'E2-046', 0),
(39, 'E2-048', 0),
(40, 'E2-049', 0),
(41, 'F2-025', 0),
(42, 'F2-024', 0),
(43, 'F2-021', 0),
(44, 'F2-020', 0),
(45, 'F2-019', 0),
(46, 'F2-018', 0),
(47, 'F2-017', 0),
(48, 'F2-016', 0),
(49, 'F2-015', 0),
(50, 'F2-012', 0),
(51, 'F2-013', 0),
(52, 'F2-008', 0),
(53, 'F1-012', 0),
(54, 'F1-011', 0),
(55, 'F1-010', 0),
(56, 'F1-008', 0),
(57, 'F1-007', 0),
(58, '001', 0),
(59, '120', 0),
(60, 'B2-005', 0),
(61, 'B2-008', 0),
(62, 'B2-009', 0),
(63, 'B2-010', 0),
(64, 'B2-012', 0),
(65, 'B2-014', 0),
(66, 'B2-016', 0),
(67, 'B2-017', 0),
(68, 'B2-019', 0),
(69, 'B2-020', 0),
(70, 'B2-022', 0),
(71, 'B2-024', 2),
(72, 'B2-025', 0),
(73, 'B2-026', 0),
(74, 'B2-027', 0),
(75, 'B2-028', 0),
(76, 'B2-24A', 0),
(77, 'E1-020', 0),
(78, 'E1-027', 0),
(79, 'E1-029', 0),
(80, 'E1-036', 0),
(81, 'E1-037', 0),
(82, 'ARGYL1', 0),
(83, 'ARGYL2', 0),
(84, 'ARGYL3', 0),
(85, 'ARGYL4', 0),
(86, 'ARGYLU', 0),
(87, 'CHFL4B', 0),
(88, 'CHFL5', 3),
(89, 'CHFL6', 3),
(90, 'CHFL7C', 0),
(91, 'CHFL8C', 0),
(92, 'CHFL9C', 0),
(93, 'CHHD4A', 0),
(94, 'CHHD4C', 0),
(95, 'B1-002', 0),
(96, 'B1-004', 0),
(97, 'B1-005', 0),
(98, 'B1-006', 0),
(99, 'B1-013', 0),
(100, 'B1-016', 0),
(101, 'B1-017', 0),
(102, 'B1-108', 0),
(103, 'B2-005', 0),
(104, 'B2-021', 0),
(105, 'B2-023', 0),
(106, 'B2-025', 0),
(107, 'B2-108', 0),
(108, 'E2-029', 0),
(109, 'ES-001', 0),
(110, 'F1-006', 0),
(111, 'F2-002', 0),
(112, 'F2-004', 0),
(113, 'F2-005', 0),
(114, 'F2-006', 0),
(115, '2123', 2),
(116, '2126', 5),
(117, '2131', 0),
(118, '2132', 0),
(119, '2133', 0),
(120, '2135', 0),
(121, '2137', 0),
(122, '2151', 0),
(123, '2154', 0),
(124, '2155', 0),
(125, '2160', 0),
(126, 'A-104', 0),
(127, 'A-119', 0),
(128, 'A-126', 0),
(129, 'A-129', 0),
(130, 'A-130', 0),
(131, 'B-118', 0),
(132, 'B-107', 0),
(133, 'B-112', 0),
(134, 'B-114', 0),
(135, 'B-104', 0),
(174, 'A-1-16', 0),
(175, 'A-1-21', 0),
(176, 'A-1-22', 0),
(177, 'A-1-23', 0),
(178, 'A-2-01', 0),
(179, 'A-2-02', 0),
(180, 'A-2-03', 0),
(181, 'A-2-04', 0),
(182, 'A-2-05', 0),
(183, 'A-2-10', 0),
(184, 'A-2-11', 0),
(185, 'A-2-13', 0),
(186, 'A-2-20', 0),
(187, 'A-2-21', 0),
(188, 'A-2-24', 0),
(189, 'A-2-31', 0),
(190, 'A-2-34', 0),
(191, 'A-2-38', 0),
(192, 'A-2-39', 0),
(193, 'A-2-40', 2),
(194, 'A-2-43', 0),
(195, 'A-3-01', 0),
(196, 'A-3-17', 0),
(197, 'A-3-18', 0),
(198, 'A-3-19', 0),
(199, 'A-3-21', 0),
(200, 'A-3-22', 0),
(201, 'A-3-23', 0),
(202, 'A-3-24', 0),
(203, 'A-3-25', 0),
(204, 'A-3-26', 0),
(205, 'A-3-27', 0),
(206, 'A-3-28', 0),
(207, 'A-3-29', 0),
(208, 'A-3-30', 0),
(209, 'A-4-01', 0),
(210, 'A-4-10', 0),
(211, 'A-4-11', 0),
(212, 'ATE', 0),
(213, 'ATEREC', 0),
(214, 'BLOCA', 0),
(215, 'BLOCB', 0),
(216, 'BLOCC', 0),
(217, 'D-1-00', 0),
(218, 'D-1003', 0),
(219, '01-005', 0),
(220, '01-007', 0),
(221, 'D1-008', 0),
(222, 'D2-003', 0),
(223, 'A-3-16', 0),
(224, 'D-2-05', 0),
(225, 'D-2-06', 0),
(226, 'D-2-07', 0),
(227, 'D-1-004', 0);

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
(5, 71, 4),
(6, 71, 5),
(7, 88, 9),
(8, 88, 10),
(9, 88, 11),
(10, 89, 6),
(11, 89, 7),
(12, 89, 8),
(13, 193, 21),
(14, 193, 22),
(15, 115, 12),
(16, 115, 13),
(17, 116, 14),
(18, 116, 15),
(19, 116, 16),
(20, 116, 17),
(21, 116, 18),
(22, 123, 19),
(23, 123, 20);

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
(4, '2017-11-27'),
(5, '2018-10-19'),
(6, '2018-10-27'),
(7, '2017-11-06'),
(8, '2017-12-22'),
(9, '2017-12-22'),
(10, '2017-11-07');

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
(18, 'Aut1', '2017-2018'),
(19, 'CHAR3', '2018-2019'),
(20, 'INF121', '2017-2018'),
(21, 'Coif1', '2017-2018'),
(22, 'EST5', '2017-2018'),
(23, 'Dent1', '2017-2018'),
(24, 'PAT1', '2017-2018'),
(25, 'ELECT1', '2017-2018');

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
(8, 18, 24),
(9, 18, 25),
(10, 20, 28),
(11, 20, 29),
(12, 21, 38),
(13, 21, 39),
(14, 22, 40),
(15, 22, 41),
(16, 23, 42),
(17, 23, 43),
(18, 24, 22),
(19, 24, 23),
(20, 25, 34),
(21, 25, 36),
(22, 19, 12),
(23, 19, 13);

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
(35, 2, '2017-06-13'),
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
(5, '2017-10-31'),
(6, '2017-10-26'),
(7, '2017-11-24'),
(8, '2017-11-10'),
(9, '2017-12-22');

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
(1, 'Comptabilité', 10, 10),
(2, 'Cuisine', 2, 2),
(3, 'Chrapenterie', 1, 1),
(4, 'Pàtisserie', 413, 13),
(5, 'Mécanique automobile', 100, 10),
(6, 'Carosserie', 100, 10),
(7, 'Infographie', 100, 10),
(8, 'Secrétariat', 100, 10),
(9, 'Réfrigération', 120, 12),
(10, 'Électricité', 150, 15),
(11, 'Ébénisterie', 100, 10),
(12, 'Coiffure', 100, 10),
(13, 'Esthétique', 100, 10),
(14, 'Assistance dentaire', 150, 12),
(15, 'Dessin de bâtiment', 140, 14),
(16, 'Réparation d’appareils électroniques audiovidéos', 100, 10),
(17, 'Soin infirmer', 15, 10);

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

--
-- Dumping data for table `program_qualification`
--

INSERT INTO `program_qualification` (`id_program_qualification`, `id_program`, `id_qualification`) VALUES
(5, 1, 20),
(6, 1, 21),
(7, 2, 16),
(8, 2, 17),
(9, 3, 12),
(10, 3, 13),
(11, 4, 22),
(12, 4, 23),
(13, 5, 24),
(14, 5, 25),
(15, 6, 26),
(16, 6, 27),
(17, 7, 28),
(18, 7, 29),
(19, 8, 30),
(20, 8, 31),
(21, 9, 32),
(22, 9, 33),
(23, 10, 34),
(24, 10, 36),
(26, 11, 35),
(27, 11, 37),
(28, 12, 38),
(29, 12, 39),
(30, 13, 40),
(31, 13, 41),
(32, 14, 42),
(33, 14, 43),
(34, 15, 44),
(35, 15, 45),
(36, 16, 46),
(37, 16, 47),
(38, 17, 48),
(39, 17, 49);

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
(10, '234', 'Charpenterie', 300),
(11, '345', 'Charpenterie', 666),
(12, '1515', 'Cuisine', 10),
(13, '1', 'Cuisine', 4),
(14, '2', 'Cusine', 15),
(15, '1', 'Comptabilité', 10),
(16, '2', 'Comptabilité', 10),
(17, '1', 'Pàtisserie', 10),
(18, '2', 'Pàtisserie', 10),
(19, '1', 'Mécanique automobile', 10),
(20, '2', 'Mécanique automobile', 10),
(21, '1', 'Carosserie', 10),
(22, '2', 'Carosserie', 10),
(23, '1', 'Infographie', 10),
(24, '2', 'Infographie', 10),
(25, '1', 'Secrétariat', 10),
(26, '2', 'Secrétariat', 10),
(27, '1', 'Réfrigération', 10),
(28, '2', 'Réfrigération', 10),
(29, '1', 'Électricité', 10),
(30, '2', 'Électricité', 10),
(31, '1', 'Ébénisterie', 10),
(32, '2', 'Ébénisterie', 10),
(33, '1', 'Coiffure', 10),
(34, '2', 'Coiffure', 10),
(35, '1', 'Esthétique', 10),
(36, '2', 'Esthétique', 10),
(37, '1', 'Assistance dentaire', 10),
(38, '2', 'Assistance dentaire', 10),
(39, '1', 'Dessin de bâtiment', 10),
(40, '2', 'Dessin de bâtiment', 10),
(41, '1', 'Réparation d’appareils électroniques audiovidéos', 10),
(42, '2', 'Réparation d’appareils électroniques audiovidéos', 10),
(43, '1', 'Soin infirmer', 10),
(44, '2', 'Soin infirmer', 10);

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
(13, 11, '2017-2018'),
(14, 11, '2018-2019'),
(15, 10, '2018-2019'),
(16, 9, '2017-2018'),
(17, 12, '2017-2018'),
(18, 14, '2017-2018'),
(19, 13, '2017-2018'),
(20, 15, '2017-2018'),
(21, 16, '2017-2018'),
(22, 17, '2017-2018'),
(23, 18, '2017-2018'),
(24, 19, '2017-2018'),
(25, 20, '2017-2018'),
(26, 21, '2017-2018'),
(27, 22, '2017-2018'),
(28, 23, '2017-2018'),
(29, 24, '2017-2018'),
(30, 25, '2017-2018'),
(31, 26, '2017-2018'),
(32, 27, '2017-2018'),
(33, 28, '2017-2018'),
(34, 29, '2017-2018'),
(35, 31, '2017-2018'),
(36, 30, '2017-2018'),
(37, 32, '2017-2018'),
(38, 33, '2017-2018'),
(39, 34, '2017-2018'),
(40, 35, '2017-2018'),
(41, 36, '2017-2018'),
(42, 37, '2017-2018'),
(43, 38, '2017-2018'),
(44, 39, '2017-2018'),
(45, 40, '2017-2018'),
(46, 41, '2017-2018'),
(47, 42, '2017-2018'),
(48, 43, '2017-2018'),
(49, 44, '2017-2018'),
(50, 23, '2018-2019'),
(51, 22, '2018-2019'),
(52, 18, '2018-2019'),
(53, 16, '2018-2019'),
(54, 28, '2018-2019'),
(55, 35, '2018-2019'),
(56, 38, '2018-2019'),
(57, 37, '2018-2019'),
(58, 40, '2018-2019'),
(59, 41, '2018-2019'),
(60, 20, '2018-2019');

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
(1, 'AUC1', 'Chantal', 'Audy'),
(2, 'AUR2', 'Robert', 'Auger'),
(3, 'BAG1\r\n', 'Geneviève', 'Barry'),
(5, 'BEB1\r\n', 'Brigitte', 'Bédard'),
(6, 'BEC3\r\n', 'Claude', 'Beaudoin'),
(7, 'BEG3', 'Germain', 'Bélanger'),
(8, 'BEI1\r\n', 'Isabelle', 'Bernier'),
(9, 'Bel3', 'Lucie', 'Beauregard'),
(10, 'BEM1', 'Mario', 'BeauBien'),
(11, 'BEM2', 'Michel', 'Bélanger'),
(12, 'Bep1', 'Pascal', 'Beaudoin'),
(13, 'Ber1', 'Richard', 'Bersgeron'),
(14, 'BES1\r\n', 'Sylvie', 'Bergeron'),
(15, 'Bes4', 'Sylvain', 'Bérard'),
(16, 'BES5\r\n', 'Steve', 'Beachemin'),
(17, 'BES7\r\n', 'Simon', 'Beaupré'),
(18, 'BIA1\r\n', 'Anick', 'Bisson'),
(19, 'BIC1\r\n', 'Carol', 'Bibeau'),
(20, 'BIJ1', 'Johanna\r\n', 'Bisson'),
(21, 'BIJ2\r\n', 'Jean-Michel\r\n', 'Bisaillon'),
(22, 'BIS1\r\n', 'Sylvie\r\n', 'Binette'),
(23, 'BLC1\r\n', 'Catherine\r\n', 'Blanchette'),
(24, 'BLD1\r\n', 'Danny\r\n', 'Blais'),
(25, 'BLM2\r\n', 'Marie-Josée\r\n', 'Blais'),
(26, 'BOI1\r\n', 'Isabelle\r\n', 'Boisvert'),
(27, 'BOJ7\r\n', 'Judith\r\n', 'Bonneville'),
(28, 'BOJ9\r\n', 'Jocelyn\r\n', 'Boulet'),
(29, 'BON1\r\n', 'Nathalie\r\n', 'Bourassa'),
(30, 'BOP3\r\n', 'Pascal\r\n', 'Boulet'),
(31, 'BRC1\r\n', 'Caroline\r\n', 'Breton'),
(32, 'BRH1\r\n', 'Henri\r\n', 'Breton'),
(33, 'BRM1\r\n', 'Martin\r\n', 'Brochu'),
(34, 'BRM2\r\n', 'Marc\r\n', 'Brodeur'),
(35, 'BRY1\r\n', 'Yves\r\n\r\n', 'Breton');

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
(22, 2, 15),
(23, 2, 16),
(26, 5, 21),
(27, 5, 22),
(28, 1, 9),
(29, 1, 12),
(30, 1, 17),
(31, 1, 18),
(32, 3, 23),
(33, 3, 24),
(34, 3, 25),
(35, 3, 26);

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
(3, 'gestion', 'password', 0),
(5, 'client', 'password', 1);

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
(3, 3, 3),
(5, 5, 2);

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
(3, '2017-2018', '29 oct', '2017-10-29', '2017-11-04'),
(4, '2017-2018', '5nov', '2017-11-05', '2017-11-11'),
(5, '2017-2018', '12nov', '2017-11-12', '2017-11-18'),
(6, '2017-2018', '19 nov', '2017-11-19', '2017-11-25'),
(7, '2017-2018', '26 nov', '2017-11-26', '2017-12-02'),
(8, '2017-2018', '3dec', '2017-12-03', '2017-12-09'),
(9, '2017-2018', '10dec', '2017-12-10', '2017-12-16'),
(10, '2017-2018', '17 dec', '2017-12-17', '2017-12-23');

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
(5, 1, 7),
(6, 1, 8),
(7, 1, 9),
(8, 1, 10);

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
(4, 'B2-024-1', 'pour le local B2-024'),
(5, 'B2-024-2', 'pour le local B2-024\r\n'),
(6, 'CHFL6A', 'pour le local CHFL6'),
(7, 'CHFL6B', 'pour le local CHFL6'),
(8, 'CHFL6C', 'pour le local CHFL6'),
(9, 'CHFL5A', 'pour le local CHFL5'),
(10, 'CHFL5B', 'pour le local CHFL5'),
(11, 'CHFL5C', 'pour le local CHFL5'),
(12, '2123-1', 'pour le local 2123'),
(13, '2123-2', 'pour le local 2123'),
(14, '2126-1', 'pour le local 2126'),
(15, '2126-2', 'pour le local 2126'),
(16, '2126-4', 'pour le local 2126'),
(17, '2126-6', 'pour le local 2126'),
(18, '2126-7', 'pour le local 2126'),
(19, '2154-1', 'pour le local 2154'),
(20, '2154-2', 'pour le local 2154'),
(21, 'A-2-40-A', 'pour le local A-240'),
(22, 'A-2-40-B', 'pour le local A-240');

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
  MODIFY `id_building` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `building_classroom`
--
ALTER TABLE `building_classroom`
  MODIFY `id_building_classroom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;
--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `id_classroom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;
--
-- AUTO_INCREMENT for table `classroom_qualification`
--
ALTER TABLE `classroom_qualification`
  MODIFY `id_classroom_qualification` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classroom_zone`
--
ALTER TABLE `classroom_zone`
  MODIFY `id_classroom_zone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
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
  MODIFY `id_fixed_holiday` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `group_qualification_teached`
--
ALTER TABLE `group_qualification_teached`
  MODIFY `id_group_qualification_teached` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
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
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `program_pedago_day`
--
ALTER TABLE `program_pedago_day`
  MODIFY `id_program_pedago_day` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `program_qualification`
--
ALTER TABLE `program_qualification`
  MODIFY `id_program_qualification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `id_qualification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `qualificationteached_timeslot`
--
ALTER TABLE `qualificationteached_timeslot`
  MODIFY `id_qualificationteached_timeslot` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `qualification_teached`
--
ALTER TABLE `qualification_teached`
  MODIFY `id_qualification_teached` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
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
  MODIFY `id_schedule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `schedule_timeslot`
--
ALTER TABLE `schedule_timeslot`
  MODIFY `id_schedule_timeslot` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
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
  MODIFY `id_teacher_qualification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_user_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `week`
--
ALTER TABLE `week`
  MODIFY `id_week` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `id_year` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `year_fixed_holiday`
--
ALTER TABLE `year_fixed_holiday`
  MODIFY `id_year_fixed_day` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `id_zone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
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
