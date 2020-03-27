$("#cttoEmiArbVen").on('click', function(){
	document.getElementById("tituloCttArbVen").innerHTML = 'Emisión';
});
$("#cttoActArbVen").on('click', function(){
	document.getElementById("tituloCttArbVen").innerHTML = 'Activación';
});
$("#cttoResArbVen").on('click', function(){
	document.getElementById("tituloCttArbVen").innerHTML = 'Resolución';
});

function creaTablaTrabajadoresArbVend(){
        $.ajax({
            method:'POST',
            url: 'ajax/ArbolVendedores.ajax.php',
            dataType: 'json',
            data: {'entrada':'verTrabajadores'},
            success : function(respuesta){
            	// console.log(respuesta);
            	var classPeriodo = '';
            	var color = '';
                $.each(respuesta,function(index,value){
	                if(index == 0){
	                    classPeriodo = 'liListaKqPstImpar';
	                }else if(index%2 == 0){
	                    classPeriodo = 'liListaKqPstImpar';
	                }else{
	                    classPeriodo = 'liListaKqPstPar';
	                }
	                if(value['flg_activo'] == 'SI'){
	                	color = 'black';
	                }else{
	                	color = 'red';
	                }
	                $("#listaTrabArbVen").append(
	                    '<li class="nav-item '+classPeriodo+' itemLista">'+
	                        '<a href="#" class="btnVerTrabArbVen" codTrabajador="'+value['cod_trabajador']+'" flg_activo="'+value['flg_activo']+'">'+
	                        	'<div class="row" style = "color:'+color+'">'+
									'<div class="col-md-4">'+value['cod_trabajador']+'</div>'+
									'<div class="col-md-8">'+value['dsc_apellido_paterno']+' '+value['dsc_apellido_materno']+', '+value['dsc_nombres']+'</div>'+
								'</div>'+
	                        '</a>'+
	                    '</li>'
	                );//append
	            });//each
            }
        });
}
creaTablaTrabajadoresArbVend();

$("#listaTrabArbVen").on("click","a.btnVerTrabArbVen",function(){
	$(".ulListaVerTrabArbVen li").removeClass('liListaKqPstActive');
	$(this).parent('li').addClass('liListaKqPstActive');
	var codTrabajador = $(this).attr("codTrabajador");
    var flg_activo = $(this).attr('flg_activo');
    $("#flg_activo").val(flg_activo);
	$("#listaHistConf .itemLista").remove();
	$.ajax({
        url:"ajax/ArbolVendedores.ajax.php",
        method: "POST",
        dataType: 'json',
        data: {'codTrabajador':codTrabajador,'accion':'verDetTrabajador'},
        success: function(respuesta){
            //console.log('respuesta',respuesta);
            $.each(respuesta,function(index,value){
            	if(index == 0){
                    classPeriodo = 'liListaKqPstImpar';
                }else if(index%2 == 0){
                    classPeriodo = 'liListaKqPstImpar';
                }else{
                    classPeriodo = 'liListaKqPstPar';
                }
            	$("#listaHistConf").append(
                    '<li class="nav-item '+classPeriodo+' itemLista">'+
                        '<a href="#" class="btnVerHistConf" codTrabajador="'+codTrabajador+'" numAnio="'+value['num_anno']+'" tipoperiodo="'+value['cod_tipo_periodo']+'" periodo="'+value['cod_periodo']+'" jefeventas="'+value['cod_jefeventas']+'" codgrupo="'+value['cod_grupo']+'" dscgrupo="'+value['dsc_grupo']+'" codcomisionista="'+value['cod_tipo_comisionista']+'" dsccomisionista="'+value['dsc_tipo_comisionista']+'" codsup="'+value['cod_supervisor']+'" flg_estado="'+value['flg_estado']+'" flg_modificacion_grupo="'+value['flg_modificacion_grupo']+'">'+
                        	'<div class="row">'+
								'<div class="col-md-2">'+(index+1)+'</div>'+
								'<div class="col-md-2">'+value['num_anno']+'</div>'+
								'<div class="col-md-2">'+value['cod_tipo_periodo']+'</div>'+
								'<div class="col-md-2">'+value['cod_periodo']+'</div>'+
								'<div class="col-md-4">'+value['dsc_tipo_comisionista']+'</div>'+
							'</div>'+
                        '</a>'+
                    '</li>'
                 );//append
            });//each
        }//success
    });//ajax
});

