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

function getQueryVariable(variable) {
   var query = window.location.search.substring(1);
   var vars = query.split("&");
   for (var i=0; i < vars.length; i++) {
       var pair = vars[i].split("=");
       if(pair[0] == variable) {
       	console.log(pair[1]);
           return pair[1];
       }
   }
   return false;
}