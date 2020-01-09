$("#codContrato").number(true, 0, ',', '');

function buscaCtto(){
	var codCtto = document.getElementById("codContrato").value;
	if(codCtto != '' || codCtto != null){
		llenaDatos(codCtto);
	}
	else{
		$('#tablaCttoBusq').html('<div class="loader"></div>');
        $.ajax({
            url: 'ajax/modifCtto.ajax.php',
            dataType: 'text',
            method: "POST",
            data: { 'accion' : 'tabla' },
            success : function(respuesta){
                $('#tablaCttoBusq').html('')
                $("#tablaCttoBusq").html(respuesta);
                $('#myTableCtto').DataTable();
            }
        });
    }
}

function llenaDatos(codCtto){
	$.ajax({
        url: 'ajax/modifCtto.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'conCodigo', 'codCtto' : codCtto },
        success : function(respuesta){
        	var longResp = respuesta.lenght;
        	console.log('respuesta',respuesta[1]);
        	document.getElementById("codContrato").value = respuesta[0]['cod_contrato'];
        	$("#tipoPrograma option[value='"+respuesta[0]['cod_tipo_programa']+"']").attr("selected",true);
        	if(respuesta[0]['cod_tipo_programa'] = 'TR000'){
        		$("#progContrato").val('CONTRATO DE SERVICIO');
        	}
        	else{
        		$("#progContrato").val('SERVICIO PRE-INSCRITO');
        	}
        	if(respuesta[0]['flg_ctt_modif'] == null || respuesta[0]['flg_ctt_modif'] == 'NO'){
        		$("#checkModif").prop("checked", false);
        	}
        	else{
        		$("#checkModif").prop("checked", true);
        	}
        	$("#modC").val(respuesta[0]['cod_tipo_ctt']);
        	$("#nomCliContrato").val(respuesta[0]['dsc_cliente']);
        	$("#campoContrato").val(respuesta[0]['dsc_camposanto']);
        	$("#platContrato").val(respuesta[0]['dsc_plataforma']);
        	$("#areaContrato").val(respuesta[0]['dsc_area']);
        	$("#ejeHCotrato").val(respuesta[0]['cod_ejehorizontal_actual']);
        	$("#ejeVContrato").val(respuesta[0]['cod_ejevertical_actual']);
        	$("#espacioContrato").val(respuesta[0]['cod_espacio_actual']);
        	document.getElementById("tipoEspModifContrato").value = respuesta[0]['dsc_tipo_espacio'];
        	var linea = '';
        	for(i = 0; i < longResp; i++){
        		$("#tableDetCttoModif tbody").append('<tr>'+
					'<td class="text-center">'+respuesta[i]['num_servicio']+'</td>'+
					'<td class="text-left">'+respuesta[i]['dsc_tipo_servicio']+'</td>'+
					'<td class="text-right">'+probando+'</td>'+
					'<td class="text-right">'+probando+'</td>'+
					'<td class="text-right">'+probando+'</td>'+
					'<td class="text-right">'+probando+'</td>'+
					'<td class="text-right tdSgvDrvSmlCrnFinVista">'+probando+'</td>'+
					'<td class="text-right tdTotalSmlCrnFinVista">'+probando+'</td>'+
				'</tr>');
        	}
        }
    });
}
