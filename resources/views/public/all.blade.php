@extends('layouts.app')

@section('css')
@endsection

@section('title')
    All institutions - DMMapp
@endsection
@section('title-meta')
    All institutions - DMMapp
@endsection
@section('description-meta')
    Browse all the institutions in the DMMapp database and their known status
@endsection

@section('breadcrumbs')
    <ol>
        <li><a href="/">Home</a></li>
        <li>All</li>
    </ol>
    <div class="row">
        <div class="col text-center my-3">
            <h1>All institutions</h1>
            <h4>A list of all the institutions available in the DMMapp database</h4>
        </div>
    </div>
@endsection
@section('content')
    <div class="text-center">
        <div id="main-data">
            <div class="container">
                <div class="card shadow-sm">
                    <div class="card-header">Institutions</div>
                    <div class="card-body">
                        <table class="table my-3" id="dmmapp-institutions" style="width: 100%">
                            <noscript>
                                <div class="alert alert-info">
                                    <h4>Your JavaScript is disabled</h4>
                                    <p>Please enable JavaScript to see the table.</p>
                                </div>
                            </noscript>
                            <thead>
                            </thead>
                            <tbody>
                                @foreach ($libraries as $library)
                                <tr>
                                    <td>

                                            <a href="{{ $library->website }}" target="_blank"
                                                rel="noopener">{{ $library->library }}</a><br>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('feedback')
    <x-feedback />
@endsection
{{-- Optional JavaScript --}}
@section('javascript')
@endsection
@push('scripts')
@endpush
