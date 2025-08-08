DROP DATABASE IF EXISTS `db_bruz_deporte`;
CREATE DATABASE `db_bruz_deporte`
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;
USE `db_bruz_deporte`;

CREATE TABLE Cliente (
    Cedula VARCHAR(15) PRIMARY KEY,
    Nombre VARCHAR(100) NOT NULL,
    Apellido VARCHAR(100) NOT NULL,
    Correo VARCHAR(50) NOT NULL,
    Telefono VARCHAR(25) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE Categoria (
    IdCategoria INT(4) PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE Banco (
    IdBanco INT(4) PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(100) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE Talla (
    IdTalla INT(11) PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(5) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE Producto (
    IdProducto INT(11) PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(100) NOT NULL,
    Descripcion TEXT NOT NULL,
    Stock INT(11) NOT NULL DEFAULT 0,
    PrecioDetal DECIMAL(10,2) NOT NULL,
    PrecioMayor DECIMAL(10,2) NOT NULL,
    IdCategoria INT(4) NOT NULL,
    FOREIGN KEY (IdCategoria) REFERENCES Categoria(IdCategoria)
) ENGINE=InnoDB;

CREATE TABLE Variante (
    IdVariante INT(11) PRIMARY KEY AUTO_INCREMENT,
    Stock INT(11) NOT NULL DEFAULT 0,
    IdProducto INT(11) NOT NULL,
    IdTalla INT(11) NOT NULL,
    Color VARCHAR(50) NOT NULL,
    FOREIGN KEY (IdProducto) REFERENCES Producto(IdProducto),
    FOREIGN KEY (IdTalla) REFERENCES Talla(IdTalla)
) ENGINE=InnoDB;

CREATE TABLE Pedido (
    IdPedido INT(11) PRIMARY KEY AUTO_INCREMENT,
    Cedula VARCHAR(15) NOT NULL,
    TipoVenta VARCHAR(25) NOT NULL,
    EstadoVenta VARCHAR(25) NOT NULL,
    EstadoEnvio VARCHAR(25) NOT NULL,
    FOREIGN KEY (Cedula) REFERENCES Cliente(Cedula)
) ENGINE=InnoDB;

CREATE TABLE ComprobantePago (
    IdComprobantePago INT(11) PRIMARY KEY AUTO_INCREMENT,
    IdPedido INT(11) NOT NULL,
    RefTransferencia VARCHAR(100) NOT NULL,Comprobante VARCHAR(255) NOT NULL,
    IdBanco INT(4) NOT NULL,
    Monto DECIMAL(10,2) NOT NULL,
    PagoEfectivo DECIMAL(10,2) NOT NULL,
    CotDolar DECIMAL(10,2) NOT NULL,
    EstadoPago VARCHAR(25) NOT NULL,
    Fecha DATETIME NOT NULL,
    FOREIGN KEY (IdPedido) REFERENCES Pedido(IdPedido),
    FOREIGN KEY (IdBanco) REFERENCES Banco(IdBanco)
) ENGINE=InnoDB;

CREATE TABLE PedidoItem (
    IdPedido INT(11) NOT NULL,
    IdVariante INT(11) NOT NULL,
    Cantidad INT(11) NOT NULL,
    Precio DECIMAL(10,2) NOT NULL,
    VentaMayor BOOLEAN NOT NULL,
    PRIMARY KEY (IdPedido, IdVariante),
    FOREIGN KEY (IdPedido) REFERENCES Pedido(IdPedido),
    FOREIGN KEY (IdVariante) REFERENCES Variante(IdVariante)
) ENGINE=InnoDB;

CREATE TABLE Imagen (
    IdImagen INT(11) PRIMARY KEY AUTO_INCREMENT,
    NombreImg VARCHAR(100) NOT NULL,
    IdVariante INT(11) NOT NULL,
    FOREIGN KEY (IdVariante) REFERENCES Variante(IdVariante)
) ENGINE=InnoDB;

CREATE TABLE OrdenFabricacion (
    IdOrdenFabricacion INT(11) PRIMARY KEY AUTO_INCREMENT,
    FechaEntrega DATETIME NOT NULL,
    EstadoOrden VARCHAR(25) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE OrdenFabricacionItem (
    IdOrdenFabricacion INT(11) NOT NULL,
    IdVariante INT(11) NOT NULL,
    Cantidad INT(11) NOT NULL,
    PRIMARY KEY (IdOrdenFabricacion, IdVariante),
    FOREIGN KEY (IdOrdenFabricacion) REFERENCES OrdenFabricacion(IdOrdenFabricacion),
    FOREIGN KEY (IdVariante) REFERENCES Variante(IdVariante)
) ENGINE=InnoDB;

CREATE TABLE ProdPersonalizacion (
    IdPersonalizacion INT(11) PRIMARY KEY AUTO_INCREMENT,
    Descripcion TEXT NOT NULL,
    IdCategoria INT(4) NOT NULL,
    Imagen VARCHAR(100) NOT NULL,
    FOREIGN KEY (IdCategoria) REFERENCES Categoria(IdCategoria)
) ENGINE=InnoDB;