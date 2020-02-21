
$("#codCliCon").change(function() {
    var valor = $(this).val();
    if (valor == "") {
        document.getElementById("nombreCliCon").value = "";
    }else{
        $.ajax({
            type: 'GET',
            url: 'extensiones/captcha/buscaCliente.php',
            dataType: 'text',
            data: { 'value' : valor },
            success : function(respuesta){
                //console.log(respuesta);
                var nombre = respuesta.split("/")[0];
                $('#nombreCliCon').val(nombre);
            }
        });
    }
});

var mQuickSidebarContrato = function() {
    var n = $("#m_quick_sidebar-contrato")
      , o = $("#m_quick_sidebar-contrato_tabs")
      , t = n.find(".m-quick-sidebar-contrato__content");
    return {
        init: function() {
                new mOffcanvas("m_quick_sidebar-contrato",{
                overlay: !0,
                baseClass: "m-quick-sidebar-contrato",
                closeBy: "m_quick_sidebar-contrato_close"
            }).one("afterShow", function() {
                mApp.block(n),
                setTimeout(function() {
                    mApp.unblock(n),
                    t.removeClass("m--hide")
                }, 1e3)
            })
        }
    }
}();


function cambiaCliCon($cod){
    document.getElementById("codCliCon").value = $cod;
    $('#codCliCon').change();
}

function creaTablaCliente(tipo){
    //if ($('#myTableCliente').length) {
    //    $('#myTableCliente').DataTable();
    // }
    // else{
        $('#tablaCliente').html('<div class="loader"></div>');
        $.ajax({
            url: 'extensiones/captcha/creaTablaCliente.php',
            dataType: 'text',
            data: { 'tipo' : tipo },
            success : function(respuesta){
                $('#tablaCliente').html('')
                $("#tablaCliente").html(respuesta);
                $('#myTableCliente').DataTable();
            }
        });
    // }
}

function creaTablaContrato(){
    var tipoFecha = document.getElementById("tipoFecha").value;
    var fechaInicio = ($('#m_datepicker_1').datepicker("getDate")).toLocaleDateString();
    var fechaFin = ($('#m_datepicker_2').datepicker("getDate")).toLocaleDateString();
    var codCliente = document.getElementById("codCliCon").value;
    var localidad = document.getElementById("localidad").value;
    var saldo = document.getElementById("saldo").value;
    var numContrato = document.getElementById("numContrato").value;
    var tipoNec = document.getElementById("tipoNec").value;
    var tipoServ = document.getElementById("tipoServ").value;

        $('#tablaContrato').html('<div class="loader"></div>');
        $.ajax({
            type:'POST',
            url: 'extensiones/captcha/creaTablaContrato.php',
            dataType: 'text',
            data: {'tipoFecha':tipoFecha, 'fechaInicio':fechaInicio, 'fechaFin':fechaFin, 'codCliente':codCliente, 'localidad':localidad, 'saldo':saldo, 'numContrato':numContrato, 'tipoNec':tipoNec, 'tipoServ':tipoServ},
            success : function(respuesta){
                $('#tablaContrato').html('')
                $("#tablaContrato").html(respuesta);
                mQuickSidebarContrato.init();
                $('#mytableContrato').DataTable({
                    "searching": false,
                    "info": false
                });
            }
        });
}



function mostrarSidebar(numContrato,codServicio){
    hideSidebar();
    $("#m_quick_sidebar-contrato").addClass("m-quick-sidebar-contrato--on");
    $.ajax({
        type:'POST',
        url: 'extensiones/captcha/creaDatosSideBarContrato.php',
        dataType: 'text',
        data: {'numContrato':numContrato, 'codServicio':codServicio},
        success : function(response){
            var info = JSON.parse(response);
            console.log(info.num_contrato);
            document.getElementById('numCttSideBar').innerText = info.num_contrato;
            document.getElementById('codSerSideBar').innerText = info.cod_servicio;
            document.getElementById('fchEmiSideBar').innerText = info.fch_emision;
            document.getElementById('fchActSideBar').innerText = info.fch_activacion;
            document.getElementById('fchResSideBar').innerText = info.fch_resolucion;
            document.getElementById('fchAnuSideBar').innerText = info.fch_anulacion;
            $("#buttons-box").html(info.buttons);
            $("#action-buttons").html(info.actions);
            document.getElementById('clienteSideBar').innerText = info.dsc_cliente;
            document.getElementById('tipoNecSideBar').innerText = info.tipo_necesidad;
            document.getElementById('vendedorSideBar').innerText = info.dsc_vendedor;
            document.getElementById('tipoServSideBar').innerText = info.tipo_servicio;
            document.getElementById('numCuotasSideBar').innerText = info.num_cuotas;
            document.getElementById('totalSideBar').innerText = info.total;
         }
    });
}

