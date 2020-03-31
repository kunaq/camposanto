$("#cttoEmiArbVen").on('click', function(){
	document.getElementById("tituloCttArbVen").innerHTML = 'Emisión';
});
$("#cttoActArbVen").on('click', function(){
	document.getElementById("tituloCttArbVen").innerHTML = 'Activación';
});
$("#cttoResArbVen").on('click', function(){
	document.getElementById("tituloCttArbVen").innerHTML = 'Resolución';
});

$(".mayuscula").keyup(function() {
    this.value = this.value.toLocaleUpperCase();
});

$("#nombreTrabajador").on("keyup", function() {
  var patron = $(this).val();
  // si el campo está vacío
  if (patron == "") {
    // mostrar todos los elementos
    $(".itemLista").css("display", "list-item");
    // si tiene valores, realizar la búsqueda
  } else {
    // atravesar la lista
    $(".itemLista").each(function() {
      if ($(this).text().indexOf(patron) < 0) {
        // si el texto NO contiene el patrón de búsqueda, esconde el elemento
        $(this).css("display", "none");
      } else {
        // si el texto SÍ contiene el patrón de búsqueda, muestra el elemento
        $(this).css("display", "list-item");
      }
    });
  }
});

$( "#edoTraArbVen" ).change(function (){
    if ($("#edoTraArbVen").val()=="2") 
    {
        $(".ulListaVerTrabArbVen li").each(function() {
            $(".act_SI").attr("hidden", true);
            $(".act_NO").attr("hidden", false);             
        });
    }else if ($("#edoTraArbVen").val()=="1") 
    {
        $(".ulListaVerTrabArbVen li").each(function() { 
            $(".act_SI").attr("hidden", false);
            $(".act_NO").attr("hidden", true);              
        });
        
    } else 
    {
        $(".ulListaVerTrabArbVen li").each(function() {     
            $(".act_SI").attr("hidden", false);
            $(".act_NO").attr("hidden", false);             
        });
    }       
});

$("#edoCttoArbVen").change(function (){
    if ($("#edoCttoArbVen").val()=="1") //emitidos
    {
        $(".ulListaHistConf li").each(function() {
            
            $(".ctr_activo").attr("hidden", true);
            $(".ctr_emitido").attr("hidden", false);
            $(".ctr_resuelto").attr("hidden", true);                
        });
    }else if ($("#edoCttoArbVen").val()=="2") //activados
    {
        $(".ulListaHistConf li").each(function() {  
            $(".ctr_activo").attr("hidden", false);
            $(".ctr_emitido").attr("hidden", true);
            $(".ctr_resuelto").attr("hidden", true);                
        });
        
    }else if ($("#edoCttoArbVen").val()=="3") //resueltos
    {
        $(".ulListaHistConf li").each(function() {  
            $(".ctr_activo").attr("hidden", true);
            $(".ctr_emitido").attr("hidden", true);
            $(".ctr_resuelto").attr("hidden", false);               
        });
        
    } else //todos
    {
        $(".ulListaHistConf li").each(function() {      
            $(".ctr_activo").attr("hidden", false);
            $(".ctr_emitido").attr("hidden", false);
            $(".ctr_resuelto").attr("hidden", false);       
        });
    }       
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
	                    '<li class="nav-item '+classPeriodo+' itemLista act_'+value['flg_activo']+'">'+
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
    $("#NvoConfArbVen").prop('disabled',false);
    $("#cod_trabajadorHidd").val(codTrabajador);
    buscanombre('dscTrabModConfArbVen',codTrabajador);
    var anio = $("#anioBuscaTraArbVen").val();
    llenaHistorial(codTrabajador,anio);
});

 $("#anioBuscaTraArbVen").on("change", function(){
    var anio = $(this).val();
    $("#anioConfTraArbVen").val(anio).trigger('change');
    var codTrabajador = $("#cod_trabajadorHidd").val();
    llenaHistorial(codTrabajador,anio);
 });

