@extends('layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs5/dt-1.13.2/b-2.3.4/b-html5-2.3.4/r-2.4.0/sp-2.1.1/sl-1.6.0/datatables.min.css"/>
@endsection
@section('breadcrumbs')
    <ol>
        <li><a href="/">Home</a></li>
        <li>Dashboard</li>
    </ol>
    <h2>Dashboard</h2>
@endsection
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    {{-- Content here --}}

    <div id="main-data">
        <div class="container">
            <a class="btn btn-success my-3" data-dmmapp="new-institution" href="{{ route('create_library') }}"> <i
                    class="bi bi-plus-circle"></i> New institution</a>

            <div class="card">
                <div class="card-header">Institutions</div>
                <div class="card-body">
                    <noscript>
                        <div class="alert alert-info">
                            <h4>Your JavaScript is disabled</h4>
                            <p>Please enable JavaScript to see the table.</p>
                        </div>
                    </noscript>
                    <table id="dashboard" class="table table-bordered my-3" style="width: 100%">
                        <thead>
                        <tr>
                            <th>Institution</th>
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
@endsection

@push('scripts')
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs5/dt-1.13.2/b-2.3.4/b-html5-2.3.4/r-2.4.0/sp-2.1.1/sl-1.6.0/datatables.min.js"></script>
    {{-- NOTE this transforms our libraries to json, which can then be read by Google maps - in dmmapp.js --}}
    <script type="text/javascript">
        let libraries = {!! json_encode($libraries->toArray()) !!}
    </script>
    <script defer type="text/javascript" src="{{ asset('/js/dashboard.min.js') }}"></script>
@endpush
