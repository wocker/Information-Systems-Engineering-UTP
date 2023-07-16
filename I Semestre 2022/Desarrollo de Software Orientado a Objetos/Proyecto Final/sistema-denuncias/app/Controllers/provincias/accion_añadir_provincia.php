<html lang="es">
<head>
    <title>Añadir Categoria</title>
    <link rel="stylesheet" href="../../../public/css/main.css">
    <link rel="icon" type="image/x-icon" href="../../../public/imgs/denuncia_icon.jpg">
</head>


<body>
<?php


// Incluye la clase CRUD que contiene los métodos para insertar, eliminar y ejecutar consultas
include_once("../../Models/CRUD.php");

// Iniciar sesion
session_start();

$si_provincia = new CRUD();


if (isset($_POST['Submit'])) {
    // Categoria
//   Nombre de categoria
    $nombre_provincia = ($_POST['nombre_provincia']);
    //Insertando datos en la base de datos
    $result = $si_provincia->execute("INSERT INTO provincia(nombre_provincia,created_at, updated_at) 
    VALUES('$nombre_provincia', NOW(), NOW())");


}
?>

<div class="logout-container">
    <h1 class="success-title">La provincia ha sido añadida correctamente.</h1>
    <a class="logout-link" href='../../../resources/views/admin/admin-index.php'>Regresar</a>
</div>





</body>
</html>
1