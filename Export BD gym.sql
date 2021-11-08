-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2021 a las 19:37:10
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `templates`
--

CREATE TABLE `templates` (
  `id_template` int(10) NOT NULL,
  `html` text NOT NULL,
  `componente` text NOT NULL,
  `vigente` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `templates`
--

INSERT INTO `templates` (`id_template`, `html`, `componente`, `vigente`) VALUES
(1, 'BUENAS BUEASDSADSASLAPDLSADPSALDPSALDPSALDPASLDAPSDLSAPDLSAPDLASPDLASPDLASPDLASPDLASPDLASPDALSDPASLDPSALDPASLDASPDLASPDLSAPDLASDPLASPDLSAPDLASDPLASDPLA PDL SAPDLASPDLASPDLASPD LAPD LASPD LASDP LASPD ALPDLASPD LASPDL ASPDLAPDLASPDLASP DLASP LDAPSD LAPSDL PSA', 'Inicio', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id_turno` int(10) NOT NULL,
  `hora_inicio` varchar(5) NOT NULL,
  `hora_fin` varchar(5) NOT NULL,
  `disponibilidad` int(10) NOT NULL,
  `dia` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id_turno`, `hora_inicio`, `hora_fin`, `disponibilidad`, `dia`) VALUES
(1, '13:00', '14:00', 80, '2021-10-12'),
(2, '14:00', '15:00', 95, '2021-10-12'),
(3, '15:00', '16:00', 95, '2021-10-12'),
(4, '9:00', '10:00', 100, '2021-10-12'),
(5, '11:00', '12:00', 99, '2021-10-12'),
(6, '12:00', '13:00', 100, '2021-10-12'),
(7, '13:00', '14:00', 98, '2021-10-12'),
(8, '14:00', '15:00', 97, '2021-10-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_USUARIO` int(10) NOT NULL,
  `CORREO` varchar(25) NOT NULL,
  `NOMBRE` varchar(25) NOT NULL,
  `APELLIDO` varchar(25) NOT NULL,
  `FECHA_NAC` varchar(50) NOT NULL,
  `NUMERO_DOC` varchar(8) NOT NULL,
  `CALLE` varchar(50) NOT NULL,
  `NUMERO` int(5) NOT NULL,
  `PROVINCIA` varchar(50) NOT NULL,
  `LOCALIDAD` varchar(50) NOT NULL,
  `PASSWORD` varchar(10) NOT NULL,
  `FECHA_ALTA` varchar(50) NOT NULL,
  `ROL` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_USUARIO`, `CORREO`, `NOMBRE`, `APELLIDO`, `FECHA_NAC`, `NUMERO_DOC`, `CALLE`, `NUMERO`, `PROVINCIA`, `LOCALIDAD`, `PASSWORD`, `FECHA_ALTA`, `ROL`) VALUES
(4, 'admin@admin.com', '', '', '0000-00-00', '', '', 0, '', '', '1234', '0000-00-00', 'Usuario'),
(8, 'admin2@admin.com', '', '', '0000-00-00', '', '', 0, '', '', '1234', '0000-00-00', 'Administrador'),
(9, 'mail@mail.com', 'sfsdfsd', 'sdfsdf', '0000-00-00', '22222', 'sdfsdf', 424, 'dsadasd', 'adasda', '1234', '0000-00-00', 'Usuario'),
(10, 'mail@hot.com', '1', '1', '1990-07-26', '111111', '11111', 11111, 'fsfsfsdfds', 'sfsdfsdfsd', '1234', '0000-00-00', 'Usuario'),
(13, 'mail2222@mail.com', 'hola', 'hola', '0000-00-00', '1323233', 'dsadasd', 2423, 'Ciudad', 'cASEROS', 'HASSDFADSA', '0000-00-00', 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_turnos`
--

CREATE TABLE `usuarios_turnos` (
  `fk_usuario` int(10) NOT NULL,
  `fk_turno` int(10) NOT NULL,
  `fecha_emision` varchar(50) DEFAULT NULL,
  `fecha_cancelacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios_turnos`
--

INSERT INTO `usuarios_turnos` (`fk_usuario`, `fk_turno`, `fecha_emision`, `fecha_cancelacion`) VALUES
(8, 4, '2021-10-28', '2021-10-28'),
(8, 8, '2028-10-21', '31-10-21'),
(8, 7, '0000-00-00', NULL),
(8, 6, '2028-10-21', NULL),
(8, 8, '31-10-21', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id_template`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id_turno`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD UNIQUE KEY `CORREO` (`CORREO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `templates`
--
ALTER TABLE `templates`
  MODIFY `id_template` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id_turno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_USUARIO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
