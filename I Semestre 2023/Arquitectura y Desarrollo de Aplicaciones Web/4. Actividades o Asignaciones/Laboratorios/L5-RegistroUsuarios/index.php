<?php
session_start();
$host = "localhost";
$db = "usuarios";
$user = "root";
$pass = "";
$charset = "utf8mb4";
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
         PDO::ATTR_EMULATE_PREPARES   => false];
$pdo = new PDO($dsn, $user, $pass, $opt);

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Verificar las credenciales de inicio de sesión
    $stmt = $pdo->prepare('SELECT * FROM Registros WHERE Nombre_de_Usuario = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Si el usuario existe y las contraseñas coinciden
    if ($user && password_verify($password, $user['Contraseña'])) {
        // Credenciales válidas, establecer la sesión y redirigir a inicio.php
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username;

        // También guardar el nombre de usuario en una cookie
        setcookie('username', $username, time() + (86400 * 30), "/"); // 86400 = 1 día

        // Redirigir a inicio.php
        header("Location: inicio.php");
        exit();
    } else if ($user) {
        // Usuario existe, pero la contraseña es incorrecta
        $error = "Favor de verificar Nombre de Usuario o Contraseña";
    } else {
        // El usuario no existe, crear el registro
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare('INSERT INTO Registros (Nombre_de_Usuario, Email, Contraseña) VALUES (?, ?, ?)');
        $stmt->execute([$username, $email, $hash]);

        echo "<script>alert('Usuario registrado exitosamente');window.location = 'inicio.php';</script>";
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

        input[type=text], input[type=password], input[type=email] {
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
        <?php if (isset($error)): ?>
            <h1><?php echo $error; ?></h1>
        <?php else: ?>
            <h1>Iniciar sesión o registrarse</h1>
            <form action="index.php" method="POST">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required><br>
                <input type="submit" value="Iniciar sesión / Registrarse">
            </form>
        <?php endif; ?>
    </main>
    <footer>
        <link href="https://fonts.googleapis.com/css2?family=Neo+Sans+Pro&display=swap" rel="stylesheet">
        <p><i>© 2002-2023 SpaceX. Todos los derechos reservados.</i></p>
    </footer>
</body>
</html>
