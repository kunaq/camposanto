$("#btnBuscarMttoEsp").on('click', function (){
	var ls_camposanto = $("#camposantoMttoEsp").val();
	var ls_tipo_plataforma = $("#tipoPlatBloqEsp").val();
	var ls_plataforma = $("#plataformaMttoEsp").val();
	var ls_area = $("#areaMttoEsp").val();
	var ls_eje_horizontal = $("#ejexMttoEsp").val();
	var ls_eje_vertical = $("#ejexMttoEsp").val();
	var ls_espacio = $("#espacioMttoEsp").val();
	var fila = '';
	$("#bodyMttoEsp").empty();
	$.ajax({
	    type: 'POST',
	    url: 'ajax/mttoEspacio.ajax.php',
	    dataType: 'json',
	    data: {'ls_camposanto' : ls_camposanto,'ls_plataforma' : ls_plataforma, 'ls_tipo_plataforma' : ls_tipo_plataforma, 'ls_area' : ls_area,'ls_eje_horizontal' : ls_eje_horizontal,'ls_eje_vertical' : ls_eje_vertical,'ls_espacio' : ls_espacio,'entrada' : 'listaMtto'},
	    success : function(respuesta){
	    	console.log(respuesta);
	    	$.each(respuesta,function(index,value){
	    		espacio = value['cod_area_plataforma'] + value['cod_eje_horizontal'] + '-' + value['cod_eje_vertical'] + '-' + value['cod_espacio'] + '-' + value['cod_tipo_espacio'];
		    	fila = '<tr>'+ 
							'<td>'+value['cod_camposanto']+'</td>'+
							'<td>'+value['cod_area_plataforma']+'</td>'+
							'<td>'+value['cod_eje_horizontal']+'</td>'+
							'<td>'+value['cod_eje_vertical']+'</td>'+
							'<td>'+value['cod_espacio']+'</td>'+
							'<td>'+value['cod_tipo_espacio']+'SELECT</td>'+
							'<td>'+espacio+'</td>'+
							'<td>'+value['cod_estado']+'SELECT</td>'+
							'<input type="hidden" id="num_niveles_'+espacio+'" value="'+value['num_niveles']+'">'+
							'<input type="hidden" id="num_niveleslibres_'+espacio+'" value="'+value['num_niveleslibres']+'">'+
							'<input type="hidden" id="num_columna_'+espacio+'" value="'+value['num_columna']+'">'+
							'<input type="hidden" id="num_fila_'+espacio+'" value="'+value['num_fila']+'">'+
							'<input type="hidden" id="flg_bloqueado_'+espacio+'" value="'+value['flg_bloqueado']+'">'+
						'</tr>';
				document.getElementById("bodyMttoEsp").insertAdjacentHTML("beforeEnd" ,fila);
			});//each
	    }//success
	});//ajax
});