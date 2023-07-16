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

    .main-container {
      flex-grow: 1;
      background-color: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .image-container {
      position: relative;
      max-width: 800px;
    }
    
    .image-container img {
      display: block;
      width: 100%;
      height: auto;
    }
    
    .texto-imagen {
      position: absolute;
      left: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.7);
      color: #ffffff;
      padding: 10px;
      width: 100%;
      box-sizing: border-box;
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
          <li><a href="../logout.php">Cerrar Sesión</a></li>
          <li><span class="visita">Visita # <?php echo obtenerVisitas(); ?></span></li>
        </ul>
      </nav>
    </header>

  <div class="main-container">
    <main>
      <div class="row">
        <div class="column">
          <div class="image-container">
            <img src="img/landing-page.jpg" alt="Haciendo a la humanidad una especie interplanetaria" class="image">
            <div class="texto-imagen">
              <b>Starship SuperHeavy:</b> El Cohete más poderoso construido alguna vez por la humanidad.
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
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
