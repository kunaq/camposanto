$("#numDocRegPro").number(true);
$("#tabRegConRegPro").DataTable({
  "searching": false,
  "info": false,
  "paging":   false,
  "ordering": false,
 });

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

function obtenerDatosProspecto(){

  var codPro = document.getElementById("codProspecto").value;
  console.log(codPro);
  $.ajax({
        type:'POST',
        url: 'extensiones/captcha/ObtieneDatosProspecto.php',
        dataType: 'text',
        data: {'codPro':codPro},
        success : function(response){
            var info = JSON.parse(response);
            console.log("success");
            console.log(info);
            document.getElementById('tipoDocRegPro').value = info.tipoDoc;
            document.getElementById('numDocRegPro').value = info.numDoc;
            document.getElementById('apePaterno').value = info.apePaterno;
            document.getElementById('apeMaterno').value = info.apeMaterno;
            document.getElementById('nombre').value = info.nombre;
            document.getElementById('direccion').value = info.direccion;
            document.getElementById('pais').value = info.pais;
            document.getElementById('departamento').value = info.departamento;
            document.getElementById('provincia').value = info.provincia;
            document.getElementById('distrito').value = info.distrito;
            document.getElementById('telefono1').value = info.telefono1;
            document.getElementById('telefono2').value = info.telefono2;
            document.getElementById('fechaReg').value = info.fechReg;
            document.getElementById('usuario').value = info.usuario;
            if (info.juridico == "SI") {
              $('#juridico').prop("checked", true);
            }
         }
    });
}

obtenerDatosProspecto();