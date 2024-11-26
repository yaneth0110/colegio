<?php
 include("verificar.php");
 include("conexion.php");

 $datos=new dbcolegio();

//isset comprueba si las variables están definidas -- !empty que no sean null
if ( isset($_POST) and !empty($_POST)  ) {
    $nombre = $_POST['est_nombre'];
    $apellido = $_POST['est_apellido'];
    $fecha = $_POST['est_fecha_nac'];
    $genero = $_POST['est_genero'];
    $email = $_POST['est_email'];
    $telefono = $_POST['est_telefono'];
    $direccion = $_POST['est_direccion'];
    $promedio = $_POST['est_promedio'];
    $ciudad = $_POST['est_ciudad'];
    $contraseña = $_POST['est_contraseña'];
    
    $res= $datos->insertar_datosEstudiante($nombre,$apellido,$fecha,$genero,$email,$telefono,$direccion,$promedio,$ciudad,$contraseña);

    if ($res==true) {
        echo '
            <script type="text/javascript">
            alert("Datos insertados correctamente");
            window.location.href="listar.php";
            </script>			
        ';
        
    } else {
        echo '
            <script type="text/javascript">
            alert("Error al insertar datos");
            </script>			
        ';
        
    }
    

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Estudiante </title>
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
    <h1 class="text-center">Formulario de Estudiante</h1>
    <form action="" method="POST" class="bg-light p-4 rounded shadow">
        <h2 class="mb-4">Datos del Estudiante</h2>
        <div class="mb-3">
            <label for="est_nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="est_nombre" name="est_nombre" maxlength="30" required>
        </div>
        <div class="mb-3">
            <label for="est_apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="est_apellido" name="est_apellido" maxlength="30" required>
        </div>
        <div class="mb-3">
            <label for="est_fecha_nac" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="est_fecha_nac" name="est_fecha_nac" required>
        </div>
        <div class="mb-3">
            <label for="est_genero" class="form-label">Género</label>
            <select class="form-select" id="est_genero" name="est_genero" required>
                <option value="">Seleccione una opción</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="est_email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="est_email" name="est_email" maxlength="50" required>
        </div>
        <div class="mb-3">
            <label for="est_telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="est_telefono" name="est_telefono" maxlength="20" required>
        </div>
        <div class="mb-3">
            <label for="est_direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="est_direccion" name="est_direccion" maxlength="100" required>
        </div>
        <div class="mb-3">
            <label for="est_promedio" class="form-label">Promedio</label>
            <input type="number" step="0.01" class="form-control" id="est_promedio" name="est_promedio" min="0" max="5" required>
        </div>
        <div class="mb-3">
            <label for="est_ciudad" class="form-label">Ciudad</label>
            <select class="form-select" id="est_ciudad" name="est_ciudad" required>
                <option value="">Seleccione una ciudad</option>
                <option value="Bogotá">Bogotá</option>
                <option value="Medellín">Medellín</option>
                <option value="Cali">Cali</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="est_contraseña" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="est_contraseña" name="est_contraseña" maxlength="255" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Enviar</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<footer class="footer">
    <p>&copy; 2024 Colegio. Todos los derechos reservados.</p>
</footer>
</body>
</html>