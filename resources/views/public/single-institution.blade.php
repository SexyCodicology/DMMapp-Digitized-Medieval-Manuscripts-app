@extends('layouts.app')

@section('title')
    {{ $library_data->library }} - Digitized Medieval Manuscripts
@endsection
@section('title-meta')
    {{ $library_data->library }} - Digitized Medieval Manuscripts
@endsection
@section('description-meta')
    Links and information about digitized medieval manuscripts belonging to
    {{ $library_data->library }} in {{ $library_data->city }}, {{ $library_data->nation }}
@endsection

@section('css')
@endsection

@section('breadcrumbs')
    <ol>
        <li><a href="/">Home</a></li>
        <li><a href="{{ route('data') }}">Data</a></li>
        <li>{{ $library_data->library }}</li>
    </ol>
    <div class="row">
        <div class="col text-center my-3">
            <h1>{{ $library_data->library }}</h1>
            <h4>{{ $library_data->city }}, {{ $library_data->nation }}</h4>
        </div>
    </div>
@endsection

@section('content')
    <div class="text-center">
        <div class="btn-group my-4" role="group" aria-label="additional options">
            <button class="btn btn-primary border-light" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsible" aria-expanded="false" aria-controls="collapsible">
                <i class="bi bi-info-circle-fill"></i> About
            </button>
            <a class="btn btn-primary border-light" href="{{route('random_library')}}" type="button">
                <i class="bi bi-shuffle"></i> Explore a random library!</a>
            <a class="btn btn-primary border-light" href="#cta" type="button">
                <i class="bi bi-chat-left-heart-fill"></i> Support us!</a>
            @auth
                <a class="btn btn-primary border-light" href="{{ route('update_library', $library_data->id) }}"
                   type="button"><i class="bi bi-edit"></i> Edit</a>
            @endauth
        </div>

        <div class="collapse" id="collapsible">
            <div class="card card-body text-start">
                <h3>The "DMMapp record details" page</h3>
                <p>This "DMMapp record details" page contains all the available information about
                    <b>{{ $library_data->library }}</b> and the digitized medieval manuscripts made available by
                    this institution.
                </p>
                <hr>
                <p>The data collected by the DMMapp is crowdsourced and updated constantly. If you notice any
                    errors, please help us correct them by using the <b>Report data issue</b> button at the
                    bottom of this page.</p>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="alert alert-light text-center" role="alert" data-dmmapp="library-info">

            <div class="my-1">
                <a href="{{ $library_data->website }}" target="_blank" class="btn btn-success" rel="noopener">Go to the
                    digitized manuscripts <sup><i
                            class="bi bi-box-arrow-up-right small"></i></sup></a>
            </div>
        </div>
    </div>
    <div id="main-data">
        <div class="container">
            <div class="card">
                <div class="card-header" data-dmmapp="institution-card">Institution details</div>
                <div class="card-body">
                    <div class="table-responsive mb-4">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="col-4" scope="col">Type</th>
                                <th class="col-8" scope="col">Data</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">Institution name</th>
                                <td data-dmmapp="library">{{ $library_data->library }}</td>
                            </tr>
                            <tr>
                                <th scope="row">URL to digitized items</th>
                                <td data-dmmapp="url" class="text-break">{{ $library_data->website }}
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">N<sup>o</sup> of digitized items (estimate)</th>
                                <td>{{ $library_data->quantity }}</td>
                            </tr>
                            <tr>
                                <th scope="row">IIIF</th>
                                <td>
                                    @if ($library_data->iiif == '0')
                                        No
                                    @else
                                        Yes
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Digitized items' copyright</th>
                                <td>{{ $library_data->copyright }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Uses a Free Cultural Works License</th>
                                <td>
                                    @if ($library_data->is_free_cultural_works_license == '0')
                                        No
                                    @else
                                        Yes
                                    @endif
                                </td>
                            </tr>
                            @if (empty($library_data->notes))
                            @else
                                <tr>
                                    <th scope="row">Notes</th>
                                    <td>{{ $library_data->notes }}</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <h4>Geographical information</h4>
                    <div class="table-responsive mb-4">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="col-4" scope="col">Type</th>
                                <th class="col-8" scope="col">Data</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">Nation</th>
                                <td>{{ $library_data->nation }}</td>
                            </tr>
                            <tr>
                                <th scope="row">City</th>
                                <td> {{ $library_data->city }} </td>
                            </tr>
                            <tr>
                                <th scope="row">Latitude</th>
                                <td>{{ $library_data->lat }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Longitude</th>
                                <td>{{ $library_data->lng }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <h4>Blog post availability and additional data</h4>
                    <div class="table-responsive mb-4">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="col-4" scope="col">Type</th>
                                <th class="col-8" scope="col">Data</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">Has a related Sexy Codicology post</th>
                                <td>
                                    @if ($library_data->has_post == '0')
                                        No
                                    @else
                                        Yes
                                    @endif
                                </td>
                            </tr>
                            @if ($library_data->has_post == '0')
                            @else
                                <tr>
                                    <th scope="row">Sexy Codicology post URL</th>
                                    <td>{{ $library_data->post_url }}</td>
                                </tr>
                            @endif
                            <tr>
                                <th scope="row">DMMapp ID</th>
                                <td>{{ $library_data->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row">DMMapp URL slug</th>
                                <td>{{ $library_data->library_name_slug }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <x-disclaimer/>
        <x-patreon/>
        <x-feedback/>

@endsection
@section('javascript')
@endsection
