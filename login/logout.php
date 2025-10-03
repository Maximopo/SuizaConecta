<?php
session_start();
session_destroy();
header("Location: ../login.html");
exit();
?>
<a href="logout.php">Cerrar sesión</a>
