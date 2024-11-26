
<?php
echo "Inicio de login.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("conexion.php");
$datos = new dbcolegio();
$datos->conectar();
echo "Conexión a la base de datos exitosa.";
session_start();
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    echo "Usuario: $usuario, Contraseña: $clave";

    $resultado = $datos->login($usuario, $clave);
    if ($resultado) {
        $array = mysqli_fetch_array($resultado);
        echo "Registros encontrados: " . $array['registros'];
    } else {
        // Manejar el error en la consulta
        die("Error en la consulta: " . $datos->getLastError()); // Cambia 'getLastError' si implementaste el método.
    }

    

    if ($array['registros'] > 0) {
        $_SESSION['username'] = $usuario;
        header("Location: principal.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="container mt-5">
    <h3 class="text-center mb-4">Iniciar Sesión</h3>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger text-center"><?php echo $error; ?></div>
    <?php endif; ?>
    <form action="login.php" method="POST" class="bg-light p-4 rounded shadow">
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" required>
        </div>
        <div class="mb-3">
            <label for="clave" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="clave" name="clave" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Ingresar</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<footer class="footer">
    <p>&copy; 2024 Colegio. Todos los derechos reservados.</p>
</footer>
</body>
</html>