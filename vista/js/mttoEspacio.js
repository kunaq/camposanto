$('#tablaMttoEsp').DataTable();

function decode_utf8(s) {
  return decodeURIComponent(escape(s));
}

function buscaPlataforma(valor){
	$("#plataformaMttoEsp").val();
	$("#areaMttoEsp").empty();
	$("#ejexMttoEsp").empty();
	$("#ejexMttoEsp").empty();
	$("#espacioMttoEsp").empty();
    $.ajax({
        type: 'GET',
        url: 'extensiones/captcha/buscaPlataforma.php',
        dataType: 'text',
        data: { 'value' : valor },
        success : function(respuesta){
            $("#plataformaMttoEsp").html(decode_utf8(respuesta));
        }
    });
}
function buscaArea(valor){
	var camposanto = $("#camposantoMttoEsp").val();
    $.ajax({
        type: 'GET',
        url: 'extensiones/captcha/buscaArea.php',
        dataType: 'text',
        data: { 'value' : valor },
        success : function(respuesta){
            $("#areaMttoEsp").html(respuesta);
        }
    });
}

function buscaEjex(valor){
    var plat = document.getElementById("plataformaMttoEsp").value;
    var campo = document.getElementById("camposantoMttoEsp").value;
    $.ajax({
        type: 'GET',
        url: 'extensiones/captcha/buscaEjex.php',
        dataType: 'text',
        data: { 'value' : valor, 'plat' : plat, 'campo' : campo },
        success : function(respuesta){
            $("#ejexMttoEsp").html(respuesta);
        }
    });
}

function buscaEjey(valor){
    var plat = document.getElementById("plataformaMttoEsp").value;
    var campo = document.getElementById("camposantoMttoEsp").value;
    var area = document.getElementById("areaMttoEsp").value;
    $.ajax({
        type: 'GET',
        url: 'extensiones/captcha/buscaEjey.php',
        dataType: 'text',
        data: { 'value' : valor, 'plat' : plat, 'campo' : campo, 'area' : area },
        success : function(respuesta){
            $("#ejeyMttoEsp").html(respuesta);
        }
    });
}

function buscaEspacio(valor){
    var plat = document.getElementById("plataformaMttoEsp").value;
    var campo = document.getElementById("camposantoMttoEsp").value;
    var area = document.getElementById("areaMttoEsp").value;
    var ejex = document.getElementById("ejexMttoEsp").value;
    $.ajax({
        type: 'POST',
        url: 'ajax/wizard.ajax.php',
        dataType: 'json',
        data:{'value' : valor, 'plat' : plat, 'campo' : campo, 'area' : area, 'ejex' : ejex, 'edoEspacio' : 'mostrar'},
        success : function(respuesta){
            var texto = '"<option value = 0>Espacio.  </option>"';
            $.each(respuesta, function(key,value){
                texto += '<option value="'+value.cod_espacio+'">'+value.cod_espacio+'</option>';
            });//each  
            $("#espacioMttoEsp").html(texto);              
        }//success
    });//ajax
}

