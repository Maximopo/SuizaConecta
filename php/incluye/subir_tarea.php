<?php
if (isset($_FILES['archivo'])) {
  $carpeta = "../uploads/";
  $nombreArchivo = basename($_FILES["archivo"]["name"]);
  $ruta = $carpeta . $nombreArchivo;

  if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta)) {
    echo "<script>alert('Archivo subido correctamente'); window.location='../paneles/panel_docente.php';</script>";
  } else {
    echo "<script>alert('Error al subir el archivo'); window.location='../paneles/panel_docente.php';</script>";
  }
}
?>
