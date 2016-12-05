$(document).ready(function() {
    
    $('#datatable').dataTable();
    $('#datatable-keytable').DataTable({
        keys: true
    });

    /*$('#datatable-responsive').DataTable();	*/
		
    $('#datatable-responsive').DataTable( {
        responsive: true
		
    } ); 
    
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

