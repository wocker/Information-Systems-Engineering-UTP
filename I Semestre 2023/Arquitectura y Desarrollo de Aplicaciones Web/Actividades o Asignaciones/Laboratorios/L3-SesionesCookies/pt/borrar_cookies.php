<?php
// Establecer una fecha de expiración pasada para eliminar la cookie
setcookie('language', '', time() - 3600, '/');

// Redirigir a la página principal
header('Location: index.php');
exit();
?>
