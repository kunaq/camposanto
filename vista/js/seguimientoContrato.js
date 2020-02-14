function filtro(filtro){
	if (filtro == "cliente") {
		$("#divLoc").hide();
		$("#divCtt").hide();
		$("#divBtnCtt").hide();
		$("#divTipoDoc").show();
		$("#divNumDoc").show();
		$("#divBtnCli").show();
	}else if(filtro == "contrato"){
		$("#divTipoDoc").hide();
		$("#divNumDoc").hide();
		$("#divBtnCli").hide();
		$("#divLoc").show();
		$("#divCtt").show();
		$("#divBtnCtt").show();
	}
}

function init(){
	getParameterByName();
}


function getParameterByName() {
    var query = window.location.search.substring(1);
    if (query == "" ) {
    	filtro("cliente");
    }else{
    	filtro("contrato");
    	var pair = query.split("=");
    	$("#cttSegCon").val(pair[1]);
    	getDatosCtt();
    }
}

function getDatosCtt(){
	var codCtt = document.getElementById('cttSegCon').value;
    $.ajax({
		type: 'POST',
        url:"ajax/segCtt.ajax.php",
        dataType: 'text',
        data: {'accion' : 'getServicioCtt', 'cod_contrato' : codCtt},
        success: function(respuesta){

        	$("#tbodyServicios").html(respuesta);
		    var servTable = document.getElementById('tbodyServicios');
            var servTableLenght = servTable.rows.length;
            var primeraFila = servTable.rows.item(0);
            primeraFila.click();
        	
        }//succes
    });//ajax
}

function mostrarAutorizacion(row,dscAutorizacion,numUso,codEstado,fchServicio,apePaterno,apeMaterno,nombre,tipoDoc,numDoc,fchNac,fchDeceso,lugarDec,camposanto,plataforma,area,ejeHor,ejeVer,espacio,tipoEspacio,nivel,profundidad){
	var rows = $('#myTableAutorizacion tr').not(':first');
	rows.removeClass('selected'); 
  	$(row).closest('tr').addClass('selected');

  	document.getElementById('dsc_autorizacion').value = dscAutorizacion;
  	document.getElementById('num_uso_aut').value = numUso;
  	document.getElementById('estado_aut').value = codEstado;
  	document.getElementById('fch_servicio_aut').value = fchServicio;
  	document.getElementById('ape_paterno_aut').value = apePaterno;
  	document.getElementById('ape_materno_aut').value = apeMaterno;
  	document.getElementById('nombre_aut').value = nombre;
  	document.getElementById('tipo_doc_aut').value = tipoDoc;
  	document.getElementById('num_doc_auto').value = numDoc;
  	document.getElementById('fch_nac_aut').value = fchNac;
  	document.getElementById('fch_dec_aut').value = fchDeceso;
  	document.getElementById('lugar_dec_aut').value = lugarDec;
  	document.getElementById('camposanto_aut').value = camposanto;
  	document.getElementById('plataforma_aut').value = plataforma;
  	document.getElementById('area_aut').value = area;
  	document.getElementById('eje_hor_aut').value = ejeHor;
  	document.getElementById('eje_ver_aut').value = ejeVer;
  	document.getElementById('espacio_aut').value = espacio;
  	document.getElementById('tipo_espacio_aut').value = tipoEspacio;
  	document.getElementById('nivel_aut').value = nivel;
  	document.getElementById('profundidad_aut').value = profundidad;

}

function mostrarBeneficiario(row,servicio,tipoDoc,numDoc,apePaterno,apeMaterno,nombre,sexo,edoCivil,fchNac,parentesco,peso,talla,religion,observacion,fchDec,fchEnt,lugarDec,motivoDec,nivel,flgAutopsia){
	var rows = $('#myTableBeneficiarios tr').not(':first');
	rows.removeClass('selected'); 
  	$(row).closest('tr').addClass('selectedBen');

  	document.getElementById('codServicio').value = servicio;
  	document.getElementById('tipoDocBenef').value = tipoDoc;
  	document.getElementById('numDocBenef').value = numDoc;
  	document.getElementById('apePatBenef').value = apePaterno;
  	document.getElementById('apeMatBenef').value = apeMaterno;
  	document.getElementById('nombreBenef').value = nombre;
  	$('#m_datepicker_4_1').datepicker('setDate', fchNac);
  	document.getElementById('religionBenef').value = religion;
  	document.getElementById('ecivilBenef').value = edoCivil;
  	document.getElementById('sexoBenef').value = sexo;
  	document.getElementById('parentescoBenef').value = parentesco;
  	document.getElementById('pesoBenef').value = peso;
  	document.getElementById('tallaBenef').value = talla;
  	document.getElementById('observacionBenef').value = observacion;
  	$('#m_datepicker_4_2').datepicker('setDate', fchDec);
  	$('#m_datepicker_4_3').datepicker('setDate', fchEnt);
  	document.getElementById('lugarDecesoBenef').value = lugarDec;
  	document.getElementById('motivoDecesoBenef').value = motivoDec;
  	document.getElementById('nivel').value = nivel;
  	if (flgAutopsia == 'SI') {
        $('#autopsiaBenef').prop("checked", true);
    }
    else{
        $('#autopsiaBenef').prop("checked", false);
    }
}

function getComprobantesCuota(row,localidad,contrato,num_refinanciamiento,num_cuota){
 	var rows = $('#myTableCronograma tr').not(':first');
	rows.removeClass('selected'); 
  	$(row).closest('tr').addClass('selected');

  	$("#tbodyCancelaciones").html("");

  	$.ajax({
		type: 'POST',
        url:"ajax/segCtt.ajax.php",
        dataType: 'text',
        data: {'accion' : 'getComprobantes', 'localidad' : localidad , 'cod_contrato' : contrato, 'num_cuota' : num_cuota, 'num_refinanciamiento' : num_refinanciamiento},
        success: function(respuesta){

        	var info = JSON.parse(respuesta);
        	$("#tbodyComprobantes").html(info.tbodyComprobantes);
		    var tablaComprobantes = document.getElementById('tbodyComprobantes');
            var primeraFilaComp = tablaComprobantes.rows.item(0);
            primeraFilaComp.click();
        	
        }//succes
    });//ajax
}

function getDatosComprobante(){
 	console.log("doble click");
 	$('#m_modal_mantenimiento_comprobante').modal('show');
}

