<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio de Sesión</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="login-container">
    <h1>🎯 Álbum de Peces - Acceso</h1>
    <form action="validar.php" method="POST" class="login-form">
      <input type="text" name="usuario" placeholder="Usuario" required>
      <input type="password" name="clave" placeholder="Contraseña" required>
      <button type="submit">Iniciar Sesión</button>
    </form>
    <!-- <p class="info">¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p> -->
  </div>
</body>
</html>
