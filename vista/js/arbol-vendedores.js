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
	                    '<li class="nav-item '+classPeriodo+' itemLista act_'+value["flg_activo"]+'">'+
	                        '<a href="#" class="btnVerTrabArbVen" codTrabajador="'+value['cod_trabajador']+'">'+
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

//$("#SelAct").change(
// function selec1()
// 	{
// 		alert("entre a la funcion");
// 		$( "li" ).each(function() {
// 			alert("entre al each");
// 			if ($("#SelAct").val()=="1") 
// 			{
// 				alert("entre al if valor 1");
// 				$("li .act_SI").show();
// 				$("li .act_NO").hidden();
// 				return;
				
// 			} else if ($("#SelAct").val()=="2") 
// 			{
// 				alert("entre al if valor 2");
// 				$("li .act_SI").hidden();
// 				$("li .act_NO").show();
// 				return;
				
// 			} else 
// 				{
// 					alert("entre al if valor 0");
// 					$("li .act_SI").show();
// 					$("li .act_NO").show();
// 					return;
// 				} 
// 		});

// 	}
	//);
	$( "select" ).change(function () 
	{
		if ($("#SelAct").val()=="2") 
		{
			alert("valor 2");
			$( "li .act_SI" ).each(function() 
			{
				$("div").hidden();
			
			});
			$( "li .act_NO" ).each(function() 
			{
				$("div").show();
				
			});
		}
		
		
	    $( "div" ).text( str );
	})
	//.change();
	



$("#listaTrabArbVen").on("click","a.btnVerTrabArbVen",function(){
	$(".ulListaVerTrabArbVen li").removeClass('liListaKqPstActive');
	$(this).parent('li').addClass('liListaKqPstActive');
	var codTrabajador = $(this).attr("codTrabajador");
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
                        '<a href="#" class="btnVerHistConf" codTrabajador="'+codTrabajador+'" numAnio="'+value['num_anno']+'" tipoperiodo="'+value['cod_tipo_periodo']+'" periodo="'+value['cod_periodo']+'" jefeventas="'+value['cod_jefeventas']+'" codgrupo="'+value['cod_grupo']+'" dscgrupo="'+value['dsc_grupo']+'" codcomisionista="'+value['cod_tipo_comisionista']+'" dsccomisionista="'+value['dsc_tipo_comisionista']+'" codsup="'+value['cod_supervisor']+'">'+
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
	var supervisor = $(this).attr("codsup");
	$("#codSupVenArbVen").val(supervisor);
	var jefeVentas = $(this).attr("jefeventas");
	$("#codJefeVenArbVen").val(jefeVentas);
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
        	console.log(respuesta);
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

$("#NvoConfArbVen").on("click",function(){
    $('#m_modal_nvoConfigArbVen').modal('show');
});

