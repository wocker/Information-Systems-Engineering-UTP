<?php
// Incluye la clase CRUD que contiene los métodos para insertar, eliminar y ejecutar consultas
include_once("../../Models/CRUD.php");

$provincia = new CRUD();

// Obtener el id desde una url
$id = $_GET['id'];

$result = $provincia->execute("DELETE FROM provincia WHERE id_provincia=$id");

if ($result) {
    //redirecting to the display page (index.php in our case)
    header('location: http://localhost/sistema-denuncias/resources/views/admin/admin-index.php' );
}
?>

