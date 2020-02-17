$("#m_datepicker_4_3").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true
});//datepicker
$("#m_datepicker_4_3").datepicker("setDate", new Date());
function setPeriod(){
    var fechaRes = ($('#m_datepicker_4_3').datepicker("getDate")).toLocaleDateString('en-US');
    var cod_ctt = document.getElementById('numConResolucion').value;
    var cod_consejero = document.getElementById('codVenResolucion').value;
    if (cod_ctt != '' && cod_consejero != '') {
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
                    var cod_consejero = document.getElementById('codVenResolucion').value;
                    var consejero = document.getElementById('dscVenResolucion').value;
                    var num_anno = document.getElementById('annoPerResolucion').value;
                    var cod_tipo_periodo = document.getElementById('tipoPerResolucion').value;
                    var cod_periodo = document.getElementById('perResolucion').value;
                    $.ajax({
                        type:'POST',
                        url: 'ajax/resCtto.ajax.php',
                        dataType: 'json',
                        data: {'accion':'getHisTrabajador', 'cod_consejero':cod_consejero, 'num_anno':num_anno, 'cod_tipo_periodo':cod_tipo_periodo, 'cod_periodo':cod_periodo},
                        success : function(response){
                            if (response.length == 0) {
                                swal({
                                    title: "",
                                    text: 'El consejero ['+consejero+'] no esta activo para el período seleccionado ['+num_anno+'-'+cod_tipo_periodo+'-'+cod_periodo+'].',
                                    type: "warning",
                                    confirmButtonText: "Aceptar",
                                });
                            }else{
                                $.each(response,function(index,value){
                                    document.getElementById('codVenComResolucion').value = value['cod_trabajador'];
                                    if (value['cod_trabajador'] != '') {
                                        nombreTrabajador(value['cod_trabajador'],'dscVenComResolucion');
                                    }
                                    document.getElementById('codSupComResolucion').value = value['cod_supervisor'];
                                    if (value['cod_supervisor'] != '') {
                                        nombreTrabajador(value['cod_supervisor'],'dscSupComResolucion');
                                    }
                                    document.getElementById('codGruComResolucion').value = value['cod_grupo'];
                                    if (value['cod_grupo'] != '') {
                                        nombreGrupoVenta(value['cod_grupo'],'dscGruComResolucion');
                                    }
                                    document.getElementById('codJVenComResolucion').value = value['cod_jefeventas'];
                                    if (value['cod_jefeventas'] != '') {
                                        nombreTrabajador(value['cod_jefeventas'],'dscJVenCoResolucion');
                                    }
                                });//each 
                            }
                        }//success
                    });//ajax interno
                 }//success
            });//ajax interno
         }//success
    });//ajax
    }
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

