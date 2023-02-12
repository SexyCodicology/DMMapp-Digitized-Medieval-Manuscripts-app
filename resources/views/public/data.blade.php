@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs5/dt-1.13.1/b-2.3.3/b-html5-2.3.3/r-2.4.0/datatables.min.css"/>
@endsection
@section('breadcrumbs')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="/">Home</a></li>
                <li>Data</li>
            </ol>
            <div class="row">
                <div class="col">

                    <h5>Digitized Medieval Manuscripts database</h5>
                    <h6>Explore all the institutions added to the DMMapp database</h6>

                </div>
            </div>
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
                    data-bs-target="#collapsible"
                    aria-expanded="false" aria-controls="collapsible">
                <i class="bi-info-circle"></i> About
            </button>
            <a class="btn btn-primary border-light" href="#dmmtable_filter" type="button">
                <i class="bi-link"></i> Go to links</a>
            <a class="btn btn-primary border-light" href="{{route('random_library')}}" type="button">
                <i class="bi-random"></i> Explore a random library!</a>
            <a class="btn btn-primary border-light" href="#cta" type="button">
                <i class="bi-patreon"></i> Support us!</a>
        </div>

        <div class="collapse" id="collapsible">
            <div class="card card-body">
                <h3>The "DMMapp data" page</h3>
                <strong>The full DMMapp data!</strong> Here you can browse, search, and filter all the data we
                have
                inserted into the DMMapp.
                <hr>
                <dt>Institution name</dt>
                <dd>The name of the institution housing digitized items. Also, the link to the said repository.
                </dd>
                <dt>Link to digitized items</dt>
                <dd>A link to the digitized medieval manuscripts belonging to this institution.</dd>
                <dt>IIIF Repository</dt>
                <dd>Indicates wether a repository uses the International Image Interoperability Framework.</dd>
                <dt>Quantity</dt>
                <dd>An indication of how many digitized items are (estimated) in a repository.</dd>
                <dt>Digitized Items' Copyright</dt>
                <dd>The copyright applied to the digitized items in a repository.</dd>
                <dt>Free Cultural Works License</dt>
                <dd>Indicates if the copyright used in a repository is a Creative Commons' Free Cultural Works
                    License.
                </dd>
                <dt>Country</dt>
                <dd>The country where an institution is located.</dd>
                <dt>City</dt>
                <dd>The city where an institution is located.</dd>
                <dt>Blog Post</dt>
                <dd>Indicates weather the Sexy Codicology team has written a blog post reviewing the repository.
                </dd>
                <dt>Full data</dt>
                <dd>Link to the full metadata available on the DMMapp.</dd>
                <hr>
                <p>The data collected by the DMMapp is crowdsourced and updated constantly. If you notice
                    any
                    errors, please help us correct them by using the <b>Report data issue</b> button at the
                    bottom of this page.</p>
            </div>
        </div>
    </div>
    <div id="main-data">
        <div class="container">
            <div class="card">
                <div class="card-header">List of institutions</div>
                <div class="card-body">
                    <table class="table table-bordered yajra-datatable table-responsive table-hover" style="width:100%">
                        <noscript>
                            <div class="alert alert-info">
                                <h4>Your JavaScript is disabled</h4>
                                <p>Please enable JavaScript to see the table.</p>
                            </div>
                        </noscript>
                        <thead>
                        <tr>
                            <th>Institution name</th>
                            <th>Link to digitized manuscripts</th>
                            <th>Quantity of digitized items</th>
                            <th>IIIF repository</th>
                            <th>Digitized items' copyright</th>
                            <th>Free Cultural Works License</th>
                            <th>Nation</th>
                            <th>City</th>
                            <th>lat</th>
                            <th>lng</th>
                            <th>Full DMMapp data</th>
                            <th>Sexy Codicology blog post</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col text-center">
            <a href="https://docs.google.com/forms/d/e/1FAIpQLSfP_TNstBIoCI9mBhA81cN7XxASGx4cLknBOuyp44Tm7Qh9_g/viewform"
               rel="noopener" class="btn btn-warning" target="_blank" role="button" aria-pressed="true">
                <i class="bi-exclamation-circle"></i> Report data issue <sup><i
                        class="bi-box-arrow-up-right fa-xs"></i></sup>
            </a>
            <p class="small text-muted mt-4">The DMMapp data is crowdsourced. Help us keep it up-to-date by reporting
                inaccuracies.</p>
        </div>
    </div>

    <x-patreon/>

@endsection
{{-- Optional JavaScript --}}
@section('javascript')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/b-2.3.3/b-html5-2.3.3/r-2.4.0/datatables.min.js"></script>
@endsection


@push('scripts')
    @env('production')
        <script type="text/javascript" src="{{asset('/js/data.min.js')}}"></script>
    @endenv
    @env(['local','staging'])
        <script type="text/javascript" src="{{asset('/js/data.js')}}"></script>
    @endenv
@endpush
