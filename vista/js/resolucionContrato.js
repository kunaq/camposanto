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
         swal({
            title: "",
            text: "El contrato ingresado está ANULADO.",
            type: "warning",
            confirmButtonText: "Aceptar",
        });
    }

    if(resuelto == 'NO' && anulado == 'NO'){
        desbloquea();
    }
});//change numServicio

function buscaDetalles(value){
    console.log(value);
}

function bloquea(){
    $("#m_datepicker_4_3").prop('disabled',true);
    $("#tipoResolucion").prop('disabled',true);
    $("#motivoResolucion").prop('disabled',true);
    $("#detalleResolucion").prop('disabled',true);
    $("#tipoNecResolucion").prop('disabled',true);
    $("#codCliResolucion").prop('disabled',true);
    $("#nombreCliResolucion").prop('disabled',true);
    $("#tipoDocResolucion").prop('disabled',true);
    $("#numDocResolucion").prop('disabled',true);
    $("#telCliResolucion").prop('disabled',true);
    $("#dirCliResolucion").prop('disabled',true);
    $("#codJVenResolucion").prop('disabled',true);
    $("#dscJVenResolucion1s").prop('disabled',true);
    $("#codVenResolucion").prop('disabled',true);
    $("#dscVenResolucion").prop('disabled',true);
    $("#codGruResolucion").prop('disabled',true);
    $("#dscGruResolucion").prop('disabled',true);
    $("#codSupResolucion").prop('disabled',true);
    $("#dscSupResolucion").prop('disabled',true);
    $("#cuoTotReg").prop('disabled',true);
    $("#cuoCanReg").prop('disabled',true);
    $("#cuoPenReg").prop('disabled',true);
    $("#cuoTotFOMA").prop('disabled',true);
    $("#cuoCanFOMA").prop('disabled',true);
    $("#cuoPenFOMA").prop('disabled',true);
    $("#estadoConResolucion").prop('disabled',true);
    $("#monedaConResolucion").prop('disabled',true);
    $("#annoPerResolucion").prop('disabled',true);
    $("#tipoPerResolucion").prop('disabled',true);
    $("#perResolucion").prop('disabled',true);
    $("#saldoInsResolucion").prop('disabled',true);
    $("#porcResolucion").prop('disabled',true);
    $("#check-comision").prop('disabled',true);
    $("#codVenComResolucion").prop('disabled',true);
    $("#dscVenComResolucion").prop('disabled',true);
    $("#codSupComResolucion").prop('disabled',true);
    $("#dscSupComResolucion").prop('disabled',true);
    $("#codGruComResolucion").prop('disabled',true);
    $("#dscGruComResolucion").prop('disabled',true);
    $("#codJVenComResolucion").prop('disabled',true);
    $("#dscJVenCoResolucion").prop('disabled',true);

}//bloquea

function desbloquea(){
     $("#m_datepicker_4_3").prop('disabled',false);
    $("#tipoResolucion").prop('disabled',false);
    $("#motivoResolucion").prop('disabled',false);
    $("#detalleResolucion").prop('disabled',false);
    $("#tipoNecResolucion").prop('disabled',false);
    $("#codCliResolucion").prop('disabled',false);
    $("#nombreCliResolucion").prop('disabled',false);
    $("#tipoDocResolucion").prop('disabled',false);
    $("#numDocResolucion").prop('disabled',false);
    $("#telCliResolucion").prop('disabled',false);
    $("#dirCliResolucion").prop('disabled',false);
    $("#codJVenResolucion").prop('disabled',false);
    $("#dscJVenResolucion1s").prop('disabled',false);
    $("#codVenResolucion").prop('disabled',false);
    $("#dscVenResolucion").prop('disabled',false);
    $("#codGruResolucion").prop('disabled',false);
    $("#dscGruResolucion").prop('disabled',false);
    $("#codSupResolucion").prop('disabled',false);
    $("#dscSupResolucion").prop('disabled',false);
    $("#cuoTotReg").prop('disabled',false);
    $("#cuoCanReg").prop('disabled',false);
    $("#cuoPenReg").prop('disabled',false);
    $("#cuoTotFOMA").prop('disabled',false);
    $("#cuoCanFOMA").prop('disabled',false);
    $("#cuoPenFOMA").prop('disabled',false);
    $("#estadoConResolucion").prop('disabled',false);
    $("#monedaConResolucion").prop('disabled',false);
    $("#annoPerResolucion").prop('disabled',false);
    $("#tipoPerResolucion").prop('disabled',false);
    $("#perResolucion").prop('disabled',false);
    $("#saldoInsResolucion").prop('disabled',false);
    $("#porcResolucion").prop('disabled',false);
    $("#check-comision").prop('disabled',false);
    $("#codVenComResolucion").prop('disabled',false);
    $("#dscVenComResolucion").prop('disabled',false);
    $("#codSupComResolucion").prop('disabled',false);
    $("#dscSupComResolucion").prop('disabled',false);
    $("#codGruComResolucion").prop('disabled',false);
    $("#dscGruComResolucion").prop('disabled',false);
    $("#codJVenComResolucion").prop('disabled',false);
    $("#dscJVenCoResolucion").prop('disabled',false);
}//desbloquea
