function mostrarModalServicio(){
	$('#m_modal_visor_servicio').modal('show');
}
$("#fechVPS").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true,
  orientation:"bottom"
});//datepicker

function mostrarSidebar(autorizacion,usoServicio){
	var localidad = $("#localidadVPS").val();
	$.ajax({
        method:'POST',
        url: 'ajax/VPS.ajax.php',
        dataType: 'json',
        data: {'autorizacion' : autorizacion, 'num_servicio' : usoServicio, 'localidad' : localidad, 'entrada':'buscaDetBenef'},
        success : function(respuesta){
        	console.log(respuesta);
        	var combo = document.getElementById("localidadVPS");
			var selected = combo.options[combo.selectedIndex].text;
			$("#dsc_autorizacionVPS").val(respuesta[0]['dsc_tipo_autorizacion']);
			$("#localidadCttoVPS").val(selected);
			$("#localidadBenefVPS").val(selected);
			$("#numUsoServicioVPS").val(respuesta[0]['num_uso_servicio']);
			document.getElementById("numCttSideBarVPS").innerText = respuesta[0]['cod_contrato'];
			document.getElementById("codSerSideBarVPS").innerText = (respuesta[0]['num_servicio']);
			$("#platafrmaVPS").val(respuesta[0]['cod_plataforma_esp']);
			$("#numCttoSideVPS").val(respuesta[0]['cod_contrato']);
			$("#numServSideVPS").val(respuesta[0]['num_servicio']);
			$("#VPS").val(respuesta[0]['cod_area_esp']);
			$("#VPS").val(respuesta[0]['cod_eje_horizontal_esp']);
			$("#VPS").val(respuesta[0]['cod_eje_vertical_esp']);
			$("#VPS").val(respuesta[0]['cod_espacio']);
			$("#VPS").val(respuesta[0]['dsc_servicio']);
			$("#tipoNecVPS").val(respuesta[0]['cod_tipo_necesidad']);
			$("#VPS").val(respuesta[0]['dsc_nombres']);
			$("#VPS").val(respuesta[0]['fch_deceso']);
			$("#VPS").val(respuesta[0]['fch_servicio']);
			$("#VPS").val(respuesta[0]['dsc_sacerdote']);
			$("#VPS").val(respuesta[0]['dsc_titular']);
        }//success
    });//ajax
    hideSidebar();
    $("#m_quick_sidebar-contrato").addClass("m-quick-sidebar-contrato--on");
}

function hideSidebar(){
    $("#m_quick_sidebar-contrato").removeClass("m-quick-sidebar-contrato--on");
}

$("#fechVPS").on("change", function(){
	$("li").remove('.itemLista');
	var fecha = $(this).val();
	var localidad = $("#localidadVPS").val();
	$.ajax({
        method:'POST',
        url: 'ajax/VPS.ajax.php',
        dataType: 'json',
        data: {'fecha' : fecha, 'localidad' : localidad, 'entrada':'buscaBenef'},
        success : function(respuesta){
        	// console.log(respuesta);
        	var classPeriodo = '';
            $.each(respuesta,function(index,value){
                if(index == 0){
                    classPeriodo = 'liListaKqPstImpar';
                }else if(index%2 == 0){
                    classPeriodo = 'liListaKqPstImpar';
                }else{
                    classPeriodo = 'liListaKqPstPar';
                }
                hora = value['fch_servicio'].split(' ')[1];
                edo = value['dsc_autorizacion'].slice(0,3);
                tipo_aut = "'"+value['cod_tipo_autorizacion']+"'";
                num_sev = "'"+value['num_uso_servicio']+"'";
                $("#listaBenefVSP").append(
                    '<li class="nav-item '+classPeriodo+' itemLista ">'+
                        '<a href="#" style="color:black" class="btnVerDetBenef" onclick="mostrarSidebar('+tipo_aut+','+num_sev+');">'+
                        	'<div class="row">'+
								'<div class="col-md-2">'+hora+'</div>'+
								'<div class="col-md-2">'+value['dsc_prefijo']+'</div>'+
								'<div class="col-md-2">'+edo+'</div>'+
								'<div class="col-md-6">'+value['dsc_nombres']+'</div>'+
							'</div>'+
                        '</a>'+
                    '</li>'
                );//append
            });//each
        }//success
    });//ajax
});