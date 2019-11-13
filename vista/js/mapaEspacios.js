function buscaPlataforma(valor){
    $.ajax({
        type: 'GET',
        url: 'extensiones/captcha/buscaPlataforma.php',
        dataType: 'text',
        data: { 'value' : valor },
        success : function(respuesta){
            $("#plataforma").html(respuesta);
        }
    });
}

function buscaArea(valor){
    $.ajax({
        type: 'GET',
        url: 'extensiones/captcha/buscaArea.php',
        dataType: 'text',
        data: { 'value' : valor },
        success : function(respuesta){
            $("#area").html(respuesta);
        }
    });
}

function creaMapa(valor){
    var plat = document.getElementById("plataforma").value;
    var campo = document.getElementById("camposanto").value;

    $('#mapaEpacio').html('<div class="loader"></div>');
    $.ajax({
        type: 'GET',
        url: 'extensiones/captcha/creaMapaEjes.php',
        dataType: 'text',
        data: { 'value' : valor, 'plat' : plat, 'campo' : campo },
        success : function(respuesta){
                $('#mapaEpacio').html('')
                $("#mapaEpacio").html(respuesta);
            }
    });

}

function mostrarDetallesEspacio(){
	$('#m_modal_detalle_espacio').modal('show');
}