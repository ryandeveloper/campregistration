$(document).ready(function() {
    
    $('#datatable').dataTable();
    $('#datatable-keytable').DataTable({
        keys: true
    });

    // Participants Datatable
    // $('#participants').DataTable( {

    // } );

    $('#datatable-responsive').DataTable( {

    });

    $('#datatable-scroller').DataTable({
        ajax: "js/datatables/json/scroller-demo.json",
        deferRender: true,
        scrollY: 380,
        scrollCollapse: true,
        scroller: true
    });
    
    var table = $('#datatable-fixed-header').DataTable({
        fixedHeader: true
    });
    
    $('.sort-this').click();
    $('#datatable-responsive th, #participants th').click(function() {
       $('.no-sorting').removeClass('sorting');
    });

    $('.no-sorting').removeClass('sorting'); 
    //$('.no-sorting').removeClass('sorting_asc').removeClass('sorting_desc');
});

