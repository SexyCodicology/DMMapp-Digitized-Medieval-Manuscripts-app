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
                <li>Data</li>
            </ol>
            <div class="row">
                <div class="col">

                    <h2>Digitized Medieval Manuscripts app data</h2>
                    <h6>Explore all the institutions added to the DMMapp database</h6>

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
                    License.</dd>
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
    <div id="main-data" data-aos="fade-up">
        <div id="data-table" class="my-3">
            <noscript>
                <div class="alert alert-info">
                    <h4>Your JavaScript is disabled</h4>
                    <p>Please enable JavaScript to see the table.</p>
                </div>
            </noscript>
            <table id="dmmtable" class="table table-striped table-bordered align-middle text-center" style="width:100%;">
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
        <script defer type="text/javascript" src="{{ asset('/js/data.min.js') }}"></script>
    @endsection
