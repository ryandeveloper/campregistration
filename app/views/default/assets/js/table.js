$(document).ready(function() {
    
    $('#datatable').dataTable();
    $('#datatable-keytable').DataTable({
        keys: true
    });

    // Participants Datatable
    // $('#participants').DataTable( {

    // } );

    $("#participants").dataTable({
        "responsive": true,
        "bAutowidth": false,
        "lengthMenu": [ [25, 50, 75, 100, -1], [25, 50, 75, 100, "All"] ],
        "pageLength": 25,
        columnDefs: [{
            targets: "_all",
            orderable: false
        }]
    }).yadcf([
        {column_number : 0, data:["Yes", "No"], filter_type: 'select', filter_default_label: "-"},
        {column_number : 1, filter_type: 'select', filter_default_label: "-"},
        {column_number : 2, filter_type: "text", filter_default_label: "Name"},
        {column_number : 3, filter_type: 'text', filter_default_label: "Age"},
        {column_number : 4, filter_default_label: "All"},
        {column_number : 5, filter_default_label: "All"},
        {column_number : 6, filter_default_label: "All"},
        {column_number : 7, filter_default_label: "-"},
        {column_number : 8, filter_default_label: "All"},
        {column_number : 9, filter_type: 'text', filter_default_label: "$"},
        {column_number : 10, filter_type: 'text', filter_default_label: "$"},
        {column_number : 11, filter_default_label: "All"},
        {column_number : 12, filter_type: 'none'},
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

