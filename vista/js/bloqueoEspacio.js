function decode_utf8(s) {
  return decodeURIComponent(escape(s));
}

$(function () {
  $('.tooltipObsrv').tooltip()
})

$("#espacioBloqEsp").select2({
    placeholder: "Selecciona una opción",
    templateResult: function(data) { 
        var r = data.text.split(' '); 
        var clase = '';
        if(r[1] == 'LIBRE'){
            clase = 'edoLibre';
        }else if(r[1] == 'OCUPADO'){
            clase = 'edoOcupado';
        }else if(r[1] == 'BLOQUEADO'){
            clase = 'edoBloqueado';
        }
        var $result = $('<div class="row">'+'<div class="col-6 col-sm-4 col-md-7">'+r[0]+'</div>'+'<div class="col-4 col-sm-4 col-md-3 '+clase+'">'+r[1]+'</div>'+'</div>');
        return $result;
    } 
});

function resetBusqueda(){
    $("#tipoPlatBloqEsp").val();
    $("#plataformaBloqEsp").empty();
    $("#areaBloqEsp").empty();
    $("#ejexBloqEsp").empty();
    $("#ejeyBloqEsp").empty();
    $("#espacioBloqEsp").val();
    document.getElementById('estadoBloqEsp').innerHTML='';
    $("#tipoEspacioBloqEsp").val();
    $("#bodyHistorialBloq").empty();
}

function buscaPlataforma(valor){
    $("#plataformaBloqEsp").val();
    $("#areaBloqEsp").empty();
    $("#ejexBloqEsp").empty();
    $("#ejeyBloqEsp").empty();
    $("#espacioBloqEsp").empty();
    $("#tipoEspacioBloqEsp").val();
    $("#bodyHistorialBloq").empty();
    document.getElementById('estadoBloqEsp').innerHTML='';
    $.ajax({
        type: 'GET',
        url: 'extensiones/captcha/buscaPlataforma.php',
        dataType: 'text',
        data: { 'value' : valor },
        success : function(respuesta){
            $("#plataformaBloqEsp").html(decode_utf8(respuesta));
        }
    });
}

function buscaArea(valor){
	var camposanto = $("#camposantoBloqEsp").val();
    $.ajax({
        type: 'GET',
        url: 'extensiones/captcha/buscaArea.php',
        dataType: 'text',
        data: { 'value' : valor },
        success : function(respuesta){
            $("#areaBloqEsp").html(respuesta);
        }
    });
    $.ajax({
        type: 'POST',
        url: 'ajax/bloqueoEspacio.ajax.php',
        dataType: 'text',
        data: { 'value' : valor, 'camposanto' : camposanto, 'entrada' : 'flgNicho' },
        success : function(respuesta){
            $("#flg_nicho").val(respuesta);
        }
    });
}

function buscaEjex(valor){
    var plat = document.getElementById("plataformaBloqEsp").value;
    var campo = document.getElementById("camposantoBloqEsp").value;
    $.ajax({
        type: 'GET',
        url: 'extensiones/captcha/buscaEjex.php',
        dataType: 'text',
        data: { 'value' : valor, 'plat' : plat, 'campo' : campo },
        success : function(respuesta){
            $("#ejexBloqEsp").html(respuesta);
        }
    });
}

function buscaEjey(valor){
    var plat = document.getElementById("plataformaBloqEsp").value;
    var campo = document.getElementById("camposantoBloqEsp").value;
    var area = document.getElementById("areaBloqEsp").value;
    $.ajax({
        type: 'GET',
        url: 'extensiones/captcha/buscaEjey.php',
        dataType: 'text',
        data: { 'value' : valor, 'plat' : plat, 'campo' : campo, 'area' : area },
        success : function(respuesta){
            $("#ejeyBloqEsp").html(respuesta);
        }
    });
}

