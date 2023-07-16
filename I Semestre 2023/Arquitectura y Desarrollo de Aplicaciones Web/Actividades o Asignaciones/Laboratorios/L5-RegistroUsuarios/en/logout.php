<?php
session_start(); // Iniciar sesión si no está iniciada

// Eliminar todas las variables de sesión
$_SESSION = array();

// Destruir la sesión
session_destroy();

// Eliminar las cookies establecidas
setcookie('visitas', '', time() - 3600, '/');

// Redirigir al archivo index.php en la carpeta padre
header("Location: /index.php");
exit();
?>
