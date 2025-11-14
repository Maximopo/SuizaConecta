<?php
session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['rol'] != 'preceptor') {
    header("Location: /SuizaConecta/login.html");
    exit();
}
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
        <a href="/SuizaConecta/index.html">Inicio</a>
        <a href="/SuizaConecta/login/logout.php">Salir</a>
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

</main>

<footer>
    SuizaConecta – Gestión Preceptoral
</footer>

</body>
</html>

