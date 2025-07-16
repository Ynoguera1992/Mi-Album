<?php
$conexion = new mysqli("localhost", "root", "", "album_peces");

$id = $_POST['id'];

$result = $conexion->query("SELECT imagen FROM peces WHERE id = $id");
$row = $result->fetch_assoc();
if ($row && file_exists($row['imagen'])) {
  unlink($row['imagen']); // Elimina la imagen
}

$conexion->query("DELETE FROM peces WHERE id = $id");

header("Location: index.php");
exit();
?>