function buscaEspacio(valor){
    var plat = document.getElementById("plataformaBloqEsp").value;
    var campo = document.getElementById("camposantoBloqEsp").value;
    var area = document.getElementById("areaBloqEsp").value;
    var ejex = document.getElementById("ejexBloqEsp").value;
    $.ajax({
        type: 'POST',
        url: 'ajax/wizard.ajax.php',
        dataType: 'json',
        data:{'value' : valor, 'plat' : plat, 'campo' : campo, 'area' : area, 'ejex' : ejex, 'edoEspacio' : 'mostrar'},
        success : function(respuesta){
            //console.log('respuesta',respuesta);
            var edo = '';
            var texto = '"<option value = 0>Espacio.  </option>"';
            $.each(respuesta, function(key,value){
                if(value.cod_estado == 'E01'){
                    edo = 'LIBRE';
                }else if(value.cod_estado == 'E04'){
                    edo = 'BLOQUEADO';
                }else{
                    edo = 'OCUPADO';
                }
                texto += '<option value="'+value.cod_tipo_espacio+'/'+value.cod_estado+'/'+value.cod_espacio+'">'+value.cod_espacio+' '+edo+'</option>';
            });//each  
            $("#espacioBloqEsp").html(texto);              
        }//success
    });//ajax
}

function buscanomEspacio(valor){
    document.getElementById('estadoBloqEsp').innerHTML='';
    $.ajax({
        type: 'GET',
        url: 'extensiones/captcha/buscaNomEspacio.php',
        dataType: 'text',
        data: { 'value' : valor },
        success : function(respuesta){
            $("#tipoEspacioBloqEsp").val(respuesta);
        }
    });
    var aux = document.getElementById("espacioBloqEsp").value;
    var estado = aux.split("/")[1];
    if(estado == 'E01'){
        document.getElementById('estadoBloqEsp').innerHTML='LIBRE';
        document.getElementById("estadoBloqEsp").style.color = 'limegreen';
    }
    else if(estado == 'E04'){
        document.getElementById('estadoBloqEsp').innerHTML='BLOQUEADO';
        document.getElementById("estadoBloqEsp").style.color = 'gold';
    }
    else{
        document.getElementById('estadoBloqEsp').innerHTML='OCUPADO';
        document.getElementById("estadoBloqEsp").style.color = 'red';
    }
}

function creaTablaVendedor(tipo){
    $('#tablaVendedor').html('<div class="loader"></div>');
    $.ajax({
    	type: 'GET',
        url: 'extensiones/captcha/creaTablaVendedor.php',
        dataType: 'text',
        data: { 'tipo' : tipo },
        success : function(respuesta){
            // console.log(respuesta);
            $('#tablaVendedor').html('')
            $("#tablaVendedor").html(respuesta);
            $('#myTableVendedor').DataTable();
        }
    });
}

function nombreTrabajador(valor,campo){
	$("#codSolicitanteBloqEsp").val(valor);
	var ls_camposanto = $("#camposantoBloqEsp").val();
	var ls_plataforma = $("#plataformaBloqEsp").val();
	var ls_area = $("#areaBloqEsp").val();
	var ls_eje_horizontal = $("#ejexBloqEsp").val();
	var ls_eje_vertical = $("#ejeyBloqEsp").val();
	var ls_espacio = $("#espacioBloqEsp").val();
    $.ajax({
        type: 'GET',
        url: 'extensiones/captcha/buscaNombre.php',
        dataType: 'text',
        data: { 'value' : valor },
        success : function(respuesta){
            document.getElementById(campo).value = respuesta;
        }
    });//ajax nombre solicitante
    $.ajax({
        type: 'POST',
        url: 'ajax/bloqueoEspacio.ajax.php',
        dataType: 'text',
        data: { 'ls_camposanto' : ls_camposanto, 'ls_plataforma' : ls_plataforma, 'ls_area' : ls_area, 'ls_eje_horizontal' : ls_eje_horizontal, 'ls_eje_vertical' : ls_eje_vertical, 'ls_espacio' : ls_espacio, 'ls_solicitante' : valor, 'entrada' : 'cdtBloqueo' },
        success : function(li_ctd_bloqueos){
        	console.log('li_ctd_bloqueos',li_ctd_bloqueos);
        	$("#cdtBloqueo").val(li_ctd_bloqueos);
        }//success
    });//ajax ctd bloqueo
    $.ajax({
        type: 'POST',
        url: 'ajax/bloqueoEspacio.ajax.php',
        dataType: 'text',
        data: { 'ls_camposanto' : ls_camposanto, 'ls_plataforma' : ls_plataforma, 'ls_area' : ls_area, 'ls_eje_horizontal' : ls_eje_horizontal, 'ls_eje_vertical' : ls_eje_vertical, 'ls_espacio' : ls_espacio, 'ls_solicitante' : valor, 'entrada' : 'cdtEspacio' },
        success : function(li_ctd_espacios_mes){
        	console.log('li_ctd_espacios_mes',li_ctd_espacios_mes);
        	$("#cdtEspacioMes").val(li_ctd_espacios_mes);
        }//success
    });//ajax ctd bloqueo
}//nombreTrabajador

