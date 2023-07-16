<?php
session_start();
session_destroy();


include_once("../includes/header.php");


encabezado();

?>

<head>
    <title>Cerraste Sesión</title>
    <link rel="icon" href="../../../public/imgs/denuncia_icon.jpg">
    <link rel="stylesheet" href="../../../public/css/main.css">
</head>

<body>

<div class="logout-container">
    <h1 class="logout-title">Has cerrado sesión</h1>
    <a class="logout-link" href="/sistema-denuncias">Vuelve al inicio</a>
</div>

</body>