function getParameterByName() {
    var query = window.location.search.substring(1);
    if (query == "" ) {
    }else{
    	var pair = query.split("&");
    	var localidad = pair[0].split("=");
    	var contrato = pair[1].split("=");
    	$("#localidadCamTit").val(localidad[1]);
    	$("#codCtt").val(contrato[1]);
    }
}

$("#codCtt").change(function() {
	$("#tbodyServicios").empty();
	$("#tbodyRefinanciamiento").empty();
	var codCtt = $(this).val();
	var localidad = document.getElementById('localidadCamTit').value;
    $.ajax({
		type: 'POST',
        url:"ajax/cambioTitular.ajax.php",
        dataType: 'json',
        data: {'accion' : 'getServiciosCtt', 'cod_localidad' : localidad, 'cod_contrato' : codCtt},
        success: function(respuesta){
        	$.each(respuesta,function(index,value){
        		var filaServicio = "<tr onclick=mostrarServicio(this,'"+value['cod_localidad']+"','"+value['cod_contrato']+"','"+value['num_refinanciamiento']+"','"+value['num_servicio']+"','"+value['cod_tipo_ctt']+"','"+value['cod_tipo_programa']+"','"+value['cod_cliente']+"','"+value['cod_cliente_anterior']+"')>"+
        								"<td>"+value['num_servicio']+"</td>"+
        								"<td>"+value['dsc_tipo_servicio']+"</td>"+
        								"<td>"+value['fch_generacion']+"</td>"+
        								"<td>"+value['fch_emision']+"</td>"+
        								"<td>"+value['fch_activacion']+"</td>"+
        								"<td>"+value['fch_anulacion']+"</td>"+
        								"<td>"+value['fch_resolucion']+"</td>"+
        								"<td>"+value['fch_transferencia']+"<input type='hidden' class='form-control form-control-sm m-input' id='flg_"+value['num_servicio']+"'></td>"+
        							"</td>";

				document.getElementById("tbodyServicios").insertAdjacentHTML("beforeEnd" ,filaServicio);
        	});//each
        	var tbodyServicios = document.getElementById('tbodyServicios');
	        var primeraFilaServicios = tbodyServicios.rows.item(0);
	        primeraFilaServicios.click();
        }//succes
    });//ajax
});

function mostrarServicio(row,localidad,contrato,refinanciamiento,servicio,tipoCtt,tipoProg,codTitular,codTitularAnt){
    var rows = $('#myTableServicios tr').not(':first');
    rows.removeClass('selected'); 
    $(row).closest('tr').addClass('selected');
	$("#tbodyRefinanciamiento").empty();
	document.getElementById('codCtt').value = contrato;
	document.getElementById('tipoCtt').value = tipoCtt;
	document.getElementById('progCtt').value = tipoProg;
	document.getElementById('codTitular').value = codTitular;
	document.getElementById('codTitularAnt').value = codTitularAnt;
	$("#codTitularAnt").change();
	document.getElementById('codCliente').value = codTitular;
	$("#codCliente").change();

	$.ajax({
		type: 'POST',
        url:"ajax/cambioTitular.ajax.php",
        dataType: 'json',
        data: {'accion' : 'getRefinServ', 'localidad' : localidad, 'cod_contrato' : contrato, 'cod_servicio' : servicio},
        success: function(respuesta){
        	$.each(respuesta,function(index,value){
        		if (value['flg_activo'] == "SI") {
        			var clase = "class='blue-text'";
        		}else{
        			var clase = "";
        		}
        		var filaRef = '<tr '+clase+'><td>'+value['num_refinanciamiento']+'</td></tr>';
				document.getElementById("tbodyRefinanciamiento").insertAdjacentHTML("beforeEnd" ,filaRef);
        	});//each   
        }//succes
    });//ajaxgetRefinServ
	
}

