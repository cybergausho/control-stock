-- phpMyAdmin SQL Dump
-- version 4.6.6deb4+deb9u2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-03-2021 a las 01:58:47
-- Versión del servidor: 10.1.48-MariaDB-0+deb9u1
-- Versión de PHP: 7.2.34-9+0~20210112.53+debian9~1.gbpfdd1e6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `stock`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `idLog` int(11) DEFAULT NULL,
  `usuario` int(30) NOT NULL,
  `stock` int(11) NOT NULL,
  `detalle` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `idStock` int(10) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cantidad` int(10) NOT NULL,
  `estado` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ubicacion` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`idStock`, `nombre`, `descripcion`, `cantidad`, `estado`, `ubicacion`) VALUES
(2, 'teclado usb', 'color negro marca noga', 1, 'usado1', 'aced'),
(4, 'mouse usb', 'marca pancho', 160, 'usado', 'aced server');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `dni` int(10) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `passwd` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `permiso` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `nombre`, `passwd`, `correo`, `permiso`) VALUES
(40179550, 'lautaro', '7908281b119b087a0c719cd42d7d75a9f301304f4db96b03756001317dbd942f', 'lautaro@gmail.com', 1),
(40179551, 'lautaro', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'lauttmz@gmail.com', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD KEY `log_user` (`usuario`),
  ADD KEY `log_stock` (`stock`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idStock`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `idStock` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_stock` FOREIGN KEY (`stock`) REFERENCES `stock` (`idStock`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `log_user` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
