@extends('layouts.app')
@section('css')
@endsection
@section('breadcrumbs')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="/">Home</a></li>
                <li>Admin</li>
            </ol>
            <h2>Admin</h2>
        </div>
    </section>

@endsection
@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
    {{-- Content here --}}
            <a class="btn btn-success" href="{{ route('create_library') }}">
            <i class="fa fa-plus-square"></i> New Library</a>
        <div id="main-data">
            <div id="data-table" class="my-3">
                <noscript>
                    <div class="alert alert-info">
                        <h4>Your JavaScript is disabled</h4>
                        <p>Please enable JavaScript to see the table.</p>
                    </div>
                </noscript>
                <table id="dashboard" class="table table-striped table-bordered align-middle text-center" style="width:100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Institution</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>

                </table>
            </div>
        </div>
@endsection
@section('javascript')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript"
        src="https://cdn.datatables.net/v/bs5/dt-1.11.3/r-2.2.9/sp-1.4.0/sl-1.3.3/datatables.min.js"></script>
{{-- NOTE this transforms our libraries to json, which can then be read by Googl maps - in dmmapp.js --}}
<script type="text/javascript">
    var libraries = {!! json_encode($libraries->toArray()) !!}
</script>
<script defer type="text/javascript" src="{{ asset('/js/dashboard.js') }}"></script>
@endsection
