<!DOCTYPE html>
<html>
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <main>
    <div class="main-container">
        <div class="column">
          <video src="img/ilm-starship.webm" autoplay loop></video>
        </div>
        <div class="column">
          <div class="text-container">
            <p>Starship is a fully reusable space transportation system being developed by SpaceX. It is the next generation of rockets the company is developing to transport humans and cargo to deep-space destinations such as the Moon and Mars.</p>
            <p>A distinctive feature of the Starship system is that both the Super Heavy and the Starship parts are designed to be fully reusable. This means they can land back on Earth after launch and be reused for future missions. This reuse is a vital part of SpaceX's vision to dramatically reduce the cost of access to space.</p>
            <p>In addition to deep space missions, SpaceX has also proposed using Starship for a variety of other tasks, including satellite launch services, missions to the International Space Station, and even point-to-point travel on Earth, in which Starship could transport passengers from one place to another on the planet in less than an hour.</p>
          </div>
        </div>
      </div>
	</main>
  </div>
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

  .footer-container {
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 20px;
    background-color: #000000;
  }

  .footer-column {
    flex-basis: 25%;
    color: #ffffff;
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
