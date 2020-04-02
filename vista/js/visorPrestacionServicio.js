function mostrarModalServicio(){
	$('#m_modal_visor_servicio').modal('show');
}
$("#fechVPS").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true,
  orientation:"bottom"
});//datepicker

function mostrarSidebar(numContrato,codServicio){
    hideSidebar();
    $("#m_quick_sidebar-contrato").addClass("m-quick-sidebar-contrato--on");
}

function hideSidebar(){
    $("#m_quick_sidebar-contrato").removeClass("m-quick-sidebar-contrato--on");
}

$("#fechVPS").on("change", function(){
	var fecha = $(this).val();
	console.log(fecha);
	// $.ajax({
 //        method:'POST',
 //        url: 'ajax/VPS.ajax.php',
 //        dataType: 'json',
 //        data: {'entrada':'verTrabajadores'},
 //        success : function(respuesta){
 //        	// console.log(respuesta);
 //        	var classPeriodo = '';
 //        	var color = '';
 //            $.each(respuesta,function(index,value){
 //                if(index == 0){
 //                    classPeriodo = 'liListaKqPstImpar';
 //                }else if(index%2 == 0){
 //                    classPeriodo = 'liListaKqPstImpar';
 //                }else{
 //                    classPeriodo = 'liListaKqPstPar';
 //                }
 //                if(value['flg_activo'] == 'SI'){
 //                	color = 'black';
 //                }else{
 //                	color = 'red';
 //                }
 //                $("#listaTrabArbVen").append(
 //                    '<li class="nav-item '+classPeriodo+' itemLista act_'+value['flg_activo']+'">'+
 //                        '<a href="#" class="btnVerTrabArbVen" codTrabajador="'+value['cod_trabajador']+'" flg_activo="'+value['flg_activo']+'">'+
 //                        	'<div class="row" style = "color:'+color+'">'+
	// 							'<div class="col-md-4">'+value['cod_trabajador']+'</div>'+
	// 							'<div class="col-md-8">'+value['dsc_apellido_paterno']+' '+value['dsc_apellido_materno']+', '+value['dsc_nombres']+'</div>'+
	// 						'</div>'+
 //                        '</a>'+
 //                    '</li>'
 //                );//append
 //            });//each
 //        }//success
 //    });//ajax
});