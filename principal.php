


<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("conexion.php");
session_start();

// Verificar si la sesión está activa
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirigir al login si no hay sesión activa
    exit();
}

// Determinar la acción seleccionada del menú
$action = isset($_GET['action']) ? $_GET['action'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">

</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4"></h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded shadow">
        <div class="container-fluid">
        <figure><img src="/img/icon.png" alt="logo"></figure>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="./insertar.php">Ingresar</a></li>
                    <li class="nav-item"><a class="nav-link" href="./actualizar.php">Actualizar</a></li>
                    <li class="nav-item"><a class="nav-link" href="./eliminar.php">Eliminar</a></li>
                    <li class="nav-item"><a class="nav-link" href="./listar.php">Listar</a></li>
                    <li class="nav-item"><a class="nav-link" href="./consulta.php">Tabla de Consultas</a></li>
                    <li class="nav-item"><a class="nav-link text-danger" href="salir.php">Salir</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<footer class="footer">
    <p>&copy; 2024 Colegio. Todos los derechos reservados.</p>
</footer>
</body>
</html>