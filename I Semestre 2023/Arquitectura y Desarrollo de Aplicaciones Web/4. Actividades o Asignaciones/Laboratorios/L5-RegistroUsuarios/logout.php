<?php
session_start(); // Iniciar sesión si no está iniciada

// Eliminar todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Eliminar las cookies establecidas
setcookie('username', '', time() - 3600, '/');
setcookie('language', '', time() - 3600, '/');
setcookie('PHPSESSID', '', time() - 3600, '/');

// Redirigir al archivo index.php en la carpeta raíz
header("Location: index.php");
exit();
?>