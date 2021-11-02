CREATE DATABASE paw_ventas;

USE paw_ventas;

CREATE TABLE usuarios(
    idusuario INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    usuario VARCHAR(50),
    email TEXT(75),
    clave VARCHAR(255),
    token VARCHAR(12),
    tipo INT,
    foto TEXT(75),
    estado INT
);

CREATE TABLE productos(
    id_producto INT PRIMARY KEY NOT NULL,
    cod_producto TEXT(20),
    nombre_producto VARCHAR(25),
    descripcion TEXT(100),
    precio_compra DECIMAL(10.2),
    precio_venta DECIMAL(10.2),
    fecha_ingreso DATE,
    fecha_vencimiento DATE,
    estado INT,
    descuento FLOAT,
    imagen TEXT(75),
);

CREATE TABLE inventario(
    id_inventario INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_producto VARCHAR(255),
    id_categoria INT,
    stock FLOAT
);

CREATE TABLE categorias(
    id_categoria INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    categoria VARCHAR(150),
    imagen_cate TEXT(255)
);

CREATE TABLE proveedores(
    id_proveedor INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombre_proveedor VARCHAR(25),
    direccion TEXT(255),
    telefono INT(11),
    correo VARCHAR(255)
);