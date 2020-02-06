@extends('layouts.app') 
@section('title'){{ $library }} - Digitzed Medieval Manuscripts
@endsection
 
@section('description')Find
digitized medieval manuscripts belonging to the {{ $library }}!
@endsection
 
@section('css')
@endsection
 
@section('content')
<!-- SECTION left column -->
<div class="col-12 col-lg-8">
    <div class="well">
        <h2>{{ $library }}<br /><small class="text-muted">Record details</small></h2>
        <div class="table-responsive-lg">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th scope="row">Institution</th>
                        <td>{{ $library }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Link</th>
                        <td class="link"><a class="link" href="{{ $website }}" target="_blank" rel="noopener"><sup><i class="fas fa-external-link-alt fa-xs"></i></sup> {{$website}}</a></td>
                    </tr>
                    <tr>
                        <th scope="row">Quantity</th>
                        <td>{{ $quantity }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Images' copyright</th>
                        <td>{{ $copyright }}</td>
                    </tr>
                    <tr>
                        <th scope="row">IIIF</th>
                        <td>{{ $iiif }}</td>
                    </tr>
                    @isset($is_part_of)
                    <tr>
                        <th scope="row">Is part of</th>
                        <td>{!! $is_part_of !!}</td>
                    </tr>
                    @endisset @isset($notes)
                    <tr>
                        <th scope="row">Additional notes</th>
                        <td>{{ $notes }}</td>
                    </tr>
                    @endisset
                </tbody>
            </table>
        </div>
        <h3><small class="text-muted">Additional data</small></h3>
        <div class="table-responsive-lg">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th scope="row">ID</th>
                        <td>{{ $library_id }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Nation</th>
                        <td>{{ $nation }}</td>
                    </tr>
                    <tr>
                        <th scope="row">City</th>
                        <td> {{ $city }} </td>
                    </tr>
                    <tr>
                        <th scope="row">Latitude</th>
                        <td>{{ $lat }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Longitude</th>
                        <td>{{ $lng }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <a href="/data/"><button type="button" class="btn btn-outline-secondary my-3"><i class="fas fa-chevron-circle-left"></i> Back</button></a>
    </div>
</div>
<!-- SECTION right column -->
<div class="col-12 col-lg-4">
    <div class="well mt-1">
        <p>Minim voluptate consectetur aute incididunt ipsum et in culpa do ullamco laboris.
        </p>
        <p><a href="https://docs.google.com/forms/d/e/****************************/viewform?entry.********={{$library}}&entry.********={{$library_id}}"
                class="btn btn-outline-danger" role="button" aria-pressed="true">
                <i class="fas fa-exclamation-circle"></i> Report data issue <sup><i class="fas fa-external-link-alt fa-xs"></i></sup>
            </a></p>
    </div>
</div>
@endsection
 
@section('javascript')
@endsection