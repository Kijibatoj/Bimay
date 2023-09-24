-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-09-2023 a las 17:50:29
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bicho`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `correo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `contra` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `privilegio` text COLLATE utf8_spanish2_ci NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`correo`, `contra`, `privilegio`, `estatus`) VALUES
('KijibatoJoria@gmail.com', '123456', 'usuario', 1),
('Victor@gmail.com', 'Victor', 'Admin', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `Cedula_Rif` int(11) NOT NULL,
  `dia_fecha` int(11) NOT NULL,
  `mes_fecha` int(11) NOT NULL,
  `ano_fecha` int(11) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_producto`
--

CREATE TABLE `factura_producto` (
  `id_producto` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `producto` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` float NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(1111) COLLATE utf8_spanish_ci NOT NULL,
  `imagen_child` varchar(111) COLLATE utf8_spanish_ci NOT NULL,
  `Tipo_Producto` text COLLATE utf8_spanish_ci NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `producto`, `stock`, `precio`, `descripcion`, `imagen`, `imagen_child`, `Tipo_Producto`, `estatus`) VALUES
(2, 'JBL Tune 510BT', 44, 14, 'Transmite sonido de gran calidad desde tu movil de forma inalambrica, sin ataduras de cables.', 'IMG/JBLTune.jpeg', 'IMG/JBLTune.png', 'Telefonos', 1),
(4, 'AirPods 2nd Generation', 21, 80, 'Los AirPods te ofrecen muchas horas de audio y conversacion y la posibilidad de usarlos con un estuche de carga inalambrica.', 'IMG/Earpods.jpg', 'IMG/AirPods2.png', 'Telefonos', 1),
(6, 'Razer', 10, 10, 'Pequenos guantes para tus dedos pulgares, asi el deslizamiento es mas sencillo.', 'IMG/Finger.jpg', 'IMG/FingerSleeves.png', 'Telefonos', 1),
(11, 'Mouse G502', 10, 122, 'Teclado lento y de alta sensibilidad que te permitira jugar como todo un Gamer!', 'IMG/MouseLG.webp', 'IMG/Mouse.png', 'Computadoras', 1),
(12, 'Cascos Gaming', 7, 232, 'Estos cascos ofrecen la mejor experiencia con sonido surround que tendras jamas, ideal para horror games.', 'IMG/G733.jpg', 'IMG/LG733Black.webp', 'Computadoras', 0),
(13, 'Teclado Mecanico', 10, 154, 'Teclado minimalista, iluminado y de buen rendimiento.', 'IMG/LGKeyboard.jpeg', 'IMG/png', 'Computadoras', 1),
(14, 'MicrofonoRazer Seiren', 41, 555, 'El microfono compacto que buscabas para tus streamings!', 'IMG/RazerS.jpg', 'IMG/Mic.png', 'Computadoras', 1),
(20, 'Forro acrilico', 10, 123, 'Este iPhone Case viene con distintos modelos y colores que acoplan a tu personalidad', 'IMG/Rose.webp', 'IMG/.png', 'Telefonos', 1),
(24, 'Samsung S21 Ultra', 555, 11, 'Forro de cuero extra lijero y con buen servicio.', 'IMG/LeatherCase.jpg', 'IMG/Forro.png', 'Telefonos', 1),
(25, 'Galletas de avena', 12, 5, 'Las galletas de avena que vende el itjo para alimentar a los estudiantes del mismo', 'IMG/Jipeta.png', 'IMG/Vsc.png', 'Computadoras', 0),
(26, 'ASDASDASDA', 0, 0, 'ASDASD', 'ASDASD', 'ASDAS', 'Computadoras', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Nombre_Usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `contra` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Cedula_Rif` int(11) NOT NULL,
  `privilegio` text COLLATE utf8_spanish_ci NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Nombre_Usuario`, `apellido`, `correo`, `contra`, `telefono`, `Cedula_Rif`, `privilegio`, `estatus`) VALUES
('Victor', 'DRIJA', 'victodrijaa@gmail.com', '123', '041544', 666, 'usuario', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`correo`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `Cedula_Rif` (`Cedula_Rif`);

--
-- Indices de la tabla `factura_producto`
--
ALTER TABLE `factura_producto`
  ADD UNIQUE KEY `id_producto` (`id_producto`,`id_factura`),
  ADD KEY `id_factura` (`id_factura`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Cedula_Rif`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`Cedula_Rif`) REFERENCES `usuarios` (`Cedula_Rif`);

--
-- Filtros para la tabla `factura_producto`
--
ALTER TABLE `factura_producto`
  ADD CONSTRAINT `factura_producto_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id_factura`),
  ADD CONSTRAINT `factura_producto_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
