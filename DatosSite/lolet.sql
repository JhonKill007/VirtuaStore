-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2022 a las 03:29:35
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lolet`
--
CREATE DATABASE IF NOT EXISTS `lolet` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `lolet`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `foto` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `articulo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `foto`, `articulo`, `categoria`, `precio`, `descripcion`) VALUES
(26, 'img/descarga.jpg', 'Labial Kylie', 'labios', 1500, 'Labial Kylie'),
(27, 'img/labial.jpg', 'Labial LBel', 'labios', 489, 'rojo'),
(28, 'img/labial2.jpg', 'Labial Rosa', 'labios', 200, 'Rosado intenso'),
(29, 'img/deliniador.jfif', 'deliniador', 'ojos', 300, 'Deliniador'),
(30, 'img/pestañas2.jpg', 'Pestañas', 'ojos', 250, 'Pestañas postizas'),
(31, 'img/pestañas.webp', 'Pestañas', 'ojos', 300, 'Pestañas'),
(32, 'img/crema.jpg', 'Crema Ponds', 'rostro', 500, 'Crema Humectante'),
(33, 'img/maqui.jfif', 'Set de Maquillaje', 'rostro', 3000, 'Set de maquillaje'),
(34, 'img/polvo.jpg', 'Polvo para la cara', 'rostro', 600, 'Polvo\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id_registro` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `genero` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id_registro`, `nombre`, `apellido`, `numero`, `email`, `password`, `birthday`, `genero`) VALUES
(8, 'Nayely', 'Rojas Marte', '8292074159', 'nayelyr@gmail.com', '$2y$10$1j0mmjkTQySujM1hgW3RCu2jGmUia76bHteiH7LhsdvRE76NyBRUG', '2002/4/4', 'f');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_producto` int(11) NOT NULL,
  `direccion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_registro`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
