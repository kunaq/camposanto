
function mayus(e) {
    e.value = e.value.toUpperCase();
}

function pasaAnumero(string){
  if(string == parseFloat(string)){
       valor = parseFloat(string);
  }
   else if(string.indexOf(',') != -1){
    var mil = string.split(',')[0];
    var cien = string.split(',')[1];
    var decenas = cien.split('.')[0];
    var decimal = cien.split('.')[1];
    valor = (parseInt(mil)*1000)+(parseInt(decenas))+(parseFloat(decimal)*0.01);
  }
  else if(string.indexOf('.') != -1){
    var decenas = string.split('.')[0];
    var decimal = string.split('.')[1];
    valor = (parseInt(decenas))+(parseFloat(decimal)*0.01);
  }
  else{
    valor = parseFloat(string);
  }
  return valor;
}


$("#importe").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
            return value.replace(/\D/g, "")
                        .replace(/([0-9])([0-9]{2})$/, '$1,$2')
                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ".");
        });
    }
});

$('#divRazonSocial').hide();


$("#estado").change(function(){
	if (this.value == "VTA") {
		$("#cttoRegPro").attr('hidden',false);
	}
	else if(this.value == "CAD"){
		$("#cttoRegPro").attr('hidden',true);
		swal({
            type: "warning",
            title: "El estado 'CADUCO' es automático, NO puede ser seleccionado manualmente. ",
            showConfirmButton: true,
        	confirmButtonText: "Cerrar"
        });//swal
	}
	else{
		$("#cttoRegPro").attr('hidden',true);
	}
});

function verificarRegistro(){
  var codPro = document.getElementById("codProspecto").value;
  if (codPro == "") {
    document.getElementById('importe').value = "0,00";
    document.getElementById('numDias').value = 0;
    $('#btnEditar').hide();
  }else{
    obtenerDatosProspecto();
    tablaContactos();
    $('#btnNuevo').hide();
  }
}

function obtenerDatosProspecto(){
  var codPro = document.getElementById("codProspecto").value;
  
  $.ajax({
        type:'POST',
        url: 'extensiones/captcha/ObtieneDatosProspecto.php',
        dataType: 'text',
        data: {'codPro':codPro},
        success : function(response){
            var info = JSON.parse(response);
            buscaDepartamento(info.pais);
            buscaProvincia(info.departamento);
            buscaDistrito(info.provincia);
            document.getElementById('importe').value = info.importe;
            document.getElementById('tipoDocRegPro').value = info.tipoDoc;
            DocLenghtProspecto(info.tipoDoc);
            document.getElementById('numDocRegPro').value = info.numDoc;
            document.getElementById('apePaterno').value = info.apePaterno;
            document.getElementById('apeMaterno').value = info.apeMaterno;
            document.getElementById('nombre').value = info.nombre;
            document.getElementById('direccion').value = info.direccion;
            document.getElementById('pais').value = info.pais;
            document.getElementById('canalVenta').value = info.canalVenta;
            $('#canalVenta').change();
            document.getElementById('telefono1').value = info.telefono1;
            document.getElementById('telefono2').value = info.telefono2;
            document.getElementById('fechaReg').value = info.fechReg;
            document.getElementById('usuario').value = info.usuario;
            document.getElementById('codVendedor').value = info.codVendedor;
            $('#codVendedor').change();
            document.getElementById('codGrupo').value = info.codGrupo;
            $('#codGrupo').change();
            document.getElementById('codSupervisor').value = info.codSuper;
            $('#codSupervisor').change();
            document.getElementById('codJefeVentas').value = info.codjefe;
            $('#codJefeVentas').change();
            document.getElementById('numDias').value = info.numDias;
            document.getElementById('calificacion').value = info.calificacion;
            $('#calificacion').change();
            document.getElementById('observacion').value = info.observacion;
            document.getElementById('estado').value = info.estado;
            if (info.estado == 'VTA') {
              $('#estado').change();
              document.getElementById('localidadRegPro').value = info.localidad;
              document.getElementById('codCttRegPro').value = info.contrato;
              document.getElementById('numServRegPro').value = info.servicio;
              document.getElementById('tipoCttRegPro').value = info.tipoCtt;
            }
            if (info.juridico == "SI") {
              $('#juridico').prop("checked", true);
            }
            setTimeout(function(){ document.getElementById('departamento').value = info.departamento; }, 3000);
            setTimeout(function(){ document.getElementById('provincia').value = info.provincia; }, 4000);
            setTimeout(function(){ document.getElementById('distrito').value = info.distrito; }, 5000);
         }
    });
}

