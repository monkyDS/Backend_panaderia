-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2024 a las 06:43:09
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `panaderia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `fo_dpto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `nombre`, `fo_dpto`) VALUES
(1, 'Bogota', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `identificacion` varchar(150) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `celular` varchar(150) NOT NULL,
  `fo_ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `identificacion`, `nombre`, `direccion`, `email`, `celular`, `fo_ciudad`) VALUES
(1, '1105870670', 'Un Cliente Normal', 'bogota', 'unclientenormal@panaderia.com', '1211212121212', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compras` int(11) NOT NULL,
  `fecha` varchar(150) NOT NULL,
  `fo_productos` int(11) NOT NULL,
  `fo_proveedor` int(11) NOT NULL,
  `cantidad` varchar(150) NOT NULL,
  `iva` varchar(150) NOT NULL,
  `subtotales` varchar(150) NOT NULL,
  `total` varchar(150) NOT NULL,
  `fo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compras`, `fecha`, `fo_productos`, `fo_proveedor`, `cantidad`, `iva`, `subtotales`, `total`, `fo_usuario`) VALUES
(1, '2024-09-25', 2, 2, '1212', '1313', '131', '313', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_dpto` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_dpto`, `nombre`) VALUES
(1, 'Bogota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_inventario` int(11) NOT NULL,
  `fecha` varchar(150) NOT NULL,
  `fo_productos` int(11) NOT NULL,
  `fo_proveedor` int(11) NOT NULL,
  `cantidades` varchar(150) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `fo_marca` int(11) NOT NULL,
  `codigo` varchar(150) NOT NULL,
  `stoock` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_inventario`, `fecha`, `fo_productos`, `fo_proveedor`, `cantidades`, `nombre`, `fo_marca`, `codigo`, `stoock`) VALUES
(4, '2024-09-26', 2, 2, '12', 'cocacola3.5ltrs', 2, '003', '30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre`) VALUES
(1, 'Bimbo'),
(2, 'Coca_Cola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_productos` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `codigo` varchar(150) NOT NULL,
  `valor_compra` varchar(150) NOT NULL,
  `valor_venta` varchar(150) NOT NULL,
  `stoock` varchar(150) NOT NULL,
  `fo_proveedor` int(11) NOT NULL,
  `fo_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_productos`, `nombre`, `codigo`, `valor_compra`, `valor_venta`, `stoock`, `fo_proveedor`, `fo_marca`) VALUES
