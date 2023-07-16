<html lang="es">


<head>
    <title>Añadir Usuario</title>
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


    <h1 class="center-element rounded-input">Añadir un usuario</h1>

    <form class="edit-form" action="accion_añadir_usuario.php" method="post">
        <div class="elem-group">
            <label class="elem-group-label" for="usuario_nombre">Nombre del usuario</label>
            <input class="elem-group-input" type="text" id="usuario_nombre" name="nombre_usuario"
                   placeholder="Escribe el nombre del usuario" required>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="usuario_apellido">Apellido del usuario</label>
            <input class="elem-group-input" type="text" id="usuario_apellido" name="apellido_usuario"
                   placeholder="Escribe el apellido del usuario" required>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="usuario_correo">Correo del usuario</label>
            <input class="elem-group-input" type="text" id="usuario_correo" name="correo_electronico"
                   placeholder="Escribe el correo del usuario" required>
        </div>
        <div class="elem-group">
            <label class="elem-group-label" for="usuario_tel">Celular del usuario</label>
            <input class="elem-group-input" type="text" id="usuario_tel" name="telefono"
                   placeholder="Escribe el celular del usuario" required>
        </div>

        <div class="form-btn-sent-container-center">
            <button type="submit" class="form-btn-sent" name="Submit" value="Add">Guardar Usuario</button>
        </div>
    </form>
</div>
</body>
</html>