-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2019 a las 00:03:42
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
  `cel_alumno` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `correo_alumno` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `carrera_alumno` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `semestre_alumno` int(80) NOT NULL,
  `contrasena_alumno` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `nombre_alumno`, `cel_alumno`, `correo_alumno`, `carrera_alumno`, `semestre_alumno`, `contrasena_alumno`) VALUES
(1, 'Ricardo N', '5576778990', 'ricardo@email.com', 'Ingeniaría en Computación', 8, 'yomeroR'),
(2, 'Hannia N', '5576758990', 'hannia@email.com', 'Ingeniaría en Computación', 6, 'yomeroH'),
(3, 'Benjamín N', '5576758910', 'benja@email.com', 'Ingeniaría Eléctrica Electrónica', 8, 'yomeroB');

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

--
-- Volcado de datos para la tabla `asesor`
--

INSERT INTO `asesor` (`id_asesor`, `nombre_asesor`, `celular_asesor`, `correo_asesor`, `carrera_asesor`, `semestre_asesor`, `contrasena_asesor`) VALUES
(1, 'Karla N', '5564792109', 'karla@correo.com', 'Ingeniería en Computación', 9, 'asesor1'),
(2, 'Rolando N', '5564279210', 'Rolando@correo.com', 'Ingeniería Industrial', 7, 'asesor2'),
(3, 'Mauricio N', '5561279210', 'mauricio@correo.com', 'Ingeniería en Computación', 9, 'asesor3'),
(4, 'Karen N', '5561275210', 'karen@correo.com', 'Ingeniería en Sistemas Bio-médicos', 4, 'asesor4'),
(5, 'Jaqueline N', '5561275211', 'yaqui@correo.com', 'Ingeniería en Sistemas Bio-médicos', 5, 'asesor5'),
(6, 'Perla N', '5561273211', 'perla@correo.com', 'Ingeniería en Minas y Metalurgia', 3, 'asesor6'),
(7, 'Nayeli N', '5563273214', 'nayeli@correo.com', 'Ingeniería Mecatrónica', 7, 'asesor7'),
(8, 'Bryan N', '5523273214', 'bryan@correo.com', 'Ingeniería Civil', 8, 'asesor8'),
(9, 'Reina N', '5523273239', 'reina@correo.com', 'Ingeniería Petrolera', 10, 'asesor9'),
(10, 'Mario N', '5523273239', 'reina@correo.com', 'Ingeniería Industrial', 6, 'asesor10');

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

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id_cita`, `fecha_cita`, `hora_cita`, `nombre_materia`, `lugar_cita`, `id_alumno`, `id_asesor`) VALUES
(9, '31-05-2019', '08:30:00', 'Cinematica y Dinamica', 'Biblioteca Antonio Dovali Jaime', 2, 8),
(10, '31-05-2019', '18:00:00', 'Geometria Analitica', 'Cafe 76', 2, 10);

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

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`id_asig`, `nombre_asig`, `Tema_asig`, `semstre_asig`) VALUES
(2, 'Algebra', 'Matrices', 1),
(3, 'Algebra', 'Conjuntos', 1),
(4, 'Calculo Diferencial', 'Limites', 1),
(5, 'Calculo Diferencial', 'Derivadas', 1),
(6, 'Calculo Integral', 'Métodos de integración', 2),
(7, 'Calculo Integral', 'Función exponencial', 2),
(8, 'Cinematica y Dinamica', 'Cinemática de la partícula', 3),
(9, 'Ecuaciones Diferenciales', 'Ecuaciones diferenciales lineales', 3),
(10, 'Ecuaciones Diferenciales', 'Transformada de Laplace', 3),
(11, 'Geometria Analitica', 'Curvas en el plano polar', 1);

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
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`id_sesion`, `dia_semana`, `horario_sesion`, `lugar_sesion`, `Estado`, `id_asesor`, `id_clase`) VALUES
(1, 'Viernes', '18:00:00', 'Cafe 76', 1, 10, 11),
(2, 'Lunes', '11:00:00', 'Banquitas del J', 0, 1, 5),
(3, 'Martes', '12:45:00', 'La Leonardita (Pokebola Anexo)', 0, 4, 2),
(4, 'Jueves', '16:30:00', 'Bancas del Principal', 0, 10, 3),
(5, 'Miercoles', '12:45:00', 'Biblioteca Enrique Rivero Borrell', 0, 9, 9),
(6, 'Martes', '13:15:00', 'Banquitas bajo el I', 0, 3, 6),
(7, 'Viernes', '08:30:00', 'Biblioteca Antonio Dovali Jaime', 1, 8, 8),
(8, 'Miercoles', '12:00:00', 'jardin del Postgrado', 0, 7, 2);

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
  MODIFY `id_alumno` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `asesor`
--
ALTER TABLE `asesor`
  MODIFY `id_asesor` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `id_asig` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id_sesion` int(80) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
