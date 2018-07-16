<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registrar Servicios</title>
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/misestilos.css">
</head>
<?php
	extract($_GET);
	extract($_POST);
	require('libs/conexion.php');
	$conexion = new conexion();
	$con = $conexion->conectar();
	
	$sqlProducto = "SELECT * FROM producto WHERE id_pro='".$id."'";
	$resultado = mysqli_query($con, $sqlProducto);
	$numRegistros = mysqli_num_rows($resultado);
	if($numRegistros>0){
		
		if($vecProd = mysqli_fetch_array($resultado)){
			$nombre = $vecProd['nom_pro'];
			$descripcion = $vecProd['des_pro'];
			$precio = $vecProd['pre_pro'];
			$img1 = $vecProd['img1_pro'];
			$img2 = $vecProd['img2_pro'];
			$img3 = $vecProd['img3_pro'];
			$idCat = $vecProd['id_cat'];
		}
		
	}
	
?>

<body style="margin-top:50px;">
	<div class="row">
    	<div class="col-md-4">&nbsp;</div>
        <div class="col-md-4">
            <form id="frmProducto" enctype="multipart/form-data" method="post" action="acciones_principales.php?accion=modificarProducto&id=<?php echo $id; ?>">
                
                <div class="form-group">
                    <label><strong>Nombre del Producto: </strong></label>
                    <input id="txt_nombre" name="txt_nombre" type="text" class="form-control bg-primary" value="<?php echo utf8_decode($nombre); ?>"> 
                </div>
                
                <div class="form-group">
                    <label><strong>Categoria: </strong></label>
                    <select id="cmbCategoria" name="cmbCategoria" class="form-control">
                	<option value="0" selected>Seleccione Categoria</option>
                	<?php
						$sqlCategorias = "SELECT * FROM categoria_producto";
						$resultado = mysqli_query($con, $sqlCategorias);
						$numRegistros = mysqli_num_rows($resultado);
						if($numRegistros>0){
							while($valor = mysqli_fetch_array($resultado)){
								if($valor["id_cat"]==$idCat){
									echo "<option value=".$valor["id_cat"]." selected>".$valor["nom_cat"]."</option>";
								}else{
									echo "<option value=".$valor["id_cat"].">".$valor["nom_cat"]."</option>";
								}
							}
						}

					?>
                </select>
                </div>
                
                <div class="form-group">
                    <label><strong>Precio del Producto: </strong></label>
                    <input id="txt_pre" name="txt_pre" type="number" class="form-control bg-primary" value="<?php echo $precio; ?>"> 
                </div>
                
                <div class="form-group">
                    <label><strong>Descripcion: </strong></label>
                    <textarea id="txt_descripcion" name="txt_descripcion" class="form-control" maxlength="1000" placeholder="Digite una descripción del producto." rows="5"><?php echo utf8_decode($descripcion); ?></textarea>
                </div>
				<div class="text-center">
					<div style="display: inline-block">
				    	<a target="new" href="img/productos/<?php echo $img1; ?>">
				    	<img src="img/productos/<?php echo $img1; ?>" width="125" height="100"/>
						</a>
				    </div>
					
					<div style="display: inline-block">
			    		<a target="new" href="img/productos/<?php echo $img2; ?>">
				    	<img src="img/productos/<?php echo $img2; ?>" width="125" height="100"/>
						</a>
				    </div>
					
					<div style="display: inline-block">
			    		<a target="new" href="img/productos/<?php echo $img3; ?>">
				    	<img src="img/productos/<?php echo $img3; ?>" width="125" height="100"/>
						</a>
					</div>
					
				</div>
                <div class="form-group">
                    <label><strong>Fotografias Producto: </strong></label>
                    <input id="fotografia_1" name="fotografia_1" type="file" class="form-control bg-primary" placeholder="Imagen Max 2 Mb.">
                    <input id="fotografia_2" name="fotografia_2" type="file" class="form-control bg-primary" placeholder="Imagen Max 2 Mb.">
                    <input id="fotografia_3" name="fotografia_3" type="file" class="form-control bg-primary" placeholder="Imagen Max 2 Mb.">
                <small class="text-center"><code>Imagen recomendada de 900px x 450 px. Max 2 Mb.</code></small>  
                </div>
                
                 <div class="form-group text-right">
                 	<input onClick="return validacion_del_formulario(); " id="btnIngresar" type="submit" value="Modificar Producto">
                 </div>
                
            </form>
        </div>
       	<div class="col-md-4">&nbsp;</div>
<script>

function validacion_del_formulario(){
	var nombre = document.getElementById("txt_nombre").value;
	var descripcion = document.getElementById("txt_descripcion").value;
	var categoria = document.getElementById("cmbCategoria").value;
		
	if(nombre!="" && descripcion!="" && descripcion!="" && categoria!="0"){
		return true;
	}else{
		alert("Diligencia correctamente el formulario");
		document.getElementById("txt_nombre").focus();
		return false;
	}
	
}

</script>
</body>
</html>