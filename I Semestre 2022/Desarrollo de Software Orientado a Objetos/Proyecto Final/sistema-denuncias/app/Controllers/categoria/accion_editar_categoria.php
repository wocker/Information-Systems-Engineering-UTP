<?php
// Incluye la clase CRUD
include_once("../../Models/CRUD.php");

$crud = new Crud();

// Si la sentencia del formulario es submit (enviar)
if (isset($_POST['update'])) {

    // Id de la categoria
    $id = $_POST['id'];

    // Obtener Nombre de categoria
    $nombre_categoria = $_POST['nombre_categoria'];
    // Obtener Entidad Responsable
    $entidad_responsable = $_POST['entidad_responsable'];
    // Obtener Correo electronico
    $correo_electronico = $_POST['correo_electronico'];


    // Ejecutando actualización de datos en la la tabla de categorias
    $result = $crud->execute("UPDATE categoria SET nombre_categoria='$nombre_categoria',
                    entidad_responsable='$entidad_responsable',correo='$correo_electronico',
                    updated_at=NOW() WHERE id_categoria=$id");

     //Redirigiendo a pantalla de admin
    header('location: http://localhost/sistema-denuncias/resources/views/admin/admin-index.php' );
}
?>
