$('#desdeEjeX').keypress(function (e) {
    var tecla = document.all ? tecla = e.keyCode : tecla = e.which;
    return !((tecla > 47 && tecla < 58) || tecla == 46);
});
$('#hastaEjeX').keypress(function (e) {
    var tecla = document.all ? tecla = e.keyCode : tecla = e.which;
    return !((tecla > 47 && tecla < 58) || tecla == 46);
});
$("#desdeEjeY").number(true);
$("#hastaEjeY").number(true);
$("#desdeEspacio").number(true);
$("#hastaEspacio").number(true);

$(".mayuscula").keyup(function() {
    this.value = this.value.toLocaleUpperCase();
});

function buscaPlataforma(valor){
    $.ajax({
        type: 'GET',
        url: 'extensiones/captcha/buscaPlataforma.php',
        dataType: 'text',
        data: { 'value' : valor },
        success : function(respuesta){
            $("#plataformaCreaEsp").html(respuesta);
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
            $("#areaCreaEsp").html(respuesta);
        }
    });
}

$("#ejexCheck").on('change', function(){
    var checkbox = document.getElementById('ejexCheck');
    if (checkbox.checked != true){
        $('#desdeEjeX').prop('disabled',true);
        $('#desdeEjeX').val('');
        $('#hastaEjeX').prop('disabled',true);
        $('#hastaEjeX').val('');
    }
    else{
        $('#desdeEjeX').prop('disabled',false);
        $('#hastaEjeX').prop('disabled',false);
    }
});

$("#ejeyCheck").on('change', function(){
    var checkbox = document.getElementById('ejeyCheck');
    if (checkbox.checked != true){
        $('#desdeEjeY').prop('disabled',true);
        $('#desdeEjeY').val('');
        $('#hastaEjeY').prop('disabled',true);
        $('#hastaEjeY').val('');
    }
    else{
        $('#desdeEjeY').prop('disabled',false);
        $('#hastaEjeY').prop('disabled',false);
    }
});

$("#espacioCheck").on('change', function(){
    var checkbox = document.getElementById('espacioCheck');
    if (checkbox.checked != true){
        $('#desdeEspacio').prop('disabled',true);
        $('#desdeEspacio').val('');
        $('#hastaEspacio').prop('disabled',true);
        $('#hastaEspacio').val('');
    }
    else{
        $('#desdeEspacio').prop('disabled',false);
        $('#hastaEspacio').prop('disabled',false);
    }
});