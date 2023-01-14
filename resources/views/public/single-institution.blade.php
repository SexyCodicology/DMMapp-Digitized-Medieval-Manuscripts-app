@extends('layouts.app')
@section('css')
@endsection
@section('title'){{ $library_data->library }} - Digitized Medieval Manuscripts @endsection
@section('title-meta'){{ $library_data->library }} - Digitized Medieval Manuscripts @endsection
@section('description-meta')Links and information about digitized medieval manuscripts belonging to
    {{ $library_data->library }} in {{ $library_data->city }}, {{ $library_data->nation }}@endsection

@section('breadcrumbs')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('data') }}">Data</a></li>
                <li>{{ $library_data->library }}</li>
            </ol>
        </div>
    </section>

@endsection

@section('content')
<div class="text-center">
    <h1 class="display-3">Digitized Medieval Manuscripts database</h1>
    <p class="text-muted lead">by Sexy Codicology</p>

</div>
    <div class="text-center">

        <div class="btn-group my-3" role="group" aria-label="additional options">

            <button class="btn btn-primary border-light" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapsible" aria-expanded="false" aria-controls="collapsible">
                <i class="fas fa-info-circle"></i> About
            </button>
            <a class="btn btn-primary border-light align-middle text-center" href="{{ route('random_library') }}"
                type="button"><i class="fas fa-random"></i> Explore another random library!</a>
            <a class="btn btn-primary border-light" href="#cta" type="button"><i class="fab fa-patreon"></i> Support us!</a>
            @auth
                <a class="btn btn-primary border-light" href="{{ route('update_library', $library_data->id) }}"
                    type="button"><i class="fas fa-edit"></i> Edit</a>
            @endauth
        </div>

        <div class="collapse" id="collapsible">
            <div class="card card-body">
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
        <div class="alert alert-success text-center my-3" role="alert" data-aos="zoom-in">

        <h1>{{ $library_data->library }} - Digitized manuscripts</h1>
        <h3>{{ $library_data->city }}, {{ $library_data->nation }}</h3>
        <div class="row justify-content-center">
            <div class="col-3">
                <hr>
            </div>
        </div>

        <div class="my-3">
            <a href="{{ $library_data->website }}" target="_blank" class="btn btn-success" rel="noopener">Go to the digitized manuscripts <sup><i
                        class="fas fa-external-link-alt fa-xs"></i></sup></a>
        </div>
        </div>
    </div>
    <hr>
    <div>
        <h4>Institution details</h4>
        <div class="table-responsive mb-4" data-aos="zoom-in">
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
                        <td>{{ $library_data->library }}</td>
                    </tr>
                    <tr>
                        <th scope="row">URL to digitized items</th>
                        <td class="text-break">{{ $library_data->website }}
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
    </div>

    <div>
        <h4>Geographical information</h4>
        <div class="table-responsive mb-4" data-aos="zoom-in">
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
    </div>
    <div>
        <h4>Blog post availability and additional data</h4>

        <div class="table-responsive mb-4" data-aos="zoom-in">
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
    <div class="row mb-4">
        <div class="col text-center">
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSfP_TNstBIoCI9mBhA81cN7XxASGx4cLknBOuyp44Tm7Qh9_g/viewform?entry.310414793={{ $library_data->library }}&entry.1084339932={{ $library_data->id }}"
                rel="noopener" class="btn btn-warning" target="_blank" role="button" aria-pressed="true">
                <i class="fas fa-exclamation-circle"></i> Report data issue <sup><i
                        class="fas fa-external-link-alt fa-xs"></i></sup>
            </a>
            <p class="small text-muted mt-4">The DMMapp data is crowdsourced. Help us keep it up-to-date by reporting
                inaccuracies.</p>
        </div>
    </div>

    <x-patreon />

    <div class="position-fixed bottom-0 start-50 translate-middle-x" style="z-index: 11">
        <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true"
            data-bs-autohide="false">
            <div class="toast-header">
                <i class="fas fa-check-double"></i>
                <strong class="me-auto ms-2">Improve the DMMapp!</strong>
                <strong class="me-auto"></strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-center">
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSfP_TNstBIoCI9mBhA81cN7XxASGx4cLknBOuyp44Tm7Qh9_g/viewform?entry.310414793={{ $library_data->library }}&entry.1084339932={{ $library_data->id }}"
                    rel="noopener" class="btn btn-warning" target="_blank" role="button" aria-pressed="true">
                    <i class="fas fa-exclamation-circle"></i> Report data issue <sup><i
                            class="fas fa-external-link-alt fa-xs"></i></sup>
                </a>
                <a href="https://docs.google.com/forms/d/1EvEN3Ctzt1rQgGPPcyyAZ4UcSN3p-aqVqfOIUTE75Xk" rel="noopener"
                    class="btn btn-danger mt-2" target="_blank" role="button" aria-pressed="true">
                    <i class="fas fa-exclamation-circle"></i> Report missing institution <sup><i
                            class="fas fa-external-link-alt fa-xs"></i></sup>
                </a>
            </div>
        </div>
    </div>

@endsection
@section('javascript')
@endsection
