<?php
extract($_GET);
extract($_POST);

	require_once('libs/sesiones.php');
	require_once('libs/conexion.php');
	$conexion = new conexion();
	$varSesion = new sesiones();
	$con = $conexion->conectar();
if($accion=="inicioSesion"){
		
	$estado = $varSesion->iniciarSesion($txt_usuario, $txt_clave);

	if($estado==1){
		header('location:administracion.php');
	}else{
		header('location:index.php?msgbox=error');
	}

}elseif($accion=="registrarProducto"){

	$ID = $conexion->nextid('producto','id_pro');
	
	# NOMBRE DE ARCHIVOS
	$nomArchivo_1 = sanear_string(trim($_FILES['fotografia_1']['name']));
	$numCaracteres = strlen($nomArchivo_1);
	$nombre_img_1 = $ID."_".trim($txt_nombre)."_".substr($nomArchivo_1,($numCaracteres-4),4);
	
	$nomArchivo_2 = sanear_string(trim($_FILES['fotografia_2']['name']));
	$numCaracteres = strlen($nomArchivo_2);
	$nombre_img_2 = $ID."_".trim($txt_nombre)."_".substr($nomArchivo_2,($numCaracteres-4),4);
	
	$nomArchivo_3 = sanear_string(trim($_FILES['fotografia_3']['name']));
	$numCaracteres = strlen($nomArchivo_3);
	$nombre_img_3 = $ID."_".trim($txt_nombre)."_".substr($nomArchivo_3,($numCaracteres-4),4);
	
	
	$tipo_1 = $_FILES['fotografia_1']['type'];
	$tipo_2 = $_FILES['fotografia_2']['type'];
	$tipo_3 = $_FILES['fotografia_3']['type'];
	
	$tamano_1 = $_FILES['fotografia_1']['size'];
	$tamano_2 = $_FILES['fotografia_2']['size'];
	$tamano_3 = $_FILES['fotografia_3']['size'];
 	
if ($nomArchivo_1 == !NULL && $nomArchivo_2 == !NULL && $nomArchivo_3 == !NULL && $tamano_1 <= 2000000 && $tamano_2 <= 2000000 && $tamano_3 <= 2000000){

	   if ($tipo_1 == "image/gif" || $tipo_1 == "image/jpeg" || $tipo_1 == "image/jpg" || $tipo_1 == "image/png" ||
		  $tipo_2 == "image/gif" || $tipo_2 == "image/jpeg" || $tipo_2 == "image/jpg" || $tipo_2 == "image/png" ||
		   $tipo_3 == "image/gif" || $tipo_3 == "image/jpeg" || $tipo_3 == "image/jpg" || $tipo_3 == "image/png"
		  ){
		  $directorio = $_SERVER['DOCUMENT_ROOT'].'/yamaha/administracion/img/productos/';
		  
		   
		  $sql = "INSERT INTO `producto` (`id_pro`, `id_cat`, `nom_pro`, `des_pro`, `img1_pro`, `img2_pro`, `img3_pro`, `pre_pro`)VALUES('".$ID."', '".$cmbCategoria."','".sanear_string($txt_nombre)."', '".sanear_string($txt_descripcion)."', '".$nomArchivo_1."', '".$nomArchivo_2."', '".$nomArchivo_3."', '".$txt_pre."')";
			$resultado = mysqli_query($con, $sql);
			move_uploaded_file($_FILES['fotografia_1']['tmp_name'],$directorio.$nomArchivo_1);
			move_uploaded_file($_FILES['fotografia_2']['tmp_name'],$directorio.$nomArchivo_2);
			move_uploaded_file($_FILES['fotografia_3']['tmp_name'],$directorio.$nomArchivo_3);
		    if(mysqli_affected_rows($con)){
				//echo $sql;
				echo "<script> alert('Servicio Registrado Correctamente'); </script>";
				echo "<script> window.location='administracion.php?operacion=producto_listar'; </script>";
			}else{
				echo "<script> alert('El Servicio no pudo ser registrado, intente nuevamente'); </script>";
				echo "<script> window.location='administracion.php?operacion=producto_registrar'; </script>";
			}
		}else{
		 	echo "<script> alert('Archivos no permitidos por peso o tipo.'); </script>";
		    echo "<script> window.location='administracion.php?operacion=producto_listar'; </script>";
		}
	
		       
}else{
   //si existe la variable pero se pasa del tamaño permitido
	echo "<script> alert('Imagen muy grande, no debe superar las 2Mb.'); </script>";
	echo "<script> window.location='administracion.php?operacion=producto_registrar'; </script>";
}
	
}elseif($accion=="registrarServicio"){
	
	$nomArchivo = sanear_string(trim($_FILES['fotografia']['name']));
	$numCaracteres = strlen($nomArchivo);
		
	$ID = $conexion->nextid('servicio','id_ser');
	$nombre_img = $ID."_".trim(sanear_string($txt_nombre))."_".substr($nomArchivo,($numCaracteres-4),4);
		
	$tipo = $_FILES['fotografia']['type'];
	$tamano = $_FILES['fotografia']['size'];
 	
if (($nombre_img == !NULL) && ($tamano <= 2000000)){

	   if (($_FILES["fotografia"]["type"] == "image/gif") || ($_FILES["fotografia"]["type"] == "image/jpeg") || ($_FILES["fotografia"]["type"] == "image/jpg") || ($_FILES["fotografia"]["type"] == "image/png")){
		  $directorio = $_SERVER['DOCUMENT_ROOT'].'/yamaha/administracion/img/servicios/';
		  
		  $sql = "INSERT INTO `servicio` (`id_ser`, `nom_ser`, `des_ser`, `img_ser`)VALUES('".$ID."', '".sanear_string($txt_nombre)."', '".sanear_string($txt_descripcion)."', '".$nombre_img."')";
		   move_uploaded_file($_FILES['fotografia']['tmp_name'],$directorio.$nombre_img);
			//echo "Registrado el servicio: ".$sql."<br>";
			$resultado = mysqli_query($con, $sql);
			if(mysqli_affected_rows($con)){
				echo "<script> alert('Servicio Registrado Correctamente.'); </script>";
				echo "<script> window.location='administracion.php?operacion=servicio_listar'; </script>";
			}else{
				echo "<script> alert('El servicio no fue registrado, intenete nuevamente.'); </script>";
				echo "<script> window.location='administracion.php?operacion=servicio_registrar'; </script>";
			}
		}else{
		   //echo $_FILES["fotografia"]["type"];
		 	/*echo "<script> alert('No se puede subir una imagen con ese formato'); </script>";*/
		   	echo "<script> alert('No se puede subir una imagen con ese formato.'); </script>";
			echo "<script> window.location='administracion.php?operacion=servicio_registrar'; </script>";
		}
		       
}else{
   //si existe la variable pero se pasa del tamaño permitido
	echo "<script> alert('Imagen muy grande, no debe superar las 2Mb.'); </script>";
	echo "<script> window.location='administracion.php?operacion=servicio_registrar'; </script>";
	exit();
}
	
}elseif($accion=="modificarProducto"){
	
	$sql="UPDATE `producto` SET `nom_pro` = '".sanear_string($txt_nombre)."', `des_pro` = '".sanear_string($txt_descripcion)."', id_cat='".$cmbCategoria."', pre_pro='".$txt_pre."'";
	$directorio = $_SERVER['DOCUMENT_ROOT'].'/yamaha/administracion/img/productos/';
	
	if(isset($_FILES['fotografia_1']['name']) && $_FILES['fotografia_1']['name']!=""){
		$nomArchivo = trim(sanear_string($_FILES['fotografia_1']['name']));
		$numCaracteres = strlen($nomArchivo);
		$nombre_img = $id."1_".trim($txt_nombre)."_".substr($nomArchivo,($numCaracteres-4),4);
		move_uploaded_file($_FILES['fotografia_1']['tmp_name'],$directorio.$nombre_img);
		$sql.=", `img1_pro` = '".$nombre_img."'";
	}
	if(isset($_FILES['fotografia_2']['name']) && $_FILES['fotografia_2']['name']!=""){
		$nomArchivo = trim(sanear_string($_FILES['fotografia_2']['name']));
		$numCaracteres = strlen($nomArchivo);
		$nombre_img = $id."2_".trim($txt_nombre)."_".substr($nomArchivo,($numCaracteres-4),4);
		move_uploaded_file($_FILES['fotografia_2']['tmp_name'],$directorio.$nombre_img);
		$sql.=", `img2_pro` = '".$nombre_img."'";
	}
	if(isset($_FILES['fotografia_3']['name']) && $_FILES['fotografia_3']['name']!=""){
		$nomArchivo = trim(sanear_string($_FILES['fotografia_3']['name']));
		$numCaracteres = strlen($nomArchivo);
		$nombre_img = $id."3_".trim($txt_nombre)."_".substr($nomArchivo,($numCaracteres-4),4);
		move_uploaded_file($_FILES['fotografia_3']['tmp_name'],$directorio.$nombre_img);
		$sql.=", `img3_pro` = '".$nombre_img."'";
	}
	
	$sql.=" WHERE `id_pro` = '".$id."'";
	$resultado = mysqli_query($con, $sql);
	if(mysqli_affected_rows($con)){
		echo "<script> alert('Producto actualizado satisfactoriamente.'); </script>";
		echo "<script> window.location='administracion.php?operacion=producto_listar'; </script>";
		//echo $sql;
	}else{
		echo "<script> alert('El Producto no fue actualizado, intente nuevamente.'); </script>";
		echo "<script> window.location='administracion.php?operacion=producto_listar'; </script>";
	}

}elseif($accion=="modificarServicio"){

	$sql="UPDATE `servicio` SET `nom_ser` = '".sanear_string($txt_nombre)."', `des_ser` = '".sanear_string($txt_descripcion)."'";

	if(isset($_FILES['fotografia']['name']) && $_FILES['fotografia']['name']!=""){
		$nomArchivo = sanear_string(trim($_FILES['fotografia']['name']));
		$numCaracteres = strlen($nomArchivo);
		$nombre_img = $id."_".trim(sanear_string($txt_nombre))."_".substr($nomArchivo,($numCaracteres-4),4);
		$directorio = $_SERVER['DOCUMENT_ROOT'].'/yamaha/administracion/img/servicios/';
		move_uploaded_file($_FILES['fotografia']['tmp_name'],$directorio.$nombre_img);
		$sql.=", `img_ser` = '".$nombre_img."'";
	}
	
	$sql.=" WHERE `id_ser` = '".$id."'";
	$resultado = mysqli_query($con, $sql);
	if(mysqli_affected_rows($con)){
		echo "<script> alert('El Servicio fue actualizado satisfactoriamente.'); </script>";
		echo "<script> window.location='administracion.php?operacion=servicio_listar'; </script>";
	//echo $sql;
	}else{
		echo "<script> alert('El Servicio no fue actualizado, intente nuevamente.'); </script>";
		echo "<script> window.location='administracion.php?operacion=servicio_listar'; </script>";
	}
	
}elseif($accion=="actualizarCategoria"){
	
	$sql="UPDATE `categoria_producto` SET `nom_cat` = '".sanear_string($txt_nombre)."', `des_cat` = '".sanear_string($txt_descripcion)."' ";

	if(isset($_FILES['fotografia']['name']) && $_FILES['fotografia']['name']!=""){
		$nomArchivo = trim(sanear_string($_FILES['fotografia']['name']));
		$numCaracteres = strlen($nomArchivo);
		$nombre_img = $id."_".trim(sanear_string($txt_nombre))."_".substr($nomArchivo,($numCaracteres-4),4);
		$directorio = $_SERVER['DOCUMENT_ROOT'].'/yamaha/administracion/img/categoria/';
		move_uploaded_file($_FILES['fotografia']['tmp_name'],$directorio.$nombre_img);
		$sql.=", `img_cat` = '".$nombre_img."'";
	}
	$sql.=" WHERE `id_cat` = '".$id."'";
	$resultado = mysqli_query($con, $sql);
	if(mysqli_affected_rows($con)){
		echo "<script> alert('La categoria fue actualizada satisfactoriamente.'); </script>";
		echo "<script> window.location='administracion.php?operacion=categoria_producto_listar'; </script>";
	//echo $sql;
	}else{
		echo "<script> alert('La categoria no fue actualizada, intente nuevamente.'); </script>";
		echo "<script> window.location='administracion.php?operacion=categoria_producto_modificar&id=".$id."'; </script>";
	}

}elseif($accion=="registrarCategoria"){
	
	$nomArchivo = sanear_string(trim($_FILES['fotografia']['name']));
	$numCaracteres = strlen($nomArchivo);
	
	$ID = $conexion->nextid('categoria_producto','id_cat');
	$nombre_img = $ID."_".trim(sanear_string($txt_nombre))."_".substr($nomArchivo,($numCaracteres-4),4);
	$tipo = $_FILES['fotografia']['type']; 
	$tamano = $_FILES['fotografia']['size'];
 	
if (($nombre_img == !NULL) && ($_FILES['fotografia']['size'] <= 2000000)){

	   if (($tipo == "image/gif") || ($tipo == "image/jpeg") || ($tipo == "image/jpg") || ($tipo == "image/png")){
		  $directorio = $_SERVER['DOCUMENT_ROOT'].'/yamaha/administracion/img/categoria/';
		  
		   $sql = "INSERT INTO `categoria_producto` (`id_cat`, `nom_cat`, `des_cat`,`img_cat`)VALUES('".$ID."', '".sanear_string($txt_nombre)."', '".sanear_string($txt_descripcion)."' ,'".$nombre_img."')";
		//echo "Registrado el servicio: ".$sql."<br>";
		   move_uploaded_file($_FILES['fotografia']['tmp_name'],$directorio.$nombre_img);
		   $resultado = mysqli_query($con, $sql);
		   
		   if(mysqli_affected_rows($con)){
				echo "<script> alert('La categoria fue registrada satisfactoriamente.'); </script>";
				echo "<script> window.location='administracion.php?operacion=categoria_producto_listar'; </script>";
			//echo $sql;
			}else{
				echo "<script> alert('La categoria no fue registrada, intente nuevamente.'); </script>";
				echo "<script> window.location='administracion.php?operacion=categoria_producto_registrar'; </script>";
			}
		   
		}else{
			echo "<script> alert('La categoria no fue registrada, Tipo de adjunto no permitido.'); </script>";
			echo "<script> window.location='administracion.php?operacion=categoria_producto_registrar'; </script>";
		}
		       
}else{
   //si existe la variable pero se pasa del tamaño permitido
	echo "<script> alert('Imagenes muy grandes, no debe superar las 2Mb.'); </script>";
	echo "<script> window.location='administracion.php?operacion=categoria_producto_registrar'; </script>";
}
}else if($accion=="eliminarCategoria"){
	
	$sql="DELETE FROM categoria_producto WHERE id_cat='".$id."'";
	$resultado = mysqli_query($conexion->conectar(), $sql);
	//echo $sql;
	if(mysqli_affected_rows($con)){
		//echo $sql;
		echo "<script> alert('Categoria eliminada correctamente.'); </script>";
		echo "<script> window.location='administracion.php?operacion=categoria_producto_listar'; </script>";
	}else{
		echo "<script> alert('La Categoria no fue eliminada, intente nuevamente.'); </script>";
		echo "<script> window.location='administracion.php?operacion=categoria_producto_listar'; </script>";
	}
	
}else if($accion=="eliminarServicio"){
	
	$sql="DELETE FROM servicio WHERE id_ser='".$id."'";
	$resultado = mysqli_query($con, $sql);
	if(mysqli_affected_rows($con)){
		//echo $sql;
		echo "<script> alert('Servicio eliminado correctamente.'); </script>";
		echo "<script> window.location='administracion.php?operacion=servicio_listar'; </script>";
	}else{
		echo "<script> alert('El Servicio no fue eliminado, intente nuevamente.'); </script>";
		echo "<script> window.location='administracion.php?operacion=servicio_listar'; </script>";
	}
	//echo $sql;
	
}else if($accion=="eliminarProducto"){
	
	$sql="DELETE FROM producto WHERE id_pro='".$id."'";
	$resultado = mysqli_query($conexion->conectar(), $sql);
	//echo $sql;
	if(mysqli_affected_rows($con)){
		//echo $sql;
		echo "<script> alert('Producto eliminado correctamente.'); </script>";
		echo "<script> window.location='administracion.php?operacion=producto_listar'; </script>";
	}else{
		echo "<script> alert('El Producto no fue eliminado, intente nuevamente.'); </script>";
		echo "<script> window.location='administracion.php?operacion=producto_listar'; </script>";
	}
	
}else if($accion=="terminarSesion"){

	$varSesion->terminarSesion();
	header('location:index.php');
	exit();
	
}else{
	echo $accion;
	session_unset();
	header('location:index.php?msgbox=errordeacceso');
	exit();
}


function sanear_string($string)
{
 
    $string = trim($string);
 
    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );
 
    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );
 
    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );
 
    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );
 
    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );
 
    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    ); 
 
    return $string;
}
?>