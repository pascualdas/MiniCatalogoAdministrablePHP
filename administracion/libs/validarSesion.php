<?php
class validarSesion{
		
	function sesionGeneral(){
	
		if(!isset($_SESSION['cedula']) || $_SESSION['cedula']==""){
			return 0;
		}else{
			return 1;
		}
		
	}

}
?>