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
                targets: [5, 6, 7, 8, 9],
                visible: false,
                searchable: true
            },
            {
                targets: [11, 10],
                visible: false,
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
                targets: [7, 8, 9, 10, 11]
            },
            {
                searchPanes: {
                    //viewCount: false,
                    search: false
                },
                targets: [0, 1, 4, 11, 12],
            },
            {
                targets: [1, 4, 11],
                render: function (data) {

                    if (data === 1) {
                        return "<p class='text-success text-center' role='alert'>Yes</p>";
                    }
                    else {
                        return "<p class='text-danger text-center' role='alert'>No</p>";;
                    }
                }
            },
            {
                targets: 10,
                render: function (data, type, row, meta) {
                    return '<div class="d-grid gap-2"><a class="alert alert-info text-center" href="' + data + '" role="button">Browse</a></div>';
                }
            },
            {
                targets: 12,
                render: function (data, type, row, meta) {
                    if (row['has_post'] === 1) {
                        return '<div class="d-grid gap-2"><a class="text-center" href="' + data + '" role="button">Read <sup><i class="fas fa-external-link-alt"></i></sup></a></div>';
                    }
                    else {
                        return '<p class="text-dark text-center" href="#" role="alert">No post available</p>';
                    }
                },
            },
            {
                targets: 0,
                render: function (data, type, row, meta) {
                return '<div class="d-grid gap-2"><a class="btn btn-primary" href="' + row['website'] + '" role="button">' + data + ' <sup><i class="fas fa-external-link-alt"></i></sup></a></div>';

            }
        }
        ]

    });
    table.searchPanes.container().prependTo(table.table().container());
    table.searchPanes.resizePanes();
});
