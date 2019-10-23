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
    var fechaInicio = $('#m_datepicker_1_modal').datepicker("getDate");
    var fechaFin = $('#m_datepicker_2').datepicker("getDate");
    var codCliente = document.getElementById("codCliCon").value;
    var localidad = document.getElementById("localidad").value;
    var saldo = document.getElementById("saldo").value;
    var numCom = document.getElementById("numCom").value;
    var tipoNec = document.getElementById("tipoNec").value;
    var tipoServ = document.getElementById("tipoServ").value;

        $('#tablaContrato').html('<div class="loader"></div>');
        $.ajax({
            type:'GET',
            url: 'extensiones/captcha/creaTablaContrato.php',
            dataType: 'text',
            data: {tipoFecha:tipoFecha, fechaInicio:fechaInicio, fechaFin:fechaFin, codCliente:codCliente, localidad:localidad, saldo:saldo, numCom:numCom, tipoNec:tipoNec, tipoServ:tipoServ},
            success : function(respuesta){
                $('#tablaContrato').html('')
                $("#tablaContrato").html(respuesta);
            }
        });
        console.log(tipoFecha);
}

function init(){
    creaTablaContrato();
}

init();