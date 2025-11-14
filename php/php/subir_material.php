<?php
session_start();
include("/SuizaConecta/php/php/conexion.php");

if ($_SESSION['rol'] !== 'docente') {
    header("Location: /SuizaConecta/paneles/panel_alumno.php");
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

</main>

</body>
</html>

