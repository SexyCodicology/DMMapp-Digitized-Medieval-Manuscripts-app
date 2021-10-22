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
            <h2>Map</h2>
        </div>
    </section>

@endsection
@section('content')
    @foreach ($libraries as $library)
    @endforeach

    <div id="main-map" data-aos="fade-up">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path
                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
        </svg>

        <div class="alert alert-primary d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                <use xlink:href="#info-fill" />
            </svg>
            <div>
                Explore even more digitized medieval manuscripts repositories in our <a class="alert-link"
                    href="{{ route('data') }}" target="_self">data page</a>.
            </div>
        </div>

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
            <table id="dmmtable" class="table table-striped table-bordered" style="width:100%;">
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

        <div class="accordion" id="accordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        <strong>How does the DMMapp map work?</strong>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse collapsed" aria-labelledby="headingOne"
                    data-bs-parent="#accordion">
                    <div class="accordion-body">
                        The DMMapp (Digitized Medieval Manuscripts App) links to more than 500 libraries in the world. Each
                        one
                        of these contains digitized medieval manuscripts that can be browsed for free.
                        <h3>How does it work?</h3>
                        <ol>
                            <li>Search for a library / city / country</li>
                            <li>Click on the library you want to visit</li>
                            <li>Click on "Browse the manuscripts" and off you go!</li>
                        </ol>
                        <p>The DMMapp is developed and maintained with a ton of love by the Sexy Codicology Team.</p>
                        <h3>Love what we do?</h3>
                        <p><a href="https://www.patreon.com/bePatron?u=3645539"
                                data-patreon-widget-type="become-patron-button">Become a Patron!</a></p>
                    </div>
                </div>
            </div>
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
    <script defer type="text/javascript" src="{{ asset('/js/dmmapp.js') }}"></script>
@endsection
