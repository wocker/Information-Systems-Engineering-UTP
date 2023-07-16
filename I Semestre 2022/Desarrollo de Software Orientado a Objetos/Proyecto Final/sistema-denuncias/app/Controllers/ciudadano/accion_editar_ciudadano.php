<?php

// Incluye la clase CRUD
include_once("../../Models/CRUD.php");

// Inicializa una variable con los métodos del CRUD
$crud = new Crud();

// Si la sentencia del formulario es submit (enviar)
if (isset($_POST['update'])) {

    $id = $_POST['id'];
    //  Obtener Nombre del ciudadano
    $nombre_ciudadano = $_POST['nombre_ciudadano'];
    // Obtener Apellido del Ciudadano
    $apellido_ciudadano = $_POST['apellido_ciudadano'];
    // Obtener Lugar donde reside
    $lugar_reside = $_POST['lugar_reside'];
    // Obtener Teléfono
    $telefono = $_POST['telefono'];
    // Obtener Correo electronico
    $correo_electronico = $_POST['correo_electronico'];

    //Ejecutando actualización de datos en la base de datos
    $result = $crud->execute("UPDATE ciudadano SET nombre_ciudadano='$nombre_ciudadano',
                    apellido_ciudadano='$apellido_ciudadano',lugar_reside='$lugar_reside',
                     telefono='$telefono', correo_electronico='$correo_electronico',
                    updated_at=NOW() WHERE id_ciudadano=$id");

    //Redirigiendo a pantalla de admin
    header('location: http://localhost/sistema-denuncias/resources/views/admin/admin-index.php' );
}
?>
