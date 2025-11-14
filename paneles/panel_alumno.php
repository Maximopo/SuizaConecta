<?php
session_start();



if (!isset($_SESSION['id'])) {
    header("Location: /SuizaConecta/login.html");
    exit();
}

include("../php/php/conexion.php");

$nombre = $_SESSION['nombre'];
$rol = $_SESSION['rol'];
$foto = isset($_SESSION['foto']) ? $_SESSION['foto'] : "default.png";
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alumno - SuizaConecta</title>
    <script src="/SuizaConecta/js/perfil_menu.js" defer></script>
    <link rel="stylesheet" href="/SuizaConecta/css/paneles.css">
</head>
<body>

<header>
    <h1> Alumno</h1>
    <nav>
        <ul class="nav-links">
                <li><a href="/SuizaConecta/index.html">Inicio</a></li>
                <li><a href="/SuizaConecta/php/php/clases.php">Clases</a></li>
                <li><a href="configuracion.php">Mi cuenta</a></li>
                <li><a href="/SuizaConecta/php/php/logout.php">Cerrar sesión</a></li>
                <li class="user-info"><?php echo $nombre; ?></li>
            <li class="perfil">
            <img src="/SuizaConecta/php/uploads/perfiles/<?php echo htmlspecialchars($foto); ?>" class="perfil-img">
            </li>
        </ul>
    </nav>
</header>

<main>
    <h2>Mis Clases</h2>

    <?php
    
    $sql = "SELECT c.* 
            FROM clases c
            JOIN clase_alumnos ca ON ca.clase_id = c.id
            WHERE ca.alumno_id = $id";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($clase = $result->fetch_assoc()) {
            echo "
            <div class='card'>
                <h3>".$clase['nombre']."</h3>
                <p>".$clase['descripcion']."</p>
                <a href='/SuizaConecta/php/php/ver_clase.php?id=".$clase['id']."' class='btn'>Entrar</a>
            </div>";
        }
    } else {
        echo "<p>No estás unido a ninguna clase todavía.</p>";
    }
    ?>

</main>

</body>
</html>
