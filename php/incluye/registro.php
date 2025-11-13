<?php
// php/registro.php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $correo = $conn->real_escape_string($_POST['correo']);
    $clavePlain = $_POST['clave'];
    $rol = $conn->real_escape_string($_POST['rol']);

    // Hashear la contraseña con bcrypt
    $hash = password_hash($clavePlain, PASSWORD_BCRYPT);

    $sql = "INSERT INTO usuarios (nombre, correo, clave, rol) VALUES ('$nombre', '$correo', '$hash', '$rol')";
    if ($conn->query($sql)) {
        echo "<script>alert('Registro exitoso. Ya podés iniciar sesión.'); window.location='../php/login.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
