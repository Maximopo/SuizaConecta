<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $conn->real_escape_string($_POST['correo']);
    $clave = $_POST['clave'];

    $sql = "SELECT * FROM usuarios WHERE correo = '$correo' LIMIT 1";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $hash = $user['clave'];

        if (password_verify($clave, $hash)) {
            // contraseña correcta
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['rol'] = $user['rol'];
            $_SESSION['id'] = $user['id'];

            switch ($user['rol']) {
                case 'docente':
                    header("Location: /SuizaConecta/paneles/panel_docente.php");
                    break;
                case 'preceptor':
                    header("Location: /SuizaConecta/paneles/panel_preceptor.php");
                    break;
                default:
                    header("Location: /SuizaConecta/paneles/panel_alumno.php");
            }
            exit();
        } else {
            echo "<script>alert('Correo o contraseña incorrectos.'); window.location='/SuizaConecta/login/login.html';</script>";
        }
    } else {
        echo "<script>alert('Correo o contraseña incorrectos.'); window.location='/SuizaConecta/login/login.html';</script>";
    }
}
?>
