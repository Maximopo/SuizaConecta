<?php
session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['rol'] != 'alumno') {
    header("Location: /SuizaConecta/login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel del Alumno - SuizaConecta</title>
    <link rel="stylesheet" href="/SuizaConecta/css/paneles.css">
</head>
<body>

<header>
    <h1>Alumno: <?php echo $_SESSION['nombre']; ?></h1>
    <nav>
        <a href="/SuizaConecta/index.html">Inicio</a>
        <a href="/SuizaConecta/php/logout.php">Salir</a>
    </nav>
</header>

<main>

    <div class="panel-card">
        <h2>Tareas Asignadas</h2>
        <ul class="lista">
            <li>Matemática – Funciones racionales (Entrega: 23/10)</li>
            <li>Programación – Proyecto en PHP (Entrega: 27/10)</li>
            <li>Laboratorio – Informe N°3 (Entrega: 30/10)</li>
        </ul>
    </div>

    <div class="panel-card">
        <h2>Comunicados</h2>
        <ul class="lista">
            <li>Recordatorio: reunión del curso el viernes a las 11:00.</li>
            <li>Nuevo material disponible en Programación.</li>
        </ul>
    </div>

</main>

<footer>
    SuizaConecta – Plataforma educativa de la ET Nº26
</footer>

</body>
</html>
