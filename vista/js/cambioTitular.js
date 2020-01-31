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
        		var filaServicio = "<tr onclick=mostrarServicio('"+value['cod_localidad']+"','"+value['cod_contrato']+"','"+value['num_refinanciamiento']+"','"+value['num_servicio']+"','"+value['cod_tipo_ctt']+"','"+value['cod_tipo_programa']+"','"+value['cod_cliente']+"','"+value['cod_cliente_anterior']+"')>"+
        								"<td>"+value['num_servicio']+"</td>"+
        								"<td>"+value['dsc_tipo_servicio']+"</td>"+
        								"<td>"+value['fch_generacion']+"</td>"+
        								"<td>"+value['fch_emision']+"</td>"+
        								"<td>"+value['fch_activacion']+"</td>"+
        								"<td>"+value['fch_anulacion']+"</td>"+
        								"<td>"+value['fch_resolucion']+"</td>"+
        								"<td>"+value['fch_transferencia']+"</td>"+
        							"</td>";

				document.getElementById("tbodyServicios").insertAdjacentHTML("beforeEnd" ,filaServicio);
        	});//each
        	var tbodyServicios = document.getElementById('tbodyServicios');
	        var primeraFilaServicios = tbodyServicios.rows.item(0);
	        primeraFilaServicios.click();
        }//succes
    });//ajax
});

function mostrarServicio(localidad,contrato,refinanciamiento,servicio,tipoCtt,tipoProg,codTitular,codTitularAnt){
	limpiarNuevoTitular();
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
        	document.getElementById('paisTitular').value = info[0].dsc_pais;
        	document.getElementById('depTitular').value = info[0].dsc_departamento;
        	document.getElementById('provTitular').value = info[0].dsc_provincia;
        	document.getElementById('distTitular').value = info[0].dsc_distrito;
        	document.getElementById('direccionTitular').value = info[0].dsc_direccion;
        	document.getElementById('refDirTitular').value = info[0].dsc_referencia;

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
        	document.getElementById('paisNuevoTitular').value = info[0].dsc_pais;
        	document.getElementById('departamentoNuevoTitular').value = info[0].dsc_departamento;
        	document.getElementById('provinciaNuevoTitular').value = info[0].dsc_provincia;
        	document.getElementById('distritoNuevoTitular').value = info[0].dsc_distrito;
        	document.getElementById('direccionNuevoTitular').value = info[0].dsc_direccion;
        	document.getElementById('refDirNuevoTitular').value = info[0].dsc_referencia;

        }//succes
    });//ajax
}

getParameterByName();