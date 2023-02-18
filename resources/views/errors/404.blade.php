@extends('errors::bootstrap')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('This page does not exist'))
@section('latin-message', __('ex nihilo nihil fit'))
@section('translation', __('nothing comes from nothing'))
@section('source', __('Lucretius'))

@section('button')
    <a href="/" type="button" class="btn btn-primary">Go home</a>
@endsection
