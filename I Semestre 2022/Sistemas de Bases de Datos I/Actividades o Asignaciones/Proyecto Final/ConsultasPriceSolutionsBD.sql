/* 1. Consulta los pedidos y cual suscriptor fue el que lo realizo junto al monto total de dicho pedido*/

SELECT	p.idPedido AS 'Codigo del Pedido',
		s.cedSuscriptor AS 'Cedula de Suscriptor', 
		s.pNombre + s.apellidoP AS 'Nombre', 
		p.montoTotal 
	FROM Suscriptor AS s 
		INNER JOIN Pedido AS p 
			ON s.cedSuscriptor = p.cedSuscriptor 
ORDER BY p.idPedido

/* 2. Despliega los Suscriptores que han gastado más de 1000 dolares,
tomando en cuenta todos sus pedidos en todas las sucursales en forma descendente */

SELECT	s.cedSuscriptor AS 'Codigo del Pedido',  
		s.pNombre + ' ' + s.apellidoP AS 'Nombre', 
		sum(p.montoTotal) AS 'Total Comprado'
	FROM Suscriptor AS s 
		INNER JOIN Pedido AS p 
			ON s.cedSuscriptor = p.cedSuscriptor 
GROUP BY s.cedSuscriptor, (s.pNombre + ' ' + s.apellidoP)
HAVING sum(p.montoTotal) > 1000
ORDER BY [Total Comprado] DESC

/*	3. Cuenta la cantidad de empleados que existen por posicion y despliega el porcentaje que representan cada uno. */

SELECT	posicion AS 'Abreviatura de Posición', 
		CONCAT(COUNT(posicion) / 50.0 * 100 , '%') AS 'Porcentaje de Empleados'
	FROM Empleado 
GROUP BY posicion

/* 4. Despliega cada Empleado y la localización de la sucursal donde trabaja */

SELECT	cedEmpleado AS 'Cédula de Empleado', 
		(e.nombre + ' ' + e.apellido) AS 'Nombre de Empleado', 
		s.localizacion AS 'Trabaja En' 
	FROM Empleado AS e 
		INNER JOIN Sucursal AS s 
			ON e.numSucursal = s.numSucursal
ORDER BY [Trabaja En]

/* 5. Consulta cuantas unidades han sido vendidas de cada producto junto con su nombre en orden descendente*/

SELECT	p.idProducto AS 'Codigo de Producto',
		p.nombre AS 'Nombre del Producto', 
		sum(pp.cantidad) AS 'Unidades Vendidas'
	FROM Pedido_Producto AS pp 
		INNER JOIN Producto AS p 
			ON pp.idProducto = p.idProducto 
GROUP BY p.idProducto, p.nombre
ORDER BY [Unidades Vendidas] DESC

/* 6. Despliega la fecha de los pedidos con el nombre y numeros de telefonos correspondientes, de todos los suscriptores 
cuyo lugar de nacimiento es en Los Santos, */

SELECT	(s.pNombre + ' ' + s.apellidoP) [Nombre],
		(SELECT telefono + '; '
		FROM TelSuscriptor ts
		WHERE s.cedSuscriptor = ts.cedSuscriptor
		FOR XML PATH('')) [Teléfonos] ,
		p.idPedido,
		p.fecha AS 'Fecha de Pedido'
	FROM Suscriptor AS s
		JOIN Pedido AS p
			ON s.cedSuscriptor = p.cedSuscriptor
WHERE s.cedSuscriptor LIKE '7%'
ORDER BY p.fecha

/* 7. Muestra todos los empleados y su respectiva posición, que trabajan en la Sucursal de El Dorado  */

SELECT	nombre,
		apellido,
		posicion
	FROM Empleado
	WHERE numSucursal IN 
			(
			SELECT numSucursal
			FROM Sucursal
			WHERE localizacion = 'Panamá, El Dorado'
			)
ORDER BY posicion

/* 8. Refleja la cantidad de pedidos que se han realizado desde la apertura de las sucursales, incluyendo el nombre del suscriptor
y su cedula */

SELECT	p2.pNombre + ' ' + p2.apellidoP AS 'Nombre',
		p2.cedSuscriptor AS 'Cedula', 
		p3.precio AS 'Total Gastado',
		p3.cantidad AS 'Cantidad de Productos' 
	FROM Pedido AS p1 
		INNER JOIN Suscriptor AS p2
			ON p1.cedSuscriptor = p2.cedSuscriptor
		INNER JOIN Pedido_Producto AS p3
			ON p1.idPedido = p3.idPedido
ORDER BY p2.pNombre
