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

    nav .visita {
  color: #ffffff;
  text-decoration: none;
  font-size: 18px;
  margin: 0 10px;
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

  </style>
</head>
<body>
  <div class="header-container">
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
  </div>
  <main>
    <div class="main-container">
        <div class="column">
          <video src="img/fh-poder.webm" autoplay loop></video>
        </div>
        <div class="column">
          <div class="text-container">
            <p>The Falcon Heavy is based on the design of the Falcon 9 rocket, but has two additional rockets (side boosters) that attach to the sides of the Falcon 9 central core. These side boosters are virtually identical to the Falcon 9 first stage, and They are designed to be reusable, landing upright after use.</p>
            <p>It has a massive payload capacity of up to 63,800 kg (140,700 lb) in Low Earth Orbit (LEO), making it one of the most powerful rockets. It can also carry payloads into geosynchronous orbits and perform interplanetary missions.</p>
            <p>The Falcon Heavy's side boosters and center core reusability have significantly allowed SpaceX to reduce space access costs. After separating the side boosters, they return to the ground and land in a controlled manner for later reuse on future missions.</p>
          </div>
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
