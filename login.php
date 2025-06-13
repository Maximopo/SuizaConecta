<?php
// login.php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - SuizaConecta</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <form action="verificar_login.php" method="post">
        <label>Usuario:</label><br>
        <input type="text" name="usuario"><br>
        <label>Contraseña:</label><br>
        <input type="password" name="clave"><br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>
