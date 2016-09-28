$(document).ready(function() {
    
    $('#datatable').dataTable();
    $('#datatable-keytable').DataTable({
        keys: true
    });

    /*$('#datatable-responsive').DataTable();	*/
		
    $('#datatable-responsive').DataTable( {
        initComplete: function () {
			
            this.api().columns('.select-filter').every( function () {
                var column = this;
                var select = $('<select class="form-control"><option value="">Select Filter</option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
		
    } );
    
    $("#test").dataTable().yadcf([
        {column_number : 0, filter_type: 'text'},
        {column_number : 1, filter_type: 'text'},
        {column_number : 2, filter_type: 'text'},
        {column_number : 3},
    ]);
    
    

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