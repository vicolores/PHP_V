-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-11-2021 a las 16:19:53
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tareas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `id` int(11) NOT NULL,
  `numserie` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `descripcion` varchar(250) COLLATE utf8_bin NOT NULL,
  `fechaalta` date DEFAULT NULL,
  `estado` enum('PENDIENTE','ASIGNADA','FINALIZADA') COLLATE utf8_bin NOT NULL DEFAULT 'PENDIENTE',
  `operario` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `fechafinalizada` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id`, `numserie`, `descripcion`, `fechaalta`, `estado`, `operario`, `fechafinalizada`) VALUES
(5, '5555', 'Limpiar ventidadores', '2018-12-03', 'FINALIZADA', 'PEPE', '2018-12-10'),
(6, '6666', 'Ajustar BIOS', '2018-12-08', 'ASIGNADA', 'VICTOR', '0000-00-00'),
(7, '7777', 'Poner en hora', '2018-12-08', 'FINALIZADA', 'CASIMIRO', '2018-12-09'),
(8, '8888', 'Cambiar bateria', '2018-12-09', 'FINALIZADA', 'PACO', '2018-12-09'),
(10, '10101010', 'Limpiar teclado', '2018-12-09', 'ASIGNADA', 'BONIFACIO', NULL),
(12, '11111111', 'Cambiar monitor', '2018-12-10', 'ASIGNADA', 'TOMAS', NULL),
(13, '12121212', 'Limpiar polvo', NULL, 'PENDIENTE', NULL, NULL),
(14, '1234', 'Mejorar resolucion', NULL, 'PENDIENTE', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
