//Datatables
$(function () {
    let table = $('#dashboard').DataTable({
        data: brokenLinks,
        columns: [
            {data: "library"},
            {data: "status_code"},
            {data: "id"},
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
                render: function (data, type, row) {
                    return '<a class="btn btn-primary" href="/admin/edit/' + row['id'] + '" role="button">Fix</a>';

                }
            }
        ]

    });
});