$("#btnBuscarMttoEsp").on('click', function (){
	var ls_camposanto = $("#camposantoMttoEsp").val();
	var ls_tipo_plataforma = $("#tipoPlatBloqEsp").val();
	var ls_plataforma = $("#plataformaMttoEsp").val();
	var ls_area = $("#areaMttoEsp").val();
	var ls_eje_horizontal = $("#ejexMttoEsp").val();
	var ls_eje_vertical = $("#ejeyMttoEsp").val();
	var ls_espacio = $("#espacioMttoEsp").val();
	var fila = '';
	$(".loader").fadeIn("slow");
	$("#bodyMttoEsp").empty();
	$.ajax({
	    type: 'POST',
	    url: 'ajax/mttoEspacio.ajax.php',
	    dataType: 'json',
	    data: {'entrada' : 'selectTipoEsp'},
	    success : function(selectTipoEsp){
			$.ajax({
			    type: 'POST',
			    url: 'ajax/mttoEspacio.ajax.php',
			    dataType: 'json',
			    data: {'entrada' : 'selectEstado'},
			    success : function(selectEstado){
					$.ajax({
					    type: 'POST',
					    url: 'ajax/mttoEspacio.ajax.php',
					    dataType: 'json',
					    data: {'ls_camposanto' : ls_camposanto,'ls_plataforma' : ls_plataforma, 'ls_tipo_plataforma' : ls_tipo_plataforma, 'ls_area' : ls_area,'ls_eje_horizontal' : ls_eje_horizontal,'ls_eje_vertical' : ls_eje_vertical,'ls_espacio' : ls_espacio,'entrada' : 'listaMtto'},
					    success : function(respuesta){
					    	console.log(respuesta);
					    	var color = '';
					    	var disable = '';
					    	$.each(respuesta,function(index,value){
					    		if(value['flg_libre'] == 'SI'){
						    		color = 'black';
						    		disable = '';
						    	}else{
						    		color = 'blue';
						    		disable = 'disabled';
						    	}
					    		espacio = value['cod_plataforma'] + value['cod_eje_horizontal'] + '-' + value['cod_eje_vertical'] + '-' + value['cod_espacio'] + '-' + value['cod_tipo_espacio'];
					    		selectTipo = '<select class="form-control form-control-sm m-input" name="tipoEspacio_'+espacio+'" id="tipoEspacio_'+espacio+'" style="color:'+color+'" '+disable+' onchange="cambiaEspacio(this.id)"></select>';
					    		selectEstadoEsp = '<select class="form-control form-control-sm m-input" name="edoEspacio_'+espacio+'" id="edoEspacio_'+espacio+'" style="color:'+color+'" '+disable+' onchange="flgUpdate(this.id)"></select>';
						    	fila = '<tr name="'+espacio+'" style="color:'+color+'">'+ 
											'<td>'+decode_utf8(value['dsc_plataforma'])+'</td>'+
											'<td>'+decode_utf8(value['dsc_area'])+'</td>'+
											'<td>'+value['cod_eje_horizontal']+'</td>'+
											'<td>'+value['cod_eje_vertical']+'</td>'+
											'<td>'+value['cod_espacio']+'</td>'+
											'<td>'+selectTipo+'</td>'+
											'<td id="verEspacio_'+espacio+'">'+espacio+'</td>'+
											'<td>'+selectEstadoEsp+'</td>'+
											'<input type="hidden" id="num_niveles_'+espacio+'" value="'+value['num_niveles']+'">'+
											'<input type="hidden" id="num_niveleslibres_'+espacio+'" value="'+value['num_niveleslibres']+'">'+
											'<input type="hidden" id="num_columna_'+espacio+'" value="'+value['num_columna']+'">'+
											'<input type="hidden" id="num_fila_'+espacio+'" value="'+value['num_fila']+'">'+
											'<input type="hidden" id="flg_bloqueado_'+espacio+'" value="'+value['flg_bloqueado']+'">'+
											'<input type="hidden" id="flg_libre_aux_'+espacio+'" value="'+value['flg_libre']+'">'+
											'<input type="hidden" id="cod_tipo_espacio_aux_'+espacio+'" value="'+value['cod_tipo_espacio']+'">'+
											'<input type="hidden" id="cod_estado_aux_'+espacio+'" value="'+value['cod_estado']+'">'+
											'<input type="hidden" id="nivelesOcupar_'+espacio+'">'+
											'<input type="hidden" id="flg_update_'+espacio+'">'+
											'<input type="hidden" id="flg_libre_'+espacio+'">'+
											'<input type="hidden" id="cod_camposanto_'+espacio+'" value="'+value['cod_camposanto']+'">'+
											'<input type="hidden" id="cod_plataforma_'+espacio+'" value="'+value['cod_plataforma']+'">'+
											'<input type="hidden" id="cod_area_plataforma_'+espacio+'" value="'+value['cod_area_plataforma']+'">'+
											'<input type="hidden" id="cod_eje_horizontal_'+espacio+'" value="'+value['cod_eje_horizontal']+'">'+
											'<input type="hidden" id="cod_eje_vertical_'+espacio+'" value="'+value['cod_eje_vertical']+'">'+
											'<input type="hidden" id="cod_espacio_'+espacio+'" value="'+value['cod_espacio']+'">'+
										'</tr>';
								document.getElementById("bodyMttoEsp").insertAdjacentHTML("beforeEnd" ,fila);
								$.each(selectTipoEsp,function(index,valor){
									var x = document.getElementById('tipoEspacio_'+espacio);
									var option = document.createElement("option");
									option.text = valor['dsc_tipo_espacio'];
									option.value = valor['cod_tipo_espacio'];
									x.add(option);
								});//each selectTipoEsp
								$('#tipoEspacio_'+espacio).val(value['cod_tipo_espacio']);
								$.each(selectEstado,function(index,valor2){
									var y = document.getElementById('edoEspacio_'+espacio);
									var option2 = document.createElement("option");
									option2.text = valor2['dsc_estado'];
									option2.value = valor2['cod_estado'];
									y.add(option2);
								});//each selectEstado
								$('#edoEspacio_'+espacio).val(value['cod_estado']);
								$(".loader").fadeOut("slow");
							});//each tabla
					    }//success
					});//ajax tabla
				}//success
			});//ajax selectEstado
		}//succes
	});//ajax selectTipoEsp
});

