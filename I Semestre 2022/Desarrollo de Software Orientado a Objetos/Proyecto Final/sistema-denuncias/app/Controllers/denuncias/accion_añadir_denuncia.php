<html lang="es">
<head>
    <title>Añadir denuncia</title>
    <link rel="stylesheet" href="../../../public/css/main.css">
    <link rel="icon" type="image/x-icon" href="../../../public/imgs/denuncia_icon.jpg">

</head>


<body>

<?php


// Incluye la clase CRUD que contiene los métodos para insertar, eliminar y ejecutar consultas
include_once("../../Models/CRUD.php");

// Iniciar sesion
session_start();

// Inicializa una variable con los métodos del CRUD
$si_denuncia = new CRUD();


if (isset($_POST['Submit'])) {
    // Ciudadano
    $ciudadano = $_SESSION['id'];
    // Categoria
    $categoria_denuncia = ($_POST['categoria']);
    // Provincia
    $provincia_denuncia = ($_POST['provincia']);
    // Descripcion de denuncia
    $desc_denuncia = ($_POST['denuncia']);
    // Estatus denuncia
    $estatus_denuncia = 'A';
    // Lugar de denuncia
    $lugar_denuncia = $_POST['lugar_denuncia'];
    // Fecha de denuncia
    $fecha_denuncia = $_POST['fecha_denuncia'];


    //insert data to database
    $result = $si_denuncia->execute("INSERT INTO denuncia(id_ciudadano,id_provincia, id_categoria, desc_denuncia, estatus_denuncia, lugar_denuncia, fecha_denuncia, created_at, updated_at) 
    VALUES('$ciudadano','$provincia_denuncia','$categoria_denuncia', '$desc_denuncia', '$estatus_denuncia', '$lugar_denuncia', '$fecha_denuncia', NOW(), NOW())");

}
?>


<div class="logout-container">
    <h1 class="logout-title">La denuncia ha sido añadida </h1>
    <a class="logout-link" href="/sistema-denuncias">Vuelve al inicio</a>
</div>

</body>
</html>
