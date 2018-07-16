<?php
	extract($_GET);
	if(isset($_SESSION['cedula'])){
		session_destroy();	
	}
?>
<!DOCTYPE html>
<html>
<head>
<?php include("includesCSS.php"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administracion</title>
<link rel="stylesheet" type="text/css" href="../css/misestilos.css">
<script type="text/javascript" src="../js/jquery-2.2.4.min.js"></script>
</head>

<body>

<?php
	if(!isset($_SESSION["cedula"]) || $_SESSION["cedula"]==""){
?>

    
<div class="inicioSesionContenedor">
    <div class="capa_inicioSesion">
    	<form action="acciones_principales.php?accion=inicioSesion" method="post" id="frmlogin" name="frmlogin">
        	<table align="center" id="tabla_login" border="0">
            	<tr>
                	<td colspan="3" align="center">
                    	<div class="fondoLetraBlanca" style=" background-color:#FF1717; color:#FFF; padding:3px; border-radius:2px;">
                        	Iniciar Sesion en Administración
                        </div>
                    </td>
                </tr>
                <tr><td colspan="2">&nbsp;</td></tr>
            	<tr>
                	<td width="9%" rowspan="2" align="right"><img src="img/logoMini.png" width="80" height="38"></td>
                	<td width="31%" align="right"><label>Usuario:</label>
               	    &nbsp;</td>
                    <td width="60%">&nbsp;<input id="txt_usuario" name="txt_usuario" type="text" placeholder="usuario"></td>
                </tr>
                <tr>
                	<td align="right"><label>Contraseña:</label>
               	    &nbsp;</td>
                    <td>&nbsp;<input class="" id="txt_clave" name="txt_clave" type="password" placeholder="******"></td>
                </tr>
                <tr><td colspan="3" align="center">
                	<?php
					if(isset($msgbox)){
						
							echo '<script> alert("Intenta ingresar al sistema sin permisos."); </script>';
						
					}
					?>
                </td></tr>
                <tr>
                    <td colspan="3" align="center">
                    	<input id="btnIngresar" type="submit" value="Ingresar">&nbsp;
                    </td>
                </tr>
            </table>
        	<div class="form-group">
            	
            </div>
        </form>
    </div>
</div>
<?php
	}else{
		header('location:administracion.php');
	}
?>
</body>
</html>