function getComprobantes(){
 	var localidad = document.getElementById('codLocSegCtt').value;
    var cod_contrato = document.getElementById('numCttSegCtt').value;
    var num_refinanciamiento = document.getElementById('numRefActual').value;
    document.getElementById('tipo_comprobante').value = "";
    document.getElementById('num_comprobante').value = "";
    if (localidad == "" || cod_contrato == "" || num_refinanciamiento == "") {
    	swal({
	      title: "",
	      text: "Ingresa un numero de contrato.",
	      type: "error",
	      confirmButtonText: "Aceptar",
	    });
	    $('#mostrarTodos').prop("checked", false);
    }else{
    	var checkbox = document.getElementById('mostrarTodos');
 		if (checkbox.checked != true){
 			$("#tbodyComprobantesPrincipal").html("");
 		}else{
 			$.ajax({
				type: 'POST',
		        url:"ajax/segCtt.ajax.php",
		        dataType: 'text',
		        data: {'accion' : 'filtroComprobantes', 'localidad' : localidad, 'cod_contrato' : cod_contrato, 'num_refinanciamiento' : num_refinanciamiento, 'cod_tipo_comprobante' : '', 'num_comprobante' : ''},
		        success: function(respuesta){

		        	var info = JSON.parse(respuesta);
		        	$("#tbodyComprobantesPrincipal").html(info.tbodyComprobantesPrincipal);
		        }//succes
		    });//ajax
 		}
    }
}

function getCancelacionComprobante(row,localidad,num_correlativo){
 	var rows = $('#myTableComprobante tr').not(':first');
	rows.removeClass('selected'); 
  	$(row).closest('tr').addClass('selected');

  	$.ajax({
		type: 'POST',
        url:"ajax/segCtt.ajax.php",
        dataType: 'text',
        data: {'accion' : 'getCancelaciones', 'localidad' : localidad, 'num_correlativo' : num_correlativo},
        success: function(respuesta){

        	var info = JSON.parse(respuesta);
        	$("#tbodyCancelaciones").html(info.tbodyCancelaciones);
        	
        }//succes
    });//ajax
}

$("#cod_titular").change(function() {
    var cod_titular = $(this).val();
    $.ajax({
		type: 'POST',
        url:"ajax/segCtt.ajax.php",
        dataType: 'text',
        data: {'accion' : 'getDatosCliente', 'cod_cliente' : cod_titular},
        success: function(respuesta){

        	var info = JSON.parse(respuesta);
        	document.getElementById('nombre_titular').value = info.dsc_cliente;
        	document.getElementById('tipo_doc_titular').value = info.dsc_tipo_doc;
        	document.getElementById('num_doc_titular').value = info.dsc_documento;
        	document.getElementById('correo_titular').value = info.dsc_email;
        	document.getElementById('direccion_titular').value = info.dsc_direccion;
        	document.getElementById('telefono_titular').value = info.dsc_telefono_1;
        	document.getElementById('telefono2_titular').value = info.dsc_telefono_2;
        	if (info.flg_juridico == "SI") {
        		$('#flg_jur_titular').prop("checked", true);
        	}else{
        		$('#flg_jur_titular').prop("checked", false);
        	}
        }//succes
    });//ajax
});

$("#cod_titular_alterno").change(function() {
    var cod_titular_alterno = $(this).val();
    $.ajax({
		type: 'POST',
        url:"ajax/segCtt.ajax.php",
        dataType: 'text',
        data: {'accion' : 'getDatosCliente', 'cod_cliente' : cod_titular_alterno},
        success: function(respuesta){

        	var info = JSON.parse(respuesta);
        	document.getElementById('nombre_titular_alterno').value = info.dsc_cliente;
        	document.getElementById('tipo_doc_titular_alterno').value = info.dsc_tipo_doc;
        	document.getElementById('num_doc_titular_alterno').value = info.dsc_documento;
        	document.getElementById('correo_titular_alterno').value = info.dsc_email;
        	document.getElementById('direccion_titular_alterno').value = info.dsc_direccion;
        	document.getElementById('telefono_titular_alterno').value = info.dsc_telefono_1;
        	document.getElementById('telefono2_titular_alterno').value = info.dsc_telefono_2;
        	if (info.flg_juridico == "SI") {
        		$('#flg_jur_titular_alterno').prop("checked", true);
        	}else{
        		$('#flg_jur_titular_alterno').prop("checked", false);
        	}
        }//succes
    });//ajax
});

$("#cod_aval").change(function() {
    var cod_titular = $(this).val();
    $.ajax({
		type: 'POST',
        url:"ajax/segCtt.ajax.php",
        dataType: 'text',
        data: {'accion' : 'getDatosCliente', 'cod_cliente' : cod_titular},
        success: function(respuesta){

        	var info = JSON.parse(respuesta);
        	document.getElementById('nombre_aval').value = info.dsc_cliente;
        	document.getElementById('tipo_doc_aval').value = info.dsc_tipo_doc;
        	document.getElementById('num_doc_aval').value = info.dsc_documento;
        	document.getElementById('correo_aval').value = info.dsc_email;
        	document.getElementById('direccion_aval').value = info.dsc_direccion;
        	document.getElementById('telefono_aval').value = info.dsc_telefono_1;
        	document.getElementById('telefono2_aval').value = info.dsc_telefono_2;
        	if (info.flg_juridico == "SI") {
        		$('#flg_jur_aval').prop("checked", true);
        	}else{
        		$('#flg_jur_aval').prop("checked", false);
        	}
        }//succes
    });//ajax
});

$("#num_comprobante").change(function() {
    var num_comprobante = $(this).val();
    var tipo_comprobante = document.getElementById('tipo_comprobante').value;
    var localidad = document.getElementById('codLocSegCtt').value;
    var cod_contrato = document.getElementById('numCttSegCtt').value;
    var num_refinanciamiento = document.getElementById('numRefActual').value;
    
    if (tipo_comprobante == "") {
    	swal({
	        title: "",
	        text: "Selecciona un tipo de comprobante.",
	        type: "error",
	        confirmButtonText: "Aceptar",
	    })
	    document.getElementById('num_comprobante').value = "";
    }else if (localidad == "" || cod_contrato == "" || num_refinanciamiento == "") {
    	swal({
	        title: "",
	        text: "Ingresa un numero de contrato.",
	        type: "error",
	        confirmButtonText: "Aceptar",
	    });
	    $('#mostrarTodos').prop("checked", false);
    }else{
    	$.ajax({
			type: 'POST',
	        url:"ajax/segCtt.ajax.php",
	        dataType: 'text',
	        data: {'accion' : 'filtroComprobantes', 'localidad' : localidad, 'cod_contrato' : cod_contrato, 'num_refinanciamiento' : num_refinanciamiento, 'cod_tipo_comprobante' : tipo_comprobante, 'num_comprobante' : num_comprobante},
	        success: function(respuesta){

	        	var info = JSON.parse(respuesta);
	        	if (info.tbodyComprobantesPrincipal == "") {
	        		swal({
				        title: "",
				        text: "El comprobante ingresado no existe.",
				        type: "info",
				        confirmButtonText: "Aceptar",
				    })
	        	}else{
	        		$("#tbodyComprobantesPrincipal").html(info.tbodyComprobantesPrincipal);
	        	}
	        }//succes
	    });//ajax
    }
});

