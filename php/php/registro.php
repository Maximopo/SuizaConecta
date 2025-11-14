<?php
session_start();
header("Content-Type: text/html; charset=UTF-8");
include("conexion.php");

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$clave = $_POST['clave'];
$rol = $_POST['rol'];

$claveHash = password_hash($clave, PASSWORD_BCRYPT);

$sql = "INSERT INTO usuarios (nombre, correo, clave, rol)
        VALUES ('$nombre', '$correo', '$claveHash', '$rol')";

if ($conn->query($sql)) {
    echo "<script>alert('Cuenta creada con éxito'); window.location='/SuizaConecta/login/login.html';</script>";
} else {
    echo "Error: " . $conn->error;
}
?>
