<?php

// Valida que la sesion este activada, si es asi la elimina
if(!isset($_SESSION['usuario']) || !isset($_SESSION['perfil']) || !isset($_SESSION['cedula'])){
	session_start();
	$_SESSION['usuario']="";
	$_SESSION['perfil']="";
	$_SESSION['cedula']="";
	session_unset();
	session_destroy();
}

?>