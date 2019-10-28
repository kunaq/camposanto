$("#fchIniLisPro").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true
});//datepicker

$("#fchFinLisPro").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true
});//datepicker

function DocLenghtBusq(tipo){
    if (tipo == "DI001") {
      document.getElementById("numDocLisPro").setAttribute('maxlength',8);
    }else if(tipo == "DI002"){
      document.getElementById("numDocLisPro").setAttribute('maxlength',12);
    }else if(tipo == "DI003"){
      document.getElementById("numDocLisPro").setAttribute('maxlength',12);
    }else if(tipo == "DI004"){
      document.getElementById("numDocLisPro").setAttribute('maxlength',11)
    }else if(tipo == "DI005"){
      $("#numDocLisPro").removeAttr("maxlength");
    }
}