function creaTablaComprobante(tipoComprobante,numComprobante,fchEmision,localidad,tipoCtt,tipoPrograma,codCtt,numRef,numCuota,moneda,impTotal){
	var filaComprobante = '<tr><td>'+tipoComprobante+'</td><td>'+numComprobante+'</td><td>'+fchEmision+'</td><td>'+localidad+'</td><td>'+tipoCtt+'</td><td>'+tipoPrograma+'</td><td>'+codCtt+'</td><td>'+numRef+'</td><td>'+numCuota+'</td><td>'+moneda+'</td><td>'+impTotal+'</td></tr>';
	$("#tbodyComprobanteModal").html(filaComprobante);
	$('#m_modal_tabla_comprobante').modal('show');
	$("#imp_total_footer").html(impTotal);
}

function getCancelacionPrincipal(row,localidad,numCor){
	var rows = $('#myTableListadoComprobantes tr').not(':first');
	rows.removeClass('selected'); 
  	$(row).closest('tr').addClass('selected');

  	$("#tbodyCancelacionesPrincipal").empty();
	$.ajax({
        url: 'ajax/segCtt.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'getCancelacionPrincipal', 'cod_localidad' : localidad, 'num_correlativo' : numCor },
        success : function(respuesta){
        	$.each(respuesta,function(index,value){
        		if (value['cod_moneda'] == 'SOL') {
        			var moneda = 'S/.';
        		}else{
        			var moneda = value['cod_moneda'];
        		}
        		var filaCancelacion = '<tr>'+
									'<td>'+value['cod_caja'] +'</td>'+
									'<td>'+value['num_transaccion']+'</td>'+
									'<td>'+value['cod_usuario']+'</td>'+
									'<td>'+value['fch_registro']+'</td>'+
									'<td>'+value['dsc_forma_pago']+'</td>'+
									'<td>'+value['num_documento']+'</td>'+
									'<td>'+moneda+'</td>'+
									'<td>'+value['imp_operacion']+'</td>'+
									'<td>'+value['imp_operacion_soles']+'</td>'+
								'</tr>';
				document.getElementById("tbodyCancelacionesPrincipal").insertAdjacentHTML("beforeEnd" ,filaCancelacion);
        	});//each
        }//success
    });//ajax
}

function getDeudasCliente(cliente){
	
	if (cliente == "titular") {
		var cod_cliente = document.getElementById('cod_titular').value;
		var nombre = document.getElementById('nombre_titular').value;
		document.getElementById('nombreCliDeu').innerHTML = nombre;
	}else if (cliente == "titular2") {
		var cod_cliente = document.getElementById('cod_titular_alterno').value;
		var nombre = document.getElementById('nombre_titular_alterno').value;
		document.getElementById('nombreCliDeu').innerHTML = nombre;
	}else if (cliente == "aval") {
		var cod_cliente = document.getElementById('cod_aval').value;
		var nombre = document.getElementById('nombre_aval').value;
		document.getElementById('nombreCliDeu').innerHTML = nombre;
	}

	if (cod_cliente == "") {
		
	}else{
		$.ajax({
	        type: 'POST',
	        url: "ajax/segCtt.ajax.php",
	        dataType: 'text',
	        data: {'accion' : 'getDeudasCliente', 'cod_cliente' : cod_cliente },
	        success : function(response){
	            var info = JSON.parse(response);

	            $("#tbodyDeuda").html(info.tablaDeuda);
	            $('#m_modal_deuda').modal('show');
	            document.getElementById('deudaTotal').innerHTML = info.deuda_total;
	            document.getElementById('deuda_total_foot').innerHTML = info.deuda_total;
	            document.getElementById('deuda_vencida_foot').innerHTML = info.deuda_vencida;
	        }
	    });
	}
}

function getObservacionesCliente(cliente){
	
	if (cliente == "titular") {
		var cod_cliente = document.getElementById('cod_titular').value;
		var nombre = document.getElementById('nombre_titular').value;
		document.getElementById('nombreCliObservacion').value = nombre;
	}else if (cliente == "titular2") {
		var cod_cliente = document.getElementById('cod_titular_alterno').value;
		var nombre = document.getElementById('nombre_titular_alterno').value;
		document.getElementById('nombreCliObservacion').value = nombre;
	}else if (cliente == "aval") {
		var cod_cliente = document.getElementById('cod_aval').value;
		var nombre = document.getElementById('nombre_aval').value;
		document.getElementById('nombreCliObservacion').value = nombre;
	}

	if (cod_cliente == "") {
		
	}else{
		$.ajax({
	        type: 'POST',
	        url: "ajax/segCtt.ajax.php",
	        dataType: 'text',
	        data: {'accion' : 'getObservacionesCliente', 'cod_cliente' : cod_cliente },
	        success : function(response){
	            var info = JSON.parse(response);
	            document.getElementById('clasificacionCliObservacion').value = info.calificacion;
	            $("#tbodyObservacion").html(info.tbodyObservaciones);
	            $('#m_modal_observacion_cliente').modal('show');
	            
	        }
	    });
	}
}

function cargaObservacionesCtt(codCtto,numServicio){
	$("#bodyObservacionesCtt").empty();
	$.ajax({
        url: 'ajax/modifCtto.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'getObservacionesContrato', 'cod_contrato' : codCtto, 'num_servicio' : numServicio },
        success : function(respuesta){
        	$.each(respuesta,function(index,value){
        		if(value['flg_automatico'] == 'SI'){
        			auto = 'checked';
        		}else if (value['flg_automatico'] == 'NO'){
        			auto = '';
        		}
        		var filaObsv = '<tr>'+
									'<td>'+value['num_linea']+'</td>'+
									'<td style="text-align: left;">'+value['dsc_observacion']+'</td>'+
									'<td>'+value['cod_usuario']+'</td>'+
									'<td>'+value['fch_registro']+'</td>'+
									'<td><span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger"><input type="checkbox" disabled '+auto+'><span></span></span></td>'+
								'</tr>';
				document.getElementById("bodyObservaciones").insertAdjacentHTML("beforeEnd" ,filaObsv);
        	});//each
        }//success
    });//ajax
}// function cargaObservaciones