$("#listaHistConf").on("click","a.btnVerHistConf",function(){
	$(".ulListaHistConf li").removeClass('liListaKqPstActive');
	$(this).parent('li').addClass('liListaKqPstActive');
	var annio = $(this).attr("numAnio");
	$("#numAnioArbVen").val(annio);
	var tipoPeriodo = $(this).attr("tipoperiodo");
	$("#tipoPeriodoArbVen").val(tipoPeriodo);
	$("#codGrupoArbVen").val($(this).attr("codgrupo"));
	$("#dscGrupoArbVen").val($(this).attr("dscgrupo"));
	var periodo = $(this).attr("periodo");
	$("#periodoArbVen").val(periodo);
	$("#codComiArbVen").val($(this).attr("codcomisionista"));
	$("#dscComiArbVen").val($(this).attr("dsccomisionista"));
	var vendedor = $(this).attr("codTrabajador");
    $("#cod_trabajador").val(vendedor);
	var supervisor = $(this).attr("codsup");
	$("#codSupVenArbVen").val(supervisor);
	var jefeVentas = $(this).attr("jefeventas");
	$("#codJefeVenArbVen").val(jefeVentas);
    var flg_estado = $(this).attr("flg_estado");
    $("#flgEstado").val(flg_estado);
    var flg_modificacion_grupo = $(this).attr("flg_modificacion_grupo");
    $("#flg_modificacion_grupo").val(flg_modificacion_grupo);
    buscaPeriodo();
	$.ajax({
        url:"ajax/ArbolVendedores.ajax.php",
        method: "POST",
        dataType: 'json',
        data: {'codTrabajador':jefeVentas,'accion':'nombreTrabajador'},
        success: function(respuesta){
        	nombre = respuesta['dsc_apellido_paterno']+' '+respuesta['dsc_apellido_materno']+', '+respuesta['dsc_nombres'];
        	$("#dscJefeVentaArbVen").val(nombre);
        }//succes
    });//ajax
    $.ajax({
        url:"ajax/ArbolVendedores.ajax.php",
        method: "POST",
        dataType: 'json',
        data: {'codTrabajador':supervisor,'accion':'nombreTrabajador'},
        success: function(respuesta){
        	nombre = respuesta['dsc_apellido_paterno']+' '+respuesta['dsc_apellido_materno']+', '+respuesta['dsc_nombres'];
        	$("#dscSupArbVen").val(nombre);
        }//succes
    });//ajax
    $("#listaCttos .itemLista").remove();
    $.ajax({
        url:"ajax/ArbolVendedores.ajax.php",
        method: "POST",
        dataType: 'json',
        data: {'codTrabajador':vendedor,'accion':'buscaCtto','periodo':periodo,'tipoPeriodo':tipoPeriodo,'annio':annio},
        success: function(respuesta){
        	// console.log(respuesta);
        	var estatus = '';
        	var fecha_fin = '';
        	var fecha = '';
        	$.each(respuesta,function(index,value){
            	if(index == 0){
                    classCtto = 'liListaKqPstImpar';
                }else if(index%2 == 0){
                    classCtto = 'liListaKqPstImpar';
                }else{
                    classCtto = 'liListaKqPstPar';
                }
                if(value['flg_activado'] == 'SI'){
                	estatus = 'Activado'              
               		if(value['fch_activacion'] == null || ''){
               			fecha = '';
               		}else{
		                fecha = value['fch_activacion'];
		            }
                }
                if(value['flg_emitido'] == 'SI'){
                	estatus = 'Emitido'
                	if(value['fch_emision'] == null || ''){
               			fecha = '';
               		}else{
		                fecha = value['fch_emision'];
		            }
                }
                if(value['flg_resuelto'] == 'SI'){
                	estatus = 'Resuelto'
                	if(value['fch_resolucion'] == null || ''){
               			fecha = '';
               		}else{
		                fecha = value['fch_resolucion'];
		            }
                }
            	$("#listaCttos").append(
                    '<li class="nav-item '+classCtto+' itemLista">'+
                        '<a href="seguimientoContrato?codCtto='+value['cod_contrato']+'" class="btnVerCtto" codCtto="'+value['cod_contrato']+'">'+
                        	'<div class="row" style="color:black">'+
								'<div class="col-md-3">'+value['dsc_localidad']+'</div>'+
								'<div class="col-md-3" style="color:blue">'+value['cod_contrato']+'</div>'+
								'<div class="col-md-1">'+value['cod_tipo_necesidad']+'</div>'+
								'<div class="col-md-2">'+estatus+'</div>'+
								'<div class="col-md-2">'+fecha+'</div>'+
							'</div>'+
                        '</a>'+
                    '</li>'
                 );//append
            });//each
        }//succes
    });//ajax

});

