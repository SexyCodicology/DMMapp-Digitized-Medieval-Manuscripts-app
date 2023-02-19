//Datatables
$(function () {
    var table = $('#dashboard').DataTable({
        data: libraries,
        responsive: true,
        columns: [
            {data: "library"},
            {data: "id"},
        ],
        columnDefs: [
            {
                responsivePriority: 1,
                targets: 1
            },
            {
                responsivePriority: 2,
                targets: -1
            },

            {
                target: 1,
                render: function (data, type, row, meta) {
                    return '<a class="btn btn-primary" href="/admin/edit/' + row['id'] + '" role="button">Edit</a>';

                }
            }
        ]

    });
    table.responsive.recalc();
    table.columns.adjust()
    table.searchPanes.resizePanes();
});
