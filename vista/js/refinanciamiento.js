function cuoDefinidas(){
    var checkbox = document.getElementById('cuoDefCheck');
  if (checkbox.checked != true){
    $('#cuoInicial').prop('disabled',true);
    $('#cuoInicial').val('');
    $('#cuoFinal').prop('disabled',true);
    $('#cuoFinal').val('');
    $('#valCuota').prop('disabled',true);
    $('#valCuota').val('');
    $('#btnGenCuoDef').prop('disabled',true);
    $('#btnGenCuoDef').val('');
    }
    else{
        $('#cuoInicial').prop('disabled',false);
        $('#cuoFinal').prop('disabled',false);
        $('#valCuota').prop('disabled',false);
        $('#btnGenCuoDef').prop('disabled',false);
    }
}