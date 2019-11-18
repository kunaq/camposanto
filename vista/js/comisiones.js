// $("#numDocRegPro").number(true);
// $("#tabProcComis").DataTable();
$("#tabDetCttoComis").DataTable();
$(document).ready(function() {
    $('#tabProcComis').DataTable( {
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
    } );
} );