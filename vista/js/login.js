function mostrarPassword(){
  var cambio = document.getElementById("password");
  if(cambio.type == "password"){
    cambio.type = "text";
    $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
  }else{
    cambio.type = "password";
    $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
  }
} 
$("#ingEmpresa").change(function(){
  var nombreBD =  $(this).val().split('||');
  $("#dscEmpresaKqPst").val($("#ingEmpresa option:selected").text());
  $("#rYCvKq").val(nombreBD[1]);
});//change ingEmpresa
  
$(document).ready(function () {
  //CheckBox mostrar contraseña
  $('#ShowPassword').click(function () {
    $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
  });
});

$(".btnIngresar2").click(function(){
  var empresa = document.getElementById("empresa").value;
  var captcha = document.getElementById("txtcaptcha").value;
  var usuario = document.getElementById("user").value;
  var pass = document.getElementById("password").value;
  var bien = document.getElementById("bien").value;
  if(empresa == '' || empresa == 0 || empresa == null || captcha == '' || captcha == null){
    swal({
      title:"Error",
      text: "Debe completar todos los campos.",
      type: "error",
      confirmButtonText: "Aceptar",
      onBeforeOpen:document.getElementById("empresa").focus()
  })
  return;
  }
  else if(bien == 0){
      swal({
        title:"Error",
        text: "El código captcha es incorrecto.",
        type: "error",
        confirmButtonText: "Aceptar",
        onBeforeOpen:document.getElementById("txtcaptcha").value ='',
        onBeforeOpen:document.getElementById("txtcaptcha").focus()

    })
  }
  else{
   $.ajax({
        type: 'GET',
        url: 'extensiones/captcha/login.php',
        dataType: 'text',
        data: $("#formIngresarSistema").serialize(),
        success : function(respuesta){
          console.log(respuesta);
           if(respuesta == 'true'){
                swal({
                    type: "success",
                    title: "Bienvenido",
                    showConfirmButton: !1,
                    timer: 3000
                })
                window.setTimeout(4000);
                window.location = "inicio";
                iniciaSesion(usuario);
            }
            else{                
                swal({
                    title: "Error",
                    text: "Usuario o contraseña invalidos.",
                    type: "error",
                    confirmButtonText: "Aceptar",
                    onBeforeOpen:document.getElementById("user").focus()
                })
                return;
            }
        }
    });
  }
});

function verificacaptcha(res,code){
  if(code == res){
      $("#vercaptcha").prop('style', 'color:#34bfa3;padding-left:0;');
    $("#txtcaptcha").prop('style', 'border-color:#34bfa3');
      $('#malCaptcha').prop('hidden',true);
      $('#bienCaptcha').prop('hidden',false);
      $("#bien").val(1);
  }
  else{                
      $("#vercaptcha").prop('style', 'color:#f4516c;padding-left:0;');
      $("#txtcaptcha").prop('style', 'border-color:#f4516c'); 
      $('#bienCaptcha').prop('hidden',true);
      $('#malCaptcha').prop('hidden',false);
      $("#bien").val(0);
  }
}

function cierraSesion(){
   $.ajax({
      url: "extensiones/captcha/logout.php",
      type: "POST",
      success:function(resp){
          window.location = "login";
      }

  }); 
}
