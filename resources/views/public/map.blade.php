@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/dt-1.11.3/r-2.2.9/sp-1.4.0/sl-1.3.3/datatables.min.css" />
@endsection
@section('breadcrumbs')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="/">Home</a></li>
                <li>Map</li>
            </ol>
            <div class="row">
                <div class="col">

                    <h2>Digitized Medieval Manuscripts app Map</h2>
                    <h6>Browse the man and discover thousands of digitized medieval manuscripts</h6>

                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <div class="text-center" data-aos="zoom-in">
        <p>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                aria-expanded="false" aria-controls="collapseExample">
                <i class="fas fa-info-circle"></i> About
            </button>
        </p>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <h3>The DMMapp Map</h3>
                <strong>The classic DMMapp experience!</strong> Browse a map containing all the institutions that are some
                to digitized medieval manuscripts.
                <hr>
                <p>The data collected by the DMMapp is crowdsourced and updated constantly. If you notice
                    any
                    errors, please help us correct them by using the <b>Report data issue</b> button at the
                    bottom of this page.</p>
            </div>
        </div>
    </div>
    <div id="main-map" data-aos="fade-up">
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
            <table id="dmmtable" class="table table-striped table-bordered align-middle text-center" style="width:100%;">
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
    <div class="row mb-4">
        <div class="col text-center">
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSfP_TNstBIoCI9mBhA81cN7XxASGx4cLknBOuyp44Tm7Qh9_g/viewform
                    rel=" noopener" class="btn btn-warning" target="_blank" role="button" aria-pressed="true">
                <i class="fas fa-exclamation-circle"></i> Report data issue <sup><i
                        class="fas fa-external-link-alt fa-xs"></i></sup>
            </a>
            <p class="small text-muted mt-4">The DMMapp data is crowdsourced. Help us keep it up-to-date by reporting
                inaccuracies.</p>
        </div>
    </div>

    <x-patreon />

@endsection
{{-- Optional JavaScript --}}
@section('javascript')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs5/dt-1.11.3/r-2.2.9/sp-1.4.0/sl-1.3.3/datatables.min.js"></script>
    {{-- NOTE this transforms our libraries to json, which can then be read by Googl maps - in dmmapp.js --}}
    <script type="text/javascript">
        var libraries = {!! json_encode($libraries->toArray()) !!}
    </script>
    <script async type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXbFwvj_8iz-56H2YYRdOPqxphj01fWdw&callback=initMap"></script>
    @env('production')
    <script defer type="text/javascript" src="{{ asset('/js/dmmapp20211126.min.js') }}"></script>
    @endenv
    @env('local')
    <script defer type="text/javascript" src="{{ asset('/js/dmmapp20211126.js') }}"></script>
    @endenv

@endsection
