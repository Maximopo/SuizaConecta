<?php
session_start();
include("../php/php/conexion.php");

if ($_SESSION['rol'] !== 'docente') {
    header("Location: panel_alumno.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $codigo = substr(md5(time()), 0, 6); // Código único
    $docente = $_SESSION['id'];

    $sql = "INSERT INTO clases (nombre, descripcion, docente_id, codigo_clase)
            VALUES ('$nombre', '$descripcion', '$docente', '$codigo')";
    $conn->query($sql);

    header("Location: panel_docente.php");
    exit();
}
?>
