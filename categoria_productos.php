<!-- INICIO CATEGORIAS DE PRODUCTOS -->
<div id="gtco-blog" data-section="blog">
	<div class="gtco-container">
	
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
				<h2>Nuestros Productos Disponibles</h2>
				<p align="justify">Disfrute de toda la versatilidad, rendimiento, emosión, tecnología y confort que brindan nuestras motocicletas. Preguntanos por planes de financiación.</p>
			</div>
		</div>
<?php 

			######################## LLENANDO ARREGLO CATEGORIAS #############################
			//include('administracion/libs/conexion.php');
			//$conexion = new conexion();
			$con = $conexion->conectar();
			$sql= "SELECT * FROM categoria_producto";
			$resultado = mysqli_query($con, $sql);
			$numRegistros = mysqli_num_rows($resultado);

			if($numRegistros >0){

				$indice = 0;
				while($vectorCategorias = mysqli_fetch_array($resultado)){

					$arregloCategorias[] = array( 
											'id'=> $indice,
											'id_cat' => $vectorCategorias['id_cat'],
											'nom_cat' => utf8_encode($vectorCategorias['nom_cat']),
											'des_cat' => utf8_encode($vectorCategorias['des_cat']),
											'img_cat' => $vectorCategorias['img_cat']
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
					
					foreach($arregloCategorias as $categoria){				
						
						for($j=$limInf; $j<=$limSup; $j++){
						
							//echo 'CategoriaID: '.$categoria['id'].' / J:'.$j.'<br>';
							
							if($categoria['id']==$j){
								echo '<div class="col-md-4">
											<a href="productos_categoria.php?idCat='.$categoria['id_cat'].'" class="gtco-card-item has-text">
												<figure>
													<div class="overlay"><i class="ti-plus"></i></div>
													<img src="administracion/img/categoria/'.$categoria['img_cat'].'" alt="Image" class="img-responsive">
												</figure>
												<div class="gtco-text text-center">
													<h2>'.$categoria['nom_cat'].'</h2>
													<p aling="center" style="text-align: justify;">'.substr($categoria['des_cat'],0,300).'...</p>
												</div>
											</a>
										</div>';
							} // End if
													
						} // End for J
						
						
					} // End Foreach
					
					echo '<div class="clearfix visible-lg-block visible-md-block">
					</div>
					<div class="clearfix visible-sm-block"></div></div>';
				} // Fin For
				
			}// Fin #registros > 0
			


?>
	</div>
</div>

<!-- FIN CATEGORIAS PRODUCTOS -->