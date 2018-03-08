-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-07-2017 a las 16:26:59
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
(27, 'Levantamiento Requisicion', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
