//Datatables
$(function () {
    var table = $('#dashboard').DataTable({
        data: libraries, responsive: true, columns: [{data: "library"}, {data: "id"},], columnDefs: [{
            className: "dt-center", "targets": "_all"
        }, {
            targets: -1, responsivePriority: 2,
        }, {
            target: 1,
            responsivePriority: 1,
            orderable: false,
            searchable: false,
            render: function (data, type, row, meta) {
                return '<a class="btn btn-primary" href="/admin/edit/' + row['id'] + '" role="button">Edit</a>';
            }
        }]
    });
    table.responsive.recalc();
    table.columns.adjust()
    table.searchPanes.resizePanes();
});