$("#tipoBloqueo").on('change', function(){
	var cod_tipo_bloqueo = $(this).val();
	$.ajax({
        type: 'POST',
        url: 'ajax/bloqueoEspacio.ajax.php',
        dataType: 'json',
        data: { 'codigo' : cod_tipo_bloqueo, 'entrada' : 'flgBloqueo' },
        success : function(respuesta){
        	$("#flg_bloqueo").val(respuesta['flg_bloqueo']);
        	$("#flg_desbloqueo").val(respuesta['flg_desbloqueo']);
        }
    });
});

$("#espacioBloqEsp").on('change', function(){
	var as_camposanto = $("#camposantoBloqEsp").val();
	var as_plataforma = $("#plataformaBloqEsp").val();
	var as_area = $("#areaBloqEsp").val();
	var as_eje_horizontal = $("#ejexBloqEsp").val();
	var as_eje_vertical = $("#ejeyBloqEsp").val();
	var aux = $(this).val();
	var as_espacio = aux.split("/")[2];
	var ls_bloqueo = $("#flg_bloqueo").val();
	var ls_desbloqueo = $("#flg_desbloqueo").val();
	$.ajax({
        type: 'POST',
        url: 'ajax/bloqueoEspacio.ajax.php',
        dataType: 'json',
        data: {'as_plataforma' : as_plataforma, 'as_camposanto' : as_camposanto, 'as_area' : as_area, 'as_eje_horizontal' : as_eje_horizontal, 'as_eje_vertical' : as_eje_vertical, 'as_espacio' : as_espacio, 'entrada' : 'flgLibre' },
        success : function(respuesta){
        	$("#tipo_espacioBloqEsp").val(respuesta['cod_tipo_espacio']);
        	$("#flg_libreBloqEsp").val(respuesta['flg_libre']);
        	$("#estado_espacioBloqEsp").val(respuesta['cod_estado']);
        	$.ajax({
		        type: 'POST',
		        url: 'ajax/bloqueoEspacio.ajax.php',
		        dataType: 'json',
		        data: {'ls_estado_espacio' : respuesta['cod_estado'], 'entrada' : 'flg_bloqueado' },
		        success : function(ls_flg_bloqueado){
		        	if (ls_flg_bloqueado == null || ls_flg_bloqueado == '') { ls_flg_bloqueado = 'NO';}
		        	$("#flg_bloqueado").val(ls_flg_bloqueado);
		        }//success
		    });//ajax flg flg_bloqueado
        }//success
    });//ajax flag libre
	$.ajax({
        type: 'POST',
        url: 'ajax/bloqueoEspacio.ajax.php',
        dataType: 'json',
        data: { 'as_camposanto' : as_camposanto, 'as_plataforma' : as_plataforma, 'as_area' : as_area, 'as_eje_horizontal' : as_eje_horizontal, 'as_eje_vertical' : as_eje_vertical, 'as_espacio' : as_espacio, 'entrada' : 'listaBloqueo' },
        success : function(respuesta){
            $("#bodyHistorialBloq").empty();
            var dscBloqueo = '';
			var solicitante = '';
            $.each(respuesta,function(index,value){
            	var check_activo = '';
				if(value['flg_activo'] == 'SI'){
					check_activo = "<i class='fa fa-check'></i>";
				}else{
					check_activo = '';
				}
            	$.ajax({
				    type: 'GET',
				    url: 'extensiones/captcha/buscaNombre.php',
				    dataType: 'text',
				    data: { 'value' : value['cod_trabajador'] },
				    success : function(solic){
				        solicitante = solic;
				        $.ajax({
					        type: 'GET',
					        url: 'ajax/bloqueoEspacio.ajax.php',
					        dataType: 'text',
					        data: { 'value' : value['cod_tipo_bloqueo'], 'entrada' : 'dscBloqueo' },
					        success : function(dscBloq){
					        	dscBloqueo = dscBloq;
						        fila = '<tr class="listaServicio inactivo" id="'+value['num_linea']+'">'+
			    					'<td class="text-center"><a href="#container" class="btn btn-metal m-btn m-btn--icon btn-sm m-btn--icon-only  m-btn--pill tooltipObsrv" data-placement="top" data-toggle="tooltip" data-container="body" title="'+decode_utf8(value['dsc_observacion'])+'"><i class="fa fa-eye"></i></a> '+value['fch_evento']+'</td>'+
			    					'<td class="text-left">'+dscBloqueo+'</td>'+
			    					'<td class="text-center">'+value['cod_usuario']+'</td>'+
			    					'<td class="text-center">'+solicitante+'</td>'+
			    					'<td class="text-center">'+check_activo+'</td>'+
			                        '<input type="hidden" id="flg_desbloqueo_'+value['num_linea']+'" value="'+value['flg_desbloqueo']+'">'+
			                        '<input type="hidden" id="flg_bloqueo_'+value['num_linea']+'" value="'+value['flg_bloqueo']+'">'+
			    				'</tr>';
			    				document.getElementById("bodyHistorialBloq").insertAdjacentHTML("beforeEnd" ,fila);
			    			}//success
			    		});//ajax tipo bloqueo
				    }//success
				});//ajax nombre
    		});//each
        }//success
    });//ajax
    $.ajax({
        type: 'POST',
        url: 'ajax/bloqueoEspacio.ajax.php',
        dataType: 'json',
        data: { 'ls_camposanto' : as_camposanto, 'ls_plataforma' : as_plataforma, 'ls_area' : as_area, 'ls_eje_horizontal' : as_eje_horizontal, 'ls_eje_vertical' : as_eje_vertical, 'ls_espacio' : as_espacio, 'ls_bloqueo' : ls_bloqueo, 'ls_desbloqueo' : ls_desbloqueo, 'entrada' : 'existeBloqueo' },
        success : function(li_existe_evento){
        	$("#existeEvento").val(li_existe_evento);
        }//success
    }); //ajax existe evento
    $.ajax({
        type: 'POST',
        url: 'ajax/bloqueoEspacio.ajax.php',
        dataType: 'json',
        data: { 'ls_camposanto' : as_camposanto, 'ls_plataforma' : as_plataforma, 'ls_area' : as_area, 'ls_eje_horizontal' : as_eje_horizontal, 'ls_eje_vertical' : as_eje_vertical, 'ls_espacio' : as_espacio, 'ls_bloqueo' : ls_bloqueo, 'ls_desbloqueo' : ls_desbloqueo, 'entrada' : 'existeEventoBloqueo' },
        success : function(li_existe_evento_bloqueo){
        	$("#existeEventoBloqueo").val(li_existe_evento_bloqueo);
        	if(li_existe_evento_bloqueo > 0){
        		 $.ajax({
			        type: 'POST',
			        url: 'ajax/bloqueoEspacio.ajax.php',
			        dataType: 'json',
			        data: { 'ls_camposanto' : as_camposanto, 'ls_plataforma' : as_plataforma, 'ls_area' : as_area, 'ls_eje_horizontal' : as_eje_horizontal, 'ls_eje_vertical' : as_eje_vertical, 'ls_espacio' : as_espacio, 'ls_bloqueo' : ls_bloqueo, 'ls_desbloqueo' : ls_desbloqueo, 'entrada' : 'flgBloqueoResolucion' },
			        success : function(ls_flg_bloqueo_resolucion){
			        	if (ls_flg_bloqueo_resolucion == null || ls_flg_bloqueo_resolucion == '') { ls_flg_bloqueo_resolucion = 'NO';}
			        	$("#flg_bloqueo_resolucion").val(ls_flg_bloqueo_resolucion);
			        }//success
			    });//ajax flg_bloqueo_resolucion
        	}
        }//success
    }); //ajax existe evento
});

