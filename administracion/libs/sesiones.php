<?php
class sesiones{
	private $sql, $con;

	#########################################
	# Constructor que inicializa variables
	# #######################################	
	public function __construct(){
		require_once('conexion.php');
		$this->con = new conexion();
		$this->con = $this->con->conectar();
	}

	#########################################
	# Inicia la sesion de usuario
	# #######################################
	public function iniciarSesion($usu, $cla){
		
		$sql = "SELECT * FROM usuario WHERE ced_usu='".$usu."' AND cla_usu='".$cla."'";
		$result = mysqli_query($this->con,$sql);
		$numrows = mysqli_num_rows($result);
		if($numrows>0){
						
			while($row = mysqli_fetch_array($result)){
				session_start();
				$_SESSION['cedula']=$row['ced_usu'];

			}
			
			return 1;
			
		}else{
			return 0;
		}
		
	}
	
	#########################################
	# Finaliza la sesion de usuario
	# #######################################
	public function terminarSesion(){
		session_start();
		$_SESSION['usuario']="";
		$_SESSION['perfil']="";
		$_SESSION['cedula']="";
		session_unset();
		session_destroy();
	}
	
		
}
?>