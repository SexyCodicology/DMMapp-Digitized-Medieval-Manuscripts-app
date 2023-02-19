//Datatables
$(function () {
    let table = $('#dashboard').DataTable({
        data: brokenLinks,
        responsive: true,
        columns: [
            {data: "library"},
            {data: "status_code"},
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
                render: function (data, type, row) {
                    return '<a class="btn btn-primary" href="/admin/edit/' + row['dmmapp_id'] + '" role="button">Fix</a>';

                }
            }
        ]

    });

    table.responsive.recalc();
    table.columns.adjust()
    table.searchPanes.resizePanes();
});
