<?php
// Incluye la clase CRUD
include_once("../../Models/CRUD.php");

$crud = new Crud();
var_dump("Crud inicializado");


if (isset($_POST['update'])) {
    
    $id = $_POST['id'];

    // Categoria
    $categoria_denuncia = $_POST['categoria'];
    // Provincia
    $provincia_denuncia = $_POST['provincia'];
    // Descripcion de denuncia
    $desc_denuncia = $_POST['denuncia'];
    // Lugar de denuncia
    $lugar_denuncia = $_POST['lugar_denuncia'];
    // Fecha de denuncia
    $fecha_denuncia = $_POST['fecha_denuncia'];

    
      //Ejecutando actualización de datos en la base de datos
    $result = $crud->execute("UPDATE denuncia SET desc_denuncia='$desc_denuncia',
                    id_provincia='$provincia_denuncia',id_categoria='$categoria_denuncia',
                    lugar_denuncia='$lugar_denuncia',
                    fecha_denuncia='$fecha_denuncia',updated_at=NOW() WHERE id_denuncia=$id");

    var_dump($result);
     //Redirigiendo a pantalla de admin
    header('location: http://localhost/sistema-denuncias/' );
}
?>
