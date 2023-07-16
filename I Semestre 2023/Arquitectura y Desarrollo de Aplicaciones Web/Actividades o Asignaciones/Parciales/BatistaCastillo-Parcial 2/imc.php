<?php
    // Iniciar la sesión
    session_start();

    // Verificar si el usuario ha iniciado sesión
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
		echo '<center><h1>Acceso Denegado, Favor Iniciar Sesión</h1></center>';
        exit;
    }

    // Establecer la cookie del nombre de usuario si no existe
    if (!isset($_COOKIE['username'])) {
        setcookie('username', $_SESSION['username'], time() + (86400 * 30), "/"); // 86400 = 1 día
    }

    // Incrementar el contador de visitas para imc.php
    if (isset($_COOKIE['imc_visit_count'])) {
        $imc_visit_count = $_COOKIE['imc_visit_count'] + 1;
    } else {
        $imc_visit_count = 1;
    }
    setcookie('imc_visit_count', $imc_visit_count, time() + (86400 * 30), "/"); // 86400 = 1 día
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Índice de Masa Corporal (IMC) | Consultorio Clínico ABC</title>
	<link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
	    <div id="logo">
	        <a href="inicio.php"> <img src="img\logo_transparent.png" alt="Logo Consultorio Clínico ABC" /></a>
	    </div>
	    <div id="welcome-message">
            <?php
                if (isset($_COOKIE['username'])) {
                    echo "Bienvenido " . $_COOKIE['username'];
                }
            ?>
        </div>
		<nav>
			<ul>
				<li><a href="inicio.php">Inicio</a></li>
				<li><a href="imc.php">Índice de Masa Corporal (IMC)</a></li>
				<li><a href="glucosa.php">Glucosa en la Sangre</a></li>
				<li><a href="presion.php">Presión Arterial</a></li>
			</ul>
		</nav>
	</header>
	<main>
	<p>Una medida de la obesidad se determina mediante el índice de masa corporal (IMC), que se calcula dividiendo los kilogramos de peso por el cuadrado de la estatura en metros (IMC = peso (kg)/ [estatura (m)]2.</p>
		<br>
		<p>Según el Instituto Nacional del Corazón, los Pulmones y la Sangre de los Estados Unidos (NHLBI), el sobrepeso se define como un IMC de más de 25. Se considera que una persona es obesa si su IMC es superior a 30.</p>
		<br>
		<p>Usted puede determinar su IMC con la calculadora que se encuentra a continuación. Con la cifra del IMC puede averiguar su composición corporal en la tabla que aparece debajo de la calculadora.</p>
		<img src="img/formula-imc.webp" alt="Diagrama de IMC" class="center-image">
		<br>
		<br>
		<form name="imc" method="POST">
			<b>Ingresa tu peso en Kilogramo (Kg):</b>
			<input type="text" name="masa" id="masa" size="15">
			<br> 
		  	<br>
			<b>Ingresa tu altura en Centímetros (cm):</b>
			<input type="text" name="altura" id="altura" size="15">
			<br>
		  	<br>
			<input type="submit" name="enviar" id="enviar" value="Enviar">
			<br>
		</form>
		<?php
class IMC {
    private $masa;
    private $altura;

    public function __construct($masa, $altura) {
        $this->masa = $masa;
        $this->altura = $altura;
    }

    private function imc() {
        $alturaEnMetros = $this->altura / 100;
        $imc = $this->masa / ($alturaEnMetros * $alturaEnMetros);
        return $imc;
    }

    public function diagnostico() {
        if (!is_numeric($this->masa) || !is_numeric($this->altura)) {
            return "Por favor, ingrese números válidos para la masa y la altura.";
        }

        if ($this->masa <= 0 || $this->altura <= 0) {
            return "La masa y la altura deben ser mayores que cero.";
        }

        $imc = $this->imc();

        if ($imc <= 18.5) {
            $output = "Bajo de Peso";
        } else if ($imc > 18.5 && $imc <= 24.9) {
            $output = "Peso Normal";
        } else if ($imc > 24.9 && $imc <= 29.9) {
            $output = "Sobre Peso";
        } else {
            $output = "Obeso";
        }

        return "Tu índice de Masa Corporal es " . round($imc, 2) . " y tienes una condición de: " . $output;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $imc = new IMC($_POST['masa'], $_POST['altura']);
    echo $imc->diagnostico();
}
?>
	</main>
</body>
<footer>
	<link href="https://fonts.googleapis.com/css2?family=Neo+Sans+Pro&display=swap" rel="stylesheet">
	<p><b>Has visitado esta página</b> <?php echo $imc_visit_count; ?> veces.</p>
	<br>
	<p><i>Todos los Derechos reservados 2023. Consultorio Clínico ABC Ltd.</i></p>
</footer>
</html>
