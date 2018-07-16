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

	
	
	echo '<table align="center" class="table table-bordered table-condensed table-hover table-striped table-responsive" style="width:100%;">';
	echo '<tr>
		  	<th align="center" style="text-align:center;">Id Servicio</th>
			<th align="center" style="text-align:center;">Nombre Servicio</th>
			<th align="center" style="text-align:center;">Descripcion</th>
			<th align="center" style="text-align:center;">Imagen</th>
			<th align="center" style="text-align:center;">Eliminar / Modificar</th>
		  </tr>';
	$consulta = "SELECT * FROM servicio";
	$resultado = mysqli_query($mysliConnector->conectar(), $consulta);
	while($tipo = mysqli_fetch_array($resultado)){
		
		echo '<tr><td align="center">'.$tipo['id_ser'].'</td>';
		echo '<td align="center">'.$tipo['nom_ser'].'</td>';
		echo '<td align="center">'.substr($tipo['des_ser'],0,20).'</td>';
		echo '<td align="center"><a target="new" href="img/servicios/'.$tipo['img_ser'].'"><img width="35px" height="35px" src="img/servicios/'.$tipo['img_ser'].'"></img></a></td>';
		echo '<td align="center"><a href="administracion.php?operacion=servicio_modificar&id='.$tipo['id_ser'].'">Modificar &nbsp;</a>&nbsp;<a href="acciones_principales.php?accion=eliminarServicio&id='.$tipo['id_ser'].'">Eliminar</a></td></tr>';
		
	}
	
	echo '</table>';
	

?>
</body>
</html>