function llenaHistorial(codTrabajador,anio){
    $("#listaHistConf .itemLista").remove();
    $.ajax({
        url:"ajax/ArbolVendedores.ajax.php",
        method: "POST",
        dataType: 'json',
        data: {'codTrabajador':codTrabajador,'anio' : anio,'accion':'verDetTrabajador'},
        success: function(respuesta){
            //console.log('respuesta',respuesta);
            if(respuesta != '' || respuesta != null){
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
            }else{

                swal({
                    title: "Error",
                    text: "El trabajador no posee registros.",
                    type: "error",
                    confirmButtonText: "Aceptar",
                  });
                return;
            }
        }//success
    });//ajax
}

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
    $("#BtnModConfArbVen").prop('disabled',false);
    $("#BtnEliConfArbVen").prop('disabled',false);
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
                if (estatus == 'Activado') {
                    flg_activo="activo";
                    $("#tieneCttoAct").val('SI');
                }else if (estatus == 'Emitido') {
                    flg_activo="emitido";
                    $("#tieneCttoEmi").val('SI');
                }else if (estatus == 'Resuelto') {
                    flg_activo="resuelto";
                }
            	$("#listaCttos").append(
                    '<li class="nav-item '+classCtto+' itemLista ctr_'+flg_activo+'">'+
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
    var annoPeriodo = document.getElementById("anioConfTraArbVen").value;
    var tipoPeriodo = document.getElementById("tipoPerConfTraArbVen").value;
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
            // console.log(respuesta);s
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
    $("#flgJefeGpoArbVen").val(codJefe);
    $("#flgSupGpoArbVen").val(codSup);
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
                console.log(re);
                if(respuesta == '' || respuesta == null){
                    swal({
                        title: "Error",
                        text: "El trabajador no tiene configuración para el periodo actual.",
                        type: "error",
                        confirmButtonText: "Aceptar",
                      });
                }else{
                    $("#comisionistaModArbVen").val(respuesta['cod_tipo_comisionista']).trigger('change');
                    $("#SupervisorModArbVen").val(respuesta['cod_supervisor']).trigger('change');
                    $("#jefeVentaModArbVen").val(respuesta['cod_jefeventas']).trigger('change');
                }
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
        // limpiaModal();
        modificaArbol();
    }
}

function limpiaModal(){
    buscaPeriodo();
    $("#tipoPeriodoArbVen").val('Q01');
    $("#periodoArbVen").val('15D');
    $("#numAnioArbVen").val('2020');
    $("#flgEstado").val('');
    $("#flg_modificacion_grupo").val('');
    $("#flgJefeModArbVen").val('');
    $("#flgSupModArbVen").val('');
    $("#flgJefeGpoArbVen").val('');
    $("#flgSupGpoArbVen").val('');
    $("#SupervisorModArbVen").val('');
    $("#dscSpervisorArbVen").val('');
    $("#jefeVentaModArbVen").val('');
    $("#dscJefeVentaModArbVen").val('');
    $("#grupoModTraArbVen").val('');
    $("#dscGrupoModConfArbVen").val('');
    $("#comisionistaModArbVen").val('');
    $("#dscComisionistaArbVen").val('');
}

function nvoRegistro(){
    limpiaModal();
    buscaPeriodo();
    document.getElementById("ArbVenModalLabel").innerHTML = 'Nuevo registro';
}

//----------------------------------------------------------------------------------------------//
//-------------------------------------------MODIFICAR------------------------------------------//
//----------------------------------------------------------------------------------------------//

function validaModifArbol(){

    var ls_activo = $("#flg_activo").val();
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

    var ls_codigo   = $("#cod_trabajador").val();
    var ls_tipo     = $("#tipoPeriodoArbVen").val();
    var ls_periodo  = $("#periodoArbVen").val();
    var li_anno     = $("#numAnioArbVen").val();
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

    codGrupo = $("#codGrupoArbVen").val();
    codComi = $("#codComiArbVen").val();
    codJefe = $("#codSupVenArbVen").val();
    codSup = $("#codJefeVenArbVen").val();
    $("#grupoModTraArbVen").val(codGrupo);
    $("#grupoModTraArbVen").trigger('change');
    $("#comisionistaModArbVen").val(codComi).trigger('change');
    $("#SupervisorModArbVen").val(codJefe).trigger('change');
    $("#jefeVentaModArbVen").val(codSup).trigger('change');
    $("#entradaModal").val('modificacion');
    $('#m_modal_nvoConfigArbVen').modal('show');
    document.getElementById("ArbVenModalLabel").innerHTML = 'Modificar registro';
    $("#periodoConfTraArbVen").val(ls_periodo).trigger('change');
    $("#entradaModArbVen").val('modificar');
}