function cambiaEspacio(id){
	var valor = document.getElementById(id).value;
	var aux = id.split('-');
	var aux2 = aux[0].split('_');
	var id2 = aux2[1]+'-'+aux[1]+'-'+aux[2]+'-'+aux[3];
	var nuevoCod = aux2[1]+'-'+aux[1]+'-'+aux[2]+'-'+valor;
	var cod_tipo_espacio_aux = $("#cod_tipo_espacio_aux_"+id2).val();
	$("#nivelesOcupar_"+id2).val();
	document.getElementById("verEspacio_"+id2).innerText = nuevoCod;
	if (valor === cod_tipo_espacio_aux) {
		$("#flg_update_"+id2).val();
	}else{
		$("#flg_update_"+id2).val('SI');
	}
}

function resetBusqueda(){
	// document.getElementById("formMttoEsp").reset();
	$("#tipoPlatMttoEsp").val('');
	$("#plataformaMttoEsp").empty();
	$("#areaMttoEsp").empty();
	$("#ejexMttoEsp").empty();
	$("#ejexMttoEsp").empty();
	$("#espacioMttoEsp").empty();
	$("#bodyMttoEsp").empty();
}

function flgUpdate(id){
	var valor = document.getElementById(id).value;
	var aux = id.split('-');
	var aux2 = aux[0].split('_');
	var id2 = aux2[1]+'-'+aux[1]+'-'+aux[2]+'-'+aux[3];
	var cod_estado_aux = $("#cod_estado_aux_"+id2).val();
	$.ajax({
	    type: 'POST',
	    url: 'ajax/mttoEspacio.ajax.php',
	    dataType: 'json',
	    data: {'cod' : valor ,'entrada' : 'flgLibre'},
	    success : function(respuesta){
	    	console.log(respuesta[0]['flg_libre']);
	    	$("#flg_libre_"+id2).val(respuesta[0]['flg_libre']);
	    }
	});
	if (valor != cod_estado_aux) {
		$("#flg_update_"+id2).val('SI');
	}else{
		$("#flg_update_"+id2).val();
	}
}

