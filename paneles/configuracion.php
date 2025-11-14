<?php
session_start();
$foto = !empty($_SESSION['foto']) ? $_SESSION['foto'] : "default.png";
$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "Usuario";

include("../php/php/conexion.php");

if (!isset($_SESSION['id'])) {
    header("Location: ../login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Configuración de Perfil</title>
    <link rel="stylesheet" href="/SuizaConecta/css/clases.css">
</head>
<body>

<header>
    <h1>Configuración de la Cuenta - SuizaConecta</h1>

    <nav>
        <ul class="nav-links">
            <li><a href="/SuizaConecta/index.html">Inicio</a></li>
            <li><a href="/SuizaConecta/php/php/clases.php">Clases</a></li>
            <li><a href="/SuizaConecta/php/php/logout.php">Cerrar sesión</a></li>
            <li class="user-info"><?php echo $nombre; ?></li>
            <li class="perfil">
                <img src="/SuizaConecta/php/uploads/perfiles/<?php echo htmlspecialchars($foto); ?>" class="perfil-img">
            </li>
        </ul>
    </nav>
</header>

<main>
    <h2>Cambiar Foto de Perfil</h2>

    <form method="POST" action="/SuizaConecta/php/php/subir_foto.php" enctype="multipart/form-data">
        <input type="file" name="foto" required>
        <button type="submit" class="btn">Subir nueva foto</button>
    </form>
</main>

</body>
</html>
