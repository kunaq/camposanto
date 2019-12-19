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

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    console.log(results);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

document.getElementById("bodySegCtto").onload = function() {
	var cod = getParameterByName('codCtto');
	alert(cod);
};
