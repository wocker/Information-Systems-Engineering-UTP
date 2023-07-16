-- DROPS DE TABLAS
DROP TABLE Pedido_Producto;
DROP TABLE Pedido;
DROP TABLE aud_Producto;
DROP TABLE aud_Suscriptor;
DROP TABLE TelSucursal;
DROP TABLE TelSuscriptor;
DROP TABLE TipoTelefono_Suc;
DROP TABLE TipoTelefono_Sus;
DROP TABLE Empleado;
DROP TABLE Posicion;
DROP TABLE Producto;
DROP TABLE Sucursal;
DROP TABLE Suscriptor;

-- DROPS DE SECUENCIAS
DROP SEQUENCE seq_numSuscriptor;
DROP SEQUENCE seq_idProducto;
DROP SEQUENCE seq_idPedido;
DROP SEQUENCE seq_idEmpleado;
DROP SEQUENCE seq_idAud_Prod;
DROP SEQUENCE seq_idAud_sus;

-- DROP DE PROCEDIMIENTOS
DROP PROCEDURE inSuscriptor;
DROP PROCEDURE inSucursal;
DROP PROCEDURE inProducto;
DROP PROCEDURE inPosicion;
DROP PROCEDURE inEmpleado;
DROP PROCEDURE inTipoTelefono_Sus;
DROP PROCEDURE inTipoTelefono_Suc;
DROP PROCEDURE inTelSuscriptor;
DROP PROCEDURE inTelSucursal;
DROP PROCEDURE inPedido;
DROP PROCEDURE inPedido_Producto;
DROP PROCEDURE upRenovarSus;
DROP PROCEDURE upExpiraSus;

--DROP DE TRIGGERS
DROP TRIGGER UpProductoCantidad;
DROP TRIGGER trig_Aud_Sus;
DROP TRIGGER trig_Aud_Prod;

DROP FUNCTION Producto_Cantidad;