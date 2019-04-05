-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-04-2019 a las 21:02:54
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

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
  `cel_alumno` int(80) NOT NULL,
  `correo_alumno` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `carrera_alumno` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `semestre_alumno` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesor`
--

CREATE TABLE `asesor` (
  `id_asesor` int(80) NOT NULL,
  `nombre_asesor` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `celular_asesor` int(80) NOT NULL,
  `correo_asesor` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `carrera_asesor` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `semestre_asesor` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asesor`
--

INSERT INTO `asesor` (`id_asesor`, `nombre_asesor`, `celular_asesor`, `correo_asesor`, `carrera_asesor`, `semestre_asesor`) VALUES
(1, 'Ricardo', 2147483647, 'ricardo@correo.com', 'computacion', 10),
(2, 'Javier N', 2147483647, 'javier@correo.com', ' Ing Petro-quÃ­mica', 2),
(3, 'Mario N', 2147483647, 'mario@correo.com', ' Ing Telecomunicaciones', 1),
(4, 'Karen N', 2147483647, 'karen@correo.com', ' Ing BiomÃ©dica', 5),
(5, 'Omar N', 2147483647, 'omar@correo.com', ' Ing MecÃ¡nica', 8),
(6, 'Elsa', 2147483647, 'elsa@correo.com', ' Ing MecÃ¡nica', 3),
(7, 'Carlos N', 2147483647, 'Carlos@correo.com', ' Ing ElÃ©ctrica', 6),
(8, 'Benjamin N', 2147483647, 'benja@correo.com', ' Ing ElÃ©ctrica', 8),
(10, 'Fernanda N', 2147483647, 'fernanda@correo.com', ' Ing Mecatronica', 9),
(11, 'Mauricio N', 2147483647, 'mauricio@correo.com', ' Ing Industrial', 10),
(12, 'Bryan N', 2147483647, 'bryan@correo.com', ' Ing civil', 10),
(13, 'Diego N', 2147483647, 'diego@correo.com', ' Ing Minas', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` int(80) NOT NULL,
  `fecha_cita` int(80) NOT NULL,
  `hora_cita` time NOT NULL,
  `rating_asesor` int(80) NOT NULL,
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
  `Tema_asig` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `semstre_asig` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id_sesion` int(80) NOT NULL,
  `dia_semana` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `horario_sesion` time NOT NULL,
  `lugar_sesion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
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
  MODIFY `id_alumno` int(80) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asesor`
--
ALTER TABLE `asesor`
  MODIFY `id_asesor` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(80) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `id_asig` int(80) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id_sesion` int(80) NOT NULL AUTO_INCREMENT;

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
