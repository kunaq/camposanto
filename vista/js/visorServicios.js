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

		    $('#exampleModalLabel').html(calEvent.titulo2);
		    $('#eventoDescripcion').html(calEvent.description);
		    $('#m_modal_2').modal('show');

		  }
    });
} );

function eventos(){
	$.ajax({
        url: 'extensiones/captcha/listaservicios.php',
        success : function(respuesta){
        	return respuesta;
        }
    });
}