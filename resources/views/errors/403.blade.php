@extends('errors::bootstrap')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __('This action is forbidden'))
@section('latin-message', __('nitimur in vetitum'))
@section('translation', __('we strive for the forbidden'))
@section('source', __('Ovid'))

@section('button')
    <a href="/" type="button" class="btn btn-primary">Go home</a>
@endsection