function pasaAnumero(string){
    if(string == parseFloat(string)){
        valor = parseFloat(string);
    }
    else if(string.indexOf('.') != -1){
        var mil = string.split('.')[0];
        var cien = string.split('.')[1];
        var decenas = cien.split(',')[0];
        var decimal = cien.split(',')[1];
        valor = (parseInt(mil)*1000)+(parseInt(decenas))+(parseFloat(decimal)*0.01);
    }
    else if(string.indexOf('.') != -1){
        var decenas = string.split(',')[0];
        var decimal = string.split(',')[1];
        valor = (parseInt(decenas))+(parseFloat(decimal)*0.01);
    }
    else{
        valor = parseFloat(string);
    }
    return valor;
 }

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

    var cod_consejero = document.getElementById('codVenResolucion').value;
    var num_anno = document.getElementById('annoPerResolucion').value;
    var cod_tipo_periodo = document.getElementById('tipoPerResolucion').value;
    var cod_periodo = document.getElementById('perResolucion').value;
    var consejero = document.getElementById('dscVenResolucion').value;
    $.ajax({
        type:'POST',
        url: 'ajax/resCtto.ajax.php',
        dataType: 'json',
        data: {'accion':'getHisTrabajador', 'cod_consejero':cod_consejero, 'num_anno':num_anno, 'cod_tipo_periodo':cod_tipo_periodo, 'cod_periodo':cod_periodo},
        success : function(respuesta){
            if (respuesta.length == 0) {
                swal({
                    title: "",
                    text: 'El consejero ['+consejero+'] no esta activo para el período seleccionado ['+num_anno+'-'+cod_tipo_periodo+'-'+cod_periodo+'].',
                    type: "warning",
                    confirmButtonText: "Aceptar",
                });
            }else{
                $.each(respuesta,function(index,value){
                    document.getElementById('codVenComResolucion').value = value['cod_trabajador'];
                    if (value['cod_trabajador'] != '') {
                        nombreTrabajador(value['cod_trabajador'],'dscVenComResolucion');
                    }
                    document.getElementById('codSupComResolucion').value = value['cod_supervisor'];
                    if (value['cod_supervisor'] != '') {
                        nombreTrabajador(value['cod_supervisor'],'dscSupComResolucion');
                    }
                    document.getElementById('codGruComResolucion').value = value['cod_grupo'];
                    if (value['cod_grupo'] != '') {
                        nombreGrupoVenta(value['cod_grupo'],'dscGruComResolucion');
                    }
                    document.getElementById('codJVenComResolucion').value = value['cod_jefeventas'];
                    if (value['cod_jefeventas'] != '') {
                        nombreTrabajador(value['cod_jefeventas'],'dscJVenCoResolucion');
                    }
                });//each 
            }
        }//success
    });//ajax interno

    var cuoi_total = pasaAnumero(document.getElementById('totalCuoi').innerText);
    var financiado_total = pasaAnumero(document.getElementById('totalfin').innerText);
    var cuoi_cancelado = pasaAnumero(document.getElementById('canCuoi').innerText);
    var financiado_cancelado = pasaAnumero(document.getElementById('canFin').innerText);
    var cuoi_saldo = pasaAnumero(document.getElementById('salCuoi').innerText);
    var financiado_saldo = pasaAnumero(document.getElementById('salFin').innerText);

    var saldo_insoluto = (cuoi_saldo + financiado_saldo);
    var total = (cuoi_total + financiado_total);
    var cancelado = (cuoi_cancelado + financiado_cancelado);
    var porcentaje = ((cuoi_cancelado + financiado_cancelado)/(cuoi_total + financiado_total))*100;

    $("#saldoInsResolucion").val(Number(saldo_insoluto).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 }));
    $("#porcResolucion").val(Number(porcentaje).toLocaleString('en-US',{ style: 'decimal', maximumFractionDigits : 2, minimumFractionDigits : 2 }));
    $("#check-comision").prop('checked',true);

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
            document.getElementById('codTipoProgResolucion').value = response[0]['cod_tipo_programa'];
            if(response[0]['cod_tipo_programa'] = 'TR000'){
                $("#progContrato").val('CONTRATO DE SERVICIO');
            }
            else{
                $("#progContrato").val('SERVICIO PRE-INSCRITO');
            }
            $("#numSerResolucion").empty();
            var option = '';
            $.each(response,function(index,value){
                option = '<option value="'+value['num_servicio']+'/'+value['flg_resuelto']+'/'+value['flg_anulado']+'/'+value['num_refinanciamiento']+'">'+value['num_servicio']+'</option>';
                document.getElementById("numSerResolucion").insertAdjacentHTML("beforeEnd" ,option);
            });//each
            $("#numSerResolucion").change();
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
        limpia();
        desbloquea();
        buscaDetalles(valor,'condicionRegular');
    }
});//change numServicio

