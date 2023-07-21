<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Consultorio Clínico ABC | Nuestros Servicios</title>
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

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            background: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            margin-bottom: 10px;
            text-align: center;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
        }

        @media (max-width: 600px) {
            nav ul li {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <header>
        <div id="logo">
            <a href="inicio.php"> <img src="img\logo_transparent.png" alt="Logo Consultorio Clínico ABC" /></a>
        </div>
        <div id="welcome-message">
            <?php
                if (isset($_COOKIE['username'])) {
                    echo "Bienvenido " . $_COOKIE['username'];
                }
            ?>
        </div>
    </header>
    <main>
        <nav>
            <ul>
                <li><a href="inicio.php">Inicio</a></li>
                <li><a href="imc.php">Índice de Masa Corporal (IMC)</a></li>

            </ul>
        </nav>
    </main>
    <footer>
        <link href="https://fonts.googleapis.com/css2?family=Neo+Sans+Pro&display=swap" rel="stylesheet">
        <br>
        <p><i>Todos los Derechos reservados 2023. Consultorio Clínico ABC Ltd.</i></p>
    </footer>
</body>
</html>
