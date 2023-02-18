@extends('errors::bootstrap')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests'))
@section('latin-message', __('melius abundare quam deficere'))
@section('translation', __('better too much than not enough'))
@section('source', __('Ipse dixit'))

@section('button')
    <a href="/" type="button" class="btn btn-primary">Go home</a>
@endsection
