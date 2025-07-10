<?php
session_start();
session_destroy();
header("Location: login.php");
exit();
?>
<a href="logout.php">Cerrar sesión</a>
