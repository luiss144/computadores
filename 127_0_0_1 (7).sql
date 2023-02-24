-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2022 a las 01:32:38
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registro-admin`
--
CREATE DATABASE IF NOT EXISTS `registro-admin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `registro-admin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `Nombre` varchar(100) CHARACTER SET latin1 NOT NULL,
  `NombreUsuario` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Password` varchar(200) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`Nombre`, `NombreUsuario`, `Password`, `email`) VALUES
('prado', 'luis1234', '81dc9bdb52d04dc20036dbd8313ed055', 'luisarteta915@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `computador`
--

CREATE TABLE `computador` (
  `cod_computador` varchar(11) CHARACTER SET latin1 NOT NULL,
  `sede` varchar(11) CHARACTER SET latin1 NOT NULL,
  `sala` varchar(11) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `cod_sala` varchar(15) CHARACTER SET latin1 NOT NULL,
  `cod_sede_sala` varchar(15) CHARACTER SET latin1 NOT NULL,
  `cant_pc_salas` int(5) NOT NULL,
  `cant_max_pc` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`cod_sala`, `cod_sede_sala`, `cant_pc_salas`, `cant_max_pc`) VALUES
('ABC', 'abc123', 0, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `Nombre_sede` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Codigo_sede` varchar(10) CHARACTER SET latin1 NOT NULL,
  `Direccion_sede` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Numero_telefono` int(10) NOT NULL,
  `Cantidad_salas` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`Nombre_sede`, `Codigo_sede`, `Direccion_sede`, `Numero_telefono`, `Cantidad_salas`) VALUES
('cosmo', 'abc123', 'calle 5#1225', 123456, 1),
('prado', 'abc1234452', 'calle 5#1225', 3598, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`Codigo_sede`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
