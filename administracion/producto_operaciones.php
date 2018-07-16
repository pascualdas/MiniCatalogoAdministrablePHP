<?php
extract($_GET);
extract($_POST);

if(isset($operacion) && $operacion="registrar"){
	echo "registrando producto";
}else{
	echo "Eliminando producto";
}
?>