// $("#numDocRegPro").number(true);
// $("#tabProcComis").DataTable();
$("#tabDetCttoComis").DataTable();
$(document).ready(function() {
    $('#tabProcComis').DataTable( {
        "lengthMenu": "5",
        "searching": true,
		"info": false,
		"lengthChange": false
    } );
} );

function modalDetCtto() {
  // alert('llego');
   $("#DetCtoComisiones").modal("show");
}
