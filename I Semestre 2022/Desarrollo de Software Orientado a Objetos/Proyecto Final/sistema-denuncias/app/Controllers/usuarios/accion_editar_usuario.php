<?php
// Incluye la clase CRUD
include_once("../../Models/CRUD.php");

$crud = new Crud();


if (isset($_POST['update'])) {

    $id = $_POST['id'];

    $nombre_usuario = $_POST['nombre_usuario'];
    $apellido_usuario = $_POST['apellido_usuario'];
    $lugar_reside = $_POST['lugar_reside'];
    $telefono = $_POST['telefono'];
    $correo_electronico = $_POST['correo_electronico'];

//	$msg = $validation->check_empty($_POST, array('name', 'age', 'email'));
//	$check_age = $validation->is_age_valid($_POST['age']);
//	$check_email = $validation->is_email_valid($_POST['email']);

      //Ejecutando actualización de datos en la base de datos
    $result = $crud->execute("UPDATE usuario SET nombre_usuario='$nombre_usuario',
                    apellido_usuario='$apellido_usuario',
                     cel_usuario='$telefono', correo_usuario='$correo_electronico',
                    updated_at=NOW() WHERE id_usuario=$id");

     //Redirigiendo a pantalla de admin
    header('location: http://localhost/sistema-denuncias/resources/views/admin/admin-index.php' );
}
?>
