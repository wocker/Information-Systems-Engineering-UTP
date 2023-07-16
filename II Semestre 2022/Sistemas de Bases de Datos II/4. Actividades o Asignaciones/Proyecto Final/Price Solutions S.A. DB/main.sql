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

-- SECUENCIAS
CREATE SEQUENCE seq_numSuscriptor
    MINVALUE 1
    START WITH 1
    INCREMENT BY 1
    CACHE 20;

CREATE SEQUENCE seq_idProducto
    MINVALUE 1
    START WITH 1
    INCREMENT BY 1
    CACHE 20;

CREATE SEQUENCE seq_idEmpleado
    MINVALUE 1
    START WITH 1
    INCREMENT BY 1
    CACHE 20;

CREATE SEQUENCE seq_idPedido
    MINVALUE 1
    START WITH 1
    INCREMENT BY 1
    CACHE 20;

--SECUENCIAS DE AUDITORIA
CREATE SEQUENCE seq_idAud_sus
    MINVALUE 1
    START WITH 1
    INCREMENT BY 1
    CACHE 20;

CREATE SEQUENCE seq_idAud_Prod
    MINVALUE 1
    START WITH 1
    INCREMENT BY 1
    CACHE 20;

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

    EXCEPTION
        WHEN DUP_VAL_ON_INDEX THEN
            DBMS_OUTPUT.PUT_LINE('Valor Duplicado Encontrado');
        WHEN OTHERS THEN
            DBMS_OUTPUT.PUT_LINE('Error encontrado en la insercion');

    END inPedido;
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
    END upRenovarSus;
/

    --Procedimiento para actualizar el estado de Suscriptores
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

--FUNCIONES
    --Cantidad de Inventario
CREATE OR REPLACE FUNCTION Producto_Cantidad (
    p_idProducto Producto.idProducto%TYPE ) 
    RETURN NUMBER AS
    v_cantidad Producto.cantidad%TYPE;

    BEGIN
        SELECT cantidad INTO v_cantidad
        FROM Producto 
        WHERE idProducto = p_idProducto;
        RETURN v_cantidad;
    
    EXCEPTION
        WHEN NO_DATA_FOUND THEN
            DBMS_OUTPUT.PUT_LINE('No se encontra el producto solicitado');
        WHEN OTHERS THEN
            DBMS_OUTPUT.PUT_LINE('Error encontrado');

    END Producto_Cantidad;
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


-- TRIGGERS 
CREATE OR REPLACE TRIGGER UpProductoCantidad
    AFTER INSERT ON Pedido_Producto
    FOR EACH ROW

    DECLARE
        v_idProducto Producto.idProducto% TYPE := :new.idProducto;
        v_precio Producto.precioUnitario%TYPE;
        v_cantidad_final Producto.cantidad%TYPE;
    BEGIN
        SELECT precioUnitario, cantidad 
        INTO v_precio, v_cantidad_final FROM Producto
        WHERE idProducto = v_idProducto;
        
        v_cantidad_final := v_cantidad_final - :new.cantidad;

        UPDATE Producto SET cantidad = v_cantidad_final
        WHERE idProducto = v_idProducto;

        UPDATE Pedido 
        SET montoTotal = montoTotal + (v_precio*:new.cantidad)
        WHERE idPedido = :new.idPedido;

    END UpProductoCantidad; 
/

--TRIGGER DE AUDITORIA
    --AUDITORIA SUSCRIPTOR
CREATE OR REPLACE TRIGGER trig_Aud_Sus
    AFTER INSERT OR UPDATE ON Suscriptor
    FOR EACH ROW 

    BEGIN

        IF INSERTING THEN 
            INSERT INTO aud_Suscriptor (idAud_sus, fecha, usuario, descripcion, numSuscriptor ,fechaSusAc, estadoAc)
            VALUES (seq_idAud_sus.NEXTVAL,TO_DATE(SYSDATE,'DD/MM/YYYY HH:MI:SS'),
            USER, 'INSERT',:new.numSuscriptor, :new.fechaSus, :new.estado);
        ELSIF UPDATING THEN
            INSERT INTO aud_Suscriptor
            VALUES (seq_idAud_sus.NEXTVAL,TO_DATE(SYSDATE,'DD/MM/YYYY HH:MI:SS'),
            USER, 'UPDATE', :old.numSuscriptor, :old.fechaSus,:new.fechaSus, :old.estado, :new.estado);
        END IF;

    END trig_Aud_Sus; 
/

    --AUDITORIA PRODUCTO
CREATE OR REPLACE TRIGGER trig_Aud_Prod
    AFTER INSERT OR UPDATE ON Producto
    FOR EACH ROW 
    BEGIN

        IF INSERTING THEN
            INSERT INTO aud_Producto (idAud_prod, fecha, usuario, descripcion, idProducto, precioUnitarioAc)
            VALUES (seq_idAud_Prod.NEXTVAL,TO_DATE(SYSDATE,'DD/MM/YYYY HH:MI:SS'),
            USER,'INSERT',:new.idProducto, :new.PrecioUnitario);
        ELSIF UPDATING THEN
            INSERT INTO aud_Producto
            VALUES (seq_idAud_Prod.NEXTVAL,TO_DATE(SYSDATE,'DD/MM/YYYY HH:MI:SS'),
            USER,'UPDATE',:new.idProducto,:old.PrecioUnitario, :new.PrecioUnitario, (:new.PrecioUnitario/:old.PrecioUnitario)*100);
        END IF;

END trig_Aud_Prod; 
/

--INSERCIONES
BEGIN
    inSucursal (1,'Panama, Brisas');
    inSucursal (2,'Panama, El Dorado');
    inSucursal (3,'Panama, MetroPark');
    inSucursal (4,'Panama, Via Brasil');
    inSucursal (5,'Panama, Mañanitas');
END;
/

