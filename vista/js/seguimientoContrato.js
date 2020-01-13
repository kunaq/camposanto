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
    });//ajax
}














init();

