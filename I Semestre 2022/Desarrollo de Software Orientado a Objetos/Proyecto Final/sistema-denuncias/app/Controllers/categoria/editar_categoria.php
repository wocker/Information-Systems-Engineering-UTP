<?php
// ubicación: app/Controllers/denuncias/editar_denuncia.php


// Incluye la clase CRUD que contiene los métodos para insertar, eliminar y ejecutar consultas
include_once("../../Models/CRUD.php");

// Iniciar la sesión
session_start();


//Obteniendo el id de la categoria
$id = $_GET['id'];

 // Inicializa una variable con los métodos del CRUD
$categorias = new CRUD();


// Obtiene la categoria correspondiende al id
$query_categorias = "SELECT * FROM categoria WHERE id_categoria=$id";
$result_categorias = $categorias->getData($query_categorias);

// Bucle que permite traer los atributos de la categoria
foreach ($result_categorias as $res_categoria) {
    $nombre_cat = $res_categoria['nombre_categoria'];
    $entidad_responsable_cat = $res_categoria['entidad_responsable'];
    $correo_cat = $res_categoria['correo'];
}

?>
<html lang="es">
<head>
    <title>Editar Categoria</title>
    <link rel="stylesheet" href="../../../public/css/main.css">
    <link rel="icon" type="image/x-icon" href="../../../public/imgs/denuncia_icon.jpg">
</head>

<body>

<nav>
    <ul>
        <li><a href="/sistema-denuncias/resources/views/admin/admin-index.php">Volver a Inicio</a></li>
    </ul>
</nav>


<div class="form-container">

    <h1 class="center-element rounded-input" >Edita una categoría</h1>

    <form class="edit-form" action="accion_editar_categoria.php" method="POST">
        <div class="elem-group">
            <label class="elem-group-label" for="cat_nombre">Nombre de la Categoría</label>
            <input class="elem-group-input" type="text" id="cat_nombre" name="nombre_categoria"
                   placeholder="<?php echo $nombre_cat; ?>" value="<?php echo $nombre_cat; ?>" required>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="enti_responsable">Entidad Responsable</label>
            <input class="elem-group-input" type="text" value="<?php echo $entidad_responsable_cat; ?>" id="enti_responsable" name="entidad_responsable"
                   placeholder="<?php echo $entidad_responsable_cat; ?>" required>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="correo_elect">Correo electrónico</label>
            <input class="elem-group-input" value="<?php echo $correo_cat; ?>" type="email" id="correo_elect" name="correo_electronico"
                   placeholder="<?php echo $correo_cat; ?>" required>
        </div>
        <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>

        <div class="form-btn-sent-container-center">
            <button type="submit" class="form-btn-sent" name="update" value="Update">Actualizar Categoría</button>
        </div>
    </form>
</div>
</body>
</html>
