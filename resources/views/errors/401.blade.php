@extends('errors::bootstrap')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('You are not authorized to see this page'))
@section('latin-message', __('non haec sine numine divum eveniunt'))
@section('translation', __('these things do not come to pass without the will of Heaven'))
@section('source', __('Virgil'))

@section('button')
    <a href="/" class="btn btn-primary">Go home</a>
@endsection
