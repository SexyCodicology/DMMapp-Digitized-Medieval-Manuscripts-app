// THis file is used to display the broken links on the dashboard. Used in resources/views/admin/dashboard.blade.php
$(function () {
    let table = $('#dashboard').DataTable({
        data: brokenLinks,
        responsive: true,
        columns: [
            {data: "library"},
            {data: "status_code"},
            {data: "dmmapp_id"},],
        columnDefs: [{
            className: "dt-center", "targets": "_all"
        }, {
            target: 1, responsivePriority: 2,
        }, {
            target: 2, responsivePriority: 1, orderable: false, searchable: false, render: function (data, type, row) {
                return '<a class="btn btn-primary" href="/admin/edit/' + row['dmmapp_id'] + '" role="button">Fix</a>';
            }
        }]
    });
    table.responsive.recalc();
    table.columns.adjust()
});
