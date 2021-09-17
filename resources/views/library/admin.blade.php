@extends('layouts.app')
@section('css')
@endsection
@section('content')
    <!-- Content here -->
        <div class="col-md-6">
            <h2 class="pull-left">
                <h2>DMMapp Data Admin</h2>
        </div>
        <div class="col-md-6" style="padding: 15px">
            <a class="btn btn-outline-success pull-right" href="record/new">
            <i class="fa fa-plus-square"></i> New Library</a>
        </div>
    <div class="well">
        <form action="/search" method="GET" class="form-inline">
            <div class="form-group mb-2">
                <input type="search" name="search" class="form-control" placeholder="Libraries, Cities, etc.">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Search </button>
        </form>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">DMMApp ID</th>
                        <th scope="col">Library</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($libraries as $library)
                    <tr>
                        <td>{{$library->id}}</td>
                        <td>{{$library->library}}</td>
                        <td>
                            <a class="btn btn-outline-primary" href="{{ route('update_library', ['library_id' => $library->id]) }}">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('delete_library', ['library_id' => $library->id]) }}" method="post">
                                @csrf
                                {{ method_field('delete') }}
                                <button class="btn btn-outline-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $libraries->links() }}
    </div>
@endsection
@section('javascript')
@endsection
