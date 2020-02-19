$("#codContrato").number(true, 0, ',', '');
$('#numDocBenef').number(true, 0, ',', '');
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
$("#fchNacTitular2").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true
});//datepicker
$("#fchNacAval").datepicker({
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
$("#fchEntBenef").datepicker({
    format : 'dd-mm-yyyy',
    autoclose: true
});//datepicker

function getParameterByName() {
    var query = window.location.search.substring(1);
    if (query == "" ) {
    }else{
        var pair = query.split("&");
        var localidad = pair[0].split("=");
        var contrato = pair[1].split("=");
        $("#sedeContrato").val(localidad[1]);
        $("#codContrato").val(contrato[1]);
        llenaDatos(contrato);
    }
}

getParameterByName();

function fechaParaConsulta(dato){
    fecha = new Date(dato);
    var aux_dia = fecha.getDate();
    var aux_mes1 = fecha.setMonth(fecha.getMonth() + 1);
    var aux_mes = fecha.getMonth();
    var  aux_anio = fecha.getFullYear();
    if(aux_mes == '0'){
        aux_mes = '12';
        aux_anio = fecha.getFullYear()-1;
    }               
    var fechaConsulta = aux_mes+'/'+aux_dia+'/'+aux_anio;
    return fechaConsulta;
}
function buscaDatosPeriodo(fechaRes,campo){
    $.ajax({
        type:'GET',
        url: 'extensiones/captcha/getPeriod.php',
        dataType: 'text',
        data: {'fechaRes':fechaRes},
            success : function(response){
                var info = JSON.parse(response);
                $("#anio"+campo+"Aud").val(info.num_anno);
                $("#tipoPer"+campo+"Aud").val(info.tipo_periodo);
                $("#per"+campo+"Aud").val(info.periodo);
            }//success
        });//ajax
}//buscaDatosPeriodo

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
        	// console.log('respuesta',respuesta);
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
            $("#contGenVendedor").val(respuesta[0]['cod_usuario_generacion']);
            $("#contGenFecha").val(respuesta[0]['fch_generacion']);
            $("#contEmiVendedor").val(respuesta[0]['cod_usuario_emision']);
            $("#contEmiFecha").val(respuesta[0]['fch_emision']);
            $("#contActVendedor").val(respuesta[0]['cod_usuario_activacion']);
            $("#contActFecha").val(respuesta[0]['fch_activacion']);
            $("#contAnuVendedor").val(respuesta[0]['cod_usuario_anulacion']);
            $("#contAnuFecha").val(respuesta[0]['fch_anulacion']);
            $("#contResVendedor").val(respuesta[0]['cod_usuario_resolucion']);
            $("#contResFecha").val(respuesta[0]['fch_resolucion']);
            $("#codTipoContrato").val(respuesta[0]['cod_tipo_contrato']);
            var fch_emision = fechaParaConsulta(respuesta[0]['fch_emision']);
            var auditEmi = buscaDatosPeriodo(fch_emision,'Emi');
            var fch_activacion = fechaParaConsulta(respuesta[0]['fch_activacion']);
            var auditAct = buscaDatosPeriodo(fch_activacion,'Act');
            var fch_resolucion = fechaParaConsulta(respuesta[0]['fch_resolucion']);
            var auditRes = buscaDatosPeriodo(fch_resolucion,'Res');
            $("#fchEmision").val(respuesta[0]['fch_emision']);
            $("#fchActivacion").val(respuesta[0]['fch_activacion']);
            $("#codCampoContrato").val(respuesta[0]['cod_camposanto_actual']);
            $("#codPlatContrato").val(respuesta[0]['cod_plataforma_actual']);
            $("#codAreaContrato").val(respuesta[0]['cod_areaplataforma_actual']);
            $("#codTipoEspModifContrato").val(respuesta[0]['cod_tipoespacio_actual']);
        	$("#modC").val(respuesta[0]['cod_tipo_ctt']);
        	$("#nomCliContrato").val(respuesta[0]['dsc_cliente']);
        	$("#campoContrato").val(respuesta[0]['dsc_camposanto']);
        	$("#platContrato").val(respuesta[0]['dsc_plataforma']);
        	$("#areaContrato").val(respuesta[0]['dsc_area']);
        	$("#ejeHCotrato").val(respuesta[0]['cod_ejehorizontal_actual']);
        	$("#ejeVContrato").val(respuesta[0]['cod_ejevertical_actual']);
        	$("#espacioContrato").val(respuesta[0]['cod_espacio_actual']);
            $("#flg_ctt_integral").val(respuesta[0]['flg_ctt_integral']);
            $("#flgResuelto").val(respuesta[0]['flg_resuelto']);
            $("#flg_activado").val(respuesta[0]['flg_activado']);
            $("#tipoNecCtto").val(respuesta[0]['cod_tipo_necesidad']);
            if(respuesta[0]['cod_tipo_necesidad'] == 'NI'){
                $("#tabAval").attr('hidden',false);
                $("#tab2doTitular").attr('hidden',true);
            }else if(respuesta[0]['cod_tipo_necesidad'] == 'NF'){
                $("#tabAval").attr('hidden',true);
                $("#tab2doTitular").attr('hidden',false);
            }
        	document.getElementById("tipoEspModifContrato").value = respuesta[0]['dsc_tipo_espacio'];
            buscaBeneficiarios(codCtto);
        	$("#bodyDetCttoModif").empty();
            $("#bodyServicioVin").empty();
            var totalVin = 0;
        	$.each(respuesta,function(index,value){
                totalVin = totalVin+parseFloat(value['imp_saldofinanciar']);
                if(value['flg_anulado'] == 'SI'){
                    color = 'red';
                }else if(value['flg_resuelto'] == 'SI'){
                    color = 'blue';
                }else{
                    color = '#575962';
                }
        		var id = "filaServ_"+value['num_servicio'];
                var fila ='<tr class="listaServicio inactivo" style="color:'+color+'" id="'+id+'" onclick="muestraInfo('+value['num_servicio']+');">'+
					'<td class="text-center">'+value['num_servicio']+'</td>'+
					'<td class="text-left">'+value['dsc_tipo_servicio']+'</td>'+
					'<td class="text-center">'+value['fch_generacion']+'</td>'+
					'<td class="text-center">'+value['fch_emision']+'</td>'+
					'<td class="text-center">'+value['fch_activacion']+'</td>'+
					'<td class="text-center">'+value['fch_anulacion']+'</td>'+
					'<td class="text-center">'+value['fch_resolucion']+'</td>'+
					'<td class="text-center">'+value['fch_transferencia']+'</td>'+
                    '<input type="hidden" id="flg_activado_'+value['num_servicio']+'" value="'+value['flg_activado']+'">'+
                    '<input type="hidden" id="flg_anulado_'+value['num_servicio']+'" value="'+value['flg_anulado']+'">'+
                    '<input type="hidden" id="flg_resuelto_'+value['num_servicio']+'" value="'+value['flg_resuelto']+'">'+
                    '<input type="hidden" id="cod_tipo_servicio_'+value['num_servicio']+'" value="'+value['cod_tipo_servicio']+'">'+
				'</tr>';
				document.getElementById("bodyDetCttoModif").insertAdjacentHTML("beforeEnd" ,fila);
                if (respuesta[0]['flg_ctt_integral'] == 'SI') {
                    if(value['flg_principal'] == 'SI'){
                        color = 'blue';
                    }else{
                        color = 'black';
                    }
                    var fila2 = '<tr name="'+value['num_servicio']+'" style="'+color+'">'+
                        '<td class="text-center">'+value['num_servicio']+
                        '<td class="text-right">'+Number(value['imp_saldofinanciar']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });+'<input type="hidden" id="is_principal_'+value['num_servicio']+'" value="'+value['flg_principal']+'"><input type="hidden" id="is_ds_'+value['num_servicio']+'" value="'+value['flg_derecho_sepultura']+'"></td>'+
                    '</tr>';
                    document.getElementById("bodyServicioVin").insertAdjacentHTML("beforeEnd" ,fila2);
                    document.getElementById("totalServicioVin").innerText = Number(totalVin).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
                }

        	});//each
        }//success
    });//ajax
}//llenaDatos

