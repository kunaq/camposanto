function init() {
	document.getElementById("etdServicio").value = 'REG';
	tipoAutorizacion();
}

function tipoAutorizacion(value){
	console.log(value);

	if (value == "00001") {
	  	$('#atzServicioInh').prop('hidden',false);
		$('#atzServicioMisa').prop('hidden',true);
	  	$('#atzServicioMisaEsp').prop('hidden',true);
	  	$('#atzTrasladoExt').prop('hidden',true);
	  	$('#atzTrasladoInt').prop('hidden',true);
	  	$('#atzServicioFun').prop('hidden',true);
	  	$('input[type="text"]').val('');
	}else if (value == "00002") {
		$('#atzServicioMisa').prop('hidden',false);
	  	$('#atzServicioMisaEsp').prop('hidden',true);
	  	$('#atzTrasladoExt').prop('hidden',true);
	  	$('#atzTrasladoInt').prop('hidden',true);
	  	$('#atzServicioFun').prop('hidden',true);
	  	$('#atzServicioInh').prop('hidden',true);
	  	$('input[type="text"]').val('');
	}else if (value == "00003") {
		$('#atzServicioMisaEsp').prop('hidden',false);
		$('#atzServicioMisa').prop('hidden',true);
	  	$('#atzTrasladoExt').prop('hidden',true);
	  	$('#atzTrasladoInt').prop('hidden',true);
	  	$('#atzServicioFun').prop('hidden',true);
	  	$('#atzServicioInh').prop('hidden',true);
	  	$('input[type="text"]').val('');
	}else if (value == "00004") {
		$('#atzTrasladoInt').prop('hidden',false);
		$('#atzServicioMisaEsp').prop('hidden',true);
		$('#atzServicioMisa').prop('hidden',true);
	  	$('#atzTrasladoExt').prop('hidden',true);
	  	$('#atzServicioFun').prop('hidden',true);
	  	$('#atzServicioInh').prop('hidden',true);
	  	$('input[type="text"]').val('');
	}else if (value == "00005") {
		$('#atzTrasladoExt').prop('hidden',false);
		$('#atzTrasladoInt').prop('hidden',true);
		$('#atzServicioMisaEsp').prop('hidden',true);
		$('#atzServicioMisa').prop('hidden',true);
	  	$('#atzServicioFun').prop('hidden',true);
	  	$('#atzServicioInh').prop('hidden',true);
	  	$('input[type="text"]').val('');
	}else if (value == "00006") {
		$('#atzServicioFun').prop('hidden',false);
		$('#atzTrasladoExt').prop('hidden',true);
		$('#atzTrasladoInt').prop('hidden',true);
		$('#atzServicioMisaEsp').prop('hidden',true);
		$('#atzServicioMisa').prop('hidden',true);
	  	$('#atzServicioInh').prop('hidden',true);
	  	$('input[type="text"]').val('');
	}else {
		$('#atzTrasladoExt').prop('hidden',false);
		$('#atzTrasladoInt').prop('hidden',true);
		$('#atzServicioMisaEsp').prop('hidden',true);
		$('#atzServicioMisa').prop('hidden',true);
	  	$('#atzServicioFun').prop('hidden',true);
	  	$('#atzServicioInh').prop('hidden',true);
	}
}





init();