(1, 'Donas', '001', '3000', '3500', '20', 2, 1),
(2, 'Coca_Cola 1.5lts', '002', '2000', '3000', '30', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nit` varchar(150) NOT NULL,
  `razon_social` varchar(150) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `celular` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `fo_ciudad` int(11) NOT NULL,
  `contacto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nit`, `razon_social`, `direccion`, `celular`, `email`, `fo_ciudad`, `contacto`) VALUES
(1, '0001', 'proveedor_1', '45-#30 bogota', '3119990001', 'proveedor1@gmail.com', 1, 'N/A'),
(2, '0002', 'proveedor_2', '55-#39 bogota', '3119990002', 'proveedor1@gmail.com', 1, 'N/A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte`
--

CREATE TABLE `soporte` (
  `id_soporte` int(11) NOT NULL,
  `asunto` varchar(255) NOT NULL,
  `contenido` text NOT NULL,
  `fecha_envio` datetime DEFAULT current_timestamp(),
  `estado` varchar(20) DEFAULT 'pendiente',
  `respuesta` text DEFAULT NULL,
  `fecha_respuesta` datetime DEFAULT NULL,
  `fo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `soporte`
--

INSERT INTO `soporte` (`id_soporte`, `asunto`, `contenido`, `fecha_envio`, `estado`, `respuesta`, `fecha_respuesta`, `fo_usuario`) VALUES
(1, 'prueba', 'opeurssasasasas', '2024-10-04 21:11:52', 'pendiente', 'dadfjkwaefw', '2024-10-05 21:11:52', 8),
(2, 'prueba 2', 'dajfgaewilfgawiufe', '2024-10-06 02:55:14', 'pendiente', 'afjsfkawjfhewkfh', '0000-00-00 00:00:00', 1),
(3, 'prueba 3s', 'kasfgakfgawjhgfsajf', '2024-10-06 02:55:52', 'pendiente', 'fÑSEFHAÑWIHEFLAEW', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `celular` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `clave` varchar(150) NOT NULL,
  `tipo_usuario` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `celular`, `email`, `clave`, `tipo_usuario`) VALUES
(1, 'JhamPrueba', '311125764402', 'jhamsoto@panaderia.com', '123456789', 'Soporte'),
(2, 'Jham andersons', '311125764501', 'jhasoto@panaderia.com', '123456789', 'Vendedor'),
(8, 'soloPruebajham', '311125764301', 'jhasotoPrueba@panaderia.com', '123456789', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_ventas` int(11) NOT NULL,
  `fecha` varchar(150) NOT NULL,
  `fo_cliente` int(11) NOT NULL,
  `productos` text NOT NULL,
  `subtotal` varchar(150) NOT NULL,
  `total` varchar(150) NOT NULL,
  `fo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_ventas`, `fecha`, `fo_cliente`, `productos`, `subtotal`, `total`, `fo_usuario`) VALUES
(1, '2024-10-5', 1, 'a:2:{i:0;a:5:{i:0;s:3:\"002\";i:1;s:16:\"Coca_Cola 1.5lts\";i:2;i:3000;i:3;i:22;i:4;i:66000;}i:1;a:5:{i:0;s:3:\"001\";i:1;s:5:\"Donas\";i:2;i:3500;i:3;i:2;i:4;i:7000;}}\r\n', '73000', '86870', 8),
(26, '2024-10-4', 1, 'a:2:{i:0;a:5:{i:0;s:3:\"002\";i:1;s:16:\"Coca_Cola 1.5lts\";i:2;i:3000;i:3;i:22;i:4;i:66000;}i:1;a:5:{i:0;s:3:\"001\";i:1;s:5:\"Donas\";i:2;i:3500;i:3;i:2;i:4;i:7000;}}\r\n', '73000', '86870', 8);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`),
  ADD KEY `fo_dpto` (`fo_dpto`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `fo_ciudad` (`fo_ciudad`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compras`),
  ADD KEY `fo_productos` (`fo_productos`),
  ADD KEY `fo_proveedor` (`fo_proveedor`),
  ADD KEY `fo_usuario` (`fo_usuario`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_dpto`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_inventario`),
  ADD KEY `fo_productos` (`fo_productos`),
  ADD KEY `fo_proveedor` (`fo_proveedor`),
  ADD KEY `fo_marca` (`fo_marca`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_productos`),
  ADD KEY `fo_proveedor` (`fo_proveedor`),
  ADD KEY `fo_marca` (`fo_marca`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD KEY `fo_ciudad` (`fo_ciudad`);

--
-- Indices de la tabla `soporte`
--
ALTER TABLE `soporte`
  ADD PRIMARY KEY (`id_soporte`),
  ADD KEY `fo_usuario` (`fo_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_ventas`),
  ADD KEY `fo_usuario` (`fo_usuario`),
  ADD KEY `fo_cliente` (`fo_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_dpto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `soporte`
--
ALTER TABLE `soporte`
  MODIFY `id_soporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_ventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`fo_dpto`) REFERENCES `departamento` (`id_dpto`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`fo_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`fo_productos`) REFERENCES `productos` (`id_productos`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`fo_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_3` FOREIGN KEY (`fo_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`fo_productos`) REFERENCES `productos` (`id_productos`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`fo_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `inventario_ibfk_3` FOREIGN KEY (`fo_marca`) REFERENCES `marca` (`id_marca`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`fo_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`fo_marca`) REFERENCES `marca` (`id_marca`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`fo_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `soporte`
--
ALTER TABLE `soporte`
  ADD CONSTRAINT `soporte_ibfk_1` FOREIGN KEY (`fo_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`fo_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_5` FOREIGN KEY (`fo_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
