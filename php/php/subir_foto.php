<?php
session_start();
include("conexion.php");

$id = $_SESSION['id'];

$foto = $_FILES["foto"];

$nombre_archivo = "user_" . $id . "_" . basename($foto["name"]);
$ruta = "/SuizaConecta/uploads/perfiles/" . $nombre_archivo;

move_uploaded_file($foto["tmp_name"], $ruta);

$conn->query("UPDATE usuarios SET foto_perfil='$nombre_archivo' WHERE id=$id");

$_SESSION['foto'] = $nombre_archivo;

header("Location: /SuizaConecta/paneles/configuracion.php");
?>
