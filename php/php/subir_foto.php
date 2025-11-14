<?php
session_start();
include("conexion.php");

$id = $_SESSION['id'];

if (isset($_FILES['foto'])) {
    
    $nombreArchivo = time() . "_" . basename($_FILES["foto"]["name"]);
    $rutaDestino = "/SuizaConecta/php/uploads/perfiles/" . $nombreArchivo;

    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $rutaDestino)) {

        
        $sql = "UPDATE usuarios SET foto='$nombreArchivo' WHERE id=$id";
        $conn->query($sql);

        $_SESSION['foto'] = $nombreArchivo;

        header("Location: /SuizaConecta/paneles/configuracion.php?ok=1");
        exit();
    } else {
        header("Location: /SuizaConecta/paneles/configuracion.php?error=subida");
        exit();
    }
}
?>
