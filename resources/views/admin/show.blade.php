@extends('layouts.app')
@section('css')
@endsection
@section('content')
    <!-- SECTION left column -->
    <div class="col-8">
        <div class="well">

            <div class="table-responsive">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">Institution</th>
                            <td>{{ $library }}</td>
                        </tr>
                        <tr>
                            <th scope="row">DMMapp ID</th>
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
                        <tr>
                            <th scope="row">Quantity</th>
                            <td>{{ $quantity }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Website</th>
                            <td><a href="{{ $website }}" target="_blank"> {{$website}} <sup><i class="fas fa-external-link-alt fa-xs"></i></sup></a></td>
                        </tr>
                        <tr>
                            <th scope="row">Copyright</th>
                            <td>{{ $copyright }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Notes</th>
                            <td>{{ $notes }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a href="/data/"><button type="button" class="btn btn-outline-secondary"><i class="fas fa-chevron-circle-left"></i>
                    Back</button></a>
        </div>
    </div>
    <!-- SECTION right column -->
    <div class="col-4">
            <div class="well"><h3>DMMapp Record Details</h3>
                <p>Here you can find the data used by the DMMapp for this item. You can share share it, link to it, and report errors.</p>
            <p><a href="https://docs.google.com/forms/d/e/1FAIpQLSfP_TNstBIoCI9mBhA81cN7XxASGx4cLknBOuyp44Tm7Qh9_g/viewform?entry.310414793={{$library}}&entry.1084339932={{$library_id}}" class="btn btn-outline-danger" role="button" aria-pressed="true">
                        <i class="fas fa-exclamation-circle"></i> Report data issue <sup><i class="fas fa-external-link-alt fa-xs"></i></sup>
                </a></p>
                <h4>Love what we do?</h4>
                <p><a href="https://www.patreon.com/bePatron?u=3645539" data-patreon-widget-type="become-patron-button">Become a Patron!</a></p>
                </div>
    </div>
    @endsection
    @section('javascript')
    @endsection
