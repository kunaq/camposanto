$("#codCliCon").change(function() {
    var valor = $(this).val();
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
});

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
                // $('#mytableContrato').DataTable();
                $('#mytableContrato').DataTable( {
                    fixedColumns: {
                     rightColumns: 1
                    }
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
            // console.log(info.tipo_periodo);
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

function init(){
    creaTablaContrato();
}

init();