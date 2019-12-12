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
            console.log(calEvent['color']);
		    $('#exampleModalLabel').html(calEvent.titulo2);
		    $('#eventoDescripcion').html(calEvent.description);
            document.getElementById("headerModalVerSerInicio").style.background = calEvent['color'];
		    $('#m_modal_2').modal('show');

		  },
          columnFormat: {
            month: "ddd",
            week: "ddd d/M",
            day: "dddd d/M"
        },
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

function toggleLeyendaIni(e){
    var elem = document.getElementById("leyendaIni"),
    style = window.getComputedStyle(elem),
    right = style.getPropertyValue("right");

    if(right == "0px"){
        elem.style.right = "-240px";
    }
    else{
        elem.style.right = "0px";
    }
}
