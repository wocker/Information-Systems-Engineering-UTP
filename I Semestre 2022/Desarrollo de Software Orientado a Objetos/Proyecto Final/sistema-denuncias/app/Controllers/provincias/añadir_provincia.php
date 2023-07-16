<html>

<head>
    <title>Añadir Provincia</title>
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

    <h1 class="center-element rounded-input" >Añadir Provincia</h1>

    <form class="edit-form" action="accion_añadir_provincia.php" method="post">
        <div class="elem-group">
            <label class="elem-group-label" for="prov_nom">Escribir nombre de la Provincia</label>
            <input class="elem-group-input" type="text" id="prov_nom" name="nombre_provincia"
                   placeholder="Escribe el nombre de la provincia" required>
        </div>

        <div class="form-btn-sent-container-center">
            <button type="submit" class="form-btn-sent" name="Submit" value="Add">Guardar Provincia</button>
        </div>
    </form>
</div>
</body>
</html>