$("#fchIniPerVen").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true,
  orientation: "botton right"
});//datepicker

$("#fchFinPerVen").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true,
  orientation: "botton left"
});//datepicker

$("#fchProComPerVen").datetimepicker({
  autoclose:!0,
  format:"dd-mm-yyyy hh:ii",
  orientation: "top left"
});//datepicker

$(document).ready(function() {
	$.ajax({
        type: 'GET',
        url: 'extensiones/captcha/buscaAnio.php',
        dataType: 'text',
        success : function(respuesta){
            $('#anioPerVen').html(respuesta);
        }
    });
});

$("#chkProComPerVen").on('change', function(){
	if($(this).is(':checked')){
		$("#fchProComPerVen").datetimepicker("setDate", new Date());
	}
	else{
		$("#fchProComPerVen").val('');
	}
});

function buscaPeriodo(){
	var anio = document.getElementById("anioPerVen").value;
	var periodo = document.getElementById("periodoPerVen").value;
	$("li").remove('.itemLista');
	$.ajax({
        url:"ajax/periodoVenta.ajax.php",
        method: "POST",
        dataType: 'json',
        data: {'anio':anio,'tipoPeriodo':periodo,'accion':'listaPeriodo'},
        success: function(respuesta){
            // console.log('respuesta',respuesta);
            var estado = '';
            var classPeriodo = '';
            color = '';
            $.each(respuesta,function(index,value){
                if(index == 0){
                    classPeriodo = 'liListaKqPstImpar';
                }else if(index%2 == 0){
                    classPeriodo = 'liListaKqPstImpar';
                }else{
                    classPeriodo = 'liListaKqPstPar';
                }
                if(value['flg_estado'] == 'AB'){
                	estado = 'ABIERTO';
                	color = 'black';
                }
                else if(value['flg_estado'] == 'CE'){
                	estado = 'CERRADO';
                	color = 'red';
                }
                $("#listaPeriodoVenta").append(
                    '<li class="nav-item '+classPeriodo+' itemLista">'+
                        '<a href="#" class="btnVerPeriodo" codAnio="'+value["num_anno"]+'" codPeriodo="'+value['cod_periodo']+'">'+
                        	'<div class="row" style="color:'+color+'">'+
								'<div class="col-md-4">'+value['cod_periodo']+'</div>'+
								'<div class="col-md-3">'+value['num_mes']+'</div>'+
								'<div class="col-md-5">'+estado+'</div>'+
							'</div>'+
                        '</a>'+
                    '</li>'
                );//append
            });//each
        }//success
    });//ajax
}//function buscaPeriodo

$("#listaPeriodoVenta").on("click","a.btnVerPeriodo",function(){
	$(".ulListaConfigPeriodo li").removeClass('liListaKqPstActive');
	$(this).parent('li').addClass('liListaKqPstActive');
	var codAnio = $(this).attr("codAnio");
	var codPeriodo = $(this).attr("codPeriodo");
	$.ajax({
        url:"ajax/periodoVenta.ajax.php",
        method: "POST",
        dataType: 'json',
        data: {'anio':codAnio,'tipoPeriodo':codPeriodo,'accion':'verDetPeriodo'},
        success: function(respuesta){
            console.log('respuesta',respuesta);
            $("#nombrePeriodo").val(respuesta["num_anno"]);
            $("#tipoPeriodo").val(respuesta["cod_tipo_periodo"]);
            $("#codPeriodo").val(respuesta["cod_periodo"]);
            $("#numMes").val(respuesta["num_mes"]);
            $("#dscPeriodo").val(respuesta["dsc_periodo"]);
            $('#fchIniPerVen').datepicker('setDate', respuesta["fch_inicio"]);
            $('#fchFinPerVen').datepicker('setDate', respuesta["fch_fin"]);
            $("#nombrePeriodoAnt").val(respuesta["num_anno_ant"]+' - '+respuesta["cod_tipo_periodo_ant"]+' - '+respuesta["cod_periodo_ant"]);
            $("#edoPerVen").val(respuesta["flg_estado"]).trigger("change");
            if(respuesta['flg_estado'] == 'CE'){
                $("#detCierre").removeAttr('hidden');
                if(respuesta['fch_cierre'] != null){
                    document.getElementById("fechCierre").innerHTML = respuesta['fch_cierre'];
                    document.getElementById("motivoCierre").innerHTML = 'Usuario: '+respuesta['cod_usuario'];
                }else{
                    document.getElementById("fechCierre").innerHTML = respuesta['fch_fin'];
                    document.getElementById("motivoCierre").innerHTML = 'Caducó';
                }
            }else{
                $("#detCierre").attr('hidden',true);
            }


        }//success
    });//ajax
});

