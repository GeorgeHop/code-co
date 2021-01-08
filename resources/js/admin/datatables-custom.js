$(document).ready(function() {
     $('#example').DataTable({
        rowReorder: {
            selector: 'tr'
        },
        columnDefs: [
            { targets: 0, visible: false }
        ]
    });
} );
