-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-05-2024 a las 19:44:45
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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

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
