@extends('errors::bootstrap')

@section('title', __('Payment Required'))
@section('code', '402')
@section('message', __('A payment Required is required for this action'))
@section('latin-message', __('clavis aurea'))
@section('translation', __('golden key'))
@section('source', __('Ipse dixit'))

@section('button')
    <a href="/" type="button" class="btn btn-primary">Go home</a>
@endsection
