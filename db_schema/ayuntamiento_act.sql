-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2017 a las 21:31:25
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ayuntamiento_act`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE IF NOT EXISTS `actividades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `nombre`) VALUES
(1, 'Reparacion/Mantenimiento de Equipos'),
(2, 'Administracion Red de Internet'),
(3, 'Administracion Reloj Checador'),
(4, 'Documentacion'),
(5, 'Mantanimiento Impresora'),
(6, 'Administracion Servidor'),
(7, 'Mantenimiento Sistemas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subactividades`
--

CREATE TABLE IF NOT EXISTS `subactividades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `actividad_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subactividades`
--

INSERT INTO `subactividades` (`id`, `nombre`, `actividad_id`) VALUES
(1, 'Formateo', 1),
(3, 'Eliminacion Virus USB', 1),
(4, 'Eliminacion Virus Equipo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE IF NOT EXISTS `tareas` (
  `id` int(11) NOT NULL,
  `actividad_id` int(11) NOT NULL,
  `subactividad_id` int(11) NOT NULL,
  `nota` varchar(200) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `actividad_id`, `subactividad_id`, `nota`, `fecha`) VALUES
(1, 1, 1, 'Testeo', '2017-07-05 14:11:00'),
(2, 1, 4, '', '2017-07-05 14:16:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subactividades`
--
ALTER TABLE `subactividades`
  ADD PRIMARY KEY (`id`), ADD KEY `actividad_id` (`actividad_id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`), ADD KEY `actividad_id` (`actividad_id`), ADD KEY `subactividad_id` (`subactividad_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `subactividades`
--
ALTER TABLE `subactividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `subactividades`
--
ALTER TABLE `subactividades`
ADD CONSTRAINT `subactividades_ibfk_1` FOREIGN KEY (`actividad_id`) REFERENCES `actividades` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
ADD CONSTRAINT `tareas_ibfk_1` FOREIGN KEY (`actividad_id`) REFERENCES `actividades` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `tareas_ibfk_2` FOREIGN KEY (`subactividad_id`) REFERENCES `subactividades` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
