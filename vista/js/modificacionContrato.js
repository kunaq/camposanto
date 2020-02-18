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
            var fch_emision = fechaParaConsulta(respuesta[0]['fch_emision']);
            var auditEmi = buscaDatosPeriodo(fch_emision,'Emi');
            var fch_activacion = fechaParaConsulta(respuesta[0]['fch_activacion']);
            var auditAct = buscaDatosPeriodo(fch_activacion,'Act');
            var fch_resolucion = fechaParaConsulta(respuesta[0]['fch_resolucion']);
            var auditRes = buscaDatosPeriodo(fch_resolucion,'Res');
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
            $("#tipoNecCtto").val(respuesta[0]['cod_tipo_necesidad']);
            if(respuesta[0]['cod_tipo_necesidad'] == 'NI'){
                $("#tabAval").attr('hidden',false);
                $("#tab2doTitular").attr('hidden',true);
            }else if(respuesta[0]['cod_tipo_necesidad'] == 'NF'){
                $("#tabAval").attr('hidden',true);
                $("#tab2doTitular").attr('hidden',false);
            }
        	document.getElementById("tipoEspModifContrato").value = respuesta[0]['dsc_tipo_espacio'];
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
				'</tr>';
				document.getElementById("bodyDetCttoModif").insertAdjacentHTML("beforeEnd" ,fila);
                if (respuesta[0]['flg_ctt_integral'] == 'SI') {
                    var fila2 = '<tr name="'+value['num_servicio']+'">'+
                        '<td class="text-center">'+value['num_servicio']+
                        '<td class="text-right">'+Number(value['imp_saldofinanciar']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });+'</td>'+
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
            $("#numRefinanciamiento").val(respuesta['num_refinanciamiento']);
        	if(respuesta['imp_saldofinanciar'] != 0){
        		cargaCronograma(codCtto,respuesta['num_refinanciamiento']);
        		cargaFoma(codCtto,respuesta['num_refinanciamiento']);
        	}
            // console.log($("#flg_ctt_integral").val());
            if ($("#flg_ctt_integral").val() == 'NO') {
                    $("#bodyServicioVin").empty();
                    var fila2 = '<tr name="'+respuesta['num_servicio']+'">'+
                        '<td class="text-center">'+respuesta['num_servicio']+
                        '<td class="text-right">'+Number(respuesta['imp_saldofinanciar']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                    '</tr>';
                    document.getElementById("bodyServicioVin").insertAdjacentHTML("beforeEnd" ,fila2);
                    document.getElementById("totalServicioVin").innerText = Number(respuesta['imp_saldofinanciar']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
                }
            $("#anularBoton").attr('name',id);
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
  var registro = [tipoDoc,numDoc,apellPaterno,apellMaterno,nombre,fechNac,fechDec,religion,edoCivil,sexo,parentesco,lugarDeceso,motivoDeceso,peso,talla,autopsia];
  var muestra = '<tr onclick="verDetalles(event)" id="'+numDoc+'">'+
  					'<td class="'+numDoc+'">'+apellPaterno+' '+apellMaterno+', '+nombre+
  					'<input type="hidden" id="idBenef" value="'+numDoc+'"><input type="hidden" id="registro_'+numDoc+'" value="'+registro+'">'+
  					'</td></tr>';
  document.getElementById("bodyBeneficiarioM").insertAdjacentHTML("beforeEnd" ,muestra);

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
  $('#autopsiaBenefM').prop('disabled',false);

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
  var registro = [tipoDoc,numDoc,apellPaterno,apellMaterno,nombre,fechNac,fechDec,religion,edoCivil,sexo,parentesco,lugarDeceso,motivoDeceso,peso,talla,autopsia];
  var muestra = '<tr onclick="verDetalles(event)" id="'+numDoc+'"><td class="'+numDoc+'">'+numDoc+'</td><td class="'+numDoc+'">'+nombre+'</td><td class="'+numDoc+'">'+apellPaterno+' '+apellMaterno+'<input type="hidden" id="idBenef" value="'+numDoc+'"><input type="hidden" id="registro_'+numDoc+'" value="'+registro+'"></td></tr>';
  document.getElementById(id).remove();
  document.getElementById("bodyBeneficiarioM").insertAdjacentHTML("beforeEnd" ,muestra);

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
  $('#autopsiaBenefM').prop("checked", false);

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
  $('#autopsiaBenefM').prop("checked", autopsia);
  $('#autopsiaBenefM').prop('disabled',true);
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

//-------------------------------botones---------------------------------

function anulaCtto(){
	var activado = $("#flg_activado").val();
	if (activado == 'SI') {
		alert('paso');
	}
}

//---------------------------limpia formulario------------------------------//

function resetForm(){
    limpiaydsi();
    document.getElementById("myForm").reset();
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