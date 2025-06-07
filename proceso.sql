DROP DATABASE IF EXISTS `db_bruz_deporte_full`;

CREATE DATABASE `db_bruz_deporte_full` 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

USE `db_bruz_deporte_full`;

CREATE TABLE `carrito` (
  `IdCarrito` int(11) NOT NULL,
  `IdPedido` int(11) NOT NULL,
  `Estado` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `IdCategoria` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Cedula` varchar(11) NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  `Apellido` varchar(80) NOT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `IdPago` int(11) NOT NULL,
  `IdCarrito` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `RefTransferencia` varchar(255) DEFAULT NULL,
  `IdEfectivo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagoefectivo`
--

CREATE TABLE `pagoefectivo` (
  `IdEfectivo` int(11) NOT NULL,
  `Tipo` varchar(80) NOT NULL,
  `Monto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `IdPedido` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `Cedula` varchar(20) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prodpersonalizacion`
--

CREATE TABLE `prodpersonalizacion` (
  `IdPersonalizacion` int(11) NOT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Imagen` varchar(200) DEFAULT NULL,
  `IdCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IdProducto` int(11) NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `Talla` varchar(5) DEFAULT NULL,
  `Imagen` varchar(255) DEFAULT NULL,
  `Detal` decimal(10,2) DEFAULT NULL,
  `Mayor` decimal(10,2) DEFAULT NULL,
  `Stock` int(11) DEFAULT 0 NOT NULL,
  `IdCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transferencia`
--

CREATE TABLE `transferencia` (
  `RefTransferencia` varchar(255) NOT NULL,
  `ImgComprobante` varchar(255) DEFAULT NULL,
  `Banco` varchar(200) DEFAULT NULL,
  `Monto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `IdVenta` int(11) NOT NULL,
  `IdPago` int(11) NOT NULL,
  `EstadoVenta` varchar(80) NOT NULL,
  `EstadoEnvio` varchar(80) NOT NULL,
  `TipoVenta` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`IdCarrito`),
  ADD KEY `IdPedido` (`IdPedido`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Cedula`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`IdPago`),
  ADD KEY `IdCarrito` (`IdCarrito`),
  ADD KEY `RefTransferencia` (`RefTransferencia`),
  ADD KEY `IdEfectivo` (`IdEfectivo`);

--
-- Indices de la tabla `pagoefectivo`
--
ALTER TABLE `pagoefectivo`
  ADD PRIMARY KEY (`IdEfectivo`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`IdPedido`),
  ADD KEY `IdProducto` (`IdProducto`),
  ADD KEY `Cedula` (`Cedula`);

--
-- Indices de la tabla `prodpersonalizacion`
--
ALTER TABLE `prodpersonalizacion`
  ADD PRIMARY KEY (`IdPersonalizacion`),
  ADD KEY `IdCategoria` (`IdCategoria`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IdProducto`),
  ADD KEY `IdCategoria` (`IdCategoria`);

--
-- Indices de la tabla `transferencia`
--
ALTER TABLE `transferencia`
  ADD PRIMARY KEY (`RefTransferencia`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`IdVenta`),
  ADD KEY `IdPago` (`IdPago`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `IdCarrito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `IdPago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pagoefectivo`
--
ALTER TABLE `pagoefectivo`
  MODIFY `IdEfectivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `IdPedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prodpersonalizacion`
--
ALTER TABLE `prodpersonalizacion`
  MODIFY `IdPersonalizacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `IdVenta` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`IdPedido`) REFERENCES `pedido` (`IdPedido`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`IdCarrito`) REFERENCES `carrito` (`IdCarrito`),
  ADD CONSTRAINT `pago_ibfk_2` FOREIGN KEY (`RefTransferencia`) REFERENCES `transferencia` (`RefTransferencia`),
  ADD CONSTRAINT `pago_ibfk_3` FOREIGN KEY (`IdEfectivo`) REFERENCES `pagoefectivo` (`IdEfectivo`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`Cedula`) REFERENCES `cliente` (`Cedula`);

--
-- Filtros para la tabla `prodpersonalizacion`
--
ALTER TABLE `prodpersonalizacion`
  ADD CONSTRAINT `prodpersonalizacion_ibfk_1` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`IdCategoria`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`IdCategoria`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`IdPago`) REFERENCES `pago` (`IdPago`);
