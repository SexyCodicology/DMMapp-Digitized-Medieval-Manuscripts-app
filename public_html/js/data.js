//Datatables
$(function () {
    var table = $('#dmmtable').DataTable({
        data: libraries,
        columns: [
            { "data": "library" }, //0
            { "data": "iiif" }, //1
            { "data": "quantity" }, //2
            { "data": "copyright" }, //3
            { "data": "is_free_cultural_works_license" }, //4
            { "data": "nation" }, //5
            { "data": "city" }, //6
            { "data": "lat" }, //7
            { "data": "lng" }, //8
            { "data": "notes" }, //9
            { "data": "website" }, //10
            { "data": "has_post" }, // 11
            { "data": "post_url" } // 12
        ],

        responsive: true,
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Details for ' + data.library;
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        },

        searchPanes: true,
        searchPanes: {
            threshold: 1,
        },

        columnDefs: [
            {
                targets: [5, 7, 8, 9],
                visible: false,
                searchable: true
            },
            {
                targets: [6],
                visible: false,
                searchable: true
            },
            {
                targets: [10],
                searchable: false
            },
            {
                responsivePriority: 1,
                targets: 2
            },
            {
                responsivePriority: 2,
                targets: -1
            },
            {
                searchPanes: {
                    show: false
                },
                targets: [7, 8, 9, 10]
            },
            {
            searchPanes: {
                viewCount: false,
            search: false },
                targets: [1,4,11],
            },
            {
                targets: [1, 4, 11],
                render: function (data, type, row) {

                    if (data === 1) {
                        return "<div class='alert alert-success text-center' role='alert'>Yes</div>";
                    }
                    else {
                        return "<div class='alert alert-danger text-center' role='alert'>No</div>";;
                    }
                }
            },
            {
                targets: 10,
                render: function (data, type, full, meta) {
                    return '<div class="d-grid gap-2"><a class="alert alert-info" href="' + data + '" role="button">Browse</a></div>';
                }
            },
            {
                targets: 12,
                render: function (data, type, full, meta) {
                    return '<div class="d-grid gap-2"><a class="alert alert-info" href="' + data + '" role="button">Read</a></div>';
                }
            },
        ]

    });
    table.searchPanes.container().prependTo(table.table().container());
    table.searchPanes.resizePanes();
});
