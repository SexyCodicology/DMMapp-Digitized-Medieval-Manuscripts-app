@extends('layouts.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.18/r-2.2.2/datatables.min.css" />
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
    <div id="dmmtable">
        <noscript>
            <div class="alert alert-info">
                <h4>Your JavaScript is disabled</h4>
                <p>Please enable JavaScript to see the table.</p>
            </div>
        </noscript>
        <table id="datatablex" class="table table-striped table-bordered" style="width:100%; padding-bottom:1em;">
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
    <script type="text/javascript">
        var libraries =
            {!! json_encode($libraries) !!}; //this transforms our libraries to json, which can then be read by Google maps - in dmmapp.js
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.js"></script>
    <!-- FIXME update api with production api when moving to production -->
    <script async
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXbFwvj_8iz-56H2YYRdOPqxphj01fWdw&callback=initMap"></script>
    <script defer type="text/javascript" src="{{ asset('/js/dmmapp.js') }}"></script>
@endsection
