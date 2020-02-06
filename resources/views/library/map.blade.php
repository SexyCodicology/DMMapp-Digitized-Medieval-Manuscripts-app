@extends('layouts.app') 
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/datatables.min.css" />
@endsection
@section('content')
@foreach ($libraries as $library) @endforeach
<!-- SECTION left column -->
<div class="col-12 col-lg-8 mb-3">
    <div id="dmmtable">
        <div class="well">
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
    </div>
    <div id="dmmmap" style="width:100%">
        <div class="well">
            <div id="map" style="height:500px; width:100%;">
                <noscript>
                <div class="alert alert-info">
                    <h4>Your JavaScript is disabled</h4>
                    <p>Please enable JavaScript to view the map.</p>
                </div>
            </noscript>
            </div>
        </div>
    </div>
</div>
<!-- SECTION right column -->
<div class="col-12 col-lg-4">
    <div class="well mt-1">
        <p><strong>Incididunt nostrud non enim velit veniam cillum quis consectetur dolore sunt excepteur est eiusmod est.</strong> Exercitation qui do reprehenderit dolore irure laboris amet eu.</p>
        <h3>Esse est nulla occaecat pariatur culpa consequat esse?</h3>
        <p>Velit deserunt!</p>
        <ol>
            <li>Nulla non adipisicing sunt magna irure aliqua laboris.</li>
            <li>Sit ex cillum in id sint magna sunt et consectetur officia do culpa voluptate dolor.</li>
            <li>Tempor sunt duis id deserunt pariatur cupidatat sint!</li>
        </ol>
        <h3>Mollit sit id pariatur quis aute cupidatat et deserunt fugiat.</h3>
        <p>Veniam esse in mollit voluptate sunt et adipisicing incididunt ullamco sunt consequat elit laboris. Cillum anim eiusmod qui ullamco ad pariatur deserunt. Dolore excepteur nostrud id adipisicing sunt. Aute sit irure nulla magna mollit mollit sunt excepteur.</p>
        <p><a href="https://example.com/" class="btn btn-outline-success" role="button" aria-pressed="true">
                <i class="fas fa-exclamation-circle"></i> Report missing repository <sup><i class="fas fa-external-link-alt fa-xs"></i></sup></a></p>
        <p><a href="https://docs.google.com/forms/d/e/**************************/" class="btn btn-outline-danger"
                role="button" aria-pressed="true">
                <i class="fas fa-exclamation-circle"></i> Report data issue <sup><i class="fas fa-external-link-alt fa-xs"></i></sup>
            </a></p>
    </div>
</div>
@endsection
<!-- Optional JavaScript -->
@section('javascript')
<script type="text/javascript">
    var libraries = {!!json_encode($libraries)!!}; //this transforms our libraries to json, which can then be read by Google maps - in map_app.js
</script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/datatables.min.js"></script>
<script type="text/javascript" src="{{ asset('/js/map_app.js') }}"></script>
<script defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API') }}&callback=initMap"></script>
@endsection