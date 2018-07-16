<?php
	session_start();
	extract($_GET);
	extract($_POST);	
	require_once('libs/validarSesion.php');
	$validaSesion = new validarSesion();	
	$estadoSesion = $validaSesion->sesionGeneral();
	//echo "Estado Sesion: ".$estadoSesion."<br>";
		
	if($estadoSesion==0){
		header('location:index.php?msgbox=error');
		exit();
	}
	 
	 
?>

<!DOCTYPE html>
<html>
<head>
<title>Yamaha Motors San Vicente de Chucuri</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Yamaha Motors San Vicente de Chucuri" />
	<meta name="keywords" content="Yamaha, motos, mantenimiento, repuestos, venta, scooters, naked, sport, enduro, motorcicles, san vicente de chucuri." />
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="../js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="../js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="../js/bootstrap.min.js"></script>
</head>

<body>

<!-- -->


<div class="container-fluid">
<!-- Inicio Menu Principal -->


<?php
	include("menuPrincipal.php");
?>
<!-- Fin Menu Principal -->

	<div id="cuerpoAdministracion" class="row" style="padding-bottom:20px;">
        <div id="centroCuerpo" class="col-md-12" style="background-color:#FFF; border-radius:4px; padding:20px;">
        	
        <?php
			//Cuerpo que carga el centro de la web
			if(!isset($operacion) && !isset($operacion)){
				//echo "Tabla: ".$tbl.".php -> Accion: ".$act;
		?>  
       <br><br><br><br><br><br>
       <div id="imgCentral">
       	<p align="center"><img src="img/index.png" class=" img-responsive img-rounded"></p>
       </div>
 		<?php
 			}else{
				//$_SESSION["act"]=$act;
				include($operacion.".php");
			}
		?>         
        
        </div>
    </div>
    

<!-- -->



<!-- -->
<?php
	//include("piePagina.php");
?>
<div class="row">
<nav class="navbar navbar-default navbar-fixed-bottom navbar-inverse">
        	<div class="container-fluid text-center" style="padding-top:20px;">
            	<h5 style="color:#FFF;"> Yamaha Motos - San Vicente de Chucuri</h5>
            </div>
</nav>
</div>
<!-- -->
</div>
</body>
</html>