$("#m_datepicker_4_3").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true
});//datepicker
$("#m_datepicker_4_3").datepicker("setDate", new Date());
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
                 }//success
            });//ajax interno   
         }//success
    });//ajax
}//setPeriod

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
         }//success
    });//ajax
}//buscaPeriodo

function buscaServicios(){
    $.ajax({
        type:'GET',
        url: 'extensiones/captcha/buscaPeriodo.php',
        dataType: 'text',
        data: {'annoPeriodo':annoPeriodo, 'tipoPeriodo':tipoPeriodo},
        success : function(response){
            $("#perResolucion").html(response);
         }//success
    });//ajax
}//buscaServicios

function buscaMotivo(tipo){
    $.ajax({
        type:'POST',
        url: 'ajax/resCtto.ajax.php',
        dataType: 'json',
        data: {'accion': 'motivo', 'codTipo':tipo},
        success : function(response){
            var option = '';
            $("#motivoResolucion").empty();
            $.each(response,function(index,value){
                option = '<option value="'+value['cod_motivo_resolucion']+'">'+value['dsc_motivo_resolucion']+'</option>';
                document.getElementById("motivoResolucion").insertAdjacentHTML("beforeEnd" ,option);
            });//each
         }//success
    });//ajax
}//buscaMotivo

function buscaNumServicio(){
    var ctto = $("#numConResolucion").val();
    $.ajax({
        type:'POST',
        url: 'ajax/resCtto.ajax.php',
        dataType: 'json',
        data: {'accion': 'numServicio', 'codCtto':ctto},
        success : function(response){
            // console.log(response);
            $("#numConResolucion").val(response[0]['cod_contrato']);
            if(response[0]['cod_tipo_programa'] = 'TR000'){
                $("#progContrato").val('CONTRATO DE SERVICIO');
            }
            else{
                $("#progContrato").val('SERVICIO PRE-INSCRITO');
            }
            $("#numSerResolucion").empty();
            var option = '';
            $.each(response,function(index,value){
                option = '<option value="'+value['num_servicio']+'/'+value['flg_resuelto']+'/'+value['flg_anulado']+'">'+value['num_servicio']+'</option>';
                document.getElementById("numSerResolucion").insertAdjacentHTML("beforeEnd" ,option);
            });//each
        }//success
    });//ajax
}//buscaNumServicio

$("#numSerResolucion").change(function(){
    var valor = $("#numSerResolucion").val();
    var numServicio = valor.split("/")[0];
    var resuelto = valor.split("/")[1];
    var anulado = valor.split("/")[2];
        // console.log(resuelto,anulado);
    if(resuelto == 'SI'){
        limpia();
        buscaDetalles(valor,'condicionResuelto');
        bloquea();
        swal({
            title: "",
            text: "El contrato ingresado está RESUELTO.",
            type: "warning",
            confirmButtonText: "Aceptar",
        });
    }

    if(anulado == 'SI'){
         bloquea();
         limpia()
         swal({
            title: "",
            text: "El contrato ingresado está ANULADO.",
            type: "warning",
            confirmButtonText: "Aceptar",
        });
    }

    if(resuelto == 'NO' && anulado == 'NO'){
        desbloquea();
        limpia();
        buscaDetalles(valor,'condicionRegular');
    }
});//change numServicio

function buscaDetalles(value,accion){
    console.log(value);
    var numServicio = value.split("/")[0];
    var ctto = $("#numConResolucion").val();
    $.ajax({
        type:'POST',
        url: 'ajax/resCtto.ajax.php',
        dataType: 'json',
        data: {'accion': accion, 'codCtto':ctto, 'numServicio' : value},
        success : function(response){
            console.log(response);
        }//success
    });//ajax
}

function bloquea(){
    $("#m_datepicker_4_3").prop('disabled',true);
    $("#tipoResolucion").prop('disabled',true);
    $("#motivoResolucion").prop('disabled',true);
    $("#detalleResolucion").prop('disabled',true);
    $("#annoPerResolucion").prop('disabled',true);
    $("#tipoPerResolucion").prop('disabled',true);
    $("#perResolucion").prop('disabled',true);

}//bloquea

function desbloquea(){
    $("#m_datepicker_4_3").prop('disabled',true);
    $("#tipoResolucion").prop('disabled',true);
    $("#motivoResolucion").prop('disabled',true);
    $("#detalleResolucion").prop('disabled',true);
    $("#annoPerResolucion").prop('disabled',true);
    $("#tipoPerResolucion").prop('disabled',true);
    $("#perResolucion").prop('disabled',true);
}//desbloquea

function limpia(){
    $("#m_datepicker_4_3").val();
    $("#tipoResolucion").val();
    $("#motivoResolucion").val();
    $("#detalleResolucion").val();
    $("#tipoNecResolucion").val();
    $("#codCliResolucion").val();
    $("#nombreCliResolucion").val();
    $("#tipoDocResolucion").val();
    $("#numDocResolucion").val();
    $("#telCliResolucion").val();
    $("#dirCliResolucion").val();
    $("#codJVenResolucion").val();
    $("#dscJVenResolucion1s").val();
    $("#codVenResolucion").val();
    $("#dscVenResolucion").val();
    $("#codGruResolucion").val();
    $("#dscGruResolucion").val();
    $("#codSupResolucion").val();
    $("#dscSupResolucion").val();
    $("#cuoTotReg").val();
    $("#cuoCanReg").val();
    $("#cuoPenReg").val();
    $("#cuoTotFOMA").val();
    $("#cuoCanFOMA").val();
    $("#cuoPenFOMA").val();
    $("#estadoConResolucion").val();
    $("#monedaConResolucion").val();
    $("#annoPerResolucion").val();
    $("#tipoPerResolucion").val();
    $("#perResolucion").val();
    $("#saldoInsResolucion").val();
    $("#porcResolucion").val();
    $("#check-comision").prop('checked',false);
    $("#codVenComResolucion").val();
    $("#dscVenComResolucion").val();
    $("#codSupComResolucion").val();
    $("#dscSupComResolucion").val();
    $("#codGruComResolucion").val();
    $("#dscGruComResolucion").val();
    $("#codJVenComResolucion").val();
    $("#dscJVenCoResolucion").val();
}//desbloquea
