<?php
session_start();
$foto = !empty($_SESSION['foto']) ? $_SESSION['foto'] : "default.png";
$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "Usuario";

if (!isset($_SESSION['nombre']) || $_SESSION['rol'] != 'preceptor') {
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
    <title>Panel del Preceptor - SuizaConecta</title>
    <link rel="stylesheet" href="/SuizaConecta/css/paneles.css">
</head>
<body>

<header>
    <h1>Preceptor: <?php echo $_SESSION['nombre']; ?></h1>
    <nav>
        <ul class="nav-links">
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

    <div class="panel-card">
        <h2>Asistencias del Curso</h2>
        <ul class="lista">
            <li>5°1: 3 ausentes</li>
            <li>5°2: 1 ausente</li>
            <li>6°1: asistencia completa</li>
        </ul>
    </div>

    <div class="panel-card">
        <h2>Seguimiento del Curso</h2>
        <ul class="lista">
            <li>Alumno Juan P. – Falta justificante médico.</li>
            <li>Alumno Lucia M. – Reunión pendiente con tutor.</li>
            <li>Informe semanal enviado a dirección.</li>
        </ul>
    </div>

    <div class="panel-card">
        <h2>Comunicados del Colegio</h2>
        <ul class="lista">
            <li>Reunión de preceptores el jueves 9:00.</li>
            <li>Actualización del protocolo institucional.</li>
        </ul>
    </div>

    <section>
    <h3>Clases por Docente</h3>
    <?php
    $sql = "SELECT c.nombre AS clase, u.nombre AS docente
            FROM clases c 
            JOIN usuarios u ON c.docente_id = u.id";
    $res = $conn->query($sql);

    while ($fila = $res->fetch_assoc()) {
        echo "<div class='item'>
                <strong>{$fila['clase']}</strong> - {$fila['docente']}
              </div>";
    }
    ?>
    </section>

</main>

<footer>
    SuizaConecta – Gestión Preceptoral
</footer>

</body>
</html>

