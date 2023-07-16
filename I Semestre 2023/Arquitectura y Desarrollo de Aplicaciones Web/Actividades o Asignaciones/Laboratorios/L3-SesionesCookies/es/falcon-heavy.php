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

    .container {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: #ffffff;
    }

    .main-container {
      display: flex;
      justify-content: space-around;
      flex-grow: 1;
      padding: 20px;
    }

    .column {
      flex-basis: 45%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
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

    nav .visita {
  color: #ffffff;
  text-decoration: none;
  font-size: 18px;
  margin: 0 10px;
}
  </style>
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
        <div class="column">
          <video src="img/fh-poder.webm" autoplay loop></video>
        </div>
        <div class="column">
          <div class="text-container">
            <p>El Falcon Heavy se basa en el diseño del cohete Falcon 9, pero cuenta con dos cohetes adicionales (boosters laterales) que se acoplan a los costados del núcleo central del Falcon 9. Estos boosters laterales son prácticamente idénticos a la primera etapa del Falcon 9 y están diseñados para ser reutilizables, aterrizando verticalmente después de su uso.</p>
            <p>Tiene una capacidad de carga útil masiva de hasta 63,800 kg (140,700 lb) en una órbita terrestre baja (LEO), lo que lo convierte en uno de los cohetes más poderosos en servicio. También puede llevar cargas útiles a órbitas geosincrónicas y realizar misiones interplanetarias.</p>
            <p>La capacidad de reutilización de los boosters laterales y el núcleo central del Falcon Heavy ha permitido a SpaceX reducir significativamente los costos de acceso al espacio. Después de la separación de los boosters laterales, estos regresan a tierra y aterrizan de manera controlada para su posterior reutilización en futuras misiones.</p>
          </div>
        </div>
      </div>
	</main>
  <style>
  .main-container {
	height: calc(100vh - 120px);
	display: flex;
	justify-content: center;
	align-items: center;
  }
  
  .image-container {
	position: relative;
  }
  
  .main-container img {
	max-width: 100%;
	height: auto;
  }
  
  .texto-imagen {
	position: absolute;
	left: 0;
	bottom: 0;
	background-color: rgba(0, 0, 0, 0.7);
	color: #ffffff;
	padding: 10px;
  }
</style>
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
  ?>
</body>
</html>