function buscaDetalles(value,accion){
    // console.log(value);
    var numServicio = value.split("/")[0];
    var localidad = $("#localidadResolucion").val();
    var ctto = $("#numConResolucion").val();
    var num_refinanciamiento = value.split("/")[3];
    $.ajax({
        type:'POST',
        url: 'ajax/resCtto.ajax.php',
        dataType: 'json',
        data: {'accion': accion, 'codCtto':ctto, 'numServicio' : numServicio},
        success : function(response){
            if(response['cod_tipo_programa'] = 'TR000'){
                $("#dscProgResolucion").val('CONTRATO DE SERVICIO');
            }
            else{
                $("#dscProgResolucion").val('SERVICIO PRE-INSCRITO');
            }
            $("#tipoProgResolucion").val(response['cod_tipo_ctt']);
            if(value.split("/")[1] == 'NO'){
                $("#m_datepicker_4_3").datepicker("setDate", new Date());
            }else{
                $("#m_datepicker_4_3").val(response['fch_resolucion']);
            }
            $("#tipoResolucion").val(response['cod_tipo_resolucion']);
            // $("#tipoResolucion").change();
            $("#motivoResolucion").val(response['cod_motivo_resolucion']);
            $("#detalleResolucion").val(response['dsc_motivo_usuario']);
            if(response['cod_tipo_necesidad'] == 'NF'){
                $("#tipoNecResolucion").val('NECESIDAD FUTURA');
            }else if (response['cod_tipo_necesidad'] == 'NI'){
                $("#tipoNecResolucion").val('NECESIDAD INMEDIATA');
            }
            $("#numRefinanciamiento").val(response['num_refinanciamiento']);
            $("#codCliResolucion").val(response['cod_cliente']);
            $.ajax({
                url: 'ajax/resCtto.ajax.php',
                dataType: 'json',
                method: "POST",
                data: { 'accion' : 'buscaCli', 'codCliente' : response['cod_cliente'] },
                success : function(respuesta){
                    document.getElementById('tipoDocResolucion').value = respuesta['cod_tipo_documento'];
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
            if (response['cod_jefeventas'] != '') {
                nombreTrabajador(response['cod_jefeventas'],'dscJVenResolucion1s');
            }
            $("#codVenResolucion").val(response['cod_vendedor']);
            if (response['cod_vendedor'] != '') {
                nombreTrabajador(response['cod_vendedor'],'dscVenResolucion');
            }
            $("#codGruResolucion").val(response['cod_grupo']);
            if (response['cod_grupo'] != '') {
                nombreGrupoVenta(response['cod_grupo'],'dscGruResolucion');
            }
            $("#codSupResolucion").val(response['cod_supervisor']);
            if (response['cod_supervisor']) {
                nombreTrabajador(response['cod_supervisor'],'dscSupResolucion');
            }
            $("#annoPerResolucion").val(response['num_anno_afecto']);
            $("#annoPerResolucion").change();
            $("#tipoPerResolucion").val(response['cod_tipo_periodo_afecto']);
            $("#tipoPerResolucion").change();
            $("#perResolucion").val(response['cod_periodo_afecto']);
            if(response['flg_afecta_comision'] == 'SI'){
                $("#check-comision").prop('checked',true);
            }else if(response['flg_afecta_comision'] == 'NO'){
                $("#check-comision").prop('checked',false);
            }
            // Conformacion de Refinanciamiento
            $.ajax({
                type:'POST',
                url: 'ajax/resCtto.ajax.php',
                dataType: 'text',
                data: {'accion': 'getConformacion', 'cod_localidad':localidad, 'cod_contrato' : ctto, 'num_refinanciamiento':num_refinanciamiento},
                success : function(response){
                    $("#bodyResolucion").empty();
                    var info = JSON.parse(response);
                    $("#bodyResolucion").html(info.tableDetFinanciamiento);
                    document.getElementById("totalServPpalRes").innerText = info.saldoTotal;
                 }//success
            });//ajax

            $.ajax({
                type:'POST',
                url: 'ajax/resCtto.ajax.php',
                dataType: 'json',
                data: {'accion': 'buscaResumen', 'as_contrato':ctto, 'as_servicio' : numServicio, 'as_localidad':response['cod_localidad'], 'as_tipo_ctt': response['cod_tipo_ctt'], 'ai_ref':response['num_refinanciamiento'], 'as_tipo_programa':response['cod_tipo_programa']},
                success : function(response){
                    $("#estadoConResolucion").val(response['dsc_estado']);
                    $("#monedaConResolucion").val(response['cod_moneda']);
                    $("#cuoTotReg").val(response['ctd_total']);
                    $("#cuoCanReg").val(response['ctd_can']);
                    var valcuoPenReg = response['ctd_total']-response['ctd_can'];
                    $("#cuoPenReg").val(valcuoPenReg);
                    $("#cuoTotFOMA").val(response['ctd_foma']);
                    $("#cuoCanFOMA").val(response['ctd_can_foma']);
                    var valcuoPenFma = response['ctd_foma']-response['ctd_can_foma'];
                    $("#cuoPenFOMA").val(valcuoPenFma);
                    document.getElementById("subCuoiTab").innerText = response['imp_sub_cui'];
                    document.getElementById("intCuoi").innerText = response['imp_int_cui'];
                    document.getElementById("igvCuoi").innerText = response['imp_igv_cui'];
                    document.getElementById("totalCuoi").innerText = response['imp_tot_cui'];
                    document.getElementById("emiCuoi").innerText = response['imp_emi_cui'];
                    document.getElementById("canCuoi").innerText = response['imp_can_cui'];
                    document.getElementById("salCuoi").innerText = response['imp_sal_cui'];
                    document.getElementById("subFin").innerText = response['imp_sub_reg'];
                    document.getElementById("intFin").innerText = response['imp_int_reg'];
                    document.getElementById("igvFin").innerText = response['imp_igv_reg'];
                    document.getElementById("totalfin").innerText = response['imp_total_reg'];
                    document.getElementById("emiFin").innerText = response['imp_emi_reg'];
                    document.getElementById("canFin").innerText = response['imp_can_reg'];
                    document.getElementById("salFin").innerText = response['imp_sal_reg'];
                    document.getElementById("subFoma").innerText = response['imp_sub_foma'];
                    document.getElementById("intFoma").innerText = response['imp_int_foma'];
                    document.getElementById("igvFoma").innerText = response['imp_igv_foma'];
                    document.getElementById("totalFoma").innerText = response['imp_tot_foma'];
                    document.getElementById("emiFoma").innerText = response['imp_emi_foma'];
                    document.getElementById("canFoma").innerText = response['imp_can_fma'];
                    document.getElementById("salFoma").innerText = response['imp_sal_foma'];
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
    $("#m_datepicker_4_3").prop('disabled',false);
    $("#tipoResolucion").prop('disabled',false);
    $("#motivoResolucion").prop('disabled',false);
    $("#detalleResolucion").prop('disabled',false);
    $("#annoPerResolucion").prop('disabled',false);
    $("#tipoPerResolucion").prop('disabled',false);
    $("#perResolucion").prop('disabled',false);
}//desbloquea

function limpia(){
    // $("#m_datepicker_4_3").val('');
    $("#tipoResolucion").val('');
    $("#motivoResolucion").val('');
    $("#detalleResolucion").val('');
    $("#tipoNecResolucion").val('');
    $("#codCliResolucion").val('');
    $("#nombreCliResolucion").val('');
    $("#tipoDocResolucion").val('');
    $("#numDocResolucion").val('');
    $("#telCliResolucion").val('');
    $("#dirCliResolucion").val('');
    $("#codJVenResolucion").val('');
    $("#dscJVenResolucion1s").val('');
    $("#codVenResolucion").val('');
    $("#dscVenResolucion").val('');
    $("#codGruResolucion").val('');
    $("#dscGruResolucion").val('');
    $("#codSupResolucion").val('');
    $("#dscSupResolucion").val('');
    $("#cuoTotReg").val('');
    $("#cuoCanReg").val('');
    $("#cuoPenReg").val('');
    $("#cuoTotFOMA").val('');
    $("#cuoCanFOMA").val('');
    $("#cuoPenFOMA").val('');
    $("#estadoConResolucion").val('');
    $("#monedaConResolucion").val('');
    // $("#annoPerResolucion").val('');
    // $("#tipoPerResolucion").val('');
    // $("#perResolucion").val('');
    $("#saldoInsResolucion").val('');
    $("#porcResolucion").val('');
    $("#check-comision").prop('checked',false);
    $("#codVenComResolucion").val('');
    $("#dscVenComResolucion").val('');
    $("#codSupComResolucion").val('');
    $("#dscSupComResolucion").val('');
    $("#codGruComResolucion").val('');
    $("#dscGruComResolucion").val('');
    $("#codJVenComResolucion").val('');
    $("#dscJVenCoResolucion").val('');
    $("#bodyResolucion").empty();
     document.getElementById("totalServPpalRes").innerText = '0,00';
    document.getElementById("subCuoiTab").innerText = '0,00';
    document.getElementById("intCuoi").innerText =  '0,00';
    document.getElementById("igvCuoi").innerText =  '0,00';
    document.getElementById("totalCuoi").innerText =  '0,00';
    document.getElementById("emiCuoi").innerText =  '0,00';
    document.getElementById("canCuoi").innerText =  '0,00';
    document.getElementById("salCuoi").innerText =  '0,00';
    document.getElementById("subFin").innerText =  '0,00';
    document.getElementById("intFin").innerText =  '0,00';
    document.getElementById("igvFin").innerText =  '0,00';
    document.getElementById("totalfin").innerText =  '0,00';
    document.getElementById("emiFin").innerText =  '0,00';
    document.getElementById("canFin").innerText =  '0,00';
    document.getElementById("salFin").innerText =  '0,00';
    document.getElementById("subFoma").innerText =  '0,00';
    document.getElementById("intFoma").innerText =  '0,00';
    document.getElementById("igvFoma").innerText =  '0,00';
    document.getElementById("totalFoma").innerText =  '0,00';
    document.getElementById("emiFoma").innerText =  '0,00';
    document.getElementById("canFoma").innerText =  '0,00';
    document.getElementById("salFoma").innerText =  '0,00';
}//desbloquea

function preResolucion(){
    var ctt = document.getElementById('numConResolucion').value;
    var auxsrv = document.getElementById('numSerResolucion').value;
    var srv = auxsrv.split("/")[0];
    var cod_tipo_resolucion = document.getElementById('tipoResolucion').value;
    var cod_motivo_resolucion = document.getElementById('motivoResolucion').value;
    var dsc_motivo_usuario = document.getElementById('detalleResolucion').value;
    var num_anno = document.getElementById('annoPerResolucion').value;
    var cod_tipo_periodo = document.getElementById('tipoPerResolucion').value;
    var cod_periodo = document.getElementById('perResolucion').value;
    var cod_jefe_ventas = document.getElementById('codJVenComResolucion').value;
    var cod_supervisor = document.getElementById('codSupComResolucion').value;
    var cod_vendedor = document.getElementById('codVenComResolucion').value;
    var cod_grupo = document.getElementById('codGruComResolucion').value;

    if (ctt == '') {
        swal({
          title:"",
          text:'Debe ingresar el contrato.',
          type:"warning",
          confirmButtonText:"Aceptar"
        })
    }else if (cod_tipo_resolucion == '') {
        swal({
          title:"",
          text:'Debe seleccionar el tipo de resolución.',
          type:"warning",
          confirmButtonText:"Aceptar"
        })
    }else if (cod_motivo_resolucion == '') {
        swal({
          title:"",
          text:'Debe seleccionar el motivo de resolución.',
          type:"warning",
          confirmButtonText:"Aceptar"
        })
    }else if (dsc_motivo_usuario == '') {
        swal({
          title:"",
          text:'Debe ingresar el detalle del motivo.',
          type:"warning",
          confirmButtonText:"Aceptar"
        })
    }else if (num_anno == '') {
        swal({
          title:"",
          text:'Debe seleccionar el año.',
          type:"warning",
          confirmButtonText:"Aceptar"
        })
    }else if (cod_tipo_periodo == '') {
        swal({
          title:"",
          text:'Debe seleccionar el tipo de período de ventas.',
          type:"warning",
          confirmButtonText:"Aceptar"
        })
    }else if (cod_periodo == '') {
        swal({
          title:"",
          text:'Debe seleccionar el período de ventas.',
          type:"warning",
          confirmButtonText:"Aceptar"
        })
    }else if (cod_jefe_ventas == '') {
        swal({
          title:"",
          text:'Debe seleccionar el jefe de ventas.',
          type:"warning",
          confirmButtonText:"Aceptar"
        })
    }else if (cod_supervisor == '') {
        swal({
          title:"",
          text:'Debe seleccionar el supervisor.',
          type:"warning",
          confirmButtonText:"Aceptar"
        })
    }else if (cod_grupo == '') {
        swal({
          title:"",
          text:'Debe seleccionar el grupo de ventas.',
          type:"warning",
          confirmButtonText:"Aceptar"
        })
    }else if (cod_vendedor == '') {
        swal({
          title:"",
          text:'Debe seleccionar el vendedor.',
          type:"warning",
          confirmButtonText:"Aceptar"
        })
    }else{
        swal({
          title:"",
          text:'Esta resolviendo el contrato["'+ctt+' - '+srv+'"]. ¿Esta seguro de continuar?',
          type:"question",
          showCancelButton:!0,
          confirmButtonText:"Aceptar"
        }).then(function(e){
          e.value&&resolverContrato()
        })
    }
}

function resolverContrato(){
    $(".loader").fadeIn("slow");
    var localidad = document.getElementById('localidadResolucion').value;
    var ctt = document.getElementById('numConResolucion').value;
    var auxsrv = document.getElementById('numSerResolucion').value;
    var srv = auxsrv.split("/")[0];
    var codTipoPrograma = document.getElementById('codTipoProgResolucion').value;
    var tipoCtt = document.getElementById('tipoProgResolucion').value;
    var numRef = document.getElementById('numRefinanciamiento').value;
    var fch_registro = ($('#m_datepicker_4_3') .datepicker("getDate")).toLocaleDateString();
    var num_anno = document.getElementById('annoPerResolucion').value;
    var cod_tipo_periodo = document.getElementById('tipoPerResolucion').value;
    var cod_periodo = document.getElementById('perResolucion').value;
    var cod_jefe_ventas = document.getElementById('codJVenComResolucion').value;
    var cod_supervisor = document.getElementById('codSupComResolucion').value;
    var cod_vendedor = document.getElementById('codVenComResolucion').value;
    var cod_grupo = document.getElementById('codGruComResolucion').value;
    var imp_porc_afecto = pasaAnumero(document.getElementById('porcResolucion').value);
    var cuoi_saldo = pasaAnumero(document.getElementById('salCuoi').innerText);
    var financiado_saldo = pasaAnumero(document.getElementById('salFin').innerText);
    var imp_afecto = (cuoi_saldo + financiado_saldo);
    var cod_tipo_resolucion = document.getElementById('tipoResolucion').value;
    if (cod_tipo_resolucion == '00006' || cod_tipo_resolucion == '00001' || cod_tipo_resolucion == '00007') {
        var cod_tipo_movimiento = 'RES';
    }else{
        var cod_tipo_movimiento = 'MOD';
    }
    var cod_motivo_resolucion = document.getElementById('motivoResolucion').value;
    var dsc_motivo_resolucion = $("#motivoResolucion option:selected").text();
    var dsc_motivo_usuario = document.getElementById('detalleResolucion').value;
    var imp_tc = pasaAnumero(document.getElementById('tCambioResolucion').value);
    var afecta_comision = document.getElementById('check-comision').value;
    if (afecta_comision.checked != true){
        var flg_afecta_comision = 'NO';
    }else{
        var flg_afecta_comision = 'SI';
    }
    var cuoi_cancelado = pasaAnumero(document.getElementById('canCuoi').innerText);
    var financiado_cancelado = pasaAnumero(document.getElementById('canFin').innerText);
    var imp_pagado = (cuoi_cancelado + financiado_cancelado);
    var cod_area = '';

    $.ajax({
        type:'POST',
        url: 'ajax/resCtto.ajax.php',
        dataType: 'text',
        data: {'accion': 'verificaContado', 'cod_localidad':localidad, 'cod_contrato' : ctt, 'cod_tipo_programa':codTipoPrograma, 'cod_tipo_ctt':tipoCtt, 'num_servicio':srv},
        success : function(response){
            var info = JSON.parse(response);
            if (info.flg_contado == '' || info.flg_contado == null || info.flg_contado == 'NO') {
                $.ajax({
                    type:'POST',
                    url: 'ajax/resCtto.ajax.php',
                    dataType: 'text',
                    data: {'accion': 'actualizavtadeCtt', 'cod_localidad':localidad, 'cod_contrato' : ctt, 'cod_tipo_programa':codTipoPrograma, 'cod_tipo_ctt':tipoCtt, 'num_servicio':srv},
                    success : function(response){
                        if (response == 1) {
                            $.ajax({
                                type:'POST',
                                url: 'ajax/resCtto.ajax.php',
                                dataType: 'text',
                                data: {'accion': 'insertarResolucion', 'cod_localidad':localidad, 'cod_contrato' : ctt, 'cod_tipo_programa':codTipoPrograma, 'cod_tipo_ctt':tipoCtt, 'num_servicio':srv, 'fch_registro':fch_registro, 'cod_tipo_movimiento':cod_tipo_movimiento, 'num_anno' : num_anno, 'cod_tipo_periodo':cod_tipo_periodo, 'cod_periodo':cod_periodo, 'cod_jefe_ventas':cod_jefe_ventas, 'cod_supervisor':cod_supervisor, 'cod_vendedor' : cod_vendedor, 'cod_grupo':cod_grupo, 'imp_porc_afecto':imp_porc_afecto, 'imp_afecto':imp_afecto, 'cod_tipo_resolucion':cod_tipo_resolucion, 'cod_motivo_resolucion' : cod_motivo_resolucion, 'dsc_motivo_usuario':dsc_motivo_usuario, 'imp_tc':imp_tc, 'flg_afecta_comision':flg_afecta_comision, 'imp_pagado':imp_pagado},
                                success : function(respuesta){
                                    if (respuesta == 1) {
                                        $.ajax({
                                            type:'POST',
                                            url: 'ajax/resCtto.ajax.php',
                                            dataType: 'text',
                                            data: {'accion': 'verificaFoma', 'cod_localidad':localidad, 'cod_contrato' : ctt, 'cod_tipo_programa':codTipoPrograma, 'cod_tipo_ctt':tipoCtt, 'num_servicio':srv},
                                            success : function(response){
                                            }//successServicioFoma
                                        });//ajaxServicioFoma

                                        $.ajax({
                                            type:'POST',
                                            url: 'ajax/resCtto.ajax.php',
                                            dataType: 'text',
                                            data: {'accion': 'guardaObsevacion', 'cod_localidad':localidad, 'cod_contrato' : ctt, 'cod_tipo_programa':codTipoPrograma, 'cod_tipo_ctt':tipoCtt, 'num_servicio':srv, 'cod_motivo_resolucion' : cod_motivo_resolucion, 'dsc_motivo_resolucion':dsc_motivo_resolucion, 'cod_area':cod_area},
                                            success : function(respuesta){
                                                if (respuesta == 1) {
                                                    $.ajax({
                                                        type:'POST',
                                                        url: 'ajax/resCtto.ajax.php',
                                                        dataType: 'text',
                                                        data: {'accion': 'actualizaCronograma', 'cod_localidad':localidad, 'cod_contrato' : ctt, 'cod_tipo_programa':codTipoPrograma, 'cod_tipo_ctt':tipoCtt, 'num_refinanciamiento':numRef},
                                                        success : function(response){
                                                            if (response == 1) {
                                                                $(".loader").fadeOut("slow");
                                                                swal({
                                                                  title:"",
                                                                  text:'Se resolvio el contrato con exito',
                                                                  type:"success",
                                                                  confirmButtonText:"Aceptar"
                                                                })
                                                            }
                                                         }//success
                                                    });//ajax
                                                }
                                            }//successGuardaObsevacion
                                        });//ajaxGuardaObsevacion
                                    }
                                }//successInsertaResolucion
                            });//ajaxInsertaResolucion
                        }else{
                            swal({
                              title:"",
                              text:'Ocurrior un error al intertar resolver el contrato',
                              type:"error",
                              confirmButtonText:"Aceptar"
                            })
                        }
                    }//successActualizaVtadeCtt
                });//ajaxActualizaVtadeCtt
            }
        }//successVerificaContado
    });//ajaxVerificaContado
}
