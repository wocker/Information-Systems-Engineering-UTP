<?php
// Se importa junto a Denuncia
include_once("app/Models/CRUD.php");
include_once("resources/views/includes/header.php");

// Iniciar sesion
session_start();


$denuncias = new CRUD();
$provincias = new CRUD();
$categorias = new CRUD();

// Validar login
// Validate login
if (!isset($_SESSION['email'])) {
    header('location: resources/views/login/login.php');
    exit;
}

if ($_SESSION['email'] == "admin@gestor.com") {
    header('location: resources/views/admin/admin-index.php');
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


?>

<?php encabezado() ?>


<nav>
    <ul>
        <li><a href="resources/views/login/logout.php">Cerrar Sesión</a></li>
    </ul>
</nav>


<div class="form-container">
    <h1 class="center-element rounded-input" >Haz una Denuncia</h1>

    <form class="edit-form" action="app/Controllers/denuncias/accion_añadir_denuncia.php" method="post">
        <div class="elem-group">
            <label class="elem-group-label" for="message">Escribe tu Denuncia <span class="color-red">*</span></label>
            <input type="text" class="elem-group-input" id="message" name="denuncia" placeholder="¿Cuál es tu denuncia?"
                   required/>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="seleccion-provincia">Provincia <span class="color-red">*</span></label>
            <select class="elem-group-input" id="seleccion-provincia" name="provincia" required>
                <option value="">Selecciona una provincia </option>
                <?php
                foreach ($result_provincias as $key => $res) {
                    echo " <option value='{$res['id_provincia']}'>" . $res['nombre_provincia'] . "</option> ";
                }
                ?>
            </select>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="denuncia_cat">Categoria de tu denuncia <span class="color-red">*</span> </label>
            <select class="elem-group-input" id="denuncia_cat" name="categoria" required>
                <option value="">Selecciona una categoría</option>
                <?php
                foreach ($result_categorias as $key => $res) {
                    echo " <option value='{$res['id_categoria']}'>" . $res['nombre_categoria'] . "</option> ";
                }
                ?>
            </select>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="fecha_denuncia">Fecha denuncia <span class="color-red">*</span> </label>
            <input class="elem-group-input" type="date" id="fecha_denuncia" name="fecha_denuncia" placeholder="Coloca la fecha" required>
        </div>
        <div class="elem-group">
            <label class="elem-group-label"  for="lugar">Lugar de denuncia <span class="color-red">*</span> </label>
            <input class="elem-group-input" type="text" id="lugar" name="lugar_denuncia" placeholder="Escribe el lugar de denuncia" required>
        </div>
        <div class="form-btn-sent-container-center">
            <button type="submit" class="form-btn-sent" name="Submit" value="Add">Enviar denuncia</button>
        </div>
    </form>

</div>

<div class="gestor_table">

    <h3>Tus denuncias</h3>

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
            echo "<tr >";
            echo "<td >" . $res['desc_denuncia'] . "</td>";
            echo "<td>" . $res['lugar_denuncia'] . "</td>";
            echo "<td>" . $res['estatus_denuncia'] . "</td>";
            echo "<td>" . $res['fecha_denuncia'] . "</td>";
            echo "<td class='gestor_table-actions'>
<a class='gestor_table-actions-edit' href=\"app/Controllers/denuncias/editar_denuncia.php?id=$res[id_denuncia]\">✏️Editar</a> 
| <a class='gestor_table-actions-delete' href=\"app/Controllers/denuncias/eliminar_denuncia.php?id=$res[id_denuncia]\" 
onClick=\"return confirm('¿Estás seguro de eliminarlo?')\">⚠️Eliminar</a></td>";

        }
        ?>
    </table>

</div>