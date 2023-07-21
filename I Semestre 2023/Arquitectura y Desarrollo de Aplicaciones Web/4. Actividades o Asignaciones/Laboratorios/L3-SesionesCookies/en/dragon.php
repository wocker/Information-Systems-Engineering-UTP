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

    .footer-container {
      display: flex;
      justify-content: space-around;
    }

    .footer-column {
      flex-basis: 25%;
    }

    footer img,
    footer p {
      color: #ffffff;
      text-decoration: none;
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
          <li><a href="borrar_cookies.php">Delete Cookies</a></li>
          <li><span class="visita">Visit # <?php echo obtenerVisitas(); ?></span></li>
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
          <p>The test flight took place on May 30, 2020 and transported two NASA astronauts, Douglas G. Hurley and Robert L. Behnken, from the Kennedy Space Center in Florida, United States, to the ISS.</p>
          <p>Some highlights of the Crew Dragon DM-2 mission are:</p>
          <ul>
            <li><strong>1. First manned mission launched from US soil since 2011:</strong> Since the space shuttle retired in 2011, American astronauts have relied on Russian Soyuz rockets to get to the ISS. DM-2 marked the return of the human launch into space from US soil.</li>
            <li><strong>2. SpaceX's first manned mission:</strong> Although SpaceX has been sending cargo to the ISS for years with its Dragon cargo ship, DM-2 was the first time the company had flown people into space.</li>
            <li><strong>3. Reusable Spaceship:</strong> The Crew Dragon is designed to be reusable, a key component of SpaceX's vision to make space more accessible and affordable.</li>
            <li><strong>4. Autonomous coupling:</strong> Unlike previous missions where astronauts had to maneuver the spacecraft to dock with the ISS, Crew Dragon docked autonomously to the station.</li>
            <li><strong>5. Safe return to Earth:</strong> After a successful test period on the ISS, Crew Dragon undocked from the station on August 1, 2020, and re-entered Earth's atmosphere. She then successfully landed in the Gulf of Mexico on August 2, 2020.</li>
          </ul>
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
