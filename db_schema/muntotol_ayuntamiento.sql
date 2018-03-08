-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-07-2017 a las 16:28:43
-- Versión del servidor: 5.5.55-cll
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `muntotol_ayuntamiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombre`) VALUES
(4, 'Presidencia'),
(5, 'Asistente Presidente'),
(6, 'Sindico'),
(7, 'Secretaria del Ayuntamiento'),
(8, 'Tesoreria'),
(9, 'Contraloria'),
(10, 'Seguridad Publica'),
(11, 'Ecologia'),
(12, 'DIF'),
(13, 'Recursos Humanos'),
(14, 'Juez Municipal'),
(15, 'Obras Publicas'),
(16, 'Juridico'),
(17, 'Instituto de la Mujer'),
(18, 'Proteccion Civil'),
(19, 'Servicios Publicos'),
(20, 'Educacion y Cultura'),
(21, 'Turismo y Desarrollo Economico'),
(22, 'Registro Civil'),
(23, 'Ministerrio Publico'),
(24, 'Planeacion'),
(25, 'Agua Potable'),
(26, 'Controles Internos'),
(27, 'Sistemas'),
(28, 'Alumbrado Publico'),
(29, 'Predial'),
(30, 'Comunicacion'),
(31, 'Transparencia'),
(32, 'Recursos Materiales'),
(33, 'Oficialia de partes'),
(34, 'Cronista'),
(35, 'Instituto de la Juventud'),
(36, 'Controles 1 (Asesor 1)'),
(37, 'Controles 2 (Asesor 2)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subactividades`
--

CREATE TABLE `subactividades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `actividad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subactividades`
--

INSERT INTO `subactividades` (`id`, `nombre`, `actividad_id`) VALUES
(1, 'Formateo', 1),
(3, 'Eliminacion Virus USB', 1),
(4, 'Eliminacion Virus Equipo', 1),
(5, 'Instalacion Programa', 1),
(6, 'Sistema', 7),
(7, 'Diagnostico', 4),
(8, 'Reparacion Equipo', 1),
(9, 'Documentacion', 4),
(10, 'Instalacion Impresora', 5),
(11, 'Instalacion Cartucho/Toner', 5),
(12, 'Instalacion Cableado', 2),
(13, 'Alta en Red', 2),
(14, 'Baja de Red', 2),
(15, 'Administracion Red', 2),
(16, 'Reporte Asistencia', 3),
(17, 'Alta de Usuario', 3),
(18, 'Baja de Usuario', 3),
(19, 'Insercion Dias Laborales', 3),
(20, 'Limpieza Equipo', 1),
(21, 'Respaldo de Informacion', 1),
(22, 'Administracion Pagina Web', 6),
(23, 'Administracion Correos', 6),
(24, 'Reportes', 4),
(25, 'Linea Telefonica', 2),
(26, 'Mantenimiento Modem', 2),
(27, 'Levantamiento Requisicion', 4),
(28, 'Capacitacion', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(11) NOT NULL,
  `actividad_id` int(11) NOT NULL,
  `subactividad_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `nota` varchar(200) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `actividad_id`, `subactividad_id`, `area_id`, `nota`, `fecha`) VALUES
