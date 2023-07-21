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
  <title>SpaceX</title>
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/footer.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="favicon/ico" href="img/favicon.ico"/>
  <style>
    body {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      height: 100vh;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #000000;
      padding: 20px;
      text-align: center;
      margin-bottom: 0;
    }

    header h1 {
      color: #ffffff;
      margin: 0;
    }

    nav {
      background-color: #000000;
      padding: 10px;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 0;
    }

    nav ul {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
    }

    nav li {
      margin: 0 10px;
    }

    nav a {
      color: #ffffff;
      text-decoration: none;
      font-size: 18px;
    }

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #ffffff;
    }

    .main-container {
      padding: 20px;
    }

    .content-container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .video-container {
      max-width: 1280px;
      max-height: 720px;
      width: 100vw;
      height: 56.25vw; /* 720 / 1280 = 0.5625 */
      overflow: hidden;
      margin-bottom: 40px;
    }

    .video-container iframe {
      width: 100%;
      height: 100%;
    }

    .texto-container {
      background-color: rgba(0, 0, 0, 0.7);
      color: #ffffff;
      border-radius: 15px;
      padding: 20px;
    }
    
    nav .visita {
  color: #ffffff;
  text-decoration: none;
  font-size: 18px;
  margin: 0 10px;
}

  </style>
</head>
<body>
  <div class="header-container">
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
  </div>
  <main>
    <div class="main-container">
      <div class="content-container">
        <div class="video-container">
          <iframe src="https://www.youtube.com/embed/76VF1_vfkQ8?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        <div class="texto-container">
          <p>El vuelo de prueba tuvo lugar el 30 de mayo de 2020 y transportó a dos astronautas de la NASA, Douglas G. Hurley y Robert L. Behnken, desde el Kennedy Space Center en Florida, Estados Unidos, hasta la ISS.</p>
          <p>Algunos detalles destacados de la misión Crew Dragon DM-2 son:</p>
          <ul>
            <li><strong>1. Primera misión tripulada lanzada desde suelo estadounidense desde 2011:</strong> Desde que se retiró el transbordador espacial en 2011, los astronautas estadounidenses han dependido de los cohetes rusos Soyuz para llegar a la ISS. DM-2 marcó el regreso del lanzamiento humano al espacio desde suelo estadounidense.</li>
            <li><strong>2. Primera misión tripulada de SpaceX:</strong> Aunque SpaceX ha estado enviando cargas a la ISS durante años con su nave de carga Dragon, DM-2 fue la primera vez que la empresa transportó personas al espacio.</li>
            <li><strong>3. Nave espacial reutilizable:</strong> La Crew Dragon está diseñada para ser reutilizable, un componente clave de la visión de SpaceX para hacer que el espacio sea más accesible y asequible.</li>
            <li><strong>4. Acoplamiento autónomo:</strong> A diferencia de las misiones anteriores en las que los astronautas tenían que maniobrar la nave espacial para acoplarse a la ISS, la Crew Dragon se acopló de forma autónoma a la estación.</li>
            <li><strong>5. Regreso seguro a la Tierra:</strong> Después de un exitoso período de prueba en la ISS, la Crew Dragon se desacopló de la estación el 1 de agosto de 2020 y volvió a entrar en la atmósfera terrestre. Luego aterrizó con éxito en el Golfo de México el 2 de agosto de 2020.</li>
          </ul>
        </div>
      </div>
    </div>
  </main>
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
</body>
</html>