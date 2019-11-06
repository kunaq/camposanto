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

function setPeriod(){
    var fechaRes = ($('#m_datepicker_4_3').datepicker("getDate")).toLocaleDateString();
    console.log(fechaRes);
    $.ajax({
        type:'GET',
        url: 'extensiones/captcha/getPeriod.php',
        dataType: 'text',
        data: {'fechaRes':fechaRes},
        success : function(response){
            var info = JSON.parse(response);
            $('#annoPerResolucion').val(info.num_anno);
            $('#tipoPerResolucion').val(info.tipo_periodo);
            $.ajax({
                type:'GET',
                url: 'extensiones/captcha/buscaPeriodo.php',
                dataType: 'text',
                data: {'annoPeriodo':info.num_anno, 'tipoPeriodo':info.tipo_periodo},
                success : function(response){
                    $("#perResolucion").html(response);
                    $('#perResolucion').val(info.periodo);
                 }
            });
            
         }
    });
}

function buscaPeriodo(){
    var annoPeriodo = document.getElementById("annoPerResolucion").value;
    var tipoPeriodo = document.getElementById("tipoPerResolucion").value;
    $.ajax({
        type:'GET',
        url: 'extensiones/captcha/buscaPeriodo.php',
        dataType: 'text',
        data: {'annoPeriodo':annoPeriodo, 'tipoPeriodo':tipoPeriodo},
        success : function(response){
            $("#perResolucion").html(response);
         }
    });
}

function mostrarSidebar(numContrato,codServicio){
    hideSidebar();
    $("#m_quick_sidebar-contrato").addClass("m-quick-sidebar-contrato--on");
    console.log(numContrato);
    console.log(codServicio);
    $.ajax({
        type:'GET',
        url: 'extensiones/captcha/creaDatosSideBarContrato.php',
        dataType: 'text',
        data: {'numContrato':numContrato, 'codServicio':codServicio},
        success : function(response){
            var info = JSON.parse(response);
 
            document.getElementById('numCttSideBar').innerHTML = info.num_contrato;
            document.getElementById('codSerSideBar').innerHTML = info.cod_servicio;
            document.getElementById('fchEmiSideBar').innerHTML = info.fch_emision;
            document.getElementById('fchActSideBar').innerHTML = info.fch_activacion;
            document.getElementById('fchResSideBar').innerHTML = info.fch_resolucion;
            document.getElementById('fchAnuSideBar').innerHTML = info.fch_anulacion;
            $("#buttons-box").html(info.buttons);
            document.getElementById('clienteSideBar').innerHTML = info.dsc_cliente;
            document.getElementById('tipoNecSideBar').innerHTML = info.tipo_necesidad;
            document.getElementById('vendedorSideBar').innerHTML = info.dsc_vendedor;
            document.getElementById('tipoServSideBar').innerHTML = info.tipo_servicio;
            document.getElementById('numCuotasSideBar').innerHTML = info.num_cuotas;
            document.getElementById('totalSideBar').innerHTML = info.total;
         }
    });
}

function hideSidebar(){
    $("#m_quick_sidebar-contrato").removeClass("m-quick-sidebar-contrato--on");
}

function limpiarCliente(){
    document.getElementById("codCliCon").value = "";
    document.getElementById("nombreCliCon").value = "";
    $('#codCliCon').change();
}

creaTablaContrato();

