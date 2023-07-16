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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="header-container">
    <header>
      <a href="index.html"><img src="img/logo-spacex.png" alt="Logo SpaceX" class="logo" align="left"></a>
      <nav>
        <ul>
          <li><a href="index.php"<?php if (esPaginaActual("index.php")) { echo ' class="active"'; } ?>>Começar</a></li>
          <li><a href="falcao-pesado.php"<?php if (esPaginaActual("falcao-pesado.php")) { echo ' class="active"'; } ?>>Falcão Pesado</a></li>
          <li><a href="dragao.php"<?php if (esPaginaActual("dragao.php")) { echo ' class="active"'; } ?>>Dragão</a></li>
          <li><a href="nave-estelar.php"<?php if (esPaginaActual("nave-estelar.php")) { echo ' class="active"'; } ?>>Nave Estelar</a></li>
          <li><a href="starlink.php"<?php if (esPaginaActual("starlink.php")) { echo ' class="active"'; } ?>>Starlink</a></li>
          <li><a href="contate-nos.php"<?php if (esPaginaActual("contate-nos.php")) { echo ' class="active"'; } ?>>Contate-nos</a></li>
          <li><a href="borrar_cookies.php"<?php if (esPaginaActual("borrar_cookies.php")) { echo ' class="active"'; } ?>>Apagar cookies</a></li>
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
          <p>O Falcon Heavy é baseado no projeto do foguete Falcon 9, mas tem dois foguetes adicionais (propulsores laterais) que se conectam às laterais do núcleo central do Falcon 9. Esses propulsores laterais são virtualmente idênticos ao primeiro estágio do Falcon 9 e são projetados para serem reutilizáveis, pousando na vertical após o uso.</p>
          <p>Ele tem uma enorme capacidade de carga de até 63.800 kg (140.700 lb) em órbita terrestre baixa (LEO), tornando-o um dos foguetes mais poderosos em serviço. Ele também pode transportar cargas em órbitas geossíncronas e realizar missões interplanetárias.</p>
          <p>A reutilização dos propulsores laterais e do núcleo central do Falcon Heavy permitiu que a SpaceX reduzisse significativamente os custos de acesso ao espaço. Após a separação dos propulsores laterais, eles retornam ao solo e pousam de forma controlada para posterior reutilização em missões futuras.</p>
        </div>
      </div>
    </div>
  </main>
  <div class="footer-container">
    <footer>
      <div class="footer-column">
        <img src="img/logo-spacex.png" alt="Logo SpaceX" class="logo">
        <p class="rights">© 2002-2023 SpaceX. Todos os direitos reservados.</p>
      </div>
      <div class="footer-column">
        <h3>Quem Somos?</h3>
        <p>A SpaceX é uma empresa aeroespacial que se dedica à fabricação e lançamento de cohetes e naves espaciais. Nossa missão é fazer com que a humanidade seja uma espécie multiplanetária explorando e colonizando Marte.</p>
      </div>
      <div class="footer-column">
        <h3>Programas</h3>
        <ul>
          <li><a href="dragao.php">Dragão</a></li>
          <li><a href="starlink.php">Starlink</a></li>
          <li><a href="nave-estelar.php">Nave Estelar</a></li>
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

    function esPaginaActual($nombrePagina) {
      $rutaActual = basename($_SERVER['PHP_SELF']);
      return ($rutaActual === $nombrePagina);
    }
  ?>
</body>
</html>
