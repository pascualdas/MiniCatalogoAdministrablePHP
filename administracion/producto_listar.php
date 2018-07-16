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
		  	<th align="center" style="text-align:center;">Id Producto</th>
			<th align="center" style="text-align:center;">Nombre Producto</th>
			<th align="center" style="text-align:center;">Categoria</th>
			<th align="center" style="text-align:center;">Descripción</th>
			<th align="center" style="text-align:center;">Img 1</th>
			<th align="center" style="text-align:center;">Img 2</th>
			<th align="center" style="text-align:center;">Img 3</th>
			<th align="center" style="text-align:center;">Precio</th>
			<th align="center" style="text-align:center;">Eliminar / Modificar</th>
		  </tr>';
	$consulta = "SELECT * FROM producto";
	$con = $mysliConnector->conectar();
	$resultado = mysqli_query($con, $consulta);
	while($tipo = mysqli_fetch_array($resultado)){
		
		$nom_categoria = "SELECT * from categoria_producto WHERE id_cat='".$tipo['id_cat']."'";
		$resulNomCat = mysqli_query($con, $nom_categoria);
		if($nomCat = mysqli_fetch_array($resulNomCat)){
			$nomCategoria = $nomCat['nom_cat'];
		}
		
		echo '<tr><td align="center">'.$tipo['id_pro'].'</td>';
		echo '<td align="center">'.$tipo['nom_pro'].'</td>';
		echo '<td align="center">'.$nomCategoria.'</td>';
		echo '<td align="center">'.substr($tipo['des_pro'],0,20).'</td>';
		echo '<td align="center"><a href="img/productos/'.$tipo['img1_pro'].'" target="new"><img src="img/productos/'.$tipo['img1_pro'].'" width="35px" height="35px"></img></a></td>';
		echo '<td align="center"><a href="img/productos/'.$tipo['img2_pro'].'" target="new"><img src="img/productos/'.$tipo['img2_pro'].'" width="35px" height="35px"></img></a></td>';
		echo '<td align="center"><a href="img/productos/'.$tipo['img3_pro'].'" target="new"><img src="img/productos/'.$tipo['img3_pro'].'" width="35px" height="35px"></img></a></td>';
		echo '<td align="center">'.$tipo['pre_pro'].'</td>';
		echo '<td align="center"><a href="administracion.php?operacion=producto_modificar&id='.$tipo['id_pro'].'">Modificar &nbsp;</a>&nbsp;<a href="acciones_principales.php?accion=eliminarProducto&id='.$tipo['id_pro'].'">Eliminar</a></td></tr>';
		
	}
	
	echo '</table>';
	

?>
</body>
</html>