<!DOCTYPE HTML>

<html>
	<head>
	<?php include("includesCSS.php"); ?>
	<style>			
					.feature-copy img {
						width: 90%;
						padding: 10px;
					}
				</style>
	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">
	
    <!-- Incluye cabecera - Menu y Logo -->
    <?php include("menu_principal_hijos.php"); ?>
	<!-- Fin Menu Principal  -->

	
	
	
	<!-- INICIO SERVICIOS -->
	 	 <div class="gtco-section-overflow">

		<div class="gtco-section" id="gtco-services" data-section="services">
			<div class="gtco-container">
							
				<?php
					//echo fmod(0,2);
					extract($_GET);
					include('administracion/libs/conexion.php');
					$conexion = new conexion();
					$con = $conexion->conectar();
					$sql= "SELECT * FROM producto WHERE id_pro='".$id."'";
					$resultado = mysqli_query($con, $sql);
					$numRegistros = mysqli_num_rows($resultado);
					//echo $sql;
					if($numRegistros > 0){
						
						$indice = 0;
						$html = '';
						while($vectorProductos = mysqli_fetch_array($resultado)){
							
                   				$html.='<div class="row">';
								$html.='<div class="col-md-12">
											<div class="feature-copy">
													<h3>'.$vectorProductos['nom_pro'].'</h3>
													<p aling="justify">'.$vectorProductos['des_pro'].'</p>
													<p aling="center">
													
        	<div id="carousel-1" class="carousel slide" data-ride="carousel">
            
            	<!-- Indicadores -->
                <ol class="carousel-indicators">
                	<li class="active" data-target="#carousel-1" data-slide-to="0"></li>
                    <li data-target="#carousel-1" data-slide-to="1"></li>
                    <li data-target="#carousel-1" data-slide-to="2"></li>
                </ol>
                
                <!-- Contenedor de Slides -->
                <div class="carousel-inner" role="listbox">
                		
                        <!-- Item 1 -->
                    	<div class="item active">
                        	<img src="administracion/img/productos/'.$vectorProductos['img1_pro'].'" class="img-responsive" alt="'.$vectorProductos['nom_pro'].'">
                            <div class="carousel-caption">
                            	<h4>'.$vectorProductos['nom_pro'].'</h4>
                            </div>
                        </div>
                        
                        <!-- Item 2 -->
                        <div class="item">
                        	<img src="administracion/img/productos/'.$vectorProductos['img2_pro'].'" class="img-responsive" alt="'.$vectorProductos['nom_pro'].'">
                            <div class="carousel-caption">
                            	<h4>'.$vectorProductos['nom_pro'].'</h4>
                            </div>
                        </div>
                        
                        <!-- Item 3 -->
                        <div class="item">
                        	<img src="administracion/img/productos/'.$vectorProductos['img3_pro'].'" class="img-responsive" alt="'.$vectorProductos['nom_pro'].'">
                            <div class="carousel-caption">
                            	<h4>'.$vectorProductos['nom_pro'].'</h4>
                            </div>
                        </div>
                        
                </div><!-- Fin Slides -->
                
                <!-- Controles de Recorrido -->
                <a href="#carousel-1" class="left carousel-control" role="button" data-slide="prev">
					<span class="icon-arrow-left" aria-hidden="true" style="color:#000; font-size: 3.5em;"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                
                <a href="#carousel-1" class="right carousel-control" role="button" data-slide="next">
                	<span class="icon-arrow-right" aria-hidden="true" style="color:#000; font-size: 3.5em;"></span>
                    <span class="sr-only">Siguiente</span>
                </a>
                
                
            </div>
												</p>
												</div>
										</div>';
                   			
								$html.='</div>';
							$indice=$indice+1;

						} // End While
						
					}else{ // End Numrows
						echo "<script> alert('El Producto no existe.'); </script>";
						echo "<script> window.location='index.php'; </script>";
					}
					echo $html;
				?>
			</div>
		</div>
	</div>
<!-- FIN SERVICIOS -->
	
	

	
	
	
   
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

