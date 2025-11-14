<?php
include("conexion.php");
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];

$sql = "INSERT INTO mensajes (nombre, correo, mensaje) VALUES ('$nombre', '$correo', '$mensaje')";
$conn->query($sql);

echo "<script>alert('Mensaje enviado con éxito.'); window.location='/SuizaConecta/acerca.html';</script>";
?>
