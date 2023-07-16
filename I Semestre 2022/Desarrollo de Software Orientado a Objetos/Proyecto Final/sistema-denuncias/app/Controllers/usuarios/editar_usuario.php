<?php
// ubicación: app/Controllers/denuncias/editar_denuncia.php


// Incluye la clase CRUD
include_once("../../Models/CRUD.php");

// Iniciar la sesión
session_start();


//Obteniendo el id de la denuncia
$id = $_GET['id'];

 // Inicializa una variable con los métodos del CRUD
$usuarios = new CRUD();


// Obtiene todas las Categorías
$query_usuarios = "SELECT * FROM usuario WHERE id_usuario=$id";
$result_usuarios = $usuarios->getData($query_usuarios);


foreach ($result_usuarios as $result_usuario) {
    $nombre_usuario = $result_usuario['nombre_usuario'];
    $apellido_usuario = $result_usuario['apellido_usuario'];
    $telefono = $result_usuario['cel_usuario'];
    $correo_electronico = $result_usuario['correo_usuario'];
}

?>
<html lang="es">
<head>
    <title>Editar usuario</title>
    <link rel="stylesheet" href="../../../public/css/main.css">
    <link rel="icon" type="image/x-icon" href="../../../public/imgs/denuncia_icon.jpg">
</head>

<body>

<nav>
    <ul>
        <li><a href="/sistema-denuncias/resources/views/admin/admin-index.php">Volver a Inicio</a></li>
    </ul>
</nav>

<br/><br/>

<div class="form-container">

    <h1 class="center-element rounded-input">Edita un usuario</h1>

    <form class="edit-form" action="accion_editar_usuario.php" method="POST">
        <div class="elem-group">
            <label class="elem-group-label" for="ciud_nombre">Nombre del usuario</label>
            <input class="elem-group-input" value="<?php echo $nombre_usuario; ?>" type="text" id="ciud_nombre" name="nombre_usuario"
                   placeholder="<?php echo $nombre_usuario; ?>" required>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="apell_usuario">Apellido del usuario</label>
            <input class="elem-group-input" value="<?php echo $apellido_usuario; ?>" type="text" id="apell_usuario" name="apellido_usuario"
                   placeholder="<?php echo $apellido_usuario; ?>" required>
        </div>

        <div class="elem-group">
            <label class="elem-group-label" for="telefono">Teléfono del usuario</label>
            <input class="elem-group-input" value="<?php echo $telefono; ?>" type="text" id="telefono" name="telefono"
                   placeholder="<?php echo $telefono; ?>" required>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="correo">Correo del usuario</label>
            <input class="elem-group-input" value="<?php echo $correo_electronico; ?>" type="email" id="correo" name="correo_electronico"
                   placeholder="<?php echo $correo_electronico; ?>" required>
        </div>
        <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
        <div class="form-btn-sent-container-center">
            <button type="submit" class="form-btn-sent" name="update" value="Update">Actualizar usuario</button>
        </div>
    </form>
</div>
</body>
</html>
