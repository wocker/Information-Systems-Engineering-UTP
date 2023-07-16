<!DOCTYPE html>
<html lang="en">
<head>
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

    .video-container {
      position: relative;
      padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
      padding-top: 25px;
      height: 0;
      overflow: hidden;
    }

    .video-container iframe {
      position: absolute;
      top:0;
      left: 0;
      width: 100%;
      height: 100%;
    }

    .texto-container {
      background-color: rgba(0, 0, 0, 0.7);
      color: #ffffff;
      border-radius: 15px;
      padding: 20px;
    }

    .footer-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px;
      padding: 20px;
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
</head>
<body>
  <header>
    <a href="index.html"><img src="img/logo-spacex.png" alt="Logo SpaceX" class="logo" align="left"></a>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="falcon-heavy.php">Falcon Heavy</a></li>
        <li><a href="dragon.php">Dragon</a></li>
        <li><a href="starship.php">Starship</a></li>
        <li><a href="starlink.php">Starlink</a></li>
        <li><a href="contact-us.php">Contact Us</a></li>
        <li><a href="../logout.php">Logout</a></li>
        <li><span class="visita">Visit # <?php echo obtenerVisitas(); ?></span></li>
      </ul>
    </nav>
  </header>
  <main>
    <div class="main-container">
      <div class="column image-container">
        <img src="img/batch-starlink.jpg" alt="60 Satélites Starlink 1.0 apilados para entrar en la Cofia de un Falcon 9" class="image">
    </div>
    <div class="column texto-container">
      <p>Starlink is a project developed by SpaceX, the aerospace company founded by Elon Musk. The essential idea behind Starlink is to create a constellation of satellites in low orbit around the Earth to provide high-speed, low-latency broadband Internet access worldwide.</p>
      <p>Here are some key details about Starlink:</p>
      <ul>
        <li><strong>1. Low Earth Orbit (LEO) satellites:</strong> Starlink's satellites operate in Low Earth Orbit, which is a region of space about 550 kilometers from Earth's surface. At this altitude, the satellites can cover a specific area of the Earth with much lower latency delay compared to traditional communications satellites operating in geostationary orbits at around 36,000 kilometers high. Low orbit also allows for faster data rates.</li>
        <li><strong>2. Constellation of satellites:</strong> Starlink plans to have thousands of these satellites in orbit, forming a constellation that can provide global coverage. The satellites are interconnected by laser links, allowing data to be transmitted from one satellite to another, thus reducing the need for ground stations and minimizing latency.</li>
        <li><strong>3. Radio frequency links:</strong> Satellites communicate with ground stations and user terminals on Earth using radio frequencies. Starlink uses Ku and Ka frequency bands, which are widely used for satellite communications.</li>
        <li><strong>4. User Terminal:</strong> Los usuarios de Starlink tienen una terminal que consta de una pequeña antena parabólica (a menudo llamada "Dishy McFlatface" por SpaceX) y un módem. La antena, que es motorizada y capaz de orientarse automáticamente hacia el satélite más cercano, recibe las señales de los satélites y las envía al módem para proporcionar acceso a Internet.</li>
        <li><strong>5. Mitigation of Light Pollution and Space Debris:</strong> SpaceX has been working to minimize the impact of its satellites on astronomical observation and the space environment. Revised designs include "VisorSat," a measure to reduce the reflectivity of satellites, and a propulsion system to remove decommissioned satellites from orbit to reduce the accumulation of space debris.</li>
    </ul>    
    </div>
		</div>
  </main>
  <div class="footer-container">
    <footer>
      <div class="footer-column">
        <img src="img/logo-spacex.png" alt="Logo SpaceX" class="logo">
        <p class="rights">© 2002-2023 SpaceX. All rights reserved.</p>
      </div>
      <div class="footer-column">
        <h3>About Us</h3>
        <p>SpaceX is an aerospace company dedicated to the manufacture and launch of rockets and spacecraft. Our mission is to make humanity a multi-planetary species by exploring and colonizing Mars.</p>
      </div>
      <div class="footer-column">
        <h3>Programs</h3>
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

