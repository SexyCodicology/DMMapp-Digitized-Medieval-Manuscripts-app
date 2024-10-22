// This file is used to generate the datatable for the data page. Used in resources/views/public/data.blade.php

$(function () {
    let table = $('.dmmapp-datatable').DataTable({
        dom: 'Blfrtip',
        data: libraries,
        order: [],
        buttons: [
            {
                extend: 'csvHtml5',
                text: '<span class="bi bi-download pull-left"></span> Download CSV</button>',
                className: 'mb-3',
                title: 'DMMapp data export'
            },
        ],
        responsive: true,
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
            {data: 'has_post'}, //10
            {data: 'library_name_slug'}, //11
            {data: 'is_disabled'}//12
        ],
        columnDefs:
            [
                {
                    className: "dt-center", "targets": "_all"
                },
                {
                    target: 0,
                    responsivePriority: 1,
                },
                {
                    target: 1,
                    responsivePriority: 2,
                    orderable: false, render: function (data, type, row) {
                        return '<p style="display:none">' + row['website'] + '</p><a class="btn btn-outline-primary" href="' + row['website'] + '" id="dmmapp-link" role="button"><i class="bi bi-link-45deg"></i> Digitized manuscripts  <sup><i class="bi bi-box-arrow-up-right small"></i></sup></a>';
                    }
                },
                {
                    targets: [3, 5], render: function (data) {
                        if (data === 1 || data === "1") {
                            return "<p style='display:none'>yes</p><i class='bi bi-check-circle-fill text-success' style='font-size: 2rem;'></i>";
                        } else {
                            return "<p style='display:none'>no</p><i class='bi bi-x-circle-fill text-danger' style='font-size: 2rem;'></i>";
                        }
                    }
                },
                {
                    targets: [4, 6, 7, 8, 9],
                    visible: false,
                    searchable: true
                },
                {
                    targets: [4, 8, 9, 10, 11, 12],
                },
                {
                    targets: [8, 9],
                    visible: false,
                    searchable: false
                },
                {
                    target: 10,
                    orderable: false,
                    render: function (data, type, row) {
                        return '<a class="btn btn-outline-secondary" data-dmmapp="explore" id="explore-button" href="' + row['library_name_slug'] + '" role="button"><i class="bi bi-search"></i> Explore</a>';
                    }
                },
                {
                    target: 11,
                    orderable: false, render: function (data, type, row) {
                        if (row['has_post'] === 1 || row['has_post'] === "1") {
                            return '<a class="btn btn-outline-secondary" href="' + row['post_url'] + '" role="button">Read <sup><i class="bi bi-box-arrow-up-right small"></i></sup></a>';
                        } else {
                            return '<p>No post available</p>';
                        }
                    }
                },
                {
                    target: 12,
                    visible: false,
                }
            ],

        rowCallback: function (row, data) {
            if (data.is_disabled === 1 || data.is_disabled === "1") {
                //$('td', row).addClass('table-danger');
                $('#dmmapp-link', row).addClass('disabled btn-outline-danger').removeClass('btn-outline-primary');
                $('#explore-button', row).addClass('btn-outline-danger').removeClass('btn-outline-secondary').html(function () {
                    return $(this).html().replace('<i class="bi bi-search"></i> Explore', '<i class="bi bi-exclamation-triangle"></i> More information')
                });
            }
        },
    });

    table.responsive.recalc();
    table.columns.adjust()
});

