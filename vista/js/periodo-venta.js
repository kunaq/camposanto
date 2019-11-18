$("#fchIniPerVen").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true
});//datepicker

$("#fchFinPerVen").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true
});//datepicker

$("#fchProComPerVen").datetimepicker({
  autoclose:!0,
  format:"dd-mm-yyyy hh:ii"
});//datepicker

$(document).ready(function() {
	$.ajax({
        type: 'GET',
        url: 'extensiones/captcha/buscaAnio.php',
        dataType: 'text',
        success : function(respuesta){
            $('#anioPerVen').html(respuesta);
        }
    });
});

$("#chkProComPerVen").on('change', function(){
	if($(this).is(':checked')){
		$("#fchProComPerVen").datetimepicker("setDate", new Date());
	}
	else{
		$("#fchProComPerVen").val('');
	}
});

function buscaPeriodo(){
	var anio = document.getElementById("anioPerVen").value;
	var periodo = document.getElementById("periodoPerVen").value;
	$("li").remove('.itemLista');
	$.ajax({
        url:"ajax/periodoVenta.ajax.php",
        method: "POST",
        dataType: 'json',
        data: {'anio':anio,'tipoPeriodo':periodo,'accion':'listaPeriodo'},
        success: function(respuesta){
            // console.log('respuesta',respuesta);
            var estado = '';
            var classPeriodo = '';
            color = '';
            $.each(respuesta,function(index,value){
                if(index == 0){
                    classPeriodo = 'liListaKqPstImpar';
                }else if(index%2 == 0){
                    classPeriodo = 'liListaKqPstImpar';
                }else{
                    classPeriodo = 'liListaKqPstPar';
                }
                if(value['flg_estado'] == 'AB'){
                	estado = 'ABIERTO';
                	color = 'black';
                }
                else if(value['flg_estado'] == 'CE'){
                	estado = 'CERRADO';
                	color = 'red';
                }
                $("#listaPeriodoVenta").append(
                    '<li class="nav-item '+classPeriodo+' itemLista">'+
                        '<a href="#" class="btnVerPeriodo" codAnio="'+value["num_anno"]+'" codPeriodo="'+value['cod_periodo']+'">'+
                        	'<div class="row" style="color:'+color+'">'+
								'<div class="col-md-4">'+value['cod_periodo']+'</div>'+
								'<div class="col-md-3">'+value['num_mes']+'</div>'+
								'<div class="col-md-5">'+estado+'</div>'+
							'</div>'+
                        '</a>'+
                    '</li>'
                );//append
            });//each
        }//success
    });//ajax
}//function buscaPeriodo

$("#listaPeriodoVenta").on("click","a.btnVerPeriodo",function(){
	$(".ulListaConfigPeriodo li").removeClass('liListaKqPstActive');
	$(this).parent('li').addClass('liListaKqPstActive');
	var codAnio = $(this).attr("codAnio");
	var codPeriodo = $(this).attr("codPeriodo");
	$.ajax({
        url:"ajax/periodoVenta.ajax.php",
        method: "POST",
        dataType: 'json',
        data: {'anio':anio,'tipoPeriodo':periodo,'accion':'verDetPeriodo'},
        success: function(respuesta){
            console.log('respuesta',respuesta);
        }//success
    });//ajax
	// mostrarTrabajador(codTrabajador);
});

function muestraPeriodo(){
	// alert(this.id);
}