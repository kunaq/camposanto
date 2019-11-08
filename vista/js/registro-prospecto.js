$("#numDocRegPro").number(true);
$("#tabRegConRegPro").DataTable();

function DocLenghtBusq(tipo){
    if (tipo == "DI001") {
      document.getElementById("numDocRegPro").setAttribute('maxlength',8);
      document.getElementById("dscCliRegPro").innerHTML = 'Nombres';
    }else if(tipo == "DI002"){
      document.getElementById("numDocRegPro").setAttribute('maxlength',12);
      document.getElementById("dscCliRegPro").innerHTML = 'Nombres';
    }else if(tipo == "DI003"){
      document.getElementById("numDocRegPro").setAttribute('maxlength',12);
      document.getElementById("dscCliRegPro").innerHTML = 'Nombres';
    }else if(tipo == "DI004"){
      document.getElementById("numDocRegPro").setAttribute('maxlength',11);
      document.getElementById("dscCliRegPro").innerHTML = 'Razón social';
    }else if(tipo == "DI005"){
      $("#numDocRegPro").removeAttr("maxlength");
      document.getElementById("dscCliRegPro").innerHTML = 'Nombres';
    }
}

$("#edoGesRegPro").change(function(){
	if (this.value == "CIE") {
		$("#cttoRegPro").attr('hidden',false);
	}
	else if(this.value == "CAD"){
		$("#cttoRegPro").attr('hidden',true);
		swal({
            type: "warning",
            title: "El estado 'CADUCO' es automático, NO puede ser seleccionado manualmente. ",
            showConfirmButton: true,
        	confirmButtonText: "Cerrar"
        });//swal
	}
	else{
		$("#cttoRegPro").attr('hidden',true);
	}
});