$("#codCliente").change(function() {
	limpiarTitular();
    var cod_titular = $(this).val();
    $.ajax({
		type: 'POST',
        url:"ajax/cambioTitular.ajax.php",
        dataType: 'text',
        data: {'accion' : 'getDatosCliente', 'cod_cliente' : cod_titular},
        success: function(respuesta){

        	var info = JSON.parse(respuesta);

        	if ((info[0].flg_juridico).trim() == "SI") {
        		$('#juridicoTitular').prop("checked", true);
        	}else{
        		$('#juridicoTitular').prop("checked", false);
        	}
        	
        	document.getElementById('nombreTitular').value = info[0].dsc_cliente;
        	document.getElementById('tipoDocTitular').value = info[0].cod_tipo_documento;
        	document.getElementById('numDocTitular').value = info[0].dsc_documento;
        	document.getElementById('fchNacTitular').value = info[0].fch_nacimiento;
        	document.getElementById('apePatTitular').value = info[0].dsc_apellido_paterno;
        	document.getElementById('apeMatTitular').value = info[0].dsc_apellido_materno;
        	document.getElementById('nomTitular').value = info[0].dsc_nombre;
        	document.getElementById('razSocTitular').value = info[0].dsc_razon_social;
        	document.getElementById('cel1Titular').value = info[0].dsc_telefono_1;
        	document.getElementById('cel2Titular').value = info[0].dsc_telefono_2;
        	document.getElementById('edoCivilTitular').value = info[0].cod_estadocivil;
        	document.getElementById('sexoTitular').value = (info[0].cod_sexo).trim();
        	document.getElementById('emailTitular').value = info[0].dsc_email;

        }//succes
    });//ajax

    $.ajax({
        type: 'POST',
        url:"ajax/cambioTitular.ajax.php",
        dataType: 'text',
        data: {'accion' : 'getDireccionCliente', 'cod_cliente' : cod_titular},
        success: function(respuesta){

            var info = JSON.parse(respuesta);
            if (info.length == 0) {
            }else{
                document.getElementById('paisTitular').value = info[0].dsc_pais;
                document.getElementById('depTitular').value = info[0].dsc_departamento;
                document.getElementById('provTitular').value = info[0].dsc_provincia;
                document.getElementById('distTitular').value = info[0].dsc_distrito;
                document.getElementById('direccionTitular').value = info[0].dsc_direccion;
                document.getElementById('refDirTitular').value = info[0].dsc_referencia;
            }
        }//succes
    });//ajax
});

$("#codTitularAnt").change(function() {
    var cod_cliente = $(this).val();
    if (cod_cliente == '') {
    	document.getElementById('nombreTitularAnt').value = '';
    }else{
    	$.ajax({
			type: 'POST',
	        url:"ajax/cambioTitular.ajax.php",
	        dataType: 'text',
	        data: {'accion' : 'getNombreCliente', 'cod_cliente' : cod_cliente},
	        success: function(respuesta){

	        	var info = JSON.parse(respuesta);
	        	
	        	document.getElementById('nombreTitularAnt').value = info.dsc_cliente;
	        }//succes
	    });//ajax
    }
});

function limpiarTitular(){
	document.getElementById('nombreTitular').value = '';
    document.getElementById('tipoDocTitular').value = '';
    document.getElementById('numDocTitular').value = '';
    document.getElementById('fchNacTitular').value = '';
    document.getElementById('apePatTitular').value = '';
    document.getElementById('apeMatTitular').value = '';
    document.getElementById('nomTitular').value = '';
    document.getElementById('razSocTitular').value = '';
    document.getElementById('cel1Titular').value = '';
    document.getElementById('cel2Titular').value = '';
    document.getElementById('edoCivilTitular').value = '';
    document.getElementById('sexoTitular').value = '';
    document.getElementById('emailTitular').value = '';
    document.getElementById('paisTitular').value = '';
    document.getElementById('depTitular').value = '';
    document.getElementById('provTitular').value = '';
    document.getElementById('distTitular').value = '';
    document.getElementById('direccionTitular').value = '';
    document.getElementById('refDirTitular').value = '';
}

