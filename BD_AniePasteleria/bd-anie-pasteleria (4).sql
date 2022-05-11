-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2022 a las 00:52:18
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd-anie-pasteleria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_producto`
--

CREATE TABLE `categoria_producto` (
  `Cat_Id_Categoria` int(15) NOT NULL,
  `Cat_Nombre` varchar(20) DEFAULT NULL,
  `Cat_Descripcion` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria_producto`
--

INSERT INTO `categoria_producto` (`Cat_Id_Categoria`, `Cat_Nombre`, `Cat_Descripcion`) VALUES
(1, 'Tortas', 'Descripcion Tortas'),
(2, 'Dulcess', 'Descripcion Dulces'),
(3, 'Biscochos', 'Descripcion Biscochos'),
(4, 'Chocolates', 'Descripcion Chocolates');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `Ciu_Id` int(15) NOT NULL,
  `Ciu_Nombre` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `Dep_Id` int(15) NOT NULL,
  `Dep_Nombre` varchar(20) DEFAULT NULL,
  `Dep_Ciu_Id` varchar(15) DEFAULT NULL,
  `Dep_Pai_Id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `Dir_Usu_Cedula` int(15) DEFAULT NULL,
  `Dir_Calle` varchar(15) DEFAULT NULL,
  `Dir_Carrera` varchar(15) DEFAULT NULL,
  `Dir_Numero` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `Pag_Id_Pago` int(15) NOT NULL,
  `Pag_Forma_Pago` varchar(15) DEFAULT NULL,
  `Pag_Valor` int(10) DEFAULT NULL,
  `Pag_Comprobante` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`Pag_Id_Pago`, `Pag_Forma_Pago`, `Pag_Valor`, `Pag_Comprobante`) VALUES
(1, 'Transferencia', 12000, 0x456e20457370657261),
(2, 'Efectivo', 12000, 0x6e756c6c);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `Pai_Id` int(15) NOT NULL,
  `Pai_Nombre` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `Ped_Id_Pedido` int(15) NOT NULL,
  `Ped_Fecha_Pedido` date DEFAULT NULL,
  `Ped_Fecha_Entrega` date DEFAULT NULL,
  `Ped_Direccion` varchar(60) NOT NULL,
  `Ped_Usu_Cedula` int(15) DEFAULT NULL,
  `Ped_Estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`Ped_Id_Pedido`, `Ped_Fecha_Pedido`, `Ped_Fecha_Entrega`, `Ped_Direccion`, `Ped_Usu_Cedula`, `Ped_Estado`) VALUES
