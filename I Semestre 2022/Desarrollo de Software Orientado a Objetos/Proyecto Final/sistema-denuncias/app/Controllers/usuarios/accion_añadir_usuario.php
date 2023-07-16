<html lang="es">
<head>
    <title>Añadir usuario</title>
    <link rel="stylesheet" href="../../../public/css/main.css">
    <link rel="icon" type="image/x-icon" href="../../../public/imgs/denuncia_icon.jpg">
</head>

<body>
<?php


// Incluye la clase CRUD que contiene los métodos para insertar, eliminar y ejecutar consultas
include_once("../../Models/CRUD.php");

// Iniciar sesion
session_start();

$si_usuario = new CRUD();


if (isset($_POST['Submit'])) {
    // Categoria
//   Nombre del usuario
    $nombre_usuario = ($_POST['nombre_usuario']);
    // Apellido del usuario
    $apellido_usuario = ($_POST['apellido_usuario']);
    // Telefono
    $telefono = ($_POST['telefono']);
    // Correo electronico
    $correo_electronico = ($_POST['correo_electronico']);

    //Insertando datos en la base de datos
    $result = $si_usuario->execute("INSERT INTO usuario(nombre_usuario,apellido_usuario, 
                      correo_usuario, cel_usuario, created_at, updated_at) 
    VALUES('$nombre_usuario','$apellido_usuario', '$correo_electronico', '$telefono', NOW(), NOW())");

}
?>

<div class="logout-container">
    <h1 class="success-title">El usuario ha sido añadido correctamente.</h1>
    <a class="logout-link" href='../../../resources/views/admin/admin-index.php'>Regresar</a>
</div>



</body>
</html>
