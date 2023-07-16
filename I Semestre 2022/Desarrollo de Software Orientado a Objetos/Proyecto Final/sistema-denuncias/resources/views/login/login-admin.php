<?php
include_once("../../../app/Models/CRUD.php");

// PATH from content root: resources/views/login/login-admin.php

$pdo = new CRUD();
session_start();

 // Inicializa una variable con los métodos del CRUD
$email = '';

// Variable de error
$emaiL_err = '';

// Procesando el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $email = trim($_POST['correo_electronico']);


    // Verifica que el campo no sea vacio
    if ($email != 'admin@gestor.com') {
        $email_err = 'El correo ingresado no es un correo de administrador. De lo contrario ingresa como usuario.';
        echo $email_err;
    }

    function emailExists($builder, $email)
    {
        // Query para buscar el correo en la base de datos
        $email_query = 'SELECT id_usuario, nombre_usuario, correo_usuario FROM usuario WHERE correo_usuario = ?';
        $stmt = $builder->prepare($email_query);

        // Prepara el pdo
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user) {
            // email found
            $_SESSION['email'] = $user['correo_usuario'];
            $_SESSION['nombre'] = $user['nombre_usuario'];
            $_SESSION['id'] = $user['id_usuario'];
            // TODO Buscar la forma en la que rediriga segun sea el nombre de la carpeta correcta.
            header('location: http://localhost/sistema-denuncias/resources/views/admin/admin-index.php');
            unset($stmt);
            return true;
        } else {
            // or not
            echo '<script>alert("Usuario administrador no encontrado")</script>';
            unset($stmt);
            return false;
        }
    }

    if (empty($emaiL_errl)) {
        emailExists($pdo, $email);
    }
}

?>

<head>
    <title>Admin Inicio de sesión</title>
    <link rel="icon" type="image/x-icon" href="../../../public/imgs/denuncia_icon.jpg">
    <link rel="stylesheet" href="../../../public/css/main.css">
</head>

<div class="login-form-page">
    <div class="login-form-container">

        <div class="login-form-title">
            <h3>Inicia Sesión con tu correo electrónico</h3>
        </div>

        <div class="login-form">

            <form class="login-form--component" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label class="login-form--component-title" for="correo"> Correo electrónico de administrador:</label>
                <input type="email" id="correo" name="correo_electronico">
                <br>
                <button type="submit" class="form-btn" name="submit">Inicia Sesión</button>
                <br>
                <span>¿No Eres administrador? </span>
                <a href="./login.php">Inicia Sesión como usuario aquí</a>

                <br>

            </form>
        </div>
    </div>
</div>
