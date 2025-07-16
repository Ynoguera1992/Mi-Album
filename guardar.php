<?php
$conexion = new mysqli("localhost", "root", "", "album_peces");

$nombre = $_POST['nombre'];
$especie = $_POST['especie'];
$tamaño = $_POST['tamaño'];

$imagenRuta = "";
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
  $imagenNombre = time() . "_" . $_FILES['imagen']['name'];
  move_uploaded_file($_FILES['imagen']['tmp_name'], "imagenes/" . $imagenNombre);
  $imagenRuta = "imagenes/" . $imagenNombre;
}

$sql = "INSERT INTO peces (nombre, especie, tamaño, imagen) VALUES ('$nombre', '$especie', '$tamaño', '$imagenRuta')";
$conexion->query($sql);

echo "¡Registro guardado correctamente!";
header("Location: index.php");
exit();
?>
