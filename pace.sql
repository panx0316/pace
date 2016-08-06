
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-08-2016 a las 22:50:46
-- Versión del servidor: 10.0.20-MariaDB
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u148330565_pace`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `P_ACTIVIDAD`
--

CREATE TABLE IF NOT EXISTS `P_ACTIVIDAD` (
  `P_ID_ACTIVIDAD` int(11) NOT NULL,
  `P_ID_PROYECTO` int(11) NOT NULL,
  `P_NOMBRE_ACTIVIDAD` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `P_FECHA_INICIO` date NOT NULL,
  `P_FECHA_TERMINO` date NOT NULL,
  `P_VALOR` int(11) NOT NULL,
  `P_PORC_AVANCE` int(11) NOT NULL,
  `P_NIVEL_ACTIVIDAD` int(11) NOT NULL,
  `P_DESCRIPCION` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `P_PROYECTO`
--

CREATE TABLE IF NOT EXISTS `P_PROYECTO` (
  `P_ID_PROYECTO` int(11) NOT NULL,
  `P_NOMBRE_PROYECTO` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `P_ID_USUARIO_RESPONSABLE` int(11) NOT NULL,
  `P_FECHA_INICIO` date NOT NULL,
  `P_FECHA_TERMINO` date NOT NULL,
  `P_VALOR` int(11) NOT NULL,
  `P_PORC_AVANCE` int(11) NOT NULL,
  `P_DESCRIPCION` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `P_USUARIO`
--

CREATE TABLE IF NOT EXISTS `P_USUARIO` (
  `P_ID_USUARIO` int(11) NOT NULL,
  `P_NOMBRE_USUARIO` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `P_PASSWORD` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `P_CORREO_USUARIO` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `P_USUARIO`
--

INSERT INTO `P_USUARIO` (`P_ID_USUARIO`, `P_NOMBRE_USUARIO`, `P_PASSWORD`, `P_CORREO_USUARIO`) VALUES
(1, 'Darling', '123456', 'dxdiaz@ing.ucsc.cl');
(2, 'Francisco', '654321', 'fcordero@ucsc.cl');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
