$("#cttoEmiArbVen").on('click', function(){
	document.getElementById("tituloCttArbVen").innerHTML = 'Emisión';
});
$("#cttoActArbVen").on('click', function(){
	document.getElementById("tituloCttArbVen").innerHTML = 'Activación';
});
$("#cttoResArbVen").on('click', function(){
	document.getElementById("tituloCttArbVen").innerHTML = 'Resolución';
});

function creaTablaTrabajadoresArbVend(){
        $.ajax({
            method:'POST',
            url: 'ajax/ArbolVenedores.ajax.php',
            dataType: 'json',
            data: {'entrada':'verTrabajadores'},
            success : function(respuesta){
            	// console.log(respuesta);
            	var classPeriodo = '';
            	var color = '';
                $.each(respuesta,function(index,value){
	                if(index == 0){
	                    classPeriodo = 'liListaKqPstImpar';
	                }else if(index%2 == 0){
	                    classPeriodo = 'liListaKqPstImpar';
	                }else{
	                    classPeriodo = 'liListaKqPstPar';
	                }
	                if(value['flg_activo'] == 'SI'){
	                	color = 'black';
	                }else{
	                	color = 'red';
	                }
	                $("#listaTrabArbVen").append(
	                    '<li class="nav-item '+classPeriodo+' itemLista">'+
	                        '<a href="#" class="btnVerTrabArbVen" codTrabajador="'+value['cod_trabajador']+'">'+
	                        	'<div class="row" style = "color:'+color+'">'+
									'<div class="col-md-4">'+value['cod_trabajador']+'</div>'+
									'<div class="col-md-8">'+value['dsc_apellido_paterno']+' '+value['dsc_apellido_materno']+', '+value['dsc_nombres']+'</div>'+
								'</div>'+
	                        '</a>'+
	                    '</li>'
	                );//append
	            });//each
            }
        });
}
creaTablaTrabajadoresArbVend();

$("#listaTrabArbVen").on("click","a.btnVerTrabArbVen",function(){
	$(".ulListaVerTrabArbVen li").removeClass('liListaKqPstActive');
	$(this).parent('li').addClass('liListaKqPstActive');
	var codTrabajador = $(this).attr("codTrabajador");
	$.ajax({
        url:"ajax/ArbolVenedores.ajax.php",
        method: "POST",
        dataType: 'json',
        data: {'codTrabajador':codTrabajador,'accion':'verDetTrabajador'},
        success: function(respuesta){
            console.log('respuesta',respuesta);
            $.each(respuesta,function(index,value){
            	$("#bodyHistConf").append(
            		'<tr>'+
            			'<td>'+index+'</td>'+
            			'<td>'+value['num_anno']+'</td>'+
            			'<td>'+value['cod_tipo_periodo']+'</td>'+
            			'<td>'+value['cod_periodo']+'</td>'+
            			'<td>'+value['dsc_tipo_comisionista']+'</td>'+
            		'</tr>'
            		);
            });//each
        }//success
    });//ajax
});