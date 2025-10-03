<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    $sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND clave = '$clave'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['rol'] = $usuario['rol'];

        if ($usuario['rol'] == 'docente') {
            header("Location: panel_docente.php");
        } elseif ($usuario['rol'] == 'preceptor') {
            header("Location: panel_preceptor.php");
        } else {
            header("Location: panel_alumno.php");
        }
    } else {
        echo "Datos incorrectos. Intenta nuevamente.";
    }
}
?>
