-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2024 a las 06:20:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `coordinacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendices`
--

CREATE TABLE `aprendices` (
  `id_Aprendiz` int(11) NOT NULL,
  `Ficha` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Renta_Joven` varchar(3) NOT NULL,
  `Beneficios_Bienestar` varchar(200) NOT NULL,
  `Historial` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aprendices`
--

INSERT INTO `aprendices` (`id_Aprendiz`, `Ficha`, `Nombre`, `Apellido`, `Renta_Joven`, `Beneficios_Bienestar`, `Historial`) VALUES
(26, 2687548, 'aa', 'ddddfffff', 'si', 'Alimentación', 'sssa'),
(31, 123123, 'junior', 'arias', 'si', 'Transporte', 'na');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comites`
--

CREATE TABLE `comites` (
  `id_Comite` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Descripcion` varchar(500) NOT NULL,
  `Medidas_Tomadas` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas`
--

CREATE TABLE `fichas` (
  `id_Ficha` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Numero` varchar(7) NOT NULL,
  `Estado` enum('Lectiva','Productiva','Finalizada') DEFAULT NULL,
  `Fecha_Inicio` date NOT NULL,
  `Fecha_Finalizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fichas`
--

INSERT INTO `fichas` (`id_Ficha`, `Nombre`, `Numero`, `Estado`, `Fecha_Inicio`, `Fecha_Finalizacion`) VALUES
(20, 'Analisis Y desarrollo De Software', '2562034', 'Productiva', '2022-07-18', '2024-04-10'),
(21, 'Mecanica', '2413451', 'Lectiva', '2024-05-08', '2024-05-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas_comites`
--

CREATE TABLE `fichas_comites` (
  `id_Ficha` int(11) NOT NULL,
  `id_Comite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_Usuarios` int(11) NOT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `contraseña` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_Usuarios`, `usuario`, `contraseña`) VALUES
(1, 'Darwin', 'Darwin123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aprendices`
--
ALTER TABLE `aprendices`
  ADD PRIMARY KEY (`id_Aprendiz`);

--
-- Indices de la tabla `comites`
--
ALTER TABLE `comites`
  ADD PRIMARY KEY (`id_Comite`);

--
-- Indices de la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD PRIMARY KEY (`id_Ficha`);

--
-- Indices de la tabla `fichas_comites`
--
ALTER TABLE `fichas_comites`
  ADD PRIMARY KEY (`id_Ficha`,`id_Comite`),
  ADD KEY `id_Comite` (`id_Comite`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_Usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aprendices`
--
ALTER TABLE `aprendices`
  MODIFY `id_Aprendiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `comites`
--
ALTER TABLE `comites`
  MODIFY `id_Comite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `fichas`
--
ALTER TABLE `fichas`
  MODIFY `id_Ficha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_Usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fichas_comites`
--
ALTER TABLE `fichas_comites`
  ADD CONSTRAINT `fichas_comites_ibfk_1` FOREIGN KEY (`id_Ficha`) REFERENCES `fichas` (`id_Ficha`),
  ADD CONSTRAINT `fichas_comites_ibfk_2` FOREIGN KEY (`id_Comite`) REFERENCES `comites` (`id_Comite`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
