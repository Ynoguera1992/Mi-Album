

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $conexion = new mysqli("localhost", "root", "", "album_peces");

  $usuario = $_POST['usuario'];
  $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);

  $sql = "INSERT INTO usuarios (nombre_usuario, contraseña) VALUES ('$usuario', '$clave')";
  $conexion->query($sql);

  echo "✅ Usuario registrado correctamente";
  header("Location: index.php");
} else {
  echo "⚠️ No se ha enviado el formulario.";
}
?>