function limpiarNuevoTitular(){
	document.getElementById('codNuevoTitular').value = '';
	document.getElementById('nombreTitular').value = '';
    document.getElementById('tipoDocNuevoTitular').value = '';
    document.getElementById('numDocNuevoTitular').value = '';
    document.getElementById('fchNacNuevoTitular').value = '';
    document.getElementById('apePatNuevoTitular').value = '';
    document.getElementById('apeMatNuevoTitular').value = '';
    document.getElementById('nomNuevoTitular').value = '';
    document.getElementById('razSocNuevoTitular').value = '';
    document.getElementById('cel1NuevoTitular').value = '';
    document.getElementById('cel2NuevoTitular').value = '';
    document.getElementById('edoCivilNuevoTitular').value = '';
    document.getElementById('sexoNuevoTitular').value = '';
    document.getElementById('emailNuevoTitular').value = '';
    document.getElementById('paisTitular').value = '';
    document.getElementById('departamentoNuevoTitular').value = '';
    document.getElementById('provinciaNuevoTitular').value = '';
    document.getElementById('distritoNuevoTitular').value = '';
    document.getElementById('direccionNuevoTitular').value = '';
    document.getElementById('refDirNuevoTitular').value = '';
}

function creaTablaCliente(tipo){

    $('#tablaCliente').html('<div class="loader"></div>');
    $.ajax({
        url: 'extensiones/captcha/creaTablaCliente.php',
        dataType: 'text',
        data: { 'tipo' : tipo },
        success : function(respuesta){
            $('#tablaCliente').html('')
            $("#tablaCliente").html(respuesta);
            $('#myTableCliente').DataTable();
        }
    });
}

function getDatosNuevoTitular(cod_cliente){
	limpiarNuevoTitular();
	$.ajax({
		type: 'POST',
        url:"ajax/cambioTitular.ajax.php",
        dataType: 'text',
        data: {'accion' : 'getDatosCliente', 'cod_cliente' : cod_cliente},
        success: function(respuesta){

        	var info = JSON.parse(respuesta);

        	if ((info[0].flg_juridico).trim() == "SI") {
        		$('#juridicoNuevoTitular').prop("checked", true);
        	}else{
        		$('#juridicoNuevoTitular').prop("checked", false);
        	}
        	document.getElementById('codNuevoTitular').value = cod_cliente;
        	document.getElementById('tipoDocNuevoTitular').value = info[0].cod_tipo_documento;
        	document.getElementById('numDocNuevoTitular').value = info[0].dsc_documento;
        	document.getElementById('fchNacNuevoTitular').value = info[0].fch_nacimiento;
        	document.getElementById('apePatNuevoTitular').value = info[0].dsc_apellido_paterno;
        	document.getElementById('apeMatNuevoTitular').value = info[0].dsc_apellido_materno;
        	document.getElementById('nomNuevoTitular').value = info[0].dsc_nombre;
        	document.getElementById('razSocNuevoTitular').value = info[0].dsc_razon_social;
        	document.getElementById('cel1NuevoTitular').value = info[0].dsc_telefono_1;
        	document.getElementById('cel2NuevoTitular').value = info[0].dsc_telefono_2;
        	document.getElementById('edoCivilNuevoTitular').value = info[0].cod_estadocivil;
        	document.getElementById('sexoNuevoTitular').value = (info[0].cod_sexo).trim();
        	document.getElementById('emailNuevoTitular').value = info[0].dsc_email;
        }//succes
    });//ajax

    $.ajax({
        type: 'POST',
        url:"ajax/cambioTitular.ajax.php",
        dataType: 'text',
        data: {'accion' : 'getDireccionCliente', 'cod_cliente' : cod_cliente},
        success: function(respuesta){
            var info = JSON.parse(respuesta);
            if (info.length == 0) {
            }else{
                document.getElementById('paisNuevoTitular').value = info[0].dsc_pais;
                document.getElementById('departamentoNuevoTitular').value = info[0].dsc_departamento;
                document.getElementById('provinciaNuevoTitular').value = info[0].dsc_provincia;
                document.getElementById('distritoNuevoTitular').value = info[0].dsc_distrito;
                document.getElementById('direccionNuevoTitular').value = info[0].dsc_direccion;
                document.getElementById('refDirNuevoTitular').value = info[0].dsc_referencia;
            }
        }//succes
    });//ajax
}

