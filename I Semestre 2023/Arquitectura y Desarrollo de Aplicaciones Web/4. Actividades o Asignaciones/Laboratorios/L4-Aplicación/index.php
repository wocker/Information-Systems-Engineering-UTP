<?php
session_start();

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar las credenciales de inicio de sesión
    if ($password === 'test') {
        // Credenciales válidas, establecer la sesión y redirigir a inicio.php
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username;

        // También guardar el nombre de usuario en una cookie
        setcookie('username', $username, time() + (86400 * 30), "/"); // 86400 = 1 día

        // Redirigir a inicio.php
        header("Location: inicio.php");
        exit();
    } else {
        // Credenciales inválidas, mostrar mensaje de acceso denegado y salir
        $error = true;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SpaceX</title>
    <link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: #000;
            font-family: 'Neo Sans Pro', sans-serif;
            color: #fff;
        }

        header {
            background-color: #000;
            padding: 20px;
        }

        #logo img {
            width: 300px;
            height: auto;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        footer {
            background-color: #000;
            padding: 20px;
            text-align: center;
        }

        footer p {
            font-size: 14px;
        }

        /* Nuevo estilo para el formulario */
        form {
            background-color: #1d1d1d;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
        }

        label {
            color: #fff;
            font-size: 16px;
        }

        input[type=text], input[type=password] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }

        /* Nuevo estilo para el botón */
        input[type=submit] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #005288;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #003366;
        }
    </style>
</head>
<body>
    <header>
        <div id="logo">
            <img src="img/logo-spacex.png" alt="Logo SpaceX" class="logo">
        </div>
    </header>
    <main>
        <?php if (isset($error) && $error): ?>
            <h1>Credenciales incorrectas, favor intentar de nuevo</h1>
        <?php else: ?>
            <h1>Iniciar sesión</h1>
            <form action="index.php" method="POST">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required><br>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required><br>
                <input type="submit" value="Iniciar sesión">
            </form>
        <?php endif; ?>
    </main>
    <footer>
        <link href="https://fonts.googleapis.com/css2?family=Neo+Sans+Pro&display=swap" rel="stylesheet">
        <p><i>© 2002-2023 SpaceX. Todos los derechos reservados.</i></p>
    </footer>
</body>
</html>
