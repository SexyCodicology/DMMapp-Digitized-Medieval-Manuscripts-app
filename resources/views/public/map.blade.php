@extends('layouts.app')

@section('title')
    Digitized Medieval Manuscripts map - DMMapp
@endsection
@section('title-meta')
    Digitized Medieval Manuscripts map - DMMapp
@endsection
@section('description-meta')
    Browse the map and discover thousands of digitized medieval manuscripts around the world!
@endsection

@section('css')
@endsection

@section('breadcrumbs')
    <ol>
        <li><a href="/">Home</a></li>
        <li>Map</li>
    </ol>
    <div class="row">
        <div class="col text-center my-3">
            <h1>Digitized Medieval Manuscripts map</h1>
            <h4>Browse the map and discover thousands of digitized medieval manuscripts around the world</h4>
        </div>
    </div>
@endsection
@section('content')
    <div class="text-center">
        <div class="btn-group my-4" role="group" aria-label="additional options">
            <button class="btn btn-primary border-light" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsible"
                    aria-expanded="false" aria-controls="collapsible">
                <i class="bi bi-info-circle-fill"></i> About
            </button>
            <a class="btn btn-primary border-light" href="#dmmtable_wrapper" type="button">
                <i class="bi bi-arrow-down-square"></i> Go to list</a>
            <a class="btn btn-primary border-light" href="{{route('random_library')}}" type="button">
                <i class="bi bi-shuffle"></i> Explore a random library!</a>
            <a class="btn btn-primary border-light" href="#cta" type="button">
                <i class="bi bi-chat-left-heart-fill"></i> Support us!</a>
        </div>
        <div class="collapse" id="collapsible">
            <div class="card card-body text-start">
                <h3>The DMMapp Map</h3>
                <strong>The classic DMMapp experience!</strong> Browse a map containing all the institutions that are
                some
                to digitized medieval manuscripts.
                <hr>
                <p>The data collected by the DMMapp is crowdsourced and updated constantly. If you notice
                    any
                    errors, please help us correct them by using the <b>Report data issue</b> button at the
                    bottom of this page.</p>
            </div>
        </div>
    </div>
    <div id="main-map" class="main-map">
        <div class="container">
            <div id="map" style="height:50em; width:100%;">
                <noscript>
                    <div class="alert alert-info">
                        <h4>Your JavaScript is disabled</h4>
                        <p>Please enable JavaScript to view the map.</p>
                    </div>
                </noscript>
            </div>
            <div id="map-table" class="my-3">
                <noscript>
                    <div class="alert alert-info">
                        <h4>Your JavaScript is disabled</h4>
                        <p>Please enable JavaScript to see the table.</p>
                    </div>
                </noscript>
                <table id="dmmtable" class="table table-striped table-bordered align-middle text-center"
                       style="width:100%;">
                    <thead>
                    <tr>
                        <th>Institution</th>
                        <th>IIIF repository</th>
                        <th>Quantity of digitized items</th>
                        <th>Digitized items' copyright</th>
                        <th>Free Cultural Works License</th>
                        <th>Nation</th>
                        <th>City</th>
                        <th>lat</th>
                        <th>lng</th>
                        <th>Notes</th>
                        <th>Link</th>
                        <th>Has a blog post</th>
                        <th>Blog post</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <hr class="col-4">
    </div>
    <x-latest :latestChanges="$latest_changes"/>
    <div class="d-flex justify-content-center">
        <hr class="col-4">
    </div>
    <x-disclaimer/>
    <x-patreon/>
@endsection

@section('feedback')
    <x-feedback/>
@endsection
{{-- Optional JavaScript --}}
@section('javascript')
@endsection

@push('scripts')
    <script type="text/javascript">let libraries = {!! json_encode($libraries->toArray()) !!}</script>
    <script type="text/javascript" src="{{ mix('js/map-data.min.js') }}"></script>
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key={{config('google.google-maps-api-key')}}&callback=initMap"></script>
@endpush