function modificaArbol(){

    var ls_jefe = $("#jefeVentaModArbVen").val();
    var ls_supervisor = $("#SupervisorModArbVen").val();
    var ls_grupo = $("#grupoModTraArbVen").val();
    console.log(ls_grupo);
    var ls_tipo_comisionista = $("#comisionistaModArbVen").val();

    var ls_tipo = $("#tipoPerConfTraArbVen").val();
    var ls_periodo = $("#periodoConfTraArbVen").val();
    var li_anno = $("#anioConfTraArbVen").val();

    var ls_flg_supervisor = 'NO';
    var ls_flg_jefe = 'NO';
    var is_opcion = $("#entradaModArbVen").val();
    // var is_opcion = 'MOD';

    var is_codigo = $("#cod_trabajadorHidd").val();

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

    var mensaje = "¿Esta seguro que desea modificar el registro seleccionado?";

    if (is_opcion == 'nuevo'){
        
        var li_existe = 0;
        mensaje = "¿Esta seguro que desea grabar el registro?";
            
        $.ajax({
            url:"ajax/ArbolVendedores.ajax.php",
            method: "POST",
            dataType: 'json',
            data: {'codTrabajador':is_codigo, 'anno' : li_anno, 'tipo_periodo' : ls_tipo, 'periodo' : ls_periodo, 'accion':'existeConsejero'},
            success: function(respuesta){
                li_existe = respuesta[0];
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

    // -- Periodo -- //

    var ls_flg_estado = $("#flgEstado").val();
    var ls_flg_modif = $("#flg_modificacion_grupo").val();

    if (ls_flg_modif == null || ls_flg_modif == '') { ls_flg_modif = 'NO';}

    if (ls_flg_modif == 'SI') {
        swal({
            title: "Error",
            text: "Ya esta cerrada la modificación del árbol de vendedor.",
            type: "error",
            confirmButtonText: "Aceptar",
          });
        return;
    }

    if (ls_flg_estado == 'CE') {
        swal({
            title: "Error",
            text: "El período seleccionado ya esta cerrado.",
            type: "error",
            confirmButtonText: "Aceptar",
          });
        return;
    }    

    // -- Obtiene Jefe y Supervisor del grupo -- //

    var ls_jefe_gpo = $("#flgJefeGpoArbVen").val();
    var ls_supervisor_gpo = $("#flgSupGpoArbVen").val();

    // -- Flag -- //

    if (ls_jefe_gpo == is_codigo) { ls_flg_jefe = 'SI';}
    if (ls_supervisor_gpo == is_codigo) { ls_flg_supervisor = 'SI';}

    // -- Setea -- //

//     dw_mto.SetItem(1, "cod_trabajador", is_codigo)
//     dw_mto.SetItem(1, "flg_supervisor", ls_flg_supervisor)
//     dw_mto.SetItem(1, "flg_jefeventas", ls_flg_jefe)

    swal({
        title: "",
        text: mensaje,
        type: "question",
        showCancelButton:!0,
        confirmButtonText: "Aceptar",
        cancelButtonText:"Cancelar"
    }).then(function(){
        setTimeout(function () { 

            // -- Graba -- //

            $.ajax({
                url:"ajax/ArbolVendedores.ajax.php",
                method: "POST",
                dataType: 'json',
                data: {'codTrabajador':is_codigo, 'anno' : li_anno, 'tipo_periodo' : ls_tipo, 'periodo' : ls_periodo, 'grupo' : ls_grupo, 'tipo_comisionista' : ls_tipo_comisionista, 'supervisor' : ls_supervisor, 'jefe' : ls_jefe, 'flg_supervisor' : ls_flg_supervisor, 'flg_jefe' : ls_flg_jefe, 'accion':is_opcion},
                success: function(respuesta){
                    if(respuesta == true){
                        swal({
                            title: "",
                            text: "Se grabó el registro satisfactoriamente.",
                            type: "success",
                            confirmButtonText: "Aceptar",
                            onBeforeOpen: window.location.assign('arbol-vendedores')
                        })
                    }else if(respuesta == 'duplicado'){
                        swal({
                            title: "",
                            text: "El trabajador ya se encuentra configurado para el periodo seleccionado.",
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
    })//then
 }//modificaArbol

 //----------------------------------------------------------------------------------------------//
//--------------------------------------------ELIMINAR------------------------------------------//
//----------------------------------------------------------------------------------------------//

function eliminaArbol(){

    var li_emi = 0;
    var li_act = 0;

    var ls_activo = $("#flg_activo").val();

    if (ls_activo==null || ls_activo == '') {
        ls_activo='NO';    
    }

    if (ls_activo =='NO' || ls_activo == 0) {
        swal({
            title: "",
            text: "No puede modificar el árbol vendedor de un trabajador inactivo.",
            type: "error",
            confirmButtonText: "Aceptar",
          });
        return;
    }

    var ls_codigo   = $("#cod_trabajador").val();
    var ls_tipo     = $("#tipoPeriodoArbVen").val();
    var ls_periodo  = $("#periodoArbVen").val();
    var li_anno     = $("#numAnioArbVen").val();
    var ls_flg_estado = $("#flgEstado").val();
    var ls_flg_modif  = $("#flg_modificacion_grupo").val();

    if (ls_flg_modif==null || ls_flg_modif=='') {
        ls_flg_modif='NO';        
    }

    if (ls_flg_modif=='SI') {
        swal({
            title: "",
            text: "Ya está cerrada la modificación de árbol vendedor.",
            type: "error",
            confirmButtonText: "Aceptar",
          });
        return;        
    }

    if (ls_flg_estado=='CE') {
        swal({
            title: "",
            text: "El período seleccionado está cerrado.",
            type: "error",
            confirmButtonText: "Aceptar",
          });
        return;        
    }

    var li_emi = $("#tieneCttoEmi").val();
    var li_act = $("#tieneCttoAct").val();

    if (li_emi ==  'SI') {
        swal({
            title: "",
            text: "No puede eliminar el registro, el consejero tiene contratos emitidos en el período ["+li_anno+"-"+ls_tipo+"-"+ls_periodo+"].",
            type: "error",
            confirmButtonText: "Aceptar",
          });
        return; 
    }

    if (li_act == 'SI') {
        swal({
            title: "",
            text: "No puede eliminar el registro, el consejero tiene contratos activados en el período ["+li_anno+"-"+ls_tipo+"-"+ls_periodo+"].",
            type: "error",
            confirmButtonText: "Aceptar",
          });
        return;
    }

    // -- Confirmacion -- //

    swal({
        title: "",
        text: "¿Esta seguro que desea eliminar el registro seleccionado? Esta operación es irreversible",
        type: "question",
        showCancelButton:!0,
        confirmButtonText: "Anular",
        cancelButtonText:"Cancelar"
    }).then(function(){
        setTimeout(function () { 

            // -- Eliminar -- //

            $.ajax({
                url:"ajax/ArbolVendedores.ajax.php",
                method: "POST",
                dataType: 'json',
                data: {'codTrabajador':ls_codigo, 'anno' : li_anno, 'tipo_periodo' : ls_tipo, 'periodo' : ls_periodo, 'accion':'eliminar'},
                success: function(respuesta){
                    if(respuesta == true){
                        swal({
                            title: "",
                            text: "Se elimino el registro satisfactoriamente.",
                            type: "success",
                            confirmButtonText: "Aceptar",
                            onBeforeOpen: window.location.assign('arbol-vendedores')
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
}//eliminaArbol