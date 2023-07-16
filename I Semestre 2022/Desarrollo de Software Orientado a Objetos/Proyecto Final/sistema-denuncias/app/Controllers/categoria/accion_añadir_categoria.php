<html lang="es">

<head>
    <title>Añadir Categoria</title>
    <link rel="stylesheet" href="../../../public/css/main.css">
    <link rel="icon" type="image/x-icon" href="../../../public/imgs/denuncia_icon.jpg">
</head>

<body>

<?php


// Importando las funciones de la clase del CRUD
include_once("../../Models/CRUD.php");

// Iniciar sesion
session_start();

$si_categoria = new CRUD();


if (isset($_POST['Submit'])) {
    // Categoria
//   Nombre de categoria
    $nombre_categoria = ($_POST['nombre_categoria']);
    // Entidad Responsable
    $entidad_responsable = ($_POST['entidad_responsable']);
    // Correo electronico
    $correo_electronico = ($_POST['correo_electronico']);

    //Insertando datos en la base de datos de categorias
    $result = $si_categoria->execute("INSERT INTO categoria(nombre_categoria,entidad_responsable, 
                      correo, created_at, updated_at) 
    VALUES('$nombre_categoria','$entidad_responsable','$correo_electronico', NOW(), NOW())");

}
?>

<body>

<div class="logout-container">
    <h1 class="success-title">La categoría ha sido añadida correctamente.</h1>
    <a class="logout-link" href='../../../resources/views/admin/admin-index.php'>Regresar</a>
</div>

</body>


</body>
</html>
