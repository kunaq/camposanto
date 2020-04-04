$("#fechVPS").datepicker({
	format: 'dd-mm-yyyy',
	autoclose: true,
	orientation:"bottom"
  });//datepicker
  
  function mostrarSidebar(autorizacion,usoServicio){
	  var localidad = $("#localidadVPS").val();
	  $.ajax({
		  method:'POST',
		  url: 'ajax/VPS.ajax.php',
		  dataType: 'json',
		  data: {'autorizacion' : autorizacion, 'num_servicio' : usoServicio, 'localidad' : localidad, 'entrada':'buscaDetBenef'},
		  success : function(respuesta){
			  // console.log(respuesta);
			  var combo = document.getElementById("localidadVPS");
			  var selected = combo.options[combo.selectedIndex].text;
			  $("#dsc_autorizacionVPS").val(respuesta[0]['dsc_tipo_autorizacion']);
			  $("#localidadCttoVPS").val(selected);
			  $("#localidadBenefVPS").val(selected);
			  $("#numUsoServicioVPS").val(respuesta[0]['num_uso_servicio']);
			  document.getElementById("numCttSideBarVPS").innerText = respuesta[0]['cod_contrato'];
			  document.getElementById("codSerSideBarVPS").innerText = (respuesta[0]['num_servicio']);
			  $("#plataformaVPS").val(respuesta[0]['dsc_plataforma']);
			  $("#numCttoSideVPS").val(respuesta[0]['cod_contrato']);
			  $("#numServSideVPS").val(respuesta[0]['num_servicio']);
			  $("#areaVPS").val(respuesta[0]['dsc_area']);
			  $("#ejeXVPS").val(respuesta[0]['cod_eje_horizontal_esp']);
			  $("#ejeYVPS").val(respuesta[0]['cod_eje_vertical_esp']);
			  $("#espacioVPS").val(respuesta[0]['cod_espacio']);
			  $("#dscServicioVPS").val(respuesta[0]['dsc_servicio']);
			  $("#tipoNecVPS").val(respuesta[0]['cod_tipo_necesidad']);
			  $("#dscFallecidoVPS").val(respuesta[0]['dsc_nombres']);
			  $("#fchDescesoVPS").val(respuesta[0]['fch_deceso']);
			  $("#fchServicioVPS").val(respuesta[0]['fch_servicio']);
			  $("#sacerdoteVPS").val(respuesta[0]['dsc_sacerdote']);
			  $("#titularVPS").val(respuesta[0]['dsc_titular']);
			  enlace = 'seguimientoContrato?localidad='+respuesta[0]['cod_localidad']+'&contrato='+respuesta[0]['cod_contrato'];
			  $("#btnVerCtto").attr("href",enlace);
		  }//success
	  });//ajax
	  hideSidebar();
	  $("#m_quick_sidebar-contrato").addClass("m-quick-sidebar-contrato--on");
  }
  
  function hideSidebar(){
	  $("#m_quick_sidebar-contrato").removeClass("m-quick-sidebar-contrato--on");
  }
  
  $("#fechVPS").on("change", function(){
	  $("li").remove('.itemLista');
	  var fecha = $(this).val();
	  var fecha1 = $(this).datepicker("getDate");
	  var localidad = $("#localidadVPS").val();
	  ejecutaTabla(fecha1);
	  $.ajax({
		  method:'POST',
		  url: 'ajax/VPS.ajax.php',
		  dataType: 'json',
		  data: {'fecha' : fecha, 'localidad' : localidad, 'entrada':'buscaBenef'},
		  success : function(respuesta){
			  // console.log(respuesta);
			  var classPeriodo = '';
			  $.each(respuesta,function(index,value){
				  if(index == 0){
					  classPeriodo = 'liListaKqPstImpar';
				  }else if(index%2 == 0){
					  classPeriodo = 'liListaKqPstImpar';
				  }else{
					  classPeriodo = 'liListaKqPstPar';
				  }
				  hora = value['fch_servicio'].split(' ')[1];
				  edo = value['dsc_autorizacion'].slice(0,3);
				  tipo_aut = "'"+value['cod_tipo_autorizacion']+"'";
				  num_sev = "'"+value['num_uso_servicio']+"'";
				  $("#listaBenefVSP").append(
					  '<li class="nav-item '+classPeriodo+' itemLista ">'+
						  '<a href="#" style="color:black" class="btnVerDetBenef" onclick="mostrarSidebar('+tipo_aut+','+num_sev+');">'+
							  '<div class="row">'+
								  '<div class="col-md-2">'+hora+'</div>'+
								  '<div class="col-md-2">'+value['dsc_prefijo']+'</div>'+
								  '<div class="col-md-2">'+edo+'</div>'+
								  '<div class="col-md-6">'+value['dsc_nombres']+'</div>'+
							  '</div>'+
						  '</a>'+
					  '</li>'
				  );//append
			  });//each
		  }//success
	  });//ajax
  });
  
  function ejecutaTabla(fecha){
	  var localidad = $("#localidadVPS").val();
	  fecha = fechaParaConsulta(fecha);
	  var cronograma = document.getElementById('bodyVisorVPS');
	  $.ajax({
		  method:'POST',
		  url: 'ajax/VPS.ajax.php',
		  dataType: 'json',
		  data: {'fecha' : fecha, 'localidad' : localidad, 'entrada':'storeTabla'},
		  success : function(respuesta){
			  console.log(respuesta);
			  $.each(respuesta,function(index,value){
				  aux = value['fch_fecha'].split(' ')[1];
				  hora = aux.split(':')[0];
				  var li_find = cronograma.rows.item('#fila_'+hora).cells;
				  console.log(value[2]);
				  if(hora == '07'){
					  li_i = 0;
				  }else if(hora == '08'){
					  li_i = 1;
				  }else if(hora == '09'){
					  li_i = 2;
				  }else if(hora == '10'){
					  li_i = 3;
				  }else if(hora == '11'){
					  li_i = 4;
				  }else if(hora == '12'){
					  li_i = 5;
				  }else if(hora == '13'){
					  li_i = 6;
				  }else if(hora == '14'){
					  li_i = 7;
				  }else if(hora == '15'){
					  li_i = 8;
				  }else if(hora == '16'){
					  li_i = 9;
				  }else if(hora == '17'){
					  li_i = 10;
				  }else if(hora == '18'){
					  li_i = 11;
				  }
				  var li_find = cronograma.rows.item(li_i).cells;
				  li_find.item().innerHTML="";
				  tipo = value['dsc_prefijo'];
				  if(tipo == 'FU'){
					  li_find.item(1).innerHTML = value[2];
				  }else if(tipo == 'IN'){
					li_find.item(2).innerHTML = value[2];;
				  }else if(tipo == 'ME'){
					li_find.item(3).innerHTML = value[2];;
				  }else if(tipo == 'MI'){
					li_find.item(4).innerHTML = value[2];;
				  }else if(tipo == 'TI'){
					  li_find.item(5).innerHTML = value[2];;
				  }else if(tipo == 'TE'){
					li_find.item(6).innerHTML = value[2];;
				  }
  
			  });//each
		  }//success
	  });//ajax
  }
  
  function fechaParaConsulta(dato){
	  fecha = new Date(dato);
	  var aux_dia = fecha.getDate();
	  var aux_mes1 = fecha.setMonth(fecha.getMonth() + 1);
	  var aux_mes = fecha.getMonth();
	  var  aux_anio = fecha.getFullYear();
	  if(aux_mes == '0'){
		  aux_mes = '12';
		  aux_anio = fecha.getFullYear()-1;
	  }               
	  var fechaConsulta = aux_mes+'/'+aux_dia+'/'+aux_anio;
	  return fechaConsulta;
  }