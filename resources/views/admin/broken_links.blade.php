@extends('layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/b-2.3.3/b-html5-2.3.3/r-2.4.0/datatables.min.css"/>
@endsection
@section('breadcrumbs')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="/">Home</a></li>
                <li>Admin</li>
                <li>Broken links</li>
            </ol>
            <h2>Broken links</h2>
        </div>
    </section>

@endsection
@section('content')
    {{-- Content here --}}
    <div id="main-data">
        <div class="container">
            <a class="btn btn-primary my-3" href="{{route('check_broken_links')}}" role="button">Start Broken Links checker</a>

            <div class="card">
                <div class="card-header">Broken links</div>
                <div class="card-body">
                    <table class="table table-bordered yajra-datatable">
                        <thead>
                        <tr>
                            <th>Institution</th>
                            <th>Status Code</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/b-2.3.3/b-html5-2.3.3/r-2.4.0/datatables.min.js"></script>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(function () {

            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('broken-links') }}",
                columns: [
                    {data: 'library', name: 'Institution'},
                    {data: 'status_code', name: 'Status Code'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

        });
    </script>
@endpush