(5, 4, 7, 36, 'General', '2017-07-06 13:13:00'),
(6, 7, 6, 29, '', '2017-07-06 13:14:00'),
(7, 1, 20, 10, 'CÃ¡maras de Seguridad', '2017-07-06 13:15:00'),
(8, 1, 8, 14, '', '2017-07-06 13:17:00'),
(9, 4, 9, 10, 'CotizaciÃ³n cÃ¡mara de seguridad y cable DVR', '2017-07-06 13:25:00'),
(10, 4, 9, 27, 'Directorio Ã¡reas del Ayuntamiento', '2017-07-06 13:26:00'),
(11, 7, 6, 29, '', '2017-07-03 09:17:00'),
(12, 7, 6, 29, '', '2017-07-04 09:17:00'),
(13, 7, 6, 29, '', '2017-07-05 09:18:00'),
(14, 7, 6, 29, '', '2017-07-07 09:18:00'),
(15, 1, 3, 15, '', '2017-07-03 09:18:00'),
(16, 1, 3, 15, '', '2017-07-03 09:18:00'),
(17, 1, 3, 15, '', '2017-07-03 09:19:00'),
(18, 1, 3, 15, '', '2017-07-04 09:19:00'),
(19, 1, 3, 15, '', '2017-07-04 09:19:00'),
(20, 1, 3, 15, '', '2017-07-05 09:19:00'),
(21, 1, 3, 15, '', '2017-07-05 09:19:00'),
(22, 1, 3, 15, '', '2017-07-05 09:19:00'),
(23, 1, 3, 15, '', '2017-07-05 09:20:00'),
(24, 1, 3, 15, '', '2017-07-05 09:20:00'),
(25, 4, 24, 7, 'Entrega de requisiciÃ³n', '2017-07-07 09:23:00'),
(26, 4, 24, 8, 'Entrega de requisiciÃ³n', '2017-07-07 09:23:00'),
(27, 4, 24, 10, '', '2017-07-07 09:23:00'),
(28, 4, 24, 11, 'Entrega de requisiciÃ³n', '2017-07-07 09:23:00'),
(29, 4, 24, 15, 'Entrega de requisiciÃ³n', '2017-07-07 09:24:00'),
(30, 4, 24, 23, 'Entrega de requisiciÃ³n', '2017-07-07 09:24:00'),
(31, 4, 24, 26, 'Entrega de requisiciÃ³n', '2017-07-07 09:24:00'),
(32, 4, 24, 28, 'Entrega de requisiciÃ³n', '2017-07-07 09:25:00'),
(33, 5, 10, 7, '', '2017-07-06 09:25:00'),
(34, 4, 24, 7, 'Quemda CDs', '2017-07-06 09:26:00'),
(35, 1, 21, 7, '', '2017-07-07 09:26:00'),
(36, 1, 21, 7, '', '2017-07-07 09:26:00'),
(37, 2, 12, 27, 'InstalaciÃ³n de nuevo mÃ³dem', '2017-07-07 09:27:00'),
(38, 4, 7, 36, '', '2017-07-05 09:30:00'),
(39, 4, 28, 30, '', '2017-07-04 09:55:00'),
(40, 4, 28, 30, '', '2017-07-06 09:55:00'),
(41, 4, 28, 30, '', '2017-07-07 09:56:00'),
(42, 2, 13, 10, '', '2017-07-04 09:56:00'),
(43, 2, 14, 10, '', '2017-07-04 09:56:00'),
(44, 3, 19, 12, '', '2017-07-06 09:56:00'),
(45, 5, 10, 12, '', '2017-07-06 09:57:00'),
(46, 5, 10, 12, '', '2017-07-06 09:57:00'),
(47, 1, 8, 8, '', '2017-07-03 09:57:00'),
(48, 1, 8, 15, '', '2017-07-04 09:57:00'),
(49, 1, 3, 16, '', '2017-07-05 09:59:00'),
(50, 1, 3, 16, '', '2017-07-10 09:59:00'),
(51, 1, 3, 16, '', '2017-07-07 09:59:00'),
(52, 4, 28, 8, 'Uso de correo institucional', '2017-07-03 10:01:00'),
(53, 4, 28, 32, 'Uso de correo institucional', '2017-07-03 10:01:00'),
(54, 4, 28, 26, 'Uso de correo institucional', '2017-07-04 10:03:00'),
(55, 7, 6, 27, '', '2017-07-03 10:03:00'),
(56, 7, 6, 27, '', '2017-07-04 10:04:00'),
(57, 7, 6, 27, '', '2017-07-05 10:04:00'),
(58, 1, 3, 14, '', '2017-07-07 10:05:00'),
(59, 1, 3, 14, '', '2017-07-07 10:05:00'),
(60, 1, 3, 14, '', '2017-07-05 10:05:00'),
(61, 1, 8, 11, '', '2017-07-05 10:06:00'),
(62, 5, 10, 29, '', '2017-07-03 10:06:00'),
(63, 5, 10, 29, '', '2017-07-05 10:06:00'),
(64, 4, 24, 31, 'Entrega de reqisiciÃ³n\r\n', '2017-07-10 12:33:00'),
(65, 4, 24, 26, 'Entrega de requisiciÃ³n', '2017-07-10 14:50:00'),
(66, 5, 11, 12, 'Recarga de cartucho', '2017-07-10 14:50:00'),
(67, 1, 8, 15, '', '2017-07-10 14:51:00'),
(68, 1, 20, 30, 'Cabio de equipo', '2017-07-10 14:51:00'),
(69, 4, 28, 19, 'Entrega de correo', '2017-07-10 14:53:00'),
(70, 7, 6, 29, '', '2017-07-10 14:53:00'),
(71, 4, 9, 33, 'Reporte semanal', '2017-07-10 14:55:00'),
(72, 4, 28, 31, 'Uso de correo', '2017-07-10 15:00:00'),
(73, 4, 28, 16, 'CapacitaciÃ³n uso de correo', '2017-07-10 15:00:00'),
(74, 5, 10, 15, '', '2017-07-10 15:37:00'),
(75, 4, 28, 31, 'Curso iaip capacitaciÃ³n ', '2017-07-11 09:58:00'),
(76, 2, 14, 10, '', '2017-07-11 15:29:00'),
(77, 2, 14, 10, '', '2017-07-11 15:30:00'),
(78, 2, 14, 11, '', '2017-07-11 15:30:00'),
(79, 2, 14, 16, '', '2017-07-11 15:31:00'),
(80, 2, 14, 19, '', '2017-07-11 15:31:00'),
(81, 2, 14, 25, '', '2017-07-11 15:32:00'),
(82, 2, 14, 30, '', '2017-07-11 15:32:00'),
(83, 2, 13, 10, '', '2017-07-11 15:32:00'),
(84, 2, 13, 10, '', '2017-07-11 15:32:00'),
(85, 2, 13, 25, '', '2017-07-11 15:33:00'),
(86, 2, 13, 16, '', '2017-07-11 15:33:00'),
(87, 2, 13, 15, '', '2017-07-12 13:53:00'),
(88, 2, 13, 15, '', '2017-07-12 13:53:00'),
(89, 2, 13, 15, '', '2017-07-12 13:53:00'),
(90, 2, 13, 23, '', '2017-07-12 13:54:00'),
(91, 1, 3, 15, '', '2017-07-12 13:54:00'),
(92, 1, 3, 15, '', '2017-07-12 13:55:00'),
(93, 1, 3, 10, '', '2017-07-12 13:55:00'),
(94, 1, 3, 10, '', '2017-07-12 13:55:00'),
(95, 1, 3, 10, '', '2017-07-12 13:55:00'),
(96, 1, 3, 10, '', '2017-07-12 13:55:00'),
(97, 1, 4, 10, '', '2017-07-12 13:56:00'),
(98, 1, 4, 10, '', '2017-07-12 13:56:00'),
(99, 1, 4, 23, '', '2017-07-12 13:56:00'),
(100, 4, 9, 36, '', '2017-07-12 15:55:00'),
(101, 1, 21, 15, 'Ayuda suma de valores en Excel', '2017-07-12 15:55:00'),
(102, 4, 7, 36, 'Diagnostico de Ã¡reas generales', '2017-07-12 16:59:00'),
(103, 1, 8, 10, 'Checar cÃ¡mara unidad central', '2017-07-13 22:44:00'),
(104, 1, 8, 10, 'Checar cÃ¡mara unidad central', '2017-07-13 22:44:00'),
(105, 1, 8, 10, 'Checar cÃ¡mara unidad central', '2017-07-13 22:44:00'),
(106, 1, 8, 10, 'Checar cÃ¡mara unidad central', '2017-07-13 22:45:00'),
(107, 1, 8, 10, 'Checar cÃ¡mara unidad central', '2017-07-13 22:46:00'),
(108, 1, 8, 10, 'Checar cÃ¡mara unidad central', '2017-07-13 22:46:00'),
(109, 4, 27, 8, '', '2017-07-13 22:47:00'),
(110, 1, 3, 7, '', '2017-07-13 22:47:00'),
(111, 1, 3, 23, '', '2017-07-14 08:28:00'),
(112, 1, 8, 30, '', '2017-07-14 08:29:00'),
(113, 1, 3, 26, '', '2017-07-14 08:52:00'),
(114, 1, 3, 26, '', '2017-07-14 08:53:00'),
(115, 1, 3, 15, '', '2017-07-14 09:40:00'),
(116, 1, 3, 15, '', '2017-07-14 09:40:00'),
(117, 1, 3, 15, '', '2017-07-19 15:29:00'),
(118, 2, 14, 14, '', '2017-07-19 15:29:00'),
(119, 2, 13, 14, '', '2017-07-19 15:29:00'),
(120, 4, 28, 26, 'Uso de correo', '2017-07-19 15:30:00'),
(121, 4, 28, 26, 'RotaciÃ³n de documento PDF', '2017-07-19 15:30:00'),
(122, 4, 7, 36, '', '2017-07-19 15:49:00'),
(123, 1, 3, 15, '', '2017-07-18 15:50:00'),
(124, 1, 3, 15, '', '2017-07-18 15:50:00'),
(125, 1, 8, 19, '', '2017-07-18 15:51:00'),
(126, 1, 8, 19, '', '2017-07-18 15:51:00'),
(127, 5, 11, 10, 'Tinta negra', '2017-07-18 15:52:00'),
(128, 5, 11, 10, 'Tinta Azul\r\n', '2017-07-18 15:52:00'),
(129, 5, 11, 10, 'Tinta Amarilla', '2017-07-18 15:53:00'),
(130, 5, 11, 10, 'Tinta Magenta', '2017-07-18 15:54:00'),
(131, 5, 11, 15, 'Tinta Negra', '2017-07-18 15:54:00'),
(132, 5, 11, 15, 'Tinta Azul', '2017-07-18 15:56:00'),
(133, 5, 11, 15, 'Tinta Amarilla', '2017-07-18 15:56:00'),
(134, 4, 7, 36, '', '2017-07-17 16:00:00'),
(135, 7, 6, 29, '', '2017-07-17 16:00:00'),
(136, 5, 10, 29, '', '2017-07-17 16:00:00'),
(137, 1, 8, 8, '', '2017-07-17 16:01:00'),
(138, 1, 20, 33, '', '2017-07-18 16:01:00'),
(139, 1, 20, 33, '', '2017-07-19 16:02:00'),
(140, 2, 13, 30, '', '2017-07-17 16:03:00'),
(141, 2, 13, 30, '', '2017-07-17 16:03:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subactividades`
--
ALTER TABLE `subactividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actividad_id` (`actividad_id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actividad_id` (`actividad_id`),
  ADD KEY `subactividad_id` (`subactividad_id`),
  ADD KEY `area_id` (`area_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `subactividades`
--
ALTER TABLE `subactividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
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
  ADD CONSTRAINT `tareas_ibfk_2` FOREIGN KEY (`subactividad_id`) REFERENCES `subactividades` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tareas_ibfk_3` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
