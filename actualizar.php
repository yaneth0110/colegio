<?php
include("verificar.php");



if (isset($_GET['id'])) {
	$id=intval($_GET['id']);
}else {
	header("location:listar.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../colegio/CSS/style.css">
</head>
<body>
   

 

    <section class="contenedor">
	<div class="contenedor-form">
		
		<?php
			include("conexion.php");
			$datos=new dbcolegio();
           $datos_estudiante=$datos->seleccionar_estudiante($id);

            
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
    
     $res= $datos->actualizar_estudiante($nombre,$apellido,$fecha,$genero,$email,$telefono,$direccion,$promedio,$ciudad,$contraseña);

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
               
      
               <div class="container mt-5">
    <h1 class="text-center">Formulario de Estudiante</h1>
    <form action="" method="POST" class="bg-light p-4 rounded shadow">
        <h2 class="mb-4">Datos del Estudiante</h2>
        
        <!-- ID del estudiante -->
        <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $datos_estudiante->est_id; ?>">
        
        <!-- Nombre -->
        <div class="mb-3">
            <label for="est_nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="est_nombre" name="est_nombre" maxlength="30" value="<?php echo $datos_estudiante->est_nombre; ?>" required>
        </div>

        <!-- Apellido -->
        <div class="mb-3">
            <label for="est_apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="est_apellido" name="est_apellido" maxlength="30" value="<?php echo $datos_estudiante->est_apellido; ?>" required>
        </div>

        <!-- Fecha de Nacimiento -->
        <div class="mb-3">
            <label for="est_fecha_nac" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="est_fecha_nac" name="est_fecha_nac" value="<?php echo $datos_estudiante->est_fecha_nac; ?>" required>
        </div>

        <!-- Género -->
        <div class="mb-3">
            <label for="est_genero" class="form-label">Género</label>
            <select name="est_genero" id="est_genero" class="form-select" required>
                <option value="M" <?php echo ($datos_estudiante->est_genero == 'M') ? 'selected' : ''; ?>>Masculino</option>
                <option value="F" <?php echo ($datos_estudiante->est_genero == 'F') ? 'selected' : ''; ?>>Femenino</option>
            </select>
        </div>

        <!-- Correo Electrónico -->
        <div class="mb-3">
            <label for="est_email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="est_email" name="est_email" maxlength="50" value="<?php echo $datos_estudiante->est_email; ?>" required>
        </div>

        <!-- Teléfono -->
        <div class="mb-3">
            <label for="est_telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="est_telefono" name="est_telefono" maxlength="20" value="<?php echo $datos_estudiante->est_telefono; ?>" required>
        </div>

        <!-- Dirección -->
        <div class="mb-3">
            <label for="est_direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="est_direccion" name="est_direccion" maxlength="100" value="<?php echo $datos_estudiante->est_direccion; ?>" required>
        </div>

        <!-- Promedio -->
        <div class="mb-3">
            <label for="est_promedio" class="form-label">Promedio</label>
            <input type="number" step="0.01" class="form-control" id="est_promedio" name="est_promedio" min="0" max="5" value="<?php echo $datos_estudiante->est_promedio; ?>" required>
        </div>

        <!-- Ciudad -->
        <div class="mb-3">
            <label for="est_ciudad" class="form-label">Ciudad</label>
            <select class="form-select" id="est_ciudad" name="est_ciudad" required>
                <option value="">Seleccione una ciudad</option>
                <option value="Bogota" <?php echo ($datos_estudiante->est_ciudad == 'Bogota') ? 'selected' : ''; ?>>Bogota</option>
                <option value="Medellin" <?php echo ($datos_estudiante->est_ciudad == 'Medellin') ? 'selected' : ''; ?>>Medellin</option>
                <option value="Cali" <?php echo ($datos_estudiante->est_ciudad == 'Cali') ? 'selected' : ''; ?>>Cali</option>
            </select>
        </div>

        <!-- Contraseña -->
        <div class="mb-3">
            <label for="est_contraseña" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="est_contraseña" name="est_contraseña" maxlength="255" value="<?php echo $datos_estudiante->est_contraseña; ?>" required>
        </div>
        <!-- Se crea un DIV y se le asigna la clase, y se imprime el mensaje -->
			<div class="">
				<?php 
					
				?>
			</div>	

            <center>
			  	<button type="submit" class="btn btn-info">Actualizar Registro</button>
			  	<a class="btn btn-warning" onclick="window.location.href='listar.php'">Listar Registros</a>
			  </center>
      </form>
      </div>

		</div>
	</section>

    
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
 <footer class="footer">
    <p>&copy; 2024 Colegio. Todos los derechos reservados.</p>
</footer>
</body>
</html>