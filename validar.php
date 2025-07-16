<?php
session_start();
$conexion = new mysqli("localhost", "root", "", "album_peces");

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$sql = "SELECT * FROM usuarios WHERE nombre_usuario='$usuario'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
  $row = $resultado->fetch_assoc();
  if (password_verify($clave, $row['contraseña'])) {
    $_SESSION['usuario'] = $usuario;
    header("Location: index.php");
    exit();
  } else {
    echo "⚠️ Contraseña incorrecta";
  }
} else {
  echo "⚠️ Usuario no encontrado";
}
?>
