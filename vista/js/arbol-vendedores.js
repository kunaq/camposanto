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
	 // alert('llego');
	// $('#tableTarbajadorArbVen').html('<div class="loader"></div>');
        $.ajax({
            type:'POST',
            url: 'ajax/ArbolVenedores.ajax.php',
            dataType: 'text',
            data: {'entrada':'verTrabajadores'},
            success : function(respuesta){
            	console.log(respuesta);
                $.each(respuesta,function(index,value){
                	console.log(index);
	       //          if(index == 0){
	       //              classPeriodo = 'liListaKqPstImpar';
	       //          }else if(index%2 == 0){
	       //              classPeriodo = 'liListaKqPstImpar';
	       //          }else{
	       //              classPeriodo = 'liListaKqPstPar';
	       //          }
	       //          $("#listaTrabArbVen").append(
	       //              '<li class="nav-item '+classPeriodo+' itemLista">'+
	       //                  '<a href="#" class="btnVerPeriodo">'+
	       //                  	'<div class="row" style="color:'+color+'">'+
								// 	'<div class="col-md-4">'+value['cod_trabajador']+'</div>'+
								// 	'<div class="col-md-8">'+value['dsc_apellido_paterno']+' '+value['dsc_apellido_materno']+', '+value['dsc_nombres']+'</div>'+
								// '</div>'+
	       //                  '</a>'+
	       //              '</li>'
	       //          );//append
	            });//each
            }
        });
}

creaTablaTrabajadoresArbVend();