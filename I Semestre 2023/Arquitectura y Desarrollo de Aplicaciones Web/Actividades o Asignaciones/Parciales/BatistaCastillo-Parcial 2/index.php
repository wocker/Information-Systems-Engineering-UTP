<?php
class UserAuth {
    private $test_password;

    public function __construct($test_password) {
        $this->test_password = $test_password;
        session_start();
    }

    public function loginUser() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            // Verificar las credenciales
            if ($password == $this->test_password) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
    
                // Establecer la cookie del nombre de usuario
                setcookie('username', $username, time() + (86400 * 30), "/"); // 86400 = 1 día
    
                // Redirigir al usuario a la página de inicio de la aplicación
                header('Location: inicio.php');
                exit;
            } else {
                // Las credenciales son incorrectas, mostrar un mensaje de error
                $error_message = 'Usuario o contraseña incorrectos.';
                return $error_message;
            }
        }
        return null;
    }
}

$auth = new UserAuth('pass1234');
$error_message = $auth->loginUser();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión | Consultorio Clínico ABC</title>
    <link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/>
    <link rel="stylesheet" href="css/style.css">
    <style>
body {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
    background: #f6f6f6;
    font-family: 'Neo Sans Pro', sans-serif;
}

#logo img {
    max-width: 100%;
    height: auto;
}

form {
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
    width: 80%;
    max-width: 500px;

@media (max-width: 600px) {
    form {
        width: 90%;
    }
}

    </style>
</head>
<body>
    <header>
        <div id="logo">
        <a href="inicio.php"> <img src="img\logo_transparent.png" alt="Logo Consultorio Clínico ABC" /></a>
        </div>
    </header>
    <main>
        <?php
            if (isset($error_message)) {
                echo '<p style="color: red;">' . $error_message . '</p>';
            }
        ?>
        <form method="post" action="">
            <label for="username">Usuario:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Contraseña:</label><br>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="Iniciar Sesión">
        </form>
    </main>
</body>
<footer>
    <link href="https://fonts.googleapis.com/css2?family=Neo+Sans+Pro&display=swap" rel="stylesheet">
    <br>
    <p><i>Todos los Derechos reservados 2023. Consultorio Clínico ABC Ltd.</i></p>
</footer>
</html>
