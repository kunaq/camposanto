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
            url: 'periodoVenta.ajax.php',
            dataType: 'json',
            data: {'entrada':'verTrabajadores'},
            success : function(respuesta){
            	console.log(respuesta);
                // $("#divTablaProspectos").html(respuesta);
                // $('#tableTarbajadorArbVen').DataTable({
                //     "searching": false,
                //     "info": false
                // });
            }
        });
	// $("#tableTarbajadorArbVen").DataTable({
	// 	"ajax": "ajax/datatable-trabajadorArbVen.ajax.php?entrada=verTrabajadores",
	//     "deferRender": true,
	// 	"retrieve": true,
	// 	"processing": true,
	// 	"language" : {
	//       "url": "spanish.json"
	//   	},
	//   	'columnDefs': [
	// 		{
	// 			targets: [0],
	// 			className: "text-center codTrabajador"
	// 		},
	// 		{
	// 			targets: [1],
	// 			className: ""
	// 		}
	// 	]	
	// });
}

creaTablaTrabajadoresArbVend();