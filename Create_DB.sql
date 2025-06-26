/* ----- Elimina la base de datos si existe y crea una nueva ----- */
DROP DATABASE IF EXISTS `db_bruz_deporte`;
CREATE DATABASE `db_bruz_deporte`
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;
USE `db_bruz_deporte`;

-- Tablas independientes (sin claves foráneas)
CREATE TABLE Banco (
    IdBanco INT(4) PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE Categoria (
    IdCategoria INT(11) PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE Talla (
    IdTalla INT(11) PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(5)
) ENGINE=InnoDB;

-- Tablas con dependencias moderadas
CREATE TABLE Cliente (
    Cedula VARCHAR(15) PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Apellido VARCHAR(100) NOT NULL,
    Correo VARCHAR(50),
    Telefono VARCHAR(25) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE Producto (
    IdProducto INT(11) PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(255) NOT NULL,
    Descripcion TEXT,
    PrecioDetal DECIMAL(10,2) NOT NULL,
    PrecioMayor DECIMAL(10,2),
    IdCategoria INT(11),
    FOREIGN KEY (IdCategoria) REFERENCES Categoria(IdCategoria)
) ENGINE=InnoDB;

CREATE TABLE ProdPersonalizacion (
    IdPersonalizacion INT(11) PRIMARY KEY AUTO_INCREMENT,
    Descripcion VARCHAR(255) NOT NULL,
    IdCategoria INT(4),
    Imagen VARCHAR(100) NOT NULL,
    FOREIGN KEY (IdCategoria) REFERENCES Categoria(IdCategoria)
) ENGINE=InnoDB;

-- Tablas con múltiples dependencias
CREATE TABLE Inventario (
    IdInventario INT(11) PRIMARY KEY AUTO_INCREMENT,
    Stock INT(11),
    IdProducto INT(11),
    IdTalla INT(11),
    Color VARCHAR(50),
    FOREIGN KEY (IdProducto) REFERENCES Producto(IdProducto),
    FOREIGN KEY (IdTalla) REFERENCES Talla(IdTalla)
) ENGINE=InnoDB;

CREATE TABLE Pedido (
    IdPedido INT(11) PRIMARY KEY AUTO_INCREMENT,
    IdInventario INT(11),
    Cantidad INT(11) NOT NULL,
    VentaMayor BOOLEAN,
    FOREIGN KEY (IdInventario) REFERENCES Inventario(IdInventario)
) ENGINE=InnoDB;

CREATE TABLE MetodoPago (
    IdMetodoPago INT(11) PRIMARY KEY AUTO_INCREMENT,
    RefTransferencia VARCHAR(100),
    imgComprobante VARCHAR(255),
    IdBanco INT(4),
    Monto DECIMAL(10,2) NOT NULL,
    PagoEfectivo DECIMAL(10,2),
    CotDolar DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (IdBanco) REFERENCES Banco(IdBanco)
) ENGINE=InnoDB;

-- Tablas altamente dependientes
CREATE TABLE DetallePedido (
    IdDetallePedido INT(11) PRIMARY KEY AUTO_INCREMENT,
    IdPedido INT(11),
    Cedula VARCHAR(15) NOT NULL,
    TipoVenta VARCHAR(25),
    EstadoVenta VARCHAR(25),
    EstadoEnvio VARCHAR(25),
    FOREIGN KEY (IdPedido) REFERENCES Pedido(IdPedido),
    FOREIGN KEY (Cedula) REFERENCES Cliente(Cedula)
) ENGINE=InnoDB;

CREATE TABLE SolicitudProducto (
    IdSolicitudPedido INT(11) PRIMARY KEY AUTO_INCREMENT,
    Cantidad INT(11),
    IdInventario INT(11),
    EstadoPedido VARCHAR(100),
    FOREIGN KEY (IdInventario) REFERENCES Inventario(IdInventario)
) ENGINE=InnoDB;

CREATE TABLE Imagen (
    IdImagen INT(11) PRIMARY KEY AUTO_INCREMENT,
    NombreImg VARCHAR(100) NOT NULL,
    IdProducto INT(11),
    FOREIGN KEY (IdProducto) REFERENCES Producto(IdProducto)
) ENGINE=InnoDB;

-- Tabla central (depende de 3 entidades) - VERSIÓN CORREGIDA
CREATE TABLE Pago (
    IdPago INT(11) PRIMARY KEY AUTO_INCREMENT,
    IdDetallePedido INT(11) NOT NULL,
    IdMetodoPago INT(11) NOT NULL,  -- COLUMNA FALTANTE AÑADIDA
    Fecha DATETIME NOT NULL,
    FOREIGN KEY (IdDetallePedido) REFERENCES DetallePedido(IdDetallePedido),
    FOREIGN KEY (IdMetodoPago) REFERENCES MetodoPago(IdMetodoPago)
) ENGINE=InnoDB;