<html lang="es">

<head>
    <title>Añadir Categoria</title>
    <link rel="stylesheet" href="../../../public/css/main.css">
    <link rel="icon" type="image/x-icon" href="../../../public/imgs/denuncia_icon.jpg">
</head>

<body>

<nav>
    <ul>
        <li><a href="/sistema-denuncias/resources/views/admin/admin-index.php">Volver a Inicio</a></li>
    </ul>
</nav>


<div class="form-container">

    <h1 class="center-element rounded-input" >Crea una categoría</h1>

    <form class="edit-form" action="accion_añadir_categoria.php" method="post">
        <div class="elem-group">
            <label class="elem-group-label" for="cat_nombre">Nombre de la Categoría</label>
            <input class="elem-group-input" type="text" id="cat_nombre" name="nombre_categoria"
                   placeholder="Escribe el nombre de la categoría" required>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="enti_responsable">Entidad Responsable</label>
            <input class="elem-group-input" type="text" id="enti_responsable" name="entidad_responsable"
                   placeholder="Escribe el nombre de la entidad responsable" required>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="correo_elect">Correo electrónico</label>
            <input class="elem-group-input" type="email" id="correo_elect" name="correo_electronico"
                   placeholder="Escribe el correo electronico" required>
        </div>
        <div class="form-btn-sent-container-center">
            <button type="submit" class="form-btn-sent" name="Submit" value="Add">Añadir categoría</button>
        </div>
    </form>
</div>
</body>
</html>