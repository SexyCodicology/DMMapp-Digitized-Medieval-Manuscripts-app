$(function() {
    let table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/map",
        columns: [
            {data: 'library'}, //0
            {data: 'website'}, //1
            {data: 'quantity'}, //2
            {data: 'iiif'}, //3
            {data: 'copyright'}, //4
            {data: 'is_free_cultural_works_license'}, //5
            {data: 'nation'}, //6
            {data: 'city'}, //7
            {data: 'lat'}, //8
            {data: 'lng'}, //9
            {data: 'notes'}, //9
            {data: 'website'}, //10
            {data: 'has_post'}, // 11
            {data: "post_url"}, // 12
            {data: 'library_name_slug'}, //13
        ],

        responsive: {
            details: false
        },
        searchPanes: true,
        searchPanes: {
            threshold: 1,
        },

        columnDefs: [
            {className: "dt-center", "targets": "_all"},
            {
                targets: [3, 5, 6, 7, 8, 9, 10, 11, 12, 13],
                visible: false
            },
            {
                targets: [1, 3, 7, 8, 9, 10, 11, 12, 13],
                searchable: false
            },
            {
                responsivePriority: 1,
                targets: 0
            },
            {
                responsivePriority: 2,
                targets: 2
            },
            {
                searchPanes: {
                    show: false
                },
                targets: [1, 3, 5, 6, 7, 8, 9, 10, 11, 12, 13]
            },
            {
                targets: [1, 4],
                render: function (data) {

                    if (data === 1) {
                        return "<p style='display:none'>yes</p><i class='bi bi-check-circle-fill text-success'></i>";

                    } else {
                        return "<p style='display:none'>no</p><i class='bi bi-x-circle-fill text-danger'></i>";
                    }
                }
            },
            {
                targets: [0],
                searchPanes: {
                    viewCount: false
                },

            },
        ],
    });
});
