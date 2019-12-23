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
	$("#divLoc").hide();
	$("#divCtt").hide();
	$("#divBtnCtt").hide();
}

init();

function getParameterByName() {
    var query = window.location.search.substring(1);
    var pair = query.split("=");
    console.log(pair[1]);
    $("#numCttSegCtt").val(pair[1]);
    $.ajax({
        url:"ajax/segCtto.ajax.php",
        method: "POST",
        dataType: 'json',
        data: {'codCtto':pair[1],'accion':'cargaDatosCtto'},
        success: function(respuesta){
        	console.log('respuesta',respuesta);
        }//succes
    });//ajax
}

getParameterByName();