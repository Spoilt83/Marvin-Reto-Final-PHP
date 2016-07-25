-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-07-2016 a las 22:38:58
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_prueba_final_imaginate`
--
CREATE DATABASE IF NOT EXISTS `bd_prueba_final_imaginate` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bd_prueba_final_imaginate`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_palabras`
--

DROP TABLE IF EXISTS `tabla_palabras`;
CREATE TABLE IF NOT EXISTS `tabla_palabras` (
  `id_palabra` int(11) NOT NULL,
  `palabra` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tabla_palabras`
--

INSERT INTO `tabla_palabras` (`id_palabra`, `palabra`) VALUES
(1, 'malayo'),
(2, 'vergacion'),
(3, 'muchacha'),
(4, 'chamo'),
(5, 'coroto'),
(6, 'sancocho');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_palabras_transformadas`
--

DROP TABLE IF EXISTS `tabla_palabras_transformadas`;
CREATE TABLE IF NOT EXISTS `tabla_palabras_transformadas` (
  `id_palabra_transformada` int(11) NOT NULL,
  `palabra_origen` int(11) NOT NULL,
  `palabra_transformada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tabla_palabras`
--
ALTER TABLE `tabla_palabras`
  ADD PRIMARY KEY (`id_palabra`);

--
-- Indices de la tabla `tabla_palabras_transformadas`
--
ALTER TABLE `tabla_palabras_transformadas`
  ADD PRIMARY KEY (`id_palabra_transformada`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tabla_palabras`
--
ALTER TABLE `tabla_palabras`
  MODIFY `id_palabra` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tabla_palabras_transformadas`
--
ALTER TABLE `tabla_palabras_transformadas`
  MODIFY `id_palabra_transformada` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
