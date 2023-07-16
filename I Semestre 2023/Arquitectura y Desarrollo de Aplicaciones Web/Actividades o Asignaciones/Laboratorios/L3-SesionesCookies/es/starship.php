<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>SpaceX</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="favicon/ico" href="img/favicon.ico"/>
  </head>
  <style>
    body {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 100vh;
      margin: 0;
      padding: 0;
    }

    header, nav {
      background-color: #000000;
      padding: 20px;
      text-align: center;
    }

    header h1, nav a {
      color: #ffffff;
      margin: 0;
      text-decoration: none;
      font-size: 18px;
    }

    nav ul {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    nav li {
      margin: 0 10px;
    }

    .main-container {
      display: flex;
      justify-content: space-around;
      align-items: center;
      padding: 20px;
    }

    .column {
      flex-basis: 45%;
    }


    .column video {
      width: 640px;
      height: 480px;
    }

    .text-container {
      background-color: black;
      color: white;
      border-radius: 20px;
      padding: 20px;
    }

    .footer-container {
      display: flex;
      justify-content: space-around;
    }

    .footer-column {
      flex-basis: 25%;
    }

    footer img, footer p {
      color: #ffffff;
      text-decoration: none;
    }
    
    nav .visita {
  color: #ffffff;
  text-decoration: none;
  font-size: 18px;
  margin: 0 10px;
}

  </style>
<body>
  <header>
    <a href="index.html"><img src="img/logo-spacex.png" alt="Logo SpaceX" class="logo" align="left"></a>
    <nav>
      <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="falcon-heavy.php">Falcon Heavy</a></li>
        <li><a href="dragon.php">Dragon</a></li>
        <li><a href="starship.php">Starship</a></li>
        <li><a href="starlink.php">Starlink</a></li>
        <li><a href="contactanos.php">Contáctanos</a></li>
        <li><a href="borrar_cookies.php">Borrar Cookies</a></li>
        <li><span class="visita">Visita # <?php echo obtenerVisitas(); ?></span></li>
      </ul>
    </nav>
  </header>
  <main>
    <div class="main-container">
      <div class="column">
        <video src="img/ilm-starship.webm" autoplay loop></video>
      </div>
      <div class="column">
        <div class="text-container">
          <p>Starship es un sistema de transporte espacial completamente reutilizable que está siendo desarrollado por SpaceX. Es la próxima generación de cohetes que la empresa está desarrollando para transportar humanos y cargas a destinos en el espacio profundo, como la Luna y Marte.</p>
          <p>Una característica distintiva del sistema Starship es que ambas partes, tanto el Super Heavy como el Starship, están diseñadas para ser totalmente reutilizables. Esto significa que pueden aterrizar de vuelta en la Tierra después del lanzamiento y ser reutilizados para futuras misiones. Esta reutilización es una parte clave de la visión de SpaceX para reducir drásticamente el costo del acceso al espacio.</p>
          <p>Además de las misiones al espacio profundo, SpaceX también ha propuesto utilizar Starship para una variedad de otras misiones, incluyendo servicios de lanzamiento de satélites, misiones a la Estación Espacial Internacional y hasta viajes de punto a punto en la Tierra, en los que Starship podría transportar pasajeros de un lugar a otro del planeta en menos de una hora.</p>
        </div>
      </div>
    </div>
  </main>

  <div class="footer-container">
    <footer>
      <div class="footer-column">
        <img src="img/logo-spacex.png" alt="Logo SpaceX" class="logo">
        <p class="rights">© 2002-2023 SpaceX. Todos los derechos reservados.</p>
      </div>
      <div class="footer-column">
        <h3>¿Quiénes Somos?</h3>
        <p>SpaceX es una empresa aeroespacial que se dedica a la fabricación y lanzamiento de cohetes y naves espaciales. Nuestra misión es hacer que la humanidad sea una especie multiplanetaria explorando y colonizando Marte.</p>
      </div>
      <div class="footer-column">
        <h3>Programas</h3>
        <ul>
          <li><a href="dragon.php">Dragon</a></li>
          <li><a href="starlink.php">Starlink</a></li>
          <li><a href="starship.php">Starship</a></li>
        </ul>
      </div>
    </footer>
  </div>
</body>
<?php
  function obtenerVisitas() {
    if (isset($_COOKIE['visitas'])) {
      $visitas = $_COOKIE['visitas'];
    } else {
      $visitas = 0;
    }

    // Incrementar el valor de visitas en 1
    $nuevasVisitas = $visitas + 1;

    // Establecer la cookie con el nuevo valor de visitas
    setcookie('visitas', $nuevasVisitas, time() + 86400); // Caduca después de 1 día (86400 segundos)

    return $nuevasVisitas;
  }
  ?>
</html>
