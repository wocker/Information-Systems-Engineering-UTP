<?php
// Incluye la clase CRUD
include_once("../../Models/CRUD.php");

// Inicializar variable con métodos del CRUD
$crud = new Crud();

// Si el método post es update
if (isset($_POST['update'])) {

    $id = $_POST['id'];

//   Nombre de categoria
    $nombre_provincia = $_POST['nombre_provincia'];

      //Ejecutando actualización de datos en la base de datos
    $result = $crud->execute("UPDATE provincia SET nombre_provincia='$nombre_provincia',
                    updated_at=NOW() WHERE id_provincia=$id");

     //Redirigiendo a pantalla de admin
    header('location: http://localhost/sistema-denuncias/resources/views/admin/admin-index.php' );
}
?>
