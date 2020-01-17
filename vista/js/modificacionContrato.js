$("#codContrato").number(true, 0, ',', '');
$("#cuota").number(true,2);
$("#interes").number(true,2);
$("#saldoFinanciar").number(true,2);
$("#cuotaInicial").number(true,2);
$("#igv").number(true,2);
$("#subtotal").number(true,2);
$("#total").number(true,2);
$("#saldoFinCronograma").number(true,2);
$("#valCuo").number(true,2);
$("#saldoFOMA").number(true,2);
$("#fchNacTitular").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true
});//datepicker
$("#fchNac2doTitular").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true
});//datepicker
$("#fchVenCronograma").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true
});//datepicker
$("#fchVenCronoFOMA").datepicker({
	format : 'dd-mm-yyyy',
	autoclose: true
});//datepicker
$("#fchNacBenef").datepicker({
	format : 'dd-mm-yyyy',
	autoclose: true
});//datepicker
$("#fchDecBenef").datepicker({
	format : 'dd-mm-yyyy',
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
        	$("#codCliTitular2").val(respuesta['cod_titular_alterno']);
        	if(respuesta['cod_titular_alterno'] != ''){
        		$("#codCliTitular2").trigger('change');
        	}
        	$("#codAval").val(respuesta['cod_aval']);
        	if(respuesta['cod_aval'] != ''){
        		$("#codAval").trigger('change');
        	}
        	$("#saldoFinCronograma").val(respuesta['imp_saldofinanciar']);
        	if(respuesta['imp_saldofinanciar'] != 0){
        		cargaCronograma(codCtto,respuesta['num_refinanciamiento']);
        		cargaFoma(codCtto,respuesta['num_refinanciamiento']);
        	}
        	$("#numCuoCronograma").val(respuesta['num_cuotas']);
        	$("#fchVenCronograma").val(respuesta['fch_primer_vencimiento']);
        	$("#interesCronograma").val(respuesta['imp_interes']);
        	$("#codCobrador").val(respuesta['cod_cobrador']).trigger('change');
        	$("#codSupervisor").val(respuesta['cod_supervisor']).trigger('change');
        	$("#codJefeVentas").val(respuesta['cod_jefeventas']).trigger('change');
        	$("#codVendedor").val(respuesta['cod_vendedor']).trigger('change');
        	$("#codTipoComisionista").val(respuesta['cod_tipo_comisionista']).trigger('change');
        	$("#codGrupo").val(respuesta['cod_grupo']).trigger('change');
        	$("#canalVentaModif").val(respuesta['cod_canal_venta']);
        	if(respuesta['flg_agencia'] == 'NO' || respuesta['flg_agencia'] == '' || respuesta['flg_agencia'] == null){
        		$('#AgFunCheck').prop("checked", false);
        		$("#AgFunCheck").trigger('change');
        	}else{
        		$('#AgFunCheck').prop("checked", true);
        		$("#AgFunCheck").trigger('change');
        	}
        	$("#codFuneraria").val(respuesta['cod_agencia']).trigger('change');
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
        	// console.log('respuesta',respuesta.length);
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


//-------------------pestaña titulares

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
             if(respuesta['cod_sexo'] != '' || respuesta['cod_sexo'] != null || respuesta['cod_sexo'] != 'undefinied'){
            	sexo = respuesta['cod_sexo'].trim();
            }else{
            	sexo = '';
            }
            $("#sexoTitular").val(sexo);
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
	var codCliente = $("#codCliTitular2").val();
	$.ajax({
        url: 'ajax/modifCtto.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'buscaCli', 'codCliente' : codCliente },
        success : function(respuesta){
        	// console.log('respuesta',respuesta);
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
            if(respuesta['cod_sexo'] != '' || respuesta['cod_sexo'] != null || respuesta['cod_sexo'] != 'undefinied'){
            	sexo = respuesta['cod_sexo'].trim();
            }else{
            	sexo = '';
            }
            $("#sexoTitular2").val(sexo);
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

function buscaDatosAval(){
	var codCliente = $("#codAval").val();
	$.ajax({
        url: 'ajax/modifCtto.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'buscaCli', 'codCliente' : codCliente },
        success : function(respuesta){
        	// console.log('respuesta',respuesta);
        	var juridico = false;
        	$("#numDocAval").val(respuesta['dsc_documento']);
			document.getElementById("docIdeAval").setAttribute('value',respuesta['cod_tipo_documento']);
            if(respuesta['flg_juridico'] == 'SI'){
            	juridico = true;
            }
            $("#juridico2doCheck").prop("checked", juridico);
            $("#fchNac2doTitular").datepicker('setDate', respuesta['fch_nacimiento']);
            $("#apePatAval").val(respuesta['dsc_apellido_paterno']);
            $("#apeMatAval").val(respuesta['dsc_apellido_materno']);
            $("#nomAval").val(respuesta['dsc_nombre']);
            $("#razSocAval").val(respuesta['dsc_razon_social']);
            $("#cel1Aval").val(respuesta['dsc_telefono_1']);
            $("#cel2Aval").val(respuesta['dsc_telefono_2']);
            $("#edoCivilAval").val(respuesta['cod_estadocivil']);
             if(respuesta['cod_sexo'] != '' || respuesta['cod_sexo'] != null || respuesta['cod_sexo'] != 'undefinied'){
            	sexo = respuesta['cod_sexo'].trim();
            }else{
            	sexo = '';
            }
            $("#sexoAval").val(sexo);
            $("#emailAval").val(respuesta['dsc_email']);
            document.getElementById("paisAval").setAttribute('value',respuesta['dsc_pais']);
            document.getElementById("departamentoAval").setAttribute('value',respuesta['dsc_departamento']);
            document.getElementById("provinciaAval").setAttribute('value',respuesta['dsc_provincia']);
            document.getElementById("distritoAval").setAttribute('value',respuesta['dsc_distrito']);
            $("#direccionAval").val(respuesta['dsc_direccion']);
            $("#refDirAval").val(respuesta['dsc_referencia']);
            $("#zonaDirAval").val(respuesta['dsc_tipo_zona']);
        }//success
    });//ajax
}//buscaDatos2Ti

//-------------------pestaña gestion

function apagar(){
    var checkbox = document.getElementById('AgFunCheck');
  if (checkbox.checked == true){
  	$("#codFuneraria").prop('disabled',false);
  	$("#btnAgFun").prop('disabled',false);
  	$("#dscFuneraria").prop('disabled',false); 	
  }
  else{
  	$('#codFuneraria').prop('disabled',true);
  	$('#btnAgFun').prop('disabled',true);
  	$('#dscFuneraria').prop('disabled',true);
  }
}  

function nombreTrabajador(valor,campo){
    $.ajax({
        type: 'GET',
        url: 'extensiones/captcha/buscaNombre.php',
        dataType: 'text',
        data: { 'value' : valor },
        success : function(respuesta){
            document.getElementById(campo).value = respuesta;
        }
    });
}//nombreTrabajador

function nombreGrupoVenta(valor,campo){
    $.ajax({
        type: 'POST',
        url: 'extensiones/captcha/buscarNombreGrupo.php',
        dataType: 'text',
        data: { 'cod' : valor },
        success : function(respuesta){
            document.getElementById(campo).value = respuesta;
        }
    });
}//nombreGrupoVenta

function nombreComisionista(valor,campo){
    $.ajax({
        type: 'POST',
        url: 'extensiones/captcha/buscaNombreComisionista.php',
        dataType: 'text',
        data: { 'cod' : valor },
        success : function(respuesta){
            document.getElementById(campo).value = respuesta;
        }
    });
}//nombreGrupoVenta

function nombreFuneraria(valor,campo){
    $.ajax({
        type: 'POST',
        url: 'extensiones/captcha/buscaNombreFuneraria.php',
        dataType: 'text',
        data: { 'cod' : valor },
        success : function(respuesta){
            document.getElementById(campo).value = respuesta;
        }
    });
}//nombreGrupoVenta

//-------------------------cronograma y foma------------------------

function cargaCronograma(codCtto,numRefi){
	$.ajax({
        url: 'ajax/modifCtto.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'cronograma', 'codCtto' : codCtto, 'num_refinanciamiento' : numRefi },
        success : function(respuesta){
        	// console.log('respuesta',respuesta);
        	$("#bodyCronogramaModif").empty();
        	var totalSubtotal = 0;
        	var totalInteres = 0;
        	var totalIGV = 0;
        	var totalTotal = 0;
        	var totalSaldo = 0;
        	$.each(respuesta,function(index,value){
        		totalSubtotal = totalSubtotal + parseFloat(value['imp_total']);
        		totalInteres = totalInteres + parseFloat(value['imp_interes']);
        		totalIGV = totalIGV + parseFloat(value['imp_igv']);
        		totalTotal = totalTotal + parseFloat(value['imp_principal']);
        		totalSaldo = totalSaldo + parseFloat(value['imp_saldo']);
        		if(value['cod_estadocuota'] == 'REG'){
        			edoCuota = 'REGISTRADO';
        		}else if (value['cod_estadocuota'] == 'CAN'){
        			edoCuota = 'CANCELADO';
        		}
        		var filaCrono = '<tr>'+
									'<th scope="row">'+value['num_cuota']+'</th>'+
									'<td>'+edoCuota+'</td>'+
									'<td>'+value['fch_vencimiento']+'</td>'+
									'<td style="text-align: right;">'+Number(value['imp_total']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
									'<td style="text-align: right;">'+Number(value['imp_interes']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
									'<td style="text-align: right;">'+Number(value['imp_igv']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
									'<td style="text-align: right;">'+Number(value['imp_principal']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
									'<td style="text-align: right;">'+Number(value['imp_saldo']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
								'</tr>';
							// console.log(filaCrono);
				document.getElementById("bodyCronogramaModif").insertAdjacentHTML("beforeEnd" ,filaCrono);
				document.getElementById("totalSubtotCronoModif").innerText = Number(totalSubtotal).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
				document.getElementById("totalIntCronoModif").innerText = Number(totalInteres).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
				document.getElementById("totalIGVCronoModif").innerText = Number(totalIGV).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
				document.getElementById("totalTotalCronoModif").innerText = Number(totalTotal).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
				document.getElementById("totalSaldoCronoModif").innerText = Number(totalSaldo).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
        	});//each
        }//success
    });//ajax
}

function cargaFoma(codCtto,numRefi){
	$.ajax({
        url: 'ajax/modifCtto.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'FOMA', 'codCtto' : codCtto, 'num_refinanciamiento' : numRefi },
        success : function(respuesta){
        	console.log('respuesta',respuesta);
        	$("#bodyCronogramaFomaModif").empty();
        	var numCuo = 0;
        	var totalTotal = 0;
        	var totalSaldo = 0;
        	$.each(respuesta,function(index,value){
        		numCuo++;
        		totalTotal = totalTotal + parseFloat(value['imp_total']);
        		totalSaldo = totalSaldo + parseFloat(value['imp_saldo']);
        		if(value['cod_estadocuota'] == 'REG'){
        			edoCuota = 'REGISTRADO';
        		}else if (value['cod_estadocuota'] == 'CAN'){
        			edoCuota = 'CANCELADO';
        		}
        		var filaFoma = '<tr>'+
									'<th scope="row">'+value['num_cuota']+'</th>'+
									'<td>'+edoCuota+'</td>'+
									'<td>'+value['fch_vencimiento']+'</td>'+
									'<td style="text-align: right;">'+Number(value['imp_total']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
									'<td style="text-align: right;">'+Number(value['imp_saldo']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
								'</tr>';
				document.getElementById("bodyCronogramaFomaModif").insertAdjacentHTML("beforeEnd" ,filaFoma);
				document.getElementById("totalTotalFomaModif").innerText = Number(totalTotal).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
				document.getElementById("totalSaldoFomaModif").innerText = Number(totalSaldo).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
        	});//each
        	$("#saldoFOMA").val(totalTotal);
        	$("#fchVenCronoFOMA").val(respuesta[0]['fch_vencimiento']);
        	$("#nCuotasFOMA").val(numCuo);
        }//success
    });//ajax
}

//----------------------------pestaña beneficiarios-----------------------------

function cargaFormBenefModif(){

      //---------habilita-------//

  $('#tipoDocBenef').prop('disabled',false);
  $('#numDocBenef').prop('disabled',false);
  $('#apePatBenef').prop('disabled',false);
  $('#apeMatBenef').prop('disabled',false);
  $('#nombreBenef').prop('disabled',false);
  $('#fchNacBenef').prop('disabled',false);
  $('#fchDecBenef').prop('disabled',false);
  $('#religionBenef').prop('disabled',false);
  $('#edoCivilBenef').prop('disabled',false);
  $('#sexoBenef').prop('disabled',false);
  $('#parentescoBenef').prop('disabled',false);
  $('#lugarDecesoBenef').prop('disabled',false);
  $('#motivoDecesoBenef').prop('disabled',false);
  $('#pesoBenef').prop('disabled',false);
  $('#tallaBenef').prop('disabled',false);
  $('#autopsiaBenef').prop('disabled',false);
  
  //---------------limpia--------//

  document.getElementById("tipoDocBenef").value = '';
  document.getElementById("numDocBenef").value = '';
  document.getElementById("apePatBenef").value = '';
  document.getElementById("apeMatBenef").value = '';
  document.getElementById("nombreBenef").value = '';
  $('#fchNacBenef').datepicker('setDate', null);
  $('#fchDecBenef').datepicker('setDate', null);
  document.getElementById("religionBenef").value = '';
  document.getElementById("edoCivilBenef").value = '';
  document.getElementById("sexoBenef").value = '';
  document.getElementById("parentescoBenef").value = '';
  document.getElementById("lugarDecesoBenef").value = '';
  document.getElementById("motivoDecesoBenef").value = '';
  document.getElementById("pesoBenef").value = '';
  document.getElementById("tallaBenef").value = '';
  document.getElementById("autopsiaBenef").value = ''; 

  //---------cambia los botones a guardar y cancelar-----//

  $('#botonAgregarB').prop('hidden',true);
  $('#botonModificarB').prop('hidden',true);
  $('#botonGuardarB').prop('hidden',false);
  $('#botonEditaB').prop('hidden',true);
  $('#botonEliminarB').prop('hidden',true);
  $('#botonDescartarB').prop('hidden',false);
  $('#botonCancelarEdicionB').prop('hidden',true);

  document.getElementById("tipoDocBenef").focus();

}

function verificaBenef(val){
  var row = $("#bodyBeneficiario tr").length;
  if(row > 0){
    var filas = document.querySelectorAll("#bodyBeneficiario tr");
    for (var i = 1; i <= row; i++) {
      result = filas[i-1].querySelectorAll("td");
      com = result[0].innerHTML;
      if(val == com){
        return 1;
        break;
      }
    }
  }
  else{
    return 0;
  }
}

function guardaBenef(){
  var tipoDoc = document.getElementById("tipoDocBenef").value;
  var numDoc = document.getElementById("numDocBenef").value;
  var aux = verificaBenef(numDoc);
  var apellPaterno = document.getElementById("apePatBenef").value;
  var apellMaterno = document.getElementById("apeMatBenef").value;
  var nombre = document.getElementById("nombreBenef").value;
  var fechNac = $('#fchNacBenef').datepicker("getDate");
  var fechDec = $('#fchDecBenef').datepicker("getDate");
  var religion = document.getElementById("religionBenef").value;
  var edoCivil = document.getElementById("edoCivilBenef").value;
  var sexo = document.getElementById("sexoBenef").value;
  var parentesco = document.getElementById("parentescoBenef").value;
  var lugarDeceso = document.getElementById("lugarDecesoBenef").value;
  var motivoDeceso = document.getElementById("motivoDecesoBenef").value;
  var peso = document.getElementById("pesoBenef").value;
  var talla = document.getElementById("tallaBenef").value;
  var autopsia = document.getElementById("autopsiaBenef").checked;
  var registro = [tipoDoc,numDoc,apellPaterno,apellMaterno,nombre,fechNac,fechDec,religion,edoCivil,sexo,parentesco,lugarDeceso,motivoDeceso,peso,talla,autopsia];
  var muestra = '<tr onclick="verDetalles(event)" id="'+numDoc+'"><td class="'+numDoc+'">'+numDoc+'</td><td class="'+numDoc+'">'+nombre+'</td><td class="'+numDoc+'">'+apellPaterno+' '+apellMaterno+'<input type="hidden" id="idBenef" value="'+numDoc+'"><input type="hidden" id="registro_'+numDoc+'" value="'+registro+'"></td></tr>';
  document.getElementById("bodyBeneficiario").insertAdjacentHTML("beforeEnd" ,muestra);

  swal({
        title: "",
        text: "Beneficiario añadido.",
        type: "success",
        confirmButtonText: "Aceptar",
    })

  limpiaydsi(); 
}

function eliminaBenef(id){
  swal({
        title: "¿Está seguro de eliminar el beneficiario?",
        type: "question",
        showCancelButton: !0,
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "No, cancelar"
    }).then(function(e) {
        e.value ? swal({
          title:"Eliminados", 
          text:"Se ha eliminado el beneficiario.",
          type: "success",
          onBeforeOpen: borrarBenef(id)         
        }) : "cancel" === e.dismiss
    })
}

function borrarBenef(id){
  document.getElementById(id).remove();
  limpiaydsi();
}

function activaEditaBenef(id){

  $('#tipoDocBenef').prop('disabled',false);
  $('#numDocBenef').prop('disabled',false);
  $('#apePatBenef').prop('disabled',false);
  $('#apeMatBenef').prop('disabled',false);
  $('#nombreBenef').prop('disabled',false);
  $('#fchNacBenef').prop('disabled',false);
  $('#fchDecBenef').prop('disabled',false);
  $('#religionBenef').prop('disabled',false);
  $('#edoCivilBenef').prop('disabled',false);
  $('#sexoBenef').prop('disabled',false);
  $('#parentescoBenef').prop('disabled',false);
  $('#lugarDecesoBenef').prop('disabled',false);
  $('#motivoDecesoBenef').prop('disabled',false);
  $('#pesoBenef').prop('disabled',false);
  $('#tallaBenef').prop('disabled',false);
  $('#autopsiaBenef').prop('disabled',false);

  //----------cambia los botones a editar y cancelar-------//

  $('#botonAgregarB').prop('hidden',true);
  $('#botonModificarB').prop('hidden',false);
  $('#botonGuardarB').prop('hidden',true);
  $('#botonEditaB').prop('hidden',true);
  $('#botonEliminarB').prop('hidden',true);
  $('#botonDescartarB').prop('hidden',true);
  $('#botonCancelarEdicionB').prop('hidden',false);

  boton = document.getElementById("botonModificarB");
  boton.addEventListener("click", function(){guardaEdicionB(id)}, false);

}

function guardaEdicionB(id){
  var tipoDoc = document.getElementById("tipoDocBenef").value;
  var numDoc = document.getElementById("numDocBenef").value;
  var apellPaterno = document.getElementById("apePatBenef").value;
  var apellMaterno = document.getElementById("apeMatBenef").value;
  var nombre = document.getElementById("nombreBenef").value;
  var fechNac = $('#fchNacBenef').datepicker("getDate");
  var fechDec = $('#fchDecBenef').datepicker("getDate");
  var religion = document.getElementById("religionBenef").value;
  var edoCivil = document.getElementById("edoCivilBenef").value;
  var sexo = document.getElementById("sexoBenef").value;
  var parentesco = document.getElementById("parentescoBenef").value;
  var lugarDeceso = document.getElementById("lugarDecesoBenef").value;
  var motivoDeceso = document.getElementById("motivoDecesoBenef").value;
  var peso = document.getElementById("pesoBenef").value;
  var talla = document.getElementById("tallaBenef").value;
  var autopsia = document.getElementById("autopsiaBenef").checked;
  var registro = [tipoDoc,numDoc,apellPaterno,apellMaterno,nombre,fechNac,fechDec,religion,edoCivil,sexo,parentesco,lugarDeceso,motivoDeceso,peso,talla,autopsia];
  var muestra = '<tr onclick="verDetalles(event)" id="'+numDoc+'"><td class="'+numDoc+'">'+numDoc+'</td><td class="'+numDoc+'">'+nombre+'</td><td class="'+numDoc+'">'+apellPaterno+' '+apellMaterno+'<input type="hidden" id="idBenef" value="'+numDoc+'"><input type="hidden" id="registro_'+numDoc+'" value="'+registro+'"></td></tr>';
  document.getElementById(id).remove();
  document.getElementById("bodyBeneficiario").insertAdjacentHTML("beforeEnd" ,muestra);

  swal({
        title: "",
        text: "Beneficiario modificado.",
        type: "success",
        confirmButtonText: "Aceptar",
    })

  limpiaydsi();
}

function limpiaydsi(){

          //------------limpia------------------//
  
  document.getElementById("tipoDocBenef").value = '';
  document.getElementById("numDocBenef").value = '';
  document.getElementById("apePatBenef").value = '';
  document.getElementById("apeMatBenef").value = '';
  document.getElementById("nombreBenef").value = '';
  $('#fchNacBenef').datepicker('setDate', null);
  $('#fchDecBenef').datepicker('setDate', null);
  document.getElementById("religionBenef").value = '';
  document.getElementById("edoCivilBenef").value = '';
  document.getElementById("sexoBenef").value = '';
  document.getElementById("parentescoBenef").value = '';
  document.getElementById("lugarDecesoBenef").value = '';
  document.getElementById("motivoDecesoBenef").value = '';
  document.getElementById("pesoBenef").value = '';
  document.getElementById("tallaBenef").value = '';
  $('#autopsiaBenef').prop("checked", false);

        //------------deshabilita---------------//

  $('#tipoDocBenef').prop('disabled',true);
  $('#numDocBenef').prop('disabled',true);
  $('#apePatBenef').prop('disabled',true);
  $('#apeMatBenef').prop('disabled',true);
  $('#nombreBenef').prop('disabled',true);
  $('#fchNacBenef').prop('disabled',true);
  $('#fchDecBenef').prop('disabled',true);
  $('#religionBenef').prop('disabled',true);
  $('#edoCivilBenef').prop('disabled',true);
  $('#sexoBenef').prop('disabled',true);
  $('#parentescoBenef').prop('disabled',true);
  $('#lugarDecesoBenef').prop('disabled',true);
  $('#motivoDecesoBenef').prop('disabled',true);
  $('#pesoBenef').prop('disabled',true);
  $('#tallaBenef').prop('disabled',true);
  $('#autopsiaBenef').prop('disabled',true);

  //----------cabia a los botones originales-----------//

  $('#botonAgregarB').prop('hidden',false);
  $('#botonModificarB').prop('hidden',true);
  $('#botonGuardarB').prop('hidden',true);
  $('#botonEditaB').prop('hidden',false);
  $('#botonEliminarB').prop('hidden',false);
  $('#botonDescartarB').prop('hidden',true);
  $('#botonCancelarEdicionB').prop('hidden',true);

}

function verDetalles(evt) {
  var target = evt.srcElement ? evt.srcElement : evt.target;
  var x = target.className;
  var respuesta = document.getElementById("registro_"+x).value;
  var tipoDoc = respuesta.split(",")[0];
  var numDoc = respuesta.split(",")[1];
  var apellPaterno = respuesta.split(",")[2];
  var apellMaterno = respuesta.split(",")[3];
  var nombre = respuesta.split(",")[4];
  var fechNac = respuesta.split(",")[5];
  var fechDec = respuesta.split(",")[6];
  var religion = respuesta.split(",")[7];
  var edoCivil = respuesta.split(",")[8];
  var sexo = respuesta.split(",")[9];
  var parentesco = respuesta.split(",")[10];
  var lugar = respuesta.split(",")[11];
  var motivo = respuesta.split(",")[12];
  var peso = respuesta.split(",")[13];
  var talla = respuesta.split(",")[14];
  var autopsia = respuesta.split(",")[15];

  document.getElementById("tipoDocBenef").setAttribute('value',tipoDoc);
  document.getElementById("tipoDocBenef").value = tipoDoc;
  $('#tipoDocBenef').prop('disabled',true);
  document.getElementById("numDocBenef").setAttribute('value',numDoc);
  document.getElementById("numDocBenef").value = numDoc;
  $('#numDocBenef').prop('disabled',true);
  document.getElementById("apePatBenef").setAttribute('value',apellPaterno);
  document.getElementById("apePatBenef").value = apellPaterno;
  $('#apePatBenef').prop('disabled',true);
  document.getElementById("apeMatBenef").setAttribute('value',apellMaterno);
  document.getElementById("apeMatBenef").value = apellMaterno;
  $('#apeMatBenef').prop('disabled',true);
  document.getElementById("nombreBenef").setAttribute('value',nombre);
  document.getElementById("nombreBenef").value = nombre;
  $('#nombreBenef').prop('disabled',true);
  $('#fchNacBenef').datepicker('setDate', fechNac);
  $('#fchNacBenef').prop('disabled',true);
  $('#fchDecBenef').datepicker('setDate', fechDec);
  $('#fchDecBenef').prop('disabled',true);
  document.getElementById("religionBenef").setAttribute('value',religion);
  document.getElementById("religionBenef").value = religion;
  $('#religionBenef').prop('disabled',true);
  document.getElementById("edoCivilBenef").setAttribute('value',edoCivil);
  document.getElementById("edoCivilBenef").value = edoCivil;
  $('#edoCivilBenef').prop('disabled',true);
  document.getElementById("sexoBenef").setAttribute('value',sexo);
  document.getElementById("sexoBenef").value = sexo;
  $('#sexoBenef').prop('disabled',true);
  document.getElementById("parentescoBenef").setAttribute('value',parentesco);
  document.getElementById("parentescoBenef").value = parentesco;
  $('#parentescoBenef').prop('disabled',true);
  document.getElementById("lugarDecesoBenef").setAttribute('value',lugar);
  document.getElementById("lugarDecesoBenef").value = lugar;
  $('#lugarDecesoBenef').prop('disabled',true);
  document.getElementById("motivoDecesoBenef").setAttribute('value',motivo);
  document.getElementById("motivoDecesoBenef").value = motivo;
  $('#motivoDecesoBenef').prop('disabled',true);
  document.getElementById("pesoBenef").setAttribute('value',peso);
  document.getElementById("pesoBenef").value = peso;
  $('#pesoBenef').prop('disabled',true);
  document.getElementById("tallaBenef").setAttribute('value',talla);
  document.getElementById("tallaBenef").value = talla;
  $('#tallaBenef').prop('disabled',true);
  $('#autopsiaBenef').prop("checked", autopsia);
  $('#autopsiaBenef').prop('disabled',true);
  boton = document.getElementById("botonEditaB");
  boton.addEventListener("click", function(){activaEditaBenef(numDoc)}, false);
  boton2 = document.getElementById("botonEliminarB");
  boton2.addEventListener("click", function(){eliminaBenef(numDoc)}, false);
}