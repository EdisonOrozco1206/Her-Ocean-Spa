-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-08-2024 a las 04:37:42
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Configuración de colación y caracteres
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Base de datos: `her_ocean_spa`

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `usuarios`
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL UNIQUE,
  `clave` varchar(100) NOT NULL,
  `f_nacimiento` date NOT NULL,
  `perfil` varchar(100) NOT NULL DEFAULT "1",
  `foto` TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `servicios`
CREATE TABLE IF NOT EXISTS `servicios` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` float NOT NULL,
  `imagen` TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `opiniones`
CREATE TABLE IF NOT EXISTS `opiniones` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `fecha_hora` datetime NOT NULL,
  `comentario` text NOT NULL,
  `calificacion` int(1) DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  CONSTRAINT `opiniones_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `opiniones_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `reservas`
CREATE TABLE IF NOT EXISTS `reservas` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `fecha_hora` datetime NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio_total` float NOT NULL,
  `m_pago` varchar(255) DEFAULT NULL,
  `estado` varchar(255) NOT NULL,
  `sede` varchar(50) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `sedes`
CREATE TABLE IF NOT EXISTS `sedes` (
  `id` int(6) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `departamento` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `horario` varchar(100) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

-- Estructura de tabla para la tabla `suscripciones`
CREATE TABLE IF NOT EXISTS `suscripciones` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcado de datos para la tabla `usuarios`
INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `clave`, `f_nacimiento`, `perfil`, `foto`) VALUES
(1, 'mariana valentina', 'sanchez esquivel', 'mariana05@gmail.com', '12345', '2007-08-05', '1', ''),
(4, 'cloe', 'sanchez', 'cloe01@gmail.com', 'Cloe12345', '2024-01-01', '0', ''),
(7, 'sofia', 'sanchez', 'sofis20@gmail.com', '54321', '2009-02-20', '1', '');

-- Índices para las tablas volcadas

-- Índices de la tabla `opiniones`
ALTER TABLE `opiniones`
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_servicio` (`id_servicio`);

-- Índices de la tabla `sedes`
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT de las tablas volcadas
ALTER TABLE `opiniones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `sedes`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

COMMIT;

-- Restauración de la configuración inicial
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
