$("#codContrato").number(true, 0, ',', '');
$("#cuota").number(true,2);
$("#interes").number(true,2);
$("#saldoFinanciar").number(true,2);
$("#cuotaInicial").number(true,2);
$("#igv").number(true,2);
$("#subtotal").number(true,2);
$("#total").number(true,2);

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
        	$("#bodyDetCttoModif").empty();
        	$.each(respuesta,function(index,value){
        		var fila ='<tr onclick="muestraInfo('+value['num_servicio']+');">'+
					'<td class="text-center">'+value['num_servicio']+'</td>'+
					'<td class="text-left">'+value['dsc_tipo_servicio']+'</td>'+
					'<td class="text-center">'+value['fch_generacion']+'</td>'+
					'<td class="text-center">'+value['fch_emision']+'</td>'+
					'<td class="text-center">'+value['fch_activacion']+'</td>'+
					'<td class="text-center">'+value['fch_anulacion']+'</td>'+
					'<td class="text-center">'+value['fch_resolucion']+'</td>'+
					'<td class="text-center">'+value['fch_transferencia']+'</td>'+
				'</tr>';
				document.getElementById("bodyDetCttoModif").insertAdjacentHTML("beforeEnd" ,fila);
        	});//each
        }//success
    });//ajax
}//llenaDatos

function muestraInfo(id){
	var codCtto = $("#codContrato").val();
	$.ajax({
        url: 'ajax/modifCtto.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'pestannas', 'codCtto' : codCtto, 'num_servicio' : id },
        success : function(respuesta){
        	console.log('respuesta',respuesta);
        	if(respuesta['cod_tipo_necesidad'] == 'NF'){
        		var tipoNec = 'NECESIDAD FUTURA';
        	}else{
        		var tipoNec = 'NECESIDAD INMEDIATA';
        	}
        	if(respuesta['ctd_beneficiario'] == ''){
        		var numBenef = 0;	
        	} else{
        		var numBenef = respuesta['ctd_beneficiario'];
        	}
        	$("#idPropietario").val(respuesta['cod_empresa']);
        	$("#tipoServicio").val(respuesta['dsc_tipo_servicio']);
        	$("#tipoNecesidad").val(tipoNec);
        	$("#convenio").val(respuesta['dsc_entidad']);
        	$("#formaCobro").val(respuesta['cod_forma_cobro']);
        	$("#numBeneficiarios").val(numBenef);
        	$("#moneda").val(respuesta['cod_moneda']);
        	$("#fechaVencimiento").val(respuesta['fch_primer_vencimiento']);
        	$("#cuota").val(respuesta['imp_valor_cuota']);
        	$("#interes").val(respuesta['imp_interes']);
        	$("#saldoFinanciar").val(respuesta['imp_saldofinanciar']);
        	$("#cuotaInicial").val(respuesta['imp_cuoi']);
        	$("#igv").val(respuesta['imp_igv']);
        	$("#subtotal").val(respuesta['imp_subtotal']);
        	$("#total").val(respuesta['imp_totalneto']);
        	var fila = '<tr>'+
							'<td>1</td>'+
							'<td>'+respuesta['cod_servicio_principal']+'</td>'+
							'<td>'+respuesta['dsc_servicio']+'</td>'+
							'<td>1</td>'+
							'<td>9.300,00</td>'+
							'<td>3.815,00</td>'+
							'<td>7.600,00</td>'+
							'<td>0,00</td>'+
							'<td>7.600,00</td>'+
						'</tr>';
			document.getElementById("bodyServiciosPpales").insertAdjacentHTML("beforeEnd" ,fila);

        }//success
    });//ajax
}//muestraInfo