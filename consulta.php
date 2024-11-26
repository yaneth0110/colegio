<?php
include("verificar.php");
include("conexion.php");

// Instancia de la base de datos
$datos = new dbcolegio();
$resultados = $datos->consulta_condiciones();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container mt-5">
    <h1 class="text-center mb-4"></h1>
    <nav class="navbar navbar-expand-lg navbar-light bg-light rounded shadow">
        <div class="container-fluid">
        <figure><img src="./img/icon.png" alt="logo"></figure>
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
</div>

<div class="container mt-5">
    <h1 class="text-center mb-4">Consulta de Estudiantes</h1>
    <div class="tablee-container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id Matrícula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Promedio</th>
                    <th>Materia</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($resultados)): ?>
                    <?php foreach ($resultados as $fila): ?>
                        <tr>
                            <td><?php echo $fila->mat_id; ?></td>
                            <td><?php echo $fila->estudiante; ?></td>
                            <td><?php echo $fila->apellido; ?></td>
                            <td><?php echo $fila->promedio; ?></td>
                            <td><?php echo $fila->materia; ?></td>
                            <td><?php echo $fila->estado; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="no-results">No se encontraron resultados</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<footer class="footer">
    <p>&copy; 2024 Colegio. Todos los derechos reservados.</p>
</footer>
</body>
</html>