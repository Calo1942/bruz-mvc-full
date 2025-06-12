/* ----- Elimina la base de datos si existe y crea una nueva ----- */
DROP DATABASE IF EXISTS `db_bruz_deporte_full`;
CREATE DATABASE `db_bruz_deporte_full` 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_general_ci;
USE `db_bruz_deporte_full`;

/* ----- Crear Tabla: categoria ----- */
CREATE TABLE `categoria` (
  `IdCategoria` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`IdCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/* ----- Crear Tabla: cliente ----- */
CREATE TABLE `cliente` (
  `Cedula` VARCHAR(11) NOT NULL,
  `Nombre` VARCHAR(80) NOT NULL,
  `Apellido` VARCHAR(80) NOT NULL,
  `Correo` VARCHAR(100) DEFAULT NULL UNIQUE,
  `Telefono` VARCHAR(20) DEFAULT NULL,
  PRIMARY KEY (`Cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/* ----- Crear Tabla: producto ----- */
CREATE TABLE `producto` (
  `IdProducto` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(80) NOT NULL,
  `Descripcion` TEXT DEFAULT NULL,
  `Talla` VARCHAR(5) DEFAULT NULL,
  `Imagen` VARCHAR(255) DEFAULT NULL,
  `Detal` DECIMAL(10,2) DEFAULT NULL,
  `Mayor` DECIMAL(10,2) DEFAULT NULL,
  `Stock` INT(11) NOT NULL DEFAULT 0,
  `IdCategoria` INT(11) NOT NULL,
  PRIMARY KEY (`IdProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/* ----- Crear Tabla: pedido ----- */
CREATE TABLE `pedido` (
  `IdPedido` INT(11) NOT NULL AUTO_INCREMENT,
  `IdProducto` INT(11) NOT NULL,
  `Cedula` VARCHAR(20) NOT NULL,
  `Cantidad` INT(11) NOT NULL,
  PRIMARY KEY (`IdPedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/* ----- Crear Tabla: detallePedido ----- */
CREATE TABLE `detallePedido` (
  `IdDetallePedido` INT(11) NOT NULL AUTO_INCREMENT,
  `IdPedido` INT(11) NOT NULL,
  `Estado` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`IdDetallePedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/* ----- Crear Tabla: pagoefectivo ----- */
CREATE TABLE `pagoefectivo` (
  `IdEfectivo` INT(11) NOT NULL AUTO_INCREMENT,
  `Tipo` VARCHAR(80) NOT NULL,
  `Monto` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`IdEfectivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/* ----- Crear Tabla: transferencia ----- */
CREATE TABLE `transferencia` (
  `RefTransferencia` VARCHAR(255) NOT NULL,
  `ImgComprobante` VARCHAR(255) DEFAULT NULL,
  `Banco` VARCHAR(200) DEFAULT NULL,
  `Monto` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`RefTransferencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/* ----- Crear Tabla: pago ----- */
CREATE TABLE `pago` (
  `IdPago` INT(11) NOT NULL AUTO_INCREMENT,
  `IdDetallePedido` INT(11) NOT NULL,
  `Fecha` DATETIME NOT NULL,
  `RefTransferencia` VARCHAR(255) DEFAULT NULL,
  `IdEfectivo` INT(11) DEFAULT NULL,
  PRIMARY KEY (`IdPago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/* ----- Crear Tabla: prodpersonalizacion ----- */
CREATE TABLE `prodpersonalizacion` (
  `IdPersonalizacion` INT(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(255) DEFAULT NULL,
  `Imagen` VARCHAR(200) DEFAULT NULL,
  `IdCategoria` INT(11) NOT NULL,
  PRIMARY KEY (`IdPersonalizacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/* ----- Crear Tabla: venta ----- */
CREATE TABLE `venta` (
  `IdVenta` INT(11) NOT NULL AUTO_INCREMENT,
  `IdPago` INT(11) NOT NULL,
  `EstadoVenta` VARCHAR(80) NOT NULL,
  `EstadoEnvio` VARCHAR(80) NOT NULL,
  `TipoVenta` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`IdVenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/* ----- Índices y claves foráneas ----- */
ALTER TABLE `detallePedido`
  ADD KEY `IdPedido` (`IdPedido`);

ALTER TABLE `pago`
  ADD KEY `IdDetallePedido` (`IdDetallePedido`),
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

/* ----- Restricciones de INTegridad referencial ----- */
ALTER TABLE `detallePedido`
  ADD CONSTRAINT `detallePedido_ibfk_1` FOREIGN KEY (`IdPedido`) REFERENCES `pedido` (`IdPedido`);

ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`IdDetallePedido`) REFERENCES `detallePedido` (`IdDetallePedido`),
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
