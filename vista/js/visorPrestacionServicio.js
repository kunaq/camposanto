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