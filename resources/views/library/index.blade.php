@extends('layouts.app')
@section('css')
@endsection
@section('content')
<!-- SECTION left column -->
<div class="col-12 col-lg-8 mb-3">
    <div class="well">
        <h2>Data overview</h2>
        <form action="/search" method="GET" class="form-inline">
            @csrf
            <div class="form-group mb-2">
                <input type="search" name="search" class="form-control" placeholder="Libraries, Cities, etc.">
            </div>
            <button type="submit" class="btn btn-primary ml-2 mb-2">Search </button>
        </form>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Library</th>
                        <th scope="col">Data link</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($libraries as $library)
                    <tr>
                        <td>{{$library->id}}</td>
                        <td>{{$library->library}}</td>
                        <td>
                            <a class="btn btn-outline-primary"
                                href="{{ route('show_library', ['library_id' => $library->id]) }}">View
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
<!-- SECTION right column -->
<div class="col-12 col-lg-4">
    <div class="well mt-1">
        <p>Id nulla in proident sit consequat labore id et ullamco esse nostrud.<strong>Exercitation labore adipisicing
                mollit ex dolore esse ipsum exercitation sint.</strong> Sit enim aliqua esse deserunt culpa ex ullamco.
        </p>
        <p><a href="https://example.com/" class="btn btn-outline-success" role="button"
                aria-pressed="true">
                <i class="fas fa-exclamation-circle"></i> Report missing repository <sup><i
                        class="fas fa-external-link-alt fa-xs"></i></sup></a></p>
        <p><a href="https://docs.google.com/forms/d/e/****************************/viewform"
                class="btn btn-outline-danger" role="button" aria-pressed="true">
                <i class="fas fa-exclamation-circle"></i> Report data issue <sup><i
                        class="fas fa-external-link-alt fa-xs"></i></sup>
            </a></p>
    </div>
</div>
@endsection
@section('javascript')
@endsection
