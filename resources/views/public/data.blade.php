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
            <h2>Data</h2>
        </div>
    </section>

@endsection
@section('content')

    <div data-aos="zoom-in" class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    DMMapp Data Info
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <div class="alert alert-primary" role="alert">
                        <strong>The full DMMapp data!</strong> Here you can browse, search, and filter all the data we have
                        inserted into the DMMapp.
                        <hr>
                        <dt>Institution</dt>
                        <dd>The name of the institution housing digitized items. Also, the link to the said repository.</dd>
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
                    </div>
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
        <script defer type="text/javascript" src="{{ asset('/js/data.js') }}"></script>
    @endsection
