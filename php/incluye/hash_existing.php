<?php
include("conexion.php");

$result = $conn->query("SELECT id, clave FROM usuarios");
if (!$result) die("Error: " . $conn->error);

while ($row = $result->fetch_assoc()) {
    $id = (int)$row['id'];
    $clave = $row['clave'];

    if (!password_get_info($clave)['algo']) {
        $newHash = password_hash($clave, PASSWORD_BCRYPT);
        $conn->query("UPDATE usuarios SET clave = '$newHash' WHERE id = $id");
        echo "Usuario $id actualizado.<br>";
    } else {
        echo "Usuario $id ya tiene hash.<br>";
    }
}
echo "Proceso finalizado.";
?>
