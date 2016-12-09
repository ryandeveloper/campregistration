$(document).ready(function() {
    
    $('#datatable').dataTable();
    $('#datatable-keytable').DataTable({
        keys: true
    });

    // Participants Datatable
    // $('#participants').DataTable( {

    // } );

    $("#participants").dataTable().yadcf([
        {column_number : 0},
        {column_number : 1, filter_type: 'text'},
        {column_number : 2, filter_type: 'text'},
        {column_number : 3},
        {column_number : 4},
        {column_number : 5},
        {column_number : 6},
        {column_number : 7},
        {column_number : 8},
        {column_number : 9},
        {column_number : 10},
        {column_number : 11},
        {column_number : 12},
    ]);

    $('#datatable-responsive').DataTable( {

    });

    $('#datatable-scroller').DataTable({
        ajax: "js/datatables/json/scroller-demo.json",
        deferRender: true,
        scrollY: 380,
        scrollCollapse: true,
        scroller: true
    });
    
    $('#financeTable').DataTable({
        "order": [[ 3, "desc" ]]
    });

    var table = $('#datatable-fixed-header').DataTable({
        fixedHeader: true
    });
    
    $('.sort-this').click();
    $('#datatable-responsive th').click(function() {
       $('.no-sorting').removeClass('sorting'); 
    });
    $('.no-sorting').removeClass('sorting'); 
    //$('.no-sorting').removeClass('sorting_asc').removeClass('sorting_desc');
});