function buscaDepartamento(valor){
    $.ajax({
        type: 'GET',
        url: 'extensiones/captcha/buscaDepartamento.php',
        dataType: 'text',
        data: { 'value' : valor },
        success : function(respuesta){
            $("#departamento").html(respuesta);
        }
    });
}

function buscaProvincia(valor){
    $.ajax({
        type: 'GET',
        url: 'extensiones/captcha/buscaProvincia.php',
        dataType: 'text',
        data: { 'value' : valor },
        success : function(respuesta){
            $("#provincia").html(respuesta);
        }
    });
}

function buscaDistrito(valor){
    $.ajax({
        type: 'GET',
        url: 'extensiones/captcha/buscaDistrito.php',
        dataType: 'text',
        data: { 'value' : valor },
        success : function(respuesta){
            $("#distrito").html(respuesta);
        }
    });
}

function esJuridica(){
  var juridicocheck = document.getElementById('juridico');
  if (juridicocheck.checked != true){
    document.getElementById('tipoDocRegPro').value = "vacio";
    $('#tipoDocRegPro').prop('disabled', false);
    $('#divRazonSocial').hide();
    $('#divNombre').show();
    $('#apePaterno').prop('disabled', false);
    $('#apePaterno').val('');
    $('#apeMaterno').prop('disabled', false);
    $('#apeMaterno').val('');
    $('#nombre').prop('disabled', false);
    $('#nombre').val('');
  }else{
    $('#tipoDocRegPro').prop('disabled', true);
    $('#apePaterno').val('');
    $('#apeMaterno').val('');
    $('#divNombre').hide();
    $('#divRazonSocial').show();
    $('#razonSocial').prop('disabled', false);
    $('#razonSocial').val('');
    $('#apePaterno').prop('disabled', true);
    $('#apeMaterno').prop('disabled', true);
    $('#nombre').prop('disabled', true);
    document.getElementById('tipoDocRegPro').value = "DI004";
    $('#tipoDocRegPro').change();
  }
}

// -------------------- Funcion para ingresar solo numeros  -------------------- //
function justNumbers(e){
  var keynum = window.event ? window.event.keyCode : e.which;
  if ((keynum == 8) || (keynum == 46))
  return true;
  return /\d/.test(String.fromCharCode(keynum));
}

function buscarVendedor(cod){
  if (cod == "") {
    document.getElementById('dscVendedor').value = "";
  }else{
    $.ajax({
        type: 'POST',
        url: 'extensiones/captcha/buscarNombreTrabajador.php',
        dataType: 'text',
        data: { 'cod' : cod },
        success : function(respuesta){
            document.getElementById('dscVendedor').value = respuesta;
        }
    });
  }
}

function buscarGrupo(cod){
  $.ajax({
        type: 'POST',
        url: 'extensiones/captcha/buscarNombreGrupo.php',
        dataType: 'text',
        data: { 'cod' : cod },
        success : function(respuesta){
            document.getElementById('dscGrupo').value = respuesta;
        }
    });
}

function buscarSupervisor(cod){
  $.ajax({
        type: 'POST',
        url: 'extensiones/captcha/buscarNombreTrabajador.php',
        dataType: 'text',
        data: { 'cod' : cod },
        success : function(respuesta){
            document.getElementById('dscSupervisor').value = respuesta;
        }
    });
}

function buscarJefeVentas(cod){
  $.ajax({
        type: 'POST',
        url: 'extensiones/captcha/buscarNombreTrabajador.php',
        dataType: 'text',
        data: { 'cod' : cod },
        success : function(respuesta){
            document.getElementById('dscJefeVentas').value = respuesta;
        }
    });
}

