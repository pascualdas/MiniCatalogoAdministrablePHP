// ###################################################################
// Confirmación para salir del sistema
// ###################################################################
function confirmarSalir(){
	var agree=confirm("¿Realmente desea Salir del sistema? ");
	if (agree){ 
		return true;
	}else{
		return false;
	}
}
// ###################################################################
// Mensaje de confirmación de procedimiento, envia a url
// ###################################################################
function rtaProcedimiento(mensaje, url){
	
	if(confirm(mensaje)){
		window.location=url;
	}else{
		window.location=url;
	}	
}
// ###################################################################
// Confirmación para eliminar un registro
// ###################################################################
function confirmaEliminar(mensaje){
	
	var agree=confirm(mensaje);
	
	if (agree){ 
		return true;
	}else{
		return false;
	}
}
// ###################################################################
// Validaciones para el formulario de registro de la tabla vereda
// ###################################################################
function validaRegistroVereda(){
		
		if($('#cmbDepartamento').val()==0){
			alert('Seleccione un departamento y un municipio');
			$('#cmbDepartamento').focus();
			return false;
		}else if($('#cmbMunicipio').val()==0){
			alert('Seleccione un municipio');
			$('#cmbMunicipio').focus();
			return false;
		}else if($('#txt_vereda').val()===''){
			alert('Digite nombre de la vereda');
			$('#txt_vereda').focus();
			return false;
		}else{
			alert($('#txt_vereda').length());
			return true;
		}
		
}
// ###################################################################
// Funcion para cargue de combo municipios dependiente de departamento
// ###################################################################	
	$(document).ready(function(){
	  
		$("#cmbDepartamento").change(function(){
			//alert('Mensaje: '+$("#cmbDepartamento").val());
			if($("#cmbDepartamento").val()>0){
				
				$.ajax({
				  url:"../controllers/controladorVereda.php",
				  type: "POST",
				  data:"op=buscarMunicipios&dpto="+$("#cmbDepartamento").val(),
				  success: function(opciones){
					 //alert('HTML: '+opciones);
					 $("#divMunicipios").html(opciones);
				  }
				})
				
			}else{
				//alert('Seleccione un Departamento');
				return false;
			}
		});
		
		$("#cmbMunicipio").change(function(){
			//alert('Mensaje: '+$("#cmbDepartamento").val());
			if($("#cmbMunicipio").val()>0){
				
				$.ajax({
				  url:"../controllers/controladorVereda.php",
				  type: "POST",
				  data:"op=buscarVeredas&mcpio="+$("#cmbMunicipio").val(),
				  success: function(opciones){
					 //alert('HTML: '+opciones);
					 $("#divVeredas").html(opciones);
				  }
				})
				
			}else{
				//alert('Seleccione una vereda');
				return false;
			}
		});
		
		$("#cmbVereda").change(function(){
			//alert('Mensaje: '+$("#cmbVereda").val());
			if($("#cmbVereda").val()>0){
				
				$.ajax({
				  url:"../controllers/controladorFinca.php",
				  type: "POST",
				  data:"op=buscarFincas&vereda="+$("#cmbVereda").val(),
				  success: function(opciones){
					 //alert('HTML: '+opciones);
					 $("#divFincas").html(opciones);
				  }
				})
				
			}else{
				//alert('Seleccione una vereda');
				return false;
			}
		});
});
// ###################################################################
// Agregar url buscar visitas
// ###################################################################
function agregarUrlDpto(url){
	
	alert('Agregarndo Departamento');
	
	if($("#cmbDepartamentovisitas").val()>0){
		url = url+"&dpto="+$("#cmbDepartamentovisitas").val();
	}
	window.location = url;
}
// ###################################################################
function agregarUrlMun(url){
	
	alert('Agregarndo Municipio');
	
	if($("#cmbMunicipiovisitas").val()>0){
		url = url+"&mun="+$("#cmbMunicipiovisitas").val();
	}
	window.location = url;
}
// ###################################################################
function agregarUrlVer(url){
	
	alert('Agregarndo Vereda');
	
	if($("#cmbVeredavisitas").val()>0){
		url = url+"&ver="+$("#cmbVeredavisitas").val();
	}
	window.location = url;
}
// ###################################################################
function agregarUrlFin(url){
	
	alert('Agregarndo Finca');
	
	if($("#cmbFincavisitas").val()>0){
		url = url+"&fin="+$("#cmbFincavisitas").val();
	}
	window.location = url;
}	
// ###################################################################
// Validaciones para el formulario de registro de la tabla funcionario
// ###################################################################
function validaRegistroFuncionario(){
		
		if($('#txt_cedula').val()===''){
			alert('Digite la cedula del funcionario');
			$('#txt_cedula').focus();
			return false;
		}else if($('#cmbRol').val()==0){
			alert('Seleccione un Rol');
			$('#cmbRol').focus();
			return false;
		}else if($('#txt_nombre').val()===''){
			alert('Digite el nombre del funcionario');
			$('#txt_nombre').focus();
			return false;
		}else if($('#txt_apellido').val()===''){
			alert('Digite el nombre del funcionario');
			$('#txt_apellido').focus();
			return false;
		}else if($('#txt_telefono').val()===''){
			alert('Digite el numero del telefono');
			$('#txt_telefono').focus();
			return false;
		}else if($('#txt_usuario').val()===''){
			alert('Digite nombre de usuario');
			$('#txt_usuario').focus();
			return false;
		}else if($('#txt_clave1').val()===''){
			alert('Digite clave de usuario');
			$('#txt_clave1').focus();
			return false;
		}else if($('#txt_clave2').val()===''){
			alert('Digite clave de usuario');
			$('#txt_clave2').focus();
			return false;
		}else if($('#txt_clave1').val()!=$('#txt_clave2').val()){
			alert('Las contraseñas no coinciden');
			$('#txt_clave1').focus();
			return false;
		}else{
			return true;
		}
		
}
// ###################################################################
// Validaciones para el formulario de registro de la tabla Incidencia
// ###################################################################
function validaRegistroIncidencia(){
	
	if($('#txt_incidencia').val()===''){
		alert('Digite nombre de la incidencia');
		$('#txt_incidencia').focus();
		return false;
	}else if($('#txt_fev').val()===''){
		alert('Digite FEV incidencia');
		$('#txt_fev').focus();
		return false;
	}else{
		return true;
	}
}
// ###################################################################
// Validaciones para el formulario de registro de la tabla Funcionario
// ###################################################################
function validaRegistroFuncionario(){
	
	if($('#txt_cedula').val()===''){
		alert('Digite el numero de cedula del propietario');
		$('#txt_cedula').focus();
		return false;
	}else if($('#txt_nombre').val()===''){
		alert('Digite el nombre del propietario');
		$('#txt_nombre').focus();
		return false;
	}else if($('#txt_apellido').val()===''){
		alert('Digite el apellido del propietario');
		$('#txt_apellido').focus();
		return false;
	}else if($('#txt_telefono').val()===''){
		alert('Digite el telefono del propietario');
		$('#txt_telefono').focus();
		return false;
	}else{
		return true;
	}
}
// ###################################################################
// Validaciones para el formulario de registro finca
// ###################################################################
	function validaRegistroFinca(){
						
			if($('#txt_nombre').val()===''){
				alert('Digite nombre de la Finca');
				$('#txt_nombre').focus();
				return false;
			}else if($('#cmbVereda').val()==0 || $('#cmbVereda').val()==""){
				alert('Seleccione una vereda');
				$('#cmbVereda').focus();
				return false;
			}else if($('#txt_asnm').val()===''){
				alert('Digite Altura sobre el nivel del mar.');
				$('#txt_asnm').focus();
				return false;
			}else if($('#txt_cacao').val()===''){
				alert('Digite # Hectareas en cacao.');
				$('#txt_cacao').focus();
				return false;
			}else if($('#txt_geon').val()===''){
				alert('Digite coordenadas GEON');
				$('#txt_geon').focus();
				return false;
			}else if($('#txt_geow').val()===''){
				alert('Digite coordenadas GEOW');
				$('#txt_geow').focus();
				return false;
			}else{
				return true;
			}
	}
