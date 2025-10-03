<?php
include('php/conexion.php');
$result = $conn->query("SELECT * FROM tareas ORDER BY fecha_entrega ASC");
?>
