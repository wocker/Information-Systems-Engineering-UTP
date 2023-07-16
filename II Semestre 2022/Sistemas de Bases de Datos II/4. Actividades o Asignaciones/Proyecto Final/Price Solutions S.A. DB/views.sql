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
