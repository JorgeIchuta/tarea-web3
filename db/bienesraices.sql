-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2024 a las 03:19:56
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bienesraices`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades`
--

CREATE TABLE `propiedades` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` longtext NOT NULL,
  `habitaciones` int(11) NOT NULL,
  `wc` int(11) NOT NULL,
  `estacionamiento` int(11) NOT NULL,
  `creado` date NOT NULL,
  `vendedores` int(11) NOT NULL,
  `idevendedores` int(11) NOT NULL,
  `estado` varchar(40) NOT NULL,
  `imagen` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `propiedades`
--

INSERT INTO `propiedades` (`id`, `titulo`, `precio`, `descripcion`, `habitaciones`, `wc`, `estacionamiento`, `creado`, `vendedores`, `idevendedores`, `estado`, `imagen`) VALUES
(1, 'elgante', 343000.00, 'casa espectacular con buenas vistas y a buen precio', 4, 5, 2, '2024-04-02', 1, 3, 'activo', 'ima1.jpg'),
(2, 'linda casa', 3400.00, 'casa espectacular con buenas vistas y a buen precio', 2, 3, 1, '2024-04-12', 2, 2, 'activo', 'images.jpg'),
(3, 'casa grande', 3456700.00, 'casa espectacular con buenas vistas ya buen precio', 3, 4, 1, '2024-04-09', 4, 11, 'activo', 'ima1.jpg'),
(4, 'lica casa', 100000.00, 'sadasdsadsadsad', 2, 3, 1, '2024-04-22', 0, 11, 'Inactivo', 'a4525c921f5032e78bcc56948d926dc8.jpg'),
(5, 'nuva casa', 1210.00, 'casa eeeeeeel .............!', 2, 2, 1, '2024-04-22', 0, 5, 'Inactivo', 'png-transparent-rubik-s-cube-cube.png'),
(6, 'casa', 33333.00, 'asdasdasddasad..........!', 1, 1, 2, '2024-04-22', 0, 5, 'Inactivo', 'png-transparent-rubik-s-cube-cube.png'),
(7, 'linda casa', 23468.00, 'accasasqqweqwqqe..................!!!!!!!!!!!', 2, 1, 1, '2024-04-22', 0, 4, 'Inactivo', 'a4525c921f5032e78bcc56948d926dc8.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` char(65) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `estado`) VALUES
(2, 'nombre@usuario', '$2y$10$3qZRNJTnVOIQWdGRCSt7c.u1bgVPvtSGnnwb5wt8rSqsxl3tToBTa', 'inactivo'),
(14, 'nuevo@1', '$2y$10$fX0TPOm73rq/bVvnS4b/QutWuk1qBOaCyfgqfWLm2GMbHeOLngzYi', 'Activo'),
(15, 'usuario@nuevo', '9876', 'Activo'),
(16, 'andy@gmail.com', '$2y$10$gwMkIfvOVt.qtnpxN0wpl.D5nBZatHvCYdKiZSDnlhAvKMWnJL3ba', 'Activo'),
(17, 'jhoaly@gmail.com', '$2y$10$APhUxiGo/7onI6Zn7QZXXOKxameEeem0qWrnZFsP/bovf6S1CLZtG', 'Activo'),
(18, 'jorge@jorge', '$2y$10$YEnjfyZ9uI7iiEwtqKhPXua39shMmmLsAfX8X/8Glh1gy7nsJzKoK', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE `vendedor` (
  `idvendedores` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `paterno` varchar(45) NOT NULL,
  `materno` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`idvendedores`, `nombre`, `paterno`, `materno`, `telefono`) VALUES
(2, 'alan', 'brito', 'peres', '12345456'),
(3, 'esteban', 'quito', 'paz', '38954345789'),
(4, 'juancito', 'pinto', 'aviar', '98744567'),
(5, 'JUANCITO', 'PINTO', 'MAMANI', '12345678'),
(8, 'alex', 'pummm', 'adsas', '345654'),
(10, 'asdasd', 'e2we', 'dasda', '1234567'),
(11, 'THOR', 'hijo', 'odin', '123522');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idevendedores` (`idevendedores`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`idvendedores`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `idvendedores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `propiedades`
--
ALTER TABLE `propiedades`
  ADD CONSTRAINT `propiedades_ibfk_1` FOREIGN KEY (`idevendedores`) REFERENCES `vendedor` (`idvendedores`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
