<?php
class UserSession {
    public function __construct() {
        session_start();
    }

    public function verifyUserLoggedIn() {
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
            echo '<center><h1>Acceso Denegado, Favor Iniciar Sesión</h1></center>';
            exit;
        }
    }
}

class UserCookie {
    public function setUserNameCookie($username) {
        if (!isset($_COOKIE['username'])) {
            setcookie('username', $username, time() + (86400 * 30), "/"); // 86400 = 1 día
        }
    }

    public function setVisitCountCookie($pageName) {
        $cookieName = $pageName.'_visit_count';
        if (isset($_COOKIE[$cookieName])) {
            $visit_count = $_COOKIE[$cookieName] + 1;
        } else {
            $visit_count = 1;
        }
        setcookie($cookieName, $visit_count, time() + (86400 * 30), "/"); // 86400 = 1 día
        return $visit_count;
    }
}

$userSession = new UserSession();
$userSession->verifyUserLoggedIn();

$userCookie = new UserCookie();
$userCookie->setUserNameCookie($_SESSION['username']);
$glucosaVisitCount = $userCookie->setVisitCountCookie('glucosa');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Glucosa en Sangre | Consultorio Clínico ABC</title>
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
	<p>Los análisis de glucosa sanguínea son una parte importante del cuidado de la diabetes. Averigua cuándo debes comprobar tu nivel de glucosa sanguínea, cómo utilizar un medidor de azúcar en la sangre y más.</p>
		<br>
		<p>Si tienes diabetes, analizar de manera autónoma la glucosa en la sangre puede ser una herramienta importante para tratar tu diabetes y prevenir las complicaciones. Asimismo, puedes usar un dispositivo llamado glucómetro continuo. Asimismo, puedes analizar la glucosa en la sangre en casa con un dispositivo electrónico portátil que se llama glucómetro, en el que se usa una gota de sangre.</p>
		<br>
		<p>El proveedor de atención médica te indicará con qué frecuencia debes controlar tus niveles de glucosa en la sangre. La frecuencia de las pruebas suele depender del tipo de diabetes que tengas y de tu plan de tratamiento.</p>
		<img src="img\niveles-glucosa.jpg" alt="Tabla de Niveles de Glucosa" class="center-image">
        <br>
		<br>
		<br>
		<form name="glucosa" method="POST">
    <b>Ingresa la Lectura de tu Glucómetro en mg/dl:</b>
    <br>
    <input type="text" name="glucosa" id="glucosa" size="15">
    <br> 
    <b>¿La medición fue hecha en?</b>
    <br>
    <input type="radio" id="ayunas" name="tiempo" value="ayunas">
    <br>
    <label for="ayunas"><b>Ayunas (Sin Consumir Alimentos)</b></label><br>
    <br>
    <input type="radio" id="posprandial" name="tiempo" value="posprandial">
    <br>
    <label for="posprandial"><b>Posprandial (Dos horas después de comer)</b></label>
    <br>
    <br>
    <input type="submit" name="enviar" id="enviar" value="Enviar">
    <br>
</form>
<?php
class Glucosa {
    private $glucosa;
    private $tiempo;

    public function __construct($glucosa, $tiempo) {
        $this->glucosa = $glucosa;
        $this->tiempo = $tiempo;
    }

    public function diagnostico() {
        if (!is_numeric($this->glucosa)) {
            return "Por favor, ingrese un número válido para la lectura de glucosa.";
        }

        if ($this->glucosa <= 0) {
            return "La lectura de glucosa debe ser mayor que cero.";
        }

        $output = '';

        if ($this->tiempo == 'ayunas') {
            if ($this->glucosa >= 70 && $this->glucosa <= 100) {
                $output = "Sin Diabetes";
            } else if ($this->glucosa > 100 && $this->glucosa <= 125) {
                $output = "Pre Diabetes";
            } else if ($this->glucosa >= 126 && $this->glucosa < 200) {
                $output = "Diabetes";
            } else {
                $output = "Valor fuera de rango";
            }
        } else if ($this->tiempo == 'posprandial') {
            if ($this->glucosa >= 101 && $this->glucosa <= 140) {
                $output = "Sin Diabetes";
            } else if ($this->glucosa > 140 && $this->glucosa <= 199) {
                $output = "Pre Diabetes";
            } else if ($this->glucosa > 200) {
                $output = "Diabetes";
            } else {
                $output = "Valor fuera de rango";
            }
        }

        return "Tu Diagnóstico es " . $output;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $glucosa = new Glucosa($_POST['glucosa'], $_POST['tiempo']);
    echo $glucosa->diagnostico();
}
?>
</main>
</body>
<footer>
	<link href="https://fonts.googleapis.com/css2?family=Neo+Sans+Pro&display=swap" rel="stylesheet">
	<p><b>Has visitado esta página</b> <?php echo $glucosaVisitCount; ?> veces.</p>
    <br>
    <p><i>Todos los Derechos reservados 2023. Consultorio Clínico ABC Ltd.</i></p>
</footer>
</html>

