@extends('layouts.app')
@section('css')
@endsection
@section('title'){{ $library_data->library }} - Digitized Medieval Manuscripts @endsection
@section('title-meta'){{ $library_data->library }} - Digitized Medieval Manuscripts @endsection
@section('description-meta')Links and information about digitized medieval manuscripts belonging to {{ $library_data->library }} in {{ $library_data->city }}, {{ $library_data->nation }}@endsection

@section('breadcrumbs')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('data') }}">Data</a></li>
                <li>{{ $library_data->library }}</li>
            </ol>
            <h2>{{ $library_data->library }} - Digitized Medieval Manuscripts app</h2>
        </div>
    </section>

@endsection

@section('content')
    <h3>DMMapp Record Details</h3>
    <p>Here you can find the data used by the DMMapp for this item. You can share share it, link to it, and report errors.
    </p>
    <div class="table-responsive">
        <table class="table">
            <caption>DMMapp data concerning {{ $library_data->library }}</caption>
            <thead>
                <tr>
                  <th scope="col">Type</th>
                  <th scope="col">Data</th>
                </tr>
              </thead>
            <tbody>
                <tr>
                    <th scope="row">Institution</th>
                    <td>{{ $library_data->library }}</td>
                </tr>
                <tr>
                    <th scope="row">Digitized items' URL</th>
                    <td><a href="{{ $library_data->website }}" target="_blank" rel="noopener"> {{ $library_data->website }} <sup><i
                                    class="fas fa-external-link-alt fa-xs"></i></sup></a></td>
                </tr>
                <tr>
                    <th scope="row">Digitized items</th>
                    <td>{{ $library_data->quantity }}</td>
                </tr>
                <tr>
                    <th scope="row">IIIF</th>
                    <td>
                        @if ($library_data->iiif == '0')
                            Yes
                        @else
                            No
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
                            Yes
                        @else
                            No
                        @endif
                    </td>
                </tr>
                <tr>
                    <th scope="row">Has a related Sexy Codicology post</th>
                    <td>
                        @if ($library_data->has_post == '0')
                            Yes
                        @else
                            No
                        @endif
                    </td>
                </tr>
                @if ($library_data->has_post == '0')
                    <tr>
                        <th scope="row">Sexy Codicology post URL</th>
                        <td>{{ $library_data->post_url }}</td>
                    </tr>
                @else
                @endif
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
                <tr>
                    <th scope="row">DMMapp ID</th>
                    <td>{{ $library_data->id }}</td>
                </tr>
                <tr>
                    <th scope="row">DMMapp URL slug</th>
                    <td>{{ $library_data->library_name_slug }}</td>
                </tr>
                <tr>
                    <th scope="row">Notes</th>
                    <td>{{ $library_data->notes }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="row mb-3">
        <div class="col text-center">
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSfP_TNstBIoCI9mBhA81cN7XxASGx4cLknBOuyp44Tm7Qh9_g/viewform?entry.310414793={{ $library_data->library }}&entry.1084339932={{ $library_data->id }}" rel="noopener"
                class="btn btn-warning" target="_blank" role="button" aria-pressed="true">
                <i class="fas fa-exclamation-circle"></i> Report data issue <sup><i
                        class="fas fa-external-link-alt fa-xs"></i></sup>
            </a>
            <p class="small text-muted mt-3">The DMMapp data is crowdsourced. Help us keep it up-to-date by reporting inaccuracies.</p>
        </div>
    </div>
    
@endsection
@section('javascript')
@endsection
