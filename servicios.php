	<div class="gtco-section-overflow">

		<div class="gtco-section" id="gtco-services" data-section="soat">
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-12">
						<div class="gtco-heading" >
							<h2 class="gtco-left">Cotiza tu SOAT</h2>
							<p align="justify">El SOAT es un seguro obligatorio establecido por Ley con un fin netamente social. Su objetivo es asegurar la atención, de manera inmediata e incondicional, de las víctimas de accidentes de tránsito que sufren lesiones corporales y muerte. Cubre a las personas que sean víctimas de accidentes de tránsito según definición aplicable para SOAT y ocurridos dentro del territorio nacional. Tendrán derecho a los servicios y prestaciones de acuerdo a los amparos del SOAT, establecidos por definición legal, medidos por factores de Salarios Mínimos Legales Diarios Vigentes (SMLDV).</p> 
							<br>
							<h3 align="center"><strong><a target="_blank" class="btn btn-primary btn-lg" href="http://asekura.co/cotizadores/cotizadorSoat.php" title="Cotizador de SOAT">Cotiza tu SOAT</a></strong></h3>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
 	 <!-- INICIO SERVICIOS -->
	 	 <div class="gtco-section-overflow">

		<div class="gtco-section" id="gtco-services" data-section="services">
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-12">
						<div class="gtco-heading" >
							<h2 class="gtco-left">Nuestros Servicios</h2>
							<p align="justify">Contamos con un amplio catalogo de servicios que cubren toda nuestra actividad comercial, desde la elaboración de una cotización hasta el soporte y garantia de nuestros productos (Venta de motocicletas, financiación, mantenimiento y repuestos, garantias entre otros).</p>
						</div>
					</div>
				</div> 
				
				<?php
					//echo fmod(0,2);
					include('administracion/libs/conexion.php');
					$conexion = new conexion();
					$con = $conexion->conectar();
					$sql= "SELECT * FROM servicio";
					$resultado = mysqli_query($con, $sql);
					$numRegistros = mysqli_num_rows($resultado);
					
					if($numRegistros > 0){
						
						$indice = 0;
						$html = '';
						while($vectorServicios = mysqli_fetch_array($resultado)){
							
							$residuo = fmod($indice,2);
							
							if($residuo==0){
                   				$html.='<div class="row">';
								$html.='<div class="col-md-6">
											<div class="feature-left">
												<a href="servicio.php?id='.$vectorServicios['id_ser'].'">
												<span class="icon">
													<i class="icon-toggle"></i>
												</span>
												</a>
												<div class="feature-copy">
													<h3><a href="servicio.php?id='.$vectorServicios['id_ser'].'">'.$vectorServicios['nom_ser'].'</a></h3>
													<p aling="justify" style="text-align: justify;">'.$vectorServicios['des_ser'].'</p>
													<img src="administracion/img/servicios/'.$vectorServicios['img_ser'].'"/>
												</div>
											</div>
										</div>';
                   			}else{
							
								$html.='<div class="col-md-6">
											<div class="feature-left">
												<a href="servicio.php?id='.$vectorServicios['id_ser'].'">
												<span class="icon">
													<i class="icon-toggle"></i>
												</span>
												</a>
												<div class="feature-copy">
													<div class="feature-copy">
													<h3 aling="center"><a href="servicio.php?id='.$vectorServicios['id_ser'].'">'.utf8_decode($vectorServicios['nom_ser']).'</a></h3>
													<p aling="justify" style="text-align: justify;">'.utf8_decode($vectorServicios['des_ser']).'</p>
													<img src="administracion/img/servicios/'.$vectorServicios['img_ser'].'"/>
												</div>
												</div>
											</div>
										</div>';
								$html.='</div>';
							}
							
							$indice=$indice+1;

						} // End While
						
					} // End Numrows
					
					echo $html;
				?>
			</div>
		</div>
	</div>
<!-- FIN SERVICIOS -->