// $("#").DataTable();
$(document).ready(function() {
    $('#tabTelerepote').DataTable( {
    	"searching": false,
		"info": false,
		"paging":   false,
		"ordering": false,
    } );
} );
$("#desdeTeleporte").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true
});//datepicker
$("#hastaTeleporte").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true
});//datepicker

function modalTelereporte(){
	 $("#repBenef").modal("show");
}