function hideSidebar(){
    $("#m_quick_sidebar-contrato").removeClass("m-quick-sidebar-contrato--on");
}

window.addEventListener("keyup",function(e){
    if(e.keyCode==27) {
      hideSidebar();
    }
});

function limpiarCliente(){
    document.getElementById("codCliCon").value = "";
    document.getElementById("nombreCliCon").value = "";
    $('#codCliCon').change();
}

function validarContrato(localidad,contrato,servicio){
    $.ajax({
        type:'POST',
        url: 'ajax/listadoCtt.ajax.php',
        dataType: 'text',
        data: {'accion': 'validaContrato', 'cod_localidad':localidad, 'cod_contrato':contrato, 'num_servicio':servicio},
        success : function(response){
            var info = JSON.parse(response);
            if (info.error == 1) {
                swal({
                  title: "",
                  text: "Debe seleccionar un vendedor, verifique la ruta modificación de contrato.",
                  type: "error",
                  confirmButtonText: "Aceptar",
                });
            }else if (info.error == 2) {
                swal({
                  title: "",
                  text: "Debe seleccionar una agencia funeraria, verifique la ruta modificación de contrato.",
                  type: "error",
                  confirmButtonText: "Aceptar",
                });
            }else if (info.error == 3) {
                swal({
                  title: "",
                  text: "El contrato esta resuelto.",
                  type: "error",
                  confirmButtonText: "Aceptar",
                });
            }else if (info.error == 4) {
                swal({
                  title: "",
                  text: "El contrato esta anulado.",
                  type: "error",
                  confirmButtonText: "Aceptar",
                });
            }else if (info.error == 5) {
                swal({
                  title: "",
                  text: "El periodo seleccionado ["+info.num_anno+" - "+info.cod_tipo_periodo+" - "+info.cod_periodo+"] esta cerrado.",
                  type: "error",
                  confirmButtonText: "Aceptar",
                });
            }else if (info.error == 6) {
                swal({
                  title: "",
                  text: "El vendedor ["+info.cod_vendedor+"] no esta activo para el período seleccionado ["+info.num_anno+" - "+info.cod_tipo_periodo+" - "+info.cod_periodo+"].",
                  type: "error",
                  confirmButtonText: "Aceptar",
                });
            }else if (info.error == 7) {
                swal({
                  title: "",
                  text: "No puede activar el contrato, la cuota inicial debe estar completamente cancelada.",
                  type: "error",
                  confirmButtonText: "Aceptar",
                });
            }else if (info.error == 0) {
                swal({
                  title:"",
                  text:'¿Esta seguro de activar el contrato?',
                  type:"question",
                  showCancelButton:!0,
                  confirmButtonText:"Aceptar"
                }).then(function(e){
                  e.value&&activarContrato(info.cod_localidad,info.cod_contrato,info.num_servicio,info.cod_tipo_ctt,info.cod_tipo_programa,info.num_anno,info.cod_tipo_periodo,info.cod_periodo)
                })
            }
         }//success
    });//ajax
}

function activarContrato(localidad,contrato,servicio,tipoCtt,tipoPrograma,numAnno,tipoPeriodo,periodo){

    $.ajax({
        type:'POST',
        url: 'ajax/listadoCtt.ajax.php',
        dataType: 'text',
        data: {'accion': 'activaContrato', 'cod_localidad':localidad, 'cod_contrato' : contrato, 'cod_tipo_programa':tipoPrograma, 'cod_tipo_ctt':tipoCtt, 'num_servicio':servicio, 'num_anno':numAnno, 'cod_tipo_periodo':tipoPeriodo, 'cod_periodo':periodo},
        success : function(response){
            if (response == 1) {
                swal({
                  title:"",
                  text:'Se activo el contrato satisfactoriamente',
                  type:"success",
                  confirmButtonText:"Aceptar"
                })
            }else{
                swal({
                  title:"",
                  text:'Ocurrio un error al activar el contrato',
                  type:"error",
                  confirmButtonText:"Aceptar"
                })
            }
        }//successServicioFoma
    });//ajaxServicioFoma
}

creaTablaContrato();

