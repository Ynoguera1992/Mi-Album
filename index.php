<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header("Location: login.php");
  exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Álbum de Peces Yesid</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <div class="barra-superior">
  <a href="logout.php" class="cerrar-sesion">🔒 Cerrar sesión</a>
</div>
  
  <h1>🐟 Álbum Épico de Peces Capturados</h1>

  <form class="formulario-estilo" action="guardar.php" method="POST" enctype="multipart/form-data">
  <input type="text" name="nombre" placeholder="Nombre del pez" required />
  <input type="text" name="especie" placeholder="Especie" required />
  <input type="text" name="tamaño" placeholder="Tamaño máximo" />
  <input type="file" name="imagen" accept="image/*" />
  <button type="submit">Registrar</button>
</form>


  <!-- <div>
    <label for="filtro">Filtrar por especie:</label>
    <input type="text" id="filtro" placeholder="Ejemplo: Ciclido" />
  </div> -->
  <div class="filtros">
  <input type="text" id="busqueda_nombre" placeholder="🔍 Buscar por nombre">
  
  <select id="ordenar_por">
    <option value="fecha">Ordenar por fecha</option>
    <option value="tamaño">Ordenar por tamaño</option>
    <option value="id">Orden de registro</option>
  </select>

  <button onclick="aplicarFiltros()">Aplicar filtros</button>
</div>


  <button id="exportar">📤 Exportar registros</button>

  <div id="album">
     <?php include('mostrar.php'); ?>
  </div>

  <script src="app.js"></script>
</body>
</html>
