<?php
// Se importa junto a Denuncia
include_once("../../../app/Models/CRUD.php");

// Iniciar sesion
session_start();

$denuncias = new CRUD();
$provincias = new CRUD();
$ciudadano = new CRUD();
$categorias = new CRUD();
$usuarios = new CRUD();

// Validar login
if (!isset($_SESSION['email'])) {
    header('location: http://localhost/sistema-denuncias/resources/views/login/login-admin.php');
    exit;
}

// Validar que el correo sea del administrador
if ($_SESSION['email'] != "admin@gestor.com") {
    header('location: http://localhost/sistema-denuncias/resources/views/login/login-admin.php');
    exit;
}


// Denuncias
$query_denuncia = "SELECT * FROM denuncia ORDER BY id_denuncia DESC";
$result_denuncia = $denuncias->getData($query_denuncia);

// Provincias
$query_provincias = "SELECT * FROM provincia ORDER BY id_provincia ";
$result_provincias = $provincias->getData($query_provincias);

// Categorías
$query_categorias = "SELECT * FROM categoria ORDER BY id_categoria ";
$result_categorias = $categorias->getData($query_categorias);

// Usuarios
$query_usuarios = "SELECT * FROM usuario ORDER BY id_usuario ";
$result_usuarios = $usuarios->getData($query_usuarios);

// Ciudadanos
$query_ciudadanos = "SELECT * FROM ciudadano ORDER BY id_ciudadano ";
$result_ciudadanos = $ciudadano->getData($query_ciudadanos);

?>

<html lang="es">
<head>
    <title>Panel de Administrador</title>
    <link rel="icon" type="image/x-icon" href="../../../public/imgs/denuncia_icon.jpg">
    <link rel="stylesheet" href="../../../public/css/main.css">
</head>
<body>


<nav>
    <ul>
        <li><a class="active" href="#">Inicio</a></li>
        <li><a href="./bi/den_cat_estatus.php">Denuncias por Categoría y por Estatus</a></li>
        <li><a href="./bi/den_fecha.php">Denuncias por Fecha</a></li>
        <li><a href="./bi/den_prov_cat_estatus.php">Denuncias por Provincia por Categoría y Estatus</a></li>
        <li><a href="../login/logout.php">Cerrar Sesión</a></li>

    </ul>
</nav>


<div class="welcome_header">
    <h1>Pantalla de Administrador</h1>
    <p>Aquí podrás gestionar denuncias, categorías, provincias y más.</p>
</div>


<div class="gestor_table">
    <h3>Gestionar Denuncias</h3>


    <table class="table">
        <tr class="gestor_table_first_column">
            <td>Denuncia</td>
            <td>Lugar</td>
            <td>Estatus</td>
            <td>Fecha</td>
            <td>Acciones</td>
        </tr>
        <?php
        foreach ($result_denuncia as $key => $res) {
            echo "<tr class='gestor_table_rows'  >";
            echo "<td>" . $res['desc_denuncia'] . "</td>";
            echo "<td>" . $res['lugar_denuncia'] . "</td>";
            echo "<td class='gestor_table_rows-estatus'>" . $res['estatus_denuncia'] . "</td>";
            echo "<td>" . $res['fecha_denuncia'] . "</td>";
            echo "<td class='gestor_table-actions'>
<a href=\"../../../app/Controllers/denuncias/editar_denuncia_admin.php?id=$res[id_denuncia]\" class='gestor_table-actions-edit' > ✏️Editar</a >
 <a href = \"../../../app/Controllers/denuncias/eliminar_denuncia_admin.php?id=$res[id_denuncia]\" 
onClick=\"return confirm('¿Estás seguro de eliminarlo?')\" class='gestor_table-actions-delete'>⚠️Eliminar</a></td>";
        }
        ?>
    </table>

</div>


<div class="gestor_table">

    <h3>Gestionar Categorias</h3>

    <table class="table">

        <tr class="gestor_table_first_column">
            <td>Categoria</td>
            <td>Entidad</td>
            <td>Correo</td>
            <td>Acciones</td>
        </tr>
        <?php
        foreach ($result_categorias as $key => $res_cat) {
            echo "<tr >";
            echo "<td>" . $res_cat['nombre_categoria'] . "</td>";
            echo "<td>" . $res_cat['entidad_responsable'] . "</td>";
            echo "<td>" . $res_cat['correo'] . "</td>";
            echo "<td class='gestor_table-actions'><a href=\"../../../app/Controllers/categoria/editar_categoria.php?id=$res_cat[id_categoria]\" 
class='gestor_table-actions-edit' >✏️Editar</a> | 
<a href=\"../../../app/Controllers/categoria/eliminar_categoria.php?id=$res_cat[id_categoria]\" 
onClick=\"return confirm('¿Estás seguro de eliminarlo?')\" class='gestor_table-actions-delete'>⚠️Eliminar</a></td>";
        }
        ?>
    </table>

    <div>
        <a class='gestor_table-actions-add' href="../../../app/Controllers/categoria/añadir_categoria.php">Añadir
            Categoría </a>
    </div>
