<?php
session_start();
session_destroy();
header("Location: /SuizaConecta/login/login.html");
exit();
?>
<a href="logout.php">Cerrar sesión</a>
