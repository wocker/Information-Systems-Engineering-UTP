<?php
// Verificar si se ha enviado un idioma a través de la URL
if (isset($_GET['lang'])) {
    // Obtener el idioma seleccionado
    $selectedLang = $_GET['lang'];
    
    // Establecer la cookie con el idioma seleccionado (válida por 30 días)
    setcookie('language', $selectedLang, time() + (86400 * 30), '/');
    
    // Redirigir a la página principal correspondiente según el idioma seleccionado
    header("Location: $selectedLang");
    exit();
}

// Obtener el idioma almacenado en la cookie, si existe
$selectedLang = isset($_COOKIE['language']) ? $_COOKIE['language'] : '';

// Redirigir a la página principal correspondiente según el idioma almacenado en la cookie
if (!empty($selectedLang)) {
    header("Location: $selectedLang");
    exit();
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

        nav ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        nav ul li {
            background: #000;
            padding: 10px 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 16px;
        }

        nav ul li a:hover {
            background-color: #fff;
            color: #000;
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

        @media (max-width: 600px) {
            nav ul {
                flex-direction: column;
            }

            nav ul li {
                width: 100%;
                margin-bottom: 10px;
            }
        }
        
        @media (max-width: 768px) {
            header {
                padding: 10px;
            }

            h1 {
                font-size: 20px;
            }

            nav ul li {
                padding: 8px 16px;
                font-size: 14px;
            }

            footer p {
                font-size: 12px;
            }
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
        <h1>Elige tu Idioma</h1>
        <nav>
            <ul>
                <li><a href="?lang=es">Español</a></li>
                <li><a href="?lang=en">Inglés</a></li>
                <li><a href="?lang=pt">Portugués</a></li>
            </ul>
        </nav>
    </main>
    <footer>
        <link href="https://fonts.googleapis.com/css2?family=Neo+Sans+Pro&display=swap" rel="stylesheet">
        <p><i>© 2002-2023 SpaceX. Todos los derechos reservados.</i></p>
    </footer>
</body>
</html>
