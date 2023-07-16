<html lang="es">

<head>
    <title>Añadir Ciudadano</title>
    <link rel="stylesheet" href="../../../public/css/main.css">
    <link rel="icon" type="image/x-icon" href="../../../public/imgs/denuncia_icon.jpg">
</head>


<nav>
    <ul>
        <li><a href="/sistema-denuncias/resources/views/admin/admin-index.php">Volver a Inicio</a></li>
    </ul>
</nav>

<body>

<div class="form-container">
    <h1 class="center-element rounded-input" >Añadir un ciudadano</h1>

    <form class="edit-form" action="accion_añadir_ciudadano.php" method="post">
        <div class="elem-group">
            <label class="elem-group-label" for="ciudadano_nombre">Nombre del ciudadano</label>
            <input class="elem-group-input" type="text" id="ciudadano_nombre" name="nombre_ciudadano"
                   placeholder="Escribe el nombre del ciudadano" required>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="ciudadano_apellido">Apellido del ciudadano</label>
            <input class="elem-group-input" type="text" id="ciudadano_apellido" name="apellido_ciudadano"
                   placeholder="Escribe el apellido del ciudadano" required>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="ciudadano_lugar">Lugar donde reside el ciudadano</label>
            <input class="elem-group-input" type="text" id="ciudadano_lugar" name="lugar_reside"
                   placeholder="Escribe la residencia del ciudadano" required>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="ciudadano_tel">Teléfono del ciudadano</label>
            <input class="elem-group-input" type="text" id="ciudadano_tel" name="telefono"
                   placeholder="Escribe el teléfono del ciudadano" required>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="ciudadano_correo">Correo del ciudadano</label>
            <input class="elem-group-input" type="text" id="ciudadano_correo" name="correo_electronico"
                   placeholder="Escribe el correo del ciudadano" required>
        </div>

        <div class="form-btn-sent-container-center">
            <button type="submit" class="form-btn-sent" name="Submit" value="Add">Añadir Ciudadano</button>
        </div>

    </form>
</div>
</body>
</html>