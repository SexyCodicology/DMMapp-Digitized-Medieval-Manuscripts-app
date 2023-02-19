@extends('layouts.app')
@section('css')
@endsection
@section('breadcrumbs')
    <ol>
        <li><a href="/">Home</a></li>
        <li>Admin</li>
    </ol>
    <h2>Admin</h2>
@endsection
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
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
                    <table id="dashboard" class="table table-striped table-bordered align-middle text-center">
                        <thead>
                        <tr>
                            <th>DMMapp ID</th>
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
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs5/dt-1.11.3/r-2.2.9/sp-1.4.0/sl-1.3.3/datatables.min.js"></script>
    {{-- NOTE this transforms our libraries to json, which can then be read by Google maps - in dmmapp.js --}}
    <script type="text/javascript">
        var libraries = {!! json_encode($libraries->toArray()) !!}
    </script>
    @env('production')
        <script defer type="text/javascript" src="{{ asset('/js/dashboard.min.js') }}"></script>
    @endenv
    @env(['local', 'staging'])
        <script defer type="text/javascript" src="{{ asset('/js/dashboard.min.js') }}"></script>
    @endenv
@endsection
