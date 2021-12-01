//Datatables
$(function () {
    var table = $('#dashboard').DataTable({
        data: libraries,
        columns: [
            { "data": "id"},
            { "data": "library" },
            { "defaultContent": "" },
        ],

        responsive: true,
        columnDefs: [
            {
                responsivePriority: 1,
                targets: 2
            },
            {
                responsivePriority: 2,
                targets: -1
            },

            {
                targets: 2,
                render: function (data, type, row, meta) {
                    return '<a class="btn btn-primary" href="/admin/edit/' + row['id'] + '" role="button">Edit</a>';

                }
            }
        ]

    });
    table.searchPanes.container().prependTo(table.table().container());
    table.searchPanes.resizePanes();
});
