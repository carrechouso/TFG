-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2016 a las 00:56:59
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int(10) unsigned NOT NULL,
  `nombreAl` varchar(50) DEFAULT NULL,
  `apellidosAl` varchar(50) DEFAULT NULL,
  `passAl` varchar(30) NOT NULL,
  `usuarioAl` varchar(30) NOT NULL,
  `tipoUsuario` enum('admin','profesor','alumno','') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombreAl`, `apellidosAl`, `passAl`, `usuarioAl`, `tipoUsuario`) VALUES
(9, 'a', 'a', 'a2', 'a', 'alumno'),
(11, 'c', 'c', 'c', 'c', 'admin'),
(12, 'n', 'n', 'n', 'n', 'alumno'),
(13, 'u', 'u', 'u', 'u', 'alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE IF NOT EXISTS `asignaturas` (
  `id` int(10) unsigned NOT NULL,
  `nombreA` varchar(50) DEFAULT NULL,
  `creditos` int(10) unsigned DEFAULT NULL,
  `cuatrimestre` enum('1','2') NOT NULL,
  `codigoAsignatura` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id`, `nombreA`, `creditos`, `cuatrimestre`, `codigoAsignatura`) VALUES
(1, 'tsw', 6, '2', 'tsw_code'),
(2, 'dai', 6, '2', 'dai_code'),
(3, 'cda', 6, '2', 'cda_code');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camb_puntuales`
--

CREATE TABLE IF NOT EXISTS `camb_puntuales` (
  `id` int(10) unsigned NOT NULL,
  `tutoria_id` int(10) unsigned DEFAULT NULL,
  `profesor_id` int(10) unsigned DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `diaCambio` date NOT NULL,
  `hora_inicio` int(11) DEFAULT NULL,
  `hora_fin` int(11) DEFAULT NULL,
  `despacho` int(10) DEFAULT NULL,
  `minuto_inicio` int(11) NOT NULL,
  `minuto_fin` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `camb_puntuales`
--

INSERT INTO `camb_puntuales` (`id`, `tutoria_id`, `profesor_id`, `dia`, `diaCambio`, `hora_inicio`, `hora_fin`, `despacho`, `minuto_inicio`, `minuto_fin`) VALUES
(1, 5, 8, '2016-01-26', '2016-01-22', 10, 12, 78, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imparten`
--

CREATE TABLE IF NOT EXISTS `imparten` (
  `id` int(10) unsigned NOT NULL,
  `asignatura_id` int(10) unsigned DEFAULT NULL,
  `profesor_id` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `imparten`
--

INSERT INTO `imparten` (`id`, `asignatura_id`, `profesor_id`) VALUES
(2, 2, 8),
(3, 1, 8),
(6, 3, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE IF NOT EXISTS `profesores` (
  `id` int(10) unsigned NOT NULL,
  `nombreP` varchar(50) DEFAULT NULL,
  `apellidosP` varchar(50) DEFAULT NULL,
  `tipoUsuario` enum('admin','alumno','profesor','') NOT NULL,
  `usuarioP` varchar(50) NOT NULL,
  `passP` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `nombreP`, `apellidosP`, `tipoUsuario`, `usuarioP`, `passP`) VALUES
(7, 'miguel ', 'reboiro jato', 'profesor', 'jato', 'jato'),
(8, 'daniel', 'gonzalez peÃ±a', 'profesor', 'dani', 'dani'),
(9, 'b', 'b', 'profesor', 'b', 'b'),
(10, 'fran', 'fran', 'profesor', 'fran', 'fran');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene_matriculadas`
--

CREATE TABLE IF NOT EXISTS `tiene_matriculadas` (
  `id` int(10) unsigned NOT NULL,
  `asignatura_id` int(10) unsigned DEFAULT NULL,
  `alumno_id` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutorias`
--

CREATE TABLE IF NOT EXISTS `tutorias` (
  `id` int(10) unsigned NOT NULL,
  `asignatura_id` int(10) unsigned DEFAULT NULL,
  `profesor_id` int(10) unsigned DEFAULT NULL,
  `dia` enum('lunes','martes','miercoles','jueves','viernes') DEFAULT NULL,
  `hora_inicio` int(11) DEFAULT NULL,
  `hora_fin` int(11) DEFAULT NULL,
  `despacho` int(10) DEFAULT NULL,
  `minuto_inicio` int(11) NOT NULL,
  `minuto_fin` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tutorias`
--

INSERT INTO `tutorias` (`id`, `asignatura_id`, `profesor_id`, `dia`, `hora_inicio`, `hora_fin`, `despacho`, `minuto_inicio`, `minuto_fin`) VALUES
(5, 2, 8, 'viernes', 13, 15, 31, 0, 0),
(7, 3, 8, 'lunes', 23, 10, 56, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `camb_puntuales`
--
ALTER TABLE `camb_puntuales`
  ADD PRIMARY KEY (`id`), ADD KEY `tutoria_id` (`tutoria_id`), ADD KEY `profesor_id` (`profesor_id`);

--
-- Indices de la tabla `imparten`
--
ALTER TABLE `imparten`
  ADD PRIMARY KEY (`id`), ADD KEY `asignatura_id` (`asignatura_id`), ADD KEY `profesor_id` (`profesor_id`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiene_matriculadas`
--
ALTER TABLE `tiene_matriculadas`
  ADD PRIMARY KEY (`id`), ADD KEY `asignatura_id` (`asignatura_id`), ADD KEY `alumno_id` (`alumno_id`);

--
-- Indices de la tabla `tutorias`
--
ALTER TABLE `tutorias`
  ADD PRIMARY KEY (`id`), ADD KEY `asignatura_id` (`asignatura_id`), ADD KEY `profesor_id` (`profesor_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `camb_puntuales`
--
ALTER TABLE `camb_puntuales`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `imparten`
--
ALTER TABLE `imparten`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tiene_matriculadas`
--
ALTER TABLE `tiene_matriculadas`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tutorias`
--
ALTER TABLE `tutorias`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `camb_puntuales`
--
ALTER TABLE `camb_puntuales`
ADD CONSTRAINT `camb_puntuales_ibfk_1` FOREIGN KEY (`tutoria_id`) REFERENCES `tutorias` (`id`),
ADD CONSTRAINT `camb_puntuales_ibfk_2` FOREIGN KEY (`profesor_id`) REFERENCES `profesores` (`id`);

--
-- Filtros para la tabla `imparten`
--
ALTER TABLE `imparten`
ADD CONSTRAINT `imparten_ibfk_1` FOREIGN KEY (`asignatura_id`) REFERENCES `asignaturas` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `imparten_ibfk_2` FOREIGN KEY (`profesor_id`) REFERENCES `profesores` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tiene_matriculadas`
--
ALTER TABLE `tiene_matriculadas`
ADD CONSTRAINT `tiene_matriculadas_ibfk_1` FOREIGN KEY (`asignatura_id`) REFERENCES `asignaturas` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tiene_matriculadas_ibfk_2` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tutorias`
--
ALTER TABLE `tutorias`
ADD CONSTRAINT `tutorias_ibfk_1` FOREIGN KEY (`asignatura_id`) REFERENCES `asignaturas` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `tutorias_ibfk_2` FOREIGN KEY (`profesor_id`) REFERENCES `profesores` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
