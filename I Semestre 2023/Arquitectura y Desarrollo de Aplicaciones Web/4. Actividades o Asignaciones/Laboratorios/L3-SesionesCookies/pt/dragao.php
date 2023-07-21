<!DOCTYPE html>
<html>
<head>
  <title>SpaceX</title>
  <meta charset="UTF-8">
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
          <li><a href="index.php"<?php if (esPaginaActual("index.php")) { ?> class="active"<?php } ?>>Começar</a></li>
          <li><a href="falcao-pesado.php"<?php if (esPaginaActual("falcao-pesado.php")) { ?> class="active"<?php } ?>>Falcão Pesado</a></li>
          <li><a href="dragao.php"<?php if (esPaginaActual("dragao.php")) { ?> class="active"<?php } ?>>Dragão</a></li>
          <li><a href="nave-estelar.php"<?php if (esPaginaActual("nave-estelar.php")) { ?> class="active"<?php } ?>>Nave Estelar</a></li>
          <li><a href="starlink.php"<?php if (esPaginaActual("starlink.php")) { ?> class="active"<?php } ?>>Starlink</a></li>
          <li><a href="contate-nos.php"<?php if (esPaginaActual("contate-nos.php")) { ?> class="active"<?php } ?>>Contate-nos</a></li>
          <li><a href="borrar_cookies.php"<?php if (esPaginaActual("borrar_cookies.php")) { ?> class="active"<?php } ?>>Apagar cookies</a></li>
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
          <p>O voo de teste ocorreu em 30 de maio de 2020 e transportou dois astronautas da NASA, Douglas G. Hurley e Robert L. Behnken, do Centro Espacial Kennedy, na Flórida, Estados Unidos, para a ISS.</p>
          <p>Alguns destaques da missão Crew Dragon DM-2 são:</p>
          <ul>
            <li><strong>1. Primeira missão tripulada lançada de solo americano desde 2011:</strong> Desde que o ônibus espacial se aposentou em 2011, os astronautas americanos contam com os foguetes russos Soyuz para chegar à ISS. O DM-2 marcou o retorno do lançamento humano ao espaço a partir do solo americano..</li>
            <li><strong>2. A primeira missão tripulada da SpaceX:</strong> Embora a SpaceX envie cargas para a ISS há anos com sua nave de carga Dragon, o DM-2 foi a primeira vez que a empresa levou pessoas ao espaço.</li>
            <li><strong>3. Nave espacial reutilizável:</strong> O Crew Dragon foi projetado para ser reutilizável, um componente-chave da visão da SpaceX para tornar o espaço mais acessível e econômico.</li>
            <li><strong>4. Acoplamento autônomo:</strong> Ao contrário das missões anteriores, em que os astronautas tinham que manobrar a espaçonave para atracar na ISS, a Crew Dragon atracou autonomamente na estação.</li>
            <li><strong>5. Retorno seguro à Terra:</strong> Após um período de teste bem-sucedido na ISS, o Crew Dragon se desacoplou da estação em 1º de agosto de 2020 e reentrou na atmosfera da Terra. Em seguida, pousou com sucesso no Golfo do México em 2 de agosto de 2020.</li>
          </ul>
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
function esPaginaActual($nombrePagina) {
  $rutaActual = basename($_SERVER['PHP_SELF']);
  return ($rutaActual === $nombrePagina);
}
  ?>
  </html>
  