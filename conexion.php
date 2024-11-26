<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    class dbcolegio{
        private $con;
		private $dbequipo='sql310.infinityfree.com';
		private $dbusuario='if0_37788145';
		private $dbclave='HBESGlMh920PwVB';
		private $dbnombre='if0_37788145_colegio'; 

        //constructor
		function __construct(){
			$this->conectar();
		}//fin constructor
      
		
        //función para conectarse a la base de datos
		public function conectar(){
			$this->con = mysqli_connect($this->dbequipo, $this->dbusuario, $this->dbclave, $this->dbnombre);

			if(mysqli_connect_error()){
				die("Error: No se pudo conectar a la base de datos: " . mysqli_connect_error() );
			}

		}//fin funcion conectar
        public function getLastError() {
			return $this->con->error;
		}
		public function login($usuario, $clave) {
			// Prepara la consulta SQL con placeholders
			$stmt = $this->con->prepare("SELECT COUNT(*) as registros FROM estudiante WHERE est_nombre = ? AND est_contraseña = ?");
			
			if ($stmt === false) {
				die("Error en la preparación de la consulta: " . $this->con->error);
			}
		
			// Vincula las variables a los placeholders
			$stmt->bind_param("ss", $usuario, $clave);
		
			// Ejecuta la consulta
			$stmt->execute();
		
			// Obtiene el resultado
			$resultado = $stmt->get_result();
		
			return $resultado;
		}

       public function insertar_datosEstudiante($nombre,$apellido,$fecha,$genero,$email,$telefono,$direccion,$promedio,$ciudad,$contraseña){
		$sql="insert into estudiante (est_nombre, est_apellido, est_fecha_nac , est_genero , est_email ,est_telefono, est_direccion , est_promedio ,est_ciudad ,
        est_contraseña)values('$nombre','$apellido','$fecha','$genero','$email','$telefono','$direccion','$promedio','$ciudad','$contraseña');";
		echo $sql;

		$resultado= mysqli_query($this->con, $sql);

			if ($resultado==true) {
				return true;
			} else {
				return false;
			}
		
	 }


	 //método para consultar datos
	 public function leer_tabla(){
		$sql="select * from estudiante;";
		$resultado= mysqli_query($this->con, $sql);
		return $resultado;
	}
    
	 //metodo para eliminar un registro
	 public function eliminar_estudiante($id){
		$sql="delete from estudiante where est_id=$id";
	     echo $sql;
		$resultado=mysqli_query($this->con,$sql);

		if ($resultado==true) {
		  return true;
		} else {
		  return false;
		}
		
	  }


	//metodos para actualizar un registro
	public function seleccionar_estudiante($id){
		$sql="select * from estudiante where est_id=$id";
		$resultado=mysqli_query($this->con,$sql);
		$retorno=mysqli_fetch_object($resultado);
		return $retorno;

	   }
    
	   public function actualizar_estudiante($nombre,$apellido,$fecha,$genero,$email,$telefono,$direccion,$promedio,$ciudad,$contraseña){
        $sql="update estudiante set est_nombre='$nombre', est_apellido='$apellido', est_fecha_nac='$fecha' , est_genero='$genero' , est_email='$email' ,est_telefono='$telefono', est_direccion='$direccion' , est_promedio='$promedio' ,est_ciudad='$ciudad' where  est_contraseña='$contraseña';";
		echo $sql;

		$resultado=mysqli_query($this->con,$sql);

		if ($resultado==true) {
			return true;
		  } else {
			return false;
		  }
	   } 
    

	  // Método para la consulta con condiciones (Devuelve un array de objetos)
	  public function consulta_condiciones() {
        $sql = "SELECT 
                    m.mat_id, 
                    e.est_nombre AS estudiante, 
                    e.est_apellido AS apellido, 
                    e.est_promedio AS promedio, 
                    m.curso_nombre AS materia, 
                    m.estado AS estado
                FROM estudiante e
                LEFT JOIN matricula m ON e.est_id = m.est_id
                WHERE m.curso_nombre = 'Matemáticas'
                  AND e.est_promedio > 4.0
                  AND (m.estado = 'Pendiente' OR m.estado = 'Aprobado')";

        $resultado = $this->con->query($sql);

        if (!$resultado) {
            die("Error en la consulta: " . $this->con->error);
        }

        // Convertir las filas a objetos
        $filas = [];
        while ($fila = $resultado->fetch_object()) {
            $filas[] = $fila; // Cada fila será un objeto
        }

        return $filas;
    }


    }// fin clase basedatos


?>
