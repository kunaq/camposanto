$("#cttoEmiArbVen").on('click', function(){
	document.getElementById("tituloCttArbVen").innerHTML = 'Emisión';
});
$("#cttoActArbVen").on('click', function(){
	document.getElementById("tituloCttArbVen").innerHTML = 'Activación';
});
$("#cttoResArbVen").on('click', function(){
	document.getElementById("tituloCttArbVen").innerHTML = 'Resolución';
});

$("#tableTarbajadorArbVen").DataTable({
	"ajax": "ajax/datatable-trabajadorArbVen.ajax.php?entrada=verTrabajadores",
    "deferRender": true,
	"retrieve": true,
	"processing": true,
	"language" : {
      "url": "spanish.json"
  	},
  	'columnDefs': [
		{
			targets: [0],
			className: "text-center "
		},
		{
			targets: [1],
			className: ""
		},
		{
			targets: [2],
			className: " hidden"
		}
	]	
});