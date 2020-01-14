$("#codContrato").number(true, 0, ',', '');
$("#cuota").number(true,2);
$("#interes").number(true,2);
$("#saldoFinanciar").number(true,2);
$("#cuotaInicial").number(true,2);
$("#igv").number(true,2);
$("#subtotal").number(true,2);
$("#total").number(true,2);
$("#fchNacTitular").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true
});//datepicker
$("#fchNac2doTitular").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true
});//datepicker

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
        	// console.log('respuesta',respuesta[1]);
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
        data: { 'accion' : 'DetServ', 'codCtto' : codCtto, 'num_servicio' : id },
        success : function(respuesta){
        	// console.log('respuesta',respuesta);
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
        	$("#numServicio").val(respuesta['num_servicio']);
        	$("#idPropietario").val(respuesta['cod_empresa']);
        	$("#dscPropietario").val(respuesta['dsc_camposanto']);
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
        	$("#codCliTitular").val(respuesta['cod_cliente']).trigger('change');
        	$("#codCliTitular2").val(respuesta['cod_titular_alterno']).trigger('change');
        	$("#codAval").val(respuesta['cod_aval']).trigger('change');
        	$.ajax({
		        url: 'ajax/modifCtto.ajax.php',
		        dataType: 'json',
		        method: "POST",
		        data: { 'accion' : 'servPpal', 'codCtto' : codCtto, 'num_servicio' : id },
		        success : function(respuesta){
		        	// console.log('respuesta',respuesta);
		        	$("#bodyServiciosPpales").empty();
		        	var total = 0;
		        	$.each(respuesta,function(index,value){
		        		total = total + parseFloat(value['imp_total']);
		        		var fila = '<tr>'+
									'<td>1</td>'+
									'<td>'+value['cod_servicio_principal']+'</td>'+
									'<td>'+value['dsc_servicio']+'</td>'+
									'<td>'+value['num_ctd']+'</td>'+
									'<td>'+Number(value['imp_precio_venta']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
									'<td>'+Number(value['imp_min_inhumar']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
									'</td>'+
									'<td>'+Number(value['imp_subtotal']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
									'</td>'+
									'<td>'+Number(value['imp_igv']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
									'</td>'+
									'<td>'+Number(value['imp_total']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
									'</td>'+
								'</tr>';
								// console.log(fila);
						document.getElementById("bodyServiciosPpales").insertAdjacentHTML("beforeEnd" ,fila);
						document.getElementById("totalServPpal").innerText = Number(total).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
					});//each
		        }//success
		    });//ajax
		    buscaDscto();
		    buscaEndoso();
        }//success
    });//ajax
}//muestraInfo

function buscaDscto(){
	var codCtto = $("#codContrato").val();
	var numServicio = $("#numServicio").val();
	$.ajax({
        url: 'ajax/modifCtto.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'DsctoXCtto', 'codCtto' : codCtto, 'num_servicio' : numServicio },
        success : function(respuesta){
        	// console.log('respuesta',respuesta);
        	$("#bodyDsctoModif").empty();
        	var total = 0;
        	$.each(respuesta,function(index,value){
        		total = total + parseFloat(value['imp_dscto']);
        		var check_tasa = '';
				var check_libre = '';
				if(value['flg_tasa'] == 'SI'){
					check_tasa = "<i class='fa fa-check'></i>";
					check_libre = '';
				}else if(value['flg_libre'] == 'SI'){
					check_libre = "<i class='fa fa-check'></i>";
					check_tasa = '';
				}else{
					check_libre = '';
					check_tasa = '';
				}
	        	var filaDsto = '<tr>'+
									'<td>'+value['cod_usuario']+'</td>'+
									'<td>'+value['fch_registro']+'</td>'+
									'<td>'+value['dsc_tipo_descuento']+'</td>'+
									'<td>'+check_tasa+'</td>'+
									'<td>'+check_libre+'</td>'+
									'<td>'+Number(value['imp_valor']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
									'<td>'+Number(value['imp_dscto']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
								'</tr>';
							// console.log(fila);
				document.getElementById("bodyDsctoModif").insertAdjacentHTML("beforeEnd" ,filaDsto);
				document.getElementById("totalDsctoModif").innerText = Number(total).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });

        	});//each
        }//success
    });//ajax
}//buscaDscto

function buscaEndoso(){
	var codCtto = $("#codContrato").val();
	var numServicio = $("#numServicio").val();
	$.ajax({
        url: 'ajax/modifCtto.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'EndXCtto', 'codCtto' : codCtto, 'num_servicio' : numServicio },
        success : function(respuesta){
        	// console.log('respuesta',respuesta);
        	$("#bodyEndosoModif").empty();
        	var totalSaldo = 0;
        	var totalEmitido = 0;
        	var totalValor = 0;
        	$.each(respuesta,function(index,value){
        		totalSaldo = totalSaldo + parseFloat(value['imp_valor']);
        		totalEmitido = totalEmitido + parseFloat(value['imp_saldo']);
        		totalValor = totalValor + parseFloat(value['imp_total_emitido']);
        		var filaDsto = '<tr>'+
									'<td>'+value['cod_usuario']+'</td>'+
									'<td>'+value['fch_registro']+'</td>'+
									'<td>'+value['cod_estado']+'</td>'+
									'<td>'+value['fch_vencimiento']+'</td>'+
									'<td>'+value['fch_cancelacion']+'</td>'+
									'<td style="text-align: left;">'+value['dsc_entidad']+'</td>'+
									'<td>'+Number(value['imp_valor']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
									'<td>'+Number(value['imp_saldo']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
									'<td>'+Number(value['imp_total_emitido']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
								'</tr>';
							// console.log(fila);
				document.getElementById("bodyEndosoModif").insertAdjacentHTML("beforeEnd" ,filaDsto);
				document.getElementById("totalSaldoEndosoModif").innerText = Number(totalSaldo).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
				document.getElementById("totalEmiEndosoModif").innerText = Number(totalEmitido).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
				document.getElementById("totalValEndosoModif").innerText = Number(totalValor).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
        	});//each
        }//success
    });//ajax
}//buscaEndoso

function buscaDatosTi(){
	var codCliente = $("#codCliTitular").val();
	$.ajax({
        url: 'ajax/modifCtto.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'buscaCli', 'codCliente' : codCliente },
        success : function(respuesta){
        	// console.log('respuesta',respuesta);
        	var juridico = false;
        	$("#numDocTitular").val(respuesta['dsc_documento']);
			document.getElementById("docIdeTitular").setAttribute('value',respuesta['cod_tipo_documento']);
            if(respuesta['flg_juridico'] == 'SI'){
            	juridico = true;
            }
            $("#juridicoCheck").prop("checked", juridico);
            $("#fchNacTitular").datepicker('setDate', respuesta['fch_nacimiento']);
            $("#apePatTitular").val(respuesta['dsc_apellido_paterno']);
            $("#apeMatTitular").val(respuesta['dsc_apellido_materno']);
            $("#nomTitular").val(respuesta['dsc_nombre']);
            $("#razSocTitular").val(respuesta['dsc_razon_social']);
            $("#cel1Titular").val(respuesta['dsc_telefono_1']);
            $("#cel2Titular").val(respuesta['dsc_telefono_2']);
            $("#edoCivilTitular").val(respuesta['cod_estadocivil']);
            $("#sexoTitular").val(respuesta['cod_sexo'].trim());
            $("#emailTitular").val(respuesta['dsc_email']);
            document.getElementById("paisTitular").setAttribute('value',respuesta['dsc_pais']);
            document.getElementById("departamentoTitular").setAttribute('value',respuesta['dsc_departamento']);
            document.getElementById("provinciaTitular").setAttribute('value',respuesta['dsc_provincia']);
            document.getElementById("distritoTitular").setAttribute('value',respuesta['dsc_distrito']);
            $("#direccionTitular").val(respuesta['dsc_direccion']);
            $("#refDirTitular").val(respuesta['dsc_referencia']);
            $("#zonaDirTitular").val(respuesta['dsc_tipo_zona']);
        }//success
    });//ajax
}//buscaDatosTi

function buscaDatos2Ti(){
	var codCliente = $("#cod2doTitular").val();
	$.ajax({
        url: 'ajax/modifCtto.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'buscaCli', 'codCliente' : codCliente },
        success : function(respuesta){
        	console.log('respuesta',respuesta);
        	var juridico = false;
        	$("#numDocTitular2").val(respuesta['dsc_documento']);
			document.getElementById("docIdeTitular2").setAttribute('value',respuesta['cod_tipo_documento']);
            if(respuesta['flg_juridico'] == 'SI'){
            	juridico = true;
            }
            $("#juridico2doCheck").prop("checked", juridico);
            $("#fchNac2doTitular").datepicker('setDate', respuesta['fch_nacimiento']);
            $("#apePatTitular2").val(respuesta['dsc_apellido_paterno']);
            $("#apeMatTitular2").val(respuesta['dsc_apellido_materno']);
            $("#nomTitular2").val(respuesta['dsc_nombre']);
            $("#razSocTitular2").val(respuesta['dsc_razon_social']);
            $("#cel1Titular2").val(respuesta['dsc_telefono_1']);
            $("#cel2Titular2").val(respuesta['dsc_telefono_2']);
            $("#edoCivilTitular2").val(respuesta['cod_estadocivil']);
            $("#sexoTitular2").val(respuesta['cod_sexo'].trim());
            $("#emailTitular2").val(respuesta['dsc_email']);
            document.getElementById("paisTitular2").setAttribute('value',respuesta['dsc_pais']);
            document.getElementById("departamentoTitular2").setAttribute('value',respuesta['dsc_departamento']);
            document.getElementById("provinciaTitular2").setAttribute('value',respuesta['dsc_provincia']);
            document.getElementById("distritoTitular2").setAttribute('value',respuesta['dsc_distrito']);
            $("#direccionTitular2").val(respuesta['dsc_direccion']);
            $("#refDirTitular2").val(respuesta['dsc_referencia']);
            $("#zonaDirTitular2").val(respuesta['dsc_tipo_zona']);
        }//success
    });//ajax
}//buscaDatos2Ti