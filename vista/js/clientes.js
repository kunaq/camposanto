function decode_utf8(s) {
  return decodeURIComponent(escape(s));
}
function justNumbers(e){
  var keynum = window.event ? window.event.keyCode : e.which;
  if ((keynum == 8) || (keynum == 46))
  return true;
  return /\d/.test(String.fromCharCode(keynum));
}

function DocLenghtCliente(tipo){
    if (tipo == "DI001") {
      $('#nvoClienteRegCli').val('');
      document.getElementById("nvoClienteRegCli").setAttribute('maxlength',8);
      document.getElementById("nvoClienteRegCli").setAttribute('onkeypress',"return justNumbers(event);");
    }else if(tipo == "DI002"){
      $('#nvoClienteRegCli').val('');
      document.getElementById("nvoClienteRegCli").setAttribute('maxlength',12);
      $("#nvoClienteRegCli").removeAttr("onkeypress");
    }else if(tipo == "DI003"){
      $('#nvoClienteRegCli').val('');
      document.getElementById("nvoClienteRegCli").setAttribute('maxlength',12);
      $("#nvoClienteRegCli").removeAttr("onkeypress");
    }else if(tipo == "DI004"){
      $('#nvoClienteRegCli').val('');
      document.getElementById("nvoClienteRegCli").setAttribute('maxlength',11)
      document.getElementById("nvoClienteRegCli").setAttribute('onkeypress',"return justNumbers(event);");
    }else if(tipo == "DI005"){
      $('#nvoClienteRegCli').val('');
      $("#nvoClienteRegCli").removeAttr("maxlength");
      $("#nvoClienteRegCli").removeAttr("onkeypress");
    }
}

function justNumbers(e){
  var keynum = window.event ? window.event.keyCode : e.which;
  if ((keynum == 8) || (keynum == 46))
  return true;
  return /\d/.test(String.fromCharCode(keynum));
}