<?php
$conexion = new mysqli("localhost", "root", "", "album_peces");
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
$ordenar = isset($_GET['ordenar']) ? $_GET['ordenar'] : 'id';

$sql = "SELECT * FROM peces WHERE nombre LIKE '%$nombre%' ORDER BY $ordenar DESC";
$resultado = $conexion->query($sql);


while ($row = $resultado->fetch_assoc()) {
  echo "<div class='card'>";
  echo "<h3>" . $row['nombre'] . "</h3>";
  echo "<p><strong>Especie:</strong> " . $row['especie'] . "</p>";
  echo "<p><strong>Tamaño:</strong> " . $row['tamaño'] . "</p>";
  echo "<img src='" . $row['imagen'] . "' alt='" . $row['nombre'] . "' />";
  echo "<form action='editar.php' method='GET'>";
  echo "<input type='hidden' name='id' value='" . $row['id'] . "' />";
  echo "<button type='submit'>✏️ Editar</button>";
  echo "</form>";
  echo "<form action='eliminar.php' method='POST' onsubmit='return confirm(\"¿Seguro que quieres eliminar este pez?\")'>";
  echo "<input type='hidden' name='id' value='" . $row['id'] . "' />";
  echo "<button type='submit'>🗑️ Eliminar</button>";
  echo "</form>";
  echo "</div>";
}
?>
