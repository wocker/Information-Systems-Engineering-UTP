-- PROCEDIMIENTOS DE INSERCION
    --Procedimiento de Insercion a la tabla Suscriptor  
CREATE OR REPLACE PROCEDURE inSuscriptor (
    p_cedSuscriptor Suscriptor.cedSuscriptor%TYPE,
    p_pNombre Suscriptor.pNombre%TYPE,
    p_apellidoP Suscriptor.apellidoP%TYPE,
    p_apellidoM Suscriptor.apellidoM%TYPE,
    p_fechaNac Suscriptor.fechaNac%TYPE,
    p_fechaSus Suscriptor.fechaSus% TYPE DEFAULT SYSDATE
    ) AS

    BEGIN
        INSERT INTO Suscriptor VALUES (seq_numSuscriptor.NEXTVAL, p_cedSuscriptor,
        p_pNombre, p_apellidoP, p_apellidoM,p_fechaNac, TO_DATE(p_fechaSus, 'DD/MM/YYYY HH:MI:SS'), 'V');
        COMMIT;
    EXCEPTION
        WHEN DUP_VAL_ON_INDEX THEN
            DBMS_OUTPUT.PUT_LINE('Valor Duplicado Encontrado');
        WHEN OTHERS THEN
            DBMS_OUTPUT.PUT_LINE('Error encontrado en la insercion');

    END inSuscriptor;
/

    --Procedimiento de Insercion a la tabla de Suscripcion
CREATE OR REPLACE PROCEDURE inSucursal (
    p_numSucursal sucursal.numSucursal%TYPE,
    p_localizacion sucursal.localizacion%TYPE
    ) AS

    BEGIN
        INSERT INTO Sucursal
        VALUES (p_numSucursal,p_localizacion);
        COMMIT;

    EXCEPTION
        WHEN DUP_VAL_ON_INDEX THEN
        DBMS_OUTPUT.PUT_LINE ('Datos repetidos');
        WHEN OTHERS THEN
        DBMS_OUTPUT.PUT_LINE ('Error en la insercion de datos');

    END inSucursal;
/

    --Procedimiento de insercion en tabla Producto
CREATE OR REPLACE PROCEDURE inProducto (
    p_nombre producto.nombre%TYPE, 
    p_precioUnitario producto.precioUnitario%TYPE,
    p_descripcion producto.descripcion%TYPE,
    p_cantidad producto.cantidad%TYPE 
    ) AS
    
    BEGIN
        INSERT INTO Producto
        VALUES (seq_idProducto.NEXTVAL,p_nombre,p_precioUnitario,p_descripcion,p_cantidad);
        COMMIT;

    EXCEPTION
        WHEN DUP_VAL_ON_INDEX THEN
        DBMS_OUTPUT.PUT_LINE ('Datos repetidos');
        WHEN OTHERS THEN
        DBMS_OUTPUT.PUT_LINE ('Error en la insercion de datos');

    END inProducto;
/

    --Procedimiento de insercion en Posicion
CREATE OR REPLACE PROCEDURE inPosicion (
    p_idPosicion posicion.idPosicion%TYPE,
    p_descripcion posicion.descripcion%TYPE
    ) AS
    BEGIN

        INSERT INTO Posicion 
        VALUES (p_idPosicion,p_descripcion);
        COMMIT;

    EXCEPTION
        WHEN DUP_VAL_ON_INDEX THEN
            DBMS_OUTPUT.PUT_LINE ('Datos repetidos');
        WHEN OTHERS THEN
            DBMS_OUTPUT.PUT_LINE ('Error en la insercion de datos');

    END inPosicion;
/

    --Procedimiento para insercion en Tabla Empleado
