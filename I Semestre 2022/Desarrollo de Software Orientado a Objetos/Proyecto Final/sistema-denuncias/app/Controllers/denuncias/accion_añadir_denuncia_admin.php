<html lang="es">
<head>
    <title>Añadir denuncia</title>
</head>



<body>
<?php


// Incluye la clase CRUD que contiene los métodos para insertar, eliminar y ejecutar consultas
include_once("../../Models/CRUD.php");

// Iniciar sesion
session_start();

//include_once("classes/Validation.php");

$si_denuncia = new CRUD();
//$validation = new Validation();

if (isset($_POST['Submit'])) {
    // Ciudadano
//    $ciudadano = $si_denuncia->escape_string($_SESSION['id_ciudadano']);
    $ciudadano = $_SESSION['id'];
    // Categoria
//    $categoria_denuncia = $si_denuncia->escape_string($_POST['categoria']);
    $categoria_denuncia = ($_POST['categoria']);
    // Provincia
//    $provincia_denuncia = $si_denuncia->escape_string($_POST['provincia']);
    $provincia_denuncia = ($_POST['provincia']);
    // Descripcion de denuncia
    $desc_denuncia = ($_POST['denuncia']);
    // Estatus denuncia
    $estatus_denuncia = 'A';
    // Lugar de denuncia
    $lugar_denuncia = $_POST['lugar_denuncia'];
    // Fecha de denuncia
    $fecha_denuncia = $_POST['fecha_denuncia'];


//	$msg = $validation->check_empty($_POST, array('name', 'age', 'email'));
//	$check_age = $validation->is_age_valid($_POST['age']);
//	$check_email = $validation->is_email_valid($_POST['email']);

//	// checking empty fields
//	if($msg != null) {
//		echo $msg;
//		//link to the previous page
//		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
//	} elseif (!$check_age) {
//		echo 'Please provide proper age.';
//	} elseif (!$check_email) {
//		echo 'Please provide proper email.';
//	}
//	else {
    // if all the fields are filled (not empty)

    //insert data to database
    $result = $si_denuncia->execute("INSERT INTO denuncia(id_ciudadano,id_provincia, id_categoria, desc_denuncia, estatus_denuncia, lugar_denuncia, fecha_denuncia, created_at, updated_at) 
    VALUES('$ciudadano','$provincia_denuncia','$categoria_denuncia', '$desc_denuncia', '$estatus_denuncia', '$lugar_denuncia', '$fecha_denuncia', NOW(), NOW())");


    //display success message
    echo "<font color='green'>La denuncia ha sido añadida.";
    echo "<br/><a href='../../../index.php'>Ver resultado</a>";
}
//}
?>
</body>
</html>
