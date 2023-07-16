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
</head>
<body>
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
        <li><a href="../logout.php"<?php if (esPaginaActual("../logout.php")) { ?> class="active"<?php } ?>>Fechar Sessão</a></li>
        <li><span class="visita">Visita # <?php echo obtenerVisitas(); ?></span></li>
      </ul>
    </nav>
  </header>
  <main>
    <div class="main-container">
      <div class="column image-container">
        <img src="img/batch-starlink.jpg" alt="60 Satélites Starlink 1.0 apilados para entrar en la Cofia de un Falcon 9" class="image">
    </div>
    <div class="column texto-container">
      <p>Starlink é um projeto desenvolvido pela SpaceX, empresa aeroespacial fundada por Elon Musk. A ideia essencial por trás do Starlink é criar uma constelação de satélites em órbita baixa ao redor da Terra para fornecer acesso à Internet de banda larga de alta velocidade e baixa latência em todo o mundo.</p>
      <p>Aqui estão alguns detalhes importantes sobre o Starlink:</p>
      <ul>
        <li><strong>1. Satélites de órbita terrestre baja (LEO):</strong> Os satélites da Starlink operam na órbita terrestre baixa, que é uma região do espaço a cerca de 550 quilômetros da superfície da Terra. Nesta altitude, os satélites podem cobrir uma área específica da Terra com atraso de latência muito menor em comparação com os satélites de comunicações tradicionais que operam em órbitas geoestacionárias a cerca de 36.000 quilômetros de altura. A órbita baixa também permite taxas de dados mais rápidas.</li>
        <li><strong>2. Constelação de satélites:</strong> A Starlink planeja ter milhares desses satélites em órbita, formando uma constelação que pode fornecer cobertura global. Os satélites são interligados por links de laser, permitindo que os dados sejam transmitidos de um satélite para outro, reduzindo assim a necessidade de estações terrestres e minimizando a latência.</li>
        <li><strong>3. Links de radiofrequência:</strong> Os satélites se comunicam com estações terrestres e terminais de usuários na Terra usando frequências de rádio. Starlink usa bandas de frequência Ku e Ka, que são amplamente utilizadas para comunicações via satélite.</li>
        <li><strong>4. Terminal do usuário:</strong> Os usuários do Starlink têm um terminal que consiste em uma pequena antena parabólica (geralmente chamada de "Dishy McFlatface" pela SpaceX) e um modem. A antena, motorizada e capaz de apontar automaticamente para o satélite mais próximo, recebe os sinais dos satélites e os envia ao modem para acesso à Internet.</li>
        <li><strong>5. Mitigação da poluição luminosa e detritos espaciais:</strong> A SpaceX tem trabalhado para minimizar o impacto de seus satélites na observação astronômica e no ambiente espacial. Projetos revisados ​​incluem "VisorSat", uma medida para reduzir a refletividade dos satélites e um sistema de propulsão para remover satélites desativados da órbita para reduzir o acúmulo de detritos espaciais.</li>
    </ul>    
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