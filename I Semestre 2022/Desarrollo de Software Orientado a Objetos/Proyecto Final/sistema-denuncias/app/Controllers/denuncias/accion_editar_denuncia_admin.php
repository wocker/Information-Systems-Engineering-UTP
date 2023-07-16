<?php
// Incluye la clase CRUD
include_once("../../Models/CRUD.php");

$crud = new Crud();

if (isset($_POST['update'])) {

    // Obtener id de la denuncia
    $id = $_POST['id'];

    // Obtener Categoria
    $categoria_denuncia = $_POST['categoria'];
    // Obtener Provincia
    $provincia_denuncia = $_POST['provincia'];
    // Obtener Descripcion de denuncia
    $desc_denuncia = $_POST['denuncia'];
    // Obtener Estado de la denuncia
    $estado_denuncia = $_POST['estado'];
    // Obtener Lugar de denuncia
    $lugar_denuncia = $_POST['lugar_denuncia'];
    // Obtener Fecha de denuncia
    $fecha_denuncia = $_POST['fecha_denuncia'];

    
    // Ejecutando actualización de datos en la base de datos
    $result = $crud->execute("UPDATE denuncia SET desc_denuncia='$desc_denuncia',
                    id_provincia='$provincia_denuncia',id_categoria='$categoria_denuncia',
                    lugar_denuncia='$lugar_denuncia', estatus_denuncia='$estado_denuncia',
                    fecha_denuncia='$fecha_denuncia',updated_at=NOW() WHERE id_denuncia=$id");

     //Redirigiendo a pantalla de admin
    header('location: http://localhost/sistema-denuncias/resources/views/admin/admin-index.php' );
}
?>
