-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-11-2024 a las 17:17:58
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `finadm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos1`
--

CREATE TABLE `gastos1` (
  `id` int(11) NOT NULL,
  `num_gasto` int(11) NOT NULL,
  `proveedor` varchar(50) NOT NULL,
  `num_fact` int(11) NOT NULL,
  `fecha_fact` date NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `pagado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `gastos1`
--

INSERT INTO `gastos1` (`id`, `num_gasto`, `proveedor`, `num_fact`, `fecha_fact`, `total`, `pagado`) VALUES
(1, 1, 'Limpiezas Paco', 230, '2024-10-07', 214, 1),
(2, 2, 'Obras Benito', 129, '2024-10-09', 1200, 1),
(3, 3, 'Pinturas Abel', 308, '2024-10-12', 650, 0),
(4, 4, 'Fontanería Martínez', 76, '2024-10-08', 200, 0),
(5, 5, 'Fachadas Martinez', 13, '0204-10-02', 675, 1),
(6, 6, 'Desatascos Ibiza', 1321, '2024-10-16', 245, 0),
(7, 7, 'Ascensores Otis', 1681, '2024-10-10', 104, 0),
(8, 8, 'Ibertrola', 14200, '2024-10-19', 158, 1),
(9, 9, 'Limpiezas Nereida', 219, '2024-10-30', 57, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `gastos1`
--
ALTER TABLE `gastos1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `gastos1`
--
ALTER TABLE `gastos1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
