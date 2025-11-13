<?php
// Archivo: php/conexion.php

$servername = "localhost";
$username   = "root";
$password   = ""; 
$dbname     = "suizaconecta";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Opcional: forzar UTF-8 (evita problemas con tildes)
$conn->set_charset("utf8");
?>