BEGIN
    inProducto ('Ranchero - Primerba\, Paste',26.9,'Cras mi pede\, malesuada in\, imperdiet et\, commodo vulputate\, justo. In blandit ultrices enim. Lor(333)em ipsum dolor sit amet\, consectetuer adipiscing elit.', 200);
    inProducto ('Wine - Chateau Aqueria Tavel',17.54,'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.', 200);
    inProducto ('Mushroom - Crimini',34.9,'Fusce posuere felis sed lacus. Morbi sem mauris\, laoreet ut\, rhoncus aliquet\, pulvinar sed\, nisl. Nunc rhoncus dui vel sem.', 200);
    inProducto ('Transfer Sheets',13.39,'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.', 200);
    inProducto ('Foil - 4oz Custard Cup',37.54,'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', 200);
    inProducto ('Truffle Cups - Red',36.32,'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue\, diam id ornare imperdiet\, sapien urna pretium nisl\, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.', 200);
    inProducto ('Rice Paper',23.23,'Lorem ipsum dolor sit amet\, consectetuer adipiscing elit. Proin risus. Praesent lectus.', 200);
    inProducto ('Pork - Ground',28.39,'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.', 200);
    inProducto ('Beer - Moosehead',39.08,'In congue. Etiam justo. Etiam pretium iaculis justo.', 200);
    inProducto ('Chicken - Wieners',16.73,'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 200);
    inProducto ('Flour - Strong Pizza',12.85,'Curabitur in libero ut massa volutpat convallis. Morbi odio odio\, elementum eu\, interdum eu\, tincidunt in\, leo. Maecenas pulvinar lobortis est.', 200);
    inProducto ('Oil - Macadamia',4.77,'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus\, aliquet at\, feugiat non\, pretium quis\, lectus.', 200);
    inProducto ('Chinese Foods - Chicken Wing',34.72,'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede\, venenatis non\, sodales sed\, tincidunt eu\, felis.', 200);
    inProducto ('Bread - Pumpernickel',4.66,'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', 200);
    inProducto ('Coffee - Decafenated',37.3,'Maecenas leo odio\, condimentum id\, luctus nec\, molestie sed\, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', 200);
    inProducto ('Tomatoes Tear Drop',37.66,'Phasellus in felis. Donec semper sapien a libero. Nam dui.', 200);
    inProducto ('Oil - Olive\, Extra Virgin',8.2,'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', 200);
    inProducto ('Jicama',36.72,'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', 200);
    inProducto ('Bread Country Roll',34.37,'Nam ultrices\, libero non mattis pulvinar\, nulla pede ullamcorper augue\, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', 200);
    inProducto ('Onions - Spanish',35.12,'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 200);
    inProducto ('Cheese - Fontina',39.78,'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.', 200);
    inProducto ('Pea - Snow',35.05,'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.', 200);
    inProducto ('Garbag Bags - Black',32.95,'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus\, auctor sed\, tristique in\, tempus sit amet\, sem.', 200);
    inProducto ('Bread Country Roll',31.3,'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero\, convallis eget\, eleifend luctus\, ultricies eu\, nibh.', 200);
    inProducto ('Scrubbie - Scotchbrite Hand Pad',5.17,'Quisque porta volutpat erat. Quisque erat eros\, viverra eget\, congue eget\, semper rutrum\, nulla. Nunc purus.', 200);
    inProducto ('Octopus - Baby\, Cleaned',32.44,'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', 200);
    inProducto ('Plate Foam Laminated 9in Blk',27.82,'Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero\, rutrum ac\, lobortis vel\, dapibus at\, diam.', 200);
    inProducto ('Pork - Tenderloin\, Frozen',2.36,'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', 200);
    inProducto ('Tea - Mint',35.84,'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.', 200);
    inProducto ('Coffee Swiss Choc Almond',19.89,'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', 200);
    inProducto ('Banana',29.91,'Maecenas leo odio\, condimentum id\, luctus nec\, molestie sed\, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.', 200);
    inProducto ('Cloves - Ground',27.73,'Praesent blandit. Nam nulla. Integer pede justo\, lacinia eget\, tincidunt eget\, tempus vel\, pede.', 200);
    inProducto ('Flour - Pastry',21.12,'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', 200);
    inProducto ('Myers Planters Punch',17.39,'Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu\, adipiscing molestie\, hendrerit at\, vulputate vitae\, nisl.', 200);
    inProducto ('Cheese - Parmesan Grated',18.85,'In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.', 200);
    inProducto ('Lettuce - Baby Salad Greens',17.14,'Fusce consequat. Nulla nisl. Nunc nisl.', 200);
    inProducto ('Cheese - Cheddar\, Mild',4.06,'Vestibulum quam sapien\, varius ut\, blandit non\, interdum in\, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.', 200);
    inProducto ('Zucchini - Yellow',31.62,'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', 200);
    inProducto ('Orange Roughy 6/8 Oz',23.58,'Proin leo odio\, porttitor id\, consequat in\, consequat ut\, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.', 200);
    inProducto ('Veal - Insides Provini',14.98,'Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.', 200);
    inProducto ('Tomatoes - Plum\, Canned',12.71,'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.', 200);
    inProducto ('Seedlings - Mix\, Organic',24.22,'Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 200);
    inProducto ('Halibut - Steaks',1.01,'Mauris enim leo\, rhoncus sed\, vestibulum sit amet\, cursus id\, turpis. Integer aliquet\, massa id lobortis convallis\, tortor risus dapibus augue\, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 200);
    inProducto ('Truffle Cups - Red',28.36,'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.', 200);
    inProducto ('Wine - Alicanca Vinho Verde',29.24,'Quisque porta volutpat erat. Quisque erat eros\, viverra eget\, congue eget\, semper rutrum\, nulla. Nunc purus.', 200);
    inProducto ('Dried Cherries',20.36,'Quisque porta volutpat erat. Quisque erat eros\, viverra eget\, congue eget\, semper rutrum\, nulla. Nunc purus.', 200);
    inProducto ('Tea - Jasmin Green',2.7,'Fusce posuere felis sed lacus. Morbi sem mauris\, laoreet ut\, rhoncus aliquet\, pulvinar sed\, nisl. Nunc rhoncus dui vel sem.', 200);
    inProducto ('Chicken - Leg / Back Attach',29.39,'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', 200);
    inProducto ('Tarts Assorted',25.55,'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.', 200);
    inProducto ('Beef - Inside Round',22.49,'Maecenas tristique\, est et tempus semper\, est quam pharetra magna\, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.', 200);
END;
/

BEGIN
    inPosicion (1, 'Inventario');
    inPosicion (2, 'Cajero');
    inPosicion (3, 'Mantenimiento');
END;
/

BEGIN
    inEmpleado ('8-098-9661','Mommy','Waddilove',TO_DATE('1997/02/20' , 'YYYY/MM/DD'),2,2,TO_DATE('2015/12/27' , 'YYYY/MM/DD'),TO_DATE('2023/10/1' , 'YYYY/MM/DD'));
    inEmpleado ('4-863-0548','Simeon','Torrance',TO_DATE('1987/08/06' , 'YYYY/MM/DD'),2,4,TO_DATE('2010/05/27' , 'YYYY/MM/DD'),TO_DATE('2029/05/11' , 'YYYY/MM/DD'));
    inEmpleado ('3-632-4415','Vis','Worrall',TO_DATE('2002/04/28' , 'YYYY/MM/DD'),3,3,TO_DATE('2015/05/19' , 'YYYY/MM/DD'),TO_DATE('2014/11/04' , 'YYYY/MM/DD'));
    inEmpleado ('2-641-7921','Marjory','Brettor',TO_DATE('1975/07/12' , 'YYYY/MM/DD'),1,4,TO_DATE('2013/02/18' , 'YYYY/MM/DD'),TO_DATE('2028/12/27' , 'YYYY/MM/DD'));
    inEmpleado ('9-238-8937','Leanora','Baxster',TO_DATE('1993/11/02' , 'YYYY/MM/DD'),1,5,TO_DATE('2009/12/24' , 'YYYY/MM/DD'),TO_DATE('2019/06/20' , 'YYYY/MM/DD'));
    inEmpleado ('4-335-4645','Beniamino','Treadgear',TO_DATE('1991/01/30' , 'YYYY/MM/DD'),1,3,TO_DATE('2009/03/23' , 'YYYY/MM/DD'),TO_DATE('2015/09/03' , 'YYYY/MM/DD'));
    inEmpleado ('8-694-7497','Samara','Sidebottom',TO_DATE('1978/03/07' , 'YYYY/MM/DD'),3,1,TO_DATE('2010/05/22' , 'YYYY/MM/DD'),TO_DATE('2019/07/20' , 'YYYY/MM/DD'));
    inEmpleado ('7-137-6414','Dukie','McClune',TO_DATE('1982/01/28' , 'YYYY/MM/DD'),1,1,TO_DATE('2016/04/15' , 'YYYY/MM/DD'),TO_DATE('2030/01/08' , 'YYYY/MM/DD'));
    inEmpleado ('9-780-9748','Garwin','Do',TO_DATE('1985/10/05' , 'YYYY/MM/DD'),2,4,TO_DATE('2015/08/03' , 'YYYY/MM/DD'),TO_DATE('2025/09/28' , 'YYYY/MM/DD'));
    inEmpleado ('4-023-6426','Nessa','Clethro',TO_DATE('1995/02/14' , 'YYYY/MM/DD'),2,5,TO_DATE('2010/11/21' , 'YYYY/MM/DD'),TO_DATE('2010/10/04' , 'YYYY/MM/DD'));
    inEmpleado ('5-570-8880','Lynnet','Vasler',TO_DATE('1990/08/15' , 'YYYY/MM/DD'),2,4,TO_DATE('2016/06/24' , 'YYYY/MM/DD'),TO_DATE('2026/06/27' , 'YYYY/MM/DD'));
    inEmpleado ('8-631-7907','Ric','Cameli',TO_DATE('1997/08/21' , 'YYYY/MM/DD'),2,3,TO_DATE('2020/08/03' , 'YYYY/MM/DD'),TO_DATE('2017/09/23' , 'YYYY/MM/DD'));
    inEmpleado ('9-483-2480','Annaliese','Robarts',TO_DATE('1992/07/03' , 'YYYY/MM/DD'),2,1,TO_DATE('2019/04/20' , 'YYYY/MM/DD'),TO_DATE('2014/10/13' , 'YYYY/MM/DD'));
    inEmpleado ('6-755-9379','Mathe','See',TO_DATE('1994/03/23' , 'YYYY/MM/DD'),3,1,TO_DATE('2015/05/30' , 'YYYY/MM/DD'),TO_DATE('2020/02/15' , 'YYYY/MM/DD'));
    inEmpleado ('5-400-4286','Raf','Howlin',TO_DATE('1978/06/16' , 'YYYY/MM/DD'),2,4,TO_DATE('2021/02/25' , 'YYYY/MM/DD'),TO_DATE('2017/12/06' , 'YYYY/MM/DD'));
    inEmpleado ('7-664-9024','Nina','Flamank',TO_DATE('1999/06/14' , 'YYYY/MM/DD'),1,4,TO_DATE('2016/12/24' , 'YYYY/MM/DD'),TO_DATE('2030/03/31' , 'YYYY/MM/DD'));
    inEmpleado ('8-477-9937','Saree','Gummow',TO_DATE('1994/12/13' , 'YYYY/MM/DD'),1,4,TO_DATE('2021/07/20' , 'YYYY/MM/DD'),TO_DATE('2029/11/12' , 'YYYY/MM/DD'));
    inEmpleado ('3-531-0394','Whitaker','Hein',TO_DATE('1980/08/13' , 'YYYY/MM/DD'),1,4,TO_DATE('2022/03/11' , 'YYYY/MM/DD'),TO_DATE('2012/12/18' , 'YYYY/MM/DD'));
    inEmpleado ('8-685-7465','Gloriane','Selburn',TO_DATE('1996/02/05' , 'YYYY/MM/DD'),3,4,TO_DATE('2016/05/26' , 'YYYY/MM/DD'),TO_DATE('2022/07/20' , 'YYYY/MM/DD'));
    inEmpleado ('8-556-6635','Tammie','Kivlehan',TO_DATE('1993/08/09' , 'YYYY/MM/DD'),1,4,TO_DATE('2010/12/13' , 'YYYY/MM/DD'),TO_DATE('2027/07/23' , 'YYYY/MM/DD'));
    inEmpleado ('5-386-7031','Anne','Simmgen',TO_DATE('1990/01/19' , 'YYYY/MM/DD'),2,2,TO_DATE('2018/06/27' , 'YYYY/MM/DD'),TO_DATE('2014/04/30' , 'YYYY/MM/DD'));
    inEmpleado ('6-866-6366','Wendye','McClinton',TO_DATE('2001/09/20' , 'YYYY/MM/DD'),1,2,TO_DATE('2008/11/11' , 'YYYY/MM/DD'),TO_DATE('2024/06/07' , 'YYYY/MM/DD'));
    inEmpleado ('1-853-9365','Dolores','Petrashkov',TO_DATE('1989/01/24' , 'YYYY/MM/DD'),3,4,TO_DATE('2013/01/19' , 'YYYY/MM/DD'),TO_DATE('2028/12/20' , 'YYYY/MM/DD'));
    inEmpleado ('1-095-8439','Matias','Fyall',TO_DATE('1990/11/10' , 'YYYY/MM/DD'),3,1,TO_DATE('2009/07/12' , 'YYYY/MM/DD'),TO_DATE('2022/09/22' , 'YYYY/MM/DD'));
    inEmpleado ('2-539-4891','Markos','Pollock',TO_DATE('1994/05/15' , 'YYYY/MM/DD'),1,3,TO_DATE('2016/12/31' , 'YYYY/MM/DD'),TO_DATE('2019/10/01' , 'YYYY/MM/DD'));
    inEmpleado ('6-295-9928','Eddie','Yakobowitz',TO_DATE('1988/01/07' , 'YYYY/MM/DD'),1,1,TO_DATE('2011/06/14' , 'YYYY/MM/DD'),TO_DATE('2023/05/31' , 'YYYY/MM/DD'));
    inEmpleado ('9-118-2464','Jonis','Corbishley',TO_DATE('1991/03/16' , 'YYYY/MM/DD'),1,3,TO_DATE('2014/02/10' , 'YYYY/MM/DD'),TO_DATE('2025/08/05' , 'YYYY/MM/DD'));
    inEmpleado ('1-639-8355','Alfie','Ayris',TO_DATE('1975/09/22' , 'YYYY/MM/DD'),3,2,TO_DATE('2015/08/07' , 'YYYY/MM/DD'),TO_DATE('2011/12/31' , 'YYYY/MM/DD'));
    inEmpleado ('7-423-9079','Fayth','Allridge',TO_DATE('1998/12/07' , 'YYYY/MM/DD'),1,3,TO_DATE('2009/06/09' , 'YYYY/MM/DD'),TO_DATE('2015/10/18' , 'YYYY/MM/DD'));
    inEmpleado ('1-160-2489','Minnaminnie','Mangon',TO_DATE('1978/05/26' , 'YYYY/MM/DD'),1,5,TO_DATE('2010/11/14' , 'YYYY/MM/DD'),TO_DATE('2030/03/18' , 'YYYY/MM/DD'));
    inEmpleado ('1-621-0578','Luise','Tankin',TO_DATE('1979/11/04' , 'YYYY/MM/DD'),1,3,TO_DATE('2014/11/01' , 'YYYY/MM/DD'),TO_DATE('2024/06/21' , 'YYYY/MM/DD'));
    inEmpleado ('4-268-2031','Creighton','Heis',TO_DATE('1980/03/08' , 'YYYY/MM/DD'),2,3,TO_DATE('2022/05/11' , 'YYYY/MM/DD'),TO_DATE('2027/07/15' , 'YYYY/MM/DD'));
    inEmpleado ('8-703-2562','Jodie','Hukin',TO_DATE('1994/07/01' , 'YYYY/MM/DD'),1,1,TO_DATE('2020/03/12' , 'YYYY/MM/DD'),TO_DATE('2024/10/15' , 'YYYY/MM/DD'));
    inEmpleado ('7-744-4576','Peggie','Eymor',TO_DATE('1983/05/27' , 'YYYY/MM/DD'),1,1,TO_DATE('2021/11/03' , 'YYYY/MM/DD'),TO_DATE('2017/10/11' , 'YYYY/MM/DD'));
    inEmpleado ('8-975-3832','Reggi','O''Towey',TO_DATE('1995/03/06' , 'YYYY/MM/DD'),1,3,TO_DATE('2019/12/26' , 'YYYY/MM/DD'),TO_DATE('2011/03/18' , 'YYYY/MM/DD'));
    inEmpleado ('5-185-4995','Esma','Embleton',TO_DATE('1987/11/28' , 'YYYY/MM/DD'),3,1,TO_DATE('2021/03/20' , 'YYYY/MM/DD'),TO_DATE('2011/01/28' , 'YYYY/MM/DD'));
    inEmpleado ('8-837-2316','Rosmunda','Kier',TO_DATE('1989/11/26' , 'YYYY/MM/DD'),1,4,TO_DATE('2014/07/16' , 'YYYY/MM/DD'),TO_DATE('2023/04/04' , 'YYYY/MM/DD'));
    inEmpleado ('9-247-5600','Fernande','Mattiazzo',TO_DATE('1978/10/23' , 'YYYY/MM/DD'),1,4,TO_DATE('2017/12/29' , 'YYYY/MM/DD'),TO_DATE('2018/02/09' , 'YYYY/MM/DD'));
    inEmpleado ('5-659-5265','Jolee','Wilbor',TO_DATE('1994/02/11' , 'YYYY/MM/DD'),2,5,TO_DATE('2014/07/19' , 'YYYY/MM/DD'),TO_DATE('2021/08/28' , 'YYYY/MM/DD'));
    inEmpleado ('5-332-2896','Gerty','Koba',TO_DATE('1994/01/04' , 'YYYY/MM/DD'),2,3,TO_DATE('2017/02/03' , 'YYYY/MM/DD'),TO_DATE('2011/02/02' , 'YYYY/MM/DD'));
    inEmpleado ('6-498-2152','Branden','Tivers',TO_DATE('1999/01/13' , 'YYYY/MM/DD'),3,4,TO_DATE('2022/04/23' , 'YYYY/MM/DD'),TO_DATE('2023/05/04' , 'YYYY/MM/DD'));
    inEmpleado ('5-221-1880','Cchaddie','Giddons',TO_DATE('1998/09/10' , 'YYYY/MM/DD'),3,3,TO_DATE('2016/10/16' , 'YYYY/MM/DD'),TO_DATE('2026/07/21' , 'YYYY/MM/DD'));
    inEmpleado ('5-047-9724','Alexandra','Middleweek',TO_DATE('1980/11/16' , 'YYYY/MM/DD'),2,1,TO_DATE('2012/12/23' , 'YYYY/MM/DD'),TO_DATE('2024/07/22' , 'YYYY/MM/DD'));
    inEmpleado ('3-670-8924','Flynn','Domniney',TO_DATE('1991/08/31' , 'YYYY/MM/DD'),2,2,TO_DATE('2011/09/19' , 'YYYY/MM/DD'),TO_DATE('2022/05/14' , 'YYYY/MM/DD'));
    inEmpleado ('7-838-2692','Alphard','Pennycord',TO_DATE('1987/05/04' , 'YYYY/MM/DD'),1,5,TO_DATE('2017/03/23' , 'YYYY/MM/DD'),TO_DATE('2028/03/31' , 'YYYY/MM/DD'));
    inEmpleado ('2-200-8073','Leon','Shewan',TO_DATE('1979/06/17' , 'YYYY/MM/DD'),2,2,TO_DATE('2013/08/11' , 'YYYY/MM/DD'),TO_DATE('2013/05/31' , 'YYYY/MM/DD'));
    inEmpleado ('4-107-4742','Fianna','MacSweeney',TO_DATE('2001/01/31' , 'YYYY/MM/DD'),1,4,TO_DATE('2010/12/27' , 'YYYY/MM/DD'),TO_DATE('2025/02/23' , 'YYYY/MM/DD'));
    inEmpleado ('8-787-1334','Leela','Stebbings',TO_DATE('2001/01/15' , 'YYYY/MM/DD'),3,3,TO_DATE('2014/11/23' , 'YYYY/MM/DD'),TO_DATE('2026/02/28' , 'YYYY/MM/DD'));
    inEmpleado ('6-118-8774','Buddie','Tallyn',TO_DATE('1990/07/13' , 'YYYY/MM/DD'),1,3,TO_DATE('2012/10/19' , 'YYYY/MM/DD'),TO_DATE('2024/06/25' , 'YYYY/MM/DD'));
    inEmpleado ('4-358-6397','Megan','Lawler',TO_DATE('2003/01/30' , 'YYYY/MM/DD'),3,1,TO_DATE('2022/03/03' , 'YYYY/MM/DD'),TO_DATE('2019/06/20' , 'YYYY/MM/DD'));
END;
/

BEGIN
    inSuscriptor ('5-869-6834','Michelle','Gabby','Cousans',TO_DATE('3/25/1951', 'MM/DD/YYYY'),TO_DATE('1/22/2022', 'MM/DD/YYYY'));
    inSuscriptor ('7-335-9765','Bard','Tolchar','Bleazard',TO_DATE('10/12/1948', 'MM/DD/YYYY'),TO_DATE('10/11/2022', 'MM/DD/YYYY'));
    inSuscriptor ('4-202-9104','Ossie','Valdes','Meegan',TO_DATE('10/18/1990', 'MM/DD/YYYY'),TO_DATE('12/5/2021', 'MM/DD/YYYY'));
    inSuscriptor ('7-084-5219','Jackson','Bladge','Totterdell',TO_DATE('6/1/1991', 'MM/DD/YYYY'),TO_DATE('8/3/2022', 'MM/DD/YYYY'));
    inSuscriptor ('5-039-5711','Sig','Lobb','Linfitt',TO_DATE('1/31/1990', 'MM/DD/YYYY'),TO_DATE('12/12/2021', 'MM/DD/YYYY'));
    inSuscriptor ('6-930-9413','Mal','Abrashkin','Crucetti',TO_DATE('5/4/1956', 'MM/DD/YYYY'),TO_DATE('3/9/2016', 'MM/DD/YYYY'));
    inSuscriptor ('9-342-7658','Anestassia','Kynman','Durham',TO_DATE('6/20/2003', 'MM/DD/YYYY'),TO_DATE('3/6/2018', 'MM/DD/YYYY'));
    inSuscriptor ('9-655-4094','Rhett','Sibray','Drohun',TO_DATE('12/27/1991', 'MM/DD/YYYY'),TO_DATE('10/2/2022', 'MM/DD/YYYY'));
    inSuscriptor ('6-707-7714','Petunia','Ashmore','Lakeman',TO_DATE('1/16/1978', 'MM/DD/YYYY'),TO_DATE('7/11/2019', 'MM/DD/YYYY'));
    inSuscriptor ('2-727-8276','Tori','Kepp','Clegg',TO_DATE('7/13/1996', 'MM/DD/YYYY'),TO_DATE('8/21/2021', 'MM/DD/YYYY'));
    inSuscriptor ('3-425-0887','Theadora','Swatheridge','Gooder',TO_DATE('1/25/1964', 'MM/DD/YYYY'),TO_DATE('4/8/2022', 'MM/DD/YYYY'));
    inSuscriptor ('8-826-6010','Bail','Munnery','Greensides',TO_DATE('6/25/1980', 'MM/DD/YYYY'),TO_DATE('4/14/2022', 'MM/DD/YYYY'));
    inSuscriptor ('4-392-0766','Adelice','Tichelaar','Simanenko',TO_DATE('8/12/1958', 'MM/DD/YYYY'),TO_DATE('2/14/2021', 'MM/DD/YYYY'));
    inSuscriptor ('9-477-0708','Joelie','Kennally','Edson',TO_DATE('1/8/1968', 'MM/DD/YYYY'),TO_DATE('11/29/2021', 'MM/DD/YYYY'));
    inSuscriptor ('4-009-9047','Francisca','Calbrathe','Fairrie',TO_DATE('1/12/1985', 'MM/DD/YYYY'),TO_DATE('5/23/2021', 'MM/DD/YYYY'));
    inSuscriptor ('7-334-4457','Mallorie','Osbaldeston','Parlet',TO_DATE('10/2/1957', 'MM/DD/YYYY'),TO_DATE('1/27/2022', 'MM/DD/YYYY'));
    inSuscriptor ('7-461-3016','Juan','Dietz','Gowanson',TO_DATE('7/19/1954', 'MM/DD/YYYY'),TO_DATE('10/6/2022', 'MM/DD/YYYY'));
    inSuscriptor ('5-685-1046','Sofie','Dimbleby','Grichukhin',TO_DATE('12/24/1957', 'MM/DD/YYYY'),TO_DATE('3/17/2022', 'MM/DD/YYYY'));
    inSuscriptor ('7-564-2266','Kerby','Kisar','MacGoun',TO_DATE('4/17/1977', 'MM/DD/YYYY'),TO_DATE('4/16/2021', 'MM/DD/YYYY'));
    inSuscriptor ('6-395-5832','Thibaut','Finlan','Trask',TO_DATE('3/7/2003', 'MM/DD/YYYY'),TO_DATE('5/31/2021', 'MM/DD/YYYY'));
    inSuscriptor ('9-882-3088','Allistir','Yurchenko','Behneke',TO_DATE('10/12/1958', 'MM/DD/YYYY'),TO_DATE('10/29/2022', 'MM/DD/YYYY'));
    inSuscriptor ('7-481-3268','Nerissa','Dericut','Kasman',TO_DATE('7/3/1952', 'MM/DD/YYYY'),TO_DATE('5/25/2019', 'MM/DD/YYYY'));
    inSuscriptor ('4-101-6962','Dorisa','Twinbourne','Joslin',TO_DATE('6/27/1985', 'MM/DD/YYYY'),TO_DATE('11/14/2022', 'MM/DD/YYYY'));
    inSuscriptor ('3-968-0305','Teriann','Bonaire','Anwell',TO_DATE('7/13/1995', 'MM/DD/YYYY'),TO_DATE('6/17/2021', 'MM/DD/YYYY'));
    inSuscriptor ('5-477-1019','Delmor','Stibbs','Wyeth',TO_DATE('9/6/1984', 'MM/DD/YYYY'),TO_DATE('12/10/2021', 'MM/DD/YYYY'));
    inSuscriptor ('1-233-9962','Cecil','Spellessy','Hamshar',TO_DATE('7/14/1965', 'MM/DD/YYYY'),TO_DATE('1/4/2021', 'MM/DD/YYYY'));
    inSuscriptor ('5-165-9724','Dionis','Demaine','Well',TO_DATE('10/5/1948', 'MM/DD/YYYY'),TO_DATE('7/19/2021', 'MM/DD/YYYY'));
    inSuscriptor ('5-104-0184','Davon','Tampling','Clark',TO_DATE('4/1/1976', 'MM/DD/YYYY'),TO_DATE('11/29/2021', 'MM/DD/YYYY'));
    inSuscriptor ('6-964-2157','Ancell','Herreran','Linnit',TO_DATE('12/31/1972', 'MM/DD/YYYY'),TO_DATE('5/26/2019', 'MM/DD/YYYY'));
    inSuscriptor ('9-880-3570','Quillan','Lequeux','Rosedale',TO_DATE('11/8/1986', 'MM/DD/YYYY'),TO_DATE('9/27/2021', 'MM/DD/YYYY'));
    inSuscriptor ('2-668-0720','Rica','Hubach','Rawnsley',TO_DATE('2/19/1961', 'MM/DD/YYYY'),TO_DATE('4/12/2019', 'MM/DD/YYYY'));
    inSuscriptor ('3-458-1412','Eveline','Walenta','Maasze',TO_DATE('7/12/1969', 'MM/DD/YYYY'),TO_DATE('1/15/2022', 'MM/DD/YYYY'));
    inSuscriptor ('2-326-8001','Abel','Apple','Goulborne',TO_DATE('1/24/1951', 'MM/DD/YYYY'),TO_DATE('8/27/2021', 'MM/DD/YYYY'));
    inSuscriptor ('2-564-5011','Franzen','Daish','Millar',TO_DATE('9/25/1996', 'MM/DD/YYYY'),TO_DATE('5/17/2019', 'MM/DD/YYYY'));
    inSuscriptor ('2-556-8061','Martie','Hookes','Hallum',TO_DATE('1/29/1964', 'MM/DD/YYYY'),TO_DATE('10/13/2020', 'MM/DD/YYYY'));
    inSuscriptor ('6-271-4565','Noll','Compston','Seywood',TO_DATE('2/27/1995', 'MM/DD/YYYY'),TO_DATE('11/15/2020', 'MM/DD/YYYY'));
    inSuscriptor ('9-684-9648','Jennee','Kemwall','Ropert',TO_DATE('4/7/1961', 'MM/DD/YYYY'),TO_DATE('8/9/20', 'MM/DD/YYYY'));
    inSuscriptor ('9-843-2921','Gretal','Hurring','Lambrecht',TO_DATE('10/2/1959', 'MM/DD/YYYY'),TO_DATE('2/28/2018', 'MM/DD/YYYY'));
    inSuscriptor ('8-432-6293','Iona','Hirschmann','Rzehorz',TO_DATE('8/13/1970', 'MM/DD/YYYY'),TO_DATE('5/7/2022', 'MM/DD/YYYY'));
    inSuscriptor ('1-182-5196','Nancey','Brassington','Luard',TO_DATE('3/6/1981', 'MM/DD/YYYY'),TO_DATE('2/18/2020', 'MM/DD/YYYY'));
    inSuscriptor ('3-053-8493','Noel','McSporon','Bradborne',TO_DATE('9/22/1997', 'MM/DD/YYYY'),TO_DATE('12/12/2019', 'MM/DD/YYYY'));
    inSuscriptor ('5-048-0777','Kassandra','Bolf','Latty',TO_DATE('3/4/1984', 'MM/DD/YYYY'),TO_DATE('1/22/2021', 'MM/DD/YYYY'));
    inSuscriptor ('5-562-9882','Nate','Caddock','Ewers',TO_DATE('2/4/1968', 'MM/DD/YYYY'),TO_DATE('7/23/2021', 'MM/DD/YYYY'));
    inSuscriptor ('3-691-7001','Blake','Scorer','Prest',TO_DATE('12/30/1945', 'MM/DD/YYYY'),TO_DATE('8/14/2022', 'MM/DD/YYYY'));
    inSuscriptor ('1-086-0296','Evelyn','Theobalds','Burdoun',TO_DATE('2/24/1996', 'MM/DD/YYYY'),TO_DATE('3/15/2018', 'MM/DD/YYYY'));
    inSuscriptor ('1-383-3183','Halette','Jamme','Orts',TO_DATE('7/27/1948', 'MM/DD/YYYY'),TO_DATE('3/10/2019', 'MM/DD/YYYY'));
    inSuscriptor ('9-093-8237','Claybourne','Kohtler','Trollope',TO_DATE('7/21/1968', 'MM/DD/YYYY'),TO_DATE('1/28/2021', 'MM/DD/YYYY'));
    inSuscriptor ('8-022-6296','Bernice','Blouet','Noton',TO_DATE('4/27/1961', 'MM/DD/YYYY'),TO_DATE('7/7/2022', 'MM/DD/YYYY'));
    inSuscriptor ('1-291-5672','Lemmy','Poole','Ettery',TO_DATE('5/31/1955', 'MM/DD/YYYY'),TO_DATE('3/25/2018', 'MM/DD/YYYY'));
    inSuscriptor ('2-984-6216','Etty','Nockalls','Frontczak',TO_DATE('9/9/1955', 'MM/DD/YYYY'),TO_DATE('1/12/2021', 'MM/DD/YYYY'));
END;
/

--Insercion por procemiento a tabla TipoTelefono Sucursal
BEGIN
    inTipoTelefono_Suc (1, 'Fijo 1');
    inTipoTelefono_Suc (2, 'Fijo 2');
    inTipoTelefono_Suc (3, 'Whatsapp');
END;
/

--Insercion por procemiento a tabla TipoTelefono Suscriptor
BEGIN
    inTipoTelefono_Sus (1, 'Personal');
    inTipoTelefono_Sus (2, 'Trabajo');
    inTipoTelefono_Sus (3, 'Domicilio');
    inTipoTelefono_Sus (4, 'Conyugue');
    inTipoTelefono_Sus (5, 'Madre');
    inTipoTelefono_Sus (6, 'Padre');
END;
/

--Insercion por procedimiento Telefono Suscriptor
BEGIN
    inTelSuscriptor (1, 1, '2919-505');
    inTelSuscriptor (2, 1, '2729-441');
    inTelSuscriptor (3, 1, '2043-839');
    inTelSuscriptor (4, 1, '2061-803');
    inTelSuscriptor (5, 1, '2481-067');
    inTelSuscriptor (6, 1, '2900-972');
    inTelSuscriptor (7, 1, '2111-258');
    inTelSuscriptor (8, 1, '2651-440');
    inTelSuscriptor (9, 1, '2236-617');
    inTelSuscriptor (10, 1, '2912-303');
    inTelSuscriptor (11, 1, '2896-260');
    inTelSuscriptor (12, 1, '2541-931');
    inTelSuscriptor (13, 1, '2445-985');
    inTelSuscriptor (14, 1, '2517-459');
    inTelSuscriptor (15, 1, '2270-950');
    inTelSuscriptor (16, 1, '2398-927');
    inTelSuscriptor (17, 1, '2381-921');
    inTelSuscriptor (18, 1, '2020-304');
    inTelSuscriptor (19, 1, '2366-096');
    inTelSuscriptor (20, 1, '2285-470');
    inTelSuscriptor (21, 1, '2936-402');
    inTelSuscriptor (22, 1, '2908-765');
    inTelSuscriptor (23, 1, '2119-138');
    inTelSuscriptor (24, 1, '2549-506');
    inTelSuscriptor (25, 1, '2132-789');
    inTelSuscriptor (26, 1, '2577-139');
    inTelSuscriptor (27, 1, '2135-724');
    inTelSuscriptor (28, 1, '2257-038');
    inTelSuscriptor (29, 1, '2182-092');
    inTelSuscriptor (30, 1, '2396-949');
    inTelSuscriptor (31, 1, '2540-511');
    inTelSuscriptor (32, 1, '2183-491');
    inTelSuscriptor (33, 1, '2523-419');
    inTelSuscriptor (34, 1, '2163-527');
    inTelSuscriptor (35, 1, '2461-373');
    inTelSuscriptor (36, 1, '2830-772');
    inTelSuscriptor (37, 1, '2981-432');
    inTelSuscriptor (38, 1, '2697-775');
    inTelSuscriptor (39, 1, '2440-866');
    inTelSuscriptor (40, 1, '2140-110');
    inTelSuscriptor (41, 1, '2982-596');
    inTelSuscriptor (42, 1, '2541-310');
    inTelSuscriptor (43, 1, '2276-174');
    inTelSuscriptor (44, 1, '2843-922');
    inTelSuscriptor (45, 1, '2780-248');
    inTelSuscriptor (46, 1, '2448-563');
    inTelSuscriptor (47, 1, '2081-422');
    inTelSuscriptor (48, 1, '2209-195');
    inTelSuscriptor (49, 1, '2409-970');
    inTelSuscriptor (50, 1, '2919-052');
    inTelSuscriptor (1, 6, '2979-339');
    inTelSuscriptor (2, 6, '2175-883');
    inTelSuscriptor (3, 5, '2772-848');
    inTelSuscriptor (4, 5, '2921-032');
    inTelSuscriptor (5, 2, '2358-681');
    inTelSuscriptor (6, 3, '2851-444');
    inTelSuscriptor (7, 2, '2848-243');
    inTelSuscriptor (8, 3, '2681-347');
    inTelSuscriptor (9, 2, '2853-423');
    inTelSuscriptor (10, 6, '2663-320');
    inTelSuscriptor (11, 5, '2981-837');
    inTelSuscriptor (12, 2, '2399-923');
    inTelSuscriptor (13, 3, '2753-332');
    inTelSuscriptor (14, 4, '2752-986');
    inTelSuscriptor (15, 5, '2726-900');
    inTelSuscriptor (16, 4, '2075-389');
    inTelSuscriptor (17, 2, '2591-381');
    inTelSuscriptor (18, 6, '2470-696');
    inTelSuscriptor (19, 2, '2611-519');
    inTelSuscriptor (20, 4, '2313-281');
    inTelSuscriptor (21, 2, '2457-679');
    inTelSuscriptor (22, 4, '2790-036');
    inTelSuscriptor (23, 2, '2148-724');
    inTelSuscriptor (24, 3, '2192-185');
    inTelSuscriptor (25, 2, '2265-117');
    inTelSuscriptor (26, 2, '2248-485');
    inTelSuscriptor (27, 5, '2841-959');
    inTelSuscriptor (28, 4, '2669-813');
    inTelSuscriptor (29, 3, '2423-456');
    inTelSuscriptor (30, 2, '2717-468');
    inTelSuscriptor (31, 2, '2375-781');
    inTelSuscriptor (32, 6, '2639-497');
    inTelSuscriptor (33, 2, '2657-666');
    inTelSuscriptor (34, 4, '2742-320');
    inTelSuscriptor (35, 2, '2952-547');
    inTelSuscriptor (36, 4, '2395-323');
    inTelSuscriptor (37, 2, '2234-949');
    inTelSuscriptor (38, 5, '2693-028');
    inTelSuscriptor (39, 2, '2568-491');
    inTelSuscriptor (40, 6, '2932-999');
    inTelSuscriptor (41, 5, '2698-023');
    inTelSuscriptor (42, 5, '2848-451');
    inTelSuscriptor (43, 5, '2502-012');
    inTelSuscriptor (44, 3, '2785-676');
    inTelSuscriptor (45, 2, '2448-781');
    inTelSuscriptor (46, 5, '2983-994');
    inTelSuscriptor (47, 2, '2022-514');
    inTelSuscriptor (48, 2, '2172-346');
    inTelSuscriptor (49, 4, '2780-877');
    inTelSuscriptor (50, 2, '2248-900');
END;
/

--Insercion por procedimiento Telefono Sucursal
BEGIN
    inTelSucursal (1, 1, '2290-791');
    inTelSucursal (2, 1, '2268-590');
    inTelSucursal (3, 1, '2989-847');
    inTelSucursal (4, 1, '2357-418');
    inTelSucursal (5, 1, '2999-116');
    inTelSucursal (1, 2, '2348-234');
    inTelSucursal (2, 2, '2270-797');
    inTelSucursal (3, 2, '2020-132');
    inTelSucursal (4, 2, '2923-025');
    inTelSucursal (5, 3, '6724-8199');
END;
/

BEGIN
    inPedido('21/10/2008', 14, 5, 9, 10);
    inPedido('12/12/2008', 40, 5, 3, 10);
    inPedido('18/1/2009', 4, 3, 2, 32);
    inPedido('2/6/2009', 50, 2, 5, 46);
    inPedido('27/6/2009', 20, 5, 3, 39);
    inPedido('19/9/2009', 33, 5, 4, 39);
    inPedido('10/6/2009', 16, 4, 7, 2);
    inPedido('10/8/2009', 28, 5, 9, 39);
    inPedido('11/10/2009', 37, 4, 8, 15);
    inPedido('11/3/2009', 39, 3, 6, 40);
    inPedido('25/1/2010', 30, 4, 7, 15);
    inPedido('15/10/2010', 6, 1, 6, 13);
    inPedido('25/1/2011', 10, 2, 1, 44);
    inPedido('3/2/2011', 17, 2, 7, 44);
    inPedido('29/5/2011', 19, 4, 10, 11);
    inPedido('11/9/2011', 3, 4, 2, 15);
    inPedido('2/4/2012', 34, 1, 10, 15);
    inPedido('30/5/2012', 1, 2, 9, 46);
    inPedido('11/5/2012', 23, 5, 4, 39);
    inPedido('20/5/2013', 38, 1, 3, 13);
    inPedido('19/10/2013', 43, 2, 2, 44);
    inPedido('12/5/2013', 35, 3, 10, 12);
    inPedido('6/3/2014', 24, 4, 4, 2);
    inPedido('8/4/2014', 22, 3, 4, 12);
    inPedido('10/12/2014', 15, 2, 5, 46);
    inPedido('10/12/2015', 42, 4, 6, 2);
    inPedido('19/7/2016', 32, 1, 6, 43);
    inPedido('24/10/2016', 45, 2, 7, 44);
    inPedido('27/11/2016', 49, 2, 10, 21);
    inPedido('15/8/2017', 27, 5, 5, 10);
    inPedido('11/2/2018', 2, 4, 2, 9);
    inPedido('10/9/2018', 46, 5, 10, 39);
    inPedido('21/11/2018', 8, 2, 1, 1);
    inPedido('11/5/2019', 5, 4, 3, 15);
    inPedido('16/4/2020', 18, 4, 7, 11);
    inPedido('17/9/2020', 9, 3, 3, 40);
    inPedido('11/4/2020', 12, 3, 8, 40);
    inPedido('14/11/2021', 21, 4, 6, 11);
    inPedido('16/11/2021', 25, 3, 7, 12);
    inPedido('29/12/2021', 41, 2, 4, 1);
    inPedido('22/4/2022', 44, 3, 6, 12);
    inPedido('21/10/2022', 31, 2, 7, 46);
END;
/

BEGIN
    inPedido_Producto(1, 38, 3);
    inPedido_Producto(2, 6, 1);
    inPedido_Producto(3, 36, 3);
    inPedido_Producto(4, 24, 1);
    inPedido_Producto(5, 23, 1);
    inPedido_Producto(6, 28, 1);
    inPedido_Producto(7, 12, 1);
    inPedido_Producto(8, 3, 1);
    inPedido_Producto(9, 4, 1);
    inPedido_Producto(10, 10, 1);
    inPedido_Producto(11, 39, 3);
    inPedido_Producto(12, 21, 2);
    inPedido_Producto(13, 32, 4);
    inPedido_Producto(14, 18, 1);
    inPedido_Producto(15, 46, 3);
    inPedido_Producto(16, 22, 1);
    inPedido_Producto(17, 29, 1);
    inPedido_Producto(18, 47, 1);
    inPedido_Producto(19, 2, 2);
    inPedido_Producto(20, 34, 3);
    inPedido_Producto(21, 25, 4);
    inPedido_Producto(22, 14, 5);
    inPedido_Producto(23, 9, 8);
    inPedido_Producto(24, 11, 1);
    inPedido_Producto(25, 5, 5);
    inPedido_Producto(26, 15, 4);
    inPedido_Producto(27, 1, 1);
    inPedido_Producto(28, 40, 1);
    inPedido_Producto(29, 20, 2);
    inPedido_Producto(30, 16, 2);
    inPedido_Producto(31, 30, 2);
    inPedido_Producto(32, 13, 1);
    inPedido_Producto(33, 37, 8);
    inPedido_Producto(34, 33, 1);
    inPedido_Producto(35, 43, 2);
    inPedido_Producto(36, 8, 5);
    inPedido_Producto(37, 49, 1);
    inPedido_Producto(38, 31, 5);
    inPedido_Producto(39, 27, 4);
    inPedido_Producto(40, 45, 5);
    inPedido_Producto(41, 50, 2);
    inPedido_Producto(42, 19, 1);
    inPedido_Producto(1, 44, 2);
    inPedido_Producto(2, 48, 5);
    inPedido_Producto(3, 42, 3);
    inPedido_Producto(4, 26, 2);
    inPedido_Producto(5, 7, 2);
    inPedido_Producto(6, 41, 1);
    inPedido_Producto(7, 17, 1);
    inPedido_Producto(8, 35, 1);
    inPedido_Producto(9, 11, 1);
    inPedido_Producto(10, 26, 3);
    inPedido_Producto(11, 18, 1);
    inPedido_Producto(12, 32, 1);
    inPedido_Producto(13, 45, 1);
    inPedido_Producto(14, 15, 5);
    inPedido_Producto(15, 49, 1);
    inPedido_Producto(16, 23, 1);
    inPedido_Producto(17, 34, 1);
    inPedido_Producto(18, 20, 1);
    inPedido_Producto(19, 12, 2);
    inPedido_Producto(20, 48, 2);
    inPedido_Producto(21, 16, 3);
    inPedido_Producto(22, 50, 1);
    inPedido_Producto(23, 38, 4);
    inPedido_Producto(24, 2, 5);
    inPedido_Producto(25, 39, 1);
    inPedido_Producto(26, 13, 1);
    inPedido_Producto(27, 25, 1);
    inPedido_Producto(28, 5, 1);
    inPedido_Producto(29, 47, 2);
    inPedido_Producto(30, 9, 5);
    inPedido_Producto(31, 6, 2);
    inPedido_Producto(32, 44, 7);
    inPedido_Producto(33, 30, 2);
    inPedido_Producto(34, 42, 3);
    inPedido_Producto(35, 7, 1);
    inPedido_Producto(36, 37, 1);
    inPedido_Producto(37, 43, 1);
    inPedido_Producto(38, 27, 3);
    inPedido_Producto(39, 19, 4);
    inPedido_Producto(40, 22, 3);
    inPedido_Producto(41, 49, 3);
    inPedido_Producto(42, 14, 1);
END;
/
-- Vistas
/* 1. Consulta los pedidos y cual suscriptor fue el que lo realizo junto al monto total de dicho pedido*/
CREATE VIEW PedidoSuscriptor AS
    SELECT	p.idPedido Codigo_Pedido,
            s.numSuscriptor Numero_Suscriptor, 
            (s.pNombre || ' ' || s.apellidoP) Nombre, 
            p.montoTotal 
        FROM Suscriptor s 
            JOIN Pedido p 
                ON s.numSuscriptor = p.numSuscriptor 
    ORDER BY p.idPedido;

/* 2. Despliega los Suscriptores que han gastado más de 200 dolares,
tomando en cuenta todos sus pedidos en todas las sucursales en forma descendente */
CREATE VIEW CompraSuscriptor AS
    SELECT	s.numSuscriptor Numero_Suscriptor,  
            (s.pNombre || ' ' || s.apellidoP) Nombre, 
            sum(p.montoTotal) Total_Comprado
        FROM Suscriptor s
            JOIN Pedido p
                ON s.numSuscriptor = p.numSuscriptor
    GROUP BY s.numSuscriptor, (s.pNombre || ' ' || s.apellidoP)
    HAVING sum(p.montoTotal) > 200
    ORDER BY Total_Comprado DESC;

/*	3. Cuenta la cantidad de empleados que existen por posicion y despliega el porcentaje que representan cada uno. */
CREATE VIEW PorcenPosiciones AS
    SELECT	e.posicion, p.descripcion Posicion_Nombre, 
            (COUNT(e.posicion) / 50.0 * 100 || '%') Porcentaje_Posiciones
        FROM Empleado e JOIN Posicion p ON e.Posicion = p.idPosicion
    GROUP BY e.posicion, p.descripcion;


/* 4. Consulta cuantas unidades han sido vendidas de cada producto junto con su nombre en orden descendente*/
CREATE VIEW VentasProductos AS
    SELECT	p.idProducto Codigo_Producto,
            p.nombre Nombre_Producto, 
            sum(pp.cantidad) Unidades_Vendidas
        FROM Pedido_Producto pp 
            JOIN Producto p 
                ON pp.idProducto = p.idProducto 
    GROUP BY p.idProducto, p.nombre
    ORDER BY Unidades_Vendidas DESC;