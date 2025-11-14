<?php
session_start();
include("conexion.php");

$id_docente = $_SESSION['id'];

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];

$banner = "default_banner.jpg";

if (!empty($_FILES['banner']['name'])) {
    
    $nombreBanner = time() . "_" . $_FILES['banner']['name'];
    $ruta = $_SERVER['DOCUMENT_ROOT'] . "/SuizaConecta/uploads/banners/" . $nombreBanner;

    if (move_uploaded_file($_FILES['banner']['tmp_name'], $ruta)) {
        $banner = $nombreBanner;
    }
}

$sql = "INSERT INTO clases (nombre, descripcion, banner, id_docente)
        VALUES ('$nombre', '$descripcion', '$banner', '$id_docente')";

$conn->query($sql);

header("Location: /SuizaConecta/paneles/panel_docente.php?claseok=1");
exit();
?>