function btnGuardarBloqueo(){

	var ls_camposanto = $("#camposantoBloqEsp").val();
	var ls_plataforma = $("#plataformaBloqEsp").val();
	var ls_area = $("#areaBloqEsp").val();
	var ls_eje_horizontal = $("#ejexBloqEsp").val();
	var ls_eje_vertical = $("#ejeyBloqEsp").val();
	var aux = $("#espacioBloqEsp").val();
	var ls_espacio = aux.split("/")[2];
	var ls_tipo_bloqueo = $("#tipoBloqueo").val();
	var ls_dsc_observacion = $("#obsvBloqEsp").val();
	var ls_solicitante = $("#codSolicitanteBloqEsp").val();
	var ii_max_bloqueo = 2;
	var ii_ctd_espacios_max = 2;
	var ii_existe = 1;

	// ldt_fch_evento = f_fecha()
	// ldt_fch_evento_date = Datetime(Date(ldt_fch_evento))
	// li_mes = Month(Date(ldt_fch_evento_date))
	// li_anno = Year(Date(ldt_fch_evento_date))
	var ls_flg_bloqueo_resolucion = 'NO';

	if(ls_camposanto == null || ls_camposanto == ''){
        swal({
            title: "",
            text: "Debe seleccionar el camposanto",
            type: "warning",
            confirmButtonText: "Aceptar",
        })
        $("#camposantoBloqEsp").focus();
       return;
    }
	
	if(ls_plataforma == null || ls_plataforma == ''){
        swal({
            title: "",
            text: "Debe seleccionar la plataforma",
            type: "warning",
            confirmButtonText: "Aceptar",
        })
        $("#plataformaBloqEsp").focus();
       return;
    }

	if(ls_area == null || ls_area == ''){
        swal({
            title: "",
            text: "Debe seleccionar el área de la plataforma",
            type: "warning",
            confirmButtonText: "Aceptar",
        })
        $("#areaBloqEsp").focus();
       return;
    }

	if(ls_eje_horizontal == null || ls_eje_horizontal == ''){
        swal({
            title: "",
            text: "Debe seleccionar el eje horizontal",
            type: "warning",
            confirmButtonText: "Aceptar",
        })
        $("#ejexBloqEsp").focus();
       return;
    }

	if(ls_eje_vertical == null || ls_eje_vertical == ''){
        swal({
            title: "",
            text: "Debe seleccionar el eje vertical",
            type: "warning",
            confirmButtonText: "Aceptar",
        })
        $("#ejeyBloqEsp").focus();
       return;
    }

	// -- Valida si es plataforma -- //

	var ls_flg_nicho = $("#flg_nicho").val();

	if(ls_flg_nicho == null || ls_flg_nicho == ''){ ls_flg_nicho = 'NO';}

	if( ls_flg_nicho == 'NO'){
		if(ls_espacio == null || ls_espacio == ''){
	        swal({
	            title: "",
	            text: "Debe seleccionar el espacio",
	            type: "warning",
	            confirmButtonText: "Aceptar",
	        })
	        $("#espacioBloqEsp").focus();
	       return;
	    }
	}else{	
		ls_espacio = '01';
	}

	if(ls_tipo_bloqueo == null || ls_tipo_bloqueo == ''){
        swal({
            title: "",
            text: "Debe seleccionar el tipo de bloqueo",
            type: "warning",
            confirmButtonText: "Aceptar",
        })
        $("#tipoBloqueo").focus();
       return;
    }

    if(ls_solicitante == null || ls_solicitante == ''){
        swal({
            title: "",
            text: "Debe ingresar al solicitante",
            type: "warning",
            confirmButtonText: "Aceptar",
        })
        $("#codSolicitanteBloqEsp").focus();
       return;
    }

	if(ls_dsc_observacion == null || ls_dsc_observacion == ''){
        swal({
            title: "",
            text: "Debe ingresar una observación",
            type: "warning",
            confirmButtonText: "Aceptar",
        })
        $("#obsvBloqEsp").focus();
       return;
    }

	// -- Flag del tipo de bloqueo seleccionado -- //

	var ls_bloqueo = $("#flg_bloqueo").val();
	var ls_desbloqueo = $("#flg_desbloqueo").val();

	// -- Obtiene el tipo de espacio y flag del estado si es libre del Espacio -- //

	var ls_tipo_espacio = $("#tipo_espacioBloqEsp").val();
	var ls_flg_libre = $("#flg_libreBloqEsp").val();
	var ls_estado_espacio = $("#estado_espacioBloqEsp").val();

	// -- Existe -- // 

	if (ls_tipo_espacio == null || ls_tipo_espacio == ''){
		swal({
            title: "",
            text: "El espacio ingresado no existe",
            type: "warning",
            confirmButtonText: "Aceptar",
        })
       return;		
	}

	// -- CONTROL DE BLOQUEOS POR MES -- //

	var li_ctd_bloqueos = 0;
	var li_ctd_espacios_mes = 0;

	// -- Bloqueos -- //

	li_ctd_bloqueos = $("#cdtBloqueo").val();
	if (li_ctd_bloqueos == null || li_ctd_bloqueos == '') { li_ctd_bloqueos = 0;}

	if (ls_bloqueo == 'SI'){
		if(li_ctd_bloqueos >= ii_max_bloqueo){
			swal({
	            title: "",
	            text: "El solicitate no puede bloquear mas de "+ii_max_bloqueo+" veces dentro de un mismo mes",
	            type: "warning",
	            confirmButtonText: "Aceptar",
	        })
	       return;	
	    }	//if(li_ctd_bloqueos >= ii_max_bloqueo)
	}//if (ls_bloqueo == 'SI')

	// -- Espacios en el mes -- //

	li_ctd_espacios_mes = $("#cdtEspacioMes").val();

	if (li_ctd_espacios_mes == null || li_ctd_espacios_mes == '') { li_ctd_espacios_mes = 0;}

	if (ls_bloqueo == 'SI'){
		if(li_ctd_espacios_mes >= ii_ctd_espacios_max){
			swal({
	            title: "",
	            text: "El solicitate no puede bloquear mas de "+ii_ctd_espacios_max+" espacios dentro de un mismo mes",
	            type: "warning",
	            confirmButtonText: "Aceptar",
	        })
	       return;	
	    }	//if(li_ctd_espacios_mes >= ii_ctd_espacios_max)
	}//if (ls_bloqueo == 'SI')	

	// -- Valida la existencia de un bloqueo -- //

	li_existe_evento = $("#existeEvento").val();

	if (li_existe_evento == null || li_existe_evento == '') { li_existe_evento = 0;}

	// -- Valida la existencia de un bloqueo -- //

	if (li_existe_evento > 0){
		if(ls_bloqueo == 'SI'){
			swal({
	            title: "",
	            text: "El espacio ya se encuentra bloqueado, por favor revise la sección 'Historial'",
	            type: "warning",
	            confirmButtonText: "Aceptar",
	        })
	       return;	
	    }else if(ls_desbloqueo == 'SI'){
	    	swal({
	            title: "",
	            text: "El espacio ya se encuentra desbloqueado, por favor revise la sección 'Historial'",
	            type: "warning",
	            confirmButtonText: "Aceptar",
	        })
	       return;
	    }
	}//if (li_existe_evento > 0)

	// -- Para Desbloquear el espacio debe estar bloqueado -- //

	li_existe_evento = 0;

	li_existe_evento = $("#existeEventoBloqueo").val();

	if(li_existe_evento == null || li_existe_evento == '') { li_existe_evento = 0;}

	// -- Si existe bloqueo -- //

	if (li_existe_evento > 0) {

		ls_flg_bloqueo_resolucion = $("#flg_bloqueo_resolucion").val();
		
	}

	// -- Se registra un desloqueo -- //

	if (ls_desbloqueo == 'SI')  {
		
		// -- Flag de estado bloqueado -- //

		var ls_flg_bloqueado = $("#flg_bloqueado").val();
		
		// -- Sino existe un bloqueo -- //
		
		if (li_existe_evento < 1 && ls_flg_bloqueado == 'NO') {  

			swal({
	            title: "",
	            text: "No puede registrar un desbloqueo cuando el espacio NO esta bloqueado.",
	            type: "warning",
	            confirmButtonText: "Aceptar",
	        })
	       return;
		
		}

	}

	// -- Valida que el espacio sea libre -- //

	if (ls_flg_libre == 'NO') {
		
		if (ls_bloqueo == 'SI') {

			swal({
	            title: "",
	            text: "El estado del espacio no es libre, NO puede bloquear el espacio.",
	            type: "warning",
	            confirmButtonText: "Aceptar",
	        })
	       return;

		}
		
	}

	// -- Resolución -- //

	if (ls_flg_bloqueo_resolucion == 'SI') {
		
		if (ii_existe <= 0) {

			swal({
	            title: "",
	            text: "No cuenta con los accesos necesarios para desbloquear el espacio seleccionado, fue bloqueado por 'RESOLUCIÓN INVERSIONES MUYA'. Por favor verifique.",
	            type: "warning",
	            confirmButtonText: "Aceptar",
	        })
	       return;

		}
		
	}

	// -- Confirmar -- //

	var mensaje = '';

	if (ls_desbloqueo == 'SI') {
		mensaje = "Esta DESBLOQUEANDO el espacio seleccionado. ¿Esta seguro de continuar?";
	}else{
		mensaje = "Esta BLOQUEANDO el espacio seleccionado. ¿Esta seguro de continuar?";
	}

	swal({
        title: "",
        text: mensaje,
        type: "question",
        confirmButtonText: "Aceptar",
        showCancelButton: true,
        cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
       ejecutaBloqueo(ls_camposanto,ls_plataforma,ls_area,ls_eje_horizontal,ls_eje_vertical,ls_espacio,ls_tipo_espacio,ls_tipo_bloqueo,ls_solicitante,ls_bloqueo,ls_desbloqueo,ls_dsc_observacion);
      } else if (
        result.dismiss === Swal.DismissReason.cancel
      ) {
        return;
      }
    })
}

