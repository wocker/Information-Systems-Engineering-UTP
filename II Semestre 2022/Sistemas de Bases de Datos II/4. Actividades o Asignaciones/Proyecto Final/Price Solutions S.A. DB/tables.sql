 -- Inicialización del paquete de impresión de mensajes por pantalla

SET SERVEROUTPUT ON;

-- Creación de las Tablas del Modelo Lógico Relacional Normalizado hasta la 3FN

CREATE TABLE Suscriptor(
    numSuscriptor NUMBER,
    cedSuscriptor VARCHAR2(15),
    pNombre VARCHAR2(20) NOT NULL,
    apellidoP VARCHAR2(20) NOT NULL,
    apellidoM VARCHAR2(20) NOT NULL,
    fechaNac DATE NOT NULL,
    fechaSus DATE NOT NULL,
    estado CHAR DEFAULT 'V' NOT NULL,
        CONSTRAINT pk_Suscriptor PRIMARY KEY (numSuscriptor),
        CONSTRAINT ch_Suscriptor_estado CHECK (estado IN ('V', 'E')) 
);

CREATE TABLE Sucursal (
    numSucursal NUMBER,
    localizacion VARCHAR2(25) NOT NULL,
        CONSTRAINT pk_Sucursal PRIMARY KEY(numSucursal)
);

CREATE TABLE Producto (
    idProducto NUMBER,
    nombre VARCHAR2(40) NOT NULL,
    precioUnitario NUMBER NOT NULL,
    descripcion VARCHAR2(250),
    cantidad NUMBER NOT NULL,
        CONSTRAINT pk_Producto PRIMARY KEY (idProducto),
        CONSTRAINT ch_Producto_precioUnitario CHECK (precioUnitario > 0)
);

--Almacena los puestos o posiciones que puede ocupar un Empleado
CREATE TABLE Posicion (
    idPosicion NUMBER,
    descripcion VARCHAR2(25),
        CONSTRAINT pk_Posicion_Empleado PRIMARY KEY (idPosicion)
);

CREATE TABLE Empleado (
    idEmpleado NUMBER,
    cedEmpleado VARCHAR2(15),
    nombre VARCHAR2(20) NOT NULL,
    apellido VARCHAR2(20) NOT NULL,
    fechaNac DATE,
    posicion NUMBER,
    numSucursal NUMBER,
    fechaInicio DATE,
    fechaFin DATE,
        CONSTRAINT pk_Empleado PRIMARY KEY(idEmpleado),
        CONSTRAINT fk_Sucursal_Empleado FOREIGN KEY (numSucursal) REFERENCES Sucursal(numSucursal),
        CONSTRAINT fk_Posicion_Empleado FOREIGN KEY (posicion) REFERENCES Posicion (idPosicion)
);

--Almacena los tipos de telefonos de los suscriptores
CREATE TABLE TipoTelefono_Sus (
    id_tipoTelefono NUMBER,
    descripcion VARCHAR2(25) NOT NULL,
        CONSTRAINT pk_TipoTelefono_Sus PRIMARY KEY (id_tipoTelefono)
);

--Almacena los tipos de datos de las sucursales
CREATE TABLE TipoTelefono_Suc (
    id_tipoTelefono NUMBER,
    descripcion VARCHAR2(25) NOT NULL,
        CONSTRAINT pk_TipoTelefono_Suc PRIMARY KEY (id_tipoTelefono)
);

CREATE TABLE TelSuscriptor (
    numSuscriptor NUMBER,
    id_tipoTelefono NUMBER,
    telefono VARCHAR2(9) NOT NULL,
        CONSTRAINT pk_TelSucriptor PRIMARY KEY (numSuscriptor, id_tipoTelefono),
        CONSTRAINT fk_Suscriptor_TelSuscriptor FOREIGN KEY (numSuscriptor) REFERENCES Suscriptor (numSuscriptor),
        CONSTRAINT fk_TipoTelefono_TelSuscriptor FOREIGN KEY (id_tipoTelefono) REFERENCES TipoTelefono_Sus (id_tipoTelefono)
);

CREATE TABLE TelSucursal (
    numSucursal NUMBER,
    id_tipoTelefono NUMBER,
    telefono VARCHAR2(9) NOT NULL,
        CONSTRAINT pk_TelSucursal PRIMARY KEY (numSucursal, id_tipoTelefono),
        CONSTRAINT fk_Suscursal_TelSucursal FOREIGN KEY (numSucursal) REFERENCES Sucursal (numSucursal),
        CONSTRAINT fk_TipoTelefono_TelSucursal FOREIGN KEY (id_tipoTelefono) REFERENCES TipoTelefono_Suc (id_tipoTelefono)
);

CREATE TABLE Pedido (
    idPedido NUMBER,
    fecha DATE NOT NULL,
    numSuscriptor NUMBER NOT NULL,
    numSucursal NUMBER,
    numCaja NUMBER,
    idEmpleado NUMBER,
    montoTotal NUMBER NOT NULL,
        CONSTRAINT pk_Pedido PRIMARY KEY (idPedido),
        CONSTRAINT pk_Sucriptor_Pedido FOREIGN KEY (numSuscriptor) REFERENCES Suscriptor (numSuscriptor),
        CONSTRAINT fk_Sucursal_Pedido FOREIGN KEY (numSucursal) REFERENCES Sucursal (numSucursal),
        CONSTRAINT fk_Empleado_Pedido FOREIGN KEY (idEmpleado) REFERENCES Empleado (idEmpleado),
        CONSTRAINT ch_Pedido_montoTotal CHECK (montoTotal >= 0)
);
    
CREATE TABLE Pedido_Producto (
    idPedido NUMBER,
    idProducto NUMBER,
    cantidad NUMBER,
        CONSTRAINT pk_Pedido_Producto PRIMARY KEY (idPedido, idProducto),
        CONSTRAINT fk_Pedido_Pedido_Pedido FOREIGN KEY (idPedido) REFERENCES Pedido (idPedido),
        CONSTRAINT fk_Producto_Pedido_Producto FOREIGN KEY (idProducto) REFERENCES Producto (idProducto),
        CONSTRAINT ch_Pedido_Producto_cantidad CHECK(cantidad > 0)
);

-- TABLAS DE AUDITORIA
    --Auditoria Productos
CREATE TABLE aud_Producto (
    idAud_prod NUMBER,
    fecha DATE NOT NULL,
    usuario VARCHAR2(25) NOT NULL,
    descripcion VARCHAR(20),
    idProducto NUMBER NOT NULL,
    precioUnitarioAn NUMBER,
    precioUnitarioAc NUMBER,
    cambioPorcentaje NUMBER,
    CONSTRAINT pk_aud_prod PRIMARY KEY (idaud_prod),
    CONSTRAINT fk_aud_Producto_Producto FOREIGN KEY(idProducto) REFERENCES Producto (idProducto)
);

    --Auditoria Suscriptor
CREATE TABLE aud_Suscriptor (
    idAud_sus NUMBER,
    fecha DATE NOT NULL,
    usuario VARCHAR2(25) NOT NULL,
    descripcion VARCHAR(20),
    numSuscriptor NUMBER NOT NULL,
    fechaSusAn DATE,
    fechaSusAc DATE,
    estadoAn CHAR,
    estadoAc CHAR,
    CONSTRAINT pk_aud_sus PRIMARY KEY (idaud_sus),
    CONSTRAINT fk_aud_Suscriptor_Suscriptor FOREIGN KEY (numSuscriptor) REFERENCES Suscriptor (numSuscriptor)
);