function DocLenghtProspecto(tipo){
    if (tipo == "DI001") {
      $('#numDocRegPro').val('');
      document.getElementById("numDocRegPro").setAttribute('maxlength',8);
      document.getElementById("numDocRegPro").setAttribute('onkeypress',"return justNumbers(event);");
    }else if(tipo == "DI002"){
      $('#numDocRegPro').val('');
      document.getElementById("numDocRegPro").setAttribute('maxlength',12);
      $("#numDocRegPro").removeAttr("onkeypress");
    }else if(tipo == "DI003"){
      $('#numDocRegPro').val('');
      document.getElementById("numDocRegPro").setAttribute('maxlength',12);
      $("#numDocRegPro").removeAttr("onkeypress");
    }else if(tipo == "DI004"){
      $('#numDocRegPro').val('');
      document.getElementById("numDocRegPro").setAttribute('maxlength',11)
      document.getElementById("numDocRegPro").setAttribute('onkeypress',"return justNumbers(event);");
    }else if(tipo == "DI005"){
      $('#numDocRegPro').val('');
      $("#numDocRegPro").removeAttr("maxlength");
      $("#numDocRegPro").removeAttr("onkeypress");
    }
}

function creaTablaVendedor(){
    if ($('#myTableVendedor').length) {
        $('#myTableVendedor').DataTable();
    }
    else{
        $('#tablaVendedor').html('<div class="loader"></div>');
        var tipo = 'registro';
        $.ajax({
            url: 'extensiones/captcha/creaTablaVendedor.php',
            dataType: 'text',
            data: { 'tipo' : tipo },
            success : function(respuesta){
                $('#tablaVendedor').html('')
                $("#tablaVendedor").html(respuesta);
                $('#myTableVendedor').DataTable();
            }
        });
    }
}

function cambiaCodigo(cod){
    $.ajax({
        type:'POST',
        url: 'extensiones/captcha/buscaHistoricoActual.php',
        dataType: 'text',
        data: {'cod':cod},
        success : function(response){
          console.log(response);
            var info = JSON.parse(response);
            
            if (info.code == '0') {
              swal({
                  type: "warning",
                  title: info.msg,
                  showConfirmButton: true,
                confirmButtonText: "Cerrar"
              })
            }

            if (info.code == '1') {
              document.getElementById('codVendedor').value = cod;
              $('#codVendedor').change();
              document.getElementById('codGrupo').value = info.codGrupo;
              $('#codGrupo').change();
              document.getElementById('codSupervisor').value = info.codSupervisor;
              $('#codSupervisor').change();
              document.getElementById('codJefeVentas').value = info.codJefeVentas;
              $('#codJefeVentas').change();
            }

         }
    });
}

function tablaContactos(){
  var codPro = document.getElementById("codProspecto").value;
  $.ajax({
        type:'POST',
        url: 'extensiones/funciones/creaTablaContactosProspecto.php',
        dataType: 'text',
        data: {'cod':codPro},
        success : function(response){
          $("#tabBodyRegPro").html(response);
            // var info = JSON.parse(response);
            // $("#tabRegConRegPro").DataTable({
            //   "searching": false,
            //   "info": false,
            //   "paging":   false,
            //   "ordering": false,
            //  });
         }
    });
}

function agregarFilaContacto(){
  var vendedor = document.getElementById('codVendedor').value;
  if (vendedor == "") {
    swal({
      title: "Advertencia",
      text: "Debe ingresar los datos del vendedor en el registro del Prospecto.",
      type: "warning",
      confirmButtonText: "Aceptar",
    })
  }else{
    //gets table
    var oTable = document.getElementById('tabBodyRegPro');
    var vendedor = document.getElementById("codVendedor").value;

    //gets rows of table
    var rowLength = oTable.rows.length;
    if (rowLength == 0) {

        var filaNueva = 1;

        $.ajax({
              type:'POST',
              url: 'extensiones/funciones/creaFilaContacto.php',
              dataType: 'text',
              data: {'fila':filaNueva, 'vendedor':vendedor},
              success : function(response){
                document.getElementById("tabBodyRegPro").insertAdjacentHTML("beforeEnd" ,response);
               }
          });
    }else{
      for (i = 0; i < rowLength; i++){
         //gets cells of current row
         var oCells = oTable.rows.item(i).cells;

         //gets amount of cells of current row
         var cellLength = oCells.length;

         //loops through each cell in current row
         for(var j = 0; j < cellLength; j++){
            /* get your cell info here */
             var cellVal = oCells.item(0).innerHTML;
         }
      }
      //loops through rows    
      var cellValL = cellVal.trim();
      var filaNueva = parseInt(cellValL) + parseInt(1);

      $.ajax({
        type:'POST',
        url: 'extensiones/funciones/creaFilaContacto.php',
        dataType: 'text',
        data: {'fila':filaNueva, 'vendedor':vendedor},
        success : function(response){
        document.getElementById("tabBodyRegPro").insertAdjacentHTML("beforeEnd" ,response);
        }
      });
    }
  }
}