function preCambioTitular(){
    var localidad = document.getElementById('localidadCamTit').value;
    var contrato = document.getElementById('codCtt').value;
    var titularNvo = document.getElementById('codNuevoTitular').value;
    var tipo_ctt = document.getElementById('tipoCtt').value;
    var tipo_programa = document.getElementById('progCtt').value;
    var servicioTable = document.getElementById('tbodyServicios');
    var stLength = servicioTable.rows.length;

    var j = 0;

    if (localidad == '') {
        swal({
            title: "",
            text: 'Debe seleccionar la localidad.',
            type: "warning",
            confirmButtonText: "Aceptar",
        });
    }else if (contrato == '') {
        swal({
            title: "",
            text: 'Debe seleccionar el contrato.',
            type: "warning",
            confirmButtonText: "Aceptar",
        });
    }else if (titularNvo == '') {
        swal({
            title: "",
            text: 'Debe seleccionar el titular nuevo.',
            type: "warning",
            confirmButtonText: "Aceptar",
        });
    }else if (stLength > 0) {
        for (i = 0; i < stLength; i++){
            var oCells = servicioTable.rows.item(i).cells;
            var servicio = oCells.item(0).innerHTML.trim();
            $.ajax({
                type: 'POST',
                url:"ajax/cambioTitular.ajax.php",
                dataType: 'text',
                data: {'accion' : 'flags', 'localidad' : localidad, 'cod_contrato' : contrato, 'cod_servicio' : servicio, 'cod_tipo_ctt' : tipo_ctt, 'cod_tipo_programa' : tipo_programa},
                success: function(respuesta){
                    j = j + 1;
                    var info = JSON.parse(respuesta);
                    if (info.flg_cambio_titular == 'SI') {
                        document.getElementById('flg_'+info.num_servicio).value = "false";
                    }else if (info.flg_anulado == 'SI' || info.flg_resuelto == 'SI') {
                        document.getElementById('flg_'+info.num_servicio).value = "false";
                    }else{
                        document.getElementById('flg_'+info.num_servicio).value = "true";
                    }
                    if (j == stLength) {
                        $.ajax({
                            type: 'POST',
                            url:"ajax/cambioTitular.ajax.php",
                            dataType: 'text',
                            data: {'accion' : 'getCambioTitular', 'localidad' : localidad, 'cod_contrato' : contrato, 'cod_tipo_ctt' : tipo_ctt, 'cod_tipo_programa' : tipo_programa},
                            success: function(respuesta){
                                var info = JSON.parse(respuesta);
                                if (info.cod == 0) {
                                    swal({
                                        title: "",
                                        text: 'Debe generar el servicio por cambio de titula, revise la ruta gestión de contratos.',
                                        type: "warning",
                                        confirmButtonText: "Aceptar",
                                    });
                                }else{
                                    $.ajax({
                                        type: 'POST',
                                        url:"ajax/cambioTitular.ajax.php",
                                        dataType: 'text',
                                        data: {'accion' : 'getEstadoCambioTitular', 'localidad' : localidad, 'cod_contrato' : contrato, 'num_servicio' : info.num_servicio, 'cod_tipo_ctt' : tipo_ctt, 'cod_tipo_programa' : tipo_programa},
                                        success: function(respuesta){
                                            var resp = JSON.parse(respuesta);
                                            if (resp.existe_cancelacion == 0) {
                                                swal({
                                                    title: "",
                                                    text: 'El servicio por cambio de titular debe estar cancelado',
                                                    type: "warning",
                                                    confirmButtonText: "Aceptar",
                                                });
                                            }else{
                                                swal({
                                                  title:"",
                                                  text:'Esta generando el cambio de titular del servicio ["'+info.num_servicio+'"]. ¿Esta seguro de continuar?',
                                                  type:"question",
                                                  showCancelButton:!0,
                                                  confirmButtonText:"Aceptar"
                                                }).then(function(e){
                                                  e.value&&cambiarTitular(info.num_servicio)
                                                })
                                            }
                                        }
                                    });
                                }
                            }
                        });
                    }
                }//succes
            });//ajax
        }
    }
}