function copiaAnio(){

    var li_anno = $("#anioPerVen").val();
    var li_anno_1 = parseFloat(li_anno) + 1;
    var ls_tipo = $("#periodoPerVen").val();
 
    if (li_anno == null || li_anno == '' || li_anno == 'todos'){
        swal({
            title: "Error",
            text: "Debe seleccionar el año.",
            type: "error",
            confirmButtonText: "Aceptar",
          });
        return;
    }
    
    if (ls_tipo == null || ls_tipo == '' || ls_tipo == 'todos'){
        swal({
            title: "Error",
            text: "Debe seleccionar el tipo de periodo.",
            type: "error",
            confirmButtonText: "Aceptar",
          });
        return;
    }
 
     var li_existe = 0;
 
    // -- Existe Configuracion en el período vigente -- //

    $.ajax({
        url:"ajax/periodoVenta.ajax.php",
        method: "POST",
        dataType: 'json',
        data: { 'anno' : li_anno, 'tipo_periodo' : ls_tipo, 'accion': 'exstConf'},
        success: function(respuesta){
            li_existe = respuesta[0];
            if (li_existe == null || li_existe == ''){li_existe = 0;}
            if (li_existe < 1) {
                swal({
                    title: "Error",
                    text: "El año seleccionado no tiene configurado los periodos de venta.",
                    type: "error",
                    confirmButtonText: "Aceptar",
                  });
                return;
            }
        }//success
    }); //ajax  
 
    // -- El Año tiene configuracion -- //

    $.ajax({
        url:"ajax/periodoVenta.ajax.php",
        method: "POST",
        dataType: 'json',
        data: { 'anno' : li_anno_1, 'tipo_periodo' : ls_tipo, 'accion': 'exstConf'},
        success: function(respuesta){
            li_existe = respuesta[0];
            if (li_existe == null || li_existe == ''){li_existe = 0;}
            if (li_existe > 0) {
                swal({
                    title: "Error",
                    text: "No se puede copiar los periodos, el año "+li_anno_1+" al cual se desea copiar la configuración tiene registros.",
                    type: "error",
                    confirmButtonText: "Aceptar",
                  });
                return;
            }
        }//success
    }); //ajax  

    // -- Confirmacion -- //

    swal({
        title: "",
        text: "Esta seguro que desea copiar la configuración de los periodos al año "+li_anno_1+"?",
        type: "question",
        showCancelButton:!0,
        confirmButtonText: "Aceptar",
        cancelButtonText:"Cancelar"
    }).then(function(){
        setTimeout(function () { 

            $.ajax({
                url:"ajax/periodoVenta.ajax.php",
                method: "POST",
                dataType: 'json',
                data: {'anno' : li_anno, 'tipo_periodo' : ls_tipo, 'accion':'copiaAnnio'},
                success: function(respuesta){                         
                    if(respuesta == true){
                        swal({
                            title: "",
                            text: "Se grabó el registro satisfactoriamente.",
                            type: "success",
                            confirmButtonText: "Aceptar",
                            onBeforeOpen: window.location.assign('periodo-venta')
                        })
                    }else{
                        swal({
                            title: "",
                            text: "Error en la actualización de la base de datos.",
                            type: "error",
                            confirmButtonText: "Aceptar",
                        })
                    }
                }//success
            });//ajax
        },1000);//setTimeout
    })//then
}

function fechaParaConsulta(dato){
    fecha = new Date(dato);
    var aux_dia = fecha.getDate();
    var aux_mes1 = fecha.setMonth(fecha.getMonth() + 1);
    var aux_mes = fecha.getMonth();
    var  aux_anio = fecha.getFullYear();
    if(aux_mes == '0'){
        aux_mes = '12';
        aux_anio = fecha.getFullYear()-1;
    }               
    var fechaConsulta = aux_mes+'/'+aux_dia+'/'+aux_anio;
    return fechaConsulta;
}

