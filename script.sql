CREATE TABLE Usuarios(
    Id int NOT NULL AUTO_INCREMENT,
    Nombre varchar(30) NOT NULL,
    ApellidoPaterno varchar(25),
    ApellidoMaterno varchar(25),
    Correo varchar(100),
    Password varchar(100),
    TipoUsuario int,
    PRIMARY KEY (Id)
);
CREATE TABLE Contactos(
    Id int NOT NULL AUTO_INCREMENT,
    IdUsuario int,
    Direccion varchar(120) NOT NULL,
    Numero varchar(6),
    Colonia varchar(25),
    Telefono varchar(10),
    CodigoPostal int,
    PRIMARY KEY (Id),
    FOREIGN KEY (IdUsuario) REFERENCES Usuarios(Id)
);
CREATE TABLE TiposProductos(
    Id int NOT NULL AUTO_INCREMENT,
    Descripcion varchar(120) NOT NULL,
    PRIMARY KEY (Id)   
);
CREATE TABLE Productos(
    Id int NOT NULL AUTO_INCREMENT,
    Nombre varchar(120) NOT NULL,
    Modelo varchar(25),
    Precio decimal(6,2),
    Existencia int,
    IdTipoProducto int,
    Imagen varchar(120),
    PRIMARY KEY (Id),
    FOREIGN KEY (IdTipoProducto) REFERENCES TiposProductos(Id)
);
CREATE TABLE Carritos(
    Id int NOT NULL AUTO_INCREMENT,
    IdUsuario int,
    FechaCreacion date,
    TotalCompra decimal(8,2),
    Entregado boolean DEFAULT false,
    IdContacto int,
    TipoPago int,
    PRIMARY KEY (Id),
    FOREIGN KEY (IdUsuario) REFERENCES Usuarios(Id),
    FOREIGN KEY (IdContacto) REFERENCES Contactos(Id)
);
CREATE TABLE DetallesCarritos(
    Id int NOT NULL AUTO_INCREMENT,
    IdCarrito int,
    IdProducto int,
    Precio decimal(8,2),
    Cantidad int,
    Importe decimal(8,2),
    Descuento decimal(8,2),
    PRIMARY KEY (Id),
    FOREIGN KEY (IdCarrito) REFERENCES Carritos(Id),
    FOREIGN KEY (IdProducto) REFERENCES Productos(Id)
);