function ejecutaBloqueo(ls_camposanto,ls_plataforma,ls_area,ls_eje_horizontal,ls_eje_vertical,ls_espacio,ls_tipo_espacio,ls_tipo_bloqueo, ls_solicitante,ls_bloqueo,ls_desbloqueo,ls_dsc_observacion){

	$.ajax({
        type: 'POST',
        url: 'ajax/bloqueoEspacio.ajax.php',
        dataType: 'text',
        data: { 'ls_camposanto' : ls_camposanto, 'ls_plataforma' : ls_plataforma, 'ls_area' : ls_area, 'ls_eje_horizontal' : ls_eje_horizontal, 'ls_eje_vertical' : ls_eje_vertical, 'ls_espacio' : ls_espacio, 'ls_tipo_bloqueo' : ls_tipo_bloqueo, 'ls_solicitante' : ls_solicitante, 'ls_bloqueo' : ls_bloqueo, 'ls_desbloqueo' : ls_desbloqueo, 'ls_dsc_observacion' : ls_dsc_observacion, 'ls_tipo_espacio' : ls_tipo_espacio, 'entrada' : 'ejecutaBloqueo' },
        success : function(respuesta){
        	console.log('respuesta',respuesta);

			if (ls_desbloqueo == 'SI') {
				mensaje = "se ha DESBLOQUEANDO el espacio con exito.";
			}else{
				mensaje = "se ha BLOQUEANDO el espacio con exito.";
			}
        	if(respuesta == 1){
        		swal({
		            title: "",
		            text: mensaje,
		            type: "success",
		            confirmButtonText: "Aceptar",
		            onAfterClose: window.location.assign('bloqueoEspacio')
		        })
        	}else{
                swal({
                    title: "",
                    text: "Ha ocurrido un´problema, por favor vuelva a intentar.",
                    type: "error",
                    confirmButtonText: "Aceptar",
                    onAfterClose: window.location.assign('bloqueoEspacio')
                })
            }

        }//success
    });//ajax flg_bloqueo_resolucion

}