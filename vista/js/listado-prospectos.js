$("#fchIniLisPro").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true
});//datepicker

$("#fchFinLisPro").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true
});//datepicker

$("#numDocLisPro").number(true);


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

function mostrarSidebar(codPro, dscPro, tDoc, nDoc, tel, cven, cal, cons, etd, ultCon, imp, fchReg, dias, obsr){
    hideSidebar();
    $("#m_quick_sidebar-contrato").addClass("m-quick-sidebar-contrato--on");
    console.log(codPro);
    console.log("dscPro");
    console.log(cal);

    document.getElementById('codProspecto').innerText = codPro;
    document.getElementById('dscProspecto').innerText = dscPro;
    document.getElementById('tipoDoc').innerText = tDoc;
    document.getElementById('numDoc').innerText = nDoc;
    document.getElementById('telefono').innerText = tel;
    document.getElementById('canalVenta').innerText = cven;
    document.getElementById('calificacion').innerText = cal;
    document.getElementById('consejero').innerText = cons;
    document.getElementById('estado').innerText = etd;
    document.getElementById('ultimoContacto').innerText = ultCon;
    document.getElementById('importe').innerText = imp;
    document.getElementById('fchRegistro').innerText = fchReg;
    document.getElementById('dias').innerText = dias;
    document.getElementById('observacion').value = obsr;
}

function hideSidebar(){
    $("#m_quick_sidebar-contrato").removeClass("m-quick-sidebar-contrato--on");
}

function creaTablaProspectos(){
    var fechaInicio = ($('#fchIniLisPro').datepicker("getDate")).toLocaleDateString();
    var fechaFin = ($('#fchFinLisPro').datepicker("getDate")).toLocaleDateString();
    var estado = document.getElementById("estadoPct").value;
    var calificacion = document.getElementById("califPct").value;
    var tipoDoc = document.getElementById("tipoDocPct").value;
    var numDoc = document.getElementById("numDocPct").value;
    var supervisor = document.getElementById("supervPct").value;
    var consejero = document.getElementById("consejPct").value;

        $('#tablaContrato').html('<div class="loader"></div>');
        $.ajax({
            type:'POST',
            url: 'extensiones/funciones/creaTablaProspectos.php',
            dataType: 'text',
            data: {'fechaInicio':fechaInicio, 'fechaFin':fechaFin, 'estado':estado, 'calificacion':calificacion, 'tipoDoc':tipoDoc, 'numDoc':numDoc, 'supervisor':supervisor, 'consejero':consejero},
            success : function(respuesta){
                $("#divTablaProspectos").html(respuesta);
                $('#tablaProspectos').DataTable({
                    "searching": false,
                    "info": false
                });
            }
        });
}

creaTablaProspectos();

window.addEventListener("keyup",function(e){

    if(e.keyCode==27) {
      hideSidebar();
    }

});