function grabar(){

    var ldt_inicio = $("#fchIniPerVen").val();
    ldt_inicio = fechaParaConsulta(ldt_inicio);
    var ldt_fin = $("#fchFinPerVen").val();
    ldt_fin = fechaParaConsulta(ldt_fin);
    var ls_flg_cierre_p = $("#edoPerVen").val();
    ls_flg_cierre_p = fechaParaConsulta(ls_flg_cierre_p);
    var ls_periodo =$("#codPeriodo").val();
    var num_mes = $("#numMes").val();

    if (num_mes == null || num_mes == '' ) { return;} 
    
    if (ls_flg_cierre_p == null || ls_flg_cierre_p == '' ) { ls_flg_cierre_p = 'NO';} 
     
    // -- Valida -- //
     
    if (ldt_inicio == null || ldt_inicio == '') {
        swal({
            title: "",
            text: "Debe ingresar la fecha de inicio.",
            type: "error",
            confirmButtonText: "Aceptar",
        })
        return;
    }
     
    if (ldt_fin == null || ldt_fin == '') {
        swal({
            title: "",
            text: "Debe ingresar la fecha de fin.",
            type: "error",
            confirmButtonText: "Aceptar",
        })
        return;
    }
     
    // -- Datos -- //
     
    var li_anno = $("#nombrePeriodo").val();
    var ls_tipo = $("#tipoPeriodo").val();
    var aux_ant = $("#nombrePeriodoAnt").val();
    var li_anno_ant = aux_ant.split(" - ")[0];
    var li_tipo_periodo_ant = aux_ant.split(" - ")[1];
    var li_periodo_ant = aux_ant.split(" - ")[2];
    var dsc_periodo = 'PERIODO '+ls_periodo;
     
    // -- Grabar -- //
     
    // -- Cierra Procesos de Comisiones -- //

    swal({
        title: "",
        text: "¿Está seguro de guardar los cambios?",
        type: "question",
        showCancelButton:!0,
        confirmButtonText: "Aceptar",
        cancelButtonText:"Cancelar"
    }).then(function(){
        setTimeout(function () { 
            $.ajax({
                url:"ajax/periodoVenta.ajax.php",
                method: "POST",
                dataType: 'json',
                data: {'anno' : li_anno, 'tipo_periodo' : ls_tipo, 'ls_periodo' : ls_periodo, 'flgCierre' : ls_flg_cierre_p, 'li_anno_ant' : li_anno_ant, 'li_tipo_periodo_ant' : li_tipo_periodo_ant, 'li_periodo_ant' : li_periodo_ant, 'dsc_periodo' : dsc_periodo, 'num_mes' : num_mes, 'ldt_inicio' : ldt_inicio, 'ldt_fin' : ldt_fin, 'accion':'cierraProc'},
                success: function(respuesta){                         
                    if(respuesta == true){
                        swal({
                            title: "",
                            text: "Se grabó el registro satisfactoriamente.",
                            type: "success",
                            confirmButtonText: "Aceptar",
                            onBeforeOpen: window.location.assign('periodo-venta')
                        })
                    }else{
                        swal({
                            title: "",
                            text: "Error en la actualización de la base de datos.",
                            type: "error",
                            confirmButtonText: "Aceptar",
                        })
                    }
                }//success
            });//ajax
         },1000);//setTimeout
    })//then
}

function creaNvoAnio(){
    var li_anno = new Date().getFullYear();
    var li_anno_1 = parseFloat(li_anno) + 1;
    var valida = 0;
    var container = document.querySelector('#anioPerVen');
    container.querySelectorAll('option').forEach(function (li_i) 
    {  
        if($(li_i).val() == li_anno_1){
            valida = 1;
        }
    });

    if(valida == 1){
        swal({
            title: "",
            text: "Solo se puede crear el siguiente al año en curso. El año "+li_anno_1+" ya existe.",
            type: "error",
            confirmButtonText: "Aceptar",
        })
        return;
    }

    swal({
        title: "",
        text: "¿Está seguro que desea crear el año "+li_anno_1+"?",
        type: "question",
        showCancelButton:!0,
        confirmButtonText: "Aceptar",
        cancelButtonText:"Cancelar"
    }).then(function(result){
        if (result.value) {
            setTimeout(function () {
             $.ajax({
                    url:"ajax/periodoVenta.ajax.php",
                    method: "POST",
                    dataType: 'json',
                    data: {'anno' : li_anno_1, 'accion':'creaNvoAnio'},
                    success: function(respuesta){                         
                        if(respuesta == 1){
                            swal({
                                title: "",
                                text: "Se grabó el registro satisfactoriamente.",
                                type: "success",
                                confirmButtonText: "Aceptar",
                                onBeforeOpen: window.location.assign('periodo-venta')
                            })
                        }else if(respuesta == 'duplicado'){
                            swal({
                                title: "",
                                text: "Solo se puede crear el siguiente al año en curso. El año "+li_anno_1+" ya existe.",
                                type: "error",
                                confirmButtonText: "Aceptar",
                            })
                        }else{
                            swal({
                                title: "",
                                text: "Error en la actualización de la base de datos.",
                                type: "error",
                                confirmButtonText: "Aceptar",
                            })
                        }
                    }//success
                });//ajax
             },1000);//setTimeout
        }
    })//then 
}
