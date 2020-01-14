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
        data: {'accion' : 'getDatosCtt', 'cod_contrato' : codCtt},
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

function getDatosServicioCtt(row,localidad,tasa,tipoCtt,tipoPro,codCtt,numRef,numSer){
	var rows = $('#myTableServicios tr').not(':first');
	rows.removeClass('selected'); 
  	$(row).closest('tr').addClass('selected');
  	var fila="<tr><td>"+numRef+"</td></tr>";
  	document.getElementById("tbodyRef").innerHTML = fila;

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
        data: {'accion' : 'getBeneficiarios', 'localidad' : localidad, 'cod_contrato' : codCtt, 'cod_servicio' : numSer},
        success: function(respuesta){

        	var info = JSON.parse(respuesta);

        	$("#tbodyBeneficiarios").html(info.tablaBeneficiarios);
        	
        }//succes
    });//ajaxGetCuotas
}

function getDatosServicioCtt(row,servicio,tipoDoc,numDoc,apePaterno,apeMaterno,nombre,sexo,edoCivil,fchNac,parentesco,peso,talla,religion,observacion,fchDec,fchEnt,lugarDec,motivoDec,nivel,flgAutopsia){
	var rows = $('#myTableBeneficiarios tr').not(':first');
	rows.removeClass('selected'); 
  	$(row).closest('tr').addClass('selected');
 }












init();