CREATE OR REPLACE PROCEDURE inEmpleado (
        p_cedEmpleado empleado.cedEmpleado%TYPE, 
        p_nombre empleado.nombre%TYPE, 
        p_apellido empleado.apellido%TYPE,
        p_fechaNac empleado.fechaNac%TYPE, 
        p_posicion empleado.posicion%TYPE, 
        p_numSucursal empleado.numSucursal%TYPE,
        p_fechaInicio empleado.fechaInicio%TYPE, 
        p_fechaFin empleado.fechaFin%TYPE 
    ) AS
    BEGIN

        INSERT INTO Empleado
        VALUES (seq_idEmpleado.NEXTVAL,p_cedEmpleado,p_nombre,p_apellido,p_fechaNac,p_posicion,
            p_numSucursal,p_fechaInicio,p_fechaFin);
        COMMIT;

    EXCEPTION
        WHEN DUP_VAL_ON_INDEX THEN
            DBMS_OUTPUT.PUT_LINE ('Datos repetidos');
        WHEN OTHERS THEN
            DBMS_OUTPUT.PUT_LINE ('Error en la insercion de datos');

    END inEmpleado;
/

    --Procedimiento Insercion Tipo de Telefono de Suscriptor
CREATE OR REPLACE PROCEDURE inTipoTelefono_Sus (
    p_id_tipoTelefono TipoTelefono_Sus.id_tipoTelefono%TYPE,
    p_descripcion TipoTelefono_Sus.descripcion%TYPE
    ) AS
    BEGIN

        INSERT INTO TipoTelefono_Sus 
        VALUES (p_id_tipoTelefono,p_descripcion);
        COMMIT;

    EXCEPTION
        WHEN DUP_VAL_ON_INDEX THEN 
        DBMS_OUTPUT.PUT_LINE ('Datos repetidos');
        WHEN OTHERS THEN
        DBMS_OUTPUT.PUT_LINE ('Error en la insercion de datos');

    END inTipoTelefono_Sus;
/

    --Procedimiento para insercion en Tipo de Telefono Sucursal
CREATE OR REPLACE PROCEDURE inTipoTelefono_Suc (
    p_id_tipoTelefono TipoTelefono_Suc.id_tipoTelefono%TYPE,  
    p_descripcion TipoTelefono_Suc.descripcion%TYPE    
    ) AS
    BEGIN

        INSERT INTO TipoTelefono_Suc
        VALUES (p_id_tipoTelefono,p_descripcion);
        COMMIT;

    EXCEPTION
        WHEN DUP_VAL_ON_INDEX THEN
            DBMS_OUTPUT.PUT_LINE ('Datos repetidos');
        WHEN OTHERS THEN
            DBMS_OUTPUT.PUT_LINE ('Error en la insercion de datos');

    END inTipoTelefono_Suc; 
/

    --Procedimiento para insercion en Telefono Suscriptor
CREATE OR REPLACE PROCEDURE inTelSuscriptor(
    p_numSuscriptor TelSuscriptor.numSuscriptor%TYPE,
    p_id_tipoTelefono TelSuscriptor.id_tipoTelefono%TYPE, 
    p_telefono TelSuscriptor.telefono%TYPE 
    ) AS 
    BEGIN

    INSERT INTO TelSuscriptor
    VALUES (p_numSuscriptor,p_id_tipoTelefono,p_telefono);
    COMMIT;

    EXCEPTION
        WHEN DUP_VAL_ON_INDEX THEN
            DBMS_OUTPUT.PUT_LINE ('Datos repetidos');
        WHEN OTHERS THEN
            DBMS_OUTPUT.PUT_LINE ('Error en la insercion de datos');

    END inTelSuscriptor;
/

    --Procedimiento de insercion Telefono Sucursal
CREATE OR REPLACE PROCEDURE inTelSucursal(
    p_numSucursal TelSucursal.numSucursal%TYPE,
    p_id_tipoTelefono TelSucursal.id_tipoTelefono%TYPE, 
    p_telefono TelSucursal.telefono%TYPE 
    ) AS 
    BEGIN

        INSERT INTO TelSucursal
        VALUES (p_numSucursal,p_id_tipoTelefono,p_telefono);
        COMMIT;

    EXCEPTION
        WHEN DUP_VAL_ON_INDEX THEN
            DBMS_OUTPUT.PUT_LINE ('Datos repetidos');
        WHEN OTHERS THEN
            DBMS_OUTPUT.PUT_LINE ('Error en la insercion de datos');

    END inTelSucursal;
/

    --PROCESO DE COMPRA
--Procedimiento de Insercion y creación Pedido
    /*Utilizado para crear la dependencia de la tabla Pedido_Producto
    de la llave primaria id_Pedido, realiza una llamada al procedimiento
    de insercion a la tabla Pedido_Producto*/
