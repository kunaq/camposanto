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
            	var classPeriodo = '';
                $.each(respuesta,function(index,value){
                	console.log(index);
	                if(index == 0){
	                    classPeriodo = 'liListaKqPstImpar';
	                }else if(index%2 == 0){
	                    classPeriodo = 'liListaKqPstImpar';
	                }else{
	                    classPeriodo = 'liListaKqPstPar';
	                }
	                $("#listaTrabArbVen").append(
	                    '<li class="nav-item '+classPeriodo+' itemLista">'+
	                        '<a href="#" class="btnVerPeriodo">'+
	                        	'<div class="row">'+
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