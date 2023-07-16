<?php
// Incluye la clase CRUD que contiene los métodos para insertar, eliminar y ejecutar consultas
include_once("../../Models/CRUD.php");

$usuario = new CRUD();

// Obtener el id desde una url
$id = $_GET['id'];

$result = $usuario->execute("DELETE FROM usuario WHERE id_usuario=$id");

if ($result) {
    //redirecting to the display page (index.php in our case)
    header('location: http://localhost/sistema-denuncias/resources/views/admin/admin-index.php' );
}
?>

