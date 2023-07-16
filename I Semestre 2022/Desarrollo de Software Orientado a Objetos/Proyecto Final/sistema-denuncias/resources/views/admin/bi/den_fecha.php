<?php
// Se importa junto a Denuncia
include_once("../../../../app/Models/CRUD.php");

// Iniciar sesion
session_start();


$denuncias = new CRUD();


// Validar login
// Validate login
if (!isset($_SESSION['email'])) {
    header('location: http://localhost/sistema-denuncias/resources/views/login/login-admin.php');
    exit;
}

if ($_SESSION['email'] != "admin@gestor.com") {
    header('location: http://localhost/sistema-denuncias/resources/views/login/login-admin.php');
    exit;
}


// Denuncias
$query_denuncia = "SELECT * FROM denuncia ORDER BY id_denuncia DESC";
$result_denuncia = $denuncias->getData($query_denuncia);



function destroy_session() {
    unset($_SESSION['counter']);
}

?>

<html>
<head>
    <title>Panel de Administrador</title>
    <link rel="icon" type="image/x-icon" href="../../../../public/imgs/denuncia_icon.jpg">
    <link rel="stylesheet" href="../../../../public/css/main.css">
</head>
<body>


<nav>
    <ul>
        <li><a href="http://localhost/sistema-denuncias/resources/views/admin/admin-index.php">Regresar</a></li>
    </ul>
</nav>


<div class="gestor_table">

<h3>Denuncias por fecha</h3>

<table class="table">
    <tr class="gestor_table_first_column">
        <td>Denuncia</td>
        <td>Fecha</td>
        <td>Acciones</td>
    </tr>
    <?php
    foreach ($result_denuncia as $key => $res) {
        echo "<tr>";
        echo "<td>" . $res['desc_denuncia'] . "</td>";
        echo "<td>" . $res['fecha_denuncia'] . "</td>";
        echo "<td class='gestor_table-actions'>
<a class='gestor_table-actions-edit' href=\"../../../../app/Controllers/denuncias/editar_denuncia_admin.php?id=$res[id_denuncia]\">✏️Editar</a> 
| <a class='gestor_table-actions-delete' href=\"../../../../app/Controllers/denuncias/eliminar_denuncia_admin.php?id=$res[id_denuncia]\" 
onClick=\"return confirm('¿Estás seguro de eliminarlo?')\">⚠️Eliminar</a></td>";
    }
    ?>
</table>

</div>

</body>


</html>