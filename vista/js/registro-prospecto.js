$("#numDocRegPro").number(true);
$("#tabRegConRegPro").Datatable();

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

$("#edoGesRegPro").on('change', function(){
	alert(this.value);
});