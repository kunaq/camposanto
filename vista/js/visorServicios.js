$(document).ready( function () {
    $('#calendar').fullCalendar({
    	header:{
    		left:'title',
    		center: '',
    		right: 'prev,next today agendaWeek month'
    	},
    	events:{
    		url: 'extensiones/calendario/listaservicios.php',
    		cache: true
    	},
    	 eventClick: function(calEvent, jsEvent, view) {
            //console.log(calEvent);
		    $('#titulo2ModalInicio').html(calEvent.titulo2);
		    $('#eventoDescripcion').html(calEvent.description);
		    $('#m_modal_inicio').modal('show');

		  }
    });
} );

function eventos(){
	$.ajax({
        dataType:"json",
        url: 'extensiones/captcha/listaservicios.php',
        success : function(respuesta){
            //console.log(respuesta);
        	return respuesta;
        }
    });
}