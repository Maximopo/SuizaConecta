<?php
session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['rol'] != 'docente') {
  header("Location: ../php/login.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel Docente - SuizaConecta</title>
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
  <header>
    <h1>Panel del Docente</h1>
  </header>
  <main>

    <h2>Buscar tareas</h2>
      <input type="text" id="buscar" placeholder="Buscar tarea..." class="input-buscar">

      <ul id="lista-tareas">
        <li>Programación: Ejercicio de bucles</li>
        <li>Base de datos: Diagrama entidad-relación</li>
        <li>Matemática: Funciones racionales</li>
        <li>Laboratorio: Proyecto final</li>
      </ul>

      <script>
        const input = document.getElementById('buscar');
        const tareas = document.querySelectorAll('#lista-tareas li');

        input.addEventListener('keyup', () => {
          const filtro = input.value.toLowerCase();
          tareas.forEach(t => {
            t.style.display = t.textContent.toLowerCase().includes(filtro) ? '' : 'none';
          });
        });
      </script>

    <h2>Subida de archivos</h2>
    <form action="../php/subir_tarea.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="archivo" accept=".pdf,.jpg,.png,.docx" required>
      <button type="submit">Subir Archivo</button>
    </form>

    <h3>Archivos subidos recientemente:</h3>
    <ul>
      <?php
      $archivos = scandir("../uploads/");
      foreach ($archivos as $archivo) {
        if ($archivo != "." && $archivo != "..") {
          echo "<li><a href='../uploads/$archivo' target='_blank'>$archivo</a></li>";
        }
      }
      ?>
    </ul>

  </main>
</body>
</html>

