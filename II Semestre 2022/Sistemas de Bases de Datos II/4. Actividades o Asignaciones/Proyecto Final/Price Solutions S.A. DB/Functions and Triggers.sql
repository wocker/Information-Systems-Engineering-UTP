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

-- TRIGGERS 
    /*Actualiza la cantidad en la Tabla Producto tras una compra
    y modifica el monto total del pedido donde se encuentra el
    producto*/
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
            USER,'INSERT',:new.idProducto, :new.precioUnitario);
            COMMIT;
        ELSIF UPDATING THEN
            INSERT INTO aud_Producto
            VALUES (seq_idAud_Prod.NEXTVAL,TO_DATE(SYSDATE,'DD/MM/YYYY HH:MI:SS'),
            USER,'UPDATE',:new.idProducto,:old.PrecioUnitario, :new.PrecioUnitario, (:new.PrecioUnitario/:old.PrecioUnitario)*100);
        END IF;
END trig_Aud_Prod; 
