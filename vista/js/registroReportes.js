// $("#").DataTable();
$(document).ready(function() {
    $('#tabTelerepote').DataTable( {
       "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]]
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