</div>


<div class="gestor_table">

    <h3>Gestionar Provincias</h3>

    <table class="table">

        <tr class="gestor_table_first_column">
            <td>Provincia</td>
            <td>Acciones</td>
        </tr>
        <?php
        foreach ($result_provincias as $key => $res_prov) {
            echo "<tr>";
            echo "<td>" . $res_prov['nombre_provincia'] . "</td>";
            echo "<td><a href=\"../../../app/Controllers/provincias/editar_provincia.php?id=$res_prov[id_provincia]\" 
class='gestor_table-actions-edit'>✏️Editar</a> 
| <a href=\"../../../app/Controllers/provincias/eliminar_provincia.php?id=$res_prov[id_provincia]\" 
onClick=\"return confirm('¿Estás seguro de eliminarlo?')\" class='gestor_table-actions-delete' >⚠️Eliminar</a></td>";
        }
        ?>
    </table>

    <div>
        <a class='gestor_table-actions-add' href="../../../app/Controllers/provincias/añadir_provincia.php">Añadir
            Provincia </a>
    </div>
</div>

<div class="gestor_table">
    <h3>Gestionar Ciudadanos</h3>

    <table class="table">

        <tr class="gestor_table_first_column">
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Lugar</td>
            <td>Teléfono</td>
            <td>Correo Electrónico</td>
            <td>Acciones</td>
        </tr>
        <?php
        foreach ($result_ciudadanos as $key => $res_ciud) {
            echo "<tr>";
            echo "<td>" . $res_ciud['nombre_ciudadano'] . "</td>";
            echo "<td>" . $res_ciud['apellido_ciudadano'] . "</td>";
            echo "<td>" . $res_ciud['lugar_reside'] . "</td>";
            echo "<td>" . $res_ciud['telefono'] . "</td>";
            echo "<td>" . $res_ciud['correo_electronico'] . "</td>";
            echo "<td><a href=\"../../../app/Controllers/ciudadano/editar_ciudadano.php?id=$res_ciud[id_ciudadano]\"
class='gestor_table-actions-edit'>✏️ Editar</a> 
| <a href=\"../../../app/Controllers/ciudadano/eliminar_ciudadano.php?id=$res_ciud[id_ciudadano]\" 
onClick=\"return confirm('¿Estás seguro de eliminarlo?')\" class='gestor_table-actions-delete'> ⚠️Eliminar</a></td>";
        }
        ?>
    </table>

    <div>
        <a class='gestor_table-actions-add' href="../../../app/Controllers/ciudadano/añadir_ciudadano.php">Añadir
            Ciudadano</a>
    </div>
</div>

<div class="gestor_table">
    <h3>Gestionar Usuarios</h3>

    <table class="table">

        <tr class="gestor_table_first_column">
            <td>Nombre</td>
            <td>Apellido</td>
            <td>Correo</td>
            <td>Celular</td>
            <td>Acciones</td>
        </tr>
        <?php
        foreach ($result_usuarios as $key => $res_user) {
            echo "<tr>";
            echo "<td>" . $res_user['nombre_usuario'] . "</td>";
            echo "<td>" . $res_user['apellido_usuario'] . "</td>";
            echo "<td>" . $res_user['correo_usuario'] . "</td>";
            echo "<td>" . $res_user['cel_usuario'] . "</td>";
            echo "<td><a href=\"../../../app/Controllers/usuarios/editar_usuario.php?id=$res_user[id_usuario]\"
class='gestor_table-actions-edit'>✏️Editar</a> 
| <a href=\"../../../app/Controllers/usuarios/eliminar_usuario.php?id=$res_user[id_usuario]\" 
onClick=\"return confirm('¿Estás seguro de eliminarlo?')\" class='gestor_table-actions-delete'>⚠️Eliminar</a></td>";
        }
        ?>
    </table>

    <div>
        <a class='gestor_table-actions-add' href="../../../app/Controllers/usuarios/añadir_usuario.php">Añadir
            Usuario</a>
    </div>
</div>

</body>


</html>