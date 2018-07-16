<?php
extract($_GET);
extract($_POST);

	require_once('login.php');
	$entrar = new login();

if($act=="login"){
		
	$estado = $entrar->iniciarSesion($txt_usuario, $txt_clave);
	//echo $estado;	

	if($estado==1){
		header('location:../administracion/administracion.php');
	}else{
		header('location:../index.php?msgbox=contactaraladministrador');
	}
	
	/*
	echo "Usuario: ".$_SESSION['usuario']."<br>";
	echo "Perfil: ".$_SESSION['perfil']."<br>";
	echo "Cedula: ".$_SESSION['cedula']."<br>";
	*/
	
}else if($act=="salir"){

	$entrar->terminarSesion();
	header('location:../index.php');
	exit();
	
}else{
	session_unset();
	header('location:../index.php?msgbox=contactaraladministrador');
	exit();
}

?>