function guardarMttoEsp(){
	var tablaMtto = document.getElementById('bodyMttoEsp');
	var ll_filas = tablaMtto.rows.length;
	var li_valida = 0;

	if( ll_filas < 1 ){
		swal({
            title: "Error",
            text: "No existen registros que actualizar.",
            type: "error",
            confirmButtonText: "Aceptar",
          });
        return;
	}

	var container = document.querySelector('#bodyMttoEsp');
	container.querySelectorAll('tr').forEach(function (li_i) 
	{
		var cod = $(li_i).attr("name");		
		ls_tipo = $("#cod_tipo_espacio_aux_"+cod).val();
		ls_estado = $("#edoEspacio_"+cod).val();
		
		if (ls_tipo == '' || ls_tipo == null) {
			swal({
	            title: "Error",
	            text: "Debe seleccionar el tipo de espacio.",
	            type: "error",
	            confirmButtonText: "Aceptar",
	          });
	        return;
		}

		if (ls_estado == '' || ls_estado == null) { 
			swal({
	            title: "Error",
	            text: "Debe seleccionar el estado del espacio.",
	            type: "error",
	            confirmButtonText: "Aceptar",
	          });
	        return;
		}	
	});

	// -- Update -- //

	var container = document.querySelector('#bodyMttoEsp');
	container.querySelectorAll('tr').forEach(function (li_i) 
	{

		var cod = $(li_i).attr("name");
		var ls_flg_update = $("#flg_update_"+cod).val();
		if (ls_flg_update == null || ls_flg_update == '') { ls_flg_update = 'NO';}
		
		if( ls_flg_update == 'SI') { li_valida = li_valida + 1}
		
	});

	if( li_valida <= 0 ){
		swal({
            title: "Error",
            text: "No hay espacios modificados por actualizar.",
            type: "error",
            confirmButtonText: "Aceptar",
        });
        return;
	}

	// -- Reconfirmar -- //
	swal({
        title: "",
        text: "Esta modificando el tipo de espacio de los espacios listados. ¿Está seguro de continuar?",
        type: "question",
        showCancelButton:!0,
        confirmButtonText: "Aceptar",
        cancelButtonText:"Cancelar"
    }).then(function(result){
        if (result.value) {
        	$(".loader").fadeIn("slow");

			// -- Borrar Detalle -- //

			var container = document.querySelector('#bodyMttoEsp');
			container.querySelectorAll('tr').forEach(function (li_i) 
			{
	
				var cod = $(li_i).attr("name");
				
				ls_flg_libre_aux = $("#flg_libre_aux_"+cod).val();
				ls_flg_update = $("#flg_update_"+cod).val();

				if (ls_flg_update == null || ls_flg_update == '') { ls_flg_update = 'NO';}
				if (ls_flg_libre_aux == null || ls_flg_libre_aux == '') { ls_flg_libre_aux = 'NO';}
				
				if (ls_flg_update == 'SI' && ls_flg_libre_aux == 'SI') {
					
					ls_camposanto   = $("#cod_camposanto_"+cod).val();
					ls_plataforma	= $("#cod_plataforma_"+cod).val();
					ls_area			= $("#cod_area_plataforma_"+cod).val();
					ls_eje_h		= $("#cod_eje_horizontal_"+cod).val();
					ls_eje_v		= $("#cod_eje_vertical_"+cod).val();
					ls_espacio		= $("#cod_espacio_"+cod).val();
					ls_estado 		= $("#edoEspacio_"+cod).val();
					ls_tipo_aux		= $("#tipoEspacio_"+cod).val();
					ls_tipo			= $("#cod_tipo_espacio_aux_"+cod).val();
					
					// -- Borrar Anterior -- // 
					$.ajax({
					    type: 'POST',
					    url: 'ajax/mttoEspacio.ajax.php',
					    dataType: 'json',
					    data: {'ls_camposanto' : ls_camposanto,'ls_plataforma' : ls_plataforma,'ls_area' : ls_area,'ls_eje_h' : ls_eje_h,'ls_eje_v' : ls_eje_v,'ls_espacio' : ls_espacio,'ls_tipo_aux' : ls_tipo_aux, 'entrada' : 'borrarAnterior'},
					    success : function(respuesta){
					    	console.log(respuesta);
					    }//succes
					});//ajax borrar
					
					// -- Seteo -- //
					
					$("#tipoEspacio_"+cod).val(ls_tipo).trigger('change');

					// -- Cabecera -- //

					$.ajax({
					    type: 'POST',
					    url: 'ajax/mttoEspacio.ajax.php',
					    dataType: 'json',
					    data: {'ls_camposanto' : ls_camposanto,'ls_plataforma' : ls_plataforma,'ls_area' : ls_area,'ls_eje_h' : ls_eje_h,'ls_eje_v' : ls_eje_v,'ls_espacio' : ls_espacio, 'ls_tipo_aux' : ls_tipo_aux, 'ls_estado' : ls_estado, 'entrada' : 'actualizaCabecera'},
					    success : function(respuesta){
					    	console.log(respuesta);
					    }//succes
					});//ajax insertaDet
					
				}
				
			});

			// -- Inserta Detalle -- //

			var container = document.querySelector('#bodyMttoEsp');
			container.querySelectorAll('tr').forEach(function (li_i) 
			{

				var cod = $(li_i).attr("name");
				
				ls_flg_libre_aux = $("#flg_libre_aux_"+cod).val();
				ls_flg_update = $("#flg_update_"+cod).val();
				
				if (ls_flg_update == null || ls_flg_update == '') { ls_flg_update = 'NO';}
				if (ls_flg_libre_aux == null || ls_flg_libre_aux == '') { ls_flg_libre_aux = 'NO';}
				
				if (ls_flg_update == 'SI' && ls_flg_libre_aux == 'SI') {
					
					ls_camposanto   = $("#cod_camposanto_"+cod).val();
					ls_plataforma	= $("#cod_plataforma_"+cod).val();
					ls_area			= $("#cod_area_plataforma_"+cod).val();
					ls_eje_h		= $("#cod_eje_horizontal_"+cod).val();
					ls_eje_v		= $("#cod_eje_vertical_"+cod).val();
					ls_espacio		= $("#cod_espacio_"+cod).val();
					ls_tipo			= $("#cod_tipo_espacio_aux_"+cod).val();

					$.ajax({
					    type: 'POST',
					    url: 'ajax/mttoEspacio.ajax.php',
					    dataType: 'json',
					    data: {'ls_camposanto' : ls_camposanto,'ls_plataforma' : ls_plataforma,'ls_area' : ls_area,'ls_eje_h' : ls_eje_h,'ls_eje_v' : ls_eje_v,'ls_espacio' : ls_espacio, 'ls_tipo' :ls_tipo, 'entrada' : 'insertaDet'},
					    success : function(respuesta){
					    	console.log(respuesta);
					    }//succes
					});//ajax insertaDet
					
				}
				
			});

			// -- Actualiza Espacios que esten vendidos -- //

			var container = document.querySelector('#bodyMttoEsp');
			container.querySelectorAll('tr').forEach(function (li_i) 
			{

				var cod = $(li_i).attr("name");
				
				ls_flg_libre = $("#flg_libre_"+cod).val();
				ls_flg_libre_aux = $("#flg_libre_aux_"+cod).val();
				ls_flg_update = $("#flg_update_"+cod).val();
				
				if (ls_flg_update == null || ls_flg_update == '') { ls_flg_update = 'NO';}
				if (ls_flg_libre_aux == null || ls_flg_libre_aux == '') { ls_flg_libre_aux = 'NO';}
				if (ls_flg_libre == null || ls_flg_libre == '') { ls_flg_libre = 'NO';}
				
				if (ls_flg_update == 'SI' && ls_flg_libre_aux == 'NO' && ls_flg_libre == 'SI') {
					
					ls_camposanto  = $("#cod_camposanto_"+cod).val();
					ls_plataforma  = $("#cod_plataforma_"+cod).val();
					ls_area		   = $("#cod_area_plataforma_"+cod).val();
					ls_eje_h	   = $("#cod_eje_horizontal_"+cod).val();
					ls_eje_v	   = $("#cod_eje_vertical_"+cod).val();
					ls_espacio	   = $("#cod_espacio_"+cod).val();
					ls_tipo		   = $("#cod_tipo_espacio_"+cod).val();
					ls_tipo_aux	   = $("#cod_tipo_espacio_aux_"+cod).val();
					
					// -- Ejecuta -- //

					$.ajax({
					    type: 'POST',
					    url: 'ajax/mttoEspacio.ajax.php',
					    dataType: 'json',
					    data: {'ls_camposanto' : ls_camposanto,'ls_plataforma' : ls_plataforma,'ls_area' : ls_area,'ls_eje_h' : ls_eje_h,'ls_eje_v' : ls_eje_v,'ls_espacio' : ls_espacio, 'ls_tipo' :ls_tipo, 'ls_tipo_aux' : ls_tipo_aux, 'entrada' : 'exeProcedure'},
					    success : function(respuesta){
					    	console.log(respuesta);
					    	$(".loader").fadeOut("slow");
					    	if(respuesta){
					    		swal({
						            title: "",
						            text: "sehan modificado los espacios con exito.",
						            type: "success",
						            confirmButtonText: "Aceptar",
						        });
						        return;
					    	}
					    }//succes
					});//ajax insertaDet					
				}
					 
			});
		}//if swal
    })//then 
} //function guardarMttoEsp