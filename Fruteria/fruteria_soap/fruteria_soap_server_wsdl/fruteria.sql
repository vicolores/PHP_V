-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-12-2018 a las 16:48:06
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
-- Base de datos: `fruteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE `precios` (
  `id` int(11) NOT NULL,
  `fruta` text COLLATE latin1_spanish_ci NOT NULL,
  `precio_kg` decimal(3,1) NOT NULL,
  `temporada` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`id`, `fruta`, `precio_kg`, `temporada`) VALUES
(5, 'Naranja', '12.0', 'Invierno'),
(6, 'Ciruelo', '5.0', 'Verano'),
(7, 'Albaricoque', '2.0', 'Verano'),
(13, 'Uva', '2.0', 'Verano'),
(15, 'Melocoton', '3.0', 'Verano'),
(16, 'Banana', '1.0', 'Invierno'),
(17, 'Ní­spero', '3.0', 'Primavera'),
(20, 'Piña', '3.0', 'Invierno'),
(21, 'Castaña', '2.0', 'Otoño'),
(22, 'Mango', '5.0', 'Otoño'),
(23, 'Fresa', '2.5', 'Primavera'),
(24, 'Melón', '1.2', 'Verano'),
(25, 'Higos', '2.6', 'Verano'),
(26, 'Madroño', '99.9', 'Invierno'),
(27, 'Grosellas', '10.0', 'Otoño'),
(28, 'Plátano', '1.2', 'Primavera');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `precios`
--
ALTER TABLE `precios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `precios`
--
ALTER TABLE `precios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
