@extends('errors::bootstrap')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __('The DMMapp is unavailable as we perform maintenance and upgrades'))
@section('latin-message', __('extra omnes'))
@section('translation', __('outside, all of you'))
@section('source', __('It is issued by the Master of the Papal Liturgical Celebrations before a session of the papal conclave which will elect a new pope'))

@section('button')
    <button class="btn btn-primary" type="button" disabled>
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    </button>
@endsection
