function mostrarModalServicio(){
	$('#m_modal_visor_servicio').modal('show');
}
$("#fechVPS").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true,
  orientation:"bottom"
});//datepicker

function mostrarSidebar(){
    hideSidebar();
    $("#m_quick_sidebar-contrato").addClass("m-quick-sidebar-contrato--on");
}

function hideSidebar(){
    $("#m_quick_sidebar-contrato").removeClass("m-quick-sidebar-contrato--on");
}

$("#fechVPS").on("change", function(){
	var fecha = $(this).val();
	var localidad = $("#localidadVPS").val();
	$.ajax({
        method:'POST',
        url: 'ajax/VPS.ajax.php',
        dataType: 'json',
        data: {'fecha' : fecha, 'localidad' : localidad, 'entrada':'buscaBenef'},
        success : function(respuesta){
        	console.log(respuesta);
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
                $("#listaBenefVSP").append(
                    '<li class="nav-item '+classPeriodo+' itemLista ">'+
                        '<a href="#" class="btnVerTrabArbVen" onclick="mostrarSidebar();">'+
                        	'<div class="row">'+
								'<div class="col-md-2">'+hora+'</div>'+
								'<div class="col-md-2">'+value['dsc_prefijo']+'</div>'+
								'<div class="col-md-2">'+value['dsc_autorizacion']+'</div>'+
								'<div class="col-md-6">'+value['dsc_nombres']+'</div>'+
							'</div>'+
                        '</a>'+
                    '</li>'
                );//append
            });//each
        }//success
    });//ajax
});