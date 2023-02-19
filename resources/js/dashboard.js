//Datatables
$(function () {
    var table = $('#dashboard').DataTable({
        data: libraries,
        responsive: true,
        columns: [
            {data: "id"},
            {data: "library"},
            {data: "dmmapp_id"},
        ],
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
                    return '<a class="btn btn-primary" href="/admin/edit/' + row['dmmapp_id'] + '" role="button">Edit</a>';

                }
            }
        ]

    });
    table.responsive.recalc();
    table.columns.adjust()
    table.searchPanes.resizePanes();
});
