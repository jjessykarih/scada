-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2018 a las 02:52:45
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `placa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensors`
--

CREATE TABLE `sensors` (
  `id` int(10) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `t1` float NOT NULL,
  `t2` float NOT NULL,
  `ilumi` int(10) NOT NULL,
  `dia` int(10) NOT NULL,
  `mes` int(10) NOT NULL,
  `anio` int(10) NOT NULL,
  `ph` float NOT NULL,
  `oda` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sensors`
--

INSERT INTO `sensors` (`id`, `fecha`, `t1`, `t2`, `ilumi`, `dia`, `mes`, `anio`, `ph`, `oda`) VALUES
(0, '2018-07-09 08:16:07', 0, 29.5, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `telefono` int(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `pwd1` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `ciudad`, `telefono`, `email`, `pwd`, `pwd1`) VALUES
(1, 'Mariana', 'Esmeraldas', 926626789, 'jjessykarih@gmail.com', '$2y$10$35sGengHOJRnFs9UjtMmReY7m2xE/RprBDB1c9GYWx78aR3e02CLm', '$2y$10$kvvaD7XKNkGOUgFJd63n/eS8pjrEW1CSe7VSbRVedSUZAvzPagPRq');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `sensors`
--
ALTER TABLE `sensors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
