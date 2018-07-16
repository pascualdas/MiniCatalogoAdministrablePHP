<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registrar Categoria Productos</title>
<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/misestilos.css">
</head>
<?php

?>
<body style="margin-top:80px;">
	<div class="row">
    	<div class="col-md-4">&nbsp;</div>
        <div class="col-md-4">
            <form id="frmCategoriaProducto" enctype="multipart/form-data" method="post" action="acciones_principales.php?accion=registrarCategoria">
                
                <div class="form-group">
                    <label><strong>Nombre Categoria Producto: </strong></label>
                    <input id="txt_nombre" name="txt_nombre" type="text" class="form-control bg-primary" placeholder="Nombre del servicio"> 
                </div>
                <div class="form-group">
                    <label><strong>Descripcion: </strong></label>
                    <textarea id="txt_descripcion" name="txt_descripcion" class="form-control" maxlength="1000" placeholder="Digite una descripción de la categoria." rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label><strong>Fotografia: </strong></label>
                    <input id="fotografia" name="fotografia" type="file" class="form-control bg-primary" placeholder="Imagen Max 2 Mb.">
                <small class="text-center"><code>Imagen recomendada de 900px x 450 px. Max 2 Mb.</code></small>  
                </div>
                
                 <div class="form-group text-right">
                 	<input onClick="return validacion_del_formulario(); " id="btnIngresar" type="submit" value="Registrar Categoria">
                 </div>
                
            </form>
        </div>
       	<div class="col-md-4">&nbsp;</div>
<script>

function validacion_del_formulario(){
	var nombre = document.getElementById("txt_nombre").value;
	var archivo = document.getElementById("fotografia").value;
	var descripcion = document.getElementById("txt_descripcion").value;
	//alert('Nomb: ' + nombre + ' / Des: ' + descripcion + ' / Arch: ' + archivo);
	
	if(archivo!="" && nombre!="" && descripcion!=""){
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