function cargaGestionCartera(localidad,contrato,servicio,refinanciamiento){
	$("#tbodyGestionCartera").empty();
	$.ajax({
        url: 'ajax/segCtt.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'getGestionCartera', 'cod_localidad' : localidad, 'cod_contrato' : contrato, 'num_servicio' : servicio, 'num_refinanciamiento' : refinanciamiento },
        success : function(respuesta){
        	$.each(respuesta,function(index,value){
        		var filaGstCartera = '<tr>'+
									'<td>'+value['cod_anno'] + '-' + value['cod_periodo'] +'</td>'+
									'<td>'+value['dsc_tipo_cartera']+'</td>'+
									'<td>'+value['dsc_gestor']+'</td>'+
									'<td>'+value['dsc_cuotas']+'</td>'+
									'<td>'+Number(value['imp_deuda']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
									'<td>'+Number(value['imp_cobrado']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
									'<td>-</td>'+
									'<td></td>'+
									'<td></td>'+
								'</tr>';
				document.getElementById("tbodyGestionCartera").insertAdjacentHTML("beforeEnd" ,filaGstCartera);
        	});//each
        }//success
    });//ajax
}// function cargaObservaciones

function agregarObsv(usuario){
    var tablaObsv = document.getElementById("bodyObservacionesCtt");
    var numFilas = tablaObsv.rows.length;
    var fechaHoy = new Date();
    var aux_dia = fechaHoy.getDate();
    var aux_mes1 = fechaHoy.setMonth(fechaHoy.getMonth() + 1);
    var aux_mes = fechaHoy.getMonth();
    var aux_anio = fechaHoy.getFullYear();
    if(aux_mes == '0'){
        aux_mes = '12';
        aux_anio = fechaHoy.getFullYear()-1;
    }               
    fechaFinal = aux_dia+'/'+aux_mes+'/'+aux_anio;
    var filaObsv = '<tr>'+
                        '<td>'+(numFilas+1)+'</td>'+
                        '<td style="text-align: left;"><input type="text" class="form-control form-control-sm m-input" name="obsv'+numFilas+'" id="obsv'+numFilas+'"></td>'+
                        '<td>'+usuario+'</td>'+
                        '<td>'+fechaFinal+'</td>'+
                        '<td><span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger"><input type="checkbox" disabled><span></span></span></td>'+
                    '</tr>';
    tablaObsv.insertAdjacentHTML("beforeEnd" ,filaObsv);
}

function getDatosServicioCtt(row,localidad,tasa,tipoCtt,tipoPro,codCtt,numRef,numSer,titular,titular_alterno,aval,canalVta,flgAgencia,cobrador,vendedor,grupo,tipoComisionista,supervisor,jefeVentas,agencia){
	var rows = $('#myTableServicios tr').not(':first');
	rows.removeClass('selected'); 
  	$(row).closest('tr').addClass('selected');

  	document.getElementById('codLocSegCtt').value = localidad;
  	document.getElementById('numRefActual').value = numRef;

  	if (titular == "") {
  	}else{
  		document.getElementById('cod_titular').value = titular;
  		$("#cod_titular").change();
  	}

  	if (titular_alterno == "") {
  	}else{
  		document.getElementById('cod_titular_alterno').value = titular_alterno;
  		$("#cod_titular_alterno").change();
  	}

  	if (aval == "") {
  	}else{
  		document.getElementById('cod_aval').value = aval;
  		$("#cod_aval").change();
  	}

  	document.getElementById('canal_venta').value = canalVta;

  	if (flgAgencia == "SI") {
        $('#flg_agencia').prop("checked", true);
    }else{
    	$('#flg_agencia').prop("checked", false);
    }
    
    if (cobrador == "") {
  	}else{
  		document.getElementById('codCobrador').value = cobrador;
  		$.ajax({
	        type: 'POST',
	        url: 'extensiones/captcha/buscarNombreTrabajador.php',
	        dataType: 'text',
	        data: { 'cod' : cobrador },
	        success : function(respuesta){
	            document.getElementById('nombreCobrador').value = respuesta;
	        }
	    });
  	}

  	if (vendedor == "") {
  	}else{
  		document.getElementById('codVendedor').value = vendedor;
  		$.ajax({
	        type: 'POST',
	        url: 'extensiones/captcha/buscarNombreTrabajador.php',
	        dataType: 'text',
	        data: { 'cod' : vendedor },
	        success : function(respuesta){
	            document.getElementById('nombreVendedor').value = respuesta;
	        }
	    });
  	}

  	if (grupo == "") {
  	}else{
  		document.getElementById('codGrupo').value = grupo;
  		$.ajax({
	        type: 'POST',
	        url: 'extensiones/captcha/buscarNombreGrupo.php',
	        dataType: 'text',
	        data: { 'cod' : grupo },
	        success : function(respuesta){
	            document.getElementById('nombreGrupo').value = respuesta;
	        }
	    });
  	}

  	if (tipoComisionista == "") {
  	}else{
  		document.getElementById('codTipoComisionista').value = tipoComisionista;
  		$.ajax({
	        type: 'POST',
	        url: 'extensiones/captcha/buscaNombreComisionista.php',
	        dataType: 'text',
	        data: { 'cod' : tipoComisionista },
	        success : function(respuesta){
	            document.getElementById('nombreTipoComisionista').value = respuesta;
	        }
	    });
  	}

  	if (supervisor == "") {
  	}else{
  		document.getElementById('codSupervisor').value = supervisor;
  		$.ajax({
	        type: 'POST',
	        url: 'extensiones/captcha/buscarNombreTrabajador.php',
	        dataType: 'text',
	        data: { 'cod' : supervisor },
	        success : function(respuesta){
	            document.getElementById('nombreSupervisor').value = respuesta;
	        }
	    });
  	}

  	if (jefeVentas == "") {
  	}else{
  		document.getElementById('codJefeVentas').value = jefeVentas;
  		$.ajax({
	        type: 'POST',
	        url: 'extensiones/captcha/buscarNombreTrabajador.php',
	        dataType: 'text',
	        data: { 'cod' : jefeVentas },
	        success : function(respuesta){
	            document.getElementById('nombreJefeVentas').value = respuesta;
	        }
	    });
  	}

  	if (agencia == "") {
  	}else{
  		document.getElementById('codFuneraria').value = agencia;
  		$.ajax({
	        type: 'POST',
	        url: 'extensiones/captcha/buscaNombreFuneraria.php',
	        dataType: 'text',
	        data: { 'cod' : agencia },
	        success : function(respuesta){
	            document.getElementById('dscFuneraria').value = respuesta;
	        }
	    });
  	}

  	$.ajax({
		type: 'POST',
        url:"ajax/segCtt.ajax.php",
        dataType: 'text',
        data: {'accion' : 'getDatosCtt', 'localidad' : localidad, 'cod_contrato' : codCtt, 'cod_servicio' : numSer},
        success: function(respuesta){

        	var info = JSON.parse(respuesta);
        	document.getElementById('cttSegCon').value = info.contrato;
        	document.getElementById('dscCliSegCtt').value = info.cliente;
        	document.getElementById('dscLocSegCtt').value = info.dsc_localidad;
        	document.getElementById('numCttSegCtt').value = info.contrato;
        	document.getElementById('tipCttSegCtt').value = info.tipoCtt;
        	document.getElementById('progSegCtt').value = info.programa;
        	if (info.modificado == "SI") {
        		$('#modificadoSegCtt').prop("checked", true);
        	}else{
        		$('#modificadoSegCtt').prop("checked", false);
        	}

        }//succes
    });//ajax

  	$.ajax({
		type: 'POST',
        url:"ajax/segCtt.ajax.php",
        dataType: 'text',
        data: {'accion' : 'getRefinServ', 'localidad' : localidad, 'cod_contrato' : codCtt, 'cod_servicio' : numSer},
        success: function(respuesta){

        	var info = JSON.parse(respuesta);
        	$("#tbodyRef").html(info.tbodyRefinanciamiento);
        	var refTable = document.getElementById('tbodyRef');
		    var refTableLenght = refTable.rows.length;
		    var lastRef = refTable.rows.item(refTableLenght-1);
		    $(lastRef).addClass('selected');
        	
        }//succes
    });//ajaxgetRefinServ

  	$.ajax({
		type: 'POST',
        url:"ajax/segCtt.ajax.php",
        dataType: 'text',
        data: {'accion' : 'getCuotas', 'localidad' : localidad, 'impTasa' : tasa, 'tipoCtt' : tipoCtt, 'tipoPro' : tipoPro, 'codCtt' : codCtt, 'numRef' : numRef, 'numSer' : numSer},
        success: function(respuesta){

        	var info = JSON.parse(respuesta);

        	$("#tbodyCuotas").html(info.cronograma);
		    document.getElementById("total").innerHTML = info.total;
		    document.getElementById("saldoTotal").innerHTML = info.totalSaldo;
		    document.getElementById("moraTotal").innerHTML = info.totalMora;
        	
        }//succes
    });//ajaxGetCuotas

    $.ajax({
		type: 'POST',
        url:"ajax/segCtt.ajax.php",
        dataType: 'text',
        data: {'accion' : 'getResumenCtt', 'as_localidad' : localidad, 'as_tipo_ctt' : tipoCtt, 'as_contrato' : codCtt, 'as_servicio' : numSer, 'ai_ref' : numRef, 'as_tipo_programa' : tipoPro},
        success: function(respuesta){

        	var info = JSON.parse(respuesta);

        	document.getElementById('cuoTotReg').value = info.ctd_total;
        	document.getElementById('cuoCanReg').value = info.ctd_can;
        	document.getElementById('cuoPenReg').value = info.ctd_total - info.ctd_can;
        	document.getElementById('cuoTotFOMA').value = info.ctd_foma;
        	document.getElementById('cuoCanFOMA').value = info.ctd_can_foma;
        	document.getElementById('cuoPenFOMA').value = info.ctd_foma - info.ctd_can_foma;

        	document.getElementById("imp_sub_cui").innerHTML = info.imp_sub_cui;
  		    document.getElementById("imp_int_cui").innerHTML = info.imp_int_cui;
  		    document.getElementById("imp_igv_cui").innerHTML = info.imp_igv_cui;
  		    document.getElementById("imp_tot_cui").innerHTML = info.imp_tot_cui;
  		    document.getElementById("imp_emi_cui").innerHTML = info.imp_emi_cui;
  		    document.getElementById("imp_can_cui").innerHTML = info.imp_can_cui;
  		    document.getElementById("imp_sal_cui").innerHTML = info.imp_sal_cui;

  		    document.getElementById("imp_sub_reg").innerHTML = info.imp_sub_reg;
  		    document.getElementById("imp_int_reg").innerHTML = info.imp_int_reg;
  		    document.getElementById("imp_igv_reg").innerHTML = info.imp_igv_reg;
  		    document.getElementById("imp_tot_reg").innerHTML = info.imp_total_reg;
  		    document.getElementById("imp_emi_reg").innerHTML = info.imp_emi_reg;
  		    document.getElementById("imp_can_reg").innerHTML = info.imp_can_reg;
  		    document.getElementById("imp_sal_reg").innerHTML = info.imp_sal_reg;

  		    document.getElementById("imp_sub_foma").innerHTML = info.imp_sub_foma;
  		    document.getElementById("imp_int_foma").innerHTML = info.imp_int_foma;
  		    document.getElementById("imp_igv_foma").innerHTML = info.imp_igv_foma;
  		    document.getElementById("imp_tot_foma").innerHTML = info.imp_tot_foma;
  		    document.getElementById("imp_emi_foma").innerHTML = info.imp_emi_foma;
  		    document.getElementById("imp_can_foma").innerHTML = info.imp_can_fma;
  		    document.getElementById("imp_sal_foma").innerHTML = info.imp_sal_foma;

  		    document.getElementById('estadoSaldos').value = info.dsc_estado;
        	document.getElementById('monedaSaldos').value = info.cod_moneda;
        }//succes
    });//ajaxgetResumenCtt

    $.ajax({
		type: 'POST',
        url:"ajax/segCtt.ajax.php",
        dataType: 'text',
        data: {'accion' : 'getDatosEspacio', 'cod_contrato' : codCtt, 'cod_servicio' : numSer},
        success: function(respuesta){
        	var info = JSON.parse(respuesta);
        	document.getElementById('idPropietario').value = info.cod_empresa ;
        	document.getElementById('campoSantoSegCtt').value = info.dsc_camposanto;
        	document.getElementById('platSegCtt').value = info.dsc_plataforma;
        	document.getElementById('areaSegCtt').value = info.dsc_area;
        	document.getElementById('tipEspSegCtt').value = info.tipo_espacio;
        	document.getElementById('ejeHorSeCtt').value = info.eje_hor;
        	document.getElementById('ejeVerSeCtt').value = info.eje_ver;
        	document.getElementById('espacioSegCtt').value = info.cod_espacio;
        	document.getElementById('nivelSegCtt').value = info.nivel;

        	document.getElementById('imp_interes').value = info.imp_interes;
        	document.getElementById('imp_cuoi').value = info.imp_cuoi;
        	document.getElementById('imp_subtotal').value = info.imp_subtotal;
        	document.getElementById('tipo_necesidad').value = info.tipo_nec;
        	document.getElementById('imp_saldo').value = info.imp_saldofinanciar;
        	document.getElementById('imp_igv').value = info.imp_igv;
        	document.getElementById('imp_total').value = info.imp_totalneto;
        	if (info.moneda == "SOL") {
        		document.getElementById('monedaCtt').value = "S/.";
        	}

        	$.ajax({
				type: 'POST',
		        url:"ajax/segCtt.ajax.php",
		        dataType: 'text',
		        data: {'accion' : 'getServPrincipal', 'localidad' : localidad, 'cod_contrato' : codCtt, 'cod_servicio' : numSer},
		        success: function(respuesta){

		        	var info = JSON.parse(respuesta);

		        	$("#tbodyServPrincipal").html(info.tableServPrincipal);
		        	
		        }//succes
		    });//ajaxGetTblServPrincipal

		    $.ajax({
				type: 'POST',
		        url:"ajax/segCtt.ajax.php",
		        dataType: 'text',
		        data: {'accion' : 'getDsctoServicio', 'localidad' : localidad, 'cod_contrato' : codCtt, 'cod_servicio' : numSer},
		        success: function(respuesta){

		        	var info = JSON.parse(respuesta);

		        	$("#tbodyDsctoServicio").html(info.tableDsctoServicio);
		        	document.getElementById("dsctoTotal").innerHTML = info.imp_sub_cui;
		        	
		        }//succes
		    });//ajaxGetDsctoServicio

		    $.ajax({
				type: 'POST',
		        url:"ajax/segCtt.ajax.php",
		        dataType: 'text',
		        data: {'accion' : 'getEndoServicio', 'localidad' : localidad, 'cod_contrato' : codCtt, 'cod_servicio' : numSer},
		        success: function(respuesta){

		        	var info = JSON.parse(respuesta);

		        	$("#tbodyEndoServicio").html(info.tableEndoServicio);
		        	document.getElementById("endoso_total").innerHTML = info.valor_total;
		        	document.getElementById("saldo_total").innerHTML = info.saldo_total;
		        	document.getElementById("emitido_total").innerHTML = info.emitido_total;
		        	
		        }//succes
		    });//ajaxGetDsctoServicio
        	
        }//succes
    });//ajaxGetDatosEspacio

    $.ajax({
		type: 'POST',
		url:"ajax/segCtt.ajax.php",
		dataType: 'text',
		data: {'accion' : 'getDetFinanciamiento', 'localidad' : localidad, 'cod_contrato' : codCtt, 'num_refinanciamiento' : numRef},
		    success: function(respuesta){

		   	var info = JSON.parse(respuesta);

		   	$("#tbodyDetFin").html(info.tableDetFinanciamiento);
		   	document.getElementById("det_fin_saldo_total").innerHTML = info.saldoTotal;
		        	
		    }//succes
	});//ajaxGetDetFinanciamiento

	$.ajax({
		type: 'POST',
		url:"ajax/segCtt.ajax.php",
		dataType: 'text',
		data: {'accion' : 'getCuotasCron', 'localidad' : localidad, 'cod_contrato' : codCtt, 'num_refinanciamiento' : numRef},
		    success: function(respuesta){

		   	var info = JSON.parse(respuesta);

		   	$("#tbodyCronograma").html(info.tbodyCronograma);
		   	document.getElementById("num_cuotas_SegCtt").innerHTML = info.cuotas;
		   	document.getElementById("cuo_subtotal_total").innerHTML = info.imp_principal_total;
		   	document.getElementById("cuo_interes_total").innerHTML = info.imp_interes_total;
		   	document.getElementById("cuo_igv_total").innerHTML = info.imp_igv_total;
		   	document.getElementById("cuo_total_total").innerHTML = info.imp_total_total;
		   	document.getElementById("cuo_saldo_total").innerHTML = info.imp_saldo_total;
		   	document.getElementById("cuo_emitido_total").innerHTML = info.imp_totalemitido_total;
		   	document.getElementById("cuo_cancelado_total").innerHTML = info.imp_totalpagado_total;
		   	document.getElementById("cuo_mora_total").innerHTML = info.imp_mora_total;

		   	var cronograma = document.getElementById('tbodyCronograma');
            var cronogramaLenght = cronograma.rows.length;
            var primeraCuota = cronograma.rows.item(0);
            primeraCuota.click();
		        	
		    }//succes
	});//ajaxGetDetFinanciamiento

	$.ajax({
		type: 'POST',
	    url:"ajax/segCtt.ajax.php",
	    dataType: 'text',
	    data: {'accion' : 'getAutorizacion', 'localidad' : localidad, 'cod_contrato' : codCtt, 'cod_servicio' : numSer},
	    success: function(respuesta){
	       	var info = JSON.parse(respuesta);
	       	$("#tbodyAutorizacion").html(info.tablaAutorizacion);
	       	var tAutorizacion = document.getElementById('tbodyAutorizacion');
            var tAutorizacionLenght = tAutorizacion.rows.length;
            if (tAutorizacionLenght == 0) {

            }else{
            	var primeraAutorizacion = tAutorizacion.rows.item(0);
	            primeraAutorizacion.click();
            }
		}//succes
	});//ajaxGetAutorizacion

    $.ajax({
		type: 'POST',
        url:"ajax/segCtt.ajax.php",
        dataType: 'text',
        data: {'accion' : 'getBeneficiarios', 'localidad' : localidad, 'cod_contrato' : codCtt, 'cod_servicio' : numSer},
        success: function(respuesta){
        	var info = JSON.parse(respuesta);
        	$("#tbodyBeneficiarios").html(info.tablaBeneficiarios);
        	var benefTable = document.getElementById('tbodyBeneficiarios');
            var benefTableLenght = benefTable.rows.length;
            if (benefTableLenght == 0) {

            }else{
            	var beneficiario1 = benefTable.rows.item(0);
	            beneficiario1.click();
            }
        }//succes
    });//ajaxGetBeneficiarios

    cargaObservacionesCtt(codCtt,numSer);
    cargaGestionCartera(localidad,codCtt,numSer,numRef);
}

function getDatosServxRef(row,localidad,tasa,tipoCtt,tipoPro,codCtt,numRef,numSer,titular,titular_alterno,aval,canalVta,flgAgencia,cobrador,vendedor,grupo,tipoComisionista,supervisor,jefeVentas,agencia){
	var rows = $('#myTableRefinanciamiento tr').not(':first');
	rows.removeClass('selected'); 
  	$(row).closest('tr').addClass('selected');

  	document.getElementById('codLocSegCtt').value = localidad;
  	document.getElementById('numRefActual').value = numRef;

  	if (titular == "") {
  	}else{
  		document.getElementById('cod_titular').value = titular;
  		$("#cod_titular").change();
  	}

  	if (titular_alterno == "") {
  	}else{
  		document.getElementById('cod_titular_alterno').value = titular_alterno;
  		$("#cod_titular_alterno").change();
  	}

  	if (aval == "") {
  	}else{
  		document.getElementById('cod_aval').value = aval;
  		$("#cod_aval").change();
  	}

  	document.getElementById('canal_venta').value = canalVta;

  	if (flgAgencia == "SI") {
        $('#flg_agencia').prop("checked", true);
    }else{
    	$('#flg_agencia').prop("checked", false);
    }
    
    if (cobrador == "") {
  	}else{
  		document.getElementById('codCobrador').value = cobrador;
  		$.ajax({
	        type: 'POST',
	        url: 'extensiones/captcha/buscarNombreTrabajador.php',
	        dataType: 'text',
	        data: { 'cod' : cobrador },
	        success : function(respuesta){
	            document.getElementById('nombreCobrador').value = respuesta;
	        }
	    });
  	}

  	if (vendedor == "") {
  	}else{
  		document.getElementById('codVendedor').value = vendedor;
  		$.ajax({
	        type: 'POST',
	        url: 'extensiones/captcha/buscarNombreTrabajador.php',
	        dataType: 'text',
	        data: { 'cod' : vendedor },
	        success : function(respuesta){
	            document.getElementById('nombreVendedor').value = respuesta;
	        }
	    });
  	}

  	if (grupo == "") {
  	}else{
  		document.getElementById('codGrupo').value = grupo;
  		$.ajax({
	        type: 'POST',
	        url: 'extensiones/captcha/buscarNombreGrupo.php',
	        dataType: 'text',
	        data: { 'cod' : grupo },
	        success : function(respuesta){
	            document.getElementById('nombreGrupo').value = respuesta;
	        }
	    });
  	}

  	if (tipoComisionista == "") {
  	}else{
  		document.getElementById('codTipoComisionista').value = tipoComisionista;
  		$.ajax({
	        type: 'POST',
	        url: 'extensiones/captcha/buscaNombreComisionista.php',
	        dataType: 'text',
	        data: { 'cod' : tipoComisionista },
	        success : function(respuesta){
	            document.getElementById('nombreTipoComisionista').value = respuesta;
	        }
	    });
  	}

  	if (supervisor == "") {
  	}else{
  		document.getElementById('codSupervisor').value = supervisor;
  		$.ajax({
	        type: 'POST',
	        url: 'extensiones/captcha/buscarNombreTrabajador.php',
	        dataType: 'text',
	        data: { 'cod' : supervisor },
	        success : function(respuesta){
	            document.getElementById('nombreSupervisor').value = respuesta;
	        }
	    });
  	}

  	if (jefeVentas == "") {
  	}else{
  		document.getElementById('codJefeVentas').value = jefeVentas;
  		$.ajax({
	        type: 'POST',
	        url: 'extensiones/captcha/buscarNombreTrabajador.php',
	        dataType: 'text',
	        data: { 'cod' : jefeVentas },
	        success : function(respuesta){
	            document.getElementById('nombreJefeVentas').value = respuesta;
	        }
	    });
  	}

  	if (agencia == "") {
  	}else{
  		document.getElementById('codFuneraria').value = agencia;
  		$.ajax({
	        type: 'POST',
	        url: 'extensiones/captcha/buscaNombreFuneraria.php',
	        dataType: 'text',
	        data: { 'cod' : agencia },
	        success : function(respuesta){
	            document.getElementById('dscFuneraria').value = respuesta;
	        }
	    });
  	}

  	$.ajax({
		type: 'POST',
        url:"ajax/segCtt.ajax.php",
        dataType: 'text',
        data: {'accion' : 'getDatosCtt', 'localidad' : localidad, 'cod_contrato' : codCtt, 'cod_servicio' : numSer},
        success: function(respuesta){

        	var info = JSON.parse(respuesta);
        	document.getElementById('cttSegCon').value = info.contrato;
        	document.getElementById('dscCliSegCtt').value = info.cliente;
        	document.getElementById('dscLocSegCtt').value = info.dsc_localidad;
        	document.getElementById('numCttSegCtt').value = info.contrato;
        	document.getElementById('tipCttSegCtt').value = info.tipoCtt;
        	document.getElementById('progSegCtt').value = info.programa;
        	if (info.modificado == "SI") {
        		$('#modificadoSegCtt').prop("checked", true);
        	}else{
        		$('#modificadoSegCtt').prop("checked", false);
        	}

        }//succes
    });//ajax

  	$.ajax({
		type: 'POST',
        url:"ajax/segCtt.ajax.php",
        dataType: 'text',
        data: {'accion' : 'getRefinServ', 'localidad' : localidad, 'cod_contrato' : codCtt, 'cod_servicio' : numSer},
        success: function(respuesta){

        	var info = JSON.parse(respuesta);
        	$("#tbodyRef").html(info.tbodyRefinanciamiento);
        	
        }//succes
    });//ajaxgetRefinServ

  	$.ajax({
		type: 'POST',
        url:"ajax/segCtt.ajax.php",
        dataType: 'text',
        data: {'accion' : 'getCuotas', 'localidad' : localidad, 'impTasa' : tasa, 'tipoCtt' : tipoCtt, 'tipoPro' : tipoPro, 'codCtt' : codCtt, 'numRef' : numRef, 'numSer' : numSer},
        success: function(respuesta){

        	var info = JSON.parse(respuesta);

        	$("#tbodyCuotas").html(info.cronograma);
		    document.getElementById("total").innerHTML = info.total;
		    document.getElementById("saldoTotal").innerHTML = info.totalSaldo;
		    document.getElementById("moraTotal").innerHTML = info.totalMora;
        	
        }//succes
    });//ajaxGetCuotas

    $.ajax({
		type: 'POST',
        url:"ajax/segCtt.ajax.php",
        dataType: 'text',
        data: {'accion' : 'getResumenCtt', 'as_localidad' : localidad, 'as_tipo_ctt' : tipoCtt, 'as_contrato' : codCtt, 'as_servicio' : numSer, 'ai_ref' : numRef, 'as_tipo_programa' : tipoPro},
        success: function(respuesta){

        	var info = JSON.parse(respuesta);

        	document.getElementById('cuoTotReg').value = info.ctd_total;
        	document.getElementById('cuoCanReg').value = info.ctd_can;
        	document.getElementById('cuoPenReg').value = info.ctd_total - info.ctd_can;
        	document.getElementById('cuoTotFOMA').value = info.ctd_foma;
        	document.getElementById('cuoCanFOMA').value = info.ctd_can_foma;
        	document.getElementById('cuoPenFOMA').value = info.ctd_foma - info.ctd_can_foma;

        	document.getElementById("imp_sub_cui").innerHTML = info.imp_sub_cui;
		    document.getElementById("imp_int_cui").innerHTML = info.imp_int_cui;
		    document.getElementById("imp_igv_cui").innerHTML = info.imp_igv_cui;
		    document.getElementById("imp_tot_cui").innerHTML = info.imp_tot_cui;
		    document.getElementById("imp_emi_cui").innerHTML = info.imp_emi_cui;
		    document.getElementById("imp_can_cui").innerHTML = info.imp_can_cui;
		    document.getElementById("imp_sal_cui").innerHTML = info.imp_sal_cui;

		    document.getElementById("imp_sub_reg").innerHTML = info.imp_sub_reg;
		    document.getElementById("imp_int_reg").innerHTML = info.imp_int_reg;
		    document.getElementById("imp_igv_reg").innerHTML = info.imp_igv_reg;
		    document.getElementById("imp_tot_reg").innerHTML = info.imp_total_reg;
		    document.getElementById("imp_emi_reg").innerHTML = info.imp_emi_reg;
		    document.getElementById("imp_can_reg").innerHTML = info.imp_can_reg;
		    document.getElementById("imp_sal_reg").innerHTML = info.imp_sal_reg;

		    document.getElementById("imp_sub_foma").innerHTML = info.imp_sub_foma;
		    document.getElementById("imp_int_foma").innerHTML = info.imp_int_foma;
		    document.getElementById("imp_igv_foma").innerHTML = info.imp_igv_foma;
		    document.getElementById("imp_tot_foma").innerHTML = info.imp_tot_foma;
		    document.getElementById("imp_emi_foma").innerHTML = info.imp_emi_foma;
		    document.getElementById("imp_can_foma").innerHTML = info.imp_can_fma;
		    document.getElementById("imp_sal_foma").innerHTML = info.imp_sal_foma;

		    document.getElementById('estadoSaldos').value = info.dsc_estado;
        	document.getElementById('monedaSaldos').value = info.cod_moneda;
        }//succes
    });//ajaxgetResumenCtt

    $.ajax({
		type: 'POST',
        url:"ajax/segCtt.ajax.php",
        dataType: 'text',
        data: {'accion' : 'getDatosEspacio', 'cod_contrato' : codCtt, 'cod_servicio' : numSer},
        success: function(respuesta){
        	var info = JSON.parse(respuesta);
        	document.getElementById('idPropietario').value = info.cod_empresa ;
        	document.getElementById('campoSantoSegCtt').value = info.dsc_camposanto;
        	document.getElementById('platSegCtt').value = info.dsc_plataforma;
        	document.getElementById('areaSegCtt').value = info.dsc_area;
        	document.getElementById('tipEspSegCtt').value = info.tipo_espacio;
        	document.getElementById('ejeHorSeCtt').value = info.eje_hor;
        	document.getElementById('ejeVerSeCtt').value = info.eje_ver;
        	document.getElementById('espacioSegCtt').value = info.cod_espacio;
        	document.getElementById('nivelSegCtt').value = info.nivel;

        	document.getElementById('imp_interes').value = info.imp_interes;
        	document.getElementById('imp_cuoi').value = info.imp_cuoi;
        	document.getElementById('imp_subtotal').value = info.imp_subtotal;
        	document.getElementById('tipo_necesidad').value = info.tipo_nec;
        	document.getElementById('imp_saldo').value = info.imp_saldofinanciar;
        	document.getElementById('imp_igv').value = info.imp_igv;
        	document.getElementById('imp_total').value = info.imp_totalneto;
        	if (info.moneda == "SOL") {
        		document.getElementById('monedaCtt').value = "S/.";
        	}

        	$.ajax({
				type: 'POST',
		        url:"ajax/segCtt.ajax.php",
		        dataType: 'text',
		        data: {'accion' : 'getServPrincipal', 'localidad' : localidad, 'cod_contrato' : codCtt, 'cod_servicio' : numSer},
		        success: function(respuesta){

		        	var info = JSON.parse(respuesta);

		        	$("#tbodyServPrincipal").html(info.tableServPrincipal);
		        	
		        }//succes
		    });//ajaxGetTblServPrincipal

		    $.ajax({
				type: 'POST',
		        url:"ajax/segCtt.ajax.php",
		        dataType: 'text',
		        data: {'accion' : 'getDsctoServicio', 'localidad' : localidad, 'cod_contrato' : codCtt, 'cod_servicio' : numSer},
		        success: function(respuesta){

		        	var info = JSON.parse(respuesta);

		        	$("#tbodyDsctoServicio").html(info.tableDsctoServicio);
		        	document.getElementById("dsctoTotal").innerHTML = info.imp_sub_cui;
		        	
		        }//succes
		    });//ajaxGetDsctoServicio

		    $.ajax({
				type: 'POST',
		        url:"ajax/segCtt.ajax.php",
		        dataType: 'text',
		        data: {'accion' : 'getEndoServicio', 'localidad' : localidad, 'cod_contrato' : codCtt, 'cod_servicio' : numSer},
		        success: function(respuesta){

		        	var info = JSON.parse(respuesta);

		        	$("#tbodyEndoServicio").html(info.tableEndoServicio);
		        	document.getElementById("endoso_total").innerHTML = info.valor_total;
		        	document.getElementById("saldo_total").innerHTML = info.saldo_total;
		        	document.getElementById("emitido_total").innerHTML = info.emitido_total;
		        	
		        }//succes
		    });//ajaxGetDsctoServicio
        	
        }//succes
    });//ajaxGetDatosEspacio

    $.ajax({
		type: 'POST',
		url:"ajax/segCtt.ajax.php",
		dataType: 'text',
		data: {'accion' : 'getDetFinanciamiento', 'localidad' : localidad, 'cod_contrato' : codCtt, 'num_refinanciamiento' : numRef},
		    success: function(respuesta){

		   	var info = JSON.parse(respuesta);

		   	$("#tbodyDetFin").html(info.tableDetFinanciamiento);
		   	document.getElementById("det_fin_saldo_total").innerHTML = info.saldoTotal;
		        	
		    }//succes
	});//ajaxGetDetFinanciamiento

	$.ajax({
		type: 'POST',
		url:"ajax/segCtt.ajax.php",
		dataType: 'text',
		data: {'accion' : 'getCuotasCron', 'localidad' : localidad, 'cod_contrato' : codCtt, 'num_refinanciamiento' : numRef},
		    success: function(respuesta){

		   	var info = JSON.parse(respuesta);

		   	$("#tbodyCronograma").html(info.tbodyCronograma);
		   	document.getElementById("num_cuotas_SegCtt").innerHTML = info.cuotas;
		   	document.getElementById("cuo_subtotal_total").innerHTML = info.imp_principal_total;
		   	document.getElementById("cuo_interes_total").innerHTML = info.imp_interes_total;
		   	document.getElementById("cuo_igv_total").innerHTML = info.imp_igv_total;
		   	document.getElementById("cuo_total_total").innerHTML = info.imp_total_total;
		   	document.getElementById("cuo_saldo_total").innerHTML = info.imp_saldo_total;
		   	document.getElementById("cuo_emitido_total").innerHTML = info.imp_totalemitido_total;
		   	document.getElementById("cuo_cancelado_total").innerHTML = info.imp_totalpagado_total;
		   	document.getElementById("cuo_mora_total").innerHTML = info.imp_mora_total;
		   	var cronograma = document.getElementById('tbodyCronograma');
            var cronogramaLenght = cronograma.rows.length;
            var primeraCuota = cronograma.rows.item(0);
            primeraCuota.click();
		        	
		    }//succes
	});//ajaxGetDetFinanciamiento

	$.ajax({
		type: 'POST',
	    url:"ajax/segCtt.ajax.php",
	    dataType: 'text',
	    data: {'accion' : 'getAutorizacion', 'localidad' : localidad, 'cod_contrato' : codCtt, 'cod_servicio' : numSer},
	    success: function(respuesta){
	       	var info = JSON.parse(respuesta);
	       	$("#tbodyAutorizacion").html(info.tablaAutorizacion);
	       	var tAutorizacion = document.getElementById('tbodyAutorizacion');
            var tAutorizacionLenght = tAutorizacion.rows.length;
            if (tAutorizacionLenght == 0) {

            }else{
            	var primeraAutorizacion = tAutorizacion.rows.item(0);
	            primeraAutorizacion.click();
            }
		}//succes
	});//ajaxGetAutorizacion

    $.ajax({
		type: 'POST',
        url:"ajax/segCtt.ajax.php",
        dataType: 'text',
        data: {'accion' : 'getBeneficiarios', 'localidad' : localidad, 'cod_contrato' : codCtt, 'cod_servicio' : numSer},
        success: function(respuesta){
        	var info = JSON.parse(respuesta);
        	$("#tbodyBeneficiarios").html(info.tablaBeneficiarios);
        	var benefTable = document.getElementById('tbodyBeneficiarios');
            var benefTableLenght = benefTable.rows.length;
            if (benefTableLenght == 0) {

            }else{
            	var beneficiario1 = benefTable.rows.item(0);
	            beneficiario1.click();
            }
        }//succes
    });//ajaxGetBeneficiarios

    cargaGestionCartera(localidad,codCtt,numSer,numRef);
}














init();

