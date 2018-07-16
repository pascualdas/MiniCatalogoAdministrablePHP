<!DOCTYPE HTML>
<?php
	extract($_GET);
	include('administracion/libs/conexion.php');
	$conexion = new conexion();
	$con = $conexion->conectar();
	
	$sqlCategoria = "SELECT * FROM categoria_producto WHERE id_cat=".$idCat;
	$resultadoCat = mysqli_query($con, $sqlCategoria);
	if($nomCat = mysqli_fetch_array($resultadoCat)){
		$nombreCategoria = $nomCat['nom_cat'];
	}
?>
<html>
	<head>
	<?php include("includesCSS.php"); ?>
	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">
	
    <!-- Incluye cabecera - Menu y Logo -->
    <?php include("menu_principal_hijos.php"); ?>
	<!-- Fin Menu Principal  -->
   
   
 <div id="gtco-blog" data-section="blog">
	<div class="gtco-container">
	
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
				<h2>Producto de Categoria: <strong><?php  echo $nombreCategoria; ?></strong></h2>
				<p align="justify">Disfrute de toda la versatilidad, rendimiento, emosión, tecnología y confort que brindan nuestras motocicletas. Preguntanos por planes de financiación.</p>
			</div>
		</div>
<?php 

			######################## LLENANDO ARREGLO Productos #############################
			
			$sql= "SELECT * FROM producto WHERE id_cat='".$idCat."'";
			$resultado = mysqli_query($con, $sql);
			$numRegistros = mysqli_num_rows($resultado);

			if($numRegistros >0){

				$indice = 0;
				while($vectorProductos = mysqli_fetch_array($resultado)){

					$arregloProductos[] = array( 
											'id'=> $indice,
											'id_pro' => $vectorProductos['id_pro'],
											'id_cat' => $vectorProductos['id_cat'],
											'nom_pro' => utf8_encode($vectorProductos['nom_pro']),
											'des_pro' => utf8_encode($vectorProductos['des_pro']),
											'img1_pro' => $vectorProductos['img1_pro'],
											'img2_pro' => $vectorProductos['img2_pro'],
											'img3_pro' => $vectorProductos['img3_pro'],
											'pre_pro' => $vectorProductos['pre_pro']
					);

					$indice = $indice + 1;

				}


			}
			########################### FIN LLENADO DEL ARREGLO #################################
			
			if($numRegistros>0){
				$html = '';	
				$numBloques = ceil($numRegistros/3);
				$limInf = 0;
				$limSup = 2;
				
				//echo $numBloques;
				
				for($i=1;$i<=$numBloques;$i++){				
					
					$limInf = 3 * ($i -1);
					$limSup = $limInf + 2;
					
					echo '<div class="row text-center">';
					
					foreach($arregloProductos as $producto){				
						
						for($j=$limInf; $j<=$limSup; $j++){
						
							//echo 'productoID: '.$producto['id'].' / J:'.$j.'<br>';
							
							if($producto['id']==$j){
								echo '<div class="col-md-4">
											<a href="producto.php?id='.$producto['id_pro'].'" class="gtco-card-item has-text">
												<figure>
													<div class="overlay"><i class="ti-plus"></i></div>
													<img src="administracion/img/productos/'.$producto['img1_pro'].'" alt="Image" class="img-responsive">
												</figure>
												<div class="gtco-text text-center">
													<h2>'.$producto['nom_pro'].'</h2>
													<p aling="justify" style="text-align: justify;">'.substr($producto['des_pro'],0,300).'...</p>
												</div>
											</a>
										</div>';
							} // End if
									
							//echo 'administracion/img/producto/'.$producto['img1_pro'].'<br>';
						} // End for J
						
						
					} // End Foreach
					
					echo '<div class="clearfix visible-lg-block visible-md-block">
					</div>
					<div class="clearfix visible-sm-block"></div></div>';
				} // Fin For
				
			}else{ // Fin #registros > 0
				echo '<div class="row text-center">';
				echo '<h4 aling="center"> No hay productos para esta categoria.</h4';
				echo '</div>';
			}

?>
	</div>
</div>

<!-- FIN Productos PRODUCTOS -->  

   
    <?php include("datosContacto.php"); ?>
	
	<?php include("pieDePagina.php"); ?>
	
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<?php
		include("includeJS.php");
	?>


	</body>
</html>

