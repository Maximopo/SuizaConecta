<?php
session_start();
$foto = !empty($_SESSION['foto']) ? $_SESSION['foto'] : "default.png";

if (!isset($_SESSION['nombre']) || !isset($_SESSION['rol'])) {
    header("Location: /SuizaConecta/login/login.html");
    exit();
}

$nombre = $_SESSION['nombre'];
$rol = $_SESSION['rol'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Clases - SuizaConecta</title>
  <link rel="stylesheet" href="/SuizaConecta/css/clases.css">
  <script src="/SuizaConecta/js/perfil_menu.js" defer></script>

</head>
<body>

<header>
    <h1>SuizaConecta</h1>
    <nav>
        <ul class="nav-links">
                <li><a href="/SuizaConecta/index.html">Inicio</a></li>
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
    <h2>Clases de la Escuela</h2>

    <section class="lista-materias">
      <h3>Materias Disponibles</h3>
      <ul>
        <li>Matemática</li>
        <li>Programación</li>
        <li>Base de Datos</li>
        <li>Laboratorio de Computación</li>
        <li>Inglés Técnico</li>
        <li>Sistemas Digitales</li>
        <li>Electrónica</li>
      </ul>
    </section>

    <?php if ($rol === 'docente'): ?>
    <section class="panel-roles">
        <h3>Opciones del Docente</h3>

        <button class="btn">➕ Crear nueva clase</button>
        <button class="btn">✏️ Editar mis clases</button>
        <button class="btn">📄 Subir actividad</button>
        <button class="btn">📚 Ver trabajos entregados</button>
        <div class="clase-card">
            <div class="clase-banner" style="background-image: url('/SuizaConecta/uploads/banners/<?php echo $clase['banner']; ?>')"></div>
            <h3><?php echo $clase['nombre']; ?></h3>
            <p><?php echo $clase['descripcion']; ?></p>
            <a href="ver_clase.php?id=<?php echo $clase['id']; ?>" class="btn">Entrar</a>
        </div>

    </section>
    <?php endif; ?>

    <?php if ($rol === 'alumno'): ?>
    <section class="panel-roles">
        <h3>Opciones del Alumno</h3>

        <button class="btn">📌 Ver mis clases</button>
        <button class="btn">📥 Entregar tarea</button>
        <button class="btn">📘 Ver material del curso</button>
    </section>
    <?php endif; ?>

    <?php if ($rol === 'preceptor'): ?>
    <section class="panel-roles">
        <h3>Opciones del Preceptor</h3>

        <button class="btn">📊 Ver asistencia</button>
        <button class="btn">🧾 Registrar novedades</button>
        <button class="btn">👨‍🏫 Ver docentes por materia</button>
        <button class="btn">👥 Ver listas completas</button>
    </section>
    <?php endif; ?>

</main>

</body>
</html>
