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
        <div class="column">
          <video src="img/ilm-starship.webm" autoplay loop></video>
        </div>
        <div class="column">
          <div class="text-container">
            <p>Starship é um sistema de transporte espacial totalmente reutilizável que está sendo desenvolvido pela SpaceX. É a próxima geração de foguetes que a empresa está desenvolvendo para transportar pessoas e cargas para destinos no espaço profundo, como a Lua e Marte.</p>
            <p>Uma característica distintiva do sistema Starship é que ambas as partes, tanto o Super Heavy quanto o Starship, são projetadas para serem totalmente reutilizáveis. Isso significa que eles podem pousar na Terra após o lançamento e serem reutilizados em missões futuras. Essa reutilização é uma parte fundamental da visão da SpaceX de reduzir drasticamente o custo de acesso ao espaço.</p>
            <p>Além das missões espaciais profundas, a SpaceX também propôs o uso da Starship para uma variedade de outras missões, incluindo serviços de lançamento de satélites, missões para a Estação Espacial Internacional e até viagens ponto a ponto na Terra, nas quais a Starship poderia transportar passageiros de um lugar para outro no planeta em menos de uma hora.</p>
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
