<?php
// ubicación: app/Controllers/denuncias/editar_denuncia.php


// Incluye la clase CRUD
include_once("../../Models/CRUD.php");

// Iniciar la sesión
session_start();


//Obteniendo el id de la denuncia
$id = $_GET['id'];

 // Inicializa una variable con los métodos del CRUD
$provincias = new CRUD();


// Obtiene todas las Categorías
$query_provincias = "SELECT * FROM provincia WHERE id_provincia=$id";
$result_provincias = $provincias->getData($query_provincias);


foreach ($result_provincias as $res_prov) {
    $nombre_prov = $res_prov['nombre_provincia'];
}

?>
<html lang="es">
<head>
    <title>Editar Provincia</title>

    <link rel="stylesheet" href="../../../public/css/main.css">
    <link rel="icon" type="image/x-icon" href="../../../public/imgs/denuncia_icon.jpg">
</head>

<body>
<nav>
    <ul>
        <li><a href="/sistema-denuncias/resources/views/admin/admin-index.php">Volver a Inicio</a></li>
    </ul>
</nav>


<h1 class="center-element rounded-input">Editar una Provincia</h1>

<div class="form-container">

    <form class="edit-form" action="accion_editar_provincia.php" method="POST">
        <div class="elem-group">
            <label class="elem-group-label" for="prov_nombre">Nombre de la Provincia</label>
            <input class="elem-group-input" type="text" value="<?php echo $nombre_prov; ?>" id="prov_nombre" name="nombre_provincia"
                   placeholder="<?php echo $nombre_prov; ?>" required>
        </div>
        <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
        <div class="form-btn-sent-container-center">
            <button type="submit" class="form-btn-sent" name="update" value="Update">Actualizar Provincia</button>
        </div>
    </form>

</div>
</body>
</html>