// $("#NvoConfArbVen").on("click",function(){
//     $('#m_modal_nvoConfigArbVen').modal('show');
// });
//----------------------------------------------------------------------------------------------//
//-------------------------------------FUNCIONES AUXILIARES-------------------------------------//
//----------------------------------------------------------------------------------------------//
function buscanombre(campo,codTrabajador){
    $.ajax({
        url:"ajax/ArbolVendedores.ajax.php",
        method: "POST",
        dataType: 'json',
        data: {'codTrabajador':codTrabajador,'accion':'nombreTrabajador'},
        success: function(respuesta){
            nombre = codTrabajador+' / '+respuesta['dsc_apellido_paterno']+' '+respuesta['dsc_apellido_materno']+', '+respuesta['dsc_nombres'];
            document.getElementById(campo).value=nombre;
        }//succes
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

function nombreComisionista(valor,campo){
    $.ajax({
        type: 'POST',
        url: 'ajax/ArbolVendedores.ajax.php',
        dataType: 'json',
        data: { 'cod' : valor, 'accion' : 'comisionista' },
        success : function(respuesta){
            document.getElementById(campo).value = respuesta['dsc_tipo_comisionista'];
            $("#flgJefeModArbVen").val(respuesta['flg_supervisor']);
            $("#flgSupModArbVen").val(respuesta['flg_jefeventas']);
        }
    });
}//nombreGrupoVenta

function creaTablaVendedor(tipo){
    $('#tablaVendedor').html('<div class="loader"></div>');
    $.ajax({
        url: 'extensiones/captcha/creaTablaVendedor.php',
        dataType: 'text',
        data: { 'tipo' : tipo },
        success : function(respuesta){
            // console.log(respuesta);
            $('#tablaVendedor').html('')
            $("#tablaVendedor").html(respuesta);
            $('#myTableVendedor').DataTable();
        }
    });
}

function buscaPeriodo(){
    var annoPeriodo = document.getElementById("numAnioArbVen").value;
    var tipoPeriodo = document.getElementById("tipoPeriodoArbVen").value;
    $.ajax({
        type:'GET',
        url: 'extensiones/captcha/buscaPeriodo.php',
        dataType: 'text',
        data: {'annoPeriodo':annoPeriodo, 'tipoPeriodo':tipoPeriodo},
        success : function(response){
            document.getElementById("periodoConfTraArbVen").innerHTML = response;
         }//success
    });//ajax
}//buscaPeriodo

$("#btnGrupoModArbVen").on('click',function(){
    $('#tablaGrupo').html('<div class="loader"></div>');
    $.ajax({
        url: 'extensiones/captcha/creaTablaGrupo.php',
        success : function(respuesta){
            // console.log(respuesta);
            $('#tablaGrupo').html('')
            $("#tablaGrupo").html(respuesta);
            $('#myTableGrupo').DataTable();
        }
    });
});

$("#btnComModArbVen").on('click',function(){
    $('#tablaComisionista').html('<div class="loader"></div>');
    $.ajax({
        url: 'extensiones/captcha/creaTablaComisionista.php',
        success : function(respuesta){
            // console.log(respuesta);
            $('#tablaComisionista').html('')
            $("#tablaComisionista").html(respuesta);
            $('#myTableComisionista').DataTable();
        }
    });
});

function creaTablaFueVentas(accion){
    $('#tablaFueVen').html('<div class="loader"></div>');
    $.ajax({
        url: 'extensiones/captcha/creaTablaFueVentas.php',
        method: "POST",
        dataType: 'text',
        data: {'entrada':accion},
        success : function(respuesta){
            // console.log(respuesta);
            $('#tablaFueVen').html('')
            $("#tablaFueVen").html(respuesta);
            $('#myTableFueVen').DataTable();
        }
    });
}

function anadeGrupo(codGrupo,codJefe,codSup){
    $("#grupoModTraArbVen").val(codGrupo).trigger('change');
    $("#SupervisorModArbVen").val(codJefe).trigger('change');
    $("#jefeVentaModArbVen").val(codSup).trigger('change');
}

function anadeComisionista(codCom,flgJefe,flgSup){
    $("#comisionistaModArbVen").val(codCom).trigger('change');
    $("#flgJefeModArbVen").val(flgJefe);
    $("#flgSupModArbVen").val(flgSup);
}

function anadeFueTra(cod,boton){
    var anno = $("#numAnioArbVen").val();
    var tipoPer = $("#tipoPeriodoArbVen").val();
    var periodo = $("#periodoArbVen").val();
     if(boton == 'supervisor'){
        $.ajax({
            url:"ajax/ArbolVendedores.ajax.php",
            method: "POST",
            dataType: 'json',
            data: {'codTrabajador':cod, 'anno' : anno, 'tipo_periodo' : tipoPer, 'periodo' : periodo, 'accion':'listaFueVen'},
            success: function(respuesta){
                $("#comisionistaModArbVen").val(respuesta['cod_tipo_comisionista']).trigger('change');
                // $("#grupoModTraArbVen").val(respuesta['cod_grupo']).trigger('change');
                $("#SupervisorModArbVen").val(respuesta['cod_supervisor']).trigger('change');
                $("#jefeVentaModArbVen").val(respuesta['cod_jefeventas']).trigger('change');
            }
        });
    }else if(boton == 'jefe'){
        $("#jefeVentaModArbVen").val(cod).trigger('change');
    }
}

function aceptarMod(){
    var entrada = $("#entradaModArbVen").val();
    if (entrada == 'modificar') {
        modificaArbol();
    }
    else if(entrada == 'nuevo'){
        alert('nuevo');
    }
}

//----------------------------------------------------------------------------------------------//
//-------------------------------------------MODIFICAR------------------------------------------//
//----------------------------------------------------------------------------------------------//

function validaModifArbol(){

    ls_activo = $("#flg_activo").val();
    if (ls_activo == null || ls_activo == ''){ return; }

    if (ls_activo == 'NO') {
        swal({
            title: "Error",
            text: "No puede modificar el árbol de vendedor de un trabajador inactivo.",
            type: "error",
            confirmButtonText: "Aceptar",
          });
        return;
    }

    ls_codigo   = $("#cod_trabajador").val();
    ls_tipo     = $("#tipoPeriodoArbVen").val();
    ls_periodo  = $("#periodoArbVen").val();
    li_anno     = $("#numAnioArbVen").val();
    $("#anioConfTraArbVen").val(li_anno).trigger('change');
    $("#tipoPerConfTraArbVen").val(ls_tipo).trigger('change');

    // -- Valida -- //

    var ls_flg_estado = $("#flgEstado").val();
    var ls_flg_modif  = $("#flg_modificacion_grupo").val();

    if (ls_flg_modif == null || ls_flg_modif == '') { ls_flg_modif = 'NO';}

    if (ls_flg_modif == 'SI') {
        swal({
            title: "Error",
            text: "Ya está cerrada la modificación de árbol vendedor.",
            type: "error",
            confirmButtonText: "Aceptar",
          });
        return;
    }

    if (ls_flg_estado == 'CE') {
        swal({
            title: "Error",
            text: "El período seleccionado esta cerrado.",
            type: "error",
            confirmButtonText: "Aceptar",
          });
        return;
    }

    // -- Ok -- //

    buscanombre('dscTrabModConfArbVen',ls_codigo);
    codGrupo = $("#codGrupoArbVen").val();
    codComi = $("#codComiArbVen").val();
    codJefe = $("#codSupVenArbVen").val();
    codSup = $("#codJefeVenArbVen").val();
    $("#grupoModTraArbVen").val(codGrupo).trigger('change');
    $("#comisionistaModArbVen").val(codComi).trigger('change');
    $("#SupervisorModArbVen").val(codJefe).trigger('change');
    $("#jefeVentaModArbVen").val(codSup).trigger('change');
    $("#entradaModal").val('modificacion');
    $('#m_modal_nvoConfigArbVen').modal('show');
    $("#periodoConfTraArbVen").val(ls_periodo).trigger('change');
    $("#entradaModArbVen").val('modificar');
}

function modificaArbol(){

    var ls_jefe = $("#jefeVentaModArbVen").val();
    var ls_supervisor = $("#SupervisorModArbVen").val();
    var ls_grupo = $("#grupoModTraArbVen").val();
    var ls_tipo_comisionista = $("#comisionistaModArbVen").val();

    var ls_tipo = $("#tipoPeriodoArbVen").val();
    var ls_periodo = $("#periodoConfTraArbVen").val();
    var li_anno = $("#numAnioArbVen").val();

    var ls_flg_supervisor = 'NO';
    var ls_flg_jefe = 'NO';
    var is_opcion = 'INS';

    var cod = $("#cod_trabajador").val();

    // -- Valida -- //

    if (li_anno == null || li_anno == 0 || li_anno == '') {
        swal({
            title: "Error",
            text: "Debe seleccionar el año.",
            type: "error",
            confirmButtonText: "Aceptar",
          });
        return;
    }

    if (ls_tipo == null || ls_tipo == 0 || ls_tipo == '') {
        swal({
            title: "Error",
            text: "Debe seleccionar el tipo de período.",
            type: "error",
            confirmButtonText: "Aceptar",
          });
        return;
    }

    if (ls_periodo == null || ls_periodo == 0 || ls_periodo == '') {
        swal({
            title: "Error",
            text: "Debe seleccionar el período.",
            type: "error",
            confirmButtonText: "Aceptar",
          });
        return;
    }

    if (ls_grupo == null || ls_grupo == 0 || ls_grupo == '') {
        swal({
            title: "Error",
            text: "Debe seleccionar el grupo de venta.",
            type: "error",
            confirmButtonText: "Aceptar",
          });
        return;
    }

    if (ls_tipo_comisionista == null || ls_tipo_comisionista == 0 || ls_tipo_comisionista == '') {
        swal({
            title: "Error",
            text: "Debe seleccionar el tipo de comisionista.",
            type: "error",
            confirmButtonText: "Aceptar",
          });
        return;
    }

    if (ls_supervisor == null || ls_supervisor == 0 || ls_supervisor == '') {
        swal({
            title: "Error",
            text: "Debe seleccionar el supervisor.",
            type: "error",
            confirmButtonText: "Aceptar",
          });
        return;
    }

    if (ls_jefe == null || ls_jefe == 0 || ls_jefe == '') {
        swal({
            title: "Error",
            text: "Debe seleccionar el jefe de ventas.",
            type: "error",
            confirmButtonText: "Aceptar",
          });
        return;
    }

    // -- Valida -- //

    if (is_opcion == 'INS'){
        
        var li_existe = 0;
            
        $.ajax({
            url:"ajax/ArbolVendedores.ajax.php",
            method: "POST",
            dataType: 'json',
            data: {'codTrabajador':cod, 'anno' : li_anno, 'tipo_periodo' : ls_tipo, 'periodo' : ls_periodo, 'accion':'existeConsejero'},
            success: function(respuesta){
                conole.log(respuesta);
                li_existe = respuesta;
                if (li_existe > 0) {
                    swal({
                        title: "Error",
                        text: "El período ingresado ya esta configurado para el consejero. Por favor verifique.",
                        type: "error",
                        confirmButtonText: "Aceptar",
                      });
                    return;
                }
            }//success
        }); //ajax           
    }//End If

//     // -- Periodo -- //

//     SELECT  vtama_periodo.flg_estado, vtama_periodo.flg_modificacion_grupo
//     INTO        :ls_flg_estado, :ls_flg_modif
//     FROM        vtama_periodo
//     WHERE   vtama_periodo.num_anno = :li_anno
//     AND     vtama_periodo.cod_tipo_periodo = :ls_tipo
//     AND     vtama_periodo.cod_periodo = :ls_periodo;

//     f_verifica_transaccion(SQLCA)

//     If IsNull(ls_flg_modif) Or Trim(ls_flg_modif) = '' Then ls_flg_modif = 'NO'

//     If ls_flg_modif = 'SI' Then
//         f_sys_mensaje_usuario(Title, "MSGLIB", "YA ESTA CERRADA LA MODIFICACIÓN DE ÁRBOL VENDEDOR.", "PRV")
//         Return
//     End If

//     If ls_flg_estado = 'CE' Then
//         f_sys_mensaje_usuario(Title, "MSGLIB", "EL PERÍODO SELECCIONADO ESTA CERRADO.", "PRV")
//         Return
//     End If

//     // -- Obtiene Jefe y Supervisor del grupo -- //

//     SELECT  vtama_grupo.cod_jefe_ventas, vtama_grupo.cod_supervisor
//     INTO        :ls_jefe_gpo, :ls_supervisor_gpo
//     FROM        vtama_grupo
//     WHERE   vtama_grupo.cod_grupo = :ls_grupo;

//     f_verifica_transaccion(SQLCA)

//     // -- Flag -- //

//     If ls_jefe_gpo = is_codigo Then ls_flg_jefe = 'SI'
//     If ls_supervisor_gpo = is_codigo Then ls_flg_supervisor = 'SI'

//     // -- Setea -- //

//     dw_mto.SetItem(1, "cod_trabajador", is_codigo)
//     dw_mto.SetItem(1, "flg_supervisor", ls_flg_supervisor)
//     dw_mto.SetItem(1, "flg_jefeventas", ls_flg_jefe)

//     // -- Graba -- //
        
//     If dw_mto.Update() <> 1 Then Goto db_error

//     Commit;
//     f_sys_mensaje_usuario(Title, "MSGLIB", "SE GRABO EL REGISTRO SATISFACTORIAMENTE.", "MSG")
//     Close(w_vta_rsp_mto_arbol_vendedor)
//     Return

//     db_error:
//     RollBack;
//     f_sys_mensaje_usuario(Title, "MSGLIB", "ERROR EN LA ACTUALIZACION DE LA BASE DE DATOS.", "ERR")
 }

 //----------------------------------------------------------------------------------------------//
//--------------------------------------------ELIMINAR------------------------------------------//
//----------------------------------------------------------------------------------------------//

function eliminaArbol(){

    // String      ls_codigo
    // String      ls_activo
    // String      ls_tipo, ls_periodo
    // String      ls_flg_estado, ls_flg_modif
    // Integer li_row, li_anno
    // Integer li_det
    // Integer li_emi, li_act
    // str_general estructura

    // dw_trabajador.accepttext()

    // li_emi = 0
    // li_act = 0

    // li_row = dw_trabajador.GetRow()
    // If li_row < 1 Then Return

    // li_det = dw_detalle.GetRow()
    // If li_det < 1 Then Return

    // ls_activo = dw_trabajador.GetItemString(li_row, "flg_activo")
    // If IsNull(ls_activo) Or Trim(ls_activo) = '' Then ls_activo = 'NO'

    // If ls_activo = 'NO' Then
    //     f_mensaje_axiom(Title, "MSGLIB", "NO PUEDE MODIFICAR EL ÁRBOL VENDEDOR DE UN TRABAJADOR INACTIVO.", "PRV")
    //     Return
    // End If

    // ls_codigo   = dw_trabajador.GetItemString(li_row, "cod_trabajador")
    // ls_tipo         = dw_detalle.GetItemString(li_det, "cod_tipo_periodo")
    // ls_periodo  = dw_detalle.GetItemString(li_det, "cod_periodo")
    // li_anno         = dw_detalle.GetItemNumber(li_det, "num_anno")

    // // -- Valida -- //

    // SELECT  vtama_periodo.flg_estado, vtama_periodo.flg_modificacion_grupo
    // INTO        :ls_flg_estado, :ls_flg_modif
    // FROM        vtama_periodo
    // WHERE   vtama_periodo.num_anno = :li_anno
    // AND     vtama_periodo.cod_tipo_periodo = :ls_tipo
    // AND     vtama_periodo.cod_periodo = :ls_periodo;

    // f_verifica_transaccion(SQLCA)

    // If IsNull(ls_flg_modif) Or Trim(ls_flg_modif) = '' Then ls_flg_modif = 'NO'

    // If ls_flg_modif = 'SI' Then
    //     f_mensaje_axiom(Title, "MSGLIB", "YA ESTA CERRADA LA MODIFICACIÓN DE ÁRBOL VENDEDOR.", "PRV")
    //     Return
    // End If

    // If ls_flg_estado = 'CE' Then
    //     f_mensaje_axiom(Title, "MSGLIB", "EL PERÍODO SELECCIONADO ESTA CERRADO.", "PRV")
    //     Return
    // End If

    // // -- Valida Ctt -- //

    // li_emi = tab_1.tp_2.tab_2.tp_3.dw_emi.Rowcount()
    // li_act = tab_1.tp_2.tab_2.tp_4.dw_act.Rowcount()

    // If li_emi > 0 Then
    //     f_mensaje_axiom(Title, "MSGLIB", "NO PUEDE ELIMINAR EL REGISTRO, EL CONSEJERO TIENE CONTRATOS EMITIDOS EN EL PERÍODO [" + String(li_anno) + "-" + ls_tipo + "-" + ls_periodo + "].", "PRV")
    //     Return
    // End If

    // If li_act > 0 Then
    //     f_mensaje_axiom(Title, "MSGLIB", "NO PUEDE ELIMINAR EL REGISTRO, EL CONSEJERO TIENE CONTRATOS ACTIVADOS EN EL PERÍODO [" + String(li_anno) + "-" + ls_tipo + "-" + ls_periodo + "].", "PRV")
    //     Return
    // End If

    // // -- Confirmacion -- //

    // If f_mensaje_axiom(Title, "MSGLIB", "ESTA SEGURO QUE DESEA ELIMINAR EL REGISTRO SELECCIONADO.", "PRG") <> 1 Then Return

    // // -- Eliminar -- //

    // dw_detalle.Deleterow(li_det)
    // If dw_detalle.Update() <> 1 Then Goto db_error

    // Commit;
    // f_mensaje_axiom(Title, "MSGLIB", "SE ELIMINO EL REGISTRO SATISFACTORIAMENTE.", "MSG")
    // dw_detalle.Retrieve(ls_codigo, li_anno)
    // Return

    // db_error:
    // RollBack;
    // f_mensaje_axiom(Title, "MSGLIB", "ERROR EN LA ACTUALIZACION DE LA BASE DE DATOS.", "ERR")
}