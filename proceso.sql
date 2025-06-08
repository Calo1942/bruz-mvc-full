-- Elimina la base de datos si existe y crea una nueva
DROP DATABASE IF EXISTS `db_bruz_deporte_full`;
CREATE DATABASE `db_bruz_deporte_full` 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;
USE `db_bruz_deporte_full`;

-- Tabla: categoria
CREATE TABLE `categoria` (
  `IdCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`IdCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla: cliente
CREATE TABLE `cliente` (
  `Cedula` varchar(11) NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  `Apellido` varchar(80) NOT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla: producto
CREATE TABLE `producto` (
  `IdProducto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(80) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `Talla` varchar(5) DEFAULT NULL,
  `Imagen` varchar(255) DEFAULT NULL,
  `Detal` decimal(10,2) DEFAULT NULL,
  `Mayor` decimal(10,2) DEFAULT NULL,
  `Stock` int(11) NOT NULL DEFAULT 0,
  `IdCategoria` int(11) NOT NULL,
  PRIMARY KEY (`IdProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla: pedido
CREATE TABLE `pedido` (
  `IdPedido` int(11) NOT NULL AUTO_INCREMENT,
  `IdProducto` int(11) NOT NULL,
  `Cedula` varchar(20) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`IdPedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla: carrito
CREATE TABLE `carrito` (
  `IdCarrito` int(11) NOT NULL AUTO_INCREMENT,
  `IdPedido` int(11) NOT NULL,
  `Estado` varchar(25) NOT NULL,
  PRIMARY KEY (`IdCarrito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla: pagoefectivo
CREATE TABLE `pagoefectivo` (
  `IdEfectivo` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(80) NOT NULL,
  `Monto` decimal(10,2) NOT NULL,
  PRIMARY KEY (`IdEfectivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla: transferencia
CREATE TABLE `transferencia` (
  `RefTransferencia` varchar(255) NOT NULL,
  `ImgComprobante` varchar(255) DEFAULT NULL,
  `Banco` varchar(200) DEFAULT NULL,
  `Monto` decimal(10,2) NOT NULL,
  PRIMARY KEY (`RefTransferencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla: pago
CREATE TABLE `pago` (
  `IdPago` int(11) NOT NULL AUTO_INCREMENT,
  `IdCarrito` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `RefTransferencia` varchar(255) DEFAULT NULL,
  `IdEfectivo` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdPago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla: prodpersonalizacion
CREATE TABLE `prodpersonalizacion` (
  `IdPersonalizacion` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Imagen` varchar(200) DEFAULT NULL,
  `IdCategoria` int(11) NOT NULL,
  PRIMARY KEY (`IdPersonalizacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabla: venta
CREATE TABLE `venta` (
  `IdVenta` int(11) NOT NULL AUTO_INCREMENT,
  `IdPago` int(11) NOT NULL,
  `EstadoVenta` varchar(80) NOT NULL,
  `EstadoEnvio` varchar(80) NOT NULL,
  `TipoVenta` varchar(80) NOT NULL,
  PRIMARY KEY (`IdVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Índices y claves foráneas
ALTER TABLE `carrito`
  ADD KEY `IdPedido` (`IdPedido`);

ALTER TABLE `pago`
  ADD KEY `IdCarrito` (`IdCarrito`),
  ADD KEY `RefTransferencia` (`RefTransferencia`),
  ADD KEY `IdEfectivo` (`IdEfectivo`);

ALTER TABLE `pedido`
  ADD KEY `IdProducto` (`IdProducto`),
  ADD KEY `Cedula` (`Cedula`);

ALTER TABLE `prodpersonalizacion`
  ADD KEY `IdCategoria` (`IdCategoria`);

ALTER TABLE `producto`
  ADD KEY `IdCategoria` (`IdCategoria`);

ALTER TABLE `venta`
  ADD KEY `IdPago` (`IdPago`);

-- Restricciones de integridad referencial
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`IdPedido`) REFERENCES `pedido` (`IdPedido`);

ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`IdCarrito`) REFERENCES `carrito` (`IdCarrito`),
  ADD CONSTRAINT `pago_ibfk_2` FOREIGN KEY (`RefTransferencia`) REFERENCES `transferencia` (`RefTransferencia`),
  ADD CONSTRAINT `pago_ibfk_3` FOREIGN KEY (`IdEfectivo`) REFERENCES `pagoefectivo` (`IdEfectivo`);

ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`Cedula`) REFERENCES `cliente` (`Cedula`);

ALTER TABLE `prodpersonalizacion`
  ADD CONSTRAINT `prodpersonalizacion_ibfk_1` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`IdCategoria`);

ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`IdCategoria`);

ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`IdPago`) REFERENCES `pago` (`IdPago`);