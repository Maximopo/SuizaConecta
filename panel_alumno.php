<?php
session_start();
if (!isset($_SESSION['nombre'])) { header("Location: ../php/login.php"); exit(); }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel del Alumno - SuizaConecta</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <header><h1>Bienvenido, <?php echo $_SESSION['nombre']; ?></h1></header>
  <main>

    <h2>Tus tareas pendientes</h2>
    <p>En esta sección verás tus tareas personalizadas y fechas de entrega.</p>

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

  </main>
</body>
</html>

