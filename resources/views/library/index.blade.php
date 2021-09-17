@extends('layouts.app')
@section('css')
@endsection
@section('content')
<!-- Content here -->
<div class="col-sm-8">
        <div class="well">
            <form action="/search" method="GET" class="form-inline">

                <div class="form-group mb-2">
                    <input type="search" name="search" class="form-control" placeholder="Libraries, Cities, etc.">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Search </button>
            </form>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">DMMApp ID</th>
                            <th scope="col">Library</th>
                            <th scope="col">Info</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($libraries as $library)
                        <tr>
                            <td>{{$library->id}}</td>
                            <td>{{$library->library}}</td>
                            <td>
                                <a class="btn btn-outline-primary" href="{{ route('show_library', ['library_id' => $library->id]) }}">View
                                    Data</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $libraries->links() }}
            </div>
        </div>
</div>
<div class="col-4">
    <div class="well"><h3>DMMapp Data Overview</h3>
        <p>Welcome to the DMMapp Data Overview page. Here you can browse and search all the data used by the DMMapp. You can browse all the individual items in the database, share them, link to them, and report errors.</p>
        <p><a href="https://docs.google.com/forms/d/e/1FAIpQLSfP_TNstBIoCI9mBhA81cN7XxASGx4cLknBOuyp44Tm7Qh9_g/viewform" class="btn btn-outline-danger" role="button" aria-pressed="true">
                <i class="fas fa-exclamation-circle"></i> Report data issue <sup><i class="fas fa-external-link-alt fa-xs"></i></sup>
        </a></p>
        <h4>Love what we do?</h4>
        <p><a href="https://www.patreon.com/bePatron?u=3645539" data-patreon-widget-type="become-patron-button">Become a Patron!</a></p>
        </div>
    </div>

    @endsection
    @section('javascript')
    @endsection
