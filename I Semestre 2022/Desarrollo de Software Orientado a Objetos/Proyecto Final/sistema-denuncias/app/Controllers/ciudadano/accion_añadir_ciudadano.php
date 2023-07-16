<html lang="es">

<head>
    <title>Añadir Ciudadano</title>
    <link rel="stylesheet" href="../../../public/css/main.css">
    <link rel="icon" type="image/x-icon" href="../../../public/imgs/denuncia_icon.jpg">
</head>

<body>
<?php


// Incluye la clase CRUD
include_once("../../Models/CRUD.php");

// Inicia la sesión para obtener el id del usuario.
session_start();

// Inicializa una variable con los métodos del CRUD
$si_ciudadano = new CRUD();

// Si la sentencia del formulario es submit (enviar)
if (isset($_POST['Submit'])) {
    //  Obtener Nombre del ciudadano
    $nombre_ciudadano = ($_POST['nombre_ciudadano']);
    // Obtener Apellido del Ciudadano
    $apellido_ciudadano = ($_POST['apellido_ciudadano']);
    // Obtener Lugar donde reside
    $lugar_reside = ($_POST['lugar_reside']);
    // Obtener Teléfono
    $telefono = ($_POST['telefono']);
    // Obtener Correo electronico
    $correo_electronico = ($_POST['correo_electronico']);

    //Insertando datos en la base de datos
    $result = $si_ciudadano->execute("INSERT INTO ciudadano(nombre_ciudadano,apellido_ciudadano, 
                      lugar_reside, telefono, correo_electronico, created_at, updated_at) 
    VALUES('$nombre_ciudadano','$apellido_ciudadano', '$lugar_reside', '$telefono', '$correo_electronico', NOW(), NOW())");

}
?>

<body>

<div class="logout-container">
    <h1 class="success-title">El ciudadano sido añadido correctamente.</h1>
    <a class="logout-link" href='../../../resources/views/admin/admin-index.php'>Regresar</a>
</div>

</body>


</body>
</html>