(1, '2022-04-15', '2022-04-09', 'Calle 61a 12b-48', 67659876, 'Completado'),
(5, '2022-04-15', '2022-04-15', 'calle 61a 12b', 67659876, 'Completado'),
(6, '2022-04-15', '2022-04-15', 'calle 45', 67659876, 'Completado'),
(7, '2022-04-15', '2022-04-15', 'Soledad', 67659876, 'En Espera'),
(8, '2022-04-14', '2022-04-16', 'Barranquilla', 67659876, 'En Espera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_producto`
--

CREATE TABLE `pedido_producto` (
  `Ped_Pro_Id_Producto` int(15) DEFAULT NULL,
  `Ped_Pro_Id_Pedido` int(15) DEFAULT NULL,
  `Ped_Pro_Cantidad` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido_producto`
--

INSERT INTO `pedido_producto` (`Ped_Pro_Id_Producto`, `Ped_Pro_Id_Pedido`, `Ped_Pro_Cantidad`) VALUES
(1, 1, '2'),
(2, 5, '3'),
(0, 6, '17'),
(0, 7, '2'),
(2, 8, '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_transaciones`
--

CREATE TABLE `pedido_transaciones` (
  `Ped_Tra_Id_Pedido` int(15) DEFAULT NULL,
  `Ped_Tra_Id_Transaciones` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Pro_Id_Producto` int(15) NOT NULL,
  `Pro_Nombre` varchar(25) DEFAULT NULL,
  `Pro_Precio` int(15) DEFAULT NULL,
  `Pro_Cat_Id_Categoria` int(15) DEFAULT NULL,
  `Pro_Detalle` varchar(20) DEFAULT NULL,
  `Pro_Descripcion` varchar(200) DEFAULT NULL,
  `Pro_Estado` varchar(15) DEFAULT NULL,
  `Pro_Foto_Producto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Pro_Id_Producto`, `Pro_Nombre`, `Pro_Precio`, `Pro_Cat_Id_Categoria`, `Pro_Detalle`, `Pro_Descripcion`, `Pro_Estado`, `Pro_Foto_Producto`) VALUES
(0, 'Tarta', 15000, 1, '5 Libras', 'Pastel grande , de forma generalmente redonda , relleno de frutas , crema , etc., o bien de bizcocho , pasta de almendra y otras clases de masa homogénea', 'Interno', '20220407_083130.tarta.jpg'),
(1, 'Gansitos', 5000, 1, '2 x 1', ' Pastel de origen mexicano relleno de crema y mermelada de fresa, que tiene cobertura de chocolate y está espolvoreado con chispas de chocolate.', 'Interno', '20220324_021323.91yyzX1hQ9L._SL1500_.jpg'),
(2, 'Bollos', 4000, 1, '4 Libras', 'Los bollos se hacen con diversos tipos de masas de harina y pueden tener relleno o no. Algunos se asemejan a panecillos dulces.', 'Interno', '20220325_004452.83352776.webp'),
(3, 'xX', 1233, 2, '4 Libras', 'Descripcion', 'Interno', '20220325_004801.pD.jpg'),
(4, 'Torta', 5000, 1, '2 x 1', 'Descripcion', 'Interno', '20220325_015554.pC.jpg'),
(5, 'Panes', 4000, 1, '2 x 1', 'Descripcion', 'Interno', '20220325_023830.119305628_326727912104043_1884241116743045692_n.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_provedor`
--

CREATE TABLE `producto_provedor` (
  `Pro_Pro_Id_Producto` int(15) DEFAULT NULL,
  `Pro_Pro_Id_Provedor` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provedores`
--

CREATE TABLE `provedores` (
  `Pro_Id_Provedor` int(15) NOT NULL,
  `Pro_Telefono` bigint(15) DEFAULT NULL,
  `Pro_Correo` varchar(20) DEFAULT NULL,
  `Pro_Razon_Social` varchar(20) DEFAULT NULL,
  `Pro_Direccion` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `provedores`
--

INSERT INTO `provedores` (`Pro_Id_Provedor`, `Pro_Telefono`, `Pro_Correo`, `Pro_Razon_Social`, `Pro_Direccion`) VALUES
(1, 323242322, 'provedor@gmai.com', 'prueba.SA', 'Calle 33 # 12'),
(2, 312456789, 'provedor@gmai.com', 'prueba.SA', 'Calle 33 # 545');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo`
--

CREATE TABLE `recibo` (
  `Rec_Consecutivo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `Rol_Usu_Cedula` int(15) DEFAULT NULL,
  `Rol_Administrador` varchar(20) DEFAULT NULL,
  `Rol_Cliente` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE `telefono` (
  `Tel_Usu_Cedula` int(15) DEFAULT NULL,
  `Tel_Fijo` int(15) DEFAULT NULL,
  `Tel_Celular` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `Tra_Usu_Cedula` int(15) DEFAULT NULL,
  `Tra_Area` varchar(15) DEFAULT NULL,
  `Tra_Cargo` varchar(15) DEFAULT NULL,
  `Tra_Sexo` varchar(15) DEFAULT NULL,
  `Tra_Salario` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`Tra_Usu_Cedula`, `Tra_Area`, `Tra_Cargo`, `Tra_Sexo`, `Tra_Salario`) VALUES
(1006817345, 'Horno', 'Supervisor', 'M', 1000000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaciones`
--

CREATE TABLE `transaciones` (
  `Tra_Id_Transaciones` int(11) NOT NULL,
  `Tra_Fecha` date DEFAULT NULL,
  `Tra_Pag_Id_Pago` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transaciones_recibo`
--

CREATE TABLE `transaciones_recibo` (
  `Tra_Rec_Id_Transaciones` int(15) DEFAULT NULL,
  `Tra_Rec_Consecutivo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Usu_Cedula` int(15) NOT NULL,
  `Usu_Nombre` varchar(20) DEFAULT NULL,
  `Usu_Apellido` varchar(20) DEFAULT NULL,
  `Usu_Telefono` bigint(15) DEFAULT NULL,
  `Usu_Usuario` varchar(15) DEFAULT NULL,
  `Usu_Contraseña` int(15) DEFAULT NULL,
  `Usu_Fecha` date DEFAULT NULL,
  `Usu_Email` varchar(25) DEFAULT NULL,
  `Usu_Rol` varchar(15) DEFAULT NULL,
  `Usu_Direccion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Usu_Cedula`, `Usu_Nombre`, `Usu_Apellido`, `Usu_Telefono`, `Usu_Usuario`, `Usu_Contraseña`, `Usu_Fecha`, `Usu_Email`, `Usu_Rol`, `Usu_Direccion`) VALUES
(0, '', '', 0, '', 0, '0000-00-00', '', 'Cliente', NULL),
(2, 'lhvblh', 'k,m \'k', 87098709, 'ohpkjb', 65, '2022-04-10', 'adonisxavier06@gmail.com', 'Cliente', NULL),
(67659876, 'Sara', 'Vasquez', 328192091, 'Sara', 40, '2022-03-24', '2342324@fvdfvd', 'Cliente', NULL),
(132456798, 'Itachi', 'Uchiha', 32392398203, 'Itachi', 356, '2022-03-21', 'maria@gmail.com', 'Administrador', NULL),
(1006817345, 'Adonis', 'Bustamante', 2147483647, 'Ozaky06', 356, '2022-02-23', 'adonisxavier06@gmail.com', 'Administrador', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  ADD PRIMARY KEY (`Cat_Id_Categoria`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`Ciu_Id`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`Dep_Id`),
  ADD KEY `Dep_Pai_Id` (`Dep_Pai_Id`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD KEY `Dir_Usu_Cedula` (`Dir_Usu_Cedula`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`Pag_Id_Pago`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`Pai_Id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Ped_Id_Pedido`),
  ADD KEY `Ped_Cli_Usu_Cedula` (`Ped_Usu_Cedula`);

--
-- Indices de la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD KEY `Ped_Pro_Id_Producto` (`Ped_Pro_Id_Producto`),
  ADD KEY `Ped_Pro_Id_Pedido` (`Ped_Pro_Id_Pedido`);

--
-- Indices de la tabla `pedido_transaciones`
--
ALTER TABLE `pedido_transaciones`
  ADD KEY `Ped_Tra_Id_Transaciones` (`Ped_Tra_Id_Transaciones`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Pro_Id_Producto`),
  ADD KEY `Pro_Cat_Id_Categoria` (`Pro_Cat_Id_Categoria`);

--
-- Indices de la tabla `producto_provedor`
--
ALTER TABLE `producto_provedor`
  ADD KEY `Pro_Pro_Id_Producto` (`Pro_Pro_Id_Producto`),
  ADD KEY `Pro_Pro_Id_Provedor` (`Pro_Pro_Id_Provedor`);

--
-- Indices de la tabla `provedores`
--
ALTER TABLE `provedores`
  ADD PRIMARY KEY (`Pro_Id_Provedor`);

--
-- Indices de la tabla `recibo`
--
ALTER TABLE `recibo`
  ADD PRIMARY KEY (`Rec_Consecutivo`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD KEY `Rol_Usu_Cedula` (`Rol_Usu_Cedula`);

--
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD KEY `Tel_Celular` (`Tel_Celular`),
  ADD KEY `telefono_ibfk_1` (`Tel_Usu_Cedula`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD KEY `Tra_Usu_Cedula` (`Tra_Usu_Cedula`);

--
-- Indices de la tabla `transaciones`
--
ALTER TABLE `transaciones`
  ADD PRIMARY KEY (`Tra_Id_Transaciones`),
  ADD KEY `Tra_Pag_Id_Pago` (`Tra_Pag_Id_Pago`);

--
-- Indices de la tabla `transaciones_recibo`
--
ALTER TABLE `transaciones_recibo`
  ADD KEY `Tra_Rec_Id_Transaciones` (`Tra_Rec_Id_Transaciones`),
  ADD KEY `Tra_Rec_Consecutivo` (`Tra_Rec_Consecutivo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Usu_Cedula`),
  ADD KEY `Usu_Crea_Usuario` (`Usu_Usuario`),
  ADD KEY `Usu_Telefono` (`Usu_Telefono`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Ped_Id_Pedido` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_2` FOREIGN KEY (`Ciu_Id`) REFERENCES `departamento` (`Dep_Id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `departamento_ibfk_1` FOREIGN KEY (`Dep_Pai_Id`) REFERENCES `pais` (`Pai_Id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`Dir_Usu_Cedula`) REFERENCES `usuarios` (`Usu_Cedula`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`Ped_Usu_Cedula`) REFERENCES `usuarios` (`Usu_Cedula`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedido_producto`
--
ALTER TABLE `pedido_producto`
  ADD CONSTRAINT `pedido_producto_ibfk_1` FOREIGN KEY (`Ped_Pro_Id_Producto`) REFERENCES `productos` (`Pro_Id_Producto`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedido_producto_ibfk_2` FOREIGN KEY (`Ped_Pro_Id_Pedido`) REFERENCES `pedido` (`Ped_Id_Pedido`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedido_transaciones`
--
ALTER TABLE `pedido_transaciones`
  ADD CONSTRAINT `pedido_transaciones_ibfk_2` FOREIGN KEY (`Ped_Tra_Id_Transaciones`) REFERENCES `transaciones` (`Tra_Id_Transaciones`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`Pro_Cat_Id_Categoria`) REFERENCES `categoria_producto` (`Cat_Id_Categoria`) ON DELETE CASCADE;

--
-- Filtros para la tabla `producto_provedor`
--
ALTER TABLE `producto_provedor`
  ADD CONSTRAINT `producto_provedor_ibfk_1` FOREIGN KEY (`Pro_Pro_Id_Producto`) REFERENCES `productos` (`Pro_Id_Producto`) ON DELETE CASCADE,
  ADD CONSTRAINT `producto_provedor_ibfk_2` FOREIGN KEY (`Pro_Pro_Id_Provedor`) REFERENCES `provedores` (`Pro_Id_Provedor`) ON DELETE CASCADE;

--
-- Filtros para la tabla `rol`
--
ALTER TABLE `rol`
  ADD CONSTRAINT `rol_ibfk_1` FOREIGN KEY (`Rol_Usu_Cedula`) REFERENCES `usuarios` (`Usu_Cedula`) ON DELETE CASCADE;

--
-- Filtros para la tabla `telefono`
--
ALTER TABLE `telefono`
  ADD CONSTRAINT `telefono_ibfk_1` FOREIGN KEY (`Tel_Usu_Cedula`) REFERENCES `usuarios` (`Usu_Cedula`) ON DELETE CASCADE;

--
-- Filtros para la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD CONSTRAINT `trabajadores_ibfk_1` FOREIGN KEY (`Tra_Usu_Cedula`) REFERENCES `usuarios` (`Usu_Cedula`) ON DELETE CASCADE;

--
-- Filtros para la tabla `transaciones`
--
ALTER TABLE `transaciones`
  ADD CONSTRAINT `transaciones_ibfk_1` FOREIGN KEY (`Tra_Pag_Id_Pago`) REFERENCES `pago` (`Pag_Id_Pago`) ON DELETE CASCADE;

--
-- Filtros para la tabla `transaciones_recibo`
--
ALTER TABLE `transaciones_recibo`
  ADD CONSTRAINT `transaciones_recibo_ibfk_1` FOREIGN KEY (`Tra_Rec_Id_Transaciones`) REFERENCES `transaciones` (`Tra_Id_Transaciones`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaciones_recibo_ibfk_2` FOREIGN KEY (`Tra_Rec_Consecutivo`) REFERENCES `recibo` (`Rec_Consecutivo`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
