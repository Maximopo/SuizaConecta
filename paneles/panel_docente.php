<?php
session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['rol'] != 'docente') {
    header("Location: /SuizaConecta/login/login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel del Docente - SuizaConecta</title>
    <link rel="stylesheet" href="/SuizaConecta/css/paneles.css">
</head>
<body>

<header>
    <h1>Docente: <?php echo $_SESSION['nombre']; ?></h1>
    <nav>
        <a href="/SuizaConecta/index.html">Inicio</a>
        <a href="/SuizaConecta/php/php/logout.php">Cerrar Sesión</a>
    </nav>
</header>

<main>

    <div class="panel-card">
        <h2>Subir Material</h2>
        <form action="/SuizaConecta/php/php/subir_tarea.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="archivo" required>
            <button type="submit">Subir Archivo</button>
        </form>
    </div>

    <div class="panel-card">
        <h2>Tareas de Hoy</h2>
        <ul class="lista">
            <li>Entregar correcciones de matemáticas del curso 5°2da.</li>
            <li>Preparar guía de laboratorio N°4.</li>
        </ul>
    </div>

    <div class="panel-card">
        <h2>Mis Comunicados</h2>
        <ul class="lista">
            <li>Nuevo material subido para el curso 5°1ra.</li>
            <li>Entrega del informe final la semana próxima.</li>
        </ul>
    </div>

</main>

<footer>
    SuizaConecta – Plataforma docente
</footer>

</body>
</html>
