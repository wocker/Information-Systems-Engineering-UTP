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
}

class VisitCounter {
    private $visitCountCookieName;

    public function __construct($pageName) {
        $this->visitCountCookieName = $pageName.'_visit_count';
    }

    public function getVisitCount() {
        if (isset($_COOKIE[$this->visitCountCookieName])) {
            $visitCount = $_COOKIE[$this->visitCountCookieName];
        } else {
            $visitCount = 0;
        }
        return $visitCount;
    }

    public function incrementVisitCount() {
        $visitCount = $this->getVisitCount();
        $visitCount++;
        setcookie($this->visitCountCookieName, $visitCount, time() + (86400 * 30), "/"); // 86400 = 1 día
        return $visitCount;
    }
}

$userSession = new UserSession();
$userSession->verifyUserLoggedIn();

$userCookie = new UserCookie();
$userCookie->setUserNameCookie($_SESSION['username']);

$visitCounter = new VisitCounter('presion');
$presionVisitCount = $visitCounter->incrementVisitCount();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Presión Arterial | Consultorio Clínico ABC</title>
    <link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div id="logo">
            <a href="inicio.php"> <img src="img/logo_transparent.png" alt="Logo Consultorio Clínico ABC" /></a>
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
        <p>La presión arterial es la fuerza de su sangre al empujar contra las paredes de sus arterias. Cada vez que su corazón late, bombea sangre hacia las arterias. Su presión arterial es más alta cuando su corazón late, bombeando la sangre. Esto se llama presión sistólica. Cuando su corazón está en reposo, entre latidos, su presión arterial baja. Esto se llama presión diastólica.</p>
        <br>
        <p>La lectura de su presión arterial usa estos dos números. Por lo general, el número sistólico se coloca antes o por encima de la cifra diastólica. Por ejemplo, 120/80 significa una presión sistólica de 120 y una diastólica de 80.</p>
        <br>
        <p>La presión arterial alta no tiene síntomas. Por ello, la única manera de averiguar si usted tiene presión arterial alta es a través de chequeos regulares cuando visita a su proveedor de atención médica. Su proveedor utilizará un medidor, un estetoscopio o un sensor electrónico y un manguito de presión arterial y tomará dos o más mediciones en citas médicas distintas antes de hacer un diagnóstico.</p>
        <img src="img\niveles-presion.jpg" alt="Tabla de Niveles de Presión Arterial" class="center-image">
        <br>
        <form name="presion_arterial" method="POST">
            <b>Ingresa la Presión Sistólica en mm/Hg:</b>
            <br>
            <input type="text" name="sistolica" id="sistolica" size="15">
            <br>
            <br>
            <b>Ingresa la Presión Diastólica en mm/Hg:</b>
            <br>
            <input type="text" name="diastolica" id="diastolica" size="15">
            <br>
            <br>
            <input type="submit" name="enviar" id="enviar" value="Enviar">
        </form>
        <?php
        class PresionArterial {
            private $sistolica;
            private $diastolica;

            public function __construct($sistolica, $diastolica) {
                $this->sistolica = $sistolica;
                $this->diastolica = $diastolica;
            }

            public function diagnostico() {
                if (!is_numeric($this->sistolica) || !is_numeric($this->diastolica)) {
                    return "Por favor, ingrese un número válido para la presión sistólica y diastólica.";
                }

                $output = "Tu Presión Arterial es: ";

                if ($this->sistolica < 120 && $this->diastolica < 80) {
                    $output .= "Normal";
                } elseif ($this->sistolica >= 120 && $this->sistolica < 130 && $this->diastolica < 80) {
                    $output .= "Elevada";
                } elseif (($this->sistolica >= 130 && $this->sistolica < 140) || ($this->diastolica >= 80 && $this->diastolica < 90)) {
                    $output .= "ALTA (HIPERTENSIÓN) NIVEL 1";
                } elseif ($this->sistolica >= 140 || $this->diastolica >= 90) {
                    $output .= "ALTA (HIPERTENSIÓN) NIVEL 2";
                } elseif ($this->sistolica > 180 || $this->diastolica > 120) {
                    $output .= "CRISIS DE HIPERTENSIÓN (Consulte con su médico de inmediato)";
                }

                return $output;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $presionArterial = new PresionArterial($_POST['sistolica'], $_POST['diastolica']);
            echo $presionArterial->diagnostico();
        }
        ?>
    </main>
</body>
<footer>
    <link href="https://fonts.googleapis.com/css2?family=Neo+Sans+Pro&display=swap" rel="stylesheet">
    <p><b>Has visitado esta página</b> <?php echo $presionVisitCount; ?> veces.</p>
    <br>
    <p><i>Todos los Derechos reservados 2023. Consultorio Clínico ABC Ltd.</i></p>
</footer>
</html>