function cambiarTitular(servicio_ct){
    var localidad = document.getElementById('localidadCamTit').value;
    var contrato = document.getElementById('codCtt').value;
    var titularNvo = document.getElementById('codNuevoTitular').value;
    var tipo_ctt = document.getElementById('tipoCtt').value;
    var tipo_programa = document.getElementById('progCtt').value;
    var servicioTable = document.getElementById('tbodyServicios');
    var stLength = servicioTable.rows.length;
    var cod_titular_nuevo = document.getElementById('codNuevoTitular').value;
    var cod_titular = document.getElementById('codCliente').value;
    var rowsTrue = 0;
    var uptades = 0;

    for (i = 0; i < stLength; i++){
        var oCells = servicioTable.rows.item(i).cells;
        var servicio = oCells.item(0).innerHTML.trim();
        if (document.getElementById('flg_'+servicio).value == "false") {
        }else{
            rowsTrue = rowsTrue + 1;
            $.ajax({
                type: 'POST',
                url:"ajax/cambioTitular.ajax.php",
                dataType: 'text',
                data: {'accion' : 'getFoma', 'localidad' : localidad, 'cod_contrato' : contrato, 'num_servicio' : servicio, 'cod_tipo_ctt' : tipo_ctt, 'cod_tipo_programa' : tipo_programa},
                success: function(respuesta){
                    var info = JSON.parse(respuesta);
                    if (info.num_servicio_foma == '' || info.num_servicio_foma == null) {
                    }else{
                        $.ajax({
                            type: 'POST',
                            url:"ajax/cambioTitular.ajax.php",
                            dataType: 'text',
                            data: {'accion' : 'updateServicio', 'localidad' : localidad, 'cod_contrato' : contrato, 'num_servicio' : info.num_servicio_foma, 'cod_tipo_ctt' : tipo_ctt, 'cod_tipo_programa' : tipo_programa, 'cod_titular_nuevo' : cod_titular_nuevo, 'num_servicio_cambio' : servicio_ct},
                            success: function(respuesta){
                            }
                        });
                    }
                }
            });

            $.ajax({
                type: 'POST',
                url:"ajax/cambioTitular.ajax.php",
                dataType: 'text',
                data: {'accion' : 'updateServicio', 'localidad' : localidad, 'cod_contrato' : contrato, 'num_servicio' : servicio, 'cod_tipo_ctt' : tipo_ctt, 'cod_tipo_programa' : tipo_programa, 'cod_titular_nuevo' : cod_titular_nuevo, 'num_servicio_cambio' : servicio_ct},
                success: function(respuesta){
                    uptades = uptades + 1;
                    if (uptades == rowsTrue) {
                        $.ajax({
                            type: 'POST',
                            url:"ajax/cambioTitular.ajax.php",
                            dataType: 'text',
                            data: {'accion' : 'updateCambioTitular', 'localidad' : localidad, 'cod_contrato' : contrato, 'num_servicio' : servicio_ct, 'cod_tipo_ctt' : tipo_ctt, 'cod_tipo_programa' : tipo_programa, 'cod_titular' : cod_titular},
                            success: function(respuesta){
                                if (respuesta == 1) {
                                    swal({
                                        title: "",
                                        text: 'Se grabo el registro satisfactoriamente.',
                                        type: "success",
                                        confirmButtonText: "Aceptar",
                                    });
                                }
                            }
                        });
                    }
                }
            });
            console.log(rowsTrue);
        }
    }
}

getParameterByName();