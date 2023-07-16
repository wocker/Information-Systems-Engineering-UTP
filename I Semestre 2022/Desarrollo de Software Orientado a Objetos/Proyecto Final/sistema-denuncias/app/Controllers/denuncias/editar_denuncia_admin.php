<?php
// ubicación: app/Controllers/denuncias/editar_denuncia.php


// Incluye la clase CRUD
include_once("../../Models/CRUD.php");

// Iniciar la sesión
session_start();


//Obteniendo el id de la denuncia
$id = $_GET['id'];

// Inicializa una variable con los métodos del CRUD
$denuncias = new CRUD();
$provincias = new CRUD();
$categorias = new CRUD();

//Seleccionando valores con un id específico

$result_denuncias = $denuncias->getData("SELECT * FROM denuncia WHERE id_denuncia=$id");

// Obtiene todas las Provincias
$query_provincias = "SELECT * FROM provincia ORDER BY id_provincia ";
$result_provincias = $provincias->getData($query_provincias);


// Obtiene todas las Categorías
$query_categorias = "SELECT * FROM categoria ORDER BY id_categoria ";
$result_categorias = $categorias->getData($query_categorias);

// Obtener Provincia

function obtenerProvincia($id_provincia)
{
    $provincias = new CRUD();
    $result_provincias = $provincias->getData("SELECT * FROM provincia WHERE id_provincia=$id_provincia");
    return $result_provincias[0]['nombre_provincia'];
}

function obtenerNombreEstatus($estatus)
{
    switch ($estatus) {

        case "A":
            // Ejecuta cuando el valor es "A" (Activo)
            return $estatus_denuncia = "Activa";
            break;
        case "P":
            // Ejecuta cuando el valor es "P" (En Atención)
            return $estatus_denuncia = "En Atención";
            break;
        case "C":
            // Ejecuta cuando el valor es "C" (Cerrada)
            return $estatus_denuncia = "Cerrada";
            break;
        case "D":
            // Ejecuta cuando el valor es "D" (Cancelada)
            return $estatus_denuncia = "Cancelada";
            break;
        default:
            // Predeterminado si no cumple con ninguno de los casos anteriores
            return $estatus_denuncia = "Activa";
    }
}

function obtenerCategorias($id_categoria)
{
    $categorias = new CRUD();
    $result_categorias = $categorias->getData("SELECT * FROM categoria WHERE id_categoria=$id_categoria");
    return $result_categorias[0]['nombre_categoria'];
}

foreach ($result_denuncias as $res_denuncias) {
    $id_denuncia = $res_denuncias['id_denuncia'];
    $denuncia = $res_denuncias['desc_denuncia'];
    $estatus_denuncia = obtenerNombreEstatus($res_denuncias['estatus_denuncia']);
    $lugar_denuncia = $res_denuncias['lugar_denuncia'];
    $fecha_denuncia = $res_denuncias['fecha_denuncia'];
    // Obtener provincia
    $provincia_denuncia = obtenerProvincia($res_denuncias['id_provincia']);
    // Obtener Categoria
    $categoria_denuncia = obtenerCategorias($res_denuncias['id_categoria']);
}

?>

<html lang="es">
<head>
    <title>Editar Denuncia Administrador</title>
    <link rel="stylesheet" href="../../../public/css/main.css">
    <link rel="icon" type="image/x-icon" href="../../../public/imgs/denuncia_icon.jpg">

</head>

<body>
<nav>
    <ul>
        <li><a href="/sistema-denuncias/resources/views/admin/admin-index.php">Volver a Inicio</a></li>
    </ul>
</nav>


<br/><br/>

<div class="form-container">
    <h1 class="center-element rounded-input">Editar una Denuncia</h1>
    <form class="edit-form" method="POST" action="accion_editar_denuncia_admin.php">
        <div class="elem-group">
            <label class="elem-group-label" for="la_denuncia">Edita la Denuncia 
            </label>
            <input class="elem-group-input" value="<?php echo $denuncia; ?>" type="text" id="la_denuncia"
                   name="denuncia" placeholder="<?php echo $denuncia; ?>"
                   required>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="seleccion-provincia">Provincia </label>
            <select class="elem-group-input" id="seleccion-provincia" name="provincia" required>
                <option value="<?php echo $res_denuncias['id_provincia']; ?>"><?php echo $provincia_denuncia; ?></option>
                <?php
                foreach ($result_provincias as $key => $res) {
                    echo " <option value='{$res['id_provincia']}'>" . $res['nombre_provincia'] . "</option> ";
                }
                ?>
            </select>
        </div>
        <div class="elem-group">
            <label for="denuncia_cat" class="elem-group-label">Categoria de tu denuncia </label>
            <select class="elem-group-input" id="denuncia_cat" name="categoria" required>
                <option value="<?php echo $res_denuncias['id_categoria']; ?>"><?php echo $categoria_denuncia; ?></option>
                <?php
                foreach ($result_categorias as $key => $res) {
                    echo " <option value='{$res['id_categoria']}'>" . $res['nombre_categoria'] . "</option> ";
                }
                ?>
            </select>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="denuncia_estado">Estado de la denuncia </label>

            <select class="elem-group-input" id="denuncia_estado" name="estado" required>
                <option value="<?php echo $res_denuncias['estatus_denuncia']; ?>"><?php echo $estatus_denuncia; ?></option>
                <option value="P">En Atención</option>
                <option value="C">Cerrada</option>
                <option value="D">Cancelada</option>
                ?>
            </select>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="fecha_denuncia">Fecha denuncia </label>
            <input class="elem-group-input" type="date" value="<?php echo $fecha_denuncia; ?>" id="fecha_denuncia"
                   name="fecha_denuncia" placeholder="<?php echo $fecha_denuncia; ?>"
                   required>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="lugar">Lugar de denuncia </label>
            <input class="elem-group-input" type="text" id="lugar" value="<?php echo $lugar_denuncia; ?>"
                   name="lugar_denuncia" placeholder="<?php echo $lugar_denuncia; ?>" required>
        </div>
        <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>>
        <div class="form-btn-sent-container">
            <button type="submit" class="form-btn-sent" name="update" value="Update">Actualizar denuncia</button>
        </div>
    </form>

</div>

</body>
</html>