function verDetalles(evt) {
  var target = evt.srcElement ? evt.srcElement : evt.target;
  var id = target.className;
  boton = document.getElementById("btnEliminarFila");
  boton.addEventListener("click", function(){eliminaFila(id)}, false);
}

function eliminaFila(id){
  swal({
        title: "¿Está seguro de eliminar la fila "+id+"?",
        type: "question",
        showCancelButton: !0,
        confirmButtonText: "Si, eliminar",
        cancelButtonText: "No, cancelar"
    }).then(function(e) {
        e.value ? swal({
          title:"Eliminado", 
          text:"Se ha eliminado la fila.",
          type: "success",
          onBeforeOpen: borrarFila(id)         
        }) : "cancel" === e.dismiss
    })
}

function borrarFila(id){
  document.getElementById(id).remove();
}

function verificarDocumento(numDoc){
  var tipoDoc = document.getElementById('tipoDocRegPro').value;
  $.ajax({
    type:'POST',
    url: 'extensiones/funciones/verificarProspectoExistente.php',
    dataType: 'text',
    data: {'tipoDoc':tipoDoc, 'numDoc':numDoc},
    success : function(response){
      var info = JSON.parse(response);
      if (info.cod == 1) {
        swal({
          title: "Advertencia",
          text: 'El tipo y número de documento ya se encuentra vinculado a un prospecto en estado "'+info.estado+'". Por favor verifique.',
          type: "warning",
          confirmButtonText: "Aceptar",
        });
        document.getElementById('numDocRegPro').value = "";
      }else{
        return true;
      }
    }
  });
}

