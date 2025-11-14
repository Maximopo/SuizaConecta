<?php
session_start();
include("conexion.php");

$idClase = $_POST['clase_id'];

if (isset($_FILES['banner'])) {
    $nombreArchivo = time() . "_" . $_FILES['banner']['name'];
    $ruta = $_SERVER['DOCUMENT_ROOT'] . "/SuizaConecta/uploads/banners/" . $nombreArchivo;

    if (move_uploaded_file($_FILES['banner']['tmp_name'], $ruta)) {
        $conn->query("UPDATE clases SET banner='$nombreArchivo' WHERE id=$idClase");
        header("Location: ../paneles/panel_docente.php?bannerok=1");
        exit();
    }
}
header("Location: ../paneles/panel_docente.php?bannererror=1");
?>
