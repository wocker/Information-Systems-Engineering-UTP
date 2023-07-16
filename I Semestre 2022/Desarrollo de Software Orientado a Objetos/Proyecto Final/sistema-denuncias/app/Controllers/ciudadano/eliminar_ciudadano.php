<?php
// Incluye la clase CRUD que contiene los métodos para insertar, eliminar y ejecutar consultas
include_once("../../Models/CRUD.php");

// Inicializa una variable con los métodos del CRUD
$ciudadano = new CRUD();

// Obtener el id desde una url
$id = $_GET['id'];

// Ejecuta una sentencia de DELETE a la base de datos
$result = $ciudadano->execute("DELETE FROM ciudadano WHERE id_ciudadano=$id");

// Si la sentencia se ejecutó de forma satisfactoria
if ($result) {
    //Redirigir a la pantalla de admin
    header('location: http://localhost/sistema-denuncias/resources/views/admin/admin-index.php');
} else {
    echo "Ha ocurrido un error";
    header('location: http://localhost/sistema-denuncias/resources/views/admin/admin-index.php');
}
?>

