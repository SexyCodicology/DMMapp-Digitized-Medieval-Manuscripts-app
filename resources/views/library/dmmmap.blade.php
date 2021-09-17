@extends('layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.2/r-2.2.9/datatables.min.css" />
@endsection
@section('content')
    @foreach ($libraries as $library)
    @endforeach

    <div id="map" style="height:500px; width:100%;">
        <noscript>
            <div class="alert alert-info">
                <h4>Your JavaScript is disabled</h4>
                <p>Please enable JavaScript to view the map.</p>
            </div>
        </noscript>
    </div>
    <div>
        <noscript>
            <div class="alert alert-info">
                <h4>Your JavaScript is disabled</h4>
                <p>Please enable JavaScript to see the table.</p>
            </div>
        </noscript>
        <table id="dmmtable" class="table table-striped table-bordered" style="width:100%; padding-bottom:1em;">
            <thead>
                <tr>
                    <th data-priority="1">Nation</th>
                    <th>City</th>
                    <th data-priority="2">Library</th>
                    <th>lat</th>
                    <th>lng</th>
                    <th>Quantity</th>
                    <th>Website</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <div class="col-sm-4">
        <h2>DMMapp - Digitized medieval manuscripts app</h2>
        <p>The DMMapp (Digitized Medieval Manuscripts App) links to more than 500 libraries in the world. Each one of these
            contains
            digitized medieval manuscripts that can be browsed for free.</p>
        <h3>How does it work?</h3>
        <ol>
            <li>Search for a library / city / country</li>
            <li>Click on the library you want to visit</li>
            <li>Click on "Browse the manuscripts" and off you go!</li>
        </ol>

        <p>The DMMapp is developed and maintained with a ton of love by the Sexy Codicology Team.</p>
        <h3>Love what we do?</h3>
        <p>
            <a href="https://www.patreon.com/bePatron?u=3645539" data-patreon-widget-type="become-patron-button">Become a
                Patron!</a>
        </p>
    </div>
@endsection
<!-- Optional JavaScript -->
@section('javascript')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.2/r-2.2.9/datatables.min.js"></script>
    <!-- NOTE this transforms our libraries to json, which can then be read by Google maps - in dmmapp.js -->
    <script type="text/javascript"> var libraries = {!! json_encode($libraries) !!} </script>
    <script async type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXbFwvj_8iz-56H2YYRdOPqxphj01fWdw&callback=initMap"></script>
    <script defer type="text/javascript" src="{{ asset('/js/dmmapp.js') }}"></script>
@endsection
