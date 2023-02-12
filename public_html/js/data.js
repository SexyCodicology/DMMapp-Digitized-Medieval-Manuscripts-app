$(function () {
    let table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/data",
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
            {data: 'website'}, //10
            {data: 'library_name_slug'}, //11
        ],
        responsive: true,
        searchPanes: {
            threshold: 1,
            initCollapsed: true
        },

        columnDefs: [
            {className: "dt-center", "targets": "_all"},
            {
                targets: [4, 6, 7, 8, 9],
                visible: false,
                searchable: true
            },
            {
                targets: [8, 9],
                visible: false,
                searchable: false
            },
            {
                responsivePriority: 1,
                targets: 0
            },
            {
                targets: [3, 5],
                render: function (data) {

                    if (data === 1) {
                        return "<p style='display:none'>yes</p><i class='bi-check-circle-fill text-success' style='font-size: 2rem;'></i>";

                    } else {
                        return "<p style='display:none'>no</p><i class='bi-x-circle-fill text-danger' style='font-size: 2rem;'></i>";
                    }
                }
            },
            {
                targets: 10,
                render: function (data, type, row) {
                    return '<a class="btn btn-secondary" href="' + row['library_name_slug'] + '" role="button"><i class="bi-search"></i> Explore</a>';
                }
            },
            {
                targets: 11,
                render: function (data, type, row) {
                    if (row['has_post'] === 1) {
                        return '<a href="' + row['post_url'] + '" role="btn btn-link">Read <sup><i class="bi-box-arrow-up-right"></i></sup></a>';
                    } else {
                        return '<p class="text-dark">No post available</p>';
                    }
                },
            },
            {
                targets: 1,
                render: function (data, type, row) {
                    return '<a class="btn btn-primary" href="' + row['website'] + '" role="button">Digitized manuscripts <sup><i class="bi-box-arrow-up-right"></i> </sup></a>';

                }
            },
            {
                searchPanes: {
                    show: false
                },
                targets: [4, 8, 9, 10, 11]
            },
            {
                searchPanes: {
                    viewCount: false
                },
                targets: [0],
            }
        ],
    });

});

