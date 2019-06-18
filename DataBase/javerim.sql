-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2019 a las 22:00:25
-- Versión del servidor: 5.7.17
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `javerim`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumno` int(80) NOT NULL,
  `nombre_alumno` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `cel_alumno` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `correo_alumno` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `carrera_alumno` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `semestre_alumno` int(80) NOT NULL,
  `contrasena_alumno` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor`
--

CREATE TABLE `asesor` (
  `id_asesor` int(80) NOT NULL,
  `nombre_asesor` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `celular_asesor` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `correo_asesor` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `carrera_asesor` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `semestre_asesor` int(80) NOT NULL,
  `contrasena_asesor` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` int(80) NOT NULL,
  `fecha_cita` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `hora_cita` time NOT NULL,
  `nombre_materia` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `lugar_cita` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_alumno` int(80) NOT NULL,
  `id_asesor` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `id_asig` int(80) NOT NULL,
  `nombre_asig` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `semstre_asig` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`id_asig`, `nombre_asig`, `semstre_asig`) VALUES
(12, 'Álgebra', 1),
(13, 'Álgebra Lineal', 2),
(16, 'Cálculo Diferencial', 1),
(17, 'Cálculo Integral', 2),
(18, 'Cálculo Vectorial', 3),
(19, 'Ecuaciones Diferenciales', 3),
(20, 'Geometría Analítica', 1),
(21, 'Fundamentos de Programación', 1),
(22, 'Programación en Python', 1),
(23, 'Programación en C', 1),
(24, 'Programación en Java', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id_sesion` int(80) NOT NULL,
  `dia_semana` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `horario_sesion` time NOT NULL,
  `lugar_sesion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` int(4) NOT NULL,
  `id_asesor` int(80) NOT NULL,
  `id_clase` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `asesor`
--
ALTER TABLE `asesor`
  ADD PRIMARY KEY (`id_asesor`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `alumno` (`id_alumno`),
  ADD KEY `id_asesor` (`id_asesor`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`id_asig`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id_sesion`),
  ADD KEY `id_asesor` (`id_asesor`),
  ADD KEY `id_clase` (`id_clase`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `asesor`
--
ALTER TABLE `asesor`
  MODIFY `id_asesor` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `id_asig` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id_sesion` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`id_asesor`) REFERENCES `asesor` (`id_asesor`);

--
-- Filtros para la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesiones_ibfk_1` FOREIGN KEY (`id_asesor`) REFERENCES `asesor` (`id_asesor`),
  ADD CONSTRAINT `sesiones_ibfk_2` FOREIGN KEY (`id_clase`) REFERENCES `clase` (`id_asig`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
