<?php
/*
session_start();
	if(isset($_SESSION['cedula'])){
		session_unset($_SESSION['cedula']);
		session_destroy();	
	}
*/
?>
<!DOCTYPE HTML>

<html>
	<head>
	<?php include("includesCSS.php"); ?>
	</head>
	<body>
		
	<div class="gtco-loader"></div>
	
	<div id="page">
	
    <!-- Incluye cabecera - Menu y Logo -->
    <?php include("menu_principal.php"); ?>
	<!-- Fin Menu Principal  -->
    
	<?php include("slidePrincipal.php"); ?>

	<?php include("servicios.php"); ?>
	
	<?php include("categoria_productos.php"); ?>	
   
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

