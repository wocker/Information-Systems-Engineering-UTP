<?php
include_once("../../../app/Models/CRUD.php");

// PATH from content root: resources/views/login/login.php

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
    if (empty($email)) {
        $email_err = 'Por favor ingresa un correo electrónico.';
    }



    function emailExists($builder, $email)
    {
        // Query para buscar el correo en la base de datos
        $email_query = 'SELECT id_ciudadano, nombre_ciudadano, correo_electronico FROM ciudadano WHERE correo_electronico = ?';
        $stmt = $builder->prepare($email_query);

        // Prepara el pdo
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user) {
            // email found
            $_SESSION['email'] = $user['correo_electronico'];
            $_SESSION['nombre'] = $user['nombre_ciudadano'];
            $_SESSION['id'] = $user['id_ciudadano'];
            header('location: http://localhost/sistema-denuncias/');
            unset($stmt);
            return true;
        } else {
            echo '<script>alert("ciudadano no encontrado")</script>';
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
    <title>Inicia Sesión con tu correo electrónico</title>
    <link rel="icon" type="image/x-icon" href="../../../public/imgs/denuncia_icon.jpg">

    <link rel="stylesheet" href="../../../public/css/main.css">
</head>

<body>
<div class="login-form-page">
    <div class="login-form-container">

        <div class="login-form-title">
            <h3>Inicia Sesión con tu correo electrónico</h3>
        </div>


        <div class="login-form">
            <form class="login-form--component" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label class="login-form--component-title" for="correo"> Correo electrónico:</label>
                <input type="email" id="correo" name="correo_electronico">
                <br>
                <button type="submit" class="form-btn" name="submit">Inicia Sesión</button>
                <br>
                <span>¿Eres administrador? </span>
                <a href="login-admin.php" class="text-white">Inicia Sesión aquí</a>

            </form>
        </div>
    </div>
</div>
</body>