function muestraInfo(id){
	var codCtto = $("#codContrato").val();
    $("#numServicioSeleccionado").val(id);
    $(".listaServicio").removeClass('activoListaServicioModif'); 
    $("#filaServ_"+id).addClass('activoListaServicioModif');
    var tipoCtto = $("#tipoPrograma").val();
    var tipoProg = $("#modC").val();
	$.ajax({
        url: 'ajax/modifCtto.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'DetServ', 'codCtto' : codCtto, 'num_servicio' : id },
        success : function(respuesta){
        	//console.log('respuesta',respuesta);
        	if(respuesta['cod_tipo_necesidad'] == 'NF'){
        		var tipoNec = 'NECESIDAD FUTURA';
        	}else{
        		var tipoNec = 'NECESIDAD INMEDIATA';
        	}
            cantidadBeneficiario(codCtto,tipoCtto,tipoProg);
        	$("#numServicio").val(respuesta['num_servicio']);
        	$("#idPropietario").val(respuesta['cod_empresa']);
        	$("#dscPropietario").val(respuesta['dsc_camposanto']);
        	$("#tipoServicio").val(respuesta['dsc_tipo_servicio']);
        	$("#tipoNecesidad").val(tipoNec);
        	$("#convenio").val(respuesta['dsc_entidad']);
        	$("#formaCobro").val(respuesta['cod_forma_cobro']);
        	$("#moneda").val(respuesta['cod_moneda']);
        	$("#fechaVencimiento").val(respuesta['fch_primer_vencimiento']);
        	$("#cuota").val(respuesta['imp_valor_cuota']);
        	$("#interes").val(respuesta['imp_interes']);
            $("#flgCambioTitular").val(respuesta['flg_cambio_titular']);
            $("#numServFoma").val(respuesta['num_servicio_foma']);
            $("#cdServicioSeleccionado").val(respuesta['cod_tipo_servicio']);
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
            $("#numRefinanciamiento").val(respuesta['num_refinanciamiento']);
        	if(respuesta['imp_saldofinanciar'] != 0){
        		cargaCronograma(codCtto,respuesta['num_refinanciamiento']);
        		cargaFoma(codCtto,respuesta['num_refinanciamiento']);
        	}
            // console.log($("#flg_ctt_integral").val());
            if ($("#flg_ctt_integral").val() == 'NO') {
                    $("#bodyServicioVin").empty();
                    if(respuesta['flg_principal'] == 'SI'){
                        color = 'blue';
                    }else{
                        color = 'black';
                    }
                    var fila2 = '<tr name="'+respuesta['num_servicio']+'" style="'+color+'">'+
                        '<td class="text-center">'+respuesta['num_servicio']+
                        '<td class="text-right">'+Number(respuesta['imp_saldofinanciar']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'<input type="hidden" id="is_principal_'+respuesta['num_servicio']+'" value="'+respuesta['flg_principal']+'"><input type="hidden" id="is_ds_'+respuesta['num_servicio']+'" value="'+respuesta['flg_derecho_sepultura']+'"></td>'+
                    '</tr>';
                    document.getElementById("bodyServicioVin").insertAdjacentHTML("beforeEnd" ,fila2);
                    document.getElementById("totalServicioVin").innerText = Number(respuesta['imp_saldofinanciar']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
                }
            $("#anularBoton").attr('name',id);
        	$("#numCuoCronograma").val(respuesta['num_cuotas']);
            $("#numCuoCronograma").trigger('change');
        	$("#fchVenCronograma").val(respuesta['fch_primer_vencimiento']);
        	$("#interesCronograma").val(respuesta['imp_interes']);
            $("#interesCronograma").trigger('change');
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
        	cargaObservaciones(codCtto,id);
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

$("#numCuoCronograma").on('change',function(){
    var num = $(this).val();
    $.ajax({
        url: 'ajax/modifCtto.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'codCuotas', 'num_cuotas' : num },
        success : function(respuesta){
            $("#codCuotaModif").val(respuesta['cod_cuota']);
        }//success
    });//ajax
});
$("#nCuotasFOMA").on('change',function(){
    var num = $(this).val();
    $.ajax({
        url: 'ajax/modifCtto.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'codCuotas', 'num_cuotas' : num },
        success : function(respuesta){
            $("#codCuotaFOMAModif").val(respuesta['cod_cuota']);
        }//success
    });//ajax
});

$("#interesCronograma").on('change',function(){
    var num = $(this).val();
    $.ajax({
        url: 'ajax/modifCtto.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'codInteres', 'num_valor' : num },
        success : function(respuesta){
            $("#codInteresModif").val(respuesta['cod_interes']);
        }//success
    });//ajax
});

function cantidadBeneficiario(codCtto,tipoCtto,tipoProg){
    $.ajax({
        url: 'ajax/modifCtto.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'ctdBenef', 'codCtto' : codCtto, 'ls_tipo_ctt' : tipoCtto, 'ls_tipo_programa' : tipoProg },
        success : function(respuesta){
            $("#numBeneficiarios").val(respuesta);
        }//success
    });//ajax
}// cantidadBeneficiario

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

function buscaDatosTi(codCliente){
	// var codCliente = $("#codCliTitular").val();
	$.ajax({
        url: 'ajax/modifCtto.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'buscaCli', 'codCliente' : codCliente },
        success : function(respuesta){
        	// console.log('respuesta',respuesta);
            $("#codCliTitular").val(codCliente);
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

function buscaDatos2Ti(codCliente){
	// var codCliente = $("#codCliTitular2").val();
	$.ajax({
        url: 'ajax/modifCtto.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'buscaCli', 'codCliente' : codCliente },
        success : function(respuesta){
        	// console.log('respuesta',respuesta);
            $("#codCliTitular2").val(codCliente);
        	var juridico = false;
        	$("#numDocTitular2").val(respuesta['dsc_documento']);
			document.getElementById("docIdeTitular2").setAttribute('value',respuesta['cod_tipo_documento']);
            if(respuesta['flg_juridico'] == 'SI'){
            	juridico = true;
            }
            $("#juridicoCheckTitular2").prop("checked", juridico);
            $("#fchNacTitular2").datepicker('setDate', respuesta['fch_nacimiento']);
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

function buscaDatosAval(codCliente){
	//var codCliente = $("#codAval").val();
	$.ajax({
        url: 'ajax/modifCtto.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'buscaCli', 'codCliente' : codCliente },
        success : function(respuesta){
        	// console.log('respuesta',respuesta);
            $("#codAval").val(codCliente);
        	var juridico = false;
        	$("#numDocAval").val(respuesta['dsc_documento']);
			document.getElementById("docIdeAval").setAttribute('value',respuesta['cod_tipo_documento']);
            if(respuesta['flg_juridico'] == 'SI'){
            	juridico = true;
            }
            $("#juridicoCheckAval").prop("checked", juridico);
            $("#fchNacAval").datepicker('setDate', respuesta['fch_nacimiento']);
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
  	$("#btnAgFun").attr('disabled',false);
  	$("#dscFuneraria").prop('disabled',false); 	
  }
  else{
  	$('#codFuneraria').prop('disabled',true);
    $('#codFuneraria').val();
  	$('#btnAgFun').attr('disabled',true);
  	$('#dscFuneraria').prop('disabled',true);
    $('#dscFuneraria').val();
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

$("#btnAgFun").on('click',function(){
    $('#tablaAgencias').html('<div class="loader"></div>');
    $.ajax({
        url: 'extensiones/captcha/creaTablaAgencias.php',
        success : function(respuesta){
            // console.log(respuesta);
            $('#tablaAgencias').html('')
            $("#tablaAgencias").html(respuesta);
            $('#myTableAgencias').DataTable();
        }
    });
});

function anadeAgencia(cod){
    $("#codFuneraria").val(cod);
    nombreFuneraria(cod,'dscFuneraria');
}


function creaTablaVendedor(tipo){
    $('#tablaVendedor').html('<div class="loader"></div>');
    $.ajax({
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


function llamaDatosVendedor(codVendedor,boton){
    if(boton == 'cobrador'){
        $("#codCobrador").val(codVendedor);
        nombreTrabajador(codVendedor,'nombreCobrador');
    }else if(boton == 'vendedor'){
        var fechaHoy = new Date();
        var aux_dia = fechaHoy.getDate();
        var aux_mes1 = fechaHoy.setMonth(fechaHoy.getMonth() + 1);
        var aux_mes = fechaHoy.getMonth();
        var aux_anio = fechaHoy.getFullYear();
        if(aux_mes == '0'){
            aux_mes = '12';
            aux_anio = fechaHoy.getFullYear()-1;
        }               
        fechaRes = aux_mes+'/'+aux_dia+'/'+aux_anio;
        $.ajax({
        type:'GET',
        url: 'extensiones/captcha/getPeriod.php',
        dataType: 'text',
        data: {'fechaRes':fechaRes},
            success : function(response){
                var info = JSON.parse(response);
                // console.log(info);
                var num_anno = info.num_anno;
                var cod_tipo_periodo = info.tipo_periodo;
                var cod_periodo = info.periodo;
                $.ajax({
                    type:'POST',
                    url: 'ajax/resCtto.ajax.php',
                    dataType: 'json',
                    data: {'accion':'getHisTrabajador', 'cod_consejero':codVendedor, 'num_anno':num_anno, 'cod_tipo_periodo':cod_tipo_periodo, 'cod_periodo':cod_periodo},
                    success : function(response){
                        // console.log(response);
                        if (response.length == 0) {
                            swal({
                                title: "",
                                text: 'El consejero no esta activo para el período seleccionado ['+num_anno+'-'+cod_tipo_periodo+'-'+cod_periodo+'].',
                                type: "warning",
                                confirmButtonText: "Aceptar",
                            });
                        }else{
                            // console.log(response);
                            $.each(response,function(index,value){
                                $("#codVendedor").val(value['cod_trabajador']);
                                nombreTrabajador(value['cod_trabajador'],'nombreVendedor');
                                $("#codGrupo").val(value['cod_grupo']);
                                nombreGrupoVenta(value['cod_grupo'],'nombreGrupo');
                                $("#codSupervisor").val(value['cod_supervisor']);
                                nombreTrabajador(value['cod_supervisor'],'nombreSupervisor');
                                $("#codJefeVentas").val(value['cod_jefeventas']);
                                nombreTrabajador(value['cod_jefeventas'],'nombreJefeVentas');
                                $("#codTipoComisionista").val(value['cod_tipo_comisionista']);
                                nombreComisionista(value['cod_tipo_comisionista'],'nombreTipoComisionista');
                            });//each 
                        }//else length = 0
                    }//success
                });//ajax trabajador
            }//success
        });//ajax periodo
    }//boton vendedor
}//function llamaDatosVendedor

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
                //console.log(value['cod_estadocuota']);
        		if(value['cod_estadocuota'] == 'REG'){
        			edoCuota = 'REGISTRADO';
        		}else if (value['cod_estadocuota'] == 'CAN'){
        			edoCuota = 'CANCELADO';
        		}else if(value['cod_estadocuota'] == 'ANU'){
                    edoCuota = 'ANULADO';
                }else if(value['cod_estadocuota'] == 'RES'){
                    edoCuota = 'RESUELTO';
                }else{
                    edoCuota = '';
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
        	//console.log('respuesta',respuesta);
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
function validaDocLenght(tipo){
    if (tipo == "DI001") {
      $('#numDocBenef').val('');
      document.getElementById("numDocBenef").setAttribute('maxlength',8);
      document.getElementById("numDocBenef").setAttribute('onkeypress',"return justNumbers(event);");
    }else if(tipo == "DI002"){
      $('#numDocBenef').val('');
      document.getElementById("numDocBenef").setAttribute('maxlength',12);
      $("#numDocBenef").removeAttr("onkeypress");
    }else if(tipo == "DI003"){
      $('#numDocBenef').val('');
      document.getElementById("numDocBenef").setAttribute('maxlength',12);
      $("#numDocBenef").removeAttr("onkeypress");
    }else if(tipo == "DI004"){
      $('#numDocBenef').val('');
      document.getElementById("numDocBenef").setAttribute('maxlength',11)
      document.getElementById("numDocBenef").setAttribute('onkeypress',"return justNumbers(event);");
    }else if(tipo == "DI005"){
      $('#numDocBenef').val('');
      $("#numDocBenef").removeAttr("maxlength");
      $("#numDocBenef").removeAttr("onkeypress");
    }
}
function buscaBeneficiarios(codCtto){
    $.ajax({
        url: 'ajax/modifCtto.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'beneficiarios', 'codCtto' : codCtto },
        success : function(respuesta){
            // console.log(respuesta);
            $.each(respuesta,function(index,value){
                var registro = [value['cod_tipo_documento'],value['dsc_documento'],value['dsc_apellidopaterno'],value['dsc_apellidomaterno'],value['dsc_nombre'],value['fch_nacimiento'],value['fch_deceso'],value['cod_religion'],value['cod_estado_civil'],value['cod_sexo'],value['cod_parentesco'],value['cod_lugar_deceso'],value['cod_motivo_deceso'],value['num_peso'],value['num_talla'],value['flg_autopsia'],value['num_item'],value['num_servicio'],value['fch_entierro'],value['num_nivel']];
                 var muestra = '<tr onclick="verDetalles(event)" id="'+value['dsc_documento']+'">'+
                        '<td class="'+value['dsc_documento']+'">'+value['dsc_apellidopaterno']+' '+value['dsc_apellidomaterno']+', '+value['dsc_nombre']+
                        '<input type="hidden" id="idBenef_'+value['dsc_documento']+'" value="'+value['dsc_documento']+'"><input type="hidden" id="registro_'+value['dsc_documento']+'" value="'+registro+'">'+
                        '</td></tr>';
                document.getElementById("bodyBeneficiarioM").insertAdjacentHTML("beforeEnd" ,muestra);
            });//each
        }//success
    });//ajax
}//buscaBeneficiarios
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
  $('#autopsiaBenefM').prop('disabled',false);
  $("#numItemBenef").prop('disabled',false);
  $("#numServBenef").prop('disabled',false);
  $("#fchEntBenef").prop('disabled',false);
  $("#nivelBenef").prop('disabled',false);
  
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
  $("#autopsiaBenefM").prop('checked',false); 
  $("#numItemBenef").val();
  $("#numServBenef").val();
  $("#fchEntBenef").val();
  $("#nivelBenef").val();

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
  var row = $("#bodyBeneficiarioM tr").length;
  if(row > 0){
    var filas = document.querySelectorAll("#bodyBeneficiarioM tr");
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
  var filas = length("#bodyBeneficiarioM tr");
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
  var autopsia = $("#autopsiaBenefM").checked;
  var numItem = filas+1;
  var numServ = 0;
  var fchEnt = $("#fchEntBenef").val();
  var nivel = $("#nivelBenef").val();
  var registro = [tipoDoc,numDoc,apellPaterno,apellMaterno,nombre,fechNac,fechDec,religion,edoCivil,sexo,parentesco,lugarDeceso,motivoDeceso,peso,talla,autopsia,numItem,numServ,fchEnt,nivel];
  var muestra = '<tr onclick="verDetalles(event)" id="'+numDoc+'">'+
  					'<td class="'+numDoc+'">'+apellPaterno+' '+apellMaterno+', '+nombre+
  					'<input type="hidden" id="idBenef_'+numDoc+'" value="'+numDoc+'"><input type="hidden" id="registro_'+numDoc+'" value="'+registro+'">'+
  					'</td></tr>';
  document.getElementById("bodyBeneficiarioM").insertAdjacentHTML("beforeEnd" ,muestra);
  var valida = validaCamposBeneficiario();
  if(valida == 1){
      swal({
            title: "",
            text: "Beneficiario añadido.",
            type: "success",
            confirmButtonText: "Aceptar",
        })
    }

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

function validaCamposBeneficiario(){

    var ls_ape_paterno = $("#apePatBenef").val();
    var ls_ape_materno = $("#apeMatBenef").val();
    var ls_nombre = $("#nombreBenef").val();
    var ls_tipo_doc = $("#tipoDocBenef").val();
    var ls_num_doc = $("#numDocBenef").val();
    var ldt_fch_nac = $("#fchNacBenef").datepicker("getDate");
    if( ls_ape_paterno == null || ls_ape_paterno == ''){
            swal({
                title: "",
                text: "Debe ingresar el apellido paterno del beneficiario ",
                type: "warning",
                confirmButtonText: "Aceptar",
            })
           return;
        }
                   

        if( ls_ape_materno == null || ls_ape_materno == ''){
            swal({
                title: "",
                text: "Debe ingresar el apellido materno del beneficiario ",
                type: "warning",
                confirmButtonText: "Aceptar",
            })
           return;
        }

        if( ls_nombre == null || ls_nombre == ''){
            swal({
                title: "",
                text: "Debe ingresar el nombre del beneficiario ",
                type: "warning",
                confirmButtonText: "Aceptar",
            })
           return;
        }


        if( ls_tipo_doc == null || ls_tipo_doc == ''){
            swal({
                title: "",
                text: "Debe seleccionar el tipo de documento del beneficiario ",
                type: "warning",
                confirmButtonText: "Aceptar",
            })
           return;
        }

        if( ls_num_doc == null || ls_num_doc == ''){
            swal({
                title: "",
                text: "Debe ingresar número de documento del beneficiario ",
                type: "warning",
                confirmButtonText: "Aceptar",
            })
           return;
        }
       
        if( ldt_fch_nac == null || ldt_fch_nac == '' || ldt_fch_nac == '00/00/0000'){
            swal({
                title: "",
                text: "Debe ingresar la fecha de nacimiento del beneficiario ",
                type: "warning",
                confirmButtonText: "Aceptar",
            })
           return;
        }
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
  $('#autopsiaBenefM').prop('disabled',false);
  $("#numItemBenef").prop('disabled',false);
  $("#numServBenef").prop('disabled',false);
  $("#fchEntBenef").prop('disabled',false);
  $("#nivelBenef").prop('disabled',false);

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
  var autopsia = $("#autopsiaBenefM").checked;
  var numItem = $("#numItemBenef").val();
  var numServ = $("#numServBenef").val();
  var fchEnt = $("#fchEntBenef").val();
  var nivel = $("#nivelBenef").val();
  var registro = [tipoDoc,numDoc,apellPaterno,apellMaterno,nombre,fechNac,fechDec,religion,edoCivil,sexo,parentesco,lugarDeceso,motivoDeceso,peso,talla,autopsia,numItem,numServ,fchEnt,nivel];
  var muestra = '<tr onclick="verDetalles(event)" id="'+numDoc+'"><td class="'+numDoc+'">'+numDoc+'</td><td class="'+numDoc+'">'+nombre+'</td><td class="'+numDoc+'">'+apellPaterno+' '+apellMaterno+'<input type="hidden" id="idBenef_'+numDoc+'" value="'+numDoc+'"><input type="hidden" id="registro_'+numDoc+'" value="'+registro+'"></td></tr>';
  document.getElementById(id).remove();
  document.getElementById("bodyBeneficiarioM").insertAdjacentHTML("beforeEnd" ,muestra);
  var valida = validaCamposBeneficiario();
  if(valida == 1){
      swal({
            title: "",
            text: "Beneficiario modificado.",
            type: "success",
            confirmButtonText: "Aceptar",
        })
    }
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
  $('#autopsiaBenefM').prop("checked", false);
  $("#numItemBenef").val();
  $("#numServBenef").val();
  $("#fchEntBenef").datepicker('setDate', null);
  $("#nivelBenef").val();

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
  $('#autopsiaBenefM').prop('disabled',true);
  $('#autopsiaBenefM').prop("checked", false);
  $("#numItemBenef").prop('disabled',true);
  $("#numServBenef").prop('disabled',true);
  $("#fchEntBenef").prop('disabled',true);
  $("#nivelBenef").prop('disabled',true);

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
  var numItem = respuesta.split(",")[16];
  var numServ = respuesta.split(",")[17];
  var fchEnt = respuesta.split(",")[18];
  var nivel = respuesta.split(",")[19];

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
  $('#autopsiaBenefM').prop("checked", autopsia);
  $('#autopsiaBenefM').prop('disabled',true);
  $("#numItemBenef").prop('disabled',true);
  $("#numItemBenef").val(numItem);
  $("#numServBenef").val(numServ);
  $("#numServBenef").prop('disabled',true);
  $("#fchEntBenef").datepicker('setDate', fchEnt);
  $("#fchEntBenef").prop('disabled',true);
  $("#nivelBenef").val(nivel);
  $("#nivelBenef").prop('disabled',true);
  boton = document.getElementById("botonEditaB");
  boton.addEventListener("click", function(){activaEditaBenef(numDoc)}, false);
  boton2 = document.getElementById("botonEliminarB");
  boton2.addEventListener("click", function(){eliminaBenef(numDoc)}, false);
}

//---------------------------------pestaña observaciones----------------------

function cargaObservaciones(codCtto,numServicio){
	$("#bodyObservaciones").empty();
	$.ajax({
        url: 'ajax/modifCtto.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'observaciones', 'codCtto' : codCtto, 'num_servicio' : numServicio },
        success : function(respuesta){
        	//console.log('respuesta',respuesta);
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

function masObsv(usuario){
    var tablaObsv = document.getElementById("bodyObservaciones");
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

//---------------------------limpia formulario------------------------------//

function resetForm(){
    limpiaydsi();
    document.getElementById("formModifCtto").reset();
    $("#bodyDetCttoModif").empty();
    $("#bodyServicioVin").empty();
    $("#bodyObservaciones").empty();
    $("#bodyServiciosPpales").empty();
    $("#bodyDsctoModif").empty();
    $("#bodyEndosoModif").empty();
    $("#bodyCronogramaModif").empty();
    $("#bodyCronogramaFomaModif").empty();
    $("#bodyBeneficiarioM").empty();
    $("#bodyCronogramaFomaModif").empty();
    $("#codContrato").focus();
}

function buscaCuotasPag(){
    var li_ref = $("#numRefinanciamiento").val();
    var ls_contrato = $("#codContrato").val();
     $.ajax({
        url: 'ajax/modifCtto.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'cuotasPagadas', 'ls_contrato' : ls_contrato, 'li_ref' : li_ref },
        success : function(respuesta){
            // console.log(respuesta);
            return respuesta;
        }
    });
}

//----------------------------Anular contrato-----------------------------//
// -- Detalle Servicios -- //
function anularCtto(numServ = null){
    // console.log(numServ);
    var validaPago = buscaCuotasPag();
    if($("#codContrato").val() == ''){
        swal({
            title: "",
            text: "Debe seleccionar el número de servicio que desea anular.",
            type: "warning",
            confirmButtonText: "Aceptar",
        })
        return;
    }
    else if($("#flg_activado_"+numServ).val() == 'SI' && $("#flg_resuelto_"+numServ).val() == 'NO'){
        swal({
            title: "",
            text: "El contrato esta ACTIVADO no puede ser anulado.",
            type: "warning",
            confirmButtonText: "Aceptar",
        })
        return;
    }else if($("#flg_resuelto_"+numServ).val() == 'SI' && $("#flg_activado_"+numServ).val() == 'SI'){
        swal({
            title: "",
            text: "El contrato esta RESUELTO no puede ser anulado.",
            type: "warning",
            confirmButtonText: "Aceptar",
        })
        return;
    }
    else if($("#flg_anulado_"+numServ).val() == 'SI'){
        swal({
            title: "",
            text: "El contrato ya esta ANULADO.",
            type: "warning",
            confirmButtonText: "Aceptar",
        })
        return;
    }else if(validaPago){
        swal({
            title: "",
            text: "El contrato / número de servicio tiene cuotas canceladas total o parcialmente, NO puede ser anulado.",
            type: "warning",
            confirmButtonText: "Aceptar",
        })
        return;
    }else{
        var ls_tipo_programa = $("#tipoPrograma").val();
        var ls_tipo_ctt = $("#modC").val();
        var ls_contrato = $("#codContrato").val();

        var li_tot = 0;
        var ls_det_servicios = '';
        // for(li_i = 1 To tab_1.tp_4.dw_servicio_vin.Rowcount()){
        var container = document.querySelector('#bodyServicioVin');
        container.querySelectorAll('tr').forEach(function (li_i){ 
           var ls_servicio = $(li_i).attr("name");
           // console.log('ls_servicio',ls_servicio);
           if(ls_servicio == ''){
                ls_servicio = 0;
           } 
            // ls_servicio = tab_1.tp_4.dw_servicio_vin.GetItemString(li_i, "num_servicio")

            // ls_det_servicios = ls_det_servicios + ls_servicio + " - "
            ls_det_servicios = ls_det_servicios + ls_servicio + '-';
            // console.log(ls_det_servicios);
            li_tot = li_tot + 1
        
            // -- Valida -- //
        
            var li_valida = 0

            $.ajax({
                url: 'ajax/modifCtto.ajax.php',
                dataType: 'json',
                method: "POST",
                data: { 'accion' : 'valUsoServ', 'ls_contrato' : ls_contrato, 'ls_servicio' : ls_servicio, 'ls_tipo_programa' : ls_tipo_programa, 'ls_tipo_ctt' : ls_tipo_ctt },
                success : function(respuesta){
                    li_valida = (respuesta['computed'] == null) ? 0 : respuesta['computed'];
                    // console.log(li_valida);
                    if(li_valida > 0){
                        swal({
                            title: "",
                            text: "El contrato / servicio tiene usos de servicio registrados, no puede ser ANULADO.",
                            type: "warning",
                            confirmButtonText: "Aceptar",
                        })
                        return;
                    }//if
                }//success
            });//ajax        
        });//container.querySelectorAll

        // ls_det_servicios = Trim(Mid(ls_det_servicios, 1, Len(Trim(ls_det_servicios)) - 1))
        ls_det_servicios = ls_det_servicios.substring(0, ls_det_servicios.length - 1);
        ls_det_servicios1 = ls_det_servicios.split("-")[0];

        if( li_tot > 1){
            swal({
                title: "",
                text: "¿Seguro que desea ANULAR LOS SERVICIOS "+ls_det_servicios+"? Esta operación es irreversible",
                type: "question",
                showCancelButton:!0,
                confirmButtonText: "Anular",
                cancelButtonText:"Cancelar"
            }).then(function(){
                setTimeout(function () { 
                    var anular = AnulaDefCtto();
                    swal({
                        title: "",
                        text: "Se ha Anulado el contrato "+ls_contrato+" con éxito.",
                        type: "success",
                        confirmButtonText: "Aceptar",
                    })
                },1000);
            })//then
        }//li_tot > 1
         //If f_sys_mensaje_usuario(Title, "MSGLIB", "¿SEGURO QUE DESEA ANULAR LOS SERVICIOS [" + ls_det_servicios + "]?. ESTA OPERACIÓN ES IRREVERSIBLE.", "PRG") <> 1 Then Return
        else{
            swal({
                title: "",
                text: "¿Seguro que desea ANULAR el servicio "+ls_det_servicios1+"? Esta operación es irreversible",
                type: "question",
                showCancelButton:!0,
                confirmButtonText: "Anular",
                cancelButtonText:"Cancelar"
            }).then(function(){
                setTimeout(function () { 
                    var anular = AnulaDefCtto();
                    // console.log('anular',anular);
                    swal({
                        title: "",
                        text: "Se ha Anulado el contrato "+ls_contrato+" con éxito.",
                        type: "success",
                        confirmButtonText: "Aceptar",
                    })
                },1000);
            })//then
        }// Else li_tot > 1
            //     If f_sys_mensaje_usuario(Title, "MSGLIB", "¿SEGURO QUE DESEA ANULAR EL SERVICIO [" + ls_det_servicios + "]?. ESTA OPERACIÓN ES IRREVERSIBLE.", "PRG") <> 1 Then Return
    }//if validaciones
}// function anularCtto

function AnulaDefCtto(){
    // -- Servicios Vinculados -- //
    var ls_tipo_programa = $("#tipoPrograma").val();
    var ls_tipo_ctt = $("#modC").val();
    var ls_contrato = $("#codContrato").val();
    var ls_flg_ds_aux = 'NO';
    var li_ref = $("#numRefinanciamiento").val();
    var ls_item_servicio_getrow = $("#numServicioSeleccionado").val();
    var ls_camposanto = $("#codCampoContrato").val();
    var ls_plataforma = $("#codPlatContrato").val();
    var ls_area = $("#codAreaContrato").val();
    var ls_eje_horizontal = $("#ejeHCotrato").val();
    var ls_eje_vertical = $("#ejeVContrato").val();
    var ls_espacio = $("#espacioContrato").val();
    var ls_tipo_espacio = $("#codTipoEspModifContrato").val();

    // For li_i = 1 To tab_1.tp_4.dw_servicio_vin.Rowcount()
    var container = document.querySelector('#bodyServicioVin');
    container.querySelectorAll('tr').forEach(function (li_i){ 
        var ls_servicio = $(li_i).attr("name");      
        // ls_servicio = tab_1.tp_4.dw_servicio_vin.GetItemString(li_i, "num_servicio")
            // console.log('ls_servicio',ls_servicio);
           if(ls_servicio == ''){
                ls_servicio = 0;
           } 
        
        // -- Flg DS -- //
        
        var ls_flg_ds = 'NO';
        var ls_servicio_foma = '';

        $.ajax({
            url: 'ajax/modifCtto.ajax.php',
            dataType: 'json',
            method: "POST",
            data: { 'accion' : 'verificaTrans', 'ls_contrato' : ls_contrato, 'ls_servicio' : ls_servicio, 'ls_tipo_programa' : ls_tipo_programa, 'ls_tipo_ctt' : ls_tipo_ctt },
            success : function(respuesta){
                // console.log('respuesta',respuesta);
                ls_flg_ds = respuesta['flg_derecho_sepultura'];
                ls_servicio_foma = respuesta['num_servicio_foma'];
        
                if(ls_flg_ds == 'SI'){            
                    ls_flg_ds_aux = 'SI';
                }
        
                // -- Replica Datos -- //

                $.ajax({
                    url: 'ajax/modifCtto.ajax.php',
                    dataType: 'json',
                    method: "POST",
                    data: { 'accion' : 'replicaDatos', 'ls_contrato' : ls_contrato, 'ls_servicio' : ls_servicio, 'ls_tipo_programa' : ls_tipo_programa, 'ls_tipo_ctt' : ls_tipo_ctt },
                    success : function(respuesta){
                        var replicaDatos = respuesta;
                    }//success
                });//ajax replicaDatos
        
                // -- Actualiza FOMA -- //
        
                if(ls_servicio_foma != null && ls_servicio_foma != ''){
                
                    $.ajax({
                        url: 'ajax/modifCtto.ajax.php',
                        dataType: 'json',
                        method: "POST",
                        data: { 'accion' : 'actualizaFoma', 'ls_contrato' : ls_contrato, 'ls_servicio' : ls_servicio, 'ls_tipo_programa' : ls_tipo_programa, 'ls_tipo_ctt' : ls_tipo_ctt },
                        success : function(respuesta){
                            var actualizaFoma = respuesta;
                        }//success
                    });//ajax actualizaFoma|           
            
                }
            }//success
        });//ajax verificaTrans
        
    });// container.querySelectorAll foreach

    // -- Actualiza Cronograma -- //

    ls_servicioC = $("#numServicioSeleccionado").val();
    $.ajax({
        url: 'ajax/modifCtto.ajax.php',
        dataType: 'json',
        method: "POST",
        data: { 'accion' : 'actualizaCronograma', 'ls_contrato' : ls_contrato, 'ls_servicio' : ls_servicioC, 'ls_tipo_programa' : ls_tipo_programa, 'ls_tipo_ctt' : ls_tipo_ctt, 'li_ref' : li_ref },
        success : function(respuesta){
            var actualizaCronograma = respuesta;

            // -- Modificado -- //

            $.ajax({
                url: 'ajax/modifCtto.ajax.php',
                dataType: 'json',
                method: "POST",
                data: { 'accion' : 'modificado', 'ls_contrato' : ls_contrato, 'ls_servicio' : ls_servicioC, 'ls_tipo_programa' : ls_tipo_programa, 'ls_tipo_ctt' : ls_tipo_ctt, 'ls_item_servicio_getrow' : ls_item_servicio_getrow },
                success : function(respuesta){
                    var modificado = respuesta;

                    // -- Genera Espacio -- //
     
                    if( ls_flg_ds_aux == 'SI'){
                        $.ajax({
                            url: 'ajax/modifCtto.ajax.php',
                            dataType: 'json',
                            method: "POST",
                            data: { 'accion' : 'generaEspacio', 'ls_camposanto' : ls_camposanto, 'ls_plataforma' : ls_plataforma, 'ls_area' : ls_area, 'ls_eje_horizontal' : ls_eje_horizontal, 'ls_eje_vertical' : ls_eje_vertical, 'ls_espacio' : ls_espacio, 'ls_tipo_espacio' : ls_tipo_espacio },
                            success : function(respuesta){
                                var generaEspacio = respuesta;
                                if(generaEspacio && modificado && replicaDatos){
                                    llenaDatos(ls_contrato);
                                    return 1;
                                }
                            }//success
                        });//ajax generaEspacio                        
                    }//End If
                }//success
            });//ajax modificado
        }//success
    });//ajax replicaDatos 
}//function AnulaDefCtto

//----------------------------tab Titulares-----------------------------//
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
    // }
}
function llenaDatosCliente(codCli,tab){
    if(tab == 'Titular'){
        buscaDatosTi(codCli);
    }
    else if(tab == 'Titular2'){
        buscaDatos2Ti(codCli);
    }
    else if(tab == 'Aval'){
        buscaDatosAval(codCli);
    }
}


//-----------------------------------------------------------------------------------------------------//
//-------------------------------------------Modificacion----------------------------------------------//
//-----------------------------------------------------------------------------------------------------//

function modificaCtto(){

    var li_valida = 0;
    var ls_localidad = $("#sedeContrato").val();
    var ls_contrato = $("#codContrato").val();
    var ls_tipo_contrato = $("#codTipoContrato").val();
    var ls_tipo_ctt = $("#modC").val();
    var ls_tipo_programa = $("#tipoPrograma").val();
    var ls_num_servicio_det = $("#numServicioSeleccionado").val();
    var ls_flg_resuelto = $("#flg_resuelto_"+ls_num_servicio_det).val();
    
    // -- Otros Datos -- //

    var lde_saldo_financiar_foma = $("#saldoFOMA").val();
    var lde_saldo_financiar = $("#saldoFinanciar").val();
    var ldt_fch_emision = $("#fchEmision").val();
    var ldt_fch_activacion = $("#fchActivacion").val();
    var aux_dia = fechaHoy.getDate();
    var aux_mes1 = fechaHoy.setMonth(fechaHoy.getMonth() + 1);
    var aux_mes = fechaHoy.getMonth();
    var aux_anio = fechaHoy.getFullYear();
    if(aux_mes == '0'){
        aux_mes = '12';
        aux_anio = fechaHoy.getFullYear()-1;
    }               
    var ldt_fch_actual = aux_dia+'/'+aux_mes+'/'+aux_anio;
    var lde_tot_interes = 0;
    var li_total_cuotas = 0;

    var ls_cliente = $("#codCliTitular").val();
    var ls_cliente_alterno = $("#codCliTitular2").val();
    var ls_aval = $("#codAval").val();
    var is_principal = $("#is_principal_"+ls_num_servicio_det).val();
    var is_ds = $("#is_ds_"+ls_num_servicio_det).val();

    // -- Inicializar -- // 

    if(lde_saldo_financiar_foma == null){
        lde_saldo_financiar_foma = 0;
    }
    if(lde_saldo_financiar == null){
        lde_saldo_financiar = 0;
    }
     
    // -- Valida Datos -- //

    if(ls_localidad == '' || ls_localidad == null){

        swal({
            title: "",
            text: "Debe seleccionar la localidad",
            type: "warning",
            confirmButtonText: "Aceptar",
        })
        document.getElementById("sedeContrato").focus();
        return;

    }

    if(ls_contrato == '' || ls_contrato == null){

        swal({
            title: "",
            text: "Debe ingresar el contrato",
            type: "warning",
            confirmButtonText: "Aceptar",
        })
        document.getElementById("codContrato").focus();
        return;

    }

    // -- No dejar modificar contratos resueltos o retirados -- //

    if(ls_flg_resuelto == '' || ls_flg_resuelto == null){
        ls_flg_resuelto = 'NO';
    }

    if(ls_flg_resuelto == 'SI'){
        swal({
            title: "",
            text: "No puede hacer cambios en el contrato y servicio seleccionado, esta resuelto o retirado",
            type: "warning",
            confirmButtonText: "Aceptar",
        })
        return;
    } 

    if(ls_num_servicio_det == null || ls_num_servicio_det == ''){
        swal({
            title: "",
            text: "Debe seleccionar el servicio",
            type: "warning",
            confirmButtonText: "Aceptar",
        })
        $('.nav-tabs a[href="#' + tab + '"]').tab('show');
       return;
    }

    // -- Valida Cronograma y FOMA -- //

    if( is_principal == 'SI'){ 

        if(document.getElementById("bodyCronogramaModif").rows.length<= 0 && lde_saldo_financiar >= 0.01){

            swal({
                title: "",
                text: "Debe generar el cronograma de pagos del contrato",
                type: "warning",
                confirmButtonText: "Aceptar",
            })
            return;

        }else{

           if( is_ds == 'SI' ){                                            

               if( document.getElementById("bodyCronogramaFomaModif").rows.length < 1 && lde_saldo_financiar_foma >= 0.01){ 

                    swal({
                        title: "",
                        text: "Debe generar el cronograma de pagos del FOMA",
                        type: "warning",
                        confirmButtonText: "Aceptar",
                    })                  
                   return;
                            
               }
                        
           }
                      
        }
    }

    var largoObsv = document.getElementById("bodyObservaciones").rows.length;
    for(li_i = 0; li_i < largoObsv ; li_i++){         
        ls_observacion = $("#obsv"+li_i).val();
        if( ls_observacion == null || ls_observacion == ''){
            swal({
                title: "",
                text: "Debe ingresar las observaciones",
                type: "warning",
                confirmButtonText: "Aceptar",
            })
           return;
        }
    }

    // -- Datos -- //

    var ls_convenio = $("#convenio").val(); 
    var ls_interes = $("#codInteresModif").val();
    var ls_cuota = $("#codCuotaModif").val();
    var ldt_fch_venc = $("#fchVenCronograma").val();
    var ls_cuota_foma = $("#codCuotaFOMAModif").val();
    var ldt_fch_venc_foma = $("#fchVenCronoFOMA").datepicker("getDate");
    var ls_flg_agencia = $("#AgFunCheck").prop('checked');
    if(ls_flg_agencia){
        ls_flg_agencia = 'SI';
    }else{
        ls_flg_agencia = 'NO';
    }
    var ls_agencia =  $("#codFuneraria").val();
    var ls_vendedor = $("#codVendedor").val();
    var ls_supervisor = $("#codSupervisor").val();
    var ls_jefe = $("#codJefeVentas").val();
    var ls_grupo = $("#codGrupo").val();
    var ls_canal = $("#canalVentaModif").val();
    var ls_tipo_comisionista = $("#codTipoComisionista").val();
    var ls_cod_cobrador =$("#codCobrador").val();
    var ls_zona = ''; //--------------------------------------------------------------??

    if(ls_flg_agencia == 'SI'){
        if(ls_agencia == null || ls_agencia == ''){
            swal({
                title: "",
                text: "Debe seleccionar la agencia funeraria.",
                type: "warning",
                confirmButtonText: "Aceptar",
            })
            return;
            $("#codFuneraria").focus();
        }
    }

    // -- Detalle de Servicios -- // 

    var li_tot = 0;
    var container = document.querySelector('#bodyServicioVin');
    container.querySelectorAll('tr').forEach(function (li_i) 
    {            
        var ls_servicio_add = $(li_i).attr("name");
        ls_det_servicios = ls_det_servicios + ls_servicio_add + " - ";
        li_tot = li_tot + 1;

    });

    // ls_det_servicios = Trim(Mid(ls_det_servicios, 1, Len(Trim(ls_det_servicios)) - 1))
    ls_det_servicios =  ls_det_servicios.substring(0, ls_det_servicios.length - 1);
    var ls_num_servicio_getrow = $("#numServicioSeleccionado").val();
    var ls_tipo_servicio_getrow = $("#cdServicioSeleccionado").val();
     
    // -- Cambio Titular ?? -- //

    var ls_cambio_titular = $("#flgCambioTitular").val(); 

    if( ls_cambio_titular == null || ls_cambio_titular == '' ){
        ls_cambio_titular = 'NO';
    }

    if( ls_cambio_titular == 'SI'){

        swal({
            title: "",
            text: "El servicio por cambio de titular no puede ser emitido desde esta opción. <br><a href='cambioTitular' type='button' class='btn btn-sm btnEditarKqPst2 mt25' target='_blank'>Cambio de titular</a>",
            type: "warning",
            confirmButtonText: "Aceptar",
        })
        return;

    }

    // -- Emisión -- //

    if( ldt_fch_emision == null || ldt_fch_emision == ''){               

        if( li_tot > 1){

            swal({
                title: "",
                text: "¿Seguro que desea emitir los servicios ["+ls_det_servicios+"]?",
                type: "warning",
                confirmButtonText: "Aceptar",
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
              if (result.value) {
                continue;
              } else if (
                result.dismiss === Swal.DismissReason.cancel
              ) {
                return;
              }
            })

        }else{

            swal({
                title: "",
                text: "¿Seguro que desea emitir el servicio ["+ls_det_servicios+"]?",
                type: "warning",
                confirmButtonText: "Aceptar",
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
              if (result.value) {
                continue;
              } else if (
                result.dismiss === Swal.DismissReason.cancel
              ) {
                return;
              }
            })

        }

    }else{

        swal({
                title: "",
                text: "¿Seguro que desea modificar los datos del contrato?",
                type: "warning",
                confirmButtonText: "Aceptar",
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
              if (result.value) {
                continue;
              } else if (
                result.dismiss === Swal.DismissReason.cancel
              ) {
                return;
              }
            })
    }


    // -- Numero de Cuotas -- //

    var li_cuotas = $("#numCuoCronograma").val();
    var li_cuotas_foma = $("#nCuotasFOMA").val();

    // -- Valor Interes -- // 

    var lde_tasa = $("#interesCronograma").val()

    // -- Num Ref -- //

    var li_ref = $("#numRefinanciamiento").val();
    var ls_servicio_foma = $("#numServFoma").val();
    

    // -- Tipo Observ -- //-----------------------------------tabla vacia

    var ls_tipo = '';
    // SELECT  vtama_tipo_observacion.cod_tipo_observacion
    // INTO                     :ls_tipo
    // FROM                   vtama_tipo_observacion
    // WHERE vtama_tipo_observacion.flg_default = 'SI'

    // -- Max -- //

    li_max_item = 0;

    li_max_item = $("#numBeneficiarios").val();

    if(li_max_item == null || li_max_item == ''){
        li_max_item = 0;
    }
}//borrar
    // -- Seteo -- // 

    // For li_i = 1 To tab_1.tp_3.dw_det_beneficiarios.Rowcount()

    //     li_num_item = tab_1.tp_3.dw_det_beneficiarios.GetItemNumber(li_i, "num_item")
    //     ls_tipo_doc_b = tab_1.tp_3.dw_det_beneficiarios.GetItemString(li_i, "cod_tipo_documento")
    //     ls_num_doc_b = tab_1.tp_3.dw_det_beneficiarios.GetItemString(li_i, "dsc_documento")
    //     ls_estado = tab_1.tp_3.dw_det_beneficiarios.GetItemString(li_i, "cod_estado")
    //     ls_estado_bd = tab_1.tp_3.dw_det_beneficiarios.GetItemString(li_i, "cod_estado_bd")
    //     ldt_fch_baja = tab_1.tp_3.dw_det_beneficiarios.GetItemDatetime(li_i, "fch_baja")
    //     ldt_fch_baja_bd = tab_1.tp_3.dw_det_beneficiarios.GetItemDatetime(li_i, "fch_baja_bd")
    //     ldt_fch_alta = tab_1.tp_3.dw_det_beneficiarios.GetItemDatetime(li_i, "fch_alta")
    //     ldt_fch_alta_bd = tab_1.tp_3.dw_det_beneficiarios.GetItemDatetime(li_i, "fch_alta_bd")

        // -- Ingreso de observaciones automaticas -- //            

    //     If f_sys_valida_ingreso_datos(String(li_num_item), "NUM") = False Then

    //        ls_texto = "SE INGRESA EL BENEFICIARIO, CON FECHA DE ALTA " + String(ldt_fch_alta, "DD/MM/YYYY")

    //        li_fila = tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.InsertRow(0)
    //        tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "cod_usuario", gs_usuario)
    //        tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "fch_registro", ldt_fch_actual)
    //        tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "cod_tipo_observacion", ls_tipo)
    //        tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "dsc_observacion", ls_texto)
    //        tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "cod_tipo_documento", ls_tipo_doc_b)
    //        tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "dsc_documento", ls_num_doc_b)
    //        tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "flg_ineditable", "SI")                              
    //     End If

    //     If f_sys_valida_ingreso_datos(String(ldt_fch_baja_bd), "FEC") = False Then

    //        If f_sys_valida_ingreso_datos(String(ldt_fch_baja), "FEC") Then

    //            ls_texto = "SE INGRESA LA FECHA DE BAJA PARA EL BENEFICIARIO, DE " + String(ldt_fch_baja, "DD/MM/YYYY")                                              
    //            li_fila = tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.InsertRow(0)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "cod_usuario", gs_usuario)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "fch_registro", ldt_fch_actual)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "cod_tipo_observacion", ls_tipo)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "dsc_observacion", ls_texto)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "cod_tipo_documento", ls_tipo_doc_b)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "dsc_documento", ls_num_doc_b)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "flg_ineditable", "SI")

    //        End If

    //     End If
       
    //     If f_sys_valida_ingreso_datos(String(ldt_fch_baja_bd), "FEC") Then

    //        If ldt_fch_baja <> ldt_fch_baja_bd Then

    //            ls_texto = "SE CAMBIA LA FECHA DE BAJA DE " + String(ldt_fch_baja_bd, "DD/MM/YYYY") + " A " + String(ldt_fch_baja, "DD/MM/YYYY")                                              
    //            li_fila = tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.InsertRow(0)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "cod_usuario", gs_usuario)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "fch_registro", ldt_fch_actual)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "cod_tipo_observacion", ls_tipo)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "dsc_observacion", ls_texto)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "cod_tipo_documento", ls_tipo_doc_b)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "dsc_documento", ls_num_doc_b)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "flg_ineditable", "SI")
                          
    //        End If
                      
    //     End If
                
    //     If f_sys_valida_ingreso_datos(String(ldt_fch_alta_bd), "FEC") Then
                      
    //        If ldt_fch_alta <> ldt_fch_alta_bd Then

    //            ls_texto = "SE CAMBIA LA FECHA DE ALTA DE " + String(ldt_fch_alta_bd, "DD/MM/YYYY") + " A " + String(ldt_fch_alta, "DD/MM/YYYY")
              
    //            li_fila = tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.InsertRow(0)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "cod_usuario", gs_usuario)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "fch_registro", ldt_fch_actual)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "cod_tipo_observacion", ls_tipo)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "dsc_observacion", ls_texto)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "cod_tipo_documento", ls_tipo_doc_b)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "dsc_documento", ls_num_doc_b)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "flg_ineditable", "SI")
                          
    //        End If
                      
    //     End If

    //     If f_sys_valida_ingreso_datos(ls_estado_bd, "TEX") Then
                      
    //        If ls_estado <> ls_estado_bd Then
                          
    //            If ls_estado_bd = 'VIG' Then ls_dsc_estado_bd = 'VIGENTE'
    //            If ls_estado_bd = 'BAJ' Then ls_dsc_estado_bd = 'BAJA'
    //            If ls_estado = 'VIG' Then ls_dsc_estado = 'VIGENTE'
    //            If ls_estado = 'BAJ' Then ls_dsc_estado = 'BAJA'
              
    //            ls_texto = 'SE CAMBIA EL ESTADO DEL BENEFICIARIO DE "' + ls_dsc_estado_bd + '" A "' + ls_dsc_estado + "'"
              
    //            li_fila = tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.InsertRow(0)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "cod_usuario", gs_usuario)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "fch_registro", ldt_fch_actual)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "cod_tipo_observacion", ls_tipo)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "dsc_observacion", ls_texto)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "cod_tipo_documento", ls_tipo_doc_b)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "dsc_documento", ls_num_doc_b)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_fila, "flg_ineditable", "SI")
                          
    //        End If
                      
    //     End If

    //     // -- Llave -- //
       
    //     If IsNull(li_num_item) Or li_num_item = 0 Then

    //        li_max_item = li_max_item + 1
    //        tab_1.tp_3.dw_det_beneficiarios.SetItem(li_i, "cod_localidad", ls_localidad)
    //        tab_1.tp_3.dw_det_beneficiarios.SetItem(li_i, "cod_contrato", ls_contrato)
    //        tab_1.tp_3.dw_det_beneficiarios.SetItem(li_i, "cod_tipo_ctt", ls_tipo_ctt)
    //        tab_1.tp_3.dw_det_beneficiarios.SetItem(li_i, "cod_tipo_programa", ls_tipo_programa)
    //        tab_1.tp_3.dw_det_beneficiarios.SetItem(li_i, "num_item", li_max_item)
    //     End If
       
    //     // -- Inicializa -- //
       
    //     tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetFilter("")
    //     tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.Filter()
       
    //     // -- Filtrar -- //
       
    //     tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetFilter("cod_tipo_documento = '" + ls_tipo_doc_b + "' AND dsc_documento = '" + ls_num_doc_b + "'" )
    //     tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.Filter()
                   
    //     For li_j = 1 To tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.RowCount()
                      
    //        // -- Valor -- //
          
    //        li_item = tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.GetItemNumber(li_j, "num_item")
          
    //        // -- Setea -- //
          
    //        tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_j, "cod_localidad", ls_localidad)
    //        tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_j, "cod_tipo_ctt", ls_tipo_ctt)
    //        tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_j, "cod_tipo_programa", ls_tipo_programa)
    //        tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_j, "cod_contrato", ls_contrato)
    //        tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_j, "num_item", tab_1.tp_3.dw_det_beneficiarios.GetItemNumber(li_i, "num_item"))
    //        tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_j, "num_linea", li_j)
                      
    //        // -- Usuario y fecha -- //
          
    //        If f_sys_valida_ingreso_datos(String(li_item), "NUM") = False Then
          
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_j, "cod_usuario", gs_usuario)
    //            tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetItem(li_j, "fch_registro", ldt_fch_actual)
                          
    //        End If
                      
    //     Next

    //     // -- Inicializa -- //
       
    //     tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.SetFilter("")
    //     tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.Filter()
                   
    // Next
     
    // // -- Ref -- //
                   
    // SELECT  vtade_contrato.num_refinanciamiento
    // INTO                     :li_ref_aux
    // FROM                   vtade_contrato
    // WHERE vtade_contrato.cod_localidad = :ls_localidad
    // AND                      vtade_contrato.cod_tipo_ctt = :ls_tipo_ctt
    // AND                      vtade_contrato.cod_tipo_programa = :ls_tipo_programa
    // AND                      vtade_contrato.cod_contrato = :ls_contrato
    // AND                      vtade_contrato.num_servicio = :ls_num_servicio_getrow
    // USING SQLCA;
     
    // // -- Cuotas -- //

    // If is_cronograma = 'SI' Then
                   
    //     // -- Retorno -- //
       
    //     dw_aux.SetTransObject(SQLCA)
    //     dw_aux.Retrieve(ls_localidad, ls_contrato, ls_num_servicio_getrow, li_ref_aux, ls_tipo_ctt, ls_tipo_programa)
       
    //     // -- Borrar -- //
       
    //     For li_i = dw_aux.RowCount() To 1 Step -1

    //        ls_tipo_cuota = dw_aux.GetItemString(li_i, "cod_tipo_cuota")
    //        li_num_cuota = dw_aux.GetItemNumber(li_i, "num_cuota")
    //        If ls_tipo_cuota + String(li_num_cuota) <> 'CUI0' Then dw_aux.DeleteRow(li_i)
    //     Next
                
    //     // -- Cuotas Ordinarias -- //
       
    //     li_tot_cronograma = 0
       
    //     For li_i = 1 To tab_1.tp_4.dw_det_cuotas.Rowcount()
                                      
    //        li_row = dw_aux.InsertRow(0)
          
    //        dw_aux.SetItem(li_row, "cod_localidad", ls_localidad)
    //        dw_aux.SetItem(li_row, "cod_tipo_ctt", ls_tipo_ctt)
    //        dw_aux.SetItem(li_row, "cod_tipo_programa", ls_tipo_programa)
    //        dw_aux.SetItem(li_row, "cod_contrato", ls_contrato)
    //        dw_aux.SetItem(li_row, "num_refinanciamiento", li_ref)
    //        dw_aux.SetItem(li_row, "cod_estadocuota", tab_1.tp_4.dw_det_cuotas.GetItemString(li_i, "cod_estadocuota"))
    //        dw_aux.SetItem(li_row, "cod_tipo_cuota", tab_1.tp_4.dw_det_cuotas.GetItemString(li_i, "cod_tipo_cuota"))
    //        dw_aux.SetItem(li_row, "fch_vencimiento", tab_1.tp_4.dw_det_cuotas.GetItemDatetime(li_i, "fch_vencimiento"))
    //        dw_aux.SetItem(li_row, "imp_igv", tab_1.tp_4.dw_det_cuotas.GetItemDecimal(li_i, "imp_igv"))
    //        dw_aux.SetItem(li_row, "imp_interes", tab_1.tp_4.dw_det_cuotas.GetItemDecimal(li_i, "imp_interes"))
    //        dw_aux.SetItem(li_row, "imp_principal", tab_1.tp_4.dw_det_cuotas.GetItemDecimal(li_i, "imp_principal"))
    //        dw_aux.SetItem(li_row, "imp_saldo", tab_1.tp_4.dw_det_cuotas.GetItemDecimal(li_i, "imp_saldo"))
    //        dw_aux.SetItem(li_row, "imp_total", tab_1.tp_4.dw_det_cuotas.GetItemDecimal(li_i, "imp_total"))
    //        dw_aux.SetItem(li_row, "num_cuota", tab_1.tp_4.dw_det_cuotas.GetItemNumber(li_i, "num_cuota"))
    //        dw_aux.SetItem(li_row, "flg_generar_mora", is_flg_generar_moras)
          
    //        // -- Total Interes -- //
          
    //        lde_tot_interes = lde_tot_interes + tab_1.tp_4.dw_det_cuotas.GetItemDecimal(li_i, "imp_interes")
          
    //        // -- Total -- //
          
    //        li_tot_cronograma = li_tot_cronograma + 1
    //        li_total_cuotas = li_total_cuotas + 1
                      
    //     Next
                   
    //     // -- Inicializa Variables -- //
       
    //     ls_localidad_det = ''
       
    //     // -- Cronograma FOMA -- //

    //     If IsNull(ls_servicio_foma) = False And Trim(ls_servicio_foma) <> '' Then
       
    //        For li_i = 1 To tab_1.tp_5.dw_detalle_cuotas_foma.Rowcount()
                          
    //            ls_localidad_det = tab_1.tp_5.dw_detalle_cuotas_foma.GetItemString(li_i, "cod_localidad")
              
    //            If IsNull(ls_localidad_det) Or Trim(ls_localidad_det) = '' Then
                              
    //                li_row = dw_aux.InsertRow(0)
                  
    //                dw_aux.SetItem(li_row, "cod_localidad", ls_localidad)
    //                dw_aux.SetItem(li_row, "cod_tipo_ctt", ls_tipo_ctt)
    //                dw_aux.SetItem(li_row, "cod_tipo_programa", ls_tipo_programa)
    //                dw_aux.SetItem(li_row, "cod_contrato", ls_contrato)
    //                dw_aux.SetItem(li_row, "num_refinanciamiento", li_ref)
    //                dw_aux.SetItem(li_row, "cod_estadocuota", tab_1.tp_5.dw_detalle_cuotas_foma.GetItemString(li_i, "cod_estadocuota"))
    //                dw_aux.SetItem(li_row, "cod_tipo_cuota", tab_1.tp_5.dw_detalle_cuotas_foma.GetItemString(li_i, "cod_tipo_cuota"))
    //                dw_aux.SetItem(li_row, "fch_vencimiento", tab_1.tp_5.dw_detalle_cuotas_foma.GetItemDatetime(li_i, "fch_vencimiento"))
    //                dw_aux.SetItem(li_row, "imp_principal", tab_1.tp_5.dw_detalle_cuotas_foma.GetItemDecimal(li_i, "imp_principal"))
    //                dw_aux.SetItem(li_row, "imp_saldo", tab_1.tp_5.dw_detalle_cuotas_foma.GetItemDecimal(li_i, "imp_saldo"))
    //                dw_aux.SetItem(li_row, "imp_total", tab_1.tp_5.dw_detalle_cuotas_foma.GetItemDecimal(li_i, "imp_total"))
    //                dw_aux.SetItem(li_row, "num_cuota", tab_1.tp_5.dw_detalle_cuotas_foma.GetItemDecimal(li_i, "num_cuota") + li_tot_cronograma)
                  
    //                li_total_cuotas = li_total_cuotas + 1
                              
    //            End If
                          
    //        Next
                      
    //     End If
                   
    // Else
                   
    //     dw_aux.SetTransObject(SQLCA)
    //     dw_aux.Retrieve(ls_localidad, ls_contrato, ls_num_servicio_getrow, li_ref_aux, ls_tipo_ctt, ls_tipo_programa)

    //     // -- FOMA -- //
       
    //     If is_cronograma_foma = 'SI' Then
                      
    //        // -- Borrar -- //

    //        For li_i = dw_aux.RowCount() To 1 Step -1

    //            ls_tipo_cuota = dw_aux.GetItemString(li_i, "cod_tipo_cuota")
    //            If ls_tipo_cuota = 'FMA' Then dw_aux.DeleteRow(li_i)

    //        Next
                      
    //        li_tot_cronograma = dw_aux.GetItemNumber(dw_aux.Rowcount(), "num_cuota")
          
    //        // -- FOMA -- //
          
    //        If IsNull(ls_servicio_foma) = False And Trim(ls_servicio_foma) <> '' Then

    //            For li_i = 1 To tab_1.tp_5.dw_detalle_cuotas_foma.Rowcount()
                              
    //                ls_localidad_det = tab_1.tp_5.dw_detalle_cuotas_foma.GetItemString(li_i, "cod_localidad")
                            
    //                // -- Crea -- //
                 
    //                If IsNull(ls_localidad_det) Or Trim(ls_localidad_det) = '' Then
                                 
    //                   li_row = dw_aux.InsertRow(0)
                     
    //                   dw_aux.SetItem(li_row, "cod_localidad", ls_localidad)
    //                   dw_aux.SetItem(li_row, "cod_tipo_ctt", ls_tipo_ctt)
    //                   dw_aux.SetItem(li_row, "cod_tipo_programa", ls_tipo_programa)
    //                   dw_aux.SetItem(li_row, "cod_contrato", ls_contrato)
    //                   dw_aux.SetItem(li_row, "num_refinanciamiento", li_ref)
    //                   dw_aux.SetItem(li_row, "cod_estadocuota", tab_1.tp_5.dw_detalle_cuotas_foma.GetItemString(li_i, "cod_estadocuota"))
    //                   dw_aux.SetItem(li_row, "cod_tipo_cuota", tab_1.tp_5.dw_detalle_cuotas_foma.GetItemString(li_i, "cod_tipo_cuota"))
    //                   dw_aux.SetItem(li_row, "fch_vencimiento", tab_1.tp_5.dw_detalle_cuotas_foma.GetItemDatetime(li_i, "fch_vencimiento"))
    //                   dw_aux.SetItem(li_row, "imp_principal", tab_1.tp_5.dw_detalle_cuotas_foma.GetItemDecimal(li_i, "imp_principal"))
    //                   dw_aux.SetItem(li_row, "imp_saldo", tab_1.tp_5.dw_detalle_cuotas_foma.GetItemDecimal(li_i, "imp_saldo"))
    //                   dw_aux.SetItem(li_row, "imp_total", tab_1.tp_5.dw_detalle_cuotas_foma.GetItemDecimal(li_i, "imp_total"))
    //                   dw_aux.SetItem(li_row, "num_cuota", tab_1.tp_5.dw_detalle_cuotas_foma.GetItemDecimal(li_i, "num_cuota") + li_tot_cronograma)
                                 
    //                End If
                              
    //            Next
              
    //        End If
                      
    //     End If
                   
    //     // -- Total -- //
       
    //     SELECT  MAX(vtade_cronograma.num_cuota)
    //     INTO                     :li_total_cuotas
    //     FROM                   vtade_cronograma
    //     WHERE vtade_cronograma.cod_localidad = :ls_localidad
    //     AND                      vtade_cronograma.cod_tipo_ctt = :ls_tipo_ctt
    //     AND                      vtade_cronograma.cod_tipo_programa = :ls_tipo_programa
    //     AND                      vtade_cronograma.cod_contrato = :ls_contrato
    //     AND                      vtade_cronograma.num_refinanciamiento = :li_ref
    //     USING SQLCA;
       
    //     If IsNull(li_total_cuotas) Then li_total_cuotas = 0
                   
    // End If
     
    // // -- Inicializa -- //
     
    // lde_tot_interes = 0
     
    // // -- Interes -- //
     
    // For li_i = 1 To tab_1.tp_4.dw_det_cuotas.Rowcount()                

    //     lde_tot_interes = lde_tot_interes + tab_1.tp_4.dw_det_cuotas.GetItemDecimal(li_i, "imp_interes")

    // Next
     
    // // -- Ref -- //
     
    // If dw_aux.Rowcount() > 0 Then
                   
    //     For li_i = 1 To tab_1.tp_4.dw_det_cuotas.RowCount()

    //        ls_estado = tab_1.tp_4.dw_det_cuotas.GetItemString(li_i, "cod_estadocuota")
    //        If ls_estado <> 'REG' Then li_valida = li_valida + 1

    //     Next
       
    //     // -- Borrar cuota "0" en caso de existir -- //
                   
    //     If is_cronograma = 'SI' Then

    //        If is_flg_cronograma_cuoi = 'SI' Then                                            
    //            DELETE vtade_cronograma
    //            WHERE vtade_cronograma.cod_localidad = :ls_localidad
    //            AND                      vtade_cronograma.cod_tipo_ctt = :ls_tipo_ctt
    //            AND                      vtade_cronograma.cod_tipo_programa = :ls_tipo_programa
    //            AND                      vtade_cronograma.cod_contrato = :ls_contrato
    //            AND                      vtade_cronograma.num_refinanciamiento = :li_ref
    //            AND                      vtade_cronograma.num_cuota <= 0
    //            AND                      vtade_cronograma.cod_tipo_cuota = 'CUI'
    //            USING SQLCA;
            
    //            If f_verifica_transaccion(SQLCA) = False Then Goto db_error
                        
    //        End If
    //     End If
       
    //     If dw_aux.UpDate() <> 1 Then Goto db_error
                     
    // End If
     
    // // -- Cuota -- //
     
    // SELECT  MAX(vtade_cronograma.imp_total)
    // INTO                     :lde_valor_cuota
    // FROM                   vtade_cronograma
    // WHERE vtade_cronograma.cod_localidad = :ls_localidad
    // AND                      vtade_cronograma.cod_tipo_ctt = :ls_tipo_ctt
    // AND                      vtade_cronograma.cod_tipo_programa = :ls_tipo_programa
    // AND                      vtade_cronograma.cod_contrato = :ls_contrato
    // AND                      vtade_cronograma.num_refinanciamiento = :li_ref
    // AND                      vtade_cronograma.cod_tipo_cuota = 'ARM'
    // USING SQLCA;
     
    // // -- N° de servicios -- //
     
    // For li_i = 1 To tab_1.tp_4.dw_servicio_vin.Rowcount()
                   
    //     ls_servicio = tab_1.tp_4.dw_servicio_vin.GetItemString(li_i, "num_servicio")
       
    //     // -- Inicializar -- //
       
    //     lde_costo_carencia = 0
       
    //     // -- Servicio principal -- //               

    //     SELECT  vtade_contrato_servicio.imp_costo_carencia
    //     INTO                     :lde_costo_carencia
    //     FROM                   vtade_contrato_servicio
    //     WHERE vtade_contrato_servicio.cod_localidad = :ls_localidad
    //     AND                      vtade_contrato_servicio.cod_tipo_ctt = :ls_tipo_ctt
    //     AND                      vtade_contrato_servicio.cod_tipo_programa = :ls_tipo_programa
    //     AND                      vtade_contrato_servicio.cod_contrato = :ls_contrato
    //     AND                      vtade_contrato_servicio.num_servicio = :ls_servicio
    //     AND                      vtade_contrato_servicio.flg_servicio_principal = 'SI'
    //     USING SQLCA;
                   
    //     // -- Replica Datos -- //
       
    //     UPDATE  vtade_contrato
    //     SET  vtade_contrato.cod_vendedor = :ls_vendedor,
    //        vtade_contrato.cod_supervisor = :ls_supervisor,
    //        vtade_contrato.cod_jefeventas = :ls_jefe,
    //        vtade_contrato.cod_grupo = :ls_grupo,
    //        vtade_contrato.cod_canal_venta = :ls_canal,
    //        vtade_contrato.cod_tipo_comisionista = :ls_tipo_comisionista,
    //        vtade_contrato.cod_cuota = :ls_cuota,
    //        vtade_contrato.num_cuotas = :li_cuotas,
    //        vtade_contrato.cod_interes = :ls_interes,
    //        vtade_contrato.fch_primer_vencimiento = :ldt_fch_venc,
    //        vtade_contrato.imp_tasa_interes = :lde_tasa,
    //        vtade_contrato.fch_emision = ( CASE WHEN vtade_contrato.fch_emision IS NULL THEN :ldt_fch_actual ELSE vtade_contrato.fch_emision END ),
    //        vtade_contrato.flg_emitido = 'SI',
    //        vtade_contrato.cod_usuario_emision = :gs_usuario,
    //        vtade_contrato.flg_agencia = :ls_flg_agencia,
    //        vtade_contrato.cod_agencia = :ls_agencia,
    //        vtade_contrato.cod_convenio = :ls_convenio,
    //        vtade_contrato.cod_titular_alterno = :ls_cliente_alterno,
    //        vtade_contrato.cod_aval = :ls_aval,                           
    //        vtade_contrato.cod_empresa = :gs_empresa,
    //        vtade_contrato.cod_cobrador = :ls_cod_cobrador,
    //        vtade_contrato.imp_valor_cuota = :lde_valor_cuota,
    //        vtade_contrato.imp_interes = :lde_tot_interes,
    //        vtade_contrato.cod_zona = :ls_zona,
    //        vtade_contrato.imp_costo_carencia = :lde_costo_carencia 
    //     WHERE vtade_contrato.cod_localidad = :ls_localidad
    //     AND                      vtade_contrato.cod_tipo_ctt = :ls_tipo_ctt
    //     AND                      vtade_contrato.cod_tipo_programa = :ls_tipo_programa
    //     AND                      vtade_contrato.cod_contrato = :ls_contrato
    //     AND                      vtade_contrato.num_servicio = :ls_servicio
    //     USING SQLCA;
                   
    //     If f_verifica_transaccion(SQLCA) = False Then Goto db_error
       
    //     // -- DS -- //

    //     ls_servicio_foma = ""
       
    //     SELECT  vtade_contrato.num_servicio_foma
    //     INTO                     :ls_servicio_foma
    //     FROM                   vtade_contrato
    //     WHERE vtade_contrato.cod_localidad = :ls_localidad
    //     AND                      vtade_contrato.cod_tipo_ctt = :ls_tipo_ctt
    //     AND                      vtade_contrato.cod_tipo_programa = :ls_tipo_programa
    //     AND                      vtade_contrato.cod_contrato = :ls_contrato
    //     AND                      vtade_contrato.num_servicio = :ls_servicio
    //     USING SQLCA;
                   
    //     If IsNull(ls_servicio_foma) Then ls_servicio_foma = ""
                   
    //     // -- Actualiza FOMA -- //

    //     If IsNull(ls_servicio_foma) = False And Trim(ls_servicio_foma) <> "" Then
                      
    //        UPDATE  vtade_contrato
    //        SET  vtade_contrato.cod_vendedor = :ls_vendedor,
    //           vtade_contrato.cod_supervisor = :ls_supervisor,
    //           vtade_contrato.cod_jefeventas = :ls_jefe,
    //           vtade_contrato.cod_grupo = :ls_grupo,
    //           vtade_contrato.cod_canal_venta = :ls_canal,
    //           vtade_contrato.cod_tipo_comisionista = :ls_tipo_comisionista,
    //           vtade_contrato.cod_cuota = :ls_cuota_foma,
    //           vtade_contrato.num_cuotas = :li_cuotas_foma,
    //           vtade_contrato.fch_primer_vencimiento = :ldt_fch_venc_foma,
    //           vtade_contrato.fch_emision = ( CASE WHEN vtade_contrato.fch_emision IS NULL THEN :ldt_fch_actual ELSE vtade_contrato.fch_emision END ),
    //           vtade_contrato.flg_emitido = 'SI',
    //           vtade_contrato.cod_usuario_emision = :gs_usuario,
    //           vtade_contrato.cod_titular_alterno = :ls_cliente_alterno,
    //           vtade_contrato.cod_aval = :ls_aval,
    //           vtade_contrato.cod_cobrador = :ls_cod_cobrador,
    //           vtade_contrato.cod_zona = :ls_zona
    //        WHERE vtade_contrato.cod_localidad = :ls_localidad
    //        AND      vtade_contrato.cod_tipo_ctt = :ls_tipo_ctt
    //        AND      vtade_contrato.cod_tipo_programa = :ls_tipo_programa
    //        AND                      vtade_contrato.cod_contrato = :ls_contrato
    //        AND                      vtade_contrato.num_servicio = :ls_servicio_foma
    //        USING SQLCA;

    //        If f_verifica_transaccion(SQLCA) = False Then Goto db_error
                      
    //     End If
                   
    // Next
     
    // // -- UpDate Dw -- //
     
    // If tab_1.tp_3.dw_det_beneficiarios.UpDate() <> 1 Then Goto db_error
    // If tab_1.tp_3.tab_3.tp_observacion.dw_observacion_benef.UpDate() <> 1 Then Goto db_error
     
    // // -- Actualiza Resumen Cronograma -- //
     
    // UPDATE               vtaca_cronograma
    // SET                        vtaca_cronograma.num_cuotas = :li_total_cuotas,
    //                            vtaca_cronograma.cod_interes = :ls_interes,
    //                            vtaca_cronograma.imp_tasainteres = :lde_tasa,
    //                            vtaca_cronograma.imp_interes = :lde_tot_interes
    // WHERE vtaca_cronograma.cod_localidad = :ls_localidad
    // AND                      vtaca_cronograma.cod_tipo_ctt = :ls_tipo_ctt
    // AND                      vtaca_cronograma.cod_tipo_programa = :ls_tipo_programa
    // AND                      vtaca_cronograma.cod_contrato = :ls_contrato
    // AND                      vtaca_cronograma.num_refinanciamiento = :li_ref
    // USING SQLCA;
     
    // If f_verifica_transaccion(SQLCA) = False Then Goto db_error
     
    // // -- Cabecera -- //
     
    // UPDATE               vtaca_contrato
    // SET                        vtaca_contrato.cod_tipo_contrato = :ls_tipo_contrato
    // WHERE vtaca_contrato.cod_localidad = :ls_localidad
    // AND                      vtaca_contrato.cod_tipo_ctt = :ls_tipo_ctt
    // AND                      vtaca_contrato.cod_tipo_programa = :ls_tipo_programa
    // AND                      vtaca_contrato.cod_contrato = :ls_contrato
    // USING SQLCA;
     
    // If f_verifica_transaccion(SQLCA) = False Then Goto db_error
     
    // // -- Max -- //
     
    // li_linea = 0
     
    // SELECT  MAX(vtade_observacion_x_contrato.num_linea)
    // INTO                     :li_linea
    // FROM                   vtade_observacion_x_contrato
    // WHERE vtade_observacion_x_contrato.cod_localidad = :ls_localidad
    // AND                      vtade_observacion_x_contrato.cod_tipo_ctt = :ls_tipo_ctt
    // AND                      vtade_observacion_x_contrato.cod_tipo_programa = :ls_tipo_programa
    // AND                      vtade_observacion_x_contrato.cod_contrato = :ls_contrato
    // AND                      vtade_observacion_x_contrato.num_servicio = :ls_num_servicio_getrow
    // USING SQLCA;
     
    // If f_verifica_transaccion(SQLCA) = False Then Goto db_error
     
    // If IsNull(li_linea) Then li_linea = 0
     
    // // -- Observaciones -- //
     
    // For li_i = 1 To tab_1.tp_10.dw_observacion.Rowcount()
                   
    //     li_row =  tab_1.tp_10.dw_observacion.GetItemNumber(li_i, "num_linea")
       
    //     If IsNull(li_row) Or li_row = 0 Then
                      
    //        li_linea = li_linea + 1
    //        tab_1.tp_10.dw_observacion.SetItem(li_i, "cod_localidad", ls_localidad)
    //        tab_1.tp_10.dw_observacion.SetItem(li_i, "cod_tipo_ctt", ls_tipo_ctt)
    //        tab_1.tp_10.dw_observacion.SetItem(li_i, "cod_tipo_programa", ls_tipo_programa)
    //        tab_1.tp_10.dw_observacion.SetItem(li_i, "cod_contrato", ls_contrato)
    //        tab_1.tp_10.dw_observacion.SetItem(li_i, "num_servicio", ls_num_servicio_getrow)
    //        tab_1.tp_10.dw_observacion.SetItem(li_i, "num_linea", li_linea)
                      
    //     End If               

    // Next


    // If tab_1.tp_10.dw_observacion.Update() <> 1 Then Goto db_error
    // If tab_1.tp_12.dw_condicion.Update() <> 1 Then Goto db_error
     
    // Commit;
    // f_sys_mensaje_usuario(Title, "MSGLIB", "SE GRABO EL REGISTRO SATISFACTORIAMENTE.", "MSG")
    // TriggerEvent("ue_limpiar")
     
    // // -- Replicar ERP (Contrato) -- //
     
    // If gs_flg_replicar_erp = 'SI' Then
                   
    //     // -- Servicio -- //
                     
    //     soapconnection onn_ctt
    //     ws_integrens_ext servicio_ctt               
    //     onn_ctt = CREATE soapconnection
    //     li_instancia = onn_ctt.CreateInstance(servicio_ctt, "ws_integrens_ext", gs_dsc_webservice_erp)
       
    //     If li_instancia <> 0 Then

    //        f_sys_mensaje_usuario(Title, "MSGLIB", "ERROR DE CONEXIÓN AL SERVICIO WEB.", "ERR")

    //     Else
     
    //        // -- Inicializa -- //

    //        ls_flg_respuesta = 'NO'

    //        // -- Replica contrato -- //
          
    //        lb_contrato = f_vta_xml_contrato(ls_localidad, ls_tipo_ctt, ls_tipo_programa, ls_contrato, ls_xml_cabecera, ls_xml_detalle, ls_xml_cronograma)
          
    //        // -- Genera XML -- //
                                  
    //            If gs_flg_replicar_erp = 'SI' Then
                                                                     
    //                If ii_acceso > 0 Then
                                          
    //                    If f_sys_mensaje_usuario(Title, "MSGLIB", "DESEA GENERAR LOS ARCHIVOS XML CORRESPONDIENTES AL CONTRATO [" + ls_contrato + "]?", "PRG") = 1 Then
                                             
    //                       // -- Crea directorio -- //

    //                       If DirectoryExists ("C:\UmayuxSoftware\XML") = False Then CreateDirectory ("C:\UmayuxSoftware\XML")
                         
    //                       If FileExists("C:\UmayuxSoftware\XML\" + ls_contrato + "_Cabecera.txt") Then FileDelete("C:\UmayuxSoftware\XML\" + ls_contrato + "_Cabecera.txt")

    //                       If FileExists("C:\UmayuxSoftware\XML\" + ls_contrato + "_Detalle.txt") Then FileDelete("C:\UmayuxSoftware\XML\" + ls_contrato + "_Detalle.txt")

    //                       If FileExists("C:\UmayuxSoftware\XML\" + ls_contrato + "_Cronograma.txt") Then FileDelete("C:\UmayuxSoftware\XML\" + ls_contrato + "_Cronograma.txt")

    //                       li_open = FileOpen("C:\UmayuxSoftware\XML\" + ls_contrato + "_Cabecera.xml", TextMode!, Write!)

    //                       FileWriteEx(li_open, ls_xml_cabecera)

    //                       FileClose(li_open)
                         
    //                       li_open = FileOpen("C:\UmayuxSoftware\XML\" + ls_contrato + "_Detalle.xml", TextMode!, Write!)

    //                       FileWriteEx(li_open, ls_xml_detalle)

    //                       FileClose(li_open)
                                 
    //                       li_open = FileOpen("C:\UmayuxSoftware\XML\" + ls_contrato + "_Cronograma.xml", TextMode!, Write!)

    //                       FileWriteEx(li_open, ls_xml_cronograma)

    //                       FileClose(li_open)
                         
    //                       f_sys_mensaje_usuario(Title, "MSGLIB", "SE GENERO LOS ARCHIVOS XML SATISFACTORIAMENTE POR FAVOR VERIFIQUE LA RUTA: C:\UMAYUXSOFTWARE\XML.", "MSG")
                                             
    //                    End If
                                  
    //                End If
                              
    //            End If
     
    //            // -- Envio -- //

    //            ls_flg_respuesta = servicio_ctt.ws_cmrext_externo_importa_contratos_xml(ls_xml_cabecera, ls_xml_detalle, ls_xml_cronograma, 'A00', gs_usuario)
    //            ls_flg_respuesta = UPPER(ls_flg_respuesta)

    //            li_pos = Pos(ls_flg_respuesta, "<ESTADO>") + 8
    //            ls_flg_correcto = Mid(ls_flg_respuesta, li_pos, 2)

    //            If ls_flg_correcto <> 'CO' Then

    //                f_sys_mensaje_usuario(Title, "MSGLIB", "PROBLEMAS AL HACER EL ENVIO AL ERP INTEGRENS [" + ls_flg_respuesta + "].", "ERR")

    //                Return

    //            Else

    //                UPDATE               vtaca_contrato
    //                SET                  vtaca_contrato.flg_replicado = 'SI'
    //                WHERE vtaca_contrato.cod_localidad = :ls_localidad
    //                AND   vtaca_contrato.cod_tipo_ctt = :ls_tipo_ctt
    //                AND   vtaca_contrato.cod_tipo_programa = :ls_tipo_programa
    //                AND   vtaca_contrato.cod_contrato = :ls_contrato
    //                USING SQLCA;

    //                If f_verifica_transaccion(SQLCA) = False Then

    //                    RollBack;

    //                   f_sys_mensaje_usuario(Title, "MSGLIB", "[2] ERROR EN LA ACTUALIZACIÓN DE LA BASE DE DATOS.", "ERR")

    //                Else

    //                     Commit;

    //                End If
                              
    //            End If
                          
    //     End If

    // End If
     
    // dw_cab.SetItem(1, "cod_localidad", ls_localidad)
    // dw_cab.SetItem(1, "cod_tipo_ctt", ls_tipo_ctt)
    // dw_cab.SetItem(1, "cod_tipo_programa", ls_tipo_programa)
     
    // is_flg_recupera = 'SI'
    // f_sys_dw_ubica_cursor(dw_cab, "cod_contrato", "FREE", 0)
    // dw_cab.SetItem(1, "cod_contrato", ls_contrato)
    // dw_cab.TriggerEvent(Itemchanged!)
     
    // Return
     
    // db_error:
    // RollBack;
    // f_sys_mensaje_usuario(Title, "MSGLIB", "ERROR EN LA ACTUALIZACION DE LA BASE DE DATOS.", "ERR")
// }//function modificaCtto