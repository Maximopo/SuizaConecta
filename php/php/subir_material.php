<?php
session_start();
include("conexion.php");

if ($_SESSION['rol'] !== 'docente') {
    header("Location: /SuizaConecta/paneles/panel_alumno.php");
    exit();
}
$foto = !empty($_SESSION['foto']) ? $_SESSION['foto'] : "default.png";
$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "Usuario";


if (!isset($_SESSION['id'])) {
    header("Location: ../login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Material</title>
    <link rel="stylesheet" href="/SuizaConecta/css/clases.css">
</head>
<body>

<header>
    <h1>Subir Material - SuizaConecta</h1>

    <nav>
        <ul class="nav-links">
                <li><a href="/SuizaConecta/index.html">Inicio</a></li>
                <li><a href="/SuizaConecta/paneles/configuracion.php">Mi cuenta</a></li>
                <li><a href="/SuizaConecta/php/php/logout.php">Cerrar sesión</a></li>
                <li class="user-info"><?php echo $nombre; ?></li>
            <li class="perfil">
            <img src="/SuizaConecta/php/uploads/perfiles/<?php echo htmlspecialchars($foto); ?>" class="perfil-img">
            </li>
        </ul>
    </nav>
</header>

<main>

<h2>Seleccioná la clase y el archivo</h2>

<form method="POST" enctype="multipart/form-data" action="subir_material_procesar.php">

    <label>Clase:</label>
    <select name="clase_id" required>
        <option value="">Seleccionar clase...</option>

        <?php
        $docente_id = $_SESSION['id'];
        $sql = "SELECT * FROM clases WHERE docente_id=$docente_id";
        $result = $conn->query($sql);

        while ($clase = $result->fetch_assoc()) {
            echo "<option value='".$clase['id']."'>".$clase['nombre']."</option>";
            
        }
        ?>
    </select>

    <label>Archivo (PDF, JPG, PNG, DOCX):</label>
    <input type="file" name="archivo" required>

    <button type="submit" class="btn">Subir Material</button>
</form>

<div class="panel-card">
    <h2>Crear Nueva Clase</h2>
    <form action="crear_clase.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="nombre" placeholder="Nombre de la clase" required>
        <textarea name="descripcion" placeholder="Descripción" required></textarea>

        <label>Banner de la clase (opcional)</label>
        <input type="file" name="banner">

        <button type="submit" class="btn">Crear Clase</button>
    </form>
</div>
<div class="panel-card">
    <h2>Crear Nueva Clase</h2>
    <form action="crear_clase.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="nombre" placeholder="Nombre de la clase" required>
        <textarea name="descripcion" placeholder="Descripción" required></textarea>

        <label>Banner de la clase (opcional)</label>
        <input type="file" name="banner">

        <button type="submit" class="btn">Crear Clase</button>
    </form>
</div>


</main>

</body>
</html>