function registrarProspecto(){
  //Datos vtaca_prospecto_venta
  var importe = document.getElementById("importe").value;
  var tipoDoc = document.getElementById("tipoDocRegPro").value;
  var numDoc = document.getElementById("numDocRegPro").value;
  var juridico = document.getElementById('juridico');
  if (juridico.checked != true){
    var jur = "NO";
  }else{
    var jur = "SI";
  }
  var apePaterno = document.getElementById("apePaterno").value;
  var apeMaterno = document.getElementById("apeMaterno").value;
  var nombre = document.getElementById("nombre").value;
  var razonSocial = document.getElementById("razonSocial").value;
  var direccion = document.getElementById("direccion").value;
  var pais = document.getElementById("pais").value;
  var departamento = document.getElementById("departamento").value;
  var provincia = document.getElementById("provincia").value;
  var distrito = document.getElementById("distrito").value;
  var telefono1 = document.getElementById("telefono1").value;
  var telefono2 = document.getElementById("telefono2").value;
  var fchRegistro = document.getElementById("fechaReg").value;
  var usuario = document.getElementById("usuario").value;
  var origen = document.getElementById("canalVenta").value;
  var calificacion = document.getElementById("calificacion").value;
  var vendedor = document.getElementById("codVendedor").value;
  var grupo = document.getElementById("codGrupo").value;
  var supervisor = document.getElementById("codSupervisor").value;
  var jefeVentas = document.getElementById("codJefeVentas").value;
  var observacionP = document.getElementById("observacion").value;
  var estado = document.getElementById("estado").value;
  var localidad = document.getElementById("localidadRegPro").value;
  var contrato = document.getElementById("codCttRegPro").value;
  var servicio = document.getElementById("numServRegPro").value;
  var tipoCtt = document.getElementById("tipoCttRegPro").value;
  var usuarioC = document.getElementById("usuarioC").value;


//-------------------------- Datos vtade_prospecto_venta-----------------------------//

  var oTable = document.getElementById('tabBodyRegPro');
  var vendedor = document.getElementById("codVendedor").value;
  //gets rows of table
  var rowLength = oTable.rows.length;
  if (rowLength == 0) {

    swal({
      title: "Error",
      text: "Debe ingresar un registro de contacto con el Prospecto.",
      type: "warning",
      confirmButtonText: "Aceptar",
    })

  }else {

    if (jur == "NO") {
      if (tipoDoc == "vacio") {
        swal({
          title: "Advertencia",
          text: "Debe seleccionar un tipo de documento.",
          type: "warning",
          confirmButtonText: "Aceptar",
        })
      }else if (tipoDoc == "DI001" && numDoc.length < 8) {
        swal({
          title: "Advertencia",
          text: "Debe ingresar un DNI valido.",
          type: "warning",
          confirmButtonText: "Aceptar",
        })
      }else if (tipoDoc == "DI002" && numDoc.length < 12) {
        swal({
          title: "Advertencia",
          text: "Debe ingresar un Carnet de Extranjeria valido.",
          type: "warning",
          confirmButtonText: "Aceptar",
        })
      }else if (tipoDoc == "DI003" && numDoc.length < 12) {
        swal({
          title: "Advertencia",
          text: "Debe ingresar un Pasaporte valido.",
          type: "warning",
          confirmButtonText: "Aceptar",
        })
      }
      else if (tipoDoc == "DI004" && numDoc.length < 11) {
        swal({
          title: "Advertencia",
          text: "Debe ingresar un RUC valido.",
          type: "warning",
          confirmButtonText: "Aceptar",
        })
      }else if (apePaterno == "") {
        swal({
          title: "Advertencia",
          text: "Debe ingresar el apellido paterno del prospecto.",
          type: "warning",
          confirmButtonText: "Aceptar",
        })
      }else if (apeMaterno == "") {
        swal({
          title: "Advertencia",
          text: "Debe ingresar el apellido materno del prospecto.",
          type: "warning",
          confirmButtonText: "Aceptar",
        })
      }else if (nombre == "") {
        swal({
          title: "Advertencia",
          text: "Debe ingresar el nombre del prospecto.",
          type: "warning",
          confirmButtonText: "Aceptar",
        })
      }else if (direccion == "") {
        swal({
          title: "Advertencia",
          text: "Debe ingresar la dirección del prospecto.",
          type: "warning",
          confirmButtonText: "Aceptar",
        })
      }else if (distrito == "0" || distrito == "") {
        swal({
          title: "Advertencia",
          text: "Debe seleccionar el distrito de la dirección.",
          type: "warning",
          confirmButtonText: "Aceptar",
        })
      }else if (origen == "") {
        swal({
          title: "Advertencia",
          text: "Debe seleccionar el canal de venta.",
          type: "warning",
          confirmButtonText: "Aceptar",
        })
      }else if (calificacion == "") {
        swal({
          title: "Advertencia",
          text: "Debe seleccionar la calificación del prospecto.",
          type: "warning",
          confirmButtonText: "Aceptar",
        })
      }else {
        $.ajax({
        type:'POST',
        url: 'ajax/prospecto.ajax.php',
        dataType: 'text',
        data: {'accion':'guardaProspecto','importe':importe,'tipoDoc':tipoDoc, 'numDoc':numDoc, 'jur':jur,'apePaterno':apePaterno, 'apeMaterno':apeMaterno, 'nombre':nombre,'razonSocial':razonSocial, 'direccion':direccion, 'pais':pais,'departamento':departamento, 'provincia':provincia, 'distrito':distrito,'telefono1':telefono1, 'telefono2':telefono2, 'fchRegistro':fchRegistro,'usuario':usuario, 'origen':origen, 'calificacion':calificacion,'vendedor':vendedor, 'grupo':grupo, 'supervisor':supervisor, 'jefeVentas':jefeVentas, 'observacion':observacionP, 'estado':estado},
        success : function(response){
           var info = JSON.parse(response);
           var j = 0;
           if (info.cod == 1) {
            for (i = 0; i < rowLength; i++){
               //gets cells of current row
              var oCells = oTable.rows.item(i).cells;
               //gets amount of cells of current row
              var cellLength = oCells.length;
              var fila = oCells.item(0).innerHTML.trim();
              var fchCon = oCells.item(1).innerHTML.trim();
              var funcion = document.getElementById("tipo-"+fila).value;
              var cal = document.getElementById("calificacion-"+fila).value;
              var cierre = document.getElementById("cierre-"+fila);
              if (cierre.checked != true){
                var cie = "NO";
              }else{
                var cie = "SI";
              }
              var consejero = document.getElementById("consejero-"+fila).value;
              var indicador = document.getElementById("indicador-"+fila).value;
              var observacion = document.getElementById("observacion-"+fila).value;
              var jsonContacto = "{'codPro':"+info.codProspecto+", 'num_linea':"+fila+", 'fchContacto':"+fchCon+", 'calificacion':"+cal+", 'presentacion':"+cie+", 'consejero':"+consejero+", 'observacion':"+observacion+", 'indicador':"+indicador+", 'usuarioC':"+usuarioC+"}";

              $.ajax({
                type:'POST',
                url: 'ajax/prospecto.ajax.php',
                dataType: 'text',
                data: {'accion':'guardaContacto', 'codPro':info.codProspecto, 'num_linea':fila, 'fchContacto':fchCon, 'calificacion':cal, 'presentacion':cie, 'consejero':consejero, 'observacion':observacion, 'indicador':indicador, 'usuarioC':usuarioC},
                success : function(response){
                var resp = JSON.parse(response);
                  if (resp.cod == 1) {
                    j = j + 1;
                    if (j == rowLength) {
                      swal({
                        type: "success",
                        title: resp.msg,
                        showConfirmButton: true,
                        confirmButtonText: "Aceptar"
                      });
                      document.getElementById('codProspecto').value = info.codProspecto;
                      verificarRegistro();
                    }
                    
                  }else{
                    swal({
                        type: "warning",
                        title: "Ocurrio un error al registrar el Prospecto.",
                        showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                    });
                  }
                 }
              });
            }
           }
         }
       });
      }
    }else if (jur == "SI") {

      if (tipoDoc == "DI004" && numDoc == "") {
        swal({
          title: "Advertencia",
          text: "Debe ingresar el numero de documento.",
          type: "warning",
          confirmButtonText: "Aceptar",
        })
      }else if (tipoDoc == "DI004" && numDoc.length < 11) {
        swal({
          title: "Advertencia",
          text: "El numero del documento ingresado no tiene la cantidad de digitos configurado (11) para el tipo de documento.",
          type: "warning",
          confirmButtonText: "Aceptar",
        })
      }else if (razonSocial == "") {
        swal({
          title: "Advertencia",
          text: "Debe ingresar la razón social del prospecto.",
          type: "warning",
          confirmButtonText: "Aceptar",
        })
      }else if (direccion == "") {
        swal({
          title: "Advertencia",
          text: "Debe ingresar la dirección del prospecto.",
          type: "warning",
          confirmButtonText: "Aceptar",
        })
      }else if (distrito == "0" || distrito == "") {
        swal({
          title: "Advertencia",
          text: "Debe seleccionar el distrito de la dirección.",
          type: "warning",
          confirmButtonText: "Aceptar",
        })
      }else if (origen == "") {
        swal({
          title: "Advertencia",
          text: "Debe seleccionar el canal de venta.",
          type: "warning",
          confirmButtonText: "Aceptar",
        })
      }else if (calificacion == "") {
        swal({
          title: "Advertencia",
          text: "Debe seleccionar la calificación del prospecto.",
          type: "warning",
          confirmButtonText: "Aceptar",
        })
      }else {
        $.ajax({
        type:'POST',
        url: 'ajax/prospecto.ajax.php',
        dataType: 'text',
        data: {'accion':'guardaProspecto','importe':importe,'tipoDoc':tipoDoc, 'numDoc':numDoc, 'jur':jur,'apePaterno':apePaterno, 'apeMaterno':apeMaterno, 'nombre':nombre,'razonSocial':razonSocial, 'direccion':direccion, 'pais':pais,'departamento':departamento, 'provincia':provincia, 'distrito':distrito,'telefono1':telefono1, 'telefono2':telefono2, 'fchRegistro':fchRegistro,'usuario':usuario, 'origen':origen, 'calificacion':calificacion,'vendedor':vendedor, 'grupo':grupo, 'supervisor':supervisor, 'jefeVentas':jefeVentas, 'observacion':observacionP, 'estado':estado},
        success : function(response){
          var j = 0;
           var info = JSON.parse(response);
           if (info.cod == 1) {

            for (i = 0; i < rowLength; i++){
               //gets cells of current row
              var oCells = oTable.rows.item(i).cells;
               //gets amount of cells of current row
              var cellLength = oCells.length;
              var fila = oCells.item(0).innerHTML.trim();
              var fchCon = oCells.item(1).innerHTML.trim();
              var funcion = document.getElementById("tipo-"+fila).value;
              var cal = document.getElementById("calificacion-"+fila).value;
              var cierre = document.getElementById("cierre-"+fila);
              if (cierre.checked != true){
                var cie = "NO";
              }else{
                var cie = "SI";
              }
              var consejero = document.getElementById("consejero-"+fila).value;
              var indicador = document.getElementById("indicador-"+fila).value;
              var observacion = document.getElementById("observacion-"+fila).value;
              var jsonContacto = "{'codPro':"+info.codProspecto+", 'num_linea':"+fila+", 'fchContacto':"+fchCon+", 'calificacion':"+cal+", 'presentacion':"+cie+", 'consejero':"+consejero+", 'observacion':"+observacion+", 'indicador':"+indicador+", 'usuarioC':"+usuarioC+"}";

              $.ajax({
                type:'POST',
                url: 'ajax/prospecto.ajax.php',
                dataType: 'text',
                data: {'accion':'guardaContacto','codPro':info.codProspecto, 'num_linea':fila, 'fchContacto':fchCon, 'calificacion':cal, 'presentacion':cie, 'consejero':consejero, 'observacion':observacion, 'indicador':indicador, 'usuarioC':usuarioC},
                success : function(response){
                  var resp = JSON.parse(response);
                  if (resp.cod == 1) {
                    j = j + 1;
                    if (j == rowLength) {
                      swal({
                        type: "success",
                        title: resp.msg,
                        showConfirmButton: true,
                        confirmButtonText: "Aceptar"
                      });
                      document.getElementById('codProspecto').value = info.codProspecto;
                      verificarRegistro();
                    }
                  }else{
                    swal({
                        type: "warning",
                        title: "Ocurrio un error al registrar el Prospecto.",
                        showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                    });
                  }
                 }
              });
            }
           }
         }
       });
      }
    } 
  }
}