// ###################################################################
// Validaciones para el formulario de registro finca
// ###################################################################
function validaRegistroPropietarioFinca(){
		if($('#cmbPropietarioFinca').val()==0){
			alert('Seleccione un propietario a agregar');
			$('#cmbPropietarioFinca').focus();
			return false;
		}else{
			return true;
		}
}
// ###################################################################
// Validaciones para el formulario de registro finca
// ###################################################################
function validaRegistroIncidenciaVisita(){
		
		if($('#cmbIncidenciaVisita').val()==0){
			alert('Seleccione una incidencia');
			$('#cmbIncidenciaVisita').focus();
			return false;
		}else if($('#txt_valor').val()==''){
			alert('Seleccione valor de la incidencia');
			$('#txt_valor').focus();
			return false;
		}else{
			return true;
		}
}
// ###################################################################
// Validaciones para el formulario de registro visita
// ###################################################################
function validaRegistroVisita(){
		
	if($('#txt_fecha').val()===''){
		alert('Digite la fecha de la visita.');
		$('#txt_fecha').focus();
		return false;
	}else if($('#txt_observaciones').val()===''){
		alert('Escriba las observaciones de la visita.');
		$('#txt_observaciones').focus();
		return false;
	}else if($('#cmbFinca').val()==0){
		alert('Seleccione una finca.');
		$('#cmbFinca').focus();
		return false;
	}else if($('#cmbFuncionario').val()==0){
		alert('Seleccione un funcionario.');
		$('#cmbFuncionario').focus();
		return false;
	}else{
		return true;
	}
}

function listarVisitasFinca(url){
	
	if($('#cmbDepartamento').val()!='0' || $('#cmbDepartamento').val()!=''){
		url = url + '&dpto=' + $('#cmbDepartamento').val();
	}
	
	if($('#cmbFinca').val()!='0' || $('#cmbFinca').val()!=''){
		url = url + '&fin=' + $('#cmbFinca').val();
	}
	//alert(url);
	
	window.location = url
	
}
