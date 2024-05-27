-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-05-2024 a las 20:58:42
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema-asistencias`
--
CREATE DATABASE IF NOT EXISTS `sistema-asistencias` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `sistema-asistencias`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(5) NOT NULL,
  `AdminUsuario` varchar(20) NOT NULL,
  `AdminClave` varchar(535) NOT NULL,
  `AdminEmail` varchar(70) NOT NULL,
  `CuentaCodigo` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `AdminUsuario`, `AdminClave`, `AdminEmail`, `CuentaCodigo`) VALUES
(44, 'Jonkellys', '$2y$10$8kVgjs6TVrSZF2tna9fqP.xp2SY/tHHI0WoM68lCPEfHcV/ATK07u', 'admin@mail.com', 'AO5819939-2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id` int(5) NOT NULL,
  `AsistenciaCodigo` varchar(70) NOT NULL,
  `PersonalCodigo` varchar(70) NOT NULL,
  `AsistenciaFecha` datetime NOT NULL,
  `AsistenciaSalida` datetime NOT NULL,
  `AsistenciaNombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id`, `AsistenciaCodigo`, `PersonalCodigo`, `AsistenciaFecha`, `AsistenciaSalida`, `AsistenciaNombre`) VALUES
(1, 'A9052026-1', 'E1047232-80', '2023-08-04 07:19:57', '2023-08-04 02:35:23', 'Marnie Dyne'),
(2, 'A5560204-2', 'E1846121-2', '2023-09-01 09:17:58', '2023-09-01 06:25:15', 'Rabbi Summerly'),
(3, 'A3434813-3', 'E7343459-49', '2023-11-05 12:26:28', '2023-11-05 04:46:28', 'Pren Albrecht'),
(4, 'A3362289-4', 'E5392079-25', '2023-09-08 06:08:58', '2023-09-08 03:49:37', 'Temp Edworthy'),
(5, 'A6272922-5', 'E5109270-34', '2022-06-07 12:34:17', '2022-06-07 05:07:37', 'Arman Heape'),
(6, 'A4777473-6', 'E2830396-26', '2023-11-15 05:15:29', '2023-11-15 04:11:38', 'Charlton Hawkridge'),
(7, 'A0338383-7', 'E1444673-75', '2024-03-14 12:00:36', '2024-03-14 05:00:00', 'Pearla Clapton'),
(8, 'A5536229-8', 'E8445656-47', '2024-01-14 06:48:39', '2024-01-14 02:22:46', 'Enrika Narey'),
(9, 'A6610288-9', 'E6414928-76', '2023-04-06 08:07:44', '2023-04-06 03:02:48', 'Ray Wolfendell'),
(10, 'A0927110-87', 'E6414928-76', '2023-03-07 09:15:12', '2023-03-07 01:17:17', 'Ray Wolfendell'),
(11, 'A4674074-11', 'E7991934-96', '2022-05-28 12:50:28', '2022-05-28 03:29:01', 'Urban Rossoni'),
(12, 'A2330221-12', 'E9523587-63', '2022-11-09 12:26:33', '2022-11-09 05:09:13', 'Pier Plaistowe'),
(13, 'A5943453-13', 'E7024865-53', '2023-04-14 08:40:16', '2023-04-14 05:50:47', 'Tiebold Littlejohn'),
(14, 'A7973117-14', 'E9456122-45', '2023-02-12 06:37:03', '2023-02-12 02:02:31', 'Batholomew Edmondson'),
(15, 'A0538944-15', 'E2477848-57', '2023-04-07 06:15:18', '2023-04-07 01:11:46', 'Muhammad Jeffcoate'),
(16, 'A0438469-16', 'E5301891-60', '2022-11-06 12:43:41', '2022-11-06 03:50:15', 'Tito Abramovitz'),
(17, 'A5433289-17', 'E5392079-25', '2022-07-22 06:04:22', '2022-07-22 05:01:03', 'Temp Edworthy'),
(18, 'A6706860-18', 'E9854155-12', '2023-03-27 06:12:23', '2023-03-27 04:37:30', 'Baryram Cluer'),
(19, 'A3207091-19', 'E8445656-47', '2023-02-19 12:02:30', '2023-02-19 03:59:39', 'Enrika Narey'),
(20, 'A9046425-20', 'E8445656-47', '2022-11-05 07:40:45', '2022-11-05 04:11:33', 'Enrika Narey'),
(21, 'A7013560-21', 'E5646847-22', '2023-12-27 06:50:35', '2023-12-27 06:18:30', 'Dorelle Snelle'),
(22, 'A9158139-22', 'E0593932-66', '2023-11-06 05:13:31', '2023-11-06 03:59:20', 'Augustin Mordin'),
(23, 'A9439193-23', 'E1755610-18', '2022-03-11 05:07:11', '2022-03-11 01:28:37', 'Holmes Piell'),
(24, 'A9634244-24', 'E0052512-97', '2022-10-28 06:25:24', '2022-10-28 02:10:09', 'Constantia Garmons'),
(25, 'A8205432-25', 'E3642917-39', '2023-02-08 07:02:37', '2023-02-08 03:39:20', 'Pamella Gunbie'),
(26, 'A8430741-26', 'E8242647-41', '2023-02-20 06:57:32', '2023-02-20 06:06:53', 'Ilario Yerill'),
(27, 'A9848868-27', 'E7024865-53', '2022-08-21 05:20:08', '2022-08-21 05:38:06', 'Tiebold Littlejohn'),
(28, 'A8145717-28', 'E6915721-28', '2023-12-19 06:34:44', '2023-12-19 05:18:35', 'Christel Rolinson'),
(29, 'A8240379-29', 'E9266271-94', '2023-11-06 06:23:39', '2023-11-06 01:11:33', 'Emelyne Pinkett'),
(30, 'A2303159-30', 'E6371512-5', '2023-02-27 12:20:36', '2023-02-27 03:26:38', 'Norean Bispham'),
(31, 'A1445131-31', 'E1444673-75', '2023-08-28 05:50:29', '2023-08-28 05:41:03', 'Pearla Clapton'),
(32, 'A9676662-32', 'E0182922-85', '2022-12-19 07:51:11', '2022-12-19 03:30:12', 'Prent Harfleet'),
(33, 'A5102138-33', 'E9224399-6', '2022-10-12 05:47:19', '2022-10-12 05:07:05', 'Jorey Weld'),
(34, 'A4132510-34', 'E5301891-60', '2023-03-07 07:26:53', '2023-03-07 06:11:53', 'Tito Abramovitz'),
(35, 'A4000195-35', 'E2124569-37', '2023-08-27 05:16:24', '2023-08-27 04:24:33', 'Tallie Stollsteiner'),
(36, 'A2041070-36', 'E3435972-11', '2022-06-28 05:22:18', '2022-06-28 04:09:29', 'Olivier Roscher'),
(37, 'A1452827-37', 'E9266271-94', '2024-04-05 06:49:53', '2024-04-05 03:15:40', 'Emelyne Pinkett'),
(38, 'A2668898-38', 'E7275544-86', '2023-10-08 05:10:34', '2023-10-08 01:58:14', 'Filide Yosifov'),
(39, 'A7421403-39', 'E6263504-30', '2023-08-26 08:13:59', '2023-08-26 05:57:08', 'Dale Skittrell'),
(40, 'A7111743-40', 'E8170312-55', '2023-01-31 06:52:30', '2023-01-31 01:56:34', 'Elvera Fendlow'),
(41, 'A3123309-41', 'E4067509-70', '2023-08-08 06:21:48', '2023-08-08 03:49:40', 'Kristofer Bartoli'),
(42, 'A1374346-42', 'E2124569-37', '2023-02-15 05:02:40', '2023-02-15 02:23:14', 'Tallie Stollsteiner'),
(43, 'A2533339-43', 'E9818958-83', '2023-04-16 07:41:25', '2023-04-16 04:15:58', 'Zane Blasli'),
(44, 'A8737967-44', 'E5646847-22', '2023-05-07 08:31:14', '2023-05-07 04:43:01', 'Dorelle Snelle'),
(45, 'A2339749-45', 'E3448086-62', '2022-06-28 01:49:23', '2022-06-28 05:35:59', 'Eberhard Philipeaux'),
(46, 'A4841384-46', 'E1843453-33', '2023-06-14 12:21:48', '2023-06-14 01:21:23', 'Pincas Bradock'),
(47, 'A9596641-47', 'E6031902-87', '2022-10-16 06:10:28', '2022-10-16 06:34:56', 'Kelsey Craydon'),
(48, 'A7080996-48', 'E5301891-60', '2022-09-07 07:46:05', '2022-09-07 05:49:38', 'Tito Abramovitz'),
(49, 'A6117548-49', 'E9541880-42', '2023-02-24 08:39:24', '2023-02-24 05:51:44', 'Rees Zellmer'),
(50, 'A5824300-50', 'E8242647-41', '2023-05-21 10:24:01', '2023-05-21 03:56:22', 'Ilario Yerill'),
(51, 'A4126989-51', 'E6933945-78', '2023-12-19 07:49:27', '2023-12-19 05:56:29', 'Elyssa Markwick'),
(52, 'A0034517-52', 'E6589332-65', '2023-07-24 08:22:32', '2023-07-24 03:43:43', 'Gustave Lawn'),
(53, 'A1032701-53', 'E0124122-73', '2023-12-27 04:17:06', '2023-12-27 02:12:51', 'Pattie Van der Beken'),
(54, 'A9263641-54', 'E1843453-33', '2024-02-24 06:00:29', '2024-02-24 01:23:41', 'Pincas Bradock'),
(55, 'A4910889-55', 'E8169488-36', '2023-06-09 10:24:20', '2023-06-09 04:45:42', 'Tiphanie Flatman'),
(56, 'A8044599-56', 'E8295162-52', '2023-10-12 06:49:01', '2023-10-12 01:19:24', 'Pooh Eydel'),
(57, 'A2751426-57', 'E5646847-22', '2022-11-06 09:15:42', '2022-11-06 04:06:43', 'Dorelle Snelle'),
(58, 'A3494767-58', 'E7329743-19', '2023-12-11 12:45:21', '2023-12-11 02:39:16', 'Jack Jacobson'),
(59, 'A9727983-59', 'E7624155-93', '2024-04-16 07:46:00', '2024-04-16 04:40:00', 'Pattin Rayhill'),
(60, 'A0310663-60', 'E1058110-31', '2024-02-09 05:16:39', '2024-02-09 06:11:28', 'Coretta Haughey'),
(61, 'A1895318-61', 'E5838512-98', '2024-01-31 05:18:16', '2024-01-31 04:45:26', 'Hans Frankel'),
(62, 'A7613716-62', 'E2618191-21', '2023-11-23 06:51:03', '2023-11-23 04:51:19', 'Natal Milch'),
(63, 'A0155924-63', 'E4067509-70', '2022-11-30 09:12:33', '2022-11-30 04:50:58', 'Kristofer Bartoli'),
(64, 'A4118383-64', 'E3642917-39', '2022-11-14 06:55:45', '2022-11-14 02:31:32', 'Pamella Gunbie'),
(65, 'A9424282-65', 'E4067509-70', '2024-03-09 08:20:48', '2024-03-09 04:24:56', 'Kristofer Bartoli'),
(66, 'A3689707-66', 'E7275544-86', '2022-09-08 06:44:18', '2022-09-08 03:04:58', 'Filide Yosifov'),
(67, 'A7355271-67', 'E9188641-43', '2023-01-14 06:49:10', '2023-01-14 01:39:11', 'Milo McKirdy'),
(68, 'A9931814-68', 'E2629355-38', '2022-10-28 09:35:48', '2022-10-28 06:47:54', 'Fran Sneden'),
(69, 'A7427195-69', 'E7531924-29', '2023-05-09 06:13:36', '2023-05-09 01:26:38', 'Carly Cowdrey'),
(70, 'A2577231-70', 'E2830396-26', '2022-08-29 05:42:56', '2022-08-29 04:28:59', 'Charlton Hawkridge'),
(71, 'A6977949-71', 'E9854155-12', '2023-02-26 06:04:13', '2023-02-26 04:17:30', 'Baryram Cluer'),
(72, 'A3627909-72', 'E0182922-85', '2024-03-08 06:00:53', '2024-03-08 03:53:08', 'Prent Harfleet'),
(73, 'A3295743-73', 'E3740848-81', '2022-08-19 08:50:46', '2022-08-19 01:44:57', 'Rosina Goadsby'),
(74, 'A0449687-74', 'E9789595-64', '2022-06-22 05:21:03', '2022-06-22 03:25:05', 'Broderick Flancinbaum'),
(75, 'A4399904-75', 'E2830396-26', '2024-01-20 06:02:05', '2024-01-20 03:51:43', 'Charlton Hawkridge'),
(76, 'A6810208-76', 'E7275544-86', '2023-10-20 08:05:24', '2023-10-20 03:18:11', 'Filide Yosifov'),
(77, 'A5384888-77', 'E8830815-68', '2023-02-22 09:18:24', '2023-02-22 02:21:58', 'Cob Gerb'),
(78, 'A6969736-78', 'E2830396-26', '2023-04-15 08:09:14', '2023-04-15 01:44:05', 'Charlton Hawkridge'),
(79, 'A9246787-79', 'E0329575-50', '2023-08-16 05:29:53', '2023-08-16 01:33:32', 'Jessee Allcott'),
(80, 'A2065934-80', 'E9523587-63', '2023-06-24 06:12:32', '2023-06-24 05:53:18', 'Pier Plaistowe'),
(81, 'A6172547-81', 'E0761608-69', '2024-05-13 09:24:47', '2024-05-13 03:14:10', 'Norrie Antoshin'),
(82, 'A3449271-82', 'E1047004-74', '2023-07-07 08:31:34', '2023-07-07 01:41:21', 'Braden Lamburn'),
(83, 'A7619987-83', 'E6778026-90', '2023-04-08 07:01:25', '2023-04-08 11:23:24', 'Ellis Pacht'),
(84, 'A9362789-84', 'E9523587-63', '2022-03-07 05:53:13', '2022-03-07 04:54:48', 'Pier Plaistowe'),
(85, 'A8585991-85', 'E9188641-43', '2024-01-03 05:39:50', '2024-01-03 01:50:47', 'Milo McKirdy'),
(86, 'A7432056-86', 'E7531924-29', '2023-01-09 05:42:33', '2023-01-09 01:09:48', 'Carly Cowdrey'),
(87, 'A5301669-87', 'E0225471-17', '2022-11-06 09:21:37', '2022-11-06 04:05:14', 'Charil Murfett'),
(88, 'A0166536-88', 'E0329575-50', '2023-11-16 05:38:16', '2023-11-16 02:14:54', 'Jessee Allcott'),
(89, 'A0041565-89', 'E5712081-82', '2022-12-25 07:35:45', '2022-12-25 01:51:15', 'Merrily Dionis'),
(90, 'A8678461-90', 'E0062174-79', '2022-06-29 06:09:49', '2022-06-29 02:44:31', 'Bobina Andree'),
(91, 'A6611816-91', 'E8169488-36', '2023-03-07 08:46:17', '2023-03-07 04:08:13', 'Tiphanie Flatman'),
(92, 'A0384405-92', 'E9188641-43', '2023-12-11 06:30:48', '2023-12-11 01:30:38', 'Milo McKirdy'),
(93, 'A6415014-93', 'E2629355-38', '2024-05-15 05:44:36', '2024-05-15 04:14:31', 'Fran Sneden'),
(94, 'A7956219-94', 'E1748376-40', '2023-02-14 12:07:30', '2023-02-14 06:05:11', 'Papageno Camois'),
(95, 'A7136797-95', 'E0124122-73', '2023-01-19 05:18:02', '2023-01-19 01:23:37', 'Pattie Van der Beken'),
(96, 'A5197920-96', 'E7991934-96', '2023-01-16 12:22:12', '2023-01-16 01:15:15', 'Urban Rossoni'),
(97, 'A5897274-97', 'E6031902-87', '2024-02-01 06:33:48', '2024-02-01 03:14:34', 'Kelsey Craydon'),
(98, 'A2435071-98', 'E0593932-66', '2024-03-22 05:25:50', '2024-03-22 06:19:21', 'Augustin Mordin'),
(99, 'A2388709-99', 'E1846121-2', '2022-06-20 06:13:01', '2022-06-20 02:43:01', 'Rabbi Summerly'),
(100, 'A6092810-110', 'E2618191-21', '2023-05-23 05:13:50', '2023-05-23 01:04:35', 'Natal Milch'),
(101, 'A2983010-061', 'E0182922-85', '2022-12-25 05:33:19', '2022-12-25 01:17:31', 'Prent Harfleet'),
(102, 'A8296410-142', 'E9818958-83', '2022-10-16 08:09:36', '2022-10-16 02:14:27', 'Zane Blasli'),
(103, 'A5729310-233', 'E2477848-57', '2023-04-03 05:57:59', '2023-04-03 03:00:27', 'Muhammad Jeffcoate'),
(104, 'A4857910-024', 'E7453779-46', '2022-08-17 06:19:07', '2022-08-17 05:55:59', 'Jecho Lambeth'),
(105, 'A7708610-775', 'E5838512-98', '2022-07-31 08:52:08', '2022-07-31 03:46:24', 'Hans Frankel'),
(106, 'A5014610-546', 'E9789595-64', '2023-03-11 08:43:42', '2023-03-11 04:51:01', 'Broderick Flancinbaum'),
(107, 'A5007110-887', 'E1846121-2', '2022-12-12 05:41:05', '2022-12-12 03:55:51', 'Rabbi Summerly'),
(108, 'A0972310-308', 'E9541880-42', '2023-12-01 05:21:35', '2023-12-01 03:42:23', 'Rees Zellmer'),
(109, 'A4474210-959', 'E9073066-4', '2023-11-06 09:25:45', '2023-11-06 03:27:34', 'Lind Ligertwood'),
(110, 'A4186913-110', 'E3969426-84', '2023-12-01 07:06:58', '2023-12-01 01:52:12', 'Parsifal Stembridge'),
(111, 'A3650883-111', 'E3113368-35', '2023-01-23 12:24:11', '2023-01-23 03:54:40', 'Tait Grunwald'),
(112, 'A5525833-112', 'E4565017-59', '2024-03-27 07:35:19', '2024-03-27 02:48:39', 'Dominique Murrum'),
(113, 'A7790542-113', 'E7024865-53', '2022-07-21 06:46:54', '2022-07-21 01:57:47', 'Tiebold Littlejohn'),
(114, 'A8376833-114', 'E7624155-93', '2023-08-28 06:16:46', '2023-08-28 02:13:16', 'Pattin Rayhill'),
(115, 'A7458758-115', 'E7770939-88', '2023-09-08 07:37:10', '2023-09-08 03:45:12', 'Pamella Rhodes'),
(116, 'A3881819-116', 'E7770939-88', '2022-12-24 05:11:13', '2022-12-24 02:12:26', 'Pamella Rhodes'),
(117, 'A7026234-117', 'E9464628-92', '2023-04-15 08:49:46', '2023-04-15 04:25:23', 'Aeriell Laurentin'),
(118, 'A0862395-118', 'E1846121-2', '2022-02-08 07:51:14', '2022-02-08 02:38:34', 'Rabbi Summerly'),
(119, 'A9350264-119', 'E6915721-28', '2024-01-11 06:32:43', '2024-01-11 03:09:32', 'Christel Rolinson'),
(120, 'A7615203-120', 'E3448086-62', '2022-11-15 07:52:05', '2022-11-15 03:46:11', 'Eberhard Philipeaux'),
(121, 'A5396715-121', 'E0124122-73', '2022-11-11 12:14:29', '2022-11-11 01:10:24', 'Pattie Van der Beken'),
(122, 'A0370922-122', 'E0062174-79', '2024-04-17 08:30:32', '2024-04-17 02:06:42', 'Bobina Andree'),
(123, 'A3809864-123', 'E7453779-46', '2023-02-21 09:44:43', '2023-02-21 05:51:34', 'Jecho Lambeth'),
(124, 'A5509663-124', 'E9224399-6', '2022-12-12 07:48:55', '2022-12-12 04:28:22', 'Jorey Weld'),
(125, 'A3631724-125', 'E8295162-52', '2022-11-30 07:52:26', '2022-11-30 02:17:32', 'Pooh Eydel'),
(126, 'A4239847-126', 'E9266271-94', '2023-11-05 09:56:58', '2023-11-05 03:44:28', 'Emelyne Pinkett'),
(127, 'A9435398-127', 'E5109270-34', '2023-10-08 06:00:23', '2023-10-08 01:46:13', 'Arman Heape'),
(128, 'A2395363-128', 'E0052512-97', '2022-12-23 06:24:45', '2022-12-23 02:14:17', 'Constantia Garmons'),
(130, 'A3165989-130', 'E0593932-66', '2024-01-03 05:58:06', '2024-01-03 01:11:03', 'Augustin Mordin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrasenas`
--

CREATE TABLE `contrasenas` (
  `id` int(5) NOT NULL,
  `contrasenaEmail` varchar(70) NOT NULL,
  `contrasenaToken` varchar(255) NOT NULL,
  `CuentaCodigo` varchar(70) NOT NULL,
  `CuentaTipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `id` int(5) NOT NULL,
  `CuentaCodigo` varchar(70) NOT NULL,
  `CuentaNombre` varchar(40) NOT NULL,
  `CuentaApellido` varchar(40) NOT NULL,
  `CuentaUsuario` varchar(20) NOT NULL,
  `CuentaClave` varchar(535) NOT NULL,
  `CuentaEmail` varchar(70) NOT NULL,
  `CuentaTipo` varchar(20) NOT NULL,
  `CuentaGenero` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id`, `CuentaCodigo`, `CuentaNombre`, `CuentaApellido`, `CuentaUsuario`, `CuentaClave`, `CuentaEmail`, `CuentaTipo`, `CuentaGenero`) VALUES
(75, 'AO5819939-2', 'Jonkellys', 'Maestre', 'Jonkellys', '$2y$10$8kVgjs6TVrSZF2tna9fqP.xp2SY/tHHI0WoM68lCPEfHcV/ATK07u', 'admin@mail.com', 'Admin', 'Female');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(5) NOT NULL,
  `PersonalNombre` varchar(40) NOT NULL,
  `PersonalApellido` varchar(40) NOT NULL,
  `PersonalCargo` varchar(200) NOT NULL,
  `PersonalFechaNac` date NOT NULL,
  `PersonalLugarNac` varchar(200) NOT NULL,
  `PersonalGenero` varchar(9) NOT NULL,
  `PersonalDireccion` varchar(200) NOT NULL,
  `PersonalTelefono` varchar(30) NOT NULL,
  `PersonalCorreo` varchar(70) NOT NULL,
  `PersonalCodigo` varchar(30) NOT NULL,
  `PersonalEstado` varchar(50) NOT NULL,
  `PersonalUltimaEntrada` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `PersonalNombre`, `PersonalApellido`, `PersonalCargo`, `PersonalFechaNac`, `PersonalLugarNac`, `PersonalGenero`, `PersonalDireccion`, `PersonalTelefono`, `PersonalCorreo`, `PersonalCodigo`, `PersonalEstado`, `PersonalUltimaEntrada`) VALUES