CREATE OR REPLACE PROCEDURE inPedido (
    p_fecha VARCHAR2 DEFAULT SYSDATE,
    p_numSuscriptor Pedido.numSuscriptor%TYPE,
    p_numSucursal Pedido.numSucursal%TYPE,
    p_numCaja Pedido.numCaja%TYPE,
    p_idEmpleado Pedido.idEmpleado%TYPE
    ) AS
    v_idPedido Pedido.idPedido%TYPE;
    BEGIN
        v_idPedido := seq_idPedido.nextval;
        INSERT INTO Pedido VALUES (v_idPedido, TO_DATE(p_fecha, 'DD/MM/YYYY'),
        p_numSuscriptor, p_numSucursal, p_numCaja, p_idEmpleado, 0);
        COMMIT;
        --inPedido_Producto(v_idPedido);

    EXCEPTION
        WHEN DUP_VAL_ON_INDEX THEN
            DBMS_OUTPUT.PUT_LINE('Valor Duplicado Encontrado');
        WHEN OTHERS THEN
            DBMS_OUTPUT.PUT_LINE('Error encontrado en la insercion');

    END inPedido;
/

CREATE OR REPLACE PROCEDURE inPedido_Producto (
    p_idPedido Pedido_Producto.idPedido%TYPE,
    p_idProducto Pedido_Producto.idProducto%TYPE,
    p_cantidad Pedido_Producto.cantidad%TYPE
    ) AS
    v_stock Pedido_Producto.cantidad%TYPE;
    
    BEGIN
        v_stock := Producto_Cantidad(p_idProducto);
        IF p_cantidad <= v_stock THEN
            INSERT INTO Pedido_Producto 
            VALUES (p_idPedido, p_idProducto, p_cantidad);
            COMMIT;
        END IF;
                   

    EXCEPTION
        WHEN DUP_VAL_ON_INDEX THEN
            DBMS_OUTPUT.PUT_LINE('Valor Duplicado Encontrado, Intente otra vez');
        WHEN OTHERS THEN
            DBMS_OUTPUT.PUT_LINE('Error encontrado, intente otra vez');

    END inPedido_Producto;
/

    --PROCEDIMIENTO RENOVAR SUSCRIPCION
CREATE OR REPLACE PROCEDURE upRenovarSus (
        p_numSuscriptor Suscriptor.numSuscriptor%TYPE
    ) AS

    BEGIN
        UPDATE Suscriptor SET fechaSus = SYSDATE, estado = 'V' 
        WHERE numSuscriptor = p_numSuscriptor;
    EXCEPTION
        WHEN NO_DATA_FOUND THEN
            DBMS_OUTPUT.PUT_LINE('No se encuentra el Pedido , Intente otra vez');
        WHEN OTHERS THEN
            DBMS_OUTPUT.PUT_LINE('Error encontrado, intente otra vez');
    END pro_RenovarSus;
/

    --Procedimiento para actualizar el estado de Suscriptores
    /*Implementa un cursos que permite verificar la anualidad de la suscripcion,
    si el Suscriptor tiene ya un año de suscripcion se cambia su estado a Expirado.
    Es decir que la suscripcion ya requiere de renovacion*/
CREATE OR REPLACE PROCEDURE upExpiraSus AS

    CURSOR c_fechaSus IS
        SELECT numSuscriptor, fechaSus
        FROM Suscriptor WHERE estado = 'V';
    
    BEGIN
        --Recorre el cursor y evalua la fecha de suscripcion
        FOR v_fechaSus IN c_fechaSus LOOP
            IF  v_fechaSus.fechaSus < (SYSDATE - NUMTOYMINTERVAL(1, 'year')) THEN
                UPDATE Suscriptor SET estado = 'E'
                WHERE numSuscriptor = v_fechaSus.numSuscriptor;
            END IF;
        END LOOP;
    EXCEPTION
        WHEN NO_DATA_FOUND THEN
            DBMS_OUTPUT.PUT_LINE('No se encuentra el Pedido , Intente otra vez');
        WHEN OTHERS THEN
            DBMS_OUTPUT.PUT_LINE('Error encontrado, intente otra vez');

    END upExpiraSus;
/

