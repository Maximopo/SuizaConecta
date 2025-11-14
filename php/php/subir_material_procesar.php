<?php
session_start();
include("/SuizaConecta/php/php/conexion.php");

if ($_SESSION['rol'] !== 'docente') exit();

// Validar tipo de archivo
$permitidos = ['application/pdf', 'image/png', 'image/jpeg', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];

if (!in_array($_FILES["archivo"]["type"], $permitidos)) {
    echo "<script>alert('Formato no permitido.'); window.location='subir_material.php';</script>";
    exit();
}

$clase_id = $_POST['clase_id'];
$archivo = $_FILES["archivo"];

$nombre_archivo = time() . "_" . basename($archivo["name"]);
$ruta_destino = "../uploads/materiales/" . $nombre_archivo;

// Guardar en servidor
move_uploaded_file($archivo["tmp_name"], $ruta_destino);

// Guardar en base de datos
$sql = "INSERT INTO tareas (clase_id, titulo, archivo) 
        VALUES ($clase_id, 'Material de Clase', '$nombre_archivo')";

$conn->query($sql);

echo "<script>alert('Material subido correctamente'); window.location='/SuizaConecta/paneles/panel_docente.php';</script>";
?>
