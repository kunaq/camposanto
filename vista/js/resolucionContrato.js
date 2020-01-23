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
    // console.log(value);
    limpia();
    var numServicio = value.split("/")[0];
    var ctto = $("#numConResolucion").val();
    $.ajax({
        type:'POST',
        url: 'ajax/resCtto.ajax.php',
        dataType: 'json',
        data: {'accion': accion, 'codCtto':ctto, 'numServicio' : numServicio},
        success : function(response){
            console.log(response);
            if(response['cod_tipo_programa'] = 'TR000'){
                $("#dscProgResolucion").val('CONTRATO DE SERVICIO');
            }
            else{
                $("#dscProgResolucion").val('SERVICIO PRE-INSCRITO');
            }
            $("#tipoProgResolucion").val(response['cod_tipo_ctt']);
            $("#m_datepicker_4_3").val(response['fch_resolucion']);
            $("#tipoResolucion").val(response['cod_tipo_resolucion']);
            $("#tipoResolucion").change();
            $("#motivoResolucion").val(response['cod_motivo_resolucion']);
            $("#detalleResolucion").val(response['dsc_motivo_usuario']);
            if(response['cod_tipo_necesidad'] == 'NF'){
                $("#tipoNecResolucion").val('NECESIDAD FUTURA');
            }else if (response['cod_tipo_necesidad'] == 'NI'){
                $("#tipoNecResolucion").val('NECESIDAD INMEDIATA');
            }
            $("#codCliResolucion").val(response['cod_cliente']);
            $.ajax({
                url: 'ajax/modifCtto.ajax.php',
                dataType: 'json',
                method: "POST",
                data: { 'accion' : 'buscaCli', 'codCliente' : response['cod_cliente'] },
                success : function(respuesta){

                    document.getElementById("tipoDocResolucion").setAttribute('value',respuesta['cod_tipo_documento']);
                    $("#numDocResolucion").val(respuesta['dsc_documento']);
                    if(respuesta['flg_juridico'] == 'NO'){
                        nombre = respuesta['dsc_apellido_paterno']+' '+respuesta['dsc_apellido_materno']+', '+respuesta['dsc_nombre'];
                        $("#nombreCliResolucion").val(nombre);

                    }else{
                        $("#nombreCliResolucion").val(respuesta['dsc_razon_social']);
                    }
                    $("#telCliResolucion").val(respuesta['dsc_telefono_1']);
                    $("#dirCliResolucion").val(respuesta['dsc_direccion']);
                }//success
            });//ajax cliente
            $("#codJVenResolucion").val(response['cod_jefeventas']);
            nombreTrabajador(response['cod_jefeventas'],'dscJVenResolucion1s');
            $("#codVenResolucion").val(response['cod_vendedor']);
            nombreTrabajador(response['cod_vendedor'],'dscVenResolucion');
            $("#codGruResolucion").val(response['cod_grupo']);
            nombreGrupoVenta(response['cod_grupo'],'dscGruResolucion');
            $("#codSupResolucion").val(response['cod_supervisor']);
            nombreTrabajador(response['cod_supervisor'],'dscSupResolucion');
            $("#estadoConResolucion").val('RESUELTO');
            $("#monedaConResolucion").val(response['cod_moneda']);
            $("#annoPerResolucion").val(response['num_anno_afecto']);
            $("#annoPerResolucion").change();
            $("#tipoPerResolucion").val(response['cod_tipo_periodo_afecto']);
            $("#tipoPerResolucion").change();
            $("#perResolucion").val(response['cod_periodo_afecto']);
            $("#saldoInsResolucion").val(Number(response['imp_afecto']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 }));
            $("#porcResolucion").val(Number(response['imp_porc_afecto']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 }));
            if(response['flg_afecta_comision'] == 'SI'){
                $("#check-comision").prop('checked',true);
            }else if(response['flg_afecta_comision'] == 'NO'){
                $("#check-comision").prop('checked',false);
            }
            $("#codVenComResolucion").val(response['codVenRes']);
            nombreTrabajador(response['codVenRes'],'dscVenComResolucion');
            $("#codSupComResolucion").val(response['codSupRes']);
            nombreTrabajador(response['codSupRes'],'dscSupComResolucion');
            $("#codGruComResolucion").val(response['codGruRes']);
            nombreGrupoVenta(response['codGruRes'],'dscGruComResolucion');
            $("#codJVenComResolucion").val(response['codJventasRes']);
            nombreTrabajador(response['codJventasRes'],'dscJVenCoResolucion');
            $("#bodyResolucion").empty();
            var fila = '<tr>'+
                        '<td>'+numServicio+'</td>'+
                        '<td>'+response['dsc_tipo_servicio']+'</td>'+
                        '<td>'+Number(response['imp_saldofinanciar']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 })+'</td>'+
                    '</tr>';
                    // console.log(fila);
            document.getElementById("bodyResolucion").insertAdjacentHTML("beforeEnd" ,fila);
            document.getElementById("totalServPpalRes").innerText = Number(response['imp_saldofinanciar']).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 });
            $.ajax({
                type:'POST',
                url: 'ajax/resCtto.ajax.php',
                dataType: 'json',
                data: {'accion': 'buscaResumen', 'as_contrato':ctto, 'as_servicio' : numServicio, 'as_localidad':response['cod_localidad'], 'as_tipo_ctt': response['cod_tipo_ctt'], 'ai_ref':response['num_refinanciamiento'], 'as_tipo_programa':response['cod_tipo_programa']},
                success : function(response){
                    console.log(response);
                }//success
            });//ajax resumenCtto
        }//success
    });//ajax
}

function nombreTrabajador(valor,campo){
    $.ajax({
        type: 'GET',
        url: 'extensiones/captcha/buscaNombre.php',
        dataType: 'text',
        data: { 'value' : valor },
        success : function(respuesta){
            document.getElementById(campo).value = respuesta;
        }
    });
}//nombreTrabajador

function nombreGrupoVenta(valor,campo){
    $.ajax({
        type: 'POST',
        url: 'extensiones/captcha/buscarNombreGrupo.php',
        dataType: 'text',
        data: { 'cod' : valor },
        success : function(respuesta){
            document.getElementById(campo).value = respuesta;
        }
    });
}//nombreGrupoVenta

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
