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
					$sql= "SELECT * FROM servicio WHERE id_ser='".$id."'";
					$resultado = mysqli_query($con, $sql);
					$numRegistros = mysqli_num_rows($resultado);
					
					if($numRegistros > 0){
						
						$indice = 0;
						$html = '';
						while($vectorServicios = mysqli_fetch_array($resultado)){
							
                   				$html.='<div class="row">';
								$html.='<div class="col-md-12">
											<div class="feature-copy">
													<h3>'.$vectorServicios['nom_ser'].'</h3>
													<p aling="justify">'.$vectorServicios['des_ser'].'</p>
													<p aling="center"><img src="administracion/img/servicios/'.$vectorServicios['img_ser'].'"/></p>
												</div>
										</div>';
                   			
								$html.='</div>';
							$indice=$indice+1;

						} // End While
						
					}else{ // End Numrows
						echo "<script> alert('El Servicio no existe.'); </script>";
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

