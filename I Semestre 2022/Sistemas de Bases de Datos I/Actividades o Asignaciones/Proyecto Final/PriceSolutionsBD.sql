-- IMPLEMENTACIÓN

-- Creación de la BD

CREATE DATABASE PriceSolutionsBD

-- Creacion de Tablas 

USE PriceSolutionsBD

-- Creacion de la tabla Suscriptor

CREATE TABLE Suscriptor (
	cedSuscriptor VARCHAR (15)  
		CONSTRAINT pk_Suscriptor_cedSuscriptor PRIMARY KEY,
	numSuscripcion INT IDENTITY (1,1), 
	pNombre VARCHAR (20) NOT NULL,
	apellidoP VARCHAR (20) NOT NULL,	
	apellidoM VARCHAR (20),
	fechaNac DATE NOT NULL,
	fechaSus DATE NOT NULL 
)

-- Creacion de la tabla Sucursal

CREATE TABLE Sucursal (
	numSucursal INT 
		CONSTRAINT pk_Sucursal_numSucursal PRIMARY KEY,
	localizacion VARCHAR (24) NOT NULL,
	telSucursal CHAR(8) NOT NULL 
		CONSTRAINT ck_Sucursal_telSucursal CHECK (telSucursal LIKE '[0-9][0-9][0-9]-[0-9][0-9][0-9][0-9]')
)

-- Creacion de la tabla Producto

CREATE TABLE Producto (
	idProducto INT
		CONSTRAINT pk_Producto_idProducto PRIMARY KEY,
	nombre VARCHAR (35) NOT NULL,
	precioUnitario SMALLMONEY NOT NULL
		CONSTRAINT ck_Producto_precioUnitario CHECK (precioUnitario > 0),
	descripcion VARCHAR (250)
)

-- Creacion de la tabla Pedido

CREATE TABLE Pedido (
	idPedido char(5) 
		CONSTRAINT pk_Pedido_idPedido PRIMARY KEY,
	fecha DATE NOT NULL,
	hora TIME NOT NULL,  
	cedSuscriptor VARCHAR (15) 
		CONSTRAINT fk_Pedido_cedSuscriptor FOREIGN KEY REFERENCES Suscriptor (cedSuscriptor),
	numSucursal INT 
		CONSTRAINT fk_Pedido_numSucursal FOREIGN KEY REFERENCES Sucursal (numSucursal),
	numCaja INT, 
	montoTotal SMALLMONEY NOT NULL
		CONSTRAINT ck_Pedido_montoTotal CHECK (montoTotal > 0)
	
)

-- Creacion de la tabla Empleado

CREATE TABLE Empleado (
	cedEmpleado VARCHAR (15) 
		CONSTRAINT pk_Empleado_cedEmpleado PRIMARY KEY,
	nombre VARCHAR (20) NOT NULL,
	apellido VARCHAR (20) NOT NULL,
	fechaNac DATE,
	posicion CHAR (2)
		CONSTRAINT ck_Empleado_Posicion CHECK (posicion IN ('IN','SE', 'VI')), 
	numSucursal INT 
		CONSTRAINT fk_Empleado_numSucursal FOREIGN KEY REFERENCES Sucursal (numSucursal),
	fechaInicio DATE,
	fechaFin DATE 
)


-- Creacion de la tabla Pedido_Producto

CREATE TABLE Pedido_Producto (
	idPedido CHAR(5)
		CONSTRAINT fk_Pedido_Producto_idPedido FOREIGN KEY REFERENCES Pedido (idPedido),
	idProducto INT 
		CONSTRAINT fk_Pedido_Producto_idProducto FOREIGN KEY REFERENCES Producto (idProducto),
	cantidad INT 
		CONSTRAINT ck_Pedido_Producto_cantidad CHECK (cantidad > 0),            
	precio SMALLMONEY NOT NULL
		CONSTRAINT ck_Pedido_Producto_precio CHECK (precio > 0)
)

-- Creacion de la tabla TelSuscriptor 

CREATE TABLE TelSuscriptor (
	cedSuscriptor VARCHAR(15)  
		CONSTRAINT fk_TelSuscriptor_cedSuscriptor FOREIGN KEY REFERENCES Suscriptor (cedSuscriptor),
	telefono CHAR (9)
		CONSTRAINT ck_TelSuscriptor_telefono 
		CHECK (telefono like '[0-9][0-9][0-9][0-9]-[0-9][0-9][0-9][0-9]' or telefono like '[0-9][0-9][0-9]-[0-9][0-9][0-9][0-9]')
)


-- Verificacion de Datos --

SELECT * FROM Suscriptor
SELECT * FROM Sucursal
SELECT * FROM Producto
SELECT * FROM Pedido
SELECT * FROM Empleado
SELECT * FROM Pedido_Producto
SELECT * FROM TelSuscriptor

