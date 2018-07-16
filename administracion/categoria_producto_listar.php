<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body style=" padding-top:50px;">
<?php
	extract($_GET);	
	
	if(!isset($act) || $act==""){
		$act="listar";
	}
	require_once('libs/conexion.php');
	$mysliConnector = new conexion();

	
	
	echo '<table align="center" class="table table-bordered table-condensed table-hover table-striped table-responsive" style="width:80%;">';
	echo '<tr>
		  	<th align="center" style="text-align:center;">Id Categoria</th>
			<th align="center" style="text-align:center;">Nombre Categoria</th>
			<th align="center" style="text-align:center;">Imagen</th>
			<th align="center" style="text-align:center;">Modificar</th>
			<th align="center" style="text-align:center;">Eliminar</th>
		  </tr>';
	$consulta = "SELECT * FROM categoria_producto";
	$resultado = mysqli_query($mysliConnector->conectar(), $consulta);
	while($tipo = mysqli_fetch_array($resultado)){
		
		echo '<tr><td align="center">'.$tipo['id_cat'].'</td>';
		echo '<td align="center">'.$tipo['nom_cat'].'</td>';
		echo '<td align="center"><a target="new" href="img/categoria/'.$tipo['img_cat'].'"><img width="35px" height="35px" src="img/categoria/'.$tipo['img_cat'].'"></img></a></td>';
		echo '<td align="center"><a href="administracion.php?operacion=categoria_producto_modificar&id='.$tipo['id_cat'].'">Modificar</a></td>';
		echo '<td align="center"><a href="acciones_principales.php?accion=eliminarCategoria&id='.$tipo['id_cat'].'">Eliminar</a></td></tr>';
		
	}
	
	echo '</table>';
	

?>
</body>
</html>