function actualizarProspecto(){
  //Datos vtaca_prospecto_venta
  var importe = document.getElementById("importe").value;
  var tipoDoc = document.getElementById("tipoDocRegPro").value;
  var numDoc = document.getElementById("numDocRegPro").value;
  var juridico = document.getElementById('juridico');
  if (juridico.checked != true){
    var jur = "NO";
  }else{
    var jur = "SI";
  }
  var apePaterno = document.getElementById("apePaterno").value;
  var apeMaterno = document.getElementById("apeMaterno").value;
  var razonSocial = document.getElementById("razonSocial").value;
  var direccion = document.getElementById("direccion").value;
  var pais = document.getElementById("pais").value;
  var departamento = document.getElementById("departamento").value;
  var provincia = document.getElementById("provincia").value;
  var distrito = document.getElementById("distrito").value;
  var telefono1 = document.getElementById("telefono1").value;
  var telefono2 = document.getElementById("telefono2").value;
  var fchRegistro = document.getElementById("fechaReg").value;
  var usuario = document.getElementById("usuario").value;
  var origen = document.getElementById("canalVenta").value;
  var calificacion = document.getElementById("calificacion").value;
  var vendedor = document.getElementById("codVendedor").value;
  var grupo = document.getElementById("codGrupo").value;
  var supervisor = document.getElementById("codSupervisor").value;
  var jefeVentas = document.getElementById("codJefeVentas").value;
  var observacion = document.getElementById("observacion").value;
  var estado = document.getElementById("estado").value;


//-------------------------- Datos vtade_prospecto_venta-----------------------------//

  var oTable = document.getElementById('tabBodyRegPro');
  var vendedor = document.getElementById("codVendedor").value;

  //gets rows of table
  var rowLength = oTable.rows.length;
  if (rowLength == 0) {
  }else{
    for (i = 0; i < rowLength; i++){
       //gets cells of current row
      var oCells = oTable.rows.item(i).cells;
       //gets amount of cells of current row
      var cellLength = oCells.length;
      var fila = oCells.item(0).innerHTML.trim();
      var fchCon = oCells.item(1).innerHTML.trim();
      var funcion = document.getElementById("tipo-"+fila).value;
      var cal = document.getElementById("calificacion-"+fila).value;
      var cierre = document.getElementById("cierre-"+fila);
      if (cierre.checked != true){
        var cie = "NO";
      }else{
        var cie = "SI";
      }
      var consejero = document.getElementById("consejero-"+fila).value;
      var indicador = document.getElementById("indicador-"+fila).value;
      var observacion = document.getElementById("observacion-"+fila).value;
      var jsonContacto = "{'num_linea':"+fila+", 'fchContacto':"+fchCon+", 'calificacion':"+cal+", 'presentacion':"+cie+", 'consejero':"+consejero+", 'observacion':"+observacion+", 'indicador'="+indicador+", 'usuario':"+usuario+"}";
      
    }
  }
}


verificarRegistro();