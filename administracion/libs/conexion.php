<?php
class conexion{
	private $con;
	
    public function __construct(){
        $this->host='localhost';
        $this->user='KKK';
        $this->pass='KK';
        $this->database='KKK';
	}
    
    public function conectar(){
        
		$conect = mysqli_connect($this->host, $this->user, $this->pass);
		
		if($conect){
			mysqli_select_db($conect,$this->database);
			$this->con=$conect;
		}

        return $this->con;
    }	
	
	public function cerrarConexion(){
		mysqli_connect($this->con);
	}
	
	function nextid($tabla, $id){
		$sql = "SELECT max(".$id.") FROM ".$tabla;
		$resultado = mysqli_query($this->conectar(), $sql);
		if($vectorResultado = mysqli_fetch_array($resultado)){
			return ($vectorResultado[0]+1);
		}
	
	}

}
?>