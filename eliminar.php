<?php
include("verificar.php");
include("conexion.php");
if (isset($_GET['id'])) {//isset signifca si una variable esta definida
    
    $datos=new dbcolegio();

    $id=intval($_GET['id']);//intval es para convertir una variable string a entero
    $res= $datos->eliminar_estudiante($id);

    if ($res==true) {
        header("location:listar.php");
    } else {
        echo "error al eliminar el registro";
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Krona+One|Poppins&display=swap" rel="stylesheet">
	<link rel="icon" href="img/favicon.png" type="image/png" />
    <link rel="stylesheet" href=https://fonts.googleapis.com/icon?family=Material+Icons>
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

<div class="tablee-container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>fecha</th>
                <th>genero</th>
                <th>email</th>
                <th>telefono</th>
                <th>direccion</th>
                <th>promedio</th>
                <th>ciudad</th>
                <th>contraseña</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $tabla = new dbcolegio();
            $listado = $tabla->leer_tabla();
            while ($row = mysqli_fetch_object($listado)) {
                $id = $row->est_id;
                $nombre = $row->est_nombre;
                $apellido = $row->est_apellido;
                $fecha = $row->est_fecha_nac;
                $genero = $row->est_genero;
                $email = $row->est_email;
                $telefono = $row->est_telefono;
                $direccion = $row->est_direccion;
                $promedio = $row->est_promedio;
                $ciudad = $row->est_ciudad;
                $contraseña = $row->est_contraseña;
            ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nombre; ?></td>
                    <td><?php echo $apellido; ?></td>
                    <td><?php echo $fecha; ?></td>
                    <td><?php echo $genero; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $telefono; ?></td>
                    <td><?php echo $direccion; ?></td>
                    <td><?php echo $promedio; ?></td>
                    <td><?php echo $ciudad; ?></td>
                    <td><?php echo $contraseña; ?></td>
                    <td>
                        <a href="eliminar.php?id=<?php echo $id; ?>" class="delete" title="Eliminar" data-toggle="tooltip">
                            <i class="material-icons">&#xE92B;</i>
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<footer class="footer">
    <p>&copy; 2024 Colegio. Todos los derechos reservados.</p>
</footer>

</body>

</html>