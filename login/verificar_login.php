<?php
// verificar_login.php
$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$clave = $_POST['clave'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Redirigiendo...</title>
  <script>
    localStorage.setItem("usuario", "<?php echo $usuario; ?>");
    localStorage.setItem("correo", "<?php echo $correo; ?>");
    window.location.href = "index.html";
  </script>
</head>
<body>
  Redirigiendo...
</body>
</html>
