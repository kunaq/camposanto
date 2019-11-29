$("#fchIniLisPro").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true
});//datepicker

$("#fchFinLisPro").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true
});//datepicker

$("#numDocLisPro").number(true);
$("#tablListPros").DataTable({
  "searching": false,
  "info": false,
  "lengthChange": false
  });

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

function mostrarSidebar(numContrato,codServicio){
    hideSidebar();
    $("#m_quick_sidebar-contrato").addClass("m-quick-sidebar-contrato--on");
    // $.ajax({
    //     type:'POST',
    //     url: 'extensiones/captcha/creaDatosSideBarContrato.php',
    //     dataType: 'text',
    //     data: {'numContrato':numContrato, 'codServicio':codServicio},
    //     success : function(response){
    //         var info = JSON.parse(response);
    //         console.log(info.num_contrato);
    //         document.getElementById('numCttSideBar').innerText = info.num_contrato;
    //         document.getElementById('codSerSideBar').innerText = info.cod_servicio;
    //         document.getElementById('fchEmiSideBar').innerText = info.fch_emision;
    //         document.getElementById('fchActSideBar').innerText = info.fch_activacion;
    //         document.getElementById('fchResSideBar').innerText = info.fch_resolucion;
    //         document.getElementById('fchAnuSideBar').innerText = info.fch_anulacion;
    //         $("#buttons-box").html(info.buttons);
    //         document.getElementById('clienteSideBar').innerText = info.dsc_cliente;
    //         document.getElementById('tipoNecSideBar').innerText = info.tipo_necesidad;
    //         document.getElementById('vendedorSideBar').innerText = info.dsc_vendedor;
    //         document.getElementById('tipoServSideBar').innerText = info.tipo_servicio;
    //         document.getElementById('numCuotasSideBar').innerText = info.num_cuotas;
    //         document.getElementById('totalSideBar').innerText = info.total;
    //      }
    // });
}

function hideSidebar(){
    $("#m_quick_sidebar-contrato").removeClass("m-quick-sidebar-contrato--on");
}