<?php
// Incluye la clase CRUD que contiene los métodos para insertar, eliminar y ejecutar consultas
include_once("../../Models/CRUD.php");

$denuncia = new CRUD();

// Obtener el id desde una url
$id = $_GET['id'];

$result = $denuncia->execute("DELETE FROM denuncia WHERE id_denuncia=$id");

if ($result) {
    //redirecting to the display page (index.php in our case)
    header('location: http://localhost/sistema-denuncias/resources/views/admin/admin-index.php' );
}
?>

