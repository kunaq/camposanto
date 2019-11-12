// $("#numDocRegPro").number(true);
// $("#tabProcComis").DataTable();
$("#tabDetCttoComis").DataTable();
$(document).ready(function() {
    $('#tabProcComis').DataTable( {
       "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]]
    } );
} );

function modalDetCtto() {
  // alert('llego');
   $("#DetCtoComisiones").modal("show");
}