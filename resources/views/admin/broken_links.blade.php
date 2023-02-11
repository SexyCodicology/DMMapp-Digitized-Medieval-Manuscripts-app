@extends('layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/r-2.4.0/datatables.min.css"/>
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
    <a class="btn btn-primary" href="{{route('check_broken_links')}}" role="button">Start Broken Links checker</a>
    <div id="main-data">
        <div class="container">
            <div class="card">
                <div class="card-header">Broken links</div>
                <div class="card-body">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/r-2.4.0/datatables.min.js"></script>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
