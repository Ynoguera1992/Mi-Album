<?php
$conexion = new mysqli("localhost", "root", "", "album_peces");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $id = $_GET['id'];
  $resultado = $conexion->query("SELECT * FROM peces WHERE id = $id");
  $pez = $resultado->fetch_assoc();
?>
  <form action="editar.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $pez['id'] ?>" />
    <input type="text" name="nombre" value="<?= $pez['nombre'] ?>" required />
    <input type="text" name="especie" value="<?= $pez['especie'] ?>" required />
    <input type="text" name="tamaño" value="<?= $pez['tamaño'] ?>" />
    <input type="file" name="imagen" />
    <button type="submit">Guardar cambios</button>
  </form>
<?php
} else {
  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $especie = $_POST['especie'];
  $tamaño = $_POST['tamaño'];

  $imagenRuta = "";
  if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $imagenNombre = time() . "_" . $_FILES['imagen']['name'];
    move_uploaded_file($_FILES['imagen']['tmp_name'], "imagenes/" . $imagenNombre);
    $imagenRuta = "imagenes/" . $imagenNombre;
    $conexion->query("UPDATE peces SET imagen='$imagenRuta' WHERE id=$id");
  }

  $conexion->query("UPDATE peces SET nombre='$nombre', especie='$especie', tamaño='$tamaño' WHERE id=$id");

  header("Location: index.php");
  exit();
}
?>
