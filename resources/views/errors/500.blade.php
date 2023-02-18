@extends('errors::bootstrap')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('An error has occurred'))
@section('latin-message', __('horresco referens'))
@section('translation', __('I shudder as I tell'))
@section('source', __('Virgil'))

@section('button')
    <a href="/" class="btn btn-primary">Go home</a>
@endsection
