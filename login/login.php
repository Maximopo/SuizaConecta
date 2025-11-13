<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    // Buscar usuario en la base
    $sql = "SELECT * FROM usuarios WHERE correo = '$correo' AND clave = '$clave'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['rol'] = $usuario['rol'];

        // Redirigir según el rol
        switch ($usuario['rol']) {
            case 'alumno':
                header("Location: ../paneles/panel_alumno.php");
                break;
            case 'docente':
                header("Location: ../paneles/panel_docente.php");
                break;
            case 'preceptor':
                header("Location: ../paneles/panel_preceptor.php");
                break;
        }
    } else {
        echo "<script>alert('Correo o contraseña incorrectos'); window.location='../login.php';</script>";
    }
}
?>

