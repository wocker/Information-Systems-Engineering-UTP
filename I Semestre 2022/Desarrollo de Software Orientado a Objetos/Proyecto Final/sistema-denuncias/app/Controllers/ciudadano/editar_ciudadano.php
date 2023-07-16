<?php
// ubicación: app/Controllers/denuncias/editar_denuncia.php


// Incluye la clase CRUD
include_once("../../Models/CRUD.php");

// Iniciar la sesión
session_start();


//Obteniendo el id del ciudadano
$id = $_GET['id'];

 // Inicializa una variable con los métodos del CRUD
$ciudadanos = new CRUD();


// Hace consulta a la base de datos
// para obtener atributos del Ciudadano correspondiente
$query_ciudadanos = "SELECT * FROM ciudadano WHERE id_ciudadano=$id";
$result_ciudadanos = $ciudadanos->getData($query_ciudadanos);

// Obtiene los atributos del arreglo que mandó la base de datos y los asigna a variables
foreach ($result_ciudadanos as $result_ciudadano) {
    $nombre_ciudadano = $result_ciudadano['nombre_ciudadano'];
    $apellido_ciudadano = $result_ciudadano['apellido_ciudadano'];
    $lugar_reside = $result_ciudadano['lugar_reside'];
    $telefono = $result_ciudadano['telefono'];
    $correo_electronico = $result_ciudadano['correo_electronico'];
}

?>
<html>
<head>
    <title>Editar Ciudadano</title>
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

    <h1 class="center-element rounded-input" >Editar un Ciudadano</h1>


    <form class="edit-form" action="accion_editar_ciudadano.php" method="POST">
        <div class="elem-group">
            <label class="elem-group-label" for="ciud_nombre">Nombre del Ciudadano</label>
            <input value="<?php echo $nombre_ciudadano; ?>" class="elem-group-input" type="text" id="ciud_nombre" name="nombre_ciudadano"
                   placeholder="<?php echo $nombre_ciudadano; ?>" required>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="apell_ciudadano">Apellido del Ciudadano</label>
            <input class="elem-group-input" value="<?php echo $apellido_ciudadano; ?>" type="text" id="apell_ciudadano" name="apellido_ciudadano"
                   placeholder="<?php echo $apellido_ciudadano; ?>" required>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="lugar_reside">Lugar donde reside el Ciudadano</label>
            <input class="elem-group-input" value="<?php echo $lugar_reside; ?>" type="text" id="lugar_reside" name="lugar_reside"
                   placeholder="<?php echo $lugar_reside; ?>" required>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="telefono">Teléfono del ciudadano</label>
            <input class="elem-group-input" value="<?php echo $telefono; ?>" type="text" id="telefono" name="telefono"
                   placeholder="<?php echo $telefono; ?>" required>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="correo">Correo del ciudadano</label>
            <input class="elem-group-input" value="<?php echo $correo_electronico; ?>" type="email" id="correo" name="correo_electronico"
                   placeholder="<?php echo $correo_electronico; ?>" required>
        </div>
        <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>

        <div class="form-btn-sent-container-center">
            <button type="submit" class="form-btn-sent" name="update" value="Update">Actualizar Ciudadano</button>
        </div>

    </form>
</div>
</body>
</html>