(1, 'Norbie', 'Hickisson', 'Paralegal', '2001-08-18', 'Campo Maior', 'Male', '430 Talisman Road', '227-123-0867', 'nhickisson0@abc.net.au', 'E2012442-1', 'Medical Permit', '0000-00-00 00:00:00'),
(2, 'Rabbi', 'Summerly', 'Data Coordinator', '1980-09-18', 'Kuangyuan', 'Male', '3035 Sullivan Alley', '912-861-2414', 'rsummerly1@house.gov', 'E1846121-2', 'Medical Permit', '0000-00-00 00:00:00'),
(3, 'Clive', 'Bucher', 'Administrative Assistant IV', '1977-12-03', 'Shanghuang', 'Male', '3 Emmet Place', '111-335-4346', 'cbucher2@fda.gov', 'E3113359-3', 'Active', '0000-00-00 00:00:00'),
(4, 'Lind', 'Ligertwood', 'Tax Accountant', '1981-06-07', 'Sobinka', 'Male', '76568 Springs Alley', 'Doesn\'t have phone', 'lligertwood3@telegraph.co.uk', 'E9073066-4', 'Medical Permit', '0000-00-00 00:00:00'),
(5, 'Norean', 'Bispham', 'Compensation Analyst', '1980-11-23', 'Independencia', 'Female', '9 Golf Park', '732-396-3944', 'nbispham4@bloglovin.com', 'E6371512-5', 'Active', '0000-00-00 00:00:00'),
(6, 'Jorey', 'Weld', 'Director of Sales', '1985-07-25', 'La Union', 'Female', '790 Ruskin Point', '582-278-0175', 'jweld5@webs.com', 'E9224399-6', 'Active', '0000-00-00 00:00:00'),
(7, 'Cleon', 'Morten', 'Assistant Professor', '1974-09-02', 'Ngetkib', 'Male', '450 Judy Plaza', '995-840-8914', 'cmorten6@mysql.com', 'E3361213-7', 'Medical Permit', '0000-00-00 00:00:00'),
(8, 'Damien', 'Dabourne', 'Payment Adjustment Coordinator', '1985-03-20', 'Stavanger', 'Male', '934 Lerdahl Junction', '448-585-7235', 'ddabourne7@chronoengine.com', 'E5053850-8', 'Medical Permit', '0000-00-00 00:00:00'),
(9, 'Bary', 'Pavier', 'Civil Engineer', '1979-07-22', 'Oguta', 'Male', '05 Calypso Court', '204-703-7121', 'bpavier8@zimbio.com', 'E0792771-9', 'Active', '0000-00-00 00:00:00'),
(10, 'Alicea', 'Sherratt', 'Software Consultant', '1992-10-11', 'Canuelas', 'Female', '61 Ridgeway Avenue', '849-813-9653', 'asherratt9@ft.com', 'E4237462-10', 'Active', '0000-00-00 00:00:00'),
(11, 'Olivier', 'Roscher', 'Quality Control Specialist', '2009-05-11', 'Ditang', 'Male', '5219 Wayridge Way', '633-329-1123', 'oroschera@rakuten.co.jp', 'E3435972-11', 'Active', '0000-00-00 00:00:00'),
(12, 'Baryram', 'Cluer', 'Design Engineer', '1973-09-05', 'Yasnyy', 'Male', '2 Maryland Parkway', 'Doesn\'t have phone', 'bcluerb@ed.gov', 'E9854155-12', 'Active', '0000-00-00 00:00:00'),
(13, 'Kilian', 'Dale', 'Professor', '2009-08-31', 'Karang Tengah', 'Male', '0 Dakota Place', '897-181-5396', 'kdalec@biblegateway.com', 'E3237675-13', 'Active', '2024-05-27 02:50:57'),
(14, 'Netti', 'Synder', 'Financial Analyst', '1998-10-01', 'Villeta', 'Female', '0403 Clarendon Parkway', '387-533-4327', 'nsynderd@jugem.jp', 'E8128027-14', 'Medical Permit', '0000-00-00 00:00:00'),
(15, 'Erinn', 'Aupol', 'Safety Technician III', '1996-07-06', 'Severomorsk', 'Female', '9264 Faridge Way', 'Doesn\'t have phone', 'eaupole@nature.com', 'E3170236-15', 'Active', '0000-00-00 00:00:00'),
(16, 'Angela', 'Birdwistle', 'Junior Executive', '2005-09-25', 'Rahayu', 'Female', '3634 Knutson Terrace', '373-687-8144', 'abirdwistlef@sbwire.com', 'E3911455-16', 'Active', '0000-00-00 00:00:00'),
(17, 'Charil', 'Murfett', 'GIS Technical Architect', '1981-08-06', 'San Jose', 'Female', '921 Summerview Terrace', '713-807-4308', 'cmurfettg@abc.net.au', 'E0225471-17', 'Active', '0000-00-00 00:00:00'),
(18, 'Holmes', 'Piell', 'Budget-Accounting Analyst II', '1994-05-04', 'Khairpur Nathan Shah', 'Male', '48155 Johnson Pass', '725-816-5886', 'hpiellh@answers.com', 'E1755610-18', 'Active', '0000-00-00 00:00:00'),
(19, 'Jack', 'Jacobson', 'Professor', '1992-09-18', 'Xianqiao', 'Male', '3457 Fisk Trail', '385-690-7464', 'jjacobsoni@free.fr', 'E7329743-19', 'Active', '0000-00-00 00:00:00'),
(20, 'Lindsay', 'Walles', 'Accountant II', '1998-05-13', 'Piracicaba', 'Female', '5033 Gina Drive', '521-139-6765', 'lwallesj@uiuc.edu', 'E6912885-20', 'Active', '0000-00-00 00:00:00'),
(21, 'Natal', 'Milch', 'General Manager', '1997-01-19', 'Kyjov', 'Male', '52114 Luster Plaza', '246-878-6349', 'nmilchk@1und1.de', 'E2618191-21', 'Active', '0000-00-00 00:00:00'),
(22, 'Dorelle', 'Snelle', 'Technical Writer', '1992-10-31', 'Yutou', 'Female', '50 American Parkway', '881-652-7354', 'dsnellel@tiny.cc', 'E5646847-22', 'Active', '0000-00-00 00:00:00'),
(23, 'Ethelind', 'Rubbens', 'Design Engineer', '2002-05-07', 'Tresť', 'Female', '9219 Donald Hill', '255-505-7235', 'erubbensm@odnoklassniki.ru', 'E2854125-23', 'Active', '0000-00-00 00:00:00'),
(24, 'Llywellyn', 'Braund', 'Compensation Analyst', '2000-04-05', 'Colmar', 'Male', '09 Sycamore Center', '884-816-0818', 'lbraundn@themeforest.net', 'E3517409-24', 'Medical Permit', '0000-00-00 00:00:00'),
(25, 'Temp', 'Edworthy', 'Assistant Professor', '1988-05-26', 'Baitouli', 'Male', '15 Dayton Lane', '869-221-1340', 'tedworthyo@goo.ne.jp', 'E5392079-25', 'Active', '0000-00-00 00:00:00'),
(26, 'Charlton', 'Hawkridge', 'Executive Secretary', '1995-09-07', 'Las Heras', 'Male', '103 Graedel Road', 'Doesn\'t have phone', 'chawkridgep@salon.com', 'E2830396-26', 'Active', '0000-00-00 00:00:00'),
(27, 'Valentino', 'Kynastone', 'Human Resources Manager', '2006-03-30', 'Vcelna', 'Male', '80 Farwell Road', '245-329-0341', 'vkynastoneq@google.nl', 'E8576890-27', 'Medical Permit', '0000-00-00 00:00:00'),
(28, 'Christel', 'Rolinson', 'Senior Developer', '1991-05-24', 'Poricany', 'Female', '52 Sutherland Hill', '162-635-1252', 'crolinsonr@stanford.edu', 'E6915721-28', 'Active', '0000-00-00 00:00:00'),
(29, 'Carly', 'Cowdrey', 'Internal Auditor', '1990-12-08', 'Boucinhas', 'Male', '15654 Bay Drive', '612-755-2368', 'ccowdreys@hud.gov', 'E7531924-29', 'Medical Permit', '0000-00-00 00:00:00'),
(30, 'Dale', 'Skittrell', 'Account Executive', '1981-04-29', 'Tokombere', 'Female', '60 Transport Center', '676-574-7531', 'dskittrellt@nifty.com', 'E6263504-30', 'Active', '0000-00-00 00:00:00'),
(31, 'Coretta', 'Haughey', 'Web Developer II', '2008-08-03', 'San Antonio', 'Female', '62 Everett Parkway', '469-453-0061', 'chaugheyu@google.com.br', 'E1058110-31', 'Medical Permit', '0000-00-00 00:00:00'),
(32, 'Lanny', 'Grishelyov', 'Project Manager', '2004-08-07', 'Nador', 'Female', '1 Lotheville Avenue', '787-458-9498', 'lgrishelyovv@meetup.com', 'E6682903-32', 'Active', '0000-00-00 00:00:00'),
(33, 'Pincas', 'Bradock', 'Software Test Engineer II', '2005-03-14', 'Jinotepe', 'Male', '6548 Westend Pass', '515-295-7658', 'pbradockw@yahoo.co.jp', 'E1843453-33', 'Active', '0000-00-00 00:00:00'),
(34, 'Arman', 'Heape', 'Programmer I', '1992-03-23', 'Pondaguitan', 'Male', '3 Eliot Hill', '299-180-3273', 'aheapex@github.io', 'E5109270-34', 'Active', '0000-00-00 00:00:00'),
(35, 'Tait', 'Grunwald', 'Software Engineer IV', '1974-06-03', 'Di An', 'Male', '1544 Doe Crossing Lane', '166-478-8954', 'tgrunwaldy@naver.com', 'E3113368-35', 'Active', '0000-00-00 00:00:00'),
(36, 'Tiphanie', 'Flatman', 'Administrative Officer', '2001-09-06', 'Casapava do Sul', 'Female', '4 Walton Center', '106-963-0169', 'tflatmanz@alibaba.com', 'E8169488-36', 'Active', '0000-00-00 00:00:00'),
(37, 'Tallie', 'Stollsteiner', 'Marketing Assistant', '1972-12-07', 'Balpyk Bi', 'Male', '30 Knutson Way', 'Doesn\'t have phone', 'tstollsteiner10@simplemachines.org', 'E2124569-37', 'Active', '0000-00-00 00:00:00'),
(38, 'Fran', 'Sneden', 'Help Desk Technician', '1995-03-02', 'San Fernando de Atabapo', 'Male', '35 South Crossing', '670-597-0999', 'fsneden11@flavors.me', 'E2629355-38', 'Active', '0000-00-00 00:00:00'),
(39, 'Pamella', 'Gunbie', 'Health Coach III', '1992-07-17', 'Tungawan', 'Female', '8641 Eagan Hill', '627-274-3252', 'pgunbie12@yellowpages.com', 'E3642917-39', 'Medical Permit', '0000-00-00 00:00:00'),
(40, 'Papageno', 'Camois', 'Developer III', '2003-10-19', 'Titab', 'Male', '46916 Warbler Parkway', '421-947-5023', 'pcamois13@xinhuanet.com', 'E1748376-40', 'Active', '0000-00-00 00:00:00'),
(41, 'Ilario', 'Yerill', 'Professor', '1994-03-25', 'Dabou', 'Male', '170 Eastwood Alley', '453-617-9616', 'iyerill14@webmd.com', 'E8242647-41', 'Medical Permit', '0000-00-00 00:00:00'),
(42, 'Rees', 'Zellmer', 'Analyst Programmer', '2007-02-09', 'Aibura', 'Male', '6739 Talmadge Hill', '746-534-7549', 'rzellmer15@europa.eu', 'E9541880-42', 'Active', '0000-00-00 00:00:00'),
(43, 'Milo', 'McKirdy', 'Analog Circuit Design manager', '1980-10-30', 'Port Loko', 'Male', '41465 Fallview Crossing', '654-525-4400', 'mmckirdy16@goodreads.com', 'E9188641-43', 'Active', '0000-00-00 00:00:00'),
(44, 'Diena', 'Debow', 'Junior Executive', '1974-03-05', 'Tangtuzhui', 'Female', '52085 Ilene Alley', '199-564-0005', 'ddebow17@hatena.ne.jp', 'E2094180-44', 'Active', '0000-00-00 00:00:00'),
(45, 'Batholomew', 'Edmondson', 'Pharmacist', '2001-11-14', 'Cibangban Girang', 'Male', '106 David Parkway', '790-442-1563', 'bedmondson18@networkadvertising.org', 'E9456122-45', 'Active', '0000-00-00 00:00:00'),
(46, 'Jecho', 'Lambeth', 'Nurse', '1987-01-04', 'Sacramento', 'Male', '075 Service Road', '916-594-9600', 'jlambeth19@ihg.com', 'E7453779-46', 'Medical Permit', '0000-00-00 00:00:00'),
(47, 'Enrika', 'Narey', 'Senior Financial Analyst', '1988-06-04', 'Nguluhan', 'Female', '7022 Gateway Pass', 'Doesn\'t have phone', 'enarey1a@friendfeed.com', 'E8445656-47', 'Active', '0000-00-00 00:00:00'),
(48, 'Coretta', 'Tague', 'Graphic Designer', '1983-07-25', 'Daxing', 'Female', '6979 Prentice Point', '159-362-6933', 'ctague1b@e-recht24.de', 'E0554118-48', 'Active', '0000-00-00 00:00:00'),
(49, 'Pren', 'Albrecht', 'Budget-Accounting Analyst III', '1989-02-24', 'Chuntai', 'Male', '6 Arrowood Road', '407-567-7890', 'palbrecht1c@mozilla.org', 'E7343459-49', 'Medical Permit', '0000-00-00 00:00:00'),
(50, 'Jessee', 'Allcott', 'Clinical Specialist', '1980-06-14', 'Rende', 'Male', '17713 Towne Hill', '365-768-8793', 'jallcott1d@fastcompany.com', 'E0329575-50', 'Active', '0000-00-00 00:00:00'),
(51, 'Elysee', 'Philot', 'Dental Hygienist', '1972-09-30', 'Cigedang', 'Female', '0439 Spaight Lane', '140-432-4144', 'ephilot1e@angelfire.com', 'E4962590-51', 'Medical Permit', '0000-00-00 00:00:00'),
(52, 'Pooh', 'Eydel', 'Senior Developer', '1975-02-18', 'Prokuplje', 'Male', '34247 Oak Valley Court', '210-861-0910', 'peydel1f@java.com', 'E8295162-52', 'Medical Permit', '0000-00-00 00:00:00'),
(53, 'Tiebold', 'Littlejohn', 'Programmer II', '2007-01-12', 'Spirit River', 'Male', '02 Ohio Trail', '363-431-4990', 'tlittlejohn1g@1688.com', 'E7024865-53', 'Active', '0000-00-00 00:00:00'),
(54, 'Wallis', 'Legon', 'Accounting Assistant II', '1996-04-10', 'Andkhoy', 'Female', '09 Emmet Street', '332-206-1843', 'wlegon1h@google.pl', 'E6695718-54', 'Medical Permit', '0000-00-00 00:00:00'),
(55, 'Elvera', 'Fendlow', 'Senior Editor', '2002-08-17', 'Shirone', 'Female', '04292 Green Plaza', '473-493-9728', 'efendlow1i@blinklist.com', 'E8170312-55', 'Active', '0000-00-00 00:00:00'),
(56, 'Karlis', 'Carwardine', 'Dental Hygienist', '2004-09-30', 'Melres', 'Male', '4040 Commercial Trail', '448-391-9145', 'kcarwardine1j@163.com', 'E8622673-56', 'Active', '0000-00-00 00:00:00'),
(57, 'Muhammad', 'Jeffcoate', 'Automation Specialist II', '2006-12-04', 'Santiago del Torno', 'Male', '4 Anniversary Trail', '877-267-1690', 'mjeffcoate1k@goodreads.com', 'E2477848-57', 'Active', '0000-00-00 00:00:00'),
(58, 'Emily', 'Buttner', 'Internal Auditor', '1990-09-08', 'Palermo', 'Female', '25 High Crossing Trail', 'Doesn\'t have phone', 'ebuttner1l@mtv.com', 'E0050172-58', 'Active', '0000-00-00 00:00:00'),
(59, 'Dominique', 'Murrum', 'Mechanical Systems Engineer', '1987-09-28', 'Shuanghe', 'Female', '9 Forster Park', '593-895-3597', 'dmurrum1m@discuz.net', 'E4565017-59', 'Medical Permit', '0000-00-00 00:00:00'),
(60, 'Tito', 'Abramovitz', 'GIS Technical Architect', '1970-07-29', 'Xinmin', 'Male', '5230 Butterfield Parkway', '397-868-1693', 'tabramovitz1n@hp.com', 'E5301891-60', 'Active', '0000-00-00 00:00:00'),
(61, 'Bendicty', 'Wardhaugh', 'Accountant III', '1974-02-11', 'Choszczno', 'Male', '89 Graedel Plaza', '401-996-4172', 'bwardhaugh1o@state.gov', 'E8797303-61', 'Active', '0000-00-00 00:00:00'),
(62, 'Eberhard', 'Philipeaux', 'Analog Circuit Design manager', '2003-07-25', 'Iracemapolis', 'Male', '43803 Ridgeview Point', '324-629-6955', 'ephilipeaux1p@senate.gov', 'E3448086-62', 'Active', '0000-00-00 00:00:00'),
(63, 'Pier', 'Plaistowe', 'Administrative Officer', '2002-12-28', 'Banjarbaru', 'Female', '0184 Katie Pass', '632-455-2159', 'pplaistowe1q@ning.com', 'E9523587-63', 'Active', '0000-00-00 00:00:00'),
(64, 'Broderick', 'Flancinbaum', 'Account Executive', '1970-09-10', 'Curuzu Cuatia', 'Male', '94773 Duke Way', '286-448-4484', 'bflancinbaum1r@java.com', 'E9789595-64', 'Active', '0000-00-00 00:00:00'),
(65, 'Gustave', 'Lawn', 'Quality Control Specialist', '1988-06-27', 'Jatimulyo', 'Male', '8133 Merchant Avenue', 'Doesn\'t have phone', 'glawn1s@360.cn', 'E6589332-65', 'Active', '0000-00-00 00:00:00'),
(66, 'Augustin', 'Mordin', 'Staff Scientist', '2006-02-08', 'Kalynivka', 'Male', '1038 Summit Center', '169-237-5464', 'amordin1t@mysql.com', 'E0593932-66', 'Active', '0000-00-00 00:00:00'),
(67, 'Pen', 'Toler', 'Project Manager', '2000-01-18', 'Kutorejo', 'Female', '39 Hagan Hill', '835-447-7150', 'ptoler1u@tumblr.com', 'E7807124-67', 'Active', '0000-00-00 00:00:00'),
(68, 'Cob', 'Gerb', 'Speech Pathologist', '1991-01-30', 'Ornontowice', 'Male', '25 Sundown Way', '622-261-0985', 'cgerb1v@umn.edu', 'E8830815-68', 'Active', '0000-00-00 00:00:00'),
(69, 'Norrie', 'Antoshin', 'Cost Accountant', '1975-08-03', 'Gubuk Daya', 'Female', '5 Forest Dale Alley', '562-576-8394', 'nantoshin1w@elpais.com', 'E0761608-69', 'Medical Permit', '0000-00-00 00:00:00'),
(70, 'Kristofer', 'Bartoli', 'Community Outreach Specialist', '1992-09-20', 'Naji', 'Male', '6971 Northridge Street', '773-124-4107', 'kbartoli1x@geocities.jp', 'E4067509-70', 'Active', '0000-00-00 00:00:00'),
(71, 'Izak', 'O\'Breen', 'Assistant Manager', '1972-11-19', 'Granja', 'Male', '7220 Basil Terrace', '464-564-8181', 'iobreen1y@tinypic.com', 'E8305654-71', 'Active', '0000-00-00 00:00:00'),
(72, 'Ferd', 'Gregol', 'GIS Technical Architect', '2009-03-12', 'Kebonagung', 'Male', '606 Dryden Hill', '670-915-1807', 'fgregol1z@amazon.com', 'E8901532-72', 'Active', '0000-00-00 00:00:00'),
(73, 'Pattie', 'Van der Beken', 'GIS Technical Architect', '1986-03-23', 'Prinza', 'Male', '66212 Farragut Center', '648-972-0880', 'pvanderbeken20@ucla.edu', 'E0124122-73', 'Active', '0000-00-00 00:00:00'),
(74, 'Braden', 'Lamburn', 'Design Engineer', '2005-04-10', 'Daxi', 'Male', '75 Mifflin Road', '728-985-1039', 'blamburn21@drupal.org', 'E1047004-74', 'Active', '0000-00-00 00:00:00'),
(75, 'Pearla', 'Clapton', 'Research Assistant III', '1991-12-02', 'Zhangcun', 'Female', '836 Straubel Street', '829-800-7007', 'pclapton22@cocolog-nifty.com', 'E1444673-75', 'Medical Permit', '0000-00-00 00:00:00'),
(76, 'Ray', 'Wolfendell', 'Recruiter', '1997-05-25', 'Claudio', 'Male', '3245 Dovetail Street', '236-127-4677', 'rwolfendell23@phpbb.com', 'E6414928-76', 'Active', '0000-00-00 00:00:00'),
(77, 'Micheil', 'Strowan', 'Product Engineer', '2009-08-02', 'El Refugio', 'Male', '585 Westend Lane', '240-910-8358', 'mstrowan24@fema.gov', 'E8526638-77', 'Active', '0000-00-00 00:00:00'),
(78, 'Elyssa', 'Markwick', 'Staff Scientist', '1990-08-08', 'Drohobych', 'Female', '07573 Bashford Place', '309-387-7514', 'emarkwick25@wunderground.com', 'E6933945-78', 'Active', '0000-00-00 00:00:00'),
(79, 'Bobina', 'Andree', 'Clinical Specialist', '1998-05-22', 'Cayenne', 'Female', '55793 Kim Hill', 'Doesn\'t have phone', 'bandree26@uol.com.br', 'E0062174-79', 'Active', '0000-00-00 00:00:00'),
(80, 'Marnie', 'Dyne', 'Web Designer I', '1972-09-18', 'Samran', 'Female', '5229 Armistice Terrace', '894-931-3307', 'mdyne27@oaic.gov.au', 'E1047232-80', 'Medical Permit', '0000-00-00 00:00:00'),
(81, 'Rosina', 'Goadsby', 'Geological Engineer', '1974-03-25', 'Lons-le-Saunier', 'Female', '9 Browning Alley', '876-960-0251', 'rgoadsby28@state.tx.us', 'E3740848-81', 'Active', '0000-00-00 00:00:00'),
(82, 'Merrily', 'Dionis', 'Technical Writer', '1994-09-22', 'Shangyuan', 'Female', '3434 Harper Alley', '571-416-9078', 'mdionis29@chron.com', 'E5712081-82', 'Active', '0000-00-00 00:00:00'),
(83, 'Zane', 'Blasli', 'Nurse', '2003-11-21', 'Ayn al Bayda', 'Male', '9 Raven Hill', '651-932-1228', 'zblasli2a@pcworld.com', 'E9818958-83', 'Active', '0000-00-00 00:00:00'),
(84, 'Parsifal', 'Stembridge', 'Operator', '1986-09-02', 'Lenningen', 'Male', '1 Mayfield Drive', '395-434-4538', 'pstembridge2b@house.gov', 'E3969426-84', 'Active', '0000-00-00 00:00:00'),
(85, 'Prent', 'Harfleet', 'Chemical Engineer', '1979-02-08', 'Jingnao', 'Male', '75108 Colorado Drive', '714-801-3845', 'pharfleet2c@vkontakte.ru', 'E0182922-85', 'Active', '0000-00-00 00:00:00'),
(86, 'Filide', 'Yosifov', 'Structural Engineer', '1994-09-26', 'Santa Lucia', 'Female', '8117 Holmberg Center', '284-313-1734', 'fyosifov2d@craigslist.org', 'E7275544-86', 'Medical Permit', '0000-00-00 00:00:00'),
(87, 'Kelsey', 'Craydon', 'Environmental Specialist', '2002-09-15', 'Karangkeng', 'Female', '4672 Hayes Center', '110-311-9791', 'kcraydon2e@oracle.com', 'E6031902-87', 'Active', '0000-00-00 00:00:00'),
(88, 'Pamella', 'Rhodes', 'Staff Accountant II', '1996-07-04', 'Yagoua', 'Female', '0 Oneill Trail', '596-705-5268', 'prhodes2f@msn.com', 'E7770939-88', 'Active', '0000-00-00 00:00:00'),
(89, 'Ferdinande', 'Armer', 'Payment Adjustment Coordinator', '1975-08-31', 'Nicolas Bravo', 'Female', '2 Upham Avenue', '883-629-9625', 'farmer2g@hud.gov', 'E5634993-89', 'Active', '0000-00-00 00:00:00'),
(90, 'Ellis', 'Pacht', 'Occupational Therapist', '1981-11-24', 'Hakha', 'Male', '5 David Point', '675-189-8648', 'epacht2h@behance.net', 'E6778026-90', 'Active', '0000-00-00 00:00:00'),
(91, 'Joy', 'Newey', 'Developer IV', '1978-06-03', 'Atarodangwautu', 'Female', '2 Schurz Hill', '693-906-1430', 'jnewey2i@soup.io', 'E3817231-91', 'Active', '0000-00-00 00:00:00'),
(92, 'Aeriell', 'Laurentin', 'Marketing Assistant', '2009-01-23', 'Zhengdun', 'Female', '45 Dwight Pass', 'Doesn\'t have phone', 'alaurentin2j@liveinternet.ru', 'E9464628-92', 'Active', '0000-00-00 00:00:00'),
(93, 'Pattin', 'Rayhill', 'Senior Cost Accountant', '1998-10-10', 'Krasnyy Yar', 'Male', '1229 Dryden Place', '280-882-6476', 'prayhill2k@weibo.com', 'E7624155-93', 'Active', '0000-00-00 00:00:00'),
(94, 'Emelyne', 'Pinkett', 'Associate Professor', '2001-02-08', 'Wakefield', 'Female', '0 Arizona Road', '670-680-0608', 'epinkett2l@yale.edu', 'E9266271-94', 'Medical Permit', '0000-00-00 00:00:00'),
(95, 'Peterus', 'Titcom', 'Structural Analysis Engineer', '2001-07-03', 'Santa Anita', 'Male', '5825 Vermont Plaza', '133-434-2784', 'ptitcom2m@surveymonkey.com', 'E1423891-95', 'Medical Permit', '0000-00-00 00:00:00'),
(96, 'Urban', 'Rossoni', 'Analog Circuit Design manager', '1995-06-27', 'Figueira Castelo Rodrigo', 'Male', '67138 Cottonwood Way', 'Doesn\'t have phone', 'urossoni2n@webeden.co.uk', 'E7991934-96', 'Medical Permit', '0000-00-00 00:00:00'),
(97, 'Constantia', 'Garmons', 'VP Marketing', '1984-11-11', 'Wugong', 'Female', '70 Rigney Plaza', '243-550-4053', 'cgarmons2o@usnews.com', 'E0052512-97', 'Active', '0000-00-00 00:00:00'),
(98, 'Hans', 'Frankel', 'Human Resources Assistant II', '2006-02-16', 'Dawusu', 'Male', '25 Reindahl Center', '281-687-7128', 'hfrankel2p@canalblog.com', 'E5838512-98', 'Active', '0000-00-00 00:00:00'),
(99, 'Cecilius', 'Fealey', 'Director of Sales', '1986-11-13', 'Vanaton', 'Male', '70 Haas Alley', '521-528-3194', 'cfealey2q@sourceforge.net', 'E1971955-99', 'Medical Permit', '0000-00-00 00:00:00'),
(100, 'Rebecca', 'Huggard', 'Structural Engineer', '1992-06-04', 'Juliaca', 'Female', '739 Waywood Crossing', '414-709-3986', 'rhuggard2r@webs.com', 'E2490994-100', 'Active', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `id` int(5) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `UserEmail` varchar(70) NOT NULL,
  `UserClave` varchar(535) NOT NULL,
  `CuentaCodigo` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CuentaCodigo` (`CuentaCodigo`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PersonalCodigo` (`PersonalCodigo`),
  ADD KEY `AsistenciaFecha` (`AsistenciaFecha`);

--
-- Indices de la tabla `contrasenas`
--
ALTER TABLE `contrasenas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contrasenaToken` (`contrasenaToken`),
  ADD KEY `CuentaCodigo` (`CuentaCodigo`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CuentaCodigo` (`CuentaCodigo`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PersonalCodigo` (`PersonalCodigo`),
  ADD KEY `PersonalUltimaEntrada` (`PersonalUltimaEntrada`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CuentaCodigo` (`CuentaCodigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT de la tabla `contrasenas`
--
ALTER TABLE `contrasenas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`CuentaCodigo`) REFERENCES `cuentas` (`CuentaCodigo`);

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`PersonalCodigo`) REFERENCES `personal` (`PersonalCodigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contrasenas`
--
ALTER TABLE `contrasenas`
  ADD CONSTRAINT `contrasenas_ibfk_1` FOREIGN KEY (`CuentaCodigo`) REFERENCES `cuentas` (`CuentaCodigo`);

--
-- Filtros para la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD CONSTRAINT `Usuarios_ibfk_1` FOREIGN KEY (`CuentaCodigo`) REFERENCES `cuentas` (`CuentaCodigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
