$("#fchIniPerVen").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true
});//datepicker

$("#fchFinPerVen").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true
});//datepicker

$("#fchProComPerVen").datetimepicker({
  autoclose:!0,
  format:"dd-mm-yyyy hh:ii"
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

    var li_anno = $("#cod_anno").val();
    var li_anno_1 = parseFloat(li_anno) + 1;
    var ls_tipo = $("#cod_tipo_periodo").val();
 
    if (li_anno == null || li_anno == '' || li_anno == 0){
        swal({
            title: "Error",
            text: "Debe seleccionar el año.",
            type: "error",
            confirmButtonText: "Aceptar",
          });
        return;
    }
    
    if (ls_tipo == null || ls_tipo == ''){
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
            if (li_existe < 0) {
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
            if (li_existe < 0) {
                swal({
                    title: "Error",
                    text: "No se puede copiar los periodos, el año "+li_anno+" al cual se dea copiar la configuración tiene registros.",
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
                data: {'codTrabajador':is_codigo, 'anno' : li_anno, 'tipo_periodo' : ls_tipo, 'accion':'copiaAnnio'},
                success: function(respuesta){                         
                    if(respuesta == true){
                        swal({
                            title: "",
                            text: "Se grabó el registro satisfactoriamente.",
                            type: "success",
                            confirmButtonText: "Aceptar",
                            onBeforeOpen: window.location.assign('arbol-vendedores')
                        })
                    }else{
                        swal({
                            title: "",
                            text: "Eror en la actualización de la base de datos.",
                            type: "error",
                            confirmButtonText: "Aceptar",
                        })
                    }
                }//success
            });//ajax
        },1000);//setTimeout
    })//then
}

// $("#edoPerVen").on("change",function(){
//     swal({
//         title: '¿Está seguro de cerrar el período?',
//         text: "¡Si no lo está puede cancelar la acción!",
//         type: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         cancelButtonText: 'Cancelar',
//         confirmButtonText: 'Si, cerrar el período!'
//         }).then(function(result){
//             if (result.value) {
//                swal({
//                     type: "success",
//                     title: "Período cerrado con éxito.",
//                     showConfirmButton: !1,
//                     timer: 3000
//                 })
//             }//if
//         });//then
// });